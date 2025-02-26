<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class AIEA_Elementor_Search_Widget extends Widget_Base {
	
	public $extra_settings = [];
		
	/**
	 * Get widget name.
	 *
	 * Retrieve search widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return "ai-search";
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve search widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( "Search", "ai-addons" );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve search widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return "ai-default-icon ". aiea_addon_base()->widget_icon_classes('search');
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the search widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ "ai-hf-elements" ];
	}
	
	/**
	 * Retrieve the list of scripts the chart widget depended on.
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
	
	public function get_help_url() {
        return 'https://aiaddons.ai/';
    }

	/**
	 * Register search widget controls. 
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
		//General Section
		$this->start_controls_section(
			'search_section',
			[
				'label'	=> esc_html__( 'Search', 'ai-addons' ),
				'tab'	=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'search_layout',
			[
				'label' => esc_html__( 'Search Layout', 'ai-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'overlay',
				'options' => [
					'default'	=> esc_html__( 'Default By Theme', 'ai-addons' ),
					'overlay'	=> esc_html__( 'Overlay Search Form', 'ai-addons' ),
					'inline'	=> esc_html__( 'Inline Search Form', 'ai-addons' )
				]
			]
		);
		$this->add_control(
			'search_align',
			[
				'label'        => esc_html__( 'Alignment', 'ai-addons' ),
				'type'         => Controls_Manager::CHOOSE,
				'options'      => [
					'left'    => [
						'title' => esc_html__( 'Left', 'ai-addons' ),
						'icon'  => 'eicon-h-align-left',
					],
					'center'  => [
						'title' => esc_html__( 'Center', 'ai-addons' ),
						'icon'  => 'eicon-h-align-center',
					],
					'right'   => [
						'title' => esc_html__( 'Right', 'ai-addons' ),
						'icon'  => 'eicon-h-align-right',
					],
				],
				'default'      => 'left',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};'
				],
				'condition' 	=> [
					'search_layout!'	=> 'default'
				],
			]
		);
		$this->add_control(
			'search_placeholder',
			[
				'label' 		=> esc_html__( 'Placeholder Text', 'ai-addons' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> esc_html__( 'Search...', 'ai-addons' ),
				'condition' 	=> [
					'search_layout!'	=> 'default'
				],
			]
		);
		$this->add_responsive_control(
			'search_form_width',
			[
				'label' => esc_html__( 'Search Form Width', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'default' => [
					'unit' => 'px',
					'size' => 300,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ai-inline-search-wrap' => 'width: {{SIZE}}{{UNIT}}; max-width: 100%;',
					'{{WRAPPER}} .ai-overlay-search-inner' => 'width: {{SIZE}}{{UNIT}}; max-width: 100%;'
				],
				'condition' 	=> [
					'search_layout!'	=> 'default'
				],
			]
		);
		$this->add_responsive_control(
			'search_form_height',
			[
				'label' => esc_html__( 'Search Form Height', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .inc-input-group > *' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .inc-input-group > *' => 'height: {{SIZE}}{{UNIT}};'
				],
				'condition' 	=> [
					'search_layout!'	=> 'default'
				],
			]
		);
		
		$this->add_control(
			'icon_settings',
			[
				'label' => __( 'Icon Settings', 'ai-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' 	=> [
					'search_layout'	=> 'overlay'
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
				'condition' 	=> [
					'search_layout'	=> 'overlay'
				],
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
				'prefix_class' => 'ai-shape-',
				'condition' 	=> [
					'search_layout'	=> 'overlay'
				],
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
		
		// Style Icon Section
		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => esc_html__( 'Icon', 'ai-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'search_layout'	=> 'overlay'
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
			'primary_color',
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
			'secondary_color',
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
			'border_color',
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
			'hover_primary_color',
			[
				'label' => esc_html__( 'Primary Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ai-icon:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ai-icon:hover svg' => 'fill: {{VALUE}};'
				],
			]
		);

		$this->add_control(
			'hover_secondary_color',
			[
				'label' => esc_html__( 'Secondary Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'view!' => 'default',
				],
				'selectors' => [
					'{{WRAPPER}}.ai-view-framed .ai-icon:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.ai-view-stacked .ai-icon:hover' => 'background-color: {{VALUE}};'
				],
			]
		);
		
		$this->add_control(
			'hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'view' => 'framed',
				],
				'selectors' => [
					'{{WRAPPER}}.ai-view-framed .ai-icon:hover' => 'border-color: {{VALUE}};'
				],
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
				'default' => [
					'unit' => 'px',
					'size' => 20,
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
			'border_width',
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
			'border_radius',
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
		$this->end_controls_section();
		
		// Style Button Section
		$this->start_controls_section(
			'button_section_style',
			[
				'label' => esc_html__( 'Button', 'ai-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'search_layout!'	=> 'default'
				],
			]
		);
		$this->add_responsive_control(
			'search_btn_width',
			[
				'label' => esc_html__( 'Search Form Width', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .inc-input-group .search-submit' => 'width: {{SIZE}}{{UNIT}};'
				],
				'condition' 	=> [
					'search_layout!'	=> 'default'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .search-submit',
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
					'{{WRAPPER}} .search-submit' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_background_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .search-submit' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .search-submit:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_background_hover_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .search-submit:hover' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .search-submit:hover' => 'border-color: {{VALUE}};',
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
				'name' => 'button_border',
				'selector' => '{{WRAPPER}} .search-submit',
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
					'{{WRAPPER}} .search-submit' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .search-submit',
			]
		);
		$this->add_responsive_control(
			'button_text_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .search-submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'button_typography',
				'selector' 		=> '{{WRAPPER}} .search-submit'
			]
		);
		$this->end_controls_section();	
		
		// Style Text Box Section
		$this->start_controls_section(
			'textbox_section_style',
			[
				'label' => esc_html__( 'Text Box', 'ai-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'search_layout!'	=> 'default'
				],
			]
		);
		$this->add_control(
			'text_placehodler_color',
			[
				'label' => esc_html__( 'Placeholder Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .search-field::placeholder' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .search-field' => 'color: {{VALUE}};'
				]
			]
		);		
		$this->add_responsive_control(
			'text_box_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .search-field' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'text_box_border',
				'selector' => '{{WRAPPER}} .search-field',
			]
		);
		$this->add_control(
			'text_border_radius',
			[
				'label' => esc_html__( 'Text Box Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .search-field' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'text_box__typography',
				'selector' 		=> '{{WRAPPER}} .search-field'
			]
		);	
		$this->end_controls_section();

	}

	/**
	 * Render search widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		extract( $settings );
		
		$search_layout = $search_layout ? $search_layout : 'default';
		$this->extra_settings['placeholder'] = $search_placeholder ? $search_placeholder : '';
		
		switch( $search_layout ){
		
			case 'overlay':
				echo '<a class="ai-overlay-search-toggle ai-icon" href="#"><i class="ti-search"></i></a>';
				add_action( 'aiea_addons/footer', [ $this, 'overlay_search_wrap' ] );
				do_action( 'aiea_addons/footer' );
			break;
			
			case 'inline':
				echo '<div class="ai-inline-search-wrap">';
				$this->inline_search_form();
				echo '</div>';
			break;
						
			default:
				ob_start();
				get_search_form();
				echo ob_get_clean();
			break; 
			
		}
		
	}
	
	public function overlay_search_wrap() {
	?>
		<div class="ai-overlay-search-warp">
			<a href="#" class="ai-search-close"><i class="ti-close"></i></a>
			<div class="ai-overlay-search-inner">
				<?php $this->inline_search_form(); ?>
			</div>
		</div>
	<?php
	}
	
	public function inline_search_form() {
		$placeholder = isset( $this->extra_settings['placeholder'] ) ? $this->extra_settings['placeholder'] : '';
	?>
		<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url('/') ); ?>">
			<div class="inc-input-group">
				<input type="text" class="inc-form-control search-field" name="s" placeholder="<?php echo esc_attr( $placeholder ); ?>">
				<button type="submit" class="inc-input-group-text search-submit"><i class="ti-search"></i></button>
			</div>
		</form>
	<?php
	}
	
}