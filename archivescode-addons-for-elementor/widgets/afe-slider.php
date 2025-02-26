<?php

namespace ImageSlider\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Scheme_Typography;
use Elementor\Widget_Base;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
 * AFE Widget: AFE Slider
 * Description: Image slider with caption animation.
 * Author Name: Archivescode
 * Author URL: https://archivescode.com/about-us
 * Version: 1.0.0
 */

class Afe_Image_Slider extends Widget_Base {

	public function get_name() {
		return 'afe-image-slider';
	}

	public function get_title() {
		return __( 'AFE Image Slider', AFE_SLUG );
	}

	public function get_icon() {
		return 'eicon-slider-device';
	}

	public function get_categories() {
		return [ 'archivescode' ];
	}
	public static function get_animate() {
		return [
			'bounce' 			=> __( 'bounce', AFE_SLUG ),
			'flash' 			=> __( 'flash', AFE_SLUG ),
			'pulse' 			=> __( 'pulse', AFE_SLUG ),
			'rubberBand' 		=> __( 'rubberBand', AFE_SLUG ),
			'shake' 			=> __( 'shake', AFE_SLUG ),
			'headShake' 		=> __( 'headShake', AFE_SLUG ),
			'swing' 			=> __( 'swing', AFE_SLUG ),
			'tada' 				=> __( 'tada', AFE_SLUG ),
			'wobble' 			=> __( 'wobble', AFE_SLUG ),
			'jello' 			=> __( 'jello', AFE_SLUG ),
			'bounceIn' 			=> __( 'bounceIn', AFE_SLUG ),
			'bounceInDown' 		=> __( 'bounceInDown', AFE_SLUG ),
			'bounceInLeft' 		=> __( 'bounceInLeft', AFE_SLUG ),
			'bounceInRight' 	=> __( 'bounceInRight', AFE_SLUG ),
			'bounceInUp' 		=> __( 'bounceInUp', AFE_SLUG ),
			'bounceOut' 		=> __( 'bounceOut', AFE_SLUG ),
			'bounceOutDown' 	=> __( 'bounceOutDown', AFE_SLUG ),
			'bounceOutLeft' 	=> __( 'bounceOutLeft', AFE_SLUG ),
			'bounceOutRight' 	=> __( 'bounceOutRight', AFE_SLUG ),
			'bounceOutUp' 		=> __( 'bounceOutUp', AFE_SLUG ),
			'fadeIn' 			=> __( 'fadeIn', AFE_SLUG ),
			'fadeInDown' 		=> __( 'fadeInDown', AFE_SLUG ),
			'fadeInDownBig' 	=> __( 'fadeInDownBig', AFE_SLUG ),
			'fadeInLeft' 		=> __( 'fadeInLeft', AFE_SLUG ),
			'fadeInLeftBig' 	=> __( 'fadeInLeftBig', AFE_SLUG ),
			'fadeInRight' 		=> __( 'fadeInRight', AFE_SLUG ),
			'fadeInRightBig' 	=> __( 'fadeInRightBig', AFE_SLUG ),
			'fadeInUp' 			=> __( 'fadeInUp', AFE_SLUG ),
			'fadeInUpBig' 		=> __( 'fadeInUpBig', AFE_SLUG ),
			'fadeOut' 			=> __( 'fadeOut', AFE_SLUG ),
			'fadeOutDown' 		=> __( 'fadeOutDown', AFE_SLUG ),
			'fadeOutDownBig' 	=> __( 'fadeOutDownBig', AFE_SLUG ),
			'fadeOutLeft' 		=> __( 'fadeOutLeft', AFE_SLUG ),
			'fadeOutLeftBig' 	=> __( 'fadeOutLeftBig', AFE_SLUG ),
			'fadeOutRight' 		=> __( 'fadeOutRight', AFE_SLUG ),
			'fadeOutRightBig' 	=> __( 'fadeOutRightBig', AFE_SLUG ),
			'fadeOutUp' 		=> __( 'fadeOutUp', AFE_SLUG ),
			'fadeOutUpBig' 		=> __( 'fadeOutUpBig', AFE_SLUG ),
			'flipInX' 			=> __( 'flipInX', AFE_SLUG ),
			'flipInY' 			=> __( 'flipInY', AFE_SLUG ),
			'flipOutX' 			=> __( 'flipOutX', AFE_SLUG ),
			'flipOutY' 			=> __( 'flipOutY', AFE_SLUG ),
			'lightSpeedIn' 		=> __( 'lightSpeedIn', AFE_SLUG ),
			'lightSpeedOut' 	=> __( 'lightSpeedOut', AFE_SLUG ),
			'rotateIn' 			=> __( 'rotateIn', AFE_SLUG ),
			'rotateInDownLeft' 	=> __( 'rotateInDownLeft', AFE_SLUG ),
			'rotateInDownRight' => __( 'rotateInDownRight', AFE_SLUG ),
			'rotateInUpLeft' 	=> __( 'rotateInUpLeft', AFE_SLUG ),
			'rotateInUpRight' 	=> __( 'rotateInUpRight', AFE_SLUG ),
			'rotateOut' 		=> __( 'rotateOut', AFE_SLUG ),
			'rotateOutDownLeft' => __( 'rotateOutDownLeft', AFE_SLUG ),
			'rotateOutDownRight' => __( 'rotateOutDownRight', AFE_SLUG ),
			'rotateOutUpLeft' 	=> __( 'rotateOutUpLeft', AFE_SLUG ),
			'rotateOutUpRight' 	=> __( 'rotateOutUpRight', AFE_SLUG ),
			'hinge' 			=> __( 'hinge', AFE_SLUG ),
			'jackInTheBox' 		=> __( 'jackInTheBox', AFE_SLUG ),
			'rollIn' 			=> __( 'rollIn', AFE_SLUG ),
			'rollOut' 			=> __( 'rollOut', AFE_SLUG ),
			'zoomIn' 			=> __( 'zoomIn', AFE_SLUG ),
			'zoomInDown' 		=> __( 'zoomInDown', AFE_SLUG ),
			'zoomInLeft' 		=> __( 'zoomInLeft', AFE_SLUG ),
			'zoomInRight' 		=> __( 'zoomInRight', AFE_SLUG ),
			'zoomInUp' 			=> __( 'zoomInUp', AFE_SLUG ),
			'zoomOut' 			=> __( 'zoomOut', AFE_SLUG ),
			'zoomOutDown' 		=> __( 'zoomOutDown', AFE_SLUG ),
			'zoomOutLeft' 		=> __( 'zoomOutLeft', AFE_SLUG ),
			'zoomOutRight' 		=> __( 'zoomOutRight', AFE_SLUG ),
			'zoomOutUp' 		=> __( 'zoomOutUp', AFE_SLUG ),
			'slideInDown' 		=> __( 'slideInDown', AFE_SLUG ),
			'slideInLeft' 		=> __( 'slideInLeft', AFE_SLUG ),
			'slideInRight' 		=> __( 'slideInRight', AFE_SLUG ),
			'slideInUp' 		=> __( 'slideInUp', AFE_SLUG ),
			'slideOutDown' 		=> __( 'slideOutDown', AFE_SLUG ),
			'slideOutLeft' 		=> __( 'slideOutLeft', AFE_SLUG ),
			'slideOutRight' 	=> __( 'slideOutRight', AFE_SLUG ),
			'slideOutUp' 		=> __( 'slideOutUp', AFE_SLUG ),
		];
	}

