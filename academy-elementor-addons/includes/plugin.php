<?php
namespace AcademyEA;

/**
 * Class Plugin
 *
 * Main Plugin class
 *
 * @since 1.0.0
 */
class Plugin {

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function widget_scripts() {
		// css
		wp_register_style( 'academyea-stylesheets', ACADEMYEA_ASSETS . 'css/style.css', [], filemtime( ACADEMYEA_CORE_ROOT_PATH . '/assets/css/style.css' ), 'all' );
		// slick-css
		wp_register_style( 'academyea-swiper-css', ACADEMYEA_ASSETS . 'lib/swiper/css/swiper-bundle.min.css', [], filemtime( ACADEMYEA_CORE_ROOT_PATH . '/assets/lib/swiper/css/swiper-bundle.min.css' ), 'all' );
		wp_register_style( 'academyea-swiper-custom-css', ACADEMYEA_ASSETS . 'lib/swiper/css/swiper-custom-style.css', [], filemtime( ACADEMYEA_CORE_ROOT_PATH . '/assets/lib/swiper/css/swiper-custom-style.css' ), 'all' );

		// Swiper Js
		wp_register_script(
			'academyea-swiper-js',
			ACADEMYEA_PLUGIN_URL . 'assets/lib/swiper/js/swiper-bundle.min.js',
			array(),
			ACADEMYEA_VERSION,
			true
		);

		wp_register_script( 'academyea-course-carousel-js', ACADEMYEA_PLUGIN_URL . 'assets/js/swiper-carousel.js', array( 'jquery' ), ACADEMYEA_VERSION, true );

	}

	public function editor_styles() {
		// Editor Style
		wp_register_style( 'academyea-editor-style', ACADEMYEA_ASSETS . 'css/editor-style.css', [], filemtime( ACADEMYEA_CORE_ROOT_PATH . '/assets/css/editor-style.css' ), 'all' );
		wp_enqueue_style( 'academyea-editor-style' );

	}

