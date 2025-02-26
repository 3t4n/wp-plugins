<?php
namespace AcademyEA\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use AcademyEA\Traits\CommonStyle;

class CourseEnrollWidget extends Widget_Base {
	use CommonStyle;

	public function get_name() {
		return 'academyea-course-enroll-widget';
	}

	public function get_title() {
		return __( 'Course Enroll Widget', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-sidebar';
	}

	public function get_categories() {
		return array( 'academyea-widgets' );
	}

	public function get_keywords() {
		return [ 'course enroll widget', 'course', 'widget', 'enroll', 'academy', 'lms' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'general_style',
			array(
				'label' => __( 'General Style', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->normal_element(
			'enroll_widget',
			'{{WRAPPER}} .academy-elementor-enroll-widget',
			[ 'background', 'border', 'radius', 'padding', 'box_shadow' ]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'price_style',
			array(
				'label' => __( 'Price Heading', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_responsive_control(
			'price_heading_gap',
			[
				'label' => __( 'Gap', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .academy-elementor-enroll-widget .academy-widget-enroll__head' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 10,
				],
			]
		);

		$this->add_control(
			'price_separator_width',
			[
				'label' => __( 'Separator Width', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 10,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .academy-elementor-enroll-widget .academy-widget-enroll__head' => 'border-bottom-width: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 1,
				],
			]
		);

		$this->add_control(
			'price_separator_color',
			[
				'label' => esc_html__( 'Separator Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-elementor-enroll-widget .academy-widget-enroll__head' => 'border-bottom-color: {{VALUE}};',
				],
			]
		);

		$this->start_controls_tabs( 'course_price_style_tabs' );

			$this->start_controls_tab(
				'price_normal_style_tab',
				[
					'label' => __( 'Normal', 'academy-elementor-addons' ),
				]
			);

			$this->normal_element(
				'price_normal',
				'{{WRAPPER}} .academy-course-price ins .amount',
				[ 'typography', 'color' ]
			);

			$this->end_controls_tab();

			$this->start_controls_tab(
				'price_strike_style_tab',
				[
					'label' => __( 'Strike', 'academy-elementor-addons' ),
				]
			);

			$this->normal_element(
				'price_strike',
				'{{WRAPPER}} .academy-course-price del .amount',
				[ 'typography', 'color' ]
			);

			$this->end_controls_tab();

			$this->start_controls_tab(
				'price_type_style_tab',
				[
					'label' => __( 'Type', 'academy-elementor-addons' ),
				]
			);

			$this->normal_element(
				'price_type',
				'{{WRAPPER}} .academy-course-type',
				[ 'typography', 'color' ]
			);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'course_content_style',
			array(
				'label' => __( 'Course Content', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->normal_element(
			'content_text',
			'{{WRAPPER}} .academy-elementor-enroll-widget .academy-widget-enroll__content ul li',
			[ 'color' ]
		);

		$this->add_control(
			'content_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-elementor-enroll-widget .academy-widget-enroll__content .academy-icon:before' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'content_space_between',
			[
				'label' => __( 'Space Between', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 60,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .academy-elementor-enroll-widget .academy-widget-enroll__content ul li:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 35,
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'enrolled_info_style',
			array(
				'label' => __( 'Enrolled Info', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->normal_element(
			'enrolled_info',
			'{{WRAPPER}} .academy-elementor-enroll-widget .academy-widget-enroll__enrolled-info',
			[ 'background', 'padding' ]
		);

		$this->add_control(
			'enrolled_info_color',
			[
				'label' => esc_html__( 'Text Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-elementor-enroll-widget .academy-widget-enroll__enrolled-info' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'enrolled_info_date_color',
			[
				'label' => esc_html__( 'Date Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-elementor-enroll-widget .academy-widget-enroll__enrolled-info span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->button_style(
			[
				'title'          => esc_html__( 'Enroll Button', 'academy-elementor-addons' ),
				'slug'           => 'enroll_button',
				'selector'       => '{{WRAPPER}} .academy-elementor-enroll-widget .academy-widget-enroll__enroll-form button.academy-btn',
				'hover_selector' => '{{WRAPPER}} .academy-elementor-enroll-widget .academy-widget-enroll__enroll-form:hover .academy-btn',
			]
		);

		$this->button_style(
			[
				'title'          => esc_html__( 'Start Course/Continue Button', 'academy-elementor-addons' ),
				'slug'           => 'start_course_button',
				'selector'       => '{{WRAPPER}} .academy-elementor-enroll-widget .academy-widget-enroll__continue a',
				'hover_selector' => '{{WRAPPER}} .academy-elementor-enroll-widget .academy-widget-enroll__continue:hover a',
			]
		);

		$this->button_style(
			[
				'title'          => esc_html__( 'Complete Course Button', 'academy-elementor-addons' ),
				'slug'           => 'complete_course_button',
				'selector'       => '{{WRAPPER}} .academy-elementor-enroll-widget .academy-widget-enroll__complete-form button.academy-btn',
				'hover_selector' => '{{WRAPPER}} .academy-elementor-enroll-widget .academy-widget-enroll__complete-form button.academy-btn:hover',
			]
		);

		$this->button_style(
			[
				'title'          => esc_html__( 'Cart Button', 'academy-elementor-addons' ),
				'slug'           => 'cart_button',
				'selector'       => '{{WRAPPER}} .academy-elementor-enroll-widget .academy-widget-enroll__add-to-cart a',
				'hover_selector' => '{{WRAPPER}} .academy-elementor-enroll-widget .academy-widget-enroll__add-to-cart:hover a',
			]
		);

		$this->button_style(
			[
				'title'          => esc_html__( 'Wishlist Button', 'academy-elementor-addons' ),
				'slug'           => 'wishlist_button',
				'selector'       => '{{WRAPPER}} .academy-elementor-enroll-widget .academy-widget-enroll__wishlist-and-share .academy-add-to-wishlist-btn',
				'hover_selector' => '{{WRAPPER}} .academy-elementor-enroll-widget .academy-widget-enroll__wishlist-and-share .academy-add-to-wishlist-btn:hover',
			]
		);

		$this->button_style(
			[
				'title'          => esc_html__( 'Share Button', 'academy-elementor-addons' ),
				'slug'           => 'share_button',
				'selector'       => '{{WRAPPER}} .academy-elementor-enroll-widget .academy-widget-enroll__wishlist-and-share .academy-share-button',
				'hover_selector' => '{{WRAPPER}} .academy-elementor-enroll-widget .academy-widget-enroll__wishlist-and-share .academy-share-button:hover',
			]
		);

	}

	protected function render() { ?>
		<div class="academy-elementor-enroll-widget academy-widget-enroll">
			<?php do_action( 'academy/templates/single_course_enroll_content' ); ?>   
		</div>
	<?php }

}
