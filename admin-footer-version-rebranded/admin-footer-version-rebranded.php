<?php
/*
 *         ,gggg,                                                              
 *        d8" "8I                                                              
 *        88  ,dP                                                              
 *    88888888P"                    gg                                         
 *        88                        ""                                         
 *        88   gg     gg    ,ggg,   gg    ,ggg,gg   ,ggg,,ggg,     ,ggggg,     
 *  ,aa,_ 88   I8     8I   dP" "Yb  88   dP" "Y8I  ,8" "8P" "8,   dP"  "Y8gggg 
 * dP" "P888   I8,   ,8I  i8'       88  i8'   ,8I  I8   8I   8I  i8'    ,8I    
 * Yb,_,d888b,,d8b, ,d8b,,d8,_ _,8,,88,,d8, _,d8b,,dP   8I   Yb,,d8,_  ,d8'    
 *  "Y8P"   "Y8P'"Y8P"`Y8P""Y888PP8PY""YP"Y888P"`Y88P'  8I   `Y8P"Y8888P"      
 *
 *                                 Old Style BBS 80 Columns Art: My First Love!
 *
 Plugin Name:       Admin Footer Version (rebranded)
 Plugin URI:        https://github.com/luciano-croce/admin-footer-version-rebranded/
 Description:       Show the rebranded version in the admin footer, (dashboard) when it is activated, or if it is in the mu-plugins directory.
 Version:           1.0.4
 Requires at least: 2.3
 Tested up to:      5.1
 Requires PHP:      5.2.4
 Author:            Luciano Croce
 Author URI:        https://github.com/luciano-croce/
 License:           GPLv2 or later (license.txt)
 License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 Text Domain:       admin-footer-version-rebranded
 Domain Path:       /languages
 Network:           true
 GitHub Plugin URI: https://github.com/luciano-croce/admin-footer-version-rebranded/
 GitHub Branch:     master
 Requires WP:       2.3
 *
 * Warning: the code of this plugin is not written with a PHP framework, but manually,
 * with a simple PHP editor compatible UTF-8 without BOM, and Unix LF. To avoid code corruption,
 * do not edit it with WordPress embedded editor, or with any specifications incompatible editor.
 * This author is exonerated from any responsibility or damage (directly or indirectly)
 * caused and due to the use of this bad practice.
 *
 * Plugin approved in the repository of the plugin directory on 2017-12-25
 *
 * Copyright 2013-2019 Luciano Croce (e-mail:luciano.croce@gmail.com)
 *
 * According to the terms of the GNU General Public License, part of Copyright belongs to its own author,
 * and part belongs to other respective their authors, if exist.
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation. You may NOT assume
 * that you can use any other compatible version of the GPL, or version compatible with GPL.
 *
 * This program is distributed in the hope that it will be useful, on an "AS IS", but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * This program is written with the intent of being helpful,
 * but you are responsible for its use or actions on your own website.
 *
 * According to the terms of the Detailed Plugin Guidelines (wordpress.org) in particular:
 * - This developer(s) are responsible(s) for the contents and actions of this plugin.
 * - Stable version of this plugin is only available from the WordPress Plugin Directory page.
 * - Plugin version numbers is be incremented for each new release.
 * - Complete plugin was be available on GitHub before the time of submission.
 * - This plugin respect trademarks, copyrights, and project names.
 *
 * This plugin use Semantic Versioning number MAJOR.MINOR.PATCH - More details are available here: https://semver.org/
 *
 * A neat trick, is to put this single file admin-footer-version-rebranded.php (not its parent directory)
 * in the /wp-content/mu-plugins/ directory (create it if not exists) so you won't even have to enable it,
 * and will be loaded by default, also, since first step installation of WordPress setup. Also, for translation
 * functionality, put all files of the single languages (admin-footer-version-rebranded-en_US.mo for example)
 * that you need (not its parent directory) in the /wp-content/mu-plugins/ directory (create it if not exists)
 * and will also be loaded by default, since first step installation of WordPress setup! Note that mu-plugins
 * functionality is available since WP 2.8+ and is not present in WP 2.7+ or previous versions.
 */

	/**
	 * Admin Footer Version (rebranded)
	 *
	 * Show the rebranded version in the admin update footer (dashboard) backend.
	 *
	 * History's:
	 *
	 * 1.9.6 (Build 2019-05-01) 9th Dev Release
	 * 1.8.5 (Build 2019-03-08) 8th Dev Release
	 * 1.7.2 (Build 2019-02-22) 7th Dev Release
	 * 1.6.4 (Build 2019-01-07) 6th Dev Release
	 * 1.5.8 (Build 2019-01-02) 5th Dev Release
	 * 1.4.7 (Build 2018-12-27) 4th Dev Release
	 * 1.3.9 (Build 2018-04-27) 3rd Dev Release
	 * 1.2.3 (Build 2018-04-22) 2nd Dev Release
	 * 1.1.1 (Build 2017-12-22) 1st Dev Release
	 *
	 * 1.3.7 (Build becoming's) 7th Tag Release   (Official) Release
	 * 1.3.7 (Build becoming's) 7th Tag Preview (Unofficial) Reloaded
	 * 1.2.6 (Build becoming's) 6th Tag Release   (Official) Release
	 * 1.2.6 (Build becoming's) 6th Tag Preview (Unofficial) Reloaded
	 * 1.1.6 (Build becoming's) 6th Tag Release   (Official) Release
	 * 1.1.6 (Build becoming's) 6th Tag Preview (Unofficial) Reloaded
	 * 1.1.5 (Build 2019-02-21) 5th Tag Release   (Official) Release
	 * 1.1.5 (Build 2019-02-18) 5th Tag Preview (Unofficial) Reloaded
	 * 1.0.5 (Build 2019-02-14) 5th Tag Release   (Official) Release
	 * 1.0.5 (Build 2019-02-11) 5th Tag Preview (Unofficial) Reloaded
	 * 1.0.4 (Build 2018-12-28) 4th Tag Release   (Official) Release
	 * 1.0.3 (Build 2018-04-28) 3rd Tag Release   (Official) Release
	 * 1.0.2 (Build 2018-04-25) 2nd Tag Release   (Official) Release
	 * 1.0.1 (Build 2017-12-25) 1st Tag Release   (Official) Release
	 *
	 * 1.0.0 (Build 2013-12-12) Initial Release (Unofficial) Private
	 * 0.0.1 (Build 2013-10-24) Develop Release (Unofficial) GitHub
	 *
	 * PHPDocumentor
	 *
	 * @package    WordPress\Plugin
	 * @subpackage Footer\Admin_Footer_Version_Rebranded
	 * @link       https://wordpress.org/plugins/admin-footer-version-rebranded/ - Hosted in WordPress.org plugins directory
	 * @version    1.0.4 (Build 2018-12-28)
	 * @since      1.0.0 (Build 2013-12-12)
	 * @author     Luciano Croce <luciano.croce@gmail.com>
	 * @copyright  2013-2019 - Luciano Croce
	 * @license    https://www.gnu.org/licenses/gpl-2.0.html - GPLv2 or later
	 * @todo       Control panel for options settings in admin menu (dashboard) through a dedicated Stand-Alone page and/or User Profile page.
	 */

/**
 * Prevent direct access to plugin files.
 *
 * For security reasons, exit without any notifications:
 * - without show the details of the system
 * - without warn the existence of this plugin
 * - show the generic header 403 forbidden error
 * - close the connection header
 *
 * @author  Luciano Croce <luciano.croce@gmail.com>
 * @version 1.0.5 (Build 2019-01-11)
 * @since   1.0.0 (Build 2013-12-12)
 */
