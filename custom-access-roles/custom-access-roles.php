<?php
/*
Plugin Name: Custom Access Roles
Description: Create custom roles with editing capability for only specific pages, categories and post types.
Version: 2.1.2.1
Author: Room 34 Creative Services, LLC
Author URI: http://room34.com
Text Domain: caroles
License: GPL2
*/

/*  Copyright 2016 Room 34 Creative Services, LLC (email: info@room34.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as 
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Don't load directly
if (!defined('ABSPATH')) { exit; }

if (!class_exists('CARoles')) {

	/**
	 * The main Custom Access Roles class.
	 *
	 * @since 0.1.0
	 */
	class CARoles {

		/**
		 * The class name.
		 *
		 * @since 0.3.0
		 */
		const NAME = 'Custom Access Roles';

		/**
		 * The current class version.
		 *
		 * @since 0.3.0
		 */
		const VERSION = '2.1.2';

		/**
		 * Technical support email address.
		 *
		 * @since 0.3.0
		 */
		const SUPPORT_EMAIL = 'support@room34.com';

		/**
		 * Debugger status.
		 *
		 * @since 0.3.0
		 */
		const DEBUG = false;

		/**
		 * Determines whether or not admins can delete roles that have assigned users.
		 *
		 * @since 0.3.0
		 */
		var $allow_delete_assigned_roles = true;

		/**
		 * List of core WordPress and common third-party plugin roles that cannot be
		 * edited by this plugin. Roles added by third-party plugins are indicated
		 * in comments.
		 *
		 * @since 0.2.0
		 */
		var $excluded_roles = array(
			'administrator',
			'author',
			'contributor',
			'customer', // WooCommerce
			'editor',
			'shop_manager', // WooCommerce
			'subscriber',
		);

		/**
		 * A hierarchical array of built-in WordPress capabilities, grouped by the
		 * lowest role that has each capability.
		 *
		 * The 0 or 1 values indicate whether or not each of these capabilities should
		 * be assigned to newly created roles by default. The defaults here are a
		 * carefully selected set of "editor-lite" capabilities that should be
		 * suitable in most cases.
		 *
		 * @since 0.3.0
		 */
		var $default_capabilities = array(
			'subscriber' => array(
				'read' => 1,
			),
			'contributor' => array(
				'delete_posts' => 1,
				'edit_posts' => 1,
			),
			'author' => array(
				'delete_published_posts' => 1,
				'edit_published_posts' => 1,
				'publish_posts' => 0,
				'upload_files' => 1,
			),
			'editor' => array(
				'delete_others_pages' => 0,
				'delete_others_posts' => 0,
				'delete_pages' => 1,
				'delete_private_pages' => 0,
				'delete_private_posts' => 0,
				'delete_published_pages' => 0,
				'edit_others_pages' => 1,
				'edit_others_posts' => 1,
				'edit_pages' => 1,
				'edit_private_pages' => 1,
				'edit_private_posts' => 1,
				'edit_published_pages' => 1,
				'manage_categories' => 0,
				'manage_links' => 0,
				'moderate_comments' => 0,
				'publish_pages' => 0,
				'read_private_pages' => 1,
				'read_private_posts' => 1,
				'unfiltered_html' => 0,
			),
			'administrator' => array(
				'activate_plugins' => 0,
				'create_users' => 0,
				'delete_plugins' => 0,
				'delete_themes' => 0,
				'delete_users' => 0,
				'edit_dashboard' => 0,
				'edit_files' => 0,
				'edit_plugins' => 0,
				'edit_theme_options' => 0,
				'edit_themes' => 0,
				'edit_users' => 0,
				'export' => 0,
				'import' => 0,
				'install_plugins' => 0,
				'install_themes' => 0,
				'list_users' => 0,
				'manage_options' => 0,
				'promote_users' => 0,
				'remove_users' => 0,
				'switch_themes' => 0,
				'update_core' => 0,
				'update_plugins' => 0,
				'update_themes' => 0,
			),
			'custom' => array(),
		);


		/**
		 * Initializes plugin by setting up actions to call methods at appropriate times.
		 *
		 * @since 0.1.0
		 *
		 * @return	N/A.
		 */
		public function __construct() {

			// Administration set-up
			add_action('admin_menu', array(&$this, 'add_users_page'));
			add_action('admin_enqueue_scripts', array(&$this, 'admin_scripts'));

			// Append custom capabilities
			add_action('admin_menu', array(&$this, 'append_custom_capabilities'));

			// Modify access to admin elements based on user role
			add_action('admin_menu', array(&$this, 'admin_menu_modifications'));

			// Check user's capabilities
			add_filter('user_has_cap', array(&$this, 'check_user_capabilities'), 10, 3);
			
			// Exclude pages from admin queries if user only has read access
			add_action('pre_get_posts', array(&$this, 'exclude_restricted_items_from_query'));

		}


		/**
		 * Adds pages to admin menu for administrators of the plugin settings.
		 *
		 * @since 0.1.0
		 *
		 * @return	N/A.
		 */
		public function add_users_page() {
			add_users_page(
				self::NAME,
				self::NAME,
				'edit_users',
				'caroles',
				array(&$this, 'users_page_interface')
			);
			if (self::DEBUG) {
				add_users_page(
					self::NAME . ' Debugger',
					'CARoles Debugger',
					'manage_options',
					'caroles-debug',
					array(&$this, 'debug')
				);
			}
		}


		/**
		 * Modifies admin menu based on current user's role.
		 *
		 * @since 0.1.0
		 *
		 * @global	object	$current_user	The currently logged in user..
		 *
		 * @return	N/A.
		 */
		public function admin_menu_modifications() {

			// Get user's role options
			global $current_user;
			if ($user_role = $this->get_current_user_role()) {
				$role_options = get_option('caroles_role_' . $user_role);
			}

			// Only make changes if this is a custom role
			if (!empty($role_options)) {

				// Read role content restrictions
				$role_pages = explode(',',$role_options['role_pages']);
				$role_cat = explode(',',$role_options['role_cat']);
				$role_cpt = explode(',',$role_options['role_cpt']);

				// Remove any CPTs the user can't access
				$cpts = get_post_types(array(
					'_builtin' => false,
					'public' => true,
				));
				foreach ((array)$cpts as $cpt) {
					if (!in_array($cpt,$role_cpt)) {
						remove_menu_page('edit.php?post_type='.$cpt);
					}
				}

				// Third-party plugin-specific changes

				// Remove CMS Tree View
				remove_submenu_page('edit.php?post_type=page','cms-tpv-page-page');

			}
			return null;
		}


		/**
		 * Enqueues admin scripts and styles. Should only be loaded with
		 * admin_enqueue_scripts action.
		 *
		 * @since 0.1.0
		 *
		 * @return	N/A.
		 */
		public function admin_scripts() {
			wp_enqueue_script('caroles_admin_js', plugin_dir_url(__FILE__) . 'caroles_admin.js', array('jquery'), self::VERSION);
			wp_enqueue_style('caroles_admin_css', plugin_dir_url(__FILE__) . 'caroles_admin.css', false, self::VERSION);
		}


		/**
		 * Reads custom capabilities (e.g. those added by third-party plugins) and
		 * appends them to default_capabilities property.
		 *
		 * @since 0.1.0
		 *
		 * @return	N/A.
		 */
		public function append_custom_capabilities() {
			$default_capabilities = $this->default_capabilities;
			$flat_list = array();
			$custom_capabilities = array();
			foreach ((array)$default_capabilities as $role => $capabilities) {
				foreach (array_keys((array)$capabilities) as $capability) {
					$flat_list[] = $capability;
				}
			}
			$administrator = get_role('administrator');
			foreach (array_keys((array)$administrator->capabilities) as $admin_cap) {
				if (!in_array($admin_cap,$flat_list)) { $custom_capabilities[$admin_cap] = 0; }
			}
			uksort($custom_capabilities, 'strnatcasecmp');
			$this->default_capabilities['custom'] = $custom_capabilities;
		}


		/**
		 * Modifies user's capabilities for user_has_cap filter based on custom
		 * role settings.
		 *
		 * @since 0.1.0
		 *
		 * @link	https://codex.wordpress.org/Plugin_API/Filter_Reference/user_has_cap
		 *
		 * @global	object	$current_user	The currently logged in user.
		 *
		 * @param	array	$allcaps		All the capabilities of the user.
		 * @param	array	$cap			[0] Required capability.
		 * @param	array	$args			[0] Requested capability.
		 *									[1] User ID.
		 *									[2] Associated object ID.
		 * @return	Capabilities array for user_has_cap filter.
		 */
		public function check_user_capabilities($allcaps, $cap, $args) {
			// These restrictions only apply to WP admin
			if (!is_admin()) { return $allcaps; }

			// Get user's role options
			global $current_user;
			if ($user_role = $this->get_current_user_role()) {
				$role_options = get_option('caroles_role_' . $user_role);
			}

			// No role options set -- no restrictions
			if (empty($role_options)) { return $allcaps; }

			// Read role content restrictions
			$role_pages = explode(',',$role_options['role_pages']);
			$role_cat = explode(',',$role_options['role_cat']);
			$role_cpt = explode(',',$role_options['role_cpt']);

			$deny_access = false;

			// Built-in post types that allow controlled access (all others will be entirely restricted)
			//$built_in = get_post_types(array('_builtin' => 1));
			$built_in = array('page','post');

			if (isset($args[2]) && $post = get_post($args[2])) {

				// Users can always edit their own posts
				if ($post && $post->post_author == $current_user->ID) { $deny_access = false; }

				// Apply restrictions to editing/deleting pages
				elseif ($args[0] == 'edit_post' || $args[0] == 'delete_post') {
					// Does user have access to edit this single page?
					if ($post->post_type == 'page' && !in_array($args[2], $role_pages)) {
						$deny_access = true;
					}

					// Does user have access to this post's category?
					elseif ($post->post_type == 'post') {
						// Check post category
						$deny_access = true;
						$terms = get_the_terms($post->ID, 'category');
						$cats = array();
						foreach ((array)$terms as $term) {
							if (in_array($term->term_id, $role_cat)) { $deny_access = false; break; }
						}
					}

					// Does user have access to this custom post type?
					elseif (!in_array($post->post_type, $built_in) && !in_array($post->post_type, $role_cpt)) {
						$deny_access = true;
					}
				}
			}

			// Set user's capabilities to read-only
			if ($deny_access) {
				$allcaps = array(
					'read' => 1,
					'level_0' => 1,
				);
			}

			return $allcaps;
		}


		/**
		 * Converts WordPress capabilities array to a comma-delimited string.
		 *
		 * @since 0.1.0
		 *
		 * @param	array	$capabilities	All the capabilities of the user.
		 * @return	Capabilities concatenated as a comma-delimited string.
		 */
		public function concat_capabilities($capabilities) {
			$arr = array();
			foreach ((array)$capabilities as $capability => $allowed) {
				if ($allowed) { $arr[] = $capability; }
			}
			return implode(',',$arr);
		}


		/**
		 * Debugger used in plugin development. Output appears in WP Admin under
		 * Users > CARoles Debugger.
		 *
		 * @since 0.1.0
		 *
		 * @return	N/A.
		 */
		public function debug() {
			if (self::DEBUG) {
				// Debugging code goes here
			}
		}


		/**
		 * Excludes items that user does not have access to from queries.
		 *
		 * @since 2.0.0
		 *
		 * @return	N/A.
		 */
		public function exclude_restricted_items_from_query($query) {
			if (is_admin()) {
				
				// Get user's role options
				global $current_user;
				if ($user_role = $this->get_current_user_role()) {
					$role_options = get_option('caroles_role_' . $user_role);
				}
				
				if (isset($query->query_vars['post_type'])) {
					// Restrict specific pages
					if ($query->query_vars['post_type'] == 'page' && !empty($role_options['role_pages'])) {
						$query->set('post__in',explode(',',$role_options['role_pages']));
					}
				
					// Restrict post categories
					elseif ($query->query_vars['post_type'] == 'post' && !empty($role_options['role_cat'])) {
						$query->set('category__in',explode(',',$role_options['role_cat']));
					}
				}
				
				// Restrict custom post types
				// @todo Verify whether or not anything is needed for this.
				
			}
			return $query;
		}
		

		/**
		 * Converts comma-delimited string back into WordPress capabilities array.
		 *
		 * @since 0.1.0
		 *
		 * @param	string	$str			Capabilities as a comma-delimited string.
		 * @return	Capabilities in WordPress array format.
		 */
		public function explode_capabilities($str) {
			$capabilities = array_flip(explode(',',$str));
			foreach (array_keys((array)$capabilities) as $capability) {
				$capabilities[$capability] = 1;
			}
			return $capabilities;
		}


		/**
		 * Reads current user's role and returns as a string.
		 *
		 * @since 0.1.0
		 *
		 * @global	object	$current_user	The currently logged in user.
		 *
		 * @return	Role name as a string
		 */
		public function get_current_user_role() {
			global $current_user;
			if (!empty($current_user->roles)) {
				return $current_user->roles[key($current_user->roles)];
			}
			return false;
		}


		/**
		 * Reads multidimensional default_capabilities array into the WordPress format.
		 *
		 * @since 0.1.0
		 *
		 * @return	Array of capabilities in WordPress format.
		 */
		public function get_default_capabilities() {
			$caps = array();
			foreach ((array)$this->default_capabilities as $role => $capabilities) {
				foreach ((array)$capabilities as $capability => $allowed) {
					if ($allowed) { $caps[$capability] = 1; }
				}
			}
			return $caps;
		}


		/**
		 * Gets a list of custom roles admins can delete. Depending on
		 * allow_delete_assigned_roles setting, admins may or may not be able to
		 * delete custom roles that have users. The default is to allow it. 
		 *
		 * @since 0.1.0
		 *
		 * @return	Array containing a list of the roles that can be deleted.
		 */
		public function get_deletable_roles() {
			$roles = $this->get_included_roles();
			if (!$this->allow_delete_assigned_roles) {
				$user_count = count_users();
				foreach ((array)$roles as $role_slug => $role) {
					if (!empty($user_count['avail_roles'][$role_slug])) { unset($roles[$role_slug]); }
				}
			}
			return $roles;
		}


		/**
		 * Gets a list of custom roles admins can edit. Excludes core WordPress
		 * and some third-party plugin roles. 
		 *
		 * @since 0.1.0
		 *
		 * @return	Array containing a list of the roles that can be edited.
		 */
		public function get_included_roles() {
			$roles = get_editable_roles();
			$included_roles = $roles;
			// Remove excluded roles
			foreach ((array)$this->excluded_roles as $excluded_role) {
				unset($included_roles[$excluded_role]);
			}
			return $included_roles;
		}


		/**
		 * Uses get_included_roles() method to retrieve list of roles and formats
		 * them as HTML option tags. 
		 *
		 * @since 0.1.0
		 *
		 * @param	string	$default		Optional. Default value to have
		 * 									preselected when the menu loads.
		 * 									Defaults to null.
		 * @param	string	$placeholder	Optional. Placeholder text for first,
		 * 									"empty" option. Defaults to defined string.
		 * @return	HTML set of option tags; containing select tag must be in template.
		 */
		public function get_included_roles_dropdown($default=null, $placeholder='Select a role to edit...') {
			$output = '<option value="">' . strip_tags($placeholder) . '</option>';
			$roles = $this->get_included_roles();
			if (empty($roles)) { return false; }
			foreach ((array)$roles as $role_slug => $role) {
				$output .= '<option value="' . esc_attr($role_slug) . '"';
				if ($role_slug == $default) {
					$output .= ' selected="selected"';
				}
				$output .= '>' . $role['name'] . '</option>';
			}
			return $output;
		}


		/**
		 * Uses get_deletable_roles() method to retrieve list of roles and formats
		 * them as HTML option tags. 
		 *
		 * @since 0.1.0
		 *
		 * @param	string	$default		Optional. Default value to have
		 * 									preselected when the menu loads.
		 * 									Defaults to null.
		 * @param	string	$placeholder	Optional. Placeholder text for first,
		 * 									"empty" option. Defaults to defined string.
		 * @return	HTML set of option tags; containing select tag must be in template.
		 */
		public function get_deletable_roles_dropdown($default=null, $placeholder='Select a role to delete...') {
			$output = '<option value="">' . strip_tags($placeholder) . '</option>';
			$roles = $this->get_deletable_roles();
			foreach ((array)$roles as $role_slug => $role) {
				$output .= '<option value="' . esc_attr($role_slug) . '"';
				if ($role_slug == $default) {
					$output .= ' selected="selected"';
				}
				$output .= '>' . $role['name'] . '</option>';
			}
			return $output;
		}


		/**
		 * Gets current page's depth (use judiciously, this is not very efficient code). 
		 *
		 * @since 0.1.0
		 *
		 * @link	http://wp-snippets.com/get-depth-of-current-page/
		 *
		 * @param	object	$object		Current page object whose depth we are finding.
		 * @return	Integer indicating current depth in tree.
		 */
		public function get_page_depth($object) {
			$parent_id = $object->post_parent;
			$depth = 0;
			while ($parent_id > 0) {
				$page = get_page($parent_id);
				$parent_id = $page->post_parent;
				$depth++;
			}
			return $depth;
		}


		/**
		 * Gets the list of capabilities assigned to the given role. 
		 *
		 * @since 0.1.0
		 *
		 * @param	string	$role		Name of role.
		 * @return	Array of capabilities in WordPress format.
		 */
		public function get_role_capabilities($role) {
			$roles = get_editable_roles();
			return $roles[$role]['capabilities'];
		}


		/**
		 * Gets current term's depth (use judiciously, this is not very efficient code). 
		 *
		 * @since 0.1.0
		 *
		 * @link	http://wp-snippets.com/get-depth-of-current-page/
		 *
		 * @param	object	$object		Current term whose depth we are finding.
		 * @return	Integer indicating current depth in tree.
		 */
		public function get_term_depth($object) {
			$parent_id = $object->parent;
			$depth = 0;
			while ($parent_id > 0) {
				$term = get_term($parent_id, $object->taxonomy);
				$parent_id = $term->parent;
				$depth++;
			}
			return $depth;
		}


		/**
		 * Sorts a hierarchical list of terms alphabetically while maintaining hierarchy. 
		 *
		 * @since 0.1.0
		 *
		 * @param	array	$terms		List of terms to sort.
		 * @return	Sorted terms array.
		 */
		public function parent_sort_terms($terms) {
			$output = array();
			$map = array();
			foreach ((array)$terms as $key => $term) {
				$anc = get_ancestors($term->term_id, $term->taxonomy);
				if (empty($anc)) {
					$map_key = $term->name;
				}
				else {
					$map_key = '';
					foreach ((array)$anc as $term_id) {
						$anc_term = get_term($term_id);
						$map_key .= $anc_term->name . ' ... ';
					}
					$map_key .= $term->name;
				}
				$map[$map_key] = $key;
			}
			uksort($map, 'strnatcasecmp');
			foreach ((array)$map as $term_key) {
				$output[] = $terms[$term_key];
			}
			return $output;
		}


		/**
		 * Sets scrollable area height dynamically based on number of elements. 
		 *
		 * @since 2.0.0
		 *
		 * @param	int		$count		Number of elements.
		 * @return	HTML style attribute.
		 */
		public function set_scroll_height($count) {
			if ($count < 12) {
				return ' style="height: ' . ($count * 1.5) . 'em;"';
			}
			else {
				return ' style="height: 25em;"';
			}
		}


		/**
		 * Converts a string to all lowercase and non-alpha characters to underscores. 
		 *
		 * @since 0.1.0
		 *
		 * @param	string	$str		String to convert.
		 * @return	Converted string.
		 */
		public function underscorify($str) {
			return preg_replace('/[^a-z]+/','_',trim(strtolower($str)));
		}


		/**
		 * Constructs and displays the Users sub-page admin interface for this plugin. 
		 *
		 * @since 0.1.0
		 *
		 * @global	object	$wpdb		WordPress database object.
		 *
		 * @return	N/A.
		 */
		public function users_page_interface() {
			global $wpdb;

			$roles = $this->get_included_roles();
			$user_count = count_users();
			$this->admin_message = null;

			// Handle posted data
			$posted = (isset($_POST['caroles-nonce']) && wp_verify_nonce($_POST['caroles-nonce'],'caroles'));
			if ($posted) {

				switch ($_POST['null']['step']) {

					case 'select_role':
						// Prepare role data
						$new_role = $role = $role_name = $role_slug = '';
						$role_capabilities = $role_options = array();
						if (!empty($_POST['caroles']['role'])) {
							$new_role = false;
							$role = $roles[$_POST['caroles']['role']];
							$role_name = $role['name'];
							$role_slug = $_POST['caroles']['role'];
							$role_capabilities = $role['capabilities'];
							$role_options = get_option('caroles_role_' . $role_slug);
						}
						elseif (!empty($_POST['caroles']['new_role'])) {
							$new_role = true;
							$role_name = $_POST['caroles']['new_role'];
							$role_slug = $this->underscorify($role_name);
							$role_capabilities = $this->get_default_capabilities();
							$role = array(
								'name' => $role_name,
								'capabilities' => $role_capabilities,
							);
						}
						else {
							$this->admin_message .= '<div class="error"><p>No role selected.</p></div>';
						}
						break;

					case 'update_role':
						// Save changes into options table
						foreach ((array)$_POST['caroles']['role'] as $role) {
							update_option('caroles_role_' . $role['role_slug'], $role);

							// Create/update user roles
							// Note: remove_role() is a quick way to reset the capabilities on an existing role
							remove_role($role['role_slug']);
							add_role($role['role_slug'], $role['role_name'], $this->explode_capabilities($role['role_capabilities']));
						}

						$this->admin_message .= '<div class="updated"><p><strong>Your changes to the role ' . $role['role_name'] . ' were saved.</strong> Changes will take effect for currently logged in users on their next page load.</p></div>';
						break;

					case 'delete_role':
						if (!empty($_POST['caroles']['delete_role'])) {
							remove_role($_POST['caroles']['delete_role']);
							$this->admin_message .= '<div class="updated"><p>The role <strong>' . ucwords(str_replace('_',' ',$_POST['caroles']['delete_role'])) . '</strong> was deleted.</p></div>';
						}
						break;

					default: break;
				}

			}

			echo $this->admin_message;

			// Include admin page
			include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'caroles_admin.php');
		}

	}


	// Load plugin
	add_action('init','CARoles');
	function CARoles() {
		global $CARoles;
		$CARoles = new CARoles();
	}


	// Flush rewrite rules when plugin is activated
	register_activation_hook(__FILE__, 'flush_rewrite_rules');

}