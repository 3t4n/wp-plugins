<?php
/**
 * Plugin Name: Sticky Action Buttons - Call, Chat, Navigate and more
 * Plugin URI: https://www.combar.co.il
 * Description: The ultimate tool to add float contact buttons to your website and great way to increase conversions with a variety of options for contacting in an easy, simple and visual way.
 * Version: 1.0
 * Requires PHP: 7.0
 * Requires at least: 5.0
 * Author: Combar
 * Author URI: https://www.combar.co.il/contact-us/
 * License: GPLv2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: combar-sab
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
	exit;
}

/*
 * Set plugin version for internal use
*/
define('COMBAR_SAB_VERSION', '1.0');
define('COMBAR_SAB_DIR', plugin_dir_url(__FILE__));

/*
 * Add plugin to admin panel menu
*/
function combar_sab_admin_menu() {
	add_menu_page(__('Sticky Action Buttons', 'combar-sab') , __('Contact Buttons', 'combar-sab') , 'manage_options', 'combar-sab', 'combar_sab_callback', 'dashicons-format-chat', 80);

	add_submenu_page('combar-sab', __('Sticky Action Buttons - Desktop Buttons', 'combar-sab') , __('Desktop settings', 'combar-sab') , 'manage_options', 'combar-sab-desktop', 'combar_sab_desktop_callback');

	add_submenu_page('combar-sab', __('Sticky Action Buttons - Mobile Buttons', 'combar-sab') , __('Mobile settings', 'combar-sab') , 'manage_options', 'combar-sab-mobile', 'combar_sab_mobile_callback');

	add_submenu_page('combar-sab', __('Sticky Action Buttons - Buttons Manager', 'combar-sab') , __('Buttons Manager', 'combar-sab') , 'manage_options', 'combar-sab-buttons', 'combar_sab_buttons_callback');

	add_submenu_page('combar-sab', __('Sticky Action Buttons - General Settings', 'combar-sab') , __('General Settings', 'combar-sab') , 'manage_options', 'combar-sab-settings', 'combar_sab_settings_callback');

}
add_action('admin_menu', 'combar_sab_admin_menu');

/*
 * Admin pages callback
*/
function combar_sab_callback() {
	require_once __DIR__ . '/admin/main.php';
}
function combar_sab_settings_callback() {
	require_once __DIR__ . '/admin/general.php';
}
function combar_sab_desktop_callback() {
	require_once __DIR__ . '/admin/desktop.php';
}
function combar_sab_mobile_callback() {
	require_once __DIR__ . '/admin/mobile.php';
}
function combar_sab_buttons_callback() {
	require_once __DIR__ . '/admin/buttons.php';
}
	
/*
 * Remove all admin notices on edit mode
*/	
function combar_sab_remove_updates_notice_on_editor() {
	if (str_contains($_GET['page'], 'combar-sab')) {
		if (!current_user_can('update_core')) {
			return;
		}
		add_action('init', create_function('$a', "remove_action( 'init', 'wp_version_check' );"), 2);
		add_filter('pre_option_update_core', '__return_null');
		add_filter('pre_site_transient_update_core', '__return_null');
	}
}
add_action('after_setup_theme', 'combar_sab_remove_updates_notice_on_editor');

/*
 * Admin bar elements on edit mode
 */
