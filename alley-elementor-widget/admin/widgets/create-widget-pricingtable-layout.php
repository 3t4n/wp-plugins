<?php
namespace ElementorLayout\PricingtableWidgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Core\Schemes\Typography;
use Elementor\Core\Schemes\Color;
use Elementor\Group_Control_Image_Size;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.1.0
 */
class Elementor_Pricing_Table_Widget extends Widget_Base {

	use \AewElementorLayout\Traits\Helper;
	use \AewElementorLayout\Traits\RenderData;

	public function get_name() {
		return 'elementor-pricing-table-list';
	}

	public function get_title() {
		return __( 'Pricing Table', 'alley-elementor-widget' );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}

	public function get_categories() {
		return [ 'aew-items' ];

	}

	protected function _register_controls() {

		$this->Aew_content_layout_options();
		$this->Aew_content_header_options();
		$this->Aew_content_pricing_options();
		$this->Aew_content_features_options();
		$this->Aew_content_footer_options();
		$this->Aew_content_badge_options();
		
		//Styles for widget elements
		$this->Aew_pricingtable_style_box_options();
		$this->Aew_pricingtable_header_box_options();
		$this->Aew_pricingtable_pricing_box_options();
		$this->Aew_pricingtable_features_box_options();
		$this->Aew_pricingtable_footer_box_options();
		$this->Aew_pricingtable_badge_box_options();
		
	}



	/**
	 * Content Layout Options.
	 */
	private function Aew_content_layout_options() {

		$this->start_controls_section(
			'section_layout',
			[
				'label' => esc_html__( 'Layout', 'alley-elementor-widget' ),
			]
		);

		$this->add_control(
			'select_layout',
			[
				'label' => __( 'Layout Style', 'alley-elementor-widget' ),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1' => esc_html__( 'Layout 1', 'alley-elementor-widget' ),
					'2' => esc_html__( 'Layout 2', 'alley-elementor-widget' ),
				],
			]
		);

