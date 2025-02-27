<?php

function china_payments_setting_get( $option_name ) {
	return ChinaPayments\Settings::instance()->get( $option_name );
}

function china_payments_template_load( string $template_name, array $args = array(), string $template_path = '', string $default_path = '' ) {
	ChinaPayments\Template::load_template( $template_name, $args, $template_path, $default_path );
}

function china_payments_encrypt( $string, $secret_key, $secret_iv ): string {
	$key = hash( 'sha256', $secret_key );
	$iv  = substr( hash( 'sha256', $secret_iv ), 0, 16 );

	return base64_encode( openssl_encrypt( $string, 'AES-256-CBC', $key, 0, $iv ) );
}

function china_payments_decrypt( $string, $secret_key, $secret_iv ): string {
	$key = hash( 'sha256', $secret_key );
	$iv  = substr( hash( 'sha256', $secret_iv ), 0, 16 );

	return openssl_decrypt( base64_decode( $string ), 'AES-256-CBC', $key, 0, $iv );
}

/**
 * @return wpdb
 */
function china_payments_wpdb(): wpdb {
	global $wpdb;

	return $wpdb;
}

/**
 * @param $query
 * @return array
 */
function china_payments_dbDelta( $query ) {
	if ( ! function_exists( 'dbDelta' ) ) {
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	}

	return dbDelta( $query );
}

/**
 * Can be later abstracted to return a different version number for WP_DEBUG or setting.
 *
 * @return string
 */
function china_payments_frontend_file_version(): string {
	return ( defined( 'WP_DEBUG' ) && WP_DEBUG ? '' . time() : CHINA_PAYMENTS_VERSION );
}

function china_payments_frontend_configuration(): array {
	return array(
		'user_id'               => get_current_user_id(),
		'is_user_logged_in'     => ( is_user_logged_in() ? 1 : 0 ),
		'is_user_administrator' => ( current_user_can( CHINA_PAYMENTS_ADMIN_CAP ) ? 1 : 0 ),
		'is_https'              => ( wp_is_using_https() ? 1 : 0 ),
		'domain_url'            => esc_url( ( isset( $_SERVER['HTTPS'] ) ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] ),
		'site_url'              => get_site_url(),
		'rest_url'              => esc_url_raw( rest_url() ),
		'rest_nonce'            => wp_create_nonce( 'wp_rest' ),
		'file_version'          => china_payments_frontend_file_version(),
		'library_url'           => plugin_dir_url( CHINA_PAYMENTS_BASE_FILE_PATH ) . 'interface/app/',
		'component_injection'   => array(),
		'template_extra'        => array(),
		'logo'                  => plugins_url( 'interface/img/logo.png', CHINA_PAYMENTS_BASE_FILE_PATH ),
		'loader_icon'           => plugins_url( 'interface/img/loader-icon.png', CHINA_PAYMENTS_BASE_FILE_PATH ),
	);
}

function china_payments_frontend_language(): array {
	return array(
		'no_results_response' => __( 'No results found.', 'china-payments' ),
		'cancelled_request'   => __( 'Request cancelled', 'china-payments' ),
		'asset_failed_fetch'  => __( 'Failed to fetch asset required to display this section, please refresh and try again, if this error persists, contact support for assistance.', 'china-payments' ),
	);
}

function china_payments_register_universal_interface() {
	$file_version = china_payments_frontend_file_version();

	wp_register_style( CHINA_PAYMENTS_PREFIX, plugins_url( 'interface/app/style.css', CHINA_PAYMENTS_BASE_FILE_PATH ), array(), $file_version );
	wp_enqueue_style( CHINA_PAYMENTS_PREFIX );

	wp_register_script( CHINA_PAYMENTS_PREFIX, plugins_url( 'interface/app/app.min.js', CHINA_PAYMENTS_BASE_FILE_PATH ), array( 'jquery', 'wp-util', 'lodash' ), $file_version, true );

	wp_localize_script(
		CHINA_PAYMENTS_PREFIX,
		'china_payments_data',
		array(
			'configuration' => china_payments_frontend_configuration(),
			'lang'          => china_payments_frontend_language(),
		)
	);

	wp_enqueue_script( CHINA_PAYMENTS_PREFIX );
}

