<?php

// todo: turn this into a native WP list table: https://premium.wpmudev.org/blog/wordpress-admin-tables/

add_action('wp_footer', 'get_image_sizes');
function get_image_sizes(){
  if (!is_admin()) return;
  global $_wp_additional_image_sizes;
  print '<pre>';
  print_r( $_wp_additional_image_sizes );
  print '</pre>';
};

add_action('wp_dashboard_setup', 'b35_custom_dashboard_widgets');

function b35_custom_dashboard_widgets() {
  global $wp_meta_boxes;

  wp_add_dashboard_widget('b35_image_sizes_widget', 'Image Sizes', 'b35_image_sizes_widget');
}

function b35_image_sizes_widget() {
  ?>
  <style>
    #b35_image_sizes_widget .inside {
      margin: 0;
      padding: 0;
    }
    .b35-table {
      border: none;
      border-collapse: collapse;
      border-spacing: 0;
      font: normal 13px Arial, sans-serif;
    }
    .b35-table thead th {
      background-color: #CCCCCC;
      border: solid 1px #EEEEEE;
      border-top: none;
      color: #333333;
      padding: 10px;
      text-align: center;
      text-shadow: 1px 1px 1px #fff;
    }

    .b35-table thead th:first-child {
      border-left: none;
      text-align: left;
    }

    .b35-table thead th:last-child {
      border-right: none;
    }
    .b35-table tbody td {
      border: solid 1px #EEEEEE;
      color: #333;
      padding: 10px;
      text-shadow: 1px 1px 1px #fff;
      text-align: right;
    }
    .b35-table tbody td:first-child {
      text-align: left;
    }
    .b35-table tbody td:last-child {
      text-align: center;
    }
  </style>
<?php
  print("<table width='100%' class='b35-table'>");
  print("<thead><tr><th>name</th><th>width</th><th>height</th><th>crop</th></tr></thead>");
  foreach (b35_get_all_image_sizes() as $name => $item) {
    print("<tr>
               <td><strong>".$name."</strong></td>
               <td>".$item['width']."px</td>
               <td>".$item['height']."px</td>
               <td>".$item['crop']."</td>
               </tr>");
  }
  print("</table>");
}

/**
 * Get all the registered image sizes along with their dimensions
 *
 * @global array $_wp_additional_image_sizes
 *
 * @link http://core.trac.wordpress.org/ticket/18947 Reference ticket
 *
 * @return array $image_sizes The image sizes
 */
function b35_get_all_image_sizes() {
  global $_wp_additional_image_sizes;

  $default_image_sizes = get_intermediate_image_sizes();

  foreach ( $default_image_sizes as $size ) {
    $image_sizes[ $size ][ 'width' ] = intval( get_option( "{$size}_size_w" ) );
    $image_sizes[ $size ][ 'height' ] = intval( get_option( "{$size}_size_h" ) );
    $image_sizes[ $size ][ 'crop' ] = get_option( "{$size}_crop" ) ? get_option( "{$size}_crop" ) : false;
  }

  if ( isset( $_wp_additional_image_sizes ) && count( $_wp_additional_image_sizes ) ) {
    $image_sizes = array_merge( $image_sizes, $_wp_additional_image_sizes );
  }

  return $image_sizes;
}
