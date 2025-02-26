<?php
namespace AcademyEA\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use AcademyEA\Helper;
use AcademyEA\Traits\CommonStyle;

class CourseMaterials extends Widget_Base {
	use CommonStyle;

	public function get_name() {
		return 'academyea-course-materials';
	}

	public function get_title() {
		return __( 'Course Materials', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-tools';
	}

	public function get_categories() {
		return array( 'academyea-widgets' );
	}

	public function get_keywords() {
		return [ 'course materials', 'course', 'materials', 'academy', 'lms' ];
	}

	public function get_style_depends() {
		return [ 'academyea-stylesheets' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'course_materials_options',
			[
				'label' => __( 'General Options', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'course_materials_heading',
			[
				'label'   => __( 'Heading', 'academy-elementor-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Materials Included', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'course_materials_heading_tag',
			[
				'label'   => __( 'Heading Tag', 'academy-elementor-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => Helper::html_tag_lists(),
				'default' => 'h3',
			]
		);

		$this->add_responsive_control(
			'course_materials_layout',
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
				'prefix_class' => 'course-materials-layout-%s',
				'default'      => 'list',
			]
		);

		$this->add_control(
			'course_materials_list_icon',
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
			'course_materials_title_style',
			array(
				'label' => __( 'Title', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->normal_element(
			'course_target_audience_title',
			'{{WRAPPER}} .materials-title',
			[ 'typography', 'color' ]
		);

		$this->add_responsive_control(
			'course_materials_title_gap',
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
					'{{WRAPPER}} .materials-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 10,
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'course_materials_list_style',
			array(
				'label' => __( 'List', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_responsive_control(
			'course_materials_space_between',
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
					'.course-materials-layout-list .materials-information-list li:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'.course-materials-layout-inline .materials-information-list li:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}};margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 15,
				],
			]
		);
		$this->add_responsive_control(
			'course_materials_space_between_horizontal',
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
					'.materials-information-list li' => 'gap: {{SIZE}}{{UNIT}};',
					' .materials-information-list li span' => 'margin-right: {{SIZE}}{{UNIT}};',

				],
				'default' => [
					'size' => 10,
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'course_materials_list_typography',
				'selector' => '{{WRAPPER}} .materials-content .materials-information-list li span',
			]
		);
		$this->add_control(
			'course_materials_list_color',
			[
				'label' => esc_html__( 'Text Color', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .materials-content .materials-information-list li span' => 'color: {{VALUE}}',
				],
			]
		);
		$this->normal_element(
			'course_target_audience_list',
			'{{WRAPPER}} .materials-information-list li',
			[ 'border', 'radius', 'padding' ]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'course_materials_icon_style',
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
					'{{WRAPPER}} .materials-information-list li i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .materials-information-list li svg path' => 'fill: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'course_materials_icon_size',
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
					'{{WRAPPER}} .materials-information-list li i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .materials-information-list li svg' => 'width: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 16,
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'course_materials_content_style',
			array(
				'label' => __( 'Content', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->normal_element(
			'course_materials_content',
			'{{WRAPPER}} .materials-information-list li span',
			[ 'color', 'typography' ]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$materials_heading_tag = Helper::validate_html_tag( $settings['course_materials_heading_tag'] );
		$materials_heading = $settings['course_materials_heading'];
		$course_id = ( \Elementor\Plugin::$instance->editor->is_edit_mode() || Helper::is_academyea_preview_mode() ) ? Helper::get_last_course_id() : get_the_ID();
		$materials = \Academy\Helper::string_to_array( get_post_meta( $course_id, 'academy_course_materials_included', true ) );

		if ( count( $materials ) > 0 ) : ?>
		<div class="academy-single-course__content-item academy-single-course__content-item--materials">
			<?php echo sprintf( "<%s class='materials-title'>%s</%s>", esc_html( $materials_heading_tag ), esc_html( $materials_heading ), esc_html( $materials_heading_tag ) ); ?>
			<div class="materials-content">
				<ul class="materials-information-list">
					<?php foreach ( $materials as $item ) : ?>
					<li><?php \Elementor\Icons_Manager::render_icon( $settings['course_materials_list_icon'], [ 'aria-hidden' => 'true' ] ); ?><span> <?php echo esc_html( $item ); ?> </span> </li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>

			<?php
		elseif ( \Elementor\Plugin::instance()->editor->is_edit_mode() ) :
			echo '<div class="no-data-message">' . wp_kses_post( __( '<strong>Editor Only Message:</strong> Please add course materials in latest course from the course editor', 'academy-elementor-addons' ) ) . '</div>';
		endif;
	}

}

?>
