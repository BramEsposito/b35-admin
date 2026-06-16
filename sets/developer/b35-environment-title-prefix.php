<?php

add_filter( 'document_title_parts', 'b35_environment_title_prefix_frontend' );
add_filter( 'admin_title', 'b35_environment_title_prefix_admin', 10, 2 );

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
 * Prepends the environment prefix to the frontend document title.
 */
function b35_environment_title_prefix_frontend( $parts ) {
  $prefix = b35_environment_title_prefix();
  if ( $prefix && isset( $parts['title'] ) ) {
    $parts['title'] = $prefix . $parts['title'];
  }
  return $parts;
}

/**
 * Prepends the environment prefix to the admin page title.
 */
function b35_environment_title_prefix_admin( $admin_title, $title ) {
  $prefix = b35_environment_title_prefix();
  if ( $prefix ) {
    $admin_title = $prefix . $admin_title;
  }
  return $admin_title;
}
