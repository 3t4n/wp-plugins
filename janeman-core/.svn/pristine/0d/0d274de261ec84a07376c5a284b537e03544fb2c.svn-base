<?php
/*
 * Elementor Janeman Blog Widget
 * Author & Copyright: annurtheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Janeman_Slider extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'annur-janeman_slider';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Slider', 'janemancore' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'eicon-slides';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['annurtheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Janeman Slider widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	
	public function get_script_depends() {
		return ['annur-janeman_slider'];
	}
	 
	
	/**
	 * Register Janeman Slider widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_slider',
			[
				'label' => esc_html__( 'Slider Options', 'janemancore' ),
			]
		);
		$this->add_control(
			'slide_style',
			[
				'label' => esc_html__( 'Slide Style', 'janemancore' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__( 'Style One', 'janemancore' ),
					'style-two' => esc_html__( 'Style Two', 'janemancore' ),
				],
				'default' => 'style-one',
				'description' => esc_html__( 'Select your Slide style.', 'janemancore' ),
			]
		);
		$this->add_control(
			'slide_shape',
			[
				'label' => esc_html__( 'Slider Shape', 'janemancore' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'slide_bg_shape',
			[
				'label' => esc_html__( 'Slider BG Shape', 'janemancore' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'slide_style' => array('style-two'),
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'slider_title',
			[
				'label' => esc_html__( 'Slider title', 'janemancore' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type slide title here', 'janemancore' ),
			]
		);
		$this->add_control(
			'slider_content',
			[
				'label' => esc_html__( 'Slider content', 'janemancore' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type slide content here', 'janemancore' ),
			]
		);
		$this->add_control(
			'date_title',
			[
				'label' => esc_html__( 'Date title', 'janemancore' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Save The Date',
				'placeholder' => esc_html__( 'Type slide title here', 'janemancore' ),
			]
		);
		$this->add_control(
			'the_date',
			[
				'label' => esc_html__( 'Date', 'janemancore' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Save The Date',
				'placeholder' => esc_html__( 'Type slide title here', 'janemancore' ),
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'slider_item',
			[
				'label' => esc_html__( 'Slider Item', 'janemancore' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type slide here', 'janemancore' ),
			]
		);
		$repeater->add_control(
			'slider_image',
			[
				'label' => esc_html__( 'Slider Image', 'janemancore' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'swipeSliders_groups',
			[
				'label' => esc_html__( 'Slider Items', 'janemancore' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'slider_item' => esc_html__( 'Item #1', 'janemancore' ),
					],
					
				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ slider_item }}}',
			]
		);		
		$this->end_controls_section();// end: Sect


		// Section BG
		$this->start_controls_section(
			'section_slide_bg_style',
			[
				'label' => esc_html__( 'Background', 'janemancore' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'slide_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'janemancore' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-style-1 .hero-content .side-content' => 'background-color: {{VALUE}};',
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
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .hero-style-1 .hero-content .couple-name-married-text h2 ',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'janemancore' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-style-1 .hero-content .couple-name-married-text h2' => 'color: {{VALUE}};',
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
				'name' => 'slider_content_typography',
				'selector' => '{{WRAPPER}} .hero-style-1 .hero-content .married-text h4',
			]
		);
		$this->add_control(
			'slider_content_color',
			[
				'label' => esc_html__( 'Color', 'janemancore' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-style-1 .hero-content .married-text h4' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'slider_content_br',
			[
				'label' => esc_html__( 'Border Color', 'janemancore' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-style-1 .hero-content .married-text' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
	
		// Navigation
		$this->start_controls_section(
			'section_navigation_style',
			[
				'label' => esc_html__( 'Navigation', 'janemancore' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'slider_nav_color',
			[
				'label' => esc_html__( 'Color', 'janemancore' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero .slick-prev:before, .hero .slick-next:before ' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'slider_nav_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'janemancore' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero .slick-prev, .hero .slick-next' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'slider_nav_br_color',
			[
				'label' => esc_html__( 'Border Color', 'janemancore' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero .slick-prev, .hero .slick-next' => 'box-shadow: 0 0 0 5px {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
	
	}

	/**
	 * Render Blog widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		// Carousel Options
		$swipeSliders_groups = !empty( $settings['swipeSliders_groups'] ) ? $settings['swipeSliders_groups'] : [];
		$slide_style = !empty( $settings['slide_style'] ) ? $settings['slide_style'] : '';
		$slider_title = !empty( $settings['slider_title'] ) ? $settings['slider_title'] : '';
		$slider_content = !empty( $settings['slider_content'] ) ? $settings['slider_content'] : '';
		$date_title = !empty( $settings['date_title'] ) ? $settings['date_title'] : '';
		$the_date = !empty( $settings['the_date'] ) ? $settings['the_date'] : '';

		$shape_image = !empty( $settings['slide_shape']['id'] ) ? $settings['slide_shape']['id'] : '';	
		$shape_url = wp_get_attachment_url( $shape_image );
		$shape_alt = get_post_meta( $shape_image, '_wp_attachment_image_alt', true);

		$shape_bg = !empty( $settings['slide_bg_shape']['id'] ) ? $settings['slide_bg_shape']['id'] : '';	
		$shape_bg_url = wp_get_attachment_url( $shape_bg );

		if ( $shape_bg_url ) {
			$bg_url = ' style="';
			$bg_url .= ( $shape_bg_url ) ? 'background-image: url( '. esc_url( $shape_bg_url ) .' );' : '';
			$bg_url .= '"';
		} else {
			$bg_url = '';
		}


		 $array = str_split( $slider_content );
     $count = 1; 

     if ( $slide_style == 'style-one') {
     	$slide_wrapper = 'hero-style-1';
     } else {
     	$slide_wrapper = 'hero-style-2';
     }
		// Turn output buffer on
		ob_start();

		?>
		<div class="hero hero-slider-wrapper <?php echo esc_attr( $slide_wrapper ); ?>">
		    <div class="hero-slider">
		        <?php
						if( is_array( $swipeSliders_groups ) && !empty( $swipeSliders_groups ) ){
						foreach ( $swipeSliders_groups as $each_item ) {

						$image_url = wp_get_attachment_url( $each_item['slider_image']['id'] );
						$image_alt = get_post_meta( $each_item['slider_image']['id'] , '_wp_attachment_image_alt', true);

						?>
		        <div class="slide">
		        	 <?php if( $image_url ) { echo '<img class="slider-bg" src="'.esc_url( $image_url ).'" alt="'.esc_url( $image_alt ).'">'; } ?>
		        </div>
					<?php }
					} ?>
		    </div>

		    <?php if ( $slide_style == 'style-one') { ?>
		    	 <div class="hero-content">
		        <div class="container">
		            <div class="side-content">
		                <div class="birds-vector">
		                  <?php if( $shape_url ) { echo '<img class="slider-bg" src="'.esc_url( $shape_url ).'" alt="'.esc_url( $shape_alt ).'">'; } ?>
		                </div>
		                <div class="couple-name-married-text">
		                	 <?php if ( $slider_title ) { ?>
		                    <h2 class="wow slideInUp" data-wow-duration="1s"><?php echo esc_html( $slider_title ); ?></h2>
		                    <?php } if (  $slider_content ) { ?>
		                    <div class="married-text wow fadeIn" data-wow-delay="1s">
		                        <h4>
		                        	<?php
						                    foreach ( $array as $key => $value ) {
						                      $count = $count + .05;
						                      echo'<span class="wow fadeInUp" data-wow-delay="'.esc_attr( $count ).'s">'.esc_html( $value ).'</span>';
						                    } ?>
		                        </h4>
		                    </div>
		                    <?php } ?>
		                </div>
		                <div class="save-the-date">
		                	<?php 
					              	if( $date_title ) { echo '<h4>'.esc_html( $date_title ).'</h4>'; } 
					              	if( $the_date ) { echo '<span class="date">'.esc_html( $the_date ).'</span>'; }
					              ?>
		                </div>
		            </div>
		        </div>
		    </div>
		  	<?php } else { ?>
				<div class="hero-circle wow zoomIn" data-wow-duration="0.8s">
				  <div class="circle-inner" <?php echo $bg_url; ?>>
				      <div class="text">
				          <span class="wow fadeInUp" data-wow-delay="1.00s">
				          <?php if( $shape_url ) { echo '<img src="'.esc_url( $shape_url ).'" alt="'.esc_url( $shape_alt ).'">'; } ?>
				          </span>
				          <?php 
		              	if( $date_title ) { echo '<h4><span class="wow fadeInUp" data-wow-delay="1.00s">'.esc_html( $date_title ).'</span></h4>'; } 
		              	if( $slider_title ) { echo '<h2 class="wow fadeInUp" data-wow-delay="1.00s">'.esc_html( $slider_title ).'</h2>'; } 
		              	if( $the_date ) { echo '<p class="wow fadeInUp" data-wow-delay="1.00s">'.esc_html( $the_date ).'</p>'; } 
		              ?>
				      </div>
				  </div>
				</div>
		  	<?php } ?>
		   
		</div>
		<?php
		// Return outbut buffer
		echo ob_get_clean();
		
	}

	/**
	 * Render Blog widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/

	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register( new Janeman_Slider() );
