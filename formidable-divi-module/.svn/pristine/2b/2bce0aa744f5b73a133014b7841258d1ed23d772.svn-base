<?php
/*
Plugin Name: Formidable Divi Form
Plugin URI:  https://wordpress.org/plugins/formidable-divi-module
Description: This plugin adds Formidable form module to Divi Page Builder
Version:     1.0.0
Author:      Manish Shah
Author URI:  https://www.upwork.com/freelancers/~013a589a88ef521d63
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: formidable-divi-module
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


if ( ! function_exists( 'fdm_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function fdm_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/DiviFormidableModules.php';
}
add_action( 'divi_extensions_init', 'fdm_initialize_extension' );


function fdm_enqueue_custom_style() {
    wp_register_style( 'fdm_insert_custom_style', plugins_url( '/assets/style.css', __FILE__ ), array(), '1.0.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'fdm_enqueue_custom_style' );


register_activation_hook(__FILE__, 'check_divi_formidable_plugin');


function check_divi_formidable_plugin() {
    // Check if Divi theme is activated
    $current_theme = wp_get_theme();
    
    
    if ($current_theme->get('Name') != "Divi") {
        if($current_theme->parent() && $current_theme->parent() == "Divi") {
            //
        }else{
            deactivate_plugins(plugin_basename(__FILE__));
            wp_die('Please activate the Divi theme before activating this custom plugin. <a href="' . admin_url('plugins.php') . '">Go back</a>');
        }
    }

    // Check if Formidable Forms plugin is activated
    if (!is_plugin_active('formidable/formidable.php')) {
        deactivate_plugins(plugin_basename(__FILE__));
        wp_die('Please activate the Formidable Forms plugin before activating this custom plugin. <a href="' . admin_url('plugins.php') . '">Go back</a>');
    }
}

endif;
