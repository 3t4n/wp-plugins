<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://forhad.net/
 * @since      1.0.0
 *
 * @package    WPAS_Editorial_Rating
 * @subpackage WPAS_Editorial_Rating/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    WPAS_Editorial_Rating
 * @subpackage WPAS_Editorial_Rating/public
 * @author     Forhad Hossain <need@forhad.net>
 */
class WPAS_Editorial_Rating_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of the plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WPAS_Editorial_Rating_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WPAS_Editorial_Rating_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_register_style( $this->plugin_name . '-icomoon', plugin_dir_url( __FILE__ ) . 'icomoon/style.css', array(), $this->version, 'all' );
		wp_register_style( $this->plugin_name . '-widget', plugin_dir_url( __FILE__ ) . 'css/average-score-public-widget.css', array(), $this->version, 'all' );
		wp_register_style( $this->plugin_name . '-comment', plugin_dir_url( __FILE__ ) . 'css/average-score-public-comment.css', array(), $this->version, 'all' );
		wp_register_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/average-score-public.css', array(), $this->version, 'all' );
		wp_register_style( $this->plugin_name . '-theme-2', plugin_dir_url( __FILE__ ) . 'css/average-score-theme-2.css', array(), $this->version, 'all' );
		wp_register_style( $this->plugin_name . '-theme-3', plugin_dir_url( __FILE__ ) . 'css/average-score-theme-3.css', array(), $this->version, 'all' );
		wp_register_style( $this->plugin_name . '-theme-4', plugin_dir_url( __FILE__ ) . 'css/average-score-theme-4.css', array(), $this->version, 'all' );
		wp_register_style( $this->plugin_name . '-theme-5', plugin_dir_url( __FILE__ ) . 'css/average-score-theme-5.css', array(), $this->version, 'all' );
		wp_register_style( $this->plugin_name . '-theme-6', plugin_dir_url( __FILE__ ) . 'css/average-score-theme-6.css', array(), $this->version, 'all' );
		wp_register_style( $this->plugin_name . '-theme-7', plugin_dir_url( __FILE__ ) . 'css/average-score-theme-7.css', array(), $this->version, 'all' );
		wp_register_style( $this->plugin_name . '-theme-8', plugin_dir_url( __FILE__ ) . 'css/average-score-theme-8.css', array(), $this->version, 'all' );
		wp_register_style( $this->plugin_name . '-theme-9', plugin_dir_url( __FILE__ ) . 'css/average-score-theme-9.css', array(), $this->version, 'all' );

		// Load Google Font.
		$wpas_global_options  = get_option( '_wpas_global_options' );
		$wpas_heading_ff_name = isset( $wpas_global_options['wpas-heading-ff']['font-family'] ) ? $wpas_global_options['wpas-heading-ff']['font-family'] : '';
		if ( ! isset( $wpas_heading_ff_name ) ) {

			$wpas_heading_ff_name_plus = str_replace( ' ', '+', $wpas_heading_ff_name );
			$wpas_heading_ff_url       = 'https://fonts.googleapis.com/css2?family=' . $wpas_heading_ff_name_plus . '&display=swap';
			wp_enqueue_style( $this->plugin_name . 'load-header-family', $wpas_heading_ff_url, $this->version );
		}
		$wpas_body_ff_name = isset( $wpas_global_options['wpas-body-ff']['font-family'] ) ? $wpas_global_options['wpas-body-ff']['font-family'] : '';
		if ( ! isset( $wpas_body_ff_name ) ) {

			$wpas_body_ff_name_plus = str_replace( ' ', '+', $wpas_body_ff_name );
			$wpas_body_ff_url       = 'https://fonts.googleapis.com/css2?family=' . $wpas_body_ff_name_plus . '&display=swap';
			wp_enqueue_style( $this->plugin_name . 'load-header-family', $wpas_body_ff_url, $this->version );
		}

		/**
		 * Enqueuing scripts and styles on demand for WPAS blocks.
		 */
		$wpas_blocks = array(
			'wpas-blocks/cross-rating'    => 'wpas-block-cross-rating',
			'wpas-blocks/review-summary'  => 'wpas-block-review-summary',
			'wpas-blocks/review-info-box' => 'wpas-block-info-box',
			'wpas-blocks/pros-cons'       => 'wpas-block-pros-cons',
			'wpas-blocks/freemium-table'  => array(
				'style'  => 'wpas-block-freemium-table',
				'script' => 'wpas-block-script',
			),
			'wpas-blocks/pricing-table'   => 'wpas-block-pricing-table',
		);

		$wpas_get_the_page_id = get_the_ID();

		foreach ($wpas_blocks as $block => $handle) {
			if (has_block($block, $wpas_get_the_page_id)) {
				if (is_array($handle)) {
					// If block has a script, enqueue it.
					wp_enqueue_script($handle['script'], WPASER_DIR_URL_FILE . 'public/js/average-score-block.js', array('jquery'), WPAS_Editorial_Rating_VERSION);
					// Enqueue the style using the 'style' key from the array.
					wp_enqueue_style($handle['style'], WPASER_DIR_URL_FILE . 'public/css/' . $handle['style'] . '.css', array(), WPAS_Editorial_Rating_VERSION);
				} else {
					// Enqueue the style directly if $handle is not an array.
					wp_enqueue_style($handle, WPASER_DIR_URL_FILE . 'public/css/' . $handle . '.css', array(), WPAS_Editorial_Rating_VERSION);
				}
			}
		}
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WPAS_Editorial_Rating_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WPAS_Editorial_Rating_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_register_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/average-score-public.js', array( 'jquery' ), $this->version, false );
		wp_register_script( $this->plugin_name . 'wpas-useful-script', plugin_dir_url( __FILE__ ) . 'js/average-score-useful.js', array( 'jquery' ), $this->version, false );
		wp_register_script( $this->plugin_name . 'wpas-star-comment', plugin_dir_url( __FILE__ ) . 'js/average-score-comment.js', array( 'jquery' ), $this->version, false );
		wp_register_script( $this->plugin_name . 'wpas-star-rating', plugin_dir_url( __FILE__ ) . 'js/average-score-stars.js', array( 'jquery' ), $this->version, false );
		wp_localize_script( $this->plugin_name . 'wpas-star-rating', 'ratingStar', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	}

	/**
	 * Block Registration.
	 */
	public function wpas_render_block_core() {

		$asset_file = include( WPASER_DIR_PATH_FILE . 'build/index.asset.php');

		// Editor script.
		wp_register_script( 'wpas-esnext', WPASER_DIR_URL_FILE . 'build/index.js', $asset_file['dependencies'], $asset_file['version'] );
		wp_register_style( 'wpas-editor-style', WPASER_DIR_URL_FILE . 'admin/css/editor-style.css', array( 'wp-edit-blocks' ), WPAS_Editorial_Rating_VERSION );

		$blocks = array(
			'wpas-blocks/cross-rating' => array(
				'title'        => 'Cross Rating Template',
				'editor_style' => 'wpas-editor-style',
				'attributes'   => array(
					'id'          => array(
						'type' => 'string',
					),
					'crBrandColor' => array(
                        'type'    => 'string',
                        'default' => '#f73859',
                    ),
					'crbgColor' => array(
                        'type'    => 'string',
                        'default' => '#421b37',
                    ),
					'crCheckIconColor' => array(
                        'type'    => 'string',
                        'default' => '#F73859',
                    ),
					'crCheckIconSize' => array(
                        'type'    => 'string',
                        'default' => '14px',
                    ),
					'crCrossIconColor' => array(
                        'type'    => 'string',
                        'default' => '#431B38',
                    ),
					'crCrossIconSize' => array(
                        'type'    => 'string',
                        'default' => '14px',
                    ),
					'crStarsColor' => array(
                        'type'    => 'string',
                        'default' => '#f0f5fa',
                    ),
					'crBreakPointLaptop' => array(
                        'type'    => 'string',
                        'default' => '920px',
                    ),
					'crBreakPointTablet' => array(
                        'type'    => 'string',
                        'default' => '767px',
                    ),
					'crBreakPointMobile' => array(
                        'type'    => 'string',
                        'default' => '599px',
                    ),
					'crSidebarExist' => array(
                        'type'    => 'boolean',
						'default' => false,
                    ),
				),
			),
			'wpas-blocks/review-summary' => array(
				'title'        => 'Review Summary',
				'editor_style' => 'wpas-editor-style',
				'attributes'   => array(
					'id'          => array(
						'type' => 'string',
					),
					'rsBrandColor' => array(
                        'type'    => 'string',
                        'default' => '#f73859',
                    ),
					'rsRowGap' => array(
                        'type'    => 'string',
                        'default' => '30px',
                    ),
					'rsSidebarExist' => array(
                        'type'    => 'boolean',
						'default' => false,
                    ),
				),
			),
			'wpas-blocks/review-info-box' => array(
				'title'        => 'Review Info Box',
				'editor_style' => 'wpas-editor-style',
				'attributes'   => array(
					'id'          => array(
						'type' => 'string',
					),
					'infoBrandColor' => array(
						'type'    => 'string',
						'default' => '#f73859',
					),
					'infoShadowColor' => array(
						'type'    => 'string',
						'default' => '#cbc6c6',
					),
					'infoBreakPoint' => array(
						'type'    => 'string',
						'default' => '781px',
					),
				),
			),
			'wpas-blocks/pros-cons' => array(
				'title'        => 'Pros Cons',
				'editor_style' => 'wpas-editor-style',
				'attributes'   => array(
					'id'          => array(
						'type' => 'string',
					),
					'maxWidth' => array(
						'type'    => 'string',
						'default' => '900px',
					),
					'pcBrandColor' => array(
						'type'    => 'string',
						'default' => '#f73859',
					),
					'checkIconColor' => array(
						'type'    => 'string',
						'default' => '#008000',
					),
					'crossIconColor' => array(
						'type'    => 'string',
						'default' => '#ff0000',
					),
					'itemGap' => array(
						'type'    => 'string',
						'default' => '2px',
					),
					'itemDivider' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
					'dividerColor' => array(
						'type'    => 'string',
						'default' => '#eaeaea',
					),
					'respBreakPoint' => array(
						'type'    => 'string',
						'default' => '781px',
					),
				),
			),
			'wpas-blocks/freemium-table' => array(
				'title'        => 'Freemium Table',
				'editor_style' => 'wpas-editor-style',
				'attributes'   => array(
					'id'          => array(
						'type' => 'string',
					),
					'ftMaxWidth' => array(
						'type'    => 'string',
						'default' => '900px',
					),
					'ftBrandColor' => array(
						'type'    => 'string',
						'default' => '#f73859',
					),
					'ftBreakPoint' => array(
						'type'    => 'string',
						'default' => '781px',
					),
				),
			),
			'wpas-blocks/pricing-table' => array(
				'title'        => 'Pricing Table',
				'editor_style' => 'wpas-editor-style',
				'attributes'   => array(
					'id'          => array(
						'type' => 'string',
					),
					'ptBrandColor' => array(
						'type'    => 'string',
						'default' => '#f73859',
					),
				),
			),
			'wpas-blocks/star-rating' => array(
				'title'        => 'Star Rating',
				'editor_style' => 'wpas-editor-style',
				'attributes'   => array(
					'id'          => array(
						'type' => 'string',
					),
					'srBrandColor' => array(
						'type'    => 'string',
						'default' => '#f73859',
					),
					'srHighlightRange' => array(
						'type'    => 'number',
						'default' => 70,
					),
					'showSRresult' => array(
						'type'    => 'boolean',
                        'default' => false,
					),
					'srResultTxtSize' => array(
						'type'    => 'number',
						'default' => 16,
					),
					'srStarsNtxtSpacing' => array(
						'type'    => 'number',
						'default' => 10,
					),
					'resultTxtAlign' => array(
                        'type'    => 'string',
                        'default' => 'left',
                    ),
					'srPrefix' => array(
                        'type'    => 'string',
                        'default' => 'Rated',
                    ),
					'srSuffix' => array(
                        'type'    => 'string',
                        'default' => 'out of 5',
                    ),
					'srStarsSize' => array(
						'type'    => 'number',
						'default' => 20,
					),
					'starsAlign' => array(
                        'type'    => 'string',
                        'default' => 'left',
                    ),
					'srStarsColor' => array(
						'type'    => 'string',
						'default' => '#dfdfdf',
					),
					'srStarsHLcolor' => array(
						'type'    => 'string',
						'default' => '#FFC107',
					),
					'srResultTxtcolor' => array(
						'type'    => 'string',
						'default' => '#464646',
					),
				),
			),
			'wpas-blocks/notice-box' => array(
				'title'        => 'Notice Box',
				'editor_style' => 'wpas-editor-style',
				'attributes'   => array(
					'id'          => array(
						'type' => 'string',
					),
				),
			),
			'wpas-blocks/banner-ad' => array(
				'title'        => 'Banner Ad',
				'editor_style' => 'wpas-editor-style',
				'attributes'   => array(
					'id'          => array(
						'type' => 'string',
					),
				),
			),
			'wpas-blocks/testimonials' => array(
				'title'        => 'Testimonials',
				'editor_style' => 'wpas-editor-style',
				'attributes'   => array(
					'id'          => array(
						'type' => 'string',
					),
				),
			),
			'wpas-blocks/vip-quote' => array(
				'title'        => 'VIP Quote',
				'editor_style' => 'wpas-editor-style',
				'attributes'   => array(
					'id'          => array(
						'type' => 'string',
					),
					'vipImage'       => array(
						'type'    => 'string',
						'default' => 'https://via.placeholder.com/180',
					),
					'vipImageObj'    => array(
						'type' => 'object',
					),
				),
			),
		);

		foreach ( $blocks as $block_name => $block_data ) {
            register_block_type(
                $block_name,
                array(
                    'api_version'   => 3,
                    'editor_script' => 'wpas-esnext',
                    'attributes'    => $block_data['attributes'],
                    'editor_style'  => $block_data['editor_style'],
                )
            );
        }
	}

	/**
	 * Unregister blocks with switcher.
	 */
	public function wpas_global_unset_blocks( $allowed_blocks ) {

		// Get all the registered blocks.
		$blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();
	
		/**
		 * Plugin Settings Global.
		 */
		$wpas_block_opt_root    = get_option( '_wpas_global_options' );
		$allowed_cross_rating   = isset( $wpas_block_opt_root['wpas_block_cross_rating'] ) ? $wpas_block_opt_root['wpas_block_cross_rating'] : '';
		$allowed_info_box       = isset( $wpas_block_opt_root['wpas_block_info_box'] ) ? $wpas_block_opt_root['wpas_block_info_box'] : '';
		$allowed_pros_cons      = isset( $wpas_block_opt_root['wpas_block_pros_cons'] ) ? $wpas_block_opt_root['wpas_block_pros_cons'] : '';
		$allowed_freemium_table = isset( $wpas_block_opt_root['wpas_block_freemium_table'] ) ? $wpas_block_opt_root['wpas_block_freemium_table'] : '';
		$allowed_pricing_table  = isset( $wpas_block_opt_root['wpas_block_pricing_table'] ) ? $wpas_block_opt_root['wpas_block_pricing_table'] : '';
		$allowed_star_rating    = isset( $wpas_block_opt_root['wpas_block_star_rating'] ) ? $wpas_block_opt_root['wpas_block_star_rating'] : '';
	
		// Set/Unset blocks through global settings.
		if ( ! $allowed_cross_rating ) {
			unset( $blocks['wpas-blocks/cross-rating'] );
		}
		if ( ! $allowed_info_box ) {
			unset( $blocks['wpas-blocks/review-info-box'] );
		}
		if ( ! $allowed_pros_cons ) {
			unset( $blocks['wpas-blocks/pros-cons'] );
		}
		if ( ! $allowed_freemium_table ) {
			unset( $blocks['wpas-blocks/freemium-table'] );
		}
		if ( ! $allowed_pricing_table ) {
			unset( $blocks['wpas-blocks/pricing-table'] );
		}
		if ( ! $allowed_star_rating ) {
			unset( $blocks['wpas-blocks/star-rating'] );
		}
	
		// Return the new list of allowed blocks.
		return array_keys( $blocks );
	
	}
}
