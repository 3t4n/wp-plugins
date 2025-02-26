<?php
/**
 * new-features-2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( !class_exists('Bodhi_ATM_Admin_Menu_Meta')) {

	class Bodhi_ATM_Admin_Menu_Meta {

		public function bodhi_atm_add_nav_menu_meta_boxes() {
			add_meta_box(
				'bodhi_atm_admin_pages',
				__('Admin Pages'),
				array( $this, 'bodhi_atm_nav_menu_html'),
				'nav-menus',
				'side',
				'low'
				);
		}

		public function bodhi_atm_nav_menu_html() {
			?>
			<div id="posttype-wl-login" class="posttypediv">
				<div id="tabs-panel-admin-menus" class="tabs-panel tabs-panel-active">
					<ul id ="admin-menus-checklist" class="categorychecklist form-no-clear">
						<!-- need to make this list populate with all of the admin menu items, including sub menus -->
						<li>
							<label class="menu-item-title">
								<input type="checkbox" class="menu-item-checkbox" name="menu-item[-1][menu-item-object-id]" value="-1"> Login/Logout Link
							</label>
							<input type="hidden" class="menu-item-type" name="menu-item[-1][menu-item-type]" value="custom">
							<input type="hidden" class="menu-item-title" name="menu-item[-1][menu-item-title]" value="Login">
							<input type="hidden" class="menu-item-url" name="menu-item[-1][menu-item-url]" value="<?php bloginfo('wpurl'); ?>/wp-login.php">
							<input type="hidden" class="menu-item-classes" name="menu-item[-1][menu-item-classes]" value="wl-login-pop">
						</li>
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
						<!-- need to make this select all of the current admin menu items -->
						<a href="/wordpress/wp-admin/nav-menus.php?page-tab=all&amp;selectall=1#posttype-page" class="select-all"><?php _e('Select All', 'admin-toolbar-menus'); ?></a>
					</span>
					<span class="add-to-menu">
						<input type="submit" class="button-secondary submit-add-to-menu right" value="Add to Menu" name="add-post-type-menu-item" id="submit-posttype-wl-login">
						<span class="spinner"></span>
					</span>
				</p>
			</div>
			<?php
		}
	}
}

$bodhi_atm_custom_nav = new Bodhi_ATM_Admin_Menu_Meta;

add_action('admin_init', array($bodhi_atm_custom_nav, 'bodhi_atm_add_nav_menu_meta_boxes'));