	protected function _register_controls() {
		$this->start_controls_section(
	        'section-content-slider',
	        [ 'label' => __( 'Content', AFE_SLUG ), ]
	    );

	    $repeater = new Repeater();

	    $repeater->start_controls_tabs( 'slider_repeater' );

	    $repeater->start_controls_tab( 'background', [ 'label' => __( 'Background', AFE_SLUG ) ] );
	    //add control background
		    $repeater->add_control(
				'background_color',
				[
					'label' => __( 'Color', AFE_SLUG ),
					'type' => Controls_Manager::COLOR,
					'default' => '#bbbbbb',
				]
			);
			$repeater->add_control(
				'background_image',
				[
					'label' => _x( 'Image', 'Background Control', AFE_SLUG ),
					'type' => Controls_Manager::MEDIA,
				]
			);
			$repeater->add_control(
				'background_size',
				[
					'label' => _x( 'Size', 'Background Control', AFE_SLUG ),
					'type' => Controls_Manager::SELECT,
					'default' => 'cover',
					'options' => [
						'cover' => _x( 'Cover', 'Background Control', AFE_SLUG ),
						'contain' => _x( 'Contain', 'Background Control', AFE_SLUG ),
						'auto' => _x( 'Auto', 'Background Control', AFE_SLUG ),
					],
					'conditions' => [
						'terms' => [
							[
								'name' => 'background_image[url]',
								'operator' => '!=',
								'value' => '',
							],
						],
					],
				]
			);
			$repeater->add_control(
				'background_overlay',
				[
					'label' => __( 'Background Overlay', AFE_SLUG ),
					'type' => Controls_Manager::SWITCHER,
					'return_value' => 'yes',
					'default' => '',
					'conditions' => [
						'terms' => [
							[
								'name' => 'background_image[url]',
								'operator' => '!=',
								'value' => '',
							],
						],
					],
				]
			);
			$repeater->add_control(
				'background_overlay_color',
				[
					'label' => __( 'Color', AFE_SLUG ),
					'type' => Controls_Manager::COLOR,
					'default' => 'rgba(0,0,0,0.5)',
					'conditions' => [
						'terms' => [
							[
								'name' => 'background_overlay',
								'operator' => '==',
								'value' => 'yes',
							],
							[
								'name' => 'background_image[url]',
								'operator' => '!=',
								'value' => '',
							],
						],
					],
				]
			);
	    $repeater->end_controls_tab();
	    //end tab background

	    $repeater->start_controls_tab( 'content', [ 'label' => __( 'Content', AFE_SLUG ) ] );
		    $repeater->add_control(
				'heading',
				[
					'label' => __( 'Title', AFE_SLUG ),
					'type' => Controls_Manager::TEXT,
					'default' => __( 'Slide Heading', AFE_SLUG ),
					'label_block' => true,
				]
			);
			$repeater->add_control(
				'title_align',
				[
					'label' => __( 'Title Align', AFE_SLUG ),
					'type' => Controls_Manager::CHOOSE,
					'label_block' => false,
					'options' => [
						'left' => [
							'title' => __( 'Left', AFE_SLUG ),
							'icon' => 'fa fa-align-left',
						],
						'center' => [
							'title' => __( 'Center', AFE_SLUG ),
							'icon' => 'fa fa-align-center',
						],
						'right' => [
							'title' => __( 'Right', AFE_SLUG ),
							'icon' => 'fa fa-align-right',
						],
					],
					'default' => 'center',
				]
			);
			$repeater->add_control(
				'heading_animation',
				[
					'label' => __( 'Title Animation', AFE_SLUG ),
					'type' => Controls_Manager::SELECT,
					'default' => 'slideInDown',
					'options' => self::get_animate(),
				]
			);
			$repeater->add_control(
				'heading_animation_speed',
				[
					'label' => __( 'Title Animation Speed (ms)', AFE_SLUG ),
					'type' => Controls_Manager::NUMBER,
					'default' => 2000,
				]
			);

			$repeater->add_control(
				'description',
				[
					'label' => __( 'Description', AFE_SLUG ),
					'type' => Controls_Manager::TEXTAREA,
					'default' => __( 'I am slide content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', AFE_SLUG ),
					'show_label' => true,
				]
			);
			$repeater->add_control(
				'description_align',
				[
					'label' => __( 'Description Align', AFE_SLUG ),
					'type' => Controls_Manager::CHOOSE,
					'label_block' => false,
					'options' => [
						'left' => [
							'title' => __( 'Left', AFE_SLUG ),
							'icon' => 'fa fa-align-left',
						],
						'center' => [
							'title' => __( 'Center', AFE_SLUG ),
							'icon' => 'fa fa-align-center',
						],
						'right' => [
							'title' => __( 'Right', AFE_SLUG ),
							'icon' => 'fa fa-align-right',
						],
					],
					'default' => 'center',
				]
			);
			$repeater->add_control(
				'description_animation',
				[
					'label' => __( 'Desc Animation', AFE_SLUG ),
					'type' => Controls_Manager::SELECT,
					'default' => 'slideInLeft',
					'options' => self::get_animate(),
				]
			);
			$repeater->add_control(
				'description_animation_speed',
				[
					'label' => __( 'Desc Animation Speed (ms)', AFE_SLUG ),
					'type' => Controls_Manager::NUMBER,
					'default' => 2000,
				]
			);

			$repeater->add_control(
				'button_text',
				[
					'label' => __( 'Button Text', AFE_SLUG ),
					'type' => Controls_Manager::TEXT,
					'default' => __( 'Click Here', AFE_SLUG ),
				]
			);
			$repeater->add_control(
				'button_align',
				[
					'label' => __( 'Button Align', AFE_SLUG ),
					'type' => Controls_Manager::CHOOSE,
					'label_block' => false,
					'options' => [
						'left' => [
							'title' => __( 'Left', AFE_SLUG ),
							'icon' => 'fa fa-align-left',
						],
						'center' => [
							'title' => __( 'Center', AFE_SLUG ),
							'icon' => 'fa fa-align-center',
						],
						'right' => [
							'title' => __( 'Right', AFE_SLUG ),
							'icon' => 'fa fa-align-right',
						],
					],
					'default' => 'center',
				]
			);
			$repeater->add_control(
				'link',
				[
					'label' => __( 'Link', AFE_SLUG ),
					'type' => Controls_Manager::URL,
					'placeholder' => __( 'http://your-link.com', AFE_SLUG ),
				]
			);
			$repeater->add_control(
				'link_click',
				[
					'label' => __( 'Apply Link On', AFE_SLUG ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'slide' => __( 'Whole Slide', AFE_SLUG ),
						'button' => __( 'Button Only', AFE_SLUG ),
					],
					'default' => 'slide',
					'conditions' => [
						'terms' => [
							[
								'name' => 'link[url]',
								'operator' => '!=',
								'value' => '',
							],
						],
					],
				]
			);
			$repeater->add_control(
				'button_animation',
				[
					'label' => __( 'Btn Animation', AFE_SLUG ),
					'type' => Controls_Manager::SELECT,
					'default' => 'slideInUp',
					'options' => self::get_animate(),
				]
			);
			$repeater->add_control(
				'button_animation_speed',
				[
					'label' => __( 'Button Animation Speed (ms)', AFE_SLUG ),
					'type' => Controls_Manager::NUMBER,
					'default' => 2000,
				]
			);

	    $repeater->end_controls_tab();
	    // end tab content

	    $repeater->start_controls_tab( 'style', [ 'label' => __( 'Style', AFE_SLUG ) ] );
	    
	    	$repeater->add_control(
	            'general_content_style',
	            [
	                'label' => __('Content Style', AFE_SLUG),
	                'type' => Controls_Manager::HEADING,
	            ]
	        );
			$repeater->add_responsive_control(
				'content_max_width',
				[
					'label' => __( 'Content Width', AFE_SLUG ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1024,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' => [ '%', 'px' ],
					'default' => [
						'size' => '100',
						'unit' => '%',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],
				]
			);

			$repeater->add_responsive_control(
				'slides_padding',
				[
					'label' => __( 'Padding', AFE_SLUG ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
				]
			);

			$repeater->add_control(
				'slides_horizontal_position',
				[
					'label' => __( 'Horizontal Position', AFE_SLUG ),
					'type' => Controls_Manager::CHOOSE,
					'label_block' => false,
					'default' => 'center',
					'options' => [
						'flex-start' => [
							'title' => __( 'Left', AFE_SLUG ),
							'icon' => 'eicon-h-align-left',
						],
						'center' => [
							'title' => __( 'Center', AFE_SLUG ),
							'icon' => 'eicon-h-align-center',
						],
						'flex-end' => [
							'title' => __( 'Right', AFE_SLUG ),
							'icon' => 'eicon-h-align-right',
						],
					],
					'prefix_class' => 'afe--h-position-',
				]
			);

			$repeater->add_control(
				'slides_vertical_position',
				[
					'label' => __( 'Vertical Position', AFE_SLUG ),
					'type' => Controls_Manager::CHOOSE,
					'label_block' => false,
					'default' => 'middle',
					'options' => [
						'top' => [
							'title' => __( 'Top', AFE_SLUG ),
							'icon' => 'eicon-v-align-top',
						],
						'middle' => [
							'title' => __( 'Middle', AFE_SLUG ),
							'icon' => 'eicon-v-align-middle',
						],
						'bottom' => [
							'title' => __( 'Bottom', AFE_SLUG ),
							'icon' => 'eicon-v-align-bottom',
						],
					],
					'prefix_class' => 'afe--v-position-',
				]
			);
			//end style general
					
		$repeater->end_controls_tab();
	    // end tab style

	    $repeater->end_controls_tabs();
	    $this->add_control(
			'slides',
			[
				'label' => __( 'Slides', AFE_SLUG ),
				'type' => Controls_Manager::REPEATER,
				'show_label' => true,
				'default' => [
					[
						'heading' => __( 'Slide 1 Heading', AFE_SLUG ),
						'description' => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', AFE_SLUG ),
						'button_text' => __( 'Click Here', AFE_SLUG ),
						'background_color' => '#833ca3',
					],
					[
						'heading' => __( 'Slide 2 Heading', AFE_SLUG ),
						'description' => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', AFE_SLUG ),
						'button_text' => __( 'Click Here', AFE_SLUG ),
						'background_color' => '#4054b2',
					],
					[
						'heading' => __( 'Slide 3 Heading', AFE_SLUG ),
						'description' => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', AFE_SLUG ),
						'button_text' => __( 'Click Here', AFE_SLUG ),
						'background_color' => '#1abc9c',
					],
				],
				'fields' => array_values( $repeater->get_controls() ),
				'title_field' => '{{{ heading }}}',
			]
		);
	    $this->end_controls_section();

	    // end control content
	    // begin control setting
	    $this->start_controls_section(
			'section_settings',
			[
				'label' => __('Slider Settings', AFE_SLUG),
                'tab' => Controls_Manager::TAB_SETTINGS,
			]
		);

		    $this->add_responsive_control(
				'slides_height',
				[
					'label' => __( 'Height', AFE_SLUG ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 100,
							'max' => 1000,
						],
						'vh' => [
							'min' => 10,
							'max' => 100,
						],
						'em' => [
							'min' => 10,
							'max' => 100,
						],
					],
					'default' => [
						'size' => 400,
						'unit' => 'px',
					],
					'size_units' => [ 'px', 'vh', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .afe-slides, {{WRAPPER}} .afe-slides .afe-slide-item' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'navigation',
				[
					'label' => __( 'Navigation', AFE_SLUG ),
					'type' => Controls_Manager::SELECT,
					'default' => 'both',
					'options' => [
						'both' => __( 'Arrows and Dots', AFE_SLUG ),
						'arrows' => __( 'Arrows', AFE_SLUG ),
						'dots' => __( 'Dots', AFE_SLUG ),
						'none' => __( 'None', AFE_SLUG ),
					],
				]
			);

			$this->add_control(
				'pause_on_hover',
				[
					'label' => __( 'Pause on Hover', AFE_SLUG ),
					'type' => Controls_Manager::SWITCHER,
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

			$this->add_control(
				'autoplay',
				[
					'label' => __( 'Autoplay', AFE_SLUG ),
					'type' => Controls_Manager::SWITCHER,
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

			$this->add_control(
				'autoplay_speed',
				[
					'label' => __( 'Autoplay Speed', AFE_SLUG ),
					'type' => Controls_Manager::NUMBER,
					'default' => 1000,
					'condition' => [
						'autoplay' => 'yes',
					],
					'selectors' => [
						'{{WRAPPER}} .afe-slide-bg' => 'animation-duration: calc({{VALUE}}ms*1.2); transition-duration: calc({{VALUE}}ms)',
					],
				]
			);

			$this->add_control(
				'infinite',
				[
					'label' => __( 'Infinite Loop', AFE_SLUG ),
					'type' => Controls_Manager::SWITCHER,
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

			$this->add_control(
				'transition_in',
				[
					'label' => __( 'Transition In', AFE_SLUG ),
					'type' => Controls_Manager::SELECT,
					'default' => 'slideInRight',
					'options' => self::get_animate(),
				]
			);

			$this->add_control(
				'transition_out',
				[
					'label' => __( 'Transition Out', AFE_SLUG ),
					'type' => Controls_Manager::SELECT,
					'default' => 'slideOutLeft',
					'options' => self::get_animate(),
				]
			);

			$this->add_control(
				'transition_speed',
				[
					'label' => __( 'Transition Speed (ms)', AFE_SLUG ),
					'type' => Controls_Manager::NUMBER,
					'default' => 500,
				]
			);

		$this->end_controls_section();
		// end control setting

		// begin control style
		$this->start_controls_section(
			'section_style_navigation',
			[
				'label' => __( 'Navigation', AFE_SLUG ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'navigation' => [ 'arrows', 'dots', 'both' ],
				],
			]
		);

		$this->add_control(
			'heading_style_arrows',
			[
				'label' => __( 'Arrows', AFE_SLUG ),
				'type' => Controls_Manager::HEADING,
				'condition' => [
					'navigation' => [ 'arrows', 'both' ],
				],
			]
		);

		$this->add_control(
			'arrows_position',
			[
				'label' => __( 'Arrows Position', AFE_SLUG ),
				'type' => Controls_Manager::SELECT,
				'default' => 'inside',
				'options' => [
					'inside' => __( 'Inside', AFE_SLUG ),
					'outside' => __( 'Outside', AFE_SLUG ),
				],
				'condition' => [
					'navigation' => [ 'arrows', 'both' ],
				],
			]
		);

		$this->add_control(
			'arrows_size',
			[
				'label' => __( 'Arrows Size', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 60,
					],
				],
				'condition' => [
					'navigation' => [ 'arrows', 'both' ],
				],
			]
		);

		$this->add_control(
			'arrows_color',
			[
				'label' => __( 'Arrows Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'navigation' => [ 'arrows', 'both' ],
				],
			]
		);

		$this->add_control(
			'heading_style_dots',
			[
				'label' => __( 'Dots', AFE_SLUG ),
				'type' => Controls_Manager::HEADING,
				'condition' => [
					'navigation' => [ 'dots', 'both' ],
				],
			]
		);

		$this->add_control(
			'dots_position',
			[
				'label' => __( 'Dots Position', AFE_SLUG ),
				'type' => Controls_Manager::SELECT,
				'default' => 'inside',
				'options' => [
					'outside' => __( 'Outside', AFE_SLUG ),
					'inside' => __( 'Inside', AFE_SLUG ),
				],
				'condition' => [
					'navigation' => [ 'dots', 'both' ],
				],
			]
		);

		$this->add_control(
			'dots_size',
			[
				'label' => __( 'Dots Size', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 15,
					],
				],
				'condition' => [
					'navigation' => [ 'dots', 'both' ],
				],
			]
		);

		$this->add_control(
			'dots_color',
			[
				'label' => __( 'Dots Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'navigation' => [ 'dots', 'both' ],
				],
			]
		);

		$this->end_controls_section();
		// end control style

		// begin control style title
		$this->start_controls_section(
			'section_style_title',
			[
				'label' => __( 'Title', AFE_SLUG ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'label' => __( 'Typography', AFE_SLUG ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .afe-slide-heading',
			]
		);

		$this->add_control(
			'heading_color',
			[
				'label' => __( 'Title Text Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .afe-slide-heading' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
		// end control style title

		// begin control style description
		$this->start_controls_section(
			'section_style_desc',
			[
				'label' => __( 'Description', AFE_SLUG ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __( 'Typography', AFE_SLUG ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .afe-slide-description',
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Desc Text Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .afe-slide-description' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
		// end control style desc

		// begin control style button
		$this->start_controls_section(
			'section_style_btn',
			[
				'label' => __( 'Button', AFE_SLUG ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'label' => __( 'Typography', AFE_SLUG ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .afe-button',

			]
		);

		$this->add_control(
			'btn_color',
			[
				'label' => __( 'Button Text Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .afe-button' => 'color: {{VALUE}}; border-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'btn_bg_color',
			[
				'label' => __( 'Button Background Color', AFE_SLUG ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .afe-button' => 'background-color: {{VALUE}}',
				],

			]
		);
		$this->add_control(
			'btn_border_width',
			[
				'label' => __( 'Border Width', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .afe-button' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'btn_border_radius',
			[
				'label' => __( 'Border Radius', AFE_SLUG ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .afe-button' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// end control style button
		
	}

	protected function render() {
		$settings = $this->get_settings();

		if (empty($settings['slides'])) {
			return;
		}

		$this->add_render_attribute('button', 'class', ['afe-button', 'afe-slide-button']);
		if (!empty($settings['button_size'])) {
			$this->add_render_attribute('button', 'class', 'afe-button-size-' . $settings['button_size']);
		}	

		$slides = [];
		$slide_count = 0;

		foreach ($settings['slides'] as $slide) {

			$slide_html = $slide_attribute = $btn_attribute = '';
			$btn_element = $slide_element = 'div';
			$slide_url = $slide['link']['url'];

			// slider background color
			if (!empty($slide['background_color'])) {
				$this->add_render_attribute('afe-slide-bg'. $slide_count, 'style', 'background-color: '.$slide['background_color']. ';');
			}
			// slider background image
			if (!empty($slide['background_image'])) {
				$this->add_render_attribute('afe-slide-bg'. $slide_count, 'style', 'background-image: url('.$slide['background_image']['url']. ');background-size:'.$slide['background_size'].';');
			}


			//link url
			if (!empty($slide_url)) {
				$this->add_render_attribute('slide_link' . $slide_count, 'href', $slide_url);

				if ($slide['link']['is_external']) {
					$this->add_render_attribute('slide_link' . $slide_count, 'target', '_blank');
				}

				if ('button' === $slide['link_click']) {
					$btn_element = 'a';
					$btn_attribute = $this->get_render_attribute_string('slide_link'. $slide_count);
				}else{
					$slide_element = 'a';
					$slide_attribute = $this->get_render_attribute_string('slide_link'. $slide_count);

				}
			}
			
			//background overlay
			if ('yes' === $slide['background_overlay']) {

				$this->add_render_attribute('afe-overlay-bg'. $slide_count, 'style', 'background-color: '.$slide['background_overlay_color']. ';');
				$slide_html .= '<div class="afe-background-overlay" '.$this->get_render_attribute_string('afe-overlay-bg'. $slide_count).'></div>';
			}

			//content style
			$this->add_render_attribute('afe-content-style'. $slide_count, 'style', 'position:relative;');
			//content width			
			if (!empty($slide['content_max_width'])) {
				if ($slide['content_max_width']['size']) {
					$this->add_render_attribute('afe-content-style'. $slide_count, 'style', 'width: '.$slide['content_max_width']['size']. ''.$slide['content_max_width']['unit']. ';');
				}
			}
			//content padding			
			if (!empty($slide['slides_padding'])) {
				if ($slide['slides_padding']['isLinked'] == 1) {
					$this->add_render_attribute('afe-content-style'. $slide_count, 'style', 'padding: '.$slide['slides_padding']['top']. ''.$slide['slides_padding']['unit']. ';');
				}else{
					$this->add_render_attribute(
						'afe-content-style'. $slide_count, 
						'style', 
						[
							'padding-top: '.$slide['slides_padding']['top']. ''.$slide['slides_padding']['unit']. ';',
							'padding-right: '.$slide['slides_padding']['right']. ''.$slide['slides_padding']['unit']. ';',
							'padding-bottom: '.$slide['slides_padding']['bottom']. ''.$slide['slides_padding']['unit']. ';',
							'padding-left: '.$slide['slides_padding']['left']. ''.$slide['slides_padding']['unit']. ';',
						]
					);
				}
			}
			//content horizontal position
			$this->add_render_attribute('afe-inner-style'. $slide_count, 'style', 'display:flex;');
			//print_r($slide['slides_horizontal_position']);		
			if (!empty($slide['slides_horizontal_position'])) {
				if ($slide['slides_horizontal_position'] === 'center') {
					$this->add_render_attribute('afe-inner-style'. $slide_count, 'style', 'justify-content:center;');
				}else if ($slide['slides_horizontal_position'] === 'left') {
					$this->add_render_attribute('afe-inner-style'. $slide_count, 'style', 'justify-content:left;');
				}else if ($slide['slides_horizontal_position'] === 'right') {
					$this->add_render_attribute('afe-inner-style'. $slide_count, 'style', 'justify-content:right;');
				}
			}

			//content vertical position	
			if (!empty($slide['slides_vertical_position'])) {
				if ($slide['slides_vertical_position'] === 'top') {
					$this->add_render_attribute('afe-inner-style'. $slide_count, 'style', 'align-items:flex-start;');
				}else if ($slide['slides_vertical_position'] === 'middle') {
					$this->add_render_attribute('afe-inner-style'. $slide_count, 'style', 'align-items:center;');
				}else if ($slide['slides_vertical_position'] === 'bottom') {
					$this->add_render_attribute('afe-inner-style'. $slide_count, 'style', 'align-items:flex-end;');
				}
			}

			//content button align	
			if (!empty($slide['button_align'])) {
				$this->add_render_attribute('afe-content-style'. $slide_count, 'style', 'text-align:'.$slide['button_align'].';');
			}

			$slide_html .= '<div class="afe-slide-content" '.$this->get_render_attribute_string('afe-content-style'. $slide_count).'>';

			//heading
			if ($slide['heading']) {
				$slide_html .= '<div class="afe-slide-heading" data-animation="'.$slide['heading_animation'].'" style="animation-duration:'.$slide['heading_animation_speed'].'ms;-webkit-animation-duration:'.$slide['heading_animation_speed'].'ms;text-align:'.$slide['title_align'].';">' . $slide['heading'] .'</div>';
			}
			//description
			if ($slide['description']) {
				$slide_html .= '<div class="afe-slide-description" data-animation="'.$slide['description_animation'].'" style="animation-duration:'.$slide['description_animation_speed'].'ms;-webkit-animation-duration:'.$slide['description_animation_speed'].'ms;text-align:'.$slide['description_align'].';">' . $slide['description'] . '</div>';
			}
			//button
			if ($slide['button_text']) {
				//add data-animation button
				$this->add_render_attribute('button_animation'. $slide_count, 'data-animation', $slide['button_animation']);

				//add style animation speed button
				$this->add_render_attribute('button_speed_animation'. $slide_count, 'style', 'animation-duration:'.$slide['button_animation_speed'].'ms;-webkit-animation-duration:'.$slide['button_animation_speed'].'ms;');
				$slide_html .= '<' . $btn_element . ' ' . $btn_attribute . ' ' . $this->get_render_attribute_string('button') . ' '.$this->get_render_attribute_string('button_animation'. $slide_count) .' '.$this->get_render_attribute_string('button_speed_animation'. $slide_count).'>' . $slide['button_text'] . '</' . $btn_element . '>';
			}
			$slide_html .= '</div>';

			$slide_html = '<div class="afe-slide-image" '.$this->get_render_attribute_string('afe-slide-bg' . $slide_count) .'></div><' . $slide_element . ' ' . $slide_attribute . 'class="afe-slide-inner"  '.$this->get_render_attribute_string('afe-inner-style'. $slide_count).'>'. $slide_html . '</' . $slide_element . '>';

			$slides[] = '<div class="afe-repeater-item-' . $slide['_id'] . ' afe-slide-item">' . $slide_html . '</div>';

			$slide_count++;
				
		}

		$show_dots = (in_array($settings['navigation'] , ['dots', 'both']));
		$show_arrows = (in_array($settings['navigation'], ['arrows', 'both']));
		$navText = '';
		$owl_options = [
			'items' => absint(1),
			'autoplaySpeed' => absint( $settings['autoplay_speed']),
			'autoplay'		=> ('yes' === $settings['autoplay']),
			'loop'			=> ('yes' === $settings['infinite']),
			'pauseOnHover'	=> ('yes' === $settings['pause_on_hover']),
			'speed'			=> absint($settings['transition_speed']),
			'nav'			=> $show_arrows,
			'dots'			=> $show_dots,
			'navText'		=> '',
			'animateOut'	=> $settings['transition_out'],
    		'animateIn'		=> $settings['transition_in'],
		];

		$carousel_classes = ['afe-slides owl-carousel'];

		if ($show_arrows) {
			$carousel_classes[] = 'afe-nav-' . $settings['arrows_position'];
		}

		if ($show_dots) {
			$carousel_classes[] = 'afe-dots-'. $settings['dots_position'];
		}

		$this->add_render_attribute('slides', [
			'class' => $carousel_classes,
			'data-slider_options'	=> wp_json_encode($owl_options),
			'data-arrows-size' => (!empty($settings['arrows_size']['size'])) ? $settings['arrows_size']['size'] : '36',
			'data-arrows-color' => (!empty($settings['arrows_color'])) ? $settings['arrows_color'] : '#afafaf',
			'data-dots-size' => (!empty($settings['dots_size']['size'])) ? $settings['dots_size']['size'] : '10',
			'data-dots-color' => (!empty($settings['dots_color'])) ? $settings['dots_color'] : '#afafaf',
		]);

		echo '<div class="afe-slides-wrapper afe-slider">';
		echo '<div '. $this->get_render_attribute_string('slides') . '>';
		echo implode('', $slides);
		echo '</div>';
		echo '</div>';
	}

	protected function _content_template() {
				?>
		<#
			var navi            = settings.navigation,
				showDots        = ( 'dots' === navi || 'both' === navi ),
				showArrows      = ( 'arrows' === navi || 'both' === navi ),
				autoplay        = ( 'yes' === settings.autoplay ),
				infinite        = ( 'yes' === settings.infinite ),
				speed           = Math.abs( settings.transition_speed ),
				autoplaySpeed   = Math.abs( settings.autoplay_speed ),
				animateOut      = settings.transition_out,
				animateIn      = settings.transition_in,
				buttonSize      = settings.button_size,
				sliderOptions = {
					"items": 1,
					"autoplaySpeed": autoplaySpeed,
					"autoplay": false,
					"loop": infinite,
					"pauseOnHover":true,
					"pauseOnFocus":true,
					"speed": speed,
					"nav": showArrows,
					"dots": showDots,
					"navText":"",
					"animateOut":animateOut,
    				"animateIn":animateIn,
				}
				sliderOptionsStr = JSON.stringify( sliderOptions );
			if ( showArrows ) {
				var arrowsClass = 'afe-nav-' + settings.arrows_position;
			}

			if ( showDots ) {
				var dotsClass = 'afe-dots-' + settings.dots_position;
			}
			var data_arrows_size = (settings.arrows_size.size != '') ? settings.arrows_size.size : '36';
			var data_arrows_color = (settings.arrows_color != '') ? settings.arrows_color : '#afafaf';
			var data_dots_size = (settings.dots_size.size != '') ? settings.dots_size.size : '10';
			var data_dots_color = (settings.dots_color != '') ? settings.dots_color : '#afafaf';	
		#>
		<div class="afe-slides-wrapper afe-slider">
			<div data-slider_options="{{ sliderOptionsStr }}" class="afe-slides  owl-carousel {{ dotsClass }} {{ arrowsClass }}" data-arrows-size="{{ data_arrows_size }}" data-arrows-color="{{ data_arrows_color }}" data-dots-size="{{ data_dots_size }}" data-dots-color="{{ data_dots_color }}">
				<# _.each( settings.slides, function( slide ) { #>
				<#
					var bg_image = '';
					//console.log(slide.background_image);
					 if ( '' !== slide.background_image ) { 
						bg_image = 'background-image:url('+slide.background_image.url+');';
						bg_image += 'background-size:'+slide.background_size+';';
				 	}
				 	//content style
					var content_style = 'position:relative;';
					//content width			
					if ('' !== slide.content_max_width) {
						if (slide.content_max_width.size) {
							content_style += 'width: '+slide.content_max_width.size+ ''+slide.content_max_width.unit+';';
						}
					}
					//content padding			
					if ('' !== slide.slides_padding) {
						if (slide.slides_padding.isLinked == 1) {
							content_style += 'padding: '+slide.slides_padding.top+ ''+slide.slides_padding.unit+ ';';
						}else{
							content_style += 'padding-top: '+slide.slides_padding.top+ ''+slide.slides_padding.unit+ ';';
							content_style += 'padding-right: '+slide.slides_padding.right+ ''+slide.slides_padding.unit+ ';';
							content_style += 'padding-bottom: '+slide.slides_padding.bottom+ ''+slide.slides_padding.unit+ ';';
							content_style += 'padding-left: '+slide.slides_padding.left+ ''+slide.slides_padding.unit+ ';';
						}
					}

					//content button align	
					if ('' !== slide.button_align) {
						content_style += 'text-align:'+ slide.button_align+';';
					}

					//content horizontal position
					var inner_style = 'display:flex;';
					if ('' !== slide.slides_horizontal_position) {
						inner_style += 'justify-content:'+slide.slides_horizontal_position+';';
					}

					//content vertical position	
					if ('' !== slide.slides_vertical_position) {
						if (slide.slides_vertical_position === 'top') {
							inner_style += 'align-items:flex-start;';
						}else if (slide.slides_vertical_position === 'middle') {
							inner_style += 'align-items:center;';
						}else if (slide.slides_vertical_position === 'bottom') {
							inner_style += 'align-items:flex-end;';
						}
					}					

				 #>
					<div class="afe-repeater-item-{{ slide._id }} afe-slide-item">
						<div class="afe-slide-image" style="background-color: {{{ slide.background_color }}};{{{ bg_image }}}"></div>
						<div class="afe-slide-inner" style="{{ inner_style }}">
								<# if ( 'yes' === slide.background_overlay ) { #>
									<div class="afe-background-overlay" style="background-color: {{{ slide.background_overlay_color }}}"></div>
								<# } #>
							<div class="afe-slide-content" style="{{ content_style }}">
								<# if ( slide.heading ) { #>
									<div 
										class="afe-slide-heading"
										data-animation="{{ slide.heading_animation }}" 
										style="animation-duration:{{{ slide.heading_animation_speed }}}ms;-webkit-animation-duration:{{{ slide.heading_animation_speed }}}ms;text-align:{{{ slide.title_align }}};"
									>
										{{{ slide.heading }}}
									</div>
								<# }
								if ( slide.description ) { #>
									<div 
										class="afe-slide-description"
										data-animation="{{ slide.description_animation }}" 
										style="animation-duration:{{{ slide.description_animation_speed }}}ms;-webkit-animation-duration:{{{ slide.description_animation_speed }}}ms;text-align:{{{ slide.description_align }}};"
									>
										{{{ slide.description }}}
									</div>
								<# }
								if ( slide.button_text ) { #>
									<div 
										class="afe-button afe-slide-button"
										data-animation="{{ slide.button_animation }}" 
										style="animation-duration:{{{ slide.button_animation_speed }}}ms;-webkit-animation-duration:{{{ slide.button_animation_speed }}}ms;"
									>
										{{{ slide.button_text }}}
									</div>
								<# } #>
							</div>
						</div>
					</div>
				<# } ); #>
			</div>
		</div>
	<?php
	}
}
return __NAMESPACE__."\\Afe_Image_Slider"; 
