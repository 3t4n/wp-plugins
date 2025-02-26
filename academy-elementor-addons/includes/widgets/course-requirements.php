<?php
namespace AcademyEA\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use AcademyEA\Helper;
use AcademyEA\Traits\CommonStyle;

class CourseRequirements extends Widget_Base {
	use CommonStyle;

	public function get_name() {
		return 'academyea-course-requirements';
	}

	public function get_title() {
		return __( 'Course Requirements', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-kit-details';
	}

	public function get_categories() {
		return array( 'academyea-widgets' );
	}

	public function get_keywords() {
		return [ 'course requirements', 'course', 'requirements', 'academy', 'lms' ];
	}

	public function get_style_depends() {
		return [ 'academyea-stylesheets' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'course_requirements_options',
			[
				'label' => __( 'General Options', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'course_requirements_heading',
			[
				'label'   => __( 'Heading', 'academy-elementor-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Requirements', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'course_requirements_heading_tag',
			[
				'label'   => __( 'Heading Tag', 'academy-elementor-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => Helper::html_tag_lists(),
				'default' => 'h3',
			]
		);

		$this->add_responsive_control(
			'course_requirements_layout',
			[
				'label'        => __( 'Layout', 'academy-elementor-addons' ),
				'type'         => Controls_Manager::CHOOSE,
				'options'      => [
					'list'   => [
						'title' => __( 'List', 'academy-elementor-addons' ),
						'icon'  => 'fa fa-list-ul',
					],
					'inline' => [
						'title' => __( 'Inline', 'academy-elementor-addons' ),
						'icon'  => 'fa fa-ellipsis-h',
					],
				],
				'prefix_class' => 'course-requirements-layout-%s',
				'default'      => 'list',
			]
		);

		$this->add_control(
			'course_requirements_list_icon',
			[
				'label' => __( 'List Icon', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-check',
					'library' => 'fa-solid',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'course_requirements_title_style',
			array(
				'label' => __( 'Title', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->normal_element(
			'course_target_audience_title',
			'{{WRAPPER}} .requirements-title',
			[ 'typography', 'color' ]
		);

		$this->add_responsive_control(
			'course_requirements_title_gap',
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
				'selectors' => [
					'{{WRAPPER}} .requirements-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 10,
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'course_requirements_list_style',
			array(
				'label' => __( 'List', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_responsive_control(
			'course_requirements_space_between',
			[
				'label' => __( 'Space Between Vertical', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'.course-requirements-layout-list .requirements-information-list li:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'.course-requirements-layout-inline .requirements-information-list li:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}};margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 15,
				],
			]
		);
		$this->add_responsive_control(
			'course_requirements_space_between_horizontal',
			[
				'label' => __( 'Space Between Horizontal', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'.requirements-information-list li' => 'gap: {{SIZE}}{{UNIT}};',
					'.requirements-information-list li span' => 'margin-right: {{SIZE}}{{UNIT}};',

				],
				'default' => [
					'size' => 10,
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'course_requirements_list_typography',
				'selector' => '{{WRAPPER}} .requirements-content .requirements-information-list li span',
			]
		);
		$this->add_control(
			'course_requirements_list_color',
			[
				'label' => esc_html__( 'Text Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .requirements-content .requirements-information-list li span' => 'color: {{VALUE}}',
				],
			]
		);
		$this->normal_element(
			'course_target_audience_list',
			'{{WRAPPER}} .requirements-information-list li',
			[ 'border', 'radius', 'padding' ]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'course_requirements_icon_style',
			array(
				'label' => __( 'Icon', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'course_target_audience_icon_color',
			[
				'label'     => __( 'Color', 'academy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .requirements-information-list li i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .requirements-information-list li svg path' => 'fill: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'course_requirements_icon_size',
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
					'{{WRAPPER}} .requirements-information-list li i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .requirements-information-list li svg' => 'width: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 16,
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'course_requirements_content_style',
			array(
				'label' => __( 'Content', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->normal_element(
			'course_requirements_content',
			'{{WRAPPER}} .requirements-information-list li span',
			[ 'color', 'typography' ]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$requirements_heading_tag = Helper::validate_html_tag( $settings['course_requirements_heading_tag'] );
		$requirements_heading = $settings['course_requirements_heading'];
		$course_id = ( \Elementor\Plugin::$instance->editor->is_edit_mode() || Helper::is_academyea_preview_mode() ) ? Helper::get_last_course_id() : get_the_ID();
		$requirements = \Academy\Helper::string_to_array( get_post_meta( $course_id, 'academy_course_requirements', true ) );

		if ( count( $requirements ) > 0 ) : ?>
		<div class="academy-single-course__content-item academy-single-course__content-item--requirements">
			<?php echo sprintf( "<%s class='requirements-title'>%s</%s>", esc_html( $requirements_heading_tag ), esc_html( $requirements_heading ), esc_html( $requirements_heading_tag ) ); ?>
			<div class="requirements-content">
				<ul class="requirements-information-list">
					<?php foreach ( $requirements as $item ) : ?>
					<li><?php \Elementor\Icons_Manager::render_icon( $settings['course_requirements_list_icon'], [ 'aria-hidden' => 'true' ] ); ?><span> <?php echo esc_html( $item ); ?> </span> </li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>

			<?php
		elseif ( \Elementor\Plugin::instance()->editor->is_edit_mode() ) :
			echo '<div class="no-data-message">' . wp_kses_post( __( '<strong>Editor Only Message:</strong> Please add course requirements in latest course from the course editor', 'academy-elementor-addons' ) ) . '</div>';
		endif;

	}

}
