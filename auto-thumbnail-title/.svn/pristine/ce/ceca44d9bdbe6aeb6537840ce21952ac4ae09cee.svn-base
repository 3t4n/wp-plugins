<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.linkedin.com/in/mauricioperera/
 * @since             1.0.0
 * @package           Auto_Thumbnail_Title
 *
 * @wordpress-plugin
 * Plugin Name:       Auto thumbnail title
 * Plugin URI:        https://github.com/MauricioPerera/Auto-thumbnail-title
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Mauricio Perera
 * Author URI:        https://www.linkedin.com/in/mauricioperera/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       auto-thumbnail-title
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-auto-thumbnail-title-activator.php
 */
function activate_auto_thumbnail_title() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-auto-thumbnail-title-activator.php';
	Auto_Thumbnail_Title_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-auto-thumbnail-title-deactivator.php
 */
function deactivate_auto_thumbnail_title() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-auto-thumbnail-title-deactivator.php';
	Auto_Thumbnail_Title_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_auto_thumbnail_title' );
register_deactivation_hook( __FILE__, 'deactivate_auto_thumbnail_title' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-auto-thumbnail-title.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_auto_thumbnail_title() {

	$plugin = new Auto_Thumbnail_Title();
	$plugin->run();

}
run_auto_thumbnail_title();

add_filter( 'post_thumbnail_html', 'auto_thumbnail_title', 10, 5 ); 
/* Function which will replace alt atribute to post title */
function auto_thumbnail_title( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
	$post_title = get_the_title();
	$auto_thumbnail_title_options = get_option( 'auto_thumbnail_title_option_name' );
	if($auto_thumbnail_title_options == FALSE){
    	$html = '<div class="auto-thumbnail-title"><h1>'.$post_title.'</h1>'.$html.'</div>';
	} else {
		$color_fondo = $auto_thumbnail_title_options['color_de_fondo_0'];
		$color_fuente = $auto_thumbnail_title_options['color_de_fuente_1'];
		if ((!empty($color_fondo))&&(!empty($color_fuente))) {
		$html = '<div class="auto-thumbnail-title"><h1 style="color: '.$color_fuente.'; background-color: '.$color_fondo.';">'.$post_title.'</h1>'.$html.'</div>';
		} else {
		$html = '<div class="auto-thumbnail-title"><h1>'.$post_title.'</h1>'.$html.'</div>';
		}
	}
 	
	return $html;
}