<?php

function b35_add_reusable_blocks_admin_menu() {
  add_menu_page( 'Reusable Blocks', 'Reusable Blocks', 'edit_posts', 'edit.php?post_type=wp_block', '', 'dashicons-editor-table', 22 );
}

add_action( 'admin_menu', 'b35_add_reusable_blocks_admin_menu' );