function china_payments_domain_name() {
	return str_replace( array( 'https://www.', 'https://', 'http://www.', 'http://' ), '', rtrim( get_site_url(), '/' ) );
}

function _china_payments_refresh_rewrite_rules_and_capabilities() {
	global $wp_roles;

	$capabilities = array(
		CHINA_PAYMENTS_ADMIN_CAP,
	);

	foreach ( $capabilities as $capability ) {
		$wp_roles->add_cap( 'administrator', $capability );
	}

	try {
		flush_rewrite_rules();
	} catch ( \Exception $exception ) {

	}
}

function china_payments_integrations() {
	$response = array(
		'payment-page/payment-page.php'              => array(
			'name'         => 'Payment Page',
			'plugin_slug'  => 'payment-page/payment-page.php',
			'logo_url'     => plugins_url( 'interface/img/integrations/payment-page.svg', CHINA_PAYMENTS_BASE_FILE_PATH ),
			'can_install'  => 1,
			'is_installed' => 0,
			'is_active'    => 0,
			'actions'      => array(
				admin_url( 'admin.php?page=payment-page' ) => __( 'View Dashboard', 'china-payments' ),
			),
		),
		'woocommerce/woocommerce.php'                => array(
			'name'         => 'WooCommerce',
			'plugin_slug'  => 'woocommerce/woocommerce.php',
			'logo_url'     => plugins_url( 'interface/img/integrations/woocommerce.png', CHINA_PAYMENTS_BASE_FILE_PATH ),
			'can_install'  => 1,
			'is_installed' => 0,
			'is_active'    => 0,
			'actions'      => array(
				admin_url( 'admin.php?page=wc-settings&tab=checkout' ) => __( 'Manage Payment Methods', 'china-payments' ),
			),
		),
		'memberpress/memberpress.php'                => array(
			'name'         => 'MemberPress',
			'plugin_slug'  => 'memberpress/memberpress.php',
			'logo_url'     => plugins_url( 'interface/img/integrations/memberpress.png', CHINA_PAYMENTS_BASE_FILE_PATH ),
			'can_install'  => 0,
			'is_installed' => 0,
			'is_active'    => 0,
			'actions'      => array(
				admin_url( 'admin.php?page=memberpress-options#mepr-integration' ) => __( 'Manage Payment Methods', 'china-payments' ),
			),
		),
		'simple-membership/simple-wp-membership.php' => array(
			'name'         => 'Simple Membership',
			'plugin_slug'  => 'simple-membership/simple-wp-membership.php',
			'logo_url'     => plugins_url( 'interface/img/integrations/simple-membership.png', CHINA_PAYMENTS_BASE_FILE_PATH ),
			'can_install'  => 1,
			'is_installed' => 0,
			'is_active'    => 0,
			'actions'      => array(
				admin_url( 'admin.php?page=simple_wp_membership_payments&tab=payment_buttons' ) => __( 'Manage Payment Buttons', 'china-payments' ),
			),
		),
		'lifterlms/lifterlms.php'                    => array(
			'name'         => 'LifterLMS',
			'plugin_slug'  => 'lifterlms/lifterlms.php',
			'logo_url'     => plugins_url( 'interface/img/integrations/lifterlms.svg', CHINA_PAYMENTS_BASE_FILE_PATH ),
			'can_install'  => 1,
			'is_installed' => 0,
			'is_active'    => 0,
			'actions'      => array(
				admin_url( 'admin.php?page=llms-settings&tab=checkout' ) => __( 'Manage Payment Methods', 'china-payments' ),
			),
		),
	);

	foreach ( $response as $k => $plugin_information ) {
		if ( ! file_exists( WP_PLUGIN_DIR . '/' . $plugin_information['plugin_slug'] ) ) {
			continue;
		}

		$response[ $k ]['is_installed'] = 1;
		$response[ $k ]['is_active']    = ( is_plugin_active( $plugin_information['plugin_slug'] ) ? 1 : 0 );
	}

	return $response;
}

