<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * AI Addons Icon list
 *
 * @since 1.0.0
 */
 
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
 
class AIEA_Elementor_Icon_List_Widget extends Widget_Base {
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Icon list widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ai-icon-list';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Icon list widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Icon List', 'ai-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Icon list widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('icon-list');
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Icon list widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'ai-elements' ];
	}
	
	public function get_style_depends() {
		return [ 'themify-icons', 'bootstrap-icons' ];
	}
		
	public function get_help_url() {
        return 'https://aiaddons.ai/icon-list-demo/';
    }

	/**
	 * Register Icon list widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
		//Icon List Section
		$this->start_controls_section(
			'icon_list_section',
			[
				'label'			=> esc_html__( 'Icon List', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
				'description'	=> esc_html__( 'Icon list options available here.', 'ai-addons' ),
			]
		);
		
		$this->add_control(
			'icon_list_view',
			[
				'label'			=> esc_html__( 'Layout', 'ai-addons' ),
				'type'			=> Controls_Manager::CHOOSE,
				'default'		=> 'list',
				'options' 		=> [
					'list' 	=> [
						'title' 	=> esc_html__( 'Default', 'ai-addons' ),
						'icon' 		=> 'eicon-editor-list-ul',
					],
					'inline' 	=> [
						'title' => esc_html__( 'Inline', 'ai-addons' ),
						'icon' 	=> 'eicon-ellipsis-h',
					],
				]
			]
		);		
		
		$repeater = new Repeater();	
		
		$repeater->add_control(
			'list_text',
			[
				'label'			=> esc_html__( 'Text', 'ai-addons' ),
				'type'			=> Controls_Manager::TEXT,
				'label_block'	=> true,
				'default'		=> esc_html__( 'List Item', 'ai-addons' ),
				'dynamic'		=> [
					'active'	=> true,
				],
			]
		);
		
		$repeater->add_control(
			'list_icon',
			[
				'label'			=> esc_html__( 'Icon', 'ai-addons' ),
				'type'			=> Controls_Manager::ICONS,
				'default'		=> [
					'value'		=> 'ti-heart',
					'library'	=> 'themify',
				],
				'fa4compatibility' => 'icon',
			]
		);
		
		$repeater->add_control(
			'icon_list_link',
			[
				'label' 		=> esc_html__( 'Link', 'ai-addons' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'ai-addons' ),
			]
		);
		
		$this->add_control(
			'icon_list',
			[
				'type'			=> Controls_Manager::REPEATER,
				'label'			=> esc_html__( 'Icon List', 'ai-addons' ),
				'fields'		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'list_text'	=> esc_html__( 'List Item 1', 'ai-addons' ),
						'list_icon' => [
							'value' => 'ti-heart',
							'library' => 'themify',
						],
					],
					[
						'list_text'	=> esc_html__( 'List Item 2', 'ai-addons' ),
						'list_icon' => [
							'value' => 'ti-target',
							'library' => 'themify',
						],
					],
				],
				'title_field'	=> '{{{ list_text }}}'
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
			'section_icon_list',
			[
				'label' 		=> esc_html__( 'List', 'ai-addons' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
			'list_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-icon-list-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);		
		
		$this->add_responsive_control(
			'icon_list_align',
			[
				'label' 		=> esc_html__( 'Alignment', 'ai-addons' ),
				'type'			=> Controls_Manager::CHOOSE,
				'options' 		=> [
					'left' 		=> [
						'title' => esc_html__( 'Left', 'ai-addons' ),
						'icon' 	=> 'eicon-h-align-left',
					],
					'center' 	=> [
						'title' => esc_html__( 'Center', 'ai-addons' ),
						'icon' 	=> 'eicon-h-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'ai-addons' ),
						'icon' 	=> 'eicon-h-align-right',
					],
				],
				'prefix_class' 	=> 'elementor%s-align-',
			]
		);		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_box_border',
				'selector' => '{{WRAPPER}} .ai-icon-list',
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
					'{{WRAPPER}} .ai-icon-list' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .ai-icon-list li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .ai-icon-list' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{icon_box_shadow_pos.VALUE}};',
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
		$this->add_control(
			'divider',
			[
				'label' 	=> esc_html__( 'Divider', 'ai-addons' ),
				'type' 		=> Controls_Manager::SWITCHER,
				'label_off' => esc_html__( 'Off', 'ai-addons' ),
				'label_on' 	=> esc_html__( 'On', 'ai-addons' ),
				'selectors' => [
					'{{WRAPPER}} .ai-icon-list-item:not(:last-child):after' => 'content: ""',
				],
			]
		);
		
		$this->add_control(
			'divider_style',
			[
				'label' 	=> esc_html__( 'Style', 'ai-addons' ),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> [
					'solid' => esc_html__( 'Solid', 'ai-addons' ),
					'double' => esc_html__( 'Double', 'ai-addons' ),
					'dotted' => esc_html__( 'Dotted', 'ai-addons' ),
					'dashed' => esc_html__( 'Dashed', 'ai-addons' ),
				],
				'default' 		=> 'solid',
				'condition' 	=> [
					'divider' 	=> 'yes',
				],
				'selectors' 	=> [
					'{{WRAPPER}} .ai-icon-list:not(.icon-list-inline) .ai-icon-list-item:not(:last-child):after' => 'border-top-style: {{VALUE}}',
					'{{WRAPPER}} .ai-icon-list.icon-list-inline .ai-icon-list-item:not(:last-child):after' => 'border-right-style: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'divider_weight',
			[
				'label' 		=> esc_html__( 'Weight', 'ai-addons' ),
				'type' 			=> Controls_Manager::SLIDER,
				'default' 		=> [
					'size' 		=> 1,
				],
				'range' 		=> [
					'px' 		=> [
						'min' 	=> 1,
						'max' 	=> 20,
					],
				],
				'condition' 	=> [
					'divider' 	=> 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .ai-icon-list:not(.icon-list-inline) .ai-icon-list-item:not(:last-child):after' => 'border-top-width: {{SIZE}}{{UNIT}}; bottom: calc(({{SIZE}}{{UNIT}}/2) * -1);',
					'{{WRAPPER}} .ai-icon-list.icon-list-inline .ai-icon-list-item:not(:last-child):after' => 'border-right-width: {{SIZE}}{{UNIT}}; right: calc(({{SIZE}}{{UNIT}}/2) * -1);',
				],
			]
		);

		$this->add_control(
			'divider_width',
			[
				'label' 		=> esc_html__( 'Width', 'ai-addons' ),
				'type' 			=> Controls_Manager::SLIDER,
				'default' 		=> [
					'unit' 		=> '%',
				],
				'condition' 	=> [
					'divider' 			=> 'yes',
					'icon_list_view!' 	=> 'inline',
				],
				'selectors' => [
					'{{WRAPPER}} .ai-icon-list-item:not(:last-child):after' => 'width: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'divider_height',
			[
				'label' 		=> esc_html__( 'Height', 'ai-addons' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ '%', 'px' ],
				'default' 	=> [
					'unit' 	=> '%',
				],
				'range' 		=> [
					'px' 		=> [
						'min' 	=> 1,
						'max' 	=> 100,
					],
					'%' => [
						'min' 	=> 1,
						'max' 	=> 100,
					],
				],
				'condition' 	=> [
					'divider' 			=> 'yes',
					'icon_list_view!' 	=> 'list',
				],
				'selectors' 	=> [
					'{{WRAPPER}} .ai-icon-list-item:not(:last-child):after' => 'height: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'divider_color',
			[
				'label' 		=> esc_html__( 'Color', 'ai-addons' ),
				'type' 			=> Controls_Manager::COLOR,
				'default' => '',
				'condition' 	=> [
					'divider' 	=> 'yes',
				],
				'selectors' 	=> [
					'{{WRAPPER}} .ai-icon-list-item:not(:last-child):after' => 'border-color: {{VALUE}}',
				]
			]
		);
		
		$this->end_controls_section();
		
		// Icon section Style
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' 		=> esc_html__( 'Icon', 'ai-addons' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'icon_position',
			[
				'label' 		=> esc_html__( 'Icon Position', 'ai-addons' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'default'		=> 'left',
				'options' 		=> [
					'left' 		=> [
						'title' => esc_html__( 'Left', 'ai-addons' ),
						'icon' 	=> 'eicon-h-align-left',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'ai-addons' ),
						'icon' 	=> 'eicon-h-align-right',
					],
				]
			]
		);
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
					'{{WRAPPER}} .ai-icon-list-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'icon_list_vertical_align',
			[
				'label' => __( 'Vertical Align', 'ai-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => '',
				'options' => [
					'top' => [
						'title' => esc_html__( 'Top', 'ai-addons' ),
						'icon' => 'eicon-v-align-top',
					],
					'middle' => [
						'title' => esc_html__( 'Middle', 'ai-addons' ),
						'icon' => 'eicon-v-align-middle',
					],					
					'bottom' => [
						'title' => esc_html__( 'Bottom', 'ai-addons' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ai-icon-list-item > *' => 'vertical-align: {{VALUE}};',
				],
				'condition' 	=> [
					'icon_position!' => [ 'middle', '' ]
				],
			]
		);
		$this->start_controls_tabs( 'icon_styles' );
		$this->start_controls_tab(
			'icon_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .ai-icon-list-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ai-icon-list-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'icon_bg_color',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ai-icon-list-icon i','{{WRAPPER}} .ai-icon-list-icon svg'
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_border',
				'selector' => '{{WRAPPER}} .ai-icon-list-icon i','{{WRAPPER}} .ai-icon-list-icon svg',
			]
		);	
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_shadow',
				'selector' => '{{WRAPPER}} .ai-icon-list-icon i','{{WRAPPER}} .ai-icon-list-icon svg',
			]
		);
		$this->add_responsive_control(
			'icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-icon-list-icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .ai-icon-list-icon svg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);		
		$this->end_controls_tab();
		$this->start_controls_tab(
			'icon_title_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_control(
			'icon_hcolor',
			[
				'label' => esc_html__( 'Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .ai-icon-list-item:hover .ai-icon-list-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ai-icon-list-item:hover .ai-icon-list-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'icon_bg_hcolor',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ai-icon-list-item:hover .ai-icon-list-icon i','{{WRAPPER}} .ai-icon-list-item:hover .ai-icon-list-icon svg'
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_hborder',
				'selector' => '{{WRAPPER}} .ai-icon-list-item:hover .ai-icon-list-icon i', '{{WRAPPER}} .ai-icon-list-item:hover .ai-icon-list-icon svg',
			]
		);	
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_hbox_shadow',
				'selector' => '{{WRAPPER}} .ai-icon-list-item:hover .ai-icon-list-icon i', '{{WRAPPER}} .ai-icon-list-item:hover .ai-icon-list-icon svg',
			]
		);
		$this->add_responsive_control(
			'icon_hborder_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-icon-list-item:hover .ai-icon-list-icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .ai-icon-list-item:hover .ai-icon-list-icon svg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);	
		$this->end_controls_tab();
		$this->end_controls_tabs();
		
		$this->add_responsive_control(
			'icon_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-icon-list-icon i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .ai-icon-list-icon svg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .ai-icon-list-icon i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .ai-icon-list-icon svg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		
		$this->end_controls_section();
		
		// Text Section Style
		$this->start_controls_section(
			'section_text_style',
			[
				'label' 		=> esc_html__( 'Text', 'ai-addons' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'text_color',
			[
				'label' 		=> esc_html__( 'Color', 'ai-addons' ),
				'type' 			=> Controls_Manager::COLOR,
				'default' 		=> '',
				'selectors' 	=> [
					'{{WRAPPER}} .ai-icon-list-item .icon-list-text' => 'color: {{VALUE}}'
				]
			]
		);
		
		$this->add_control(
			'text_color_hover',
			[
				'label' 		=> esc_html__( 'Hover Color', 'ai-addons' ),
				'type' 			=> Controls_Manager::COLOR,
				'default' 		=> '',
				'selectors' 	=> [
					'{{WRAPPER}} .ai-icon-list-item:hover .icon-list-text' => 'color: {{VALUE}};'
				]
			]
		);
		
		$this->add_control(
			'text_indent',
			[
				'label' 		=> esc_html__( 'Text Indent', 'ai-addons' ),
				'type' 			=> Controls_Manager::SLIDER,
				'range' 		=> [
					'px' 		=> [
						'min' 	=> 0,
						'max' 	=> 50,
					],
				],
				'selectors' 	=> [
					'{{WRAPPER}} .ai-icon-list-item .icon-list-text.icon-list-text-left' => 'padding-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ai-icon-list-item .icon-list-text:not(.icon-list-text-left)' => 'padding-left: {{SIZE}}{{UNIT}};'
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'icon_typography',
				'selector' 		=> '{{WRAPPER}} .ai-icon-list-item .icon-list-text',
			]
		);
		
		$this->end_controls_section();
	
	}
	
	/**
	 * Render Icon List widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		extract( $settings );
		
		$icon_pos = !empty( $settings['icon_position'] ) ? $settings['icon_position'] : 'left';
		
		$this->add_render_attribute( 'ul_attr', 'class', 'inc-nav inc-flex-column ai-icon-list' );
		if ( 'inline' === $settings['icon_list_view'] ) {
			$this->add_render_attribute( 'ul_attr', 'class', 'icon-list-inline' );
		}
		//icon_list_link
		?>
		
		<ul <?php echo ''. $this->get_render_attribute_string( 'ul_attr' ); ?>>
		<?php
			foreach( $settings['icon_list'] as $index => $item ){
				
				echo '<li class="ai-icon-list-item">';
				
				if ( ! empty( $item['icon_list_link']['url'] ) ) {
					$link_key = 'link_' . $index;
					$this->add_link_attributes( $link_key, $item['icon_list_link'] );
					echo '<a ' . $this->get_render_attribute_string( $link_key ) . '>';
				}				
				
				$icon_list_text = $item['list_text'];
				if( $icon_pos == 'right' && $icon_list_text ) echo '<span class="icon-list-text icon-list-text-left">'. $item['list_text'] .'</span>';
				
				// add old default
				$migration_allowed = Icons_Manager::is_migration_allowed();
				if ( ! isset( $item['list_icon'] ) && ! $migration_allowed ) {
					$item['icon'] = isset( $fallback_defaults[ $index ] ) ? $fallback_defaults[ $index ] : 'fa fa-check';
				}

				$migrated = isset( $item['__fa4_migrated']['list_icon'] );
				$is_new = ! isset( $item['icon'] ) && $migration_allowed;
				if ( ! empty( $item['icon'] ) || ( ! empty( $item['list_icon']['value'] ) && $is_new ) ) :
					?>
					<span class="ai-icon-list-icon">
						<?php
						if ( $is_new || $migrated ) {
							Icons_Manager::render_icon( $item['list_icon'], [ 'aria-hidden' => 'true' ] );
						} else { ?>
								<i class="<?php echo esc_attr( $item['icon'] ); ?>" aria-hidden="true"></i>
						<?php } ?>
					</span>
				<?php endif;

				 if( $icon_pos == 'left' && $icon_list_text ) echo '<span class="icon-list-text">'. $item['list_text'] .'</span>';
				 if ( ! empty( $item['icon_list_link']['url'] ) ) {
					 echo '</a>';
				 }
				 echo '</li>';
			}
		?>
		</ul>
		
		<?php
	}
		
}