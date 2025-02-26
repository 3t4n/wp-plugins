<?php

namespace RankologyElementorBreadcrumbs\Widgets;

// To prevent calling the plugin directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Please don&rsquo;t call the plugin directly. Thanks :)';
	exit;
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

/**
 * Rankology Breadcrumbs Widget.
 *
 * 
 */
class Rankology_breadcrumbs_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Rankology Breadcrumbs widget name.
	 *
	 * 
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'rkseo-breadcrumbs';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Rankology Breadcrumbs widget title.
	 *
	 * 
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Breadcrumbs', 'wp-rankology' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Rankology Breadcrumbs widget icon.
	 *
	 * 
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'dashicons dashicons-feedback';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Rankology Breadcrumbs widget belongs to.
	 *
	 * 
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'theme-elements' ];
	}

	/**
	 * Register Rankology Breadcrumbs widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * 
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'wp-rankology' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_responsive_control(
			'alignment',
			[
				'label' => __( 'Alignment', 'wp-rankology' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'wp-rankology' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'wp-rankology' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'wp-rankology' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .breadcrumb' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Style', 'wp-rankology' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .breadcrumb',
			]
		);

		$this->add_control(
			'text_color',
			[
				'label' => __( 'Text Color', 'wp-rankology' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .breadcrumb' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'link_color',
			[
				'label' => __( 'Link Color', 'wp-rankology' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .breadcrumb a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'link_hover_color',
			[
				'label' => __( 'Link hover Color', 'wp-rankology' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .breadcrumb a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render Rankology Breadcrumbs widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * 
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		if (function_exists('rankology_display_breadcrumbs')) {
			rankology_display_breadcrumbs(true);
		}

	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * 
	 *
	 * @access protected
	 */
	protected function _content_template() {
		if (function_exists('rankology_display_breadcrumbs')) {
			rankology_display_breadcrumbs(true);
		}
	}
}
