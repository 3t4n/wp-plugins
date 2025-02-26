<?php
/**
 * Add settings API for Tiktok Feed plugin.
 * php version ^5.6.*
 *
 * @package  Automizely/Feed/RestAPI
 * @link     https://www.automizely.com/
 */

if ( ! class_exists( 'AM_FEED_REST_Settings_Controller' ) ) {
	/**
	 * Class AM_RC_REST_Settings_Controller
	 *
	 * @package  Automizely/Feed/RestAPI
	 * @link     https://www.automizely.com/
	 */
	class AM_FEED_REST_Settings_Controller extends WP_REST_Controller {

		/**
		 * API namespace.
		 *
		 * @var string
		 */
		protected $namespace = 'wc/feed/v1';
		/**
		 * API resource is settings.
		 *
		 * @var string
		 */
		protected $rest_base = 'settings';

		/**
		 * Feed option name.
		 *
		 * @var string
		 */
		private $option_name = 'feed_option_name';

		/**
		 * Constructor.
		 */
		public function __construct() {
		}

		/**
		 * Get settings.
		 *
		 * @return array
		 */
		public function get_settings() {
			$settings                = get_option( $this->option_name );
			$settings['currency']    = get_woocommerce_currency();
			$settings['weight_unit'] = get_option( 'woocommerce_weight_unit' );
			$settings['locale']      = get_locale();
			$settings['version']     = array(
				'wordpress'   => get_bloginfo( 'version' ),
				'woocommerce' => WC()->version,
				'feed'        => AUTOMIZELY_FEED_VERSION,
			);
			return array( 'settings' => $settings );
		}

		/**
		 * Create or update settings
		 *
		 * @param WP_REST_Request $data Request object.
		 *
		 * @return array
		 */
		public function create_or_update_settings( WP_REST_Request $data ) {
			$options = get_option( $this->option_name );

			if ( isset( $data['connected'] )
				&& in_array( $data['connected'], array( true, false ), true )
			) {
				$options['connected'] = $data['connected'];
			}

			update_option( $this->option_name, $options );
			return $this->get_settings();
		}

		/**
		 * Register router.
		 *
		 * @return void
		 */
		public function register_routes() {
			register_rest_route(
				$this->namespace,
				'/' . $this->rest_base,
				array(
					array(
						'methods'             => WP_REST_Server::READABLE,
						'callback'            => array( $this, 'get_settings' ),
						'permission_callback' => array(
							$this,
							'get_items_permissions_check',
						),
						'args'                => array(),
					),
					array(
						'methods'             => WP_REST_Server::CREATABLE,
						'callback'            => array(
							$this,
							'create_or_update_settings',
						),
						'permission_callback' => array(
							$this,
							'create_item_permissions_check',
						),
						'args'                => array(),
					),
				)
			);
		}


		/**
		 * Check whether a given request has permission to read tax classes.
		 *
		 * @param  WP_REST_Request $request Full details about the request.
		 * @return WP_Error|boolean
		 */
		public function get_items_permissions_check( $request ) {
			if ( ! wc_rest_check_manager_permissions( 'settings', 'read' ) ) {
				return new WP_Error( 'woocommerce_rest_cannot_view', __( 'Sorry, you cannot list resources.', 'woocommerce' ), array( 'status' => rest_authorization_required_code() ) );
			}

			return true;
		}

		/**
		 * Check if a given request has access create tax classes.
		 *
		 * @param WP_REST_Request $request Full details about the request.
		 *
		 * @return bool|WP_Error
		 */
		public function create_item_permissions_check( $request ) {
			if ( ! wc_rest_check_manager_permissions( 'settings', 'create' ) ) {
				return new WP_Error( 'woocommerce_rest_cannot_create', __( 'Sorry, you are not allowed to create resources.', 'woocommerce' ), array( 'status' => rest_authorization_required_code() ) );
			}

			return true;
		}

		/**
		 * Check if a given request has access delete a tax.
		 *
		 * @param WP_REST_Request $request Full details about the request.
		 *
		 * @return bool|WP_Error
		 */
		public function delete_item_permissions_check( $request ) {
			if ( ! wc_rest_check_manager_permissions( 'settings', 'delete' ) ) {
				return new WP_Error( 'woocommerce_rest_cannot_delete', __( 'Sorry, you are not allowed to delete this resource.', 'woocommerce' ), array( 'status' => rest_authorization_required_code() ) );
			}

			return true;
		}
	}
}
