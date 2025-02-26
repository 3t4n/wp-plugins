<style>
    .anc-6310-counter-18-paralax {
        <?php
        if ($bgType == 1) {
            echo "background: transparent;";
        } else if ($bgType == 2) {
            echo "background-color: " . esc_attr($cssData['template_background_color']) . ";";
        } else if ($bgType == 3) {
            echo "background-image: url('" . esc_attr($cssData['box_background_image']) . "');";
        }
        ?>background-size: Cover;
        background-repeat: No-repeat;
        background-position: center center;
        background-attachment: fixed;
        overflow: hidden;
        font-size: 0;
    }

    .anc-6310-counter-18-common-overlay iframe {
        position: absolute;
        top: -100%;
        left: 0;
        width: 100%;
        height: 300%;
        pointer-events: none;
        opacity: .7;
    }

    .anc-6310-counter-18-common-overlay {
        background-color: <?php echo esc_attr($cssData['image_overlay_color']); ?>;
        overflow: hidden;
        font-size: 0;
        position: relative;
    }

    .anc-6310-counter-18-common-overlay:hover {
        background-color: <?php echo esc_attr($cssData['image_overlay_hover_color']); ?>;
    }

    .anc-6310-counter-18-row {
        padding: 40px 10px 10px;
        overflow: hidden;
        font-size: 0;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .anc-6310-counter-18 {
        padding: 20px 0px 25px;
        font-family: Amaranth;
        border-style: solid;
        text-align: <?php echo esc_attr($cssData['icon_text_align']); ?>;
        -webkit-border-radius: <?php echo esc_attr($cssData['box_radius']); ?>px;
        -o-border-radius: <?php echo esc_attr($cssData['box_radius']); ?>px;
        -moz-border-radius: <?php echo esc_attr($cssData['box_radius']); ?>px;
        -ms-border-radius: <?php echo esc_attr($cssData['box_radius']); ?>px;
        border-radius: <?php echo esc_attr($cssData['box_radius']); ?>px;
        border-width: <?php echo esc_attr($cssData['box_border_width']); ?>px;
        border-color: <?php echo esc_attr($cssData['box_border_color']); ?>;
        box-shadow: 0 0 <?php echo (esc_attr($cssData['box_shadow_blur']?$cssData['box_shadow_blur']:0) * 2); ?>px <?php echo esc_attr($cssData['box_shadow_width']); ?>px <?php echo esc_attr($cssData['box_shadow_color']); ?> !important;
        -webkit-transform: perspective(1px) translateZ(0);
        transform: perspective(1px) translateZ(0);
        box-shadow: 0 0 1px rgba(0, 0, 0, 0);
        position: relative;
        -webkit-transition-duration: 0.3s;
        transition-duration: 0.3s;
        -webkit-transition-property: transform;
        transition-property: transform;
        height: calc(100% - 45px - 2 * <?php echo esc_attr($cssData['box_border_width']?$cssData['box_border_width']:0); ?>px);
    }

    .anc-6310-counter-18:hover {
        border-color: <?php echo esc_attr($cssData['box_border_hover_color']); ?>;
        box-shadow: 0 0 <?php echo (esc_attr($cssData['box_shadow_blur']?$cssData['box_shadow_blur']:0) * 2); ?>px <?php echo esc_attr($cssData['box_shadow_width']); ?>px <?php echo esc_attr($cssData['box_shadow_hover_color']); ?> !important;
        -webkit-transform: translateY(-5px);
        transform: translateY(-5px);
    }

    .anc-6310-counter-18:before {
        pointer-events: none;
        position: absolute;
        z-index: -1;
        content: '';
        top: 100%;
        left: 5%;
        height: 10px;
        width: 90%;
        opacity: 0;
        background: -webkit-radial-gradient(center, ellipse, rgba(0, 0, 0, 0.35) 0%, rgba(0, 0, 0, 0) 80%);
        background: radial-gradient(ellipse at center, rgba(0, 0, 0, 0.35) 0%, rgba(0, 0, 0, 0) 80%);
        -webkit-transition-duration: 0.3s;
        transition-duration: 0.3s;
        -webkit-transition-property: transform, opacity;
        transition-property: transform, opacity;
    }

    .anc-6310-counter-18:hover:before {
        opacity: 1;
        -webkit-transform: translateY(5px);
        transform: translateY(5px);
    }

    .anc-6310-counter-18-box-1 {
        background-color: <?php echo esc_attr($cssData['box_background_color_1']); ?> !important;
    }

    .anc-6310-counter-18-box-1:hover {
        background-color: <?php echo esc_attr($cssData['box_background_hover_color_1']); ?> !important;
    }

    .anc-6310-counter-18-box-2 {
        background-color: <?php echo esc_attr($cssData['box_background_color_2']); ?> !important;
    }

    .anc-6310-counter-18-box-2:hover {
        background-color: <?php echo esc_attr($cssData['box_background_hover_color_2']); ?> !important;
    }

    .anc-6310-counter-18-box-3 {
        background-color: <?php echo esc_attr($cssData['box_background_color_3']); ?> !important;
    }

    .anc-6310-counter-18-box-3:hover {
        background-color: <?php echo esc_attr($cssData['box_background_hover_color_3']); ?> !important;
    }

    .anc-6310-counter-18-box-4 {
        background-color: <?php echo esc_attr($cssData['box_background_color_4']); ?> !important;
    }

    .anc-6310-counter-18-box-4:hover {
        background-color: <?php echo esc_attr($cssData['box_background_hover_color_4']); ?> !important;
    }

    .anc-6310-counter-18-box-5 {
        background-color: <?php echo esc_attr($cssData['box_background_color_5']); ?> !important;
    }

    .anc-6310-counter-18-box-5:hover {
        background-color: <?php echo esc_attr($cssData['box_background_hover_color_5']); ?> !important;
    }

    .anc-6310-counter-18-box-6 {
        background-color: <?php echo esc_attr($cssData['box_background_color_6']); ?> !important;
    }

    .anc-6310-counter-18-box-6:hover {
        background-color: <?php echo esc_attr($cssData['box_background_hover_color_6']); ?> !important;
    }

    .anc-6310-counter-18-icon {
        display: flex;
        justify-content: <?php echo esc_attr($cssData['icon_text_align']); ?>;
        align-items: center;
    }

    .anc-6310-counter-18-icon i,
    .anc-6310-counter-18-icon img {
        color: <?php echo esc_attr($cssData['icon_color']); ?>;
        font-size: <?php echo esc_attr($cssData['icon_size']); ?>px;
        margin-left: <?php echo esc_attr($cssData['icon_margin_left']); ?>px;
        margin-right: <?php echo esc_attr($cssData['icon_margin_right']); ?>px;
        margin-top: <?php echo esc_attr($cssData['icon_margin_top']); ?>px;
        margin-bottom: <?php echo esc_attr($cssData['icon_margin_bottom']); ?>px;
    }

    .anc-6310-counter-18-icon img {
        margin-left: <?php echo esc_attr($cssData['icon_margin_left']); ?>px;
        margin-right: <?php echo esc_attr($cssData['icon_margin_right']); ?>px;
        margin-top: <?php echo esc_attr($cssData['icon_margin_top']); ?>px;
        margin-bottom: <?php echo esc_attr($cssData['icon_margin_bottom']); ?>px;
    }

    .anc-6310-counter-18:hover .anc-6310-counter-18-icon i,
    .anc-6310-counter-18:hover .anc-6310-counter-18-icon img {
        color: <?php echo esc_attr($cssData['icon_hover_color']); ?>;
    }
    .anc-6310-counter-18-icon img { 
        width: <?php echo esc_attr($cssData['icon_size']); ?>px;
        height: <?php echo esc_attr($cssData['icon_size']); ?>px;
    }

    .anc-6310-counter-18-number-content {
        display: inline-block;
    }

    .anc-6310-counter-18-number {
        display: inline-block;
        letter-spacing: 2px;
        font-size: <?php echo esc_attr($cssData['number_font_size']); ?>px;
        color: <?php echo esc_attr($cssData['number_font_color']); ?>;
        font-family: <?php echo str_replace("+", " ", esc_attr($cssData['number_font_family'])); ?>;
        font-weight: <?php echo esc_attr($cssData['number_font_weight']); ?>;
        line-height: <?php echo esc_attr($cssData['number_line_height']); ?>px;
        margin-left: <?php echo esc_attr($cssData['number_margin_left']); ?>px;
        margin-right: <?php echo esc_attr($cssData['number_margin_right']); ?>px;
        margin-top: <?php echo esc_attr($cssData['number_margin_top']); ?>px;
        margin-bottom: <?php echo esc_attr($cssData['number_margin_bottom']); ?>px;
    }

    .anc-6310-counter-18:hover .anc-6310-counter-18-number {
        color: <?php echo esc_attr($cssData['number_font_hover_color']); ?>;
    }

    .anc-6310-counter-18-count-prefix {
        display: <?php echo esc_attr($cssData['prefix_icon_show_hide']) ? 'inline-block' : 'none' ?>;
        font-size: <?php echo esc_attr($cssData['number_prefix_font_size']); ?>px;
        color: <?php echo esc_attr($cssData['number_prefix_font_color']); ?>;
        font-weight: <?php echo esc_attr($cssData['number_prefix_font_weight']); ?>;
        font-family: <?php echo str_replace("+", " ", esc_attr($cssData['number_prefix_font_family'])); ?>;
        vertical-align: <?php echo esc_attr($cssData['number_prefix_position']); ?>px;
        margin-left: <?php echo esc_attr($cssData['number_prefix_margin_left']); ?>px;
        margin-right: <?php echo esc_attr($cssData['number_prefix_margin_right']); ?>px;
    }

    .anc-6310-counter-18:hover .anc-6310-counter-18-count-prefix {
        color: <?php echo esc_attr($cssData['number_prefix_font_hover_color']); ?>;
    }

    .anc-6310-counter-18-count-suffix {
        display: <?php echo esc_attr($cssData['suffix_icon_show_hide']) ? 'inline-block' : 'none' ?>;
        font-size: <?php echo esc_attr($cssData['number_suffix_font_size']); ?>px;
        color: <?php echo esc_attr($cssData['number_suffix_font_color']); ?>;
        font-weight: <?php echo esc_attr($cssData['number_suffix_font_weight']); ?>;
        font-family: <?php echo str_replace("+", " ", esc_attr($cssData['number_suffix_font_family'])); ?>;
        vertical-align: <?php echo esc_attr($cssData['number_suffix_position']); ?>px;
        margin-left: <?php echo esc_attr($cssData['number_suffix_margin_left']); ?>px;
        margin-right: <?php echo esc_attr($cssData['number_suffix_margin_right']); ?>px;
    }

    .anc-6310-counter-18:hover .anc-6310-counter-18-count-suffix {
        color: <?php echo esc_attr($cssData['number_suffix_font_hover_color']); ?>;
    }

    .anc-6310-counter-18-title {
        letter-spacing: 2px;
        font-size: <?php echo esc_attr($cssData['title_font_size']); ?>px;
        line-height: <?php echo esc_attr($cssData['title_line_height']); ?>px;
        color: <?php echo esc_attr($cssData['title_font_color']); ?>;
        font-weight: <?php echo esc_attr($cssData['title_font_weight']); ?>;
        text-transform: <?php echo esc_attr($cssData['title_text_transform']); ?>;
        text-align: <?php echo esc_attr($cssData['title_text_align']); ?>;
        font-family: <?php echo str_replace("+", " ", esc_attr($cssData['title_font_family'])); ?>;
        margin-top: <?php echo esc_attr($cssData['title_margin_top']); ?>px;
        margin-bottom: <?php echo esc_attr($cssData['title_margin_bottom']); ?>px;
        margin-left: <?php echo esc_attr($cssData['title_margin_left']); ?>px;
        margin-right: <?php echo esc_attr($cssData['title_margin_right']); ?>px;
        word-wrap: break-word;
    }

    .anc-6310-counter-18:hover .anc-6310-counter-18-title {
        color: <?php echo esc_attr($cssData['title_font_hover_color']); ?>;
    }

    .anc-6310-counter-18-description {
        font-size: <?php echo esc_attr($cssData['description_font_size']); ?>px;
        line-height: <?php echo esc_attr($cssData['description_line_height']); ?>px;
        color: <?php echo esc_attr($cssData['description_font_color']); ?>;
        font-weight: <?php echo esc_attr($cssData['description_font_weight']); ?>;
        text-transform: <?php echo esc_attr($cssData['description_text_transform']); ?>;
        text-align: <?php echo esc_attr($cssData['description_text_align']); ?>;
        font-family: <?php echo str_replace("+", " ", esc_attr($cssData['description_font_family'])); ?>;
        margin-top: <?php echo esc_attr($cssData['description_margin_top']); ?>px;
        margin-bottom: <?php echo esc_attr($cssData['description_margin_bottom']); ?>px;
        margin-left: <?php echo esc_attr($cssData['description_margin_left']); ?>px;
        margin-right: <?php echo esc_attr($cssData['description_margin_right']); ?>px;
        display: <?php echo isset($cssData['counter_description']) && $cssData['counter_description'] !== '' ? (($cssData['counter_description']) ? 'block' : 'none') : 'none'; ?>;
        word-break: break-word;
    }

    .anc-6310-counter-18:hover .anc-6310-counter-18-description {
        color: <?php echo esc_attr($cssData['description_font_hover_color']); ?>;
    }

    .anc-6310-counter-18-button {
        outline: none;
        display: <?php echo isset($cssData['counter_button']) && $cssData['counter_button'] !== '' ? (($cssData['counter_button']) ? 'block' : 'none') : 'none'; ?>;
        width: <?php echo esc_attr($cssData['button_width']); ?>px;
        background-color: <?php echo esc_attr($cssData['button_background_color']); ?>;
        text-align: <?php echo esc_attr($cssData['button_text_align']); ?>;
        border-width: <?php echo esc_attr($cssData['button_border_width']); ?>;
        border-style: solid;
        border-color: <?php echo esc_attr($cssData['button_border_color']); ?>;
        border-radius: <?php echo esc_attr($cssData['button_border_radius']); ?>px;
        margin-top: <?php echo esc_attr($cssData['button_margin_top']); ?>px;
        margin-bottom: <?php echo esc_attr($cssData['button_margin_bottom']); ?>px;
        <?php
            if (esc_attr($cssData['button_align']) == 'center') {
                echo "margin-left: auto; margin-right: auto;";
            } elseif (esc_attr($cssData['button_align']) == 'right') {
                echo "margin-left: auto;";
            } elseif (esc_attr($cssData['button_align']) == 'left') {
                echo "margin-right: auto;";
            }
        ?>

    }

    .anc-6310-counter-18-button:hover {
        background-color: <?php echo esc_attr($cssData['button_background_hover_color']); ?>;
        border-color: <?php echo esc_attr($cssData['button_border_hover_color']); ?>;
    }

    .anc-6310-counter-18-button a {
        padding: 5px;
        color: <?php echo esc_attr($cssData['button_font_color']); ?>;
        font-size: <?php echo esc_attr($cssData['button_font_size']); ?>px !important;
        line-height: <?php echo esc_attr($cssData['button_line_height']); ?>px;
        font-family: <?php echo str_replace("+", " ", esc_attr($cssData['button_font_family'])); ?>;
        font-weight: <?php echo esc_attr($cssData['button_font_weight']); ?>;
        text-transform: <?php echo esc_attr($cssData['button_text_transform']); ?>;
        text-decoration: none;
        word-break: break-word;
    }

    .anc-6310-counter-18-button:hover a {
        color: <?php echo esc_attr($cssData['button_font_hover_color']); ?>;
    }
</style>