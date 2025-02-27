<?php

namespace DCL\Includes;

/**
 * Fired during plugin activation.
 *
 * Creates default login page during activation.
 *
 * @since      1.0.0
 * @package    DCL\Includes
 * @author     antwerpes ag <opensource@antwerpes.com>
 */
class DCL_Activator {

	/**
	 * Creates a login page, adds a user role, adds a dummy user with doccheck role.
	 *
	 * @since   1.0.0
	 * @access  public
	 */
	public static function activate() {

		// Look for login page
		$login_page = get_posts( [
			'name'        => 'doccheck-login',
			'post_type'   => 'page',
			'numberposts' => 1
		] );

		if ( empty( $login_page ) ) { // If it doesn't exist...
			// Create login page
			$login_page_id = wp_insert_post(
				[
					'post_content'   => '[dc-login]',
					'post_name'      => 'restricted-login',
					'post_title'     => esc_html__( 'DocCheck Login', 'doccheck-login' ),
					'post_status'    => 'publish',
					'post_type'      => 'page',
					'ping_status'    => 'closed',
					'comment_status' => 'closed',
				]
			);

			// Set login page id
			if ( is_int( $login_page_id ) ) {
				update_option( 'dcl_general_login_page_id', $login_page_id );
			}
		} elseif ( isset( $login_page[0] ) ) { // If it already exist...
			// Set login page id
			update_option( 'dcl_general_login_page_id', $login_page[0]->ID );
		}


		$restricted_redirect_page = get_posts( [
			'name'        => 'doccheck-redirect',
			'post_type'   => 'page',
			'numberposts' => 1
		] );

		if ( empty( $restricted_redirect_page ) ) { // If it doesn't exist...
			// Create login page
			$restricted_redirect_page_id = wp_insert_post(
				[
					'post_content'   => "You cannot enter this page, as it is only accessible to particular professions. Click <a href=\"" . home_url() . "\">here</a> to get back.",
					'post_name'      => 'restricted-redirect',
					'post_title'     => esc_html__( 'DocCheck Access Restricted', 'doccheck-redirect' ),
					'post_status'    => 'publish',
					'post_type'      => 'page',
					'ping_status'    => 'closed',
					'comment_status' => 'closed',
				]
			);

			// Set login page id
			if ( is_int( $restricted_redirect_page_id ) ) {
				update_option( 'dcl_general_redirect_page_id', $restricted_redirect_page_id );
			}
		} elseif ( isset( $restricted_redirect_page[0] ) ) { // If it already exist...
			// Set login page id
			update_option( 'dcl_general_redirect_page_id', $restricted_redirect_page[0]->ID );
		}
	}
}