<?php

class ECOMFIT_Install {
	function __construct() {
	}

	public static function ecomfit_init_install() {
		add_option( ECOMFIT_LOGIN_CURRENT_STATUS, ECOMFIT_ACTIVE_PLUGIN, true );
		add_option( ECOMFIT_WEB_ID, 0, true );
		add_option( ECOMFIT_TOKEN, 0, true );
		add_option( ECOMFIT_LINK_SYNC_PRODUCT, 0, true );
	}

	public static function ecomfit_deactive() {
		update_option( ECOMFIT_TOKEN, 0, true );
		delete_option( ECOMFIT_LOGIN_CURRENT_STATUS );
		delete_option( ECOMFIT_LINK_SYNC_PRODUCT );
	}

	public static function ecomfit_uninstall() {
		delete_option( ECOMFIT_TOKEN );
		delete_option( ECOMFIT_WEB_ID );
	}
}

?>