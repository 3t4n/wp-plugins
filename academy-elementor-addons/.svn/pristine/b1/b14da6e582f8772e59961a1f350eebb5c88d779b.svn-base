<?php
namespace AcademyEA\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use AcademyEA\Helper;
use AcademyEA\Traits\CommonStyle;

class CourseTags extends Widget_Base {
	use CommonStyle;

	public function get_name() {
		return 'academyea-course-tags';
	}

	public function get_title() {
		return __( 'Course Tags', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-tags';
	}

	public function get_categories() {
		return array( 'academyea-widgets' );
	}

	public function get_keywords() {
		return [ 'course tags', 'course', 'tags', 'academy', 'lms' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'course_tags_content',
			[
				'label' => __( 'Course Tags', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'course_tags_html_tag',
			[
				'label'   => __( 'Tags HTML Tag', 'academy-elementor-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => Helper::html_tag_lists(),
				'default' => 'h3',
			]
		);

		$this->add_control(
			'course_tag_separator',
			[
				'label'   => __( 'Tag Separator', 'academy-elementor-addons' ),
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
			'course_tags_align',
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

		$this->start_controls_section(
			'course_tag_style_section',
			array(
				'label' => __( 'Course Tags', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->normal_element(
			'course_tags',
			'{{WRAPPER}} .academy-single-course__tag a',
			[ 'typography', 'color', 'margin' ]
		);

		$this->normal_element(
			'course_tags',
			'{{WRAPPER}} .academy-single-course__tag a',
			[ 'background', 'padding', 'border', 'radius' ],
			[
				'course_tag_separator' => ' ',
			],
		);

		$this->normal_element(
			'course_tag_general',
			'{{WRAPPER}} .academy-single-course__tag',
			[ 'background', 'padding', 'border', 'radius' ],
			[
				'course_tag_separator!' => ' ',
			],
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'course_tag_separator_style',
			array(
				'label' => __( 'Tag Separator', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'course_tag_separator!' => ' ',
				],
			)
		);

		$this->normal_element(
			'tag_separator',
			'{{WRAPPER}} .academy-single-course__tag',
			[ 'typography', 'color' ],
			[
				'course_tag_separator!' => ' ',
			],
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$tags_html_tag = Helper::validate_html_tag( $settings['course_tags_html_tag'] );
		$tag_separator = $settings['course_tag_separator'] ? $settings['course_tag_separator'] : ' ';
		$course_id = ( \Elementor\Plugin::$instance->editor->is_edit_mode() || Helper::is_academyea_preview_mode() ) ? Helper::get_last_course_id() : get_the_ID();
		$tag_list = Helper::get_course_tag_list( $course_id, $tag_separator );

		if ( $tag_list ) :
			echo sprintf( "<%s class='academy-single-course__tag'>%s</%s>", esc_html( $tags_html_tag ), wp_kses_post( $tag_list ), esc_html( $tags_html_tag ) );
		elseif ( \Elementor\Plugin::instance()->editor->is_edit_mode() ) :
			echo '<div class="no-data-message">' . wp_kses_post( __( '<strong>Editor Only Message:</strong> Please add course tag in latest course from the course editor', 'academy-elementor-addons' ) ) . '</div>';
		endif;
	}

}