	/**
	 * Register Categories
	 *
	 * Register new Elementor widgets.
	 *
	 * @param  mixed $elements_manager
	 * @return void
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function register_categories( $elements_manager ) {
		$elements_manager->add_category(
			'academyea-widgets',
			[
				'title' => __( 'Academy Widgets', 'academy-elementor-addons' ),
				'icon'  => 'fa fa-plug',
			]
		);
		if ( get_post_type() === 'academyea-template' ) {
			$reorder_cats = function( $categories ) {
				uksort( $this->categories, function( $keyOne, $keyTwo ) {
					if ( substr( $keyOne, 0, 10 ) === 'academyea-' ) {
						return -1;
					}
					if ( substr( $keyTwo, 0, 10 ) === 'academyea-' ) {
						return 1;
					}
				});
			};
			$reorder_cats->call( $elements_manager, [ 'academyea-widgets' ] );
		}

	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @param  mixed $widgets_manager
	 * @return void
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function register_widgets( $widgets_manager ) {
		$template_type = '';
		if ( get_post_type() === 'academyea-template' ) {
			$template_type = get_post_meta( get_the_ID(), 'academyea_template_meta_type', true );
		}
		// Register Widgets
		foreach ( $this->generate_widget_list( $template_type ) as $element_key => $element ) {
			$widget_name = '\AcademyEA\Widgets\\' . $element['class'];
			if ( class_exists( $widget_name ) ) {
				$widgets_manager->register( new $widget_name() );
			}
		}
	}

	public function allow_academy_frontend_scripts( $allow ) {
		$widgets = (array) $this->widget_list_array();
		$page_widgets = (array) $this->page_widgets();
		if ( Helper::is_edit_mode() ) {
			return true;
		} elseif ( count( array_intersect( $page_widgets, $widgets ) ) !== 0 ) {
			return true;
		} elseif ( Helper::is_academyea_preview_mode() ) {
			return true;
		}
		return $allow;
	}

	public function allow_frontend_dashboard_scripts( $allow ) {
		$page_widgets = (array) $this->page_widgets();
		if ( Helper::is_edit_mode() ) {
			return true;
		} elseif ( in_array( 'academyea-dashboard', $page_widgets, true ) ) {
			return true;
		} elseif ( Helper::is_academyea_preview_mode() ) {
			return true;
		}
		return $allow;
	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		// allow Academy LMS Frontend Scripts
		add_filter( 'academy/load_frontend_scritps', [ $this, 'allow_academy_frontend_scripts' ] ); // remove after migrate all user
		add_filter( 'academy/is_load_common_scripts', [ $this, 'allow_academy_frontend_scripts' ] );
		add_filter( 'academy/is_load_frontend_dashboard_scripts', [ $this, 'allow_frontend_dashboard_scripts' ] );
		// Register widget scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );
		// Register Editor styles
		add_action( 'elementor/editor/after_enqueue_styles', [ $this, 'editor_styles' ] );
		// Register Categories
		add_action( 'elementor/elements/categories_registered', [ $this, 'register_categories' ] );
		// Register widgets
		add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
		Template::init();
		Admin::init();
	}

	/**
	 * Widget_list
	 *
	 * @return array
	 */
	public function widget_list() {
		$widget_list = [
			'archive' => [
				'academyea-course-grid' => [
					'title'    => esc_html__( 'Course Grid', 'academy-elementor-addons' ),
					'class'    => 'CourseGrid',
					'is_pro'   => false,
				],
				'academyea-course-filters' => [
					'title'    => esc_html__( 'Course Filters', 'academy-elementor-addons' ),
					'class'    => 'CourseFilters',
					'is_pro'   => false,
				],
			],
			'common' => [
				'academyea-dashboard' => [
					'title'    => esc_html__( 'User Dashboard', 'academy-elementor-addons' ),
					'class'    => 'Dashboard',
					'is_pro'   => false,
				],
				'academyea-registration' => [
					'title'    => esc_html__( 'Student/Instructor Registration', 'academy-elementor-addons' ),
					'class'    => 'Registration',
					'is_pro'   => false,
				],
				'academyea-course-grid' => [
					'title'    => esc_html__( 'Course Grid', 'academy-elementor-addons' ),
					'class'    => 'CourseGrid',
					'is_pro'   => false,
				],
				'academyea-course-filters' => [
					'title'    => esc_html__( 'Course Filters', 'academy-elementor-addons' ),
					'class'    => 'CourseFilters',
					'is_pro'   => false,
				],
				'academyea-course-carousel' => [
					'title'    => esc_html__( 'Course Carousel', 'academy-elementor-addons' ),
					'class'    => 'CourseCarousel',
					'is_pro'   => false,
				],

				'academyea-login-form' => [
					'title'    => esc_html__( 'Login Form', 'academy-elementor-addons' ),
					'class'    => 'LoginForm',
					'is_pro'   => false,
				],
				'academyea-course-enroll-form' => [
					'title'    => esc_html__( 'Course Enroll Form', 'academy-elementor-addons' ),
					'class'    => 'CourseEnrollForm',
					'is_pro'   => false,
				],
				'academyea-course-enroll-form' => [
					'title'    => esc_html__( 'Course Enroll Form', 'academy-elementor-addons' ),
					'class'    => 'CourseEnrollForm',
					'is_pro'   => false,
				],
				'academyea-curriculum-topbar' => [
					'title'    => esc_html__( 'curriculum Topbar', 'academy-elementor-addons' ),
					'class'    => 'CurriculumTopbar',
					'is_pro'   => false,
				],
				'academyea-curriculum-sidebar' => [
					'title'    => esc_html__( 'curriculum Sidebar', 'academy-elementor-addons' ),
					'class'    => 'CurriculumSidebar',
					'is_pro'   => false,
				],
				'academyea-curriculum-content' => [
					'title'    => esc_html__( 'curriculum Content', 'academy-elementor-addons' ),
					'class'    => 'CurriculumContent',
					'is_pro'   => false,
				],
				'academyea-course-Search' => [
					'title'    => esc_html__( 'Course Search', 'academy-elementor-addons' ),
					'class'    => 'CourseSearch',
					'is_pro'   => false,
				],

			],
			'course' => [
				'academyea-course-title' => [
					'title'    => esc_html__( 'Course Title', 'academy-elementor-addons' ),
					'class'    => 'CourseTitle',
					'is_pro'   => false,
				],
				'academyea-course-thumbnail' => [
					'title'    => esc_html__( 'Course Thumbnail', 'academy-elementor-addons' ),
					'class'    => 'CourseThumbnail',
					'is_pro'   => false,
				],
				'academyea-course-categories' => [
					'title'    => esc_html__( 'Course Categories', 'academy-elementor-addons' ),
					'class'    => 'CourseCategories',
					'is_pro'   => false,
				],
				'academyea-course-tags' => [
					'title'    => esc_html__( 'Course Tags', 'academy-elementor-addons' ),
					'class'    => 'CourseTags',
					'is_pro'   => false,
				],
				'academyea-course-description' => [
					'title'    => esc_html__( 'Course Description', 'academy-elementor-addons' ),
					'class'    => 'CourseDescription',
					'is_pro'   => false,
				],
				'academyea-course-benefits' => [
					'title'    => esc_html__( 'Course Benefits', 'academy-elementor-addons' ),
					'class'    => 'CourseBenefits',
					'is_pro'   => false,
				],
				'academyea-course-target-audience' => [
					'title'    => esc_html__( 'Course Target Audience', 'academy-elementor-addons' ),
					'class'    => 'CourseTargetAudience',
					'is_pro'   => false,
				],
				'academyea-course-requirements' => [
					'title'    => esc_html__( 'Course Requirements', 'academy-elementor-addons' ),
					'class'    => 'CourseRequirements',
					'is_pro'   => false,
				],
				'academyea-course-materials' => [
					'title'    => esc_html__( 'Course Materials', 'academy-elementor-addons' ),
					'class'    => 'CourseMaterials',
					'is_pro'   => false,
				],
				'academyea-course-price' => [
					'title'    => esc_html__( 'Course Price', 'academy-elementor-addons' ),
					'class'    => 'CoursePrice',
					'is_pro'   => false,
				],
				'academyea-course-total-enrolled' => [
					'title'    => esc_html__( 'Course Total Enrolled', 'academy-elementor-addons' ),
					'class'    => 'CourseTotalEnrolled',
					'is_pro'   => false,
				],
				'academyea-course-level' => [
					'title'    => esc_html__( 'Course Level', 'academy-elementor-addons' ),
					'class'    => 'CourseLevel',
					'is_pro'   => false,
				],
				'academyea-course-rating' => [
					'title'    => esc_html__( 'Course Rating', 'academy-elementor-addons' ),
					'class'    => 'CourseRating',
					'is_pro'   => false,
				],
				'academyea-course-last-update' => [
					'title'    => esc_html__( 'Course Last Update', 'academy-elementor-addons' ),
					'class'    => 'CourseLastUpdate',
					'is_pro'   => false,
				],
				'academyea-course-social-share' => [
					'title'    => esc_html__( 'Course Social Share', 'academy-elementor-addons' ),
					'class'    => 'CourseSocialShare',
					'is_pro'   => false,
				],
				'academyea-course-instructors' => [
					'title'    => esc_html__( 'Course Instructors', 'academy-elementor-addons' ),
					'class'    => 'CourseInstructors',
					'is_pro'   => false,
				],
				'academyea-course-duration' => [
					'title'    => esc_html__( 'Course Duration', 'academy-elementor-addons' ),
					'class'    => 'CourseDuration',
					'is_pro'   => false,
				],
				'academyea-course-curriculum' => [
					'title'    => esc_html__( 'Course Curriculum', 'academy-elementor-addons' ),
					'class'    => 'CourseCurriculum',
					'is_pro'   => false,
				],
				'academyea-course-feedback' => [
					'title'    => esc_html__( 'Course Feedback', 'academy-elementor-addons' ),
					'class'    => 'CourseFeedback',
					'is_pro'   => false,
				],
				'academyea-course-reviews' => [
					'title'    => esc_html__( 'Course Reviews', 'academy-elementor-addons' ),
					'class'    => 'CourseReviews',
					'is_pro'   => false,
				],
				'academyea-course-enroll-widget' => [
					'title'    => esc_html__( 'Course Enroll Widget', 'academy-elementor-addons' ),
					'class'    => 'CourseEnrollWidget',
					'is_pro'   => false,
				],
			],
			'builder_common' => [],
			'courses' => [],
		];

		return apply_filters( 'academyea_widget_list', $widget_list );
	}

