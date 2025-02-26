<?php
/**
 * Helper Functions
 *
 * @since       1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load get admin page
 *
 * @since       1.0.0
 */
if ( ! function_exists( 'auam_get_admin_page_name' ) ) {
	function auam_get_admin_page_name() {
		$admin_pages = array(
			'main'    => array(
				'title'     => __( 'AUA Manager', 'advanced-user-access-manager' ),
				'sub_title' => __( 'Settings', 'advanced-user-access-manager' ),
				'icon'      => 'menu-icon.svg',
				'slug'      => 'auam',
			),
		);

		return $admin_pages;
	}
}

/**
 * Load page my name
 *
 * @since       1.0.0
 * @return      void
 */
if ( ! function_exists( 'auam_get_admin_page_by_name' ) ) {
	/**
	 * Load page my name func
	 *
	 * @since       1.0.0
	 */
	function auam_get_admin_page_by_name( $page_name = 'main' ) {
		
		$pages = auam_get_admin_page_name();

		if ( ! isset( $pages[ $page_name ] ) ) {
			$page = array(
				'title' => __( 'Page Title', 'advanced-user-access-manager' ),
				'slug' => 'auam',
			);
		} else {
			$page = $pages[ $page_name ];
		}

		return $page;
	}
}


if ( ! function_exists( 'auam_show_message' ) ) {
	/**
	 * Helper function for show message
	 *
	 * @return array
	 */
	function auam_show_message( $message, $error_message = false ) {
		
		if ( $error_message ) {
			echo '<div id="message" class="error">';
		} else {
			echo '<div id="message" class="updated">';
		}

		echo '<p><strong>' . esc_html( $message ) . '</strong></p></div>';
	}
}

if ( ! function_exists( 'auam_admin_page_restriction' ) ) {
	/**
	 * Helper function for returning an admin page
	 *
	 * @return array
	 */
	function auam_admin_page_restriction( $page_name, $sub_view = '' ) {
		if ( ! is_admin() ) {
			return false;
		}

		global $pagenow;
		$page_id = get_current_screen()->id;

		if ( ! $pagenow === $page_name ) {
			return false;
		}

		if ( ! empty( $sub_view ) && ! stristr( $page_id, $sub_view ) ) {
			return false;
		}

		return true;
	}
}

if ( ! function_exists( 'auam_frontend_page' ) ) {
	/**
	 * Helper function for restricted front page
	 *
	 * @return array
	 */
	function auam_frontend_page( $page_name, $sub_view = '' ) {
		if ( is_admin() ) {
			return false;
		}
		
		return true;
	}
}

/**
 * Helper function for returning an array of saved settings
 *
 * @return array
 */
if ( ! function_exists( 'auam_user_access_get_settings' ) ) {
	/**
	 * Helper function for returning an array of saved settings
	 *
	 * @return array
	 */
	function auam_user_access_get_settings() {
		$args = array(
			'redirect_type' 			=> 'page',
			'login_user_page' 			=> '',
			'login_page'    			=> '',
			'show_login_form'  	 		=> 'yes',
			'redirect_url'  			=> '',
			'enable_restriction' 		=> 'yes',
			'all_page_restrict'   		=> '',
			'advance_login_form'   		=> '',
			'advance_rd_lform'   		=> 'yes',
			'enable_bg_image'   		=> 'no',
			'login_redirect_type' 		=> 'page',
			'after_login_redirect'  	=> '',
			'after_logout_redirect' 	=> '',
			'after_login_redirect_url' 	=> '',
			'after_logout_redirect_url' => '',
		);

		$settings = get_option( 'auam_update_settings' );

		if ( ! is_array( $settings ) ) {
			$settings = array();
		}

		foreach ( $args as $key => $value ) {
			if ( ! isset( $settings[ $key ] ) ) {
				$settings[ $key ] = $value;
			}
		}

		return $settings;
	}
}

/**
 * Add body class
 *
 * @return array
 */
function auam_add_body_class( array $classes ) {
	$classes[] = 'auam-user-access-manager';

	return $classes;
}
add_filter( 'body_class', 'auam_add_body_class' );