<?php

namespace AcademyEA\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use AcademyEA\Helper;
use AcademyEA\Traits\CommonStyle;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;

class CourseTitle extends Widget_Base {

	use CommonStyle;

	public function get_name() {
		return 'academyea-course-title';
	}

	public function get_title() {
		return __( 'Course Title', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-t-letter';
	}

	public function get_categories() {
		return array( 'academyea-widgets' );
	}

	public function get_keywords() {
		return [ 'course title', 'course', 'title', 'academy', 'lms' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'course_title_content',
			[
				'label' => __( 'Course Title', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'course_title_html_tag',
			[
				'label' => __( 'Title HTML Tag', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => Helper::html_tag_lists(),
				'default' => 'h2',

			]
		);

		$this->add_responsive_control(
			'course_title_align',
			[
				'label' => __( 'Alignment', 'academy-elementor-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'academy-elementor-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'academy-elementor-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'academy-elementor-addons' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
				'default' => 'left',
			]
		);

		$this->end_controls_section();

		// Product Style
		$this->start_controls_section(
			'course_title_style_section',
			array(
				'label' => __( 'Course Title', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->normal_element(
			'course_title',
			'{{WRAPPER}} .academy-single-course__title',
			[ 'typography', 'color', 'margin' ]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$title_html_tag = Helper::validate_html_tag( $settings['course_title_html_tag'] );
		$course_id = ( \Elementor\Plugin::$instance->editor->is_edit_mode() || Helper::is_academyea_preview_mode() ) ? Helper::get_last_course_id() : get_the_ID();
		$title = get_the_title( $course_id );
		?>
		<div class="academy-single-course__title-wrrap">
			<?php
			echo sprintf( "<%s class='academy-single-course__title'>%s</%s>", esc_html( $title_html_tag ), esc_html( $title ), esc_html( $title_html_tag ) );

			?>
		</div>
		<?php
	}

}
