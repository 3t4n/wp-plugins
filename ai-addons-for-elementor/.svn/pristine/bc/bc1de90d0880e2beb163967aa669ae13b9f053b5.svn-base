<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

/**
 * AI Addons Progress Bar Widget
 *
 * @since 1.0.0
 */
 
class AIEA_Elementor_Progress_Bar_Widget extends Widget_Base {
	
	private $excerpt_len;
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Progress Bar widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'aiea-progress-bar';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Progress Bar title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Progress Bar', 'ai-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Progress Bar icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('progress-bar');
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Progress Bar widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ "ai-elements" ];
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
		return [ 'appear', 'ai-front-end'  ];
	}
		
	public function get_help_url() {
        return 'https://aiaddons.ai/progress-bar-demo/';
    }

	/**
	 * Register Progress Bar widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
		$this->start_controls_section(
			'progress_section',
			[
				'label'	=> esc_html__( 'Progress', 'ai-addons' ),
				'tab'	=> Controls_Manager::TAB_CONTENT,
			]
		);		
		$this->add_responsive_control(
			'progress_val',
			[
				'label' => esc_html__( 'Progress %', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 70,
				],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
				]
			]
		);
		$this->add_control(
			'value_suffix',
			[
				'type'			=> Controls_Manager::TEXT,
				'label'			=> esc_html__( 'Value Suffix', 'ai-addons' ),
				'default' 		=> '%'
			]
		);		
		$this->add_responsive_control(
			'progress_size',
			[
				'label' => esc_html__( 'Size', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'size' => '',
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .horizontal-progress-bar' => 'width: {{SIZE}}{{UNIT}};',
				]
			]
		);		
		$this->add_responsive_control(
			'progress_thikness',
			[
				'label' => esc_html__( 'Thickness', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'size' => 30,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .horizontal-progress-bar, {{WRAPPER}} .horizontal-progress-bar .progress-value' => 'height: {{SIZE}}{{UNIT}};',
				]
			]
		);	
		$this->add_responsive_control(
			'progress_duration',
			[
				'label' => esc_html__( 'Duration', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'size' => 1500,
				],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 5000,
						'step' => 50,
					],
				]
			]
		);
		$this->add_control(
			'progress_value_layout',
			[
				'label'			=> esc_html__( 'Progress Value', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'outer',
				'options'		=> [
					'none'		=> esc_html__( 'None', 'ai-addons' ),
					'outer'		=> esc_html__( 'Outer', 'ai-addons' ),
					'inner'		=> esc_html__( 'Inner', 'ai-addons' )
				]
			]
		);
		$this->end_controls_section();
				
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
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .progress-bar-wrapper' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'progress_heading',
			[
				'label'			=> esc_html__( 'Post Heading Tag', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'h6',
				'options'		=> [
					'h1'		=> esc_html__( 'h1', 'ai-addons' ),
					'h2'		=> esc_html__( 'h2', 'ai-addons' ),
					'h3'		=> esc_html__( 'h3', 'ai-addons' ),
					'h4'		=> esc_html__( 'h4', 'ai-addons' ),
					'h5'		=> esc_html__( 'h5', 'ai-addons' ),
					'h6'		=> esc_html__( 'h6', 'ai-addons' ),
					'div'		=> esc_html__( 'div', 'ai-addons' ),
					'p'		=> esc_html__( 'p', 'ai-addons' ),
					'span'		=> esc_html__( 'span', 'ai-addons' ),
					'i'		=> esc_html__( 'i', 'ai-addons' ),
					
				]
			]
		);
		
		$this->add_control(
			'section_bar_enabled',
			[
				'label' => esc_html__( 'Bar Enabled?', 'ai-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'yes',
				'classes' => 'ai-hidden-trigger-control'
			]
		);
		$this->add_control(
			'section_title_enabled',
			[
				'label' => esc_html__( 'Title Enabled?', 'ai-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'yes',
				'classes' => 'ai-hidden-trigger-control'
			]
		);
		$this->add_control(
			'section_content_enabled',
			[
				'label' => esc_html__( 'Content Enabled?', 'ai-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'no',
				'classes' => 'ai-hidden-trigger-control'
			]
		);
		
		$this->add_control(
			'progress_items',
			[
				'label'				=> 'Progress Bar Items',
				'type'				=> 'drag-n-drop',
				'drag_items' 			=> [ 
					'visible' 			=> [
						'title'	=> esc_html__( 'Title', 'ai-addons' ),
						'bar'	=> esc_html__( 'Bar', 'ai-addons' ),						
					],
					'disabled'	=> [
						'content'	=> esc_html__( 'Content', 'ai-addons' )
					]
				],
				'triggers' => [
					'bar' => 'section_bar_enabled',
					'title' => 'section_title_enabled',
					'content' => 'section_content_enabled'
				]
			]
		);
		$this->add_control(
			'inner_txt_opt',
			[
				'label' 		=> esc_html__( 'Inner Text Show', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes'
			]
		);
		$this->add_control(
			'progress_inner_txt',
			[
				'type'			=> Controls_Manager::TEXT,
				'label'			=> esc_html__( 'Progress Inner Text', 'ai-addons' ),
				'default' 		=> esc_html__( 'Web Development', 'ai-addons' ),
			]
		);
		$this->end_controls_section();	
		
		// Title Section
		$this->start_controls_section(
			'title_section',
			[
				'label'	=> esc_html__( 'Title', 'ai-addons' ),
				'tab'	=> Controls_Manager::TAB_CONTENT,
				'condition' 	=> [
					'section_title_enabled' 		=> 'yes'
				],
			]
		);
		$this->add_control(
			'title',
			[
				'type'			=> Controls_Manager::TEXT,
				'label'			=> esc_html__( 'Title', 'ai-addons' ),
				'default' 		=> esc_html__( 'Progress', 'ai-addons' ),
			]
		);		
		$this->end_controls_section();
				
		// Content Section
		$this->start_controls_section(
			'content_section',
			[
				'label'	=> esc_html__( 'Content', 'ai-addons' ),
				'tab'	=> Controls_Manager::TAB_CONTENT,
				'condition' 	=> [
					'section_content_enabled' 		=> 'yes'
				],
			]
		);
		$this->add_control(
			'content',
			[
				'type'			=> Controls_Manager::TEXTAREA,
				'label'			=> esc_html__( 'Content', 'ai-addons' ),
				'default' 		=> ''
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
			'progress_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .horizontal-progress-bar' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'progress_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .horizontal-progress-bar' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		
		$this->add_control(
			'shadow_opt',
			[
				'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'progress_box_shadow',
			[
				'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
				'type' 			=> Controls_Manager::BOX_SHADOW,
				'condition' => [
					'shadow_opt' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .horizontal-progress-bar' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{progress_box_shadow_pos.VALUE}};',
				]
			]
		);
		$this->add_control(
			'progress_box_shadow_pos',
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
		$this->end_controls_section();	
		
		// Style Progress Section
		$this->start_controls_section(
			'section_style_progress',
			[
				'label' => __( 'Progress', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'bar_empty_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Empty Fill Color', 'ai-addons' ),
				'default' 		=> '#e1e1e1',
				'selectors' => [
					'{{WRAPPER}} .horizontal-progress-bar' => 'background: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'bar_fill_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Bar Fill Color', 'ai-addons' ),
				'default' 		=> '#333333',
				'selectors' => [
					'{{WRAPPER}} .horizontal-progress-bar .progress-value' => 'background: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'bar_inner_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Bar Inner Font Color', 'ai-addons' ),
				'selectors' => [
					'{{WRAPPER}} .horizontal-progress-bar .progress-value i' => 'color: {{VALUE}};', 
					'{{WRAPPER}} .horizontal-progress-bar .progress-inner-txt' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_responsive_control(
			'progress_spacing',
			[
				'label' => esc_html__( 'Progress Bar Spacing', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .progress-bar-wrapper .horizontal-progress-bar' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'(mobile){{WRAPPER}} .progress-bar-wrapper .horizontal-progress-bar' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);		
		$this->end_controls_section();	
		
		// Style Title Section
		$this->start_controls_section(
			'section_style_title',
			[
				'label' => __( 'Title', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'section_title_enabled' 		=> 'yes'
				],
			]
		);
		$this->start_controls_tabs( 'title_colors' );
		$this->start_controls_tab(
			'title_colors_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'title_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Title Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .progress-bar-wrapper .progress-bar-title > *' => 'color: {{VALUE}};'
				],
			]
		);			
		$this->end_controls_tab();

		$this->start_controls_tab(
			'title_colors_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_control(
			'title_hcolor',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Title Hover Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .progress-bar-wrapper:hover .progress-bar-title > *' => 'color: {{VALUE}};'
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();	
		$this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__( 'Title Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .progress-bar-wrapper .progress-bar-title > *' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'title_spacing',
			[
				'label' => esc_html__( 'Title Spacing', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .progress-bar-wrapper .progress-bar-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'(mobile){{WRAPPER}} .progress-bar-wrapper .progress-bar-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'selector' 		=> '{{WRAPPER}} .progress-bar-wrapper .progress-bar-title > *'
			]
		);	
		$this->end_controls_section();
		
		// Style Text Section
		$this->start_controls_section(
			'section_style_inner_text',
			[
				'label' => __( 'Inner Text', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'inner_txt_opt' 		=> 'yes'
				],
			]
		);
		$this->add_control(
			'inner_text_text_trans',
			[
				'label'			=> esc_html__( 'Text Transform', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'none',
				'options'		=> [
					'none'			=> esc_html__( 'Default', 'ai-addons' ),
					'capitalize'	=> esc_html__( 'Capitalized', 'ai-addons' ),
					'uppercase'		=> esc_html__( 'Upper Case', 'ai-addons' ),
					'lowercase'		=> esc_html__( 'Lower Case', 'ai-addons' )
				],
				'selectors' => [
					'{{WRAPPER}} .progress-bar-wrapper .progress-inner-txt' => 'text-transform: {{VALUE}};'
				],
			]
		);
		$this->add_responsive_control(
			'inner_text_spacing',
			[
				'label' => esc_html__( 'Text Spacing', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .progress-bar-wrapper .progress-inner-txt' => 'margin-left: {{SIZE}}{{UNIT}};'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'inner_text_typography',
				'selector' 		=> '{{WRAPPER}} .progress-bar-wrapper .progress-inner-txt'
			]
		);	
		$this->end_controls_section();
		
		// Style Content Section
		$this->start_controls_section(
			'section_style_content',
			[
				'label' => __( 'Content', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'section_content_enabled' 		=> 'yes'
				],
			]
		);
		$this->add_responsive_control(
			'desc_spacing',
			[
				'label' => esc_html__( 'Description Spacing', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .progress-bar-wrapper .progress-bar-content' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'(mobile){{WRAPPER}} .progress-bar-wrapper .progress-bar-content' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'content_typography',
				'selector' 		=> '{{WRAPPER}} .progress-bar-wrapper .progress-bar-content'
			]
		);	
		$this->end_controls_section();	

	}
	 
	protected function render() {

		$settings = $this->get_settings_for_display();
		extract( $settings );
				
		$this->add_render_attribute( 'ai-widget-wrapper', 'class', 'ai-progress-bar-elementor-widget progress-bar-wrapper' );
		?>
		<div <?php echo ''. $this->get_render_attribute_string( 'ai-widget-wrapper' ); ?>>
		<?php
		
		//Define Variables
		$title = isset( $title ) && $title != '' ? $title : '';
		
		$value_suffix = isset( $value_suffix ) ? $value_suffix : '';
		$heading = isset( $progress_heading ) && $progress_heading != '' ? $progress_heading : '';
		$value_suffix = isset( $value_suffix ) && $value_suffix != '' ? $value_suffix : '';
		$progress_txt = '';
		$inner_txt_opt = isset( $inner_txt_opt ) && $inner_txt_opt == 'yes' ? true : false;
		if( $inner_txt_opt ) {
			$progress_txt = isset( $progress_inner_txt ) ? $progress_inner_txt : '';
		}
		$content = isset( $content ) && $content != '' ? $content : '';
		$progress_val = isset( $progress_val ) && !empty( $progress_val ) ? $progress_val : '';
		$progress_value_layout = isset( $progress_value_layout ) && !empty( $progress_value_layout ) ? $progress_value_layout : 'none';
		$progress_duration = isset( $progress_duration ) && !empty( $progress_duration ) ? $progress_duration : '';
		
		$default_items = array(			
			"title" => '',
			"bar" => ''
		);
		
		$elemetns = isset( $progress_items ) && !empty( $progress_items ) ? json_decode( $progress_items, true ) : array( 'visible' => $default_items );

		if( isset( $elemetns['visible'] ) ) :
		
			foreach( $elemetns['visible'] as $element => $value ){
								
				switch( $element ){
		
					case "bar":
					
						$progress_value = isset( $progress_val['size'] ) ? $progress_val['size'] : 0;
						$progress_duration = isset( $progress_duration['size'] ) ? $progress_duration['size'] : 1500;
						
						$this->add_render_attribute( 'ai-progress-bar', 'class', 'horizontal-progress-bar' );
						$this->add_render_attribute( 'ai-progress-bar', 'data-pvalue', esc_attr( $progress_value ) );
						$this->add_render_attribute( 'ai-progress-bar', 'data-duration', esc_attr( $progress_duration ) );
						if( $progress_value_layout != 'none' ) {
							$this->add_render_attribute( 'ai-progress-bar', 'class', 'aiea-progress-value-'. esc_attr( $progress_value_layout ) );
						}
						
						echo '<div '. $this->get_render_attribute_string( 'ai-progress-bar' ) .'>';
						
							if( $progress_value_layout != 'none' ) echo '<span class="progress-value"><i>'. esc_html( $progress_value . $value_suffix ) .'</i></span>';
							else echo '<span class="progress-value"></span>';
							
							if( $inner_txt_opt ) echo '<span class="progress-inner-txt">'. esc_html( $progress_txt ) .'</span>';
							
						echo '</div><!-- .horizontal-progress-bar -->';
					break;
					
					case "title":						
						echo '<div class="progress-bar-title">';
							echo '<'. esc_attr( $heading ) .'>'. esc_html( $title ) .'</'. esc_attr( $heading ) .'>';
						echo '</div><!-- .progress-bar-title -->';
					break;
					
					case "content":
						echo '<div class="progress-bar-content">';
							echo esc_textarea( $content );
						echo '</div><!-- .progress-bar-read-more -->';
					break;
					
				}
				
			} // foreach end
				
		endif;
		
		echo '</div> <!-- .ai-widget-wrapper -->';

	}
	
}