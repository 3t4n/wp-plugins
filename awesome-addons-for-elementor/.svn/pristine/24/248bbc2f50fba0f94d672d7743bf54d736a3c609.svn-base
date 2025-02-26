<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use \Elementor\Group_Control_Background as Group_Control_Background;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Perfecto awe Portfolio
 *
 * Elementor widget for awe portfolio
 *
 * @since 1.0.0
 */
class awe_Caldera_Forms extends Widget_Base {

	public function get_name() {
		return 'awe-caldera-forms';
	}

	public function get_title() {
		return esc_html__( 'Caldera Forms', 'aa_elementor' );
	}

	public function get_icon() {
		return 'ad ad-form';
	}

	public function get_categories() {
		return [ 'awe_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'awe-for-elementor-caldera-forms' ];
    }

    protected  function get_profile_names() {
        return [
            'apple' => __( 'Apple', 'aa_elementor' ),
            'behance' => __( 'Behance', 'aa_elementor' ),
            'bitbucket' => __( 'BitBucket', 'aa_elementor' ),
            'codepen' => __( 'CodePen', 'aa_elementor' ),
            'delicious' => __( 'Delicious', 'aa_elementor' ),
            'deviantart' => __( 'DeviantArt', 'aa_elementor' ),
            'digg' => __( 'Digg', 'aa_elementor' ),
            'dribbble' => __( 'Dribbble', 'aa_elementor' ),
            'email' => __( 'Email', 'aa_elementor' ),
            'facebook' => __( 'Facebook', 'aa_elementor' ),
            'flickr' => __( 'Flicker', 'aa_elementor' ),
            'foursquare' => __( 'FourSquare', 'aa_elementor' ),
            'github' => __( 'Github', 'aa_elementor' ),
            'houzz' => __( 'Houzz', 'aa_elementor' ),
            'instagram' => __( 'Instagram', 'aa_elementor' ),
            'jsfiddle' => __( 'JS Fiddle', 'aa_elementor' ),
            'linkedin' => __( 'LinkedIn', 'aa_elementor' ),
            'medium' => __( 'Medium', 'aa_elementor' ),
            'pinterest' => __( 'Pinterest', 'aa_elementor' ),
            'product-hunt' => __( 'Product Hunt', 'aa_elementor' ),
            'reddit' => __( 'Reddit', 'aa_elementor' ),
            'slideshare' => __( 'Slide Share', 'aa_elementor' ),
            'snapchat' => __( 'Snapchat', 'aa_elementor' ),
            'soundcloud' => __( 'SoundCloud', 'aa_elementor' ),
            'spotify' => __( 'Spotify', 'aa_elementor' ),
            'stack-overflow' => __( 'StackOverflow', 'aa_elementor' ),
            'tripadvisor' => __( 'TripAdvisor', 'aa_elementor' ),
            'tumblr' => __( 'Tumblr', 'aa_elementor' ),
            'twitch' => __( 'Twitch', 'aa_elementor' ),
            'twitter' => __( 'Twitter', 'aa_elementor' ),
            'vimeo' => __( 'Vimeo', 'aa_elementor' ),
            'vk' => __( 'VK', 'aa_elementor' ),
            'website' => __( 'Website', 'aa_elementor' ),
            'whatsapp' => __( 'WhatsApp', 'aa_elementor' ),
            'wordpress' => __( 'WordPress', 'aa_elementor' ),
            'xing' => __( 'Xing', 'aa_elementor' ),
            'yelp' => __( 'Yelp', 'aa_elementor' ),
            'youtube' => __( 'YouTube', 'aa_elementor' ),
        ];
    }
    

	protected function _register_controls() {
		
        $this->start_controls_section(
			'_section_cf',
			[
				'label' => Awesome_Addons_is_calderaf_activated() ? __( 'Caldera Forms', 'aa_elementor' ) : __( 'Notice', 'aa_elementor' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        if ( ! Awesome_Addons_is_calderaf_activated() ) {
            $this->add_control(
                'cf_missing_notice',
                [
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => sprintf(
                        __( 'Please install and activate %1$s first.', 'aa_elementor' ),
                        '<a href="https://wordpress.org/plugins/caldera-forms/" target="_blank" rel="noopener">Caldera Forms</a>'
                    ),
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-warning',
                ]
            );
            $this->end_controls_section();
            return;
        }

        $this->add_control(
            'caldera_form_list',
            [
                'label' => __( 'Select Your Form', 'aa_elementor' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => ['' => __( '', 'aa_elementor' ) ] + \Awesome_Addons_get_caldera_form(),
            ]
        );

        $this->add_control(
            'html_class',
            [
                'label' => __( 'HTML Class', 'aa_elementor' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'description' => __( 'Add CSS custom class to the form.', 'aa_elementor' ),
            ]
        );

        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'calderaform_style_section',
            [
                'label' => __( 'Label Section', 'aa_elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'label_color',
                [
                    'label'     => __( 'Color Section', 'aa_elementor' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .caldera_forms_form label.control-label' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'label_typography',
                    'label'    => __( 'Typography', 'aa_elementor' ),
                    'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
                    'selector' => '{{WRAPPER}} .caldera_forms_form label.control-label',
                ]
            );

        $this->end_controls_section();

        // Input Field Style
        $this->start_controls_section(
            'calderaform_input_style_section',
            [
                'label' => __( 'Input Section', 'aa_elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'input_text_color',
                [
                    'label'     => __( 'Text Color', 'aa_elementor' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .caldera_forms_form input.form-control'    => 'color: {{VALUE}};',
                        '{{WRAPPER}} .caldera_forms_form select.form-control'   => 'color: {{VALUE}};',
                        '{{WRAPPER}} .caldera_forms_form textarea.form-control' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'input_placeholder_color',
                [
                    'label'     => __( 'Placeholder Color', 'aa_elementor' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .caldera_forms_form input.form-control::placeholder'    => 'color: {{VALUE}};',
                        '{{WRAPPER}} .caldera_forms_form select.form-control::placeholder'   => 'color: {{VALUE}};',
                        '{{WRAPPER}} .caldera_forms_form textarea.form-control::placeholder' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'input_text_background',
                [
                    'label'     => __( 'Background Color', 'aa_elementor' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .caldera_forms_form input.form-control'    => 'background-color: {{VALUE}};',
                        '{{WRAPPER}} .caldera_forms_form select.form-control'   => 'background-color: {{VALUE}};',
                        '{{WRAPPER}} .caldera_forms_form textarea.form-control' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'input_padding',
                [
                    'label'      => __( 'Padding', 'aa_elementor' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors'  => [
                        '{{WRAPPER}} .caldera_forms_form input.form-control, 
                         {{WRAPPER}} .caldera_forms_form textarea.form-control, 
                         {{WRAPPER}} .caldera_forms_form select.form-control' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; height: auto;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'input_space',
                [
                    'label'   => __( 'Input Space', 'aa_elementor' ),
                    'type'    => Controls_Manager::SLIDER,
                    'default' => [
                        'size' => 15,
                    ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .caldera_forms_form .row:not(.last_row) .form-group' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(), [
                    'name'        => 'input_border',
                    'label'       => __( 'Border', 'aa_elementor' ),
                    'placeholder' => '1px',
                    'default'     => '1px',
                    'selector'    => '{{WRAPPER}} .caldera_forms_form input.form-control, {{WRAPPER}} .caldera_forms_form textarea.form-control, {{WRAPPER}} .caldera_forms_form select.form-control',
                    
                ]
            );

            $this->add_control(
                'input_border_radius',
                [
                    'label'      => __( 'Border Radius', 'aa_elementor' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors'  => [
                        '{{WRAPPER}} .caldera_forms_form input.form-control'    => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .caldera_forms_form textarea.form-control' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .caldera_forms_form select.form-control'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

        $this->end_controls_section();

        // Submit Button
        $this->start_controls_section(
            'form_style_submit_button',
            [
                'label' => __( 'Submit Button', 'aa_elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->start_controls_tabs( 'tabs_button_style' );

                // Button Normal
                $this->start_controls_tab(
                    'form_tab_button_normal',
                    [
                        'label' => __( 'Normal', 'aa_elementor' ),
                    ]
                );

                    $this->add_control(
                        'button_text_color',
                        [
                            'label'     => __( 'Text Color', 'aa_elementor' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .caldera_forms_form input[type="submit"].btn' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'background_color',
                        [
                            'label'     => __( 'Background Color', 'aa_elementor' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .caldera_forms_form input[type="submit"].btn' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name'        => 'border',
                            'label'       => __( 'Border', 'aa_elementor' ),
                            'placeholder' => '1px',
                            'default'     => '1px',
                            'selector'    => '{{WRAPPER}} .caldera_forms_form input[type="submit"].btn',
                            'separator'   => 'before',
                        ]
                    );

                    $this->add_control(
                        'border_radius',
                        [
                            'label'      => __( 'Border Radius', 'aa_elementor' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors'  => [
                                '{{WRAPPER}} .caldera_forms_form input[type="submit"].btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Box_Shadow::get_type(),
                        [
                            'name'     => 'button_box_shadow',
                            'selector' => '{{WRAPPER}} .caldera_forms_form input[type="submit"].btn',
                        ]
                    );

                    $this->add_control(
                        'button_padding',
                        [
                            'label'      => __( 'Padding', 'aa_elementor' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%' ],
                            'separator'  => 'before',
                            'selectors'  => [
                                '{{WRAPPER}} .caldera_forms_form input[type="submit"].btn, {{WRAPPER}} .caldera_forms_form .cf-page-btn-next[type*="button"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name'      => 'button_typography',
                            'label'     => __( 'Typography', 'aa_elementor' ),
                            'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                            'selector'  => '{{WRAPPER}} .caldera_forms_form input[type="submit"].btn',
                            'separator' => 'before',
                        ]
                    );

                $this->end_controls_tab();

                // Button Hover
                $this->start_controls_tab(
                    'tab_button_hover',
                    [
                        'label' => __( 'Hover', 'aa_elementor' ),
                    ]
                );

                    $this->add_control(
                        'hover_color',
                        [
                            'label'     => __( 'Text Color', 'aa_elementor' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .caldera_forms_form input[type="submit"].btn:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'button_background_hover_color',
                        [
                            'label'     => __( 'Background Color', 'aa_elementor' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .caldera_forms_form input[type="submit"].btn:hover' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'button_hover_border_color',
                        [
                            'label'     => __( 'Border Color', 'aa_elementor' ),
                            'type'      => Controls_Manager::COLOR,
                            'condition' => [
                                'border_border!' => '',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .caldera_forms_form input[type="submit"].btn:hover' => 'border-color: {{VALUE}};',
                            ],
                        ]
                    );

                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();
		
	}

	protected function render() {
		require AWESOME_ADDONS_PATH . '/modules/caldera-forms/template/view.php';
    }
    



}
