<?php
namespace ShopCred;

if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Handles logic for the site Header / Footer.
 *
 * @package ShopCred WooBuilder
 * @since 2.1.0
 */

/**
 * Woo_Builder_Init
 */
class Woo_Builder_Init {
	/**
	 * Settings tab constant.
	 */
	const SETTINGS_TAB = 'woo_template_manager';

	/**
	 * Holds an array of posts.
	 *
	 * @var array $templates
	 * @since 2.1.0
	 */
	private static $templates = array();

	/**
	 * Instance of Elemenntor Frontend class.
	 *
	 * @var \Elementor\Frontend()
	 * @since 2.1.0
	 */
	private static $elementor_instance;

	public static $shopcred_pro_woo_elementor_template = array();

	public static $woo_ele_template = array();

	/**
	 * Holds the post ID for footer.
	 *
	 * @var int $archive_product
	 * @since 2.1.0
	 */
	public static $archive_product;

	public static $templates_path;

	public static $current_template_cart = null;
	public static $current_template_checkout = null;
	public static $current_template_thankyou = null;
	public static $current_template_myaccount = null;

	/**
	 * The woo ele template ID static return
	 *
	 * @var null
	 */
	public static $shopcred_pro_woo_template_id = array();

	/**
	 * Initialize hooks.
	 *
	 * @since 2.1.0
	 * @return void
	 */
	public static function init() {

		self::$templates_path = SPC_DIR . 'includes/templates/';

		self::init_hooks();
	}

	public static function init_hooks() {

		// In Editor Woocommerce frontend hooks before the Editor init.
		add_action( 'plugins_loaded', __CLASS__ . '::plugins_loaded' );

		// add_filter( 'wc_get_template', __CLASS__ . '::woo_spc_pro_page_template' , 50, 3 );

		$shopcred_pro_settings = get_option('shopcred-settings');	
	
		//if ( isset(get_option( 'shopcred-settings' )['enable_spc_shop_page_template']) && 'true' === get_option( 'shopcred-settings' )['enable_spc_shop_page_template'] ) {
			add_filter( 'template_include', __CLASS__ . '::woo_template_include', 999 );
		//}

	}

	// Template Conditions
    public static function template_routing( $type = 'return', $condition = '' ) {
        $page_id = '';
        $post_type = isset($_GET['post_type']) ? sanitize_key($_GET['post_type']) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended

		$template_option = get_option( 'shopcred-settings' );

		/*
         * Shop Builder
         */
		if ( !empty($template_option['enable_spc_shop_page_template']) && $template_option['enable_spc_shop_page_template'] == 'true' ) {
			
			if (is_shop() && !is_search()) {
				$template_id = $template_option['spc_shop_page_template'];
				if ('publish' == get_post_status($template_id) && get_post_type($template_id) == 'spc-pro-woo-builder') {
					$page_id = $template_id;
				}
			}

			if (is_archive() && !is_search()) {
				$template_id = $template_option['spc_shop_page_template'];
				if ('publish' == get_post_status($template_id) && get_post_type($template_id) == 'spc-pro-woo-builder') {
					$page_id = $template_id;
				}
			}
			
		}
        
        if ($type == 'return') {
            return $page_id;
        }
        if ($type == 'includes') {
            return $page_id ? SPC_DIR . 'includes/builder/page.php' : '';
        }
    }

	public static function woo_template_include( $template ) {
		$includes = self::template_routing('includes');
		return $includes ? $includes : $template;
	}

	/**
	 * Recursive block to get spc/woo-product attributes
	 *
	 * @param  data and result
	 * @since  1.0.0
	 * @return array
	 */
	public static function extract_block_name_attrs($data, &$result) {
		foreach ($data as $item) {
			if (isset($item['blockName']) && $item['blockName'] === 'spc/woo-product') {
				$result[] = [
					'blockName' => $item['blockName'],
					'attrs' => $item['attrs'],
				];
			}
			if (isset($item['innerBlocks']) && is_array($item['innerBlocks'])) {
				self::extract_block_name_attrs($item['innerBlocks'], $result);
			}
		}
	}
	

	/**
     *  WooCommerce Support
     * @return [void]
     */
    public static function plugins_loaded() {
        if ( ! current_theme_supports('woocommerce') ) {
           
			add_theme_support( 'woocommerce' );
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );
		
        }
    }

}

// Initialize the class.
Woo_Builder_Init::init();