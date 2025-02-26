<?php

namespace AcademyEA\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use AcademyEA\Helper;
use AcademyEA\Traits\CommonStyle;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;

class CurriculumTopbar extends Widget_Base {

	use CommonStyle;

	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );
		add_filter( 'wp_ajax_nopriv_academy/shortcode/course_top_bar', array( $this, 'force_show_course_top_bar' ) );
	}

	public function force_show_course_top_bar( $default ) {

		if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
			return true;
		}
		return $default;
	}


	public function get_name() {
		return 'academyea-curriculum-topbar';
	}

	public function get_title() {
		return __( 'Curriculum Topbar', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-nav-menu';
	}

	public function get_categories() {
		return array( 'academyea-widgets' );
	}

	public function get_keywords() {
		return [ 'curriculum', 'Lessons', 'curriculum top' ];
	}

	protected function curriculum_top_section_style() {
		$this->start_controls_section(
			'curriculum_top_section',
			[
				'label' => __( 'Curriculum Section Style', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'curriculum_top_section_bg',
				'label' => __( 'Curriculum Background Color', 'academy-elementor-addons' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .academy-lesson-topbar',
			]
		);
		$this->add_control(
			'curriculum_top_section_bg_margin',
			[
				'label' => esc_html__( 'Curriculum Section Margin', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => 2,
					'right' => 0,
					'bottom' => 2,
					'left' => 0,
					'unit' => 'em',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .academy-lesson-topbar' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'curriculum_top_section_bg_padding',
			[
				'label' => esc_html__( 'Curriculum Section Padding', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => 2,
					'right' => 0,
					'bottom' => 2,
					'left' => 0,
					'unit' => 'em',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .academy-lesson-topbar' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'description' => 'Curriculum Section Close Button Color',
				'separator' => 'after',
			]
		);
		$this->add_control(
			'curriculum_top_section_cancel_button',
			[
				'label' => esc_html__( 'Curriculum Close Button Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-lesson-topbar__right .academy-course-close .academy-icon:before' => 'color: {{VALUE}}',
					'{{WRAPPER}} .academy-lesson-topbar__right .academy-course-close' => 'border-color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();
	}

	protected function curriculum_top_logo() {
		$this->start_controls_section(
			'curriculum_top_logo_content',
			[
				'label' => __( 'Curriculum Logo', 'academy-elementor-addons' ),
			]
		);
		$this->add_control(
			'curriculum_top_show_logo',
			[
				'label' => esc_html__( 'Logo Show/Hidden', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'block',
				'options' => [
					'block' => esc_html__( 'Show', 'academy-elementor-addons' ),
					'none' => esc_html__( 'Hidden', 'academy-elementor-addons' ),
				],
				'selectors' => [
					'{{WRAPPER}} .academy-logo img, {{WRAPPER}} .academy-lesson-topbar__left .topbar-hr' => 'display: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function curriculum_top_logo_style() {
		$this->start_controls_section(
			'curriculum_top_logo_style',
			[
				'label' => __( 'Curriculum Logo Style', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'curriculum_top_show_logo' => 'block',
				],
			]
		);
		$this->add_control(
			'curriculum_top_logo_width',
			[
				'label' => esc_html__( 'Logo Width', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],

				'selectors' => [
					'{{WRAPPER}} .academy-logo img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Css_Filter::get_type(),
			[
				'name' => 'curriculum_top_logo_filters',
				'selector' => '{{WRAPPER}} .academy-logo img ',
				'description' => 'Logo Border Right',

			]
		);

		$this->add_control(
			'curriculum_top_logo_border_width',
			[
				'label' => esc_html__( 'Right Border Width', 'academy-elementor-addons' ),

				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 10,
						'step' => 2,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],

				'selectors' => [
					'{{WRAPPER}} .academy-lesson-topbar__left .topbar-hr' => 'width: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',

			],
		);
		$this->add_control(
			'curriculum_top_logo_border_color',
			[
				'label' => esc_html__( 'Right Border Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-lesson-topbar__left .topbar-hr' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();
	}

	protected function curriculum_title_content() {
		$this->start_controls_section(
			'curriculum_top_title_content',
			[
				'label' => __( 'Curriculum Title', 'academy-elementor-addons' ),

			]
		);
		$this->add_control(
			'curriculum_top_show_title',
			[
				'label' => esc_html__( 'Title Show/Hidden', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'block',
				'options' => [
					'block' => esc_html__( 'Show', 'academy-elementor-addons' ),
					'none' => esc_html__( 'Hidden', 'academy-elementor-addons' ),
				],
				'selectors' => [
					'{{WRAPPER}} .academy-lesson-topbar__left .academy-course-title a' => 'display: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
	}

	protected function curriculum_title_style() {
		$this->start_controls_section(
			'curriculum_top_title_style',
			[
				'label' => __( 'Curriculum Title Style', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'curriculum_top_show_title' => 'block',
				],
			]
		);
		$this->add_control(
			'curriculum_top_title_color',
			[
				'label' => esc_html__( 'Curriculum Title Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-lesson-topbar__left .academy-course-title a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'curriculum_top_title_typography',
				'label' => __( 'Title Typography', 'academy-elementor-addons' ),
				'selector' => '{{WRAPPER}} .academy-lesson-topbar__left .academy-course-title a',
			]
		);
		$this->end_controls_section();
	}

	protected function curriculum_top_progress() {
		$this->start_controls_section(
			'curriculum_top_progress_content',
			[
				'label' => __( 'Curriculum Progress Bar', 'academy-elementor-addons' ),

			]
		);

		$this->add_control(
			'curriculum_top_progress_text',
			[
				'label' => esc_html__( 'Progressbar Text Show/Hidden', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'flex',
				'options' => [
					'flex' => esc_html__( 'Show', 'academy-elementor-addons' ),
					'none' => esc_html__( 'Hidden', 'academy-elementor-addons' ),
				],
				'selectors' => [
					'{{WRAPPER}} .academy-course-progress__label' => 'display: {{VALUE}};',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'curriculum_top_progress_title',
			[
				'label' => esc_html__( 'Progressbar Text', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Your Progress', 'academy-elementor-addons' ),
				'placeholder' => esc_html__( 'Type your title here', 'academy-elementor-addons' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'curriculum_top_progress_main',
			[
				'label' => esc_html__( 'Progressbar Show/Hidden', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'block',
				'options' => [
					'block' => esc_html__( 'Show', 'academy-elementor-addons' ),
					'none' => esc_html__( 'Hidden', 'academy-elementor-addons' ),
				],
				'selectors' => [
					'{{WRAPPER}} .academy-progressbar' => 'display: {{VALUE}};',
				],
				'label_block' => true,
			]
		);
		$this->end_controls_section();
	}

	protected function curriculum_top_progress_style() {
		$this->start_controls_section(
			'curriculum_top_progress_style_main',
			[
				'label' => __( 'Curriculum Progress Main', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'curriculum_top_progress_main' => 'block',
				],
			]
		);
		$this->add_control(
			'curriculum_top_progress_width_height',
			[
				'label' => esc_html__( 'Curriculum Width', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .academy-progressbar svg' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .academy-course-progress .academy-progressbar svg' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'curriculum_top_progress_main_color',
			[
				'label' => esc_html__( 'Progress Bar Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-progressbar svg circle' => 'stroke: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'ProgressBar Round Text Typography', 'academy-elementor-addons' ),
				'name' => 'curriculum_top_progress_main_round_typography',
				'selector' => '{{WRAPPER}} .academy-progressbar__text',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'curriculum_top_progress_main_round_color',
			[
				'label' => esc_html__( 'ProgressBar Round Text Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-progressbar__text' => 'color: {{VALUE}}',
				],

			]
		);

		$this->add_control(
			'curriculum_top_progress_label_color',
			[
				'label' => esc_html__( 'ProgressBar Label Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-course-progress__label p' => 'color: {{VALUE}}',
				],
				'separator' => 'before',

			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'ProgressBar label Typography', 'academy-elementor-addons' ),
				'name' => 'curriculum_top_progress_label_typography',
				'selector' => '{{WRAPPER}} .academy-course-progress__label p',
			]
		);

		$this->add_control(
			'curriculum_top_progress_label_icon_color',
			[
				'label' => esc_html__( 'ProgressBar Label Icon Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-course-progress__label .academy-icon' => 'color: {{VALUE}}',
				],
				'separator' => 'before',
			]
		);
		$this->add_control(
			'curriculum_top_progress_label_icon_width',
			[
				'label' => esc_html__( 'Width', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],

				'selectors' => [
					'{{WRAPPER}} .academy-course-progress__label .academy-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
	}

	protected function curriculum_top_share_content() {
		$this->start_controls_section(
			'curriculum_top_share',
			[
				'label' => __( 'Curriculum Share', 'academy-elementor-addons' ),

			]
		);
		$this->add_control(
			'curriculum_top_show_share',
			[
				'label' => esc_html__( 'Share Button Show/Hidden', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'block',
				'options' => [
					'block' => esc_html__( 'Show', 'academy-elementor-addons' ),
					'none' => esc_html__( 'Hidden', 'academy-elementor-addons' ),
				],
				'selectors' => [
					'{{WRAPPER}} .academy-lesson-topbar__right .academy-btn--share' => 'display: {{VALUE}};',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'curriculum_top_share_text',
			[
				'label' => esc_html__( 'Share Text', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Share', 'academy-elementor-addons' ),
				'placeholder' => esc_html__( 'Type your title here', 'academy-elementor-addons' ),
				'label_block' => true,
			]
		);
		$this->end_controls_section();
	}

	protected function curriculum_top_share_style() {
		$this->start_controls_section(
			'curriculum_top_share_button',
			[
				'label' => __( 'Curriculum Share', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'curriculum_top_show_share' => 'block',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'curriculum_top_share_button_typography',
				'selector' => '{{WRAPPER}} .academy-btn--share',
			]
		);
		$this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'curriculum_top_share_button_normal',
			[
				'label' => esc_html__( 'Normal', 'academy-elementor-addons' ),
			]
		);
		$this->normal_element(
			'curriculum_top_share_button_normal_style',
			'{{WRAPPER}} .academy-btn--share',
			[ 'color', 'background', 'border', 'radius', 'box_shadow' ]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'curriculum_top_share_button_hover',
			[
				'label' => esc_html__( 'Hover', 'academy-elementor-addons' ),
			]
		);
		$this->normal_element(
			'curriculum_top_share_button_hover_style',
			'{{WRAPPER}} .academy-btn--share:hover',
			[ 'color', 'background', 'border' ]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();
	}

	protected function register_controls() {

		/**
		 * Curriculum Logo
		 */
		$this->curriculum_top_logo();

		/**
		 * Curriculum Title
		 */
		$this->curriculum_title_content();

		/**
		 * Curriculum Progress
		 */
		$this->curriculum_top_progress();
		/**
		 * Curriculum Share
		 */
		$this->curriculum_top_share_content();
		/**
		 * Curriculum Section
		 */
		$this->curriculum_top_section_style();
		$this->curriculum_top_logo_style();
		$this->curriculum_title_style();
		$this->curriculum_top_progress_style();
		$this->curriculum_top_share_style();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		?>

		<?php
		$attr_array = [
			'progress_ber_text' => $settings['curriculum_top_progress_title'],
			'share_text' => $settings['curriculum_top_share_text'],
		];
		$shortcode = '[academy_course_curriculum_topbar ' . Helper::attr_shortcode( $attr_array ) . ']';
		echo do_shortcode( $shortcode );
	}
}