	public function generate_widget_list( $tmpType ) {
		$widget_list = $this->widget_list();
		$common_widget  = $widget_list['common'];
		$builder_common = $widget_list['builder_common'];
		$template_wise  = ( isset( $widget_list[ $tmpType ] ) ? $widget_list[ $tmpType ] : [] );

		$generate_list = [];

		if ( '' === $tmpType ) {
			foreach ( $widget_list as $widget_list_key => $widget_list ) {

				if ( \Elementor\Plugin::instance()->editor->is_edit_mode() ) {
					$generate_list = $common_widget;
				} else {
					$generate_list += $widget_list;
				}
			}
		} else {
			$generate_list = array_merge( $template_wise, $builder_common );
		}

		return $generate_list;

	}

	public function page_widgets() {
		$post_id = get_the_ID();
		$document = \Elementor\Plugin::$instance->documents->get_doc_for_frontend( $post_id );
		if ( ! $document || ! $document->is_built_with_elementor() ) {
			return '';
		}
		$data = $document->get_elements_data();
		$data = $this->collect_elements_in_content( $data );
		return $data;
	}

	public function collect_elements_in_content( $elements ) {
		$collections = [];
		foreach ( $elements as $element ) {
			// collect widget
			if ( isset( $element['elType'] ) && 'widget' === $element['elType'] ) {
				if ( 'global' === $element['widgetType'] ) {
					$document = \Elementor\Plugin::$instance->documents->get( $element['templateID'] );

					if ( is_object( $document ) ) {
						$collections = array_merge( $collections, $this->collect_elements_in_content( $document->get_elements_data() ) );
					}
				} else {
					$collections[] = $element['widgetType'];
				}
			}

			if ( ! empty( $element['elements'] ) ) {
				$collections = array_merge( $collections, $this->collect_elements_in_content( $element['elements'] ) );
			}
		}//end foreach

		return $collections;
	}

	public function widget_list_array() {
		$widgets = [];
		$widget_list = $this->widget_list();
		$common_widget  = $widget_list['common'];
		$builder_common = $widget_list['builder_common'];
		$course = $widget_list['course'];
		$courses = $widget_list['courses'];
		$all_widget = array_merge( $common_widget, $builder_common, $course, $courses );
		foreach ( $all_widget as $widget_key => $widget ) {
			if ( 'academyea-dashboard' !== $widget_key ) {
				array_push( $widgets, $widget_key );
			}
		}
		return $widgets;
	}
}
