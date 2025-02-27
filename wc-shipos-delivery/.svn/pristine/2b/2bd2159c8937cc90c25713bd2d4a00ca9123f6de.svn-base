<?php
/**
 * @package Deliver via Shipos for WooCommerce
 * @subpackage Deliver via Shipos for WooCommerce/admin
 * @since 1.0.0
 * @version 1.0.2
 */

namespace WCShiposDelivery;

use WCShiposDelivery\License;

class Settings {


	private static string $notice;

	/**
	 * Bootstraps the class and hooks required actions & filters.
	 */
	public static function init() {
		add_filter( 'woocommerce_settings_tabs_array', array( __CLASS__, 'add_settings_tab' ), 50 );
		add_action( 'woocommerce_settings_tabs_settings_tab_shipos', array( __CLASS__, 'settings_tab' ) );
		add_action( 'woocommerce_update_options_settings_tab_shipos', array( __CLASS__, 'update_settings' ) );
		add_filter( 'woocommerce_sections_settings_tab_shipos', array( __CLASS__, 'settings_tabs' ) );

		// add settings
		$plugin_base_file = dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/wc-shipos-delivery.php';
		add_filter( 'plugin_action_links_' . $plugin_base_file, array( __CLASS__, 'shipos_plugin_settings' ) );
		add_filter( 'woocommerce_admin_settings_sanitize_option_dvsfw_license_key', array(
			__CLASS__,
			'check_posted_license'
		), 10, 3 );
	}

	public static function shipos_plugin_settings( $settings ) {

		$settings[] = '<a href="' . get_admin_url( '', 'admin.php?page=wc-settings&tab=settings_tab_shipos' ) . '">' . esc_html__( 'Settings', 'wc-shipos-delivery' ) . '</a>';

		return $settings;
	}

	public static function settings_tabs() {
		global $current_section;

		$sections = array(
			''                       => __( 'General', 'wc-shipos-delivery' ),
			'pickup_settings'        => __( 'Pickup settings', 'wc-shipos-delivery' ),
			'getpackage_integration' => __( 'GetPackage Integration', 'wc-shipos-delivery' ),
		);

		echo '<ul class="subsubsub">';

		foreach ( $sections as $id => $label ) {
			$url = add_query_arg(
				array(
					'page'    => 'wc-settings',
					'tab'     => 'settings_tab_shipos',
					'section' => $id,
				),
				admin_url( 'admin.php' )
			);

			$current   = $current_section == $id ? 'class="current"' : '';
			$separator = array_key_last( $sections ) === $id ? "" : " | ";
			echo "<li>";
			echo '<a href="' . esc_url( $url ) . '" ' . esc_html( $current ) . '>' . esc_html( $label ) . '</a>' . esc_html( $separator );
			echo "</li>";
		}

		echo '</ul><br class="clear" />';
	}

	/**
	 * Add a new settings tab to the WooCommerce settings tabs array.
	 *
	 * @param array $settings_tabs Array of WooCommerce setting tabs & their labels, excluding the Subscription tab.
	 *
	 * @return array $settings_tabs Array of WooCommerce setting tabs & their labels, including the Subscription tab.
	 */
	public static function add_settings_tab( array $settings_tabs ): array {
		$settings_tabs['settings_tab_shipos'] = esc_html__( 'Shipos Delivery', 'wc-shipos-delivery' );

		return $settings_tabs;
	}

	/**
	 * Uses the WooCommerce admin fields API to output settings via the @see woocommerce_admin_fields() function.
	 *
	 * @uses woocommerce_admin_fields()
	 * @uses self::get_settings()
	 */
	public static function settings_tab() {

		echo '<div class="shipos-settings-tab">';
		woocommerce_admin_fields( self::get_settings() );
		echo '</div>';
	}

	/**
	 * Uses the WooCommerce options API to save settings via the @see woocommerce_update_options() function.
	 *
	 * @uses woocommerce_update_options()
	 * @uses self::get_settings()
	 */
	public static function update_settings() {
		// set default url for dev/prod mode
		if ( ! empty( $_POST['dvsfw_dev_mode'] ) ) {
			update_option( 'dvsfw_dev_mode', 'yes' );
		} else {
			update_option( 'dvsfw_dev_mode', 'no' );
		}

		woocommerce_update_options( self::get_settings() );
	}

