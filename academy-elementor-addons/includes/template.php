<?php
namespace AcademyEA;

/**
 *  Course Custom Layout
 */
class Template {

	public static function init() {
		$self = new self();
		add_action( 'init', array( $self, 'dispatch_hooks' ) );
	}

	public function dispatch_hooks() {
		// Manage Body classes
		add_filter( 'body_class', array( $this, 'body_classes' ) );

		// Course details page
		add_filter( 'template_include', array( $this, 'get_course_elementor_template' ) );
		add_action( 'academyea_single_course_content', array( $this, 'get_course_content_elementor' ), 5 );

		// Course Archive Page
		add_filter( 'template_include', array( $this, 'get_archive_course_elementor_template' ) );
		add_action( 'academyea_course_archive_content', array( $this, 'get_archive_course_content_elementor' ), 5 );
	}

	public function body_classes( $classes ) {

		$class_prefix = 'elementor-page-';

		if ( ( is_singular( 'academy_courses' ) || is_singular( 'academyea-template' ) ) && false !== $this->has_template( 'singlecoursepage' ) ) {
			$classes[] = $class_prefix . $this->has_template( 'singlecoursepage' );
			$classes[] = 'academy-single-course';
		}
		if ( 'academyea-template' === get_post_type() ) {
			$classes[] = 'academy-single-course';
		}
		return $classes;
	}

	public function has_template( $field_key ) {
		$template_id = Helper::get_option( $field_key, 'academyea_template_tabs', '0' );
		if ( '0' !== $template_id ) {
			return $template_id;
		} else {
			return false;
		}
	}

	public function get_course_elementor_template( $template ) {
		if ( is_embed() ) {
			return $template;
		}
		if ( is_singular( 'academy_courses' ) ) {
			$single_template_id = self::course_single_template_id();
			if ( '0' !== $single_template_id ) {
				$page_template_slug = get_page_template_slug( $single_template_id );
				if ( 'elementor_header_footer' === $page_template_slug ) {
					$template = ACADEMYEA_CORE_ROOT_PATH . 'templates/single-course-fullwidth.php';
				} elseif ( 'elementor_canvas' === $page_template_slug ) {
					$template = ACADEMYEA_CORE_ROOT_PATH . 'templates/single-course-canvas.php';
				} else {
					$template = ACADEMYEA_CORE_ROOT_PATH . 'templates/single-course.php';
				}
			}
		}
		return $template;
	}

	public function get_archive_course_elementor_template( $template ) {
		if ( is_embed() ) {
			return $template;
		}
		if ( is_post_type_archive( 'academy_courses' ) ) {
			$single_template_id = self::archive_course_template_id();
			if ( '0' !== $single_template_id ) {
				$page_template_slug = get_page_template_slug( $single_template_id );

				$template = ACADEMYEA_CORE_ROOT_PATH . 'templates/archive-course.php';

			}
		}
		return $template;
	}

	public static function course_single_template_id() {
		$template_id = Helper::get_option( 'singlecoursepage', 'academyea_template_tabs', '0' );
		return $template_id;
	}

	public static function archive_course_template_id() {
		$template_id = Helper::get_option( 'archivepage', 'academyea_template_tabs', '0' );
		return $template_id;
	}

	public static function get_course_content_elementor() {
		$course_single_id = self::course_single_template_id();
		if ( '0' !== $course_single_id ) {
			echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $course_single_id );// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} else {
			the_content();
		}
	}

	public static function get_archive_course_content_elementor() {
		$archive_course_id = self::archive_course_template_id();
		if ( '0' !== $archive_course_id ) {
			echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $archive_course_id );// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} else {
			the_content();
		}
	}

	public static function is_custom_single_course_template() {
		$templatestatus = false;
		if ( is_singular( 'academy_courses' ) ) {
			if ( ! empty( self::course_single_template_id() ) && '0' !== self::course_single_template_id() ) {
				$templatestatus = true;
			}
		}
		return apply_filters( 'is_custom_single_course_template', $templatestatus );
	}

}
