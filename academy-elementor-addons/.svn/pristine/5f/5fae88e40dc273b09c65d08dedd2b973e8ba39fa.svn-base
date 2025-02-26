<?php
namespace AcademyEA\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Image_Size;
use AcademyEA\Helper;
use AcademyEA\Traits\CommonStyle;
use WP_Query;
class CourseCarousel extends Widget_Base {
	use CommonStyle;

	public function get_name() {
		return 'academyea-course-carousel';
	}

	public function get_title() {
		return __( 'Course Carousel', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-media-carousel';
	}

	public function get_categories() {
		return array( 'academyea-widgets' );
	}

	public function get_keywords() {
		return [ 'course title', 'course', 'title', 'academy', 'lms' ];
	}

	public function get_style_depends() {
		return [ 'academyea-swiper-css', 'academyea-swiper-custom-css' ];
	}

	public function get_script_depends() {
		return [ 'academyea-swiper-js', 'academyea-course-carousel-js' ];
	}

	protected function course_query_controls() {
		// Query section

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

	}

	protected function carousel_setting_controls() {

		// carousel settings

		$this->start_controls_section(
			'course_carousel_settings_section',
			[
				'label' => __( 'Carousel Settings', 'academy-elementor-addons' ),
				'type' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_responsive_control(
			'course_carousel_slides_to_show',
			[
				'label' => __( 'Slides to Show', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SELECT,
				'default'        => 3,
				'tablet_default' => 3,
				'mobile_default' => 1,
				'options' => [
					'1' => 1,
					'2' => 2,
					'3' => 3,
					'4' => 4,
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
			]
		);
		// $this->add_responsive_control(
		// 'course_carousel_slidestoscroll',
		// [
		// 'label' => __( 'Slides to Scroll', 'academy-elementor-addons' ),
		// 'type' => Controls_Manager::SELECT,
		// 'default'        => 3,
		// 'tablet_default' => 3,
		// 'mobile_default' => 1,
		// 'options' => [
		// '1' => 1,
		// '2' => 2,
		// '3' => 3,
		// '4' => 4,
		// ],
		// 'devices' => [ 'desktop', 'tablet', 'mobile' ],
		// ]
		// );

		$this->add_control(
			'course_carousel_settings_arrows',
			[
				'label' => __( 'Arrows', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'academy-elementor-addons' ),
				'label_off' => __( 'Hide', 'academy-elementor-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',

			]
		);

		$this->add_control(
			'icon',
			[
				'label' => esc_html__( 'PrevArowIcon', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-arrow-left',
					'library' => 'fa-solid',
				],
				'condition' => [
					'course_carousel_settings_arrows' => 'yes',

				],

			]
		);
		$this->add_control(
			'icon2',
			[
				'label' => esc_html__( 'NextArowIcon', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-arrow-right',
					'library' => 'fa-solid',
				],
				'condition' => [
					'course_carousel_settings_arrows' => 'yes',
				],

			]
		);

		$this->add_control(
			'course_carousel_settings_dots',
			[
				'label' => __( 'Dots', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'academy-elementor-addons' ),
				'label_off' => __( 'Hide', 'academy-elementor-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'course_carousel_settings_transition',
			[
				'label' => __( 'Transition Duration', 'academy-elementor-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => '600',
			]
		);

		$this->add_control(
			'course_carousel_settings_center_slides',
			[
				'label' => __( 'Centered Slides', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'academy-elementor-addons' ),
				'label_off' => __( 'No', 'academy-elementor-addons' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);

		$this->add_control(
			'course_carousel_settings_freemode',
			[
				'label' => __( 'Free Mode', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'academy-elementor-addons' ),
				'label_off' => __( 'No', 'academy-elementor-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'course_carousel_settings_autoplay',
			[
				'label' => __( 'Auto Play', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'academy-elementor-addons' ),
				'label_off' => __( 'No', 'academy-elementor-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'course_carousel_settings_autoplay_speed',
			[
				'label' => __( 'Auto Play Speed', 'academy-elementor-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => '5000',
			]
		);

		$this->add_control(
			'course_carousel_settings_infinite_loop',
			[
				'label' => __( 'Infinite Loop', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'academy-elementor-addons' ),
				'label_off' => __( 'No', 'academy-elementor-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'course_carousel_settings_pause_onhover',
			[
				'label' => __( 'Paush on Hover', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'academy-elementor-addons' ),
				'label_off' => __( 'No', 'academy-elementor-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

	}

	protected function course_card_style_controls() {

		// Course Card Style
		$this->start_controls_section(
			'course_card',
			[
				'label' => __( 'Course Card', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
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
			'{{WRAPPER}} .academyea-course-carousel .academy-course',
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
			'{{WRAPPER}} .academyea-course-carousel .academy-course:hover',
			[ 'background', 'border', 'box_shadow' ]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'category_typography',
			[
				'label' => esc_html__( 'Category', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'course_category_typography_style',
			'{{WRAPPER}} .academy-courses .academy-course__meta--categroy a',
			[ 'typography', 'color' ]
		);

		$this->add_control(
			'course_category_hover_color',
			[
				'label' => esc_html__( 'Hover Color', 'academy-elementor-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}  .academy-course:hover .academy-course__meta--categroy a' => 'color: {{VALUE}};',
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
				'label' => esc_html__( 'Title ', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'course_title_typography_style',
			'{{WRAPPER}} .academy-courses .academy-course__title a',
			[ 'typography', 'color' ]
		);

		$this->add_control(
			'course_title_hover_color',
			[
				'label' => esc_html__( 'Hover Color', 'academy-elementor-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-course:hover .academy-course__title a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_key_hr',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'author_key_typography',
			[
				'label' => esc_html__( 'Author Key', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'course_author_key_typography_style',
			'{{WRAPPER}} .academy-courses .academy-course__author',
			[ 'typography' ]
		);

		$this->add_control(
			'course_carousel_meta_key_color',
			array(
				'label'     => __( 'Key Color', 'academy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,

				'selectors' => [
					'{{WRAPPER}} .academy-courses .academy-course__author' => 'color: {{VALUE}};',
				],

			)
		);

		$this->add_control(
			'course_carousel_meta_key_hover_color',
			array(
				'label'     => __( 'Key Hover Color', 'academy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-course:hover .academy-course__author' => 'color: {{VALUE}};',
				],

			)
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
				'label' => esc_html__( 'Author ', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'course_author_typography_style',
			'{{WRAPPER}} .academy-courses .academy-course__author a',
			[ 'typography' ]
		);

		$this->add_control(
			'course_carousel_author_color',
			array(
				'label'     => __( 'Author Color', 'academy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,

				'selectors' => [
					'{{WRAPPER}} .academy-courses .academy-course__author a' => 'color: {{VALUE}};',
				],

			)
		);

		$this->add_control(
			'course_author_hover_color',
			[
				'label' => esc_html__( 'Author Hover Color', 'academy-elementor-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-course:hover .academy-course__author .author a' => 'color: {{VALUE}};',
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
			'rating_Icon_typography',
			[
				'label' => esc_html__( 'Rating Icon ', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->add_responsive_control(
			'icon_font_size',
			[
				'label' => __( 'Size', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 4,
						'max' => 50,
					],
				],
				'default' => [
					'size' => 18,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 15,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 15,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .academy-courses .academy-course__rating .academy-group-star i::before' => 'font-size: {{SIZE}}{{UNIT}};',
				],

			]
		);

		$this->normal_element(
			'course_rating_typography_style',
			'{{WRAPPER}} .academy-courses .academy-course__rating .academy-group-star i::before',
			[ 'color' ]
		);

		$this->add_control(
			'course_carousel_star_hover_color',
			[
				'label'     => __( 'Hover Color', 'academy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-course:hover .academy-course__rating .academy-group-star i::before' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'rating_icon_hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'rating_count_hr',
			[
				'label' => esc_html__( 'Rating Count ', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'course_rating_count_typography_style',
			'{{WRAPPER}} .academy-courses .academy-course__rating',
			[ 'typography', 'color' ]
		);

		$this->add_control(
			'course_rating_hover_color',
			[
				'label' => esc_html__( 'Hover Color', 'academy-elementor-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-course:hover .academy-course__rating' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'course_rating_count_color',
			[
				'label'     => __( 'Count Color', 'academy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-courses .academy-course__rating .academy-course__rating-count' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'course_rating_count_hover_color',
			[
				'label' => esc_html__( 'Count Hover Color', 'academy-elementor-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-course:hover .academy-course__rating .academy-course__rating-count' => 'color: {{VALUE}};',
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
				'label' => esc_html__( 'Price ', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'price_typography_style',
			'{{WRAPPER}} .academy-courses .academy-course__price,{{WRAPPER}} .academy-courses .academy-course__price del, {{WRAPPER}} .academy-courses .academy-course__price ins',
			[ 'typography' ]
		);

		$this->add_control(
			'price_text_color_style',
			[
				'label' => esc_html__( 'Price Text Color', 'academy-elementor-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-courses .academy-course__price' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'course_price_hover_color',
			[
				'label' => esc_html__( 'Hover Color', 'academy-elementor-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-course:hover .academy-course__price' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'regular_price_color',
			[
				'label' => esc_html__( 'Regular Price Color', 'academy-elementor-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-courses .academy-course__price del' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'regular_price_hover_color',
			[
				'label' => esc_html__( 'Regular Price Hover Color', 'academy-elementor-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-course:hover .academy-course__price del' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'sale_price_color',
			[
				'label' => esc_html__( 'Sale Price Color', 'academy-elementor-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-courses .academy-course__price ins' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'sale_price_hover_color',
			[
				'label' => esc_html__( 'Sale Price Hover Color', 'academy-elementor-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-course:hover .academy-course__price ins' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function wishlist_icon_style_controls() {

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
			'{{WRAPPER}} .swiper-slide .academy-course .academy-add-to-wishlist-btn',
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
			'{{WRAPPER}} .academy-course-header-meta__wishlist.academy-add-to-wishlist-btn:hover',
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

	}

	protected function arrow_icon_style_controls() {

		// Start Arrow Icon Style
		$this->start_controls_section(
			'arrow_icon',
			[
				'label' => __( 'Carousel Arrow Icon', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'arrow_icon_tabs_style' );

		$this->start_controls_tab(
			'arrow_icon_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'academy-elementor-addons' ),
			]
		);
		$this->normal_element(
			'arrow_icon_normal_style',
			'{{WRAPPER}} .swiper-button-next, {{WRAPPER}} .swiper-button-prev',
			[ 'color', 'background', 'border', 'radius', 'box_shadow', 'padding' ]
		);

		$this->add_responsive_control(
			'course_carousel_arrow_icon_size',
			[
				'label' => __( 'Icon Size', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],

				],
				'desktop_default' => [
					'size' => 20,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 18,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 10,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-next, {{WRAPPER}} .swiper-button-prev' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'arrow_icon_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'academy-elementor-addons' ),
			]
		);

		$this->hover_element(
			'arrow_icon_hover_style',
			'{{WRAPPER}} .swiper-button-prev:hover, {{WRAPPER}} .swiper-button-next:hover',
			[ 'color', 'background' ]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'arrow_icon_position_tab',
			[
				'label' => esc_html__( 'Position', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'left_arrow_text',
			[
				'label' => esc_html__( 'Left Arrow ', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->add_responsive_control(
			'arrow_icon_left_position_style_top',
			[
				'label' => __( 'Top', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 1200,
						'step' => 0,
					],
					'%' => [
						'min' => -50,
						'max' => 100,
					],
				],
				'desktop_default' => [
					'unit' => '%',
					'size' => 50,
				],
				'tablet_default' => [
					'size' => 50,
					'unit' => '%',
				],
				'mobile_default' => [
					'size' => 10,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}}  .swiper-button-prev' => 'top: {{SIZE}}{{UNIT}};',
				],
			],
		);

		$this->add_responsive_control(
			'arrow_icon_left_position_style_left',
			[
				'label' => __( 'Left', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 1200,
						'step' => 0,
					],
					'%' => [
						'min' => -20,
						'max' => 100,
					],
				],

				'desktop_default' => [
					'unit' => '%',
					'size' => 0,
				],
				'tablet_default' => [
					'size' => 15,
					'unit' => '%',
				],
				'mobile_default' => [
					'size' => 0,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}}  .swiper-button-prev' => 'left: {{SIZE}}{{UNIT}};',
				],
			],
		);

		$this->add_control(
			'arrow_icon_right_hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'right_arrow_text',
			[
				'label' => esc_html__( 'Right Arrow ', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->add_responsive_control(
			'arrow_icon_right_position_style_top',
			[
				'label' => __( 'Top', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => -1200,
						'max' => 1200,
						'step' => 0,
					],
					'%' => [
						'min' => -20,
						'max' => 100,
					],
				],

				'desktop_default' => [
					'unit' => '%',
					'size' => 50,
				],
				'tablet_default' => [
					'size' => 50,
					'unit' => '%',
				],
				'mobile_default' => [
					'size' => 10,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-next' => 'top: {{SIZE}}{{UNIT}};',
				],
			],
		);

		$this->add_responsive_control(
			'arrow_icon_right_position_style_right',
			[
				'label' => __( 'Right', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => -1200,
						'max' => 1200,
						'step' => 0,
					],
					'%' => [
						'min' => -10,
						'max' => 100,
					],
				],

				'desktop_default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'tablet_default' => [
					'size' => 10,
					'unit' => '%',
				],
				'mobile_default' => [
					'size' => 10,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}}  .swiper-button-next' => 'right: {{SIZE}}{{UNIT}};',
				],
			],
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	protected function dots_style_controls() {

		// dots style section start
		$this->start_controls_section(
			'course_carousel_dots_style',
			[
				'label' => __( 'Carousel Dots', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'course_carousel_dots_size',
			[
				'label' => __( 'Size', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 4,
						'max' => 50,
					],
				],
				'default' => [
					'size' => 8,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 8,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 6,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],

			]
		);

		$this->add_control(
			'course_carousel_dots_alignment',
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
					'{{WRAPPER}} .swiper-pagination' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'course_carousel_dots_gap',
			[
				'label' => __( 'Gap', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 10,
					],
				],
				'desktop_default' => [
					'size' => 2,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 2,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 2,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination' => 'bottom: -{{SIZE}}{{UNIT}};',
				],

			]
		);

		$this->add_responsive_control(
			'course_carousel_dots_space',
			[
				'label' => __( 'Space Between', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 36,
					],
				],
				'desktop_default' => [
					'size' => 5,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 5,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 4,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination-bullet' => 'margin-right: {{SIZE}}{{UNIT}};',
				],

			]
		);

		$this->start_controls_tabs( 'course_carousel_dots_tabs' );

		/*normal tab*/
		$this->start_controls_tab(
			'course_carousel_dots_normal_tab',
			[
				'label' => __( 'Normal', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'course_carousel_dots_fill_normal_color',
			[
				'label'     => __( 'Fill Color', 'academy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination-bullet' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		/*hover tab*/
		$this->start_controls_tab(
			'course_carousel_dots_hover_tab',
			[
				'label' => __( 'Hover', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'course_carousel_dots_fill_hover_color',
			[
				'label'     => __( 'Fill Color', 'academy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination-bullet:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'course_carousel_dots_fill_hover_background_color',
			[
				'label'     => __( 'Background Color', 'academy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination-bullet:hover' => 'background-color: {{VALUE}} !important;',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		// dots style section end
	}

	protected function register_controls() {

		/**
		 * Course Query Controls
		*/
		$this->course_query_controls();

		/**
		 * Carousel Setting Controls
		*/
		$this->carousel_setting_controls();

		// style Tab start

		/**
		 * Course Card Style Controls
		*/
		$this->course_card_style_controls();

		/**
		 * Wishlist Icon Style Controls
		*/
		$this->wishlist_icon_style_controls();

		/**
		 * Arrow Icon Style Controls
		*/
		$this->arrow_icon_style_controls();

		/**
		 * Dots Style Controls
		*/
		$this->dots_style_controls();

	}

	protected function get_query_args( $settings ) {
		$courseids       = $settings['course_ids'];
		$exclude_ids    = $settings['course_exclude_ids'];
		$category      = $settings['course_categories'];
		$cat_not_in    = $settings['course_exclude_categories'];
		$course_level   = $settings['course_difficulty_level'];
		$price_type    = $settings['course_price_type'];
		$tag            = $settings['course_tags'];
		$tag_not_in     = $settings['course_exclude_tags'];
		$orderby       = $settings['course_orderby'];
		$order         = $settings['course_order'];
		$count         = $settings['course_count'] ? $settings['course_count'] : -1;

		$args = [
			'post_type'   => 'academy_courses',
			'post_status' => 'publish',
		];

		if ( ! empty( $courseids ) ) {
			$courseids = (array) explode( ',', $courseids );
			$args['post__in'] = $courseids;
		}

		if ( ! empty( $exclude_ids ) ) {
			$exclude_ids = (array) explode( ',', $exclude_ids );
			$args['post__not_in'] = $exclude_ids;
		}

		// taxonomy
		$tax_query = array();
		if ( ! empty( $category ) ) {
			$tax_query[] = array(
				'taxonomy' => 'academy_courses_category',
				'field'    => 'term_id',
				'terms'    => $category,
				'operator' => 'IN',
			);
		}

		if ( ! empty( $cat_not_in ) ) {
			$tax_query[] = array(
				'taxonomy' => 'academy_courses_category',
				'field'    => 'term_id',
				'terms'    => $cat_not_in,
				'operator' => 'NOT IN',
			);
		}

		if ( ! empty( $tag ) ) {
			$tax_query[] = array(
				'taxonomy' => 'academy_courses_tag',
				'field'    => 'term_id',
				'terms'    => $tag,
				'operator' => 'IN',
			);
		}

		if ( ! empty( $tag_not_in ) ) {
			$tax_query[] = array(
				'taxonomy' => 'academy_courses_tag',
				'field'    => 'term_id',
				'terms'    => $tag_not_in,
				'operator' => 'NOT IN',
			);
		}

		if ( count( $tax_query ) > 0 ) {
			if ( count( $tax_query ) > 1 ) {
				$tax_query['relation'] = 'AND';
			}
			$args['tax_query']     = $tax_query;
		}

		// meta
		$meta_query = array();
		if ( ! empty( $course_level ) ) {
			$meta_query[] = array(
				'key'      => 'academy_course_difficulty_level',
				'value'    => $course_level,
				'compare'  => 'IN',
			);
		}

		if ( ! empty( $price_type ) ) {
			$meta_query[] = array(
				'key'      => 'academy_course_type',
				'value'    => $price_type,
				'compare'  => 'IN',
			);
		}

		if ( count( $meta_query ) > 0 ) {
			if ( count( $meta_query ) > 1 ) {
				$meta_query['relation'] = 'OR';
			}
			$args['meta_query']    = $meta_query;
		}

		if ( ! empty( $orderby ) ) {
			switch ( $orderby ) {
				case 'title':
					$args['orderby'] = 'post_title';
					break;
				case 'date':
					$args['orderby'] = 'publish_date';
					break;
				case 'modified':
					$args['orderby'] = 'modified';
					break;
				default:
					$args['orderby'] = 'ID';
			}
		}
		$args['order'] = ! empty( $order ) ? $order : 'DESC';
		$args['posts_per_page'] = (int) $count;
		return $args;
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$args = $this->get_query_args( $settings );

		wp_reset_query();

		$carousel_arrows = $settings['course_carousel_settings_arrows'];
		$carousel_dot = $settings['course_carousel_settings_dots'];
		$carousel_transition = $settings['course_carousel_settings_transition'];
		$carousel_center = $settings['course_carousel_settings_center_slides'];
		$carousel_free_mode = $settings['course_carousel_settings_freemode'];
		$carousel_auto_play = $settings['course_carousel_settings_autoplay'];
		$carousel_auto_play_speed = $settings['course_carousel_settings_autoplay_speed'];
		$carousel_infinite_loop = $settings['course_carousel_settings_infinite_loop'];
		$carousel_pause_on_hover = $settings['course_carousel_settings_pause_onhover'];

		$carousel_prevArowIcon = isset( $settings['icon']['value'] ) ? $carousel_prevArowIcon = $settings['icon']['value'] : null;
		$carousel_nextArowIcon = isset( $settings['icon2']['value'] ) ? $carousel_nextArowIcon = $settings['icon2']['value'] : null;

		$carousel_column_dsk = isset( $settings['course_carousel_slides_to_show'] ) ? (int) $settings['course_carousel_slides_to_show'] : 3;
		$carousel_column_tablet = isset( $settings['course_carousel_slides_to_show_tablet'] ) ? (int) $settings['course_carousel_slides_to_show_tablet'] : 3;
		$carousel_column_mobile = isset( $settings['course_carousel_slides_to_show_mobile'] ) ? (int) $settings['course_carousel_slides_to_show_mobile'] : 1;
		$carousel_slidesToScroll_dsk = isset( $settings['course_carousel_slidestoscroll'] ) ? (int) $settings['course_carousel_slidestoscroll'] : 3;
		$carousel_slidesToScroll_tablet = isset( $settings['course_carousel_slidestoscroll_tablet'] ) ? (int) $settings['course_carousel_slidestoscroll_tablet'] : 3;
		$carousel_slidesToScroll_mobile = isset( $settings['course_carousel_slidestoscroll_mobile'] ) ? (int) $settings['course_carousel_slidestoscroll_mobile'] : 1;
		$courseCount = $settings['course_count'];

		$this->add_render_attribute(
			'wrapper_attr',
			[
				'carousel_arrows' => $carousel_arrows,
				'carousel_dot' => $carousel_dot,
				'carousel_transition' => $carousel_transition,
				'carousel_center' => $carousel_center,
				'carousel_free_mode' => $carousel_free_mode,
				'carousel_auto_play' => $carousel_auto_play,
				'carousel_auto_play_speed' => $carousel_auto_play_speed,
				'carousel_infinite_loop' => $carousel_infinite_loop,
				'carousel_pause_on_hover' => $carousel_pause_on_hover,
				'carousel_prevArowIcon' => $carousel_prevArowIcon,
				'carousel_nextArowIcon' => $carousel_nextArowIcon,
				'carousel_column_dsk' => $carousel_column_dsk,
				'carousel_column_tablet' => $carousel_column_tablet,
				'carousel_column_mobile' => $carousel_column_mobile,
				'carousel_slidesToScroll_dsk' => $carousel_slidesToScroll_dsk,
				'carousel_slidesToScroll_tablet' => $carousel_slidesToScroll_tablet,
				'carousel_slidesToScroll_mobile' => $carousel_slidesToScroll_mobile,
				'carousel_slidesToScroll_mobile' => $carousel_slidesToScroll_mobile,
				'courseCount' => $courseCount,

			]
		);

		$the_query = new WP_Query( $args );
		?>

		<?php if ( $the_query->have_posts() ) :
			?>
			<div>
			<div class="swiper">
				<div class="swiper-wrapper academyea-course-carousel academy-courses" <?php echo esc_attr( $this->get_render_attribute_string( 'wrapper_attr' ) ); ?> >
				<?php while ( $the_query->have_posts() ) :
					$the_query->the_post();
					?>
					<div class="swiper-slide academyea-course-carousel__item">
						<div class="academy-col-lg-12 academy-col-md-12 academy-col-sm-12">
						<div class="academy-course">
						<?php
						do_action( 'academy/templates/before_course_loop' );
						do_action( 'academy/templates/course_loop_header' );
						do_action( 'academy/templates/course_loop_content' );
						do_action( 'academy/templates/course_loop_footer' );
						do_action( 'academy/templates/after_course_loop_item' );
						?>
					</div>	
					</div>
					</div>
				<?php endwhile; ?>
			</div>
			<div class="swiper-pagination"></div>
		</div>
		<div class="swiper-button-prev"><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
			<div class="swiper-button-next"><?php \Elementor\Icons_Manager::render_icon( $settings['icon2'], [ 'aria-hidden' => 'true' ] ); ?></div>
		</div>
		<style>
			</style>	
			<?php

		else :
			do_action( 'academy/templates/no_course_found' );
		endif;

		?>

		<?php

	}

}

