<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


function pp_private_check() {

	if ( ! is_admin() && ! is_user_logged_in() ) {

		if ( is_front_page() || is_home() || bp_is_register_page() || bp_is_activation_page() ) {
			return;
		}

		$redirect_url = trailingslashit( site_url() );

		$pp_private_components = get_option( 'pp-private-components' );
		if ( $pp_private_components == false ) {
			$pp_private_components = array();
		}


		if ( bp_is_user() && in_array( 'member Profile Pages', $pp_private_components ) ) {
			bp_core_redirect( $redirect_url );
		}

		$bp_current_component = bp_current_component();

		if ( false != $bp_current_component ) {

			if ( in_array( $bp_current_component, $pp_private_components ) ) {
				bp_core_redirect( $redirect_url );
			}

		}



		// bp_current_component() can return empty for some custom components, so also check the uri
		if ( in_array( buddypress()->unfiltered_uri, $pp_private_components ) ) {
			bp_core_redirect( $redirect_url );
		}


	}
}
add_action( 'wp_loaded', 'pp_private_check' );

function pp_private_check_wp() {
	global $wp;

	if ( ! is_admin() && ! is_user_logged_in() ) {

		if ( is_front_page() || is_home() || bp_is_register_page() || bp_is_activation_page() ) {
			return;
		}

		// check for single post and page settings
		if ( is_single() || is_page() ) {

//write_log( 'pp_private_check_wp');

			$redirect_url = trailingslashit( site_url() );

			$pp_private_cpts = get_option( 'pp-private-cpts' );
			if ( $pp_private_cpts == false ) {
				$pp_private_cpts = array();
			}

			$post_type = get_post_type( get_the_ID() );

			if ( in_array( $post_type, $pp_private_cpts ) ) {

				$pp_private = get_post_meta( get_the_ID(), 'pp-private', true );

				if ( $pp_private == '1' ) {
					bp_core_redirect( $redirect_url );
				}

			}
		}
	}

}
add_action( 'bp_ready', 'pp_private_check_wp' );
