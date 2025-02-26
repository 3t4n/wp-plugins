<?php
/**
 * Helper function used througout the plugin.
 *
 * @package Jbid
 */

namespace Jbid\Post_Filter;

if ( ! class_exists( 'Jbid\Post_Filter\Admin_Menu' ) ) {

	/**
	 * A class for defining common helpers.
	 */
	class Admin_Menu {


		/**
		 * var $helpers
		 */
		private $helpers;


		/**
		 * Main Class constructors.
		 *
		 * @param object $helpers The helper class object.
		 */
		public function __construct( $helpers ) {
			$this->helpers = $helpers;
		}


		/**
		 * Add setting menu page.
		 */
		public function add_setting_menu() {

			$top_page = add_menu_page(
				esc_html__( 'JBI Post Filters', 'smart-searchify' ),
				esc_html__( 'JBI Post Filters', 'smart-searchify' ),
				'manage_options',
				'jbi-post-filters',
				array( $this, 'parent_page_cb' ),
				'dashicons-admin-generic',
				99
			);

			$child_page = add_submenu_page(
				'jbi-post-filters',
				esc_html__( 'Add New Filter', 'smart-searchify' ),
				esc_html__( 'Add New Filter', 'smart-searchify' ),
				'manage_options',
				'jbi-new-filter',
				array( $this, 'parent_first_child_cb' ),
			);
		}

		/**
		 * Create an admin menu page.
		 */
		public function parent_page_cb() {
			?>
				<div class="wrap">
					<h1 >All shortcodes for post filters</h1>
					<p><button class="button button-primary">Add New</button></p>

				</div>
			<?php
		}

		/**
		 * Create an admin menu page.
		 */
		public function parent_first_child_cb() {
			include_once JBIPF_DIR_PATH . 'tpls/post-filter-form.php';
		}
	}
}
