<?php

/**
 * @package AutoShadowOnPostImages
 */
/*
Plugin Name: Auto Shadow On Post Images
Plugin URI: https://www.techrbun.com/plugins/autoshadow-on-post-images
Description: Automatically adds a cool shadow effect to the post images.
Version: 2.0.0
Author: Anirban Roy
Author URI: https://www.techrbun.com/author/anirban/
Text Domain: auto-shadow-on-post-images
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

if (!defined('ABSPATH')) {
    die;
}

function auto_shadow_on_post_images_css()
{
    if (is_single()) {
?>
        <style>
            .wp-block-image > figure > img {
                box-shadow: 0 10px 16px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%) !important;
                line-height: 0 !important;
            }
        </style>
<?php
    }
}

add_action('wp_head', 'auto_shadow_on_post_images_css');

function add_custom_meta_links($meta_fields, $file)
{
    if (plugin_basename(__FILE__) == $file) {
        $meta_fields[] = "<a style='color:green;' href='https://www.buymeacoffee.com/anirbanroy2002' target='_blank'>Donate (Buy Me A Coffee)</a>";
    }
    return $meta_fields;
}
add_filter('plugin_row_meta', 'add_custom_meta_links', 10, 2);

function custom_action_links($links, $file)
{
    if (plugin_basename(__FILE__) == $file) {
        $links[] = '<a style="color:green;" href="https://www.buymeacoffee.com/anirbanroy2002" target="_blank">Donate (Buy Me A Coffee)</a>';
    }
    return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'custom_action_links', 10, 2);

?>