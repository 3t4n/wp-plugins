<?php
/**
 * Plugin Name: Design Import/Export - Styles, Templates, Template Parts and Patterns
 * Plugin URI: https://uxlthemes.com/plugins/
 * Description: Quickly and easily import and export your block based full site editing theme design: global/custom styles, templates, template parts and patterns.
 * Author: UXL Themes
 * Author URI: https://uxlthemes.com
 * Version: 2.0
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: design-import
 * Requires at least: 6.3
 * Tested up to: 6.7
 * Requires PHP: 7.4
 */

// Block direct access to the main plugin file.
defined( 'ABSPATH' ) or die( 'Nowt to see here!' );

/**
 * Get version number for the export format.
 *
 * Since we cannot really check if constant 'WXR_VERSION'
 * is already defined, as it would be defined here before core,
 * and we don't want the debug notice in core exporter.
 *
 * See ../wp-admin/includes/export.php
 *
 */
//defined( 'WXR_VERSION' ) or define( 'WXR_VERSION', '1.2' );
require_once ABSPATH . 'wp-admin/includes/export.php';

define( 'DESIGN_IMPORT_VERSION', '2.0' );
define( 'DESIGN_IMPORT_PATH', plugin_dir_path( __FILE__ ) );
define( 'DESIGN_IMPORT_URL', plugin_dir_url( __FILE__ ) );

require_once DESIGN_IMPORT_PATH . 'includes/importer.php';
require_once DESIGN_IMPORT_PATH . 'includes/exporter.php';


/**
 * Register a custom menu page.
 */
function design_import_admin_options_page(){
	add_menu_page( 
		esc_html__( 'Design Import/Export for Block Themes', 'design-import' ),
		esc_html__( 'Design Import/Export', 'design-import' ),
		'import',
		'design-import',
		'design_import_admin_page_html',
		'dashicons-migrate',
		60
	); 
}
add_action( 'admin_menu', 'design_import_admin_options_page' );


/**
 * Load scripts/styles only on plugin page
 */
function design_import_enqueue_scripts() {

	$screen = get_current_screen();

	if ( $screen->base === 'toplevel_page_design-import' ) {
		wp_enqueue_script( 'design-import-admin', DESIGN_IMPORT_URL . 'assets/js/admin.js', array( 'jquery' ), DESIGN_IMPORT_VERSION, true );
    	wp_enqueue_style( 'design-import-admin', DESIGN_IMPORT_URL . 'assets/css/admin.css', array() , DESIGN_IMPORT_VERSION );
	} 
}
add_action( 'admin_enqueue_scripts', 'design_import_enqueue_scripts' );


/**
 * Load the plugin textdomain, so that translations can be made.
 */
function design_import_load_textdomain() {
	load_plugin_textdomain( 'design-import', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'design_import_load_textdomain' );
