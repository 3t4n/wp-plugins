<?php
namespace AcademyEA\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use AcademyEA\Helper;
use AcademyEA\Traits\CommonStyle;

class CourseCategories extends Widget_Base {
	use CommonStyle;

	public function get_name() {
		return 'academyea-course-categories';
	}

	public function get_title() {
		return __( 'Course Categories', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-flow';
	}

	public function get_categories() {
		return array( 'academyea-widgets' );
	}

	public function get_keywords() {
		return [ 'course categories', 'course', 'categories', 'academy', 'lms' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'course_categories_content',
			[
				'label' => __( 'Course Categories', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'course_category_html_tag',
			[
				'label'   => __( 'Category HTML Tag', 'academy-elementor-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => Helper::html_tag_lists(),
				'default' => 'h3',
			]
		);

		$this->add_control(
			'course_category_separator',
			[
				'label'   => __( 'Category Separator', 'academy-elementor-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					' '   => __( 'Space', 'academy-elementor-addons' ),
					', '   => __( 'Comma', 'academy-elementor-addons' ),
					' | '   => __( 'Vertical Bar', 'academy-elementor-addons' ),
					' || '   => __( 'Vertical Double Bar', 'academy-elementor-addons' ),
				],
				'default' => ' ',
			]
		);

		$this->add_responsive_control(
			'course_category_align',
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

		$this->end_controls_section();

		// Product Style
		$this->start_controls_section(
			'course_category_style_section',
			array(
				'label' => __( 'Course Category', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->normal_element(
			'course_category',
			'{{WRAPPER}} .academy-single-course__categroy a',
			[ 'typography', 'color', 'margin' ]
		);

		$this->normal_element(
			'course_category',
			'{{WRAPPER}} .academy-single-course__categroy a',
			[ 'background', 'padding', 'border', 'radius' ],
			[
				'course_category_separator' => ' ',
			],
		);

		$this->normal_element(
			'course_category_general',
			'{{WRAPPER}} .academy-single-course__categroy',
			[ 'background', 'padding', 'border', 'radius' ],
			[
				'course_category_separator!' => ' ',
			],
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'course_category_separator_style',
			array(
				'label' => __( 'Category Separator', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'course_category_separator!' => ' ',
				],
			)
		);

		$this->normal_element(
			'category_separator',
			'{{WRAPPER}} .academy-single-course__categroy',
			[ 'typography', 'color' ],
			[
				'course_category_separator!' => ' ',
			],
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$category_html_tag = Helper::validate_html_tag( $settings['course_category_html_tag'] );
		$category_separator = $settings['course_category_separator'] ? $settings['course_category_separator'] : ' ';
		$course_id = ( \Elementor\Plugin::$instance->editor->is_edit_mode() || Helper::is_academyea_preview_mode() ) ? Helper::get_last_course_id() : get_the_ID();
		$category_list = Helper::get_course_category_list( $course_id, $category_separator );

		if ( $category_list ) :
			echo sprintf( "<%s class='academy-single-course__categroy'>%s</%s>", esc_html( $category_html_tag ), wp_kses_post( $category_list ), esc_html( $category_html_tag ) );
		elseif ( \Elementor\Plugin::instance()->editor->is_edit_mode() ) :
			echo '<div class="no-data-message">' . wp_kses_post( __( '<strong>Editor Only Message:</strong> Please add course category in latest course from the course editor', 'academy-elementor-addons' ) ) . '</div>';
		endif;

	}

}
