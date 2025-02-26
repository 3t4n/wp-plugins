<?php
namespace AcademyEA\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use AcademyEA\Helper;
use AcademyEA\Traits\CommonStyle;

class CoursePrice extends Widget_Base {
	use CommonStyle;

	public function get_name() {
		return 'academyea-course-price';
	}

	public function get_title() {
		return __( 'Course Price', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-price-list';
	}

	public function get_categories() {
		return array( 'academyea-widgets' );
	}

	public function get_keywords() {
		return [ 'course price', 'course', 'price', 'academy', 'lms' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'course_price_options',
			[
				'label' => __( 'General Options', 'academy-elementor-addons' ),
			]
		);

		$this->add_responsive_control(
			'course_price_align',
			[
				'label'        => __( 'Alignment', 'academy-elementor-addons' ),
				'type'         => Controls_Manager::CHOOSE,
				'options'      => [
					'left'   => [
						'title' => __( 'Left', 'academy-elementor-addons' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'academy-elementor-addons' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right'  => [
						'title' => __( 'Right', 'academy-elementor-addons' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
				'default'      => 'left',
			]
		);

		$this->add_control(
			'course_price_free_text',
			[
				'label'   => __( 'Free Text', 'academy-elementor-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Free', 'academy-elementor-addons' ),
				'description' => __( 'If the course is free, this text will take effect.', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'course_price_paid_text',
			[
				'label'   => __( 'Paid Text', 'academy-elementor-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Paid', 'academy-elementor-addons' ),
				'description' => __( 'If Paid but there is no price this text will take effect.', 'academy-elementor-addons' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'course_price_style',
			array(
				'label' => __( 'Price Style', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->start_controls_tabs( 'course_price_style_tabs' );

			$this->start_controls_tab(
				'course_price_normal_style_tab',
				[
					'label' => __( 'Normal', 'academy-elementor-addons' ),
				]
			);

			$this->normal_element(
				'course_price_normal',
				'{{WRAPPER}} .academy-course-price ins .amount',
				[ 'typography', 'color' ]
			);

			$this->end_controls_tab();

			$this->start_controls_tab(
				'course_price_strike_style_tab',
				[
					'label' => __( 'Strike', 'academy-elementor-addons' ),
				]
			);

			$this->normal_element(
				'course_price_strike',
				'{{WRAPPER}} .academy-course-price del .amount',
				[ 'typography', 'color' ]
			);

			$this->end_controls_tab();

			$this->start_controls_tab(
				'course_price_type_style_tab',
				[
					'label' => __( 'Type', 'academy-elementor-addons' ),
				]
			);

			$this->normal_element(
				'course_price_type',
				'{{WRAPPER}} .academy-course-type',
				[ 'typography', 'color' ]
			);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$course_id = ( \Elementor\Plugin::$instance->editor->is_edit_mode() || Helper::is_academyea_preview_mode() ) ? Helper::get_last_course_id() : get_the_ID();
		$is_paid   = \Academy\Helper::is_course_purchasable( $course_id );
		$price     = '';
		if ( \Academy\Helper::is_active_woocommerce() && $is_paid ) :
			$product_id = \Academy\Helper::get_course_product_id( $course_id );
			if ( $product_id ) :
				$product = wc_get_product( $product_id );
				if ( $product ) {
					$price   = $product->get_price_html();
				}
			endif;
		endif;
		if ( $is_paid && $price ) :
			echo sprintf( "<div class='academy-course-price'>%s</div>", wp_kses_post( $price ) );
		elseif ( $is_paid && ( '' === $price ) ) :
			echo sprintf( "<div class='academy-course-type'>%s</div>", esc_html( $settings['course_price_paid_text'] ) );
		else :
			echo sprintf( "<div class='academy-course-type'>%s</div>", esc_html( $settings['course_price_free_text'] ) );
		endif;

	}

}


