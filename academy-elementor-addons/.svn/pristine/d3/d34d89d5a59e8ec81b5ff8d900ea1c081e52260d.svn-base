<?php
namespace AcademyEA\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use AcademyEA\Traits\CommonStyle;

class CourseEnrollForm extends Widget_Base {
	use CommonStyle;

	public function get_name() {
		return 'academyea-course-enroll-form';
	}

	public function get_title() {
		return __( 'Course Enroll Form', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-sidebar';
	}

	public function get_categories() {
		return array( 'academyea-widgets' );
	}

	public function get_keywords() {
		return [ 'course enroll form', 'enroll button', 'course', 'form', 'enroll', 'academy', 'lms' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'enroll_form_general_settings',
			[
				'label' => __( 'General Settings', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'course_id',
			[
				'label' => esc_html__( 'Course ID', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
			]
		);

		$this->end_controls_section();

		$this->button_style(
			[
				'title'          => esc_html__( 'Enroll Button', 'academy-elementor-addons' ),
				'slug'           => 'enroll_button',
				'selector'       => '{{WRAPPER}} .academy-elementor-enroll-form .academy-widget-enroll__enroll-form button.academy-btn',
				'hover_selector' => '{{WRAPPER}} .academy-elementor-enroll-form .academy-widget-enroll__enroll-form:hover .academy-btn',
			]
		);

		$this->button_style(
			[
				'title'          => esc_html__( 'Start Course/Continue Button', 'academy-elementor-addons' ),
				'slug'           => 'start_course_button',
				'selector'       => '{{WRAPPER}} .academy-elementor-enroll-form .academy-widget-enroll__continue a',
				'hover_selector' => '{{WRAPPER}} .academy-elementor-enroll-form .academy-widget-enroll__continue:hover a',
			]
		);

		$this->button_style(
			[
				'title'          => esc_html__( 'Complete Course Button', 'academy-elementor-addons' ),
				'slug'           => 'complete_course_button',
				'selector'       => '{{WRAPPER}} .academy-elementor-enroll-form .academy-widget-enroll__complete-form button.academy-btn',
				'hover_selector' => '{{WRAPPER}} .academy-elementor-enroll-form .academy-widget-enroll__complete-form button.academy-btn:hover',
			]
		);

		$this->button_style(
			[
				'title'          => esc_html__( 'Cart Button', 'academy-elementor-addons' ),
				'slug'           => 'cart_button',
				'selector'       => '{{WRAPPER}} .academy-elementor-enroll-form .academy-widget-enroll__add-to-cart a',
				'hover_selector' => '{{WRAPPER}} .academy-elementor-enroll-form .academy-widget-enroll__add-to-cart:hover a',
			]
		);

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="academy-elementor-enroll-form">
			<?php echo do_shortcode( "[academy_enroll_form course_id='" . $settings['course_id'] . "']" ); ?>   
		</div>
	<?php }

}
