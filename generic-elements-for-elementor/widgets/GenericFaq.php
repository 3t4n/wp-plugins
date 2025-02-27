<?php

namespace Generic\Elements;

defined('ABSPATH') || die();

class GenericFaq extends GenericWidget
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
        return 'generic-el-faq';
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
        return esc_html__('Generic Faq', 'generic-elements');
    }
    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net/bdevselement/faq/';
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
        return 'eicon-accordion gen-icon';
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
        $this->accoridon_content_controls();
    }

    // register_content_controls
    protected function accoridon_content_controls()
    {

        //faq_list
        $this->start_controls_section(
            'content_faq_section',
            [
                'label' => __('Accordions', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'gen_extra_class',
            [
                'label' => __('Wrapper Class', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('', 'generic-elements'),
                'placeholder' => __('Type your accordion class', 'generic-elements'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gen_faq_id',
            [
                'label' => __('Accordion ID', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('accordion_id', 'generic-elements'),
                'placeholder' => __('accordion id with no space', 'generic-elements'),
                'description' => __('Give a id with no space for accordion.', 'generic-elements'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'acc_active_switch',
            [
                'label' => esc_html__('Show', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'generic-elements'),
                'label_off' => esc_html__('Hide', 'generic-elements'),
                'return_value' => 'yes',
                'default' => '0',
            ]
        );

        $repeater->add_control(
            'faq_title',
            [
                'label' => __('Title', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Accordion Title', 'generic-elements'),
                'placeholder' => __('Accordion Title', 'generic-elements'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'faq_des',
            [
                'label' => __('Content', 'generic-elements'),
                'default' => __('Accordion Content', 'generic-elements'),
                'placeholder' => __('Accordion Content', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'show_label' => false,
            ]
        );

        $this->add_control(
            'accordion_list',
            [
                'label' => __('Accordion Items', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'faq_title' => __('Accordion #1', 'generic-elements'),
                        'faq_des' => __('We reimburse all expenses of the Client for the payment of fines and penalties that were caused by mistakes made by us in accounting and tax accounting and reporting.', 'generic-elements'),
                    ],
                    [
                        'faq_title' => __('Accordion #2', 'generic-elements'),
                        'faq_des' => __('We reimburse all expenses of the Client for the payment of fines and penalties that were caused by mistakes made by us in accounting and tax accounting and reporting.', 'generic-elements'),
                    ],
                    [
                        'faq_title' => __('Accordion #3', 'generic-elements'),
                        'faq_des' => __('We reimburse all expenses of the Client for the payment of fines and penalties that were caused by mistakes made by us in accounting and tax accounting and reporting.', 'generic-elements'),
                    ],
                    [
                        'faq_title' => __('Accordion #4', 'generic-elements'),
                        'faq_des' => __('We reimburse all expenses of the Client for the payment of fines and penalties that were caused by mistakes made by us in accounting and tax accounting and reporting.', 'generic-elements'),
                    ],
                ],
                'title_field' => '{{{ faq_title }}}',
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __('Title Tag', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                    'div' => 'div',
                ],
                'default' => 'h2',
            ]
        );

        $this->end_controls_section();
    }


    // register_style_controls
    protected function register_style_controls()
    {
        $this->accoridon_tityle_style_controls();
        $this->accoridon_body_style_controls();
        $this->accordion_toggle_style_controls();
    }

    // Faq title Style
    protected function accoridon_tityle_style_controls()
    {
        $this->start_controls_section(
            '_section_style_title',
            [
                'label' => esc_html__('Title', 'generic-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'title_padding',
            [
                'label' => esc_html__('Padding', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .generic-el-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__('Margin', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .generic-el-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .generic-el-title',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'title_border',
                'selector' => '{{WRAPPER}} .generic-el-title',
            ]
        );

        $this->add_control(
            'title_border_radius',
            [
                'label' => esc_html__('Border Radius', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .generic-el-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'title_box_shadow',
                'selector' => '{{WRAPPER}} .generic-el-title',
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs('_tabs_title');

        $this->start_controls_tab(
            '_tab_title_normal',
            [
                'label' => esc_html__('Normal', 'generic-elements'),
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Text Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .generic-el-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_bg_color',
            [
                'label' => esc_html__('Background Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .generic-el-title' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'tab_title_border_color',
            [
                'label' => esc_html__('Border Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .generic-el-title' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_title_hover',
            [
                'label' => esc_html__('Hover', 'generic-elements'),
            ]
        );

        $this->add_control(
            'title_hover_color',
            [
                'label' => esc_html__('Text Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .generic-el-title:hover, {{WRAPPER}} .generic-el-title:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_hover_bg_color',
            [
                'label' => esc_html__('Background Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .generic-el-title:hover, {{WRAPPER}} .generic-el-title:focus' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_hover_border_color',
            [
                'label' => esc_html__('Border Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .generic-el-title:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->start_controls_tab(
            '_tab_title_active',
            [
                'label' => esc_html__('Active', 'generic-elements'),

            ]
        );

        $this->add_control(
            'title_active_color',
            [
                'label' => esc_html__('Text Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .generic-el-title:not(.collapsed)' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_active_bg_color',
            [
                'label' => esc_html__('Background Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .generic-el-title:not(.collapsed)' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_active_border_color',
            [
                'label' => esc_html__('Border Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .generic-el-title:not(.collapsed)' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function accoridon_body_style_controls()
    {
        $this->start_controls_section(
            '_section_style_faqdesc',
            [
                'label' => esc_html__('Description', 'generic-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'faqdesc_padding',
            [
                'label' => esc_html__('Padding', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .generic-el-desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'faqdesc_margin',
            [
                'label' => esc_html__('Margin', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .generic-el-desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'faqdesc_typography',
                'selector' => '{{WRAPPER}} .generic-el-desc',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'faqdesc_border',
                'selector' => '{{WRAPPER}} .generic-el-desc',
            ]
        );

        $this->add_control(
            'faqdesc_border_radius',
            [
                'label' => esc_html__('Border Radius', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .generic-el-desc' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'faqdesc_box_shadow',
                'selector' => '{{WRAPPER}} .generic-el-desc',
            ]
        );

        $this->add_control(
            'faqdesc_color',
            [
                'label' => esc_html__('Text Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .generic-el-desc' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'faqdesc_bg_color',
            [
                'label' => esc_html__('Background Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .generic-el-desc' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function accordion_toggle_style_controls()
    {
        $this->start_controls_section(
            '_section_style_faq_toggle',
            [
                'label' => esc_html__('Toggle', 'generic-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'togle_width',
            [
                'label' => esc_html__('Width', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
                    'unit' => 'px',
                ],
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'range' => [
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                    'vw' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .generic-el-title::after' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'togle_height',
            [
                'label' => esc_html__('Height', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
                    'unit' => 'px',
                ],
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'range' => [
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                    'vw' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .generic-el-title::after' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'togle_typography',
                'selector' => '{{WRAPPER}} .generic-el-title::after',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'togle_border',
                'selector' => '{{WRAPPER}} .generic-el-title::after',
            ]
        );

        $this->add_control(
            'togle_border_radius',
            [
                'label' => esc_html__('Border Radius', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .generic-el-title::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('_tabs_togle');

        $this->start_controls_tab(
            '_tab_togle_normal',
            [
                'label' => esc_html__('Normal', 'generic-elements'),
            ]
        );

        $this->add_control(
            'togle_color',
            [
                'label' => esc_html__('Text Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .generic-el-title::after' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'togle_bg_color',
            [
                'label' => esc_html__('Background Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .generic-el-title::after' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'tab_togle_border_color',
            [
                'label' => esc_html__('Border Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .generic-el-title::after' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_togle_hover',
            [
                'label' => esc_html__('Hover', 'generic-elements'),
            ]
        );

        $this->add_control(
            'togle_hover_color',
            [
                'label' => esc_html__('Text Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .generic-el-title:hover::after, {{WRAPPER}} .generic-el-title:focus::after' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'togle_hover_bg_color',
            [
                'label' => esc_html__('Background Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .generic-el-title:hover::after, {{WRAPPER}} .generic-el-title:focus::after' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'togle_hover_border_color',
            [
                'label' => esc_html__('Border Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .generic-el-title:hover::after' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->start_controls_tab(
            '_tab_togle_active',
            [
                'label' => esc_html__('Active', 'generic-elements'),

            ]
        );

        $this->add_control(
            'togle_active_color',
            [
                'label' => esc_html__('Text Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .generic-el-title:not(.collapsed)::after' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'togle_active_bg_color',
            [
                'label' => esc_html__('Background Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .generic-el-title:not(.collapsed)::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'togle_active_border_color',
            [
                'label' => esc_html__('Border Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .generic-el-title:not(.collapsed)::after' => 'border-color: {{VALUE}};',
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

?>
        <div class="generice-el-faq-wrapper <?php echo esc_attr($gen_extra_class); ?>">
            <div class="accordion" id="<?php echo esc_attr($gen_faq_id); ?>">
                <?php foreach ($settings['accordion_list'] as $key => $item) :
                    $key_id = $key + 1;
                    $collapsed = $item['acc_active_switch'] ? '' : 'collapsed';
                    $show = $item['acc_active_switch'] ? 'show' : '';
                ?>
                    <div class="accordion-item">
                        <<?php echo esc_attr($title_tag); ?> class="accordion-header" id="<?php echo esc_attr($gen_faq_id); ?>-heading-<?php echo esc_attr($key_id); ?>">
                            <button class="accordion-button generic-el-title <?php echo esc_attr($collapsed); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($gen_faq_id); ?>-collapse-<?php echo esc_attr($key_id); ?>" aria-expanded="true" aria-controls="<?php echo esc_attr($gen_faq_id); ?>-collapse-<?php echo esc_attr($key_id); ?>">
                                <?php echo wp_kses_post($item['faq_title']); ?>
                            </button>
                        </<?php echo esc_attr($title_tag); ?>>
                        <div id="<?php echo esc_attr($gen_faq_id); ?>-collapse-<?php echo esc_attr($key_id); ?>" class="accordion-collapse collapse <?php echo esc_attr($show); ?>" aria-labelledby="<?php echo esc_attr($gen_faq_id); ?>-heading-<?php echo esc_attr($key_id); ?>" data-bs-parent="#<?php echo esc_attr($gen_faq_id); ?>">
                            <div class="accordion-body generic-el-desc">
                                <?php echo wp_kses_post($item['faq_des']); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
<?php
    }
}
