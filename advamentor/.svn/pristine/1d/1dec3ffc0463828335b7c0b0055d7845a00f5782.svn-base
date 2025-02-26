<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Advanced_Testimonial_Carousel_Widget extends Widget_Base {

    public function get_name() {
        return 'advanced-testimonial-carousel';
    }

    public function get_title() {
        return 'Advanced Testimonial Carousel';
    }

    public function get_icon() {
        return 'eicon-testimonial-carousel';
    }

    public function get_categories() {
        return [ 'advamentor' ];
    }

    // Registering Controls
    protected function _register_controls() {

        // Registering Advanced Testimonial Carousel Global Content Settings Controls
        $this->start_controls_section('advanced_testimonial_carousel_global_content_settings_controls',
            [
                'label'             => __( 'Testimonials', 'advamentor' ),
                'tab'               => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        // Registering Repeater Advanced Testimonial Carousel Global Testimonial Author Control
        $repeater->add_control('advanced_testimonial_carousel_global_testimonial_author_control', [
                'label' => __( 'Testimonial Author Name', 'advamentor' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'List Title' , 'advamentor' ),
                'label_block' => true,
            ]
        );

        // Registering Repeater Advanced Testimonial Carousel Global Testimonial Author Designation Control
        $repeater->add_control('advanced_testimonial_carousel_global_testimonial_author_designation_control', [
                'label' => __( 'Testimonial Author Name', 'advamentor' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'List Title' , 'advamentor' ),
                'label_block' => true,
            ]
        );

        // Registering Repeater Advanced Testimonial Carousel Global Testimonial Author Thumbnail Control
        $repeater->add_control('advanced_testimonial_carousel_global_testimonial_author_thumbnail_control',
            [
                'label' => __( 'Testimonial Author Image', 'advamentor' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // Registering Repeater Advanced Testimonial Carousel Global Testimonial Content Control
        $repeater->add_control('advanced_testimonial_carousel_global_testimonial_content_control', [
                'label' => __( 'Testimonial Content', 'advamentor' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'List Content' , 'advamentor' ),
                'show_label' => false,
            ]
        );

        // Registering Advanced Testimonial Carousel Global Testimonial Author Thumbnail Control
        $this->add_control('advanced_testimonial_carousel_global_testimonial_repeater_control',
            [
                'label' => __( 'List of Testimonials', 'advamentor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'advanced_testimonial_carousel_global_testimonial_author_control' => __( 'Person Name One', 'advamentor' ),
                        'advanced_testimonial_carousel_global_testimonial_content_control' => __( 'Advamentor is the best WordPress plugin for Elementor. It has beautifully designed elements and all of them work absolutely fine.', 'advamentor' ),
                        'advanced_testimonial_carousel_global_testimonial_author_designation_control' => __( 'CEO, The Large Company', 'advamentor' )
                    ],
                    [
                        'advanced_testimonial_carousel_global_testimonial_author_control' => __( 'Person Name Two', 'advamentor' ),
                        'advanced_testimonial_carousel_global_testimonial_content_control' => __( 'Advamentor is the best WordPress plugin for Elementor. It has beautifully designed elements and all of them work absolutely fine.', 'advamentor' ),
                        'advanced_testimonial_carousel_global_testimonial_author_designation_control' => __( 'CEO, The Large Company', 'advamentor' )
                    ],
                    [
                        'advanced_testimonial_carousel_global_testimonial_author_control' => __( 'Person Name Three', 'advamentor' ),
                        'advanced_testimonial_carousel_global_testimonial_content_control' => __( 'Advamentor is the best WordPress plugin for Elementor. It has beautifully designed elements and all of them work absolutely fine.', 'advamentor' ),
                        'advanced_testimonial_carousel_global_testimonial_author_designation_control' => __( 'CEO, The Large Company', 'advamentor' )
                    ],
                ],
                'title_field' => '{{{ advanced_testimonial_carousel_global_testimonial_author_control }}}',
            ]
        );

        $this->end_controls_section();

        // Registering Advanced Testimonial Carousel Box Solid Message Controls
        $this->start_controls_section('advanced_testimonial_carousel_boxsolid_message_controls',
            [
                'label'             => __( 'Message Settings', 'advamentor' ),
                'tab'               => Controls_Manager::TAB_CONTENT,
                'condition'         => [
                        'advanced_testimonial_carousel_global_preset_control' => 'boxsolid'
                ]
            ]
        );

        // Registering Advanced Testimonial Carousel Box Solid Message Title Control
        $this->add_control('advanced_testimonial_carousel_boxsolid_message_title_control',
            [
                'label'             => __( 'Message Title', 'advamentor' ),
                'type'              => Controls_Manager::TEXT,
                'default'           => __( 'Show! Your most awesome message title here.', 'advamentor' )
            ]
        );

        // Registering Advanced Testimonial Carousel Box Solid Message Content Control
        $this->add_control('advanced_testimonial_carousel_boxsolid_message_content_control',
            [
                'label'             => __( 'Message Content', 'advamentor' ),
                'type'              => Controls_Manager::TEXTAREA,
                'rows'              => 8,
                'default'           => __( 'The Donner Party was a group of American pioneers who set out for California in a wagon train. Delayed by a series of mishaps, they were snowbound in the Sierra Nevada mountain range from November 1846 to February 1847.', 'advamentor' ),
            ]
        );

        // Registering Advanced Testimonial Carousel Box Solid Message Button Text Control
        $this->add_control('advanced_testimonial_carousel_boxsolid_message_button_text_control',
            [
                'label'             => __( 'Button Text', 'advamentor' ),
                'type'              => Controls_Manager::TEXT,
                'default'           => __( 'See More', 'advamentor' )
            ]
        );

        // Registering Advanced Testimonial Carousel Box Solid Message Button URL Control
        $this->add_control('advanced_testimonial_carousel_boxsolid_message_button_url_control',
            [
                'label'             => __( 'Button Link', 'advamentor' ),
                'type'              => Controls_Manager::URL,
                'placeholder'       => __( 'http://advamentor.com', 'advamentor' ),
                'show_external'     => true,
                'default'           => [
                    'url'           => 'http://advamentor.com',
                    'is_external'   => true,
                    'nofollow'      => false,
                ],
            ]
        );

        $this->end_controls_section();

        // Registering Advanced Testimonial Carousel Celebration Image Controls
        $this->start_controls_section('advanced_testimonial_carousel_celebration_image_controls',
            [
                'label'             => __( 'Celebration Image', 'advamentor' ),
                'tab'               => Controls_Manager::TAB_CONTENT,
                'condition'         => [
                    'advanced_testimonial_carousel_global_preset_control' => 'celebration'
                ]
            ]
        );

        // Registering Advanced Testimonial Carousel Celebration Image Picker Control
        $this->add_control('advanced_testimonial_carousel_celebration_image_picker_control',
            [
                'label'             => __( 'Choose Image', 'advamentor' ),
                'type'              => Controls_Manager::MEDIA,
                'default'           => [
                    'url'           => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        // Registering Advanced Testimonial Carousel Global Slider Title Controls
        $this->start_controls_section('advanced_testimonial_carousel_global_title_controls',
            [
                'label'             => __( 'Title Settings', 'advamentor' ),
                'tab'               => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Registering Advanced Testimonial Carousel Global Slider Title Switcher Control
        $this->add_control('advanced_testimonial_carousel_global_title_switcher_controls',
            [
                'label'             => __( 'Show Title', 'advamentor' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => __( 'Show', 'advamentor' ),
                'label_off'         => __( 'Hide', 'advamentor' ),
                'return_value'      => 'yes',
                'default'           => 'yes',
            ]
        );

        // Registering Advanced Testimonial Carousel Global Slider Title Control
        $this->add_control('advanced_testimonial_carousel_global_title_control',
            [
                'label'             => __( 'Title Text', 'advamentor' ),
                'type'              => Controls_Manager::TEXT,
                'placeholder'       => __( 'Type your title here', 'advamentor' ),
                'default'           => __( 'Advamentor Advanced Testimonial Carousel', 'advamentor' ),
                'condition'         => [
                    'advanced_testimonial_carousel_global_title_switcher_controls'      => 'yes'
                ]
            ]
        );

        $this->add_control('advanced_testimonial_carousel_global_title_alignment_control',
            [
                'label'             => __( 'Title Alignment', 'advamentor' ),
                'type'              => Controls_Manager::CHOOSE,
                'options'           => [
                    'left'          => [
                        'title'     => __( 'Left', 'advamentor' ),
                        'icon'      => 'fa fa-align-left',
                    ],
                    'center'        => [
                        'title'     => __( 'Center', 'advamentor' ),
                        'icon'      => 'fa fa-align-center',
                    ],
                    'right'         => [
                        'title'     => __( 'Right', 'advamentor' ),
                        'icon'      => 'fa fa-align-right',
                    ],
                ],
                'default'           => 'center',
                'toggle'            => true,
                'condition'         => [
                    'advanced_testimonial_carousel_global_title_switcher_controls'      => 'yes'
                ]
            ]
        );

        // Registering Advanced Testimonial Carousel Global Slider Title Typography Control
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'              => 'advanced_testimonial_carousel_global_title_typography_control',
                'label'             => __( 'Typography', 'advamentor' ),
                'scheme'            => Scheme_Typography::TYPOGRAPHY_1,
                'selector'          => '{{WRAPPER}} .aais-title',
                'condition'         => [
                    'advanced_testimonial_carousel_global_title_switcher_controls'      => 'yes'
                ]
            ]
        );

        $this->end_controls_section();

        // Registering Advanced Testimonial Carousel Global Parameter Controls
        $this->start_controls_section('advanced_testimonial_carousel_global_parameter_controls',
            [
                'label'             => __( 'Slider Options', 'advamentor' ),
                'tab'               => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Registering Advanced Testimonial Carousel Global Accessibility Control
        $this->add_control('advanced_testimonial_carousel_global_accessibility_control',
            [
                'label'             => __( 'Accessibility', 'advamentor' ),
                'description'       => __( 'Enables tabbing and arrow key navigation', 'advamentor' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => __( 'Yes', 'advamentor' ),
                'label_off'         => __( 'No', 'advamentor' ),
                'return_value'      => 'true',
                'default'           => 'true',
            ]
        );

        // Registering Advanced Testimonial Carousel Global Adaptive Height Control
        $this->add_control('advanced_testimonial_carousel_global_adaptive_height_control',
            [
                'label'             => __( 'Adaptive Height', 'advamentor' ),
                'description'       => __( 'Enables adaptive height for single slide horizontal carousels', 'advamentor' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => __( 'Yes', 'advamentor' ),
                'label_off'         => __( 'No', 'advamentor' ),
                'return_value'      => 'true'
            ]
        );

        // Registering Advanced Testimonial Carousel Global Autoplay Control
        $this->add_control('advanced_testimonial_carousel_global_autoplay_control',
            [
                'label'             => __( 'Autoplay', 'advamentor' ),
                'description'       => __( 'Enables Autoplay', 'advamentor' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => __( 'Yes', 'advamentor' ),
                'label_off'         => __( 'No', 'advamentor' ),
                'return_value'      => 'true'
            ]
        );

        // Registering Advanced Testimonial Carousel Global Autoplay Speed Control
        $this->add_control('advanced_testimonial_carousel_global_autoplay_speed_control',
            [
                'label'             => __( 'Autoplay Speed', 'advamentor' ),
                'description'       => __( 'Autoplay Speed in milliseconds', 'advamentor' ),
                'type'              => Controls_Manager::NUMBER,
                'step'              => 2,
                'default'           => 3000
            ]
        );

        // Registering Advanced Testimonial Carousel Global CSS Ease Control
        $this->add_control('advanced_testimonial_carousel_global_css_ease_control',
            [
                'label'             => __( 'cssEase', 'advamentor' ),
                'description'       => __( 'CSS3 Animation Easing', 'advamentor' ),
                'type'              => Controls_Manager::SELECT,
                'default'           => 'solid',
                'options'           => [
                    'ease'          => __( 'Ease', 'advamentor' ),
                    'linear'        => __( 'Linear', 'advamentor' ),
                    'ease-in'       => __( 'Ease-In', 'advamentor' ),
                    'ease-out'      => __( 'Ease-Out', 'advamentor' ),
                    'ease-in-out'   => __( 'Ease-In-Out', 'advamentor' ),
                ],
                'default'           => 'ease'
            ]
        );

        // Registering Advanced Testimonial Carousel Global Draggable Control
        $this->add_control('advanced_testimonial_carousel_global_draggable_control',
            [
                'label'             => __( 'Draggable', 'advamentor' ),
                'description'       => __( 'Enable mouse dragging', 'advamentor' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => __( 'Yes', 'advamentor' ),
                'label_off'         => __( 'No', 'advamentor' ),
                'return_value'      => 'true',
                'default'           => 'true'
            ]
        );

        // Registering Advanced Testimonial Carousel Global Fade Control
        $this->add_control('advanced_testimonial_carousel_global_fade_control',
            [
                'label'             => __( 'Fade', 'advamentor' ),
                'description'       => __( 'Enable Fade', 'advamentor' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => __( 'Yes', 'advamentor' ),
                'label_off'         => __( 'No', 'advamentor' ),
                'return_value'      => 'true',
            ]
        );

        // Registering Advanced Testimonial Carousel Global Focus On Select Control
        $this->add_control('advanced_testimonial_carousel_global_focus_on_select_control',
            [
                'label'             => __( 'Focus on Select', 'advamentor' ),
                'description'       => __( 'Enable focus on selected element (click)', 'advamentor' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => __( 'Yes', 'advamentor' ),
                'label_off'         => __( 'No', 'advamentor' ),
                'return_value'      => 'true',
                'default'           => 'true'
            ]
        );

        // Registering Advanced Testimonial Carousel Global Easing Control
        $this->add_control('advanced_testimonial_carousel_global_easing_control',
            [
                'label'             => __( 'Easing', 'advamentor' ),
                'description'       => __( 'Add easing for jQuery animate', 'advamentor' ),
                'type'              => Controls_Manager::SELECT,
                'default'           => 'solid',
                'options'           => [
                    'ease'          => __( 'Ease', 'advamentor' ),
                    'linear'        => __( 'Linear', 'advamentor' ),
                    'ease-in'       => __( 'Ease-In', 'advamentor' ),
                    'ease-out'      => __( 'Ease-Out', 'advamentor' ),
                    'ease-in-out'   => __( 'Ease-In-Out', 'advamentor' ),
                ],
                'default'           => 'ease'
            ]
        );

        // Registering Advanced Testimonial Carousel Global Edge Friction Control
        $this->add_control('advanced_testimonial_carousel_global_edge_friction_control',
            [
                'label'             => __( 'Edge Friction', 'advamentor' ),
                'description'       => __( 'Resistance when swiping edges of non-infinite carousels', 'advamentor' ),
                'type'              => Controls_Manager::NUMBER,
                'min'               => 0,
                'max'               => 100,
                'default'           => 0.15,
            ]
        );

        // Registering Advanced Testimonial Carousel Global Infinite Control
        $this->add_control('advanced_testimonial_carousel_global_infinite_control',
            [
                'label'             => __( 'Infinite', 'advamentor' ),
                'description'       => __( 'Infinite loop sliding', 'advamentor' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => __( 'Yes', 'advamentor' ),
                'label_off'         => __( 'No', 'advamentor' ),
                'return_value'      => 'true',
                'default'           => 'true'
            ]
        );

        // Registering Advanced Testimonial Carousel Global Initial Slide Control
        $this->add_control('advanced_testimonial_carousel_global_initial_slide_control',
            [
                'label'             => __( 'Initial Slide', 'advamentor' ),
                'description'       => __( 'Slide to start on', 'advamentor' ),
                'type'              => Controls_Manager::NUMBER,
                'min'               => 0,
                'max'               => 1000,
                'default'           => 0,
            ]
        );

        // Registering Advanced Testimonial Carousel Global LazyLoad Control
        $this->add_control('advanced_testimonial_carousel_global_lazyload_control',
            [
                'label'             => __( 'Lazyload', 'advamentor' ),
                'description'       => __( 'Set lazy loading technique', 'advamentor' ),
                'type'              => Controls_Manager::SELECT,
                'default'           => 'solid',
                'options'           => [
                    'ondemand'      => __( 'On Demand', 'advamentor' ),
                    'progressive'   => __( 'Progressive', 'advamentor' )
                ],
                'default'           => 'ondemand'
            ]
        );

        // Registering Advanced Testimonial Carousel Global Mobile First Control
        $this->add_control('advanced_testimonial_carousel_global_mobilefirst_control',
            [
                'label'             => __( 'Mobile First', 'advamentor' ),
                'description'       => __( 'Responsive settings use mobile first calculation', 'advamentor' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => __( 'Yes', 'advamentor' ),
                'label_off'         => __( 'No', 'advamentor' ),
                'return_value'      => 'true'
            ]
        );

        // Registering Advanced Testimonial Carousel Global Pause on Focus Control
        $this->add_control('advanced_testimonial_carousel_global_pauseonfocus_control',
            [
                'label'             => __( 'Pause on Focus', 'advamentor' ),
                'description'       => __( 'Pause Autoplay On Focus', 'advamentor' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => __( 'Yes', 'advamentor' ),
                'label_off'         => __( 'No', 'advamentor' ),
                'return_value'      => 'true',
                'default'           => 'true'
            ]
        );

        // Registering Advanced Testimonial Carousel Global Pause on Hover Control
        $this->add_control('advanced_testimonial_carousel_global_pauseonhover_control',
            [
                'label'             => __( 'Pause on Hover', 'advamentor' ),
                'description'       => __( 'Pause Autoplay On Hover', 'advamentor' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => __( 'Yes', 'advamentor' ),
                'label_off'         => __( 'No', 'advamentor' ),
                'return_value'      => 'true',
                'default'           => 'true'
            ]
        );

        // Registering Advanced Testimonial Carousel Global Pause on Dots Hover Control
        $this->add_control('advanced_testimonial_carousel_global_pauseondotshover_control',
            [
                'label'             => __( 'Pause on Dots Hover', 'advamentor' ),
                'description'       => __( 'Pause Autoplay On Dots Hover', 'advamentor' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => __( 'Yes', 'advamentor' ),
                'label_off'         => __( 'No', 'advamentor' ),
                'return_value'      => 'true'
            ]
        );

        // Registering Advanced Testimonial Carousel Global Respond To Control
        $this->add_control('advanced_testimonial_carousel_global_respond_to_control',
            [
                'label'             => __( 'Respond To', 'advamentor' ),
                'description'       => __( 'Width that responsive object responds to', 'advamentor' ),
                'type'              => Controls_Manager::SELECT,
                'default'           => 'solid',
                'options'           => [
                    'window'        => __( 'Window', 'advamentor' ),
                    'slider'        => __( 'Slider', 'advamentor' ),
                    'min'           => __( 'Minimum', 'advamentor' )
                ],
                'default'           => 'window'
            ]
        );

        // Registering Advanced Testimonial Carousel Global Rows Control
        $this->add_control('advanced_testimonial_carousel_global_rows_control',
            [
                'label'             => __( 'Rows', 'advamentor' ),
                'description'       => __( 'Setting this to more than 1 initializes grid mode', 'advamentor' ),
                'type'              => Controls_Manager::NUMBER,
                'min'               => 1,
                'max'               => 500,
                'default'           => 1,
            ]
        );

        // Registering Advanced Testimonial Carousel Global Slides To Show Control
        $this->add_control('advanced_testimonial_carousel_global_slides_to_show_control',
            [
                'label'             => __( 'Slides to Show', 'advamentor' ),
                'description'       => __( 'Number of slides to show', 'advamentor' ),
                'type'              => Controls_Manager::NUMBER,
                'min'               => 1,
                'max'               => 6,
                'default'           => 3,
            ]
        );

        // Registering Advanced Testimonial Carousel Global Slides To Scroll Control
        $this->add_control('advanced_testimonial_carousel_global_slides_to_scroll_control',
            [
                'label'             => __( 'Slides to Scroll', 'advamentor' ),
                'description'       => __( 'Number of slides to scroll', 'advamentor' ),
                'type'              => Controls_Manager::NUMBER,
                'min'               => 1,
                'max'               => 500,
                'default'           => 1,
            ]
        );

        // Registering Advanced Testimonial Carousel Global Speed Control
        $this->add_control('advanced_testimonial_carousel_global_speed_control',
            [
                'label'             => __( 'Speed', 'advamentor' ),
                'description'       => __( 'Slide/Fade animation speed in ms', 'advamentor' ),
                'type'              => Controls_Manager::NUMBER,
                'min'               => 1,
                'max'               => 10000,
                'default'           => 300,
            ]
        );

        // Registering Advanced Testimonial Carousel Global Swipe Control
        $this->add_control('advanced_testimonial_carousel_global_swipe_control',
            [
                'label'             => __( 'Swipe', 'advamentor' ),
                'description'       => __( 'Enable Swiping', 'advamentor' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => __( 'Yes', 'advamentor' ),
                'label_off'         => __( 'No', 'advamentor' ),
                'return_value'      => 'true',
                'default'           => 'true'
            ]
        );

        // Registering Advanced Testimonial Carousel Global Swipe to Slide Control
        $this->add_control('advanced_testimonial_carousel_global_swipe_to_slide_control',
            [
                'label'             => __( 'Swipe to Slide', 'advamentor' ),
                'description'       => __( 'Allow users to drag or swipe directly to a slide', 'advamentor' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => __( 'Yes', 'advamentor' ),
                'label_off'         => __( 'No', 'advamentor' ),
                'return_value'      => 'true'
            ]
        );

        // Registering Advanced Testimonial Carousel Global Touch Move Control
        $this->add_control('advanced_testimonial_carousel_global_touch_move_control',
            [
                'label'             => __( 'Touch Move', 'advamentor' ),
                'description'       => __( 'Enable slide motion with touch', 'advamentor' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => __( 'Yes', 'advamentor' ),
                'label_off'         => __( 'No', 'advamentor' ),
                'return_value'      => 'true',
                'default'           => 'true'
            ]
        );

        // Registering Advanced Testimonial Carousel Touch Threshold Control
        $this->add_control('advanced_testimonial_carousel_global_touch_threshold_control',
            [
                'label'             => __( 'Speed', 'advamentor' ),
                'description'       => __( 'Slide/Fade animation speed in ms', 'advamentor' ),
                'type'              => Controls_Manager::NUMBER,
                'min'               => 1,
                'max'               => 100,
                'default'           => 5,
            ]
        );

        // Registering Advanced Testimonial Carousel Global Use CSS Control
        $this->add_control('advanced_testimonial_carousel_global_use_css_control',
            [
                'label'             => __( 'Use CSS', 'advamentor' ),
                'description'       => __( 'Enable/Disable CSS Transitions', 'advamentor' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => __( 'Yes', 'advamentor' ),
                'label_off'         => __( 'No', 'advamentor' ),
                'return_value'      => 'true',
                'default'           => 'true'
            ]
        );

        // Registering Advanced Testimonial Carousel Global Use Transform Control
        $this->add_control('advanced_testimonial_carousel_global_use_transform_control',
            [
                'label'             => __( 'Use Transform', 'advamentor' ),
                'description'       => __( 'Enable/Disable CSS Transforms', 'advamentor' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => __( 'Yes', 'advamentor' ),
                'label_off'         => __( 'No', 'advamentor' ),
                'return_value'      => 'true',
                'default'           => 'true'
            ]
        );

        // Registering Advanced Testimonial Carousel Global Variable Width Control
        $this->add_control('advanced_testimonial_carousel_global_variable_width_control',
            [
                'label'             => __( 'Variable Width', 'advamentor' ),
                'description'       => __( 'Variable width slides', 'advamentor' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => __( 'Yes', 'advamentor' ),
                'label_off'         => __( 'No', 'advamentor' ),
                'return_value'      => 'true'
            ]
        );

        // Registering Advanced Testimonial Carousel Global Vertical Control
        $this->add_control('advanced_testimonial_carousel_global_vertical_control',
            [
                'label'             => __( 'Vertical', 'advamentor' ),
                'description'       => __( 'Vertical slide mode', 'advamentor' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => __( 'Yes', 'advamentor' ),
                'label_off'         => __( 'No', 'advamentor' ),
                'return_value'      => 'true'
            ]
        );

        // Registering Advanced Testimonial Carousel Global Vertical Swiping Control
        $this->add_control('advanced_testimonial_carousel_global_vertical_swiping_control',
            [
                'label'             => __( 'Vertical Swiping', 'advamentor' ),
                'description'       => __( 'Vertical swipe mode', 'advamentor' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => __( 'Yes', 'advamentor' ),
                'label_off'         => __( 'No', 'advamentor' ),
                'return_value'      => 'true'
            ]
        );

        // Registering Advanced Testimonial Carousel Global RTL Control
        $this->add_control('advanced_testimonial_carousel_global_rtl_control',
            [
                'label'             => __( 'Right-to-Left', 'advamentor' ),
                'description'       => __( 'Change the slider\'s direction to become right-to-left', 'advamentor' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => __( 'Yes', 'advamentor' ),
                'label_off'         => __( 'No', 'advamentor' ),
                'return_value'      => 'true'
            ]
        );

        // Registering Advanced Testimonial Carousel Global Wait for Animate Control
        $this->add_control('advanced_testimonial_carousel_global_wait_for_animate_control',
            [
                'label'             => __( 'Wait for Animate', 'advamentor' ),
                'description'       => __( 'Ignores requests to advance the slide while animating', 'advamentor' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => __( 'Yes', 'advamentor' ),
                'label_off'         => __( 'No', 'advamentor' ),
                'return_value'      => 'true',
                'default'           => 'true'
            ]
        );

        // Registering Advanced Testimonial Carousel Global zIndex Control
        $this->add_control('advanced_testimonial_carousel_global_zindex_control',
            [
                'label'             => __( 'zindex Value', 'advamentor' ),
                'description'       => __( 'Resistance when swiping edges of non-infinite carousels', 'advamentor' ),
                'type'              => Controls_Manager::NUMBER,
                'min'               => 0,
                'max'               => 100000,
                'default'           => 1000,
            ]
        );

        $this->end_controls_section();

        // Registering Advanced Testimonial Carousel Global Preset Controls
        $this->start_controls_section('advanced_testimonial_carousel_global_preset_controls',
            [
                'label'             => __( 'Select Design Preset', 'advamentor' ),
                'tab'               => Controls_Manager::TAB_STYLE,
            ]
        );

        // Registering Advanced Testimonial Carousel Global Preset Control
        $this->add_control('advanced_testimonial_carousel_global_preset_control',
            [
                'label'             => __( 'Border Style', 'advamentor' ),
                'type'              => Controls_Manager::SELECT,
                'default'           => 'singledark',
                'options'           => [
                    'singledark'    => __( 'Single Dark', 'advamentor' ),
                    'boxsolid'      => __( 'Box Solid', 'advamentor' ),
                    'celebration'   => __( 'Celebration', 'advamentor' )
                ],
            ]
        );

        $this->end_controls_section();

        // Registering Advanced Testimonial Carousel Global Image Border Controls
        $this->start_controls_section('advanced_testimonial_carousel_global_image_border_controls',
            [
                'label'             => __( 'Image Styling Options', 'advamentor' ),
                'tab'               => Controls_Manager::TAB_STYLE,
            ]
        );

        // Registering Advanced Testimonial Carousel Global Image Width Controls
        $this->add_control('advanced_testimonial_carousel_global_image_width_controls',
            [
                'label' => __( 'Width', 'advamentor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 350,
                ],
                'selectors' => [
                    '{{WRAPPER}} .aais-image img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Registering Advanced Testimonial Carousel Global Image Padding Controls
        $this->add_control('advanced_testimonial_carousel_global_image_padding_controls',
            [
                'label' => __( 'Padding', 'advamentor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .aais-image img' => 'padding: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'advanced_testimonial_carousel_global_image_border_control',
                'label' => __( 'Border', 'advamentor' ),
                'selector' => '{{WRAPPER}} .aais-image',
            ]
        );

        $this->end_controls_section();

        // Registering Advanced Testimonial Carousel Global Styling Controls
        $this->start_controls_section('advanced_testimonial_carousel_global_styling_controls',
            [
                'label'             => __( 'Slider Styling Options', 'advamentor' ),
                'tab'               => Controls_Manager::TAB_STYLE,
            ]
        );

        // Registering Advanced Testimonial Carousel Global Arrows Control
        $this->add_control('advanced_testimonial_carousel_global_arrows_control',
            [
                'label'             => __( 'Arrows', 'advamentor' ),
                'description'       => __( 'Prev/Next Arrows', 'advamentor' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => __( 'Yes', 'advamentor' ),
                'label_off'         => __( 'No', 'advamentor' ),
                'return_value'      => 'true',
                'default'           => 'true'
            ]
        );

        // Registering Advanced Testimonial Carousel Global Center Mode Control
        $this->add_control('advanced_testimonial_carousel_global_center_mode_control',
            [
                'label'             => __( 'Center Mode', 'advamentor' ),
                'description'       => __( 'Enables centered view with partial prev/next slides', 'advamentor' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => __( 'Yes', 'advamentor' ),
                'label_off'         => __( 'No', 'advamentor' ),
                'return_value'      => 'true'
            ]
        );

        // Registering Advanced Testimonial Carousel Global Center Padding Control
        $this->add_control('advanced_testimonial_carousel_global_center_padding_control',
            [
                'label'             => __( 'Center Padding', 'advamentor' ),
                'description'       => __( 'Side padding when in center mode (px or %)', 'advamentor' ),
                'type'              => Controls_Manager::SLIDER,
                'size_units'        => [ 'px', '%' ],
                'range'             => [
                    'px'            => [
                        'min'       => 0,
                        'max'       => 1000,
                        'step'      => 1,
                    ],
                    '%'             => [
                        'min'       => 0,
                        'max'       => 100,
                    ],
                ],
                'default'           => [
                    'unit'          => 'px',
                    'size'          => 50,
                ],
            ]
        );

        // Registering Advanced Testimonial Carousel Global Dots Control
        $this->add_control('advanced_testimonial_carousel_global_dots_control',
            [
                'label'             => __( 'Dots', 'advamentor' ),
                'description'       => __( 'Show dot indicators', 'advamentor' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => __( 'Yes', 'advamentor' ),
                'label_off'         => __( 'No', 'advamentor' ),
                'return_value'      => 'true'
            ]
        );

        // Registering Advanced Testimonial Carousel Global Dots Class Control
        $this->add_control('advanced_testimonial_carousel_global_dots_class_control',
            [
                'label'             => __( 'Dots Class', 'advamentor' ),
                'description'       => __( 'Class for slide indicator dots container', 'advamentor' ),
                'type'              => Controls_Manager::TEXT,
                'default'           => __( 'slick-dots', 'advamentor' )
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings   = $this->get_settings_for_display();
        $elementid  = $this->get_id();

        echo '<div class="advamentor-advanced-testimonial-carousel">';
        echo '<h3 class="aais-title" style="text-align: ' . $settings['advanced_testimonial_carousel_global_title_alignment_control'] . '">' . $settings['advanced_testimonial_carousel_global_title_control'] . '</h3>';
        echo '<div class="advanced-testimonial-carousel-' . $elementid . '">';

        if ( $settings['advanced_testimonial_carousel_global_testimonial_repeater_control'] ) {

            if ($settings['advanced_testimonial_carousel_global_preset_control'] == 'singledark') {

                foreach ($settings['advanced_testimonial_carousel_global_testimonial_repeater_control'] as $testimonial) {
                    echo '<div class="aatc-single-dark">
                        <div class="row">
                            <div class="col"></div>
                            <div class="col-10">
                                <p class="testimonial-content">' . $testimonial['advanced_testimonial_carousel_global_testimonial_content_control'] . '</p>
                            </div>
                            <div class="col"></div>
                        </div>
                        <div class="row">
                            <div class="col"></div>
                                <div class="col-2 text-right">
                                    <img src="' . $testimonial['advanced_testimonial_carousel_global_testimonial_author_thumbnail_control']['url'] . '" />
                                </div>
                            <div class="col-4">
                                <p class="testimonial-person">' . $testimonial['advanced_testimonial_carousel_global_testimonial_author_control'] . '</p>
                                <p class="testimonial-designation">' . $testimonial['advanced_testimonial_carousel_global_testimonial_author_designation_control'] . '</p>                     
                            </div>
                            <div class="col"></div>
                        </div>
                    </div>';
                }

            } elseif ($settings['advanced_testimonial_carousel_global_preset_control'] == 'boxsolid') {

                foreach ($settings['advanced_testimonial_carousel_global_testimonial_repeater_control'] as $testimonial) {
                    echo '<div class="aatc-box-solid">
                            <div class="row">
                                <div class="col-8">
                                    <div class="aatc-message-box">
                                        <h3 class="testimonial-title">' . $settings['advanced_testimonial_carousel_boxsolid_message_title_control'] . '</h3>
                                        <p class="testimonial-message">' . $settings['advanced_testimonial_carousel_boxsolid_message_content_control'] . '</p>
                                        <a class="button" href="' . $settings['advanced_testimonial_carousel_boxsolid_message_button_url_control']['url'] . '">' . $settings['advanced_testimonial_carousel_boxsolid_message_button_text_control'] . '</a>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="aatc-testimonial-box">
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="testimonial-text">' . $testimonial['advanced_testimonial_carousel_global_testimonial_content_control'] . '</p>
                                            </div>
                                        </div>
                                        <div class="row testimonial-author">
                                        <div class="col-4"><img src="' . $testimonial['advanced_testimonial_carousel_global_testimonial_author_thumbnail_control'][url] . '" /></div>
                                        <div class="col-8">
                                            <p class="testimonial-author-name">' . $testimonial['advanced_testimonial_carousel_global_testimonial_author_control'] . '</p>
                                            <p class="testimonial-author-designation">' . $testimonial['advanced_testimonial_carousel_global_testimonial_author_designation_control'] . '</p>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }

            } elseif ($settings['advanced_testimonial_carousel_global_preset_control'] == 'celebration') {

                foreach ($settings['advanced_testimonial_carousel_global_testimonial_repeater_control'] as $testimonial) {
                    echo '<div class="aatc-celebration">
                            <div class="row">
                                <div class="col-6 celebration-image">
                                    <img src="' . $settings['advanced_testimonial_carousel_celebration_image_picker_control']['url'] . '" />
                                </div>
                                <div class="col-6 testimonial-area">
                                    <div class="row">
                                        <div class="col-12">
                                           <p class="testimonial-content">' . $testimonial['advanced_testimonial_carousel_global_testimonial_content_control'] . '</p>
                                        </div>
                                        <div class="col-2 testimonial-author-thumbnail">
                                            <img src="' . $testimonial['advanced_testimonial_carousel_global_testimonial_author_thumbnail_control']['url'] . '" />
                                        </div>
                                        <div class="col-6">
                                            <p class="testimonial-person">' . $testimonial['advanced_testimonial_carousel_global_testimonial_author_control'] . '</p>
                                            <p class="testimonial-designation">' . $testimonial['advanced_testimonial_carousel_global_testimonial_author_designation_control'] . '</p>
                                        </div>
                                        <div class="col-4 text-right celebration-quote">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }

            }

        }

        echo '</div>';
        echo '</div>';

        ?>

        <script type="application/javascript">

            (function($) {

                $(document).ready(function(){
                    $('.advanced-testimonial-carousel-<?php echo $elementid; ?>').slick({
                        adaptiveHeight: <?php echo ( $settings['advanced_testimonial_carousel_global_adaptive_height_control'] == true ) ? 'true' : 'false' ?>,
                        accessibility: <?php echo ( $settings['advanced_testimonial_carousel_global_accessibility_control'] == true ) ? 'true' : 'false' ?>,
                        autoplay: <?php echo ( $settings['advanced_testimonial_carousel_global_autoplay_control'] == true ) ? 'true' : 'false' ?>,
                        autoplaySpeed: <?php echo $settings['advanced_testimonial_carousel_global_autoplay_speed_control'] ?>,
                        arrows: <?php echo ( $settings['advanced_testimonial_carousel_global_arrows_control'] == true ) ? 'true' : 'false' ?>,
                        centerMode: <?php echo ( $settings['advanced_testimonial_carousel_global_center_mode_control'] == true ) ? 'true' : 'false' ?>,
                        centerPadding: '<?php echo $settings['advanced_testimonial_carousel_global_center_padding_control']['size'] . $settings['advanced_testimonial_carousel_global_center_padding_control']['unit'] ?>',
                        cssEase: '<?php echo $settings['advanced_testimonial_carousel_global_css_ease_control'] ?>',
                        dots: <?php echo ( $settings['advanced_testimonial_carousel_global_dots_control'] == true ) ? 'true' : 'false' ?>,
                        dotsClass: '<?php echo $settings['advanced_testimonial_carousel_global_dots_class_control'] ?>',
                        draggable: <?php echo ( $settings['advanced_testimonial_carousel_global_draggable_control'] == true ) ? 'true' : 'false' ?>,
                        fade: <?php echo ( $settings['advanced_testimonial_carousel_global_fade_control'] == true ) ? 'true' : 'false' ?>,
                        focusOnSelect: <?php echo ( $settings['advanced_testimonial_carousel_global_focus_on_select_control'] == true ) ? 'true' : 'false' ?>,
                        easing: '<?php echo $settings['advanced_testimonial_carousel_global_easing_control'] ?>',
                        edgeFriction: <?php echo $settings['advanced_testimonial_carousel_global_edge_friction_control'] ?>,
                        infinite: <?php echo ( $settings['advanced_testimonial_carousel_global_infinite_control'] == true ) ? 'true' : 'false' ?>,
                        initialSlide: <?php echo $settings['advanced_testimonial_carousel_global_initial_slide_control'] ?>,
                        lazyLoad: <?php echo ( $settings['advanced_testimonial_carousel_global_lazyload_control'] == true ) ? 'true' : 'false' ?>,
                        mobileFirst: <?php echo ( $settings['advanced_testimonial_carousel_global_mobilefirst_control'] == true ) ? 'true' : 'false' ?>,
                        pauseOnFocus: <?php echo ( $settings['advanced_testimonial_carousel_global_pauseonfocus_control'] == true ) ? 'true' : 'false' ?>,
                        pauseOnHover: <?php echo ( $settings['advanced_testimonial_carousel_global_pauseonhover_control'] == true ) ? 'true' : 'false' ?>,
                        pauseOnDotsHover: <?php echo ( $settings['advanced_testimonial_carousel_global_pauseondotshover_control'] == true ) ? 'true' : 'false' ?>,
                        respondTo: '<?php echo $settings['advanced_testimonial_carousel_global_respond_to_control'] ?>',
                        rows: <?php echo $settings['advanced_testimonial_carousel_global_rows_control'] ?>,
                        slidesPerRow: 1,
                        //slidesToShow: <?php //echo $settings['advanced_testimonial_carousel_global_slides_to_show_control'] ?>//,
                        slidesToShow: 1,
                        slidesToScroll: <?php echo $settings['advanced_testimonial_carousel_global_slides_to_scroll_control'] ?>,
                        speed: <?php echo $settings['advanced_testimonial_carousel_global_speed_control'] ?>,
                        swipe: <?php echo ( $settings['advanced_testimonial_carousel_global_swipe_control'] == true ) ? 'true' : 'false' ?>,
                        swipeToSlide: <?php echo ( $settings['advanced_testimonial_carousel_global_swipe_to_slide_control'] == true ) ? 'true' : 'false' ?>,
                        touchMove: <?php echo ( $settings['advanced_testimonial_carousel_global_touch_move_control'] == true ) ? 'true' : 'false' ?>,
                        touchThreshold: <?php echo $settings['advanced_testimonial_carousel_global_touch_threshold_control'] ?>,
                        useCSS: <?php echo ( $settings['advanced_testimonial_carousel_global_use_css_control'] == true ) ? 'true' : 'false' ?>,
                        useTransform: <?php echo ( $settings['advanced_testimonial_carousel_global_use_transform_control'] == true ) ? 'true' : 'false' ?>,
                        variableWidth: <?php echo ( $settings['advanced_testimonial_carousel_global_variable_width_control'] == true ) ? 'true' : 'false' ?>,
                        vertical: <?php echo ( $settings['advanced_testimonial_carousel_global_vertical_control'] == true ) ? 'true' : 'false' ?>,
                        verticalSwiping: <?php echo ( $settings['advanced_testimonial_carousel_global_vertical_swiping_control'] == true ) ? 'true' : 'false' ?>,
                        rtl: <?php echo ( $settings['advanced_testimonial_carousel_global_rtl_control'] == true ) ? 'true' : 'false' ?>,
                        waitForAnimate: <?php echo ( $settings['advanced_testimonial_carousel_global_wait_for_animate_control'] == true ) ? 'true' : 'false' ?>,
                        zIndex: <?php echo $settings['advanced_testimonial_carousel_global_zindex_control'] ?>
                    });
                });

            })( jQuery );

        </script>

        <?php

    }

}