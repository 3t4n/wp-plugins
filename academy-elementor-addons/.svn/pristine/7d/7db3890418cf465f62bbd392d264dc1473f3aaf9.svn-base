<?php
namespace AcademyEA\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use AcademyEA\Helper;
use AcademyEA\Traits\CommonStyle;

class CourseDuration extends Widget_Base {
	use CommonStyle;

	public function get_name() {
		return 'academyea-course-duration';
	}

	public function get_title() {
		return __( 'Course Duration', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-clock-o';
	}

	public function get_categories() {
		return array( 'academyea-widgets' );
	}

	public function get_keywords() {
		return [ 'course duration', 'course', 'duration', 'academy', 'lms' ];
	}

	public function get_style_depends() {
		return [ 'academyea-stylesheets' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'course_duration_content',
			[
				'label' => __( 'General Settings', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'course_duration_level',
			[
				'label' => __( 'Lavel', 'academy-elementor-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Duration', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'course_duration_icon',
			[
				'label' => __( 'Icon', 'academy-elementor-addons' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-clock',
					'library' => 'solid',
				],
			]
		);

		$this->add_responsive_control(
			'course_duration_icon_gap',
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
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} .academy-course-duration .duration-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'course_duration_align',
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

		$this->add_responsive_control(
			'course_duration_layout',
			[
				'label' => __( 'Layout', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'academy-elementor-addons' ),
						'icon' => 'eicon-h-align-left',
					],
					'up' => [
						'title' => __( 'Up', 'academy-elementor-addons' ),
						'icon' => 'eicon-v-align-top',
					],

				],
				'prefix_class' => 'elementor-layout-%s',
				'default' => 'left',
			]
		);

		$this->add_responsive_control(
			'course_duration_gap',
			[
				'label' => __( 'Gap', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
				'selectors' => [
					'.elementor-layout-up .duration-time' => 'margin-top: {{SIZE}}{{UNIT}};',
					'.elementor-layout-left .duration-time' => 'margin-left: {{SIZE}}{{UNIT}};',
					'.elementor-layout--tabletup .duration-time' => 'margin-top: {{SIZE}}{{UNIT}};',
					'.elementor-layout--tabletleft .duration-time' => 'margin-left: {{SIZE}}{{UNIT}};',
					'.elementor-layout--mobileup .duration-time' => 'margin-top: {{SIZE}}{{UNIT}};',
					'.elementor-layout--mobileleft .duration-time' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'course_duration_icon_style',
			array(
				'label' => __( 'Icon', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'course_duration_icon_color',
			[
				'label'     => __( 'Color', 'academy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-course-duration .duration-icon i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'course_duration_icon_size',
			[
				'label' => __( 'Size', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .academy-course-duration .duration-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 16,
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'course_duration_label_style',
			array(
				'label' => __( 'Label', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->normal_element(
			'course_duration_label',
			'{{WRAPPER}} .academy-course-duration .duration-label',
			[ 'typography', 'color' ]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'course_duration_time_style',
			array(
				'label' => __( 'Time', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->normal_element(
			'course_duration_time',
			'{{WRAPPER}} .academy-course-duration .duration-time',
			[ 'typography', 'color' ]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$course_id = ( \Elementor\Plugin::$instance->editor->is_edit_mode() || Helper::is_academyea_preview_mode() ) ? Helper::get_last_course_id() : get_the_ID();
		$duration = \Academy\Helper::get_course_duration( $course_id );
		if ( $duration ) : ?>
			<div class="academy-course-duration">
				<span class="duration-label">
					<span class="duration-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['course_duration_icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
				<?php echo esc_html( $settings['course_duration_level'] ); ?>
				</span>
				<span class="duration-time"><?php echo esc_html( $duration ); ?></span>
			</div>
			<?php
		elseif ( \Elementor\Plugin::instance()->editor->is_edit_mode() ) :
			echo '<div class="no-data-message">' . wp_kses_post( __( '<strong>Editor Only Message:</strong> Please add course duration in latest course from the course editor', 'academy-elementor-addons' ) ) . '</div>';
		endif;
	}
}

