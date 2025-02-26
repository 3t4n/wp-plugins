<style>
    .anc-6310-counter-16-paralax {
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
        background-position: left top;
        background-attachment: fixed;
        overflow: hidden;
        font-size: 0;
    }

    .anc-6310-counter-16-common-overlay {
        background-color: <?php echo esc_attr($cssData['image_overlay_color']); ?>;
        font-size: 0;
        position: relative;
    }

    .anc-6310-counter-16-common-overlay:hover {
        background-color: <?php echo esc_attr($cssData['image_overlay_hover_color']); ?>;
    }

    .anc-6310-counter-16-common-overlay iframe {
        position: absolute;
        top: -100%;
        left: 0;
        width: 100%;
        height: 300%;
        pointer-events: none;
        opacity: .7;
    }

    .anc-6310-counter-16-row {
        padding: 100px 10px 75px;
        overflow: hidden;
        font-size: 0;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .anc-6310-counter-16 {
        padding: 20px 20px 25px;
        display: block;
        font-family: Amaranth;
        border-style: solid;
        text-align: <?php echo esc_attr($cssData['icon_text_align']); ?>;
        background-color: <?php echo esc_attr($cssData['box_background_color']); ?>;
        -webkit-border-radius: <?php echo esc_attr($cssData['box_radius']); ?>px;
        -o-border-radius: <?php echo esc_attr($cssData['box_radius']); ?>px;
        -moz-border-radius: <?php echo esc_attr($cssData['box_radius']); ?>px;
        -ms-border-radius: <?php echo esc_attr($cssData['box_radius']); ?>px;
        border-radius: <?php echo esc_attr($cssData['box_radius']); ?>px;
        border-width: <?php echo esc_attr($cssData['box_border_width']); ?>px;
        border-color: <?php echo esc_attr($cssData['box_border_color']); ?>;
        box-shadow: 0 0 <?php echo esc_attr((($cssData['box_shadow_blur']?$cssData['box_shadow_blur']:0) * 2)); ?>px <?php echo esc_attr($cssData['box_shadow_width']); ?>px <?php echo esc_attr($cssData['box_shadow_color']); ?>;
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        -ms-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
        height: calc(100% - 45px - 2 * <?php echo esc_attr($cssData['box_border_width']?$cssData['box_border_width']:0); ?>px);
    }

    .anc-6310-counter-16:hover {
        background-color: <?php echo esc_attr($cssData['box_background_hover_color']); ?>;
        border-color: <?php echo esc_attr($cssData['box_border_hover_color']); ?>;
        box-shadow: 0 0 <?php echo esc_attr((($cssData['box_shadow_blur']?$cssData['box_shadow_blur']:0) * 2)); ?>px <?php echo esc_attr($cssData['box_shadow_width']); ?>px <?php echo esc_attr($cssData['box_shadow_hover_color']); ?>;
        -webkit-transform: scale(1.04);
        -moz-transform: scale(1.04);
        -ms-transform: scale(1.04);
        transform: scale(1.04);
    }

    .anc-6310-counter-16-icon {
        display: inline-block;
    }

    .anc-6310-counter-16-icon i,
    .anc-6310-counter-16-icon img {
        float: left;
        color: <?php echo esc_attr($cssData['icon_color']); ?>;
        font-size: <?php echo esc_attr($cssData['icon_size']); ?>px;
        margin-left: <?php echo esc_attr($cssData['icon_margin_left']); ?>px;
        margin-right: <?php echo esc_attr($cssData['icon_margin_right']); ?>px;
        margin-top: <?php echo esc_attr($cssData['icon_margin_top']); ?>px;
        margin-bottom: <?php echo esc_attr($cssData['icon_margin_bottom']); ?>px;
    }

    .anc-6310-counter-16-icon img {
        margin-left: <?php echo esc_attr($cssData['icon_margin_left']); ?>px;
        margin-right: <?php echo esc_attr($cssData['icon_margin_right']); ?>px;
        margin-top: <?php echo esc_attr($cssData['icon_margin_top']); ?>px;
        margin-bottom: <?php echo esc_attr($cssData['icon_margin_bottom']); ?>px;
    }

    .anc-6310-counter-16:hover .anc-6310-counter-16-icon i,
    .anc-6310-counter-16:hover .anc-6310-counter-16-icon img {
        color: <?php echo esc_attr($cssData['icon_hover_color']); ?>;
    }

    .anc-6310-counter-16-icon img { 
        width: <?php echo esc_attr($cssData['icon_size']); ?>px;
        height: <?php echo esc_attr($cssData['icon_size']); ?>px;
    }

    .anc-6310-counter-16-number-content {
        float: left;
    }

    .anc-6310-counter-16-number {
        letter-spacing: 2px;
        display: inline-block;
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

    .anc-6310-counter-16:hover .anc-6310-counter-16-number {
        color: <?php echo esc_attr($cssData['number_font_hover_color']); ?>;
    }

    .anc-6310-counter-16-count-prefix {
        display: <?php echo (isset($cssData['prefix_icon_show_hide']) && esc_attr($cssData['prefix_icon_show_hide'])) ? 'inline-block' : 'none'; ?>;
        font-size: <?php echo isset($cssData['number_prefix_font_size']) && $cssData['number_prefix_font_size'] !== '' ? esc_attr($cssData['number_prefix_font_size']) : 20; ?>px;
        color: <?php echo isset($cssData['number_prefix_font_color']) && $cssData['number_prefix_font_color'] !== '' ? esc_attr($cssData['number_prefix_font_color']) : 'rgb(255, 255, 255)'; ?>;
        font-weight: <?php echo isset($cssData['number_prefix_font_weight']) && $cssData['number_prefix_font_weight'] !== '' ? esc_attr($cssData['number_prefix_font_weight']) : '100'; ?>;
        font-family: <?php echo isset($cssData['number_prefix_font_family']) && $cssData['number_prefix_font_family'] !== '' ? str_replace("+", " ", esc_attr($cssData['number_prefix_font_family'])) : 'Amaranth'; ?>;
        vertical-align: <?php echo isset($cssData['number_prefix_position']) && $cssData['number_prefix_position'] !== '' ? esc_attr($cssData['number_prefix_position']) : 2; ?>px;
        margin-left: <?php echo isset($cssData['number_prefix_margin_left']) && $cssData['number_prefix_margin_left'] !== '' ? esc_attr($cssData['number_prefix_margin_left']) : 0; ?>px;
        margin-right: <?php echo isset($cssData['number_prefix_margin_right']) && $cssData['number_prefix_margin_right'] !== '' ? esc_attr($cssData['number_prefix_margin_right']) : 0; ?>px;
    }

    .anc-6310-counter-16:hover .anc-6310-counter-16-count-prefix {
        color: <?php echo isset($cssData['number_prefix_font_hover_color']) && $cssData['number_prefix_font_hover_color'] !== '' ? esc_attr($cssData['number_prefix_font_hover_color']) : 'rgb(255, 255, 255)'; ?>;
    }

    .anc-6310-counter-16-count-suffix {
        display: <?php echo (isset($cssData['suffix_icon_show_hide']) && esc_attr($cssData['suffix_icon_show_hide'])) ? 'inline-block' : 'none'; ?>;
        font-size: <?php echo isset($cssData['number_suffix_font_size']) && $cssData['number_suffix_font_size'] !== '' ? esc_attr($cssData['number_suffix_font_size']) : 20; ?>px;
        color: <?php echo isset($cssData['number_suffix_font_color']) && $cssData['number_suffix_font_color'] !== '' ? esc_attr($cssData['number_suffix_font_color']) : 'rgb(255, 255, 255)'; ?>;
        font-weight: <?php echo isset($cssData['number_suffix_font_weight']) && $cssData['number_suffix_font_weight'] !== '' ? esc_attr($cssData['number_suffix_font_weight']) : '100'; ?>;
        font-family: <?php echo isset($cssData['number_suffix_font_family']) && $cssData['number_suffix_font_family'] !== '' ? str_replace("+", " ", esc_attr($cssData['number_suffix_font_family'])) : 'Amaranth'; ?>;
        vertical-align: <?php echo isset($cssData['number_suffix_position']) && $cssData['number_suffix_position'] !== '' ? esc_attr($cssData['number_suffix_position']) : 2; ?>px;
        margin-left: <?php echo isset($cssData['number_suffix_margin_left']) && $cssData['number_suffix_margin_left'] !== '' ? esc_attr($cssData['number_suffix_margin_left']) : 0; ?>px;
        margin-right: <?php echo isset($cssData['number_suffix_margin_right']) && $cssData['number_suffix_margin_right'] !== '' ? esc_attr($cssData['number_suffix_margin_right']) : 0; ?>px;
    }

    .anc-6310-counter-16:hover .anc-6310-counter-16-count-suffix {
        color: <?php echo isset($cssData['number_suffix_font_hover_color']) && $cssData['number_suffix_font_hover_color'] !== '' ? esc_attr($cssData['number_suffix_font_hover_color']) : 'rgb(255, 255, 255)'; ?>;
    }

    .anc-6310-counter-16-title {
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

    .anc-6310-counter-16:hover .anc-6310-counter-16-title {
        color: <?php echo esc_attr($cssData['title_font_hover_color']); ?>;
    }

    .anc-6310-counter-16-description {
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
        display: <?php echo isset($cssData['counter_description']) && $cssData['counter_description'] !== '' ? (esc_attr($cssData['counter_description']) ? 'block' : 'none') : 'none'; ?>;

        word-break: break-word;
    }

    .anc-6310-counter-16:hover .anc-6310-counter-16-description {
        color: <?php echo esc_attr($cssData['description_font_hover_color']); ?>;
    }

    .anc-6310-counter-16-button {
        outline: none;
        display: <?php echo isset($cssData['counter_button']) && $cssData['counter_button'] !== '' ? (esc_attr($cssData['counter_button']) ? 'block' : 'none') : 'none'; ?>;

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
        if (isset($cssData['button_align']) && $cssData['button_align'] !== '') {
            if ($cssData['button_align'] == 'center') {
                echo "margin-left: auto; margin-right: auto;";
            } elseif ($cssData['button_align'] == 'right') {
                echo "margin-left: auto;";
            } elseif ($cssData['button_align'] == 'left') {
                echo "margin-right: auto;";
            }
        } else {
            echo "margin-left: auto; margin-right: auto;";
        }
        ?>
    }

    .anc-6310-counter-16-button:hover {
        background-color: <?php echo esc_attr($cssData['button_background_hover_color']); ?>;
        border-color: <?php echo esc_attr($cssData['button_border_hover_color']); ?>;
    }

    .anc-6310-counter-16-button a {
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

    .anc-6310-counter-16-button:hover a {
        color: <?php echo esc_attr($cssData['button_font_hover_color']); ?>;
    }
</style>