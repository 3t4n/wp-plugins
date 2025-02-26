<?php
/**
 * Install
 *
 * @package           AWSA_Quick_Buy
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @version           1.0.0
 */

/**
 * Class Tools For Activation Plugin
 */
class AWSA_Quick_Buy_Install {

	/**
	 * Run Tools needed for Run Plugin
	 *
	 * @return void
	 */
	public static function init() {
		AWSA_Quick_Buy_Page::add_rewrite_rules();
		flush_rewrite_rules();
	}

	/**
	 * Add Roles
	 *
	 * @return void
	 */
	public static function add_roles() {
		$roles_version = get_option( 'awsa_quick_buy_roles_version' );
		if ( $roles_version < AWSA_QUICK_BUY_VERSION ) {
			// add roles

			update_option( 'awsa_quick_buy_roles_version', AWSA_QUICK_BUY_VERSION );
		}
	}
}
