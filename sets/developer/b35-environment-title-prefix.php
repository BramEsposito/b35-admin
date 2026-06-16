<?php

// Admin page titles: template_redirect doesn't run in wp-admin, so hook directly.
add_filter( 'admin_title', 'b35_environment_title_prefix_string', 99 );

// Frontend titles are registered late, on purpose. SEO plugins such as The SEO
// Framework call remove_all_filters( 'pre_get_document_title' ) and
// remove_all_filters( 'wp_title' ) on template_redirect (priority 20) and then
// add their own title callbacks. Any filter we add at plugin load is stripped
// there. Registering on template_redirect at priority 21 re-adds ours after the
// plugin has set up; the high filter priority (99) then runs our callback after
// the plugin's (which uses priority 9/10), so we prepend to the final title.
add_action( 'template_redirect', 'b35_environment_title_prefix_register_frontend', 21 );

function b35_environment_title_prefix_register_frontend() {
  add_filter( 'pre_get_document_title', 'b35_environment_title_prefix_string', 99 );
  add_filter( 'document_title_parts', 'b35_environment_title_prefix_parts', 99 );
  add_filter( 'wp_title', 'b35_environment_title_prefix_string', 99 );
}

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
 * empty (e.g. no plugin set pre_get_document_title) it is returned unchanged so
 * core keeps building it and b35_environment_title_prefix_parts() handles it.
 */
function b35_environment_title_prefix_string( $title ) {
  $prefix = b35_environment_title_prefix();
  if ( $prefix && $title !== '' ) {
    $title = $prefix . $title;
  }
  return $title;
}

/**
 * Prepends the environment prefix to the core document title parts (used when no
 * plugin short-circuits pre_get_document_title).
 */
function b35_environment_title_prefix_parts( $parts ) {
  $prefix = b35_environment_title_prefix();
  if ( $prefix && isset( $parts['title'] ) ) {
    $parts['title'] = $prefix . $parts['title'];
  }
  return $parts;
}
