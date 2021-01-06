<?php
/*
 * List of tweaks sets.
 * Only use a-z0-9-_ in the list key
 * the key of the list is also the subdirectory that contains the included files
 */
$sets = [
  'general' => ['title' => __("General tweaks", "b35-admin")],
  'developer' => ['title' => __("Developer tweaks", "b35-admin")],
];

$general_list = [
  "disable-author-pages" => [
    "title" => __("Disable author pages", "b35-admin"),
    "description" => __("WordPress generates pages for every user with a summary 
    of the content they generated. Check this option to remove and disable these pages.", "b35-admin")
  ],
  "disable-comments" => [
    "title" => __("Disable comments", "b35-admin"),
    "description" => __("Disable WordPress' comments system.", "b35-admin")
  ],
  "disable-default-post" => [
    "title" => __("Disable default post", "b35-admin"),
    "description" => __("Disable the default post type in Wordpress. You'd 
    preferably define your own custom post types to avoid hassles with use-front", "b35-admin")
  ],
  "wide-blocks" => [
    "title" => __("Allow blocks to be wide", "b35-admin"),
    "description" => __("Let's you set the blocks width in the Blocks editor and on the frontend. Compatible with the Twenty-twenty-one theme", "b35-admin")
  ],
  "smooth-anchor-scroll" => [
    "title" => __("Scroll smoothly to anchor", "b35-admin"),
    "description" => __("Scroll smoothly to anchors in page", "b35-admin")
  ]
];

$developer_list = [
  "colored-admin-bar" => [
    "title" => "colored admin bar"
  ],
  "image-sizes-widget" => [
    "title" => "image sizes widget"
  ],
  "disable-fullscreen-editor" => [
    "title" => "disable fullscreen editor"
  ]
];
