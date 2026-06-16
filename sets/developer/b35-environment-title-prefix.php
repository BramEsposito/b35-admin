<?php

// SEO plugins (Yoast, Rank Math, ...) short-circuit the title here, bypassing
// document_title_parts. Run late so we prepend to whatever title they produced.
add_filter( 'pre_get_document_title', 'b35_environment_title_prefix_string', 99 );
// Core / theme path when no plugin short-circuits the title.
add_filter( 'document_title_parts', 'b35_environment_title_prefix_frontend' );
// Legacy themes that don't support the title-tag and call wp_title() directly.
add_filter( 'wp_title', 'b35_environment_title_prefix_string', 99 );
// Admin pages.
add_filter( 'admin_title', 'b35_environment_title_prefix_string', 99 );

/**
 * Returns the title prefix for the current environment.
 * local   = [LOCAL]
 * staging = [STAGING]
 * production or any other environment = no prefix
 */
function b35_environment_title_prefix() {
  $env = isset( $_ENV['ENVIRONMENT'] ) ? $_ENV['ENVIRONMENT'] : '';
  if ( $env === 'local' ) {
    return '[LOCAL] ';
  }
  elseif ( $env === 'staging' ) {
    return '[STAGING] ';
  }
  return '';
}

/**
 * Prepends the environment prefix to an already-built title string.
 *
 * Used for pre_get_document_title, wp_title and admin_title. When the title is
 * empty (e.g. no SEO plugin set pre_get_document_title) it is returned as-is so
 * core keeps building it and b35_environment_title_prefix_frontend() handles it.
 */
function b35_environment_title_prefix_string( $title ) {
  $prefix = b35_environment_title_prefix();
  if ( $prefix && $title !== '' ) {
    $title = $prefix . $title;
  }
  return $title;
}

/**
 * Prepends the environment prefix to the frontend document title parts.
 */
function b35_environment_title_prefix_frontend( $parts ) {
  $prefix = b35_environment_title_prefix();
  if ( $prefix && isset( $parts['title'] ) ) {
    $parts['title'] = $prefix . $parts['title'];
  }
  return $parts;
}
