<style>
    .anc-6310-counter-22-row {
        display: flex;
        flex-wrap: wrap;
    }

    .anc-6310-counter-22-paralax {
        <?php
        if ($bgType == 1) {
            echo "background: transparent;";
        } else if ($bgType == 2) {
            echo "background-color: " . (isset($cssData['template_background_color']) ? esc_attr($cssData['template_background_color']) : 'rgba(255, 255, 255, 0)') . ";";
        } else if ($bgType == 3) {
            echo "background-image: url('" . (isset($cssData['box_background_image']) ? esc_url($cssData['box_background_image']) : 'rgba(255, 255, 255, 0)') . "');";
        }
        ?>position: relative;
        width: 100%;
        overflow: hidden;
        text-align: center;
        font-size: 0;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .anc-6310-counter-22-paralax:hover {
        background: <?php echo esc_attr($cssData['full_background_hover_color']); ?>;
    }

    .anc-6310-counter-22-common-overlay iframe {
        position: absolute;
        top: -100%;
        left: 0;
        width: 100%;
        height: 300%;
        pointer-events: none;
        opacity: .7;
    }

    .anc-6310-counter-22-common-overlay {
        overflow: hidden;
        font-size: 0;
        position: relative;
    }

    .anc-6310-counter-22 {
        padding: 30px 20px;
        border: <?php echo esc_attr($cssData['box_border_width']); ?>px solid <?php echo esc_attr($cssData['box_border_color']); ?>;
        border-radius: 50px 0 50px 0;
        text-align: center;
        background: <?php echo esc_attr($cssData['box_background_color']); ?>;
        box-shadow: 0 0 <?php echo esc_attr(($cssData['box_shadow_blur']?$cssData['box_shadow_blur']:0) * 2); ?>px <?php echo esc_attr($cssData['box_shadow_width']); ?>px <?php echo esc_attr($cssData['box_shadow_color']); ?>;
        margin-top: 30px;
        height: calc(100% - 30px);
        box-sizing: border-box;
    }

    .anc-6310-counter-22:hover {
        padding: 30px 20px;
        border-color: <?php echo esc_attr($cssData['box_border_hover_color']); ?>;
        border-radius: 50px 0 50px 0;
        text-align: center;
        background: <?php echo esc_attr($cssData['box_background_hover_color']); ?>;
        box-shadow: 0 0 <?php echo esc_attr(($cssData['box_shadow_blur']?$cssData['box_shadow_blur']:0) * 2); ?>px <?php echo esc_attr($cssData['box_shadow_width']); ?>px <?php echo esc_attr($cssData['box_shadow_hover_color']); ?>;
    }

    .anc-6310-counter-22-icon {
        display: block;
    }

    .anc-6310-counter-22-icon i,
    .anc-6310-counter-22-icon img {
        color: <?php echo esc_attr($cssData['icon_color']); ?>;
        font-size: <?php echo esc_attr($cssData['icon_size']); ?>px;
        margin-left: <?php echo esc_attr($cssData['icon_margin_left']); ?>px;
        margin-right: <?php echo esc_attr($cssData['icon_margin_right']); ?>px;
        margin-top: <?php echo esc_attr($cssData['icon_margin_top']); ?>px;
        margin-bottom: <?php echo esc_attr($cssData['icon_margin_bottom']); ?>px;
        -webkit-transform: translateZ(0);
        transform: translateZ(0);
    }
    .anc-6310-counter-22-icon img { 
        width: <?php echo esc_attr($cssData['icon_size']); ?>px;
        height: <?php echo esc_attr($cssData['icon_size']); ?>px;
    }

    .anc-6310-counter-22-icon img {
        margin-left: <?php echo esc_attr($cssData['icon_margin_left']); ?>px;
        margin-right: <?php echo esc_attr($cssData['icon_margin_right']); ?>px;
        margin-top: <?php echo esc_attr($cssData['icon_margin_top']); ?>px;
        margin-bottom: <?php echo esc_attr($cssData['icon_margin_bottom']); ?>px;
        -webkit-transform: translateZ(0);
        transform: translateZ(0);
    }

    .anc-6310-counter-22:hover .anc-6310-counter-22-icon i,
    .anc-6310-counter-22:hover .anc-6310-counter-22-icon img {
        color: <?php echo esc_attr($cssData['icon_hover_color']); ?>;
    }

    .anc-6310-animated-counter-22 {
        display: inline-block;
        width: 100%;
        height: <?php echo esc_attr($cssData['number_background_height']); ?>px;
        line-height: <?php echo esc_attr($cssData['number_background_height']); ?>px;
        background: <?php echo esc_attr($cssData['number_background_color']); ?>;
        border-radius: 0 50px 0 50px;
        margin-bottom: 10px;
    }

    .anc-6310-counter-22-number-content {
        display: flex;
        float: left;
        width: <?php echo esc_attr($cssData['number_background_width']); ?>px;
        justify-content: center;
        height: <?php echo esc_attr($cssData['number_background_height']); ?>px;
        line-height: <?php echo esc_attr($cssData['number_background_height']); ?>px;
        background: <?php echo esc_attr($cssData['number_background_color']); ?>;
        border-radius: 0 50px 0 50px;
        margin-bottom: 10px;
    }

    .anc-6310-counter-22:hover .anc-6310-counter-22-number-content {
        background: <?php echo esc_attr($cssData['number_background_hover_color']); ?>;
    }

    .anc-6310-counter-22-inner-wrap {
        display: flex;
        flex-direction: column;
        float: left;
        width: 100%;
        justify-content: center;
        align-items: center;
    }

    .anc-6310-counter-22-number {
        letter-spacing: 2px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: <?php echo esc_attr($cssData['number_font_size']); ?>px;
        color: <?php echo esc_attr($cssData['number_font_color']); ?>;
        font-family: <?php echo str_replace("+", " ", esc_attr($cssData['number_font_family'])); ?>;
        font-weight: <?php echo esc_attr($cssData['number_font_weight']); ?>;
        text-align: left;
        line-height: <?php echo esc_attr($cssData['number_line_height']); ?>px;
    }

    .anc-6310-counter-22:hover .anc-6310-counter-22-number {
        color: <?php echo esc_attr($cssData['number_font_hover_color']); ?>;
    }

    .anc-6310-counter-22-count-prefix {
        display: <?php echo (isset($cssData['prefix_icon_show_hide']) && $cssData['prefix_icon_show_hide']) ? 'inline-block' : 'none' ?>;
        font-size: <?php echo isset($cssData['number_prefix_font_size']) && $cssData['number_prefix_font_size'] !== '' ? esc_attr($cssData['number_prefix_font_size']) : 20; ?>px;
        color: <?php echo isset($cssData['number_prefix_font_color']) && $cssData['number_prefix_font_color'] !== '' ? esc_attr($cssData['number_prefix_font_color']) : 'rgb(255, 255, 255)'; ?>;
        font-weight: <?php echo isset($cssData['number_prefix_font_weight']) && $cssData['number_prefix_font_weight'] !== '' ? esc_attr($cssData['number_prefix_font_weight']) : '100'; ?>;
        font-family: <?php echo isset($cssData['number_prefix_font_family']) && $cssData['number_prefix_font_family'] !== '' ? str_replace("+", " ", esc_attr($cssData['number_prefix_font_family'])) : 'Amaranth'; ?>;
        line-height: <?php echo isset($cssData['number_prefix_position']) && $cssData['number_prefix_position'] !== '' ? esc_attr($cssData['number_prefix_position']) : 85; ?>px;
        margin-left: <?php echo isset($cssData['number_prefix_margin_left']) && $cssData['number_prefix_margin_left'] !== '' ? esc_attr($cssData['number_prefix_margin_left']) : 0; ?>px;
        margin-right: <?php echo isset($cssData['number_prefix_margin_right']) && $cssData['number_prefix_margin_right'] !== '' ? esc_attr($cssData['number_prefix_margin_right']) : 0; ?>px;
    }

    .anc-6310-counter-22:hover .anc-6310-counter-22-count-prefix {
        color: <?php echo isset($cssData['number_prefix_font_hover_color']) && $cssData['number_prefix_font_hover_color'] !== '' ? esc_attr($cssData['number_prefix_font_hover_color']) : 'rgb(255, 255, 255)'; ?>;
    }

    .anc-6310-counter-22-count-suffix {
        display: <?php echo (isset($cssData['suffix_icon_show_hide']) && $cssData['suffix_icon_show_hide']) ? 'inline-block' : 'none' ?>;
        font-size: <?php echo isset($cssData['number_suffix_font_size']) && $cssData['number_suffix_font_size'] !== '' ? esc_attr($cssData['number_suffix_font_size']) : 20; ?>px;
        color: <?php echo isset($cssData['number_suffix_font_color']) && $cssData['number_suffix_font_color'] !== '' ? esc_attr($cssData['number_suffix_font_color']) : 'rgb(255, 255, 255)'; ?>;
        font-weight: <?php echo isset($cssData['number_suffix_font_weight']) && $cssData['number_suffix_font_weight'] !== '' ? esc_attr($cssData['number_suffix_font_weight']) : '100'; ?>;
        font-family: <?php echo isset($cssData['number_suffix_font_family']) && $cssData['number_suffix_font_family'] !== '' ? str_replace("+", " ", esc_attr($cssData['number_suffix_font_family'])) : 'Amaranth'; ?>;
        line-height: <?php echo isset($cssData['number_suffix_position']) && $cssData['number_suffix_position'] !== '' ? esc_attr($cssData['number_suffix_position']) : 85; ?>px;
        margin-left: <?php echo isset($cssData['number_suffix_margin_left']) && $cssData['number_suffix_margin_left'] !== '' ? esc_attr($cssData['number_suffix_margin_left']) : 0; ?>px;
        margin-right: <?php echo isset($cssData['number_suffix_margin_right']) && $cssData['number_suffix_margin_right'] !== '' ? esc_attr($cssData['number_suffix_margin_right']) : 0; ?>px;
    }

    .anc-6310-counter-22:hover .anc-6310-counter-22-count-suffix {
        color: <?php echo isset($cssData['number_suffix_font_hover_color']) && $cssData['number_suffix_font_hover_color'] !== '' ? esc_attr($cssData['number_suffix_font_hover_color']) : 'rgb(255, 255, 255)'; ?>;
    }

    .anc-6310-counter-22-title {
        letter-spacing: 2px;
        float: left;
        font-size: <?php echo esc_attr($cssData['title_font_size']); ?>px;
        line-height: <?php echo esc_attr($cssData['title_line_height']); ?>px;
        color: <?php echo esc_attr($cssData['title_font_color']); ?>;
        font-weight: <?php echo esc_attr($cssData['title_font_weight']); ?>;
        text-transform: <?php echo esc_attr($cssData['title_text_transform']); ?>;
        text-align: center;
        font-family: <?php echo str_replace("+", " ", esc_attr($cssData['title_font_family'])); ?>;
        margin-top: <?php echo esc_attr($cssData['title_margin_top']); ?>px;
        margin-bottom: <?php echo esc_attr($cssData['title_margin_bottom']); ?>px;
        margin-left: <?php echo esc_attr($cssData['title_margin_left']); ?>px;
        margin-right: <?php echo esc_attr($cssData['title_margin_right']); ?>px;
        word-wrap: break-word;
    }

    .anc-6310-counter-22:hover .anc-6310-counter-22-title {
        color: <?php echo esc_attr($cssData['title_font_hover_color']); ?>;
    }

    .anc-6310-counter-22-description {
        font-size: <?php echo isset($cssData['description_font_size']) && $cssData['description_font_size'] !== '' ? esc_attr($cssData['description_font_size']) : 15; ?>px;
        line-height: <?php echo isset($cssData['description_line_height']) && $cssData['description_line_height'] !== '' ? esc_attr($cssData['description_line_height']) : 15; ?>px;
        color: <?php echo isset($cssData['description_font_color']) && $cssData['description_font_color'] !== '' ? esc_attr($cssData['description_font_color']) : 'rgb(255, 255, 255)'; ?>;
        font-weight: <?php echo isset($cssData['description_font_weight']) && $cssData['description_font_weight'] !== '' ? esc_attr($cssData['description_font_weight']) : 400; ?>;
        text-transform: <?php echo isset($cssData['description_text_transform']) && $cssData['description_text_transform'] !== '' ? esc_attr($cssData['description_text_transform']) : 'capitalize'; ?>;
        text-align: <?php echo isset($cssData['description_text_align']) && $cssData['description_text_align'] !== '' ? esc_attr($cssData['description_text_align']) : 'center'; ?>;
        font-family: <?php echo isset($cssData['description_font_family']) && $cssData['description_font_family'] !== '' ? str_replace("+", " ", esc_attr($cssData['description_font_family'])) : 'Vollkorn'; ?>;
        margin-top: <?php echo isset($cssData['description_margin_top']) && $cssData['description_margin_top'] !== '' ? esc_attr($cssData['description_margin_top']) : 20; ?>px;
        margin-bottom: <?php echo isset($cssData['description_margin_bottom']) && $cssData['description_margin_bottom'] !== '' ? esc_attr($cssData['description_margin_bottom']) : 20; ?>px;
        margin-left: <?php echo isset($cssData['description_margin_left']) && $cssData['description_margin_left'] !== '' ? esc_attr($cssData['description_margin_left']) : 0; ?>px;
        margin-right: <?php echo isset($cssData['description_margin_right']) && $cssData['description_margin_right'] !== '' ? esc_attr($cssData['description_margin_right']) : 0; ?>px;
        display: <?php echo isset($cssData['counter_description']) && $cssData['counter_description'] !== '' ? (($cssData['counter_description']) ? 'block' : 'none') : 'none'; ?>;
        word-break: break-word;
        float: left;
        width: 100%;
    }

    .anc-6310-counter-22:hover .anc-6310-counter-22-description {
        color: <?php echo isset($cssData['description_font_hover_color']) && $cssData['description_font_hover_color'] !== '' ? esc_attr($cssData['description_font_hover_color']) : 'rgb(255, 255, 255)'; ?>;
    }

    .anc-6310-counter-22-button {
        outline: none;
        display: <?php echo isset($cssData['counter_button']) && $cssData['counter_button'] !== '' ? (esc_attr($cssData['counter_button']) ? 'inline-block' : 'none') : 'none'; ?>;
        width: <?php echo isset($cssData['button_width']) && $cssData['button_width'] !== '' ? esc_attr($cssData['button_width']) : 110; ?>px;
        background-color: <?php echo isset($cssData['button_background_color']) && $cssData['button_background_color'] !== '' ? esc_attr($cssData['button_background_color']) : 'rgba(0, 158, 226, 1)'; ?>;
        text-align: <?php echo isset($cssData['button_text_align']) && $cssData['button_text_align'] !== '' ? esc_attr($cssData['button_text_align']) : 'center'; ?>;
        border-width: <?php echo isset($cssData['button_border_width']) && $cssData['button_border_width'] !== '' ? esc_attr($cssData['button_border_width']) : "0px"; ?>;
        border-style: solid;
        border-color: <?php echo isset($cssData['button_border_color']) && $cssData['button_border_color'] !== '' ? esc_attr($cssData['button_border_color']) : 'rgb(255, 255, 255)'; ?>;
        border-radius: <?php echo isset($cssData['button_border_radius']) && $cssData['button_border_radius'] !== '' ? esc_attr($cssData['button_border_radius']) : 0; ?>px;
        margin-top: <?php echo isset($cssData['button_margin_top']) && $cssData['button_margin_top'] !== '' ? esc_attr($cssData['button_margin_top']) : 20; ?>px;
        margin-bottom: <?php echo isset($cssData['button_margin_bottom']) && $cssData['button_margin_bottom'] !== '' ? esc_attr($cssData['button_margin_bottom']) : 10; ?>px;
        <?php
        if (isset($cssData['button_align']) && $cssData['button_align'] !== '') {
            if (esc_attr($cssData['button_align']) == 'center') {
                echo "margin-left: auto; margin-right: auto;";
            } elseif (esc_attr($cssData['button_align']) == 'right') {
                echo "margin-left: auto;";
            } elseif (esc_attr($cssData['button_align']) == 'left') {
                echo "margin-right: auto;";
            }
        } else {
            echo "margin-left: auto; margin-right: auto;";
        }
        ?>
    }

    .anc-6310-counter-22-button:hover {
        background-color: <?php echo isset($cssData['button_background_hover_color']) && $cssData['button_background_hover_color'] !== '' ? esc_attr($cssData['button_background_hover_color']) : 'rgba(7, 144, 204, 0.8)'; ?>;
        border-color: <?php echo isset($cssData['button_border_hover_color']) && $cssData['button_border_hover_color'] !== '' ? esc_attr($cssData['button_border_hover_color']) : 'rgb(255, 255, 255)'; ?>;
    }

    .anc-6310-counter-22-button a {
        padding: 5px;
        color: <?php echo isset($cssData['button_font_color']) && $cssData['button_font_color'] !== '' ? esc_attr($cssData['button_font_color']) : 'rgb(255, 255, 255)'; ?>;
        font-size: <?php echo isset($cssData['button_font_size']) && $cssData['button_font_size'] !== '' ? esc_attr($cssData['button_font_size']) : 13; ?>px !important;
        line-height: <?php echo isset($cssData['button_line_height']) && $cssData['button_line_height'] !== '' ? esc_attr($cssData['button_line_height']) : 25; ?>px;
        font-family: <?php echo isset($cssData['button_font_family']) && $cssData['button_font_family'] !== '' ? str_replace("+", " ", esc_attr($cssData['button_font_family'])) : 'arimo'; ?>;
        font-weight: <?php echo isset($cssData['button_font_weight']) && $cssData['button_font_weight'] !== '' ? esc_attr($cssData['button_font_weight']) : 400; ?>;
        text-transform: <?php echo isset($cssData['button_text_transform']) && $cssData['button_text_transform'] !== '' ? esc_attr($cssData['button_text_transform']) : 'uppercase'; ?>;
        text-decoration: none;
        word-break: break-word;
    }

    .anc-6310-counter-22-button:hover a {
        color: <?php echo isset($cssData['button_font_hover_color']) && $cssData['button_font_hover_color'] !== '' ? esc_attr($cssData['button_font_hover_color']) : 'rgb(255, 255, 255)'; ?>;
    }

    @media only screen and (max-width: 1199px) and (min-width: 990px) {
        .anc-6310-animated-counter-22 {
            width: 150px;
            height: 60px;
            font-size: 40px;
            line-height: 60px;
        }
    }

    @media only screen and (max-width: 990px) {
        .anc-6310-counter-22 {
            margin-bottom: 20px;
        }
    }
</style>