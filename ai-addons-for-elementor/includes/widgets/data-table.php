<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

/**
 * Elementor Data Table Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
 
class AIEA_Elementor_Table_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Data Table widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ai-data-table';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Data Table widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Data Table', 'ai-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Data Table widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('data-table');
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
		return [ 'ai-data-table-editor', 'ai-data-table', 'ai-front-end' ];
	}
	
	public function get_style_depends() {
		return [ 'font-awesome', 'ai-table' ];
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Data Table widget belongs to.
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
        return 'https://aiaddons.ai/data-table-demo/';
    }

	/**
	 * Register Data Table widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'general_section',
			[
				'label' => __( 'General', 'ai-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
            'aiea_data_table_static_html',
            [
                'type' => Controls_Manager::HIDDEN,
                'default' => '<thead><tr><th></th><th></th><th></th><th></th></tr></thead><tbody><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr></tbody>',
            ]
        );
		$this->add_control(
			'table_sort',
			[
				'label' 		=> esc_html__( 'Table Sorting', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'table_search',
			[
				'label' 		=> esc_html__( 'Table Search', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'table_search_placeholder',
			[
				'type'			=> Controls_Manager::TEXT,
				'label'			=> esc_html__( 'Search Placeholder', 'ai-addons' ),
				'default' 		=> esc_html__( 'Search..', 'ai-addons' ),
				'condition' 	=> [
					'table_search' 		=> 'yes'
				]
			]
		);
		$this->add_control(
			'table_pagination',
			[
				'label' 		=> esc_html__( 'Table Pagination', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'table_pagination_max',
			[
				'type'			=> Controls_Manager::TEXT,
				'label'			=> esc_html__( 'Rows Per Page', 'ai-addons' ),
				'default' 		=> '10',
				'condition' 	=> [
					'table_pagination' 		=> 'yes'
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
		
		// Style General Section
		$this->start_controls_section(
			'section_style_general',
			[
				'label' => __( 'General', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-inner' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'font_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Font Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-inner' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_responsive_control(
			'outer_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'outer_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'table_border',
				'selector' => '{{WRAPPER}} .ai-data-table-inner',
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'table_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);	
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'table_box_shadow',
				'selector' => '{{WRAPPER}} .ai-data-table-inner'
			]
		);
		$this->end_controls_section();
		
		// Style Table Section
		$this->start_controls_section(
			'section_style_table',
			[
				'label' => __( 'Table', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'row_padding',
			[
				'label' => esc_html__( 'Row Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-inner table.ai-data-table td' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'accordion_border',
				'selector' => '{{WRAPPER}} .ai-data-table-inner table.ai-data-table th, {{WRAPPER}} .ai-data-table-inner table.ai-data-table td'
			]
		);
		$this->add_responsive_control(
			'table_cells_alignment',
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
					'{{WRAPPER}} .ai-data-table-inner table.ai-data-table td' => 'text-align: {{VALUE}};',
				],
			]
		);		
		$this->add_control(
			'table_row_style',
			[
				'label' 		=> esc_html__( 'Row Odd Even Style', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'odd_bg_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Odd Row Bg Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-inner table.ai-data-table tbody tr:nth-child(odd) td' => 'background-color: {{VALUE}};'
				],
				'condition' 	=> [
					'table_row_style' 		=> 'yes'
				]
			]
		);
		$this->add_control(
			'odd_font_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Odd Row Font Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-inner table.ai-data-table tbody tr:nth-child(odd) td' => 'color: {{VALUE}};'
				],
				'condition' 	=> [
					'table_row_style' 		=> 'yes'
				]
			]
		);
		$this->add_control(
			'even_bg_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Even Row Bg Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-inner table.ai-data-table tbody tr:nth-child(even) td' => 'background-color: {{VALUE}};'
				],
				'condition' 	=> [
					'table_row_style' 		=> 'yes'
				]
			]
		);
		$this->add_control(
			'even_font_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Even Row Font Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-inner table.ai-data-table tbody tr:nth-child(even) td' => 'color: {{VALUE}};'
				],
				'condition' 	=> [
					'table_row_style' 		=> 'yes'
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'table_typography',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
				'selector' 		=> '{{WRAPPER}} .ai-data-table-inner table.ai-data-table td'
			]
		);	
		$this->end_controls_section();
		
		// Style Table Row Head
		$this->start_controls_section(
			'section_table_row_head',
			[
				'label' => __( 'Row Heading', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'head_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-inner .ai-data-table thead > tr > th' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'head_font_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Font Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-inner .ai-data-table thead > tr > th' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_responsive_control(
			'head_row_padding',
			[
				'label' => esc_html__( 'Row Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-inner .ai-data-table thead > tr > th' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'row_head_alignment',
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
					'{{WRAPPER}} .ai-data-table-inner .ai-data-table thead > tr > th' => 'text-align: {{VALUE}};',
				],
			]
		);	
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_head_typography',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
				'selector' 		=> '{{WRAPPER}} .ai-data-table-inner .ai-data-table thead > tr > th'
			]
		);	
		$this->end_controls_section();
		
		// Style Table Column Head
		$this->start_controls_section(
			'section_table_column_head',
			[
				'label' => __( 'Column Heading', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'column_head_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-inner .ai-data-table > tbody > tr > td:first-child' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'column_head_font_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Font Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-inner .ai-data-table > tbody > tr > td:first-child' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_responsive_control(
			'column_head_row_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-inner .ai-data-table > tbody > tr > td:first-child' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'column_head_alignment',
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
					'{{WRAPPER}} .ai-data-table-inner .ai-data-table > tbody > tr > td:first-child' => 'text-align: {{VALUE}};',
				],
			]
		);			
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'column_title_head_typography',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
				'selector' 		=> '{{WRAPPER}} .ai-data-table-inner .ai-data-table > tbody > tr > td:first-child'
			]
		);	
		$this->end_controls_section();
		
		// Style Table Column
		$this->start_controls_section(
			'section_table_column',
			[
				'label' => __( 'Column', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'table_cell_min_width',
			[
				'label' => esc_html__( 'Cells Min Width', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1500,
						'min' => 10,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-inner table.ai-data-table td' => 'min-width: {{SIZE}}{{UNIT}};'
				],
			]
		);
		$this->add_control(
			'column_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-inner .ai-data-table > tbody > tr > td' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'column_font_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Font Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-inner .ai-data-table > tbody > tr > td' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_responsive_control(
			'column_row_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-inner .ai-data-table > tbody > tr > td' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'column_alignment',
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
					'{{WRAPPER}} .ai-data-table-inner .ai-data-table > tbody > tr > td' => 'text-align: {{VALUE}};',
				],
			]
		);			
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'column_title_typography',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
				'selector' 		=> '{{WRAPPER}} .ai-data-table-inner .ai-data-table > tbody > tr > td'
			]
		);	
		$this->end_controls_section();
		
		// Style Search Section
		$this->start_controls_section(
			'search_section_style',
			[
				'label' => esc_html__( 'Search', 'ai-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'table_search' 		=> 'yes'
				]
			]
		);
		$this->add_responsive_control(
			'search_alignment',
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
					]
				],
				'default' => 'right',
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-search-wrap' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'search_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-search-wrap > *' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->add_responsive_control(
			'search_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-search-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'search_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-search-wrap > *' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->end_controls_section();
		
		// Style Pagination Section
		$this->start_controls_section(
			'pagination_section_style',
			[
				'label' => esc_html__( 'Pagination', 'ai-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'table_pagination' 		=> 'yes'
				]
			]
		);		
		$this->add_responsive_control(
			'pagination_alignment',
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
					]
				],
				'default' => 'right',
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-pagination-wrap' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'top_spacing',
			[
				'label' => esc_html__( 'Outer Spacing', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
				],
				'range' => [
					'px' => [
						'min' => 0,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-pagination-wrap' => 'margin-top: {{SIZE}}{{UNIT}};'
				],
			]
		);
		$this->start_controls_tabs( 'tabs_pagination_style' );		
		$this->start_controls_tab(
			'tab_pagination_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'pagination_text_color',
			[
				'label' => esc_html__( 'Text Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-pagination-wrap a' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'pagination_background_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-pagination-wrap a' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_pagination_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_control(
			'pagination_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-pagination-wrap a:hover, {{WRAPPER}} .ai-data-table-pagination-wrap a:focus, {{WRAPPER}} .ai-data-table-pagination-wrap a:active, {{WRAPPER}} .ai-data-table-pagination-wrap a.active' => 'color: {{VALUE}};'
				],
			]
		);
		$this->add_control(
			'pagination_background_hover_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-pagination-wrap a:hover, {{WRAPPER}} .ai-data-table-pagination-wrap a:focus, {{WRAPPER}} .ai-data-table-pagination-wrap a:active, {{WRAPPER}} .ai-data-table-pagination-wrap a.active' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'pagination_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-pagination-wrap a:hover, {{WRAPPER}} .ai-data-table-pagination-wrap a:focus, {{WRAPPER}} .ai-data-table-pagination-wrap a:active' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pagination_border',
				'selector' => '{{WRAPPER}} .ai-data-table-pagination-wrap a',
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'pagination_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-pagination-wrap a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'pagination_number_padding',
			[
				'label' => esc_html__( 'Number Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'left' => 0,
					'right' => 0,
					'top' => 0,
					'bottom' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-pagination-wrap a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'gutter_spacing',
			[
				'label' => esc_html__( 'Number Spacing', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
				],
				'range' => [
					'px' => [
						'min' => 0,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-pagination-wrap a' => is_rtl() ? 'margin-left: {{SIZE}}{{UNIT}};' : 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'pagination_hw',
			[
				'label' => esc_html__( 'Number Dimension', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 40,
				],
				'range' => [
					'px' => [
						'min' => 0,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ai-data-table-pagination-wrap a' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};'
				],
			]
		);				
		$this->end_controls_section();	

	}
	 
	protected function render() {

		$settings = $this->get_settings_for_display();
		
		$this->add_render_attribute( 'ai-widget-wrapper', 'class', 'ai-data-table-elementor-widget' );
		?>
		<div <?php echo ''. $this->get_render_attribute_string( 'ai-widget-wrapper' ); ?>>
		<?php

		$table_sort = isset( $settings['table_sort'] ) && $settings['table_sort'] == 'yes' ? true : false;
		$table_search = isset( $settings['table_search'] ) && $settings['table_search'] == 'yes' ? true : false;
		$search_placeholder = isset( $settings['table_search_placeholder'] ) && !empty( $settings['table_search_placeholder'] ) ? $settings['table_search_placeholder'] : '';
		$table_pagination = isset( $settings['table_pagination'] ) && $settings['table_pagination'] == 'yes' ? true : false;
		$pagination_max = isset( $settings['table_pagination_max'] ) && !empty( $settings['table_pagination_max'] ) ? $settings['table_pagination_max'] : '';
		
		$shortcode_rand_id = aiea_addon_base()->shortcode_rand_id();
		$table_class = $table_sort ? ' ai-table-sort-active' : '';

		echo '<div class="ai-data-table-inner" data-shortcode-id="'. esc_attr( $shortcode_rand_id ) .'">';
			if( $table_search ) echo '<div class="ai-data-table-search-wrap"><input type="text" value="" placeholder="'. esc_attr( $search_placeholder ) .'" id="ai-data-table-input-'. esc_attr( $shortcode_rand_id ) .'" /></div>';
			echo '<table id="ai-data-table-'. esc_attr( $shortcode_rand_id ) .'" class="table ai-data-table'. esc_attr( $table_class ) .'" data-sort="'. esc_attr( $table_sort ) .'" data-search="'. esc_attr( $table_search ) .'" data-page="'. esc_attr( $table_pagination ) .'" data-page-max="'. esc_attr( $pagination_max ) .'">'. $this->aiea_table_html() .'</table>';
			if( $table_pagination ) echo '<div id="ai-table-pagination-'. esc_attr( $shortcode_rand_id ) .'" class="ai-data-table-pagination-wrap"></div>';
		echo '</div>';
		
		echo '</div> <!-- .ai-widget-wrapper -->';

	}
	
	protected function aiea_table_html(){
        $settings = $this->get_parsed_dynamic_settings();
        return $settings['aiea_data_table_static_html'];
    }

}