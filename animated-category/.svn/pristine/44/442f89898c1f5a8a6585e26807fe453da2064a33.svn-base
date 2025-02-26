<?php

/**
 *
 * @link              bdcodemaker.com
 * @since             1.0.0
 * @package           Anim_Cat
 *
 * @wordpress-plugin
 * Plugin Name:       Animated Category
 * Plugin URI:        https://bdcodemaker.com/demo/plugin/animcat
 * Description:       Animated category widget easily customizes count and color.
 * Version:           1.0.0
 * Author:            Nasirul Islam
 * Author URI:        bdcodemaker.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       anim-cat
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that enqueue widget css.
 * This action is documented in includes/class-animated-category.php
 */
add_action( 'wp_enqueue_scripts', 'anim_widget_style', 10, 1 );
function anim_widget_style(){
	wp_enqueue_style( 'anim_style', plugin_dir_url( __FILE__ ) . 'admin/css/anim-cat-admin.css' );
}

/**
 * The code that register widget.
 */
add_action( 'widgets_init', 'anim_cat_widget' );
function anim_cat_widget() {
	register_widget('animated_cat');
}

/**
 * The code that activate category.
 * This action is documented in includes/class-animated-category.php
 */
require_once plugin_dir_path( __FILE__ ) . '/includes/class-animated-category.php';

add_action( 'plugins_loaded', 'animcat_load_textdomain' );
/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function animcat_load_textdomain() {
  load_plugin_textdomain( 'animcat-plugin', false, basename( dirname( __FILE__ ) ) . '/languages' ); 
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-anim-cat-activator.php
 */
function activate_anim_cat() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-anim-cat-activator.php';
	Anim_Cat_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-anim-cat-deactivator.php
 */
function deactivate_anim_cat() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-anim-cat-deactivator.php';
	Anim_Cat_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_anim_cat' );
register_deactivation_hook( __FILE__, 'deactivate_anim_cat' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-anim-cat.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_anim_cat() {

	$plugin = new Anim_Cat();
	$plugin->run();

}
run_anim_cat();