function combar_sab_admin_bar_menu($wp_admin_bar) {
	
	if (str_contains($_GET['page'], 'combar-sab')) {


		// remove unnecessary admin bar menu item on edit mode
		$allow = array(
					'menu-toggle',
					'wp-logo',
					'view-site',
					'view-store',
					'to-dashboard',
					'site-name',
					'sab-options',
					'sab-view',
					'top-secondary',
					'my-account',
					'user-actions',
					'user-info',
					'edit-profile',
					'logout'
					);         
				
		$nodes = $wp_admin_bar->get_nodes();
		foreach ($nodes as $node) {
			if ( !in_array($node->id, $allow) ) {
				if ( isset($node->parent) ){
					if ( !in_array($node->parent, $allow) ) {
						$wp_admin_bar->remove_node($node->id);
					}
				} else {
					$wp_admin_bar->remove_node($node->id);
				}
			}
		}
		
		/* add back to dashboard option */
		$site_name = $wp_admin_bar->get_node( 'site-name' );
		$site_name->href = admin_url( '/' );
		$wp_admin_bar->add_menu( $site_name_node );

		$wp_admin_bar->add_menu( array(
			'parent' => 'site-name',
			'id'     => 'to-dashboard',
			'title'  => __( 'Dashboard', 'combar-sab' ),
			'href'   => admin_url( '/' ),
		) );
		
		
		/* add plugin options menu */
		$wp_admin_bar->add_menu( array(
			'id'     => 'sab-options',
			'title'  => '<span class="dashicons dashicons-format-chat"></span>' . __( 'Sticky Action Buttons', 'combar-sab' ),
			'href'   => admin_url( '/admin.php?page=combar-sab' ),
		) );

		$wp_admin_bar->add_menu( array(
			'parent' => 'sab-options',
			'id'     => 'sab-desk',
			'title'  => '<span class="dashicons dashicons-desktop"></span>' . __( 'Desktop Settings', 'combar-sab' ),
			'href'   => admin_url( '/admin.php?page=combar-sab-desktop' ),
		) );

		$wp_admin_bar->add_menu( array(
			'parent' => 'sab-options',
			'id'     => 'sab-mob',
			'title'  => '<span class="dashicons dashicons-smartphone"></span>' . __( 'Mobile Settings', 'combar-sab' ),
			'href'   => admin_url( '/admin.php?page=combar-sab-mobile' ),
		) );

		$wp_admin_bar->add_menu( array(
			'parent' => 'sab-options',
			'id'     => 'sab-buttons',
			'title'  => '<span class="dashicons dashicons-screenoptions"></span>' . __( 'Buttons Manager', 'combar-sab' ),
			'href'   => admin_url( '/admin.php?page=combar-sab-buttons' ),
		) );

		$wp_admin_bar->add_menu( array(
			'parent' => 'sab-options',
			'id'     => 'sab-settings',
			'title'  => '<span class="dashicons dashicons-admin-generic"></span>' . __( 'General Settings', 'combar-sab' ),
			'href'   => admin_url( '/admin.php?page=combar-sab-settings' ),
		) );
		
			
		/* add view menu items */

			$wp_admin_bar->add_menu( array(
				'id'     => 'sab-view',
				'title'  => '<span class="dashicons dashicons-desktop"></span>' . __( 'View', 'combar-sab' ),
			) );
			
			$wp_admin_bar->add_menu( array(
				'parent' => 'sab-view',
				'id'     => 'sab-view-desk',
				'title'  => '<span class="dashicons dashicons-desktop"></span>' . __( 'Desktop view', 'combar-sab' ),
				'href'   => '#',
				'meta'  => 	array(
								'class' => 'desktopView'
							)
			) );
			$wp_admin_bar->add_menu( array(
				'parent' => 'sab-view',
				'id'     => 'sab-view-tab',
				'title'  => '<span class="dashicons dashicons-tablet"></span>' . __( 'Tablet view', 'combar-sab' ),
				'href'   => '#',
				'meta'  => 	array(
								'class' => 'tabletView'
							)
			) );
			$wp_admin_bar->add_menu( array(
				'parent' => 'sab-view',
				'id'     => 'sab-view-mob',
				'title'  => '<span class="dashicons dashicons-smartphone"></span>' . __( 'Mobile view', 'combar-sab' ),
				'href'   => '#',
				'meta'  => 	array(
								'class' => 'mobileView'
							)
			) );
			
			$closepanel = '<span class="closePanel"><span class="dashicons dashicons-fullscreen-alt"></span>' . __( 'Hide', 'combar-sab' ) . '</span>';
			$closepanel .= '<span class="openPanel"><span class="dashicons dashicons-fullscreen-exit-alt"></span>' . __( 'Show', 'combar-sab' ) . '</span>';
			$closepanel .= ' ' . __( 'Panel', 'combar-sab' );
			$wp_admin_bar->add_menu( array(
				'id'     => 'sab-panel',
				'title'  => $closepanel,
				'href'   => '#',
			) );
			
	
		
	}
}
add_action( 'admin_bar_menu', 'combar_sab_admin_bar_menu', 9999 );

/*
 * Add 'Setting' link in plugins list
*/
function combar_sab_add_action_links($links_array) {
	array_unshift($links_array, '<a href="' . admin_url('admin.php?page=combar-sab-settings') . '">' . __('Settings') . '</a>');
	return $links_array;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__) , 'combar_sab_add_action_links');

/*
 * Register required settings
*/
function combar_sab_reg_settings() {
	
	register_setting('combar_sab_setting_desk', 'combar_sab_setting_desk', array(
		'type' => 'array'
	));
	register_setting('combar_sab_setting_mob', 'combar_sab_setting_mob', array(
		'type' => 'array'
	));
	register_setting('combar_sab_buttons', 'combar_sab_buttons', array(
		'type' => 'array'
	));
	register_setting('combar_sab_general_setting', 'combar_sab_general_setting');
}
add_action('admin_init', 'combar_sab_reg_settings');

