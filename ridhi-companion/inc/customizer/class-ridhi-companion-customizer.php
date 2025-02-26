<?php
/**
 * Customizer option class
 * 
 * @package Ridhi_Companion
 */
class Ridhi_Companion_Customizer{

    private $defaults;

    public function execute(){
        $this->defaults = new Ridhi_Companion_Dummy_Array();
        //Customize Register
        add_action( 'customize_register', array( $this, 'register_custom_controls' ) );
        add_action( 'customize_register', array( $this, 'customize_register_front_page' ) );
        add_action( 'customize_register', array( $this, 'customize_register_general_settings' ) );
        //Enqueue Customizer control scripts
        add_action( 'customize_controls_enqueue_scripts', array( $this, 'customizer_control_scripts' ) );
    }

    public function customize_register_front_page( $wp_customize ){
        
        /** About Section */
        $wp_customize->add_section( 
            'about_section', 
            array(
                'title'    => __( 'About Section', 'ridhi-companion' ),
                'priority' => 20,
                'panel'    => 'frontpage_settings',
            )
        );

        /** Enable About Section */
        $wp_customize->add_setting(
            'ed_home_about_section',
            array(
                'default'           => true,
                'sanitize_callback' => array( 'Ridhi_Companion_Sanitization', 'sanitize_checkbox' ),
            )
        );

        $wp_customize->add_control(
            new Ridhi_Companion_Toggle_Control(
                $wp_customize,
                'ed_home_about_section',
                array(
                    'label'       => __( 'Enable About Section', 'ridhi-companion' ),
                    'description' => __( 'Enable to show about section.', 'ridhi-companion' ),
                    'section'     => 'about_section',
                )            
            )
        );

        /** Section Title */
        $wp_customize->add_setting(
            'home_about_title',
            array(
                'default'           => __( 'Hi! I\'m Samantha Walters', 'ridhi-companion' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
            )
        );
        
        $wp_customize->add_control(
            'home_about_title',
            array(
                'label'       => __( 'Section Title', 'ridhi-companion' ),
                'description' => __( 'Add Title for this section.', 'ridhi-companion' ),
                'section'     => 'about_section',
                'type'        => 'text',
            )
        );

        $wp_customize->selective_refresh->add_partial( 
            'home_about_title', 
            array(
                'selector'        => '#home_about_section .section-subtitle',
                'render_callback' => array( 'Ridhi_Companion_Partials', 'home_about_title' ),
            ) 
        );

        /** Section Content */
        $wp_customize->add_setting(
            'home_about_content',
            array(
                'default'           => $this->defaults->default_about_content(),
                'sanitize_callback' => 'wp_kses_post',
                'transport'         => 'postMessage'
            )
        );
        
        $wp_customize->add_control(
            'home_about_content',
            array(
                'label'       => __( 'Section Content', 'ridhi-companion' ),
                'description' => __( 'Add Content for this section.', 'ridhi-companion' ),
                'section'     => 'about_section',
                'type'        => 'textarea',
            )
        );

        $wp_customize->selective_refresh->add_partial( 
            'home_about_content', 
            array(
                'selector'        => '#home_about_section .section-content',
                'render_callback' => array( 'Ridhi_Companion_Partials', 'home_about_content' ),
            ) 
        );

        /** Upload Image */
        $wp_customize->add_setting(
            'home_about_image',
            array(
                'default'           => RIDHI_COMPANION_URL . 'images/about-img.jpg',
                'sanitize_callback' => array( 'Ridhi_Companion_Sanitization', 'sanitize_image' ),
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'home_about_image',
                array(
                    'label'       => __( 'Upload Image', 'ridhi-companion' ),
                    'description' => __( 'Upload image of size 585px X 735px.', 'ridhi-companion' ),
                    'section'     => 'about_section',
                )
            )
        );

        /** Label */
        $wp_customize->add_setting(
            'home_about_label',
            array(
                'default'           => __( 'More About Me', 'ridhi-companion' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
            )
        );
        
        $wp_customize->add_control(
            'home_about_label',
            array(
                'label'       => __( 'Label', 'ridhi-companion' ),
                'description' => __( 'Add Button Label.', 'ridhi-companion' ),
                'section'     => 'about_section',
                'type'        => 'text',
            )
        );

        $wp_customize->selective_refresh->add_partial( 
            'home_about_label', 
            array(
                'selector'        => '#home_about_section .featured_page_content a',
                'render_callback' => array( 'Ridhi_Companion_Partials', 'home_about_label' ),
            ) 
        );
        
        /** Link */
        $wp_customize->add_setting(
            'home_about_link',
            array(
                'default'           => '#',
                'sanitize_callback' => 'esc_url_raw',
            )
        );
        
        $wp_customize->add_control(
            'home_about_link',
            array(
                'label'   => __( 'Link', 'ridhi-companion' ),
                'description'   => __( 'Add Button Link.', 'ridhi-companion' ),
                'section' => 'about_section',
                'type'    => 'text',
            )
        );

        /** Open Link in New Tab */
        $wp_customize->add_setting(
            'ed_home_about_target',
            array(
                'default'           => false,
                'sanitize_callback' => array( 'Ridhi_Companion_Sanitization', 'sanitize_checkbox' ),
            )
        );
        
        $wp_customize->add_control(
            new Ridhi_Companion_Toggle_Control( 
                $wp_customize,
                'ed_home_about_target',
                array(
                    'section' => 'about_section',
                    'label'	  => __( 'Open Link in New Tab', 'ridhi-companion' ),
                )
            )
        );

        /** Service Section */
        $wp_customize->add_section( 
            'service_section', 
            array(
                'title'    => __( 'Service Section', 'ridhi-companion' ),
                'priority' => 30,
                'panel'    => 'frontpage_settings',
            )
        );

        /** Enable Service Section */
        $wp_customize->add_setting(
            'ed_service_section',
            array(
                'default'           => true,
                'sanitize_callback' => array( 'Ridhi_Companion_Sanitization', 'sanitize_checkbox' ),
            )
        );

        $wp_customize->add_control(
            new Ridhi_Companion_Toggle_Control(
                $wp_customize,
                'ed_service_section',
                array(
                    'label'       => __( 'Enable Service Section', 'ridhi-companion' ),
                    'description' => __( 'Enable to show service section.', 'ridhi-companion' ),
                    'section'     => 'service_section',
                )            
            )
        );

        /** Section Title */
        $wp_customize->add_setting(
            'service_title',
            array(
                'default'           => __( 'Services We Offer', 'ridhi-companion' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
            )
        );
        
        $wp_customize->add_control(
            'service_title',
            array(
                'label'       => __( 'Section Title', 'ridhi-companion' ),
                'description' => __( 'Add Title for this section.', 'ridhi-companion' ),
                'section'     => 'service_section',
                'type'        => 'text',
            )
        );

        $wp_customize->selective_refresh->add_partial( 
            'service_title', 
            array(
                'selector'        => '#service_section .widget_text .widget-title',
                'render_callback' => array( 'Ridhi_Companion_Partials', 'service_title' ),
            ) 
        );

        /** Section Content */
        $wp_customize->add_setting(
            'service_content',
            array(
                'default'           => __( 'Our commitment is to provice comprehensive quality care', 'ridhi-companion' ),
                'sanitize_callback' => 'wp_kses_post',
                'transport'         => 'postMessage'
            )
        );
        
        $wp_customize->add_control(
            'service_content',
            array(
                'label'       => __( 'Section Content', 'ridhi-companion' ),
                'description' => __( 'Add Content for this section.', 'ridhi-companion' ),
                'section'     => 'service_section',
                'type'        => 'textarea',
            )
        );

        $wp_customize->selective_refresh->add_partial( 
            'service_content', 
            array(
                'selector'        => '#service_section .widget_text .textwidget',
                'render_callback' => array( 'Ridhi_Companion_Partials', 'service_content' ),
            ) 
        );

        /** Add Services */
        $wp_customize->add_setting( 
            new Ridhi_Companion_Repeater_Setting( 
                $wp_customize, 
                'front_services', 
                array(
                    'default'           => $this->defaults->default_services(),
                    'sanitize_callback' => array( 'Ridhi_Companion_Repeater_Setting', 'sanitize_repeater_setting' ),
                ) 
            ) 
        );
        
        $wp_customize->add_control(
            new Ridhi_Companion_Control_Repeater(
                $wp_customize,
                'front_services',
                array(
                    'section' => 'service_section',
                    'label'   => __( 'Add Services', 'ridhi-companion' ),
                    'fields'  => array(
                        'image' => array(
                            'type'        => 'image',
                            'label'       => __( 'Add Image', 'ridhi-companion' ),
                            'description' => __( 'Upload Image of size 370px X 285px.', 'ridhi-companion' ),
                        ),
                        'title'     => array(
                            'type'  => 'text',
                            'label' => __( 'Title', 'ridhi-companion' ),
                        ),
                        'content'   => array(
                            'type'  => 'textarea',
                            'label' => __( 'Content', 'ridhi-companion' ),
                        ),
                        'link'     => array(
                            'type'  => 'url',
                            'label' => __( 'Link', 'ridhi-companion' ),
                        ),
                    ),
                    'row_label' => array(
                        'type'  => 'field',
                        'value' => __( 'service', 'ridhi-companion' ),
                        'field' => 'title'
                    ),                                      
                )
            )
        );

        /** Label */
        $wp_customize->add_setting(
            'home_service_label',
            array(
                'default'           => __( 'Learn More', 'ridhi-companion' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
            )
        );
        
        $wp_customize->add_control(
            'home_service_label',
            array(
                'label'       => __( 'Label', 'ridhi-companion' ),
                'description' => __( 'Add/Change Label of services.', 'ridhi-companion' ),
                'section'     => 'service_section',
                'type'        => 'text',
            )
        );

        $wp_customize->selective_refresh->add_partial( 
            'home_service_label', 
            array(
                'selector'        => '#service_section .widget_rrtc_icon_text_widget .text-holder .btn-readmore .readmore',
                'render_callback' => array( 'Ridhi_Companion_Partials', 'home_service_label' ),
            ) 
        );

        /** Open Link in New Tab */
        $wp_customize->add_setting(
            'ed_home_service_target',
            array(
                'default'           => false,
                'sanitize_callback' => array( 'Ridhi_Companion_Sanitization', 'sanitize_checkbox' ),
            )
        );
        
        $wp_customize->add_control(
            new Ridhi_Companion_Toggle_Control( 
                $wp_customize,
                'ed_home_service_target',
                array(
                    'section' => 'service_section',
                    'label'	  => __( 'Open Link in New Tab', 'ridhi-companion' ),
                )
            )
        );

        /** Client Section */
        $wp_customize->add_section( 
            'client_section', 
            array(
                'title'    => __( 'Client Section', 'ridhi-companion' ),
                'priority' => 35,
                'panel'    => 'frontpage_settings',
            )
        );

        /** Enable Client Section */
        $wp_customize->add_setting(
            'ed_client_section',
            array(
                'default'           => true,
                'sanitize_callback' => array( 'Ridhi_Companion_Sanitization', 'sanitize_checkbox' ),
            )
        );

        $wp_customize->add_control(
            new Ridhi_Companion_Toggle_Control(
                $wp_customize,
                'ed_client_section',
                array(
                    'label'       => __( 'Enable Client Section', 'ridhi-companion' ),
                    'description' => __( 'Enable to show client section.', 'ridhi-companion' ),
                    'section'     => 'client_section',
                )            
            )
        );

        /** Section Title */
        $wp_customize->add_setting(
            'client_title',
            array(
                'default'           => __( 'As Featured In', 'ridhi-companion' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
            )
        );
        
        $wp_customize->add_control(
            'client_title',
            array(
                'label'       => __( 'Section Title', 'ridhi-companion' ),
                'description' => __( 'Add Title for this section.', 'ridhi-companion' ),
                'section'     => 'client_section',
                'type'        => 'text',
            )
        );

        $wp_customize->selective_refresh->add_partial( 
            'client_title', 
            array(
                'selector'        => '#client_section .widget_raratheme_client_logo_widget .raratheme-client-logo-holder .raratheme-client-logo-inner-holder .widget-title',
                'render_callback' => array( 'Ridhi_Companion_Partials', 'client_title' ),
            ) 
        );

        /** Add Logos */
        $wp_customize->add_setting( 
            new Ridhi_Companion_Repeater_Setting( 
                $wp_customize, 
                'front_clients', 
                array(
                    'default'           => $this->defaults->default_logos(),
                    'sanitize_callback' => array( 'Ridhi_Companion_Repeater_Setting', 'sanitize_repeater_setting' ),
                ) 
            ) 
        );
        
        $wp_customize->add_control(
            new Ridhi_Companion_Control_Repeater(
                $wp_customize,
                'front_clients',
                array(
                    'section' => 'client_section',				
                    'label'	  => __( 'Add Logos', 'ridhi-companion' ),
                    'fields'  => array(
                        'image' => array(
                            'type'  => 'image', 
                            'label' => __( 'Add Image', 'ridhi-companion' ),                
                        ),
                        'link'     => array(
                            'type'  => 'url',
                            'label' => __( 'Link', 'ridhi-companion' ),
                        ),
                    ),
                    'row_label' => array(
                        'type'  => 'field',
                        'value' => __( 'logo', 'ridhi-companion' ),
                        'field' => 'link'
                    ),                                      
                )
            )
        );

        /** Team Section */
        $wp_customize->add_section( 
            'team_section', 
            array(
                'title'    => __( 'Team Section', 'ridhi-companion' ),
                'priority' => 45,
                'panel'    => 'frontpage_settings',
            )
        );

        /** Enable Team Section */
        $wp_customize->add_setting(
            'ed_team_section',
            array(
                'default'           => true,
                'sanitize_callback' => array( 'Ridhi_Companion_Sanitization', 'sanitize_checkbox' ),
            )
        );

        $wp_customize->add_control(
            new Ridhi_Companion_Toggle_Control(
                $wp_customize,
                'ed_team_section',
                array(
                    'label'       => __( 'Enable Team Section', 'ridhi-companion' ),
                    'description' => __( 'Enable to show team section.', 'ridhi-companion' ),
                    'section'     => 'team_section',
                )            
            )
        );

        /** Section Title */
        $wp_customize->add_setting(
            'team_title',
            array(
                'default'           => __( 'Our Team', 'ridhi-companion' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
            )
        );
        
        $wp_customize->add_control(
            'team_title',
            array(
                'label'       => __( 'Section Title', 'ridhi-companion' ),
                'description' => __( 'Add Title for this section.', 'ridhi-companion' ),
                'section'     => 'team_section',
                'type'        => 'text',
            )
        );

        $wp_customize->selective_refresh->add_partial( 
            'team_title', 
            array(
                'selector'        => '#team_section .widget_text .widget-title',
                'render_callback' => array( 'Ridhi_Companion_Partials', 'team_title' ),
            ) 
        );

        /** Section Content */
        $wp_customize->add_setting(
            'team_content',
            array(
                'default'           => __( 'It\'s complicated. I\'ve spent more than 20 years recommending various anti-virus programs as an essential part of any Window setup.', 'ridhi-companion' ),
                'sanitize_callback' => 'wp_kses_post',
                'transport'         => 'postMessage'
            )
        );
        
        $wp_customize->add_control(
            'team_content',
            array(
                'label'       => __( 'Section Content', 'ridhi-companion' ),
                'description' => __( 'Add Content for this section.', 'ridhi-companion' ),
                'section'     => 'team_section',
                'type'        => 'textarea',
            )
        );

        $wp_customize->selective_refresh->add_partial( 
            'team_content', 
            array(
                'selector'        => '#team_section .widget_text .textwidget',
                'render_callback' => array( 'Ridhi_Companion_Partials', 'team_content' ),
            ) 
        );

        /** Add Team Members */
        $wp_customize->add_setting( 
            new Ridhi_Companion_Repeater_Setting( 
                $wp_customize, 
                'front_teams', 
                array(
                    'default'           => $this->defaults->default_teams(),
                    'sanitize_callback' => array( 'Ridhi_Companion_Repeater_Setting', 'sanitize_repeater_setting' ),
                ) 
            ) 
        );
        
        $wp_customize->add_control(
            new Ridhi_Companion_Control_Repeater(
                $wp_customize,
                'front_teams',
                array(
                    'section' => 'team_section',				
                    'label'	  => __( 'Add Team Members', 'ridhi-companion' ),
                    'fields'  => array(
                        'image' => array(
                            'type'        => 'image',
                            'label'       => __( 'Add Image', 'ridhi-companion' ),
                            'description' => __( 'Upload Image of size 370px X 285px.', 'ridhi-companion' ),
                        ),
                        'name'     => array(
                            'type'  => 'text',
                            'label' => __( 'Name', 'ridhi-companion' ),
                        ),
                        'description'   => array(
                            'type'  => 'textarea',
                            'label' => __( 'Description', 'ridhi-companion' ),
                        ),
                        'designation'     => array(
                            'type'  => 'text',
                            'label' => __( 'Designation', 'ridhi-companion' ),
                        ),
                        'facebook'     => array(
                            'type'  => 'url',
                            'label' => __( 'Facebook Link', 'ridhi-companion' ),
                        ),
                        'twitter'     => array(
                            'type'  => 'url',
                            'label' => __( 'Twitter Link', 'ridhi-companion' ),
                        ),
                        'linkedin'     => array(
                            'type'  => 'url',
                            'label' => __( 'Linkedin Link', 'ridhi-companion' ),
                        ),
                        'instagram'     => array(
                            'type'  => 'url',
                            'label' => __( 'Instagram Link', 'ridhi-companion' ),
                        ),
                        'youtube'     => array(
                            'type'  => 'url',
                            'label' => __( 'Youtube Link', 'ridhi-companion' ),
                        )
                    ),
                    'row_label' => array(
                        'type'  => 'field',
                        'value' => __( 'team member', 'ridhi-companion' ),
                        'field' => 'name'
                    ),                                      
                )
            )
        );

        /** Testimonial Section */
        $wp_customize->add_section( 
            'testimonial_section', 
            array(
                'title'    => __( 'Testimonial Section', 'ridhi-companion' ),
                'priority' => 60,
                'panel'    => 'frontpage_settings',
            )
        );

        /** Enable Testimonial Section */
        $wp_customize->add_setting(
            'ed_testimonial_section',
            array(
                'default'           => true,
                'sanitize_callback' => array( 'Ridhi_Companion_Sanitization', 'sanitize_checkbox' ),
            )
        );

        $wp_customize->add_control(
            new Ridhi_Companion_Toggle_Control(
                $wp_customize,
                'ed_testimonial_section',
                array(
                    'label'       => __( 'Enable Testimonial Section', 'ridhi-companion' ),
                    'description' => __( 'Enable to show testimonial section.', 'ridhi-companion' ),
                    'section'     => 'testimonial_section',
                )            
            )
        );

        /** Section Title */
        $wp_customize->add_setting(
            'testimonial_title',
            array(
                'default'           => __( 'What they are saying', 'ridhi-companion' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
            )
        );
        
        $wp_customize->add_control(
            'testimonial_title',
            array(
                'label'       => __( 'Section Title', 'ridhi-companion' ),
                'description' => __( 'Add Title for this section.', 'ridhi-companion' ),
                'section'     => 'testimonial_section',
                'type'        => 'text',
            )
        );

        $wp_customize->selective_refresh->add_partial( 
            'testimonial_title', 
            array(
                'selector'        => '#testimonial_section .widget_text .widget-title',
                'render_callback' => array( 'Ridhi_Companion_Partials', 'testimonial_title' ),
            ) 
        );

        /** Add Testimonials */
        $wp_customize->add_setting( 
            new Ridhi_Companion_Repeater_Setting( 
                $wp_customize, 
                'front_testimonials', 
                array(
                    'default'           => $this->defaults->default_testimonials(),
                    'sanitize_callback' => array( 'Ridhi_Companion_Repeater_Setting', 'sanitize_repeater_setting' ),
                ) 
            ) 
        );
        
        $wp_customize->add_control(
            new Ridhi_Companion_Control_Repeater(
                $wp_customize,
                'front_testimonials',
                array(
                    'section' => 'testimonial_section',				
                    'label'	  => __( 'Add Testimonials', 'ridhi-companion' ),
                    'fields'  => array(
                        'image' => array(
                            'type'        => 'image',
                            'label'       => __( 'Add Image', 'ridhi-companion' ),
                            'description' => __( 'Upload Image of size 150px X 150px.', 'ridhi-companion' ),
                        ),
                        'name'     => array(
                            'type'  => 'text',
                            'label' => __( 'Name', 'ridhi-companion' ),
                        ),
                        'description'   => array(
                            'type'  => 'textarea',
                            'label' => __( 'Description', 'ridhi-companion' ),
                        ),
                        'designation'     => array(
                            'type'  => 'text',
                            'label' => __( 'Designation', 'ridhi-companion' ),
                        )
                    ),
                    'row_label' => array(
                        'type'  => 'field',
                        'value' => __( 'testimonial', 'ridhi-companion' ),
                        'field' => 'name'
                    ),                                      
                )
            )
        );

        /** Contact Section */
        $wp_customize->add_section( 
            'contact_section', 
            array(
                'title'    => __( 'Contact Section', 'ridhi-companion' ),
                'priority' => 100,
                'panel'    => 'frontpage_settings',
            )
        );

        /** Enable Contact Section */
        $wp_customize->add_setting(
            'ed_contact_section',
            array(
                'default'           => true,
                'sanitize_callback' => array( 'Ridhi_Companion_Sanitization', 'sanitize_checkbox' ),
            )
        );

        $wp_customize->add_control(
            new Ridhi_Companion_Toggle_Control(
                $wp_customize,
                'ed_contact_section',
                array(
                    'label'       => __( 'Enable Contact Section', 'ridhi-companion' ),
                    'description' => __( 'Enable to show contact section.', 'ridhi-companion' ),
                    'section'     => 'contact_section',
                )            
            )
        );

        /** Section Title */
        $wp_customize->add_setting(
            'contact_title',
            array(
                'default'           => __( 'Let\'s Talk', 'ridhi-companion' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
            )
        );
        
        $wp_customize->add_control(
            'contact_title',
            array(
                'label'       => __( 'Section Title', 'ridhi-companion' ),
                'description' => __( 'Add Title for this section.', 'ridhi-companion' ),
                'section'     => 'contact_section',
                'type'        => 'text',
            )
        );

        $wp_customize->selective_refresh->add_partial( 
            'contact_title', 
            array(
                'selector'        => '#contact_section .widget_text .widget-title',
                'render_callback' => array( 'Ridhi_Companion_Partials', 'contact_title' ),
            ) 
        );

        /** Section Content */
        $wp_customize->add_setting(
            'contact_content',
            array(
                'default'           => __( 'Tell me your story or just say Hello!', 'ridhi-companion' ),
                'sanitize_callback' => 'wp_kses_post',
                'transport'         => 'postMessage'
            )
        );
        
        $wp_customize->add_control(
            'contact_content',
            array(
                'label'       => __( 'Section Content', 'ridhi-companion' ),
                'description' => __( 'Add Content for this section.', 'ridhi-companion' ),
                'section'     => 'contact_section',
                'type'        => 'textarea',
            )
        );

        $wp_customize->selective_refresh->add_partial( 
            'contact_content', 
            array(
                'selector'        => '#contact_section .widget_text .textwidget',
                'render_callback' => array( 'Ridhi_Companion_Partials', 'contact_content' ),
            ) 
        );

        /** Contact Form */
        $wp_customize->add_setting(
            'contact_form',
            array(
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post',
            )
        );
        
        $wp_customize->add_control(
            'contact_form',
            array(
                'label'   => __( 'Contact Form', 'ridhi-companion' ),
                'description'   => __( 'Add Contact Form 7 shortcode. Ex. [contact-form-7 id="111" title="Contact form"]', 'ridhi-companion' ),
                'section' => 'contact_section',
                'type'    => 'text',
            )
        );

        /** Phone Label */
        $wp_customize->add_setting(
            'phone_label',
            array(
                'default'           => __( 'Call Me', 'ridhi-companion' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
            )
        );
        
        $wp_customize->add_control(
            'phone_label',
            array(
                'label'       => __( 'Phone Label', 'ridhi-companion' ),
                'description' => __( 'Add phone label.', 'ridhi-companion' ),
                'section'     => 'contact_section',
                'type'        => 'text',
            )
        );

        $wp_customize->selective_refresh->add_partial( 
            'phone_label', 
            array(
                'selector'        => '#contact_section .contact-info .phone .text-holder strong',
                'render_callback' => array( 'Ridhi_Companion_Partials', 'phone_label' ),
            ) 
        );

        /** Phone Note */
        $wp_customize->add_setting(
            'phone_text',
            array(
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post' 
            )
        );
        
        $wp_customize->add_control(
            new Ridhi_Companion_Note_Control( 
                $wp_customize,
                'phone_text',
                array(
                    'section'	  => 'contact_section',
                    'description' => sprintf( __( 'To set phone please go to the %1$sPhone%2$s in Header Settings.', 'ridhi-companion' ), '<span class="text-inner-link phone_text">', '</span>' ),
                )
            )
        );

        /** Email Label */
        $wp_customize->add_setting(
            'email_label',
            array(
                'default'           => __( 'Email Me', 'ridhi-companion' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
            )
        );
        
        $wp_customize->add_control(
            'email_label',
            array(
                'label'       => __( 'Email Label', 'ridhi-companion' ),
                'description' => __( 'Add email label.', 'ridhi-companion' ),
                'section'     => 'contact_section',
                'type'        => 'text',
            )
        );

        $wp_customize->selective_refresh->add_partial( 
            'email_label', 
            array(
                'selector'        => '#contact_section .contact-info .email .text-holder strong',
                'render_callback' => array( 'Ridhi_Companion_Partials', 'email_label' ),
            ) 
        );

        /** Email Note */
        $wp_customize->add_setting(
            'email_text',
            array(
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post' 
            )
        );
        
        $wp_customize->add_control(
            new Ridhi_Companion_Note_Control( 
                $wp_customize,
                'email_text',
                array(
                    'section'	  => 'contact_section',
                    'description' => sprintf( __( 'To set email please go to the %1$sEmail%2$s in Header Settings.', 'ridhi-companion' ), '<span class="text-inner-link email_text">', '</span>' ),
                )
            )
        );

        /** Address Label */
        $wp_customize->add_setting(
            'address_label',
            array(
                'default'           => __( 'Visit Me', 'ridhi-companion' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
            )
        );
        
        $wp_customize->add_control(
            'address_label',
            array(
                'label'       => __( 'Address Label', 'ridhi-companion' ),
                'description' => __( 'Add address label.', 'ridhi-companion' ),
                'section'     => 'contact_section',
                'type'        => 'text',
            )
        );

        $wp_customize->selective_refresh->add_partial( 
            'address_label', 
            array(
                'selector'        => '#contact_section .contact-info .address .text-holder strong',
                'render_callback' => array( 'Ridhi_Companion_Partials', 'address_label' ),
            ) 
        );

        /** Address */
        $wp_customize->add_setting(
            'address',
            array(
                'default'           => __( 'Street Name, np. 14, 
                London, U.K, E14 2RF', 'ridhi-companion' ),
                'sanitize_callback' => 'wp_kses_post',
                'transport'         => 'postMessage'
            )
        );
        
        $wp_customize->add_control(
            'address',
            array(
                'label'       => __( 'Address', 'ridhi-companion' ),
                'description' => __( 'Add address details.', 'ridhi-companion' ),
                'section'     => 'contact_section',
                'type'        => 'textarea',
            )
        );

        $wp_customize->selective_refresh->add_partial( 
            'address', 
            array(
                'selector'        => '#contact_section .contact-info .address .text-holder address',
                'render_callback' => array( 'Ridhi_Companion_Partials', 'address' ),
            ) 
        );

        /** Upload Image */
        $wp_customize->add_setting(
            'contact_bg',
            array(
                'default'           => RIDHI_COMPANION_URL . 'images/contact-bg.jpg',
                'sanitize_callback' => array( 'Ridhi_Companion_Sanitization', 'sanitize_image' ),
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'contact_bg',
                array(
                    'label'       => __( 'Upload Image', 'ridhi-companion' ),
                    'description' => __( 'Upload background image of size 1920px X 780px for contact section.', 'ridhi-companion' ),
                    'section'     => 'contact_section',
                )
            )
        );

        /** Social Section */
        $wp_customize->add_section( 
            'social_section', 
            array(
                'title'    => __( 'Social Section', 'ridhi-companion' ),
                'priority' => 105,
                'panel'    => 'frontpage_settings',
            )
        );

        /** Enable Social Section */
        $wp_customize->add_setting(
            'ed_social_section',
            array(
                'default'           => true,
                'sanitize_callback' => array( 'Ridhi_Companion_Sanitization', 'sanitize_checkbox' ),
            )
        );

        $wp_customize->add_control(
            new Ridhi_Companion_Toggle_Control(
                $wp_customize,
                'ed_social_section',
                array(
                    'label'       => __( 'Enable Social Section', 'ridhi-companion' ),
                    'description' => __( 'Enable to show social section.', 'ridhi-companion' ),
                    'section'     => 'social_section',
                )            
            )
        );

        /** Section Title */
        $wp_customize->add_setting(
            'social_title',
            array(
                'default'           => __( 'Get Connected', 'ridhi-companion' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
            )
        );
        
        $wp_customize->add_control(
            'social_title',
            array(
                'label'       => __( 'Section Title', 'ridhi-companion' ),
                'description' => __( 'Add Title for this section.', 'ridhi-companion' ),
                'section'     => 'social_section',
                'type'        => 'text',
            )
        );

        $wp_customize->selective_refresh->add_partial( 
            'social_title', 
            array(
                'selector'        => '#social_section .widget_rtc_social_links .widget-title',
                'render_callback' => array( 'Ridhi_Companion_Partials', 'social_title' ),
            ) 
        );

        /** Social Note */
        $wp_customize->add_setting(
            'social_text',
            array(
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post' 
            )
        );
        
        $wp_customize->add_control(
            new Ridhi_Companion_Note_Control( 
                $wp_customize,
                'social_text',
                array(
                    'section'	  => 'social_section',
                    'description' => sprintf( __( 'To set social links please go to the %1$sSocial Links%2$s in Social Media Settings.', 'ridhi-companion' ), '<span class="text-inner-link social_text">', '</span>' ),
                )
            )
        );
    }

    public function customize_register_general_settings( $wp_customize ){
        
        /** Header Settings */
        $wp_customize->add_section(
            'header_settings',
            array(
                'title'    => __( 'Header Settings', 'ridhi-companion' ),
                'priority' => 20,
                'panel'    => 'general_settings',
            )
        );
    
        /** Phone */
        $wp_customize->add_setting(
            'phone',
            array(
                'default'           => __( '(222) 400-630', 'ridhi-companion' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
            )
        );
        
        $wp_customize->add_control(
            'phone',
            array(
                'type'    => 'text',
                'section' => 'header_settings',
                'label'   => __( 'Phone', 'ridhi-companion' ),
            )
        );

        $wp_customize->selective_refresh->add_partial( 
            'phone', 
            array(
                'selector'        => '.header-t .tel-link a, #contact_section .contact-info .phone .text-holder a',
                'render_callback' => array( 'Ridhi_Companion_Partials', 'phone' ),
            ) 
        );

        /** Phone Label Note */
        $wp_customize->add_setting(
            'phone_label_text',
            array(
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post' 
            )
        );
        
        $wp_customize->add_control(
            new Ridhi_Companion_Note_Control( 
                $wp_customize,
                'phone_label_text',
                array(
                    'section'	  => 'header_settings',
                    'description' => sprintf( __( 'Back to %1$sPhone Label%2$s in Front Page Settings > Contact Section.', 'ridhi-companion' ), '<span class="text-inner-link phone_label_text">', '</span>' ),
                )
            )
        );
        
        /** Email */
        $wp_customize->add_setting(
            'email',
            array(
                'default'           => __( 'info@domail.com', 'ridhi-companion' ),
                'sanitize_callback' => 'sanitize_email',
                'transport'         => 'postMessage' 
            )
        );
        
        $wp_customize->add_control(
            'email',
            array(
                'type'    => 'text',
                'section' => 'header_settings',
                'label'   => __( 'Email', 'ridhi-companion' ),
            )
        );

        $wp_customize->selective_refresh->add_partial( 
            'email', 
            array(
                'selector'        => '.header-t .email-link a, #contact_section .contact-info .email .text-holder a',
                'render_callback' => array( 'Ridhi_Companion_Partials', 'email' ),
            ) 
        );

        /** Email Label Note */
        $wp_customize->add_setting(
            'email_label_text',
            array(
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post' 
            )
        );
        
        $wp_customize->add_control(
            new Ridhi_Companion_Note_Control( 
                $wp_customize,
                'email_label_text',
                array(
                    'section'	  => 'header_settings',
                    'description' => sprintf( __( 'Back to %1$sEmail Label%2$s in Front Page Settings > Contact Section.', 'ridhi-companion' ), '<span class="text-inner-link email_label_text">', '</span>' ),
                )
            )
        );

        /** Button Label */
        $wp_customize->add_setting(
            'header_ctabtn_label',
            array(
                'default'           => __( 'Booking', 'ridhi-companion' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
            )
        );
        
        $wp_customize->add_control(
            'header_ctabtn_label',
            array(
                'type'    => 'text',
                'section' => 'header_settings',
                'label'   => __( 'Button Label', 'ridhi-companion' ),
            )
        );

        $wp_customize->selective_refresh->add_partial( 
            'header_ctabtn_label', 
            array(
                'selector'        => '.header-b .right-panel .btn-book a',
                'render_callback' => array( 'Ridhi_Companion_Partials', 'btn_label' ),
            ) 
        );

        /** Button Link */
        $wp_customize->add_setting(
            'header_ctabtn_link',
            array(
                'default'           => '#',
                'sanitize_callback' => 'esc_url_raw' 
            )
        );
        
        $wp_customize->add_control(
            'header_ctabtn_link',
            array(
                'type'    => 'text',
                'section' => 'header_settings',
                'label'   => __( 'Button Link', 'ridhi-companion' ),
            )
        );
        /** Header Settings Ends */

        /** Social Media Settings */
        $wp_customize->add_section(
            'social_media_settings',
            array(
                'title'    => __( 'Social Media Settings', 'ridhi-companion' ),
                'priority' => 30,
                'panel'    => 'general_settings',
            )
        );
        
        /** Enable Header Social Links */
        $wp_customize->add_setting( 
            'ed_social_links_header', 
            array(
                'default'           => true,
                'sanitize_callback' => array( 'Ridhi_Companion_Sanitization', 'sanitize_checkbox' ),
            ) 
        );
        
        $wp_customize->add_control(
            new Ridhi_Companion_Toggle_Control( 
                $wp_customize,
                'ed_social_links_header',
                array(
                    'section'     => 'social_media_settings',
                    'label'	      => __( 'Enable Header Social Links', 'ridhi-companion' ),
                    'description' => __( 'Enable to show social links at header.', 'ridhi-companion' ),
                )
            )
        );

        /** Enable Footer Social Links */
        $wp_customize->add_setting( 
            'ed_social_links_footer', 
            array(
                'default'           => true,
                'sanitize_callback' => array( 'Ridhi_Companion_Sanitization', 'sanitize_checkbox' ),
            ) 
        );
        
        $wp_customize->add_control(
            new Ridhi_Companion_Toggle_Control( 
                $wp_customize,
                'ed_social_links_footer',
                array(
                    'section'     => 'social_media_settings',
                    'label'	      => __( 'Enable Footer Social Links', 'ridhi-companion' ),
                    'description' => __( 'Enable to show social links at footer.', 'ridhi-companion' ),
                )
            )
        );
        
        /** Social Links */
        $wp_customize->add_setting( 
            new Ridhi_Companion_Repeater_Setting( 
                $wp_customize, 
                'social_links', 
                array(
                    'default'           => $this->defaults->default_socials(),
                    'sanitize_callback' => array( 'Ridhi_Companion_Repeater_Setting', 'sanitize_repeater_setting' ),
                ) 
            ) 
        );
        
        $wp_customize->add_control(
            new Ridhi_Companion_Control_Repeater(
                $wp_customize,
                'social_links',
                array(
                    'section' => 'social_media_settings',				
                    'label'	  => __( 'Social Links', 'ridhi-companion' ),
                    'fields'  => array(
                        'font' => array(
                            'type'        => 'font',
                            'label'       => __( 'Font Awesome Icon', 'ridhi-companion' ),
                            'description' => __( 'Example: fab fa-facebook-f', 'ridhi-companion' ),
                        ),
                        'link' => array(
                            'type'        => 'url',
                            'label'       => __( 'Link', 'ridhi-companion' ),
                            'description' => __( 'Example: https://facebook.com', 'ridhi-companion' ),
                        )
                    ),
                    'row_label' => array(
                        'type' => 'field',
                        'value' => __( 'links', 'ridhi-companion' ),
                        'field' => 'link'
                    )                   
                )
            )
        );

        /** Social Section Note */
        $wp_customize->add_setting(
            'social_section_text',
            array(
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post' 
            )
        );
        
        $wp_customize->add_control(
            new Ridhi_Companion_Note_Control( 
                $wp_customize,
                'social_section_text',
                array(
                    'section'	  => 'social_media_settings',
                    'description' => sprintf( __( 'Back to %1$sSection Title%2$s in Front Page Settings > Social Section.', 'ridhi-companion' ), '<span class="text-inner-link social_section_text">', '</span>' ),
                )
            )
        );
        /** Social Media Settings Ends */
    }

    public function register_custom_controls( $wp_customize ){    
        // Load our custom control.
        require_once RIDHI_COMPANION_PATH . 'inc/custom-controls/note/class-note-control.php';
        require_once RIDHI_COMPANION_PATH . 'inc/custom-controls/repeater/class-repeater-setting.php';
        require_once RIDHI_COMPANION_PATH . 'inc/custom-controls/repeater/class-control-repeater.php';
        require_once RIDHI_COMPANION_PATH . 'inc/custom-controls/toggle/class-toggle-control.php';
                
        // Register the control type.
        $wp_customize->register_control_type( 'Ridhi_Companion_Toggle_Control' );
    }

    public function customizer_control_scripts(){
        $plugin_info = new Ridhi_Companion;
        wp_enqueue_style( 'ridhi-companion-customizer', RIDHI_COMPANION_URL . 'inc/css/customizer.css', array(), $plugin_info->get_plugin_version() );
        wp_enqueue_script( 'ridhi-companion-customizer', RIDHI_COMPANION_URL . 'inc/js/customizer.js', array( 'jquery', 'customize-controls' ), $plugin_info->get_plugin_version(), true );
    }
}
$obj = new Ridhi_Companion_Customizer;
$obj->execute();