<?php
/*
 * List of tweaks sets.
 * Only use a-z0-9-_ in the list key
 * the key of the list is also the subdirectory that contains the included files
 */
$sets = [
  'general' => ['title' => __("General tweaks", "b35-admin")],
  'developer' => ['title' => __("Developer tweaks", "b35-admin")],
  'block_editor' => ['title' => __("Block Editor tweaks", "b35-admin")],
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
  "smooth-anchor-scroll" => [
    "title" => __("Scroll smoothly to anchor", "b35-admin"),
    "description" => __("Scroll smoothly to anchors in page", "b35-admin")
  ],
  "animate" => [
    "title" => __("Add Animate CSS", "b35-admin"),
    "description" => __("See https://animate.style/", "b35-admin")
  ],
  "hide-page-title" => [
    "title" => __("Hide Page/Post title", "b35-admin"),
    "description" => __("Hide page title on pages and posts. Configure in the post editor sidebar.", "b35-admin")
  ],
  "drafts-optimizations" => [
    "title" => __("Add Draft Posts optimizations", "b35-admin"),
    "description" => __("Adds a light-red background color to the draft posts in the posts overview list.", "b35-admin")
  ],
  "admin-shortcuts" => [
    "title" => __("Press \"e\" to edit current post", "b35-admin"),
    "description" => __("Adds a keyboard shortcut that allows you to go to the post edit screen "
                        ."for the post you are currently looking at", "b35-admin")
  ]
];

$developer_list = [
  "colored-admin-bar" => [
    "title" => "Colored admin bar",
    "description" => __("todo", "b35-admin")
  ],
  "image-sizes-widget" => [
    "title" => "Image sizes widget",
    "description" => __("todo", "b35-admin")
  ],
  "webp-converter-for-media" => [
    "title" => "Webp Converter plugin fix",
    "description" => __("This enables the usage of the Webp Converter for Media plugin on a Composer setup.", "b35-admin")
  ],
  "filter-doing-it-wrong" => [
    "title" => "Filter error messages related to _load_textdomain_just_in_time",
    "description" => __("These flood the error logs.", "b35-admin")
  ],
  "deactivate-plugins" => [
    "title" => "Deactivate plugins",
    "description" => __("deactivate plugins on STAGING.", "b35-admin")
  ]
];

$block_editor_list = [
  "disable-fullscreen-editor" => [
    "title" => "Disable fullscreen editor",
    "description" => __("todo", "b35-admin")
  ],
  "wide-blocks" => [
    "title" => __("Allow blocks to be wide", "b35-admin"),
    "description" => __("Lets you set the blocks width in the Blocks editor and on the frontend. Compatible with the Twenty-twenty-one theme", "b35-admin")
  ],
  "reusable-blocks-menu" => [
    "title" => __("Show the reusable blocks in a navigation in the left menu", "b35-admin"),
    "description" => __("todo", "b35-admin")
  ],
  "word-count" => [
    "title" => __("Add a word counter to paragraph blocks", "b35-admin"),
    "description" => __("Adds a counter to the paragraph block that turns yellow when the block is longer than 300 words", "b35-admin")
  ]
];
