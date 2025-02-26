<?php

namespace AcademyEA\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use AcademyEA\Traits\CommonStyle;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;

class CurriculumContent extends Widget_Base {

	use CommonStyle;

	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );
		add_filter( 'wp_ajax_nopriv_academy/shortcode/course_sidebar_bar', array( $this, 'force_show_course_side_bar' ) );
	}

	public function force_show_course_side_bar( $default ) {

		if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
			return false;
		}
		return $default;
	}


	public function get_name() {
		return 'academyea-curriculum-content';
	}

	public function get_title() {
		return __( 'Curriculum Content', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-post-content';
	}

	public function get_categories() {
		return array( 'academyea-widgets' );
	}

	public function get_keywords() {
		return [ 'curriculum', 'Lessons', 'curriculum Content', 'content' ];
	}

	protected function curriculum_lessons_Section_style() {
		$this->start_controls_section(
			'curriculum_lessons_Section',
			[
				'label' => __( 'Curriculum Common Lessons', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,

			]
		);

		$this->normal_element(
			'curriculum_lessons_Section_style',
			'{{WRAPPER}} .academy-lessons .academy-lessons-content-wrap .academy-lessons-content ',
			[ 'background', 'padding', 'border', 'box_shadow' ]
		);
		$this->normal_element(
			'curriculum_lessons_Section_margin',
			'{{WRAPPER}} .academy-lesson-content-wrapper',
			[ 'margin' ]
		);
		$this->end_controls_section();
	}

	protected function curriculum_assignment_Section_style() {
		$this->start_controls_section(
			'curriculum_assignment_Section',
			[
				'label' => __( 'Curriculum assignment', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,

			]
		);
		$this->add_control(
			'curriculum_assignment_Section_title_color',
			[
				'label' => esc_html__( 'Assignment Title Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-course-single-lessons h5' => 'color: {{VALUE}}',
				],

			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'curriculum_assignment_Section_title',
				'label' => __( 'Assignment Title Typography', 'academy-elementor-addons' ),
				'selector' => '{{WRAPPER}} .academy-assignment-content__header',

			]
		);

		$this->add_control(
			'curriculum_assignment_header-item_color',
			[
				'label' => esc_html__( 'Assignment  Header Item Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-assignment-content__header p' => 'color: {{VALUE}}',
				],
				'separator' => 'before',

			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'curriculum_assignment_header-item',
				'label' => __( 'Assignment Header Item Typography', 'academy-elementor-addons' ),
				'selector' => '{{WRAPPER}} .academy-assignment-content__header p',

			]
		);
		$this->add_control(
			'curriculum_assignment_details-title_color',
			[
				'label' => esc_html__( 'Assignment  Details Title Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-assignment-content__details-title' => 'color: {{VALUE}}',
				],
				'separator' => 'before',

			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'curriculum_assignment_details-typography',
				'label' => __( 'Assignment Details Title Typography', 'academy-elementor-addons' ),
				'selector' => '{{WRAPPER}} .academy-assignment-content__details-title',
				'separator' => 'after',
			]
		);
		$this->normal_element(
			'curriculum_assignment_details',
			'{{WRAPPER}} .academy-assignment-content__description',
			[ 'background', 'padding', 'margin', 'border', 'box_shadow' ]
		);

		$this->end_controls_section();
	}

	protected function curriculum_assignment_tab() {
		$this->start_controls_section(
			'curriculum_tab_Section',
			[
				'label' => __( 'Curriculum Tab', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,

			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'curriculum_tab_Section_background',
				'label' => __( 'Curriculum Tab Body BG', 'academy-elementor-addons' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} ..academy-lesson-tab__body',
			]
		);
		$this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Q&A', 'academy-elementor-addons' ),
			]
		);
		$this->add_control(
			'curriculum_tab_Section_color',
			[
				'label' => esc_html__( 'Q&A Title Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-lesson-browseqa-wrap .academy-question-form__heading' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'curriculum_tab_Q&A_Section_Typography',
				'label' => __( 'Q&A Title Typography', 'academy-elementor-addons' ),
				'selector' => '{{WRAPPER}} .academy-lesson-browseqa-wrap .academy-question-form__heading',

			]
		);
		$this->add_control(
			'curriculum_tab_Q_A_Section_color',
			[
				'label' => esc_html__( 'Q&A Form Text Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-lesson-browseqa-wrap .academy-question-form form input::placeholder, {{WRAPPER}}.academy-lesson-browseqa-wrap .academy-question-form form textarea::placeholder ' => 'color: {{VALUE}}',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'curriculum_tab_Q_A_Section_Typography',
				'label' => __( 'Q&A Form Text Typography', 'academy-elementor-addons' ),
				'selector' => '{{WRAPPER}} .academy-lesson-browseqa-wrap .academy-question-form form input::placeholder, {{WRAPPER}}.academy-lesson-browseqa-wrap .academy-question-form form textarea::placeholder ',

			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'Q&A_form_border',
				'label' => __( 'Q&A Form Border', 'academy-elementor-addons' ),
				'selector' => '{{WRAPPER}} .academy-lesson-browseqa-wrap .academy-question-form form input, {{WRAPPER}}.academy-lesson-browseqa-wrap .academy-question-form form textarea',
				'separator' => 'after',

			]
		);

		$this->end_controls_tab();
		$this->start_controls_tab(
			'style_announcement_tab',
			[
				'label' => esc_html__( 'Announcement', 'academy-elementor-addons' ),
			]
		);
		$this->normal_element(
			'announcement_section',
			'{{WRAPPER}} .academy-announcements-wrap .academy-announcement-item',
			[ 'background', 'padding', 'border', 'box_shadow' ]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
	}
	protected function curriculum_button() {
		$this->start_controls_section(
			'curriculum_button_global',
			[
				'label' => __( 'Global Button', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,

			]
		);
		$this->start_controls_tabs(
			'style_btn_tabs'
		);

		$this->start_controls_tab(
			'btn_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'academy-elementor-addons' ),
			]
		);
		$this->normal_element(
			'curriculum_button_global_style',
			'{{WRAPPER}} .academy-lesson-content-wrapper .academy-btn',
			[ 'background', 'padding', 'margin', 'border', 'box_shadow' ]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'btn_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'academy-elementor-addons' ),
			]
		);
		$this->normal_element(
			'curriculum_button_hover_global_style',
			'{{WRAPPER}} .academy-lesson-content-wrapper .academy-btn',
			[ 'background', 'padding', 'border', 'box_shadow' ]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();
	}
	protected function register_controls() {

		/**
		 * Curriculum Section
		 */
		$this->curriculum_lessons_Section_style();
		$this->curriculum_button();
		$this->curriculum_assignment_Section_style();
		$this->curriculum_assignment_tab();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		?>
		<div class="academyea-widget-dashboards"><?php echo do_shortcode( '[academy_course_curriculum_content]' ); ?></div>
		<?php

	}
}
