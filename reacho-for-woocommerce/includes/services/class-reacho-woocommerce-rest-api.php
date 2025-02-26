<?php

/**
 * ReachoWooCommerce API
 *
 * Handles WooCommerce Reacho API endpoint requests
 *
 * @since      1.0.0
 * @package    ReachoWooCommerce
 * @subpackage ReachoWooCommerce/includes/services
 * @author     Reacho <support@reacho.com>
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Reacho_WooCommerce_Rest_Api {


	const VERSION = '1.0.0';
	const REACHO_BASE_URL = 'reacho/v1';
	const ORDERS_ENDPOINT = 'orders';
	const EXTENSION_VERSION_ENDPOINT = 'version';
	const PRODUCTS_ENDPOINT = 'products';
	const OPTIONS_ENDPOINT = 'options';

	// API RESPONSES.
	const API_RESPONSE_CODE = 'status_code';
	const API_RESPONSE_ERROR = 'error';
	const API_RESPONSE_REASON = 'reason';
	const API_RESPONSE_SUCCESS = 'success';

	// HTTP CODES.
	const STATUS_CODE_HTTP_OK = 200;
	const STATUS_CODE_NO_CONTENT = 204;
	const STATUS_CODE_BAD_REQUEST = 400;
	const STATUS_CODE_AUTHENTICATION_ERROR = 401;
	const STATUS_CODE_AUTHORIZATION_ERROR = 403;
	const STATUS_CODE_INTERNAL_SERVER_ERROR = 500;

	const DEFAULT_RECORDS_PER_PAGE = '50';
	const DATE_MODIFIED = 'post_modified_gmt';
	const POST_STATUS_ANY = 'any';

	const ERROR_KEYS_NOT_PASSED = 'consumer key or consumer secret not passed';
	const ERROR_CONSUMER_KEY_NOT_FOUND = 'consumer_key not found';

	const PERMISSION_READ = 'read';
	const PERMISSION_WRITE = 'write';
	const PERMISSION_READ_WRITE = 'read_write';
	const PERMISSION_METHOD_MAP = array(
		self::PERMISSION_READ       => array( 'GET' ),
		self::PERMISSION_WRITE      => array( 'POST' ),
		self::PERMISSION_READ_WRITE => array( 'GET', 'POST' ),
	);

	public function __construct() {
		add_action( 'rest_api_init', array( $this, 'register_routes' ) );
	}

	/**
	 * Iterate over query to fetch all resource IDs.
	 *
	 * @param WP_Query $loop The query object.
	 *
	 * @return array
	 */
	public function count_loop( WP_Query $loop ) {
		$loop_ids = array();
		while ( $loop->have_posts() ) {
			$loop->the_post();
			$loop_id = get_the_ID();
			array_push( $loop_ids, $loop_id );
		}

		return $loop_ids;
	}

	/**
	 * Legacy validation function.
	 *
	 * @param WP_REST_Request $request Incoming request object.
	 *
	 * @return array
	 */
	public function validate_request( $request ) {
		$consumer_key    = $request->get_param( 'consumer_key' );
		$consumer_secret = $request->get_param( 'consumer_secret' );
		if ( empty( $consumer_key ) || empty( $consumer_secret ) ) {
			return $this->validation_response(
				true,
				Reacho_WooCommerce_Rest_Api::STATUS_CODE_BAD_REQUEST,
				Reacho_WooCommerce_Rest_Api::ERROR_KEYS_NOT_PASSED,
				false
			);
		}

		global $wpdb;

		// Hash the consumer_key to store as a hash.
		$key = sanitize_text_field( hash_hmac( 'sha256', $consumer_key, 'wc-api' ) );

		// Create a unique cache key based on the hashed $key.
		$key_cache = 'consumer_key_' . $key;

		// Attempt to get the cached result first.
		$user = wp_cache_get( $key_cache, 'woocommerce_api_keys' );

		if ( $user === false ) {
			// If not found in cache, query the database.
			$user = $wpdb->get_row(
				$wpdb->prepare(
					"
            SELECT consumer_key, consumer_secret
            FROM {$wpdb->prefix}woocommerce_api_keys
            WHERE consumer_key = %s",
					$key
				)
			);

			// If the result is found, store it in cache for future use (1 hour expiration).
			if ( $user ) {
				wp_cache_set( $key_cache, $user, 'woocommerce_api_keys', 1800 ); // Cache for 30 min
			}
		}

		if ( $user && $user->consumer_secret === $consumer_secret ) {
			return $this->validation_response(
				false,
				Reacho_WooCommerce_Rest_Api::STATUS_CODE_HTTP_OK,
				null,
				true
			);
		}

		return $this->validation_response(
			true,
			Reacho_WooCommerce_Rest_Api::STATUS_CODE_AUTHORIZATION_ERROR,
			Reacho_WooCommerce_Rest_Api::ERROR_CONSUMER_KEY_NOT_FOUND,
			false
		);
	}

	/**
	 * Validate incoming requests to custom endpoints.
	 *
	 * @param WP_REST_Request $request Incoming request object.
	 *
	 * @return bool|WP_Error True if validation succeeds, otherwise WP_Error to be handled by rest server.
	 */
	public function validate_request_v2( WP_REST_Request $request ) {
		$consumer_key    = $request->get_param( 'consumer_key' );
		$consumer_secret = $request->get_param( 'consumer_secret' );
		if ( empty( $consumer_key ) || empty( $consumer_secret ) ) {
			return new WP_Error(
				'reacho_missing_key_secret',
				'One or more of consumer key and secret are missing.',
				array( 'status' => Reacho_WooCommerce_Rest_Api::STATUS_CODE_AUTHENTICATION_ERROR )
			);
		}

		global $wpdb;

		// Hash the consumer_key to store as a hash.
		$key = sanitize_text_field( hash_hmac( 'sha256', $consumer_key, 'wc-api' ) );

		// Create a unique cache key based on the hashed $key.
		$key_cache = 'consumer_key_' . $key;

		// Attempt to get the cached result first.
		$user = wp_cache_get( $key_cache, 'woocommerce_api_keys' );

		if ( $user === false ) {
			// If not found in cache, query the database.
			$user = $wpdb->get_row(
				$wpdb->prepare(
					"
            SELECT consumer_key, consumer_secret
            FROM {$wpdb->prefix}woocommerce_api_keys
            WHERE consumer_key = %s",
					$key
				)
			);

			// If the result is found, store it in cache for future use (1 hour expiration).
			if ( $user ) {
				wp_cache_set( $key_cache, $user, 'woocommerce_api_keys', 1800 ); // Cache for 30 min
			}
		}

		// User query lookup on consumer key can return null or false.
		if ( ! $user ) {
			return new WP_Error(
				'reacho_cannot_authentication',
				'Cannot authenticate with provided credentials.',
				array( 'status' => 401 )
			);
		}
		// User does not have proper permissions.
		if ( ! in_array( $request->get_method(), Reacho_WooCommerce_Rest_Api::PERMISSION_METHOD_MAP[ $user->permissions ], true ) ) {
			return new WP_Error(
				'reacho_improper_permissions',
				'Improper permissions to access this resource.',
				array( 'status' => Reacho_WooCommerce_Rest_Api::STATUS_CODE_AUTHORIZATION_ERROR )
			);
		}
		// Success!
		if ( $user->consumer_secret === $consumer_secret ) {
			return true;
		}

		// Consumer secret didn't match or some other issue authenticating.
		return new WP_Error(
			'reacho_invalid_authentication',
			'Invalid authentication.',
			array( 'status' => Reacho_WooCommerce_Rest_Api::STATUS_CODE_AUTHENTICATION_ERROR )
		);
	}

	/**
	 * Helper method to build response.
	 *
	 * @param boolean $error Whether there's an error during validation.
	 * @param string $code HTTP status code.
	 * @param string $reason Reason for error.
	 * @param boolean $success Whether validation was successful.
	 *
	 * @return array
	 */
	public function validation_response( $error, $code, $reason, $success ) {
		return array(
			Reacho_WooCommerce_Rest_Api::API_RESPONSE_ERROR   => $error,
			Reacho_WooCommerce_Rest_Api::API_RESPONSE_CODE    => $code,
			Reacho_WooCommerce_Rest_Api::API_RESPONSE_REASON  => $reason,
			Reacho_WooCommerce_Rest_Api::API_RESPONSE_SUCCESS => $success,
		);
	}

	/**
	 * Helper function for
	 *
	 * @param WP_REST_Request $request Incoming request object.
	 * @param string $post_type WordPress post type.
	 *
	 * @return array
	 */
	public function process_resource_args( $request, $post_type ) {
		$page_limit = $request->get_param( 'page_limit' );
		if ( empty( $page_limit ) ) {
			$page_limit = Reacho_WooCommerce_Rest_Api::DEFAULT_RECORDS_PER_PAGE;
		}
		$date_modified_after  = $request->get_param( 'date_modified_after' );
		$date_modified_before = $request->get_param( 'date_modified_before' );
		$page                 = $request->get_param( 'page' );

		$args = array(
			'post_type'      => $post_type,
			'posts_per_page' => $page_limit,
			'post_status'    => Reacho_WooCommerce_Rest_Api::POST_STATUS_ANY,
			'paged'          => $page,
			'date_query'     => array(
				array(
					'column' => Reacho_WooCommerce_Rest_Api::DATE_MODIFIED,
					'after'  => $date_modified_after,
					'before' => $date_modified_before,
				),
			),
		);

		return $args;
	}

	/**
	 * Helper function to build arg value for date_modified query.
	 *
	 * To maintain backwards compatibility we need to convert the
	 * datetime string (e.g. 2023-06-01T17:01:29) to  unix timestamp
	 * because dates are not fine-grained enough for periodic syncs.
	 * https://github.com/woocommerce/woocommerce/wiki/wc_get_orders-and-WC_Order_Query#date
	 *
	 * Date query arg value passed to wc_get_orders can be null.
	 *
	 * @param WP_REST_Request $request Incoming request object.
	 *
	 * @return string|null
	 */
	public function reachowc_build_date_modified_arg_value( WP_REST_Request $request ) {
		$date_modified_after  = $request->get_param( 'date_modified_after' );
		$date_modified_before = $request->get_param( 'date_modified_before' );

		// strtotime() returns false if it cannot parse datetime string.
		$after_ts  = strtotime( $date_modified_after );
		$before_ts = strtotime( $date_modified_before );

		if ( $after_ts && $before_ts ) {
			return "{$after_ts}...{$before_ts}";
		} elseif ( $after_ts ) {
			return ">={$after_ts}";
		} elseif ( $before_ts ) {
			return "<={$before_ts}";
		}

		return null;
	}

	/**
	 * Get orders based on request params.
	 *
	 * @param WP_REST_Request $request Incoming request object.
	 *
	 * @return array
	 */
	public function reachowc_get_orders_count( WP_REST_Request $request ) {
		$orders = $this->reacho_query_orders( $request );

		return array( 'order_count' => $orders->total );
	}

	/**
	 * Get product count based on request params.
	 *
	 * @param WP_REST_Request $request Incoming request object.
	 *
	 * @return array
	 */
	public function get_products_count( WP_REST_Request $request ) {
		$validated_request = $this->validate_request( $request );
		if ( true === $validated_request['error'] ) {
			return $validated_request;
		}

		$args = $this->process_resource_args( $request, 'product' );
		$loop = new WP_Query( $args );
		$data = $this->count_loop( $loop );

		return array( 'product_count' => $loop->found_posts );
	}

	/**
	 * Get products based on request params.
	 *
	 * @param WP_REST_Request $request Incoming request object.
	 *
	 * @return array|array[]
	 */
	public function get_products( WP_REST_Request $request ) {
		$validated_request = $this->validate_request( $request );
		if ( true === $validated_request['error'] ) {
			return $validated_request;
		}

		$args = $this->process_resource_args( $request, 'product' );

		$loop = new WP_Query( $args );
		$data = $this->count_loop( $loop );

		return array( 'product_ids' => $data );
	}

	/**
	 * Query for orders using request params.
	 *
	 * `wc_get_orders` is an HPOS compatible query method that is backwards
	 * compatible with the old wp_posts table as well. Passing `paginate`
	 * as an arg returns an object instead of just an array with result values.
	 *
	 * e.g.
	 * stdClass Object
	 * (
	 *   [orders] => Array(
	 *       [0] => 157
	 *       [1] => 156
	 *   )
	 *   [total] => 51
	 *   [max_num_pages] => 26
	 * )
	 *
	 * @param WP_REST_Request $request Incoming request object.
	 *
	 * @return stdClass|WC_Order[]
	 */
	public function reacho_query_orders( $request ) {
		$page       = $request->get_param( 'page' );
		$page_limit = $request->get_param( 'page_limit' );
		if ( empty( $page_limit ) ) {
			$page_limit = Reacho_WooCommerce_Rest_Api::DEFAULT_RECORDS_PER_PAGE;
		}

		$date_modified_arg_value = $this->reachowc_build_date_modified_arg_value( $request );

		$args = array(
			'type'          => 'shop_order',
			'limit'         => $page_limit,
			'paged'         => $page,
			'date_modified' => $date_modified_arg_value,
			'return'        => 'ids',
			'paginate'      => true,
		);

		return wc_get_orders( $args );
	}

	/**
	 * Get orders count based on request params.
	 *
	 * @param WP_REST_Request $request Incoming request object.
	 *
	 * @return array
	 */
	public function reachowc_get_orders( WP_REST_Request $request ) {
		$orders = $this->reacho_query_orders( $request );

		return array( 'order_ids' => $orders->orders );
	}

	/**
	 * Handle POST request to /reacho/v1/options and update plugin options.
	 *
	 * @param WP_REST_Request $request Incoming request object.
	 *
	 * @return bool|mixed|void|WP_Error
	 */
	public function update_options( WP_REST_Request $request ) {
		$body = json_decode( $request->get_body(), $assoc = true );
		if ( ! $body ) {
			return new WP_Error(
				'reacho_empty_body',
				'Body of request cannot be empty.',
				array( 'status' => 400 )
			);
		}

		$options = get_option( 'reachowc_settings' );
		if ( ! $options ) {
			$options = array();
		}

		$updated_options = array_replace( $options, $body );
		$is_update       = (bool) array_diff_assoc( $options, $updated_options );
		// If there is no change between existing and new settings `update_option` returns false. Want to distinguish
		// between that scenario and an actual problem when updating the plugin options.
		if ( ! update_option( 'reachowc_settings', $updated_options ) && $is_update ) {
			return new WP_Error(
				'reacho_update_failed',
				'Options update failed.',
				array(
					'status'  => Reacho_WooCommerce_Rest_Api::STATUS_CODE_INTERNAL_SERVER_ERROR,
					'options' => get_option( 'reachowc_settings' ),
				)
			);
		}

		return $updated_options;
	}

	/**
	 * Handle GET request to /reacho/v1/options and return options set for plugin.
	 *
	 * @return array Reacho plugin options.
	 */
	public function get_reacho_options() {
		return get_option( 'reachowc_settings' );
	}

	public function register_routes() {
		register_rest_route(
			Reacho_WooCommerce_Rest_Api::REACHO_BASE_URL,
			Reacho_WooCommerce_Rest_Api::EXTENSION_VERSION_ENDPOINT,
			array(
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => array( $this, 'get_extension_version' ),
				'permission_callback' => '__return_true',
			)
		);
		register_rest_route(
			Reacho_WooCommerce_Rest_Api::REACHO_BASE_URL,
			'orders/count',
			array(
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => array( $this, 'reachowc_get_orders_count' ),
				'permission_callback' => array( $this, 'validate_request_v2' ),
			)
		);
		register_rest_route(
			Reacho_WooCommerce_Rest_Api::REACHO_BASE_URL,
			'products/count',
			array(
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => array( $this, 'get_products_count' ),
				'permission_callback' => '__return_true',
			)
		);
		register_rest_route(
			Reacho_WooCommerce_Rest_Api::REACHO_BASE_URL,
			Reacho_WooCommerce_Rest_Api::ORDERS_ENDPOINT,
			array(
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => array( $this, 'reachowc_get_orders' ),
				'args'                => array(
					'id' => array(
						'validate_callback' => 'is_numeric',
					),
				),
				'permission_callback' => array( $this, 'validate_request_v2' ),
			)
		);
		register_rest_route(
			Reacho_WooCommerce_Rest_Api::REACHO_BASE_URL,
			Reacho_WooCommerce_Rest_Api::PRODUCTS_ENDPOINT,
			array(
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => array( $this, 'get_products' ),
				'args'                => array(
					'id' => array(
						'validate_callback' => 'is_numeric',
					),
				),
				'permission_callback' => '__return_true',
			)
		);
		register_rest_route(
			Reacho_WooCommerce_Rest_Api::REACHO_BASE_URL,
			Reacho_WooCommerce_Rest_Api::OPTIONS_ENDPOINT,
			array(
				array(
					'methods'             => WP_REST_Server::CREATABLE,
					'callback'            => array( $this, 'update_options' ),
					'permission_callback' => array( $this, 'validate_request_v2' ),
				),
				array(
					'methods'             => WP_REST_Server::READABLE,
					'callback'            => array( $this, 'get_reacho_options' ),
					'permission_callback' => array( $this, 'validate_request_v2' ),
				),
			)
		);
	}
}

function reachowc_get_plugin_usage_meta_data() {
	if ( class_exists( 'WooCommerce' ) ) {
		global $woocommerce;
		$woocommerce_version = "woocommerce/$woocommerce->version";
	} else {
		$woocommerce_version = '';
	}

	$wp_version              = get_bloginfo( 'version' );
	$php_version             = PHP_VERSION;
	$reachowc_plugin_version = Reacho_WooCommerce_Rest_Api::VERSION;

	return "reacho-woocommerce/$reachowc_plugin_version wordpress/$wp_version php/$php_version $woocommerce_version";
}