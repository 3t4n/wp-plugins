<?php

/**
 * Plugin Name:       Add Meta Tag For WordPress
 * Plugin URI:        
 * Description:       this plugin that you can add metadata your web site for more efficient indexing and easier sharing of your content. \
 * Version:           1.0.1
 * Author:            wpdesigncoding
 * Author URI:        http://designncoding.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       add-meta-tag-for-wordpress
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-add-meta-tag-for-wordpress-activator.php
 */
function activate_Add_Meta_Tag_For_Wordpress() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-add-meta-tag-for-wordpress-activator.php';
	Add_Meta_Tag_For_Wordpress_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-add-meta-tag-for-wordpress-deactivator.php
 */
function deactivate_Add_Meta_Tag_For_Wordpress() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-add-meta-tag-for-wordpress-deactivator.php';
	Add_Meta_Tag_For_Wordpress_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_Add_Meta_Tag_For_Wordpress' );
register_deactivation_hook( __FILE__, 'deactivate_Add_Meta_Tag_For_Wordpress' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-add-meta-tag-for-wordpress.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_Add_Meta_Tag_For_Wordpress() {

	$plugin = new Add_Meta_Tag_For_Wordpress();
	$plugin->run();

}
run_Add_Meta_Tag_For_Wordpress();
