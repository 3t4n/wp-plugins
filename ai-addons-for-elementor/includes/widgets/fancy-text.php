<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

/**
 * Elementor Fancy Text Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
 
class AIEA_Elementor_Fancy_Text_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Fancy Text widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ai-fancy-text';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Fancy Text widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Fancy Text', 'ai-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Fancy Text widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('fancy-text');
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
		return [ 'typed', 'morphext', 'ai-front-end'  ];
	}
	
	public function get_style_depends() {
		return [ 'ai-animate' ];
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Fancy Text widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'ai-elements' ];
	}
		
	public function get_help_url() {
        return 'https://aiaddons.ai/fancy-text-demo/';
    }

	/**
	 * Register Fancy Text widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'ai-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);		
		$this->add_control(
			'pre_title',
			[
				'label' => __( 'Prefix Text', 'ai-addons' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Prefix Text', 'ai-addons' ),
				'default' 		=> __( 'Prefix Text', 'ai-addons' )
			]
		);
		$this->add_control(
			'post_title',
			[
				'label' => __( 'Suffix Text', 'ai-addons' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Suffix Text', 'ai-addons' ),
				'default' 		=> ''
			]
		);
		$repeater = new Repeater();		
		$repeater->add_control(
			'animate_text',
			[
				'label'			=> esc_html__( 'Fancy Text', 'ai-addons' ),
				'type'			=> Controls_Manager::TEXT,
				'label_block'	=> true,
				'dynamic'		=> [
					'active'	=> true,
				],
			]
		);
		$repeater->add_control(
			'animate_text_color',
			[
				'label' => esc_html__( 'Color', 'ai-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR
			]
		);
		$this->add_control(
			'animate_text_list',
			[
				'type'			=> Controls_Manager::REPEATER,
				'label'			=> esc_html__( 'Fancy Text', 'ai-addons' ),
				'fields'		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'animate_text'	=> esc_html__( 'AI', 'ai-addons' ),
						'animate_text_color'	=> ''
					],
					[
						'animate_text'	=> esc_html__( 'Prodigious', 'ai-addons' ),
						'animate_text_color'	=> ''
					],
					[
						'animate_text'	=> esc_html__( 'Miraculous', 'ai-addons' ),
						'animate_text_color'	=> ''
					]
				],
				'title_field'	=> '{{{ animate_text }}}'
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'layout_section',
			[
				'label' => __( 'Layout', 'ai-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);	
		$this->add_control(
			'heading_tag',
			[
				'label' => __( 'Choose heading tag', 'ai-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'h3',
				'options' => [
					'h1' 	=> __( 'h1', 'ai-addons' ),
					'h2' 	=> __( 'h2', 'ai-addons' ),
					'h3' 	=> __( 'h3', 'ai-addons' ),
					'h4' 	=> __( 'h4', 'ai-addons' ),
					'h5' 	=> __( 'h5', 'ai-addons' ),
					'h6' 	=> __( 'h6', 'ai-addons' ),
					'p' 	=> __( 'p', 'ai-addons' ),
					'span' 	=> __( 'span', 'ai-addons' ),
					'div' 	=> __( 'div', 'ai-addons' )
				]
			]
		);
		$this->add_control(
			'ani_type',
			[
				'label' => __( 'Animate Type', 'ai-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type',
				'options' => [
					'type' 				=> __( 'Typing', 'ai-addons' ),
					'fadeIn' 			=> __( 'Fade In', 'ai-addons' ),
					'fadeOut' 			=> __( 'Fade Out (Pro)', 'ai-addons' ),
					'fadeInUp' 			=> __( 'Fade In Up (Pro)', 'ai-addons' ),
					'fadeInDown' 		=> __( 'Fade In Down (Pro)', 'ai-addons' ),
					'fadeInLeft' 		=> __( 'Fade In Left (Pro)', 'ai-addons' ),
					'fadeInRight' 		=> __( 'Fade In Right (Pro)', 'ai-addons' ),
					'zoomOut' 			=> __( 'Zoom Out (Pro)', 'ai-addons' ),
					'zoomIn' 			=> __( 'Zoom In (Pro)', 'ai-addons' ),
					'bounce' 			=> __( 'Bounce (Pro)', 'ai-addons' ),
					'flash' 			=> __( 'Flash (Pro)', 'ai-addons' ),
					'pulse' 			=> __( 'Pulse (Pro)', 'ai-addons' ),
					'rubberBand' 		=> __( 'RubberBand (Pro)', 'ai-addons' ),
					'shake' 			=> __( 'Shake (Pro)', 'ai-addons' ),
					'swing' 			=> __( 'Swing (Pro)', 'ai-addons' ),
				]
			]
		);
		$this->add_control(
			'aiea_ani_type_pro_alert',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => esc_html__( 'Only available in pro version!', 'ai-addons'),
				'content_classes' => 'ai-elementor-warning',
				'condition' => [
					'ani_type!' => $this->get_free_options('ani_type'),
				]
			]
		);
		$this->add_control(
			'animation_speed',
			[
				'type'	=> \Elementor\Controls_Manager::NUMBER,
				'label'	=> esc_html__( 'Animate speed', 'ai-addons' ),
				'min' => 100,
				'max' => 10000,
				'step' => 100,
				'default' => 3500,
				'condition' => [
					'ani_type!' => 'type',
				],
			]
		);	
		$this->add_control(
			'typespeed',
			[
				'type'	=> \Elementor\Controls_Manager::NUMBER,
				'label'	=> esc_html__( 'Typing speed', 'ai-addons' ),
				'min' => 1,
				'max' => 1000,
				'step' => 1,
				'default' => 100,
				'condition' => [
					'ani_type' => 'type',
				],
			]
		);		
		$this->add_control(
			'backspeed',
			[
				'type'	=> \Elementor\Controls_Manager::NUMBER,
				'label'	=> esc_html__( 'Back speed', 'ai-addons' ),
				'min' => 1,
				'max' => 200,
				'step' => 1,
				'default' => 100,
				'condition' => [
					'ani_type' => 'type',
				],
			]
		);
		$this->add_control(
			'backdelay',
			[
				'type'	=> \Elementor\Controls_Manager::NUMBER,
				'label'	=> esc_html__( 'Back Delay', 'ai-addons' ),
				'min' => 0,
				'max' => 5000,
				'step' => 100,
				'default' => 1000,
				'condition' => [
					'ani_type' => 'type',
				],
			]
		);		
		$this->add_control(
			'startdelay',
			[
				'type'	=> \Elementor\Controls_Manager::NUMBER,
				'label'	=> esc_html__( 'Start delay', 'ai-addons' ),
				'min' => 0,
				'max' => 5000,
				'step' => 100,
				'default' => 1000,
				'condition' => [
					'ani_type' => 'type',
				],
			]
		);		
		$this->add_control(
			'cursor_char',
			[
				'label' => __( 'Cursor character', 'ai-addons' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => '|',
				'default' 		=> '|',
				'condition' => [
					'ani_type' => 'type',
				],
			]
		);		
		$this->add_control(
			'typing_loop',
			[
				'label' 		=> esc_html__( 'Animate loop', 'ai-addons' ),
				'type' 			=> \Elementor\Controls_Manager::SWITCHER,
				'label_off' 	=> esc_html__( 'Off', 'ai-addons' ),
				'label_on' 		=> esc_html__( 'On', 'ai-addons' ),
				'default' 		=> 'yes',
				'condition' => [
					'ani_type' => 'type',
				],
			]
		);	
		$this->add_control(
			'fadeout',
			[
				'label' 		=> esc_html__( 'Fade Out', 'ai-addons' ),
				'type' 			=> \Elementor\Controls_Manager::SWITCHER,
				'label_off' 	=> esc_html__( 'Off', 'ai-addons' ),
				'label_on' 		=> esc_html__( 'On', 'ai-addons' ),
				'default' 		=> 'no',
				'condition' => [
					'ani_type' => 'type',
				],
			]
		);	
		$this->end_controls_section();
		
		// Go premium section
		$this->start_controls_section(
			'aiea_section_pro_1',
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
		
		// Go premium section
		$this->start_controls_section(
			'aiea_section_pro',
			[
				'label' => esc_html__( 'Go Premium for More Features', 'ai-addons' )
			]
		);
		$this->add_control(
			'aiea_get_pro_1',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<span class="inc-pro-feature"> Get the  <a href="https://aiaddons.ai/pricing/" target="_blank">Pro version</a> for more ai elements and customization options.</span>',
				'content_classes' => 'ai-elementor-warning'
			]
		);
		$this->end_controls_section();
		
		//Style Section
		$this->start_controls_section(
			'style_section',
			[
				'label'			=> esc_html__( 'Title', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->start_controls_tabs( 'text_colors' );
		$this->start_controls_tab(
			'text_colors_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		
		$this->add_control(
			'title_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Title', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .ai-animate-title' => 'color: {{VALUE}};',
				]
			]
		);
		
		$this->end_controls_tab();
		$this->start_controls_tab(
			'text_colors_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		
		$this->add_control(
			'title_hcolor',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .ai-animate-title:hover' => 'color: {{VALUE}};',
				]
			]
		);
		
		$this->end_controls_tab();
		$this->end_controls_tabs();	
		
		$this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .ai-animate-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'animated_align',
			[
				'label' => __( 'Alignment', 'ai-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => [
					'left' => [
						'title' => __( 'Left', 'ai-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'ai-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'ai-addons' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'ai-addons' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ai-animated-text-inner' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'animated_typography',
				'selector' 		=> '{{WRAPPER}} .ai-animate-title'
			]
		);	
		
		$this->end_controls_section();
		
		//Fancy Style Section
		$this->start_controls_section(
			'animated_style_section',
			[
				'label'			=> esc_html__( 'Fancy Text', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->start_controls_tabs( 'animated_colors' );
		$this->start_controls_tab(
			'animated_colors_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		
		$this->add_control(
			'animate_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .ai-animate-title > span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'animate_bg',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Background', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .ai-animate-title > span' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_tab();
		$this->start_controls_tab(
			'animated_colors_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		
		$this->add_control(
			'animate_hcolor',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .ai-animate-title:hover > span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'animate_hbg',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Background', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .ai-animate-title:hover > span' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_tab();
		$this->end_controls_tabs();
		
		$this->add_responsive_control(
			'animated_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .ai-animate-title .ai-typing-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'animated_text_typography',
				'selector' 		=> '{{WRAPPER}} .ai-animate-title .ai-typing-text'
			]
		);					
		$this->end_controls_section();

	}
	 
	protected function render() {

		$settings = $this->get_settings_for_display();
		
		$parent_class = isset( $settings['ani_type'] ) && $settings['ani_type'] != '' ? 'ai-fancytext-' . $settings['ani_type'] : 'ai-fancytext-type';
		$this->add_render_attribute( 'ai-widget-wrapper', 'class', 'ai-animated-text-elementor-widget' );
		$this->add_render_attribute( 'ai-widget-wrapper', 'class', esc_attr( $parent_class ) );
		?>
		<div <?php echo ''. $this->get_render_attribute_string( 'ai-widget-wrapper' ); ?>>
		<?php

		$heading_tag = isset( $settings['heading_tag'] ) ? $settings['heading_tag'] : 'h3';
		$pre_title = isset( $settings['pre_title'] ) ? $settings['pre_title'] : '';
		$post_title = isset( $settings['post_title'] ) ? $settings['post_title'] : '';
		
		$ani_type = isset( $settings['ani_type'] ) && in_array( $settings['ani_type'], $this->get_free_options('ani_type') ) ? $settings['ani_type'] : 'fadeIn';
		$animation_speed = isset( $settings['animation_speed'] ) ? $settings['animation_speed'] : '100'; 
		$typespeed = isset( $settings['typespeed'] ) ? $settings['typespeed'] : '100';
		$backspeed = isset( $settings['backspeed'] ) ? $settings['backspeed'] : '100';
		$backdelay = isset( $settings['backdelay'] ) ? $settings['backdelay'] : '1000';
		$startdelay = isset( $settings['startdelay'] ) ? $settings['startdelay'] : '1000';
		$cursor_char = isset( $settings['cursor_char'] ) ? $settings['cursor_char'] : '|';
		$ani_loop = isset( $settings['typing_loop'] ) ? $settings['typing_loop'] : 'no';
		$fadeout = isset( $settings['fadeout'] ) ? $settings['fadeout'] : 'no';
		
		$ani_text_only = '';
		$animated_text = []; $first_text = ''; $i = 1;
		foreach( $settings['animate_text_list'] as $index => $item ){
			if( !empty( $item['animate_text'] ) ){
				$first_text = empty( $first_text ) ? $item['animate_text'] : '';
				$text_color = !empty( $item['animate_text_color'] ) ? $item['animate_text_color'] : '';
				$animated_text[] = $text_color ? '<span style="color: '. $text_color .';">'. $item['animate_text'] . '</span>' : $item['animate_text'];
				$ani_text_only .= $item['animate_text'] . ',';
			};
		}
		$ani_text_only = rtrim( $ani_text_only, ',' );
		$animate_text = !empty( $animated_text ) ? implode( ",", $animated_text ) : '';
		$first_text = explode( ",", $animate_text );
		$first_text = isset( $first_text[0] ) ? $first_text[0] : '';
		
		$this->add_render_attribute( 'typing_text', 'class', 'ai-typing-text' );
		
		
		$this->add_render_attribute( 'typing_text', 'data-animate-type', $ani_type );
		
		if( $ani_type != 'type' ) {
			$this->add_render_attribute( 'typing_text', 'data-animate-speed', $animation_speed );
		}
		
		if( $ani_type == 'type' ) {			
			$this->add_render_attribute( 'typing_text', 'data-typing', $animate_text );
			$this->add_render_attribute( 'typing_text', 'data-typespeed', $typespeed );
			$this->add_render_attribute( 'typing_text', 'data-backspeed', $backspeed );
			$this->add_render_attribute( 'typing_text', 'data-backdelay', $backdelay );
			$this->add_render_attribute( 'typing_text', 'data-startdelay', $startdelay );
			$this->add_render_attribute( 'typing_text', 'data-loop', $ani_loop );
			$this->add_render_attribute( 'typing_text', 'data-char', $cursor_char );
			$this->add_render_attribute( 'typing_text', 'data-fadeout', $fadeout );
		}

		echo '<div class="ai-animated-text-inner">';

			echo '<'. esc_attr( $heading_tag ) .' class="ai-animate-title">';
				echo !empty( $pre_title ) ? wp_kses_post( $pre_title ) : '';
				if( $ani_type == 'type' ) {
					echo ' <span '. $this->get_render_attribute_string( 'typing_text' ) .'>'. wp_kses_post( $first_text ) .'</span>';
				} else {
					echo ' <span '. $this->get_render_attribute_string( 'typing_text' ) .'>'. wp_kses_post( $ani_text_only ) .'</span>';
				}
				echo !empty( $post_title ) ? wp_kses_post( $post_title ) : '';
			echo '</'. esc_attr( $heading_tag ) .'>';

		echo '</div>';
		
		echo '</div> <!-- .ai-widget-wrapper -->';

	}
	
	public function get_free_options( $key ) {
		$free_options = [
			'ani_type' => [ 'type', 'fadeIn' ]
		];
		return $free_options[$key];
	}

}