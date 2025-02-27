<?php
/**
 * Plugin Name: Chatroll Live Chat
 * Plugin URI: https://chatroll.com
 * Description: Chatroll lets you easily add live chat to your WordPress sidebar, posts and pages. Chatroll can be fully customized to match your site's design. Supports WordPress profiles and optional Facebook and Twitter login. To get started, go to Chatroll.com to create a chat and follow the WordPress embed instructions.
 * Version: 2.6.0
 * Author: Chatroll
 * Author URI: https://chatroll.com
 * Text Domain: chatroll-live-chat
 * License: GPLv2
 */

/*  
	Copyright 2010-2025  Chatroll (email : support@chatroll.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
require_once('chatroll.php');

class wpChatrollException extends Exception {}

/**
 * wpChatroll is the class that handles everything outside the widget.
 */
class wpChatroll extends Chatroll
{
	/**
	 * Static property to hold our singleton instance
	 */
	static $instance = false;

	/**
	 * @var array Plugin settings
	 */
	private $_settings;

	/**
	 * This is our constructor, which is private to force the use of getInstance()
	 * @return void
	 */
	private function __construct() {
		/**
		 * Add filters and actions
		 */
		add_filter( 'init', array( $this, 'init_locale' ) );
		add_filter( 'plugin_action_links', array( $this, 'addPluginPageLinks' ), 10, 2 );
		add_shortcode( 'chatroll', array( $this, 'handleShortcode' ) );
	}

	/**
	 * Function to instantiate our class and make it a singleton
	 */
	public static function getInstance() {
		if ( !self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	public function init_locale() {
		$lang_dir = basename(dirname(__FILE__)) . '/languages';
		load_plugin_textdomain('chatroll-live-chat', false, $lang_dir);
	}

	public function addPluginPageLinks( $links, $file ){
		if ( $file == plugin_basename(__FILE__) ) {
			// Create Chatroll link
			$link = '<a href="https://chatroll.com/" target="_blank">' . __('Chatroll Dashboard', 'chatroll-live-chat') . '</a>';
			array_push( $links, $link );

			// Add Support link to our plugin
			$link = $this->getContactSupportLink();
			array_push( $links, $link );
		}
		return $links;
	}

	public function getContactSupportLink() {
		return '<a href="https://chatroll.com/help/support?r=wordpress-org" target="_blank">' . __('Contact Support', 'chatroll-live-chat') . '</a>';
	}

	public function register() {
		register_widget('WP_Chatroll');
	}

	/**
	 * OVERRIDE Chatroll::appendPlatformDefaultAttr()
	 *  Set user parameters for SSO integration
	 */
	public function appendPlatformDefaultAttr($attr) {
		$attr['platform'] = 'wordpress-org';

		// Generate SSO attributes that were not specified
		$current_user = wp_get_current_user();

		if (empty($attr['uid'])) {
			$attr['uid'] = $current_user->ID;
		}
		if (empty($attr['uname'])) {
			// Get the display name to populate the Chatroll 'uname' parameter.
			// The method to retrieve the display name depends on what plugins are active.
			// To request support for additional plugins, please contact support@chatroll.com.
			$display_name = '';
			if (function_exists('um_get_display_name')) {
				// Ultimate Member plugin is active
				$display_name = um_get_display_name( $current_user->ID );
			}
			if (empty($display_name)) {
				$display_name = $current_user->display_name;
			}
			$attr['uname'] = $display_name;
		}
		if (empty($attr['upic'])) {
			// Get the avatar URL to populate the Chatroll 'upic' parameter.
			// The method to retrieve the avatar URL depends on which plugins are active.
			// To request support for additional plugins, please contact support@chatroll.com.
			$avatar_url = '';

			// WP User Avatar
			if ($avatar_url == '' && function_exists('get_wp_user_avatar_src')) {
				$avatar_url = get_wp_user_avatar_src($current_user->ID, 96);
			}

			// WordPress Social Login
			if ($avatar_url == '' && function_exists('wsl_get_user_custom_avatar')) {
				$avatar_url = wsl_get_user_custom_avatar($current_user->ID);
			}

			// Ultimate Member
			if ($avatar_url == '' && function_exists('um_get_avatar_uri')) {
				if ( um_profile('profile_photo') ) {
					$avatar_url = um_get_avatar_uri( um_profile('profile_photo'), 96 );
				} else {
					$avatar_url = um_get_default_avatar_uri();
				}
			}

			// BuddyPress
			if ($avatar_url == '' && function_exists('bp_core_fetch_avatar')) {
				$avatar_url = bp_core_fetch_avatar(array(
					'html' => false,
					'no_grav' => true,
					'item_id' => $current_user->ID,
					'type' => 'thumb',
					'width' => 96,
					'height' => 96));
			}

			// WordPress >= 4.2.0
			if ($avatar_url == '' && function_exists('get_avatar_url')) {
				$avatar_url = get_avatar_url($current_user->ID, 96);
			}

			// WordPress < 4.2.0
			if ($avatar_url == '' && function_exists('get_avatar')) {
				// Set the picture using 'get_avatar' (available in WordPress 2.5 and up)
				$avatar = get_avatar($current_user->ID, 96);
				$avatar_url = preg_replace("/.*src='([^']*)'.*/", "$1", $avatar);
				if (strlen($avatar_url) > 0) {
					if ($avatar_url[0] == '/') {
						// Turn relative image URIs into absolute image URLs.
						$url = get_bloginfo('url');
						$domain = preg_replace("/^(http[s]?:\/\/[^\/]+).*/", "$1", $url);
						$avatar_url = $domain . $avatar_url;
					}
                    // The gravatar image URL is extracted from an image tag and ampersands (&) are escaped to &amp;
                    // Thus we need to un-escape the specialchars. (e.g. &amp; -> &)
					$avatar_url = htmlspecialchars_decode($avatar_url);
				}
			}

			// DEBUG
			/*
			print "<pre>";
			print "\nAvatar URL: ";
			print_r($avatar_url);
			print "</pre>";
			*/

			// Set the 'upic' parameter:
	        // Chatroll uses the URL to download the avatar, so this must be an absolute, publicly accessible URL.
			$attr['upic'] = $avatar_url;
		}
		if (empty($attr['ulink'])) {
			$attr['ulink'] = $current_user->user_url;
		}
		if (empty($attr['ismod'])) {
			// By default, if the user can moderate comments, they can moderate the chat
			$attr['ismod'] = current_user_can('moderate_comments') ? '1' : '0';
		}
		return $attr;
	}

	/**
	 * Replace our shortCode with the Chatroll iframe
	 *
	 * @param array $attr - array of attributes from the shortCode
	 * @param string $content - Content of the shortCode
	 * @return string - formatted XHTML replacement for the shortCode
	 */
	public function handleShortcode($attr, $content = '') {
		return $this->renderChatrollHtml($attr);
	}
}

/**
 * Instantiate our class
 */
$wpChatroll = wpChatroll::getInstance();
?>
