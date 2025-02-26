<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

/**
 * AI Addons Content Carousel
 *
 * @since 1.0.0
 */
 
class AIEA_Elementor_Content_Carousel_Widget extends Widget_Base {
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Conent Carousel name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ai-content-carousel';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Blog widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Content Carousel', 'ai-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Blog widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('content-carousel');
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Content Carousel widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'ai-elements' ];
	}
	
	/**
	 * Retrieve the list of scripts the counter widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.3.0
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'slick', 'ai-front-end' ];
	}
	
	public function get_style_depends() {
		return [ 'themify-icons', 'slick' ];
	}
	
	public function get_help_url() {
        return 'https://aiaddons.ai/content-carousel-demo/';
    }
	
	/**
	 * Get widget keywords.
	 * @return array widget keywords.
	 */
	public function get_keywords() {
		return [ 'slider', 'carousel', 'content' ];
	}

		
	/**
	 * Register Content Carousel widget controls. 
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
	
		//Layouts Section
		$this->start_controls_section(
			'layouts_section',
			[
				'label'			=> esc_html__( 'Layouts', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_responsive_control(
			'alignment',
			[
				'label' => esc_html__( 'Alignment', 'ai-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'ai-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'ai-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'ai-addons' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'ai-addons' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .slick-slide' => 'text-align: {{VALUE}};',
				],
			]
		);			
		$this->add_control(
			'layout',
			[
				'label'			=> esc_html__( 'Carousel Style Layout', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'standard',
				'options'		=> [
					'standard'		=> esc_html__( 'Standard', 'ai-addons' ),
					'classic'		=> esc_html__( 'Classic (Pro)', 'ai-addons' ),
					'modern'		=> esc_html__( 'Modern (Pro)', 'ai-addons' ),
					'classic-pro'	=> esc_html__( 'Minimalist (Pro)', 'ai-addons' ),
				]
			]
		);
		$this->add_control(
			'layout_pro_alert',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => esc_html__( 'Only available in pro version!', 'ai-addons'),
				'content_classes' => 'ai-elementor-warning',
				'condition' => [
					'layout!' => $this->get_free_options('layout'),
				]
			]
		);
		$this->end_controls_section();

		//Content Section
		$this->start_controls_section(
			'content_section',
			[
				'label'			=> esc_html__( 'Content', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
			]
		);
		
		$repeater = new Repeater();
		
		// Openai part
		$repeater->add_control(
			'aiea_content_opt',
			[
				'label' 		=> esc_html__( 'OpenAI Content?', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no',
			]
		);
		$repeater->add_control(
			'aiea_pro_alert',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => esc_html__( 'Only available in pro version!', 'ai-addons'),
				'content_classes' => 'ai-elementor-warning',
				'condition' => [
					'aiea_content_opt' => 'yes'
				],
			]
		);
		
		$repeater->add_control(
			'inner_content',
			[
				'type'			=> Controls_Manager::WYSIWYG,
				'label'			=> esc_html__( 'Inner Content', 'ai-addons' ),
				'default'		=> aiea_addon_base()->make_default_content('content-carousel'),
			]
		);		
		$this->add_control(
			'inner_contents',
			[
				'label' 		=> __( 'Inner Contents', 'ai-addons' ),
				'type' 			=>  Controls_Manager::REPEATER,
				'fields'		=> $repeater->get_controls(),
				'default'		=> [
					[
						'inner_content' => aiea_addon_base()->make_default_content('content-carousel-1'),
					],
					[
						'inner_content' => aiea_addon_base()->make_default_content('content-carousel-2'),
					],
					[
						'inner_content' => aiea_addon_base()->make_default_content('content-carousel-3'),
					]
				]
			]
		);
		$this->end_controls_section();
		
		//Slide Section
		$this->start_controls_section(
			'slide_section',
			[
				'label'			=> esc_html__( 'Slide', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
			]
		);		
		$this->add_control(
			'slide_item',
			[
				'type'			=> Controls_Manager::NUMBER,
				'label'			=> esc_html__( '# of slides', 'ai-addons' ),
				'min' => 1,
				'step' => 1,
				'default' => 1,
			]
		);
		$this->add_control(
			'slide_item_tab',
			[
				'type'			=> Controls_Manager::NUMBER,
				'label'			=> esc_html__( '# of slides in Tablet', 'ai-addons' ),
				'min' => 1,
				'step' => 1,
				'default' => 2,
			]
		);
		$this->add_control(
			'slide_item_mobile',
			[
				'type'			=> Controls_Manager::NUMBER,
				'label'			=> esc_html__( '# of slides in Mobile', 'ai-addons' ),
				'min' => 1,
				'step' => 1,
				'default' => 1,
			]
		);
		$this->add_control(
			'slide_item_autoplay',
			[
				'label' 		=> esc_html__( 'Auto play', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'slide_item_loop',
			[
				'label' 		=> esc_html__( 'Loop slide', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'slide_center',
			[
				'label' 		=> esc_html__( 'Center mode', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'slide_nav',
			[
				'label' 		=> esc_html__( 'Arrows', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'slide_adaptive_height',
			[
				'label' 		=> esc_html__( 'Adaptive height', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'slide_dots',
			[
				'label' 		=> esc_html__( 'Dots', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'autoplay_speed',
			[
				'type'			=> Controls_Manager::NUMBER,
				'label'			=> esc_html__( 'Autoplay speed', 'ai-addons' ),
				'min' => 100,
				'step' => 100,
				'default' => 5000,
			]
		);
		$this->add_control(
			'animation_speed',
			[
				'type'			=> Controls_Manager::NUMBER,
				'label'			=> esc_html__( 'Moving speed', 'ai-addons' ),
				'min' => 100,
				'step' => 100,
				'default' => 250,
			]
		);
		$this->add_control(
			'slide_to_scroll',
			[
				'type'			=> Controls_Manager::NUMBER,
				'label'			=> esc_html__( 'Slide to scroll', 'ai-addons' ),
				'min' => 1,
				'max' => 10,
				'step' => 1,
				'default' => 1,
			]
		);
		$this->end_controls_section();
		
		// Go premium section
		$this->start_controls_section(
			'aiea_section_pro',
			[
				'label' => esc_html__( 'Go Premium for More Features', 'ai-addons' )
			]
		);
		$this->add_control(
			'aiea_get_pro',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<span class="inc-pro-feature"> Get the  <a href="https://aiaddons.ai/pricing/" target="_blank">Pro version</a> for more ai elements and customization options.</span>',
				'content_classes' => 'ai-elementor-warning'
			]
		);
		$this->end_controls_section();
		
		// Style General Section
		$this->start_controls_section(
			'section_style_general',
			[
				'label' => __( 'General', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'carousel_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .content-carousel-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'carousel_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .content-carousel-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->start_controls_tabs( 'general_styles' );
			$this->start_controls_tab(
				'general_normal',
				[
					'label' => esc_html__( 'Normal', 'ai-addons' ),
				]
			);
			$this->add_control(
				'font_color',
				[
					'label' => esc_html__( 'Font Color', 'ai-addons' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .content-carousel-wrapper .item.slick-slide' => 'color: {{VALUE}};'
					]
				]
			);
			$this->add_control(
				'bg_color',
				[
					'label' => esc_html__( 'Background Color', 'ai-addons' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .content-carousel-wrapper .item.slick-slide' => 'background-color: {{VALUE}};'
					]
				]
			);
			$this->add_control(
				'shadow_opt',
				[
					'label' 		=> esc_html__( 'Box Shadow Enable', 'ai-addons' ),
					'type' 			=> Controls_Manager::SWITCHER,
					'default' 		=> 'no'
				]
			);
			$this->add_control(
				'carousel_box_shadow',
				[
					'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
					'type' 			=> Controls_Manager::BOX_SHADOW,
					'condition' => [
						'shadow_opt' => 'yes',
					],
					'selectors' => [
						'{{WRAPPER}} .content-carousel-wrapper' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{carousel_box_shadow_pos.VALUE}};',
					]
				]
			);
			$this->add_control(
				'carousel_box_shadow_pos',
				[
					'label' =>  esc_html__( 'Box Shadow Position', 'ai-addons' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						' ' => esc_html__( 'Outline', 'ai-addons' ),
						'inset' => esc_html__( 'Inset', 'ai-addons' ),
					],
					'condition' => [
						'shadow_opt' => 'yes',
					],
					'default' => ' ',
					'render_type' => 'ui',
				]
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'general_hover',
				[
					'label' => esc_html__( 'Hover', 'ai-addons' ),
				]
			);
			$this->add_control(
				'font_hcolor',
				[
					'label' => esc_html__( 'Font Color', 'ai-addons' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .content-carousel-wrapper:hover .item.slick-slide' => 'color: {{VALUE}};'
					]
				]
			);
			$this->add_control(
				'bg_hcolor',
				[
					'label' => esc_html__( 'Background Color', 'ai-addons' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .content-carousel-wrapper:hover .item.slick-slide' => 'background-color: {{VALUE}};'
					]
				]
			);
			$this->add_control(
				'shadow_hopt',
				[
					'label' 		=> esc_html__( 'Box Shadow Enable', 'ai-addons' ),
					'type' 			=> Controls_Manager::SWITCHER,
					'default' 		=> 'no'
				]
			);
			$this->add_control(
				'carousel_hbox_shadow',
				[
					'label' 		=> esc_html__( 'Hover Box Shadow', 'ai-addons' ),
					'type' 			=> Controls_Manager::BOX_SHADOW,
					'condition' => [
						'shadow_hopt' => 'yes',
					],
					'selectors' => [
						'{{WRAPPER}} .content-carousel-wrapper:hover' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{carousel_hbox_shadow_pos.VALUE}};',
					]
				]
			);
			$this->add_control(
				'carousel_hbox_shadow_pos',
				[
					'label' =>  esc_html__( 'Box Shadow Position', 'ai-addons' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						' ' => esc_html__( 'Outline', 'ai-addons' ),
						'inset' => esc_html__( 'Inset', 'ai-addons' ),
					],
					'condition' => [
						'shadow_hopt' => 'yes',
					],
					'default' => ' ',
					'render_type' => 'ui',
				]
			);
			$this->end_controls_tab();	
		$this->end_controls_tabs();	
		$this->end_controls_section();	
				
		// Style Carousel Item Section
		$this->start_controls_section(
			'section_style_carousel_item',
			[
				'label' => __( 'Carousel Item', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'active_font_color',
			[
				'label' => esc_html__( 'Active Font', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .content-carousel-wrapper .item.slick-slide.slick-current.slick-active' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'active_item_bg_color',
			[
				'label' => esc_html__( 'Active Background', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .content-carousel-wrapper .item.slick-slide.slick-current.slick-active' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->add_responsive_control(
			'carousel_item_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .content-carousel-wrapper .item.slick-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'carousel_item_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .content-carousel-wrapper .item.slick-slide' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_control(
			'item_shadow_opt',
			[
				'label' 		=> esc_html__( 'Box Shadow Enable', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'item_box_shadow',
			[
				'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
				'type' 			=> Controls_Manager::BOX_SHADOW,
				'condition' => [
					'item_shadow_opt' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .content-carousel-wrapper .item.slick-slide' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{item_box_shadow_pos.VALUE}};',
				]
			]
		);
		$this->add_control(
			'item_box_shadow_pos',
			[
				'label' =>  esc_html__( 'Box Shadow Position', 'ai-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					' ' => esc_html__( 'Outline', 'ai-addons' ),
					'inset' => esc_html__( 'Inset', 'ai-addons' ),
				],
				'condition' => [
					'item_shadow_opt' => 'yes',
				],
				'default' => ' ',
				'render_type' => 'ui',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'carousel_item_border',
				'selector' => '{{WRAPPER}} .content-carousel-wrapper .item.slick-slide',
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'carousel_typography',
				'selector' 		=> '{{WRAPPER}} .content-carousel-wrapper'
			]
		);	
		$this->end_controls_section();	
		
		// Style Arrows And Dots Section
		$this->start_controls_section(
			'section_style_arrow_item',
			[
				'label' => __( 'Arrows And Dots', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);	
		$this->add_control(
			'dot_color',
			[
				'label' => esc_html__( 'Dot Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slick-dots li button:before' => 'color: {{VALUE}};'
				]
			]
		);	
		$this->add_control(
			'active_dot_color',
			[
				'label' => esc_html__( 'Active Dot Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slick-dots li.slick-active button:before' => 'color: {{VALUE}};'
				]
			]
		);			
		$this->add_control(
			'arrow_color',
			[
				'label' => esc_html__( 'Arrows Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} i.ti-angle-left.slick-arrow, i.ti-angle-right.slick-arrow' => 'color: {{VALUE}};'
				]
			]
		);
		$this->end_controls_section();	

	}
	
	/**
	 * Render Content Carousel widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		
		extract( $settings );
		
		$free_layouts = [ 'standard' ];		
		$parent_class = isset( $layout ) && in_array( $layout, $free_layouts ) ? 'ai-carousel-style-' . $layout : 'ai-carousel-style-standard';
		
		$this->add_render_attribute( 'ai-widget-wrapper', 'class', 'ai-carousel-elementor-widget content-carousel-wrapper' );
		$this->add_render_attribute( 'ai-widget-wrapper', 'class', esc_attr( $parent_class ) );
		?>
		<div <?php echo ''. $this->get_render_attribute_string( 'ai-widget-wrapper' ); ?>>
		<?php

		$inner_contents = isset( $inner_contents ) && $inner_contents != '' ? $inner_contents : '';

		$data_atts = '';
		$slide_options = array( 'slide_item', 'slide_item_tab', 'slide_item_mobile', 'slide_item_autoplay', 'slide_item_loop', 'slide_center', 'slide_nav', 'slide_dots', 'autoplay_speed', 'animation_speed', 'slide_to_show', 'slide_to_scroll' );
		$slide_arr = array();
		foreach( $slide_options as $slide_option ) {
			$slide_arr[$slide_option] = isset( $settings[$slide_option] ) ? $settings[$slide_option] : '';
		}
		$data_atts = ' data-slide-atts="'. htmlspecialchars( json_encode( $slide_arr ), ENT_QUOTES, 'UTF-8' ) .'"';
	
		//Content Carousel Slide
		echo '<div class="ai-slider "'. ( $data_atts ) .'>';	
			foreach (  $inner_contents as $inner_content ) { 
				echo '<div class="item">';
					echo do_shortcode( $inner_content['inner_content'] );
				echo '</div>';
			}
		//Content Carousel Slide End
		echo '</div><!-- .ai-slider -->';
		
		echo '</div> <!-- .ai-widget-wrapper -->';

	}
	
	public function get_free_options( $key ) {
		$free_options = [
			'layout' => [ 'standard' ]
		];
		return $free_options[$key];
	}
	
}