	/**
	 * Get all the settings for this plugin for @return array Array of settings for @see woocommerce_admin_fields() function.
	 *
	 * @see woocommerce_admin_fields() function.
	 */
	public static function get_settings(): array {

		$section = sanitize_text_field( wp_unslash( $_GET['section'] ?? "" ) );

		if ( $section === 'getpackage_integration' ) {
			$settings = static::getpackage_settings();
		} else if ( $section === 'pickup_settings' ) {
			$settings = static::pickup_settings();
		} else {
			$settings = static::general_settings();
		}

		return apply_filters( 'wc_settings_tab_shipos_settings', $settings );
	}

	/**
	 * Check license and activate/deactivate license if license field is dirty
	 *
	 * @param $value
	 * @param $option
	 * @param $raw_value
	 *
	 * @return mixed
	 */
	public static function check_posted_license( $value, $option, $raw_value ) {
		// check license on update
		$license = License::getInstance();
		// if empty field passed deactivate the license
		if ( '' == $value || empty( $value ) ) {
			self::$notice = '<div id="message" class="notice notice-error is-dismissible"><p>' . esc_html__( 'Please fill the license field and start shipping.', 'wc-shipos-delivery' ) . '</p></div>';
			add_action( 'admin_notices', array( __CLASS__, 'dvsfw_settings_admin_notice' ) );
			$license->deactivate_license();

			return $value;
		} // if license key field is dirty
		elseif ( ! get_option( 'dvsfw_license_key' ) || $value != get_option( 'dvsfw_license_key' ) ) {
			$api_response = $license->check_license( 'activate_license', $value );
			$license_data = $api_response['license_data'];

			if ( $license_data->license !== 'valid' ) {
				$license->deactivate_license();
				if ( $license_data->message ) {
					self::$notice = '<div id="message" class="notice notice-error is-dismissible"><p>' . wp_kses_post( $license_data->message ) . '</p></div>';
					add_action( 'admin_notices', array( __CLASS__, 'dvsfw_settings_admin_notice' ) );
				}
			} else {
				$message = $license->shipos_activate_license();
				if ( $message ) {
					self::$notice = '<div id="message" class="notice notice-error is-dismissible"><p>' . wp_kses_post( $message ) . '</p></div>';
					add_action( 'admin_notices', array( __CLASS__, 'dvsfw_settings_admin_notice' ) );
				} else {
					self::$notice = '<div id="message" class="notice notice-success is-dismissible"><p>' . esc_html__( 'License successfully activated', 'wc-shipos-delivery' ) . '</p></div>';
					add_action( 'admin_notices', array( __CLASS__, 'dvsfw_settings_admin_notice' ) );
				}
			}
		}

		return $value;
	}

	public static function dvsfw_settings_admin_notice() {
		echo wp_kses_post( self::$notice );
	}

