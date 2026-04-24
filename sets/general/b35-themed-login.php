<?php

add_action( 'login_enqueue_scripts', 'b35_themed_login_styles' );
function b35_themed_login_styles() {
  $logo_id  = get_theme_mod( 'custom_logo' );
  $logo_url = $logo_id ? wp_get_attachment_image_url( $logo_id, 'full' ) : '';
  $font_url = 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap';

  wp_enqueue_style( 'b35-themed-login-fonts', $font_url, [], null );

  $logo_css = $logo_url ? "
    body.login #login h1 a {
      background-image: url('{$logo_url}');
      background-size: contain;
      background-repeat: no-repeat;
      background-position: center;
      width: 120px;
      height: 60px;
    }" : '';

  wp_add_inline_style( 'b35-themed-login-fonts', "
    body.login {
      background: #f5f5f5;
      font-family: 'Inter', sans-serif;
    }
    {$logo_css}
    body.login .login-action-login h1 a {
      pointer-events: none;
    }
    body.login #loginform,
    body.login #lostpasswordform,
    body.login #registerform {
      border-radius: 6px;
      box-shadow: 0 2px 12px rgba(0,0,0,.08);
    }
    body.login #wp-submit {
      background: #1a1a1a;
      border-color: #1a1a1a;
      border-radius: 4px;
      box-shadow: none;
      text-shadow: none;
    }
    body.login #wp-submit:hover {
      background: #333;
      border-color: #333;
    }
  " );
}

add_filter( 'login_headerurl', 'b35_themed_login_logo_url' );
function b35_themed_login_logo_url() {
  return home_url( '/' );
}

add_filter( 'login_headertext', 'b35_themed_login_logo_title' );
function b35_themed_login_logo_title() {
  return get_bloginfo( 'name' );
}
