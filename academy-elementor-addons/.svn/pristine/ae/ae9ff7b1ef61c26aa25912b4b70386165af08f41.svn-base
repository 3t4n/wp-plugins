<?php
namespace AcademyEA\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use AcademyEA\Helper;
use AcademyEA\Traits\CommonStyle;

class CourseDescription extends Widget_Base {
	use CommonStyle;

	public function get_name() {
		return 'academyea-course-description';
	}

	public function get_title() {
		return __( 'Course Description', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-document-file';
	}

	public function get_categories() {
		return array( 'academyea-widgets' );
	}

	public function get_keywords() {
		return [ 'course description', 'course', 'description', 'academy', 'lms' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'course_description_content',
			[
				'label' => __( 'Course Description', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'course_desc_heading',
			[
				'label'   => __( 'Description Heading', 'academy-elementor-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Course Overview', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'course_desc_heading_tag',
			[
				'label'   => __( 'Description Heading Tag', 'academy-elementor-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => Helper::html_tag_lists(),
				'default' => 'h3',
			]
		);

		$this->end_controls_section();

		// Description Heading
		$this->start_controls_section(
			'course_desc_heading_section',
			array(
				'label' => __( 'Heading', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->normal_element(
			'course_desc_heading',
			'{{WRAPPER}} .academy-single-course__content-item--description-title',
			[ 'typography', 'color' ]
		);

		$this->add_responsive_control(
			'course_desc_heading_gap',
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
					'{{WRAPPER}} .academy-single-course__content-item--description-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 10,
				],
			]
		);

		$this->end_controls_section();

		// Description Content
		$this->start_controls_section(
			'course_desc_content_section',
			array(
				'label' => __( 'Content', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->normal_element(
			'course_desc_content',
			'
				{{WRAPPER}} .academy-single-course__content-item--description p,
				{{WRAPPER}} .academy-single-course__content-item--description span,
				{{WRAPPER}} .academy-single-course__content-item--description li,
				{{WRAPPER}} .academy-single-course__content-item--description a',
			[ 'typography' ]
		);

		$this->normal_element(
			'course_desc_content',
			'
				{{WRAPPER}} .academy-single-course__content-item--description p,
				{{WRAPPER}} .academy-single-course__content-item--description .wp-block-heading,
				{{WRAPPER}} .academy-single-course__content-item--description span,
				{{WRAPPER}} .academy-single-course__content-item--description li,
				{{WRAPPER}} .academy-single-course__content-item--description cite,
				{{WRAPPER}} .academy-single-course__content-item--description figcaption,
				{{WRAPPER}} .academy-single-course__content-item--description code,
				{{WRAPPER}} .academy-single-course__content-item--description a',
			[ 'color' ]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$markup = '';
		$desc_heading_tag = Helper::validate_html_tag( $settings['course_desc_heading_tag'] );
		$desc_heading = $settings['course_desc_heading'];
		$course_id = ( \Elementor\Plugin::$instance->editor->is_edit_mode() || Helper::is_academyea_preview_mode() ) ? Helper::get_last_course_id() : get_the_ID();
		$content = get_post_field( 'post_content', $course_id );
		if ( ! \Elementor\Plugin::instance()->editor->is_edit_mode() ) {
			$content = apply_filters( 'the_content', $content );
		}
		$content = str_replace( ']]>', ']]&gt;', $content );

		if ( ! empty( $content ) ) :
			$markup = "<div class='academy-single-course__content-item academy-single-course__content-item--description'>
            <" . esc_attr( $desc_heading_tag ) . " class='academy-single-course__content-item--description-title'>" . esc_html( $desc_heading ) . '</' . esc_attr( $desc_heading_tag ) . "><div class='academy-single-course__content-item--description'>" . $content . '</div></div>';
		elseif ( \Elementor\Plugin::instance()->editor->is_edit_mode() ) :
			$markup = '<div class="no-data-message">' . wp_kses_post( __( '<strong>Editor Only Message:</strong> Please add course description in latest course from the course editor', 'academy-elementor-addons' ) ) . '</div>';
		endif;
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo $markup;
	}

}
