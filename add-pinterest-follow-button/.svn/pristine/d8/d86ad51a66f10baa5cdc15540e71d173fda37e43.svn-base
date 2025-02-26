<?php
defined( 'ABSPATH' ) || die();

if ( ! class_exists( 'WEBLIZAR_PINTEREST_ADMIN' ) ) {
	class WEBLIZAR_PINTEREST_ADMIN {
		/**
		 * @return WEBLIZAR_PINTEREST_ADMIN constructor.
		 */

		function __construct() {
			require_once WEBLIZAR_PINTEREST_PLUGIN_DIR_PATH . 'admin/menu/class-add-pinterest-follow-button-menu.php';
			add_action( 'admin_menu', array( 'WL_Add_Pinterest_Menu', 'create_menu' ) );
		} // end constructor
	} //  end class WEBLIZAR_PINTEREST_ADMIN
} // end if exist class WEBLIZAR_PINTEREST_ADMIN
