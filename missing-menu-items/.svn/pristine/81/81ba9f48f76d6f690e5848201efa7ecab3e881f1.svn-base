<?php
/**
 * Plugin Name:       Missing Menu Items
 * Plugin URI:        http://www.blockstyles.com
 * Description:       Reusable Menu Items adds reusable block and template links to the admin
 * Version:           1.2.3
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Author:            Block Styles
 * Author URI:        http://www.blockstyles.com
 * License:           GPL v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       missing-menu-items
 * Doman Path:        /languages/
 *
 * @TODO - Create admin page for WP Templates to list tempaltes
 * @TODO - Add toggle theme support for block-templates
 * @TODO - Use setting to turn on theme support on line 49
 *
 *
 */

/**
* Class - Block Builder Missing Items
*/
class MissingMenuItems {

	/**
	 * New Menu Items
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_reusable_blocks_menu' ) );
	}

	/**
	 * Add Reusable Blocks to Menu
	 *
	 * @return void
	 */
	public function add_reusable_blocks_menu() {
		add_theme_page(
			__( 'Reusable Blocks', 'missing-menu-items' ),
			__( 'Reusable Blocks', 'missing-menu-items' ),
			'manage_options',
			'edit.php?post_type=wp_block',
			'',
			9
		);
		add_theme_page(
			__( 'Navigation Menu', 'missing-menu-items' ),
			__( 'Navigation Menu', 'missing-menu-items' ),
			'manage_options',
			'edit.php?post_type=wp_navigation',
			'',
			9
		);
		add_theme_page(
			__( 'Templates', 'missing-menu-items' ),
			__( 'Templates', 'missing-menu-items' ),
			'manage_options',
			'site-editor.php?postType=wp_template',
			'',
			10
		);
		add_theme_page(
			__( 'Template Parts', 'missing-menu-items' ),
			__( 'Template Parts', 'missing-menu-items' ),
			'manage_options',
			'site-editor.php?postType=wp_template_part',
			'',
			11
		);
	}

}

// Initialize Plugin
function init_missing_menu() {
	$ReusableMenuItems = new MissingMenuItems();
}

/**
 * Funtion to load text domain.
 */
function ea_mmi_load_textdomain() {
	load_plugin_textdomain( 'missing_menu_item_textdomain', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

// Init Plugin
add_action( 'init', 'init_missing_menu', 10 );

// Add Block Template Support to Theme
add_theme_support( 'block-templates' );

// Load plugin text domain.
add_action( 'plugins_loaded', 'ea_mmi_load_textdomain' );