	public static function general_settings(): array {

		$web_service = new WebService();
		$licenses    = $web_service->get_licenses();
		$header      = "";

		$license_options = [];
		if ( is_wp_error( $licenses ) ) {
			dvsfw_log( 'Unable to fetch licenses', $licenses->get_error_messages() );
			$header .= "<div class='notice notice-warning'><h4>" . __( "Error: Unable to fetch licenses", 'wc-shipos-delivery' ) . "</h4></div>";
		} else if ( empty( $licenses ) ) {
			$header .= "<div class='notice notice-warning'><h4>" . __( "You do not have any licenses right now", 'wc-shipos-delivery' ) . "</h4></div>";
		} else {
			foreach ( $licenses as $license ) {
				$label = $license->company;
				if ( $license->name ) {
					$label .= " ($license->name)";
				}
				$license_options[ $license->key ] = $label;
			}
		}

		$header .= "<button type='button' class='button-secondary dvsfw_clear_cache'>Clear cache</button>";

		$settings['section_title'] = [
			'name' => esc_html__( 'Shipos option settings', 'wc-shipos-delivery' ),
			'type' => 'title',
			'desc' => $header,
			'id'   => 'wc_settings_tab_shipos_section_title',
		];

		if ( ! empty( $license_options ) ) {
			$settings['dvsfw_license_key'] = [
				'name'     => __( "Default shipping company", 'wc-shipos-delivery' ),
				'type'     => 'select',
				'options'  => $license_options,
				'desc'     => esc_html__( 'Default shipping company to show. This will also be used for pickup method if enabled', 'wc-shipos-delivery' ),
				'desc_tip' => true,
				'id'       => 'dvsfw_license_key',
			];
		}

		$settings['dvsfw_free_shipping_by_price'] = [
			'name'    => esc_html__( 'Apply Free Shipping By Price', 'wc-shipos-delivery' ),
			'type'    => 'select',
			'options' => [
				'after_discount'  => esc_html__( 'After Discount', 'wc-shipos-delivery' ),
				'before_discount' => esc_html__( 'Before Discount', 'wc-shipos-delivery' ),
			],
			'id'      => 'dvsfw_free_shipping_by_price',
		];

		if ( sanitize_text_field( wp_unslash( $_GET['show_dev_option'] ?? false ) ) ) {

			$settings = array_merge( $settings, static::legacy_settings() );

			$settings['dvsfw_dev_mode'] = array(
				'name' => esc_html__( 'Test Mode', 'wc-shipos-delivery' ),
				'type' => 'checkbox',
				'desc' => esc_html__( 'Run the shipment for testing  ?', 'wc-shipos-delivery' ),
				'id'   => 'dvsfw_dev_mode',
			);
		}

		$settings['section_end'] = array(
			'type' => 'sectionend',
			'desc' => '',
			'id'   => 'wc_settings_tab_shipos_section_end',
		);

		return $settings;
	}

	public static function getpackage_settings(): array {
		$web_service = new WebService();
		$licenses    = $web_service->get_licenses();

		if ( is_wp_error( $licenses ) ) {
			esc_html_e( "Unable to fetch licenses", 'wc-shipos-delivery' );

			return [];
		}

		$licenses = array_filter( $licenses, function ( $license ) {
			return ( $license->provider->name ?? null ) === 'GetPackage';
		} );

		if ( empty( $licenses ) ) {
			esc_html_e( "You do not have any licenses supporting GetPackage", 'wc-shipos-delivery' );

			return [];
		}

		$options = [];
		foreach ( $licenses as $license ) {
			$options[ $license->key ] = $license->company;
		}

		$settings = [
			'section_title'            => [
				'name' => __( 'Shipos GetPackage Integration', 'wc-shipos-delivery' ),
				'type' => 'title',
				'id'   => 'wc_settings_tab_getpackage_integration_section_title',
			],
			'dvsfw_getpackage_enable'  => [
				'name' => __( "Enable", 'wc-shipos-delivery' ),
				'type' => 'checkbox',
				'desc' => __( 'Enable same day delivery shipping method using GetPackage', 'wc-shipos-delivery' ),
				'id'   => 'dvsfw_getpackage_enable',
			],
			'dvsfw_getpackage_license' => [
				'name'    => __( "Select company", 'wc-shipos-delivery' ),
				'type'    => 'select',
				'options' => $options,
				'id'      => 'dvsfw_getpackage_license',
			]
		];

		$settings['section_end'] = array(
			'type' => 'sectionend',
			'desc' => '',
			'id'   => 'wc_settings_tab_getpackage_integration_section_end',
		);

		return $settings;
	}