function china_payments_woocommerce_ensure_cart_loaded(): bool {
	if ( defined( 'WC_ABSPATH' ) ) {
		require_once WC_ABSPATH . 'includes/wc-cart-functions.php';
		require_once WC_ABSPATH . 'includes/wc-notice-functions.php';
		require_once WC_ABSPATH . 'includes/wc-template-hooks.php';
	}

	if ( null === WC()->session ) {
		$session_class = apply_filters( 'woocommerce_session_handler', 'WC_Session_Handler' );
		WC()->session  = new $session_class();
		WC()->session->init();
	}

	if ( null === WC()->customer ) {
		try {
			WC()->customer = new WC_Customer( get_current_user_id(), true );
		} catch ( \Exception $e ) {
			return false;
		}
	}

	if ( null === WC()->cart ) {
		WC()->cart = new WC_Cart();
	}

	// force cart to refresh data.
	WC()->cart->get_cart();

	return true;
}

function china_payments_stripe_customer_id( $args ) {
	if ( isset( $args['user_id'] ) && ! empty( $args['user_id'] ) ) {
		$user = get_user_by( 'ID', intval( $args['user_id'] ) );

		return ChinaPayments\PaymentGateway::get_integration_from_settings( 'stripe' )->get_customer_id(
			array(
				'first_name'    => $user->first_name,
				'last_name'     => $user->last_name,
				'email_address' => $user->user_email,
				'currency'      => strtolower( $args['currency'] ),
			)
		);
	}

	if ( isset( $args['email_address'] ) ) {
		return ChinaPayments\PaymentGateway::get_integration_from_settings( 'stripe' )->get_customer_id(
			array(
				'email_address' => $args['email_address'],
				'currency'      => strtolower( $args['currency'] ),
			)
		);
	}

	return null;
}

function china_payments_woocommerce_stripe_awaiting_payments_order_ids(
  $min_datetime = null,
  $max_datetime = null,
  $order_statuses = ['wc-pending']
): array {
  // Default date values
  $min_datetime = $min_datetime ?: date('Y-m-d H:i:s', strtotime('-1 day'));
  $max_datetime = $max_datetime ?: date('Y-m-d H:i:s');

  // Check if HPOS is enabled
  if (class_exists('\Automattic\WooCommerce\Utilities\OrderUtil')) {
    $hpos_enabled = \Automattic\WooCommerce\Utilities\OrderUtil::custom_orders_table_usage_is_enabled();
  } else {
    $hpos_enabled = false;
  }

  // Payment methods to filter
  $payment_methods = ['china_payments_stripe_wechat', 'china_payments_stripe_alipay'];

  if ($hpos_enabled) {
    // Query for HPOS
    $query = china_payments_wpdb()->prepare("
            SELECT wc_order.id
            FROM " . china_payments_wpdb()->prefix . "wc_orders wc_order
            WHERE wc_order.status IN (" . implode(', ', array_fill(0, count($order_statuses), '%s')) . ")
            AND wc_order.date_created_gmt BETWEEN %s AND %s
            AND wc_order.payment_method IN (" . implode(', ', array_fill(0, count($payment_methods), '%s')) . ")
            AND EXISTS (
                SELECT order_meta.*
                FROM " . china_payments_wpdb()->prefix . "wc_orders_meta order_meta
                WHERE order_meta.order_id = wc_order.id
                AND order_meta.meta_key = 'china_payments_payment_intent_id'
                AND order_meta.meta_value != ''
            )
        ", array_merge($order_statuses, [$min_datetime, $max_datetime], $payment_methods));
  } else {
    // Query for traditional storage
    $query = china_payments_wpdb()->prepare("
            SELECT ID
            FROM " . china_payments_wpdb()->prefix . "posts AS o
            INNER JOIN " . china_payments_wpdb()->prefix . "postmeta AS m1 ON o.ID = m1.post_id
            INNER JOIN " . china_payments_wpdb()->prefix . "postmeta AS m2 ON o.ID = m2.post_id
            WHERE o.post_status IN (" . implode(', ', array_fill(0, count($order_statuses), '%s')) . ")
            AND o.post_date_gmt BETWEEN %s AND %s
            AND m1.meta_key = '_payment_method' AND m1.meta_value IN (" . implode(', ', array_fill(0, count($payment_methods), '%s')) . ")
            AND m2.meta_key = 'china_payments_payment_intent_id' AND m2.meta_value != ''
        ", array_merge($order_statuses, [$min_datetime, $max_datetime], $payment_methods));
  }

  // Fetch and return results
  return china_payments_wpdb()->get_col($query);
}