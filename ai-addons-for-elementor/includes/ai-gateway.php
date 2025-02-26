<?php 

namespace Elementor;

final class AIEA_Extension {

	private static $_instance = null;
	 
	private static $shortcodes_list = array();	

	public function __construct() {
		
		$this->init();

	}

	public function init() {		
		
		$this->base_plugin_settings();
		
		$this->plugin_base();
		
		$this->addon_settings();
		
		$this->register_category();
		
		$this->helper();
		
		$this->hooks();		

	}
	
	public function helper(){
		
		require_once ( AIEA_DIR . 'includes/traits/helper.php' );
		
	}
	
	function addon_settings() {
		
		if ( is_admin() ) {
			require_once ( AIEA_DIR . 'core/admin/ai-settings.php');
		}
		
	}
	
	function register_category() {		
		
		// Free category
		add_action( 'elementor/elements/categories_registered', [ $this, 'create_aiea_category' ], 5 );
		
		// Pro Category
		add_action( 'elementor/elements/categories_registered', [ $this, 'create_aiea_pro_category' ], 5.5 );
		
	}
	
	function base_plugin_settings() {
		
		// plugin action links
		add_filter( 'plugin_action_links_' . plugin_basename( AIEA_BASE ), [ $this, 'plugin_action_links' ] );
		
		// plugin meta links
		//add_filter( 'plugin_row_meta', [ $this, 'plugin_meta_links' ], 10, 2 );
		
		// pro elements promotion
		add_filter( 'elementor/editor/localize_settings', [ $this, 'promote_aiea_pro_elements' ] );
		
	}
	
	function plugin_base() {
		
		// base elements
		require_once ( AIEA_DIR . 'includes/base/addon-base.php');
		
	}
	
	function hooks() {
		
		//Include Custom Icons
		add_filter( 'elementor/icons_manager/native', array( $this, 'custom_icons' ), 1 );
		
		// Register controls
		add_action( 'elementor/controls/register', [ $this, 'register_controls' ] );

		// Add Plugin actions
		add_action( 'elementor/widgets/register', array( $this, 'register_widgets' ) );
		
		// Register Widget Scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );
		
		// Register Editor Styles
		add_action( 'elementor/editor/before_enqueue_scripts', [$this, 'editor_enqueue_scripts'] );
		
		// Editor Preview Styles
		add_action( 'elementor/preview/enqueue_styles', [$this, 'preview_enqueue_scripts'] );
		
	}
	
	function plugin_action_links( $actions ) {
		
		$mylinks = array(
			'<a href="' . admin_url( 'admin.php?page=ai-addons&ai-addons-settings=1' ) . '">Settings</a>',
			'<a href="' . esc_url( 'https://aiaddons.ai/pricing' ) . '" target="_blank"><span class="ai-pro-style">Get Premium</span></a>',
		);
		$actions = array_merge( $actions, $mylinks );
		
		return $actions;
		
	}	
	
	function plugin_meta_links( $links, $file ) {
		
		if ( strpos( $file, basename( AIEA_BASE ) ) ) {
			$links[] = '<a href="' . esc_url( 'https://docs.aiaddons.ai/' ) . '" target="_blank" title="Docs&FAQ">Docs&FAQ</a>';
			$links[] = '<a href="' . esc_url( 'https://tutorial.aiaddons.ai/' ) . '" target="_blank" title="Video Tutorials">Video Tutorials</a>';
		}
		return $links;
		
	}

	public function create_aiea_category( $elements_manager ) {
		
		// Register ai addon widget category
		$elements_manager->add_category( 'ai-elements',
			array(
				'title' => esc_html__( 'AI Addons', 'ai-addons' )
			), 1 
		);
		
	}
	
	public function create_aiea_pro_category( $elements_manager ) {
		
		// Register ai pro addons widget category
		$elements_manager->add_category( 'ai-pro-elements',
			array(
				'title' => esc_html__( 'AI Addons Pro', 'ai-addons' )
			), 1 
		);
		
	}
	
