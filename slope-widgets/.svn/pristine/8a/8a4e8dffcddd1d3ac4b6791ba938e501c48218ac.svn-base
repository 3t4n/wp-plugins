<?php
/*
* Plugin Name: Slope Widgets
* Description: Aggiungi i widget di Slope al sito web WordPress della tua struttura ricettiva! Questo plugin ti permette di mostrare la barra delle prenotazioni, i pacchetti e le promozioni tramite shortcode personalizzabili.
* Version: 4.2.13
* Author: Slope
* Author URI: https://www.slope.it/
* Text Domain: slope-widgets
* Domain Path: /languages
* License: GPLv2 or later
*/

// We use this constant to invalidate the cache of the plugin's assets
const SLOPE_WIDGETS_CACHE_BUST_VERSION = '4.2.13';

// Initialization
require_once(plugin_dir_path(__FILE__) . 'includes/enums/AbstractEnum.php');
require_once(plugin_dir_path(__FILE__) . 'includes/enums/CardLayout.php');
require_once(plugin_dir_path(__FILE__) . 'includes/enums/FontWeight.php');
require_once(plugin_dir_path(__FILE__) . 'includes/enums/TextAlignment.php');
require_once(plugin_dir_path(__FILE__) . 'includes/settings/PromotionsSettingProvider.php');
require_once(plugin_dir_path(__FILE__) . 'includes/settings/ReservationsSettingsProvider.php');

// Hook
add_action('admin_init', 'slope_init');
add_action('admin_menu', 'slope_add_page');
add_action('admin_menu', 'slope_add_welcome_page');
add_action('admin_enqueue_scripts', 'slope_color_picker');
add_action('admin_enqueue_scripts', 'slope_load_admin');
add_action('init', 'slope_load_js_modules');
add_action('wp_enqueue_scripts', 'slope_load_widgets');
add_action('plugins_loaded', 'slope_load_textdomain');
add_action('plugin_action_links_' . plugin_basename( __FILE__ ), 'slope_action_links' );
add_action('init', 'slope_load_reservations_block');
add_action('activated_plugin', 'slope_welcome_redirect');

function slope_welcome_redirect( $plugin ) {
    if( $plugin == plugin_basename( __FILE__ ) ) {
        wp_redirect( esc_url(admin_url( '/admin.php?page=slope_welcome' )) );
        exit();
    }
}

/**
 * This is the page we show when the plugin is activated
 */
function slope_add_welcome_page() {
    add_submenu_page('admin.php', 'Slope Welcome', 'Slope Welcome', 'read', 'slope_welcome', 'slope_welcome_page');
}

function slope_welcome_page() {
    include(__DIR__ . '/slope-welcome.php');
}

function slope_load_js_modules() {
    wp_enqueue_script(
        'slope_modules_js',
        plugins_url('js/slope-modules.js', __FILE__),
        [],
        SLOPE_WIDGETS_CACHE_BUST_VERSION,
        ['in_footer' => false],
    );

    $scriptOptions = [
        'force_mobile_layout' => ReservationsSettingsProvider::isMobileLayoutForced(),
    ];
    wp_add_inline_script(
        'slope_modules_js',
        'const slpWidgetOptions = ' . wp_json_encode($scriptOptions),
        'before'
    );
}

function slope_color_picker($options) {
    wp_enqueue_style('wp-color-picker', '', [], SLOPE_WIDGETS_CACHE_BUST_VERSION);
    wp_enqueue_script(
        'slope-color-picker',
        plugins_url('js/slope-colorpicker.js', __FILE__),
        ['wp-color-picker'],
        SLOPE_WIDGETS_CACHE_BUST_VERSION,
        ['in_footer' => true],
    );
}

// callback slope-widgets-admin
function slope_load_admin() {
    wp_enqueue_style(
        'slope-admin-css',
        plugins_url('css/slope-admin.css', __FILE__),
        [],
        SLOPE_WIDGETS_CACHE_BUST_VERSION,
    );
    wp_enqueue_script(
        'slope-admin-js',
        plugins_url('js/slope-admin.js', __FILE__),
        [],
        SLOPE_WIDGETS_CACHE_BUST_VERSION,
        ['in_footer' => false],
    );
}

