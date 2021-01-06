<?php
/**
 * Register support for Gutenberg wide images in your theme
 */
function b35_theme_setup() {
  add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'b35_theme_setup' );
