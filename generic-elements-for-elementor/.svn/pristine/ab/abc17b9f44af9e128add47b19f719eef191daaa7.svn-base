<?php

namespace Generic\Elements;

defined('ABSPATH') || die();

class Testimonial extends GenericWidget
{

    /**
     * Get widget name.
     *
     * Retrieve Generic Elements widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name()
    {
        return 'generic-testimonial';
    }

    /**
     * Get widget title.
     *
     * @return string Widget title.s
     * @since 1.0.0
     * @access public
     *
     */

    public function get_title()
    {
        return esc_html__('Generic Testimonial', 'generic-elements');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net/bdevselement/testimonial/';
    }

    public function get_style_depends()
    {
        return ['bootstrap', 'fontawesome', 'swiper', 'generic-element-css'];
    }

    public function get_script_depends()
    {
        return ['bootstrap', 'swiper', 'generic-element-js'];
    }

    public function get_categories()
    {
        return ['generic-elements'];
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */

    public function get_icon()
    {
        return 'eicon-testimonial gen-icon';
    }

    public function get_keywords()
    {
        return ['testimonial', 'Generic Testimonial'];
    }


    // register_content_controls
    protected function register_content_controls()
    {
        $this->testimonial_slide_controls();
        $this->testimonial_slider_settings();
    }

    // testimonial_slide_controls
    protected function testimonial_slide_controls()
    {
        $this->start_controls_section(
            '_section_slides',
            [
                'label' => esc_html__('Slides', 'generic-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'quote_switch',
            [
                'label' => esc_html__('Quote SWITCHER', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'generic-elements'),
                'label_off' => esc_html__('Hide', 'generic-elements'),
                'return_value' => 'yes',
                'default' => 'yes',
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'image',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => esc_html__('profile Image', 'generic-elements'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'message',
            [
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => esc_html__('Generic Message', 'generic-elements'),
                'placeholder' => esc_html__('Type Generic Message here', 'generic-elements'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'client_name',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('Generic Client Name', 'generic-elements'),
                'placeholder' => esc_html__('Type Client Name here', 'generic-elements'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'designation_name',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('Generic Designation', 'generic-elements'),
                'placeholder' => esc_html__('Type Generic Designation Here', 'generic-elements'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'slides',
            [
                'show_label' => false,
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(client_name || "Carousel Item"); #>',
                'default' => [
                    [
                        'image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'medium_large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->end_controls_section();
    }

    // testimonial_slider_settings
    protected function testimonial_slider_settings()
    {
        $this->start_controls_section(
            '_section_settings',
            [
                'label' => esc_html__('Settings', 'generic-elements'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'ts_slider_autoplay',
            [
                'label' => esc_html__('Autoplay', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'generic-elements'),
                'label_off' => esc_html__('No', 'generic-elements'),
                'return_value' => 'yes',
                'default' => 'no'
            ]
        );

        $this->add_control(
            'ts_slider_speed',
            [
                'label' => esc_html__('Slider Speed', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'placeholder' => esc_html__('Enter Slider Speed', 'generic-elements'),
                'default' => '5000',
                'condition' => ["ts_slider_autoplay" => ['yes']],
            ]
        );

        $this->add_control(
            'ts_slider_loop',
            [
                'label' => esc_html__('Loop', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'generic-elements'),
                'label_off' => esc_html__('No', 'generic-elements'),
                'return_value' => 'yes',
                'default' => 'no'
            ]
        );

        $this->add_control(
            'ts_slider_per_view',
            [
                'label' => esc_html__('Nav slides Per View', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'placeholder' => esc_html__('Enter slides Per View', 'generic-elements'),
                'default' => '3',
            ]
        );

        $this->add_control(
            'ts_slider_nav_show',
            [
                'label' => esc_html__('Nav show', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'generic-elements'),
                'label_off' => esc_html__('No', 'generic-elements'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'ts_slider_dot_nav_show',
            [
                'label' => esc_html__('Dot nav', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'generic-elements'),
                'label_off' => esc_html__('No', 'generic-elements'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();
    }


    // register_style_controls
    protected function register_style_controls()
    {
        $this->testimonial_title_content_controls();
        $this->testimonial_slider_nav_arrow_style_controls();
        $this->testimonial_slider_dost_style_controls();
    }

    // testimonial_title_content_controls
    protected function testimonial_title_content_controls()
    {
        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => esc_html__('Testimonial Content', 'generic-elements'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Title
        $this->add_control(
            '_heading_title',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => esc_html__('Author Name', 'generic-elements'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => esc_html__('Bottom Spacing', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Text Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .bdevs-el-title',
            ]
        );

        // Subtitle
        $this->add_control(
            '_heading_subtitle',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => esc_html__('Designation', 'generic-elements'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'subtitle_spacing',
            [
                'label' => esc_html__('Bottom Spacing', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__('Text Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .bdevs-el-subtitle',
            ]
        );

        // description
        $this->add_control(
            '_content_description',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => esc_html__('Message', 'generic-elements'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'description_spacing',
            [
                'label' => esc_html__('Bottom Spacing', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-content' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Text Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-content' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description',
                'selector' => '{{WRAPPER}} .bdevs-el-content',
            ]
        );

        // Quote
        $this->add_control(
            '_heading_quote_icon',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => esc_html__('Quote Icon', 'generic-elements'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            '_heading_quote_icon_spacing',
            [
                'label' => esc_html__('Bottom Spacing', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .test-quote-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            '_heading_quote_icon_color',
            [
                'label' => esc_html__('Icon Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bd-testimonial-item .bd-testimonial-icon i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    // testimonial_slider_dost_style_controls
    protected function testimonial_slider_nav_arrow_style_controls()
    {
        $this->start_controls_section(
            '_section_style_arrow',
            [
                'label' => esc_html__('Navigation - Arrow', 'generic-elements'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'arrow_position_toggle',
            [
                'label' => esc_html__('Position', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'label_off' => esc_html__('None', 'generic-elements'),
                'label_on' => esc_html__('Custom', 'generic-elements'),
                'return_value' => 'yes',
            ]
        );

        $this->start_popover();

        $this->add_responsive_control(
            'arrow_position_y',
            [
                'label' => esc_html__('Vertical', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'arrow_position_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slider-button-prev, {{WRAPPER}} .slider-button-next' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'arrow_position_x',
            [
                'label' => esc_html__('Horizontal', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'arrow_position_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 250,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slider-button-prev' => 'left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .slider-button-next' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_popover();

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'arrow_border',
                'selector' => '{{WRAPPER}} .slider-button-prev, {{WRAPPER}} .slider-button-next',
            ]
        );

        $this->add_responsive_control(
            'arrow_border_radius',
            [
                'label' => esc_html__('Border Radius', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .slider-button-prev, {{WRAPPER}} .slider-button-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'testimonial-nav',
                'selector' => '{{WRAPPER}} .generic-testimonial-nav',
            ]
        );

        $this->start_controls_tabs('_tabs_arrow');

        $this->start_controls_tab(
            '_tab_arrow_normal',
            [
                'label' => esc_html__('Normal', 'generic-elements'),
            ]
        );

        $this->add_control(
            'arrow_color',
            [
                'label' => esc_html__('Text Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .slider-button-prev, {{WRAPPER}} .slider-button-next' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_bg_color',
            [
                'label' => esc_html__('Background Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-button-prev, {{WRAPPER}} .slider-button-next' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_arrow_hover',
            [
                'label' => esc_html__('Hover', 'generic-elements'),
            ]
        );

        $this->add_control(
            'arrow_hover_color',
            [
                'label' => esc_html__('Text Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-button-prev:hover, {{WRAPPER}} .slider-button-next:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_bg_color',
            [
                'label' => esc_html__('Background Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-button-prev:hover, {{WRAPPER}} .slider-button-next:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_border_color',
            [
                'label' => esc_html__('Border Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'arrow_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .slider-button-prev:hover, {{WRAPPER}} .slider-button-next:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    // testimonial_slider_dost_style_controls
    protected function testimonial_slider_dost_style_controls()
    {
        $this->start_controls_section(
            '_section_style_dots',
            [
                'label' => esc_html__('Navigation - Dots', 'generic-elements'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'dots_nav_position_y',
            [
                'label' => esc_html__('Vertical Position', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .generic-el-testimonial-slider-paginations' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_nav_spacing',
            [
                'label' => esc_html__('Spacing', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .generic-el-testimonial-slider-paginations span' => 'margin-right: calc({{SIZE}}{{UNIT}} / 2); margin-left: calc({{SIZE}}{{UNIT}} / 2);',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_nav_align',
            [
                'label' => esc_html__('Alignment', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'start' => [
                        'title' => esc_html__('Left', 'generic-elements'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'generic-elements'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'end' => [
                        'title' => esc_html__('Right', 'generic-elements'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .generic-el-testimonial-slider-paginations' => 'text-align: {{VALUE}}'
                ]
            ]
        );

        $this->start_controls_tabs('_tabs_dots');
        $this->start_controls_tab(
            '_tab_dots_normal',
            [
                'label' => esc_html__('Normal', 'generic-elements'),
            ]
        );

        $this->add_control(
            'dots_nav_color',
            [
                'label' => esc_html__('Background Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .generic-el-testimonial-dots-wrap .swiper-pagination-bullet' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_dots_active',
            [
                'label' => esc_html__('Active', 'generic-elements'),
            ]
        );

        $this->add_control(
            'dots_nav_active_color',
            [
                'label' => esc_html__('Background Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .generic-el-testimonial-dots-wrap .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }


    // Render Function
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        extract($settings);

        // ================
        $show_navigation   =   $settings["ts_slider_nav_show"] == "yes" ? true : false;
        $slider_loop_active   =   $settings["ts_slider_loop"] == "yes" ? true : false;
        $auto_nav_slide    =   $settings['ts_slider_autoplay'];
        $dot_nav_show      =   $settings['ts_slider_dot_nav_show'];
        $ts_slider_speed   =   $settings['ts_slider_speed'] ? $settings['ts_slider_speed'] : '5000';

        $ts_slider_per_view   =   $settings['ts_slider_per_view'] ? $settings['ts_slider_per_view'] : '3';

        // ================
        if (empty($settings['slides'])) {
            return;
        }

        $title = wp_kses_post($settings['title'] ?? '');
?>
        <section class="bdevs-generic-el bd-testimonial-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="bd-testimonial swiper testimonial-text mb-50" slider-view="<?php echo esc_attr($ts_slider_per_view); ?>" loop-active="<?php echo $slider_loop_active; ?>" autoplay-speed="<?php echo esc_attr($ts_slider_speed); ?>" data-swipper_autoplay_stop="<?php echo $auto_nav_slide; ?>">
                            <div class="swiper-wrapper">
                                <?php foreach ($settings['slides'] as $slide) : ?>
                                    <div class="swiper-slide">
                                        <div class="bd-testimonial-item text-center">
                                            <?php if (!empty($slide['quote_switch'])) : ?>
                                                <div class="bd-testimonial-icon test-quote-icon mb-45">
                                                    <i class="fas fa-quote-left"></i>
                                                </div>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['message'])) : ?>
                                                <p class="mb-25 bdevs-el-content"><?php echo wp_kses_post($slide['message']); ?></p>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['client_name'])) : ?>
                                                <h3 class="bd-testimonial-title bdevs-el-title"><?php echo wp_kses_post($slide['client_name']); ?></h3>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['designation_name'])) : ?>
                                                <span class="bdevs-el-subtitle"><?php echo wp_kses_post($slide['designation_name']); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="swiper-container testimonial-nav" slider-view="<?php echo esc_attr($ts_slider_per_view); ?>" loop-active="<?php echo $slider_loop_active; ?>" tes-speed="<?php echo esc_attr($ts_slider_speed); ?>" autoplay-toggle="<?php echo esc_attr($ts_slider_autoplay); ?>">
                            <div class="swiper-wrapper">
                                <?php foreach ($settings['slides'] as $slide) :
                                    if (!empty($slide['image']['id'])) {
                                        $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                                    }
                                ?>
                                    <?php if (!empty($slide['image']['url'])) : ?>
                                        <div class="swiper-slide">
                                            <div class="bd-testimonial-img">
                                                <img src="<?php print esc_url($slide['image']['url']); ?>" alt="img not found">
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if (!empty($show_navigation)) : ?>
                    <div class="generic-slider-nav">
                        <div class="generic-testimonial-nav slider-button-prev"><i class="far fa-angle-left"></i></div>
                        <div class="generic-testimonial-nav slider-button-next"><i class="far fa-angle-right"></i></div>
                    </div>
                <?php endif; ?>

                <?php if (!empty($dot_nav_show)) : ?>
                    <!-- If we need pagination -->
                    <div class="generic-el-testimonial-dots-wrap">
                        <div class="generic-el-testimonial-slider-paginations slide-dots"></div>
                    </div>
                <?php endif; ?>
            </div>
        </section>
<?php
    }
}
