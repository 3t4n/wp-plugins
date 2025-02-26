<?php
namespace AcademyEA\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use AcademyEA\Helper;
use AcademyEA\Traits\CommonStyle;

class CourseRating extends Widget_Base {
	use CommonStyle;

	public function get_name() {
		return 'academyea-course-rating';
	}

	public function get_title() {
		return __( 'Course Rating', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-rating';
	}

	public function get_categories() {
		return array( 'academyea-widgets' );
	}

	public function get_keywords() {
		return [ 'course rating', 'course', 'rating', 'academy', 'lms' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'course_rating_content',
			[
				'label' => __( 'General Settings', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'course_rating_text',
			[
				'label'   => __( 'Rating Text', 'academy-elementor-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Reviews', 'academy-elementor-addons' ),
			]
		);

		$this->add_responsive_control(
			'course_rating_align',
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
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
				'default'      => 'left',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'course_rating_icon_style',
			array(
				'label' => __( 'Icon', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->normal_element(
			'course_rating_icon',
			'{{WRAPPER}} .single-course-review__rating .academy-group-star i:before',
			[ 'color', 'typography' ]
		);

		$this->add_responsive_control(
			'rating_icon_gap',
			[
				'label' => __( 'Icon Gap', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .single-course-review__rating .academy-group-star i' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 5,
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'course_rating_style',
			array(
				'label' => __( 'Rating', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->normal_element(
			'course_rating',
			'{{WRAPPER}} .single-course-review__rating .single-course-review__rating-number',
			[ 'color', 'typography' ]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'course_rating_text_style',
			array(
				'label' => __( 'Rating Text', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->normal_element(
			'course_rating_text',
			'{{WRAPPER}} .single-course-review__rating .single-course-review__rating-number .rating-text',
			[ 'color', 'typography' ]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$course_id = ( \Elementor\Plugin::$instance->editor->is_edit_mode() || Helper::is_academyea_preview_mode() ) ? Helper::get_last_course_id() : get_the_ID();
		$reviews = \Academy\Helper::get_course_rating( $course_id ); ?>

		<span class="single-course-review__rating">
			<?php
			echo wp_kses_post( \Academy\Helper::star_rating_generator( $reviews->rating_avg ) );
			?>
			<span class="single-course-review__rating-number"><?php echo esc_attr( $reviews->rating_avg ) . ' <span class="rating-text">(' . esc_attr( $reviews->rating_count ) . ' ' . esc_html( $settings['course_rating_text'] ) . ')</span>'; ?></span> 
		</span>
	<?php }

}
