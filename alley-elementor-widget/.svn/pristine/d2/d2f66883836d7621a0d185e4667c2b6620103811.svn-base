<?php
namespace ElementorLayout;

/**
 * Class Alley_Elementor_Widget
 *
 * Main Plugin class
 * @since 1.0.0
 */
class Alley_Elementor_Widget{
	/**
	*Adding pro widgets stub for the plugins
	*/
	public static $aew_pro_widgets_stub = [
        "addons" => [
            'aew_testimonial' => [
                'title' => 'Testimonial',
                'description' => '',
                'enable' => false,
                'slug' => 'testimonial',
                'icon' => 'aew eicon-testimonial',
                
            ],
            'aew_team' => [
                'title' => 'Team',
                'description' => '',
                'enable' => false,
                'slug' => 'team',
                'icon' => 'aew fas fa-users',
            ],
            'aew_promotion' => [
                'title' => 'Promotion',
                'description' => '',
                'enable' => false,
                'class' => 'aew-promotion',
                'slug' => 'promotion',
                'icon' => 'aew fas fa-bullhorn',
            ],
            
        ],
    ];

	/**
	 * widget_style
	 *
	 * Load main style files.
	 *
	 * @since 1.0.0
	 * @access public
	 */

	public function widget_styles() {
		wp_enqueue_script( 'alley-elementor-widget-js', AEW_PLUGIN_URL . '/frontend/assets/js/alley-elementor-widget.js', array('jquery'), '', true);
		wp_enqueue_script( 'owl-carousel-js', plugins_url( 'frontend/assets/js/owl.carousel.min.js', __FILE__ ) );
		wp_enqueue_style( 'alley-elementor-widget-style', plugins_url( 'frontend/assets/css/alley-elementor-widget.css', __FILE__ ) );
		wp_enqueue_style( 'owl-carousel-css', plugins_url( 'frontend/assets/css/owl.carousel.min.css', __FILE__ ) );
	
	}

	/**
	 * widget_Custom Scripts for pro stubs 
	 *
	 * Load custom scripts files.
	 *
	 * @since 1.0.3
	 * @access public
	 */

	public function admin_widget_script() {
		wp_enqueue_script( 'aew-custom-scripts', plugins_url( 'admin/assets/js/aew-custom-scripts.js', __FILE__ ) );

	}

	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.2.0
	 * @access private
	 */
	private function include_file() {
		require( __DIR__ . '/admin/traits/content-helper.php' );
		require( __DIR__ . '/admin/traits/render-helper.php' );
		require_once( __DIR__ . '/admin/widgets/create-widget-testimonial-layout.php' );
		require_once( __DIR__ . '/admin/widgets/create-widget-promotion-layout.php' );
		require_once( __DIR__ . '/admin/widgets/create-widget-service-layout.php' );
		require_once( __DIR__ . '/admin/widgets/create-widget-team-layout.php' );
		require_once( __DIR__ . '/admin/widgets/create-widget-pricingtable-layout.php' );
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function register_widgets() {

		// Register Widgets
		if($this->aew_pro_available()){
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new PromotionWidgets\Elementor_Promotion_Post_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new TestimonialWidgets\Elementor_Testimonial_Post_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new TeamWidgets\Elementor_Team_Post_Widget() );
		}
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new PricingtableWidgets\Elementor_Pricing_Table_Widget() );
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ServiceWidgets\Elementor_Service_Post_Widget() );
	
	
	}

	/**
    * Register New Widgets
    *
    * Include widgets files and register them in Elementor.
	*
	* @since 1.0.0
    *
    * @access public
    */     
    public function aew_widgets_registered(){

        $this->include_file();
        $this->register_widgets();
	}
	
	public function register_elementor_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'aew-items',
			[
				'title' => __( 'Alley Elementor Widget Layout', 'alley-elementor-widget' ),
				'icon' => 'fa fa-plug',
			]
		);

	}
	/***
	*register pro stub widgets for the free plugins
	*/
	public function get_stub_widgets( $settings ) {   
        if ($this->aew_pro_available() ) {
            return $settings;
        }
        $promotion_widgets = [];
        if ( isset( $settings['promotionWidgets'] ) ) {
            $promotion_widgets = $settings['promotionWidgets'];
        }

        $aew_stub_widgets = Alley_Elementor_Widget::$aew_pro_widgets_stub['addons'];

        $aewWidgets = [];
        foreach( $aew_stub_widgets as $stub ) {
            $aewWidgets[] = [
                'name' => $stub['slug'],
                'icon' => $stub['icon'],
                'title' => $stub['title'],
                'categories' => '[ "aew-items" ]'
            ];
        }

        $mergedArray = array_merge( $promotion_widgets, $aewWidgets );

        $settings['promotionWidgets'] = $mergedArray;

        return $settings;
    }
	public function aew_pro_available(){
		$pro_status = post_type_exists( 'abt_testimonials' );
		if($pro_status){
			return true;
		} else{
			return false;
		}
	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {

		// Register widget style
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );
		add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'admin_widget_script' ] );
		add_action( 'elementor/preview/enqueue_styles', [ $this, 'admin_widget_script' ] );
		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'aew_widgets_registered' ] );

		add_action( 'elementor/elements/categories_registered', [ $this, 'register_elementor_widget_categories' ] );
		add_filter( 'elementor/editor/localize_settings', [ $this, 'get_stub_widgets' ] );
	}
}

// Instantiate Plugin Class
new Alley_Elementor_Widget();
