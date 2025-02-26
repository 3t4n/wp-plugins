<?php
namespace AcademyEA\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use AcademyEA\Helper;
use AcademyEA\Traits\CommonStyle;

class CourseLevel extends Widget_Base {
	use CommonStyle;

	public function get_name() {
		return 'academyea-course-level';
	}

	public function get_title() {
		return __( 'Course Level', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-kit-details';
	}

	public function get_categories() {
		return array( 'academyea-widgets' );
	}

	public function get_keywords() {
		return [ 'course level', 'course', 'level', 'academy', 'lms' ];
	}

	public function get_style_depends() {
		return [ 'academyea-stylesheets' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'course_level_content',
			[
				'label' => __( 'General Settings', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'course_level_lavel',
			[
				'label' => __( 'Lavel', 'academy-elementor-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Skill:', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'course_level_icon',
			[
				'label' => __( 'Icon', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-sliders-h',
					'library' => 'fa-solid',
				],
			]
		);

		$this->add_responsive_control(
			'course_level_icon_gap',
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
					'{{WRAPPER}} .academy-course-dificulty-level .dificulty-level-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'course_level_align',
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
			'course_level_layout',
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
			'course_level_gap',
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
					'.elementor-layout-up .dificulty-level' => 'margin-top: {{SIZE}}{{UNIT}};',
					'.elementor-layout-left .dificulty-level' => 'margin-left: {{SIZE}}{{UNIT}};',
					'.elementor-layout--tabletup .dificulty-level' => 'margin-top: {{SIZE}}{{UNIT}};',
					'.elementor-layout--tabletleft .dificulty-level' => 'margin-left: {{SIZE}}{{UNIT}};',
					'.elementor-layout--mobileup .dificulty-level' => 'margin-top: {{SIZE}}{{UNIT}};',
					'.elementor-layout--mobileleft .dificulty-level' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'course_level_icon_style',
			array(
				'label' => __( 'Icon', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'course_level_icon_color',
			[
				'label'     => __( 'Color', 'academy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .academy-course-dificulty-level .dificulty-level-icon i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'course_level_icon_size',
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
					'{{WRAPPER}} .academy-course-dificulty-level .dificulty-level-icon svg' => 'width: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 16,
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'course_level_label_style',
			array(
				'label' => __( 'Label', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->normal_element(
			'course_level_label',
			'{{WRAPPER}} .academy-course-dificulty-level .dificulty-label',
			[ 'typography', 'color' ]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'course_level_text_style',
			array(
				'label' => __( 'Text', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->normal_element(
			'course_level_text',
			'{{WRAPPER}} .academy-course-dificulty-level .dificulty-level',
			[ 'typography', 'color' ]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$course_id = ( \Elementor\Plugin::$instance->editor->is_edit_mode() || Helper::is_academyea_preview_mode() ) ? Helper::get_last_course_id() : get_the_ID();
		$difficulty_level = get_post_meta( $course_id, 'academy_course_difficulty_level', true );
		if ( $difficulty_level ) : ?>
		<div class="academy-course-dificulty-level">
			<span class="dificulty-label">
				<span class="dificulty-level-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['course_level_icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
			<?php echo esc_html( $settings['course_level_lavel'] ); ?>
			</span>
			<span class="dificulty-level"><?php echo esc_html( $difficulty_level ); ?></span>
		</div>
		<?php elseif ( \Elementor\Plugin::instance()->editor->is_edit_mode() ) :
			echo '<div class="no-data-message">' . wp_kses_post( __( '<strong>Editor Only Message:</strong> Please add course difficulty level in latest course from the course editor', 'academy-elementor-addons' ) ) . '</div>';
		endif;
	}
}


