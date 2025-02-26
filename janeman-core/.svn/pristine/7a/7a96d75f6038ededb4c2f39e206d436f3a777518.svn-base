<?php
/*
 * Elementor Janeman Couple Widget
 * Author & Copyright: annurtheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Janeman_Couple extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'annur-janeman_couple';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Cupple', 'janemancore' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'eicon-site-identity';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['annurtheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Janeman Couple widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	public function get_script_depends() {
		return ['annur-janeman_couple'];
	}
	
	/**
	 * Register Janeman Couple widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		$this->start_controls_section(
			'section_couple',
			[
				'label' => esc_html__( 'Couple Options', 'janemancore' ),
			]
		);
		$this->add_control(
			'heart_image',
			[
				'label' => esc_html__( 'Heart Shape', 'janemancore' ),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set Heart Shape here.', 'janemancore'),
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_bride',
			[
				'label' => esc_html__( 'Bride Options', 'janemancore' ),
			]
		);
		$this->add_control(
			'bride_title',
			[
				'label' => esc_html__( 'Title Text', 'janemancore' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title Text', 'janemancore' ),
				'placeholder' => esc_html__( 'Type title text here', 'janemancore' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'bride_content',
			[
				'label' => esc_html__( 'Content Text', 'janemancore' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Content Text', 'janemancore' ),
				'placeholder' => esc_html__( 'Type content text here', 'janemancore' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'bride_image',
			[
				'label' => esc_html__( 'Bride Image', 'janemancore' ),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set bride image here.', 'janemancore'),
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'bride_social_icon',
			[
				'label' => __( 'Icon', 'janemancore' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-facebook-f',
					'library' => 'solid',
				],
			]
		);
		$repeater->add_control(
			'bride_social_link',
			[
				'label' => esc_html__( 'Social Link', 'janemancore' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Social Link', 'janemancore' ),
				'placeholder' => esc_html__( 'Type social link here', 'janemancore' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'bride_socialItems_groups',
			[
				'label' => esc_html__( 'Social Item', 'janemancore' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'bride_social_item_title' => esc_html__( 'Social', 'janemancore' ),
					],
					
				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ bride_social_item_title }}}',
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_groom',
			[
				'label' => esc_html__( 'Groom Options', 'janemancore' ),
			]
		);
		$this->add_control(
			'groom_title',
			[
				'label' => esc_html__( 'Groom Title Text', 'janemancore' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title Text', 'janemancore' ),
				'placeholder' => esc_html__( 'Type title text here', 'janemancore' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'groom_content',
			[
				'label' => esc_html__( 'Groom Content Text', 'janemancore' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Content Text', 'janemancore' ),
				'placeholder' => esc_html__( 'Type content text here', 'janemancore' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'groom_image',
			[
				'label' => esc_html__( 'Groom Image', 'janemancore' ),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set Groom image here.', 'janemancore'),
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'groom_social_icon',
			[
				'label' => __( 'Icon', 'janemancore' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-facebook-f',
					'library' => 'solid',
				],
			]
		);
		$repeater->add_control(
			'groom_social_link',
			[
				'label' => esc_html__( 'Social Link', 'janemancore' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Social Link', 'janemancore' ),
				'placeholder' => esc_html__( 'Type social link here', 'janemancore' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'groom_socialItems_groups',
			[
				'label' => esc_html__( 'Social Item', 'janemancore' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'groom_social_item_title' => esc_html__( 'Social', 'janemancore' ),
					],
					
				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ groom_social_item_title }}}',
			]
		);
		$this->end_controls_section();// end: Section
		

		// Image
		$this->start_controls_section(
			'section_image_style',
			[
				'label' => esc_html__( 'Image', 'janemancore' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'image_border_color',
			[
				'label' => esc_html__( 'Border Color', 'janemancore' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .couple-section .middle-couple-pic img' => 'border-color: {{VALUE}};',
				],
			]
		);
	
		$this->end_controls_section();// end: Section


		// Title
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'janemancore' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'janemancore' ),
				'name' => 'janeman_title_typography',
				'selector' => '{{WRAPPER}} .couple-section .text-grid h3',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'janemancore' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .couple-section .text-grid h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_padding',
			[
				'label' => __( 'Title Padding', 'janemancore' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .couple-section .text-grid h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		
		// Couple Title
		$this->start_controls_section(
			'couple_content_style',
			[
				'label' => esc_html__( 'Content', 'janemancore' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'janemancore' ),
				'name' => 'janeman_couple_content_typography',
				'selector' => '{{WRAPPER}} .couple-section .text-grid p',
			]
		);
		$this->add_control(
			'couple_content',
			[
				'label' => esc_html__( 'Color', 'janemancore' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .couple-section .text-grid p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'couple_content_padding',
			[
				'label' => __( 'Number Padding', 'janemancore' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .couple-section .text-grid p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Icon
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon Style', 'janemancore' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'janemancore' ),
				'name' => 'sasban_icon_typography',
				'selector' => '{{WRAPPER}} .couple-section ul li a',
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'janemancore' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .couple-section ul li a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_bg_color',
			[
				'label' => esc_html__( 'Icon Backround Color', 'janemancore' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .couple-section ul li a' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Icon Hover
		$this->start_controls_section(
			'section_icon_hover_style',
			[
				'label' => esc_html__( 'Icon Hover Style', 'janemancore' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'icon_hover_color',
			[
				'label' => esc_html__( 'Icon Hover Color', 'janemancore' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .couple-section ul li a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_hover_bg_color',
			[
				'label' => esc_html__( 'Icon Hover Backround Color', 'janemancore' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .couple-section ul li a:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section


	}

	/**
	 * Render Couple widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();

		$bride_title = !empty( $settings['bride_title'] ) ? $settings['bride_title'] : '';
		$bride_content = !empty( $settings['bride_content'] ) ? $settings['bride_content'] : '';
		$bride_socialItems_groups = !empty( $settings['bride_socialItems_groups'] ) ? $settings['bride_socialItems_groups'] : '';

		$bg_image = !empty( $settings['bride_image']['id'] ) ? $settings['bride_image']['id'] : '';	
		$image_url = wp_get_attachment_url( $bg_image );
		$image_alt = get_post_meta( $bg_image, '_wp_attachment_image_alt', true);

		$bg_groom = !empty( $settings['groom_image']['id'] ) ? $settings['groom_image']['id'] : '';	
		$groom_url = wp_get_attachment_url( $bg_groom );
		$groom_alt = get_post_meta( $bg_groom, '_wp_attachment_image_alt', true);

		$bg_heart = !empty( $settings['heart_image']['id'] ) ? $settings['heart_image']['id'] : '';	
		$heart_url = wp_get_attachment_url( $bg_heart );
		$heart_alt = get_post_meta( $bg_heart, '_wp_attachment_image_alt', true);


		$groom_title = !empty( $settings['groom_title'] ) ? $settings['groom_title'] : '';
		$groom_content = !empty( $settings['groom_content'] ) ? $settings['groom_content'] : '';
		$groom_socialItems_groups = !empty( $settings['groom_socialItems_groups'] ) ? $settings['groom_socialItems_groups'] : '';

		// Turn output buffer on
		ob_start();
		?>
		<div class="couple-section">
	    <div class="container">
	        <div class="row">
	            <div class="col col-lg-10 col-lg-offset-1">
	                <div class="couple-grids clearfix">
	                    <div class="grid groom">
	                        <div class="img-holder wow fadeInLeftSlow">
	                             <?php if( $groom_url ) { echo '<img src="'.esc_url( $groom_url ).'" alt="'.esc_attr( $groom_alt ).'">'; }  ?>
	                        </div>
	                        <div class="details">
	                            <div class="details-inner">
	                               <?php 
							                		if( $groom_title ) { echo '<h3>'.esc_html( $groom_title ).'</h3>'; } 
							                		if( $groom_content ) { echo '<p>'.esc_html( $groom_content ).'</p>'; } 
							                	 ?>
	                                <ul class="social-links">
	                                  <?php 	// Group Param Output
																		if( is_array( $groom_socialItems_groups ) && !empty( $groom_socialItems_groups ) ){
																			foreach ( $groom_socialItems_groups as $each_item ) { 

																			$groom_icon = !empty( $each_item['groom_social_icon']['value'] ) ? $each_item['groom_social_icon']['value'] : '';
																			$social_link = !empty( $each_item['groom_social_link'] ) ? $each_item['groom_social_link'] : '';

																			 if( $groom_icon ) { echo '<li><a href="'.esc_url( $social_link ).'">

																			 <i class="'.esc_attr( $groom_icon ).'"></i></a></li>'; } 

					                          	 }
																		} ?>
	                                </ul>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="grid bride">
	                        <div class="img-holder wow fadeInRightSlow">
	                            <?php if( $image_url ) { echo '<img src="'.esc_url( $image_url ).'" alt="'.esc_attr( $image_alt ).'">'; }  ?>
	                        </div>
	                        <div class="details">
	                            <div class="details-inner">
	                               <?php 
							                		if( $bride_title ) { echo '<h3>'.esc_html( $bride_title ).'</h3>'; } 
							                		if( $bride_content ) { echo '<p>'.esc_html( $bride_content ).'</p>'; } 
							                	 ?>
	                                <ul class="social-links">
	                                 <?php 	// Group Param Output
																		if( is_array( $bride_socialItems_groups ) && !empty( $bride_socialItems_groups ) ){
																			foreach ( $bride_socialItems_groups as $each_item ) { 

																			$social_icon = !empty( $each_item['bride_social_icon']['value'] ) ? $each_item['bride_social_icon']['value'] : '';
																			$social_link = !empty( $each_icons['bride_social_link'] ) ? $each_icons['bride_social_link'] : '';

																			 if( $social_icon ) { echo '<li><a href="'.esc_url( $social_link ).'">
																			 <i class="'.esc_attr( $social_icon ).'"></i></a></li>'; } 

					                          	 }
																		} ?>
	                                </ul>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="couple-heart">
	                      <?php if( $heart_url ) { echo '<img src="'.esc_url( $heart_url ).'" alt="'.esc_attr( $heart_alt ).'">'; }  ?>
	                    </div>
	                </div>
	            </div>
	        </div> <!-- end row -->
	    </div> <!-- end container -->
	</div>
		<?php
			// Return outbut buffer
			echo ob_get_clean();	
		}
	/**
	 * Render Couple widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register( new Janeman_Couple() );