<?php
namespace AcademyEA\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use AcademyEA\Helper;
use AcademyEA\Traits\CommonStyle;

class CourseInstructors extends Widget_Base {
	use CommonStyle;

	public function get_name() {
		return 'academyea-course-instructors';
	}

	public function get_title() {
		return __( 'Course Instructors', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return array( 'academyea-widgets' );
	}

	public function get_keywords() {
		return [ 'course instructors', 'course', 'instructors', 'academy', 'lms' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'course_instructors_options',
			[
				'label' => __( 'General Options', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'instructors_title',
			[
				'label' => __( 'Instructor Title', 'academy-elementor-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Instructor', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'show_instructor_content',
			[
				'label' => __( 'Show Profile Content', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'separator' => 'after',
				'label_on' => __( 'Show', 'academy-elementor-addons' ),
				'label_off' => __( 'Hide', 'academy-elementor-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_instructor_thumbnail',
			[
				'label' => __( 'Show Profile Picture', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'academy-elementor-addons' ),
				'label_off' => __( 'Hide', 'academy-elementor-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'instructor_review_title',
			[
				'label' => __( 'Review Title', 'academy-elementor-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Reviews', 'academy-elementor-addons' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'show_instructor_rating',
			[
				'label' => __( 'Show Profile Rating', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'academy-elementor-addons' ),
				'label_off' => __( 'Hide', 'academy-elementor-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'instructors_general_style',
			array(
				'label' => __( 'General Style', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'instructor_separator_width',
			[
				'label' => __( 'Separator Width', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 10,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .academy-single-course__content-item--instructors .course-single-instructor' => 'border-bottom-width: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 1,
				],
			]
		);

		$this->add_control(
			'instructor_separator_color',
			[
				'label' => esc_html__( 'Separator Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-single-course__content-item--instructors .course-single-instructor' => 'border-bottom-color: {{VALUE}};',
				],
			]
		);

		$this->normal_element(
			'single_instructor',
			'{{WRAPPER}} .academy-single-course__content-item--instructors .course-single-instructor',
			[ 'padding' ]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'instructors_thumbnail_style',
			array(
				'label' => __( 'Thumbnail', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'thumbnail_image_size',
			[
				'label' => __( 'Image Size', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .instructor-info .instructor-info__thumbnail img' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}; max-width: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}}; font-size: calc({{SIZE}}{{UNIT}}/2 - 3px)',
				],
				'default' => [
					'size' => 48,
				],
			]
		);

		$this->normal_element(
			'thumbnail_image',
			'{{WRAPPER}} .instructor-info .instructor-info__thumbnail img',
			[ 'background', 'border', 'radius', 'padding' ]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'instructors_content_style',
			array(
				'label' => __( 'Content', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->start_controls_tabs( 'instructors_content_style_tabs' );

			$this->start_controls_tab(
				'instructors_content_title_style_tab',
				[
					'label' => __( 'Title', 'academy-elementor-addons' ),
				]
			);

			$this->normal_element(
				'instructors_content_title',
				'{{WRAPPER}} .instructor-info .instructor-info__content .instructor-title',
				[ 'typography', 'color' ]
			);

			$this->end_controls_tab();

			$this->start_controls_tab(
				'instructors_content_name_style_tab',
				[
					'label' => __( 'Name', 'academy-elementor-addons' ),
				]
			);

			$this->normal_element(
				'instructors_content_name',
				'{{WRAPPER}} .instructor-info .instructor-info__content .instructor-name a',
				[ 'typography', 'color' ]
			);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'instructors_review_style',
			array(
				'label' => __( 'Review', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->start_controls_tabs( 'instructors_review_style_tabs' );

			$this->start_controls_tab(
				'instructors_review_title_style_tab',
				[
					'label' => __( 'Title', 'academy-elementor-addons' ),
				]
			);

			$this->normal_element(
				'instructors_review_title',
				'{{WRAPPER}} .instructor-review .instructor-review__title',
				[ 'typography', 'color' ]
			);

			$this->end_controls_tab();

			$this->start_controls_tab(
				'instructors_review_icon_style_tab',
				[
					'label' => __( 'Icon', 'academy-elementor-addons' ),
				]
			);

			$this->normal_element(
				'instructors_review_icon',
				'{{WRAPPER}} .instructor-review .instructor-review__rating i:before',
				[ 'typography', 'color' ]
			);

			$this->end_controls_tab();

			$this->start_controls_tab(
				'instructors_review_text_style_tab',
				[
					'label' => __( 'Text', 'academy-elementor-addons' ),
				]
			);

			$this->normal_element(
				'instructors_review_text',
				'{{WRAPPER}} .instructor-review .instructor-review__rating .instructor-review__rating-number, {{WRAPPER}} .instructor-review .instructor-review__rating .instructor-review__rating-number span',
				[ 'typography', 'color' ]
			);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$course_id = ( \Elementor\Plugin::$instance->editor->is_edit_mode() || Helper::is_academyea_preview_mode() ) ? Helper::get_last_course_id() : get_the_ID();
		$instructors = \Academy\Helper::get_instructors_by_course_id( $course_id );
		if ( ! $instructors ) :
			return;
		endif; ?>

		<div class="academy-single-course__content-item academy-single-course__content-item--instructors">
			<?php
			foreach ( $instructors as $instructor ) :
				$reviews = \Academy\Helper::get_instructor_ratings( get_the_author_meta( 'ID', $instructor->ID ) );
				?>
			<div class="course-single-instructor">
				<div class="instructor-info">
					<?php if ( 'yes' === $settings['show_instructor_thumbnail'] ) : ?>
					<div class="instructor-info__thumbnail">
						<?php
						if ( \Academy\Helper::get_settings( 'is_show_public_profile' ) ) :
							?>
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID', $instructor->ID ) ) ); ?>">
								<img src="<?php echo esc_url( get_avatar_url( $instructor->ID ) ); ?>" alt="<?php esc_attr_e( 'profile', 'academy-elementor-addons' ); ?>">
							</a>
							<?php
						else :
							?>
							<img src="<?php echo esc_url( get_avatar_url( $instructor->ID ) ); ?>" alt="<?php esc_attr_e( 'profile', 'academy-elementor-addons' ); ?>">
						<?php endif; ?>
					</div>
					<?php endif; if ( 'yes' === $settings['show_instructor_content'] ) : ?>
					<div class="instructor-info__content">
						<span class="instructor-title"><?php echo esc_html( $settings['instructors_title'] ); ?></span>
						<h4 class="instructor-name">
						<?php
						if ( \Academy\Helper::get_settings( 'is_show_public_profile' ) ) :
							?>
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID', $instructor->ID ) ) ); ?>">
							<?php echo esc_html( $instructor->display_name ); ?>
							</a>
							<?php else : ?>
								<?php echo esc_html( $instructor->display_name ); ?>
							<?php endif; ?>
						</h4>
					</div>
					<?php endif; ?>
				</div>
				<?php if ( 'yes' === $settings['show_instructor_rating'] ) : ?>
				<div class="instructor-review">
					<span class="instructor-review__title"><?php echo esc_html( $settings['instructor_review_title'] ); ?></span>
					<span class="instructor-review__rating">
						<?php
						echo wp_kses_post( \Academy\Helper::star_rating_generator( $reviews->rating_avg ) );
						?>
						<span class="instructor-review__rating-number"><?php echo esc_html( $reviews->rating_avg ) . ' <span>(' . esc_html( $reviews->rating_count ) . ' ' . esc_html__( 'Reviews', 'academy-elementor-addons' ) . ')</span>'; ?></span> 
					</span>
				</div>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>

	<?php  }

}
