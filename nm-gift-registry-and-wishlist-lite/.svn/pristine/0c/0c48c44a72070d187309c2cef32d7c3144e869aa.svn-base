<?php

/**
 * Sync
 */
defined( 'ABSPATH' ) || exit;

class NMGR_Scripts {

	/**
	 * Localized script handles
	 *
	 * @var array
	 */
	private static $inline_scripts = array();

	public static function run() {
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'register_frontend_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'register_admin_scripts' ) );

		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_frontend_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue_admin_scripts' ) );
		add_action( 'enqueue_block_assets', [ static::class, 'enqueue_block_scripts' ] );

		add_action( 'wp_print_scripts', array( __CLASS__, 'add_inline_scripts' ), 5 );
		add_action( 'wp_print_footer_scripts', array( __CLASS__, 'add_inline_scripts' ), 5 );

		add_action( 'wp_footer', [ __CLASS__, 'include_sprite_file' ] );
		add_action( 'admin_footer', [ __CLASS__, 'include_sprite_file' ] );
	}

	public static function enqueue_block_scripts() {
		if ( is_admin() ) {
			// Enqueue frontend style in block editor mainly for wishlist block
			wp_enqueue_style( 'nmgr-frontend', nmgr()->url . 'assets/css/frontend.min.css' );
		}
	}

	public static function register_admin_scripts() {
		$version = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? date( 'H:i:s' ) : nmgr()->version;

		wp_register_style( 'nmgr-admin', nmgr()->url . 'assets/css/admin.min.css', [ 'wp-jquery-ui-dialog' ], $version );
		wp_register_script( 'nmgr-admin', nmgr()->url . 'assets/js/admin.min.js', array( 'jquery', 'selectWoo', 'jquery-blockui', 'jquery-ui-datepicker', 'jquery-ui-dialog', 'jquery-ui-tooltip', 'jquery-ui-menu', 'jquery-ui-accordion' ), $version, true );
	}

	public static function register_frontend_scripts() {
		$version = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? date( 'H:i:s' ) : nmgr()->version;

		wp_register_style( 'nmgr-frontend', nmgr()->url . 'assets/css/frontend.min.css', [ 'select2', 'wp-jquery-ui-dialog' ], $version );
		wp_register_script( 'nmgr-frontend', nmgr()->url . 'assets/js/frontend.min.js', array( 'jquery', 'wc-add-to-cart-variation', 'jquery-blockui', 'selectWoo', 'wc-country-select', 'wc-address-i18n', 'jquery-ui-datepicker', 'jquery-ui-dialog', 'jquery-ui-tooltip', 'jquery-ui-menu' ), $version, true );
	}

	public static function enqueue_frontend_scripts() {
		wp_enqueue_style( 'nmgr-frontend' );
		wp_enqueue_script( 'nmgr-frontend' );
	}

	public static function enqueue_admin_scripts() {
		if ( is_nmgr_admin() ) {
			wp_enqueue_style( 'nmgr-admin' );
			wp_enqueue_script( 'nmgr-admin' );
		}
	}

	private static function get_script_data( $handle = '' ) {
		$data = array();
		$ajax_url = admin_url( 'admin-ajax.php' );

		// Parameters that can be used by various scripts
		$global_params = array(
			'ajax_url' => $ajax_url,
			'nonce' => wp_create_nonce( 'nmgr' ), // Generic nonce for the application,
			'datepicker_options' => apply_filters( 'nmgr_datepicker_options', [
				'altFormat' => 'yy-mm-dd',
				'changeMonth' => true,
				'changeYear' => true,
				'styleDatepicker' => true,
			] ),
		);

		$data[ 'nmgr-frontend' ] = array(
			'global' => $global_params,
		);

		$data[ 'nmgr-admin' ] = array(
			'global' => $global_params,
			'i18n_select_state_text' => nmgr()->is_pro ?
			esc_attr__( 'Select an option...', 'nm-gift-registry' ) :
			esc_attr__( 'Select an option...', 'nm-gift-registry-lite' ),
			'i18n_required_text' => nmgr()->is_pro ?
			esc_attr__( 'required', 'nm-gift-registry' ) :
			esc_attr__( 'required', 'nm-gift-registry-lite' ),
		);

		if ( is_a( wc()->countries, 'WC_Countries' ) ) {
			$countries_params = [
				'countries' => wp_json_encode( array_merge(
						WC()->countries->get_allowed_country_states(),
						WC()->countries->get_shipping_country_states()
					) ),
				'locale' => wp_json_encode( WC()->countries->get_country_locale() ),
				'locale_fields' => wp_json_encode( WC()->countries->get_country_locale_field_selectors() ),
			];

			$data[ 'nmgr-admin' ] = array_merge( $data[ 'nmgr-admin' ], $countries_params );
		}

		$filtered_data = apply_filters( 'nmgr_script_data', $data );

		if ( $handle ) {
			return isset( $filtered_data[ $handle ] ) ? $filtered_data[ $handle ] : false;
		}

		return $filtered_data;
	}

	public static function add_inline_scripts() {
		$handles = array_keys( self::get_script_data() );
		$global_inline_script_added = false;

		foreach ( $handles as $handle ) {
			/**
			 * We have to use this condition because this function is hooked to both wp_print_scripts and
			 * wp_print_footer_scripts so it runs twice and we dont want to add the inline scripts twice so we
			 * make sure that once it is added, it is not added again.
			 */
			if ( !in_array( $handle, self::$inline_scripts, true ) && wp_script_is( $handle, 'enqueued' ) ) {
				$data = self::get_script_data( $handle );

				if ( isset( $data[ 'global' ] ) ) {
					if ( false === $global_inline_script_added ) {
						wp_add_inline_script( $handle, 'var nmgr_global_params = ' . json_encode( $data[ 'global' ] ), 'before' );
						$global_inline_script_added = true;
					}

					if ( $global_inline_script_added ) {
						unset( $data[ 'global' ] );
					}
				}

				if ( !empty( $data ) ) {
					$name = str_replace( '-', '_', $handle ) . '_params';
					wp_add_inline_script( $handle, 'var ' . $name . ' = ' . json_encode( $data ), 'before' );
				}

				self::$inline_scripts[] = $handle;
			}
		}
	}

	public static function include_sprite_file() {
		if ( is_nmgr_admin() || !is_admin() ) {
			$sprite_file = nmgr()->path . 'assets/svg/sprite.svg';
			if ( file_exists( $sprite_file ) ) {
				include_once $sprite_file;
			}
		}
	}

}
