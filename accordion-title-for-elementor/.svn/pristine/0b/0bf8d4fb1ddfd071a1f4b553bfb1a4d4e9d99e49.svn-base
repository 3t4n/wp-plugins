<?php

class ATFE_Widget extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return "elementor_accordion_title";
    }

    public function get_title()
    {
        return __("Accordion title row", "elementor_accordion_title");
    }

    public function get_icon()
    {
        return "eicon-accordion";
    }

    public function get_categories()
    {
        return ["general"];
    }

    protected function register_controls()
    {
        $this->start_controls_section("content_section", [
            "label" => __("Text", "elementor_accordion_title"),
            "tab" => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control("info_note", [
            "type" => \Elementor\Controls_Manager::RAW_HTML,
            "label" => __("Info", "elementor_accordion_title"),
            "raw" => __(
                "The accordion title row will open/close the following container. The container is marked with a red border in the editor.",
                "elementor_accordion_title"
            ),
        ]);

        $this->add_control("widget_title_text", [
            "label" => __("Text", "elementor_accordion_title"),
            "type" => \Elementor\Controls_Manager::TEXT,
            "default" => __("Headline", "elementor_accordion_title"),
            "placeholder" => __(
                "Type the accordion title here",
                "elementor_accordion_title"
            ),
        ]);

        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__('Title tag', 'elementor_accordion_title'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'div',
                'options' => [
                    'div' => esc_html__('div', 'elementor_accordion_title'),
                    'span' => esc_html__('span', 'elementor_accordion_title'),
                    'p' => esc_html__('p', 'elementor_accordion_title'),
                    'h1' => esc_html__('h1', 'elementor_accordion_title'),
                    'h2' => esc_html__('h2', 'elementor_accordion_title'),
                    'h3' => esc_html__('h3', 'elementor_accordion_title'),
                    'h4' => esc_html__('h4', 'elementor_accordion_title'),
                    'h5' => esc_html__('h5', 'elementor_accordion_title')
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                "name" => "content_typography",
                "selector" => "{{WRAPPER}} .apfe__title_row",
            ]
        );

        $this->add_control("title_color", [
            "label" => __("Font color", "elementor_accordion_title"),
            "type" => \Elementor\Controls_Manager::COLOR,
            "selectors" => [
                "{{WRAPPER}} .apfe__title_row" => "color: {{VALUE}}",
            ],
        ]);

        $this->add_control("padding", [
            "label" => __("Padding", "elementor_accordion_title"),
            "type" => \Elementor\Controls_Manager::DIMENSIONS,
            "size_units" => ["px", "%", "em"],
            "selectors" => [
                "{{WRAPPER}} .apfe__title_row" =>
                    "padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};",
            ],
        ]);

        $this->end_controls_section();

        $this->start_controls_section("content_section2", [
            "label" => __("Background", "elementor_accordion_title"),
            "tab" => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                "name" => "background",
                "label" => __("Background", "elementor_accordion_title"),
                "types" => ["classic", "gradient"],
                "selector" => "{{WRAPPER}} .apfe__title_row",
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section("content_section3", [
            "label" => __("Border", "elementor_accordion_title"),
            "tab" => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            "name" => "border",
            "label" => __("Border", "elementor_accordion_title"),
            "selector" => "{{WRAPPER}} .apfe__title_row",
        ]);

        $this->end_controls_section();

        $this->start_controls_section("content_arrow", [
            "label" => __("Arrow", "elementor_accordion_title"),
            "tab" => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control("arrow_style", [
            "label" => __("Arrow type", "plugin-name"),
            "type" => \Elementor\Controls_Manager::SELECT,
            "default" => "arrow",
            "options" => [
                "arrow" => __("Arrow", "plugin-name"),
                "plus" => __("Plus/Minus", "plugin-name"),
            ],
        ]);

        $this->add_control("arrow_color", [
            "label" => __("Arrow color", "elementor_accordion_title"),
            "type" => \Elementor\Controls_Manager::COLOR,
            "selectors" => [
                "{{WRAPPER}} .apfe__title_row .apfe__arrow" =>
                    "border-color: {{VALUE}}",
                "{{WRAPPER}} .apfe__title_row .apfe__plus1" =>
                    "background-color: {{VALUE}}",
                "{{WRAPPER}} .apfe__title_row .apfe__plus2" =>
                    "background-color: {{VALUE}}",
            ],
        ]);

        $this->add_control("arrow_right", [
            "label" => __("Position (right)", "elementor_accordion_title"),
            "type" => \Elementor\Controls_Manager::SLIDER,
            "size_units" => ["px", "%"],
            "range" => [
                "px" => ["min" => 1, "max" => 100, "step" => 1],
                "%" => ["min" => 0, "max" => 100],
            ],
            "default" => ["unit" => "px", "size" => 10],
            "selectors" => [
                "{{WRAPPER}} .apfe__title_row .apfe__arrow" =>
                    "right:  {{SIZE}}{{UNIT}};",
                "{{WRAPPER}} .apfe__title_row .apfe__plus" =>
                    "right:  {{SIZE}}{{UNIT}};",
            ],
        ]);

        $this->add_control("arrow_width", [
            "label" => __("Width", "elementor_accordion_title"),
            "type" => \Elementor\Controls_Manager::SLIDER,
            "size_units" => ["px"],
            "range" => ["px" => ["min" => 1, "max" => 100, "step" => 1]],
            "default" => ["unit" => "px", "size" => 2],
            "selectors" => [
                "{{WRAPPER}} .apfe__title_row .apfe__arrow" =>
                    "border-width:  {{SIZE}}{{UNIT}};",
                "{{WRAPPER}} .apfe__title_row .apfe__plus1" =>
                    "height:  {{SIZE}}{{UNIT}};",
                "{{WRAPPER}} .apfe__title_row .apfe__plus2" =>
                    "width:  {{SIZE}}{{UNIT}};",
            ],
        ]);

        $this->add_control("arrow_size", [
            "label" => __("Size", "elementor_accordion_title"),
            "type" => \Elementor\Controls_Manager::SLIDER,
            "size_units" => ["px"],
            "range" => ["px" => ["min" => 1, "max" => 100, "step" => 1]],
            "default" => ["unit" => "px", "size" => 10],
            "selectors" => [
                "{{WRAPPER}} .apfe__title_row .apfe__arrow" =>
                    "width:  {{SIZE}}{{UNIT}}; height:  {{SIZE}}{{UNIT}};",
                "{{WRAPPER}} .apfe__title_row .apfe__plus" =>
                    "width:  {{SIZE}}{{UNIT}}; height:  {{SIZE}}{{UNIT}};",
                "{{WRAPPER}} .apfe__title_row .apfe__plus .apfe__plus1" =>
                    "width:  {{SIZE}}{{UNIT}};",
                "{{WRAPPER}} .apfe__title_row .apfe__plus .apfe__plus2" =>
                    "height:  {{SIZE}}{{UNIT}};",
            ],
        ]);

        $this->end_controls_section();

        $this->start_controls_section("general_section", [
            "label" => __("Accordion content", "elementor_accordion_title"),
            "tab" => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control("important_note", [
            "type" => \Elementor\Controls_Manager::RAW_HTML,
            "raw" => __(
                "Here you set some properties of the following content container.",
                "elementor_accordion_title"
            ),
        ]);

        $this->add_control("show_border", [
            "label" => __("Show border", "elementor_accordion_title"),
            "type" => \Elementor\Controls_Manager::SWITCHER,
            "label_on" => __("Show", "your-plugin"),
            "label_off" => __("Hide", "your-plugin"),
            "return_value" => "yes",
            "default" => "no",
        ]);

        $this->add_control("content_border_width", [
            "label" => __("Border width", "elementor_accordion_title"),
            "type" => \Elementor\Controls_Manager::SLIDER,
            "size_units" => ["px"],
            "range" => ["px" => ["min" => 1, "max" => 100, "step" => 1]],
            "default" => ["unit" => "px", "size" => 1],
            "selectors" => [
                ".elementor-widget-elementor_accordion_title.apfe__border.open+.elementor-element" =>
                    "border-width:  {{SIZE}}{{UNIT}};",
            ],
        ]);

        $this->add_control("content_border_color", [
            "label" => __("Border color", "elementor_accordion_title"),
            "type" => \Elementor\Controls_Manager::COLOR,
            "selectors" => [
                ".elementor-widget-elementor_accordion_title.apfe__border.open+.elementor-element" =>
                    "border-right-color: {{VALUE}};border-bottom-color: {{VALUE}};border-left-color: {{VALUE}};",
            ],
        ]);

        $this->add_control("content_padding", [
            "label" => __("Padding", "elementor_accordion_title"),
            "type" => \Elementor\Controls_Manager::DIMENSIONS,
            "size_units" => ["px", "%", "em"],
            "selectors" => [
                ".elementor-widget-elementor_accordion_title.open+.elementor-element" =>
                    "padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};",
                ".elementor-widget-elementor_accordion_title+.elementor-element" =>
                    "padding: 0 {{RIGHT}}{{UNIT}} 0 {{LEFT}}{{UNIT}};",
            ],
        ]);

        $this->end_controls_section();
    }

    public function get_script_depends()
    {
        wp_register_script(
            "atfe_script",
            plugins_url("../scripts/main.js", __FILE__),
            "",
            "",
            false
        );
        return ["atfe_script"];
    }

    public function get_style_depends()
    {
        wp_register_style(
            "atfe_styles",
            plugins_url("../styles/main.css", __FILE__)
        );
        return ["atfe_styles"];
    }

    protected function render()
    {
        $isEditor = \Elementor\Plugin::$instance->editor->is_edit_mode();
        $settings = $this->get_settings_for_display();
        $accordionTitle = $settings["widget_title_text"];
        $arrowStyle = $settings["arrow_style"];
        $borderClass = "";
        $clickEvent = "";

        $titleTag = "div";
        if (in_array(esc_attr($settings["title_tag"]), ['h1','h2','h3','h4', 'h5','p','div', 'span'])) {
            $titleTag = esc_attr($settings["title_tag"]);
        }

        if ("yes" === $settings["show_border"]) {
            $borderClass = " apfe__border ";
        }
        if (!$isEditor) {
            $clickEvent = 'onClick="elementor_accordion_titleClickRow(this)"';
        }
        echo '<div class="apfe__title_row ' .
            esc_attr($borderClass) .
            '" ' .
            wp_kses_post($clickEvent) .
            ">";
        echo "<".esc_attr($titleTag).">" . esc_attr($accordionTitle) . "</".esc_attr($titleTag).">";
        if ($arrowStyle == "arrow") {
            echo '<div class="apfe__arrow"></div>';
        } elseif ($arrowStyle == "plus") {
            echo '<div class="apfe__plus">';
            echo '  <div class="apfe__plus1"></div>';
            echo '  <div class="apfe__plus2"></div>';
            echo "</div>";
        }
        echo "</div>";
    }

    protected function _content_template()
    {
    }
}
