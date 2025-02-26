<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * AI Addons Icon Box
 *
 * @since 1.0.0
 */
 
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
 
class AIEA_Elementor_Icon_Box_Widget extends Widget_Base {
	
	private $_settings;
	
	private $icon_box_icon_array;
	
	/**
	 * Get widget name.
	 *	
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ai-icon-box';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Icon Box', 'ai-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('icon-box');
	}


	/**
	 * Get widget categories.
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
		return [ 'ai-front-end' ];
	}
	
	public function get_style_depends() {
		return [ 'themify-icons', 'bootstrap-icons' ];
	}
		
	public function get_help_url() {
        return 'https://aiaddons.ai/icon-box-demo/';
    }
	
	/**
	 * Get button sizes.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 *
	 * @return array An array containing button sizes.
	 */
	public static function get_button_sizes() {
		return [
			'xs' => __( 'Extra Small', 'ai-addons' ),
			'sm' => __( 'Small', 'ai-addons' ),
			'md' => __( 'Medium', 'ai-addons' ),
			'lg' => __( 'Large', 'ai-addons' ),
			'xl' => __( 'Extra Large', 'ai-addons' ),
		];
	}

	/**
	 * Register Icon Box widget controls.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
		//Layouts Section
		$this->start_controls_section(
			'icon_layouts_section',
			[
				'label'			=> esc_html__( 'Layouts', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'icon_layout',
			[
				'label'			=> esc_html__( 'Layout', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'default',
				'options'		=> [
					'default'		=> esc_html__( 'Default', 'ai-addons' ),
					'classic'		=> esc_html__( 'Classic (Pro)', 'ai-addons' ),
					'modern'		=> esc_html__( 'Modern (Pro)', 'ai-addons' ),
					'classic-pro'	=> esc_html__( 'Minimalist (Pro)', 'ai-addons' ),
				],
				'prefix_class' => 'ai-iconbox-style-'	
			]
		);
		$this->add_control(
			'layout_pro_alert',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => esc_html__( 'Only available in pro version!', 'ai-addons'),
				'content_classes' => 'ai-elementor-warning',
				'condition' => [
					'icon_layout!' => $this->get_free_options('icon_layout'),
				]
			]
		);			
		$this->add_control(
			'section_icon_enabled',
			[
				'label' => esc_html__( 'Icon Enabled?', 'ai-addons' ),
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
			'section_btn_enabled',
			[
				'label' => esc_html__( 'Button Enabled?', 'ai-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'no',
				'classes' => 'ai-hidden-trigger-control'
			]
		);
		$this->add_control(
			'section_content_enabled',
			[
				'label' => esc_html__( 'Content Enabled?', 'ai-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'yes',
				'classes' => 'ai-hidden-trigger-control'
			]
		);
		$this->add_control(
			'icon_box_items',
			[
				'label'				=> 'Icon Box Elements',
				'type'				=> 'drag-n-drop',
				'drag_items' 			=> [ 
					'visible' => array( 
						'icon'	=> esc_html__( 'Icon', 'ai-addons' ),
						'title'	=> esc_html__( 'Title', 'ai-addons' ),
						'content'	=> esc_html__( 'Content', 'ai-addons' )
					),
					'disabled' => array(
						'btn'	=> esc_html__( 'Button', 'ai-addons' )
					)
				],
				'triggers' => array(
					'icon' => 'section_icon_enabled',
					'title' => 'section_title_enabled',
					'content' => 'section_content_enabled',
					'btn' => 'section_btn_enabled'
				),
			]
		);
		$this->end_controls_section();
		
		//Title Section
		$this->start_controls_section(
			'title_section',
			[
				'label'			=> esc_html__( 'Title', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
				'condition' 	=> [
					'section_title_enabled' => 'yes'
				],
			]
		);
		$this->add_control(
			'title',
			[
				'type'			=> Controls_Manager::TEXT,
				'label' 		=> esc_html__( 'Title', 'ai-addons' ),
				'default' 		=>  esc_html__( 'Icon Title', 'ai-addons' )
			]
		);		
		$this->add_control(
			'title_head',
			[
				'label'			=> esc_html__( 'Heading Tag', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'h3',
				'options'		=> [
					'h1'		=> esc_html__( 'h1', 'ai-addons' ),
					'h2'		=> esc_html__( 'h2', 'ai-addons' ),
					'h3'		=> esc_html__( 'h3', 'ai-addons' ),
					'h4'		=> esc_html__( 'h4', 'ai-addons' ),
					'h5'		=> esc_html__( 'h5', 'ai-addons' ),
					'h6'		=> esc_html__( 'h6', 'ai-addons' ),
					'p'			=> esc_html__( 'p', 'ai-addons' ),
					'span'		=> esc_html__( 'span', 'ai-addons' ),
					'div'		=> esc_html__( 'div', 'ai-addons' ),
					'i'			=> esc_html__( 'i', 'ai-addons' )
				]
			]
		);
		
		$this->add_control(
			'title_text_trans',
			[
				'label'			=> esc_html__( 'Transform', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'none',
				'options'		=> [
					'none'			=> esc_html__( 'Default', 'ai-addons' ),
					'capitalize'	=> esc_html__( 'Capitalized', 'ai-addons' ),
					'uppercase'		=> esc_html__( 'Upper Case', 'ai-addons' ),
					'lowercase'		=> esc_html__( 'Lower Case', 'ai-addons' )
				],
				'selectors' => [
					'{{WRAPPER}} .icon-box-wrapper .icon-box-title' => 'text-transform: {{VALUE}};'
				],
			]
		);
		$this->end_controls_section();
		
		//Icon Section
		$this->start_controls_section(
			'section_icon',
			[
				'label' => esc_html__( 'Icon', 'ai-addons' ),
				'condition' 	=> [
					'section_icon_enabled' 		=> 'yes'
				],
			]
		);
		
		$this->add_control(
			'selected_icon',
			[
				'label' => esc_html__( 'Icon', 'ai-addons' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'ti-heart',
					'library' => 'themify',
				],
			]
		);

		$this->add_control(
			'view',
			[
				'label' => esc_html__( 'View', 'ai-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'default' => esc_html__( 'Default', 'ai-addons' ),
					'stacked' => esc_html__( 'Stacked', 'ai-addons' ),
					'framed' => esc_html__( 'Framed', 'ai-addons' ),
				],
				'default' => 'default',
				'prefix_class' => 'ai-view-',
			]
		);

		$this->add_control(
			'shape',
			[
				'label' => esc_html__( 'Shape', 'ai-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'circle' => esc_html__( 'Circle', 'ai-addons' ),
					'square' => esc_html__( 'Square', 'ai-addons' ),
				],
				'default' => 'circle',
				'condition' => [
					'view!' => 'default',
				],
				'prefix_class' => 'ai-shape-',
			]
		);
		
		$this->add_control(
			'icon_position_trigger',
			[
				'label' => esc_html__( 'Icon Position Trigger', 'ai-addons' ),
				'type' => 'ai-trigger',
				'default' => '',
				'classes' => 'ai-hidden-trigger-control'
			]
		);
		
		$this->add_responsive_control(
			'icon_position',
			[
				'label' => esc_html__( 'Icon Position', 'ai-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'mobile_default' => 'top',
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'ai-addons' ),
						'icon' => 'eicon-h-align-left',
					],
					'top' => [
						'title' => esc_html__( 'Top', 'ai-addons' ),
						'icon' => 'eicon-v-align-top',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'ai-addons' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'prefix_class' => 'ai-icon-box%s-position-',
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'selected_icon[value]',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);
		
		$this->end_controls_section();
		
		// Button
		$this->start_controls_section(
			'button_section',
			[
				'label'			=> esc_html__( 'Button', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
				'condition' 	=> [
					'section_btn_enabled' => 'yes'
				],
			]
		);
		$this->add_control(
			'button_type',
			[
				'label' => esc_html__( 'Type', 'ai-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => esc_html__( 'Default', 'ai-addons' ),
					'info' => esc_html__( 'Info', 'ai-addons' ),
					'success' => esc_html__( 'Success', 'ai-addons' ),
					'warning' => esc_html__( 'Warning', 'ai-addons' ),
					'danger' => esc_html__( 'Danger', 'ai-addons' ),
				],
				'prefix_class' => 'elementor-button-',
			]
		);
		$this->add_control(
			'button_text',
			[
				'label' => esc_html__( 'Text', 'ai-addons' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_html__( 'Click here', 'ai-addons' ),
				'placeholder' => esc_html__( 'Click here', 'ai-addons' ),
			]
		);
		$this->add_control(
			'button_link',
			[
				'label' => esc_html__( 'Link', 'ai-addons' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'https://your-link.com', 'ai-addons' ),
				'default' => [
					'url' => '#',
				],
			]
		);
		$this->add_responsive_control(
			'button_align',
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
				'prefix_class' => 'ai-btn%s-align-',
				'default' => '',
			]
		);
		$this->add_control(
			'button_size',
			[
				'label' => esc_html__( 'Size', 'ai-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'sm',
				'options' => [
					'xs' => __( 'Extra Small', 'ai-addons' ),
					'sm' => __( 'Small', 'ai-addons' ),
					'md' => __( 'Medium', 'ai-addons' ),
					'lg' => __( 'Large', 'ai-addons' ),
					'xl' => __( 'Extra Large', 'ai-addons' ),
				],
				'style_transfer' => true,
			]
		);
		$this->add_control(
			'button_icon',
			[
				'label' => esc_html__( 'Icon', 'ai-addons' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
			]
		);
		$this->add_control(
			'button_icon_align',
			[
				'label' => esc_html__( 'Icon Position', 'ai-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => esc_html__( 'Before', 'ai-addons' ),
					'right' => esc_html__( 'After', 'ai-addons' ),
				],
				'condition' => [
					'button_icon[value]!' => '',
				],
			]
		);
		$this->add_responsive_control(
			'button_icon_indent',
			[
				'label' => esc_html__( 'Icon Spacing', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ai-button .ai-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ai-button .ai-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_view',
			[
				'label' => esc_html__( 'View', 'ai-addons' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);
		$this->add_control(
			'button_css_id',
			[
				'label' => esc_html__( 'Button ID', 'ai-addons' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => '',
				'title' => esc_html__( 'Add your custom id WITHOUT the Pound key. e.g: my-id', 'ai-addons' ),
				'separator' => 'before',

			]
		);
		$this->end_controls_section();	
		
		// Content
		$this->start_controls_section(
			'content_section',
			[
				'label'			=> esc_html__( 'Content', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
				'condition' 	=> [
					'section_content_enabled' => 'yes'
				],
			]
		);
		
		// Openai part
		$this->add_control(
			'aiea_content_opt',
			[
				'label' 		=> esc_html__( 'OpenAI Content?', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
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
		
		$this->add_control(
			'content',
			[
				'type'			=> Controls_Manager::WYSIWYG,
				'label'			=> esc_html__( 'Content', 'ai-addons' ),
				'default' 		=> aiea_addon_base()->make_default_content('icon-box'),
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
		
		// Style Section
		$this->start_controls_section(
			'section_style_icon_box',
			[
				'label' => __( 'Icon Box', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,				
			]
		);
		
		$this->start_controls_tabs( 'icon_box_content_styles' );
		$this->start_controls_tab(
			'icon_box_content_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'bg_color',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .icon-box-wrapper',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_box_border',
				'selector' => '{{WRAPPER}} .icon-box-wrapper',
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'icon_box_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .icon-box-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'icon_box_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .icon-box-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'icon_box_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .icon-box-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'box_shadow',
			[
				'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
				'type' 			=> Controls_Manager::BOX_SHADOW,
				'condition' => [
					'shadow_opt' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .icon-box-wrapper' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{icon_box_shadow_pos.VALUE}};',
				]
			]
		);
		$this->add_control(
			'box_shadow_pos',
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
			'icon_box_content_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_control(
			'bg_hcolor',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .icon-box-wrapper:hover' => 'background-color: {{VALUE}};'
				],
			]
		);
		$this->add_control(
			'font_hcolor',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .icon-box-wrapper:hover' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_box_hover_border',
				'selector' => '{{WRAPPER}} .icon-box-wrapper:hover',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'shadow_hopt',
			[
				'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'icon_box_hbox_shadow',
			[
				'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
				'type' 			=> Controls_Manager::BOX_SHADOW,
				'condition' => [
					'shadow_hopt' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .icon-box-wrapper:hover' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{icon_box_hbox_shadow_pos.VALUE}};',
				]
			]
		);
		$this->add_control(
			'icon_box_hbox_shadow_pos',
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
		
		$this->add_responsive_control(
			'text_align',
			[
				'label' => __( 'Alignment', 'ai-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => '',
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
					'{{WRAPPER}} .icon-box-wrapper .icon-box-inner, {{WRAPPER}} .icon-box-wrapper .ai-icon-box-contents' => 'text-align: {{VALUE}};',
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
					'section_title_enabled' => 'yes'
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
				'label'			=> esc_html__( 'Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .icon-box-wrapper .icon-box-title, {{WRAPPER}} .icon-box-wrapper .icon-box-title > a' => 'color: {{VALUE}};'
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
				'label'			=> esc_html__( 'Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .icon-box-wrapper:hover .icon-box-title, {{WRAPPER}} .icon-box-wrapper:hover .icon-box-title > a' => 'color: {{VALUE}};'
				],
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
					'{{WRAPPER}} .icon-box-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'icon_box_title_typography',
				'selector' 		=> '{{WRAPPER}} .icon-box-wrapper .icon-box-title'
			]
		);	
		$this->end_controls_section();
		
		// Style Icon Section
		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => esc_html__( 'Icon', 'ai-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'section_icon_enabled' => 'yes'
				],
			]
		);
		
		$this->add_responsive_control(
			'icon_vertical_align',
			[
				'label' => __( 'Vertical Align', 'ai-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => '',
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Top', 'ai-addons' ),
						'icon' => 'eicon-v-align-top',
					],
					'center' => [
						'title' => esc_html__( 'Middle', 'ai-addons' ),
						'icon' => 'eicon-v-align-middle',
					],					
					'flex-end' => [
						'title' => esc_html__( 'Bottom', 'ai-addons' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .icon-box-wrapper .icon-box-inner' => 'align-items: {{VALUE}};',
				],
				'condition' 	=> [
					'icon_position!' => [ 'center', '' ]
				],
			]
		);

		$this->start_controls_tabs( 'icon_colors' );

		$this->start_controls_tab(
			'icon_colors_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);

		$this->add_control(
			'icon_primary_color',
			[
				'label' => esc_html__( 'Icon Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ai-icon' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ai-icon svg' => 'fill: {{VALUE}};'
				],
				'default' => '',
			]
		);

		$this->add_control(
			'icon_secondary_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'view!' => 'default',
				],
				'selectors' => [
					'{{WRAPPER}}.ai-view-framed .ai-icon' => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.ai-view-stacked .ai-icon' => 'background-color: {{VALUE}};'
				],
			]
		);
		$this->add_control(
			'icon_border_color',
			[
				'label' => esc_html__( 'Border Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'view' => 'framed',
				],
				'selectors' => [
					'{{WRAPPER}}.ai-view-framed .ai-icon' => 'border-color: {{VALUE}};'
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'icon_colors_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);

		$this->add_control(
			'hover_icon_primary_color',
			[
				'label' => esc_html__( 'Icon Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}:hover .ai-icon' => 'color: {{VALUE}};',
					'{{WRAPPER}}:hover .ai-icon svg' => 'fill: {{VALUE}};'
				],
			]
		);

		$this->add_control(
			'hover_icon_secondary_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'view!' => 'default',
				],
				'selectors' => [
					'{{WRAPPER}}.ai-view-framed:hover .ai-icon' => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.ai-view-stacked:hover .ai-icon' => 'background-color: {{VALUE}};'
				],
			]
		);
		
		$this->add_control(
			'hover_icon_border_color',
			[
				'label' => esc_html__( 'Border Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'view' => 'framed',
				],
				'selectors' => [
					'{{WRAPPER}}.ai-view-framed:hover .ai-icon' => 'border-color: {{VALUE}};'
				],
			]
		);

		$this->add_control(
			'hover_icon_animation',
			[
				'label' => esc_html__( 'Hover Animation', 'ai-addons' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'size',
			[
				'label' => esc_html__( 'Size', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ai-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'icon_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}}.ai-view-stacked .ai-icon' => 'padding: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.ai-view-framed .ai-icon' => 'padding: {{SIZE}}{{UNIT}};'
				],
				'defailt' => [
					'unit' => 'px',
					'size' => 30,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'condition' => [
					'view!' => 'default',
				],
			]
		);

		$this->add_responsive_control(
			'rotate',
			[
				'label' => esc_html__( 'Rotate', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'deg' ],
				'default' => [
					'size' => 0,
					'unit' => 'deg',
				],
				'tablet_default' => [
					'unit' => 'deg',
				],
				'mobile_default' => [
					'unit' => 'deg',
				],
				'selectors' => [
					'{{WRAPPER}} .ai-icon i, {{WRAPPER}} .ai-icon svg' => 'transform: rotate({{SIZE}}{{UNIT}});',
				],
			]
		);

		$this->add_control(
			'icon_border_width',
			[
				'label' => esc_html__( 'Border Width', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .ai-icon' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'view' => 'framed',
				],
			]
		);

		$this->add_responsive_control(
			'icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'view!' => 'default',
				],
			]
		);
		$this->add_responsive_control(
			'icon_outer_margin',
			[
				'label' => esc_html__( 'Outer Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .ai-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_control(
			'icon_shadow_opt',
			[
				'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no',
				'condition' => [
					'view!' => 'default',
				],
			]
		);
		$this->add_control(
			'icon_box_shadow',
			[
				'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
				'type' 			=> Controls_Manager::BOX_SHADOW,
				'condition' => [
					'icon_shadow_opt' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .ai-icon' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{icon_box_shadow_pos.VALUE}};',
				]
			]
		);
		$this->add_control(
			'icon_box_shadow_pos',
			[
				'label' =>  esc_html__( 'Box Shadow Position', 'ai-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					' ' => esc_html__( 'Outline', 'ai-addons' ),
					'inset' => esc_html__( 'Inset', 'ai-addons' ),
				],
				'condition' => [
					'icon_shadow_opt' => 'yes',
				],
				'default' => ' ',
				'render_type' => 'ui',
			]
		);
		
		$this->end_controls_section();
				
		// Style Button Section
		$this->start_controls_section(
			'button_section_style',
			[
				'label' => esc_html__( 'Button', 'ai-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'section_btn_enabled' => 'yes'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .ai-button',
			]
		);
		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'button_text_color',
			[
				'label' => esc_html__( 'Text Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ai-button' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_background_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .ai-button' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_control(
			'button_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}:hover .ai-button, {{WRAPPER}} .ai-button:focus' => 'color: {{VALUE}};',
					'{{WRAPPER}}:hover  .ai-buttonsvg, {{WRAPPER}} .ai-button:focus svg' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_background_hover_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}:hover .ai-button, {{WRAPPER}} .ai-button:focus' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'border_border!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .ai-button:hover, {{WRAPPER}} .ai-button:focus' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_hover_animation',
			[
				'label' => esc_html__( 'Hover Animation', 'ai-addons' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .ai-button',
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'button_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .ai-button',
			]
		);
		$this->add_responsive_control(
			'button_text_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'button_typography',
				'selector' 		=> '{{WRAPPER}} .ai-button'
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
					'section_content_enabled' => 'yes'
				],
			]
		);
		$this->add_control(
			'font_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Font Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .icon-box-content, {{WRAPPER}} .icon-box-content a' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_responsive_control(
			'desc_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .icon-box-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'desc_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .icon-box-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'icon_box_content_typography',
				'selector' 		=> '{{WRAPPER}} .icon-box-content'
			]
		);	
		$this->end_controls_section();	
		
	}
	 
	protected function render() {

		$settings = $this->get_settings_for_display();
		$this->_settings = $settings;
		extract( $settings );
		
		$free_layouts = [ 'default' ];		
		$parent_class = isset( $settings['icon_layout'] ) && in_array( $settings['icon_layout'], $free_layouts ) ? 'icon-box-'. $settings['icon_layout'] : 'icon-box-default';
		$this->add_render_attribute( 'ai-widget-wrapper', 'class', 'ai-icon-box-elementor-widget icon-box-wrapper' );
		$this->add_render_attribute( 'ai-widget-wrapper', 'class', esc_attr( $parent_class ) );
		?>
		<div <?php echo ''. $this->get_render_attribute_string( 'ai-widget-wrapper' ); ?>>
		<?php

		//Title section
		$title = isset( $title ) && $title != '' ? $title : '';
		$title_head = isset( $title_head ) && $title_head != '' ? $title_head : 'h3';
		
		
		$this->title_array = array(
			'title' => $title,
			'title_url_opt' => false,
			'title_url' => '',
			'title_head' => $title_head,
			'title_redirect' => ''
		);
		
		//Icon Section
		$this->add_render_attribute( 'icon-parent-wrapper', 'class', 'ai-icon-wrapper' );
		$this->add_render_attribute( 'icon-wrapper', 'class', 'ai-icon' );
		
		if ( ! empty( $settings['hover_icon_animation'] ) ) {
			$this->add_render_attribute( 'icon-wrapper', 'class', 'elementor-animation-' . $settings['hover_icon_animation'] );
		}
		if ( empty( $settings['icon'] ) && ! Icons_Manager::is_migration_allowed() ) {
			$settings['icon'] = 'ti-heart';
		}
		if ( ! empty( $settings['icon'] ) ) {
			$this->add_render_attribute( 'icon', 'class', $settings['icon'] );
			$this->add_render_attribute( 'icon', 'aria-hidden', 'true' );
		}		
		$migrated = isset( $settings['__fa4_migrated']['selected_icon'] );
		$is_new = empty( $settings['icon'] ) && Icons_Manager::is_migration_allowed();

		$this->icon_box_icon_array = array(
			'icon' => $settings['selected_icon'],
			'is_new' => $is_new,
			'migrated'	=> $migrated
		);
				
		//Layout Section
		$default_items = array( 
			"icon"	=> esc_html__( "Icon", 'ai-addons' ),
			"title"	=> esc_html__( "Title", 'ai-addons' ),
			"content"	=> esc_html__( "Content", 'ai-addons' )
		);
		$elemetns = isset( $icon_box_items ) && !empty( $icon_box_items ) ? json_decode( $icon_box_items, true ) : array( 'visible' => $default_items );
		
		//Content Section
		$this->icon_box_content = isset( $content ) && $content != '' ? $content : ''; 
		
		echo '<div class="icon-box-inner">';		
			if( isset( $elemetns['visible'] ) && !empty( $elemetns['visible'] ) ) :
				
				$visible_elements = $elemetns['visible']; 
				
				$icon_position_enabled = isset( $icon_position_trigger ) ? $icon_position_trigger : '';
				$icon_position_stat = $icon_position_enabled && isset( $visible_elements['icon'] ) ? true : false;
				
				if( $icon_position_stat ) {
					unset( $visible_elements['icon'] );
					echo '<div class="ai-icon-box-icon">';
						$this->aiea_icon_box_shortcode_elements( 'icon' );
					echo '</div>';					
					echo '<div class="ai-icon-box-contents">';
				}
				foreach( $visible_elements as $element => $value ){
					$this->aiea_icon_box_shortcode_elements( $element );
				}
				if( $icon_position_stat ) {
					echo '</div>';				
				}
			endif;
		echo '</div>';
		
		echo '</div> <!-- .ai-widget-wrapper -->';

	}
	
	function aiea_icon_box_shortcode_elements( $element ){
		
		$settings = $this->_settings;
		
		switch( $element ){
		
			case "title":
				$title_array = $this->title_array;
				if( $title_array['title'] ){
					if( $title_array['title_url_opt'] && $title_array['title_url'] != '' )
						echo '<'. esc_attr( $title_array['title_head'] ) .' class="icon-box-title"><a href="'. esc_url( $title_array['title_url'] ) .'" title="'. esc_attr( $title_array['title'] ) .'" target="'. esc_attr( $title_array['title_redirect'] ) .'">'. esc_html( $title_array['title'] ) .'</a></'. esc_attr( $title_array['title_head'] ) .'>';
					else
						echo '<'. esc_attr( $title_array['title_head'] ) .' class="icon-box-title">'. esc_html( $title_array['title'] ) .'</'. esc_attr( $title_array['title_head'] ) .'>';
				}
			break;
			
			case "icon":
				if( $this->icon_box_icon_array['icon'] ){
					echo '<div '. $this->get_render_attribute_string( 'icon-parent-wrapper' ) .'>';
						echo '<div '. $this->get_render_attribute_string( 'icon-wrapper' ) .'>';
						if ( $this->icon_box_icon_array['is_new'] || $this->icon_box_icon_array['migrated'] ) :
							Icons_Manager::render_icon( $this->icon_box_icon_array['icon'], [ 'aria-hidden' => 'true' ] );
						else : ?>
							<i <?php echo ''. $this->get_render_attribute_string( 'icon' ); ?>></i>
						<?php endif; 
						echo '</div>';
					echo '</div>';
				}
			break;
						
			case "content":
				if( $this->icon_box_content ) echo '<div class="icon-box-content">'. $this->icon_box_content .'</div>';
			break;
			
			case "btn":
				$this->add_render_attribute( 'button-wrapper', 'class', 'ai-button-wrapper' );
				if ( ! empty( $settings['button_link']['url'] ) ) {
					$this->add_link_attributes( 'button', $settings['button_link'] );
					$this->add_render_attribute( 'button', 'class', 'ai-button-link' );
				}
				$this->add_render_attribute( 'button', 'class', 'elementor-button ai-button' );
				if ( ! empty( $settings['button_css_id'] ) ) {
					$this->add_render_attribute( 'button', 'id', $settings['button_css_id'] );
				}
				if ( ! empty( $settings['button_size'] ) ) {
					$this->add_render_attribute( 'button', 'class', 'elementor-size-' . $settings['button_size'] );
				}
				if ( $settings['button_hover_animation'] ) {
					$this->add_render_attribute( 'button', 'class', 'elementor-animation-' . $settings['button_hover_animation'] );
				}
				?>
				<div <?php echo ''. $this->get_render_attribute_string( 'button-wrapper' ); ?>>
					<a <?php echo ''. $this->get_render_attribute_string( 'button' ); ?>>
						<?php $this->button_render_text(); ?>
					</a>
				</div>
				<?php
			break;		
		
		}
	}
	
	/**
	 * Render button text.
	 *
	 * @since 1.5.0
	 * @access protected
	 */
	protected function button_render_text() {
		$settings = $this->get_settings_for_display();

		$migrated = isset( $settings['__fa4_migrated']['selected_icon'] );
		$is_new = empty( $settings['icon'] ) && Icons_Manager::is_migration_allowed();

		if ( ! $is_new && empty( $settings['icon_align'] ) ) {
			// @todo: remove when deprecated
			// added as bc in 2.6
			//old default
			$settings['icon_align'] = $this->get_settings( 'icon_align' );
		}

		$this->add_render_attribute( [
			'content-wrapper' => [
				'class' => 'ai-button-content-wrapper',
			],
			'icon-align' => [
				'class' => [
					'ai-button-icon',
					'ai-align-icon-' . $settings['button_icon_align'],
				],
			],
			'text' => [
				'class' => 'ai-button-text',
			],
		] );

		$this->add_inline_editing_attributes( 'text', 'none' );
		?>
		<span <?php echo ''. $this->get_render_attribute_string( 'content-wrapper' ); ?>>
			<?php if ( ! empty( $settings['button_icon'] ) || ! empty( $settings['button_icon']['value'] ) ) : ?>
			<span <?php echo ''. $this->get_render_attribute_string( 'icon-align' ); ?>>
				<?php if ( $is_new || $migrated ) :
					Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] );
				else : ?>
					<i class="<?php echo esc_attr( $settings['button_icon'] ); ?>" aria-hidden="true"></i>
				<?php endif; ?>
			</span>
			<?php endif; ?>
			<span <?php echo ''. $this->get_render_attribute_string( 'text' ); ?>><?php echo esc_html( $settings['button_text'] ); ?></span>
		</span>
		<?php
	}
	
	public function get_free_options( $key ) {
		$free_options = [
			'icon_layout' => [ 'default' ]
		];
		return $free_options[$key];
	}
	
}