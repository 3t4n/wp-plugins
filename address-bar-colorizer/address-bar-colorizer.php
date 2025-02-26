<?php
/*
 * Plugin Name: Address Bar Colorizer
 * Plugin URI: https://wordpress.org/plugins/address-bar-colorizer/
 * Description: Sets color for each post (or sitewide) of website to colorize address bar of Google Chrome web browser on mobile.
 * Version: 1.3
 * Requires at least: 4.7
 * Requires PHP:      7.0
 * Author: Paritosh Bhatia
 * Author URI: https://paritoshbh.me
 * License:     GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 */

/**
 * Exit if plugin file is accessed directly
 */
if (!defined('ABSPATH')) exit;

/**
 * Register meta box for post editor.
 */
function address_bar_colorizer_register_meta_boxes()
{
    add_meta_box('address-bar-colorizer-meta-box', 'Address Bar Colorizer',
        'address_bar_colorizer_meta_box_callback', 'post', 'side');
}

add_action('add_meta_boxes', 'address_bar_colorizer_register_meta_boxes');

/**
 * Meta box display callback.
 */
function address_bar_colorizer_meta_box_callback($post)
{
    // Don't forget to include nonces!
    $postColorCode = get_post_meta($post->ID, 'address-bar-colorizer', true);
    echo '<input type="text" name="address-bar-colorizer-post-color" value="' . $postColorCode . '"
    class="address-bar-colorizer-color-field"/>';
}

/**
 * Save post color code.
 * @param int $post_id Post ID
 */
function address_bar_colorizer_save_post_color($post_id)
{
    // Don't forget to include nonce checks!
    if (isset($_POST['address-bar-colorizer-post-color'])) {
        $postColorCode = $_POST['address-bar-colorizer-post-color'];
        if (check_color($postColorCode)) {
            // Update post meta with selected color
            update_post_meta($post_id, 'address-bar-colorizer', $postColorCode);
        }
    }
}

add_action('wp_insert_post', 'address_bar_colorizer_save_post_color');

/**
 * Creates plugin settings menu
 */
function address_bar_colorizer_menu()
{
    // Creates new sub-level menu
    add_submenu_page('options-general.php', 'Customizer Address Bar Colorizer', 'Address Bar Colorizer', 'administrator',
        'address-bar-colorizer-settings', 'address_bar_colorizer_settings_page');

    // Call register settings function
    add_action('admin_init', 'address_bar_colorizer_menu_register_settings');
}

add_action('admin_menu', 'address_bar_colorizer_menu');

/**
 * Caller function for settings html page
 */
function address_bar_colorizer_settings_page()
{
    include 'settings.html';
}

/**
 * Register settings for plugin
 */
function address_bar_colorizer_menu_register_settings()
{
    register_setting('address-bar-colorizer-settings-group', 'address-bar-colorizer-default-color', 'validate_color');
    register_setting('address-bar-colorizer-settings-group', 'address-bar-colorizer-sitewide-enabled');
}

/**
 * Include color picker for settings page and post editor
 */
function address_bar_colorizer_color_picker($hook_suffix)
{
    // Load the color picker script only on setting page and post page
    if ($hook_suffix === 'post.php' || $hook_suffix === 'settings_page_address-bar-colorizer-settings') {
      wp_enqueue_style('wp-color-picker');
      wp_enqueue_script('address-bar-colorizer-script', plugins_url('color-picker-helper.js', __FILE__),
          array('wp-color-picker'), false, true);
    }
}

add_action('admin_enqueue_scripts', 'address_bar_colorizer_color_picker');

/**
 * Validate color selected by user from settings page
 */
function validate_color($colorCode)
{
    if (check_color($colorCode)) {
        // Return color code entered by user
        return $colorCode;
    } else {
        // Throw an error message and revert to previous colour selected by user
        add_settings_error('address-bar-colorizer-settings-group', 'address-bar-colorizer',
            'Invalid value entered. Please enter a valid 6 digit hexa code.', 'error');
        return get_option('address-bar-colorizer-default-color');
    }
}

/**
 * Checks if value is a valid 6 digit HEX color.
 */
function check_color($value)
{
    if (preg_match('/^#[a-f0-9]{6}$/i', $value)) {
        return true;
    }
    return false;
}

/**
 * Add meta to head of website.
 */
function address_bar_colorizer_add_meta_head()
{
    $sitewideColorEnabled = get_option('address-bar-colorizer-sitewide-enabled');

    if ($sitewideColorEnabled == 1) {
        // Sitewide color is enabled. Override every other setting
        $defaultColorCode = get_option('address-bar-colorizer-default-color');

        if ($defaultColorCode == '') {
            // This indicates plugin isn't initialized for homepage
            // Do nothing. Output nothing to header
            return;
        } else {
            $output = '<meta name="theme-color" content="' . $defaultColorCode . '">';
        }
    } else {
        // Respect individual post color codes
        if (is_front_page()) {
            // Output homepage color
            $defaultColorCode = get_option('address-bar-colorizer-default-color');

            if ($defaultColorCode == '') {
                // This indicates plugin isn't initialized for homepage
                // Do nothing. Output nothing to header
                return;
            } else {
                $output = '<meta name="theme-color" content="' . $defaultColorCode . '">';
            }
        } else if (is_single()) {
            // Output single post color
            $postColorCode = get_post_meta(get_the_ID(), 'address-bar-colorizer', true);

            if ($postColorCode == '') {
                // This indicates plugin isn't initialized for current post
                // Do nothing. Output nothing to header
                return;
            } else {
                $output = '<meta name="theme-color" content="' . $postColorCode . '">';
            }
        } else {
            return;
        }
    }

//    // For debugging purpose only
//    $startPluginComment = "\n\n<!-- START ADDRESS BAR COLORIZER -->\n\n";
//    $endPluginComment = "\n\n<!-- END ADDRESS BAR COLORIZER -->\n\n\n";
//
//    echo $startPluginComment . $output . $endPluginComment;
    echo $output;
}

add_action('wp_head', 'address_bar_colorizer_add_meta_head');
