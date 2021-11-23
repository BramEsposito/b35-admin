<?php

/*
 * Alter path to wite root for webp-converter-for-media plugin
 */
add_filter( 'webpc_site_root', function( $path ) {
  // get_home_path() is not available in REST/CLI mode
  return dirname( ABSPATH );
});
