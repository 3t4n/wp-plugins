<?php
/**
 * AdminPage Init
 *
 * @version 1.0.1
 * @package 'datalayer-for-ecommerce-free'
 */

namespace DatalayerForWoocommerceFree;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'AdminPage' ) ) :
	/**
	 * Class AdminPage
	 */
	class AdminPage {

		/**
		 * Holds the values to be used in the fields callbacks
		 *
		 * @var $options Options Page.
		 */
		private $options;

		/**
		 * Const PLUGIN_PATH
		 *
		 * @const PLUGIN_PATH
		 */
		const PLUGIN_PATH = __FILE__;

		/**
		 * Instance of this class.
		 *
		 * @var object
		 */
		protected static $instance = null;

		/**
		 * Start up
		 */
		private function __construct() {
			add_action( 'admin_menu', array( $this, 'add_submenu_page' ) );
			add_action( 'admin_init', array( $this, 'page_init' ), 30 );
		}

		/**
		 * Return an instance of this class.
		 *
		 * @return object A single instance of this class.
		 */
		public static function instance() {
			if ( null === static::$instance ) {
				static::$instance = new static();
			}
			return static::$instance;
		}

		/**
		 * Add options page
		 */
		public function add_submenu_page() {
			add_submenu_page(
				'woocommerce',
				__( 'DataLayer for WooCommerce FREE', 'datalayer-for-ecommerce-free' ),
				__( 'DataLayer for WooCommerce FREE', 'datalayer-for-ecommerce-free' ),
				'manage_options',
				'datalayer-for-ecommerce-free',
				array( $this, 'create_admin_page' )
			);
		}

		/**
		 * Options page callback
		 */
		public function create_admin_page() {
			$this->options = get_option( 'tracking_option_pro' );
			include plugin_dir_path( self::PLUGIN_PATH ) . '../views/html-admin-page.php';
		}

		/**
		 * Register and add settings
		 */
		public function page_init() {
			add_settings_section(
				'tracking_section_pro',
				'',
				array( $this, 'tracking_section_callback_function' ),
				'datalayer-for-ecommerce-free'
			);
			add_settings_field(
				'tracking_google_tag_manager',
				'Google Tag Manager ID',
				array( $this, 'tracking_google_tag_manager_callback_function' ),
				'datalayer-for-ecommerce-free',
				'tracking_section_pro'
			);
			add_settings_field(
				'data_layer_google_tag_manager_enhanced_ecommerce',
				__( 'DataLayer for WooCommerce Enhanced Ecommerce', 'datalayer-for-ecommerce-free' ),
				array( $this, 'data_layer_google_tag_manager_enhanced_ecommerce_callback_function' ),
				'datalayer-for-ecommerce-free',
				'tracking_section_pro',
				array( 'class' => '' )
			);
			add_settings_field(
				'data_layer_google_tag_manager_ecommerce_ga4',
				__( 'DataLayer for WooCommerce Ecommerce GA4', 'datalayer-for-ecommerce-free' ),
				array( $this, 'data_layer_google_tag_manager_ecommerce_ga4_callback_function' ),
				'datalayer-for-ecommerce-free',
				'tracking_section_pro',
				array( 'class' => '' )
			);
			add_settings_field(
				'data_layer_google_tag_manager_show_user_info',
				__( 'Show user info', 'datalayer-for-ecommerce-free' ),
				array( $this, 'data_layer_google_tag_manager_show_user_info_callback_function' ),
				'datalayer-for-ecommerce-free',
				'tracking_section_pro',
				array( 'class' => '' )
			);

			register_setting(
				'datalayer-for-ecommerce-free',
				'tracking_option_pro',
				array( $this, 'sanitize' )
			);

		}

		/**
		 * Sanitize each setting field as needed
		 *
		 * @param array $input Contains all settings fields as array keys.
		 */
		public function sanitize( $input ) {
			$new_input = array();
			if ( isset( $input['data_layer_google_tag_manager_enhanced_ecommerce'] ) ) {
				$new_input['data_layer_google_tag_manager_enhanced_ecommerce'] = sanitize_text_field( $input['data_layer_google_tag_manager_enhanced_ecommerce'] );
			}
			if ( isset( $input['data_layer_google_tag_manager_ecommerce_ga4'] ) ) {
				$new_input['data_layer_google_tag_manager_ecommerce_ga4'] = sanitize_text_field( $input['data_layer_google_tag_manager_ecommerce_ga4'] );
			}
			if ( isset( $input['google_tag_manager'] ) ) {
				$new_input['google_tag_manager'] = sanitize_text_field( $input['google_tag_manager'] );
			}
			if ( isset( $input['data_layer_google_tag_manager_show_user_info'] ) ) {
				$new_input['data_layer_google_tag_manager_show_user_info'] = sanitize_text_field( $input['data_layer_google_tag_manager_show_user_info'] );
			}
			return $new_input;
		}
		/**
		 * Print the Section text
		 */
		public function tracking_section_callback_function() {
			print '';
		}
		/**
		 * Get the settings option array and print one of its values
		 */
		public function data_layer_google_tag_manager_enhanced_ecommerce_callback_function() {
			$options = get_option( 'tracking_option_pro' );

			$checked = 0;
			if ( isset( $options['data_layer_google_tag_manager_enhanced_ecommerce'] ) ) {
				if ( $options['data_layer_google_tag_manager_enhanced_ecommerce'] ) {
					$checked = 1;
				}
			}

			printf(
				'<input type="checkbox" id="data_layer_google_tag_manager_enhanced_ecommerce" name="tracking_option_pro[data_layer_google_tag_manager_enhanced_ecommerce]" value="1"' . checked( 1, $checked, false ) . '/>',
				isset( $this->options['data_layer_google_tag_manager_enhanced_ecommerce'] ) ? esc_attr( $this->options['data_layer_google_tag_manager_enhanced_ecommerce'] ) : ''
			);
			printf(
				'<p class="description">'
			);
			printf(
			/* translators: %1$s - %2$s: search term */
				esc_html__( 'Enable to use datalayer with %1$s and %2$s', 'datalayer-for-ecommerce-free' ),
				sprintf(
					'<a href="%s" target="_blank">%s</a>',
					'https://developers.google.com/tag-manager/enhanced-ecommerce',
					esc_html__( 'Enhanced Ecommerce (UA)', 'datalayer-for-ecommerce-free' )
				),
				sprintf(
					'<a href="%s" target="_blank">%s</a>',
					'https://support.google.com/analytics/answer/9744165',
					esc_html__( 'GA4 with complement', 'datalayer-for-ecommerce-free' )
				)
			);
			printf(
				'</p>'
			);
		}

		/**
		 * Get the settings option array and print one of its values
		 */
		public function data_layer_google_tag_manager_ecommerce_ga4_callback_function() {
			$options = get_option( 'tracking_option_pro' );

			$checked = 0;
			if ( isset( $options['data_layer_google_tag_manager_ecommerce_ga4'] ) ) {
				if ( $options['data_layer_google_tag_manager_ecommerce_ga4'] ) {
					$checked = 1;
				}
			}

			printf(
				'<input type="checkbox" id="data_layer_google_tag_manager_ecommerce_ga4" name="tracking_option_pro[data_layer_google_tag_manager_ecommerce_ga4]" value="1"' . checked( 1, $checked, false ) . '/>',
				isset( $this->options['data_layer_google_tag_manager_ecommerce_ga4'] ) ? esc_attr( $this->options['data_layer_google_tag_manager_ecommerce_ga4'] ) : ''
			);
			printf(
				'<p class="description">'
			);
			printf(
			/* translators: %1$s - %2$s: search term */
				esc_html__( 'Enable to use datalayer only with %1$s', 'datalayer-for-ecommerce-free' ),
				sprintf(
					'<a href="%s" target="_blank">%s</a>',
					'https://developers.google.com/tag-manager/ecommerce-ga4',
					esc_html__( 'Ecommerce (GA4)', 'datalayer-for-ecommerce-free' )
				)
			);
			printf(
				'</p>'
			);
		}

		/**
		 * Tracking_google_tag_manager_callback_function
		 */
		public function tracking_google_tag_manager_callback_function() {
			printf(
				'<input type="text" id="google_tag_manager" name="tracking_option_pro[google_tag_manager]"/ value="%s">',
				isset( $this->options['google_tag_manager'] ) ? esc_attr( $this->options['google_tag_manager'] ) : ''
			);
			printf(
				'<div class="status" style="display: inline-block;position: relative;top: -10px;"><span class="dashicons %s" style="font-size: 40px;color:green;"></span></span></div>',
				isset( $this->options['google_tag_manager'] ) && ! empty( $this->options['google_tag_manager'] ) ? 'dashicons-yes' : ''
			);
			printf(
				'<p class="description">'
			);
			printf(
			/* translators: %1$s: search term */
				esc_html__( 'Example: GTM-XXXXXX - %1$s', 'datalayer-for-ecommerce-free' ),
				sprintf(
					'<a href="%s">%s</a>',
					'https://support.google.com/tagmanager/answer/6103696',
					esc_html__( 'Read more', 'datalayer-for-ecommerce-free' )
				)
			);
			printf(
				'</p>'
			);
		}

		/**
		 * Data_layer_google_tag_manager_show_user_info_callback_function
		 */
		public function data_layer_google_tag_manager_show_user_info_callback_function() {
			$items = array('Yes','No');
			printf("<select id='data_layer_google_tag_manager_show_user_info' name='tracking_option_pro[data_layer_google_tag_manager_show_user_info]'>");
			foreach ( $items as $item ) {
				$selected = '';
				if ( isset($this->options['data_layer_google_tag_manager_show_user_info']) ) :
					$selected = ( $this->options['data_layer_google_tag_manager_show_user_info'] === $item ) ? 'selected="selected"' : '';
				endif;
				printf("<option value='%s' %s>%s</option>", esc_attr($item), esc_attr($selected), esc_attr($item));
			}
			printf('</select>');
			printf(
				'<p class="description">'
			);
			printf(
				esc_html__('Select if user information show or not when logged.', 'datalayer-for-ecommerce-free')
			);
			printf(
				'</p>'
			);
		}

	}
endif;
