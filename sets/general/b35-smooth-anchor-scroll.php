<?php

function b35_smooth_anchor_scroll() {
  wp_enqueue_script( 'wp-smooth-anchor-scroll', B35_PLUGIN_URL ."js/b35-smooth-anchor-scroll.js");
}
add_action( 'wp_enqueue_scripts', 'b35_smooth_anchor_scroll' );