function slope_load_widgets() {
    wp_enqueue_style(
        'slope_widgets_css',
        plugins_url('css/slope-widgets.css', __FILE__),
        [],
        SLOPE_WIDGETS_CACHE_BUST_VERSION,
    );
    wp_enqueue_script(
        'slope_js',
        plugins_url('js/slope-widgets.js', __FILE__),
        ['jquery-ui-core'],
        SLOPE_WIDGETS_CACHE_BUST_VERSION,
        true,
    );
    slope_promotions_style();
    slope_promotions_layout_select();
}

// Register the settings of Slope fields
function slope_init() {
    // Slope reservations
    register_setting('slope_options', 'slope_options', 'slope_reservations_options_validate');
    add_settings_section('reservations_section', '', 'slope_reservations_intro', 'slope_reservations_page');
    add_settings_field('slope_text_color', '', 'slope_reservations_page', 'reservations_section');
    add_settings_field('slope_text_color', '', 'slope_reservations_page', 'reservations_section');

    // Slope promotions
    register_setting('slope_promotions_options', 'slope_promotions_options');
    add_settings_section('promotions_section', '', 'slope_promotions_intro', 'slope_promotions_page');
    add_settings_field('slope_promotions_hide_description', '', 'slope_promotions_page', 'promotions_section');
    add_settings_field('slope_promotions_hide_information', '', 'slope_promotions_page', 'promotions_section');
    add_settings_field('slope_promotions_open_new_tab', '', 'slope_promotions_page', 'promotions_section');
    add_settings_field('slope_promotions_background_color', '',  'slope_promotions_page', 'promotions_section');
    add_settings_field('slope_promotions_text_color', '', 'slope_promotions_page', 'promotions_section');
    add_settings_field('slope_promotions_button_background_color', '', 'slope_promotions_page', 'promotions_section');
    add_settings_field('slope_promotions_button_text_color', '', 'slope_promotions_page', 'promotions_section');
    add_settings_field('slope_promotions_title_color', '', 'slope_promotions_page', 'promotions_section');
    add_settings_field('slope_promotions_border_color', '', 'slope_promotions_page', 'promotions_section');
    add_settings_field('slope_promotions_border_size', '', 'slope_promotions_page', 'promotions_section');
    add_settings_field('slope_promotions_align_title', '', 'slope_promotions_page', 'promotions_section');
    add_settings_field('slope_promotions_title_size', '', 'slope_promotions_page', 'promotions_section');
    add_settings_field('slope_promotions_border_radius', '', 'slope_promotions_page', 'promotions_section');
    add_settings_field('slope_promotions_layout', '', 'slope_promotions_page', 'promotions_section');
}

// Setting of the domain of the translations
function slope_load_textdomain() {
    load_plugin_textdomain('slope-widgets', false, basename(dirname(__FILE__)) . '/languages/');
}

// Adds the entries to the lateral menu
function slope_add_page() {
    // Slug is an alphanumeric string used to identify the page in the menu. Should be unique for this menu page so we use the plugin's main file path.
    $slug = 'slope-widgets/slope-widgets.php';
    add_menu_page(esc_html__('Impostazioni di Slope Widgets', 'slope-widgets'), 'Slope Widgets', 'slope_reservations', $slug, 'slope_reservations_options_page', plugins_url('images/icon.png', __FILE__));
    add_submenu_page($slug, 'Slope Reservations', 'Slope Reservations', 'manage_options', 'slope_reservations', 'slope_reservations_options_page');
    add_submenu_page($slug, 'Slope Promotions', 'Slope Promotions', 'manage_options', 'slope_promotions', 'slope_promotions_options_page');
}

// Add the settings link on the plugin listing page.
function slope_action_links($links) {
    return array_merge(
        [
            '<a href="' . esc_url( admin_url( '/admin.php?page=slope_reservations' ) ) . '">' . __( 'Impostazioni', 'slope-widgets' ) . '</a>'
        ],
        $links
    );
}

function slope_load_reservations_block() {
    wp_register_script(
        'slope-reservations-block',
        plugins_url( 'js/slope-reservations-block.js', __FILE__ ),
        ['wp-blocks', 'wp-element'],
        SLOPE_WIDGETS_CACHE_BUST_VERSION,
        ['in_footer' => false],
    );

    global $wp_version;

    if (version_compare($wp_version, '5', '>=')) {
        register_block_type( 'slope-plugins/slope-reservations', array(
            'editor_script' => 'slope-reservations-block',
        ) );
    }
}

//include plugin reservations functionalities
include("slope-reservations.php");

//include plugin promotions functionalities
include("slope-promotions.php");
