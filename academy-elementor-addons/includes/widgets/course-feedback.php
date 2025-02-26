<?php
namespace AcademyEA\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use AcademyEA\Helper;
use AcademyEA\Traits\CommonStyle;

class CourseFeedback extends Widget_Base {
	use CommonStyle;

	public function get_name() {
		return 'academyea-course-feedback';
	}

	public function get_title() {
		return __( 'Course Feedback', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-commenting-o';
	}

	public function get_categories() {
		return array( 'academyea-widgets' );
	}

	public function get_keywords() {
		return [ 'course feedback', 'course', 'feedback', 'academy', 'lms' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'course_feedback_content',
			[
				'label' => __( 'General Settings', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'academy-elementor-addons' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Student Feedback', 'academy-elementor-addons' ),
				'rows' => 3,
			]
		);

		$this->add_control(
			'total_text',
			[
				'label' => __( 'Total Text', 'academy-elementor-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Total', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'rating_text',
			[
				'label' => __( 'Rating Text', 'academy-elementor-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Ratings', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'academy-elementor-addons' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'title_style',
			array(
				'label' => __( 'Title', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->normal_element(
			'title',
			'{{WRAPPER}} .academy-single-course__content-item--feedback .feedback-title',
			[ 'typography', 'color' ]
		);

		$this->add_responsive_control(
			'title_margin',
			[
				'label' => __( 'Gap', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .academy-single-course__content-item--feedback .feedback-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 15,
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'rating_box_style',
			array(
				'label' => __( 'Rating Box', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'rating_box_general',
			[
				'label' => esc_html__( 'General Style', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->add_control(
			'rating_box_text_color',
			[
				'label'     => __( 'Text Color', 'academy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-single-course__content-item--feedback .academy-student-course-feedback-ratings .academy-avg-rating-total,{{WRAPPER}} .academy-single-course__content-item--feedback .academy-student-course-feedback-ratings .academy-ratings-list .academy-ratings-list-item' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'avg_rating_text_color',
			[
				'label'     => __( 'Average Rating Text Color', 'academy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-single-course__content-item--feedback .academy-student-course-feedback-ratings .academy-avg-rating' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'percentage_text_color',
			[
				'label'     => __( 'Percentage Text Color', 'academy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-single-course__content-item--feedback .academy-student-course-feedback-ratings .academy-ratings-list .academy-ratings-list-item .academy-ratings-list-item-label span' => 'color: {{VALUE}}',
				],
			]
		);

		$this->normal_element(
			'rating_box',
			'{{WRAPPER}} .academy-single-course__content-item--feedback .academy-student-course-feedback-ratings',
			[ 'background', 'padding' ]
		);

		$this->add_control(
			'rating_box_icon_style',
			[
				'label' => esc_html__( 'Icon Style', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'avg_icon_color',
			[
				'label'     => __( 'Average Icon Color', 'academy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .academy-single-course__content-item--feedback .academy-student-course-feedback-ratings .academy-avg-rating-html i:before' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'avg_icon_size',
			[
				'label' => __( 'Average Icon Size', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .academy-single-course__content-item--feedback .academy-student-course-feedback-ratings .academy-avg-rating-html i:before' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 16,
				],
			]
		);

		$this->add_control(
			'normal_icon_color',
			[
				'label'     => __( 'Normal Icon Color', 'academy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .academy-single-course__content-item--feedback .academy-student-course-feedback-ratings .academy-ratings-list i:before' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'normal_icon_size',
			[
				'label' => __( 'Normal IconSize', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .academy-single-course__content-item--feedback .academy-student-course-feedback-ratings .academy-ratings-list i:before' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 16,
				],
			]
		);

		$this->add_control(
			'rating_box_progressbar_style',
			[
				'label' => esc_html__( 'Progress Bar Style', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'progressbar_bg_color',
			[
				'label'     => __( 'Progressbar Background Color', 'academy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .academy-single-course__content-item--feedback .academy-student-course-feedback-ratings .academy-ratings-list-item .academy-ratings-list-item-fill' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'progressbar_fill_color',
			[
				'label'     => __( 'Progressbar Fill Color', 'academy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-single-course__content-item--feedback .academy-student-course-feedback-ratings .academy-ratings-list .academy-ratings-list-item .academy-ratings-list-item-fill-bar' => 'background: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$course_id = ( \Elementor\Plugin::$instance->editor->is_edit_mode() || Helper::is_academyea_preview_mode() ) ? Helper::get_last_course_id() : get_the_ID();

		$rating = \Academy\Helper::get_course_rating( $course_id ); ?>

		<div class="academy-single-course__content-item academy-single-course__content-item--feedback">
			<h2 class="feedback-title"><?php echo esc_html( $settings['title'] ); ?></h2>
			<div class="academy-student-course-feedback-ratings">
				<div class="academy-row academy-align-items-center">
					<div class="academy-col-md-4">
						<p class="academy-avg-rating">
							<?php
								echo number_format( $rating->rating_avg, 1 );
							?>
						</p>
						<p class="academy-avg-rating-html">
							<?php echo wp_kses_post( \Academy\Helper::star_rating_generator( $rating->rating_avg ) ); ?>
						</p>
						<p class="academy-avg-rating-total"><?php echo esc_html( $settings['total_text'] ); ?><span> <?php echo esc_html( $rating->rating_count ); ?></span> <?php echo esc_html( $settings['rating_text'] ); ?></p>
					</div>
					<div class="academy-col-md-8">
						<div class="academy-ratings-list">
							<?php
							foreach ( $rating->count_by_value as $key => $value ) {
								$rating_count_percent = round( ( $value > 0 ) ? ( $value * 100 ) / $rating->rating_count : 0 ); ?>
								<div class="academy-ratings-list-item">
									<div class="academy-ratings-list-item-col"><?php echo esc_html( $key ); ?></div>
									<div class="academy-ratings-list-item-col"><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
									<div class="academy-ratings-list-item-fill">
										<div class="academy-ratings-list-item-fill-bar" style="width: <?php echo esc_html( $rating_count_percent ); ?>%;"></div>
									</div>
									<div class="academy-ratings-list-item-label">
										<?php echo esc_html( $value ) . '<span>(' . esc_html( $rating_count_percent ) . '%)</span>'; ?>
									</div>
								</div>
								<?php
							} ?>
						</div>
					</div>
				</div>
			</div>       
		</div>
	<?php }

}

