<?php
  $customCSS = ".anc-6310-counter-".esc_attr($ids)." {
        position: relative;
        border-style: solid;
        background-color: ".esc_attr($cssData['box_background_color']).";
        -webkit-border-radius: ".esc_attr($cssData['box_radius'])."px;
        -o-border-radius: ".esc_attr($cssData['box_radius'])."px;
        -moz-border-radius: ".esc_attr($cssData['box_radius'])."px;
        -ms-border-radius: ".esc_attr($cssData['box_radius'])."px;
        border-radius: ".esc_attr($cssData['box_radius'])."px;
        border-width: ".esc_attr($cssData['box_border_width'])."px;
        border-color: ".esc_attr($cssData['box_border_color']).";
        box-shadow: 0 0 ".esc_attr(($cssData['box_shadow_blur']?$cssData['box_shadow_blur']:0) * 2)."px ".esc_attr($cssData['box_shadow_width'])."px ".esc_attr($cssData['box_shadow_color']).";
        width: calc(100% - ".esc_attr(($cssData['box_border_width']?$cssData['box_border_width']:0) * 2)."px);
        margin: 10px auto 10px;
        padding: 50px 0px 30px;
        letter-spacing: 0.11em;
        box-sizing: border-box;
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        -ms-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
        height: calc(100% - 20px);
    }
    .anc-6310-counter-".esc_attr($ids).":hover {
        background-color: ".esc_attr($cssData['box_background_hover_color']).";
        border-color: ".esc_attr($cssData['box_border_hover_color']).";
        box-shadow: 0 0 ".esc_attr(($cssData['box_shadow_blur']?$cssData['box_shadow_blur']:0) * 2)."px ".esc_attr($cssData['box_shadow_width'])."px ".esc_attr($cssData['box_shadow_hover_color']).";
    }
    .anc-6310-counter-".esc_attr($ids)."-paralax {
        background-image: url('https://wpmart.org/wp-content/uploads/anc/counter-03-background.jpg');
        background-size: Cover;
        background-repeat: No-repeat;
        background-position: center center;
        background-attachment: fixed;
        overflow: hidden;
        font-size: 0;
        width: 100%;
    }
    .anc-6310-counter-".esc_attr($ids)."-common-overlay {
        background-color: ".esc_attr($cssData['image_overlay_color']).";
        overflow: hidden;
        font-size: 0;
    }
    .anc-6310-counter-".esc_attr($ids)."-common-overlay:hover {
        background-color: ".esc_attr($cssData['image_overlay_hover_color']).";
    }
    .anc-6310-counter-".esc_attr($ids)."-row {
        padding: 100px 50px 70px;
        overflow: hidden;
        font-size: 0;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    .anc-6310-counter-".esc_attr($ids)."-featured-item {
        position: absolute;
        top: 0;
        left: calc(50% - ".esc_attr(($cssData['icon_background_size']?$cssData['icon_background_size']:0) / 2)."px);
        -moz-transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
    }
    .anc-6310-counter-".esc_attr($ids)."-featured-item span {
        background-color: ".esc_attr($cssData['icon_background_color']).";
        width: ".esc_attr($cssData['icon_background_size'])."px;
        height: ".esc_attr($cssData['icon_background_size'])."px;
        line-height: ".esc_attr($cssData['icon_background_size'])."px;
        -webkit-border-radius: ".esc_attr($cssData['icon_background_radius'])."px;
        -o-border-radius: ".esc_attr($cssData['icon_background_radius'])."px;
        -moz-border-radius: ".esc_attr($cssData['icon_background_radius'])."px;
        -ms-border-radius: ".esc_attr($cssData['icon_background_radius'])."px;
        border-radius: ".esc_attr($cssData['icon_background_radius'])."px;
        display: inline-block;
        text-align: center;
        overflow: hidden;
        vertical-align: middle;
        -webkit-transform: perspective(1px) translateZ(0);
        transform: perspective(1px) translateZ(0);
        position: relative;
    }
    .anc-6310-counter-".esc_attr($ids)."-featured-item span:before {
        content: '';
        position: absolute;
        z-index: -1;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: ".esc_attr($cssData['icon_background_hover_color']).";
        -webkit-transform: scale(0) rotate(45deg);
        transform: scale(0) rotate(45deg);
        -webkit-transition-property: transform;
        transition-property: transform;
        -webkit-transition-duration: 0.3s;
        transition-duration: 0.3s;
        -webkit-transition-timing-function: ease-out;
        transition-timing-function: ease-out;
    }
    .anc-6310-counter-".esc_attr($ids).":hover .anc-6310-counter-".esc_attr($ids)."-featured-item span:before {
        -webkit-transform: scale(1.5) rotate(45deg);
        transform: scale(1.5) rotate(45deg);
    }
    .anc-6310-counter-".esc_attr($ids)."-featured-item i {
        color: rgba(255, 255, 255, 1);
        font-size: 40px;
        width: auto;
        height: auto;
        line-height: ".esc_attr($cssData['icon_line_height'])."px;
    }
    .anc-6310-counter-".esc_attr($ids).":hover .anc-6310-counter-".esc_attr($ids)."-featured-item i {
        color: rgba(255, 255, 255, 1);
    }
    .anc-6310-counter-".esc_attr($ids)."-count-content {
        text-align: ".esc_attr($cssData['number_text_align']).";
    }
    .anc-6310-counter-".esc_attr($ids)."-count-number {
        display: inline-block;
        font-size: ".esc_attr($cssData['number_font_size'])."px;
        color: rgb(255, 255, 255);
        font-family: ".str_replace("+", " ", esc_attr($cssData['number_font_family'])).";
        font-weight: ".esc_attr($cssData['number_font_weight']).";
        line-height: ".esc_attr($cssData['number_line_height'])."px;
        margin-left: ".esc_attr($cssData['number_margin_left'])."px;
        margin-right: ".esc_attr($cssData['number_margin_right'])."px;
        margin-top: ".esc_attr($cssData['number_margin_top'])."px;
        margin-bottom: ".esc_attr($cssData['number_margin_bottom'])."px;
    }
    .anc-6310-counter-".esc_attr($ids).":hover .anc-6310-counter-".esc_attr($ids)."-count-number {
        color: rgb(255, 255, 255);
    }
    .anc-6310-counter-".esc_attr($ids)."-count-title {
        font-size: 24px;
        line-height: ".esc_attr($cssData['title_line_height'])."px;
        color: rgb(255, 255, 255);
        font-weight: ".esc_attr($cssData['title_font_weight']).";
        text-transform: ".esc_attr($cssData['title_text_transform']).";
        text-align: ".esc_attr($cssData['title_text_align']).";
        font-family: ".str_replace("+", " ", esc_attr($cssData['title_font_family'])).";
        margin-left: ".esc_attr($cssData['title_margin_left'])."px;
        margin-right: ".esc_attr($cssData['title_margin_right'])."px;
        margin-top: ".esc_attr($cssData['title_margin_top'])."px;
        margin-bottom: ".esc_attr($cssData['title_margin_bottom'])."px;
        word-break: break-word;
    }
    .anc-6310-counter-".esc_attr($ids).":hover .anc-6310-counter-".esc_attr($ids)."-count-title {
        color: rgb(255, 255, 255);
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