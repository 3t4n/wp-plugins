<?php
/**
 * Plugin Name:     Add Manage Patterns Menu
 * Plugin URI:      https://github.com/wildoperation/Add-Manage-Patterns-Menu-WordPress-Plugin
 * Description:     Creates a 'Manage Patterns' menu item under the Appearance menu.
 * Version:         1.0.2
 * Author:          Wild Operation
 * Author URI:      https://wildoperation.com
 * License:         GPLv3
 * License URI:     https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:     add-manage-patterns-menu
 *
 * @package WordPress
 * @subpackage Add Manage Patterns Menu
 * @since 1.0.0
 * @version 1.0.2
 */

/* Abort! */
if ( ! defined( 'WPINC' ) ) {
	die;
}

require plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

new \WOAMPM\Vendor\WOWPRB\WPPluginReviewBug(
	__FILE__,
	'add-manage-patterns-menu',
	array(
		'intro'            => __( 'You\'ve been using Add Manage Patterns Menu for a while now. We\'d love your feedback!', 'add-manage-patterns-menu' ),
		'rate_link_text'   => __( 'Rate the plugin', 'add-manage-patterns-menu' ),
		'remind_link_text' => __( 'Remind me later', 'add-manage-patterns-menu' ),
		'nobug_link_text'  => __( 'Don\'t ask again', 'add-manage-patterns-menu' ),
	)
);

/**
 * Add 'Manage Patterns' menu item under Appearance.
 */
add_action(
	'admin_menu',
	function () {
		add_submenu_page(
			'themes.php',
			apply_filters( 'woaddmp_page_title', __( 'Patterns', 'add-manage-patterns-menu' ) ),
			apply_filters( 'woaddmp_menu_title', __( 'Manage Patterns', 'add-manage-patterns-menu' ) ),
			apply_filters( 'woaddmp_menu_capability', 'edit_posts' ),
			'edit.php?post_type=wp_block'
		);
	}
);
