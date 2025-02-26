<?php
/**
 * Plugin Name: Brozzme Material Loading
 * Plugin URI: https://brozzme.com/material-loading/
 * Description: Add a material design like loading bar with PACE.js
 * Version: 1.1
 * Author: Benoti
 * Author URI: https://brozzme.com
 * Project: http://github.hubspot.com/pace/docs/welcome/
 */

defined( 'ABSPATH' ) OR exit;

(@__DIR__ == '__DIR__') && define('__DIR__', realpath(dirname(__FILE__)));

register_activation_hook(   __FILE__, 'brozzme_material_loading_activation' );
register_deactivation_hook( __FILE__, 'brozzme_material_loading_deactivation' );
register_uninstall_hook(    __DIR__ .'/uninstall.php', 'brozzme_material_loading_plugin_uninstall' );

require_once(__DIR__ . '/includes/brozzme_material_loading_settings.php');
require_once(__DIR__ . '/includes/brozzme_pace_theme.php');

function brozzme_material_loading_activation(){

    if(!get_option('b_material_general_settings')) {

        //not present, so add
        $options = array(
            'bml_enable'            => 'true', // set to 1 to enable plugin
            'bml_homepage_color'    => '#29d',
            'bml_color'             => '#29d',
            'bml_height'            => '3',
            'bml_template'          => 'minimal',
            'bml_always_show_bar'   =>'false'
             );

        add_option('b_material_general_settings', $options);

    }

}

function brozzme_material_loading_deactivation(){
    $option_names =  array(
        'b_material_general_settings'
    );
    foreach($option_names as $option_name) {
        // delete_option($option_name);
    }
}

add_action( 'admin_menu', 'brozzme_material_loading_add_admin_menu' );

function brozzme_material_loading_add_admin_menu(  ) {

    add_options_page('Material Bar', __('Material loading', 'brozzme-material-loading'), 'manage_options', 'brozzme-material-loading', 'bml_options_page');

}

add_action('wp_enqueue_scripts', 'brozzme_material_loading_scripts', 9999);

function brozzme_material_loading_scripts(){

    wp_enqueue_style('bm-loading', plugins_url( '/css/style.css', __FILE__ ), array(), false, false);
    wp_register_script(
        'bm-loading-script',
        plugins_url( '/js/pace.min.js', __FILE__ ),
        array(),
        '1.0.2'
    );

    wp_enqueue_script( 'bm-loading-script' );
}

// admin color picker
add_action( 'admin_enqueue_scripts', 'brozzme_material_loading_add_color_picker' );
function brozzme_material_loading_add_color_picker( $hook ) {

    if( is_admin() ) {

        wp_enqueue_style( 'wp-color-picker' );

        wp_enqueue_script( 'color-picker-custom',
            plugins_url( 'js/color-picker-custom.js', __FILE__ ),
            array( 'wp-color-picker' ),
            false,
            true );
        
    }
}

add_action( 'plugins_loaded', 'bml_load_textdomain' );

function bml_load_textdomain() {
    load_plugin_textdomain( 'brozzme-material-loading', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

add_filter('plugin_action_links', 'brozzme_material_loading_plugin_action_links', 10, 2);

function brozzme_material_loading_plugin_action_links($links, $file) {
    static $this_plugin;

    if (!$this_plugin) {
        $this_plugin = plugin_basename(__FILE__);
    }

    if ($file == $this_plugin) {
        $settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=brozzme-material-loading">'.__('Settings', 'brozzme-material-loading').'</a>';
        array_unshift($links, $settings_link);
    }

    return $links;
}

$bcn_options = get_option('b_material_general_settings');
if($bcn_options['bml_enable'] == 'false' && !is_admin()){
    return;
}

add_action('wp_head', 'bml_pace_styles');

function bml_pace_styles(){
    bml_pace_theme_loader();
}


