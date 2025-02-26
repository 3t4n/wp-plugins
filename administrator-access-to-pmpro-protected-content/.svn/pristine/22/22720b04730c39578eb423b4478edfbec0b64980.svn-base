<?php
/*
Plugin Name: Administrator Access to PMPro Protected Content
Plugin URI: https://wordpress.org/plugins/administrator-access-to-pmpro-protected-content
Description: Give any WordPress administrator role the right to see/view any Post or Page on a WordPress site that has been assigned to/protected by a Paid Memberships Pro (PMPro) "Required Membership"
Version: 1.3
Author: eighty20results
Author URI: https://eighty20results.com/thomas-sjolshagen/
License: GPL2
*/

/**
 *  Copyright (c) 2018 - 2020. - Eighty / 20 Results by Wicked Strong Chicks.
 *  ALL RIGHTS RESERVED
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 *  You can contact us at mailto:info@eighty20results.com
 */

namespace E20R\PMPro\Access_Rights;

if ( ! class_exists( '\E20R\PMPro\Access_Rights\adminOverride' ) ) {
	
	/**
	 * Class adminOverride
	 * @package E20R\PMPro\Access_Rights
	 */
	class adminOverride {
		
		/**
		 * Instance of the class
		 *
		 * @var null|adminOverride
		 */
		private static $instance = null;
		
		/**
		 * adminOverride constructor
		 *
		 * @access private
		 */
		private function __construct() {
		}
		
		/**
		 * Return or instantiate the \E20R\PMPro\Access_Rights\adminOverride class
		 *
		 * @return adminOverride
		 */
		public static function getInstance() {
			
			if ( is_null( self::$instance ) ) {
				self::$instance = new self;
			}
			
			return self::$instance;
		}
		
		/**
		 * Load the override hooks
		 *
		 * @since v1.1 - BUG FIX: Didn't prevent redirect(s) when accessing the Membership Account page
		 */
		public function loadHooks() {
			
			add_filter( 'pmpro_has_membership_access_filter', array( $this, 'adminAccessPermitted' ), 9999, 4 );
			add_filter( 'pmpro_member_shortcode_access', array( $this, 'shortcodeAccessPermitted' ), 9999, 4 );
			
			if ( current_user_can( 'manage_options' ) ) {
				add_filter( 'pmpro_account_preheader_redirect', '__return_false', 9999 );
			}
		}
		
		/**
		 * Override for the PMPro [membership] shortcode access check
		 *
		 * @param bool   $hasAccess
		 * @param string $content
		 * @param int[]  $levels
		 * @param int    $delay
		 *
		 * @return bool
		 *
		 * @since v1.2 - ENHANCEMENT: Add check override when using [membership] short code
		 */
		public function shortcodeAccessPermitted( $hasAccess, $content, $levels, $delay ) {
			
			// Do nothing if the user already has access
			if ( true === $hasAccess ) {
				return $hasAccess;
			}
			
			$user = function_exists( 'get_current_user' ) ? get_current_user() : false;
			
			if ( empty( $user ) ) {
				return false;
			}
			
			// Use adminAccessPermitted() to actually check access permission for potential admin user
			return $this->adminAccessPermitted( $hasAccess, null, $user, $levels );
		}
		
		/**
		 * Administrators override the PMPro based access restrictions for a post or page
		 *
		 * @param bool     $hasAccess     - Current access status for the post/page
		 * @param \WP_Post $postToCheck   - The WP_Post object to check access for
		 * @param \WP_User $userToCheck   - The WP_User object to check access for
		 * @param array    $levelsToCheck - The level(s) to check (list)
		 *
		 * @filter pmpro_has_membership_access_filter - General access control filter for Paid Memberships Pro
		 *
		 * @return bool
		 *
		 * @since  v1.0
		 * @since  v1.2 - BUG FIX: Didn't guarantee false return when user isn't logged in or not an admin
		 */
		public function adminAccessPermitted( $hasAccess, $postToCheck, $userToCheck, $levelsToCheck ) {
			
			// Already has access
			if ( true === $hasAccess ) {
				return $hasAccess;
			}
			
			// Not a logged in user
			if ( ! is_user_logged_in() ) {
				return false;
			}
			
			// Only applies to users with the administrator role
			if ( ! in_array( 'administrator', $userToCheck->roles ) ) {
				return false;
			}
			
			// Having the 'manage_options' capability grants access
			return user_can( $userToCheck, 'manage_options' );
		}
	}
}

add_action( 'plugins_loaded', array( adminOverride::getInstance(), 'loadHooks' ), 99 );
