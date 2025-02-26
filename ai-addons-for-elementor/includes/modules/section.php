<?php 

namespace Elementor;

class AIEA_Section_Module {
	
	private static $_instance = null;
	
	public function __construct() {

		// Add Custom CSS
        if( !class_exists( '\ElementorPro\Plugin' ) ){
			add_action('elementor/element/after_section_end', [$this, 'add_controls_section'], 10, 3);
            add_action('elementor/element/parse_css', [$this, 'add_post_css'], 10, 2);
            add_action('elementor/css-file/post/parse', [ $this, 'add_page_settings_css']);			
        }
		
		if( !function_exists('aiea_addon_base') ) require_once ( AIEA_DIR . 'includes/base/addon-base.php');
		
		$saved_modules = get_option( 'aiea_modules' );
		$available_modules = aiea_addon_base()->aiea_modules();
		
		if( !empty( $saved_modules ) ) {
			
			$preference = 15;

			$section_modules = [ 'parallax' => '' ];
			
			foreach( $section_modules as $module => $name ){
				
				if( isset( $saved_modules[$module] ) && $saved_modules[$module] == 'on' ) {
					$renamed_module = str_replace( "-", "_", $module );
					add_action( 'elementor/element/after_section_end', [$this, 'add_'. $renamed_module .'_section'], absint( $preference += 5 ), 3 );
					//add_action( 'elementor/frontend/section/before_render', [$this, $renamed_module .'_before_render'], absint( $preference += 1 ), 1 );
					add_action( 'elementor/frontend/before_render', [$this, $renamed_module .'_before_render'], absint( $preference += 1 ), 1 );					
				}
				
			}
			
			//add_action( 'elementor/frontend/before_render', [ $this, 'parallax_before_render' ], 10, 1 );
			
			// Custom editor element for get settings values
			add_action( 'elementor/section/print_template', [$this, 'custom_section_print_template'], 90, 2 );
			add_action( 'elementor/container/print_template', [$this, 'custom_section_print_template'], 90, 2 );
			
		}
				
	}
	
	public static function module_scripts() {
		
		$module_args = [
			'rain-drops' => [ 'key' => 'raindrops', 'file' => 'raindrops.js', 'lib' => array('jquery', 'jquery-ui-core', 'jquery-ease'), 'version' => '1.0' ],
			'smoke' => [ 'key' => 'ai-smoke', 'file' => 'ai.smoke.js', 'lib' => array('jquery'), 'version' => '1.0' ],
			'parallax' => [ 'key' => 'jarallax', 'file' => 'jarallax.min.js', 'lib' => array('jquery'), 'version' => '2.1.3' ],
			'float-image' => [ 'key' => 'ai-float-parallax', 'file' => 'ai-float-parallax.js', 'lib' => array('jquery'), 'version' => '1.0' ]			
		];
		
		return $module_args;
		
	}
	
	public static function front_main_script() {
		
		return [ 'key' => 'ai-front-end', 'file' => 'ai-front-end.js', 'lib' => array('jquery'), 'version' => '1.0' ];
		
	}
	
	public function custom_section_print_template( $template, $widget ) {
		
		//if( $widget->get_name() != 'section' || $widget->get_name() != 'container' ) return $template;
		
		$aiea_pointer = '<i class="ai-section-pointer screen-reader-text" data-section-id="{{ view.getID() }}" data-ai="{{ JSON.stringify(settings) }}"></i>'; 
		return $template . $aiea_pointer;
		
	}
		
	public static function parallax_before_render( \Elementor\Element_Base $element ) {
		
		// Make sure we are in a section element
		/*if( ( 'section' !== $element->get_name() ) || ( 'container' !== $element->get_name() ) ) {
			return;
		}*/
		
		$parallax_opt = $element->get_settings( 'parallax_opt' );
		
		if( $parallax_opt == 'yes' ){
		
			//wp_enqueue_script( array( 'jarallax', 'ai-front-end' ) );
			$module_args = self::module_scripts();
			if( !wp_script_is( $module_args['parallax']['key'] ) ) {
				aiea_addon_base()->scripts_regsiter( 'script', 'enqueue', $module_args['parallax'] );
			}
			if( !wp_script_is( 'ai-front-end' ) ) {
				aiea_addon_base()->scripts_regsiter( 'script', 'enqueue', self::front_main_script() );
			}
			
			$parallax_array = array(
				'parallax_image' 	=> $element->get_settings( 'parallax_image' ),
				'parallax_speed' 	=> $element->get_settings( 'parallax_speed' ),
				'parallax_type'		=> $element->get_settings( 'parallax_type' )
			);
			$element->add_render_attribute( '_wrapper', 'data-ai-parallax', htmlspecialchars( json_encode( $parallax_array ), ENT_QUOTES, 'UTF-8' ) );

		}
		
	}
		
