<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class HTService_Elementor_Widget_Service extends Widget_Base {

    public function get_name() {
        return 'services-post';
    }
    
    public function get_title() {
        return __( 'HT Service : Services', 'htservice' );
    }

    public function get_icon() {
        return 'eicon-info-box';
    }
    
    public function get_categories() {
        return [ 'htservice' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'service_setting',
            [
                'label' => esc_html__( 'Services', 'htservice' ),
            ]
        );
        $this->start_controls_tabs(
                'htservice_tabs'
            );
                $this->start_controls_tab(
                    'htservice_content_tab',
                    [
                        'label' => __( 'Content', 'htservice' ),
                    ]
                );

            $this->add_control(
                'content_show_ttie',
                [
                    'label' => __( 'Content Source Option', 'htservice' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'htservice_categories',
                [
                    'label' => esc_html__( 'Select Service Category', 'htservice' ),
                    'type' => Controls_Manager::SELECT2,
                    'label_block' => true,
                    'multiple' => true,
                    'options' => htservice_categories(),                   
                ]
            );
            $this->add_control(
                'iteam_style',
                [
                    'label' => esc_html__( 'Select layout', 'htservice' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'style1',
                    'options' => [
                        'style1' => esc_html__( 'Style One', 'htservice' ),
                        'style2' => esc_html__( 'Style Two', 'htservice' ),
                    ],
                ]
            );  
            $this->add_control(
                'service_img_option',
                [
                    'label' => esc_html__( 'Select Feature', 'htservice' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'f_image',
                    'options' => [
                        'f_image' => esc_html__( 'Featured Image', 'htservice' ),
                        'img_icon' => esc_html__( 'Image Icon', 'htservice' ),
                        'font_icon' => esc_html__( 'Font Icon', 'htservice' ),
                    ],
                    'condition' => [
                        'iteam_style' => 'style1',
                    ]
                ]
            );                                              
            $this->add_control(
                'service_img_option2',
                [
                    'label' => esc_html__( 'Select Feature', 'htservice' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'img_icon',
                    'options' => [
                        'hide_icon' => esc_html__( 'Hide/Icon', 'htservice' ),
                        'img_icon' => esc_html__( 'Image Icon', 'htservice' ),
                        'font_icon' => esc_html__( 'Font Icon', 'htservice' ),
                    ],
                    'condition' => [
                        'iteam_style' => 'style2',
                    ]
                ]
            ); 
            $this->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'htservice_service_image',
                    'default' => 'large',
                    'separator' => 'none',
                ]
            );            
            $this->add_control(
                'title_length',
                [
                    'label' => __( 'Title Length', 'htservice' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 100,
                    'step' => 1,
                    'default' => 2,
                ]
            );
            $this->add_control(
                'featured_image_link_show',
                [
                    'label' => esc_html__( 'Image Link Show/Hide', 'htservice' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                    'condition' => [
                        'service_img_option' => 'f_image',
                    ]
                ]
            );            
            $this->add_control(
                'title_link_show',
                [
                    'label' => esc_html__( 'Title Link Show/Hide', 'htservice' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            $this->add_control(
                'content_show',
                [
                    'label' => esc_html__( 'Content Show/Hide', 'htservice' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );            
            $this->add_control(
                'content_length',
                [
                    'label' => __( 'Content Length', 'htservice' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 200,
                    'step' => 1,
                    'default' => 15,
                    'condition'=>[
                        'content_show' =>'yes',
                    ]
                ]
            );
            $this->add_control(
                'read_more_show',
                [
                    'label' => esc_html__( 'Read More Show/Hide', 'htservice' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );
            $this->add_control(
                'read_more_show_text',
                [
                    'label' => esc_html__( 'Read More Text', 'htservice' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Read More',
                    'condition'=>[
                        'read_more_show' =>'yes',
                    ]
                ]
            );              
            $this->end_controls_tab();

                $this->start_controls_tab(
                    'htservice_option_tab',
                    [
                        'label' => __( 'Option', 'htservice' ),
                    ]
                );

            $this->add_control(
                'item_show_ttie',
                [
                    'label' => __( 'Item Show Option', 'htservice' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'iteam_layout',
                [
                    'label' => esc_html__( 'Select layout', 'htservice' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'grid',
                    'options' => [
                        'carosul' => esc_html__( 'Carousel', 'htservice' ),
                        'grid' => esc_html__( 'Grid', 'htservice' ),
                    ],
                ]
            );               
            $this->add_control(
                'post_per_page',
                [
                    'label' => __( 'Show Total Item', 'htservice' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 3,
                    'max' => 10000,
                    'step' => 1,
                    'default' => 6,
                ]
            );
           $this->add_control(
                'item_order',
                [
                    'label' => esc_html__( 'Order By', 'htservice' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'DESC',
                    'options' => [
                        'ASC' => esc_html__( 'Ascending', 'htservice' ),
                        'DESC' => esc_html__( 'Descending', 'htservice' ),
                    ],
                ]
            );             
            $this->add_control(
                'caselautoplay',
                [
                    'label' => esc_html__( 'Auto play', 'htservice' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'condition' => [
                        'iteam_layout' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'caselautoplayspeed',
                [
                    'label' => __( 'Auto play speed', 'htservice' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 5,
                    'max' => 10000,
                    'step' => 100,
                    'default' => 5000,
                    'condition' => [
                        'caselautoplay' => 'yes',
                        'iteam_layout' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'caselarrows',
                [
                    'label' => esc_html__( 'Arrow', 'htservice' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'condition' => [
                        'iteam_layout' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'slarrowsstyle',
                [
                    'label' => esc_html__( 'Arrow Style Middle/Top', 'htservice' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        1 => esc_html__( 'Arrow Middle', 'htservice' ),
                        2 => esc_html__( 'Arrow Top', 'htservice' ),
                    ],
                     'condition' => [
                        'caselarrows' => 'yes',
                        'iteam_layout' => 'carosul',
                    ]
                ]
            );

            $this->add_control(
                'arrow_icon_next',
                [
                    'label' => __( 'Icon Next', 'htservice' ),
                    'type' => Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fas fa-angle-right',
                        'library' => 'solid',
                    ],
                    'condition' => [
                        'caselarrows' => 'yes',
                        'iteam_layout' => 'carosul',
                    ]
                ]
            );

            $this->add_control(
                'arrow_icon_prev',
                [
                    'label' => __( 'Icon Prev', 'htservice' ),
                    'type' => Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fas fa-angle-left',
                        'library' => 'solid',
                    ],
                    'condition' => [
                        'caselarrows' => 'yes',
                        'iteam_layout' => 'carosul',
                    ]
                ]
            );

            $this->add_control(
                'showitem',
                [
                    'label' => __( 'Show Item', 'htservice' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 6,
                    'step' => 1,
                    'default' => 3,
                    'condition' => [
                        'iteam_layout' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'showitemtablet',
                [
                    'label' => __( 'Show Item (Tablet)', 'htservice' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 6,
                    'step' => 1,
                    'default' => 2,
                    'condition' => [
                        'iteam_layout' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'showitemmobile',
                [
                    'label' => __( 'Show Item (Large Mobile)', 'htservice' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 6,
                    'step' => 1,
                    'default' => 1,
                    'condition' => [
                        'iteam_layout' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
              'ht_service_item_gutter',
              [
                 'label'   => __( 'Item Gutter', 'htservice' ),
                 'type'    => Controls_Manager::NUMBER,
                 'default' => 30,
                 'min'     => 0,
                 'max'     => 100,
                 'step'    => 1,
                    'condition' => [
                        'iteam_layout' => 'carosul',
                    ]
              ]
            );

            $this->add_control(
                'grid_column_number',
                [
                    'label' => esc_html__( 'Columns', 'htservice' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '3',
                    'options' => [
                        '1' => esc_html__( '1', 'htservice' ),
                        '2' => esc_html__( '2', 'htservice' ),
                        '3' => esc_html__( '3', 'htservice' ),
                        '4' => esc_html__( '4', 'htservice' ),
                        '5' => esc_html__( '5', 'htservice' ),
                        '6' => esc_html__( '6', 'htservice' ),
                    ],
                    'condition' => [
                        'iteam_layout' => 'grid',
                    ]
                ]
            );            
            $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'section_title_style1s',
            [
                'label' => __( 'Content Style', 'htservice' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
                'htservice_style_tabs'
            );
                $this->start_controls_tab(
                    'htservice_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'htservice' ),
                    ]
                );

            $this->add_control(
                'item_title_heading',
                [
                    'label' => __( 'Title Color', 'htservice' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            // Title Style
            $this->add_control(
                'title_color',
                [
                    'label' => __( 'Title color', 'htservice' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => 'rgba(0, 0, 0, 0.85)',
                    'selectors' => [
                        '{{WRAPPER}} .ht-service-box h3' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titletypography',
                    'selector' => '{{WRAPPER}} .ht-service-box h3',
                ]
            );
            $this->add_responsive_control(
                'margin',
                [
                    'label' => __( 'Title Margin', 'htservice' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ht-service-box h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'item_content_heading',
                [
                    'label' => __( 'Content Style', 'htservice' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'item_content_color',
                [
                    'label' => __( 'Content color', 'htservice' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#555',
                    'selectors' => [
                        '{{WRAPPER}} .ht-service-box p' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .ht-service-box.ht-service-st2 .ht-service-content p' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'contetnttyphography',
                    'selector' => '{{WRAPPER}} .ht-service-box > p,
                    {{WRAPPER}} .ht-service-content p',
                ]
            );
            // Icon Style
            $this->add_control(
                'item_icon_heading',
                [
                    'label' => __( 'Icon Style', 'htservice' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'item_icon_color',
                [
                    'label' => __( 'Icon color', 'htservice' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333',
                    'selectors' => [
                        '{{WRAPPER}} .ht-service-image i' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'icontypography',
                    'selector' => '{{WRAPPER}} .ht-service-image i',
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'border_icone',
                    'label' => __( 'Icon Border', 'htservice' ),
                    'selector' => '{{WRAPPER}} .ht-service-image i',
                ]
            );  
            $this->add_responsive_control(
                'icon_margin',
                [
                    'label' => __( 'Icon margin', 'htservice' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ht-service-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'padding',
                [
                    'label' => __( 'Icon Padding', 'htservice' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ht-service-image i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Read More Style
            $this->add_control(
                'item_read_more_heading',
                [
                    'label' => __( 'Read More Style', 'htservice' ),
                    'type' => Controls_Manager::HEADING,
                    'condition'=>[
                        'read_more_show' =>'yes',
                    ]
                ]
            );
            $this->add_control(
                'item_read_more_color',
                [
                    'label' => __( 'Read More color', 'htservice' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333',
                    'selectors' => [
                        '{{WRAPPER}} .ht-service-content>a' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .ht-service-box.ht-service-st2 .ht-service-content > a' => 'color: {{VALUE}};',
                    ],
                    'condition'=>[
                        'read_more_show' =>'yes',
                    ]
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'read_moretypography',
                    'selector' => '{{WRAPPER}} .ht-service-content>a',
                    'condition'=>[
                        'read_more_show' =>'yes',
                    ]
                ]
            );
            $this->add_responsive_control(
                'read_more_margin',
                [
                    'label' => __( 'Read More Margin', 'htservice' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ht-service-content>a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();

            $this->start_controls_tab(
                'htservice_style_hover_tab',
                [
                    'label' => __( 'Hover', 'htservice' ),
                ]
            );
            $this->add_control(
                'item_title_heading_hover',
                [
                    'label' => __( 'Title Hover Color', 'htservice' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'title_color_hover',
                [
                    'label' => __( 'Title Hover color', 'htservice' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => 'rgba(0, 0, 0, 0.85)',
                    'selectors' => [
                        '{{WRAPPER}} .ht-service-box:hover h3' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'title_color_hover_link',
                [
                    'label' => __( 'Title Hover Link color', 'htservice' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#f3bc16',
                    'selectors' => [
                        '{{WRAPPER}} .ht-service-box h3 a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'item_content_heading_hover',
                [
                    'label' => __( 'Content Hover Style', 'htservice' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'item_content_color_hover',
                [
                    'label' => __( 'Content Hover color', 'htservice' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#555',
                    'selectors' => [
                        '{{WRAPPER}} .ht-service-box:hover p' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'item_icon_heading_hover',
                [
                    'label' => __( 'Icon Hover Style', 'htservice' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'item_icon_color_hover',
                [
                    'label' => __( 'Icon Hover color', 'htservice' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333',
                    'selectors' => [
                        '{{WRAPPER}} .ht-service-box:hover .ht-service-image i' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'item_read_more_color_hover',
                [
                    'label' => __( 'Read More  hover color', 'htservice' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333',
                    'selectors' => [
                        '{{WRAPPER}} .ht-service-box:hover .ht-service-content>a' => 'color: {{VALUE}};',
                    ],
                    'condition'=>[
                        'read_more_show' =>'yes',
                    ]
                ]
            );
            $this->add_control(
                'item_read_more_color_hover_link',
                [
                    'label' => __( 'Read hover link color', 'htservice' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333',
                    'selectors' => [
                        '{{WRAPPER}} .ht-service-content>a:hover' => 'color: {{VALUE}};',
                    ],
                    'condition'=>[
                        'read_more_show' =>'yes',
                    ]
                ]
            );            
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        $this->start_controls_section(
            'item_box_style',
            [
                'label' => __( 'Box Style', 'htservice' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
                'htservice_item_box_style'
            );
                $this->start_controls_tab(
                    'item_box_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'htservice' ),
                    ]
                );
            $this->add_control(
                'overlay_style',
                [
                    'label' => __( 'Overlay Style', 'htservice' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'box_overlay_color',
                [
                    'label' => __( 'Overlay BG Color', 'htservice' ),
                    'type' => Controls_Manager::COLOR,
                    'default'=>'rgba(255,255,255,0)',
                    'selectors' => [
                        '{{WRAPPER}} .ht-service-box' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'box_alignment',
                [
                    'label' => __( 'Content Alignment', 'htservice' ),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'htservice' ),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'htservice' ),
                            'icon' => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'htservice' ),
                            'icon' => 'fa fa-align-right',
                        ],
                    ],
                    'default' => 'center',
                    'selectors' => [
                        '{{WRAPPER}} .ht-service-box' => 'text-align: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'box_margin',
                [
                    'label' => __( 'Margin', 'htservice' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ht-service-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'box_padding',
                [
                    'label' => __( 'Padding', 'htservice' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ht-service-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'box_border_radious',
                [
                    'label' => __( 'Box Border Radius', 'htservice' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .ht-service-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'box_border_single',
                    'label' => __( 'Box Border', 'htservice' ),
                    'selector' => '{{WRAPPER}} .ht-service-box',
                ]
            );
            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'box_shadow',
                    'label' => __( 'Box Shadow', 'htservice' ),
                    'selector' => '{{WRAPPER}} .ht-service-box',
                ]
            );
     
            $this->add_control(
                'content_box_haeading',
                [
                    'label' => __( 'Content Box Style', 'htservice' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_responsive_control(
                'content_box_margin',
                [
                    'label' => __( 'Content Box Margin', 'htservice' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ht-service-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'content_box_padding',
                [
                    'label' => __( 'Content Box Padding', 'htservice' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ht-service-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'content_box_bg',
                [
                    'label' => __('Content BG Color', 'htservice' ),
                    'type' => Controls_Manager::COLOR,
                    'default'=>'rgba(255,255,255,0)',
                    'selectors' => [
                        '{{WRAPPER}} .ht-service-content,
                        {{WRAPPER}} .ht-service-st2 .ht-service-image::before' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                    'item_box_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'htservice' ),
                    ]
                );
                $this->add_control(
                    'box_overlay_hover_color',
                    [
                        'label' => __( 'Overlay Hover  BG Color', 'htservice' ),
                        'type' => Controls_Manager::COLOR,
                        'default'=>'rgba(255,255,255,0)',
                        'selectors' => [
                            '{{WRAPPER}} .ht-service-box:hover' => 'background: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                        'name' => 'box_border_single_hover',
                        'label' => __( 'Box Border Hover', 'htservice' ),
                        'selector' => '{{WRAPPER}} .ht-service-box:hover',
                    ]
                );
                $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                        'name' => 'box_shadow_hover',
                        'label' => __( 'Box Shadow', 'htservice' ),
                        'selector' => '{{WRAPPER}} .ht-service-box:hover',
                    ]
                ); 
                $this->add_control(
                    'content_box_bg_hover',
                    [
                        'label' => __('Content Hover BG', 'htservice' ),
                        'type' => Controls_Manager::COLOR,
                        'default'=>'rgba(255,255,255,0)',
                        'selectors' => [
                            '{{WRAPPER}} .ht-service-box:hover .ht-service-content,
                            {{WRAPPER}} .ht-service-st2:hover .ht-service-image::before' => 'background: {{VALUE}};',
                        ],
                    ]
                );
            $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
        // Carousel Style
        $this->start_controls_section(
            'carousel_style',
            [
                'label' => __( 'Carousel Button', 'htservice' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                        'iteam_layout' => 'carosul',
                    ]
            ]
        );
            $this->start_controls_tabs(
                    'htservice_carousel_style_tabs'
                );
                $this->start_controls_tab(
                    'htservice_carouse_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'htservice' ),
                    ]
                );
                    $this->add_control(
                        'slider_arrow_button_heading',
                        [
                            'label' => __( 'Arrow Button', 'htservice' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );   
                    $this->add_control(
                        'carousel_nav_color',
                        [
                            'label' => __( 'COlor', 'htservice' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#000',
                            'selectors' => [
                                '{{WRAPPER}} .service-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'carousel_nav_bg_color',
                        [
                            'label' => __( 'BG COlor', 'htservice' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .service-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'arrwo_border',
                            'label' => __( 'Border', 'htservice' ),
                            'selector' => '{{WRAPPER}} .service-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow',
                        ]
                    ); 
                    $this->add_control(
                        'carousel_nav_border_radius',
                        [
                            'label' => __( 'Border Radius', 'htservice' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .service-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );

                    $this->add_responsive_control(
                        'carousel_navicon_width',
                        [
                            'label' => __( 'Width', 'htservice' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                            'selectors' => [
                                '{{WRAPPER}} .service-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow' => 'width: {{VALUE}}px;',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'carousel_navicon_height',
                        [
                            'label' => __( 'Height', 'htservice' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                            'selectors' => [
                                '{{WRAPPER}} .service-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow' => 'height: {{VALUE}}px;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'carousel_nav_typography',
                            'selector' => '{{WRAPPER}} .service-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow',
                        ]
                    );
                    $this->add_responsive_control(
                        'carousel_navicon_top_margin',
                        [
                            'label' => __( 'Button Top Position', 'htservice' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => -200,
                            'max' => 200,
                            'step' => 1,
                            'default' => -87,
                            'selectors' => [
                                '{{WRAPPER}} .indicator-style-two.service-active .slick-arrow' => 'top: {{VALUE}}px;',
                            ],
                        ]
                    );                    
                $this->end_controls_tab();
                $this->start_controls_tab(
                    'htservice_carouse_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'htservice' ),
                    ]
                );
                  $this->add_control(
                        'carousel_nav_color_hover',
                        [
                            'label' => __( 'COlor', 'htservice' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#e2a750',
                            'selectors' => [
                                '{{WRAPPER}} .service-active .slick-arrow:hover,{{WRAPPER}} .slider-nav-video-item .slick-arrow:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'carousel_nav_bg_color_hover',
                        [
                            'label' => __( 'BG COlor', 'htservice' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .service-active .slick-arrow:hover,{{WRAPPER}} .slider-nav-video-item .slick-arrow:hover' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'arrwo_border_hover',
                            'label' => __( 'Border', 'htservice' ),
                            'selector' => '{{WRAPPER}} .service-active .slick-arrow:hover,{{WRAPPER}} .slider-nav-video-item .slick-arrow:hover',
                        ]
                    ); 
                    $this->add_control(
                        'carousel_nav_border_radius_hover',
                        [
                            'label' => __( 'Border Radius', 'htservice' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .service-active .slick-arrow:hover,{{WRAPPER}} .slider-nav-video-item .slick-arrow:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();                
        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();

        $iteam_layout = $settings['iteam_layout'];
        $iteam_style = $settings['iteam_style'];
        $caselautoplay = $settings['caselautoplay'];
        $caselarrows = $settings['caselarrows'];
        $caselautoplayspeed = $settings['caselautoplayspeed'];
        $ht_service_item_gutter  = $this->get_settings_for_display('ht_service_item_gutter');
        $showitem = $settings['showitem'];
        $showitemtablet = $settings['showitemtablet'];
        $showitemmobile = $settings['showitemmobile'];        
        $service_img_option = $settings['service_img_option'];
        $title_link_show = $settings['title_link_show'];
        $featured_image_link_show = $settings['featured_image_link_show'];
        $content_show = $settings['content_show'];
        $columns = $this->get_settings_for_display('grid_column_number');
        $arrow_icon_prev        = $this->get_settings_for_display('arrow_icon_prev');
        $arrow_icon_next        = $this->get_settings_for_display('arrow_icon_next');
        $slarrowsstyle = $settings['slarrowsstyle'];
        $get_item_categories = $settings['htservice_categories'];
        $service_img_option2 = $settings['service_img_option2'];
        $read_more_show = $settings['read_more_show'];
        $read_more_show_text = $settings['read_more_show_text'];
        $item_order        = $this->get_settings_for_display('item_order');
        $per_page       = ! empty( $settings['post_per_page'] ) ? $settings['post_per_page'] : 6;
        $titlelength    = ! empty( $settings['title_length'] ) ? $settings['title_length'] : 2;
        $contetnlength  = ! empty( $settings['content_length'] ) ? $settings['content_length'] : 20;
        $btntext        = ! empty( $settings['read_more_btn_txt'] ) ? $settings['read_more_btn_txt'] : '';
        $sectionid =  $this-> get_id();
        $sectionid = 'sid'.$sectionid;
        $htservice_service_image  = $this->get_settings_for_display('htservice_service_image_size');

        $collumval = 'col-lg-3 col-sm-6';
        if( $columns !='' ){
            $colwidth = round(12/$columns);
            $collumval = 'col-lg-'.$colwidth.' col-sm-6';
        }

        ?>
         <?php
                    $item_cates = str_replace(' ', '', $get_item_categories);
                        $htsargs = array(
                            'post_type'            => 'htservice',
                            'posts_per_page'       => $per_page, 
                            'ignore_sticky_posts'  => 1,
                            'order'                => $item_order,
                        );

                        if ( "0" != $get_item_categories) {
                            if( is_array($item_cates) && count($item_cates) > 0 ){
                                $field_name = is_numeric($item_cates[0])?'term_id':'slug';
                                $htsargs['tax_query'] = array(
                                    array(
                                        'taxonomy' => 'htservice_category',
                                        'terms' => $item_cates,
                                        'field' => $field_name,
                                        'include_children' => false
                                    )
                                );
                            }
                        }
                        $htspost = new \WP_Query($htsargs);

                        if($htspost->have_posts() ==0){
                            echo "<p><center>To display services, first create a few services from the HT Service menu located in the Dashboard.</center></p>";
                        }else{ ?>


            <div class="services-area">
                <div class="<?php if( $service_img_option == "img_icon" ){ echo 'ht_service_style2 ';}elseif($service_img_option == "font_icon"){echo 'ht_service_style2 ht_hover_box ';} if($iteam_layout == 'carosul'){ echo 'service-active '.$sectionid; if($slarrowsstyle==2){ echo ' indicator-style-two';} } else echo 'row'; ?>">

                    <?php
                        while($htspost->have_posts()):$htspost->the_post();

                        $icon_images = get_post_meta(get_the_id(),'_htservice_service_icon_img',true); 
                        $servce_icon  = get_post_meta( get_the_ID(),'_htservice_service_icon', true );
                        $servce_icon_type  = get_post_meta( get_the_ID(),'_htservice_service_icon_type', true );
                        $short_des = get_post_meta( get_the_ID(),'_htservice_service_short_des', true ); 
                    ?>
                    <!-- Single Item --> 
                    <?php if($iteam_layout == 'grid') { echo '<div class="'.$collumval.'">'; } ?>

                        <?php if( $iteam_style == 'style1' ){ ?>

                    <div class="ht-service-box">
                        <div class="ht-service-image">
                            <?php if ($service_img_option == "f_image" && has_post_thumbnail()){
                             if ($featured_image_link_show == "yes"){ ?>
                            <a href="<?php the_permalink(); ?>"><?php
                                the_post_thumbnail( $htservice_service_image );
                             echo '</a>';
                         }else{
                            the_post_thumbnail( $htservice_service_image );

                         }

                            }elseif ( $service_img_option == "img_icon" && !empty( $icon_images) ) {
                                ?>
                                <img alt="<?php esc_attr( the_title() );?>" src="<?php echo esc_url($icon_images);?>">
                                <?php
                            }else{
                                if ( $service_img_option == "font_icon" && !empty( $servce_icon) ) {
                             ?>
                                <i class="<?php echo esc_attr($servce_icon) ?>"></i>
                                <?php
                             }
                            }
                             ?> 
                        </div>
                        <div class="ht-service-content">
                            <h3> <?php if( $title_link_show == 'yes' ){?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php echo wp_trim_words( get_the_title(), $titlelength, '' );?>
                                </a>
                            <?php } else{ echo wp_trim_words( get_the_title(), $titlelength, '' );}?>
                            </h3>
                            <?php if( $content_show =='yes' ){ echo '<p>'.wp_trim_words( $short_des, $contetnlength, '' ).'</p>'; }?>
                            <?php if( $read_more_show =='yes' && !empty( $read_more_show_text ) ){ ?>
                                    <a href="<?php the_permalink(); ?>"><?php echo wp_kses_post( $read_more_show_text ); ?> </a>
                            <?php }?>
                        </div>
                    </div>


                    <?php }else{ ?>

                    <div class="ht-service-box ht-service-st2">
                        <div class="ht-service-image">
                            <?php if ( has_post_thumbnail()){
                                the_post_thumbnail( $htservice_service_image );
                            }
                             ?> 
                        </div>
                        <div class="ht-service-content">

                        <?php if ( $service_img_option2 == "img_icon" && !empty( $icon_images) ) {
                                ?>
                                <img alt="<?php esc_attr( the_title() );?>" src="<?php echo esc_url($icon_images);?>">
                                <?php
                            }else{
                                if ( $service_img_option2 == "font_icon" && !empty( $servce_icon) ) {
                             ?>
                                <i class="<?php echo esc_attr($servce_icon) ?>"></i>
                                <?php
                             }
                            } ?>
                            <h3> <?php if( $title_link_show == 'yes' ){ ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php echo wp_trim_words( get_the_title(), $titlelength, '' );?>
                                </a>
                            <?php } else{ echo wp_trim_words( get_the_title(), $titlelength, '' ); }?>
                            </h3>
                            <?php if( $content_show =='yes' ){ echo '<p>'.wp_trim_words( $short_des, $contetnlength, '' ).'</p>'; }?>
                            <?php if( $read_more_show =='yes' && !empty( $read_more_show_text ) ){ ?>
                                    <a href="<?php the_permalink(); ?>"><?php echo wp_kses_post( $read_more_show_text ); ?> </a>
                            <?php }?>
                        </div>
                    </div>


                    <?php } ?>
                    <!-- Single Item -->

                    <?php if($iteam_layout == 'grid'){ echo '</div> ';}?>
                <?php endwhile; ?>
                </div>
            </div>
            <?php if($iteam_layout == 'carosul'){ ?>

                <style>
                    <?php if(!empty($ht_service_item_gutter)){ ?>

                        .<?php echo $sectionid; ?>.service-active .slick-list{
                                margin: 0 -<?php echo $ht_service_item_gutter ?>px;
                            }
                            .<?php echo $sectionid; ?>.service-active .slick-slide{
                                padding:0 <?php echo $ht_service_item_gutter ?>px;
                            }

                    <?php } ?>
        
                </style>


                <script type="text/javascript">
                    jQuery(document).ready(function($) {

                        var _arrows_set = <?php echo esc_js( $caselarrows ) == 'yes' ? 'true': 'false'; ?>;
                        var _autoplay_set = <?php echo esc_js( $caselautoplay ) == 'yes' ? 'true': 'false'; ?>;
                        var _autoplay_speed = <?php if( isset($caselautoplayspeed) ){ echo esc_js($caselautoplayspeed); }else{ echo esc_js(5000); }; ?>;
                        var _showitem_set = <?php if( isset($showitem) ){ echo esc_js($showitem); }else{ echo esc_js(3); }; ?>;
                        var _showitemtablet_set = <?php if( isset($showitemtablet) ){ echo esc_js($showitemtablet); }else{ echo esc_js(2); }; ?>;
                        var _showitemmobile_set = <?php if( isset($showitemmobile) ){ echo esc_js($showitemmobile); }else{ echo esc_js(2); }; ?>;
                        $('.service-active.<?php echo $sectionid;?>').slick({
                            slidesToShow: _showitem_set,
                            arrows:_arrows_set,
                            dots: false,
                            autoplay: _autoplay_set,
                            autoplaySpeed: _autoplay_speed,
                            prevArrow: '<div class="btn-prev"><?php \Elementor\Icons_Manager::render_icon( $settings['arrow_icon_prev'], [ 'aria-hidden' => 'true' ] );?></div>',
                            nextArrow: '<div><?php \Elementor\Icons_Manager::render_icon( $settings['arrow_icon_next'], [ 'aria-hidden' => 'true' ] );?></div>',                        
                            responsive: [
                                    {
                                    breakpoint: 768,
                                    settings: {
                                        slidesToShow: _showitemtablet_set
                                    }
                                    },
                                    {
                                    breakpoint: 575,
                                    settings: {
                                        slidesToShow: _showitemmobile_set
                                    }
                                    }
                                ]
                            });
                        
                    });

                </script>

            <?php }  ?>

        <?php

        wp_reset_query(); wp_reset_postdata();
//query end 
    }

    }

}

htservice_widget_register_manager( new HTService_Elementor_Widget_Service() );