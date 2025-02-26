<?php

namespace AcademyEA\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use AcademyEA\Helper;
use AcademyEA\Traits\CommonStyle;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;

class CurriculumSidebar extends Widget_Base {

	use CommonStyle;

	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );
		add_filter( 'wp_ajax_nopriv_academy/shortcode/course_sidebar_bar', array( $this, 'force_show_course_side_bar' ) );
	}

	public function force_show_course_side_bar( $default ) {

		if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
			return true;
		}
		return $default;
	}


	public function get_name() {
		return 'academyea-curriculum-sidebar';
	}

	public function get_title() {
		return __( 'Curriculum Sidebar', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-sidebar';
	}

	public function get_categories() {
		return array( 'academyea-widgets' );
	}

	public function get_keywords() {
		return [ 'curriculum', 'Lessons', 'curriculum sidebar', 'sidebar' ];
	}


	protected function curriculum_sidebar_style() {
		$this->start_controls_section(
			'curriculum_sidebar_Section',
			[
				'label' => __( 'Curriculum Section Style', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,

			]
		);

		$this->normal_element(
			'curriculum_sidebar_Section_style',
			'{{WRAPPER}} .academy-course-learn-page-curriculums',
			[ 'background', 'padding', 'margin', 'border', 'box_shadow' ]
		);

		$this->end_controls_section();
	}
	protected function curriculum_sidebar_content_text_style() {
		$this->start_controls_section(
			'curriculum_sidebar_content_title_style',
			[
				'label' => __( 'Curriculum Tile Style', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,

			]
		);
		$this->normal_element(
			'curriculum_sidebar_content_main_title',
			'{{WRAPPER}} .academy-course-learn-page-curriculums .academy-lesson-sidebar-content__title h4 , {{WRAPPER}}  .academy-btn .academy-icon',
			[ 'typography', 'color' ]
		);
		$this->normal_element(
			'curriculum_sidebar_content_title',
			'{{WRAPPER}} .academy-course-learn-page-curriculums .academy-lesson-sidebar-content__title',
			[ 'background', 'padding', 'margin', 'border' ]
		);
		$this->end_controls_section();
	}
	protected function curriculum_sidebar_content_topics() {
		$this->start_controls_section(
			'curriculum_sidebar_content_topics_style',
			[
				'label' => __( 'Curriculum Topics Style', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,

			]
		);
		$this->normal_element(
			'curriculum_sidebar_content_main_topics',
			'{{WRAPPER}} .academy-learn-page-topics .academy-learn-page-topics-title__text',
			[ 'typography', 'color' ]
		);
		$this->normal_element(
			'curriculum_sidebar_content_topics',
			'{{WRAPPER}} .academy-learn-page-topics .academy-learn-page-topics-title',
			[ 'background', 'padding', 'margin', 'border' ]
		);
		$this->end_controls_section();
	}
	protected function curriculum_sidebar_content_lesson() {
		$this->start_controls_section(
			'curriculum_sidebar_content_lesson_style',
			[
				'label' => __( 'Curriculum lesson Style', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,

			]
		);
		$this->add_control(
			'curriculum_sidebar_content_lesson_icon',
			[
				'label' => esc_html__( 'Icon Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-learn-page-topics .academy-learn-page-topics-lesson-items .academy-learn-page-topics-lesson-item__btn .academy-entry-left .academy-icon:before, {{WRAPPER}}.academy-learn-page-topics .academy-learn-page-topics-lesson-items .academy-topics-lesson-item__btn .academy-entry-left .academy-icon:before' => 'color: {{VALUE}}',
				],
			]
		);
		$this->normal_element(
			'curriculum_sidebar_content_main_lesson',
			'{{WRAPPER}} .academy-learn-page-topics .academy-learn-page-topics-lesson-items .academy-learn-page-topics-lesson-item__btn, {{WRAPPER}}  .academy-learn-page-topics .academy-learn-page-topics-lesson-items .academy-topics-lesson-item__btn ',
			[ 'typography', 'color', 'padding' ]
		);
		$this->normal_element(
			'curriculum_sidebar_content_lesson',
			'{{WRAPPER}} .academy-learn-page-topics .academy-learn-page-topics-lesson-items .academy-learn-page-topics-lesson-item',
			[ 'background', 'margin', 'border' ]
		);
		$this->end_controls_section();
	}
	protected function curriculum_sidebar_content_sub_lesson() {
		$this->start_controls_section(
			'curriculum_sidebar_content_sub_lesson_style',
			[
				'label' => __( 'Curriculum Sub lesson Style', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,

			]
		);
		$this->add_control(
			'curriculum_sidebar_content_sub_lesson_icon',
			[
				'label' => esc_html__( 'Icon Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-learn-page-topics .academy-learn-page-topics-lesson-items .academy-learn-page-topics-sub-topics .academy-sub-topics-lesson-items .academy-sub-topics-lesson-item__btn .academy-entry-left .academy-icon:before' => 'color: {{VALUE}}',
				],
			]
		);
		$this->normal_element(
			'curriculum_sidebar_content_main_sub_lesson',
			'{{WRAPPER}} .academy-learn-page-topics .academy-learn-page-topics-lesson-items .academy-learn-page-topics-sub-topics .academy-sub-topics-lesson-items .academy-sub-topics-lesson-item__btn ',
			[ 'typography', 'color', 'padding' ]
		);
		$this->normal_element(
			'curriculum_sidebar_content_sub_lesson',
			'{{WRAPPER}} .academy-learn-page-topics .academy-learn-page-topics-lesson-items .academy-learn-page-topics-sub-topics .academy-sub-topics-lesson-items .academy-sub-topics-lesson-item',
			[ 'background', 'margin', 'border', 'padding' ]
		);
		$this->end_controls_section();
	}
	protected function register_controls() {
		$this->curriculum_sidebar_style();
		$this->curriculum_sidebar_content_text_style();
		$this->curriculum_sidebar_content_topics();
		$this->curriculum_sidebar_content_lesson();
		$this->curriculum_sidebar_content_sub_lesson();

	}

	protected function render() {
		$shortcode = '[academy_course_curriculums]';
		echo do_shortcode( $shortcode );
	}
}
