<?php
namespace AddonPackageForElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class APFE_FLEXSLIDER extends Widget_Base {


	public function get_name() {
		return 'hello-world';
	}


	public function get_title() {
		return __( 'FlexSlider', 'apfwtd' );
	}


	public function get_icon() {
		return 'eicon-slides';
	}


	public function get_categories() {
		return [ 'general' ];
	}


	public function get_script_depends() {
		return [ 'addon-package-for-elementor' ];
	}


	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Slider Settings', 'addon-package-for-elementor' ),
			]
		);
		
		$this->add_control(
			'slider_type',
			[
				'label' => __( 'Slider Type', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'basic_slider',
				'options' => [
					'basic_slider'  => __( 'Basic Slider', 'addon-package-for-elementor' ),
					'basic_slider_wt' => __( 'Basic / Thumbnail Slider', 'addon-package-for-elementor' ),
					'basic_carousel' => __( 'Basic Carousel', 'addon-package-for-elementor' )
				],
			]
		);	

		$this->add_control(
			'slider_animation',
			[
				'label' => __( 'Slider Animation', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'slide',
				'options' => [
					'slide'  => __( 'Slide', 'addon-package-for-elementor' ),
					'fade' => __( 'Fade', 'addon-package-for-elementor' )
				],
			]
		);


		$this->add_control(
			'slider_slideshow',
			[
				'label' => __( 'Slider Sideshow', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'addon-package-for-elementor' ),
				'label_off' => __( 'No', 'addon-package-for-elementor' ),
				'return_value' => 'true',
				'default' => 'no',
			]
		);
		
		$this->add_control(
			'slider_loop',
			[
				'label' => __( 'Slider Loop', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'addon-package-for-elementor' ),
				'label_off' => __( 'No', 'addon-package-for-elementor' ),
				'return_value' => 'true',
				'default' => 'no',
			]
		);
		
		$this->add_control(
			'slider_touch',
			[
				'label' => __( 'Touch Support', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'addon-package-for-elementor' ),
				'label_off' => __( 'No', 'addon-package-for-elementor' ),
				'return_value' => 'true',
				'default' => 'no',
			]
		);

		$this->add_control(
			'slider_controlnav',
			[
				'label' => __( 'Slider ControlNav', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'addon-package-for-elementor' ),
				'label_off' => __( 'No', 'addon-package-for-elementor' ),
				'return_value' => 'true',
				'default' => 'no',
				'conditions' => [
					'terms' => [
						[
							'name' => 'slider_type',
							'operator' => 'in',
							'value' => [
								'basic_slider',
								'basic_carousel',
							],
						],
					],
				],					
			]
		);		
		

		$this->add_control(
			'slider_speed',
			[
				'label' => __( 'Animation Speed', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 100,
				'max' => 5000,
				'step' => 100,
				'default' => 600,
			]
		);

		$this->add_control(
			'slider_slideshow_speed',
			[
				'label' => __( 'Slideshow Speed', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 100,
				'max' => 5000,
				'step' => 100,
				'default' => 7000,
				'conditions' => [
					'terms' => [
						[
							'name' => 'slider_slideshow',
							'operator' => 'in',
							'value' => [
								'true',
							],
						],
					],
				],				
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_images',
			[
				'label' => __( 'Slider Images', 'addon-package-for-elementor' ),
			]
		);
		
		$this->add_control(
			'gallery',
			[
				'label' => __( 'Add Images', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
			]
		);			

		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'section_style_arrows',
			[
				'label' => __( 'Direction Nav', 'addon-package-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,				
			]
		);		
		
		$this->add_control(
			'slider_nav_color',
			[
				'label' => __( 'Arrows Color', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'return_value' => 'true',
				'default' => '#0000007A',
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .flex-direction-nav a:before' => 'color: {{VALUE}}',
				],
			]
		);	

		$this->add_control(
			'slider_nav_color_border',
			[
				'label' => __( 'Arrows (Shadow Color)', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'return_value' => 'true',
				'default' => '#000000BA',
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .flex-direction-nav a:before' => 'text-shadow: 1px 1px 0 {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_arrows_directionnav',
			[
				'label' => __( 'Control Nav', 'addon-package-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,	
				'conditions' => [
					'terms' => [
						[
							'name' => 'slider_controlnav',
							'operator' => 'in',
							'value' => [
								'true',
							],
						],
					],
				],					
			]
		);		
		
		$this->add_control(
			'slider_nav_color_directionnav',
			[
				'label' => __( 'Bullets Color', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'return_value' => 'true',
				'default' => '#0000007D',
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .flex-control-paging li a' => 'background: {{VALUE}}',
				],
			]
		);	

		$this->add_control(
			'slider_nav_color_border_directionnav',
			[
				'label' => __( 'Bullets Color (Hover)', 'addon-package-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'return_value' => 'true',
				'default' => '#000000C2',
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .flex-control-paging li a:hover' => 'background: {{VALUE}}',
					'{{WRAPPER}} .flex-control-paging li a.flex-active' => 'background: {{VALUE}}',
				],
			]
		);
		
		$this->end_controls_section();		

	}


	protected function render() {
		$settings = $this->get_settings_for_display();
		if (isset($settings['slider_type'])) {
			$slider_type = $settings['slider_type'];
		} else {
			$slider_type = "basic_slider";	
		}				
		if (isset($settings['slider_animation']) && !empty($settings['slider_animation'])) {
			$slider_animation = $settings['slider_animation'];
		} else {
			$slider_animation = "slide";	
		}			
		if (isset($settings['slider_slideshow']) && $settings['slider_slideshow'] != "no" && !empty($settings['slider_slideshow'])) {
			$slider_slideshow = "true";
		} else {
			$slider_slideshow = "false";	
		}		
		if (isset($settings['slider_loop']) && $settings['slider_loop'] != "no" && !empty($settings['slider_loop'])) {
			$slider_loop =  "true";
		} else {
			$slider_loop = "false";	
		}
		if (isset($settings['slider_touch']) && $settings['slider_touch'] != "no" && !empty($settings['slider_touch'])) {
			$slider_touch =  "true";
		} else {
			$slider_touch = "false";	
		}		
		if (isset($settings['slider_controlnav']) && $settings['slider_controlnav'] != "no" && !empty($settings['slider_controlnav'])) {
			$slider_controlnav =  "true";
		} else {
			$slider_controlnav = "false";	
		}				
		if (isset($settings['slider_speed'])) {
			$slider_speed = $settings['slider_speed'];
		} else {
			$slider_speed = "600";	
		}		
		if (isset($settings['slider_slideshow_speed'])) {
			$slider_slideshow_speed = $settings['slider_slideshow_speed'];
		} else {
			$slider_slideshow_speed = "7000";	
		}				
		?>
			

		<div style="display:none;" class="apfe_slider_settings" data-controlnav="<?php echo $slider_controlnav; ?>" data-touch="<?php echo $slider_touch; ?>" data-slideshowspeed="<?php echo $slider_slideshow_speed; ?>" data-loop="<?php echo $slider_loop; ?>" data-slideshow="<?php echo $slider_slideshow; ?>" data-sliderspeed="<?php echo $slider_speed; ?>" data-slidertype="<?php echo $slider_animation; ?>"></div>
		
		<?php if ($slider_type == "basic_slider") { ?>

			<div class="flexslider">
				<ul class="slides">	
					<?php foreach ( $settings['gallery'] as $image ) { ?>
						<li><img src="<?php echo $image['url']; ?>" /></li>			
					<?php }	?>
				</ul>
			</div>	

		<?php } else if ($slider_type == "basic_slider_wt") { ?>

			<div id="apfe_slider" class="flexslider wt">
				<ul class="slides">	
					<?php foreach ( $settings['gallery'] as $image ) { ?>
						<li><img src="<?php echo $image['url']; ?>" /></li>			
					<?php }	?>
				</ul>
			</div>
			<div id="apfe_carousel" class="flexslider">
				<ul class="slides">	
					<?php foreach ( $settings['gallery'] as $image ) { ?>
						<li><img src="<?php echo $image['url']; ?>" /></li>			
					<?php }	?>
				</ul>
			</div>
			
		<?php } else if ($slider_type == "basic_carousel") { ?>

			<div class="flexslider carousel">
				<ul class="slides">	
					<?php foreach ( $settings['gallery'] as $image ) { ?>
						<li><img src="<?php echo $image['url']; ?>" /></li>			
					<?php }	?>
				</ul>
			</div>

		<?php } ?>
		
	<?php
	}

	 protected function _content_template2() {
	 }

}
