<?php
namespace ShopCred;

/**
 * ShopCred Admin Settings Config class
 */

if ( ! class_exists( 'Admin_Settings_Config' ) ) {
	/**
	 * Define Admin_Settings_Config class
	 */
	class Admin_Settings_Config {
		
		/**
		 * A reference to an instance of this class.
		 */
		private static $instance = null;

		/**
		 * Holds settings key
		 *
		 * @var string
		 */
		public $key = 'shopcred-settings';

		/**
		 * Holds settings
		 *
		 * @var null
		 */
		public $settings = null;

		/**
		 * Init page
		 */
		public function init() {
		}

		/**
		 * Constructor for the class
		 */
		public function __construct() {
		
		}

		public function get_woo_saved_template() {
			$templates = '';
			global $post;
			$args = array(
				'post_type'   => 'spc-pro-woo-builder',
				'numberposts' => -1
			);
			$templates = get_posts( $args );
	
			if ( empty( $templates ) ) {
				$template_lists = [ '0' => __( 'Do not Saved Templates.', 'shop-cred-pro' ) ];
			} else {
				$template_lists = [ '0' => __( 'Select Template', 'shop-cred-pro' ) ];
				foreach ( $templates as $post ) {
					$template_lists[ $post->ID ] = $post->post_title;
				}
			}
	
			return $template_lists;
		}

		/**
		 * Returns localize plugin settings data
		 *
		 * @return array
		 */
		public function get_localize_data() {

			$shopcred_product_available_blocks      = [];
			$default_shopcred_product_available_blocks = [];

			//  ksort( Block_Manager::$default_widgets );
			foreach( Block_Manager::$default_widgets as $key => $widget ) :
				if ( isset( $key ) ) : 
					$block_value = $widget['value'];
					$shopcred_product_available_blocks[] = array(
						'label' => $widget['title'],
						'value' => $block_value,
					);
				endif;
				$default_shopcred_product_available_blocks[ $block_value ] = 'true';
            endforeach;

			// WooBuilderSettingPage
			$shop_page_template_list = [];
			$template_list_value = [];
			$template_list_value = $this->get_woo_saved_template();

			foreach( $template_list_value as $key => $tmpl ) :
			
				$shop_page_template_list[] = [
					'label' => esc_html__( $tmpl, 'shop-cred-pro' ),
					'value' => $key,
				];
			
			endforeach;

			$rest_api_url = apply_filters( 'shopcred/rest/frontend/url', get_rest_url() );

			return array(
				'messages'       => array(
					'saveSuccess' => esc_html__( 'Saved', 'shopcred' ),
					'saveError'   => esc_html__( 'Error', 'shopcred' ),
				),
				'settingsApiUrl' => $rest_api_url . 'shopcred-api/v1/plugin-settings',
				'settingsData'   => array(
					'shopcred_product_available_blocks'   => array(
						'value'   => $this->get( 'shopcred_product_available_blocks', $default_shopcred_product_available_blocks ),
						'options' => $shopcred_product_available_blocks,
					),
					'enable_spc_shop_page_template'        => array(
						'value' => $this->get( 'enable_spc_shop_page_template' ),
					),
					'spc_shop_page_template'               => array(
						'value'   => $this->get( 'spc_shop_page_template', '' ),
						'options' => $shop_page_template_list,
					),
				
				),
			);
		}

		/**
		 * Returns plugin admin settings
		 *
		 * @param $setting
		 * @param boolean $default
		 *
		 * @return bool|mixed
		 */
		public function get( $setting = '', $default = false ) {

			if ( null === $this->settings ) {
				$this->settings = get_option( $this->key, array() );
			}

			return isset( $this->settings[ $setting ] ) ? $this->settings[ $setting ] : $default;
		}

		/**
		 * Returns the instance.
		 */
		public static function get_instance() {

			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}
	}
}

/**
 * Returns instance of Admin_Settings_Config
 *
 * @return object
 */
function shopCred_admin_settings_config() {
	return Admin_Settings_Config::get_instance();
}
