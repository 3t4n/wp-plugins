<?php

namespace Elementor;

use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if (!defined('ABSPATH'))
    exit;

class FlexiType_FlipBox extends Widget_Base
{
    public function get_name()
    {
        return 'flexitype-flip-box';
    }

    public function get_title()
    {
        return esc_html__('Flip Box','flexitype-lite');
    }

    public function get_icon()
    {
        return 'flexitype-icon eicon-flip-box';
    }

    public function get_categories()
    {
        return ['flexitype'];
    }

    public function get_keywords()
    {
        return ['flexitype', 'elements', 'Icon', 'List', 'Item'];
    }

    public function get_style_depends() {
		return [ 
			'elementor-icons-fa-solid',
			'elementor-icons-fa-brands',
			'elementor-icons-fa-regular',
		];
	}

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_icon',
            [
                'label' => esc_html__('Settings','flexitype-lite'),
            ]
        );
        $this->add_control(
            'flip_box_type',
            [
                'label'       => esc_html__('Card Effects','flexitype-lite'),
                'type'        => Controls_Manager::SELECT,
                'default' => 'flip_left',
                'options'     => [
                    'flip_left'     => esc_html__('Flip Left','flexitype-lite'),
                    'flip_right'    => esc_html__('Flip Right','flexitype-lite'),
                    'flip_up'       => esc_html__('Flip Up','flexitype-lite'),
                    'flip_down'     => esc_html__('Flip Down','flexitype-lite'),
                    'zoom_in'  => esc_html__('Zoom In','flexitype-lite'),
                    'zoom_out' => esc_html__('Zoom Out','flexitype-lite'),
                    'fade_in' => esc_html__('Fade In','flexitype-lite'),
                    'slide_left' => esc_html__('Slide Left 01','flexitype-lite'),
                    'slide_two_left' => esc_html__('Slide Left 02','flexitype-lite'),
                    'slide_up' => esc_html__('Slide Up 01','flexitype-lite'),
                    'slide_two_up' => esc_html__('Slide Up 02','flexitype-lite'),
                    'slide_right' => esc_html__('Slide Right 01','flexitype-lite'),
                    'slide_two_right' => esc_html__('Slide Right 02','flexitype-lite'),
                    'slide_down' => esc_html__('Slide Down 01','flexitype-lite'),
                    'slide_two_down' => esc_html__('Slide Down 02','flexitype-lite'),
                    'effect_left_one'     => esc_html__('Effects Left 01','flexitype-lite'),
                    'effect_left_two'     => esc_html__('Effects Left 02','flexitype-lite'),
                    'effect_left_three'     => esc_html__('Effects Left 03','flexitype-lite'),
                    'effect_left_four'     => esc_html__('Effects Left 04','flexitype-lite'),
                    'effect_up_one'     => esc_html__('Effects Up 01','flexitype-lite'),
                    'effect_up_two'     => esc_html__('Effects Up 02','flexitype-lite'),
                    'effect_up_three'     => esc_html__('Effects Up 03','flexitype-lite'),
                    'effect_up_four'     => esc_html__('Effects Up 04','flexitype-lite'),
                    'effect_right_one'     => esc_html__('Effects Right 01','flexitype-lite'),
                    'effect_right_two'     => esc_html__('Effects Right 02','flexitype-lite'),
                    'effect_right_three'     => esc_html__('Effects Right 03','flexitype-lite'),
                    'effect_right_four'     => esc_html__('Effects Right 04','flexitype-lite'),
                    'effect_down_one'     => esc_html__('Effects Down 01','flexitype-lite'),
                    'effect_down_two'     => esc_html__('Effects Down 02','flexitype-lite'),
                    'effect_down_three'     => esc_html__('Effects Down 03','flexitype-lite'),
                    'effect_down_four'     => esc_html__('Effects Down 04','flexitype-lite'),
                ],
            ]
        );
	    $this->add_control(
		    'flip_box_3d',
		    [
			    'label' => esc_html__( '3D Depth','flexitype-lite' ),
			    'type' => Controls_Manager::SWITCHER,
			    'label_on' => esc_html__( 'On','flexitype-lite' ),
			    'label_off' => esc_html__( 'Off','flexitype-lite' ),
			    'return_value' => 'flip_box_3d',
			    'default' => '',
			    'prefix_class' => '',
			    'condition' => [
				    'flip_box_type' => [
					    'flip_left',
					    'flip_right',
					    'flip_up',
					    'flip_down',
                    ]
			    ],
		    ]
	    );
        $this->add_responsive_control(
			'flip_box_height',
			[
				'label' => esc_html__( 'Height','flexitype-lite' ),
				'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                ],
				'selectors' => [
					'{{WRAPPER}} .flip_box_container' => 'height: {{SIZE}}{{UNIT}}',
				],
			]
		);
        $this->add_responsive_control(
			'flip_box_scale',
			[
				'label' => esc_html__( 'Zoom Start','flexitype-lite' ),
				'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1,
                        'step' => 0.1,
                    ],
                ],
				'selectors' => [
					'{{WRAPPER}} .flip_box_container.zoom_in .icon__box-item.back' => 'transform: scale({{SIZE}})',
				],
                'condition' => [
                    'flip_box_type' => ['zoom_in'],
                ],
			]
		);
        $this->add_responsive_control(
			'flip_box_scale_end',
			[
				'label' => esc_html__( 'Zoom End','flexitype-lite' ),
				'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1,
                        'step' => 0.1,
                    ],
                ],
				'selectors' => [
					'{{WRAPPER}} .flip_box_container.zoom_in:hover .icon__box-item.back' => 'transform: scale({{SIZE}})',
					'{{WRAPPER}} .flip_box_container.zoom_out:hover .icon__box-item.front' => 'transform: scale({{SIZE}})',
				],
                'condition' => [
                    'flip_box_type' => ['zoom_in', 'zoom_out'],
                ],
			]
		);
        $this->add_responsive_control(
			'flip_box_transition',
			[
				'label' => esc_html__( 'Transition Duration','flexitype-lite' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 's', 'ms', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .flip_box_container .flip_box_card' => 'transition: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .icon__box-item' => 'transition: {{SIZE}}{{UNIT}}',
				],
			]
		);
        $this->end_controls_section();

        $this->start_controls_section(
            'front_side_content',
            [
                'label' => esc_html__('Front Side','flexitype-lite'),
            ]
        );
        $this->add_control(
            'content_type',
            [
                'label' => esc_html__('Content Type','flexitype-lite'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'content' => esc_html__('Content','flexitype-lite'),
                    'template' => esc_html__('Template','flexitype-lite'),
                ],
                'default' => 'content',
            ]
        );
        $this->add_control(
            'select_template',
            [
                'label' => esc_html__('Select a Template','flexitype-lite'),
                'type' => Controls_Manager::SELECT2,
                'options' => flexitype_lite_template(),
                'label_block' => true,
                'condition' => [
                    'content_type' => 'template',
                ],
            ]
        );
        $this->add_control(
            'flip_box_icon', [
                'label'       => esc_html__( 'Icon Type','flexitype-lite' ),
                'type'        => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options'     => [
                    'none' => [
                        'title' => esc_html__( 'None','flexitype-lite' ),
                        'icon'  => 'fa fa-ban',
                    ],
                    'icon' => [
                        'title' => esc_html__( 'Icon','flexitype-lite' ),
                        'icon'  => 'fas fa-icons',
                    ],
                    'image' => [
                        'title' => esc_html__( 'Image','flexitype-lite' ),
                        'icon'  => 'fa fa-image',
                    ],
                ],
                'default'       => 'icon',
                'condition' => [
                    'content_type' => 'content',
                ],
            ]
        );
        $this->add_control(
            'box_icon',
            [
                'label' => esc_html__('Choose Icon','flexitype-lite'),
                'type' => Controls_Manager::ICONS,
                'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
                'condition' => [
                    'flip_box_icon' => 'icon',
                    'content_type' => 'content',
                ],
            ]
        );
        $this->add_control(
            'box_image',
            [
                'label' => esc_html__('Choose Image','flexitype-lite'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'flip_box_icon' => 'image',
                    'content_type' => 'content',
                ],
            ]
        );
        $this->add_control(
            'box_title',
            [
                'label' => esc_html__('Title','flexitype-lite'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('This is the heading','flexitype-lite'),
                'label_block' => true,
                'condition' => [
                    'content_type' => 'content',
                ],
            ]
        );
        $this->add_control(
            'box_description',
            [
                'label' => esc_html__('Content','flexitype-lite'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','flexitype-lite'),
                'placeholder' => esc_html__('Type your content here','flexitype-lite'),
                'condition' => [
                    'content_type' => 'content',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_content',
            [
                'label' => esc_html__('Horizontal Alignment','flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => esc_html__('Left','flexitype-lite'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center','flexitype-lite'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'end' => [
                        'title' => esc_html__('Right','flexitype-lite'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.front' => 'text-align: {{VALUE}}; align-items: {{VALUE}};',
                    '{{WRAPPER}} .icon__box-item.front .content' => 'align-items: {{VALUE}};',
                    '{{WRAPPER}} .icon__box-item.front .content p' => 'justify-content: {{VALUE}};',
                ],
                'condition' => [
                    'content_type' => 'content',
                ],
            ]
        );
        $this->add_responsive_control(
            'vertical_icon_box_content',
            [
                'label' => esc_html__('Vertical Alignment','flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => esc_html__('Top','flexitype-lite'),
                        'icon' => 'eicon-justify-start-v',
                    ],
                    'center' => [
                        'title' => esc_html__('Center','flexitype-lite'),
                        'icon' => 'eicon-justify-center-v',
                    ],
                    'space-between' => [
                        'title' => esc_html__('Space Between','flexitype-lite'),
                        'icon' => 'eicon-justify-space-between-v',
                    ],
                    'end' => [
                        'title' => esc_html__('Bottom','flexitype-lite'),
                        'icon' => 'eicon-justify-end-v',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.front .content' => 'justify-content: {{VALUE}};',
                ],
                'condition' => [
                    'content_type' => 'content',
                ],
            ]
        );
        $this->add_control(
            'badge_control_switch',
            [
                'label' => esc_html__( 'Show Badge','flexitype-lite' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show','flexitype-lite' ),
                'label_off' => esc_html__( 'Hide','flexitype-lite' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'badge_control_title',
            [
                'label' => esc_html__( 'Title','flexitype-lite' ),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => esc_html__( '01','flexitype-lite' ),
                'placeholder' => esc_html__( 'Type your title here','flexitype-lite' ),
                'condition' => [
                    'badge_control_switch' => 'yes'
                ]
            ]
        );
        $this->add_responsive_control(
			'badge_horizontal_position',
			[
				'label' => esc_html__( 'Horizontal Position','flexitype-lite' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => -10,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => -10,
						'max' => 500,
					],
                ],
				'selectors' => [
					'{{WRAPPER}} .icon__box-item.custom_badge .box_badge' => 'right: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'badge_control_switch' => 'yes'
                ]
			]
        );
        $this->add_responsive_control(
			'badge_vertical_position',
			[
				'label' => esc_html__( 'Vertical Position','flexitype-lite' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => -10,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => -10,
						'max' => 500,
					],
                ],
				'selectors' => [
					'{{WRAPPER}} .icon__box-item.custom_badge .box_badge' => 'top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'badge_control_switch' => 'yes'
                ]
			]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'back_side_content',
            [
                'label' => esc_html__('Back Side','flexitype-lite'),
            ]
        );
        $this->add_control(
            'back_content_type',
            [
                'label' => esc_html__('Content Type','flexitype-lite'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'content' => esc_html__('Content','flexitype-lite'),
                    'template' => esc_html__('Template','flexitype-lite'),
                ],
                'default' => 'content',
            ]
        );
        $this->add_control(
            'back_select_template',
            [
                'label' => esc_html__('Select a Template','flexitype-lite'),
                'type' => Controls_Manager::SELECT2,
                'options' => flexitype_lite_template(),
                'label_block' => true,
                'condition' => [
                    'back_content_type' => 'template',
                ],
            ]
        );
        $this->add_control(
            'back_flip_box_icon', [
                'label'       => esc_html__( 'Icon Type','flexitype-lite' ),
                'type'        => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options'     => [
                    'none' => [
                        'title' => esc_html__( 'None','flexitype-lite' ),
                        'icon'  => 'fa fa-ban',
                    ],
                    'icon' => [
                        'title' => esc_html__( 'Icon','flexitype-lite' ),
                        'icon'  => 'fas fa-icons',
                    ],
                    'image' => [
                        'title' => esc_html__( 'Image','flexitype-lite' ),
                        'icon'  => 'fa fa-image',
                    ],
                ],
                'default'       => 'icon',
                'condition' => [
                    'back_content_type' => 'content',
                ],
            ]
        );
        $this->add_control(
            'back_box_icon',
            [
                'label' => esc_html__('Choose Icon','flexitype-lite'),
                'type' => Controls_Manager::ICONS,
                'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
                'condition' => [
                    'back_flip_box_icon' => 'icon',
                    'back_content_type' => 'content',
                ],
            ]
        );
        $this->add_control(
            'back_box_image',
            [
                'label' => esc_html__('Choose Image','flexitype-lite'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'back_flip_box_icon' => 'image',
                    'back_content_type' => 'content',
                ],
            ]
        );
        $this->add_control(
            'back_box_title',
            [
                'label' => esc_html__('Title','flexitype-lite'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('This is the heading','flexitype-lite'),
                'label_block' => true,
                'condition' => [
                    'back_content_type' => 'content',
                ],
            ]
        );
        $this->add_control(
            'back_title_link',
            [
                'label' => esc_html__('Title URL','flexitype-lite'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('Paste URL or Link','flexitype-lite'),
                'condition' => [
                    'back_box_title[text]!' => '',
                    'back_content_type' => 'content',
                ],
            ]
        );
        $this->add_control(
            'back_box_description',
            [
                'label' => esc_html__('Content','flexitype-lite'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','flexitype-lite'),
                'placeholder' => esc_html__('Type your content here','flexitype-lite'),
                'condition' => [
                    'back_content_type' => 'content',
                ],
            ]
        );
        $this->add_responsive_control(
            'back_icon_box_content',
            [
                'label' => esc_html__('Alignment','flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => esc_html__('Left','flexitype-lite'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center','flexitype-lite'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'end' => [
                        'title' => esc_html__('Right','flexitype-lite'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.back' => 'text-align: {{VALUE}}; align-items: {{VALUE}};',
                    '{{WRAPPER}} .icon__box-item.back .content' => 'align-items: {{VALUE}};',
                    '{{WRAPPER}} .icon__box-item.back .content p' => 'justify-content: {{VALUE}};',
                ],
                'condition' => [
                    'back_content_type' => 'content',
                ],
            ]
        );
        $this->add_responsive_control(
            'back_vertical_icon_box_content',
            [
                'label' => esc_html__('Vertical Alignment','flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => esc_html__('Top','flexitype-lite'),
                        'icon' => 'eicon-justify-start-v',
                    ],
                    'center' => [
                        'title' => esc_html__('Center','flexitype-lite'),
                        'icon' => 'eicon-justify-center-v',
                    ],
                    'space-between' => [
                        'title' => esc_html__('Space Between','flexitype-lite'),
                        'icon' => 'eicon-justify-space-between-v',
                    ],
                    'end' => [
                        'title' => esc_html__('Bottom','flexitype-lite'),
                        'icon' => 'eicon-justify-end-v',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.back .content' => 'justify-content: {{VALUE}};',
                ],
                'condition' => [
                    'back_content_type' => 'content',
                ],
            ]
        );
        $this->add_control(
            'back_badge_control_switch',
            [
                'label' => esc_html__( 'Show Badge','flexitype-lite' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show','flexitype-lite' ),
                'label_off' => esc_html__( 'Hide','flexitype-lite' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'back_badge_control_title',
            [
                'label' => esc_html__( 'Title','flexitype-lite' ),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => esc_html__( '01','flexitype-lite' ),
                'placeholder' => esc_html__( 'Type your title here','flexitype-lite' ),
                'condition' => [
                    'back_badge_control_switch' => 'yes'
                ]
            ]
        );
        $this->add_responsive_control(
			'back_badge_horizontal_position',
			[
				'label' => esc_html__( 'Horizontal Position','flexitype-lite' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => -10,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => -10,
						'max' => 500,
					],
                ],
				'selectors' => [
					'{{WRAPPER}} .icon__box-item.back.custom_badge .box_badge' => 'right: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'back_badge_control_switch' => 'yes'
                ]
			]
        );
        $this->add_responsive_control(
			'back_badge_vertical_position',
			[
				'label' => esc_html__( 'Vertical Position','flexitype-lite' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => -10,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => -10,
						'max' => 500,
					],
                ],
				'selectors' => [
					'{{WRAPPER}} .icon__box-item.back.custom_badge .box_badge' => 'top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'back_badge_control_switch' => 'yes'
                ]
			]
        );
        $this->add_control(
            'back_box_btn_active',
            [
                'label' => esc_html__('Enable Button','flexitype-lite'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes','flexitype-lite'),
                'label_off' => esc_html__('No','flexitype-lite'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'back_content_type' => 'content',
                ],
            ]
        );
        $this->add_control(
            'back_box_btn',
            [
                'label' => esc_html__('Button Text','flexitype-lite'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Read More','flexitype-lite'),
                'label_block' => false,
                'condition' => [
                    'back_box_btn_active' => ['yes'],
                ],
            ]
        );
        $this->add_control(
            'back_box_btn_link',
            [
                'label' => esc_html__('Button URL','flexitype-lite'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => 'http://example.com',
                ],
                'condition' => [
                    'back_box_btn_active' => ['yes'],
                ],
            ]
        );
		$this->add_control(
            'back_button_icon',
            [
                'label' => esc_html__('Button Icon','flexitype-lite'),
                'type' => Controls_Manager::ICONS,
                'condition' => [
                    'back_box_btn_active' => ['yes'],
                ],
            ]
        );
		$this->add_control(
			'back_icon_align',
			[
				'label' => esc_html__( 'Icon Position','flexitype-lite' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => esc_html__( 'Before','flexitype-lite' ),
					'right' => esc_html__( 'After','flexitype-lite' ),
				],
                'condition' => [
                    'back_button_icon[value]!' => '',
                    'back_box_btn_active' => ['yes'],
                ],
			]
		);
        $this->end_controls_section();

        $this->start_controls_section(
            'icon_box_style',
            [
                'label' => esc_html__('Box Style','flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'front_background_heading',
            [
                'label'     => esc_html__('Front Background Color','flexitype-lite'),
                'type'      => Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'front_background',                
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .icon__box-item.front',
            ]
        );
        $this->add_control(
            'front_background_overlay',
            [
                'label' => esc_html__('Overlay Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.front::before' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'back_background_heading',
            [
                'label'     => esc_html__('Back Background Color','flexitype-lite'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'back_background',                
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .icon__box-item.back',
            ]
        );
        $this->add_control(
            'back_background_overlay',
            [
                'label' => esc_html__('Overlay Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.back::before' => 'background: {{VALUE}}',
                ],
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'box_border_type',
				'selector' => '{{WRAPPER}} .icon__box-item',
			]
		);
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_item_shadow',
                'selector' => '{{WRAPPER}} .icon__box-item',
            ]
        );
        $this->add_responsive_control(
            'box_radius',
            [
                'label' => esc_html__('Border Radius','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .icon__box-item-overlay' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .icon__box-item::before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_padding',
            [
                'label' => esc_html__('Padding','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'icon_box_icon_style',
            [
                'label' => esc_html__('Icon Style','flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'box_icon[value]!' => '',
                ],
            ]
        );
        $this->start_controls_tabs(
			'style_icon_tabs'
		);
		$this->start_controls_tab(
			'style_icon_normal_tab',
			[
				'label' => esc_html__( 'Front','flexitype-lite' ),
			]
		);
        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-icon i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .icon__box-item-icon svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_background',
            [
                'label' => esc_html__('Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-icon' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_icon_size',
            [
                'label' => esc_html__('Font Size','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .icon__box-item-icon svg' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_width',
            [
                'label' => esc_html__('Max Width','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 150,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-icon' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}};min-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_icon_shadow',
                'selector' => '{{WRAPPER}} .icon__box-item-icon',
            ]
        );        
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_type',
				'selector' => '{{WRAPPER}} .icon__box-item-icon',
			]
		);
        $this->add_responsive_control(
            'icon_box_radius',
            [
                'label' => esc_html__('Border Radius','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'icon_box_margin',
            [
                'label' => esc_html__('Margin','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_padding',
            [
                'label' => esc_html__('Padding','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tab();
		$this->start_controls_tab(
			'style_icon_hover_tab',
			[
				'label' => esc_html__( 'Back','flexitype-lite' ),
			]
		);
        $this->add_control(
            'back_icon_color',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.back .icon__box-item-icon i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .icon__box-item.back .icon__box-item-icon svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'back_icon_background',
            [
                'label' => esc_html__('Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.back .icon__box-item-icon' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'back_icon_box_icon_size',
            [
                'label' => esc_html__('Font Size','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.back .icon__box-item-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .icon__box-item.back .icon__box-item-icon svg' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'back_icon_box_width',
            [
                'label' => esc_html__('Max Width','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 150,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.back .icon__box-item-icon' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}};min-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'back_box_icon_shadow',
                'selector' => '{{WRAPPER}} .icon__box-item.back .icon__box-item-icon',
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'back_border_type',
				'selector' => '{{WRAPPER}} .icon__box-item.back .icon__box-item-icon',
			]
		);
        $this->add_responsive_control(
            'back_icon_box_radius',
            [
                'label' => esc_html__('Border Radius','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.back .icon__box-item-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'back_icon_box_margin',
            [
                'label' => esc_html__('Margin','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.back .icon__box-item-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'back_icon_box_padding',
            [
                'label' => esc_html__('Padding','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.back .icon__box-item-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tab();
		$this->end_controls_tabs();
        $this->end_controls_section();

		$this->start_controls_section(
			'section_style_image',
			[
				'label' => esc_html__( 'Image Style','flexitype-lite' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'box_image_max_width',
			[
				'label' => esc_html__( 'Max Width','flexitype-lite' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 500,
					],
					'%' => [
						'min' => 5,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .icon__box-item.front .icon__box-item-image img' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'box_image_width',
			[
				'label' => esc_html__( 'Width','flexitype-lite' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 500,
					],
					'%' => [
						'min' => 5,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .icon__box-item.front .icon__box-item-image img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'box_image_height',
			[
				'label' => esc_html__( 'Height','flexitype-lite' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .icon__box-item.front .icon__box-item-image img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'box_image_object-fit',
			[
				'label' => esc_html__( 'Object Fit','flexitype-lite' ),
				'type' => Controls_Manager::SELECT,
				'condition' => [
					'box_image_height[size]!' => '',
				],
				'options' => [
					'' => esc_html__( 'Default','flexitype-lite' ),
					'cover' => esc_html__( 'Cover','flexitype-lite' ),
					'contain' => esc_html__( 'Contain','flexitype-lite' ),
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .icon__box-item.front .icon__box-item-image img' => 'object-fit: {{VALUE}};',
				],
			]
		);
        $this->add_control(
            'box_image_bg',
            [
                'label' => esc_html__('Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.front .icon__box-item-image' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_image_padding',
            [
                'label' => esc_html__('Padding','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.front .icon__box-item-image img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_image_radius',
            [
                'label' => esc_html__('Border Radius','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.front .icon__box-item-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'box_image_border',
				'selector' => '{{WRAPPER}} .icon__box-item.front .icon__box-item-image img',
			]
		);
		$this->end_controls_section();

        $this->start_controls_section(
            'icon_box_content_style',
            [
                'label' => esc_html__('Title & Description','flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
			'style_content_tabs'
		);
		$this->start_controls_tab(
			'style_content_normal_tab',
			[
				'label' => esc_html__( 'Front','flexitype-lite' ),
			]
		);
        $this->add_control(
            'front_content_bg',
            [
                'label' => esc_html__('Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.front .icon__box-item-content' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'front_content_shadow',
                'selector' => '{{WRAPPER}} .icon__box-item.front .icon__box-item-content',
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'front_content_border_type',
				'selector' => '{{WRAPPER}} .icon__box-item.front .icon__box-item-content',
			]
		);
        $this->add_responsive_control(
            'front_content_padding',
            [
                'label' => esc_html__('Padding','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.front .icon__box-item-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'front_content_margin',
            [
                'label' => esc_html__('Margin','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.front .icon__box-item-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'icon_box_description',
            [
                'label' => esc_html__('Title','flexitype-lite'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'icon_box_description_typography',
                'selector' => '{{WRAPPER}} .icon__box-item-content h4',
            ]
        );
        $this->add_control(
            'icon_box_description_color',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-content h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_des_margin',
            [
                'label' => esc_html__('Margin','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-content h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'icon_box_title',
            [
                'label' => esc_html__('Description','flexitype-lite'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'icon_box_typography',
                'selector' => '{{WRAPPER}} .icon__box-item-content p',
            ]
        );
        $this->add_control(
            'icon_box_title_color',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_title_margin',
            [
                'label' => esc_html__('Margin','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tab();
		$this->start_controls_tab(
			'style_content_hover_tab',
			[
				'label' => esc_html__( 'Back','flexitype-lite' ),
			]
		);
        $this->add_control(
            'back_content_bg',
            [
                'label' => esc_html__('Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.back .icon__box-item-content' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'back_content_shadow',
                'selector' => '{{WRAPPER}} .icon__box-item.back .icon__box-item-content',
            ]
        );        
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'back_content_border_type',
				'selector' => '{{WRAPPER}} .icon__box-item.back .icon__box-item-content',
			]
		);
        $this->add_responsive_control(
            'back_content_padding',
            [
                'label' => esc_html__('Padding','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.back .icon__box-item-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'back_content_margin',
            [
                'label' => esc_html__('Margin','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.back .icon__box-item-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'back_icon_box_description',
            [
                'label' => esc_html__('Title','flexitype-lite'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'back_icon_box_description_typography',
                'selector' => '{{WRAPPER}} .icon__box-item.back .icon__box-item-content h4',
            ]
        );
        $this->add_control(
            'back_icon_box_description_color',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.back .icon__box-item-content h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'box_description_hover_color',
            [
                'label' => esc_html__('Hover Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.back .icon__box-item-content h4 a:hover' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'back_title_link[url]!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'back_icon_box_des_margin',
            [
                'label' => esc_html__('Margin','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.back .icon__box-item-content h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'back_icon_box_title',
            [
                'label' => esc_html__('Description','flexitype-lite'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'back_icon_box_typography',
                'selector' => '{{WRAPPER}} .icon__box-item.back .icon__box-item-content p',
            ]
        );
        $this->add_control(
            'back_icon_box_title_color',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.back .icon__box-item-content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'back_icon_box_title_margin',
            [
                'label' => esc_html__('Margin','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.back .icon__box-item-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tab();
		$this->end_controls_tabs();
        $this->end_controls_section();
        
        $this->start_controls_section(
            'icon_box_badge_style',
            [
                'label' => esc_html__( 'Badge','flexitype-lite' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'badge_control_switch' => 'yes',
                ]
            ]
        );
        $this->start_controls_tabs(
			'style_badge_tabs'
		);
		$this->start_controls_tab(
			'style_badge_normal_tab',
			[
				'label' => esc_html__( 'Front','flexitype-lite' ),
			]
		);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'badge_typography',
                'label' => esc_html__( 'Typography','flexitype-lite' ),
                'selector' => '{{WRAPPER}} .icon__box-item .box_badge',
            ]
        );
        $this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'badge_text_stroke',
				'selector' => '{{WRAPPER}} .icon__box-item .box_badge',
			]
		);
        $this->add_control(
            'badge_text_color',
            [
                'label' => esc_html__( 'Color','flexitype-lite' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item .box_badge' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'badge_background',
                'label' => esc_html__( 'Background','flexitype-lite' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .icon__box-item .box_badge',
            ]
        );
        $this->add_responsive_control(
            'front_badge_rotate',
            [
                'label' => esc_html__('Rotate','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -180,
						'max' => 180,
						'step' => 1,
					],
				],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item .box_badge' => 'transform: rotate({{SIZE}}deg);',
                ],
            ]
        );  
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'badge_border_type',
				'selector' => '{{WRAPPER}} .icon__box-item .box_badge',
			]
		);
        $this->add_responsive_control(
            'box_badge_padding',
            [
                'label' => esc_html__('Padding','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item .box_badge' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_badge_margin',
            [
                'label' => esc_html__('Margin','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item .box_badge' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_badge_radius',
            [
                'label' => esc_html__('Border Radius','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item .box_badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tab();
		$this->start_controls_tab(
			'style_badge_hover_tab',
			[
				'label' => esc_html__( 'Back','flexitype-lite' ),
			]
		);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'back_badge_typography',
                'label' => esc_html__( 'Typography','flexitype-lite' ),
                'selector' => '{{WRAPPER}} .icon__box-item.back .box_badge',
            ]
        );
        $this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'back_badge_text_stroke',
				'selector' => '{{WRAPPER}} .icon__box-item.back .box_badge',
			]
		);
        $this->add_control(
            'back_badge_text_color',
            [
                'label' => esc_html__( 'Color','flexitype-lite' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.back .box_badge' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'back_badge_background',
                'label' => esc_html__( 'Background','flexitype-lite' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .icon__box-item.back .box_badge',
            ]
        );
        $this->add_responsive_control(
            'back_badge_rotate',
            [
                'label' => esc_html__('Rotate','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -180,
						'max' => 180,
						'step' => 1,
					],
				],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item .box_badge' => 'transform: rotate({{SIZE}}deg);',
                ],
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'back_badge_border_type',
				'selector' => '{{WRAPPER}} .icon__box-item.back .box_badge',
			]
		);
        $this->add_responsive_control(
            'back_box_badge_padding',
            [
                'label' => esc_html__('Padding','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.back .box_badge' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'back_box_badge_margin',
            [
                'label' => esc_html__('Margin','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.back .box_badge' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'back_box_badge_radius',
            [
                'label' => esc_html__('Border Radius','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .icon__box-item.back .box_badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tab();
		$this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Button Style','flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'back_box_btn_active' => ['yes'],
                ],
            ]
        );
        $this->start_controls_tabs(
            'style_tabs'
        );
        $this->start_controls_tab(
            'normal_icon',
            [
                'label' => esc_html__('Normal','flexitype-lite'),
            ]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .flexitype-button',
			]
		);
        $this->add_control(
            'btn_color',
            [
                'label' => esc_html__('Text Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'bg_color',
            [
                'label' => esc_html__('Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_btn_shadow',
                'selector' => '{{WRAPPER}} .flexitype-button',
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'btn_border_type',
				'selector' => '{{WRAPPER}} .flexitype-button',
			]
		);
        $this->add_responsive_control(
            'btn_radius',
            [
                'label' => esc_html__('Border Radius','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'btn_padding',
            [
                'label' => esc_html__('Padding','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->add_control(
			'btn_icon_text',
			[
				'label' => esc_html__( 'Icon Style','flexitype-lite' ),
				'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'back_button_icon[value]!' => '',
                ],
			]
		);
        $this->add_control(
            'btn_icon_color',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype-button .icon svg fill' => 'path: {{VALUE}}',
                ],
                'condition' => [
                    'back_button_icon[value]!' => '',
                ],
            ]
        );
        $this->add_control(
            'bg_icon_color',
            [
                'label' => esc_html__('Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button i' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .flexitype-button .icon' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'back_button_icon[value]!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_icon_gap',
            [
                'label' => esc_html__('Gap','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 30,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button' => 'gap: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'back_button_icon[value]!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_icon_size',
            [
                'label' => esc_html__('Font Size','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 30,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype-button .icon svg' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'back_button_icon[value]!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_icon_position',
            [
                'label' => esc_html__('Vertical Position','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -10,
                        'max' => 10,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button i' => 'top: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype-button .icon' => 'top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'back_button_icon[value]!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_icon_rotate',
            [
                'label' => esc_html__('Rotate','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -180,
						'max' => 180,
						'step' => 1,
					],
				],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button i' => 'transform: rotate({{SIZE}}deg);',
                    '{{WRAPPER}} .flexitype-button .icon svg' => 'transform: rotate({{SIZE}}deg);',
                ],
                'condition' => [
                    'back_button_icon[value]!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_icon_padding',
            [
                'label' => esc_html__('Padding','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype-button .icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'back_button_icon[value]!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_icon_radius',
            [
                'label' => esc_html__('Border Radius','flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .flexitype-button .icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'back_button_icon[value]!' => '',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'hover_icon',
            [
                'label' => esc_html__('Hover','flexitype-lite'),
            ]
        );
        $this->add_control(
            'hover_btn_color',
            [
                'label' => esc_html__('Text Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .icon__box-item:hover .flexitype-button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'hover_bg_color',
            [
                'label' => esc_html__('Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'hover_btn_shadow',
                'selector' => '{{WRAPPER}} .flexitype-button:hover',
            ]
        );
        $this->add_control(
            'hover_border_color',
            [
                'label' => esc_html__('Border Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button:hover' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'btn_border_type!' => '',
                ],
            ]
        );
        $this->add_control(
			'btn_transition',
			[
				'label' => esc_html__( 'Transition Duration','flexitype-lite' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 's', 'ms', 'custom' ],
				'default' => [
					'unit' => 's',
					'size' => 0.3,
				],
				'selectors' => [
					'{{WRAPPER}} .flexitype-button' => 'transition: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .flexitype-button i' => 'transition: {{SIZE}}{{UNIT}}',
				],
			]
		);
		$this->add_control(
			'hover_btn_icon_text',
			[
				'label' => esc_html__( 'Icon Style','flexitype-lite' ),
				'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'back_button_icon[value]!' => '',
                ],
			]
		);
        $this->add_control(
            'hover_btn_icon_color',
            [
                'label' => esc_html__('Color','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button:hover i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .flexitype-button:hover .icon svg path' => 'fill: {{VALUE}}',
                ],
                'condition' => [
                    'back_button_icon[value]!' => '',
                ],
            ]
        );
        $this->add_control(
            'hover_bg_icon_color',
            [
                'label' => esc_html__('Background','flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button:hover i' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .flexitype-button:hover .icon' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'back_button_icon[value]!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'hover_btn_icon_rotate',
            [
                'label' => esc_html__('Rotate','flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -180,
						'max' => 180,
						'step' => 1,
					],
				],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-button:hover i' => 'transform: rotate({{SIZE}}deg);',
                    '{{WRAPPER}} .flexitype-button:hover .icon svg' => 'transform: rotate({{SIZE}}deg);',
                ],
                'condition' => [
                    'back_button_icon[value]!' => '',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        
        if (!empty($settings['back_title_link']['url'])) {
            $this->add_link_attributes('back_title_link', $settings['back_title_link']);
        }

        if (!empty($settings['back_box_btn_link']['url'])) {
            $this->add_link_attributes('back_box_btn_link', $settings['back_box_btn_link']);
        }
        
        ?>
        <div class="flip_box_container <?php echo esc_attr($settings['flip_box_type']); ?> <?php echo esc_attr($settings['flip_box_3d']); ?>">            
            <div class="flip_box_card">
                <div class="icon__box-item front custom_badge">
                    <div class="content">
                    <?php if ('yes' === $settings['badge_control_switch']): ?>
                        <div>
                            <span class="box_badge"><?php echo esc_html($settings['badge_control_title']); ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($settings['box_icon']['value'])): ?>
                        <div class="icon__box-item-icon">
                            <?php \Elementor\Icons_Manager::render_icon($settings['box_icon'], ['aria-hidden' => 'true']); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($settings['box_image'])): ?>
                        <div class="icon__box-item-image">
                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'box_image' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($settings['select_template']) || ($settings['content_type'] === 'template')) {
                        echo Plugin::$instance->frontend->get_builder_content($settings['select_template'], true); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                    } else { ?>
                        <div class="icon__box-item-content">
                            <div class="title">
                                <?php if (!empty($settings['box_title'])): ?>
                                    <h4><?php echo flexitype_lite_allow_html($settings['box_title']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h4>
                                <?php endif; ?>
                                <?php if (!empty($settings['box_description'])): ?>
                                    <?php echo wp_kses_post(wpautop($settings['box_description'])); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php }
                    ?>
                    </div>
                </div>
                <div class="icon__box-item back custom_badge">
                    <div class="content">
                    <?php if ('yes' === $settings['back_badge_control_switch']): ?>
                        <div>
                            <span class="box_badge"><?php echo esc_html($settings['back_badge_control_title']); ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($settings['back_box_icon']['value'])): ?>
                        <div class="icon__box-item-icon">
                            <?php \Elementor\Icons_Manager::render_icon($settings['back_box_icon'], ['aria-hidden' => 'true']); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($settings['back_box_image'])): ?>
                        <div class="icon__box-item-image">
                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'back_box_image' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($settings['back_select_template']) || ($settings['back_content_type'] === 'template')) {
                        echo Plugin::$instance->frontend->get_builder_content($settings['back_select_template'], true); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                    } else { ?>
                        <div class="icon__box-item-content">
                            <div class="title">
                                <?php if (!empty($settings['back_box_title'])): ?>
                                    <h4>
                                        <?php if (!empty($settings['back_title_link']['url'])) { ?>
                                            <a <?php echo $this->get_render_attribute_string('back_title_link'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
                                                <?php echo flexitype_lite_allow_html($settings['back_box_title']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                            </a>
                                        <?php } else {
                                        echo flexitype_lite_allow_html($settings['back_box_title']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                        } ?>
                                    </h4>
                                <?php endif; ?>
                                <?php if (!empty($settings['back_box_description'])): ?>
                                    <?php echo wp_kses_post(wpautop($settings['back_box_description'])); ?>
                                <?php endif; ?>
                            </div>
                            <?php if ('yes' === $settings['back_box_btn_active']): ?>
                            <div>
                                <a class="flexitype-button <?php echo esc_attr( $settings['back_icon_align'] ); ?>" <?php echo $this->get_render_attribute_string('back_box_btn_link'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
                                    <?php echo esc_html($settings['back_box_btn']); ?>
                                    <?php if (!empty($settings['back_button_icon']['value'])):?>
                                        <span class="icon">
                                            <?php \Elementor\Icons_Manager::render_icon($settings['back_button_icon'], ['aria-hidden' => 'true']); ?>
                                        </span>
                                    <?php endif;?>
                                </a>
                            </div>
                            <?php endif; ?>
                        </div>
                    <?php }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register(new FlexiType_FlipBox);