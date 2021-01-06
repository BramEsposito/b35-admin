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

define("B35_PLUGIN_URL", plugins_url()."/b35-admin/");

if (is_admin()) {
  require_once(__DIR__."/inc/AdminManager.php");
  // init UI
  $bam = new AdminManager();
}

$activeTweaksSets = get_option("b35_admin_settings",[]);

foreach ($activeTweaksSets as $key => $set) {
  require_b35($key , $set);
}

function require_b35($path, $b35_includes) {
  $path = preg_replace("/[^\w\-]/",'', $path); // clean strange characters from string
  foreach ( $b35_includes as $file => $active ) {
    $filepath =   __DIR__."/sets/".$path."/b35-". $file.".php";
    if ( ! file_exists($filepath) ) {
      trigger_error( sprintf( 'Error locating '.$filepath.' for inclusion', $file ), E_USER_ERROR );
    }
    require_once $filepath;
  }
}
