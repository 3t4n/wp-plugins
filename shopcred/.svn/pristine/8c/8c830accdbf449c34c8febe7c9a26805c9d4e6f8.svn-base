<?php
/**
 * Enqueue Styles and Scripts actions and filters.
 *
 * @package ShopCred
 */
namespace ShopCred;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class Enqueue_Assets {

	/**
	 * Instance.
	 *
	 * @access private
	 * @var object Instance
	 * @since 1.0.0
	 */
	private static $instance;

	/**
	 * 
	 * @since 1.0.0
	 */

	public static $fonts_url;

	/**
	 * Initiator.
	 *
	 * @since 1.0.0
	 * @return object initialized object of class.
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'enqueue_block_editor_assets', [ $this, 'block_editor_assets' ] );
		add_action( 'enqueue_block_assets', [ $this, 'enqueue_frontend_scripts' ] );
		// Hook: Block assets.
		add_action( 'wp_enqueue_scripts', [ __CLASS__, 'enqueue_google_fonts' ] );
		add_action( 'enqueue_block_editor_assets', [ __CLASS__, 'enqueue_google_fonts' ] );	
		add_filter( 'block_categories_all', [ $this, 'add_block_category' ] );
		add_filter( 'shopcred_do_content', [ $this, 'get_widget_styling' ] );
		add_action('template_redirect', [ $this, 'track_product_view' ], 20);

		add_action( 'wp_enqueue_scripts', [ __CLASS__, 'enqueue_frontend_woo_scripts' ] );

		// echo "<pre style='padding-left: 200px;'>";
		// print_r($this->deactivate_blocks());
		// echo "</pre>";
	}

	/**
	 * Recent Views Set Cookies
     * 
     * @since v.2.1.0
	 * @return NULL
	 */
    public function track_product_view() {
        if ( ! is_singular( 'product' ) ) {
            return;
        }
    
        global $post;
    
        if (empty($_COOKIE['__spc_recently_viewed'])) {
            $viewed_products = array();
        } else {
            $viewed_products = (array) explode('|', sanitize_text_field($_COOKIE['__spc_recently_viewed']));
        }

        if ( ! in_array($post->ID, $viewed_products) ) {
            $viewed_products[] = $post->ID;
        }
    
        if ( sizeof( $viewed_products ) > 30 ) {
            array_shift( $viewed_products );
        }
    
        wc_setcookie( '__spc_recently_viewed', implode( '|', $viewed_products ) );
    }

	/**
	 * Enqueue Gutenberg block assets for backend editor.
	 *
	 * @uses {wp-blocks} for block type registration & related functions.
	 * @uses {wp-element} for WP Element abstraction — structure of blocks.
	 * @uses {wp-i18n} to internationalize the block's text.
	 * @uses {wp-editor} for WP editor styles.
	 * @since 1.0.0
	 */
	public function block_editor_assets() {
		if( ! class_exists('woocommerce') ) {
	        return;
        }

		global $pagenow, $post;

		$shopcred_deps = array( 'react', 'react-dom', 'wp-api', 'wp-block-editor', 'wp-editor', 'wp-blocks', 'wp-components', 'wp-compose', 'wp-data', 'wp-date', 'wp-element', 'wp-hooks', 'wp-i18n', 'wp-plugins' );

		if ( 'widgets.php' === $pagenow ) {
			unset( $shopcred_deps[2] );
		}

		//block-editor style
		wp_enqueue_style( 'spc-block-editor-style', base_init()->plugin_url( 'assets/css/block-editor.css' ) );
		wp_enqueue_style( 'spc-block-style', base_init()->plugin_url( 'build/index.css' ), is_admin() ? array( 'wp-editor' ) : SPC_VER, null );
		wp_enqueue_style( 'spc-swiper-style', base_init()->plugin_url( 'assets/css/swiper-bundle.min.css' ) );
		wp_enqueue_script( 'spc-swiper-script', base_init()->plugin_url( 'assets/js/swiper-bundle.min.js' ), [ 'jquery' ], SPC_VER, true );
		wp_enqueue_script('spc-product-carousel-script', base_init()->plugin_url( 'assets/js/swiper-init.js' ), ['jquery', 'spc-swiper-script'], SPC_VER, true );
		wp_enqueue_script('spc-isotop-script', base_init()->plugin_url( 'assets/js/isotop.min.js' ), [], SPC_VER, true );
		wp_enqueue_script('spc-isotop-init', base_init()->plugin_url( 'assets/js/isotop.init.js' ), ['jquery', 'spc-swiper-script'], SPC_VER, true );
	
		wp_enqueue_script( 'spc-deactivate-blocks', base_init()->plugin_url( 'assets/js/deactivated-blocks.js' ), array( 'wp-blocks', 'wp-dom-ready' ), SPC_VER, true );
		// Register block editor script for backend.
		wp_enqueue_script( 'spc-block-script', base_init()->plugin_url( 'build/index.js' ), $shopcred_deps, SPC_VER, true );
		if ( function_exists( 'wp_set_script_translations' ) ) {
			wp_set_script_translations( 'shop-cred', 'shop-cred' );
		}
		
		$defaults = Block_Defaults_Attributes::get_Block_DefaultsAttributes();

		$blocks       = array();
	
		$saved_blocks = $this->deactivate_blocks();

		if ( is_array( $saved_blocks ) ) {
			foreach ( $saved_blocks as $data ) {

				array_push( $blocks, $data );
					
			}
		}
		
		wp_localize_script(
			'spc-deactivate-blocks',
			'spc_deactivate_blocks',
			array(
				'deactivated_blocks' => $blocks,
			)
		);

		// WP Localized globals. Use dynamic PHP stuff in JavaScript via `cgbGlobal` object.
		wp_localize_script(
			'spc-block-script',
			'spc_block_object',
			[
				'pluginDirPath'        				=> plugin_dir_path( __DIR__ ),
				'pluginDirUrl'         				=> plugin_dir_url( __DIR__ ),
				'category'             				=> 'shop-cred',
				'ajax_url'             				=> admin_url( 'admin-ajax.php' ),
				'image_sizes'          				=> Helper::get_image_sizes(),
				'post_types'           				=> Helper::get_post_types(),
				'all_taxonomy'         				=> Helper::get_related_taxonomy(),
				'taxonomy_list'        				=> Helper::get_taxonomy_list(),
				'filters_taxonomy_list'         	=> Helper::filter_taxonomy_list(),
				'filters_tag_list'         			=> Helper::filter_tags_list(),
				'config'         	   				=> '',
				'settings'             				=> '',
				'spc_ajax_nonce' 					=> wp_create_nonce( 'shopcred_blocks_ajax_nonce' ),
				'prebuilt_libraries' 				=> apply_filters( 'shopcred_blocks_custom_prebuilt_libraries', array() ),
				'showDesignLibrary' 				=> apply_filters( 'shopcred_blocks_design_library_enabled', true ),
				'spc_home_url'        				=> home_url(),
				'collapse_panels'                   => 'enabled',
				'shopcred_addons_status'         	=> Helper::get_shopcred_addons_status(),
			]
		);
	}

