<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/**
 * Manages product includes folder
 *
 * Here all plugin includes folder is defined and managed.
 *
 * @version        1.0.0
 * @package        price-field/price
 * @author        Norbert Dreszer
 */
if ( ! function_exists( 'ic_save_global' ) ) {

	/**
	 * Saves implecode global
	 *
	 * @param string $name
	 * @param type $value
	 *
	 * @return boolean
	 * @global array $implecode
	 */
	function ic_save_global( $name, $value ) {
		global $implecode;
		if ( ! empty( $name ) ) {
			$implecode[ $name ] = $value;

			return true;
		}

		return false;
	}

}

if ( ! function_exists( 'ic_delete_global' ) ) {

	/**
	 * Deletes implecode global
	 *
	 * @param type $name
	 *
	 * @return string
	 * @global type $implecode
	 */
	function ic_delete_global( $name = null ) {
		global $implecode;
		if ( ! empty( $name ) ) {
			unset( $implecode[ $name ] );
		} else {
			unset( $implecode );
		}
	}

}

if ( ! function_exists( 'ic_get_global' ) ) {

	/**
	 * Returns implecode global
	 *
	 * @param type $name
	 *
	 * @return string
	 * @global type $implecode
	 */
	function ic_get_global( $name = null ) {
		global $implecode;
		if ( ! empty( $name ) ) {
			if ( isset( $implecode[ $name ] ) ) {
				return $implecode[ $name ];
			} else {
				return false;
			}
		} else {
			return $implecode;
		}
	}

}

if ( ! function_exists( 'ic_get_template_file' ) ) {

	/**
	 * Manages template files paths
	 *
	 * @param type $file_path
	 *
	 * @return type
	 */
	function ic_get_template_file( $file_path, $base_path = AL_BASE_TEMPLATES_PATH ) {
		$folder    = get_custom_templates_folder();
		$file_name = basename( $file_path );
		if ( file_exists( $folder . $file_name ) ) {
			return $folder . $file_name;
		} else if ( file_exists( $base_path . '/templates/template-parts/' . $file_path ) ) {
			return $base_path . '/templates/template-parts/' . $file_path;
		} else {
			return false;
		}
	}

}

if ( ! function_exists( 'ic_show_template_file' ) ) {

	/**
	 * Includes template file
	 *
	 * @param type $file_path
	 *
	 * @return type
	 */
	function ic_show_template_file( $file_path, $base_path = AL_BASE_TEMPLATES_PATH ) {
		$path = ic_get_template_file( $file_path, $base_path );
		if ( $path ) {
			include $path;
		}

		return;
	}

}

if ( ! function_exists( 'get_custom_templates_folder' ) ) {

	/**
	 * Returns custom templates folder in theme directory
	 *
	 * @return type
	 */
	function get_custom_templates_folder() {
		return get_stylesheet_directory() . '/implecode/';
	}

}

if ( ! function_exists( 'is_ic_new_product_screen' ) ) {

	/**
	 * Checks if new entry screen is being displayed
	 *
	 * @return boolean
	 */
	function is_ic_new_product_screen() {
		if ( is_admin() ) {
			$screen = get_current_screen();
			if ( $screen->action == 'add' ) {
				return true;
			}
		}

		return false;
	}

}

if ( ! function_exists( 'is_ic_ajax' ) ) {

	function is_ic_ajax( $action = null ) {
		if ( ! is_admin() ) {
			return false;
		}

		$return = false;
		if ( function_exists( 'wp_doing_ajax' ) ) {
			$doing = wp_doing_ajax();
			if ( $doing ) {
				$return = true;
			}
		} else if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			$return = true;
		}
		if ( $return && isset( $_POST['action'] ) && $_POST['action'] === 'heartbeat' ) {
			$return = false;
		}
		if ( $return && ! empty( $action ) ) {
			if ( ! isset( $_POST['action'] ) || ( isset( $_POST['action'] ) && $_POST['action'] !== $action ) ) {
				$return = false;
			}
		}

		return $return;
	}

}

if ( ! function_exists( 'is_ic_admin' ) ) {

	function is_ic_admin() {
		if ( is_admin() && ! is_ic_ajax() ) {
			return true;
		}

		return false;
	}

}

if ( ! function_exists( 'ic_register_setting' ) ) {

	function ic_register_setting() {

	}

}
if ( ! function_exists( 'get_single_names' ) ) {
	/**
	 * Returns single names settings
	 *
	 * @return type
	 */
	function get_single_names() {
		$single_names = ic_get_global( 'single_names' );
		if ( ! $single_names ) {
			$default_single_names = default_single_names();
			$single_names         = get_option( 'single_names', $default_single_names );
			foreach ( $default_single_names as $key => $value ) {
				$single_names[ $key ] = isset( $single_names[ $key ] ) ? $single_names[ $key ] : $value;
			}
			ic_save_global( 'single_names', $single_names );
		}

		return apply_filters( 'ic_get_single_names', $single_names );
	}
}
if ( ! function_exists( 'default_single_names' ) ) {

	function default_single_names() {
		$single_names = array(
			'product_price'       => __( 'Price:', 'price-field' ),
			'product_sku'         => __( 'SKU:', 'price-field' ),
			'product_mpn'         => __( 'MPN:', 'price-field' ),
			'product_shipping'    => __( 'Shipping', 'price-field' ),
			'product_features'    => __( 'Features', 'price-field' ),
			'other_categories'    => __( 'See also different:', 'price-field' ),
			'return_to_archive'   => __( '<< return to listing', 'price-field' ),
			'free'                => __( 'Free', 'price-field' ),
			'free_shipping'       => __( 'Free', 'price-field' ),
			'product_description' => __( 'Description', 'price-field' ),
			'after_price'         => '',
		);

		return apply_filters( 'ic_default_single_names', $single_names );
	}

}

if ( ! function_exists( 'is_ic_catalog_page' ) ) {

	function is_ic_catalog_page() {
		return false;
	}
	
}