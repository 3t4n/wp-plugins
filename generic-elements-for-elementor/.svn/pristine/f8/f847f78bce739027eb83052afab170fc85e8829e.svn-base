<?php

namespace Generic\Elements;

defined('ABSPATH') || die();

class GenericButton extends GenericWidget
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
        return 'generic-button';
    }

    /**
     * Get widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */

    public function get_title()
    {
        return esc_html__('Generic Button', 'generic-elements');
    }
    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net/bdevselement/heading/';
    }


    public function get_style_depends()
    {
        return ['generic-element-css', 'bootstrap', 'fontawesome'];
    }

    public function get_script_depends()
    {
        return ['generic-element-js', 'bootstrap'];
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
        return 'eicon-button gen-icon';
    }
    public function get_keywords()
    {
        return ['gradient', 'advanced', 'heading', 'title', 'colorful'];
    }
    public function get_categories()
    {
        return ['generic-elements'];
    }


    // register_content_controls
    protected function register_content_controls()
    {
        $this->button_content_controls();
    }

    // button_content_controls
    protected function button_content_controls()
    {

        $this->start_controls_section(
            '_section_button',
            [
                'label' => esc_html__('Button Left', 'generic-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Text', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Button Text',
                'placeholder' => esc_html__('Type button text here', 'generic-elements'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => esc_html__('Link', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => 'https://example.com',
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => '#'
                ],
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

        $this->add_control(
            'button_selected_icon',
            [
                'type' => \Elementor\Controls_Manager::ICONS,
                'fa4compatibility' => 'button_icon',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'button_icon_position',
            [
                'label' => esc_html__('Icon Position', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'label_block' => false,
                'options' => [
                    'before' => esc_html__('Before Text', 'generic-elements'),
                    'after' => esc_html__('After Text', 'generic-elements'),
                ],
                'default' => 'before',
                'toggle' => false,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'button_icon_spacing',
            [
                'label' => esc_html__('Icon Spacing', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .generic-el-btn .generic-btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .generic-el-btn .generic-btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }


    // register_style_controls
    protected function register_style_controls()
    {
        $this->button_style_controls();
    }

    // Button style control
    protected function button_style_controls()
    {
        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => esc_html__('Button', 'generic-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => esc_html__('Padding', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .generic-el-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_margin',
            [
                'label' => esc_html__('Margin', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .generic-el-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .generic-el-btn',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .generic-el-btn',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .generic-el-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .generic-el-btn',
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs('_tabs_button');

        $this->start_controls_tab(
            '_tab_button_normal',
            [
                'label' => esc_html__('Normal', 'generic-elements'),
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => esc_html__('Text Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .generic-el-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => esc_html__('Background Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .generic-el-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gen_button_border_color',
            [
                'label' => esc_html__('Border Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .generic-el-btn' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_button_hover',
            [
                'label' => esc_html__('Hover', 'generic-elements'),
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => esc_html__('Text Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .generic-el-btn:hover, {{WRAPPER}} .generic-el-btn:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => esc_html__('Background Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .generic-el-btn:hover, {{WRAPPER}} .generic-el-btn:focus' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color',
            [
                'label' => esc_html__('Border Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .generic-el-btn:hover' => 'border-color: {{VALUE}};',
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
        $gen_extra_class = $settings['gen_extra_class'];

        if (!empty($settings['button_link'])) {
            $this->add_render_attribute('button', 'class', $gen_extra_class . ' d-inline-flex generic-el-btn');
            $this->add_link_attributes('button', $settings['button_link']);
        }
?>

        <?php if (!empty($settings['button_text'])) : ?>
            <div class="generice-el-btn-wrapper">
                <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                    printf(
                        '<a %1$s>%2$s</a>',
                        $this->get_render_attribute_string('button'),
                        esc_html($settings['button_text'])
                    );
                elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                    <a <?php $this->print_render_attribute_string('button'); ?>><?php generic_elements_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                    <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                    if ($settings['button_icon_position'] === 'before') : ?>
                        <a <?php $this->print_render_attribute_string('button'); ?>><?php generic_elements_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'generic-btn-icon']); ?>
                            <span><?php echo esc_html($settings['button_text']); ?></span></a>
                    <?php
                    else : ?>
                        <a <?php $this->print_render_attribute_string('button'); ?>>
                            <span><?php echo esc_html($settings['button_text']); ?></span>
                            <?php generic_elements_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'generic-btn-icon']); ?>
                        </a>
                <?php
                    endif;
                endif; ?>
            </div>
        <?php endif; ?>
<?php
    }
}
