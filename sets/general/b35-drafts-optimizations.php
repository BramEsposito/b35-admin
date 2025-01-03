<?php

function b35_drafts_optimizations_add_admin_styles()
{
  echo <<<'STYLE'
<style>
.striped> tbody#the-list > tr:nth-child(odd).status-draft {
    background-color: #f5ece9;
}
.striped> tbody#the-list > tr:nth-child(even).status-draft {
    background-color: #fff9f6; 
}
.striped> tbody#the-list > tr.status-draft .post-state {
    color: red;
}
/* CSS for wp admin bar */
#wpadminbar:not(.mobile) .ab-top-menu > li#wp-admin-bar-b35_drafts_optimizations:hover > .ab-item {
    background: inherit;
}
#wp-admin-bar-b35_drafts_optimizations .drafts-count.count-0 {
    opacity: .5;
}
#wp-admin-bar-b35_drafts_optimizations .ab-item {
    padding: 0;
}
#wp-admin-bar-b35_drafts_optimizations .drafts-count:not(.count-0) {
    display: inline-block;
    background-color: #d63638;
    color: #fff;
    padding: 0 8px;
}
#wpadminbar:not(.mobile) .ab-top-menu > li#wp-admin-bar-b35_drafts_optimizations:hover > .ab-item .drafts-count:not(.count-0) {
    background-color: #700202;
}
#wp-admin-bar-b35_drafts_optimizations .ab-icon:before {
    content: '\f109';
    top: 4px;
}
#wp-admin-bar-b35_drafts_optimizations .ab-icon.red:before {
    color: white;
}
@media screen and (max-width: 782px) {
    #wp-admin-bar-b35_drafts_optimizations .drafts-count:not(.count-0) {
        border-radius: 0;
    }
    #wpadminbar li#wp-admin-bar-b35_drafts_optimizations {
      display: block;
    }
}
</style>
STYLE;
}

add_action('admin_head', 'b35_drafts_optimizations_add_admin_styles');
add_action('wp_head', 'b35_drafts_optimizations_add_admin_styles');

function b35_drafts_optimizations_add_toolbar() {
  global $wp_admin_bar;

  $args = array(
    'post_type' => 'post',
    'post_status' => array( 'draft' )
  );
  $query = new WP_Query( $args );
  $count = count( $query->get_posts() );
  $title = '<span class="ab-label" aria-hidden="true">'.number_format_i18n( $count ).' '.__("Drafts","b35-admin").'</span>';

  $wp_admin_bar->add_node(
    array(
      'id'    => 'b35_drafts_optimizations',
      'title' => '<span class="drafts-count count-' . $count . '"><span class="ab-icon'.$red.'"></span>' . $title.'</span>',
      'href'  => admin_url( 'edit.php?post_status=draft&post_type=post' ),
    )
  );
}

add_action( 'wp_loaded', function() {
  add_action('admin_bar_menu', 'b35_drafts_optimizations_add_toolbar', 100);
});