/*
 * Set default options when active the plugin
*/
function combar_sab_activate() {
	if (!is_null(get_option('combar_sab_general_setting'))) {

		$defaultSetting = array();
		$defaultSetting['hash'] = 'on';
		$defaultSetting['esc'] = 'on';
		$defaultSetting['fontawesome'] = 'on';
		$defaultSetting['minified'] = 'on';
		$defaultSetting['tablet'] = 'mob';

	}

	update_option('combar_sab_general_setting', $defaultSetting);

}
register_activation_hook(__FILE__, 'combar_sab_activate');

/*
 * Set default options when active the plugin
*/
function combar_sab_activate_redirect($plugin) {

	if ($plugin == plugin_basename(__FILE__)) {

		exit(wp_redirect(admin_url('admin.php?page=combar-sab')));

	}

}
add_action('activated_plugin', 'combar_sab_activate_redirect');

/*
 * Delete options from DB on uninstall
*/
function combar_sab_uninstall() {

	$settings = get_option('combar_sab_general_setting');

	if ('on' == $settings['uninstall_delete']) {
		delete_option('combar_sab_general_setting');
		delete_option('combar_sab_buttons');
		delete_option('combar_sab_setting_desk');
		delete_option('combar_sab_setting_mob');
	}

}
register_uninstall_hook(__FILE__, 'combar_sab_uninstall');

/*
 * Enqueue plugin script and styles
*/
function combar_sab_scripts() {

	$combar_sab_path = COMBAR_SAB_DIR;

	if (is_admin()) {
		if (str_contains($_GET['page'], 'combar-sab')) {

			// plugin admin files
			wp_enqueue_style('combar-sab-admin', $combar_sab_path . 'assets/css/combar-sab-admin.css', false, COMBAR_SAB_VERSION, 'all');
			wp_enqueue_script('combar-sab-admin', $combar_sab_path . 'assets/js/combar-sab-admin.js', array(
				'jquery'
			) , COMBAR_SAB_VERSION, true);

			wp_localize_script('combar-sab-admin', 'combar_sab', $translation = array(
				'delete_confirm' => __('Are you sure you want to delete this button?', 'combar-sab'),
				 'ajaxurl' => admin_url('admin-ajax.php'),
				 'alert_reset' => __('CAUTION: This will delete all settings saved on this page.', 'combar-sab'),
				 'continue' => __('Do you wish to continue?', 'combar-sab'),
				 'fail' => __('Action failed. Please refresh the page and try again.', 'combar-sab'),
			));

			// font awesome
			wp_enqueue_style('combar-sab-fa', $combar_sab_path . 'assets/fonts/FontAwesome/css/all.min.css', false, COMBAR_SAB_VERSION, 'all');

			// icon picker
			wp_enqueue_style('fontawesome-iconpicker', $combar_sab_path . 'assets/js/fontawesome-iconpicker/fontawesome-iconpicker.min.css', false, COMBAR_SAB_VERSION, 'all');
			wp_enqueue_script('fontawesome-iconpicker', $combar_sab_path . 'assets/js/fontawesome-iconpicker/fontawesome-iconpicker.min.js', array(
				'jquery'
			) , COMBAR_SAB_VERSION, true);	

			// color picker
			wp_enqueue_script('wp-color-picker');
			wp_enqueue_style('wp-color-picker');
			wp_add_inline_script('wp-color-picker-alpha', 'jQuery( function() { jQuery( ".color-picker" ).wpColorPicker(); } );');
			wp_enqueue_script('wp-color-picker-alpha', $combar_sab_path . 'assets/js/wp-color-picker-alpha/wp-color-picker-alpha.min.js', array(
				'jquery'
			) , COMBAR_SAB_VERSION, true);

			
			// sortable
			wp_enqueue_script('jquery-ui-sortable');
		}
	}
	else {

		$settings = get_option('combar_sab_general_setting');
		$minified = '';
		if ('on' == $settings['minified']) {
			$minified = '.min';
		}
		// plugin files
		wp_enqueue_style('combar-sab', $combar_sab_path . 'assets/css/combar-sab' . $minified . '.css', false, COMBAR_SAB_VERSION, 'all');
		wp_enqueue_script('combar-sab', $combar_sab_path . 'assets/js/combar-sab' . $minified . '.js', array(
			'jquery'
		) , COMBAR_SAB_VERSION, true);

		// font awesome
		if ('on' == $settings['fontawesome']) {
			wp_enqueue_style('combar-sab-fa', $combar_sab_path . 'assets/fonts/FontAwesome/css/all.min.css', false, COMBAR_SAB_VERSION, 'all');
		}

	}

}
add_action('wp_enqueue_scripts', 'combar_sab_scripts');
add_action('admin_enqueue_scripts', 'combar_sab_scripts');

/*
 * load plugin text domain
 */
load_plugin_textdomain( 'combar-sab', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

/*
 * load plugin main functions
*/
require_once ('inc/functions.php');
require_once ('inc/admin-functions.php');