	public function promote_aiea_pro_elements( $config ) {

		$promotion_widgets = [];

		if ( isset( $config['promotionWidgets'] ) ) {
			$promotion_widgets = $config['promotionWidgets'];
		}

		$combine_array = array_merge( $promotion_widgets, [			
			[
				'name'       => 'ai-tooltip',
				'title'      => __( 'Tooltip', 'ai-addons' ),
				'icon'       => 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('tooltip'),
				'categories' => '["ai-pro-elements"]',
			],
			[
				'name'       => 'ai-image-box',
				'title'      => __( 'Image Box', 'ai-addons' ),
				'icon'       => 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('image-box'),
				'categories' => '["ai-pro-elements"]',
			],
			[
				'name'       => 'ai-flip-box',
				'title'      => __( 'Flip Box', 'ai-addons' ),
				'icon'       => 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('flip-box'),
				'categories' => '["ai-pro-elements"]',
			],
			[
				'name'       => 'ai-day-counter',
				'title'      => __( 'Day Counter', 'ai-addons' ),
				'icon'       => 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('day-counter'),
				'categories' => '["ai-pro-elements"]',
			],
			[
				'name'       => 'ai-pricing-table',
				'title'      => __( 'Pricing Table', 'ai-addons' ),
				'icon'       => 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('pricing-table'),
				'categories' => '["ai-pro-elements"]',
			],
			[
				'name'       => 'ai-timeline',
				'title'      => __( 'Timeline', 'ai-addons' ),
				'icon'       => 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('timeline'),
				'categories' => '["ai-pro-elements"]',
			],
			[
				'name'       => 'ai-timeline-slide',
				'title'      => __( 'Timeline Slide', 'ai-addons' ),
				'icon'       => 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('timeline-slide'),
				'categories' => '["ai-pro-elements"]',
			],
			[
				'name'       => 'ai-offcanvas',
				'title'      => __( 'Offcanvas', 'ai-addons' ),
				'icon'       => 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('offcanvas'),
				'categories' => '["ai-pro-elements"]',
			],
			[
				'name'       => 'ai-image-grid',
				'title'      => __( 'Image Grid', 'ai-addons' ),
				'icon'       => 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('image-grid'),
				'categories' => '["ai-pro-elements"]',
			],
			[
				'name'       => 'ai-mailchimp',
				'title'      => __( 'Mailchimp', 'ai-addons' ),
				'icon'       => 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('mailchimp'),
				'categories' => '["ai-pro-elements"]',
			],
			[
				'name'       => 'ai-modal-popup',
				'title'      => __( 'Modal Popup', 'ai-addons' ),
				'icon'       => 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('modal-popup'),
				'categories' => '["ai-pro-elements"]',
			],
			[
				'name'       => 'image-before-after',
				'title'      => __( 'Before After Image', 'ai-addons' ),
				'icon'       => 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('image-before-after'),
				'categories' => '["ai-pro-elements"]',
			],
			[
				'name'       => 'ai-image-accordion',
				'title'      => __( 'Image Accordion', 'ai-addons' ),
				'icon'       => 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('image-accordion'),
				'categories' => '["ai-pro-elements"]',
			],
			[
				'name'       => 'ai-image-hotspot',
				'title'      => __( 'Image Hotspot', 'ai-addons' ),
				'icon'       => 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('image-hotspot'),
				'categories' => '["ai-pro-elements"]',
			],
			[
				'name'       => 'ai-image-hover',
				'title'      => __( 'Image Hover', 'ai-addons' ),
				'icon'       => 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('image-hover'),
				'categories' => '["ai-pro-elements"]',
			],
			[
				'name'       => 'ai-video-popup',
				'title'      => __( 'Video Popup', 'ai-addons' ),
				'icon'       => 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('video-popup'),
				'categories' => '["ai-pro-elements"]',
			],
			[
				'name'       => 'ai-portfolio',
				'title'      => __( 'Portfolio', 'ai-addons' ),
				'icon'       => 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('portfolio'),
				'categories' => '["ai-pro-elements"]',
			],
			[
				'name'       => 'ai-products-slider',
				'title'      => __( 'Products Slider', 'ai-addons' ),
				'icon'       => 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('product-slider'),
				'categories' => '["ai-pro-elements"]',
			],
			[
				'name'       => 'ai-products-category',
				'title'      => __( 'Products Category', 'ai-addons' ),
				'icon'       => 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('products-category'),
				'categories' => '["ai-pro-elements"]',
			],
			[
				'name'       => 'ai-products-category-slider',
				'title'      => __( 'Products Category Slider', 'ai-addons' ),
				'icon'       => 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('products-category-slider'),
				'categories' => '["ai-pro-elements"]',
			],
			[
				'name'       => 'ai-pretty-hover',
				'title'      => __( 'Pretty Hover', 'ai-addons' ),
				'icon'       => 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('pretty-hover'),
				'categories' => '["ai-pro-elements"]',
			],
			[
				'name'       => 'ai-posts-magazine',
				'title'      => __( 'Magazine Layout', 'ai-addons' ),
				'icon'       => 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('posts-magazine'),
				'categories' => '["ai-pro-elements"]',
			],
			[
				'name'       => 'ai-breadcrumbs',
				'title'      => __( 'Breadcrumb', 'ai-addons' ),
				'icon'       => 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('breadcrumbs'),
				'categories' => '["ai-pro-elements"]',
			],
			[
				'name'       => 'ai-line-chart',
				'title'      => __( 'Line Chart', 'ai-addons' ),
				'icon'       => 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('line-chart'),
				'categories' => '["ai-pro-elements"]',
			],
			[
				'name'       => 'ai-bar-chart',
				'title'      => __( 'Bar Chart', 'ai-addons' ),
				'icon'       => 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('bar-chart'),
				'categories' => '["ai-pro-elements"]',
			],
			[
				'name'       => 'ai-polar-area-chart',
				'title'      => __( 'Polar Area Chart', 'ai-addons' ),
				'icon'       => 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('polar-area-chart'),
				'categories' => '["ai-pro-elements"]',
			],
			[
				'name'       => 'ai-pie-chart',
				'title'      => __( 'Pie Chart', 'ai-addons' ),
				'icon'       => 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('pie-chart'),
				'categories' => '["ai-pro-elements"]',
			],
		] );

		$config['promotionWidgets'] = $combine_array;

		return $config;
	}
	
