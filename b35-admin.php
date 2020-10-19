<?php
/*
Plugin Name: B35 Admin Customizations
Plugin URI: http://bramesposito.com
Description: Customize admin with regularly required features
Author: Bram Esposito
Author URI: http://bramesposito.com
Version: 0.1
Text Domain: b35-admin
License: MIT License
*/

require_b35([
  "disable-author-pages",
  "disable-comments",
  "disable-default-post",
]);

require_admin_b35([
  "colored-admin-bar",
  "image-sizes-widget"
]);

function require_b35($b35_includes) {
  foreach ( $b35_includes as $file ) {
    $filepath =   __DIR__."/inc/b35-". $file.".php";
    if ( ! file_exists($filepath) ) {
      trigger_error( sprintf( 'Error locating inc/b35-%s.php for inclusion', $file ), E_USER_ERROR );
    }
    require_once $filepath;
  }
}

function require_admin_b35($admin_includes) {
  foreach ( $admin_includes as $file ) {
    $filepath =   __DIR__."/admin/b35-". $file.".php";
    if ( ! file_exists($filepath) ) {
      trigger_error( sprintf( 'Error locating inc/b35-%s.php for inclusion', $file ), E_USER_ERROR );
    }
    require_once $filepath;
  }
}
