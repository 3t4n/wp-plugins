<?php
    $customCSS = "
    .anc-6310-counter-".esc_attr($ids)." {
        display: block;
        float: left;
        width: calc(100% - ".esc_attr(($cssData['box_border_width']?$cssData['box_border_width']:0) * 2)."px);
        overflow: hidden;
        box-shadow: 0 0 ".esc_attr(($cssData['box_shadow_blur']?$cssData['box_shadow_blur']:0) * 2)."px ".esc_attr($cssData['box_shadow_width'])."px ".esc_attr($cssData['box_shadow_color']).";
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
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        -ms-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
        height: 100%;
    }
    .anc-6310-counter-".esc_attr($ids).":hover {
        margin-top: -7px;
        margin-bottom: 7px;
        box-shadow: 0 0 ".esc_attr((($cssData['box_shadow_blur']?$cssData['box_shadow_blur']:0) * 2))."px ".esc_attr($cssData['box_shadow_width'])."px ".esc_attr($cssData['box_shadow_hover_color']).";
        border-color: ".esc_attr($cssData['box_border_hover_color']).";
    }
    .anc-6310-counter-".esc_attr($ids)."-top-container {
        min-height: 210px;
        position: relative;
        background-size: cover;
        background-repeat: no-repeat;
        display: block;
    }
    .anc-6310-counter-".esc_attr($ids)."-top-container::before {
        content: '';
        background-color: ".esc_attr($cssData['image_overlay_color']).";
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
    }
    .anc-6310-counter-".esc_attr($ids).":hover .anc-6310-counter-".esc_attr($ids)."-top-container::before {
        content: '';
        background-color: ".esc_attr($cssData['image_overlay_hover_color']).";
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
    }
    .anc-6310-counter-".esc_attr($ids)."-count-title {
        position: relative;
        z-index: 1;
        font-family: ".(str_replace("+", " ", esc_attr($cssData['title_font_family']))).";
        font-weight: ".esc_attr($cssData['title_font_weight']).";
        font-size: 30px;
        color: rgb(255, 255, 255);
        text-transform: ".esc_attr($cssData['title_text_transform']).";
        line-height: ".esc_attr($cssData['title_line_height'])."px;
        padding-top: ".esc_attr($cssData['title_margin_top'])."px;
        padding-bottom: ".esc_attr($cssData['title_margin_bottom'])."px;
        margin-left: ".esc_attr($cssData['title_margin_left'])."px;
        margin-right: ".esc_attr($cssData['title_margin_right'])."px;
        text-align: ".esc_attr($cssData['title_text_align']).";
        word-break: break-word;
    }
    .anc-6310-counter-".esc_attr($ids).":hover .anc-6310-counter-".esc_attr($ids)."-count-title {
        color: rgb(255, 255, 255);
    }
    .anc-6310-counter-".esc_attr($ids)."-bottom-container {
        background-color: ".esc_attr($cssData['box_background_color']).";
        padding: 65px 20px 20px;
        position: relative;
        height: 100%;
    }
    .anc-6310-counter-".esc_attr($ids).":hover .anc-6310-counter-".esc_attr($ids)."-bottom-container {
        background-color: ".esc_attr($cssData['box_background_hover_color']).";
    }
    .anc-6310-counter-".esc_attr($ids)."-count-content {
        position: absolute;
        top: -".esc_html(($cssData['number_box_size']?$cssData['number_box_size']:0) / 2)."px;
        left: calc(50% - ".esc_attr(($cssData['number_box_size']?$cssData['number_box_size']:0) / 2)."px);
        width: ".esc_attr($cssData['number_box_size'])."px;
        height: ".esc_attr($cssData['number_box_size'])."px;
        background-color: ".esc_attr($cssData['number_background_color']).";
        -webkit-border-radius: ".esc_attr($cssData['number_box_radius'])."px;
        -o-border-radius: ".esc_attr($cssData['number_box_radius'])."px;
        -moz-border-radius: ".esc_attr($cssData['number_box_radius'])."px;
        -ms-border-radius: ".esc_attr($cssData['number_box_radius'])."px;
        border-radius: ".esc_attr($cssData['number_box_radius'])."px;
    }
    .anc-6310-counter-".esc_attr($ids).":hover .anc-6310-counter-".esc_attr($ids)."-count-content {
        background-color: ".esc_attr($cssData['number_background_hover_color']).";
    }
    .anc-6310-counter-".esc_attr($ids)."-count-content-inner {
        position: absolute;
        left: 0;
        right: 0;
        padding: 0 5px;
        text-align: center;
    }
    .anc-6310-counter-".esc_attr($ids)."-count-number {
        display: inline-block;
        font-size: ".esc_attr($cssData['number_font_size'])."px;
        font-weight: ".esc_attr($cssData['number_font_weight']).";
        font-family: ".str_replace("+", " ", esc_attr($cssData['number_font_family'])).";
        color: rgb(255, 255, 255);
        line-height: ".esc_attr($cssData['number_box_size'])."px;
        margin-left: 0px;
        margin-right: 0px;
    }
    .anc-6310-counter-".esc_attr($ids).":hover .anc-6310-counter-".esc_attr($ids)."-count-number {
        color: rgb(255, 255, 255);
    }
    .anc-6310-counter-".esc_attr($ids)."-count-subtitle {
        display: ".((isset($cssData['counter_description']) && $cssData['counter_description']) ? 'block' : 'none').";
        font-family: ".str_replace("+", " ", esc_attr($cssData['description_font_family'])).";
        font-weight: ".esc_attr($cssData['description_font_weight']).";
        font-size: ".esc_attr($cssData['description_font_size'])."px;
        color: ".esc_attr($cssData['description_font_color']).";
        line-height: ".esc_attr($cssData['description_line_height'])."px;
        text-align: ".esc_attr($cssData['description_text_align']).";
        text-transform: ".esc_attr($cssData['description_text_transform']).";
        margin-top: ".(isset($cssData['description_margin_top']) && $cssData['description_margin_top'] !== '' ? esc_attr($cssData['description_margin_top']) : 10)."px;
        margin-bottom: ".esc_attr($cssData['description_margin_bottom'])."px;
        margin-left: ".esc_attr($cssData['description_margin_left'])."px;
        margin-right: ".esc_attr($cssData['description_margin_right'])."px;
        word-break: break-word;
    }
    .anc-6310-counter-".esc_attr($ids).":hover .anc-6310-counter-".esc_attr($ids)."-count-subtitle {
        color: ".esc_attr($cssData['description_font_hover_color']).";
    }
    .anc_6310_number_counter_style_".esc_attr($ids)." figcaption {
        padding: 0;
        margin: 0;
        border: none;
    }
    .anc-6310-owl-carousel .anc-6310-item-".esc_attr($ids)." {
        padding: 5px 0;
    }
    ";

    wp_register_style("anc-6310-custom-code-" . esc_attr($ids) . "-css", "");
    wp_enqueue_style("anc-6310-custom-code-" . esc_attr($ids) . "-css");
    wp_add_inline_style("anc-6310-custom-code-" . esc_attr($ids) . "-css", $customCSS);
?>