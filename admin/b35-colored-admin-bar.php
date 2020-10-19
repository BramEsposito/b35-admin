<?php

add_action( 'wp_head' , 'set_admin_bar_background_color_per_environment' );
add_action( 'admin_head' , 'set_admin_bar_background_color_per_environment' );

/**
 * Changes the admin bar background color based on the environment
 * local = green
 * staging = orange
 * production or any other environment = red
 */
function set_admin_bar_background_color_per_environment() {
    if  (($_ENV['ENVIRONMENT']) === 'local' ) {
      echo "<style> #wpadminbar {background-color:#2E8B57;}</style>";
    }
    elseif (($_ENV['ENVIRONMENT']) === 'staging' ) {
      echo "<style> #wpadminbar {background-color:#F89C02;}</style>";
    }
    else {
      echo "<style> #wpadminbar {background-color:#F80100;}</style>";
    }
}