		$this->end_controls_section();

	}
	/**
	 * Header Layout Options.
	 */
	private function Aew_content_header_options() {
		$this->start_controls_section(
			'header_section',
			[
				'label' => __( 'Header', 'alley-elementor-widget' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'title_text',
			[
				'label' => __( 'Title', 'alley-elementor-widget' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 1,
				'default' => __( 'Starter', 'alley-elementor-widget' ),
                'placeholder' => __( 'Add Title Here', 'alley-elementor-widget' ),
			]
		);
		$this->add_control(
			'description_text',
			[
				'label' => __( 'Description', 'alley-elementor-widget' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 3,
				'default' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'alley-elementor-widget' ),
                'placeholder' => __( 'Add description Here', 'alley-elementor-widget' ),
			]
		);
		$this->end_controls_section();
	}


	/**
	 * Pricing Layout Options.
	 */
	private function Aew_content_pricing_options() {
		$this->start_controls_section(
			'pricing_section',
			[
				'label' => __( 'Pricing', 'alley-elementor-widget' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'select_currency',
			[
				'label' => __( 'Currency', 'alley-elementor-widget' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'dollar',
				'options' => [
					'dollar' => esc_html__( '$ Dollar', 'alley-elementor-widget' ),
					'euro' => esc_html__( '€ Euro', 'alley-elementor-widget' ),
					'baht' => esc_html__( '฿ Baht', 'alley-elementor-widget' ),
					'franc' => esc_html__( '₣ Franc', 'alley-elementor-widget' ),
					'guilder' => esc_html__( 'ƒ Guilder', 'alley-elementor-widget' ),
					'pound' => esc_html__( '£ Pound Sterling', 'alley-elementor-widget' ),
					'real' => esc_html__( 'R$ Real', 'alley-elementor-widget' ),
					'rupee' => esc_html__( '₨ Rupee', 'alley-elementor-widget' ),
					'indian_rupee' => esc_html__( '₹ Rupee (Indian)', 'alley-elementor-widget' ),
					'yen' => esc_html__( '¥ Yen/Yuan', 'alley-elementor-widget' ),
					'aew_custom' => esc_html__( 'Custom', 'alley-elementor-widget' ),					
				],
			]
		);
		$this->add_control(
			'aew_custom_currency',
			[
				'label' => __( 'Currency', 'alley-elementor-widget' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Currency Symbal', 'alley-elementor-widget' ),
				'placeholder' => __( 'Add Period Cycle', 'alley-elementor-widget' ),
				'condition' => [
					'select_currency' => 'aew_custom',
				],
			]
		);
		$this->add_control(
			'currency_align',
			[
				'label' => __( 'Currency Alignment', 'alley-elementor-widget' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'top',
				'options' => [
					'top' => esc_html__( 'Top', 'alley-elementor-widget' ),
					'center' => esc_html__( 'Center', 'alley-elementor-widget' ),
					'bottom' => esc_html__( 'Bottom', 'alley-elementor-widget' ),
				],
			]
		);
		$this->add_control(
			'price_amount',
			[
				'label' => __( 'Main Price', 'alley-elementor-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'min' => 0,
				'step' => 1,
				'default' => 10,
			]
		);
		$this->add_control(
			'aew_pt_price_format',
			[
				'label' => __( 'Currency Format', 'alley-elementor-widget' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'currency_format_1',
				'options' => [
					'currency_format_1' => esc_html__( '01,011.00 Default', 'alley-elementor-widget' ),
					'currency_format_2' => esc_html__( '01.011,00', 'alley-elementor-widget' ),
				],
			]
		);
		$this->add_control(
			'aew_pt_decimal_postion',
			[
				'label' => __( 'Decimal Position', 'alley-elementor-widget' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'top',
				'options' => [
					'top' => esc_html__( 'Top', 'alley-elementor-widget' ),
					'bottom' => esc_html__( 'Bottom', 'alley-elementor-widget' ),
				],
			]
		);

		$this->add_control(
			'show_sale_price',
			[
				'label' => __( 'Enable Sale', 'alley-elementor-widget' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'alley-elementor-widget' ),
				'label_off' => __( 'Hide', 'alley-elementor-widget' ),
				'default' => 'no',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'price_sale',
			[
				'label' => __( 'Original Price', 'alley-elementor-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 10,
				'condition' => [
					'show_sale_price' => 'yes',
				],
			]
		);
		$this->add_control(
			'period_text',
			[
				'label' => __( 'Period', 'alley-elementor-widget' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 1,
				'default' => __( 'Monthly', 'alley-elementor-widget' ),
                'placeholder' => __( 'Add Period Cycle Here', 'alley-elementor-widget' ),
			]
		);
		
		$this->end_controls_section();
	}


	/**
	 * Features Layout Options.
	 */
	private function Aew_content_features_options() {
		$this->start_controls_section(
            'features_section',
            [
                'label' => __( 'Features', 'alley-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            // List Repeater
            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'feature_text',
                [
                    'label' => __( 'Feature Text', 'alley-elementor-widget' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( '' , 'alley-elementor-widget' ),
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'feature_icon',
                [
                    'label' => __( 'Feature Icon', 'alley-elementor-widget' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fas fa-check',
                        'library' => 'solid',
                    ],
                ]
            );
   			//Feature enables/disables
			$repeater->add_control(
				'disable_feature',
				[
					'label' => __( 'Disable Feature', 'alley-elementor-widget' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __( 'On', 'alley-elementor-widget' ),
					'label_off' => __( 'Off', 'alley-elementor-widget' ),
					'default' => 'no',
					'separator' => 'before',
				]
			);
			//addig featurs list
            $this->add_control(
                'feature_list',
                [
                    'label' => __( 'Features List', 'alley-elementor-widget' ),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'feature_text' => __( 'Free Layouts', 'alley-elementor-widget' ),
                        ],
                        [
                            'feature_text' => __( 'Free Updates', 'alley-elementor-widget' ),
                        ],
                        [
                            'feature_text' => __( 'Unlimited Domains', 'alley-elementor-widget' ),
                        ],
                        [
                            'feature_text' => __( 'Premium Support', 'alley-elementor-widget' ),
                        ],
                    ],
                    'title_field' => '{{{ feature_text }}}',
                ]
            );
		$this->end_controls_section();
	}

	/**
	 * Footer Layout Options.
	 */
	private function  Aew_content_footer_options(){
		$this->start_controls_section(
			'footer_section',
			[
				'label' => __( 'Footer', 'alley-elementor-widget' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'cta_text',
			[
				'label' => __( 'Button Text', 'alley-elementor-widget' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Read More', 'alley-elementor-widget' ),
                'placeholder' => __( 'Read More', 'alley-elementor-widget' ),
			]
		);

		$this->add_control(
			'button_link',
			[
				'label' => __( 'Button Link', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'show_disclaimer',
			[
				'label' => __( 'Enable Disclaimer', 'alley-elementor-widget' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'alley-elementor-widget' ),
				'label_off' => __( 'Hide', 'alley-elementor-widget' ),
				'default' => 'yes',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'disclaimer_text',
			[
				'label' => __( 'Disclaimer Text', 'alley-elementor-widget' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Disclaimer Text Goes Here', 'alley-elementor-widget' ),
				'condition' => [
					'show_disclaimer' => 'yes',
				],
			]
		);

		$this->end_controls_section();
	}
	/**
	 * Badge Layout Options.
	 */
	private function Aew_content_badge_options() {
		$this->start_controls_section(
			'badge_section',
			[
				'label' => __( 'Badge', 'alley-elementor-widget' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'show_badge',
			[
				'label' => __( 'Enable Badge', 'alley-elementor-widget' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'alley-elementor-widget' ),
				'label_off' => __( 'Hide', 'alley-elementor-widget' ),
				'default' => 'no',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'badge_position',
			[
				'label' => __( 'Position', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'plugin-domain' ),
						'icon' => 'eicon-h-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'plugin-domain' ),
						'icon' => 'eicon-h-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'plugin-domain' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'right',
				'toggle' => true,
				'condition' => [
       				'show_badge' => 'yes'
    			]
			]
		);
		$this->add_control(
			'badge_text',
			[
				'label' => __( 'Badge Text', 'alley-elementor-widget' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Popular', 'alley-elementor-widget' ),
                'placeholder' => __( 'Add Badge Text', 'alley-elementor-widget' ),
                'condition' => [
					'show_badge' => 'yes',
				],
			]
		);
		$this->end_controls_section();
	}


	
	
	/**
	 * Style Box Options.
	 */
	private function Aew_pricingtable_style_box_options() {

		// Box.
		$this->start_controls_section(
			'section_style_box',
			[
				'label' => __( 'Pricing Table Box', 'alley-elementor-widget' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		// Box alignment		
		$this->add_control(
			'content_align',
			[
				'label' => __( 'Alignment', 'alley-elementor-widget' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'alley-elementor-widget' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'alley-elementor-widget' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'alley-elementor-widget' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder' => 'text-align: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		// Box internal padding.
		$this->add_responsive_control(
			'grid_items_style_padding',
			[
				'label'      => __( 'Padding', 'alley-elementor-widget' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '0',
					'right' => '10',
					'bottom' => '0',
					'left' => '10',
					'isLinked' => false,
				],
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		// Box color
		$this->add_control(
			'box_style_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Box Color', 'alley-elementor-widget' ),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(192, 192, 192, 1)',
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder' => 'background: {{VALUE}};',
				],
			]
		);

		$this->start_controls_tabs( 'box_style_tabs' );
		// Normal tab.
		$this->start_controls_tab(
			'box_style_tabs_normal',
			[
				'label'     => __( 'Normal', 'alley-elementor-widget' ),
			]
		);
		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __( 'Border', 'alley-elementor-widget' ),
				'selector' => '{{WRAPPER}} .aew-pt-block .aew-pt-block-holder',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __( 'Box Shadow', 'alley-elementor-widget' ),
				'selector' => '{{WRAPPER}} .aew-pt-block .aew-pt-block-holder',
			]
		);
		// Normal border radius
		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'box_style_tabs_hover',
			[
				'label'     => __( 'Hover', 'alley-elementor-widget' ),
			]
		);
		// Hover border shadow
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_hover',
				'label' => __( 'Border', 'alley-elementor-widget' ),
				'selector' => '{{WRAPPER}} .aew-pt-block .aew-pt-block-holder:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_hover',
				'label' => __( 'Box Shadow', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .aew-pt-block .aew-pt-block-holder:hover',
			]
		);

		// Hover border radius
		$this->add_control(
			'border_radius_hover',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	/**
	 * Header Box Options.
	 */
	private function Aew_pricingtable_header_box_options() {

		// Box.
		$this->start_controls_section(
			'section_header_box',
			[
				'label' => __( 'Header', 'alley-elementor-widget' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		// Box alignment		
		$this->add_control(
			'aew_header_content_align',
			[
				'label' => __( 'Alignment', 'alley-elementor-widget' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'alley-elementor-widget' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'alley-elementor-widget' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'alley-elementor-widget' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-header-block' => 'text-align: {{VALUE}};',
				],
				// 'separator' => 'before',
			]
		);

		// Box internal padding.
		$this->add_responsive_control(
			'aew_header_box_padding',
			[
				'label'      => __( 'Padding', 'alley-elementor-widget' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '50',
					'right' => '20',
					'bottom' => '10',
					'left' => '20',
					'isLinked' => false,
				],
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-header-block' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],

			]
		);
		// Box color
		$this->add_control(
			'aew_header_boxbg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Background Color', 'alley-elementor-widget' ),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(255, 255, 255, 0)',
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-header-block' => 'background: {{VALUE}};',
				],
			]
		);
		//Title color 
		$this->add_control(
			'aew_header_title_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Title Color', 'alley-elementor-widget' ),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-header-block .aew-pt-title' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		// Title typography.
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'header_title_style_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __( 'Title Typography', 'plugin-domain' ),
				
				'selector' => '{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-header-block .aew-pt-title',
				'fields_options' => [
            		'typography' => ['default' => 'yes'],
		            'font_size' => [ 'default' => [ 'size' => 40 ] ],
		            // 'font_weight' => ['default' => 600],
		            // 'line_height' => ['default' => ['size' => 1]],
		        ],
		        
			]
		);

		//Description color 
		$this->add_control(
			'aew_header_description_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Description Color', 'alley-elementor-widget' ),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-header-block .aew-pt-description' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		// Description typography.
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'header_description_style_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __( 'Description Typography', 'plugin-domain' ),

				'selector' => '{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-header-block .aew-pt-description',
				'fields_options' => [
            		'typography' => ['default' => 'yes'],
		            'font_size' => [ 'default' => [ 'size' => 18 ] ],
		            'font_weight' => ['default' => 500],
		            // 'line_height' => ['default' => ['size' => 1]],
		        ],
		        'separator' => 'before',
			]
		);

	$this->end_controls_section();
}



/**
	 * Pricing Box Options.
	 */
	private function Aew_pricingtable_pricing_box_options() {

		// Box.
		$this->start_controls_section(
			'section_pricing_box',
			[
				'label' => __( 'Pricing', 'alley-elementor-widget' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		// Box alignment		
		$this->add_control(
			'aew_pricng_content_align',
			[
				'label' => __( 'Alignment', 'alley-elementor-widget' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'alley-elementor-widget' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'alley-elementor-widget' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'alley-elementor-widget' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-pricing-block' => 'text-align: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		// Box internal padding.
		$this->add_responsive_control(
			'aew_pricing_box_padding',
			[
				'label'      => __( 'Padding', 'alley-elementor-widget' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '30',
					'right' => '20',
					'bottom' => '20',
					'left' => '20',
					'isLinked' => false,
				],
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-pricing-block' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		// Box color
		$this->add_control(
			'aew_prcing_boxbg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Background Color', 'alley-elementor-widget' ),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(255, 255, 255, 0)',
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-pricing-block' => 'background: {{VALUE}};',
				],
			]
		);
		//currency color 
		$this->add_control(
			'aew_pricing_currency_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Currency Text Color', 'alley-elementor-widget' ),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-pricing-block .pricing-currency' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		// Currency Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'pricing_currency_style_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __( 'Currency Typography', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-pricing-block .pricing-currency',
				'fields_options' => [
            		'typography' => ['default' => 'yes'],
		            'font_size' => [ 'default' => [ 'size' => 22 ] ],
		            // 'font_weight' => ['default' => 600],
		            // 'line_height' => ['default' => ['size' => 1]],
		        ],
		        'separator' => 'before',
			]
		);

		//Price Amount color 
		$this->add_control(
			'aew_pricing_amount_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Price Text Color', 'alley-elementor-widget' ),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-pricing-block .aew-pt-price-main' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		// Price Amount Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'pricing_amount_style_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __( 'Price Typography', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-pricing-block .aew-pt-price-main',
				'fields_options' => [
            		'typography' => ['default' => 'yes'],
		            'font_size' => [ 'default' => [ 'size' => 80 ] ],
		            // 'font_weight' => ['default' => 600],
		            'line_height' => ['default' => ['size' => 80]],
		        ],
		        
			]
		);
		//Sale Price Amount color 
		$this->add_control(
			'aew_sale_amount_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Sale Price Text Color', 'alley-elementor-widget' ),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-pricing-block .aew-pt-price-sale' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
				'condition' => [
					'show_sale_price' => 'yes',
				],
			]
		);
		// Positional Amount Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'pricing_sale_style_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __( 'Sale Price Typography', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-pricing-block .aew-pt-price-sale',
				'fields_options' => [
            		'typography' => ['default' => 'yes'],
		            'font_size' => [ 'default' => [ 'size' => 80 ] ],
		            // 'font_weight' => ['default' => 600],
		            'line_height' => ['default' => ['size' => 80]],
		        ],
		        'condition' => [
					'show_sale_price' => 'yes',
				],
		       
			]
		);

		//Decimal Amount color 
		$this->add_control(
			'aew_decimal_amount_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Decimal Price Text Color', 'alley-elementor-widget' ),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-pricing-block .decimal-digit' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		//Decimal Amount Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'decimal_style_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __( 'Decimal Price Typography', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-pricing-block .decimal-digit',
				'fields_options' => [
            		'typography' => ['default' => 'yes'],
		            'font_size' => [ 'default' => [ 'size' => 22 ] ],
		            // 'font_weight' => ['default' => 600],
		            // 'line_height' => ['default' => ['size' => 1]],
		        ],
		       
			]
		);

		//Billing Period color 
		$this->add_control(
			'aew_pricing_period_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Period Text Color', 'alley-elementor-widget' ),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-pricing-block .aew-pt-period' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		// Billing Period  Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'pricing_peroid_style_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __( 'Period Typography', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-pricing-block .aew-pt-period',
			]
		);

		
	$this->end_controls_section();
}



/**
	 * Pricing Features Options.
	 */
	private function Aew_pricingtable_features_box_options() {

		// Box.
		$this->start_controls_section(
			'section_pricing_features_box',
			[
				'label' => __( 'Features', 'alley-elementor-widget' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		// Box alignment		
		$this->add_control(
			'aew_features_content_align',
			[
				'label' => __( 'Alignment', 'alley-elementor-widget' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'alley-elementor-widget' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'alley-elementor-widget' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'alley-elementor-widget' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-features-block' => 'text-align: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		// Box internal padding.
		$this->add_responsive_control(
			'aew_features_box_padding',
			[
				'label'      => __( 'Box Padding', 'alley-elementor-widget' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '30',
					'right' => '20',
					'bottom' => '30',
					'left' => '20',
					'isLinked' => false,
				],
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-features-block' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		
		// Box color
		$this->add_control(
			'aew_features_boxbg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Background Color', 'alley-elementor-widget' ),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(255, 255, 255, 0)',
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-features-block' => 'background: {{VALUE}};',
				],
			]
		);
		//Feature enables/disables
			$this->add_control(
				'enable_list_divider',
				[
					'label' => __( 'Enable list Divider', 'alley-elementor-widget' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __( 'On', 'alley-elementor-widget' ),
					'label_off' => __( 'Off', 'alley-elementor-widget' ),
					'default' => 'yes',
					'separator' => 'before',
				]
			);
		//Feature divider
		$this->add_control(
			'feature_list_divider',
			[
				'label' => __( 'Divider Style', 'alley-elementor-widget' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'solid' => __( 'Solid', 'alley-elementor-widget' ),
					'double' => __( 'Double', 'alley-elementor-widget' ),
					'dotted' => __( 'Dotted', 'alley-elementor-widget' ),
					'dashed' => __( 'Dashed', 'alley-elementor-widget' ),
				],
				'default' => 'solid',
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-features-block .feature-list' => 'border-bottom-style: {{VALUE}};',
				],
				'condition' => [
					'enable_list_divider' => 'yes',
				],
			]
		);
		$this->add_control(
			'divider_weight',
			[
				'label' => __( 'Divider Weight', 'alley-elementor-widget' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 20,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-features-block .feature-list' => 'border-bottom-width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'enable_list_divider' => 'yes',
				],
			]
		);
		$this->add_control(
			'list_divider_color',
			[
				'label' => __( 'Divider Color', 'alley-elementor-widget' ),
				'type' => Controls_Manager::COLOR,
				'default'=> 'rgba(0, 0, 0, 1)',
				'scheme' => [
					'type' => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-features-block .feature-list' => 'border-bottom-color: {{VALUE}};',
				],
			]
		);
		// list top/bottom space.
		$this->add_responsive_control(
			'aew_features_space_padding',
			[
				'label'      => __( 'List item padding', 'alley-elementor-widget' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'default'	 => [
					'top' => '15',
					'right' => '0',
					'bottom' => '15',
					'left' => '0',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-features-block .feature-list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' => 'before',
			]
		);
		
		// Features List Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'pricing_features_style_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __( 'Features Typography', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-features-block .feature-list',
			]
		);

		//list color
		$this->add_control(
			'aew_pricing_features_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Features Text Color', 'alley-elementor-widget' ),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-features-block .feature-list' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
	}


	/**
	 * Pricing Footer Options.
	 */
	private function Aew_pricingtable_footer_box_options() {

		// Box.
		$this->start_controls_section(
			'section_footer_box',
			[
				'label' => __( 'Footer', 'alley-elementor-widget' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		// Box alignment		
		$this->add_control(
			'aew_footer_content_align',
			[
				'label' => __( 'Alignment', 'alley-elementor-widget' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'alley-elementor-widget' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'alley-elementor-widget' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'alley-elementor-widget' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-footer-block' => 'text-align: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		// Box internal padding.
		$this->add_responsive_control(
			'aew_footer_box_padding',
			[
				'label'      => __( 'Box Padding', 'alley-elementor-widget' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '20',
					'right' => '20',
					'bottom' => '20',
					'left' => '20',
					'isLinked' => true,
				],
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-footer-block' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		// Box color
		$this->add_control(
			'aew_footer_boxbg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Background Color', 'alley-elementor-widget' ),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(255, 255, 255, 0)',
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-footer-block' => 'background: {{VALUE}};',
				],
			]
		);
		// disclaimer padding space.
		$this->add_responsive_control(
			'aew_disclaimer_padding',
			[
				'label'      => __( 'Disclaimer padding', 'alley-elementor-widget' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '20',
					'right' => '20',
					'bottom' => '20',
					'left' => '20',
					'isLinked' => true,
				],
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-footer-block .aew-pt-disclaimer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' => 'before',
			]
		);
		// Disclaimer button Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'pricing_disclaimer_style_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __( 'Disclaimer Typography', 'alley-elementor-widget' ),
				'selector' => '{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-footer-block .aew-pt-disclaimer',
			]
		);

		//Disclaimer text color
		$this->add_control(
			'aew_pricing_disclaimer_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Disclaimer Text Color', 'alley-elementor-widget' ),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-footer-block .aew-pt-disclaimer' => 'color: {{VALUE}};',
				],
			]
		);
		// cta button padding
		$this->add_responsive_control(
			'aew_pt_button_padding',
			[
				'label'      => __( 'Button Padding', 'alley-elementor-widget' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'default'	 => [
					'top' => '6',
					'right' => '20',
					'bottom' => '6',
					'left' => '20',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-footer-block a.pricing-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' => 'before',
			]
		);
		
		// CTA button Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'pricing_button_style_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __( 'Button Typography', 'alley-elementor-widget' ),
				'selector' => '{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-footer-block a.pricing-button',
			]
		);



		$this->start_controls_tabs( 'pt_footer_style_tabs' );
		// Normal tab.
		$this->start_controls_tab(
			'pt_footer_style_tabs_normal',
			[
				'label'     => __( 'Normal', 'alley-elementor-widget' ),
			]
		);
		// Normal border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'label' => __( 'Border', 'alley-elementor-widget' ),
				'selector' => '{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-footer-block a.pricing-button',
			]
		);
		// Normal border shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'label' => __( 'Box Shadow', 'alley-elementor-widget' ),
				'selector' => '{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-footer-block a.pricing-button',
			]
		);
		// Normal border radius
		$this->add_control(
			'button_border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-footer-block a.pricing-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		// Box color
		$this->add_control(
			'aew_button_bg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Background Color', 'alley-elementor-widget' ),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-footer-block a.pricing-button' => 'background: {{VALUE}};',
				],
			]
		);
		//button text color
		$this->add_control(
			'aew_pricing_button_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Button Text Color', 'alley-elementor-widget' ),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(255, 255, 255, 1)',
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-footer-block a.pricing-button' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		// Hover border.
		$this->start_controls_tab(
			'pt_footer_style_tabs_hover',
			[
				'label'     => __( 'Hover', 'alley-elementor-widget' ),
			]
		);
		// Hover border shadow
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border_hover',
				'label' => __( 'Border', 'alley-elementor-widget' ),
				'selector' => '{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-footer-block a.pricing-button:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow_hover',
				'label' => __( 'Box Shadow', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-footer-block a.pricing-button:hover',
			]
		);

		// Hover border radius
		$this->add_control(
			'button_border_radius_hover',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-footer-block a.pricing-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		// Box color
		$this->add_control(
			'aew_button_bg_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Background Color', 'alley-elementor-widget' ),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(255, 255, 255, 1)',
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-footer-block a.pricing-button:hover' => 'background: {{VALUE}};',
				],
			]
		);
		//button text color
		$this->add_control(
			'aew_pricing_features_color_hover',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Button Text Color', 'alley-elementor-widget' ),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-footer-block a.pricing-button:hover' => 'color: {{VALUE}};',
				],
			]
		);
		

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	/**
	 * Badge Box Options.
	 */
	private function Aew_pricingtable_badge_box_options() {

		// Box.
		$this->start_controls_section(
			'section_badge_box',
			[
				'label' => __( 'Badge', 'alley-elementor-widget' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_badge' => 'yes',
				],
			]
		);
		
		

		// Box internal padding.
		$this->add_responsive_control(
			'aew_badge_box_padding',
			[
				'label'      => __( 'Padding', 'alley-elementor-widget' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'	 => [
					'top' => '5',
					'right' => '20',
					'bottom' => '5',
					'left' => '20',
					'isLinked' => false,
				],
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-badge .badge-style' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);
		// Box color
		$this->add_control(
			'aew_badge_boxbg_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Background Color', 'alley-elementor-widget' ),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(0, 0, 0, 1)',
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-badge .badge-style' => 'background: {{VALUE}};',
				],
			]
		);
		// Badger Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'pricing_badge_style_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'label' => __( 'Typography', 'plugin-domain' ),
				'selector' => '{{WRAPPER}}  .aew-pt-block .aew-pt-block-holder .aew-pt-badge .badge-style',
			]
		);
		//badge text color
		$this->add_control(
			'aew_badge_color',
			[
				'type'      => Controls_Manager::COLOR,
				'label'     => __( 'Text Color', 'alley-elementor-widget' ),
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'default'   => 'rgba(255, 255, 255, 1)',
				'selectors' => [
					'{{WRAPPER}} .aew-pt-block .aew-pt-block-holder .aew-pt-badge .badge-style' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
	}

	protected function render( $instance = [] ) {
		
		// Get settings.
		$settings = $this->get_settings();
		$select_layout =$settings['select_layout'];?>
		<!-- featured-layout -->
		<section class="aew-pricingtable-layout-<?php echo $select_layout; ?>">
			<div class="aew-pt-block">
				<?php
					include( AEW_PlLUGIN_DIR . 'frontend/layouts/price-table/pricingtable-layout.php' ); 
				?>
			</div>
		</section>	<!-- featured-layout -->

	<?php }

}