	public function editor_enqueue_scripts(){
		
		wp_enqueue_style( 'aiea-font', AIEA_URL .'core/admin/assets/css/dashboard-font.css', array(), '1.0', 'all');
		wp_enqueue_style( 'ai-editor', AIEA_URL .'assets/css/editor/editor-style.css', array(), '1.0', 'all');
		
		wp_enqueue_script( 'macy', AIEA_URL .'assets/js/editor/macy.min.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'ai-templates-library', AIEA_URL .'assets/js/editor/templates-library.js', array( 'jquery', 'macy' ), '1.0', true );
		
		wp_localize_script( 'ai-templates-library', 'inc_obj',
			array( 
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'post_id' => get_the_ID(),
				'logo' => AIEA_URL .'assets/images/logo.png',
				'logo_full' => AIEA_URL .'assets/images/logo.png',
				'library_nonce' => wp_create_nonce( 'ai-library(*&&%^#' )
			)
		);
		
	}
	
	public function preview_enqueue_scripts() {
		
		wp_enqueue_style( 'ai-editor-preview', AIEA_URL .'assets/css/editor/editor-preview.css', array(), '1.0', 'all');
		
	}
		
	public function widget_scripts() {
		
		// Styles
		$style_args = [
			[ 'key' => 'ai-animate', 'file' => 'animate.min.css', 'lib' => array(), 'version' => '1.0' ],
			[ 'key' => 'themify-icons', 'file' => 'themify-icons.css', 'lib' => array(), 'version' => '1.0' ],
			[ 'key' => 'bootstrap-icons', 'file' => 'bootstrap-icons.css', 'lib' => array(), 'version' => '1.0' ],
			[ 'key' => 'slick', 'file' => 'slick.min.css', 'lib' => array(), 'version' => '1.8.1' ],
			[ 'key' => 'image-hover', 'file' => 'image-hover.min.css', 'lib' => array(), 'version' => '1.0' ],
			[ 'key' => 'aiimgc', 'file' => 'aiimgc.css', 'lib' => array(), 'version' => '1.0' ],
			[ 'key' => 'pannellum', 'file' => 'pannellum.min.css', 'lib' => array(), 'version' => '2.3.2' ],
			[ 'key' => 'ai-table', 'file' => 'data-table.css', 'lib' => array(), 'version' => '1.0' ],			
		];
		
		// Register all lib style files
		foreach( $style_args as $s_r_args ) aiea_addon_base()->scripts_regsiter( 'style', 'register', $s_r_args );
		
		$s_e_args = [ 'key' => 'ai-style', 'file' => 'style.css', 'lib' => array(), 'version' => '1.0' ];
		
		// Plugin main style file
		aiea_addon_base()->scripts_regsiter( 'style', 'enqueue', $s_e_args );
		
		// Scripts
		$script_args = [
			[ 'key' => 'jquery-ease', 'file' => 'jquery.easing-1.3.min.js', 'lib' => array('jquery'), 'version' => '1.3' ],
			[ 'key' => 'isotope', 'file' => 'isotope.pkgd.min.js', 'lib' => array('jquery'), 'version' => '3.0.3' ],
			[ 'key' => 'infinite-scroll', 'file' => 'infinite-scroll.pkgd.min.js', 'lib' => array('jquery'), 'version' => '4.0.1' ],
			[ 'key' => 'typed', 'file' => 'typed.min.js', 'lib' => array('jquery'), 'version' => '2.0.9' ],
			[ 'key' => 'morphext', 'file' => 'morphext.min.js', 'lib' => array('jquery'), 'version' => '2.4.7' ],
			[ 'key' => 'slick', 'file' => 'slick.min.js', 'lib' => array('jquery'), 'version' => '1.8.1' ],
			[ 'key' => 'appear', 'file' => 'jquery.appear.min.js', 'lib' => array('jquery'), 'version' => '1.0' ],
			[ 'key' => 'circle-progress', 'file' => 'jquery.circle.progress.min.js', 'lib' => array('jquery'), 'version' => '1.2.2' ],
			[ 'key' => 'countdown', 'file' => 'jquery.countdown.min.js', 'lib' => array('jquery'), 'version' => '2.2.0' ],
			[ 'key' => 'chart', 'file' => 'chart.min.js', 'lib' => array('jquery'), 'version' => '4.2.1' ],
			[ 'key' => 'jquery-event-move', 'file' => 'jquery.event.move.js', 'lib' => array('jquery'), 'version' => '2.0.0' ],
			[ 'key' => 'jquery-aiimgc', 'file' => 'jquery.aiimgc.js', 'lib' => array('jquery'), 'version' => '1.0' ],
			[ 'key' => 'jquery-pannellum', 'file' => 'pannellum.min.js', 'lib' => array('jquery'), 'version' => '2.3.2' ],
			[ 'key' => 'ai-data-table', 'file' => 'ai-datatable.js', 'lib' => array('jquery'), 'version' => '1.0' ],
			[ 'key' => 'ai-data-table-editor', 'file' => 'ai-datatable-editor.js', 'lib' => array('jquery'), 'version' => '1.0' ],
			[ 'key' => 'ai-timeline', 'file' => 'timeline.min.js', 'lib' => array('jquery'), 'version' => '1.0' ],
			[ 'key' => 'ai-sharer', 'file' => 'aiea-social-sharer.js', 'lib' => array('jquery'), 'version' => '1.0' ],
			[ 'key' => 'ai-front-end', 'file' => 'ai-front-end.js', 'lib' => array('jquery'), 'version' => '1.0' ]
		];
		
		$script_e_args = [];
		
		$module_args = [
			[ 'key' => 'jarallax', 'file' => 'jarallax.min.js', 'lib' => array('jquery'), 'version' => '2.1.3' ],
			[ 'key' => 'ai-front-end', 'file' => 'ai-front-end.js', 'lib' => array('jquery'), 'version' => '1.0' ]
		];
		
		$is_preview = \Elementor\Plugin::$instance->preview->is_preview();
		if( $is_preview ) {
			$script_e_args = $module_args;
		} else {			
			$script_args = array_merge( $script_args, $module_args );			
		}		
		
		$gmap_api = aiea_addon_base()->aiea_options('google-map-api'); 
		if( $gmap_api ){ 
			$script_args[] = [ 'key' => 'ai-gmaps', 'file' => '//maps.google.com/maps/api/js?key='. esc_attr( $gmap_api ), 'lib' => array('jquery'), 'version' => null, 'external' => true ];
		}
		
		// Register all script files
		foreach( $script_args as $sc_r_args ) aiea_addon_base()->scripts_regsiter( 'script', 'register', $sc_r_args );
		
		// Enqueue all script files
		foreach( $script_e_args as $sc_e_args ) aiea_addon_base()->scripts_regsiter( 'script', 'enqueue', $sc_e_args );
	
	}	

	public function register_widgets( $widgets_manager ) {
		
		// required files
		require_once AIEA_DIR . '/includes/class.ai-post-elements.php';
		
		$available_shortcodes = aiea_addon_base()->aiea_shortcodes();
		$aiea_shortcodes = get_option('aiea_shortcodes');
		
		$shortcode_emty_stat = false;
		if( empty( $aiea_shortcodes ) ){
			$aiea_shortcodes = $available_shortcodes;
			$shortcode_emty_stat = true;
		}
						
		foreach( $available_shortcodes as $key => $widget ){
			
			if( $widget['pro'] != true ) {
			
				$shortcode_name = !$shortcode_emty_stat ? str_replace( "-", "_", $key ) : $key;
				
				if( !empty( $aiea_shortcodes ) ){
					if( isset( $aiea_shortcodes[$shortcode_name] ) ){
						$saved_val = true;
					}else{
						$saved_val = false;
					}
				}else{
					$saved_val = false;
				}
				
				if( $saved_val ){
										
					require_once( AIEA_DIR . 'includes/widgets/'. esc_attr( $key ) .'.php' );
					
					$widget_class = 'Elementor\\'. aiea_addon_base()->make_widget_class_name( $widget['title'] );
					if ( class_exists( $widget_class ) ) {
						$widgets_manager->register( new $widget_class() );
					}
					
				}
				
			}
			
		}
		
	}
	
	public function register_controls( $controls_manager ) {
		
		// Register ai addon custom controls
		aiea_addon_base()->register_controls( $controls_manager );
		
	}
	
	public function custom_icons( $icon_fonts ){
			
		return aiea_addon_base()->icon_fonts( $icon_fonts );
		
	}
		
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

}
AIEA_Extension::instance();