	/**
	 * Enqueue both Front+Back end Scripts/Style
	 * 
	 */
	public function enqueue_frontend_scripts() {
		global $post;

		$id = get_the_ID();
		
		if ( !is_admin() ) {

			wp_enqueue_style( 'spc-woo-product-style', base_init()->plugin_url( 'build/style-index.css' ), array(), time() );

			if ( has_block( 'spc/woo-product', $id ) || Helper::is_shopcred() ) {
			
				wp_enqueue_style( 'spc-swiper-style', base_init()->plugin_url( 'assets/css/swiper-bundle.min.css' ) );
				wp_enqueue_script( 'spc-swiper-script', base_init()->plugin_url( 'assets/js/swiper-bundle.min.js' ), [], null, true );
				wp_enqueue_script('spc-product-carousel-script', base_init()->plugin_url( 'assets/js/swiper-init.js' ), [], null, true );
				wp_enqueue_script('spc-isotop-script', base_init()->plugin_url( 'assets/js/isotop.min.js' ), [], null, true );
				wp_enqueue_script('spc-isotop-init', base_init()->plugin_url( 'assets/js/isotop.init.js' ), ['jquery', 'spc-swiper-script'], null, true );
			}

		}
					
	}

	/**
	 * Do Google Fonts.
	 *
	 * @since 1.0.0
	 */
	public static function enqueue_google_fonts() {
		self::$fonts_url = Block_Data::get_google_fonts_uri();

		if ( self::$fonts_url ) {
			wp_enqueue_style( 'shopcred-google-fonts', self::$fonts_url, array(), null, 'all' );
		}
	}

	/**
	 * Do ajax load more product or quickview.
	 *
	 * @since 1.0.0
	 */
	public static function enqueue_frontend_woo_scripts() {
	
		wp_enqueue_script('spc-product-quickview', base_init()->plugin_url( 'assets/js/woo-quick-vew.js' ), ['jquery'], null, true );
		wp_enqueue_script('spc-woo-product', base_init()->plugin_url( 'assets/js/product-loadmore.js' ), ['jquery'], null, true );
		wp_localize_script('spc-woo-product', 'spc_localize_ajax', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'security' => wp_create_nonce('shopcred_blocks_ajax_nonce')
        ));
	}

	/**
	 * Adding a new (custom) block category.
	 *
	 * @param   array $block_categories                         Array of categories for block types.
	 * @param   WP_Block_Editor_Context $block_editor_context   The current block editor context.
	 */
	function add_block_category( $block_categories ) {
		
		return array_merge(
			$block_categories,
			[
				[
					'slug'  => 'shop-cred',
					'title' => esc_html__( 'ShopCred', 'shopcred' ),
				],
			]
		);
	}

	/**
	 * Set our CSS print method.
	 *
	 * @param string $method Existing method.
	 */
	public function shopcred_set_css_print_method( $method ) {
		$method = shopcred_get_option( 'css_print_method' );

		if ( is_single() ) {
			$method = 'inline';
		}

		return $method;
	}

	/**
	 * Deactivate Blocks.
	 *
	 * Register plugin Blocks.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function deactivate_blocks() {

		$deactivate_blocks = [];
	
		$available_blocks = [
			'available-blocks'    => shopCred_admin_settings_config()->get( 'shopcred_product_available_blocks' ),
		];
	
		// Printing all the keys and values one by one
		$keys = array_keys($available_blocks);
		for($i = 0; $i < count($keys); $i++) {
			// Ensure the value is an array before iterating
			if (is_array($available_blocks[$keys[$i]])) {
				foreach($available_blocks[$keys[$i]] as $key => $value) {
					if ("false" == $value) {
						$deactivate_blocks[] = $key;
					}
				}
			}
		}
	
		return $deactivate_blocks;
	}
	

	/**
	 * Process all widget content for potential styling.
	 *
	 * @since 1.0.0
	 * @param string $content The existing content to process.
	 */
	public function get_widget_styling( $content ) {
		$widget_blocks = get_option( 'widget_block' );

		foreach ( (array) $widget_blocks as $block ) {
			if ( isset( $block['content'] ) ) {
				$content .= $block['content'];
			}
		}

		return $content;
	}

}

Enqueue_Assets::get_instance();