if ( ! defined( 'ABSPATH' ) ) {
	header( 'HTTP/0.9 403 Forbidden' );
	header( 'HTTP/1.0 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	header( 'HTTP/2.0 403 Forbidden' );
	header( 'Status:  403 Forbidden' );
	header( 'Connection: Close'      );
		exit;
}

if ( ! defined( 'WPINC' ) ) {
	header( 'HTTP/0.9 403 Forbidden' );
	header( 'HTTP/1.0 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	header( 'HTTP/2.0 403 Forbidden' );
	header( 'Status:  403 Forbidden' );
	header( 'Connection: Close'      );
		exit;
}

if ( ! function_exists( 'add_action' ) ) {
	header( 'HTTP/0.9 403 Forbidden' );
	header( 'HTTP/1.0 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	header( 'HTTP/2.0 403 Forbidden' );
	header( 'Status:  403 Forbidden' );
	header( 'Connection: Close'      );
		exit;
}

if ( ! function_exists( 'add_filter' ) ) {
	header( 'HTTP/0.9 403 Forbidden' );
	header( 'HTTP/1.0 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	header( 'HTTP/2.0 403 Forbidden' );
	header( 'Status:  403 Forbidden' );
	header( 'Connection: Close'      );
		exit;
}

if ( ! function_exists( 'remove_action' ) ) {
	header( 'HTTP/0.9 403 Forbidden' );
	header( 'HTTP/1.0 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	header( 'HTTP/2.0 403 Forbidden' );
	header( 'Status:  403 Forbidden' );
	header( 'Connection: Close'      );
		exit;
}

if ( ! function_exists( 'remove_filter' ) ) {
	header( 'HTTP/0.9 403 Forbidden' );
	header( 'HTTP/1.0 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	header( 'HTTP/2.0 403 Forbidden' );
	header( 'Status:  403 Forbidden' );
	header( 'Connection: Close'      );
		exit;
}

/**
 * Define requested variables to meet "Detailed Plugins Guidelines" requirements.
 *
 * @author  Luciano Croce <luciano.croce@gmail.com>
 * @version 1.0.4 (Build 2018-12-28)
 * @since   1.0.3 (Build 2018-04-28)
 */
if ( ! defined( 'PLUGIN_ADMIN_FOOTER_VERSION_REBRANDED_UPGRADE' ) ) define( 'PLUGIN_ADMIN_FOOTER_VERSION_REBRANDED_UPGRADE', '5.1' );			# Latest WordPress version available for legacy branches.
if ( ! defined( 'PLUGIN_ADMIN_FOOTER_VERSION_REBRANDED_VERSION' ) ) define( 'PLUGIN_ADMIN_FOOTER_VERSION_REBRANDED_VERSION', '1.0.5' );			# Admin Footer Version (rebranded) latest version available.
if ( ! defined( 'PLUGIN_ADMIN_FOOTER_VERSION_REBRANDED_RELEASE' ) ) define( 'PLUGIN_ADMIN_FOOTER_VERSION_REBRANDED_RELEASE', '2018-02-14' );	# Admin Footer Version (rebranded) latest release available.

global $wp_version; $wpmu_version;
include( ABSPATH . WPINC . '/version.php' );
$version = str_replace( '-src', '', $wp_version );

/**
 * Make sure that run under WP 2.3+ or greater.
 *
 * 1.0.5
 * - Also show Admin Notice when PHP version not meet minimum requirements requested.
 *
 * @author  Luciano Croce <luciano.croce@gmail.com>
 * @version 1.0.5 (Build 2019-01-11)
 * @since   1.0.0 (Build 2013-12-12)
 */
if ( version_compare( $version, '2.3', '<' ) ) {
	# Change 2.3 with the minimum WordPress version that you prefer associate die notification instead admin notices.
	if ( version_compare( $version, '2.0', '>=' ) ) {
		if ( version_compare( $version, '2.3', '<' ) ) {
			if ( version_compare( PHP_VERSION, '5.2.4', '<' ) ) {
				# Uncomment it if you prefer die notofication instead admin notices.
//				wp_die( '<strong>' . __( 'Activation Stopped!', 'admin-footer-version-rebranded' ) . '</strong>' . '<br /><br />' . __( 'Admin Footer Version (rebranded) requires WP 2.3+ or greater: note that the Update Footer (filter) was introduced since WP 2.3.0', 'admin-footer-version-rebranded' ) . '</strong>' . '<br /><br />' . __( 'Admin Footer Version (rebranded) requires PHP 5.2.4 or greater: note that a good choice is PHP 5.6+ ~ 7.2+ (previous stable branch) or PHP 7.3+ (current stable branch).', 'admin-footer-version-rebranded' ) );
			}
		}
		if ( version_compare( $version, '2.3', '<' ) ) {
			if ( version_compare( PHP_VERSION, '5.2.4', '>=' ) ) {
				# Uncomment it if you prefer die notofication instead admin notices.
//				wp_die( '<strong>' . __( 'Activation Stopped!', 'admin-footer-version-rebranded' ) . '</strong>' . '<br /><br />' . __( 'Admin Footer Version (rebranded) requires WP 2.3+ or greater: note that the Update Footer (filter) was introduced since WP 2.3.0', 'admin-footer-version-rebranded' ) );
			}
		}
	}

	if ( version_compare( $version, '2.5', '>=' ) ) {
		add_action( 'admin_init', 'avcufr_psd_wp_version_init', 0 );
	}

	if ( version_compare( $version, '2.5', '>=' ) ) {
		add_action( 'admin_init', 'avcufr_psd_wp_version_init', 0 );
	}

	if ( version_compare( $version, '2.0', '>=' ) ) {
		add_action( 'admin_notices', 'avcufr_ant_wp_version_init' );
	}

	if ( version_compare( $version, '3.1', '>=' ) ) {
		add_action( 'network_admin_notices', 'avcufr_ant_wp_version_init' );
	}

	/**
	 * Plugin Self Deactivated when WP version not meet minimum requirements requested.
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.1 (Build 2017-12-25)
	 * @since   1.0.0 (Build 2013-12-12)
	 */
	function avcufr_psd_wp_version_init() {
		deactivate_plugins( plugin_basename( __FILE__ ) );
	}

	/**
	 * Show Admin Notice when WP version not meet minimum requirements requested.
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.5 (Build 2019-01-11)
	 * @since   1.0.0 (Build 2013-12-12)
	 */
	function avcufr_ant_wp_version_init() {
		?>
		<div class="notice notice-error is-dismissible error">
		<p>
		<?php _e( 'Admin Footer Version (rebranded) requires WP 2.3+ or greater: note that the Update Footer (filter) was introduced since WP 2.3.0', 'admin-footer-version-rebranded' )?>
		</p>
		</div>
		<?php 
		if ( version_compare( PHP_VERSION, '5.2.4', '<' ) ) {
		?>
		<div class="notice notice-error is-dismissible error">
		<p>
		<?php _e( 'Admin Footer Version (rebranded) requires PHP 5.2.4 or greater: note that a good choice is PHP 5.6+ ~ 7.2+ (previous stable branch) or PHP 7.3+ (current stable branch).', 'admin-footer-version-rebranded' )?>
		</p>
		</div>
		<?php 
		}
		?>
		<?php 
		global $wp_version;
		include( ABSPATH . WPINC . '/version.php' );
		$version = str_replace( '-src', '', $wp_version );
		if ( version_compare( $version, '2.0', '>=' ) ) {
		if ( version_compare( $version, '2.3', '<' ) ) {
		?>
		<div class="notice notice-warning is-dismissible updated">
		<p>
		<?php _e( 'Admin Footer Version (rebranded) <strong>can not be deactivate automatically</strong> (WP 2.5+ is required) deactivate it manually!', 'admin-footer-version-rebranded' )	# Thanks to Garrett Hyder for this text suggestion.	?>
		</p>
		</div>
		<?php 
		}
		}
		?>
		<div class="notice notice-warning is-dismissible updated">
		<p>
		<?php _e( 'Plugin <strong>deactivated</strong>.', 'admin-footer-version-rebranded' )?>
		<?php 
		global $wp_version;
		include( ABSPATH . WPINC . '/version.php' );
		$version = str_replace( '-src', '', $wp_version );
		if ( version_compare( $version, '2.5', '>=' ) ) {
		?>
		<script>window.jQuery && jQuery( function( $ ) { $( 'div#message.updated' ).remove(); } );</script>
		<?php 
		# This script remove update message when plugin is auto deactivated.
		}
		?>
		</p>
		</div>
		<?php 
	}

	/*
	 * 1.1.6 ~ 1.2.6
	 * - Adds reinforced check of automatic plugin deactivation.
	 */

}

/**
 * Make sure that run under PHP 5.2.4 or greater.
 *
 * @author  Luciano Croce <luciano.croce@gmail.com>
 * @version 1.0.1 (Build 2017-12-25)
 * @since   1.0.0 (Build 2013-12-12)
 * @todo    Adds support for wp-config.php servehappy vars: define( 'ACCEPTABLE_PHP', '5.6' ); define( 'SECURE_PHP', '7.2' ); define( 'SUPPORTED_PHP', '5.6' ); define( 'RECOMMENDED_PHP', '7.3' );
 */
if ( version_compare( PHP_VERSION, '5.2.4', '<' ) ) {
	if ( version_compare( $version, '2.3', '>=' ) ) {
		# Change 2.3 with the minimum PHP version that you prefer associate die notification instead admin notices.
		if ( version_compare( $version, '2.3', '>=' ) ) {
			# Uncomment it if you prefer die notofication instead admin notices.
//			wp_die( '<strong>' . __( 'Activation Stopped!', 'admin-footer-version-rebranded' ) . '</strong>' . '<br /><br />' . __( 'Admin Footer Version (rebranded) requires PHP 5.2.4 or greater: note that a good choice is PHP 5.6+ ~ 7.2+ (previous stable branch) or PHP 7.3+ (current stable branch).', 'admin-footer-version-rebranded' ) );
	}

	if ( version_compare( $version, '2.5', '>=' ) ) {
		add_action( 'admin_init', 'avcufr_psd_php_version_init', 0 );
	}

	if ( version_compare( $version, '2.0', '>=' ) ) {
		add_action( 'admin_notices', 'avcufr_ant_php_version_init' );
	}

	if ( version_compare( $version, '3.1', '>=' ) ) {
		add_action( 'network_admin_notices', 'avcufr_ant_php_version_init' );
	}

	/**
	 * Plugin Self Deactivated when PHP version not meet minimum requirements requested.
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.1 (Build 2017-12-25)
	 * @since   1.0.0 (Build 2013-12-12)
	 */
	function avcufr_psd_php_version_init() {
		deactivate_plugins( plugin_basename( __FILE__ ) );
	}

	/**
	 * Show Admin Notice when PHP version not meet minimum requirements requested.
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.2 (Build 2018-04-25)
	 * @since   1.0.0 (Build 2013-12-12)
	 */
	function avcufr_ant_php_version_init() {
		?>
		<div class="notice notice-error is-dismissible error">
		<p>
		<?php _e( 'Admin Footer Version (rebranded) requires PHP 5.2.4 or greater: note that a good choice is PHP 5.6+ ~ 7.2+ (previous stable branch) or PHP 7.3+ (current stable branch).', 'admin-footer-version-rebranded' )?>
		</p>
		</div>
		<?php 
		global $wp_version;
		include( ABSPATH . WPINC . '/version.php' );
		$version = str_replace( '-src', '', $wp_version );
		if ( version_compare( $version, '2.0', '>=' ) ) {
		if ( version_compare( $version, '2.3', '<' ) ) {
		?>
		<div class="notice notice-warning is-dismissible updated">
		<p>
		<?php _e( 'Admin Footer Version (rebranded) <strong>can not be deactivate automatically</strong> (WP 2.5+ is required) deactivate it manually!', 'admin-footer-version-rebranded' )	# Thanks to Garrett Hyder for this text suggestion.	?>
		</p>
		</div>
		<?php 
		}
		}
		?>
		<div class="notice notice-warning is-dismissible updated">
		<p>
		<?php _e( 'Plugin <strong>deactivated</strong>.', 'admin-footer-version-rebranded' )?>
		<?php 
		global $wp_version;
		include( ABSPATH . WPINC . '/version.php' );
		$version = str_replace( '-src', '', $wp_version );
		if ( version_compare( $version, '2.5', '>=' ) ) {
		?>
		<script>window.jQuery && jQuery( function( $ ) { $( 'div#message.updated' ).remove(); } );</script>
		<?php 
		# This script remove update message when plugin is auto deactivated.
		}
		?>
		</p>
		</div>
		<?php 
	}

	/*
	 * 1.1.6 ~ 1.2.6
	 * - Adds reinforced check of automatic plugin deactivation.
	 */

	}
}

else {

	add_filter( 'plugins_loaded', 'avcufr_load_plugin_textdomain' );

	if ( version_compare( $version, '3.0', '>=' ) ) {
		add_filter( 'plugins_loaded', 'avcufr_load_muplugin_textdomain' );
	}

	add_filter( 'plugin_row_meta', 'avcufr_adds_row_meta_build_release_date_and_current_used_language', 10, 4 );				# comment or uncomment to enable or disable this customization

	if ( version_compare( $version, '4.0', '<' ) ) {
		if ( version_compare( $version, '2.5', '>=' ) ) {
			add_filter( 'plugin_row_meta', 'avcufr_adds_row_meta_details', 10, 2 );												# comment or uncomment to enable or disable this customization
		}
	}

	if ( version_compare( $version, '4.0', '>=' ) ) {
		add_filter( 'plugin_row_meta', 'avcufr_adds_row_meta_links', 10, 2 );													# comment or uncomment to enable or disable this customization
	}

	if ( version_compare( $version, '3.0', '>=' ) ) {
		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'avcufr_adds_action_links', 10, 4 );					# comment or uncomment to enable or disable this customization
	}

	if ( version_compare( $version, '3.0', '>=' ) ) {
		add_filter( 'network_admin_plugin_action_links_' . plugin_basename( __FILE__ ), 'avcufr_adds_action_links', 10, 4 );	# comment or uncomment to enable or disable this customization
	}

	if ( version_compare( $version, '3.0', '<' ) ) {
		if ( version_compare( $version, '2.9', '>=' ) ) {
			add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'avcufr_adds_action_links_shift', 10, 4 );		# comment or uncomment to enable or disable this customization
		}
	}

	if ( version_compare( $version, '2.9', '<' ) ) {
		if ( version_compare( $version, '2.8', '>=' ) ) {
			add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'avcufr_adds_action_links_shift', 10, 4 );		# comment or uncomment to enable or disable this customization
		}
	}

	if ( version_compare( $version, '2.8', '<' ) ) {
		if ( version_compare( $version, '2.7', '>=' ) ) {
			add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'avcufr_adds_action_links_unshift', 10, 4 );		# comment or uncomment to enable or disable this customization
		}
	}

	if ( version_compare( $version, '2.7', '<' ) ) {
		if ( version_compare( $version, '2.5', '>=' ) ) {
			add_filter( 'plugin_action_links', 'avcufr_adds_action_links_legacy', 10, 4 );										# comment or uncomment to enable or disable this customization
		}
	}

	if ( version_compare( $version, '2.8', '>=' ) ) { // Also work in WP 2.7+ ? Investigating...
		add_filter( 'admin_footer_text', 'core_admin_footer_text_rebranded', 11 );                                              # by default core admin_footer_text has level 10 -- comment to disable Systen Overview
	}

	if ( version_compare( $version, '2.7', '>=' ) ) {
		add_filter( 'update_footer', 'core_update_footer_rebranded', 11 );														# by default core update_footer has level 10
	}

	if ( version_compare( $version, '2.7', '<' ) ) {
		if ( version_compare( $version, '2.3', '>=' ) ) {
			add_filter( 'update_footer', 'core_update_footer_legacy_rebranded', 11 );											# by default core update_footer has level 10
		}
	}

	if ( version_compare( $version, '2.3', '>=' ) ) {
		if ( version_compare( $version, '2.5', '<' ) ) {
			add_filter( 'admin_head', 'avcufr_dismiss_core_update_nag_message' );												# dismiss Core Update Nag (message) WP 2.3+ only
		}
	}

	if ( version_compare( $version, '2.5', '>=' ) ) {
		add_filter( 'admin_init', 'avcufr_dismiss_core_update_nag_message' );													# dismiss Core Update Nag (message) WP 2.5+ or greater
	}

	if ( version_compare( $version, '3.1', '>=' ) ) {
		add_filter( 'admin_init', 'avcufr_dismiss_network_core_update_nag_message' );											# dismiss Network Core Update Nag (message) WP 3.1+ or greater -- also work in WP 3.0+ or greater !?
	}

	if ( version_compare( $version, '3.0', '>=' ) ) {
		if ( version_compare( $version, '4.8', '<=' ) ) {
			if ( ! defined( 'DISALLOW_FILE_EDIT' ) ) define( 'DISALLOW_FILE_EDIT', true );										# disable file edit to avoid code corruption
		}
	}

	/**
	 * Load Plugin Textdomain.
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.1 (Build 2017-12-25)
	 * @since   1.0.0 (Build 2013-12-12)
	 */
	function avcufr_load_plugin_textdomain() {
		load_plugin_textdomain( 'admin-footer-version-rebranded', false, basename( dirname( __FILE__ ) ) . '/languages' );
	}

	/**
	 * Load MU-Plugin (dir) Textdomain.
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.1 (Build 2017-12-25)
	 * @since   1.0.0 (Build 2013-12-12)
	 */
	function avcufr_load_muplugin_textdomain() {
		load_muplugin_textdomain( 'admin-footer-version-rebranded', false, basename( dirname( __FILE__ ) ) );
	}

	/**
	 * Adds Plugin Row Meta Build.
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.2 (Build 2018-04-25)
	 * @since   1.0.0 (Build 2013-12-12)
	 */
	function avcufr_adds_row_meta_build_release_date_and_current_used_language( $plugin_meta, $plugin_file ) {
		if ( $plugin_file == plugin_basename( __FILE__ ) )
			{
//				$plugin_meta[ 0 ] .= '   ' . __( 'preview',  'admin-footer-version-rebranded' );																												# Only for preview build.
//				$plugin_meta[ 0 ] .= ' | ' . __( 'Release',  'admin-footer-version-rebranded' ) . ' ' . date_i18n( get_option( 'date_format' ), strtotime( PLUGIN_ADMIN_FOOTER_VERSION_REBRANDED_RELEASE ) );	# 3rd version -- Latest new (only for beta test build) implementation that use defined default variable.
//				$plugin_meta[ 0 ] .= ' | ' . __( 'Release',  'admin-footer-version-rebranded' ) . ' ' . date_i18n( get_option( 'date_format' ), strtotime( '2018-04-28' ) );									# 2nd version -- Thanks to Garrett Hyder (garrett-eclipse) for this contribute.
//				$plugin_meta[ 0 ] .= ' | ' . __( 'Release',  'admin-footer-version-rebranded' ) . ' ' . __( '2018-04-28', 'admin-footer-version-rebranded' );													# 1st version -- This is a fixed date and not i18n: uncomment it on case of incompatibility.
				$plugin_meta[ 0 ] .= ' | ' . __( 'Language', 'admin-footer-version-rebranded' ) . ' ' . get_locale();																							# Thanks to swisspidy for this contribute.
			}
		return $plugin_meta;
	}

	/**
	 * Adds Plugin Row Meta Details.
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.1 (Build 2017-12-25)
	 * @since   1.0.0 (Build 2013-12-12)
	 */
	function avcufr_adds_row_meta_details( $plugin_meta, $plugin_file ) {
		if ( $plugin_file == plugin_basename( __FILE__ ) )
			{
				$plugin_meta[ 1 ] .= '<a class="thickbox" href="plugin-install.php?tab=plugin-information&amp;plugin=admin-footer-version-rebranded&amp;section=changelog&amp;TB_iframe=true">' . __( 'View details', 'admin-footer-version-rebranded' ) . '</a>';
			}
		return $plugin_meta;
	}

	/**
	 * Adds Plugin Row Meta Links.
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.1 (Build 2017-12-25)
	 * @since   1.0.0 (Build 2013-12-12)
	 * @todo    Replace default "Visit plugin site" link with "Visit site" link in all supported WordPress versions - Fixing double "Visit plugin site" link in development versions (alpha/beta/RC) when Core Updates are disabled.
	 */
	function avcufr_adds_row_meta_links( $plugin_meta, $plugin_file ) {
		if ( $plugin_file == plugin_basename( __FILE__ ) )
			{
				$plugin_meta[] .= '<a href="https://github.com/luciano-croce/admin-footer-version-rebranded/">' . __( 'Visit plugin site', 'admin-footer-version-rebranded' ) . '</a>';
//				$plugin_meta[] .= '<a href="https://github.com/luciano-croce/admin-footer-version-rebranded/">' . __( 'Visit site', 'admin-footer-version-rebranded' ) . '</a>';
//				$plugin_meta[] .= '<span style="color:#a00">' . 'Saint Valentine Edition &#10084;' . '</span>';
//				$plugin_meta[] .= '<span style="color:#a00">' . 'Preview Version' . '</span>';
			}
		return $plugin_meta;
	}

	/**
	 * Adds Plugin Action Links.
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.1 (Build 2017-12-25)
	 * @since   1.0.0 (Build 2013-12-12)
	 */
	function avcufr_adds_action_links( $plugin_meta, $plugin_file ) {
		if ( ! current_user_can( 'update_core' ) ) {
			$plugin_meta[] .= '<a href="index.php" style="color:#3db634">' . __( 'Dashboard', 'admin-footer-version-rebranded' ) . '</a>';
		}
		else {
			if ( current_user_can( 'update_core' ) ) {
				$plugin_meta[] .= '<a href="update-core.php" style="color:#ffa500">' . __( 'Updates', 'admin-footer-version-rebranded' ) . '</a>';
			}
		}
			return $plugin_meta;
	}

	/**
	 * Adds Plugin Action Links Shift.
	 *
	 * Insert after -> Deactivate | Edit -> Work only on WordPress 2.8+ and 2.9+
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.1 (Build 2017-12-25)
	 * @since   1.0.0 (Build 2013-12-12)
	 */
	function avcufr_adds_action_links_shift( $plugin_meta, $plugin_file ) {
		if ( ! current_user_can( 'manage_options' ) ) {
			$plugin_meta[] .= '<a href="index.php" style="color:#3db634">' . __( 'Dashboard', 'admin-footer-version-rebranded' ) . '</a>';
		}
		else {
			if ( current_user_can( 'manage_options' ) ) {
				$plugin_meta[] .= '<a href="update-core.php" style="color:#ffa500">' . __( 'Updates', 'admin-footer-version-rebranded' ) . '</a>';
			}
		}
			return $plugin_meta;
	}

	/**
	 * Adds Plugin Action Links Unshift.
	 *
	 * Insert before -> Deactivate | Edit -> Work only on WordPress 2.7+
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.1 (Build 2017-12-25)
	 * @since   1.0.0 (Build 2013-12-12)
	 */
	function avcufr_adds_action_links_unshift( $links, $file ) {
		if ( $file == plugin_basename(__FILE__) ) {
			if ( ! current_user_can( 'manage_options' ) ) {
				$avcufr_settings_link_unshift = '<a href="index.php" style="color:#3db634">' . __( 'Dashboard', 'admin-footer-version-rebranded' ) . '</a>';
				array_unshift( $links, $avcufr_settings_link_unshift );
				$plugin_meta[] = $avcufr_settings_link_unshift;
			}
			else {
				if ( current_user_can( 'manage_options' ) ) {
					$avcufr_settings_link_unshift = '<a href="update-core.php" style="color:#ffa500">' . __( 'Updates', 'admin-footer-version-rebranded' ) . '</a>';
					array_unshift( $links, $avcufr_settings_link_unshift );
					$plugin_meta[] = $avcufr_settings_link_unshift;
				}
			}
		}
			return $links;
	}

	/**
	 * Adds Plugin Action Links Legacy.
	 *
	 * Insert before -> Deactivate | Edit -> Work only on WordPress 2.5+ and 2.6+
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.1 (Build 2017-12-25)
	 * @since   1.0.0 (Build 2013-12-12)
	 */
	function avcufr_adds_action_links_legacy( $links, $file ) {
		if ( $file == plugin_basename( __FILE__ ) ) {
			if ( ! current_user_can( 'manage_options' ) ) {
				$avcufr_settings_link_legacy = '<a href="index.php" style="color:#3db634">' . __( 'Dashboard', 'admin-footer-version-rebranded' ) . '</a>';
				array_unshift( $links, $avcufr_settings_link_legacy );
			}
			else {
				if ( current_user_can( 'manage_options' ) ) {
					$avcufr_settings_link_legacy = '<a href="update-core.php" style="color:#ffa500">' . __( 'Updates', 'admin-footer-version-rebranded' ) . '</a>';
					array_unshift( $links, $avcufr_settings_link_legacy );
				}
			}
		}
			return $links;
	}

	/**
	 * Dismiss Core Update Nag Message.
	 *
	 * This, is different from the other similar plugins, because uses the filter hook, and not the action hook.
	 *
	 * Filters should filter information, thus receiving information/data, applying the filter and returning information/data,
	 * and then used. However, filters are still action hooks. WordPress defines add_filter/remove_filter as "hooks a function
	 * to a specific filter action", and add_action/remove_action as "hooks a function on to a specific action".
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.1 (Build 2018-01-07)
	 * @since   1.0.0 (Build 2013-12-12)
	 */
	function avcufr_dismiss_core_update_nag_message() {
		remove_filter( 'admin_notices', 'update_nag', 3 );
	}

	/**
	 * Dismiss Network Core Update Nag Message.
	 *
	 * This, is different from the other similar plugins, because uses the filter hook, and not the action hook.
	 *
	 * Filters should filter information, thus receiving information/data, applying the filter and returning information/data,
	 * and then used. However, filters are still action hooks. WordPress defines add_filter/remove_filter as "hooks a function
	 * to a specific filter action", and add_action/remove_action as "hooks a function on to a specific action".
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.1 (Build 2018-01-07)
	 * @since   1.0.0 (Build 2013-12-12)
	 * @todo    Adds checking for is_multisite in Network Multisite environment: it is really needed? -- Checking if it also work in WP 3.0+ or later
	 */
	function avcufr_dismiss_network_core_update_nag_message() {
		remove_filter( 'network_admin_notices', 'update_nag', 3 );
	}

	/**
	 * Keep GlotPress translations updated when plugin code change.
	 *
	 * The string of translations are keeped (to be re-used without needing to be re-translated) and the translators contributions are preserved.
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.5.8 (Build 2019-01-02) Develop
	 * @since   1.2.3 (Build 2018-04-22) Develop
	 */

	# Since Version 1.0.1
//	__( 'Development Version',                        'admin-footer-version-rebranded' /* translators: respect same uppercase and lowercase of the original (optionally leave in english)              -- development string */ );
	__( 'development version',                        'admin-footer-version-rebranded' /* translators: respect same lowercase of the original (maintain same translation of the core)                  --      active string */ );

	# Since Version 1.0.2
//	__( 'Get Version',                                'admin-footer-version-rebranded' /* translators: respect same uppercase and lowercase of the original (optionally leave in english)              -- development string */ );
	__( 'Get version',                                'admin-footer-version-rebranded' /* translators: respect same uppercase and lowercase of the original (maintain same translation of the core)    --      active string */ );
//	__( 'Stay Updated',                               'admin-footer-version-rebranded' /* translators: respect same uppercase and lowercase of the original (optionally leave in english)              -- development string */ );
	__( 'Stay updated',                               'admin-footer-version-rebranded' /* translators: respect same uppercase and lowercase of the original (maintain same translation of the core)    --      active string */ );
//	__( 'Version',                                    'admin-footer-version-rebranded' /* translators: respect same uppercase of the original (optionally leave in english)                            -- development string */ );
	__( 'version',                                    'admin-footer-version-rebranded' /* translators: respect same lowercase of the original                                                          --      active string */ );
	__( 'not up to date',                             'admin-footer-version-rebranded' /* translators: respect same lowercase of the original (referred to WP version - declining to the feminine)     --      active string */ );
	__( 'not up to date version',                     'admin-footer-version-rebranded' /* translators: respect same lowercase of the original                                                          --      active string */ );
	__( 'latest available',                           'admin-footer-version-rebranded' /* translators: respect same lowercase of the original (referred to WP version - declining to the feminine)     --      active string */ );
	__( 'latest available version',                   'admin-footer-version-rebranded' /* translators: respect same lowercase of the original                                                          --      active string */ );
//	__( 'legacy',                                     'admin-footer-version-rebranded' /* translators: respect same lowercase of the original                                                          --      active string */ );
	__( 'legacy version',                             'admin-footer-version-rebranded' /* translators: respect same lowercase of the original                                                          --      active string */ );
//	__( 'old',                                        'admin-footer-version-rebranded' /* translators: respect same lowercase of the original                                                          --      active string */ );
	__( 'old version',                                'admin-footer-version-rebranded' /* translators: respect same lowercase of the original                                                          --      active string */ );
//	__( 'oldest',                                     'admin-footer-version-rebranded' /* translators: respect same lowercase of the original                                                          --      active string */ );
	__( 'oldest version',                             'admin-footer-version-rebranded' /* translators: respect same lowercase of the original                                                          --      active string */ );
//	__( 'Release',                                    'admin-footer-version-rebranded' /* translators: respect same uppercase of the original (optionally leave in english)                            -- development string */ );

	# Since Version 1.0.3
	__( 'Activation Stopped!',                        'admin-footer-version-rebranded' /* translators: respect same uppercase of the original (when possible) die message when not possible activation --      active string */ );
	__( 'An updated version',                         'admin-footer-version-rebranded' /* translators: respect same uppercase and lowercase of the original                                            --      active string */ );
//	__( 'You are using',                              'admin-footer-version-rebranded' /* translators: respect same uppercase and lowercase of the original (optionally leave in english)              -- development string */ );
	__( 'You are using a',                            'admin-footer-version-rebranded' /* translators: respect same uppercase and lowercase of the original                                            --      active string */ );
//	__( 'You are using the',                          'admin-footer-version-rebranded' /* translators: respect same uppercase and lowercase of the original (optionally leave in english)              -- development string */ );
//	__( 'You have a',                                 'admin-footer-version-rebranded' /* translators: respect same uppercase and lowercase of the original (optionally leave in english)              -- development string */ );
	__( 'You have the',                               'admin-footer-version-rebranded' /* translators: respect same uppercase and lowercase of the original                                            --      active string */ );

	# Since Version 1.0.4
	__( 'Download',                                   'admin-footer-version-rebranded' /* translators: respect same uppercase of the original (notation - this is not a download button)               --      active string */ );
//	__( 'download',                                   'admin-footer-version-rebranded' /* translators: respect same lowercase of the original (optionally leave in english)                            -- development string */ );
//	__( 'Optionally',                                 'admin-footer-version-rebranded' /* translators: respect same uppercase of the original (optionally leave in english)                            -- development string */ );
	__( 'optionally',                                 'admin-footer-version-rebranded' /* translators: respect same lowercase of the original                                                          --      active string */ );
	__( 'of PHP',                                     'admin-footer-version-rebranded' /* translators: respect same uppercase and lowercase of the original                                            --      active string */ );
	__( 'of SQL',                                     'admin-footer-version-rebranded' /* translators: respect same uppercase and lowercase of the original                                            --      active string */ );
	__( 'of WordPress',                               'admin-footer-version-rebranded' /* translators: respect same uppercase and lowercase of the original                                            --      active string */ );
	__( 'latest previous',                            'admin-footer-version-rebranded' /* translators: respect same lowercase of the original (referred to WP version - declining to the feminine)     --      active string */ );
	__( 'latest previous version',                    'admin-footer-version-rebranded' /* translators: respect same lowercase of the original                                                          --      active string */ );
	__( 'previous development version',               'admin-footer-version-rebranded' /* translators: respect same lowercase of the original                                                          --      active string */ );
//	__( 'latest',                                     'admin-footer-version-rebranded' /* translators: respect same lowercase of the original (referred to WP version - declining to the feminine)     -- development string */ );
//	__( 'previous',                                   'admin-footer-version-rebranded' /* translators: respect same lowercase of the original (referred to WP version - declining to the feminine)     -- development string */ );

	# Since Version 1.0.5
//	__( 'run',                                        'admin-footer-version-rebranded' /* translators: respect same lowercase of the original (optionally leave in english)                            -- development string */ );
//	__( 'running',                                    'admin-footer-version-rebranded' /* translators: respect same lowercase of the original (optionally leave in english)                            -- development string */ );
	__( 'Run under',                                  'admin-footer-version-rebranded' /* translators: respect same uppercase and lowercase of the original                                            --      active string */ );
//	__( 'Run under a',                                'admin-footer-version-rebranded' /* translators: respect same uppercase and lowercase of the original                                            -- development string */ );
	__( 'Running under',                              'admin-footer-version-rebranded' /* translators: respect same uppercase and lowercase of the original                                            --      active string */ );
//	__( 'Running under a',                            'admin-footer-version-rebranded' /* translators: respect same lowercase of the original (optionally leave in english)                            -- development string */ );
//	__( 'You are running',                            'admin-footer-version-rebranded' /* translators: respect same uppercase and lowercase of the original (optionally leave in english)              -- development string */ );
//	__( 'You are running under',                      'admin-footer-version-rebranded' /* translators: respect same uppercase and lowercase of the original (optionally leave in english)              -- development string */ );
	__( 'You are running under a',                    'admin-footer-version-rebranded' /* translators: respect same uppercase and lowercase of the original                                            --      active string */ );
	__( 'and fast',                                   'admin-footer-version-rebranded' /* translators: respect same lowercase of the original (referred to WP version - declining to the feminine)     --      active string */ );
	__( 'and slow',                                   'admin-footer-version-rebranded' /* translators: respect same lowercase of the original (referred to WP version - declining to the feminine)     --      active string */ );
	__( 'but not recommended',                        'admin-footer-version-rebranded' /* translators: respect same lowercase of the original (referred to WP version - declining to the feminine)     --      active string */ );
	__( 'but slow',                                   'admin-footer-version-rebranded' /* translators: respect same lowercase of the original (referred to WP version - declining to the feminine)     --      active string */ );
	__( 'insecure',                                   'admin-footer-version-rebranded' /* translators: respect same lowercase of the original (referred to WP version - declining to the feminine)     --      active string */ );
	__( 'obsolete',                                   'admin-footer-version-rebranded' /* translators: respect same lowercase of the original (referred to WP version - declining to the feminine)     --      active string */ );
	__( 'secure',                                     'admin-footer-version-rebranded' /* translators: respect same lowercase of the original (referred to WP version - declining to the feminine)     --      active string */ );
//	__( 'Preview',                                    'admin-footer-version-rebranded' /* translators: respect same uppercase of the original (optionally leave in english)                            -- development string */ );
//	__( 'preview',                                    'admin-footer-version-rebranded' /* translators: respect same lowercase of the original (optionally leave in english)                            -- development string */ );
	__( 'An optional updated version',                'admin-footer-version-rebranded' /* translators: respect same uppercase and lowercase of the original                                            --      active string */ );
	__( 'An optionally updated version',              'admin-footer-version-rebranded' /* translators: respect same uppercase and lowercase of the original                                            --      active string */ );
//	__( 'Optional',                                   'admin-footer-version-rebranded' /* translators: respect same uppercase of the original (optionally leave in english)                            -- development string */ );
//	__( 'optional',                                   'admin-footer-version-rebranded' /* translators: respect same lowercase of the original                                                          --      active string */ );

	# Since Version 1.1.5
	__( 'System Overview Obfuscated',                 'admin-footer-version-rebranded' /* translators: respect same uppercase and lowercase of the original (leave strings capitalized when possible)  --      active string */ );
//	__( 'You do not have access to this information', 'admin-footer-version-rebranded' /* translators: respect same uppercase and lowercase of the original                                            --      active string */ );

	# Migration Strings i18n -- Only for WP 2.8+ or greater -> Fatal error: Call to undefined function _x() (due to the requirements this enhancements is not possibile for now).
//	_x(  'Visit site',                                                                                                                                                               'Plugin URI',         'admin-footer-version-rebranded' /* translators: Plugin URI website not WordPress.org repository */ );
//	_ex( 'Admin Footer Version (rebranded) requires WP 2.3+ or greater: note that the Update Footer (filter) was introduced since WP 2.3.0',                                         'WP Check',           'admin-footer-version-rebranded' /* translators: no translate plugin name leave in English       */ );
//	_ex( 'Admin Footer Version (rebranded) requires PHP 5.2.4 or greater: note that a good choice is PHP 5.6+ ~ 7.2+ (previous stable branch) or PHP 7.3+ (current stable branch).', 'PHP Check',          'admin-footer-version-rebranded' /* translators: no translate plugin name leave in English       */ );
//	_ex( 'Admin Footer Version (rebranded) <strong>can not be deactivate automatically</strong> (WP 2.5+ is required) deactivate it manually!',                                      'Deactivation Check', 'admin-footer-version-rebranded' /* translators: no translate plugin name leave in English       */ );

	/**
	 * System Overview.
	 *
	 * Show current PHP and SQL version on admin footer text using admin_footer_text filter.
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.5 (Build 2019-02-14)
	 * @since   WordPress 2.8+ to 2.9+ (single and multiuser -- MU) or WordPress 3.0+ to 5.1+ ~ 5.2+ (single and multisite -- MS)
	 *
	 * @param   string $msg
	 * @return  string
	 * @todo    Fixing system overview to show in WP 2.7+ admin_footer_text -- Is possibile? Investigating...
	 */
	function core_admin_footer_text_rebranded( $msg = '' ) {
		global $wp_version; $wpmu_version;
		include( ABSPATH . WPINC . '/version.php' );
		$version = str_replace( '-src', '', $wp_version );

		if ( version_compare( $version, '3.0', '>=' ) ) {
			  # case 'obfuscated':
				# Sorry, only users can update core have access to system overview.
				if ( ! current_user_can( 'update_core' ) ) {
					return sprintf( '<span title="' . __( 'This overview has been obfuscated for security reasons.', 'admin-footer-version-rebranded' ) . '"><font style="cursor:help"><strong><u>' . __( 'System Overview Obfuscated', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
				}
		}

		if ( version_compare( $version, '3.0', '<' ) ) {
			if ( version_compare( $version, '2.7', '>=' ) ) {
			  # case 'obfuscated':
				# Sorry, only users can update core have access to system overview.
				if ( ! current_user_can( 'manage_options' ) ) {
					return sprintf( '<span title="' . __( 'This overview has been obfuscated for security reasons.', 'admin-footer-version-rebranded' ) . '"><font style="cursor:help"><u>' . __( 'System Overview Obfuscated', 'admin-footer-version-rebranded' ) . '</u></font></span>' ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
				}
			}
		}

		$connection = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );

		$cur = get_preferred_from_update_core();

		if ( ! is_object( $cur ) ) {
			$cur = new stdClass;
		}

		if ( ! isset( $cur->current ) ) {
			$cur->current = '';
		}

		if ( ! isset( $cur->url ) ) {
			$cur->url = '';
		}

		if ( ! isset( $cur->response ) ) {
			$cur->response = '';
		}

		if ( version_compare( $version, '3.0', '>=' ) ) {

			if ( version_compare( PHP_VERSION, '7.2', '>=' ) ) {
				switch ( $cur->response ) {
					case 'development':
					# . ' - ' . ' ' . get_num_queries() . 'q ' . timer_stop( 0, 2 ) . 's'
					if ( current_user_can( 'update_core' ) ) {
						return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'secure', 'admin-footer-version-rebranded' ) . ' ' . __( 'and fast', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="green"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION . ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="black"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
					}

					case 'upgrade':
					if ( current_user_can( 'update_core' ) ) {
						return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'secure', 'admin-footer-version-rebranded' ) . ' ' . __( 'and fast', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="green"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION . ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="black"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
					}

					case 'latest':
					default:
						return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'secure', 'admin-footer-version-rebranded' ) . ' ' . __( 'and fast', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="green"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION .  ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="black"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
				}
			}

			if ( version_compare( PHP_VERSION, '7.1', '>=' ) ) {
				if ( version_compare( PHP_VERSION, '7.2', '<' ) ) {
				switch ( $cur->response ) {
					case 'development':
					# . ' - ' . ' ' . get_num_queries() . 'q ' . timer_stop( 0, 2 ) . 's'
					if ( current_user_can( 'update_core' ) ) {
						return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'secure', 'admin-footer-version-rebranded' ) . ' ' . __( 'but not recommended', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="black"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION . ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="black"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
					}

					case 'upgrade':
					if ( current_user_can( 'update_core' ) ) {
						return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'secure', 'admin-footer-version-rebranded' ) . ' ' . __( 'but not recommended', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="black"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION . ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="black"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
					}

					case 'latest':
					default:
						return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'secure', 'admin-footer-version-rebranded' ) . ' ' . __( 'but not recommended', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="black"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION .  ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="black"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
					}
				}
			}

			if ( version_compare( PHP_VERSION, '7.0', '>=' ) ) {
				if ( version_compare( PHP_VERSION, '7.1', '<' ) ) {
					switch ( $cur->response ) {
						case 'development':
						# . ' - ' . ' ' . get_num_queries() . 'q ' . timer_stop( 0, 2 ) . 's'
						if ( current_user_can( 'update_core' ) ) {
							return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'obsolete', 'admin-footer-version-rebranded' ) . ' ' . __( 'insecure', 'admin-footer-version-rebranded' ) . ' ' . __( 'and slow', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="red"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION . ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="black"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
						}

						case 'upgrade':
						if ( current_user_can( 'update_core' ) ) {
							return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'obsolete', 'admin-footer-version-rebranded' ) . ' ' . __( 'insecure', 'admin-footer-version-rebranded' ) . ' ' . __( 'and slow', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="red"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION . ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="black"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
						}

						case 'latest':
						default:
							return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'obsolete', 'admin-footer-version-rebranded' ) . ' ' . __( 'insecure', 'admin-footer-version-rebranded' ) . ' ' . __( 'and slow', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="red"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION . ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="black"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
					}
				}
			}

			if ( version_compare( PHP_VERSION, '7.0', '<' ) ) {
				if ( version_compare( PHP_VERSION, '5.6', '>=' ) ) {
					switch ( $cur->response ) {
						case 'development':
						# . ' - ' . ' ' . get_num_queries() . 'q ' . timer_stop( 0, 2 ) . 's'
						if ( current_user_can( 'update_core' ) ) {
							return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'secure', 'admin-footer-version-rebranded' ) . ' ' . __( 'but slow', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="orange"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION . ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="black"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
						}

						case 'upgrade':
						# warming error variale %3$s not show and remove all text - Warning: sprintf(): Too few arguments.
						if ( current_user_can( 'update_core' ) ) {
							return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'secure', 'admin-footer-version-rebranded' ) . ' ' . __( 'but slow', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="orange"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION . ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="black"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
						}

						case 'latest':
						default:
							return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'secure', 'admin-footer-version-rebranded' ) . ' ' . __( 'but slow', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="orange"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION . ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="black"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
					}
				}
			}

			if ( version_compare( PHP_VERSION, '5.6', '<' ) ) {
				switch ( $cur->response ) {
					case 'development':
					# . ' - ' . ' ' . get_num_queries() . 'q ' . timer_stop( 0, 2 ) . 's'
					if ( current_user_can( 'update_core' ) ) {
						return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'obsolete', 'admin-footer-version-rebranded' ) . ' ' . __( 'insecure', 'admin-footer-version-rebranded' ) . ' ' . __( 'and slow', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="red"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION . ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="black"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
					}

					case 'upgrade':
					if ( current_user_can( 'update_core' ) ) {
						return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'obsolete', 'admin-footer-version-rebranded' ) . ' ' . __( 'insecure', 'admin-footer-version-rebranded' ) . ' ' . __( 'and slow', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="red"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION . ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="black"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
					}

					case 'latest':
					default:
						return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'obsolete', 'admin-footer-version-rebranded' ) . ' ' . __( 'insecure', 'admin-footer-version-rebranded' ) . ' ' . __( 'and slow', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="red"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION . ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="black"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
				}
			}
		}

		if ( version_compare( $version, '3.0', '<' ) ) {
			# Todo: indent better here.
			if ( version_compare( $version, '2.8', '>=' ) ) {

			if ( version_compare( PHP_VERSION, '7.2', '>=' ) ) {
				switch ( $cur->response ) {
					case 'development':
					# . ' - ' . ' ' . get_num_queries() . 'q ' . timer_stop( 0, 2 ) . 's'
					if ( current_user_can( 'update_core' ) ) {
						return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'secure', 'admin-footer-version-rebranded' ) . ' ' . __( 'and fast', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="green"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION . ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="white"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
					}

					case 'upgrade':
					if ( current_user_can( 'update_core' ) ) {
						return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'secure', 'admin-footer-version-rebranded' ) . ' ' . __( 'and fast', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="green"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION . ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="white"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
					}

					case 'latest':
					default:
						return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'secure', 'admin-footer-version-rebranded' ) . ' ' . __( 'and fast', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="green"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION .  ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="white"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
				}
			}

			if ( version_compare( PHP_VERSION, '7.1', '>=' ) ) {
				if ( version_compare( PHP_VERSION, '7.2', '<' ) ) {
				switch ( $cur->response ) {
					case 'development':
					# . ' - ' . ' ' . get_num_queries() . 'q ' . timer_stop( 0, 2 ) . 's'
					if ( current_user_can( 'update_core' ) ) {
						return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'secure', 'admin-footer-version-rebranded' ) . ' ' . __( 'but not recommended', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="white"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION . ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="white"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
					}

					case 'upgrade':
					if ( current_user_can( 'update_core' ) ) {
						return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'secure', 'admin-footer-version-rebranded' ) . ' ' . __( 'but not recommended', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="white"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION . ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="white"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
					}

					case 'latest':
					default:
						return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'secure', 'admin-footer-version-rebranded' ) . ' ' . __( 'but not recommended', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="white"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION .  ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="white"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
					}
				}
			}

			if ( version_compare( PHP_VERSION, '7.0', '>=' ) ) {
				if ( version_compare( PHP_VERSION, '7.1', '<' ) ) {
					switch ( $cur->response ) {
						case 'development':
						# . ' - ' . ' ' . get_num_queries() . 'q ' . timer_stop( 0, 2 ) . 's'
						if ( current_user_can( 'update_core' ) ) {
							return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'obsolete', 'admin-footer-version-rebranded' ) . ' ' . __( 'insecure', 'admin-footer-version-rebranded' ) . ' ' . __( 'and slow', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="red"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION . ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="black"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
						}

						case 'upgrade':
						if ( current_user_can( 'update_core' ) ) {
							return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'obsolete', 'admin-footer-version-rebranded' ) . ' ' . __( 'insecure', 'admin-footer-version-rebranded' ) . ' ' . __( 'and slow', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="red"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION . ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="black"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
						}

						case 'latest':
						default:
							return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'obsolete', 'admin-footer-version-rebranded' ) . ' ' . __( 'insecure', 'admin-footer-version-rebranded' ) . ' ' . __( 'and slow', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="red"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION . ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="black"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
					}
				}
			}

			if ( version_compare( PHP_VERSION, '7.0', '<' ) ) {
				if ( version_compare( PHP_VERSION, '5.6', '>=' ) ) {
					switch ( $cur->response ) {
						case 'development':
						# . ' - ' . ' ' . get_num_queries() . 'q ' . timer_stop( 0, 2 ) . 's'
						if ( current_user_can( 'update_core' ) ) {
							return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'secure', 'admin-footer-version-rebranded' ) . ' ' . __( 'but slow', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="orange"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION . ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="white"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
						}

						case 'upgrade':
						# warming error variale %3$s not show and remove all text - Warning: sprintf(): Too few arguments.
						if ( current_user_can( 'update_core' ) ) {
							return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'secure', 'admin-footer-version-rebranded' ) . ' ' . __( 'but slow', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="orange"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION . ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="white"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
						}

						case 'latest':
						default:
							return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'secure', 'admin-footer-version-rebranded' ) . ' ' . __( 'but slow', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="orange"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION . ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="#ccc"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
					}
				}
			}

			if ( version_compare( PHP_VERSION, '5.6', '<' ) ) {
				switch ( $cur->response ) {
					case 'development':
					# . ' - ' . ' ' . get_num_queries() . 'q ' . timer_stop( 0, 2 ) . 's'
					if ( current_user_can( 'update_core' ) ) {
						return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'obsolete', 'admin-footer-version-rebranded' ) . ' ' . __( 'insecure', 'admin-footer-version-rebranded' ) . ' ' . __( 'and slow', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="red"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION . ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="white"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
					}

					case 'upgrade':
					if ( current_user_can( 'update_core' ) ) {
						return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'obsolete', 'admin-footer-version-rebranded' ) . ' ' . __( 'insecure', 'admin-footer-version-rebranded' ) . ' ' . __( 'and slow', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="red"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION . ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="white"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
					}

					case 'latest':
					default:
						return sprintf( __( 'Run under', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are running under a', 'admin-footer-version-rebranded' ) . ' ' . __( 'obsolete', 'admin-footer-version-rebranded' ) . ' ' . __( 'insecure', 'admin-footer-version-rebranded' ) . ' ' . __( 'and slow', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . PHP_VERSION . ' ' . __( 'of PHP', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/support/upgrade-php/">' . '<font style="cursor:help"; color="red"><strong><u>' . __( 'PHP', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . PHP_VERSION . ' ' . '<span title="' . __( 'See recommended requirements', 'admin-footer-version-rebranded' ) . '.' . '"><a href="https://wordpress.org/about/requirements/">' . '<font style="cursor:help"; color="white"><strong><u>' . __( 'SQL', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . '</a>' . ' ' . mysqli_get_server_info( $connection ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
				}
			}
		# Todo: indent better here.
		}
		}
		# Todo: indent better here.

		if ( version_compare( $version, '2.8', '<' ) ) {
			if ( version_compare( $version, '2.7', '>=' ) ) {
				return 'Run under PHP and SQL -- System Overview'; # Test here.
//				return 'Running under PHP and SQL -- System Overview'; # Test here.
			}
		}

	}

	/**
	 * Expand, secure, enhance, core code, in /wp-admin/includes/update.php file.
	 *
	 * Candidate for:
	 * - [Features are being developed plugins first](https://make.wordpress.org/core/features-as-plugins/)?
	 * - Merged on core?
	 *
	 * Features of v1.0.4.1:
	 * - Compatible with 000webhostapp.com services. Find #000webhostapp Tag in code.
	 *
	 * Features of v1.0.4:
	 * - Extendings concept of the "default color" not included in core.
	 * - Introduces concept of the "black color highlighted" not included in core.
	 * - Introduces concept of the "blue color highlighted" not included in core.
	 * - Introduces concept of the "green color highlighted" not included in core.
	 * - Introduces concept of the "previous branche" (only for WP 4.9+) not included in core.
	 * - Introduces concept of the "previous development" not included in core.
	 * - Introduces concept of the "previous version" not included in core.
	 * - Introduces concept of the "previous upgrade" not included in core.
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.4 (Build 2018-12-28)
	 * @since   WordPress 2.7+ to 2.9+ (single and multiuser) or WordPress 3.0+ to 5.1+ ~ 5.2+ (single and multisite)
	 *
	 * @param   string $msg
	 * @return  string
	 */
	function core_update_footer_rebranded( $msg = '' ) {
		global $wp_version; $wpmu_version;
		include( ABSPATH . WPINC . '/version.php' );
		$version = str_replace( '-src', '', $wp_version );

		if ( version_compare( $version, '3.0', '>=' ) ) {
			  # case 'security':
				# Sorry, only users can update core have access to this information.
				if ( ! current_user_can( 'update_core' ) ) {
//					return sprintf( __( 'Version %s' ), get_bloginfo( 'version', 'display' ) );	# Original core code in /wp-admin/includes/update.php file.
					return sprintf( '<span title="' . __( 'This information has been disabled for security reasons.', 'admin-footer-version-rebranded' ) . '"><font style="cursor:help"><u>' . __( 'You do not have access', 'admin-footer-version-rebranded' ) . ' ' . __( 'to this information', 'admin-footer-version-rebranded' ) . '</u></font></span>' . ' ' . '<strong>' . __( 'for security purpose', 'admin-footer-version-rebranded' ) . '</strong>' . '.', get_bloginfo( 'version', 'display' ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
				}
		}

		if ( version_compare( $version, '3.0', '<' ) ) {
			if ( version_compare( $version, '2.7', '>=' ) ) {
			  # case 'security':
				# Sorry, only users can update core have access to this information.
				if ( ! current_user_can( 'manage_options' ) ) {
//					return sprintf( __( 'Version %s' ), get_bloginfo( 'version', 'display' ) );	# Original core code in /wp-admin/includes/update.php file.
					return sprintf( '<span title="' . __( 'This information has been disabled for security reasons.', 'admin-footer-version-rebranded' ) . '"><font style="cursor:help"><u>' . __( 'You do not have access', 'admin-footer-version-rebranded' ) . ' ' . __( 'to this information', 'admin-footer-version-rebranded' ) . '</u></font></span>' . ' ' . '<strong>' . __( 'for security purpose', 'admin-footer-version-rebranded' ) . '</strong>' . '.', get_bloginfo( 'version', 'display' ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
				}
			}
		}

		$cur = get_preferred_from_update_core();

		if ( ! is_object( $cur ) ) {
			$cur = new stdClass;
		}

		if ( ! isset( $cur->current ) ) {
			$cur->current = '';
		}

		if ( ! isset( $cur->url ) ) {
			$cur->url = '';
		}

		if ( ! isset( $cur->response ) ) {
			$cur->response = '';
		}

		# Introduce concept of the "green color highlighted" -- not included in core.
		if ( version_compare( $version, '5.1', '>=' ) ) { // 5.1-RC2 %s
			switch ( $cur->response ) {
				case 'development':
				# . ' - ' . ' ' . get_num_queries() . 'q ' . timer_stop( 0, 2 ) . 's'
				if ( current_user_can( 'update_core' ) ) {
					/* translators: 1: WordPress current version number, 2: WordPress updates core admin URL, 3: WordPress latest version number */
//					return sprintf( __( 'You are using a development version (%1$s). Cool! Please <a href="%2$s">stay updated</a>.' ), get_bloginfo( 'version', 'display' ), network_admin_url( 'update-core.php' ) );	# Original core code in /wp-admin/includes/update.php file.
					return sprintf( __( 'You are using a', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are using a', 'admin-footer-version-rebranded' ) . ' ' . __( 'development version', 'admin-footer-version-rebranded' ) . ' %s ' . __( 'of WordPress', 'admin-footer-version-rebranded' ) . '.' . '"><font style="cursor:help"; color="orange"><strong><u>' . __( 'development version', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . ' %1$s - ' . '<strong>' . '<a href="%2$s">' . __( 'Stay updated', 'admin-footer-version-rebranded' ) . '</a></strong>' . '.', get_bloginfo( 'version', 'display' ), network_admin_url( 'update-core.php' ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
				}

				case 'upgrade':
				if ( current_user_can( 'update_core' ) ) {
//					return '<strong><a href="' . network_admin_url( 'update-core.php' ) . '">' . sprintf( __( 'Get Version %s' ), $cur->current ) . '</a></strong>';	# Original core code in /wp-admin/includes/update.php file.
					return sprintf( __( 'You are using a', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'An updated version', 'admin-footer-version-rebranded' ) . ' %s ' . __( 'of WordPress', 'admin-footer-version-rebranded' ) . ' ' . __( 'is available', 'admin-footer-version-rebranded' ) . '.' . '"><font style="cursor:help"; color="red"><strong><u>' . __( 'not up to date', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . ' ' . '%1$s', get_bloginfo( 'version', 'display' ), network_admin_url( 'update-core.php' ) ) . ' - ' . '<strong><a href="' . network_admin_url( 'update-core.php' ) . '">' . sprintf( __( 'Get version', 'admin-footer-version-rebranded' ) . ' %s', $cur->current ) . '</a></strong>'; // . '<br /><br />' -- Add this for #000webhostapp compatibility. // . __( 'not up to date version', 'admin-footer-version-rebranded' ) .
				}

				# green color concept case.
				case 'latest':
				default:
//					return sprintf( __( 'Version %s' ), get_bloginfo( 'version', 'display' ) );	# Original core code in /wp-admin/includes/update.php file.
					return sprintf( __( 'You are using the', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You have the', 'admin-footer-version-rebranded' ) . ' ' . __( 'latest available', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' %1$s ' . __( 'of WordPress', 'admin-footer-version-rebranded' ) . '.' . '"><font style="cursor:help"; color="green"><strong><u>' . __( 'latest available', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . ' %s', get_bloginfo( 'version', 'display' ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility. // . __( 'latest available version', 'admin-footer-version-rebranded' ) .
			}
		}

		# Introduce concept of the "black color highlighted" -- not included in core.
		if ( version_compare( $version, '5.0', '>=' ) ) { // RC2
			if ( version_compare( $version, '5.1', '<' ) ) { // beta1 5.1-RC2
				switch ( $cur->response ) {
					case 'development':
					# . ' - ' . ' ' . get_num_queries() . 'q ' . timer_stop( 0, 2 ) . 's'
					if ( current_user_can( 'update_core' ) ) {
						/* translators: 1: WordPress current version number, 2: WordPress updates core admin URL, 3: WordPress latest version number */
//						return sprintf( __( 'You are using a development version (%1$s). Cool! Please <a href="%2$s">stay updated</a>.' ), get_bloginfo( 'version', 'display' ), network_admin_url( 'update-core.php' ) );	# Original core code in /wp-admin/includes/update.php file.
						return sprintf( __( 'You are using a', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are using a', 'admin-footer-version-rebranded' ) . ' ' . __( 'development version', 'admin-footer-version-rebranded' ) . ' %s ' . __( 'of WordPress', 'admin-footer-version-rebranded' ) . '.' . '"><font style="cursor:help"; color="orange"><strong><u>' . __( 'development version', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . ' %1$s - ' . '<strong>' . '<a href="%2$s">' . __( 'Stay updated', 'admin-footer-version-rebranded' ) . '</a></strong>' . '.', get_bloginfo( 'version', 'display' ), network_admin_url( 'update-core.php' ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
					}

					case 'upgrade':
					if ( current_user_can( 'update_core' ) ) {
//						return '<strong><a href="' . network_admin_url( 'update-core.php' ) . '">' . sprintf( __( 'Get Version %s' ), $cur->current ) . '</a></strong>';	# Original core code in /wp-admin/includes/update.php file.
						return sprintf( __( 'You are using a', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'An updated version', 'admin-footer-version-rebranded' ) . ' %s ' . __( 'of WordPress', 'admin-footer-version-rebranded' ) . ' ' . __( 'is available', 'admin-footer-version-rebranded' ) . '.' . '"><font style="cursor:help"; color="red"><strong><u>' . __( 'not up to date', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . ' ' . '%1$s', get_bloginfo( 'version', 'display' ), network_admin_url( 'update-core.php' ) ) . ' - ' . '<strong><a href="' . network_admin_url( 'update-core.php' ) . '">' . sprintf( __( 'Get version', 'admin-footer-version-rebranded' ) . ' %s', $cur->current ) . '</a></strong>'; // . '<br /><br />' -- Add this for #000webhostapp compatibility. // . __( 'not up to date version', 'admin-footer-version-rebranded' ) .
					}

					# black color concept case.
					case 'latest':
					default:
//						return sprintf( __( 'Version %s' ), get_bloginfo( 'version', 'display' ) );	# Original core code in /wp-admin/includes/update.php file.
						return sprintf( __( 'You are using the', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You have the', 'admin-footer-version-rebranded' ) . ' ' . __( 'latest available', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' %1$s ' . __( 'of WordPress', 'admin-footer-version-rebranded' ) . '.' . '"><font style="cursor:help"; color="black"><strong><u>' . __( 'latest available', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . ' %s', get_bloginfo( 'version', 'display' ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility. // . __( 'latest available version', 'admin-footer-version-rebranded' ) .
				}
			}
		}

		# Introduce concept of the latest "previous branche" / "previous branche development" version and "blue color highlighted" (only for release 4.9.9) -- not included in core.
		if ( version_compare( $version, '4.9.9', '>=' ) ) {
			if ( version_compare( $version, '5.0', '<' ) ) {
				switch ( $cur->response ) {
					# previous branche concept case.
					case 'development':
					# . ' - ' . ' ' . get_num_queries() . 'q ' . timer_stop( 0, 2 ) . 's'
					if ( current_user_can( 'update_core' ) ) {
						/* translators: 1: WordPress current version number, 2: WordPress updates core admin URL, 3: WordPress latest version number */
//						return sprintf( __( 'You are using a development version (%1$s). Cool! Please <a href="%2$s">stay updated</a>.' ), get_bloginfo( 'version', 'display' ), network_admin_url( 'update-core.php' ) );	# Original core code in /wp-admin/includes/update.php file.
						return sprintf( __( 'You are using a', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are using a', 'admin-footer-version-rebranded' ) . ' ' . __( 'previous development version', 'admin-footer-version-rebranded' ) . ' %s ' . __( 'of WordPress', 'admin-footer-version-rebranded' ) . '.' . '"><font style="cursor:help"; color="orange"><strong><u>' . __( 'previous development version', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . ' %1$s - ' . __( 'optionally', 'admin-footer-version-rebranded' ) . ' ' . '<strong>' . '<a href="%2$s">' . __( 'Stay updated', 'admin-footer-version-rebranded' ) . '</a></strong>' . '.', get_bloginfo( 'version', 'display' ), network_admin_url( 'update-core.php' ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
					}

					# previous branche and blue color concept case.
					case 'upgrade':
					if ( current_user_can( 'update_core' ) ) {
//						return '<strong><a href="' . network_admin_url( 'update-core.php' ) . '">' . sprintf( __( 'Get Version %s' ), $cur->current ) . '</a></strong>';	# Original core code in /wp-admin/includes/update.php file.
						return sprintf( __( 'You are using a', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'An optional updated version', 'admin-footer-version-rebranded' ) . ' ' . __( PLUGIN_ADMIN_FOOTER_VERSION_REBRANDED_UPGRADE ) . ' ' . __( 'of WordPress', 'admin-footer-version-rebranded' ) . ' ' . __( 'is available', 'admin-footer-version-rebranded' ) . '.' . '"><font style="cursor:help"; color="blue"><strong><u>' . __( 'latest previous version', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . ' ' . '%1$s', get_bloginfo( 'version', 'display' ), network_admin_url( 'update-core.php' ) ) . ' - ' . __( 'optionally', 'admin-footer-version-rebranded' ) . ' - ' . '<strong><a href="' . network_admin_url( 'update-core.php' ) . '">' . sprintf( __( 'Get version', 'admin-footer-version-rebranded' ) . ' %s', $cur->current ) . '</a></strong>'; // . '<br /><br />' -- Add this for #000webhostapp compatibility.
					}

					# previous branche and blue color concept case.
					case 'latest':
					default:
//						return sprintf( __( 'Version %s' ), get_bloginfo( 'version', 'display' ) );	# Original core code in /wp-admin/includes/update.php file.
						return sprintf( __( 'You are using the', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You have the', 'admin-footer-version-rebranded' ) . ' ' . __( 'latest previous version', 'admin-footer-version-rebranded' ) . ' %1$s ' . __( 'of WordPress', 'admin-footer-version-rebranded' ) . '.' . '"><font style="cursor:help"; color="blue"><strong><u>' . __( 'latest previous version', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . ' %s', get_bloginfo( 'version', 'display' ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
				}
			}
		}

		if ( version_compare( $version, '3.7', '>=' ) ) {
			if ( version_compare( $version, '4.9.9', '<' ) ) {
				switch ( $cur->response ) {
					case 'development':
					# . ' - ' . ' ' . get_num_queries() . 'q ' . timer_stop( 0, 2 ) . 's'
					if ( current_user_can( 'update_core' ) ) {
						/* translators: 1: WordPress current version number, 2: WordPress updates core admin URL, 3: WordPress latest version number */
//						return sprintf( __( 'You are using a development version (%1$s). Cool! Please <a href="%2$s">stay updated</a>.' ), get_bloginfo( 'version', 'display' ), network_admin_url( 'update-core.php' ) );	# Original core code in /wp-admin/includes/update.php file.
						return sprintf( __( 'You are using a', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are using a', 'admin-footer-version-rebranded' ) . ' ' . __( 'development version', 'admin-footer-version-rebranded' ) . ' %s ' . __( 'of WordPress', 'admin-footer-version-rebranded' ) . '.' . '"><font style="cursor:help"; color="orange"><strong><u>' . __( 'development version', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . ' %1$s - ' . '<strong>' . '<a href="%2$s">' . __( 'Stay updated', 'admin-footer-version-rebranded' ) . '</a></strong>' . '.', get_bloginfo( 'version', 'display' ), network_admin_url( 'update-core.php' ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
					}

					case 'upgrade':
					if ( current_user_can( 'update_core' ) ) {
//						return '<strong><a href="' . network_admin_url( 'update-core.php' ) . '">' . sprintf( __( 'Get Version %s' ), $cur->current ) . '</a></strong>';	# Original core code in /wp-admin/includes/update.php file.
						return sprintf( __( 'You are using a', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'An updated version', 'admin-footer-version-rebranded' ) . ' ' . __( 'of WordPress', 'admin-footer-version-rebranded' ) . ' ' . __( 'is available', 'admin-footer-version-rebranded' ) . '.' . '"><font style="cursor:help"; color="red"><strong><u>' . __( 'not up to date', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . ' ' . '%1$s', get_bloginfo( 'version', 'display' ), network_admin_url( 'update-core.php' ) ) . ' - ' . '<strong><a href="' . network_admin_url( 'update-core.php' ) . '">' . sprintf( __( 'Get version', 'admin-footer-version-rebranded' ) . ' %s', $cur->current ) . '</a></strong>'; // . '<br /><br />' -- Add this for #000webhostapp compatibility. // . __( 'not up to date version', 'admin-footer-version-rebranded' ) .
					}

					case 'latest':
					default:
//						return sprintf( __( 'Version %s' ), get_bloginfo( 'version', 'display' ) );	# Original core code in /wp-admin/includes/update.php file.
						return sprintf( __( 'You are using the', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You have the', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' %1$s ' . __( 'of WordPress', 'admin-footer-version-rebranded' ) . '.' . '"><font style="cursor:help"; color="black"><strong><u>' . __( 'version', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . ' %s', get_bloginfo( 'version', 'display' ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
				}
			}
		}

		if ( version_compare( $version, '3.7', '<' ) ) {
			if ( version_compare( $version, '3.0', '>=' ) ) {
			switch ( $cur->response ) {
				case 'development':
				# . ' - ' . ' ' . get_num_queries() . 'q ' . timer_stop( 0, 2 ) . 's'
				if ( current_user_can( 'update_core' ) ) {
					/* translators: 1: WordPress current version number, 2: WordPress updates core admin URL, 3: WordPress latest version number */
//					return sprintf( __( 'You are using a development version (%1$s). Cool! Please <a href="%2$s">stay updated</a>.' ), get_bloginfo( 'version', 'display' ), network_admin_url( 'update-core.php' ) );	# Original core code in /wp-admin/includes/update.php file.
					return sprintf( __( 'You are using a', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are using a', 'admin-footer-version-rebranded' ) . ' ' . __( 'development version', 'admin-footer-version-rebranded' ) . ' %s ' . __( 'of WordPress', 'admin-footer-version-rebranded' ) . '.' . '"><font style="cursor:help"; color="orange"><strong><u>' . __( 'development version', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . ' %1$s - ' . '<strong>' . '<a href="%2$s">' . __( 'Stay updated', 'admin-footer-version-rebranded' ) . '</a></strong>' . '.', get_bloginfo( 'version', 'display' ), network_admin_url( 'update-core.php' ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
				}

				case 'upgrade':
				if ( current_user_can( 'update_core' ) ) {
//					return '<strong><a href="' . network_admin_url( 'update-core.php' ) . '">' . sprintf( __( 'Get Version %s' ), $cur->current ) . '</a></strong>';	# Original core code in /wp-admin/includes/update.php file.
					return sprintf( __( 'You are using a', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'An updated version', 'admin-footer-version-rebranded' ) . ' ' . __( 'of WordPress', 'admin-footer-version-rebranded' ) . ' ' . __( 'is available', 'admin-footer-version-rebranded' ) . '.' . '"><font style="cursor:help"; color="red"><strong><u>' . __( 'old version', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . ' ' . '%1$s', get_bloginfo( 'version', 'display' ), network_admin_url( 'update-core.php' ) ) . ' - ' . '<strong><a href="' . network_admin_url( 'update-core.php' ) . '">' . sprintf( __( 'Get version', 'admin-footer-version-rebranded' ) . ' %s', $cur->current ) . '</a></strong>'; // . '<br /><br />' -- Add this for #000webhostapp compatibility.
				}

				case 'latest':
				default:
//					return sprintf( __( 'Version %s' ), get_bloginfo( 'version', 'display' ) );	# Original core code in /wp-admin/includes/update.php file.
					return sprintf( __( 'You are using a', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You have the', 'admin-footer-version-rebranded' ) . ' ' . __( 'old version', 'admin-footer-version-rebranded' ) . ' %1$s ' . __( 'of WordPress', 'admin-footer-version-rebranded' ) . '.' . '"><font style="cursor:help"; color="red"><strong><u>' . __( 'old version', 'admin-footer-version-rebranded' ) . '</u></strong></font></span>' . ' %s', get_bloginfo( 'version', 'display' ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
				}
			}
		}

		if ( version_compare( $version, '3.0', '<' ) ) {
			if ( version_compare( $version, '2.7', '>=' ) ) {
				switch ( $cur->response ) {
					case 'development':
					# . ' - ' . ' ' . get_num_queries() . 'q ' . timer_stop( 0, 2 ) . 's'
					if ( current_user_can( 'manage_options' ) ) {
						/* translators: 1: WordPress current version number, 2: WordPress updates core admin URL, 3: WordPress latest version number */
//						return sprintf( __( 'You are using a development version (%1$s). Cool! Please <a href="%2$s">stay updated</a>.' ), get_bloginfo( 'version', 'display' ), network_admin_url( 'update-core.php' ) );	# Original core code in /wp-admin/includes/update.php file.
						return sprintf( __( 'You are using a', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You are using a', 'admin-footer-version-rebranded' ) . ' ' . __( 'development version', 'admin-footer-version-rebranded' ) . ' %s ' . __( 'of WordPress', 'admin-footer-version-rebranded' ) . '.' . '"><font style="cursor:help"; color="orange"><u>' . __( 'development version', 'admin-footer-version-rebranded' ) . '</u></font></span>' . ' %1$s - ' . '<strong>' . '<a href="%2$s">' . __( 'Stay updated', 'admin-footer-version-rebranded' ) . '</a></strong>' . '.', get_bloginfo( 'version', 'display' ), admin_url( 'update-core.php' ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
					}

					case 'upgrade':
					if ( current_user_can( 'manage_options' ) ) {
//						return '<strong><a href="' . network_admin_url( 'update-core.php' ) . '">' . sprintf( __( 'Get Version %s' ), $cur->current ) . '</a></strong>';	# Original core code in /wp-admin/includes/update.php file.
						return sprintf( __( 'You are using a', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'An updated version', 'admin-footer-version-rebranded' ) . ' ' . __( PLUGIN_ADMIN_FOOTER_VERSION_REBRANDED_UPGRADE ) . ' ' . __( 'of WordPress', 'admin-footer-version-rebranded' ) . ' ' . __( 'is available', 'admin-footer-version-rebranded' ) . '.' . '"><font style="cursor:help"; color="red"><u>' . __( 'oldest version', 'admin-footer-version-rebranded' ) . '</u></font></span>' . ' ' . '%1$s', get_bloginfo( 'version', 'display' ), admin_url( 'update-core.php' ) ) . ' - ' . '<strong><a href="' . admin_url( 'update-core.php' ) . '">' . sprintf( __( 'Get version', 'admin-footer-version-rebranded' ) . ' %s', $cur->current ) . '</a></strong>'; // . '<br /><br />' -- Add this for #000webhostapp compatibility.
					}

					case 'latest':
					default:
//						return sprintf( __( 'Version %s' ), get_bloginfo( 'version', 'display' ) );	# Original core code in /wp-admin/includes/update.php file.
						return sprintf( __( 'You are using a', 'admin-footer-version-rebranded' ) . ' ' . '<font style="cursor:help"; color="red"><u><strong>' . '<span title="' . __( 'You have the', 'admin-footer-version-rebranded' ) . ' ' . __( 'oldest version', 'admin-footer-version-rebranded' ) . ' %1$s ' . __( 'of WordPress', 'admin-footer-version-rebranded' ) . '.' . '">' . __( 'oldest version', 'admin-footer-version-rebranded' ) . '</span></strong></u></font>' . ' %s', get_bloginfo( 'version', 'display' ) ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
				}
			}
		}
	}

	/**
	 * Expand, secure, enhance, core code, in /wp-admin/includes/update.php file for legacy versions.
	 *
	 * Candidate for?
	 * - [features are being developed plugins first](https://make.wordpress.org/core/features-as-plugins/)
	 * - merged on core
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.3 (Build 2018-04-28)
	 * @since   Legacy WordPress 2.3+ to 2.5+ or WordPress 2.6+ (single and multiuser)
	 *
	 * @param   string $msg
	 * @return  string
	 */
	function core_update_footer_legacy_rebranded( $msg = '' ) {
		global $wp_version; $wpmu_version;
		include( ABSPATH . WPINC . '/version.php' );
		$version = str_replace( '-src', '', $wp_version );

		if ( ! current_user_can( 'manage_options' ) ) {
		  # case 'security':
			# Sorry, only users can update core have access to this information.
//			return sprintf( '| '.__( 'Version %s' ), $GLOBALS['wp_version'] );	# Original core code in /wp-admin/includes/update.php file.
			return sprintf( '| ' . '<span title="' . __( 'This information has been disabled for security reasons.', 'admin-footer-version-rebranded' ) . '"><font style="cursor:help"><u>' . __( 'You do not have access', 'admin-footer-version-rebranded' ) . ' ' . __( 'to this information', 'admin-footer-version-rebranded' ) . '</u></font></span>' . ' ' . '<strong>' . __( 'for security purpose', 'admin-footer-version-rebranded' ) . '</strong>' . '.', $GLOBALS[ 'wp_version' ] ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
		}

		$cur = get_option( 'update_core' );

		if ( version_compare( $version, '2.4', '>=' ) ) {
			if ( version_compare( $version, '2.7', '<' ) ) {
				switch ( $cur->response ) {
					case 'development' :
					if ( current_user_can( 'manage_options' ) ) {
						/* translators: 1: WordPress current version number, 2: WordPress updates core admin URL, 3: WordPress latest version number */
//						return sprintf( '| '.__( 'You are using a development version (%s). Cool! Please <a href="%s">stay updated</a>.' ), $GLOBALS['wp_version'], $cur->url, $cur->current );	# Original core code in /wp-admin/includes/update.php file.
						return sprintf( '| ' . __( 'You are using a', 'admin-footer-version-rebranded' ) . '<span title="' . __( 'You are using a', 'admin-footer-version-rebranded' ) . ' ' . __( 'development version', 'admin-footer-version-rebranded' ) . ' %s ' . __( 'of WordPress', 'admin-footer-version-rebranded' ) . '.' . '"><font style="cursor:help"; color="orange"><u><strong>' . __( 'development version', 'admin-footer-version-rebranded' ) . '</strong></u></font></span>' . ' %1$s - ' . '<strong>' . '<a href="%2$s">' . __( 'Stay updated', 'admin-footer-version-rebranded' ) . '</a></strong>' . '.', $GLOBALS[ 'wp_version' ], $cur->url, $cur->current ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
					break;
					}

					case 'upgrade' :
					if ( current_user_can( 'manage_options' ) ) {
//						return sprintf( '| <strong>'.__( '<a href="%2$s">Get Version %3$s</a>' ).'</strong>', $GLOBALS['wp_version'], $cur->url, $cur->current );	# Original core code in /wp-admin/includes/update.php file.
						return sprintf( '| ' . __( 'You are using a', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'An updated version', 'admin-footer-version-rebranded' ) . ' %3$s ' . __( 'of WordPress', 'admin-footer-version-rebranded' ) . ' ' . __( 'is available', 'admin-footer-version-rebranded' ) . '.' . '"><font style="cursor:help"; color="red"><u><strong>' . __( 'legacy version', 'admin-footer-version-rebranded' ) . '</strong></u></font></span>' . ' %s - ' . '<a href="%2$s"><span title="' . __( 'Download', 'admin-footer-version-rebranded' ) . ' ' . __( 'latest available', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' %3$s ' . __( 'of WordPress', 'admin-footer-version-rebranded' ) . '.' . '">' . '<font style="cursor:help"><strong>' . __( 'Get version', 'admin-footer-version-rebranded' ) . ' ' . '%3$s' . '</span></a></strong></font>' . '', $GLOBALS[ 'wp_version' ], $cur->url, $cur->current ); // . '<br /><br />' -- Add this for #000webhostapp compatibility. // . __( 'latest available version', 'admin-footer-version-rebranded' ) .
					break;
					}

					case 'latest' :
					default :
//						return sprintf( '| '.__( 'Version %s' ), $GLOBALS['wp_version'], $cur->url, $cur->current );	# Original core code in /wp-admin/includes/update.php file.
						return sprintf( '| ' . __( 'You are using a', 'admin-footer-version-rebranded' ) . ' ' . '<font style="cursor:help"; color="red"><u><strong>' . '<span title="' . __( 'You have the', 'admin-footer-version-rebranded' ) . ' ' . __( 'legacy version', 'admin-footer-version-rebranded' ) . ' %1$s ' . __( 'of WordPress', 'admin-footer-version-rebranded' ) . '.' . '">' . __( 'legacy version', 'admin-footer-version-rebranded' ) . '</span></strong></u></font>' . ' %s', $GLOBALS[ 'wp_version' ], $cur->url, $cur->current ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
					break;
				}
			}
		}

		if ( version_compare( $version, '2.3', '>=' ) ) {
			if ( version_compare( $version, '2.4', '<' ) ) {

//				if ( !current_user_can('manage_options') )
//					return sprintf( '| '.__( 'Version %s' ), $GLOBALS['wp_version'] );

				$cur = get_option( 'update_core' );

				switch ( $cur->response ) {
					case 'development' :
					if ( current_user_can( 'manage_options' ) ) {
						/* translators: 1: WordPress current version number, 2: WordPress updates core admin URL, 3: WordPress latest version number */
//						return sprintf( '| '.__( 'You are using a development version (%s). Cool! Please <a href="%s">stay updated</a>.' ), $GLOBALS['wp_version'], $cur->url, $cur->current );	# Original core code in /wp-admin/includes/update.php file.
						return sprintf( '| ' . __( 'You are using a', 'admin-footer-version-rebranded' ) . '<span title="' . __( 'You are using a', 'admin-footer-version-rebranded' ) . ' ' . __( 'development version', 'admin-footer-version-rebranded' ) . ' %s ' . __( 'of WordPress', 'admin-footer-version-rebranded' ) . '.' . '"><font style="cursor:help"; color="orange"><u><strong>' . __( 'development version', 'admin-footer-version-rebranded' ) . '</strong></u></font></span>' . ' %1$s - ' . '<a href="%2$s"><strong>' . __( 'Stay updated', 'admin-footer-version-rebranded' ) . '</strong></a>' . '.', $GLOBALS[ 'wp_version' ], $cur->url, $cur->current ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
					break;
					}

					case 'upgrade' :
					if ( current_user_can( 'manage_options' ) ) {
//						return sprintf( '| <strong>'.__( '<a href="%2$s">Get Version %3$s</a>' ).'</strong>', $GLOBALS['wp_version'], $cur->url, $cur->current );	# Original core code in /wp-admin/includes/update.php file.
//						return sprintf( '| ' . __( '<strong>Your WordPress %s is <span title="An updated version of WordPress is available."><font style="cursor:help"; color="red"><u>out of date</u></font></span>.</strong>', 'admin-footer-version-rebranded' ) . __( ' <strong><a href="%2$s"><span title="Download latest version of WordPress."><font style="cursor:help">Please Update</font></span></a>.</strong> %3$s', 'admin-footer-version-rebranded' ), $GLOBALS[ 'wp_version' ], $cur->url, $cur->current );	# This is the older notification message legacy style.
						return sprintf( '| ' . __( 'You are using a', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'An updated version', 'admin-footer-version-rebranded' ) . ' ' . __( PLUGIN_ADMIN_FOOTER_VERSION_REBRANDED_UPGRADE ) . ' ' . __( 'of WordPress', 'admin-footer-version-rebranded' ) . ' ' . __( 'is available', 'admin-footer-version-rebranded' ) . '.' . '"><font style="cursor:help"; color="red"><u><strong>' . __( 'legacy version', 'admin-footer-version-rebranded' ) . '</strong></u></font></span>' . ' %1$s - ' . '<a href="%2$s"><span title="' . __( 'Download', 'admin-footer-version-rebranded' ) . ' ' . __( 'latest available', 'admin-footer-version-rebranded' ) . ' ' . __( 'version', 'admin-footer-version-rebranded' ) . ' ' . __( PLUGIN_ADMIN_FOOTER_VERSION_REBRANDED_UPGRADE ) . ' ' . __( 'of WordPress', 'admin-footer-version-rebranded' ) . '.' . '"><font style="cursor:help"><strong>' . __( 'Get version', 'admin-footer-version-rebranded' ) . ' ' . __( PLUGIN_ADMIN_FOOTER_VERSION_REBRANDED_UPGRADE ) . '</strong></font></span></a>', $GLOBALS[ 'wp_version' ], $cur->url, $cur->current ); // . '<br /><br />' -- Add this for #000webhostapp compatibility. // . __( 'latest available version', 'admin-footer-version-rebranded' ) .
					break;
					}

					case 'latest' :
					default :
//						return sprintf( '| '.__( 'Version %s' ), $GLOBALS['wp_version'], $cur->url, $cur->current );	# Original core code in /wp-admin/includes/update.php file.
						return sprintf( '| ' . __( 'You are using a', 'admin-footer-version-rebranded' ) . ' ' . '<span title="' . __( 'You have the', 'admin-footer-version-rebranded' ) . ' ' . __( 'legacy version', 'admin-footer-version-rebranded' ) . ' %1$s ' . __( 'of WordPress', 'admin-footer-version-rebranded' ) . '.' . '"><font style="cursor:help"; color="red"><u><strong>' . __( 'legacy version', 'admin-footer-version-rebranded' ) . '</strong></u></font></span>' . ' %s', $GLOBALS[ 'wp_version' ], $cur->url, $cur->current ); // . '<br /><br />' -- Add this for #000webhostapp compatibility.
					break;
				}
			}
		}
	}
}
