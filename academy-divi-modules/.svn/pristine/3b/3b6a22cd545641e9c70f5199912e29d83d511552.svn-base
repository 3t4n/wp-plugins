<?php

defined( 'ABSPATH' ) || exit;

use AcademyLMS\Divi\Helper;

class ACDM_AcademyCourseCarousel extends ET_Builder_Module {

	public $slug       = 'acdm_course_carousel';
	public $vb_support = 'on';

	protected $module_credits = array(
		'author'     => 'AcademyLMS',
		'author_uri' => 'https://academylms.net/',
	);

	public function init() {
		$this->name = esc_html__( 'Academy Course Carousel', 'academy-divi-modules' );
		$this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';
		// settings toggles
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'content'              => esc_html__( 'Content', 'academy-divi-modules' ),
					'layout'              => esc_html__( 'Layout', 'academy-divi-modules' ),
					'autoplay'              => esc_html__( 'Autoplay', 'academy-divi-modules' ),
					'navigation'              => esc_html__( 'Navigation & Pagination', 'academy-divi-modules' ),
					'query'               => esc_html__( 'Query', 'academy-divi-modules' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'course_card'     => esc_html__( 'Course Card', 'academy-divi-modules' ),
					'course_title'     => esc_html__( 'Course Title', 'academy-divi-modules' ),
					'course_category'     => esc_html__( 'Course Category', 'academy-divi-modules' ),
					'course_by'     => esc_html__( 'Course By', 'academy-divi-modules' ),
					'course_author'     => esc_html__( 'Course Author', 'academy-divi-modules' ),
					'course_rating'     => esc_html__( 'Course Rating', 'academy-divi-modules' ),
					'course_price'     => esc_html__( 'Course Price', 'academy-divi-modules' ),
					'wishlist_icon'     => esc_html__( 'Wishlist Icon', 'academy-divi-modules' ),
					'pagination_style'     => esc_html__( 'Dots', 'academy-divi-modules' ),
				),
			),
		);

		$this->advanced_fields = array(
			// Typography Controls
			'fonts'          => array(
				'course_title_font'      => array(
					'css'             => array(
						'main' => '.academy-courses .academy-course__title a',
					),
					'hide_text_align' => true,
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'course_title',
				),
				'course_category_font'      => array(
					'css'             => array(
						'main' => '.academy-courses .academy-course__meta--categroy a',
					),
					'hide_text_align' => true,
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'course_category',
				),
				'course_by_font'      => array(
					'css'             => array(
						'main' => '%%order_class%% .academy-courses .academy-course__author .author',
					),
					'hide_text_align' => true,
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'course_by',
				),
				'course_author_font'      => array(
					'css'             => array(
						'main' => '.academy-courses .academy-course__author a',
					),
					'hide_text_align' => true,
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'course_author',
				),
				'course_rating_font'      => array(
					'css'             => array(
						'main' => '.academy-courses .academy-course__rating',
					),
					'hide_text_align' => true,
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'course_rating',
				),
				'course_price_font'      => array(
					'css'             => array(
						'main' => '.academy-courses .academy-course__price',
					),
					'hide_text_align' => true,
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'course_price',
				),
			),
			'borders'        => array(
				'default'    => false,
				'card_border' => array(
					'css'         => array(
						'main'      => array(
							'border_radii'  => '%%order_class%% .academy-courses .academy-course',
							'border_styles' => '%%order_class%% .academy-courses .academy-course',
						),
						'important' => true,
					),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'course_card',
				),
			),
			'margin_padding' => array(),
		);
	}

	public function get_fields() {
		return array(           
			'course_count' => array(
				'label'           => esc_html__( 'Course Count', 'academy-divi-modules' ),
				'type'            => 'number',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'layout',
				'default'         => 5,
				'computed_affects' => array(
					'__shortcode',
				),
			),
			'slides_per_view' => array(
				'label'               => esc_html__( 'Slides Per View', 'academy-divi-modules' ),
				'tab_slug'            => 'general',
				'toggle_slug'         => 'layout',
				'attr_suffix'         => '',
				'type'                => 'composite',
				'composite_type'      => 'default',
				'composite_structure' => array(
					'desktop' => array(
						'label'    => esc_html( 'Desktop', 'academy-divi-modules' ),
						'controls' => array(
							'slides_per_view_dsk' => array(
								'label' => esc_html__( 'Slides', 'academy-divi-modules' ),
								'type'  => 'number',
								'default'  => 3,
								'computed_affects' => array(
									'__shortcode',
								),
							),
						),
					),
					'tablet' => array(
						'label'    => esc_html( 'Tablet', 'academy-divi-modules' ),
						'controls' => array(
							'slides_per_view_tab' => array(
								'label' => esc_html__( 'Slides', 'academy-divi-modules' ),
								'type'  => 'number',
								'default'  => 2,
								'computed_affects' => array(
									'__shortcode',
								),
							),
						),
					),
					'mobile' => array(
						'label'    => esc_html( 'Mobile', 'academy-divi-modules' ),
						'controls' => array(
							'slides_per_view_mobile' => array(
								'label' => esc_html__( 'Slides', 'academy-divi-modules' ),
								'type'  => 'number',
								'default'  => 1,
								'computed_affects' => array(
									'__shortcode',
								),
							),
						),
					),
				),
			),
			'slide_speed' => array(
				'label'           => esc_html__( 'Slide Speed', 'academy-divi-modules' ),
				'type'            => 'number',
				'tab_slug'    => 'general',
				'toggle_slug'     => 'layout',
				'default'         => 600,
				'computed_affects' => array(
					'__shortcode',
				),
			),
			'autoplay'       => array(
				'label'       => esc_html__( 'Autoplay', 'academy-divi-modules' ),
				'type'        => 'yes_no_button',
				'default'         => 'on',
				'options'     => array(
					'on'  => esc_html__( 'On', 'academy-divi-modules' ),
					'off' => esc_html__( 'Off', 'academy-divi-modules' ),
				),
				'tab_slug'    => 'general',
				'toggle_slug' => 'autoplay',
				'computed_affects' => array(
					'__shortcode',
				),
			),
			'slide_loop'       => array(
				'label'       => esc_html__( 'Infinite Loop', 'academy-divi-modules' ),
				'type'        => 'yes_no_button',
				'default'        => 'on',
				'options'     => array(
					'on'  => esc_html__( 'On', 'academy-divi-modules' ),
					'off' => esc_html__( 'Off', 'academy-divi-modules' ),
				),
				'tab_slug'    => 'general',
				'toggle_slug' => 'autoplay',
				'computed_affects' => array(
					'__shortcode',
				),
			),
			'autoplay_speed' => array(
				'label'           => esc_html__( 'Autoplay Speed', 'academy-divi-modules' ),
				'type'            => 'number',
				'tab_slug'    => 'general',
				'toggle_slug'     => 'autoplay',
				'default'         => 600,
				'computed_affects' => array(
					'__shortcode',
				),
			),
			'slide_navigation'       => array(
				'label'       => esc_html__( 'Navigation', 'academy-divi-modules' ),
				'type'        => 'yes_no_button',
				'default'        => 'on',
				'options'     => array(
					'on'  => esc_html__( 'On', 'academy-divi-modules' ),
					'off' => esc_html__( 'Off', 'academy-divi-modules' ),
				),
				'tab_slug'    => 'general',
				'toggle_slug' => 'navigation',
				'computed_affects' => array(
					'__shortcode',
				),
			),
			'slide_pagination'       => array(
				'label'       => esc_html__( 'Dots', 'academy-divi-modules' ),
				'type'        => 'yes_no_button',
				'default'        => 'on',
				'options'     => array(
					'on'  => esc_html__( 'On', 'academy-divi-modules' ),
					'off' => esc_html__( 'Off', 'academy-divi-modules' ),
				),
				'tab_slug'    => 'general',
				'toggle_slug' => 'navigation',
				'computed_affects' => array(
					'__shortcode',
				),
			),
			'select_fonticon' => array(
				'label'               => esc_html__( 'Select Font Icon', 'academy-divi-modules' ),
				'type'                => 'et_font_icon_select',
				'renderer'            => 'et_pb_get_font_icon_list',
				'renderer_with_field' => true,
				'tab_slug'    => 'general',
				'toggle_slug'     => 'navigation',
			),
			'order_by' => array(
				'label'           => esc_html__( 'Order By', 'academy-divi-modules' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'tab_slug'    => 'general',
				'toggle_slug'     => 'query',
				'options'         => array(
					'date' => 'Date',
					'title' => 'Title',
					'modified' => 'Modified',
				),
				'default'         => 'date',
				'computed_affects' => array(
					'__shortcode',
				),
			),
			'order' => array(
				'label'           => esc_html__( 'Order', 'academy-divi-modules' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'tab_slug'    => 'general',
				'toggle_slug'     => 'query',
				'options'         => array(
					'ASC' => 'Ascending',
					'DESC' => 'Descending',
				),
				'default'         => 'DESC',
				'computed_affects' => array(
					'__shortcode',
				),
			),
			'price_type' => array(
				'label'           => esc_html__( 'Price Type', 'academy-divi-modules' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'query',
				'options'         => array(
					'free,paid' => 'All',
					'free' => 'Free',
					'paid' => 'Paid',
				),
				'default'         => 'free,paid',
				'computed_affects' => array(
					'__shortcode',
				),
			),
			'course_level' => array(
				'label'           => esc_html__( 'Course Level', 'academy-divi-modules' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'query',
				'options'         => array(
					'beginner,intermediate,experts' => 'All',
					'beginner' => 'Beginner',
					'intermediate' => 'Intermediate',
					'experts' => 'Experts',
				),
				'default'         => 'beginner,intermediate,experts',
				'computed_affects' => array(
					'__shortcode',
				),
			),
			'course_categories' => array(
				'label' => esc_html__( 'Course Categories', 'academy-divi-modules' ),
				'type' => 'adcm-multiple-checkbox',
				'options' => Helper::get_terms_list( 'academy_courses_category' ),
				'tab_slug'    => 'general',
				'toggle_slug'     => 'query',
				'default'         => '',
				'computed_affects' => array(
					'__shortcode',
				),
			),
			'course_tags' => array(
				'label' => esc_html__( 'Course Tags', 'academy-divi-modules' ),
				'type' => 'adcm-multiple-checkbox',
				'options' => Helper::get_terms_list( 'academy_courses_tag' ),
				'tab_slug'    => 'general',
				'toggle_slug'     => 'query',
				'default'         => '',
				'computed_affects' => array(
					'__shortcode',
				),
			),

			'course_include_exclude' => array(
				'label'               => esc_html__( 'Courses IDs', 'academy-divi-modules' ),
				'tab_slug'            => 'general',
				'toggle_slug'         => 'query',
				'attr_suffix'         => '',
				'type'                => 'composite',
				'composite_type'      => 'default',
				'composite_structure' => array(
					'include' => array(
						'label'    => esc_html( 'Include', 'academy-divi-modules' ),
						'controls' => array(
							'include_ids' => array(
								'label' => esc_html__( 'Include Courses IDs', 'academy-divi-modules' ),
								'type'  => 'textarea',
								'computed_affects' => array(
									'__shortcode',
								),
							),
						),
					),
					'exclude' => array(
						'label' => esc_html( 'Exclude', 'academy-divi-modules' ),
						'controls' => array(
							'exclude_ids' => array(
								'label' => esc_html__( 'Exclude Courses IDs', 'academy-divi-modules' ),
								'type'  => 'textarea',
								'computed_affects' => array(
									'__shortcode',
								),
							),
						),
					),
				),
			),
			// Shortcode for render in edit mode
			'__shortcode' => array(
                'type'            => 'computed', // Change type to computed
                'toggle_slug'     => 'content',
				'computed_callback'   => array(
					'ACDM_AcademyCourseCarousel',
					'get_shortcode',
				),
                'computed_depends_on' => array(
                    'course_count',
					'slides_per_view_dsk',
					'slides_per_view_tab',
					'slides_per_view_mobile',
					'slide_speed',
					'autoplay',
					'autoplay_speed',
					'slide_loop',
					'slide_navigation',
					'slide_pagination',
					'price_type',
					'course_level',
					'order',
					'order_by',
					'course_categories',
					'course_tags',
					'include_ids',
					'exclude_ids',
					'allow_course_pagination'
                ),
            ),
			
			// Course Card Styles

			'card_colors' => array(
				'label'               => esc_html__( 'Background Color', 'academy-divi-modules' ),
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'course_card',
				'type'                => 'composite',
				'composite_type'      => 'default',
				'composite_structure' => array(
					'normal_color' => array(
						'label'    => esc_html( 'Normal', 'academy-divi-modules' ),
						'controls' => array(
							'card_background_color' => array(
								'type'            => 'color',
								'tab_slug'    => 'advanced',
								'toggle_slug'     => 'course_card',
							),
						),
					),
					'hover_color' => array(
						'label'    => esc_html( 'Hover', 'academy-divi-modules' ),
						'controls' => array(
							'card_background_hover_color' => array(
								'type'            => 'color',
								'tab_slug'    => 'advanced',
								'toggle_slug'     => 'course_card',
							),
						),
					),
				),
			),

			'card_margin' => array(
				'label'           => esc_html__( 'Margin', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'course_card',
			),
			
			'card_padding' => array(
				'label'           => esc_html__( 'Padding', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'course_card',
			),
			
			// Course Title Styles

			'title_hover_color' => array(
				'label'           => esc_html__( 'Hover Color', 'academy-divi-modules' ),
				'type'            => 'color',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'course_title',
			),

			// Course Category Styles

			'category_hover_color' => array(
				'label'           => esc_html__( 'Hover Color', 'academy-divi-modules' ),
				'type'            => 'color',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'course_category',
			),

			// Course Author Styles

			'author_hover_color' => array(
				'label'           => esc_html__( 'Hover Color', 'academy-divi-modules' ),
				'type'            => 'color',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'course_author',
			),

			// Course Rating Styles

			'rating_hover_color' => array(
				'label'           => esc_html__( 'Hover Color', 'academy-divi-modules' ),
				'type'            => 'color',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'course_rating',
			),

			// Course Price Styles

			'price_hover_color' => array(
				'label'           => esc_html__( 'Hover Color', 'academy-divi-modules' ),
				'type'            => 'color',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'course_price',
			),

			// Wishlist Icon Styles

			'wishlist_icon_colors' => array(
				'label'               => esc_html__( 'Color', 'academy-divi-modules' ),
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'wishlist_icon',
				'type'                => 'composite',
				'composite_type'      => 'default',
				'composite_structure' => array(
					'normal_color' => array(
						'label'    => esc_html( 'Normal', 'academy-divi-modules' ),
						'controls' => array(
							'wishlist_icon_color' => array(
								'type'            => 'color',
								'tab_slug'    => 'advanced',
								'toggle_slug'     => 'wishlist_icon',
							),
						),
					),
					'hover_color' => array(
						'label'    => esc_html( 'Hover', 'academy-divi-modules' ),
						'controls' => array(
							'wishlist_icon_hover_color' => array(
								'type'            => 'color',
								'tab_slug'    => 'advanced',
								'toggle_slug'     => 'wishlist_icon',
							),
						),
					),
				),
			),

			'wishlist_icon_bg_colors' => array(
				'label'               => esc_html__( 'Background Color', 'academy-divi-modules' ),
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'wishlist_icon',
				'type'                => 'composite',
				'composite_type'      => 'default',
				'composite_structure' => array(
					'normal_bg_color' => array(
						'label'    => esc_html( 'Normal', 'academy-divi-modules' ),
						'controls' => array(
							'wishlist_icon_bg_color' => array(
								'type'            => 'color',
								'tab_slug'    => 'advanced',
								'toggle_slug'     => 'wishlist_icon',
							),
						),
					),
					'hover_bg_color' => array(
						'label'    => esc_html( 'Hover', 'academy-divi-modules' ),
						'controls' => array(
							'wishlist_icon_bg_hover_color' => array(
								'type'            => 'color',
								'tab_slug'    => 'advanced',
								'toggle_slug'     => 'wishlist_icon',
							),
						),
					),
				),
			),

			'wishlist_position_left' => array(
				'label'           => esc_html__( 'Position Left', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'wishlist_icon',
			),

			'wishlist_position_top' => array(
				'label'           => esc_html__( 'Position Top', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'wishlist_icon',
			),

			// Pagination Styles

			'pagination_bg_color' => array(
				'label'           => esc_html__( 'Dots Color', 'academy-divi-modules' ),
				'type'            => 'color',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'pagination_style',
			),

			'pagination_dots_size' => array(
				'label'           => esc_html__( 'Size', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'pagination_style',
			),

			'pagination_dots_align' => array(
				'label'           => esc_html__( 'Align', 'academy-divi-modules' ),
				'type'            => 'text_align',
				'options'         => et_builder_get_text_orientation_options(),
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'pagination_style',
			),
		);
	}
	
	public static function get_shortcode($settings = array()) {
		$courseids       = $settings['include_ids'];
		$exclude_ids    = $settings['exclude_ids'];
		$category      = $settings['course_categories'];
		// $cat_not_in    = $settings['course_exclude_categories'];
		$course_level   = $settings['course_level'];
		$price_type    = $settings['price_type'];
		$tag            = $settings['course_tags'];
		// $tag_not_in     = $settings['course_exclude_tags'];
		$orderby       = $settings['order_by'];
		$order         = $settings['order'];
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

		$column_per_row = 3;

		$grid_class = \Academy\Helper::get_responsive_column( array(
			'desktop' => $column_per_row,
			'tablet' => 2,
			'mobile' => 1,
		) );

		wp_reset_query();
		// phpcs:ignore WordPress.WP.DiscouragedFunctions.query_posts_query_posts
		query_posts( apply_filters( 'academy_courses_shortcode_args', $args ) );
		ob_start();
		echo '<div class="swiper">';
		echo '<div class="swiper-wrapper academy-courses academy-courses--grid" data-per-row="' . esc_attr( $column_per_row ) . '" data-per-page="' . esc_attr( $count ) . '">';
		
		if ( have_posts() ) {
			// Load posts loop.
			while ( have_posts() ) {
			the_post();
			echo '<div class="swiper-slide academy-courses__item">';
			echo '<div class="academy-col-lg-12 academy-col-md-12 academy-col-sm-12">';
			echo '<div class="academy-course">';
			do_action( 'academy/templates/before_course_loop' );
			do_action( 'academy/templates/course_loop_header' );
			do_action( 'academy/templates/course_loop_content' );
			do_action( 'academy/templates/course_loop_footer' );
			do_action( 'academy/templates/after_course_loop_item' );
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}
		wp_reset_postdata();
		} else {
			\Academy\Helper::get_template( 'archive/course-none.php' );
		}
		echo '</div>';
		?>
		<div class="swiper-pagination"></div>
		<div class="swiper-button-prev"></div>
    	<div class="swiper-button-next"></div>
		</div>
		<?php
		echo '</div>';

		$output = ob_get_clean();
		wp_reset_query();

		return $output;
	}

    public function render( $attrs, $content = null, $render_slug ) {

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '.academy-courses .academy-course',
			'declaration' => sprintf(
				'background-color: %1$s;',
				esc_html( $this->props['card_background_color'] )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .academy-course:hover',
				'declaration' => sprintf(
					'background-color: %1$s;',
					esc_html( $this->props['card_background_hover_color'] )
				),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '.academy-courses .academy-course',
			'declaration' => sprintf(
				'margin: %1$s;',
				esc_html( $this->props['card_margin'].'px')
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '.academy-courses .academy-course',
			'declaration' => sprintf(
				'padding: %1$s;',
				esc_html( $this->props['card_padding'].'px')
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '.academy-course:hover .academy-course__title a',
			'declaration' => sprintf(
				'color: %1$s;',
				esc_html( $this->props['title_hover_color'] )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '.academy-course:hover .academy-course__meta--categroy a',
			'declaration' => sprintf(
				'color: %1$s;',
				esc_html( $this->props['category_hover_color'] )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '.academy-course:hover .academy-course__author a',
			'declaration' => sprintf(
				'color: %1$s;',
				esc_html( $this->props['author_hover_color'] )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '.academy-course:hover .academy-course__rating .academy-group-star i::before',
			'declaration' => sprintf(
				'color: %1$s;',
				esc_html( $this->props['rating_hover_color'] )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '.academy-course:hover .academy-course__price',
			'declaration' => sprintf(
				'color: %1$s;',
				esc_html( $this->props['price_hover_color'] )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '.academy-courses .academy-course__header .academy-course-header-meta__wishlist',
			'declaration' => sprintf(
				'color: %1$s;',
				esc_html( $this->props['wishlist_icon_color'] )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '.academy-course-header-meta__wishlist.academy-add-to-wishlist-btn:hover',
			'declaration' => sprintf(
				'color: %1$s;',
				esc_html( $this->props['wishlist_icon_hover_color'] )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '.academy-courses .academy-course__header .academy-course-header-meta__wishlist',
			'declaration' => sprintf(
				'background-color: %1$s;',
				esc_html( $this->props['wishlist_icon_bg_color'] )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '.academy-course-header-meta__wishlist.academy-add-to-wishlist-btn:hover',
			'declaration' => sprintf(
				'background-color: %1$s;',
				esc_html( $this->props['wishlist_icon_bg_hover_color'] )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '.academy-courses .academy-course__header .academy-course-header-meta',
			'declaration' => sprintf(
				'left: %1$s;',
				esc_html( $this->props['wishlist_position_left'] )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '.academy-courses .academy-course__header .academy-course-header-meta',
			'declaration' => sprintf(
				'top: %1$s;',
				esc_html( $this->props['wishlist_position_top'] )
			),
		));

		// Pagination Styles

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '.swiper-pagination-bullet',
			'declaration' => sprintf('background-color: %1$s;',esc_html( $this->props['pagination_bg_color'] )),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '.swiper-pagination-bullet',
			'declaration' => sprintf('background-color: %1$s;',esc_html( $this->props['pagination_bg_color'] )),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '.swiper-pagination-bullet',
			'declaration' => sprintf(
				'width: %1$s; height: %2$s;',
				esc_html( $this->props['pagination_dots_size'].'px' ),
				esc_html( $this->props['pagination_dots_size'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '.swiper-pagination',
			'declaration' => sprintf(
				'text-align: %1$s;',
				esc_html( $this->props['pagination_dots_align'])),
		));

		$output = self::get_shortcode( $this->props );
		// Render empty string if no output is generated to avoid unwanted vertical space.
		if ( '' === $output ) {
			return '';
		}

		?>
		<!-- Handle Academy Carousel Controls on Frontend -->
		<div id="academy_divi_carousel_settings" 
		slides_per_view="<?php echo esc_attr( $this->props['slides_per_view_dsk'] ); ?>" 
		slide_speed="<?php echo esc_attr( $this->props['slide_speed'] ); ?>" 
		slide_autoplay="<?php echo esc_attr( $this->props['autoplay'] ); ?>" 
		autoplay_speed="<?php echo esc_attr( $this->props['autoplay_speed'] ); ?>" 
		slide_loop="<?php echo esc_attr( $this->props['slide_loop'] ); ?>" 
		slide_navigation="<?php echo esc_attr( $this->props['slide_navigation'] ); ?>" 
		slide_pagination="<?php echo esc_attr( $this->props['slide_pagination'] ); ?>"
		slides_per_view_dsk="<?php echo esc_attr( $this->props['slides_per_view_dsk'] ); ?>"
		slides_per_view_tab="<?php echo esc_attr( $this->props['slides_per_view_tab'] ); ?>"
		slides_per_view_mobile="<?php echo esc_attr( $this->props['slides_per_view_mobile'] ); ?>"></div>
		<?php

		return $this->_render_module_wrapper( $output, $render_slug );
	}	
}

new ACDM_AcademyCourseCarousel();