	public static function add_parallax_section( $element, $section_id, $args ) {
		
		if( ( 'section' === $element->get_name() || 'container' === $element->get_name() ) && $section_id == 'section_effects') {
			// Parallax Settings			
			$element->start_controls_section(
				'section_parallax',
				[
					'label' => __( 'Parallax Effects', 'ai-addons' ),
					'tab' => Controls_Manager::TAB_ADVANCED,
				]
			);
			$element->add_control(
				"parallax_opt",
				[
					"label" 		=> esc_html__( "Enable/Disable Parallax", 'ai-addons' ),
					"type" 			=> Controls_Manager::SWITCHER,
					"label_off" 	=> esc_html__( 'Off', 'ai-addons' ),
					"label_on" 		=> esc_html__( 'On', 'ai-addons' ),
					"default" 		=> "no",
					'prefix_class' => 'elementor-section-parallax-',
				]
			);
			$element->add_control(
				"parallax_image",
				[
					"type" => Controls_Manager::MEDIA,
					"label" => esc_html__( "Parallax Image", 'ai-addons' ),
					"dynamic" => [
						"active" => true,
					],
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
					'condition' => [
						'parallax_opt' => 'yes',
					]
				]
			);
			$element->add_control(
				'parallax_type',
				[
					'label' => esc_html__( 'Parallax Type', 'ai-addons' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'scroll',
					'options' => [
						'scroll' => esc_html__( 'Scroll', 'ai-addons' ),
						'scale' => esc_html__( 'Scale', 'ai-addons' ),
						'opacity' => esc_html__( 'Opacity', 'ai-addons' ),
						'scroll-opacity' => esc_html__( 'Scroll Opacity', 'ai-addons' ),
						'scale-opacity' => esc_html__( 'Scale Opacity', 'ai-addons' ),
					],
					'condition' => [
						'parallax_opt' => 'yes',
					]
				]
			);
			$element->add_control(
				'parallax_speed',
				[
					'label' => esc_html__( 'Parallax Speed', 'ai-addons' ),
					'type' => Controls_Manager::NUMBER,
					'min' => 0.1,
					'max' => 2,
					'step' => 0.1,
					'default' => 0.5,
					'condition' => [
						'parallax_opt' => 'yes',
					]
				]
			);
			$element->end_controls_section();
			// Parallax Settings end	
		}
		
	}
		
	public static function add_controls_section($element, $section_id, $args) {
			
		if ($section_id == 'section_custom_css_pro') {

			$element->remove_control('section_custom_css_pro');
			
			$element->start_controls_section(
				'section_custom_css',
				[
					'label' => esc_html__( 'AI Custom CSS', 'ai-addons' ),
					'tab' => Controls_Manager::TAB_ADVANCED,
				]
			);

			$element->add_control(
				'custom_css_title',
				[
					'raw' => esc_html__( 'Add your own custom CSS here', 'ai-addons' ),
					'type' => Controls_Manager::RAW_HTML,
				]
			);

			$element->add_control(
				'custom_css',
				[
					'type' => Controls_Manager::CODE,
					'label' => esc_html__( 'Custom CSS', 'ai-addons' ),
					'language' => 'css',
					'render_type' => 'ui',
					'show_label' => false,
					'separator' => 'none',
				]
			);

			$element->add_control(
				'custom_css_description',
				[
					'raw' => 'Use "selector" to target wrapper element. Examples:<br>selector {color: red;} // For main element<br>selector .child-element {margin: 10px;} // For child element<br>.my-class {text-align: center;} // Or use any custom selector',
					'type' => Controls_Manager::RAW_HTML,
					'content_classes' => 'zhf-elementor-descriptor',
				]
			);

			$element->end_controls_section();
		}
	}

	public function add_post_css($post_css, $element) {
		if ($post_css instanceof Dynamic_CSS) {
			return;
		}

		$element_settings = $element->get_settings();

		if (empty($element_settings['custom_css'])) {
			return;
		}

		$css = trim($element_settings['custom_css']);

		if (empty($css)) {
			return;
		}
		$css = str_replace('selector', $post_css->get_element_unique_selector($element), $css);

		// Add a css comment
		$css = sprintf('/* Start custom CSS for %s, class: %s */', $element->get_name(), $element->get_unique_selector()) . $css . '/* End custom CSS */';

		$post_css->get_stylesheet()->add_raw_css($css);
	}

	public function add_page_settings_css( $post_css ) {
		$document = \Elementor\Plugin::$instance->documents->get( $post_css->get_post_id() );
		$custom_css = $document->get_settings( 'custom_css' );
		$custom_css = trim( $custom_css );

		if ( empty( $custom_css ) ) {
			return;
		}

		$custom_css = str_replace( 'selector', $document->get_css_wrapper_selector(), $custom_css );

		// Add a css comment
		$custom_css = '/* Start custom CSS for page-settings */' . $custom_css . '/* End custom CSS */';

		$post_css->get_stylesheet()->add_raw_css( $custom_css );

	}
	
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

} AIEA_Section_Module::instance();