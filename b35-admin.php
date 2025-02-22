<?php
/*
Plugin Name: B35 Admin Customizations
Plugin URI: http://bramesposito.com
Description: Customize admin with regularly required features
Author: Bram Esposito
Author URI: http://bramesposito.com
Version: 2.19
Text Domain: b35-admin
License: MIT License
*/

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

define("B35_PLUGIN_URL", plugins_url()."/b35-admin/");

if (is_admin()) {
  require_once(__DIR__."/inc/AdminManager.php");
  // init UI
  $bam = new AdminManager();
}

$activeTweaksSets = get_option("b35_admin_settings",[]);

function b35HandleError($errno, $errstring, $errfile, $errline) {
  if (error_reporting() & $errno) {
    // TODO: show notification in WordPress Admin UI that settings should be reviewed
  }
  return true;
}
// Set error handler to our custom handler
set_error_handler('b35HandleError');

foreach ($activeTweaksSets as $key => $set) {
  require_b35($key , $set);
}

function require_b35($path, $b35_includes) {
  $path = preg_replace("/[^\w\-]/",'', $path); // clean strange characters from string
  foreach ( $b35_includes as $file => $active ) {
    $filepath =   __DIR__."/sets/".$path."/b35-". $file.".php";
    if ( ! file_exists($filepath) ) {
      trigger_error( sprintf( 'Error locating '.$filepath.' for inclusion', $file ), E_USER_WARNING );
    } else {
      require_once $filepath;
    }
  }
}
