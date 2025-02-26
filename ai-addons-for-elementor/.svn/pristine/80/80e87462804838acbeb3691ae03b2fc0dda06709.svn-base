<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class AIEA_Elementor_Menu_Widget extends Widget_Base {
	
	
	/**
	 * Get widget name.
	 *
	 * Retrieve menu widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return "ai-menu";
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve menu widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( "Menu", "ai-addons" );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve menu widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return "ai-default-icon ". aiea_addon_base()->widget_icon_classes('menu');
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
		return [ 'ai-front-end'  ];
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the menu widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ "ai-hf-elements" ];
	}
	
	public function get_help_url() {
        return 'https://aiaddons.ai/';
    }
		
	/**
	 * Retrieve the list of available menus.
	 *
	 * Used to get the list of available menus.
	 *
	 * @since 1.3.0
	 * @access private
	 *
	 * @return array get WordPress menus list.
	 */
	private function get_available_menus() {

		$menus = wp_get_nav_menus();

		$options = [];

		foreach ( $menus as $menu ) {
			$options[ $menu->slug ] = $menu->name;
		}

		return $options;
	}

	/**
	 * Register menu widget controls. 
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
		$menus = $this->get_available_menus();
		
		//General Section
		$this->start_controls_section(
			'menu_section',
			[
				'label'	=> esc_html__( 'Menu', 'ai-addons' ),
				'tab'	=> Controls_Manager::TAB_CONTENT,
			]
		);
		if( !empty( $menus ) ){
			$this->add_control(
				'menu',
				[
					'label' => esc_html__( 'Menu Layout', 'ai-addons' ),
					'type' => Controls_Manager::SELECT,
					'default' => array_keys($menus)[0],
					'options' => $menus
				]
			);
		}else{
			$this->add_control(
				'menu',
				[
					'type'            => Controls_Manager::RAW_HTML,
					'raw'             => sprintf( __( '<strong>There are no menus in your site.</strong><br>Go to the <a href="%s" target="_blank">Menus screen</a> to create one.', 'ai-addons' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
					'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
				]
			);
		}
		$this->end_controls_section();
		
		//Layout Section
		$this->start_controls_section(
			'layout_section',
			[
				'label'	=> esc_html__( 'Layout', 'ai-addons' ),
				'tab'	=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'layout',
			[
				'label'   => esc_html__( 'Layout', 'ai-addons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'horizontal',
				'options' => [
					'horizontal' => esc_html__( 'Horizontal', 'ai-addons' ),
					'vertical'   => esc_html__( 'Vertical', 'ai-addons' )
				]				
			]
		);
		$this->add_control(
			'navmenu_align',
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
				'prefix_class' => 'ai-nav-menu-align-',
				'selectors'          => [
					'{{WRAPPER}} .responsive-mode-on .ai-menu-wrap' => 'text-align: {{VALUE}};'
				],
			]
		);
		$this->add_control(
			'submenu_icon',
			[
				'label'        => esc_html__( 'Submenu Icon', 'ai-addons' ),
				'type'         => Controls_Manager::SELECT,
				'default'      => 'none',
				'options'      => [
					'none'   => esc_html__( 'None', 'ai-addons' ),
					'arrow'   => esc_html__( 'Arrows', 'ai-addons' ),
					'plus'    => esc_html__( 'Plus Sign', 'ai-addons' )
				],
				'prefix_class' => 'ai-submenu-icon-',
			]
		);
		$this->end_controls_section();
		
		//Responsive Section
		$this->start_controls_section(
			'responsive_section',
			[
				'label'	=> esc_html__( 'Responsive Layout', 'ai-addons' ),
				'tab'	=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'responsive_opt',
			[
				'label' 		=> esc_html__( 'Responsive Enable?', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no',
			]
		);
		$this->add_responsive_control(
			'responsive_from',
			[
				'label' => esc_html__( 'Mobile Menu From', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 300,
						'max' => 1500,
						'step' => 1
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 992,
				],
				'condition'    => [
					'responsive_opt' => 'yes',
				],
			]
		);
		$this->add_control(
			'responsive_animation',
			[
				'type'			=> Controls_Manager::SELECT,
				'label'			=> esc_html__( 'Responsive Model', 'ai-addons' ),
				'default'		=> 'right-overlay',
				'options'		=> [
					'right-overlay'	=> esc_html__( 'Overlay from Right', 'ai-addons' ),
					'left-overlay'	=> esc_html__( 'Overlay from Left', 'ai-addons' ),
					'right-push'	=> esc_html__( 'Push from Right', 'ai-addons' ),
					'left-push'		=> esc_html__( 'Push from Left', 'ai-addons' )
				],
				'condition'    => [
					'responsive_opt' => 'yes',
				],
			]
		);
		$this->add_control(
			'responsive_menu_icon',
			[
				'label' => esc_html__( 'Responsive Menu Icon', 'ai-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition'    => [
					'responsive_opt' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'icon_before',
			[
				'label' => esc_html__( 'Icon', 'ai-addons' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'compatibility_icon_before',
				'default' => [
					'value' => 'ti-menu',
					'library' => 'themify',
				],
				'condition' => [
					'responsive_opt' => [ 'yes' ],
				]
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
		
		// Menu Style
		$this->start_controls_section(
			'section_style_main_menu',
			[
				'label'     => esc_html__( 'Main Menu', 'ai-addons' ),
				'tab'       => Controls_Manager::TAB_STYLE
			]
		);
		$this->add_responsive_control(
			'padding_menu_item',
			[
				'label'              => esc_html__( 'Padding', 'ai-addons' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'range'              => [
					'px' => [
						'max' => 100,
					],
				],
				'default'            => [
					'size' => 15,
					'unit' => 'px',
				],
				'selectors'          => [
					'{{WRAPPER}} .ai-nav-menu li.menu-item > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				'frontend_available' => true,
			]
		);
		$this->add_responsive_control(
			'margin_menu_item',
			[
				'label'              => esc_html__( 'Margin', 'ai-addons' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'range'              => [
					'px' => [
						'max' => 100,
					],
				],
				'default'            => [
					'size' => 15,
					'unit' => 'px',
				],
				'selectors'          => [
					'{{WRAPPER}} .ai-nav-menu li.menu-item > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				'condition'          => [
					'layout!' => 'horizontal',
				],
				'frontend_available' => true,
			]
		);
		$this->add_responsive_control(
			'menu_space_between',
			[
				'label'              => esc_html__( 'Space Between', 'ai-addons' ),
				'type'               => Controls_Manager::SLIDER,
				'size_units'         => [ 'px' ],
				'range'              => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors'          => [
					'body:not(.rtl) {{WRAPPER}} .ai-nav-menu > li.menu-item:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}}',
					'body.rtl {{WRAPPER}} .ai-nav-menu > li.menu-item:not(:last-child)' => 'margin-left: {{SIZE}}{{UNIT}}'
				],
				'condition'          => [
					'layout' => 'horizontal',
				],
				'frontend_available' => true,
			]
		);
		$this->add_responsive_control(
			'menu_row_space',
			[
				'label'              => esc_html__( 'Row Spacing', 'ai-addons' ),
				'type'               => Controls_Manager::SLIDER,
				'size_units'         => [ 'px' ],
				'range'              => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors'          => [
					'{{WRAPPER}} .ai-nav-menu > li.menu-item' => 'margin-bottom: {{SIZE}}{{UNIT}}'
				],
				'condition'          => [
					'layout' => 'horizontal',
				],
				'frontend_available' => true,
			]
		);
		$this->add_control(
			'menu_typography_options',
			[
				'label' => esc_html__( 'Menu Typography', 'ai-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'menu_typography',
				'selector' => '{{WRAPPER}} .ai-nav-menu li.menu-item a',
				'global'   => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				],
			]
		);
		$this->add_control(
			'menu_skin_options',
			[
				'label' => esc_html__( 'Menu Skin', 'ai-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);
		$this->start_controls_tabs( 'tabs_menu_item_style' );

		$this->start_controls_tab(
			'tab_menu_item_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);

		$this->add_control(
			'color_menu_item',
			[
				'label'     => esc_html__( 'Text Color', 'ai-addons' ),
				'type'      => Controls_Manager::COLOR,
				'global'    => [
					'default' => Global_Colors::COLOR_TEXT,
				],
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ai-nav-menu li.menu-item a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'bg_color_menu_item',
			[
				'label'     => esc_html__( 'Background Color', 'ai-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ai-nav-menu li.menu-item a' => 'background-color: {{VALUE}}',
				]
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_menu_item_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_control(
			'color_menu_item_hover',
			[
				'label'     => esc_html__( 'Text Color', 'ai-addons' ),
				'type'      => Controls_Manager::COLOR,
				'global'    => [
					'default' => Global_Colors::COLOR_ACCENT,
				],
				'selectors' => [
					'{{WRAPPER}} .ai-nav-menu li.menu-item a:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'bg_color_menu_item_hover',
			[
				'label'     => esc_html__( 'Background Color', 'ai-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ai-nav-menu li.menu-item a:hover' => 'background-color: {{VALUE}}',
				]
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_menu_item_active',
			[
				'label' => esc_html__( 'Active', 'ai-addons' ),
			]
		);
		$this->add_control(
			'color_menu_item_active',
			[
				'label'     => esc_html__( 'Text Color', 'ai-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ai-nav-menu li.menu-item a:focus, {{WRAPPER}} .ai-nav-menu li.menu-item a:active' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'bg_color_menu_item_active',
			[
				'label'     => esc_html__( 'Background Color', 'ai-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ai-nav-menu li.menu-item a:focus, {{WRAPPER}} .ai-nav-menu li.menu-item a:active' => 'background-color: {{VALUE}}',
				]
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
		
		// Dropdown Style
		$this->start_controls_section(
			'section_style_dropdown',
			[
				'label'     => esc_html__( 'Dropdown', 'ai-addons' ),
				'tab'       => Controls_Manager::TAB_STYLE
			]
		);
		$this->add_control(
			'dropdown_outer_options',
			[
				'label' => esc_html__( 'Dropdown Styles', 'ai-addons' ),
				'type' => Controls_Manager::HEADING
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'dropdown_border',
				'selector' => '{{WRAPPER}} .ai-nav-menu .sub-menu',
			]
		);
		$this->add_responsive_control(
			'dropdown_border_radius',
			[
				'label'              => esc_html__( 'Border Radius', 'ai-addons' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px', '%' ],
				'selectors'          => [
					'{{WRAPPER}} .sub-menu'        => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .sub-menu li.menu-item:first-child' => 'border-top-left-radius: {{TOP}}{{UNIT}}; border-top-right-radius: {{RIGHT}}{{UNIT}};overflow:hidden;',
					'{{WRAPPER}} .sub-menu li.menu-item:last-child' => 'border-bottom-right-radius: {{BOTTOM}}{{UNIT}}; border-bottom-left-radius: {{LEFT}}{{UNIT}};overflow:hidden'
				],
				'frontend_available' => true,
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'      => 'dropdown_box_shadow',
				'exclude'   => [
					'box_shadow_position',
				],
				'selector'  => '{{WRAPPER}} .ai-nav-menu .sub-menu'
			]
		);
		$this->add_control(
			'dropdown_item_options',
			[
				'label' => esc_html__( 'Dropdown Item Styles', 'ai-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);
		$this->add_responsive_control(
			'padding_dropdown',
			[
				'label'              => esc_html__( 'Padding', 'ai-addons' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'range'              => [
					'px' => [
						'max' => 100,
					],
				],
				'default'            => [
					'size' => 15,
					'unit' => 'px',
				],
				'selectors'          => [
					'{{WRAPPER}} .ai-nav-menu .sub-menu li.menu-item > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				'frontend_available' => true,
			]
		);
		$this->add_responsive_control(
			'margin_dropdown',
			[
				'label'              => esc_html__( 'Margin', 'ai-addons' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'range'              => [
					'px' => [
						'max' => 100,
					],
				],
				'default'            => [
					'size' => 15,
					'unit' => 'px',
				],
				'selectors'          => [
					'{{WRAPPER}} .ai-nav-menu .sub-menu li.menu-item > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				'frontend_available' => true,
			]
		);
		$this->add_control(
			'dropdown_typography_options',
			[
				'label' => esc_html__( 'Menu Typography', 'ai-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'dropdown_typography',
				'selector' => '{{WRAPPER}} .ai-nav-menu .sub-menu li.menu-item a',
				'global'   => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				],
			]
		);
		$this->add_control(
			'dropdown_skin_options',
			[
				'label' => esc_html__( 'Menu Skin', 'ai-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);
		$this->start_controls_tabs( 'tabs_dropdown_style' );

		$this->start_controls_tab(
			'tab_dropdown_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);

		$this->add_control(
			'color_dropdown',
			[
				'label'     => esc_html__( 'Text Color', 'ai-addons' ),
				'type'      => Controls_Manager::COLOR,
				'global'    => [
					'default' => Global_Colors::COLOR_TEXT,
				],
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ai-nav-menu .sub-menu li.menu-item a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'bg_color_dropdown',
			[
				'label'     => esc_html__( 'Background Color', 'ai-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ai-nav-menu .sub-menu li.menu-item a' => 'background-color: {{VALUE}}',
				]
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_dropdown_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_control(
			'color_dropdown_hover',
			[
				'label'     => esc_html__( 'Text Color', 'ai-addons' ),
				'type'      => Controls_Manager::COLOR,
				'global'    => [
					'default' => Global_Colors::COLOR_ACCENT,
				],
				'selectors' => [
					'{{WRAPPER}} .ai-nav-menu .sub-menu li.menu-item a:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'bg_color_dropdown_hover',
			[
				'label'     => esc_html__( 'Background Color', 'ai-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ai-nav-menu .sub-menu li.menu-item a:hover' => 'background-color: {{VALUE}}',
				]
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_dropdown_active',
			[
				'label' => esc_html__( 'Active', 'ai-addons' ),
			]
		);
		$this->add_control(
			'color_dropdown_active',
			[
				'label'     => esc_html__( 'Text Color', 'ai-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ai-nav-menu .sub-menu li.menu-item a:focus, {{WRAPPER}} .ai-nav-menu li.menu-item a:active' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'bg_color_dropdown_active',
			[
				'label'     => esc_html__( 'Background Color', 'ai-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ai-nav-menu .sub-menu li.menu-item a:focus, {{WRAPPER}} .ai-nav-menu li.menu-item a:active' => 'background-color: {{VALUE}}',
				]
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
		
		// Toggle Style
		$this->start_controls_section(
			'section_style_toggle',
			[
				'label'     => esc_html__( 'Toggle Icon', 'ai-addons' ),
				'tab'       => Controls_Manager::TAB_STYLE
			]
		);
		$this->add_control(
			'toggle_icon_align',
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
				'selectors'          => [
					'{{WRAPPER}} .responsive-mode-on' => 'text-align: {{VALUE}};'
				],
			]
		);
		$this->add_responsive_control(
			'padding_toggle_icon',
			[
				'label'              => esc_html__( 'Padding', 'ai-addons' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'range'              => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors'          => [
					'{{WRAPPER}} .ai-menu-toggle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				'frontend_available' => true,
			]
		);
		
		$this->add_responsive_control(
			'margin_toggle_icon',
			[
				'label'              => esc_html__( 'Margin', 'ai-addons' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'range'              => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors'          => [
					'{{WRAPPER}} .ai-menu-toggle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				'frontend_available' => true,
			]
		);
		
		$this->start_controls_tabs( 'tabs_toggle_style' );

		$this->start_controls_tab(
			'toggle_style_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);

		$this->add_control(
			'toggle_color',
			[
				'label'     => esc_html__( 'Color', 'ai-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ai-menu-toggle' => 'color: {{VALUE}}'
				],
			]
		);

		$this->add_control(
			'toggle_background_color',
			[
				'label'     => esc_html__( 'Background Color', 'ai-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ai-menu-toggle' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'toggle_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);

		$this->add_control(
			'toggle_hover_color',
			[
				'label'     => esc_html__( 'Color', 'ai-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ai-menu-toggle:hover' => 'color: {{VALUE}}'

				],
			]
		);

		$this->add_control(
			'toggle_hover_background_color',
			[
				'label'     => esc_html__( 'Background Color', 'ai-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ai-menu-toggle:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'toggle_size',
			[
				'label'              => esc_html__( 'Icon Size', 'ai-addons' ),
				'type'               => Controls_Manager::SLIDER,
				'range'              => [
					'px' => [
						'min' => 15,
					],
				],
				'selectors'          => [
					'{{WRAPPER}} .ai-menu-toggle'     => 'font-size: {{SIZE}}{{UNIT}}'
				],
				'frontend_available' => true,
				'separator'          => 'before',
			]
		);

		$this->add_responsive_control(
			'toggle_border_width',
			[
				'label'              => esc_html__( 'Border Width', 'ai-addons' ),
				'type'               => Controls_Manager::SLIDER,
				'range'              => [
					'px' => [
						'max' => 10,
					],
				],
				'selectors'          => [
					'{{WRAPPER}} .ai-menu-toggle' => 'border-width: {{SIZE}}{{UNIT}};',
				],
				'frontend_available' => true,
			]
		);

		$this->add_responsive_control(
			'toggle_border_radius',
			[
				'label'              => esc_html__( 'Border Radius', 'ai-addons' ),
				'type'               => Controls_Manager::SLIDER,
				'size_units'         => [ 'px', '%' ],
				'selectors'          => [
					'{{WRAPPER}} .ai-menu-toggle' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
				'frontend_available' => true,
			]
		);		
		$this->end_controls_section();
		
		// Mobile Menu Options
		$this->start_controls_section(
			'section_style_mobile_menu',
			[
				'label'     => esc_html__( 'Mobile Menu Options', 'ai-addons' ),
				'tab'       => Controls_Manager::TAB_STYLE
			]
		);
		$this->start_controls_tabs( 'tabs_offcanvas_menu_item_style' );
		$this->start_controls_tab(
			'tab_offcanvas_menu_item_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'm_color_menu_item',
			[
				'label'     => esc_html__( 'Text Color', 'ai-addons' ),
				'type'      => Controls_Manager::COLOR,
				'global'    => [
					'default' => Global_Colors::COLOR_TEXT,
				],
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ai-offcanvas-wrap .ai-nav-menu li.menu-item a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'm_bg_color_menu_item',
			[
				'label'     => esc_html__( 'Background Color', 'ai-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ai-offcanvas-wrap .ai-nav-menu li.menu-item a' => 'background-color: {{VALUE}}',
				]
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_offcanvas_menu_item_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_control(
			'm_color_menu_item_hover',
			[
				'label'     => esc_html__( 'Text Color', 'ai-addons' ),
				'type'      => Controls_Manager::COLOR,
				'global'    => [
					'default' => Global_Colors::COLOR_ACCENT,
				],
				'selectors' => [
					'{{WRAPPER}} .ai-offcanvas-wrap .ai-nav-menu li.menu-item a:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'm_bg_color_menu_item_hover',
			[
				'label'     => esc_html__( 'Background Color', 'ai-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ai-offcanvas-wrap .ai-nav-menu li.menu-item a:hover' => 'background-color: {{VALUE}}',
				]
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_offcanvas_menu_item_active',
			[
				'label' => esc_html__( 'Active', 'ai-addons' ),
			]
		);
		$this->add_control(
			'm_color_menu_item_active',
			[
				'label'     => esc_html__( 'Text Color', 'ai-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ai-offcanvas-wrap .ai-nav-menu li.menu-item a:focus, {{WRAPPER}} .ai-offcanvas-wrap .ai-nav-menu li.menu-item a:active' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'm_bg_color_menu_item_active',
			[
				'label'     => esc_html__( 'Background Color', 'ai-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ai-offcanvas-wrap .ai-nav-menu li.menu-item a:focus, {{WRAPPER}} .ai-offcanvas-wrap .ai-nav-menu li.menu-item a:active' => 'background-color: {{VALUE}}',
				]
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_responsive_control(
			'menu_wrap_width',
			[
				'label'              => esc_html__( 'Width', 'ai-addons' ),
				'type'               => Controls_Manager::SLIDER,
				'size_units'         => [ 'px', '%' ],
				'selectors'          => [
					'{{WRAPPER}} .responsive-mode-on .ai-menu-wrap' => 'width: {{SIZE}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'menu_wrap_left',
			[
				'label'              => esc_html__( 'Left', 'ai-addons' ),
				'type'               => Controls_Manager::SLIDER,
				'size_units'         => [ 'px', '%' ],
				'selectors'          => [
					'{{WRAPPER}} .responsive-mode-on .ai-menu-wrap' => 'left: {{SIZE}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'menu_wrap_right',
			[
				'label'              => esc_html__( 'Right', 'ai-addons' ),
				'type'               => Controls_Manager::SLIDER,
				'size_units'         => [ 'px', '%' ],
				'selectors'          => [
					'{{WRAPPER}} .responsive-mode-on .ai-menu-wrap' => 'right: {{SIZE}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'm_padding_menu_item',
			[
				'label'              => esc_html__( 'Padding', 'ai-addons' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'range'              => [
					'px' => [
						'max' => 100,
					],
				],
				'default'            => [
					'size' => 15,
					'unit' => 'px',
				],
				'selectors'          => [
					'{{WRAPPER}} .ai-offcanvas-wrap .ai-nav-menu li.menu-item > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				'frontend_available' => true,
			]
		);
		$this->add_responsive_control(
			'm_margin_menu_item',
			[
				'label'              => esc_html__( 'Margin', 'ai-addons' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px' ],
				'range'              => [
					'px' => [
						'max' => 100,
					],
				],
				'default'            => [
					'size' => 15,
					'unit' => 'px',
				],
				'selectors'          => [
					'{{WRAPPER}} .ai-offcanvas-wrap .ai-nav-menu li.menu-item > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				'frontend_available' => true,
			]
		);
		$this->end_controls_section();
			
	}
	
	/**
	 * Render menu widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		extract( $settings );
		
		$res_from = isset( $settings['responsive_from'] ) ? $settings['responsive_from']['size'] : 0;
		$this->add_render_attribute( 'ai-widget-wrapper', 'class', 'ai-menu-elementor-widget' );
		$this->add_render_attribute( 'ai-widget-wrapper', 'data-responsive', esc_attr( $res_from ) );
		?>
		<div <?php echo ''. $this->get_render_attribute_string( 'ai-widget-wrapper' ); ?>>
		<?php
		
		$layout = isset( $layout ) ? $layout : '';
		$menu = !empty( $menu ) ? $menu : '';
		$menu_wrap_class = '';
		$menu_wrap_class .= $layout ? ' ai-menu-'.$layout : '';
		
		if( $layout == 'fly' ){
			$fly_type = isset( $fly_type ) ? $fly_type : 'slide';
			$fly_position = isset( $fly_position ) ? $fly_position : 'left';
			$menu_wrap_class .= ' ai-'. esc_attr( $fly_type ) .'-'. esc_attr( $fly_position );
		}
		
		add_filter( 'nav_menu_item_title', array( $this, 'aiea_hf_add_sub_menu_icon' ), 10, 4 );
		
		if( $menu ){
			
			$menu_output = '<div class="ai-menu-wrap'. esc_attr( $menu_wrap_class ) .'">';
			$menu_output .= wp_nav_menu(
				array(
					'container'  => '',
					'menu_class'  => 'ai-nav-menu',
					'menu' => $menu,
					'echo' => false
				)
			);
			$menu_output .= '</div><!-- .ai-menu-wrap -->';
			
			echo ''. $menu_output;
			
			// for responsive
			$responsive_opt = isset( $responsive_opt ) && $responsive_opt == 'yes' ? true : false;
			
			if( $responsive_opt ) {
				
				echo '<div class="ai-offcanvas-elementor-widget">';
				$responsive_animation = isset( $responsive_animation ) && !empty( $responsive_animation ) ? $responsive_animation : 'right-overlay';
				$rand_id = aiea_addon_base()->shortcode_rand_id();
				$offcanvas_element = 'ai-offcanvas-'. $rand_id;
				
				$this->add_render_attribute( 'menu-toggle-wrapper', 'class', 'ai-menu-toggle-wrap ai-menu-toggle' );
				$this->add_render_attribute( 'menu-toggle-wrapper', 'class', 'ai-offcanvas-trigger offcanvas-trigger-icon ai-icon' );
				$this->add_render_attribute( 'menu-toggle-wrapper', 'data-offcanvas-id', $offcanvas_element );
				
				ob_start();
				?>
				<div <?php echo ''. $this->get_render_attribute_string( 'menu-toggle-wrapper' ); ?>>
					<?php
						$before_icon_stat = $this->aiea_icon_stat( 'compatibility_icon_before', 'icon_before', 'ti-settings' );			
						echo '<span class="ai-menu-toggle-open">';
							// before icon
							if ( $before_icon_stat ) :
								Icons_Manager::render_icon( $settings['icon_before'], [ 'aria-hidden' => 'true' ] );
							endif;					
						echo '</span>';
					?>

				</div>
				<?php
				echo ob_get_clean();
				
				$class = ' offcanvas-'. $responsive_animation;
				echo '<span class="'. esc_attr( $class ) .' ai-overlay-bg"></span>';
				echo '<div class="ai-offcanvas-wrap'. esc_attr( $class ) .'" id="'. esc_attr( $offcanvas_element ) .'" data-canvas-animation="'. esc_attr( $responsive_animation ) .'">';
					echo '<div class="ai-offcanvas-wrap-inner">';	
						echo '<span class="ai-close ai-offcanvas-close"></span>';
						echo ''. $menu_output;
					echo '</div><!-- .ai-offcanvas-wrap-inner -->';
				echo '</div><!-- .ai-offcanvas-wrap -->';
				
				echo '</div>';
				
			} // responsive option
			
		}else{		
			echo "Select menu";
		}
		
		remove_filter( 'nav_menu_item_title', array( $this, 'aiea_hf_add_sub_menu_icon' ), 10, 4 );
		
		echo '</div> <!-- .ai-widget-wrapper -->';
		
	}
	
	public static function aiea_hf_add_sub_menu_icon( $title, $menu_item, $args, $depth ){
		if( in_array( "menu-item-has-children", $menu_item->classes ) ) {
			return $title .'<span class="dropdown-icon"></span>';
		}
		return $title;
	}
	
	protected function aiea_icon_stat( $compatibility, $icon_field, $default = '' ) {
		$settings = $this->get_settings_for_display();
				
		$migrated = isset( $settings['__fa4_migrated'][$icon_field] );
		$is_new = empty( $settings[$compatibility] ) && Icons_Manager::is_migration_allowed();
		
		if ( empty( $settings[$compatibility] ) && !Icons_Manager::is_migration_allowed() ) {
			// add old default
			$settings[$compatibility] = $default;
		}
		if ( ! empty( $settings[$compatibility] ) ) {
			$this->add_render_attribute( $icon_field. '_attr', 'class', $settings[$compatibility] );
			$this->add_render_attribute( $icon_field. '_attr', 'aria-hidden', 'true' );
		}

		if ( $is_new || $migrated ) return true;
			
		return false;
	}
	
}