<?php
/**
 * @package confetti-fall-animation
 * @version 1.3.1
 **/

/*
Plugin Name: Confetti Fall Animation
Plugin URI: https://wpdeveloperr.com/
Description: Add a delightful falling confetti animation to your website. Welcome your visitors on special occasions such as new year, birthdays, festivals, promotions, or any other special events.
Author: WPDeveloperr
Author URI: https://wpdeveloperr.com/
Version: 1.3.1
License: GPLv2 or later
Text Domain: confetti-fall-animation
*/

defined('ABSPATH') or die('Hey, You can\'t access this directly.');

if (!function_exists("add_action")) {
    exit;
}

define("CFA_DIR_URL", plugin_dir_url(__FILE__));
define("CFA_DIR_PATH", plugin_dir_path(__FILE__));
require_once CFA_DIR_PATH . 'inc/popupBackgroundImage.php';
require_once CFA_DIR_PATH . 'inc/confetti_settings.php';

function cfa_enqueue_scripts() {
    wp_enqueue_script("jquery");
    wp_enqueue_script("confetti-js", CFA_DIR_URL . "assets/js/confetti.min.js", array(), null, true);
    wp_enqueue_script("confetti-fall-animation", CFA_DIR_URL . "assets/js/confetti-fall-animation.js", array("jquery", "confetti-js"), null, true);
    
    wp_enqueue_script('confetti-popup-script', CFA_DIR_URL . 'assets/js/popup-plugin.js', array('jquery'), '1.0', true);
    $delayInSeconds = intval(get_option('confetti-popup-delay', 5));
    wp_localize_script('confetti-popup-script', 'delayPopupSettings', array('delayInSeconds' => $delayInSeconds));
    
    wp_enqueue_style('custom-popup-style', CFA_DIR_URL . 'assets/css/popup-plugin.css', array(), '1.0');
}
add_action("wp_enqueue_scripts", "cfa_enqueue_scripts");

function confetti_backend_scripts() {
    wp_enqueue_style('confetti-style', CFA_DIR_URL . 'assets/css/popup-plugin.css', array(), '1.0', 'all');
}
add_action('admin_enqueue_scripts', 'confetti_backend_scripts');

register_activation_hook(__FILE__, 'confetti_popup_activate');
register_deactivation_hook(__FILE__, 'confetti_popup_deactivate');

function confetti_popup_activate() {
    add_option('confetti_welcome_shown', false);
}
function confetti_popup_deactivate() {}

add_action('admin_menu', 'confetti_menu_func');
function confetti_menu_func() {
    add_menu_page('CF Animation', 'CF Animation', 'manage_options', 'confetti-animation', 'confetti_animation_page', 'dashicons-buddicons-community', 50);
    add_submenu_page('confetti-animation', 'Popup Settings', 'Popup Settings', 'manage_options', 'popup-settings', 'render_plugin_background_settings_page');
}

function confetti_animation_page() {
    $confetti_settings = new Confetti_Settings();
    $confetti_settings->confetti_settings_page();
}

add_action('admin_init', 'confetti_popup_settings');
function confetti_popup_settings() {
    add_settings_section('confetti-popup-general', 'General Settings', 'confetti_popup_general_section_callback', 'confetti-animation');
    add_settings_field('confetti-popup-content', 'Add Popup Content', 'confetti_popup_content_callback', 'confetti-animation', 'confetti-popup-general');
    add_settings_field('confetti-popup-pages', 'Select Page to Display Popup', 'confetti_popup_pages_callback', 'confetti-animation', 'confetti-popup-general');
    add_settings_field('confetti-popup-delay', 'Popup Display Time (in seconds)', 'confetti_popup_delay_callback', 'confetti-animation', 'confetti-popup-general');
    
    register_setting('confetti-animation', 'confetti-popup-delay');
    register_setting('confetti-animation', 'confetti-popup-content');
    register_setting('confetti-animation', 'confetti-popup-pages');
}

function confetti_popup_general_section_callback() {
    echo esc_html__('Configure the confetti popup settings.', 'confetti-fall-animation');
}

function confetti_popup_content_callback() {
    $content = get_option('confetti-popup-content', '');
    echo '<textarea name="confetti-popup-content" rows="5" cols="50">' . esc_textarea($content) . '</textarea>';
}

function confetti_popup_display() {
    $content = get_option('confetti-popup-content', '');
    $pages = array_map('intval', (array) get_option('confetti-popup-pages', []));

    if (in_array(get_the_ID(), $pages)) {
        echo '<div id="confetti-popup" style="display: none;">' . esc_html($content) . ' <a id="confetti-popup-close"> <i class="fa fa-close"></i>Close</a></div>';
    }
}
add_action('wp_footer', 'confetti_popup_display');

function confetti_popup_delay_callback() {
    $delay = intval(get_option('confetti-popup-delay', 5));
    echo '<input type="number" name="confetti-popup-delay" value="' . esc_attr($delay) . '" min="1" />';
}

function confetti_welcome_message() {
    if (get_option('confetti_welcome_shown', false)) {
        return;
    }
    echo '<div class="notice notice-success is-dismissible">';
    echo '<p>' . esc_html__('Welcome to Confetti Fall Animation Plugin! Thank you for installing and activating our plugin.', 'confetti-fall-animation') . '</p>';
    echo '</div>';
    update_option('confetti_welcome_shown', true);
}
add_action('admin_notices', 'confetti_welcome_message');

add_action('wp', 'add_confetti_to_homepage');
function add_confetti_to_homepage() {
    if (is_front_page() && get_option('confetti_active')) {
        echo do_shortcode('[confetti-fall-animation delay="1" time="25"]');
    }
}

add_shortcode("confetti-fall-animation", "cfa_html_view_pages");
function cfa_html_view_pages($props) {
    $props = shortcode_atts([
        "delay" => "1",
        "time" => "25"
    ], $props);

    $delay = intval($props["delay"]);
    $time = intval($props["time"]);

    return '<div class="confetti-fall-animation" data-delay="' . esc_attr($delay) . '" data-time="' . esc_attr($time) . '"></div>';
}