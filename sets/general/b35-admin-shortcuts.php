<?php
function b35_admin_shortcuts_enqueue_js() {
  wp_enqueue_script (
    'b35-admin-shortcuts',
    plugins_url('b35-admin/sets/general/b35-admin-shortcuts/b35-admin-shortcuts.js')
  );

  wp_localize_script( 'b35-admin-shortcuts', 'b35',
    array(
      'admin_url' => admin_url('admin.php'),
      'ajaxUrl'   => admin_url('admin-ajax.php'),
      'e_shortcut_enabled' => is_singular('post'),
      'edit_post_url' => get_edit_post_link()
    ));
}



function b35_admin_shortcuts_enqueue_modal() {
  if (is_singular('post')) {
    ?>
    <div id="b35-admin-shortcuts-modal" aria-hidden="true" tabindex="-1" style="display:none;position:absolute;background-color:rgba(202, 202, 202, 0.59);place-items:center;top:0;bottom:0;left:0;right:0;">
      <span style="background-color:rgb(247, 247, 247);padding: 15px;border-radius:5px;">LOADING...</span>
    </div>
    <?php
  }
}

add_action('init', 'b35_admin_shortcuts_init');

function b35_admin_shortcuts_init() {
  if (current_user_can("edit_posts")) {
    add_action('wp_enqueue_scripts', 'b35_admin_shortcuts_enqueue_js');
    add_action('wp_footer', 'b35_admin_shortcuts_enqueue_modal');
  }
}
