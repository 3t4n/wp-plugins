<?php
namespace AcademyEA\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use AcademyEA\Helper;
use AcademyEA\Traits\CommonStyle;

class CourseLastUpdate extends Widget_Base {
	use CommonStyle;

	public function get_name() {
		return 'academyea-course-last-update';
	}

	public function get_title() {
		return __( 'Course Last Update', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-clock';
	}

	public function get_categories() {
		return array( 'academyea-widgets' );
	}

	public function get_keywords() {
		return [ 'course last update', 'course', 'last', 'update', 'academy', 'lms' ];
	}

	public function get_style_depends() {
		return [ 'academyea-stylesheets' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'last_update_content',
			[
				'label' => __( 'General Settings', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'last_update_level',
			[
				'label' => __( 'Lavel', 'academy-elementor-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Last Update:', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'last_update_icon',
			[
				'label' => __( 'Icon', 'academy-elementor-addons' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'eicon-calendar',
					'library' => 'solid',
				],
			]
		);

		$this->add_responsive_control(
			'last_update_icon_gap',
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
					'{{WRAPPER}} .academy-course-last-update .last-update-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'last_update_align',
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
			'last_update_layout',
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
			'last_update_gap',
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
					'.elementor-layout-up .last-update-time' => 'margin-top: {{SIZE}}{{UNIT}};',
					'.elementor-layout-left .last-update-time' => 'margin-left: {{SIZE}}{{UNIT}};',
					'.elementor-layout--tabletup .last-update-time' => 'margin-top: {{SIZE}}{{UNIT}};',
					'.elementor-layout--tabletleft .last-update-time' => 'margin-left: {{SIZE}}{{UNIT}};',
					'.elementor-layout--mobileup .last-update-time' => 'margin-top: {{SIZE}}{{UNIT}};',
					'.elementor-layout--mobileleft .last-update-time' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'last_update_icon_style',
			array(
				'label' => __( 'Icon', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'last_update_icon_color',
			[
				'label'     => __( 'Color', 'academy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-course-last-update .last-update-icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .academy-course-last-update .last-update-icon svg path' => 'fill: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'last_update_icon_size',
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
					'{{WRAPPER}} .academy-course-last-update .last-update-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .academy-course-last-update .last-update-icon svg' => 'width: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 16,
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'last_update_label_style',
			array(
				'label' => __( 'Label', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->normal_element(
			'last_update_label',
			'{{WRAPPER}} .academy-course-last-update .last-update-label',
			[ 'typography', 'color' ]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'last_update_time_style',
			array(
				'label' => __( 'Date', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->normal_element(
			'last_update_time',
			'{{WRAPPER}} .academy-course-last-update .last-update-time',
			[ 'typography', 'color' ]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$course_id = ( \Elementor\Plugin::$instance->editor->is_edit_mode() || Helper::is_academyea_preview_mode() ) ? Helper::get_last_course_id() : get_the_ID();
		$date_format = get_option( 'date_format' );
		$last_update = get_the_modified_time( $date_format, $course_id );
		if ( ! $last_update ) :
			return;
		endif; ?>
		<div class="academy-course-last-update">
			<span class="last-update-label">
				<span class="last-update-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['last_update_icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
			<?php echo esc_html( $settings['last_update_level'] ); ?>
			</span>
			<span class="last-update-time"><?php echo esc_html( $last_update ); ?></span>
		</div>
	<?php }

}


