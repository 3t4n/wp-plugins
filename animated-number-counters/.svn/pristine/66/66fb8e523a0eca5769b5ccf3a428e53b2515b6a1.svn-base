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
    .anc-6310-counter-02 {
        border-style: solid;
        font-family: Amaranth;
        letter-spacing: 0.11em;
        border-width: ".esc_attr($cssData['box_border_width'])."px;
        border-color: ".esc_attr($cssData['box_border_color']).";
        background-color: ".esc_attr($cssData['box_background_color']).";
        box-shadow: 0 0 ".esc_attr((($cssData['box_shadow_blur']?$cssData['box_shadow_blur']:0) * 2))."px ".esc_attr($cssData['box_shadow_width'])."px ".esc_attr($cssData['box_shadow_color']).";
        -webkit-border-radius: ".esc_attr($cssData['box_radius'])."px;
        -o-border-radius: ".esc_attr($cssData['box_radius'])."px;
        -moz-border-radius: ".esc_attr($cssData['box_radius'])."px;
        -ms-border-radius: ".esc_attr($cssData['box_radius'])."px;
        border-radius: ".esc_attr($cssData['box_radius'])."px;
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        -ms-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
        height: calc(100% - ".esc_attr($cssData['box_border_width'])."px);
    }
    .anc-6310-counter-02:hover {
        background-color: ".esc_attr($cssData['box_background_hover_color']).";
        border-color: ".esc_attr($cssData['box_border_hover_color']).";
        box-shadow: 0 0 ".esc_attr((($cssData['box_shadow_blur']?$cssData['box_shadow_blur']:0) * 2))."px ".esc_attr($cssData['box_shadow_width'])."px ".esc_attr($cssData['box_shadow_hover_color']).";
    }
    .anc-6310-counter-02-paralax {
        {$bgTypeData};
        background-attachment: fixed;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        overflow: hidden;
        font-size: 0;
    }
    .anc-6310-counter-02-common-overlay iframe {
        position: absolute !important;
        top: -100%;
        left: 0;
        width: 100%;
        height: 300%;
        pointer-events: none;
        opacity: .7;
        position: relative;
    }
    .anc-6310-counter-02-common-overlay {
        background-color: ".esc_attr($cssData['image_overlay_color']).";
        overflow: hidden;
        font-size: 0;
        position: relative;
    }
    .anc-6310-counter-02-common-overlay:hover {
        background-color: ".esc_attr($cssData['image_overlay_hover_color']).";
    }
    .anc-6310-counter-02-row {
        padding: 110px 0 80px;
        overflow: hidden;
        font-size: 0;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    .anc-6310-counter-02-icon {
        text-align: ".esc_attr($cssData['icon_text_align']).";
        margin-left: ".esc_attr($cssData['icon_margin_left'])."px;
        margin-right: ".esc_attr($cssData['icon_margin_right'])."px;
        margin-top: ".esc_attr($cssData['icon_margin_top'])."px;
        margin-bottom: ".esc_attr($cssData['icon_margin_bottom'])."px;
    }
    .anc-6310-counter-02-icon i,
    .anc-6310-counter-02-icon img {
        color: ".esc_attr($cssData['icon_color']).";
        font-size: ".esc_attr($cssData['icon_size'])."px;
        display: inline-block;
        vertical-align: middle;
        -webkit-transform: perspective(1px) translateZ(0);
        transform: perspective(1px) translateZ(0);
    }
    .anc-6310-counter-02-icon img {
        width: ".esc_attr($cssData['icon_size'])."px;
        height: ".esc_attr($cssData['icon_size'])."px;
    }
    @-webkit-keyframes hvr-pulse {
        25% {
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
        }

        75% {
            -webkit-transform: scale(0.9);
            transform: scale(0.9);
        }
    }
    @keyframes hvr-pulse {
        25% {
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
        }

        75% {
            -webkit-transform: scale(0.9);
            transform: scale(0.9);
        }
    }
    .anc-6310-counter-02:hover .anc-6310-counter-02-icon i,
    .anc-6310-counter-02:hover .anc-6310-counter-02-icon img {
        color: ".esc_attr($cssData['icon_hover_color']).";
        -webkit-animation-name: hvr-pulse;
        animation-name: hvr-pulse;
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-timing-function: linear;
        animation-timing-function: linear;
        -webkit-animation-iteration-count: infinite;
        animation-iteration-count: infinite;
    }
    .anc-6310-counter-02-count-content {
        margin-top: ".esc_attr($cssData['number_margin_top'])."px;
        margin-bottom: ".esc_attr($cssData['number_margin_bottom'])."px;
        margin-left: ".esc_attr($cssData['number_margin_left'])."px;
        margin-right: ".esc_attr($cssData['number_margin_right'])."px;
        text-align: ".esc_attr($cssData['number_text_align']).";
    }
    .anc-6310-counter-02-count-content-inner {
        position: relative;
        display: inline-block;
        padding-bottom: 5px;
    }
    .anc-6310-counter-02-count-content-inner:after {
        content: '';
        position: absolute;
        top: ".esc_attr($cssData['underline_margin_top'])."px;
        left: 0;
        right: 0;
        height: ".esc_attr($cssData['underline_height'])."px;
        -webkit-border-radius: ".esc_attr($cssData['underline_height'])."px;
        -o-border-radius: ".esc_attr($cssData['underline_height'])."px;
        -moz-border-radius: ".esc_attr($cssData['underline_height'])."px;
        -ms-border-radius: ".esc_attr($cssData['underline_height'])."px;
        border-radius: ".esc_attr($cssData['underline_height'])."px;
        background-color: ".esc_attr($cssData['underline_background_color']).";
    }
    .anc-6310-counter-02:hover .anc-6310-counter-02-count-content-inner:after {
        background-color: ".esc_attr($cssData['underline_background_hover_color']).";
    }
    .anc-6310-counter-02-count-number {
        display: inline-block;
        font-family: ".esc_attr(str_replace("+", " ", $cssData['number_font_family'])).";
        font-weight: ".esc_attr($cssData['number_font_weight']).";
        font-size: ".esc_attr($cssData['number_font_size'])."px;
        color: ".esc_attr($cssData['number_font_color']).";
        line-height: ".esc_attr($cssData['number_line_height'])."px;
    }
    .anc-6310-counter-02:hover .anc-6310-counter-02-count-number {
        color: ".esc_attr($cssData['number_font_hover_color']).";
    }
    .anc-6310-counter-02-count-prefix {
        display: ".esc_attr((isset($cssData['prefix_icon_show_hide']) && $cssData['prefix_icon_show_hide']) ? 'inline-block' : 'none').";
        font-size: ".esc_attr(isset($cssData['number_prefix_font_size']) && $cssData['number_prefix_font_size'] !== '' ? $cssData['number_prefix_font_size'] : 20)."px;
        color: ".esc_attr(isset($cssData['number_prefix_font_color']) && $cssData['number_prefix_font_color'] !== '' ? $cssData['number_prefix_font_color'] : 'rgb(255, 255, 255)').";
        font-weight: ". esc_attr(isset($cssData['number_prefix_font_weight']) && $cssData['number_prefix_font_weight'] !== '' ? $cssData['number_prefix_font_weight'] : '100').";
        font-family: ".esc_attr(isset($cssData['number_prefix_font_family']) && $cssData['number_prefix_font_family'] !== '' ? str_replace("+", " ", $cssData['number_prefix_font_family']) : 'Amaranth').";
        vertical-align: ".esc_attr(isset($cssData['number_prefix_position']) && $cssData['number_prefix_position'] !== '' ? $cssData['number_prefix_position'] : 2)."px;
        margin-left: ".esc_attr(isset($cssData['number_prefix_margin_left']) && $cssData['number_prefix_margin_left'] !== '' ? $cssData['number_prefix_margin_left'] : 0)."px;
        margin-right: ".esc_attr(isset($cssData['number_prefix_margin_right']) && $cssData['number_prefix_margin_right'] !== '' ? $cssData['number_prefix_margin_right'] : 0)."px;
    }
    .anc-6310-counter-02:hover .anc-6310-counter-02-count-prefix {
        color: ".esc_attr(isset($cssData['number_prefix_font_hover_color']) && $cssData['number_prefix_font_hover_color'] !== '' ? $cssData['number_prefix_font_hover_color'] : 'rgb(255, 255, 255)').";
    }
    .anc-6310-counter-02-count-suffix {
        display: ".esc_attr((isset($cssData['suffix_icon_show_hide']) && $cssData['suffix_icon_show_hide']) ? 'inline-block' : 'none').";
        font-size: ".esc_attr(isset($cssData['number_suffix_font_size']) && $cssData['number_suffix_font_size'] !== '' ? $cssData['number_suffix_font_size'] : 20)."px;
        color: ".esc_attr(isset($cssData['number_suffix_font_color']) && $cssData['number_suffix_font_color'] !== '' ? $cssData['number_suffix_font_color'] : 'rgb(255, 255, 255)').";
        font-weight: ".esc_attr(isset($cssData['number_suffix_font_weight']) && $cssData['number_suffix_font_weight'] !== '' ? $cssData['number_suffix_font_weight'] : '100').";
        font-family: ".esc_attr(isset($cssData['number_suffix_font_family']) && $cssData['number_suffix_font_family'] !== '' ? str_replace("+", " ", $cssData['number_suffix_font_family']) : 'Amaranth').";
        vertical-align: ".esc_attr(isset($cssData['number_suffix_position']) && $cssData['number_suffix_position'] !== '' ? $cssData['number_suffix_position'] : 2)."px;
        margin-left: ".esc_attr(isset($cssData['number_suffix_margin_left']) && $cssData['number_suffix_margin_left'] !== '' ? $cssData['number_suffix_margin_left'] : 0)."px;
        margin-right: ".esc_attr(isset($cssData['number_suffix_margin_right']) && $cssData['number_suffix_margin_right'] !== '' ? $cssData['number_suffix_margin_right'] : 0)."px;
    }
    .anc-6310-counter-02:hover .anc-6310-counter-02-count-suffix {
        color: ".esc_attr(isset($cssData['number_suffix_font_hover_color']) && $cssData['number_suffix_font_hover_color'] !== '' ? $cssData['number_suffix_font_hover_color'] : 'rgb(255, 255, 255)').";
    }
    .anc-6310-counter-02-count-title {
        font-family: ".esc_attr(str_replace("+", " ", $cssData['title_font_family'])).";
        font-weight: ".esc_attr($cssData['title_font_weight']).";
        font-size: ".esc_attr($cssData['title_font_size'])."px;
        color: ".esc_attr($cssData['title_font_color']).";
        text-transform: ".esc_attr($cssData['title_text_transform']).";
        line-height: ".esc_attr($cssData['title_line_height'])."px;
        margin-top: ".esc_attr($cssData['title_margin_top'])."px;
        margin-bottom: ".esc_attr($cssData['title_margin_bottom'])."px;
        margin-left: ".esc_attr($cssData['title_margin_left'])."px;
        margin-right: ".esc_attr($cssData['title_margin_right'])."px;
        text-align: ".esc_attr($cssData['title_text_align']).";
        word-break: break-word;
    }
    .anc-6310-counter-02:hover .anc-6310-counter-02-count-title {
        color: ".esc_attr($cssData['title_font_hover_color']).";
    }
    .anc-6310-counter-02-description {
        font-size: ".esc_attr(isset($cssData['description_font_size']) && $cssData['description_font_size'] !== '' ? $cssData['description_font_size'] : 14)."px;
        line-height: ".esc_attr(isset($cssData['description_line_height']) && $cssData['description_line_height'] !== '' ? $cssData['description_line_height'] : 15)."px;
        color: ".esc_attr(isset($cssData['description_font_color']) && $cssData['description_font_color'] !== '' ? $cssData['description_font_color'] : 'rgb(255, 255, 255)').";
        font-weight: ".esc_attr(isset($cssData['description_font_weight']) && $cssData['description_font_weight'] !== '' ? $cssData['description_font_weight'] : 400).";
        text-transform: ".esc_attr(isset($cssData['description_text_transform']) && $cssData['description_text_transform'] !== '' ? $cssData['description_text_transform'] : 'capitalize').";
        text-align: ".esc_attr(isset($cssData['description_text_align']) && $cssData['description_text_align'] !== '' ? $cssData['description_text_align'] : 'center').";
        font-family: ".esc_attr(isset($cssData['description_font_family']) && $cssData['description_font_family'] !== '' ? str_replace("+", " ", $cssData['description_font_family']) : 'roboto').";
        margin-top: ".esc_attr(isset($cssData['description_margin_top']) && $cssData['description_margin_top'] !== '' ? $cssData['description_margin_top'] : 15)."px;
        margin-bottom: ".esc_attr(isset($cssData['description_margin_bottom']) && $cssData['description_margin_bottom'] !== '' ? $cssData['description_margin_bottom'] : 20)."px;
        margin-left: ".esc_attr(isset($cssData['description_margin_left']) && $cssData['description_margin_left'] !== '' ? $cssData['description_margin_left'] : 2)."px;
        margin-right: ".esc_attr(isset($cssData['description_margin_right']) && $cssData['description_margin_right'] !== '' ? $cssData['description_margin_right'] : 2)."px;
        display: ".esc_attr(isset($cssData['counter_description']) && $cssData['counter_description'] !== '' ? (($cssData['counter_description']) ? 'block' : 'none') : 'none').";
        word-break: break-word;
    }
    .anc-6310-counter-02:hover .anc-6310-counter-02-description {
        color: ".esc_attr(isset($cssData['description_font_hover_color']) && $cssData['description_font_hover_color'] !== '' ? $cssData['description_font_hover_color'] : 'rgb(255, 255, 255)').";
    }
    .anc-6310-counter-02-button {
        outline: none;
        display: ".esc_attr(isset($cssData['counter_button']) && $cssData['counter_button'] !== '' ? (($cssData['counter_button']) ? 'block' : 'none') : 'none').";
        width: ".esc_attr(isset($cssData['button_width']) && $cssData['button_width'] !== '' ? $cssData['button_width'] : 130)."px;
        background-color: ".esc_attr(isset($cssData['button_background_color']) && $cssData['button_background_color'] !== '' ? $cssData['button_background_color'] : 'rgba(0, 158, 226, 1)').";
        text-align: ".esc_attr(isset($cssData['button_text_align']) && $cssData['button_text_align'] !== '' ? $cssData['button_text_align'] : 'center').";
        border-width: ".esc_attr(isset($cssData['button_border_width']) && $cssData['button_border_width'] !== '' ? $cssData['button_border_width'] : '0px').";
        border-style: solid;
        border-color: ".esc_attr(isset($cssData['button_border_color']) && $cssData['button_border_color'] !== '' ? $cssData['button_border_color'] : 'rgb(255, 255, 255)').";
        border-radius: ".esc_attr(isset($cssData['button_border_radius']) && $cssData['button_border_radius'] !== '' ? $cssData['button_border_radius'] : 0)."px;
        margin-top: ".esc_attr(isset($cssData['button_margin_top']) && $cssData['button_margin_top'] !== '' ? $cssData['button_margin_top'] : 10)."px;
        margin-bottom: ".esc_attr(isset($cssData['button_margin_bottom']) && $cssData['button_margin_bottom'] !== '' ? $cssData['button_margin_bottom'] : 20)."px;
        {$bottom_align}
    }
    .anc-6310-counter-02-button:hover {
        background-color: ".esc_attr(isset($cssData['button_background_hover_color']) && $cssData['button_background_hover_color'] !== '' ? $cssData['button_background_hover_color'] : 'rgba(7, 144, 204, 0.8)').";
        border-color: ".esc_attr(isset($cssData['button_border_hover_color']) && $cssData['button_border_hover_color'] !== '' ? $cssData['button_border_hover_color'] : 'rgb(255, 255, 255)').";
    }
    .anc-6310-counter-02-button a {
        padding: 5px;
        color: ".esc_attr(isset($cssData['button_font_color']) && $cssData['button_font_color'] !== '' ? $cssData['button_font_color'] : 'rgb(255, 255, 255)').";
        font-size: ".esc_attr(isset($cssData['button_font_size']) && $cssData['button_font_size'] !== '' ? $cssData['button_font_size'] : 13)."px !important;
        line-height: ".esc_attr(isset($cssData['button_line_height']) && $cssData['button_line_height'] !== '' ? $cssData['button_line_height'] : 25)."px;
        font-family: ".esc_attr(isset($cssData['button_font_family']) && $cssData['button_font_family'] !== '' ? str_replace("+", " ", $cssData['button_font_family']) : 'roboto').";
        text-decoration: none;
        display: block;
        text-transform: ".esc_attr(isset($cssData['button_text_transform']) && $cssData['button_text_transform'] !== '' ? $cssData['button_text_transform'] : 'capitalize').";
        font-weight: ".esc_attr(isset($cssData['button_font_weight']) && $cssData['button_font_weight'] !== '' ? $cssData['button_font_weight'] : '500').";
    }
    .anc-6310-counter-02-button a:hover {
        color: ".esc_attr(isset($cssData['button_font_hover_color']) && $cssData['button_font_hover_color'] !== '' ? $cssData['button_font_hover_color'] : 'rgb(255, 255, 255)').";
    }
    ";

    wp_register_style("anc-6310-custom-code-" . esc_attr($styleId) . "-css", "");
    wp_enqueue_style("anc-6310-custom-code-" . esc_attr($styleId) . "-css");
    wp_add_inline_style("anc-6310-custom-code-" . esc_attr($styleId) . "-css", $customCSS);
?>