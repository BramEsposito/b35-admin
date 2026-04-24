# b35-admin

WordPress admin plugin for recurrent functionality


### How to add using Composer:

Add this to the repositories section of your composer.json:

```
{
    "type": "vcs",
    "url": "git@github.com:BramEsposito/b35-admin.git"
},
```


Install with:
```
composer require bramesposito/b35-admin
```


#### v2 

Add UI for enabling and disabling tweaks

#### v1

Very simple Proof of Concept

---

## Tweaks

### General tweaks

| Key | Title | Description |
|-----|-------|-------------|
| `disable-author-pages` | Disable author pages | WordPress generates pages for every user with a summary of the content they generated. Check this option to remove and disable these pages. |
| `disable-comments` | Disable comments | Disable WordPress' comments system. |
| `disable-default-post` | Disable default post | Disable the default post type in WordPress. You'd preferably define your own custom post types to avoid hassles with use-front. |
| `smooth-anchor-scroll` | Scroll smoothly to anchor | Scroll smoothly to anchors in page. |
| `animate` | Add Animate CSS | Enqueues Animate.css from CDN. See https://animate.style/ |
| `hide-page-title` | Hide Page/Post title | Hide page title on pages and posts. Configure in the post editor sidebar. |
| `drafts-optimizations` | Add Draft Posts optimizations | Adds a light-red background color to the draft posts in the posts overview list. |
| `admin-shortcuts` | Press "e" to edit current post | Adds a keyboard shortcut that allows you to go to the post edit screen for the post you are currently looking at. |
| `themed-login` | Themed login page | Applies the site's branding (logo, fonts, colors) to the WordPress login screen. Requires a custom logo set in Appearance → Customize → Site Identity. |

### Developer tweaks

| Key | Title | Description |
|-----|-------|-------------|
| `colored-admin-bar` | Colored admin bar | Colors the admin bar per environment. |
| `image-sizes-widget` | Image sizes widget | Shows registered image sizes in the dashboard. |
| `webp-converter-for-media` | Webp Converter plugin fix | Enables the usage of the Webp Converter for Media plugin on a Composer setup. |
| `filter-doing-it-wrong` | Filter _load_textdomain_just_in_time errors | Filters error messages that flood the error logs. |
| `deactivate-plugins` | Deactivate plugins | Deactivate plugins on STAGING. |
| `formatters` | Add Formatting functions | Formatting functions for amounts in Euro's, percentages and arrays to html lists. |

### Block Editor tweaks

| Key | Title | Description |
|-----|-------|-------------|
| `disable-fullscreen-editor` | Disable fullscreen editor | Disables the fullscreen mode in the block editor by default. |
| `wide-blocks` | Allow blocks to be wide | Lets you set the blocks width in the Blocks editor and on the frontend. Compatible with the Twenty-twenty-one theme. |
| `reusable-blocks-menu` | Show reusable blocks in left menu | Shows the reusable blocks in a navigation in the left menu. |
| `word-count` | Add a word counter to paragraph blocks | Adds a counter to the paragraph block that turns yellow when the block is longer than 300 words. |
