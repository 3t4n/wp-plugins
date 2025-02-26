<?php
/**
 * EWA Elementor Heading Widget.
 *
 * Elementor widget that inserts heading into the page
 *
 * @since 1.0.0
 */
class Codex_Elementor_Slider extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve heading  widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'elementor-slider';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve heading widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Carousel Slider', ' codex-elementor-Slider' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve heading  widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-slider-3d';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the heading widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'codex-elementor-sliders' ];
	}

	/**
	 * Register heading widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		
		// start of the Content tab section
	   $this->start_controls_section(
	       'codex_slider_tab',
		    [
		        'label' => esc_html__('Elementor All In One Slider',' codex-elementor-Slider'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		   
		    ]
	    );

		// Codex Team Card Layout
		
	 

		// Slider Image

        $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'slider_image',
			[
				'label' => esc_html__( 'Team Image', ' codex-elementor-Slider' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

 
	    // Slider Name

		$repeater->add_control(
			'Slider_name',
			[
				'label' => esc_html__( 'Title', ' codex-elementor-Slider' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'CEO , CodexExpertBD', ' codex-elementor-Slider' ),
				'placeholder' => esc_html__( 'Type designation here', ' codex-elementor-Slider' ),
				'lable_block' => true,
			]
		);

		
		
	    // Slider Degignation

		$repeater->add_control(
			'Slider_desigination',
			[
				'label' => esc_html__( 'Designation', ' codex-elementor-Slider' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'CEO , CodexExpertBD', ' codex-elementor-Slider' ),
				'placeholder' => esc_html__( 'Type designation here', ' codex-elementor-Slider' ),
				'lable_block' => true,
			]
		);


		 // Slider Details

		 $repeater->add_control(
			'Slider_text',
			[
				'label' => esc_html__( 'Details', ' codex-elementor-Slider' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Block patterns are pre-configured block layouts. Use them to get inspired or create new pages in a flash.', ' codex-elementor-Slider' ),
				'placeholder' => esc_html__( 'Type details here', ' codex-elementor-Slider' ),
				'lable_block' => true,
			]
		);
		
		
		 $repeater->add_control(
			'slider_btn',
			[
				'label' => esc_html__( 'Button', ' codex-elementor-Slider' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', ' codex-elementor-Slider' ),
				'placeholder' => esc_html__( 'Type details here', ' codex-elementor-Slider' ),
				'lable_block' => true,
			]
		);
		$repeater->add_control(
			'slider_link',
			[
				'label' => esc_html__( 'Button Link', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'https://your-link.com', 'plugin-name' ),
			  
				'label_block' => true,
			]
		);
  
        $this->add_control(
			'codex_repeat_slider',
			[
				'label' => esc_html__( 'Carousel Slider', ' codex-elementor-Slider' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(), 
				'default' => [
					[
						'slider_image' =>  esc_html__( 'Add Image', ' codex-elementor-Slider' ),
						'Slider_name' => esc_html__( 'Md Rabiul Alam', ' codex-elementor-Slider' ),
						'Slider_desigination' => esc_html__( 'CEO , WordPress Developer', ' codex-elementor-Slider' ),
						'Slider_text' => esc_html__( 'Block patterns are pre-configured block layouts. Use them to get inspired or create new pages in a flash.', ' codex-elementor-Slider' ),
						'slider_btn' => esc_html__( 'Read More', ' codex-elementor-Slider' ),
						 'slider_link' => esc_html__( '#', ' codex-elementor-Slider' ),
						 
						 
					],
					 
					 
				 
				],
				'title_field' => '{{{ Slider_name }}}',
				'separator' => 'before'
			]
		);

		// Slider Social Icon

        $this->end_controls_section();

	 // start of the Content tab section
     $this->start_controls_section(
        'settings-section',
         [
             'label' => esc_html__('Settings', 'codex-elementor-Slider'),
             'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        
         ]
     );
 
 
    $this->add_control(
        'item_number',
        [
            'label' => esc_html__( 'Slider Number', 'codex-elementor-Slider' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '1',
            'options' => [
                '1'  => esc_html__( '1', 'codex-elementor-Slider' ),
                '2' => esc_html__( '2', 'codex-elementor-Slider' ),
                '3' => esc_html__( '3', 'codex-elementor-Slider' ),
                '4' => esc_html__( '4', 'codex-elementor-Slider' ),
            ],
        ]
    );

    $this->add_control(
        'item_mergin',
        [
            'label' => esc_html__( 'Slider Mergin', 'codex-elementor-Slider' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '1',
            'options' => [
                '5'  => esc_html__( '5', 'codex-elementor-Slider' ),
                '8' => esc_html__( '8', 'codex-elementor-Slider' ),
                '10' => esc_html__( '10', 'codex-elementor-Slider' ),
                '15' => esc_html__( '15', 'codex-elementor-Slider' ),
            ],
        ]
    );
     $this->add_control(
        'slide_loop',
        [
            'label' => esc_html__( 'Slide Loop?', 'codex-elementor-Slider' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', 'codex-elementor-Slider' ),
            'label_off' => esc_html__( 'Hide', 'codex-elementor-Slider' ),
            'return_value' => 'true',
            'default' => 'true',
        ]
    );

    $this->add_control(
        'slide_autoplay',
        [
            'label' => esc_html__( 'Slide Autoplay?', 'codex-elementor-Slider' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', 'codex-elementor-Slider' ),
            'label_off' => esc_html__( 'Hide', 'codex-elementor-Slider' ),
            'return_value' => 'true',
            'default' => 'true',
        ]
    );

    $this->add_control(
        'slide_nav',
        [
            'label' => esc_html__( 'Slide Nav?', 'codex-elementor-Slider' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', 'codex-elementor-Slider' ),
            'label_off' => esc_html__( 'Hide', 'codex-elementor-Slider' ),
            'return_value' => 'true',
            'default' => 'true',
        ]
    );

    $this->add_control(
        'slide_animate_in',
        [
            'label' => esc_html__( 'Slide Animate In', 'codex-elementor-Slider' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'fadeIn',
            'options' => [
                'fadeIn'  => esc_html__( 'fadeIn', 'codex-elementor-Slider' ),
                'fadeInLeft' => esc_html__( 'fadeInLeft', 'codex-elementor-Slider' ),
                'fadeInRight' => esc_html__( 'fadeInRight', 'codex-elementor-Slider' ),
                'fadeInDown' => esc_html__( 'fadeInDown', 'codex-elementor-Slider' ),
            ],
        ]
    );

    $this->add_control(
        'slide_animate_out',
        [
            'label' => esc_html__( 'Slide Animate Out', 'codex-elementor-Slider' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'fadeOut',
            'options' => [
                'fadeOut'  => esc_html__( 'fadeOut', 'codex-elementor-Slider' ),
                'fadeOutLeft' => esc_html__( 'fadeOutLeft', 'codex-elementor-Slider' ),
                'fadeOutRight' => esc_html__( 'fadeOutRight', 'codex-elementor-Slider' ),
                'fadeOutDown' => esc_html__( 'fadeOutDown', 'codex-elementor-Slider' ),
            ],
        ]
    );


	$this->add_control(
        'slide_left_icon',
        [
            'label' => esc_html__( 'Slide Left Icon', 'codex-elementor-Slider' ),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
				'value' => 'fas fa-star',
				'library' => '',
			],
			]
        
    );

	$this->add_control(
        'slide_right_icon',
        [
            'label' => esc_html__( 'Slide Right Icon', 'codex-elementor-Slider' ),
            'type' => \Elementor\Controls_Manager::ICONS, 
            'default' => [
				'value' => 'fa fa-angle-right',
				'library' => '',
			],
			 
        ]
    );

     $this->end_controls_section();
    // end of the Content tab section


		// End of the Contect Section 

		// Start of style tab Section

		// Title Style


		$this->start_controls_section(
		'slider_style',
			[
				'label' => esc_html__('Slider',' codex-elementor-Slider'),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
		
			]
		);

		
		$this->add_responsive_control(
			'slider_height',
			[
				'label' => esc_html__( 'Slider Height', 'codex-elementor-Slider' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					
				],
				'default' => [
					'size' => 500,
				],
				'selectors' => [
					'{{WRAPPER}} .slider_grid' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
	
		$this->add_control(
			'overlay_bg',
			[
				'label' => esc_html__( 'Slider Overlay', ' codex-elementor-Slider' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_grid' => 'background: {{VALUE}}',
				],
				 
			]
		);
	 

		$this->end_controls_section();

		$this->start_controls_section(
			'box_bg_style',
			 [
				 'label' => esc_html__('Slider Caption Box',' codex-elementor-Slider'),
				 'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			
			 ]
		 );
 
		 
		 
		$this->add_responsive_control(
			'slider_box',
			[
				'label' => esc_html__( 'Box Width', 'codex-elementor-Slider' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					
				],
				'default' => [
					'size' => 500,
				],
				'selectors' => [
					'{{WRAPPER}} .testimonial_details' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
	
		$this->add_responsive_control(
			'box_mar',
			[
				'label' => esc_html__( 'margin', ' codex-elementor-Slider' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'selectors' => [
					'{{WRAPPER}} .testimonial_details' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);  
		
		$this->add_responsive_control(
			'vertical_align',
			[
				'label' => esc_html__( 'Vertical Align', 'codex-elementor-Slider' ), 
				'type' => \Elementor\Controls_Manager::CHOOSE, 
				'options' => [
					'baseline' => [
						'title' => esc_html__( 'top', 'codex-elementor-Slider' ),
						'icon' => ' eicon-v-align-top',
					],
					'center' => [
						'title' => esc_html__( 'Middel', 'codex-elementor-Slider' ),
						'icon' => ' eicon-v-align-middle',
					],
					'end' => [
						'title' => esc_html__( 'bottom', 'codex-elementor-Slider' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'default' => 'center',
				'devices' => [ 'desktop', 'tablet' ,'mobile' ],
				'toggle' => true,
			]
		);

		$this->add_responsive_control(
			'horizontal_align',
			[
				'label' => esc_html__( 'horizontal Align', 'codex-elementor-Slider' ), 
				'type' => \Elementor\Controls_Manager::CHOOSE, 
				'options' => [
					'left' => [
						'title' => esc_html__( 'left', 'codex-elementor-Slider' ),
						'icon' => ' eicon-h-align-left',
					],
					 
					'right' => [
						'title' => esc_html__( 'right', 'codex-elementor-Slider' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'left',
				'devices' => [ 'desktop', 'tablet' ,'mobile' ],
				'toggle' => true,
			]
		);

		$this->add_responsive_control(
			'box_textaligns',
			[
				'label' => esc_html__( 'Text Align', 'codex-elementor-Slider' ), 
				'type' => \Elementor\Controls_Manager::CHOOSE, 
				'options' => [
					'left' => [
						'title' => esc_html__( 'left', 'codex-elementor-Slider' ),
						'icon' => ' eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'center', 'codex-elementor-Slider' ),
						'icon' => ' eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'right', 'codex-elementor-Slider' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'devices' => [ 'desktop', 'tablet' ,'mobile' ],
				'toggle' => true,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Box Background', 'codex-elementor-Slider' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .testimonial_details',
			]
		);

		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'borders',
				'label' => esc_html__( 'Border', 'codex-elementor-Slider' ),
				'selector' => '{{WRAPPER}} .testimonial_details',
			]
		);
		
		$this->add_responsive_control(
			'bgimageborder',
			[
				'label' => esc_html__( 'Box Border', ' codex-elementor-Slider' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', ],
				'selectors' => [
					'{{WRAPPER}} .testimonial_details' => 'border: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);	
		$this->add_responsive_control(
			'social_ted_border',
			[
				'label' => esc_html__( 'Border Radius', 'elementor-name' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', ],
				'selectors' => [
					'{{WRAPPER}} .testimonial_details' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'bg_box_padd',
			[
				'label' => esc_html__( 'padding', ' codex-elementor-Slider' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'selectors' => [
					'{{WRAPPER}} .testimonial_details' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		 $this->end_controls_section();


		$this->start_controls_section(
			'title_style',
			 [
				 'label' => esc_html__('Slider Caption Title',' codex-elementor-Slider'),
				 'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			
			 ]
		 );

		 $this->add_responsive_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', ' codex-elementor-Slider' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_details h2' => 'color: {{VALUE}}',
				],
				 
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .slider_details h2',
			]
		);
		
		$this->add_responsive_control(
			'slider_hed_h2',
			[
				'label' => esc_html__( 'padding', 'elementor-name' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'selectors' => [
					'{{WRAPPER}} .slider_details h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		 

		 $this->end_controls_section();

	   // Designation Style

		$this->start_controls_section(
			'desigination_style',
			 [
				 'label' => esc_html__('Slider Caption Sub Title',' codex-elementor-Slider'),
				 'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			
			 ]
		 );

		 
		 $this->add_responsive_control(
			'desigination_color',
			[
				'label' => esc_html__( 'Color', ' codex-elementor-Slider' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_details h3' => 'color: {{VALUE}}',
				],
				 
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'designation_typogrphy',
				'selector' => '{{WRAPPER}} .slider_details h3',
			]
		);

		$this->add_responsive_control(
			'slider_hed_h3',
			[
				'label' => esc_html__( 'padding', 'elementor-name' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'selectors' => [
					'{{WRAPPER}} .slider_details h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		 $this->end_controls_section();

		 // Slider Details Style

		$this->start_controls_section(
			'testdetails_style',
			 [
				 'label' => esc_html__('Slider Caption Details',' codex-elementor-Slider'),
				 'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			
			 ]
		 );

		 
		 $this->add_responsive_control(
			'testdesigination_color',
			[
				'label' => esc_html__( 'Color', ' codex-elementor-Slider' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_details p' => 'color: {{VALUE}}',
				],
				 
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'testdesignation_typogrphy',
				'selector' => '{{WRAPPER}} .slider_details p',
			]
		);

		
		$this->add_responsive_control(
			'slider_hed_hp',
			[
				'label' => esc_html__( 'padding', 'elementor-name' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'selectors' => [
					'{{WRAPPER}} .slider_details p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		 $this->end_controls_section();

     	$this->start_controls_section(
			'button_style',
			 [
				 'label' => esc_html__('Button style',' codex-elementor-Slider'),
				 'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			
			 ]
		 );

		 $this->add_responsive_control(
			'button_color',
			[
				'label' => esc_html__( 'Color', ' codex-elementor-Slider' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_details a' => 'color: {{VALUE}}',
				],
				 
			]
		);
		
			 $this->add_responsive_control(
			'button_bg_color',
			[
				'label' => esc_html__( 'Background Color', ' codex-elementor-Slider' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_details a' => 'background: {{VALUE}}',
				],
				 
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'bt_content_typography',
				'selector' => '{{WRAPPER}} .slider_details a',
			]
		);   
		$this->add_responsive_control(
			'slider_hed_btn',
			[
				'label' => esc_html__( 'padding', 'elementor-name' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'selectors' => [
					'{{WRAPPER}} .slider_details a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'social_tes_border',
			[
				'label' => esc_html__( 'Border Radius', 'elementor-name' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', ],
				'selectors' => [
					'{{WRAPPER}} .slider_details a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'btsbgimageborder',
			[
				'label' => esc_html__( 'Border', ' codex-elementor-Slider' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', ],
				'selectors' => [
					'{{WRAPPER}} .slider_details a' => 'border: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);	
		$this->end_controls_section();

		// Social Icon Style

		$this->start_controls_section(
			'social_icon_style',
			 [
				 'label' => esc_html__('Social Icon Style','elementor-team'),
				 'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			
			 ]
		 );

		 $this->start_controls_tabs(
			'style_tabs'
		);
		
		$this->start_controls_tab(
			'social_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'elementor-name' ),
			]
		);

		$this->add_responsive_control(
			'social_icon_color',
			[
				'label' => esc_html__( 'Color', 'elementor-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-carousel .owl-nav i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'social_bg_color',
			[
				'label' => esc_html__( 'Backgorund Color', 'elementor-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-carousel .owl-nav i' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'social_icon_size',
			[
				'label' => esc_html__( 'Size', 'elementor-name' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 5,
					],
					 
				],
				'default' => [
					'unit' => 'px',
					'size' => 32,
				],
				'selectors' => [
					'{{WRAPPER}} .testimonial-carousel .owl-nav i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'social_icon_border',
			[
				'label' => esc_html__( 'Border Radius', 'elementor-name' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', ],
				'selectors' => [
					'{{WRAPPER}} .testimonial-carousel .owl-nav i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'social_padding_border',
			[
				'label' => esc_html__( 'padding', 'elementor-name' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'selectors' => [
					'{{WRAPPER}} .testimonial-carousel .owl-nav i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->end_controls_section();

	}

	/**
	 * Render heading  widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		// get our input from the widget settings.
		$settings = $this->get_settings_for_display(); 
		$Slider_slider_layout = $settings['Slider_slider_layout'];
		$slider_image = $settings['slider_image'];
		$Slider_name = $settings['Slider_name'];
		$Slider_text = $settings['Slider_text'];
		$Slider_desigination = $settings['Slider_desigination'];
		$codex_repeat_slider = $settings['codex_repeat_slider'];
        $slider_box_bg = $settings['slider_box_bg']; 
        $slider_box_padd = $settings['slider_box_padd']; 
        $slider_height = $settings['slider_height'];
        $slider_box = $settings['slider_box'];
        $vertical_align = $settings['vertical_align'];
        $horizontal_align = $settings['horizontal_align'];
        $box_textaligns = $settings['box_textaligns'];
        $item_number = $settings['item_number'];
        $item_mergin = $settings['item_mergin'];
        $slide_loop = $settings['slide_loop'];
		$slide_autoplay = $settings['slide_autoplay'];
		$slide_nav = $settings['slide_nav'];
		$slide_animate_in = $settings['slide_animate_in'];
		$slide_animate_out = $settings['slide_animate_out'];
		$slide_left_icon = $settings['slide_left_icon']; 
		$slide_right_icon = $settings['slide_right_icon'];

        if($slide_loop == 'true') {
			$slide_loop = 'true';
		} else {
			$slide_loop = 'false';
		}

		if($slide_autoplay == 'true') {
			$slide_autoplay = 'true';
		} else {
			$slide_autoplay = 'false';
		}

		if($slide_nav == 'true') {
			$slide_nav = 'true';
		} else {
			$slide_nav = 'false';
		}

		include( __DIR__ . '/basic-slider/slider-style-1.php' );
 

       
	}
}