<?php

function b35_animate_css() {
  wp_enqueue_style( 'animate-css', "https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css");
}
add_action( 'wp_enqueue_scripts', 'b35_animate_css' );
