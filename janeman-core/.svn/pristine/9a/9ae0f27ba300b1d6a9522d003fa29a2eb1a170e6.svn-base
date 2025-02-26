<?php
/*
 * Elementor Janeman Thanks Widget
 * Author & Copyright: annurtheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Janeman_Thanks extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'annur-janeman_thanks';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Thanks', 'janemancore' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'eicon-custom';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['annurtheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Janeman Thanks widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['annur-janeman_thanks'];
	}
	*/
	
	/**
	 * Register Janeman Thanks widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_Thanks',
			[
				'label' => esc_html__( 'Thanks Options', 'janemancore' ),
			]
		);
		$this->add_control(
			'couple_name',
			[
				'label' => esc_html__( 'Couple Name Text', 'janemancore' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Couple Name Text', 'janemancore' ),
				'placeholder' => esc_html__( 'Type Couple Name text here', 'janemancore' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'thanks_title',
			[
				'label' => esc_html__( 'Title Text', 'janemancore' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title Text', 'janemancore' ),
				'placeholder' => esc_html__( 'Type title text here', 'janemancore' ),
				'label_block' => true,
			]
		);
		$this->end_controls_section();// end: Section



		// Title
		$this->start_controls_section(
			'section_name_style',
			[
				'label' => esc_html__( 'Title', 'janemancore' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'janeman_name_typography',
				'selector' => '{{WRAPPER}} .site-footer-thanks h2',
			]
		);
		$this->add_control(
			'name_color',
			[
				'label' => esc_html__( 'Color', 'janemancore' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .site-footer-thanks h2' => 'color: {{VALUE}};',
				],
			]
		);	
		$this->add_control(
			'name_padding',
			[
				'label' => esc_html__( 'Title Padding', 'janemancore' ),
				'type' => Controls_Manager::DIMENSIONS,				
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .site-footer-thanks h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

	
		// Content
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => esc_html__( 'Content', 'janemancore' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'janeman_content_typography',
				'selector' => '{{WRAPPER}} .site-footer-thanks span',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'janemancore' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .site-footer-thanks span' => 'color: {{VALUE}};',
				],
			]
		);	
		$this->add_control(
			'content_padding',
			[
				'label' => esc_html__( 'Content Padding', 'janemancore' ),
				'type' => Controls_Manager::DIMENSIONS,				
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .site-footer-thanks span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Thanks widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();

		$couple_name = !empty( $settings['couple_name'] ) ? $settings['couple_name'] : '';
		$thanks_title = !empty( $settings['thanks_title'] ) ? $settings['thanks_title'] : '';

		$couple_name = $couple_name ? '<span>'.wp_kses_post( $couple_name ).'</span>' : '';
		$thanks_title = $thanks_title ? '<h2>'.esc_html( $thanks_title ).'</h2>' : '';


	// Turn output buffer on
		ob_start(); ?>
		<div class="site-footer-thanks">
		    <div class="container">
		        <div class="row">
		            <div class="col col-xs-12">
		                 <?php echo $thanks_title; ?>
		                <span><?php echo $couple_name; ?></span>
		            </div>
		        </div> <!-- end row -->
		    </div> <!-- end container -->
		</div>
		<?php // Return outbut buffer
		echo ob_get_clean();
		
	}
	/**
	 * Render Thanks widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register( new Janeman_Thanks() );