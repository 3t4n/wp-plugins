<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

/**
 * AI Addons Chart Widget
 *
 * @since 1.0.0
 */
 
class AIEA_Elementor_Chart_Widget extends Widget_Base {
	
	private $excerpt_len;
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Chart widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ai-chart';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Chart widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Charts', 'ai-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Chart widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('chart');
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Chart widget belongs to.
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
		return [ 'chart', 'ai-front-end' ];
	}
		
	public function get_help_url() {
        return 'https://aiaddons.ai/chart-demo/';
    }

	/**
	 * Register Chart widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		//General Section
		$this->start_controls_section(
			'general_section',
			[
				'label'	=> esc_html__( 'General', 'ai-addons' ),
				'tab'	=> Controls_Manager::TAB_CONTENT,
				'description'	=> esc_html__( 'Default chart options.', 'ai-addons' ),
			]
		);
		$this->add_control(
			"chart_width",
			[
				'type'			=> Controls_Manager::NUMBER,
				'label'			=> esc_html__( 'Width', 'ai-addons' ),
				'min' => 0,
				'max' => 1500,
				'step' => 1,
				'default' => 800,
			]
		);
		$this->add_control(
			'chart_type',
			[
				'label'			=> esc_html__( 'Type', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'pie',
				'options'		=> [
					'pie'		=> esc_html__( 'Pie Chart', 'ai-addons' ),
					'doughnut'	=> esc_html__( 'Doughnut Chart', 'ai-addons' ),
					'bar'		=> esc_html__( 'Bar Chart', 'ai-addons' ),
					'line'		=> esc_html__( 'Line Chart', 'ai-addons' )
				]
			]
		);
		$this->add_control(
			'label_title',
			[
				'type'			=> Controls_Manager::TEXT,
				'label' 		=> esc_html__( 'label Title', 'ai-addons' ),
				'condition' 	=> [
					'chart_type' 	=> array( 'bar', 'line' )
				]
			]
		);	
		$this->add_control(
			'yaxis_zorobegining',
			[
				'label' 		=> esc_html__( 'Y-Axis Zero Beginning', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'condition' 	=> [
					'chart_type' 	=> array( 'bar', 'line' )
				]
			]
		);
		$this->add_control(
			'chart_bg',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Dots Color', 'ai-addons' ),
				'default' 		=> '#1555bd',
				'condition' 	=> [
					'chart_type' 	=> 'line'
				]
			]
		);
		$this->add_control(
			'chart_border',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Line Color', 'ai-addons' ),
				'default' 		=> '#1555bd',
				'condition' 	=> [
					'chart_type' 	=> 'line'
				]
			]
		);
		$this->add_control(
			'chart_fill',
			[
				'label' 		=> esc_html__( 'Chart Fill', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'condition' 	=> [
					'chart_type' 	=> 'line'
				]
			]
		);
		$this->add_control(
			'chart_responsive',
			[
				'label' 		=> esc_html__( 'Chart Responsive', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes'
			]
		);
		$this->add_control(
			'legend_position',
			[
				'label' => __( 'Chart Label Position', 'ai-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'top',
				'options' => [
					'none' => [
						'title' => __( 'None', 'ai-addons' ),
						'icon' => 'eicon-close-circle',
					],
					'top' => [
						'title' => __( 'Top', 'ai-addons' ),
						'icon' => 'eicon-v-align-top',
					],
					'bottom' => [
						'title' => __( 'Bottom', 'ai-addons' ),
						'icon' => 'eicon-v-align-bottom',
					],
					'left' => [
						'title' => __( 'Left', 'ai-addons' ),
						'icon' => 'eicon-h-align-left',
					],
					'right' => [
						'title' => __( 'Right', 'ai-addons' ),
						'icon' => 'eicon-h-align-right',
					]
				],
				'toggle' => false,
			]
		);
		
		$repeater = new Repeater();
		
		$repeater->add_control(
			'chart_labels',
			[
				'type'			=> Controls_Manager::TEXT,
				'label' 		=> esc_html__( 'Chart Label', 'ai-addons' ),
				'description'	=> esc_html__( 'Chart item label.', 'ai-addons' )
			]
		);	
		$repeater->add_control(
			'chart_values',
			[
				'type'			=> Controls_Manager::TEXT,
				'label' 		=> esc_html__( 'Chart Value', 'ai-addons' ),
				'description'	=> esc_html__( 'Chart item value.', 'ai-addons' )
			]
		);	
		$repeater->add_control(
			'chart_colors',
			[
				'type'			=> Controls_Manager::COLOR,
				'label' 		=> esc_html__( 'Chart Color', 'ai-addons' ),
				'description'	=> esc_html__( 'Chart item color.', 'ai-addons' )
			]
		);	
		$this->add_control(
			'chart_details',
			[
				'label'			=> esc_html__( 'Chart Details', 'ai-addons' ),
				'description'	=> esc_html__( 'This is options for put chart item labels and values.', 'ai-addons' ),
				'type'			=> Controls_Manager::REPEATER,
				'fields'		=> $repeater->get_controls(),
				'default'		=> [
					[
						'chart_labels' 	=> esc_html__( 'HTML', 'ai-addons' ),
						'chart_values'	=> '25',
						'chart_colors'	=> '#FF3D67'
					],
					[
						'chart_labels' 	=> esc_html__( 'PHP', 'ai-addons' ),
						'chart_values'	=> '30',
						'chart_colors'	=> '#36A2EB'
					],
					[
						'chart_labels' 	=> esc_html__( 'WordPress', 'ai-addons' ),
						'chart_values'	=> '45',
						'chart_colors'	=> '#FFCE56'
					]
				],
				'title_field'	=> '{{{ chart_labels }}}'				
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
		
		// Style Chart Section
		$this->start_controls_section(
			'section_style_chart',
			[
				'label' => __( 'Chart', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'chart_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-widget-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'chart_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-widget-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'chart_border',
				'selector' => '{{WRAPPER}} .elementor-widget-container',
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'chart_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-widget-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'chart_box_shadow',
				'selector' => '{{WRAPPER}} .elementor-widget-container'
			]
		);
		$this->add_control(
			'chart_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-widget-container' => 'background-color: {{VALUE}};'
				],
			]
		);
		$this->end_controls_section();	

	}

	/**
	 * Render Chart widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		extract( $settings );
		
		//Define Variables
		$class = '';	
		$title = isset( $chart_title ) && $chart_title != '' ? $chart_title : '';
		$legend_title = isset( $legend_title ) && $legend_title != '' ? $legend_title : '';
		$chart_type = isset( $chart_type ) && $chart_type != '' ? $chart_type : 'pie';
		$chart_width = isset( $chart_width ) && $chart_width != '' ? $chart_width : '1000';
		$yaxis = isset( $yaxis_zorobegining ) && $yaxis_zorobegining == 'yes' ? true : false;
		
		$chart_bg = isset( $chart_bg ) && $chart_bg != '' ? $chart_bg : '#1555bd';		
		$chart_border = isset( $chart_border ) && $chart_border != '' ? $chart_border : '#4580e0';
		
		$chart_fill = isset( $chart_fill ) && $chart_fill == 'yes' ? true : false;
		$chart_responsive = isset( $chart_responsive ) && $chart_responsive == 'yes' ? true : false;
		$legend_position = isset( $legend_position ) && $legend_position != '' ? $legend_position : 'top';
		
		$chart_details =  isset( $chart_details ) ? $chart_details : ''; // $prc_fetrs is pricing features
		$chart_labels = $chart_values = $chart_colors = '';
		if( $chart_details ){
			foreach( $chart_details as $chart_detail ) {
				$chart_labels .= isset( $chart_detail['chart_labels'] ) ? $chart_detail['chart_labels'] . ',' : '';
				$chart_values .= isset( $chart_detail['chart_values'] ) ? $chart_detail['chart_values'] .',' : '';
				$chart_colors .= isset( $chart_detail['chart_colors'] ) ? $chart_detail['chart_colors'] .',' : '#333333';
			}
			$chart_labels = rtrim( $chart_labels, ',' );
			$chart_values = rtrim( $chart_values, ',' );
			$chart_colors = rtrim( $chart_colors, ',' );
		}
		
		
		
		$chart_rand_id = $rand_class = 'chart-rand-' . aiea_addon_base()->shortcode_rand_id();
		
		switch( $chart_type ){
			case "pie":
				echo '<canvas id="'. esc_attr( $chart_rand_id ) .'" class="pie-chart" height="'. esc_attr( $chart_height ) .'" data-type="pie" data-labels="'. esc_attr( $chart_labels ) .'" data-values="'. esc_attr( $chart_values ) .'" data-backgrounds="'. esc_attr( $chart_colors ) .'" data-responsive="'. esc_attr( $chart_responsive ) .'" data-legend-position="'. esc_attr( $legend_position ) .'" data-chart-title="'. esc_attr( $title ) .'"></canvas>';
			break;
			case "doughnut":
				echo '<canvas id="'. esc_attr( $chart_rand_id ) .'" class="pie-chart" height="'. esc_attr( $chart_height ) .'" data-type="doughnut" data-labels="'. esc_attr( $chart_labels ) .'" data-values="'. esc_attr( $chart_values ) .'" data-backgrounds="'. esc_attr( $chart_colors ) .'" data-responsive="'. esc_attr( $chart_responsive ) .'" data-legend-position="'. esc_attr( $legend_position ) .'" data-chart-title="'. esc_attr( $title ) .'"></canvas>';
			break;
			case "bar":
				echo '<canvas id="'. esc_attr( $chart_rand_id ) .'" class="pie-chart" height="'. esc_attr( $chart_height ) .'" data-type="bar" data-labels="'. esc_attr( $chart_labels ) .'" data-values="'. esc_attr( $chart_values ) .'" data-backgrounds="'. esc_attr( $chart_colors ) .'" data-responsive="'. esc_attr( $chart_responsive ) .'" data-legend-position="'. esc_attr( $legend_position ) .'" data-yaxes-zorobegining="'. esc_attr( $yaxis ) .'" data-chart-title="'. esc_attr( $title ) .'" data-legend-title="'. esc_attr( $legend_title ) .'" ></canvas>';
			break;
			case "line":
				echo '<canvas id="'. esc_attr( $chart_rand_id ) .'" class="line-chart" height="'. esc_attr( $chart_height ) .'" data-labels="'. esc_attr( $chart_labels ) .'" data-values="'. esc_attr( $chart_values ) .'" data-background="'. esc_attr( $chart_bg ) .'" data-border="'. esc_attr( $chart_border ) .'" data-fill="'. esc_attr( $chart_fill ) .'" data-responsive="'. esc_attr( $chart_responsive ) .'" data-legend-position="'. esc_attr( $legend_position ) .'" data-yaxes-zorobegining="'. esc_attr( $yaxis ) .'" data-chart-title="'. esc_attr( $title ) .'" data-legend-title="'. esc_attr( $legend_title ) .'" ></canvas>';
			break;
		}
		

	}
	
}