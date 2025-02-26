<?php
    $bgTypeData = 'background: transparent;';
    if ($bgType == 2) {
        $bgTypeData = "background-color:" . (isset($cssData['template_background_color']) ? esc_attr($cssData['template_background_color']) : 'rgba(255, 255, 255, 0)');
    } else if ($bgType == 3) {
        $bgTypeData = "background-image: url('" . (isset($cssData['box_background_image']) ? esc_attr($cssData['box_background_image']) : 'rgba(255, 255, 255, 0)') . "');";
    }

    $bottom_align = "margin-left: auto; margin-right: auto";
    if (isset($cssData['button_align']) && $cssData['button_align'] !== '') {
        if ($cssData['button_align'] == 'right') {
            $bottom_align = "margin-left: auto;";
        } else if ($cssData['button_align'] == 'left') {
            $bottom_align = "margin-right: auto;";
        }
    }

    $customCSS = "
        .anc-6310-counter-row {
            font-size: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .anc-6310-counter-01-paralax {
            {$bgTypeData};
            background-size: Cover;
            background-repeat: No-repeat;
            background-position: center center;
            background-attachment: fixed;
            overflow: hidden;
            font-size: 0;
        }
        .anc-6310-counter-01-common-overlay iframe {
            position: absolute;
            top: -100%;
            left: 0;
            width: 100%;
            height: 300%;
            pointer-events: none;
            opacity: .7;
        }
        .anc-6310-counter-01-common-overlay {
            background-color: " . (isset($cssData['image_overlay_color']) ? esc_attr($cssData['image_overlay_color']) : '#000') . ";
            overflow: hidden;
            font-size: 0;
            position: relative;
            padding-top: 30px;
        }
        .anc-6310-counter-01 {
            width: calc(100% - " . esc_attr(($cssData['box_border_width']?$cssData['box_border_width']:0) * 2) . "px);
            overflow: hidden;
            box-shadow: 0 0 " . esc_attr(($cssData['box_shadow_blur']?$cssData['box_shadow_blur']:0) * 2) . "px ".esc_attr($cssData['box_shadow_width'])."px ".esc_attr($cssData['box_shadow_color']).";
            font-family: Amaranth;
            letter-spacing: 0.11em;
            -webkit-border-radius: ".esc_attr($cssData['box_radius'])."px;
            -o-border-radius: ".esc_attr($cssData['box_radius'])."px;
            -moz-border-radius: ".esc_attr($cssData['box_radius'])."px;
            -ms-border-radius: ".esc_attr($cssData['box_radius'])."px;
            border-radius: ".esc_attr($cssData['box_radius'])."px;
            border-style: solid;
            border-width: ".esc_attr($cssData['box_border_width'])."px;
            border-color: ".esc_attr($cssData['box_border_color']).";
            height: calc(100% - ".esc_attr(($cssData['box_border_width']?$cssData['box_border_width']:0) * 2)."px);
            -webkit-transition: all 0.3s ease 0s;
            -moz-transition: all 0.3s ease 0s;
            -ms-transition: all 0.3s ease 0s;
            -o-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
        }
        .anc-6310-counter-01:hover {
            margin-top: -7px;
            margin-bottom: 7px;
            box-shadow: 0 0 ".esc_attr(($cssData['box_shadow_blur']?$cssData['box_shadow_blur']:0) * 2)."px ".esc_attr($cssData['box_shadow_width'])."px ".esc_attr($cssData['box_shadow_hover_color']).";
            border-color: ".esc_attr($cssData['box_border_hover_color']).";
        }
        .anc-6310-counter-01-top-container {
            min-height: 210px;
            position: relative;
            background-size: cover;
            background-repeat: no-repeat;
            display: block;
        }
        .anc-6310-counter-01-top-container::before {
            content: '';
            background-color: ".(isset($cssData['image_overlay_color']) ? esc_attr($cssData['image_overlay_color']) : '#000').";
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }
        .anc-6310-counter-01:hover .anc-6310-counter-01-top-container::before {
            content: '';
            background-color: ".(isset($cssData['image_overlay_hover_color']) ? esc_attr($cssData['image_overlay_hover_color']) : '#000').";
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }
        .anc-6310-counter-01-count-title {
            position: relative;
            z-index: 1;
            font-family: ".(isset($cssData['title_font_family']) ? str_replace("+", " ", esc_attr($cssData['title_font_family'])) : 'Amaranth').";
            font-weight: ".(isset($cssData['title_font_weight']) ? esc_attr($cssData['title_font_weight']) : '400').";
            font-size: ".(isset($cssData['title_font_size']) ? esc_attr($cssData['title_font_size']) : '24')."px;
            color: ".(isset($cssData['title_font_color']) ? esc_attr($cssData['title_font_color']) : '#000').";
            text-transform: ".(isset($cssData['title_text_transform']) ? esc_attr($cssData['title_text_transform']) : 'uppercase').";
            line-height: ".(isset($cssData['title_line_height']) ? esc_attr($cssData['title_line_height']) : '30')."px;
            padding-top: ".(isset($cssData['title_margin_top']) ? esc_attr($cssData['title_margin_top']) : '0')."px;
            padding-bottom: ".(isset($cssData['title_margin_bottom']) ? esc_attr($cssData['title_margin_bottom']) : '0')."px;
            margin-left: ".(isset($cssData['title_margin_left']) ? esc_attr($cssData['title_margin_left']) : '0')."px;
            margin-right: ".(isset($cssData['title_margin_right']) ? esc_attr($cssData['title_margin_right']) : '0')."px;
            text-align: ".(isset($cssData['title_text_align']) ? esc_attr($cssData['title_text_align']) : 'center').";
            word-break: break-word;
        }
        .anc-6310-counter-01:hover .anc-6310-counter-01-count-title {
            color: ".(isset($cssData['title_font_hover_color']) ? esc_attr($cssData['title_font_hover_color']) : '#000').";
        }
        .anc-6310-counter-01-bottom-container {
            background-color: ".(isset($cssData['box_background_color']) ? esc_attr($cssData['box_background_color']) : '#fff').";
            padding: 65px 20px 20px;
            position: relative;
            height: 100%;
        }
        .anc-6310-counter-01:hover .anc-6310-counter-01-bottom-container {
            background-color: ".(isset($cssData['box_background_hover_color']) ? esc_attr($cssData['box_background_hover_color']) : '#fff').";
        }
        .anc-6310-counter-01-count-content {
            position: absolute;
            top: -".(isset($cssData['number_box_size']) && $cssData['number_box_size'] ? esc_attr($cssData['number_box_size']) / 2 : '0')."px;
            left: calc(50% - ".(isset($cssData['number_box_size']) && $cssData['number_box_size'] ? esc_attr($cssData['number_box_size']) / 2 : '0')."px);
            width: ".(isset($cssData['number_box_size']) && $cssData['number_box_size'] ? esc_attr($cssData['number_box_size']) : '0')."px;
            height: ".(isset($cssData['number_box_size']) && $cssData['number_box_size'] ? esc_attr($cssData['number_box_size']) : '0')."px;
            background-color: ".(isset($cssData['number_background_color']) ? esc_attr($cssData['number_background_color']) : '#fff').";
            -webkit-border-radius: ".(isset($cssData['number_box_radius']) ? esc_attr($cssData['number_box_radius']) : '0')."px;
            -o-border-radius: ".(isset($cssData['number_box_radius']) ? esc_attr($cssData['number_box_radius']) : '0')."px;
            -moz-border-radius: ".(isset($cssData['number_box_radius']) ? esc_attr($cssData['number_box_radius']) : '0')."px;
            -ms-border-radius: ".(isset($cssData['number_box_radius']) ? esc_attr($cssData['number_box_radius']) : '0')."px;
            border-radius: ".(isset($cssData['number_box_radius']) ? esc_attr($cssData['number_box_radius']) : '0')."px;
        }
        .anc-6310-counter-01:hover .anc-6310-counter-01-count-content {
            background-color: ".(isset($cssData['number_background_hover_color']) ? esc_attr($cssData['number_background_hover_color']) : '#fff').";
        }
        .anc-6310-counter-01-count-content-inner {
            position: absolute;
            left: 0;
            right: 0;
            padding: 0 5px;
            text-align: center;
        }
        .anc-6310-counter-01-count-number {
            display: inline-block;
            font-size: ".(isset($cssData['number_font_size']) ? esc_attr($cssData['number_font_size']) : '30')."px;
            font-weight: ".(isset($cssData['number_font_weight']) ? esc_attr($cssData['number_font_weight']) : '400').";
            font-family: ".(isset($cssData['number_font_family']) ? str_replace("+", " ", esc_attr($cssData['number_font_family'])) : 'Amaranth').";
            color: ".(isset($cssData['number_font_color']) ? esc_attr($cssData['number_font_color']) : '#000').";
            line-height: ".(isset($cssData['number_box_size']) ? esc_attr($cssData['number_box_size']) : '0')."px;
            margin-left: ".(isset($cssData['number_margin_left']) ? esc_attr($cssData['number_margin_left']) : '0')."px;
            margin-right: ".(isset($cssData['number_margin_right']) ? esc_attr($cssData['number_margin_right']) : '0')."px;
        }
        .anc-6310-counter-01:hover .anc-6310-counter-01-count-number {
            color: ".(isset($cssData['number_font_hover_color']) ? esc_attr($cssData['number_font_hover_color']) : '#000').";
        }
        .anc-6310-counter-01-count-prefix {
            display: ".((isset($cssData['prefix_icon_show_hide']) && $cssData['prefix_icon_show_hide']) ? 'inline-block' : 'none').";
            font-size: ".(isset($cssData['number_prefix_font_size']) ? esc_attr($cssData['number_prefix_font_size']) : '20')."px;
            color: ".(isset($cssData['number_prefix_font_color']) ? esc_attr($cssData['number_prefix_font_color']) : 'rgb(255, 255, 255)').";
            font-weight: ".(isset($cssData['number_prefix_font_weight']) ? esc_attr($cssData['number_prefix_font_weight']) : '100').";
            font-family: ".(isset($cssData['number_prefix_font_family']) ? str_replace("+", " ", esc_attr($cssData['number_prefix_font_family'])) : 'Amaranth').";
            vertical-align: ".(isset($cssData['number_prefix_position']) ? esc_attr($cssData['number_prefix_position']) : '2')."px;
            margin-left: ".(isset($cssData['number_prefix_margin_left']) ? esc_attr($cssData['number_prefix_margin_left']) : '0')."px;
            margin-right: ".(isset($cssData['number_prefix_margin_right']) ? esc_attr($cssData['number_prefix_margin_right']) : '0')."px;
        }
        .anc-6310-counter-01:hover .anc-6310-counter-01-count-prefix {
            color: ".(isset($cssData['number_prefix_font_hover_color']) ? esc_attr($cssData['number_prefix_font_hover_color']) : 'rgb(255, 255, 255)').";
        }
        .anc-6310-counter-01-count-suffix {
            display: ".((isset($cssData['suffix_icon_show_hide']) && $cssData['suffix_icon_show_hide']) ? 'inline-block' : 'none').";
            font-size: ".(isset($cssData['number_suffix_font_size']) ? esc_attr($cssData['number_suffix_font_size']) : '20')."px;
            color: ".(isset($cssData['number_suffix_font_color']) ? esc_attr($cssData['number_suffix_font_color']) : 'rgb(255, 255, 255)').";
            font-weight: ".(isset($cssData['number_suffix_font_weight']) ? esc_attr($cssData['number_suffix_font_weight']) : '100').";
            font-family: ".(isset($cssData['number_suffix_font_family']) ? str_replace("+", " ", esc_attr($cssData['number_suffix_font_family'])) : 'Amaranth').";
            vertical-align: ".(isset($cssData['number_suffix_position']) ? esc_attr($cssData['number_suffix_position']) : '2')."px;
            margin-left: ".(isset($cssData['number_suffix_margin_left']) ? esc_attr($cssData['number_suffix_margin_left']) : '0')."px;
            margin-right: ".(isset($cssData['number_suffix_margin_right']) ? esc_attr($cssData['number_suffix_margin_right']) : '0')."px;
        }
        .anc-6310-counter-01:hover .anc-6310-counter-01-count-suffix {
            color: ".(isset($cssData['number_suffix_font_hover_color']) ? esc_attr($cssData['number_suffix_font_hover_color']) : 'rgb(255, 255, 255)').";
        }
        .anc-6310-counter-01-count-subtitle {
            display: ".((isset($cssData['counter_description']) && $cssData['counter_description']) ? 'block' : 'none').";
            font-family: ".(isset($cssData['description_font_family']) ? str_replace("+", " ", esc_attr($cssData['description_font_family'])) : 'Amaranth').";
            font-weight: ".(isset($cssData['description_font_weight']) ? esc_attr($cssData['description_font_weight']) : '400').";
            font-size: ".(isset($cssData['description_font_size']) ? esc_attr($cssData['description_font_size']) : '14')."px;
            color: ".(isset($cssData['description_font_color']) ? esc_attr($cssData['description_font_color']) : '#000').";
            line-height: ".(isset($cssData['description_line_height']) ? esc_attr($cssData['description_line_height']) : '20')."px;
            text-align: ".(isset($cssData['description_text_align']) ? esc_attr($cssData['description_text_align']) : 'center').";
            text-transform: ".(isset($cssData['description_text_transform']) ? esc_attr($cssData['description_text_transform']) : 'none').";
            margin-top: ".(isset($cssData['description_margin_top']) ? esc_attr($cssData['description_margin_top']) : '10')."px;
            margin-bottom: ".(isset($cssData['description_margin_bottom']) ? esc_attr($cssData['description_margin_bottom']) : '0')."px;
            margin-left: ".(isset($cssData['description_margin_left']) ? esc_attr($cssData['description_margin_left']) : '0')."px;
            margin-right: ".(isset($cssData['description_margin_right']) ? esc_attr($cssData['description_margin_right']) : '0')."px;
            word-break: break-word;
        }
        .anc-6310-counter-01:hover .anc-6310-counter-01-count-subtitle {
            color: ".(isset($cssData['description_font_hover_color']) ? esc_attr($cssData['description_font_hover_color']) : '#000').";
        }
        .anc-6310-counter-01-button {
            display: ".(isset($cssData['counter_button']) && $cssData['counter_button'] !== '' ? (($cssData['counter_button']) ? 'block' : 'none') : 'none').";
            width: ".(isset($cssData['button_width']) ? esc_attr($cssData['button_width']) : '150')."px;
            background-color: ".(isset($cssData['button_background_color']) ? esc_attr($cssData['button_background_color']) : '#000').";
            text-align: ".(isset($cssData['button_text_align']) ? esc_attr($cssData['button_text_align']) : 'center').";
            outline: none;
            border: ".(isset($cssData['button_border_width']) ? esc_attr($cssData['button_border_width']) : '1')." solid ".(isset($cssData['button_border_color']) ? esc_attr($cssData['button_border_color']) : '#000').";
            border-radius: ".(isset($cssData['button_border_radius']) ? esc_attr($cssData['button_border_radius']) : '0')."px;
            margin-top: ".(isset($cssData['button_margin_top']) ? esc_attr($cssData['button_margin_top']) : '0')."px;
            margin-bottom: ".(isset($cssData['button_margin_bottom']) ? esc_attr($cssData['button_margin_bottom']) : '0')."px;
            {$bottom_align}
        }
        .anc-6310-counter-01-button:hover {
            background-color: ".(isset($cssData['button_background_hover_color']) ? esc_attr($cssData['button_background_hover_color']) : '#000').";
            border-color: ".(isset($cssData['button_border_hover_color']) ? esc_attr($cssData['button_border_hover_color']) : '#000').";
        }
        .anc-6310-counter-01-button a {
            padding: 5px;
            color: ".(isset($cssData['button_font_color']) ? esc_attr($cssData['button_font_color']) : '#fff').";
            line-height: ".(isset($cssData['button_line_height']) ? esc_attr($cssData['button_line_height']) : '20')."px;
            font-family: ".(isset($cssData['button_font_family']) ? str_replace("+", " ", esc_attr($cssData['button_font_family'])) : 'Amaranth').";
            font-weight: ".(isset($cssData['button_font_weight']) ? esc_attr($cssData['button_font_weight']) : '400').";
            font-size: ".(isset($cssData['button_font_size']) ? esc_attr($cssData['button_font_size']) : '16')."px !important;
            text-transform: ".(isset($cssData['button_text_transform']) ? esc_attr($cssData['button_text_transform']) : 'uppercase').";
            text-decoration: none;
            display: block;
        }
        .anc-6310-counter-01-button:hover a {
            color: ".(isset($cssData['button_font_hover_color']) ? esc_attr($cssData['button_font_hover_color']) : '#fff').";
        }
    ";

    wp_register_style("anc-6310-custom-code-" . esc_attr($styleId) . "-css", "");
    wp_enqueue_style("anc-6310-custom-code-" . esc_attr($styleId) . "-css");
    wp_add_inline_style("anc-6310-custom-code-" . esc_attr($styleId) . "-css", $customCSS);
?>