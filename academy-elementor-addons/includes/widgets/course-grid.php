<?php
namespace AcademyEA\Widgets;

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use AcademyEA\Helper;
use AcademyEA\Traits\CommonStyle;

class CourseGrid extends Widget_Base {
	use CommonStyle;

	public function get_name() {
		return 'academyea-course-grid';
	}

	public function get_title() {
		return esc_html__( 'Course Grid', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
	}

	public function get_categories() {
		return [ 'academyea-widgets' ];
	}

	public function get_keywords() {
		return [ 'course', 'list', 'grid', 'course grid', 'academy', 'lms' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'course_layout_options',
			[
				'label' => __( 'Layout Options', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'course_columns',
			[
				'label' => __( 'Course Columns', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'2'  => esc_html__( '2', 'academy-elementor-addons' ),
					'3'  => esc_html__( '3', 'academy-elementor-addons' ),
					'4'  => esc_html__( '4', 'academy-elementor-addons' ),
					'6'  => esc_html__( '6', 'academy-elementor-addons' ),
					'12' => esc_html__( '12', 'academy-elementor-addons' ),
				],
			]
		);

		$this->add_control(
			'allow_course_pagination',
			[
				'label' => esc_html__( 'Show Pagination', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'academy-elementor-addons' ),
				'label_off' => esc_html__( 'Hide', 'academy-elementor-addons' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'course_query_options',
			[
				'label' => __( 'Course Query', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'course_count',
			[
				'label' => __( 'Course Per Page', 'academy-elementor-addons' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 6,
				'min' => 1,
				'max' => 1000,
				'step' => 1,
			]
		);

		$this->add_control(
			'course_difficulty_level',
			[
				'label' => esc_html__( 'Dificulty Level', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => [
					'beginner' => __( 'Beginner', 'academy-elementor-addons' ),
					'intermediate' => __( 'Intermediate', 'academy-elementor-addons' ),
					'experts' => __( 'Expert', 'academy-elementor-addons' ),
				],
			]
		);

		$this->add_control(
			'course_price_type',
			[
				'label' => esc_html__( 'Price Type', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => [
					'free' => __( 'Free', 'academy-elementor-addons' ),
					'paid' => __( 'Paid', 'academy-elementor-addons' ),
				],
			]
		);

		$this->add_control(
			'course_orderby',
			[
				'label' => esc_html__( 'Order By', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'title' => __( 'Product Title', 'academy-elementor-addons' ),
					'date' => __( 'Date', 'academy-elementor-addons' ),
					'modified' => __( 'Modified Date', 'academy-elementor-addons' ),
				],
			]
		);

		$this->add_control(
			'course_order',
			[
				'label' => __( 'Order', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SELECT2,
				'default' => 'DESC',
				'options' => [
					'ASC' => 'Ascending',
					'DESC' => 'Descending',
				],
			]
		);

		$this->add_control(
			'course_grid_tab_divider',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->start_controls_tabs( 'course_grid_query_tabs' );

			$this->start_controls_tab(
				'course_grid_query_include_tab',
				[
					'label' => __( 'Include', 'academy-elementor-addons' ),
				]
			);

			$this->add_control(
				'course_ids',
				[
					'label' => __( "Course ID's", 'academy-elementor-addons' ),
					'description' => __( "Enter Course id's separated by comma", 'academy-elementor-addons' ),
					'type' => Controls_Manager::TEXTAREA,
					'label_block' => true,
				]
			);

			$this->add_control(
				'course_categories',
				[
					'label' => esc_html__( 'Course Categories', 'academy-elementor-addons' ),
					'type' => Controls_Manager::SELECT2,
					'label_block' => true,
					'multiple' => true,
					'options' => Helper::get_terms_list( 'academy_courses_category' ),
				]
			);

			$this->add_control(
				'course_tags',
				[
					'label' => esc_html__( 'Course Tags', 'academy-elementor-addons' ),
					'type' => Controls_Manager::SELECT2,
					'label_block' => true,
					'multiple' => true,
					'options' => Helper::get_terms_list( 'academy_courses_tag' ),
				]
			);

			$this->end_controls_tab();

			$this->start_controls_tab(
				'course_grid_query_exclude_tab',
				[
					'label' => __( 'Exclude', 'academy-elementor-addons' ),
				]
			);

			$this->add_control(
				'course_exclude_ids',
				[
					'label' => __( "Exclude Course ID's", 'academy-elementor-addons' ),
					'description' => __( "Enter Course id's want to exclude separated by comma", 'academy-elementor-addons' ),
					'type' => Controls_Manager::TEXTAREA,
					'label_block' => true,
				]
			);

			$this->add_control(
				'course_exclude_categories',
				[
					'label' => esc_html__( 'Course Exclude Categories', 'academy-elementor-addons' ),
					'type' => Controls_Manager::SELECT2,
					'label_block' => true,
					'multiple' => true,
					'options' => Helper::get_terms_list( 'academy_courses_category' ),
				]
			);

			$this->add_control(
				'course_exclude_tags',
				[
					'label' => esc_html__( 'Course Exclude Tags', 'academy-elementor-addons' ),
					'type' => Controls_Manager::SELECT2,
					'label_block' => true,
					'multiple' => true,
					'options' => Helper::get_terms_list( 'academy_courses_tag' ),
				]
			);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Course Card Style
		$this->start_controls_section(
			'course_card',
			[
				'label' => __( 'Course Card', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'category_typography',
			[
				'label' => esc_html__( 'Category Typography', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'course_category_typography_style',
			'{{WRAPPER}} .academy-row .academy-course .academy-course__meta--categroy a',
			[ 'typography', 'color' ]
		);

		$this->add_control(
			'course_category_hover_color',
			[
				'label' => esc_html__( 'Hover Color', 'academy-elementor-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-row .academy-course:hover .academy-course__meta--categroy a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'category_hr',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'title_typography',
			[
				'label' => esc_html__( 'Title Typography', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'course_title_typography_style',
			'{{WRAPPER}} .academy-row .academy-course .academy-course__title a',
			[ 'typography', 'color' ]
		);

		$this->add_control(
			'course_title_hover_color',
			[
				'label' => esc_html__( 'Hover Color', 'academy-elementor-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-row .academy-course:hover .academy-course__title a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_hr',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'author_typography',
			[
				'label' => esc_html__( 'Author Typography', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'course_author_typography_style',
			'{{WRAPPER}} .academy-row .academy-course .academy-course__author .author, {{WRAPPER}} .academy-row .academy-course .academy-course__author .author a',
			[ 'typography', 'color' ]
		);

		$this->add_control(
			'course_author_hover_color',
			[
				'label' => esc_html__( 'Hover Color', 'academy-elementor-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-row .academy-course:hover .academy-course__author .author,{{WRAPPER}} .academy-row .academy-course:hover .academy-course__author .author a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'author_hr',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'rating_typography',
			[
				'label' => esc_html__( 'Rating Typography', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'course_rating_typography_style',
			'{{WRAPPER}} .academy-row .academy-course .academy-course__rating, {{WRAPPER}} .academy-row .academy-course .academy-course__rating i::before, {{WRAPPER}} .academy-row .academy-course .academy-course__rating .academy-course__rating-count',
			[ 'typography', 'color' ]
		);

		$this->add_control(
			'course_rating_hover_color',
			[
				'label' => esc_html__( 'Hover Color', 'academy-elementor-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-row .academy-course:hover .academy-course__rating, {{WRAPPER}} .academy-row .academy-course:hover .academy-course__rating i::before, {{WRAPPER}} .academy-row .academy-course:hover .academy-course__rating .academy-course__rating-count' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'rating_hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'price_typography',
			[
				'label' => esc_html__( 'Price Typography', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'price_typography_style',
			'{{WRAPPER}} .academy-row .academy-course .academy-course__price',
			[ 'typography', 'color' ]
		);

		$this->add_control(
			'course_price_hover_color',
			[
				'label' => esc_html__( 'Hover Color', 'academy-elementor-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-row .academy-course:hover .academy-course__price' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'price_hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->start_controls_tabs( 'course_card_tabs_style' );

		$this->start_controls_tab(
			'course_card_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'academy-elementor-addons' ),
			]
		);

		$this->normal_element(
			'course_card_normal_style',
			'{{WRAPPER}} .academy-row .academy-course',
			[ 'background', 'border', 'radius', 'box_shadow', 'padding', 'margin' ]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'course_card_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'academy-elementor-addons' ),
			]
		);

		$this->hover_element(
			'course_card_hover_style',
			'{{WRAPPER}} .academy-row .academy-course:hover',
			[ 'background', 'border', 'box_shadow' ]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Start Wishlist Icon Style
		$this->start_controls_section(
			'wishlist_icon',
			[
				'label' => __( 'Wishlist Icon', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'wishlist_icon_tabs_style' );

		$this->start_controls_tab(
			'wishlist_icon_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'academy-elementor-addons' ),
			]
		);
		$this->normal_element(
			'wishlist_icon_normal_style',
			'{{WRAPPER}} .academy-row .academy-course .academy-add-to-wishlist-btn',
			[ 'color', 'background' ]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'wishlist_icon_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'academy-elementor-addons' ),
			]
		);

		$this->hover_element(
			'wishlist_icon_hover_style',
			'{{WRAPPER}} .academy-row .academy-course .academy-add-to-wishlist-btn:hover',
			[ 'color', 'background' ]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'wishlist_icon_position_tab',
			[
				'label' => esc_html__( 'Position', 'academy-elementor-addons' ),
			]
		);

		$this->position_element(
			'wishlist_icon_position_style',
			'{{WRAPPER}} .academy-courses .academy-course__header .academy-course-header-meta',
			[ 'left', 'top' ]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Start Wishlist Icon Style
		$this->start_controls_section(
			'course_grid_pagination_style',
			[
				'label' => __( 'Pagination', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'allow_course_pagination' => 'yes',
				],
			]
		);

		// Alignment
		$this->add_control(
			'course_grid_pagination_alignment',
			[
				'label' => esc_html__( 'Alignment', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Left', 'academy-elementor-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'academy-elementor-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'flex-end' => [
						'title' => esc_html__( 'Right', 'academy-elementor-addons' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'flex-start',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .academy-courses--grid .academy-courses__pagination' => 'justify-content: {{VALUE}};',
				],
			]
		);
		// Button Style
		$this->add_control(
			'course_grid_pagination_button_style',
			[
				'label' => esc_html__( 'Button Style', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'course_grid_pagination_button_border',
				'selector' => '{{WRAPPER}} .academy-courses--grid .academy-courses__pagination .page-numbers',
			]
		);

		$this->add_control(
			'course_grid_pagination_button_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .academy-courses--grid .academy-courses__pagination .page-numbers' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'course_grid_pagination_button_background',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .academy-courses--grid .academy-courses__pagination .page-numbers',
			]
		);
		$this->add_control(
			'course_grid_pagination_button_color',
			[
				'label' => esc_html__( 'Text Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-courses--grid .academy-courses__pagination .page-numbers' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'course_grid_pagination_button_font_size',
			[
				'label' => esc_html__( 'Font Size', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 100,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 14,
				],
				'selectors' => [
					'{{WRAPPER}} .academy-courses--grid .academy-courses__pagination .page-numbers' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Active Button
		$this->add_control(
			'course_grid_pagination_active_button_style',
			[
				'label' => esc_html__( 'Active Button Style', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'course_grid_pagination_active_button_background',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .academy-courses--grid .academy-courses__pagination .page-numbers.current',
			]
		);
		$this->add_control(
			'course_grid_pagination_active_button_color',
			[
				'label' => esc_html__( 'Text Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-courses--grid .academy-courses__pagination .page-numbers.current' => 'color: {{VALUE}}',
				],
			]
		);

		// Next/Prev Button
		$this->add_control(
			'course_grid_pagination_next_prev_button_style',
			[
				'label' => esc_html__( 'Next/Prev Button Style', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'course_grid_pagination_next_prev_button_background',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .academy-courses--grid .academy-courses__pagination .page-numbers.next, {{WRAPPER}} .academy-courses--grid .academy-courses__pagination .page-numbers.prev',
			]
		);
		$this->add_control(
			'course_grid_pagination_next_prev_button_color',
			[
				'label' => esc_html__( 'Text Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-courses--grid .academy-courses__pagination .page-numbers.next i, {{WRAPPER}} .academy-courses--grid .academy-courses__pagination .page-numbers.prev i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

	}


	protected function render() {

		$settings = $this->get_settings_for_display();

		$attr_array = [
			'ids'            => $settings['course_ids'],
			'exclude_ids'    => $settings['course_exclude_ids'],
			'category'       => $settings['course_categories'],
			'cat_not_in'     => $settings['course_exclude_categories'],
			'course_level'   => $settings['course_difficulty_level'],
			'price_type'     => $settings['course_price_type'],
			'tag'            => $settings['course_tags'],
			'tag_not_in'     => $settings['course_exclude_tags'],
			'orderby'        => $settings['course_orderby'],
			'order'          => $settings['course_order'],
			'count'          => $settings['course_count'] ? $settings['course_count'] : -1,
			'column_per_row' => $settings['course_columns'] ? $settings['course_columns'] : 2,
			'has_pagination' => 'yes' === $settings['allow_course_pagination'] ? true : false,
		];

		$shortcode = '[academy_courses ' . Helper::attr_shortcode( $attr_array ) . ']';
		echo do_shortcode( $shortcode );
	}

}
