<?php

/*
 * Alter path to site root for webp-converter-for-media plugin
 */
add_filter( 'webpc_site_root', function( $path ) {
  // get_home_path() is not available in REST/CLI mode
  return dirname( ABSPATH );
});

/*
 * Alter url to upload directory for webp-converter-for-media plugin
 */
add_filter( 'webpc_dir_url',  function($path) {
  $uploaddir = wp_upload_dir();
  return $uploaddir['baseurl'];
});

/*
 * Alter path to upload directory for webp-converter-for-media plugin
 */
add_filter( 'webpc_dir_path',  function($path) {
  return realpath(WP_CONTENT_DIR."/uploads-webpc");
});
