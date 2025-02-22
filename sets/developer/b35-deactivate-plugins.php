<?php

add_action('init', 'b35_deactivate_plugins');

function b35_deactivate_plugins() {
  $f = __FILE__;
  $p = plugin_basename( __FILE__ );
  if (b35_isProduction()) return;
  $plugins = [
    "complianz-gdpr/complianz-gpdr.php",
    "wp-rocket/wp-rocket.php",
    "woocommerce-zapier/woocommerce-zapier.php",
    "wordpress-seo/wp-seo.php",
    "wp-mail-smtp/wp_mail_smtp.php",
  ];
  deactivate_plugins( $plugins , true);
}



if (!function_exists('b35_isProduction')) {
  function b35_isProduction() {
    if (defined('WP_ENV')) {
      return (WP_ENV == "production");
    }
    return $_SERVER['SERVER_ADDR'] != "127.0.0.1";
  }
}
