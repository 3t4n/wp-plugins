<?php
/**
 * AdminPageReact Init
 *
 * @version 1.0.1
 * @package 'datalayer-for-ecommerce-free'
 */

namespace DatalayerForWoocommerceFree;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'AdminPageReact' ) ) :
	/**
	 * Class AdminPageReact
	 */
	class AdminPageReact {

		/**
		 * The single instance of the class.
		 *
		 * @var object
		 */
		protected static $instance = null;

		/**
		 * Constructor.
		 */
		private function __construct() {
			add_action( 'admin_enqueue_scripts', array( $this, 'add_extension_register_script') );
			add_action( 'admin_menu', array( $this, 'add_extension_register_page') );
			add_action( 'admin_init', array( $this, 'register_setting'), 30);
			add_action( 'rest_api_init', array( $this, 'register_setting' ) );
			add_action( 'admin_init', array( $this, 'verify_migrate_datalayer_for_woocommerce_option') );
		}

		/**
		 * Main Extension Instance.
		 * Ensures only one instance of the extension is loaded or can be loaded.
		 */
		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Register the JS.
		 */
		public function add_extension_register_script() {

			if ( defined( 'WC_VERSION' ) && version_compare( \WC_VERSION, '6.5', '>=' ) ) {
				if ( ! method_exists( '\Automattic\WooCommerce\Admin\PageController', 'is_admin_or_embed_page' ) || ! \Automattic\WooCommerce\Admin\PageController::is_admin_or_embed_page() ) {
					return;
				}
			} else {
				wp_register_script( 'inline-datalayer', '', array(), '1.0', true );
				wp_enqueue_script( 'inline-datalayer' );
				$inline_script = 'document.body.classList.add("woocommerce-admin-page__datalayer-for-woocommerce");';
				wp_add_inline_script( 'inline-datalayer', $inline_script );
			}

			$script_path       = '/../assets/build/index.js';
			$script_asset_path = dirname( __FILE__ ) . '/../assets/build/index.asset.php';
			$script_asset      = file_exists( $script_asset_path )
				? require $script_asset_path
				: array( 'dependencies' => array('wp-i18n'), 'version' => filemtime( $script_path ) );
			$script_url        = plugins_url( $script_path, __FILE__ );

			wp_register_script(
				'datalayer-for-ecommerce-free-scripts',
				$script_url,
				$script_asset['dependencies'],
				$script_asset['version'],
				true
			);

			wp_register_style(
				'datalayer-for-ecommerce-free-styles',
				plugins_url( '/../assets/build/index.css', __FILE__ ),
				array(),
				filemtime( dirname( __FILE__ ) . '/../assets/build/index.css' )
			);

			wp_enqueue_script( 'datalayer-for-ecommerce-free-scripts' );
			wp_enqueue_style( 'datalayer-for-ecommerce-free-styles' );
			wp_set_script_translations('datalayer-for-ecommerce-free-scripts', 'datalayer-for-ecommerce-free', plugin_dir_path(__FILE__) . '../languages/');
		}

		/**
		 * Register a WooCommerce Admin page.
		 */
		public function add_extension_register_page() {
			if ( ! function_exists( 'wc_admin_register_page' ) ) {
				return;
			}

			wc_admin_register_page( array(
				'id'       => 'datalayer-for-ecommerce-free',
				'title'    => __('Datalayer for WooCommerce FREE', 'datalayer-for-ecommerce-free'),
				'parent'   => 'woocommerce',
				'path'     => '/datalayer-for-ecommerce-free',
				'nav_args' => array(
					'order'  => 10,
					'parent' => 'woocommerce',
				),
			) );
		}

		/**
		 * Register and add settings
		 */
		public function register_setting() {
			register_setting(
				'options_datalayer-for-ecommerce-free',
				'options_tracking_option_free',
				array(
					'type' => 'object',
					'show_in_rest' => array(
						'schema' => array(
							'type'       => 'object',
							'default'      => array(
								'tracking_google_tag_manager' => '',
								'data_layer_google_tag_manager_enhanced_ecommerce' => false,
								'data_layer_google_tag_manager_ecommerce_ga4' => false,
								'data_layer_google_tag_manager_show_user_info' => false,
								'data_layer_google_tag_manager_related_product_show' => false,
							),
							'properties' => array(
								'tracking_google_tag_manager' => array(
									'type' => 'string',
								),
								'data_layer_google_tag_manager_enhanced_ecommerce' => array(
									'type' => 'boolean',
								),
								'data_layer_google_tag_manager_ecommerce_ga4' => array(
									'type' => 'boolean',
								),
								'data_layer_google_tag_manager_show_user_info' => array(
									'type' => 'boolean',
								),
								'data_layer_google_tag_manager_related_product_show' => array(
									'type' => 'boolean',
								),
							),
						),
					),
				)
			);

		}

		/**
		 * Migrate Options
		 */
		public function verify_migrate_datalayer_for_woocommerce_option() {
			$migrate_datalayer_for_woocommerce_option = get_option( 'migrate_datalayer_for_woocommerce' );
			if ( ! empty( $migrate_datalayer_for_woocommerce_option ) ) {
				if ( 'yes' === $migrate_datalayer_for_woocommerce_option ) {
					return;
				}
				update_option('migrate_datalayer_for_woocommerce', 'no');
				self::migrate_datalayer_for_woocommerce_option();
			}
			if ( empty( $migrate_datalayer_for_woocommerce_option ) ) {
				update_option('migrate_datalayer_for_woocommerce', 'no');
				self::migrate_datalayer_for_woocommerce_option();
			}
		}

		/**
		 * Migrate Options
		 */
		public function migrate_datalayer_for_woocommerce_option() {
			$old_options = get_option( 'tracking_option_pro' );
			if ( empty( $old_options ) ) {
				update_option('migrate_datalayer_for_woocommerce', 'yes');
				return;
			}

			$migrate_datalayer_for_woocommerce_option = get_option( 'migrate_datalayer_for_woocommerce' );
			if ( 'no' === $migrate_datalayer_for_woocommerce_option ) {

				if ( array_key_exists('google_tag_manager', $old_options) ) {
					$old_options['tracking_google_tag_manager'] = $old_options['google_tag_manager'];
					unset($old_options['google_tag_manager']);
				}
				$old_options = array_map(function( $value ) {
					if ( 'No' === $value ) {
						return false;
					} elseif ( 'Yes' === $value ) {
						return 1;
					}
					return $value;
				}, $old_options);

				$default_options = array(
					'tracking_google_tag_manager' => '',
					'data_layer_google_tag_manager_enhanced_ecommerce' => false,
					'data_layer_google_tag_manager_ecommerce_ga4' => false,
					'data_layer_google_tag_manager_show_user_info' => false,
				);

				$merged_options = array_merge($default_options, $old_options);

				update_option('options_tracking_option_free', $merged_options);
				update_option('migrate_datalayer_for_woocommerce', 'yes');
			}
		}

	}
endif;
