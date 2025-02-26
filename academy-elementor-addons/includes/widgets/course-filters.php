<?php
namespace AcademyEA\Widgets;

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use AcademyEA\Traits\CommonStyle;

class CourseFilters extends Widget_Base {
	use CommonStyle;

	public function get_name() {
		return 'academyea-course-filters';
	}

	public function get_title() {
		return esc_html__( 'Course Filters', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-filter';
	}

	public function get_categories() {
		return [ 'academyea-widgets' ];
	}

	public function get_keywords() {
		return [ 'course', 'filter', 'course filter', 'lms' ];
	}

	protected function register_controls() {
		// Typography Options
		$this->start_controls_section(
			'course_filters_typography_options',
			[
				'label' => __( 'Typography Options', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'course_filters_item_heading_typography',
				'label' => __( 'Label Typography', 'academy-elementor-addons' ),
				'selector' => '{{WRAPPER}} .academy-course-filters .academy-archive-course-widget__title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'course_filters_item_label_typography',
				'label' => __( 'Item Typography', 'academy-elementor-addons' ),
				'selector' => '{{WRAPPER}} .academy-course-filters .academy-archive-course-widget__body label',
			]
		);

		$this->end_controls_section();

		// Search Box Styling Options
		$this->start_controls_section(
			'course_filters_search_style_options',
			[
				'label' => __( 'Search Options', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'course_filters_search_typography',
				'label' => __( 'Typography', 'academy-elementor-addons' ),
				'selector' => '{{WRAPPER}} .academy-course-filters .academy-archive-course-widget--search input.academy-archive-course-search',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'course_filters_search_border',
				'selector' => '{{WRAPPER}} .academy-course-filters .academy-archive-course-widget--search input.academy-archive-course-search',
			]
		);

		$this->add_control(
			'course_filters_search_background',
			[
				'label' => esc_html__( 'Background Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-course-filters .academy-archive-course-widget--search input.academy-archive-course-search' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'course_filters_search_color',
			[
				'label' => esc_html__( 'Input Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-course-filters .academy-archive-course-widget--search input.academy-archive-course-search' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'course_filters_search_placeholder_color',
			[
				'label' => esc_html__( 'Input Placeholder Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-course-filters .academy-archive-course-widget--search input.academy-archive-course-search::placeholder' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		// Checkbox Styling Option
		$this->start_controls_section(
			'course_filters_checkbox_style_options',
			[
				'label' => __( 'Checkbox Options', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'course_filters_checkbox_size',
			[
				'label' => esc_html__( 'Checkbox Size', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 100,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .academy-course-filters .academy-archive-course-widget__body label .checkmark' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'course_filters_checkbox_border_size',
			[
				'label' => esc_html__( 'Checkbox Border Size', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 20,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 2,
				],
				'selectors' => [
					'{{WRAPPER}} .academy-course-filters .academy-archive-course-widget__body label .checkmark' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'course_filters_checkbox_border_color',
			[
				'label' => esc_html__( 'Border Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-course-filters .academy-archive-course-widget__body label .checkmark' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'course_filters_checkbox_checked_background',
			[
				'label' => esc_html__( 'Checked Background', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-course-filters .academy-archive-course-widget__body label input:checked ~ .checkmark' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'course_filters_checkbox_checked_color',
			[
				'label' => esc_html__( 'Checked Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-course-filters .academy-archive-course-widget__body label .checkmark:after' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		// Spacing Styling Option
		$this->start_controls_section(
			'course_filters_spacing_style_options',
			[
				'label' => __( 'Spacing Options', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'course_filters_widgets_heading_spacing',
			[
				'label' => esc_html__( 'Filter Widgets Heading', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 200,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .academy-course-filters .academy-archive-course-widget__title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'course_filters_widgets_spacing',
			[
				'label' => esc_html__( 'Space Between Filter Widgets', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 200,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} .academy-course-filters .academy-archive-course-widget' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'course_filters_widget_item_spacing',
			[
				'label' => esc_html__( 'Space Between Widget item', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 200,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} .academy-course-filters .academy-archive-course-widget__body label' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'course_filters_widget_checkbox_and_text_item_spacing',
			[
				'label' => esc_html__( 'Space Between Checkbox & Text', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 200,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 25,
				],
				'selectors' => [
					'{{WRAPPER}} .academy-course-filters .academy-archive-course-widget__body label' => 'padding-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}


	protected function render() {
		?>
		<div class="academyea-widget-course-filter"><?php echo do_shortcode( '[academy_course_filters]' ); ?></div>
		<?php
	}

}
