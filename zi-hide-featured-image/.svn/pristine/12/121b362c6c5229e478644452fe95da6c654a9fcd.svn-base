<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.zeninvader.com/
 * @since             1.0.0
 * @package           Zi_Hide_Featured_Image
 *
 * @wordpress-plugin
 * Plugin Name:       ZI Hide Featured Image
 * Plugin URI:        https://www.zeninvader.com/hide-featured-image-wordpress/
 * Description:       Hide featured image for each post and page.
 * Version:           1.0.0
 * Author:            Zen Invader
 * Author URI:        https://www.zeninvader.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       zi-hide-featured-image
 * Domain Path:       /languages
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('ZI_HIDE_FEATURED_IMAGE_VERSION', '1.0.0');

add_action('enqueue_block_editor_assets', 'zi_hide_featured_image_assets');

function zi_hide_featured_image_assets()
{
    // Enqueue plugin's script
    wp_enqueue_script(
        'zi-hide-featured-image-js',
        esc_url(plugins_url('/js/zi-hide-featured-image.js', __FILE__)),
        array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'),
        '1.0.0',
        true // Enqueue the script in the footer.
    );
}

function zi_hide_featured_image_meta()
{
    register_meta('post', 'disable_featured_image', array(
        'show_in_rest' => true,
        'single' => true,
        'type' => 'boolean',
    ));
}

add_action('init', 'zi_hide_featured_image_meta');

add_filter('post_thumbnail_html', 'zi_hide_featured_image_html', 10, 3);

function zi_hide_featured_image_html($html, $post_id)
{
    $disable_featured_image = get_post_meta($post_id, 'disable_featured_image', true);
    if (is_singular() && has_post_thumbnail() && ($disable_featured_image == '')) {

        return $html;
    } else if (is_singular() && has_post_thumbnail() && ($disable_featured_image == 1)) {
        return '';
    }
}

// when Gutenberg it is not used
function zi_hide_featured_image_settings($content, $post_id)
{
    $field_id    = 'ea_featured_image_display';
    $field_value = esc_attr(get_post_meta($post_id, $field_id, true));
    $field_text  = esc_html__('Hide featured image', 'zinv');
    $help_text  =  '<br /><em>If checked, the featured image will not show up on single post page.</em>';
    $field_state = checked($field_value, 1, false);
    $field_label = sprintf(
        '<p><label for="%1$s"><input type="checkbox" name="%1$s" id="%1$s" value="%2$s" %3$s> %4$s</label>%5$s</p>',
        $field_id,
        $field_value,
        $field_state,
        $field_text,
        $help_text
    );
    return $content .= $field_label;
}

add_filter('admin_post_thumbnail_html', 'zi_hide_featured_image_settings', 10, 2);

function zi_hide_featured_image_save_settings($post_ID, $post, $update)
{
    $field_id    = 'ea_featured_image_display';
    $field_value = isset($_REQUEST[$field_id]) ? 1 : 0;
    update_post_meta($post_ID, $field_id, $field_value);
}

add_action('save_post', 'zi_hide_featured_image_save_settings', 10, 3);

add_filter('post_thumbnail_html', 'zi_hide_featured_image_noguten', 10, 3);

function zi_hide_featured_image_noguten($html, $post_id)
{
    $show = get_post_meta($post_id, 'ea_featured_image_display', true);
    if (is_singular() && has_post_thumbnail() && $show) {

        return '';
    } else if (is_singular() && has_post_thumbnail() && ($show == 0)) {
        return $html;
    }
}

// for single Woo product page
add_filter('woocommerce_single_product_image_thumbnail_html', 'zi_hide_featured_image_woo', 10, 2);
function zi_hide_featured_image_woo($html, $attachment_id)
{
    global $post;
    $featured_image = get_post_thumbnail_id($post->ID);
    $show = get_post_meta($post->ID, 'ea_featured_image_display', true);
    if (($attachment_id == $featured_image) && $show)
        $html = '';
    return $html;
}
