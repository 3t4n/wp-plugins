<?php
namespace AcademyEA\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use AcademyEA\Helper;
use AcademyEA\Traits\CommonStyle;

class CourseSocialShare extends Widget_Base {
	use CommonStyle;

	public function get_name() {
		return 'academyea-course-social-share';
	}

	public function get_title() {
		return __( 'Course Social Share', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-social-icons';
	}

	public function get_categories() {
		return array( 'academyea-widgets' );
	}

	public function get_keywords() {
		return [ 'course social share', 'course', 'social', 'share', 'academy', 'lms' ];
	}

	public function get_style_depends() {
		return [ 'academyea-stylesheets' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'social_share_options',
			[
				'label' => __( 'General Settings', 'academy-elementor-addons' ),
			]
		);

		$this->add_control(
			'show_share_label',
			[
				'label' => __( 'Show Label', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'academy-elementor-addons' ),
				'label_off' => __( 'Hide', 'academy-elementor-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',

			]
		);

		$this->add_control(
			'share_label',
			[
				'label' => __( 'Label Text', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Share:', 'academy-elementor-addons' ),
				'condition' => [
					'show_share_label' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'share_align',
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
			'share_label_style',
			array(
				'label' => __( 'Label', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->normal_element(
			'share_label',
			'{{WRAPPER}} .academyea-widget-social-share .share-label',
			[ 'typography', 'color' ]
		);

		$this->add_responsive_control(
			'share_label_gap',
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
					'{{WRAPPER}} .academyea-widget-social-share .share-label' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'show_share_label' => 'yes',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'share_icon_style',
			array(
				'label' => __( 'Icon', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'share_icon_color_settings',
			[
				'label' => __( 'Color Settings', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => __( 'Default', 'academy-elementor-addons' ),
					'custom' => __( 'Custom', 'academy-elementor-addons' ),
				],
			]
		);

		$this->start_controls_tabs(
			'share_icon_style_tabs',
			[
				'condition' => [
					'share_icon_color_settings' => 'custom',
				],
				'separator' => 'before',
			]
		);

			$this->start_controls_tab(
				'share_icon_normal_style_tab',
				[
					'label' => __( 'Normal', 'academy-elementor-addons' ),
				]
			);

			$this->add_control(
				'share_icon_color',
				[
					'label' => __( 'Icon Color', 'academy-elementor-addons' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .academyea-widget-social-share .academy-share-wrap .academy-social-share i' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'share_icon_shape_color',
				[
					'label' => __( 'Shape Color', 'academy-elementor-addons' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .academyea-widget-social-share .academy-share-wrap .academy-social-share i' => 'background-color: {{VALUE}};',
					],
				]
			);

			$this->end_controls_tab();

			$this->start_controls_tab(
				'share_icon_hover_style_tab',
				[
					'label' => __( 'Hover', 'academy-elementor-addons' ),
				]
			);

			$this->add_control(
				'share_icon_hover_color',
				[
					'label' => __( 'Icon Color', 'academy-elementor-addons' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .academyea-widget-social-share .academy-share-wrap .academy-social-share:hover i' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'share_icon_hover_shape_color',
				[
					'label' => __( 'Shape Color', 'academy-elementor-addons' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .academyea-widget-social-share .academy-share-wrap .academy-social-share:hover i' => 'background-color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'share_icon_border_hover_color',
				[
					'label' => __( 'Border Color', 'academy-elementor-addons' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .academyea-widget-social-share .academy-share-wrap .academy-social-share:hover i' => 'border-color: {{VALUE}};',
					],
				]
			);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'share_icon_size',
			[
				'label' => __( 'Size', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 14,
				],
				'selectors' => [
					'{{WRAPPER}} .academyea-widget-social-share .academy-share-wrap .academy-social-share i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'share_icon_spacing',
			[
				'label' => __( 'Spacing', 'academy-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .academyea-widget-social-share .academy-share-wrap .academy-social-share:not(:last-child)' => is_rtl() ? 'margin-left: {{SIZE}}{{UNIT}};' : 'margin-right: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 5,
				],
			]
		);

		$this->add_control(
			'course_share_icon_padding',
			[
				'label' => __( 'Padding', 'academy-elementor-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .academyea-widget-social-share .academy-share-wrap .academy-social-share i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default' => [
					'top' => 10,
					'right' => 10,
					'bottom' => 10,
					'left' => 10,
					'unit' => 'px',
					'isLinked' => true,
				],
			]
		);

		$this->normal_element(
			'share_icon',
			'{{WRAPPER}} .academyea-widget-social-share .academy-share-wrap .academy-social-share i',
			[ 'border', 'radius' ],
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$course_id = ( \Elementor\Plugin::$instance->editor->is_edit_mode() || Helper::is_academyea_preview_mode() ) ? Helper::get_last_course_id() : get_the_ID();

		$share_config = array(
			'title' => get_the_title( $course_id ),
			'text'  => get_the_excerpt( $course_id ),
			'image' => get_the_post_thumbnail_url( $course_id, 'post-thumbnail' ),
		);

		?>
		<div class="academyea-widget-social-share academyea-social-share">
			<?php if ( $settings['show_share_label'] ) : ?>
				<span class="share-label"><?php echo esc_html( $settings['share_label'] ); ?></span>
			<?php endif; ?>
			<span class="academy-share-wrap" data-social-share-config="<?php echo esc_attr( wp_json_encode( $share_config ) ); ?>">
				<span class="academy-social-share academy_facebook"><i class="academy-icon academy-icon--facebook" aria-hidden="true"></i></span>
				<span class="academy-social-share academy_linkedin"><i class="academy-icon academy-icon--linkedIn" aria-hidden="true"></i></span>
				<span class="academy-social-share academy_twitter"><i class="academy-icon academy-icon--twitter" aria-hidden="true"></i></span>
				<span class="academy-social-share academy_pinterest"><i class="academy-icon academy-icon--pinterest" aria-hidden="true"></i></span>
				<span class="academy-social-share academy_gmail"><i class="academy-icon academy-icon--mail" aria-hidden="true"></i></span>
			</span>
		</div>
	<?php }

}
