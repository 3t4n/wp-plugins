<?php
namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH'))
    exit;
class Contact_Form7_Flexitype extends Widget_Base
{

    public function get_name()
    {
        return 'flexitype-contact-form7';
    }

    public function get_title()
    {
        return esc_html__('Contact Form 7', 'flexitype-lite');
    }

    public function get_icon()
    {
        return 'flexitype-icon eicon-mail';
    }

    public function get_categories()
    {
        return ['flexitype'];
    }
    public function get_keywords()
    {
        return ['flexitype', 'Form', 'Contact'];
    }
    public function flexitype_contact_forms(){
        $formlist = array();
        $forms_args = array( 'posts_per_page' => -1, 'post_type'=> 'wpcf7_contact_form' );
        $forms = get_posts( $forms_args );
        if( $forms ){
            foreach ( $forms as $form ){
                $formlist[$form->ID] = $form->post_title;
            }
        }else{
            $formlist['0'] = esc_html__('Form not found','flexitype-lite');
        }
        return $formlist;
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'contactform_content',
            [
                'label' => esc_html__('Contact Form', 'flexitype-lite'),
            ]
        );
        $this->add_control(
            'contact_form_id',
            [
                'label' => esc_html__('Select Form', 'flexitype-lite'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => $this->flexitype_contact_forms(),
                'default' => '0',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'contactform_form_section_style',
            [
                'label' => esc_html__('Style', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'contactform_form_section_padding',
            [
                'label' => esc_html__('Padding', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-contact-form-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'contactform_form_section_margin',
            [
                'label' => esc_html__('Margin', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-contact-form-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'contactform_form_section_background',
                'label' => esc_html__('Background', 'flexitype-lite'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .flexitype-contact-form-wrapper',
            ]
        );

        $this->add_responsive_control(
            'contactform_form_section_align',
            [
                'label' => esc_html__('Alignment', 'flexitype-lite'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'flexitype-lite'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'flexitype-lite'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'flexitype-lite'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justified', 'flexitype-lite'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-contact-form-wrapper' => 'text-align: {{VALUE}};',
                ],
                'default' => 'left',
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'contactform_contactform_input_style',
            [
                'label' => esc_html__('Input', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'contactform_input_box_height',
            [
                'label' => esc_html__('Height', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 150,
                    ],
                ],
                'default' => [
                    'size' => 60,
                ],

                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="text"]' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="email"]' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="url"]' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="number"]' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="tel"]' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="date"]' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap .wpcf7-select' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'contactform_input_box_background',
            [
                'label' => esc_html__('Background Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="text"]' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="email"]' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="url"]' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="number"]' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="tel"]' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="date"]' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap .wpcf7-select' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'contactform_input_box_typography',
                'selector' => '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="text"], {{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="email"], {{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="url"], {{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="number"], {{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="tel"], {{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="date"], {{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap .wpcf7-select',
            ]
        );

        $this->add_control(
            'contactform_input_box_text_color',
            [
                'label' => esc_html__('Text Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="text"]' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="email"]' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="url"]' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="number"]' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="tel"]' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="date"]' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap .wpcf7-select' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'contactform_input_box_placeholder_color',
            [
                'label' => esc_html__('Placeholder Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="text"]::-webkit-input-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="text"]::-moz-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="text"]:-ms-input-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="email"]::-webkit-input-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="email"]::-moz-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="email"]:-ms-input-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="url"]::-webkit-input-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="url"]::-moz-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="url"]:-ms-input-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="number"]::-webkit-input-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="number"]::-moz-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="number"]:-ms-input-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="tel"]::-webkit-input-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="tel"]::-moz-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="tel"]:-ms-input-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="date"]::-webkit-input-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="date"]::-moz-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="date"]:-ms-input-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap .wpcf7-select' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'contactform_input_box_border',
                'label' => esc_html__('Border', 'flexitype-lite'),
                'selector' => '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="text"], {{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="email"], {{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="url"], {{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="number"], {{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="tel"], {{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="date"], {{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap .wpcf7-select',
            ]
        );
        
        $this->add_control(
            'contactform_input_box_focus_border',
            [
                'label' => esc_html__('Focus Border Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="text"]:focus' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="email"]:focus' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="url"]:focus' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="number"]:focus' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="tel"]:focus' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="date"]:focus' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap .wpcf7-select:focus' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'contactform_input_box_border_radius',
            [
                'label' => esc_html__('Border Radius', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="text"]' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="email"]' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="url"]' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="number"]' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="tel"]' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="date"]' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap .wpcf7-select' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'contactform_input_box_padding',
            [
                'label' => esc_html__('Padding', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="text"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="email"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="url"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="number"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="tel"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="date"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap .wpcf7-select' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'contactform_input_box_margin',
            [
                'label' => esc_html__('Margin', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="text"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="email"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="url"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="number"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="tel"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="date"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap .wpcf7-select' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'contactform_textarea_style',
            [
                'label' => esc_html__('Textarea', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'contactform_textarea_box_height',
            [
                'label' => esc_html__('Height', 'flexitype-lite'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 500,
                    ],
                ],
                'default' => [
                    'size' => 175,
                ],

                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap textarea' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'contactform_textarea_box_background',
            [
                'label' => esc_html__('Background Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap textarea' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'contactform_textarea_box_typography',
                'selector' => '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap textarea',
            ]
        );

        $this->add_control(
            'contactform_textarea_box_text_color',
            [
                'label' => esc_html__('Text Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap textarea' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'contactform_textarea_box_placeholder_color',
            [
                'label' => esc_html__('Placeholder Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap textarea::-webkit-input-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap textarea::-moz-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap textarea:-ms-input-placeholder' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'contactform_textarea_box_border',
                'label' => esc_html__('Border', 'flexitype-lite'),
                'selector' => '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap textarea',
            ]
        );

        $this->add_control(
            'contactform_textarea_box_focus_border',
            [
                'label' => esc_html__('Focus Border Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap textarea:focus' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'contactform_textarea_box_border_radius',
            [
                'label' => esc_html__('Border Radius', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap textarea' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'contactform_textarea_box_padding',
            [
                'label' => esc_html__('Padding', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'contactform_textarea_box_margin',
            [
                'label' => esc_html__('Margin', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap textarea' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'contactform_contactform_label_style',
            [
                'label' => esc_html__('Label', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'contactform_label_background',
            [
                'label' => esc_html__('Background Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-contact-form-wrapper form.wpcf7-form label' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'contactform_label_text_color',
            [
                'label' => esc_html__('Text Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-contact-form-wrapper form.wpcf7-form label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'contactform_label_typography',
                'selector' => '{{WRAPPER}} .flexitype-contact-form-wrapper form.wpcf7-form label',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'contactform_label_border',
                'label' => esc_html__('Border', 'flexitype-lite'),
                'selector' => '{{WRAPPER}} .flexitype-contact-form-wrapper form.wpcf7-form label',
            ]
        );

        $this->add_responsive_control(
            'contactform_label_border_radius',
            [
                'label' => esc_html__('Border Radius', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .flexitype-contact-form-wrapper form.wpcf7-form label' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'contactform_label_padding',
            [
                'label' => esc_html__('Padding', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-contact-form-wrapper form.wpcf7-form label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'contactform_label_margin',
            [
                'label' => esc_html__('Margin', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .flexitype-contact-form-wrapper form.wpcf7-form label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'contactform_inputsubmit_style',
            [
                'label' => esc_html__('Button', 'flexitype-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs('submit_style_tabs');


        $this->start_controls_tab(
            'submit_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'flexitype-lite'),
            ]
        );

        $this->add_control(
			'input_submit_width',
			[
				'label' => esc_html__( 'Width', 'flexitype-lite' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .wpcf7-form .wpcf7-submit' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'input_submit_typography',
                'selector' => '{{WRAPPER}} .wpcf7-form .wpcf7-submit',
            ]
        );

        $this->add_control(
            'input_submit_text_color',
            [
                'label' => esc_html__('Text Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-submit' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'input_submit_background_color',
            [
                'label' => esc_html__('Background Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-submit' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'input_submit_padding',
            [
                'label' => esc_html__('Padding', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'input_submit_margin',
            [
                'label' => esc_html__('Margin', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-submit' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'input_submit_border',
                'label' => esc_html__('Border', 'flexitype-lite'),
                'selector' => '{{WRAPPER}} .wpcf7-form .wpcf7-submit',
            ]
        );

        $this->add_responsive_control(
            'input_submit_border_radius',
            [
                'label' => esc_html__('Border Radius', 'flexitype-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-submit' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'htmega_input_submit_box_shadow',
                'label' => esc_html__('Box Shadow', 'flexitype-lite'),
                'selector' => '{{WRAPPER}} .wpcf7-form .wpcf7-submit',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'submit_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'flexitype-lite'),
            ]
        );

        $this->add_control(
            'input_submithover_text_color',
            [
                'label' => esc_html__('Text Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-submit:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'input_submithover_background_color',
            [
                'label' => esc_html__('Background Color', 'flexitype-lite'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-submit:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'input_submithover_border',
                'label' => esc_html__('Border', 'flexitype-lite'),
                'selector' => '{{WRAPPER}} .wpcf7-form .wpcf7-submit:hover',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();
        $id = $this->get_id();

        $this->add_render_attribute('flexitype_wpform_attr', 'class', 'flexitype-contact-form-wrapper');

        $this->add_render_attribute('shortcode', 'id', $settings['contact_form_id']);
        $shortcode = sprintf('[contact-form-7 %s]', $this->get_render_attribute_string('shortcode'));

        ?>
        <div <?php echo $this->get_render_attribute_string('flexitype_wpform_attr'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
            <?php
            if (!empty($settings['contact_form_id'])) {
                echo do_shortcode($shortcode);
            } else {
                echo '<div class="flexitype_form_no_select">' . esc_html__('Please Select contact form.', 'flexitype-lite') . '</div>';
            }
            ?>
        </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Contact_Form7_Flexitype());