	public static function pickup_settings(): array {

		$is_pickup = '';
		if ( get_option( 'dvsfw_is_pickup' ) == 'yes' ) {
			$is_pickup = "<button class='button-primary sync_pickup'>" . esc_html__( 'Sync pickup location', 'wc-shipos-delivery' ) . '</button>';
		}

		return [
			'section_title'                         => [
				'name' => __( 'Pickup settings', 'wc-shipos-delivery' ),
				'type' => 'title',
				'desc' => $is_pickup,
				'id'   => 'wc_settings_tab_pickup_settings_section_title',
			],
			'dvsfw_is_pickup'                       => array(
				'name' => esc_html__( 'Activate collection points?', 'wc-shipos-delivery' ),
				'type' => 'checkbox',
				'desc' => esc_html__( 'Not supported by all courier companies', 'wc-shipos-delivery' ),
				'id'   => 'dvsfw_is_pickup',
			),
			'dvsfw_google_maps_api_key'             => [
				'name' => esc_html__( 'Google Maps API Key', 'wc-shipos-delivery' ),
				'type' => 'password',
				'id'   => 'dvsfw_google_maps_api_key',
			],
			'dvsfw_pickup_point_display_preference' => array(
				'name'    => esc_html__( 'Pickup point display preference', 'wc-shipos-delivery' ),
				'type'    => 'select',
				'options' => array(
					'manual' => esc_html__( 'Selection from a list', 'wc-shipos-delivery' ),
					'map'    => esc_html__( 'Google Map', 'wc-shipos-delivery' ),
					'both'   => esc_html__( 'Both list and Google Map', 'wc-shipos-delivery' ),
				),
				'id'      => 'dvsfw_pickup_point_display_preference',
			),
			'dvsfw_pickup_point_default_display'    => array(
				'name'    => esc_html__( 'Default Pickup point display', 'wc-shipos-delivery' ),
				'type'    => 'radio',
				'options' => array(
					'map'    => esc_html__( 'Google Map', 'wc-shipos-delivery' ),
					'manual' => esc_html__( 'List', 'wc-shipos-delivery' ),
				),
				'id'      => 'dvsfw_pickup_point_default_display',
				'default' => 'manual',
			),
			'section_end'                           => [
				'type' => 'sectionend',
				'desc' => '',
				'id'   => 'wc_settings_tab_pickup_settings_section_end',
			],
		];
	}

	public static function legacy_settings(): array {
		return [
			'dvsfw_license_key'      => [
				'name'  => esc_html__( 'License Key', 'wc-shipos-delivery' ),
				'type'  => 'text',
				'class' => 'matat-blur-on-lose-focus',
				'id'    => 'dvsfw_license_key',
			],
			'dvsfw_automatic_status' => [
				'name'    => esc_html__( 'When do you want to send Shipment?', 'wc-shipos-delivery' ),
				'type'    => 'select',
				'options' => array_merge( [ '0' => esc_html__( 'Manually by clicking', 'wc-shipos-delivery' ) ], wc_get_order_statuses() ),
				'id'      => 'dvsfw_automatic_status',
			],
			'dvsfw_use_order_notes'  => [
				'name' => esc_html__( 'Use order notes?', 'wc-shipos-delivery' ),
				'type' => 'checkbox',
				'desc' => esc_html__( 'Use order notes if order comment field is empty', 'wc-shipos-delivery' ),
				'id'   => 'dvsfw_use_order_notes',
			],

			'dvsfw_phone_no_field_key'      => [
				'name' => esc_html__( 'Phone Number Field Key', 'wc-shipos-delivery' ),
				'type' => 'text',
				'id'   => 'dvsfw_phone_no_field_key',
			],
			'dvsfw_house_no_field_key'      => [
				'name' => esc_html__( 'House Number Field Key', 'wc-shipos-delivery' ),
				'type' => 'text',
				'id'   => 'dvsfw_house_no_field_key',
			],
			'dvsfw_apartment_field_key'     => [
				'name' => esc_html__( 'Apartment Field Key', 'wc-shipos-delivery' ),
				'type' => 'text',
				'id'   => 'dvsfw_apartment_field_key',
			],
			'dvsfw_floor_field_key'         => [
				'name' => esc_html__( 'Floor Field Key', 'wc-shipos-delivery' ),
				'type' => 'text',
				'id'   => 'dvsfw_floor_field_key',
			],
			'dvsfw_entrance_field_key'      => [
				'name' => esc_html__( 'Entrance Field Key', 'wc-shipos-delivery' ),
				'type' => 'text',
				'id'   => 'dvsfw_entrance_field_key',
			],
			'dvsfw_order_comment_field_key' => [
				'name' => esc_html__( 'Order Comment Field Key', 'wc-shipos-delivery' ),
				'type' => 'text',
				'id'   => 'dvsfw_order_comment_field_key',
			]
		];
	}
}

Settings::init();
