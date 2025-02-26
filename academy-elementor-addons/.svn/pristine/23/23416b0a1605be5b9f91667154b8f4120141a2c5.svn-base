<?php
namespace AcademyEA\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use AcademyEA\Helper;
use AcademyEA\Traits\CommonStyle;

class CourseTotalEnrolled extends Widget_Base {
	use CommonStyle;

	public function get_name() {
		return 'academyea-course-total-enrolled';
	}

	public function get_title() {
		return __( 'Course Total Enrolled', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-preferences';
	}

	public function get_categories() {
		return array( 'academyea-widgets' );
	}

	public function get_keywords() {
		return [ 'course total enrolled', 'course', 'enrolled', 'academy', 'lms' ];
	}

	public function get_style_depends() {
		return [ 'academyea-stylesheets' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'total_enrolled_content',
			[
				'label' => __( 'General Settings', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'total_enrolled_level',
			[
				'label' => __( 'Lavel', 'academy-elementor-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Enrolled', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'total_enrolled_icon',
			[
				'label' => __( 'Icon', 'academy-elementor-addons' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fa fa-users',
					'library' => 'solid',
				],
			]
		);

		$this->add_responsive_control(
			'total_enrolled_icon_gap',
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
					'{{WRAPPER}} .academy-course-total-enrolled .enrolled-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'total_enrolled_align',
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
			'total_enrolled_layout',
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
			'total_enrolled_gap',
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
					'.elementor-layout-up .enrolled-number' => 'margin-top: {{SIZE}}{{UNIT}};',
					'.elementor-layout-left .enrolled-number' => 'margin-left: {{SIZE}}{{UNIT}};',
					'.elementor-layout--tabletup .enrolled-number' => 'margin-top: {{SIZE}}{{UNIT}};',
					'.elementor-layout--tabletleft .enrolled-number' => 'margin-left: {{SIZE}}{{UNIT}};',
					'.elementor-layout--mobileup .enrolled-number' => 'margin-top: {{SIZE}}{{UNIT}};',
					'.elementor-layout--mobileleft .enrolled-number' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'total_enrolled_icon_style',
			array(
				'label' => __( 'Icon', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'total_enrolled_icon_color',
			[
				'label'     => __( 'Color', 'academy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-course-total-enrolled .enrolled-icon i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'total_enrolled_icon_size',
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
					'{{WRAPPER}} .academy-course-total-enrolled .enrolled-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 16,
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'total_enrolled_label_style',
			array(
				'label' => __( 'Label', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->normal_element(
			'total_enrolled_label',
			'{{WRAPPER}} .academy-course-total-enrolled .enrolled-label',
			[ 'typography', 'color' ]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'total_enrolled_number_style',
			array(
				'label' => __( 'Number', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->normal_element(
			'total_enrolled_number',
			'{{WRAPPER}} .academy-course-total-enrolled .enrolled-number',
			[ 'typography', 'color' ]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$course_id = ( \Elementor\Plugin::$instance->editor->is_edit_mode() || Helper::is_academyea_preview_mode() ) ? Helper::get_last_course_id() : get_the_ID();
		$total_enrolled = \Academy\Helper::count_course_enrolled( $course_id ); ?>
		<div class="academy-course-total-enrolled">
			<span class="enrolled-label">
				<span class="enrolled-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['total_enrolled_icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
			<?php echo esc_html( $settings['total_enrolled_level'] ); ?>
			</span>
			<span class="enrolled-number"><?php echo esc_html( $total_enrolled ); ?></span>
		</div>
	<?php }

}


