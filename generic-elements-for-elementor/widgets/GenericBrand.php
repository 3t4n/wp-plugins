<?php

namespace Generic\Elements;

defined('ABSPATH') || die();

class GenericBrand extends GenericWidget
{

    /**
     * Get widget name.
     *
     * Retrieve Generic Elements widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */

    public function get_name()
    {
        return 'generic-el-brand';
    }

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */

    public function get_title()
    {
        return esc_html__('Generic Brand', 'generic-elements');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net/bdevselement/generic-brand/';
    }

    public function get_style_depends()
    {
        return ['bootstrap', 'odometer-css', 'fontawesome', 'generic-element-css'];
    }

    public function get_script_depends()
    {
        return ['bootstrap', 'odometer-js', 'appear-js', 'waypoints-js', 'generic-element-js'];
    }


    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-gallery-grid gen-icon';
    }

    public function get_keywords()
    {
        return ['fact', 'image', 'brand', 'client'];
    }

    public function get_categories()
    {
        return ['generic-elements'];
    }


    /**
     * Register widget content controls
     */
    protected function register_content_controls()
    {
        $this->generic_brand_content_controls();
        $this->generic_brand_settings_controls();
    }

    // generic_brand_content_controls
    protected function generic_brand_content_controls()
    {
        // Fact List
        $this->start_controls_section(
            '_section_settingss',
            [
                'label' => esc_html__('Brand Item', 'generic-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'gen_extra_class',
            [
                'label' => esc_html__('Additonal Class', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => esc_html__('Type your css class name', 'generic-elements'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
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
                'title_field' => esc_html__('Brand Item', 'generic-elements'),
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
                ]
            ]
        );

        $this->end_controls_section();
    }

    // generic_brand_settings_controls
    protected function generic_brand_settings_controls()
    {
        $this->start_controls_section(
            '_section_generic_brand_settings',
            [
                'label' => esc_html__('Settings', 'generic-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => esc_html__('Alignment', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
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
                    '{{WRAPPER}} .generic-el-brand' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();
    }


    /**
     * Register widget style controls
     */
    protected function register_style_controls()
    {
        $this->generic_brand_style_controls();
    }

    protected function generic_brand_style_controls()
    {
        $this->start_controls_section(
            '_section_generic_brand_style',
            [
                'label' => esc_html__('Brand Style', 'generic-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'brand_display',
            [
                'label' => esc_html__('Display', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__('Default', 'generic-elements'),
                    'inline' => esc_html__('Inline', 'elementor'),
                    'inline-block' => esc_html__('Inline Block', 'generic-elements'),
                    'block' => esc_html__('Block', 'generic-elements'),
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .generic-el-brand' => 'display: {{VALUE}}; overflow: hidden;',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'brand-background',
                'types' => ['classic', 'gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .generic-el-brand',
            ]
        );

        $this->add_responsive_control(
            'brand_padding',
            [
                'label' => esc_html__('Padding', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .generic-el-brand' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'brand_border',
                'selector' => '{{WRAPPER}} .generic-el-brand',
            ]
        );

        $this->add_control(
            'brand_border_radius',
            [
                'label' => esc_html__('Border Radius', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .generic-el-brand' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'brand_box_shadow',
                'selector' => '{{WRAPPER}} .generic-el-brand',
            ]
        );



        $this->add_control(
            'opacity',
            [
                'label' => esc_html__('Opacity', 'elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .generic-el-brand img' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_control(
            'heading_hover_effect',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => esc_html__('Hover Effect', 'generic-elements'),
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'brand-hvr-background',
                'types' => ['classic', 'gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .generic-el-brand:hover',
            ]
        );


        $this->add_control(
            'hvr_border_color',
            [
                'label' => esc_html__('Hover Border Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .generic-el-brand:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'hvr_opacity',
            [
                'label' => esc_html__('Hover Opacity', 'elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .generic-el-brand:hover img' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }


    // Render Function
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $gen_extra_class = $settings['gen_extra_class'];
?>

        <div class="generice-el-wrapper <?php echo esc_attr($gen_extra_class); ?>">
            <div class="swiper generic-el-brand-active">
                <div class="swiper-wrapper">
                    <?php foreach ($settings['slides'] as $slide) :
                        if (!empty($slide['image']['id'])) {
                            $this->add_render_attribute('image', 'src', $slide['image']['url']);
                            $this->add_render_attribute('image', 'alt', \Elementor\Control_Media::get_image_alt($slide['image']));
                            $this->add_render_attribute('image', 'title', \Elementor\Control_Media::get_image_title($slide['image']));
                        }
                    ?>
                        <div class="swiper-slide">
                            <div class="generic-el-brand">
                                <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($slide, 'thumbnail_size', 'image'); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
<?php
    }
}
