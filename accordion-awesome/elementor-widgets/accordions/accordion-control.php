<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class accordion_awesome_post_block extends Widget_Base {

	public function get_name() {
		return 'accordion_awesome-post-block';
	}

	public function get_title() {
		return esc_html__( 'Accordions', 'accordion-awesome' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'accordion_awesome-general-category' ];
	}

	protected function _register_controls() {
		/*-----------------------------------------------------------------------------------
			POST BLOCK INDEX
			1. POST SETTING
		-----------------------------------------------------------------------------------*/

		/*-----------------------------------------------------------------------------------*/
		/*  1. POST SETTING
		/*-----------------------------------------------------------------------------------*/
		$this->start_controls_section(
			'section_accordion_awesome_post_block_post_setting',
			[
				'label' => esc_html__( 'Post Setting', 'accordion-awesome' ),
			]
		);

		$this->add_control(
			'accordion_awesome_select_accordion',
			[
				'label' => esc_html__( 'Select Accordion', 'accordion-awesome' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'date',
				'options' => accordion_awesome_select_accordion_post(),
				'description' => esc_html__( 'Select post order by (default to latest post).', 'accordion-awesome' ),
			]
		);

		$this->end_controls_section();
		/*-----------------------------------------------------------------------------------
			end of post block post setting
		-----------------------------------------------------------------------------------*/

		$this->start_controls_section(
		'section_accordion_awesome_block_setting',
			[
				'label' => esc_html__( 'Title', 'accordion-awesome' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typhography_accordion_header_typography',
				'label' => esc_html__( 'Header Accordion Typography', 'accordion-awesome' ),
				'selector' => '{{WRAPPER}} .header-name h1',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typhography_accordion_name_typography',
				'label' => esc_html__( 'Accordion Name Typography', 'accordion-awesome' ),
				'selector' => '{{WRAPPER}} .accordion-name, {{WRAPPER}} .accordion-name h1, {{WRAPPER}} .accordion-name h2, {{WRAPPER}} .accordion-name h3, {{WRAPPER}} .accordion-name h4, {{WRAPPER}} .accordion-name h5, {{WRAPPER}} .accordion-name h6',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typhography_accordion_content_typography',
				'label' => esc_html__( 'Accordion Content Typography', 'accordion-awesome' ),
				'selector' => '{{WRAPPER}} .accordion-description, {{WRAPPER}} .accordion-description h1, {{WRAPPER}} .accordion-description h2, {{WRAPPER}} .accordion-description h3, {{WRAPPER}} .accordion-description h4, {{WRAPPER}} .accordion-description h5, {{WRAPPER}} .accordion-description h6, {{WRAPPER}} .accordion-description p',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$instance = $this->get_settings();

		/*-----------------------------------------------------------------------------------*/
		/*  VARIABLES LIST
		/*-----------------------------------------------------------------------------------*/

		/* POST SETTING VARIBALES */
		$accordion_awesome_select_accordion 			= ! empty( $instance['accordion_awesome_select_accordion'] ) ? $instance['accordion_awesome_select_accordion'] : '';


		/* end of variables list */


		/*-----------------------------------------------------------------------------------*/
		/*  THE CONDITIONAL AREA
		/*-----------------------------------------------------------------------------------*/

		include ( plugin_dir_path(__FILE__).'tpl/accordion-block.php' );

		?>

		<?php

	}

	protected function content_template() {}

	public function render_plain_content( $instance = [] ) {}

}

Plugin::instance()->widgets_manager->register_widget_type( new accordion_awesome_post_block() );