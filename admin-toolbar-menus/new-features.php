<?php

/**
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// this grabs all the menu items in array
// if (!function_exists('debug_admin_menus')):
// function debug_admin_menus() {
// if ( !is_admin())
//         return;
//     global $submenu, $menu, $pagenow;
//     if ( current_user_can('manage_options') ) { // ONLY DO THIS FOR ADMIN
//         if( $pagenow == 'index.php' ) {  // PRINTS ON DASHBOARD
//             echo '<pre>'; print_r( $menu ); echo '</pre>'; // TOP LEVEL MENUS
//             echo '<pre>'; print_r( $submenu ); echo '</pre>'; // SUBMENUS
//         }
//     }
// }
// add_action( 'admin_notices', 'debug_admin_menus' );
// endif;
/////////////

/**
* Instantiates the class
*/
add_action( 'admin_init', array( 'Bodhi_ATM_Admin_Menu_Meta', 'init' ) );

/**
* The Class
*/
if ( !class_exists('Bodhi_ATM_Admin_Menu_Meta')) {

	class Bodhi_ATM_Admin_Menu_Meta {
		const LANG = 'exch_lang';

		public static function init() {
			$class = __CLASS__;
			new $class;
		}

		public function __construct() {
			global $pagenow;

			if ( 'nav-menus.php' !== $pagenow ) // Abort if not on the nav-menus.php admin UI page - avoid adding elsewhere
			return;

			if ( current_user_can('manage_options') ) { // ONLY DO THIS FOR ADMINS

				$this->bodhi_atm_add_menu_meta_boxes();

			}
		}

		/**
		* Adds the meta box container
		*/
		public function bodhi_atm_add_menu_meta_boxes(){
			add_meta_box(
				'bodhi_atm_admin_pages'
				,__( 'Admin Pages', self::LANG )
				,array( $this, 'bodhi_atm_render_admin_pages_meta_box_content' )
				,'nav-menus' // important !!!
				,'side' // important, only side seems to work!!!
				//,'high'
			);
		}

		/**
		* Render Meta Box content
		*/
		public function bodhi_atm_render_admin_pages_meta_box_content($object, $submenu, $menu) {
			// global $submenu, $menu;
			// echo '<p>Example text</p>';

			// echo '<pre>'; print_r( $menu ); echo '</pre>'; // TOP LEVEL MENUS
			// echo '<pre>'; print_r( $submenu ); echo '</pre>'; // SUBMENUS

			global $_nav_menu_placeholder, $nav_menu_selected_id;

			?>
			<div id="posttype-wl-login" class="posttypediv">
				<div id="tabs-panel-wishlist-login" class="tabs-panel tabs-panel-active">
					<ul id ="wishlist-login-checklist" class="categorychecklist form-no-clear">
						<li>
							<label class="menu-item-title">
								<input type="checkbox" class="menu-item-checkbox" name="menu-item[-1][menu-item-object-id]" value="-1"> To Be Admin Item
							</label>
							<input type="hidden" class="menu-item-type" name="menu-item[-1][menu-item-type]" value="custom">
							<input type="hidden" class="menu-item-title" name="menu-item[-1][menu-item-title]" value="To Be Page Title">
							<input type="hidden" class="menu-item-url" name="menu-item[-1][menu-item-url]" value="#the-page-url">
						</li>
					</ul>
				</div>
				<p class="button-controls">
					<span class="list-controls">
					<a href="#" class="select-all"><?php _e('Select All', 'admin-toolbar-menus'); ?></a>
					</span>
					<span class="add-to-menu">
						<input type="submit" class="button-secondary submit-add-to-menu right" value="Add to Menu" name="add-post-type-menu-item" id="submit-posttype-wl-login">
						<span class="spinner"></span>
					</span>
				</p>
			</div>
			<?php

		} // end function bodhi_atm_render_admin_pages_meta_box_content

	} // end class Bodhi_ATM_Admin_Menu_Meta

} // end class check