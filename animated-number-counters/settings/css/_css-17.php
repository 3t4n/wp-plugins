<style>
    .anc-6310-counter-17-paralax {
        <?php
        if ($bgType == 1) {
            echo "background: transparent;";
        } else if ($bgType == 2) {
            echo "background-color: " . (isset($cssData['template_background_color']) ? esc_attr($cssData['template_background_color']) : 'rgba(255, 255, 255, 0)') . ";";
        } else if ($bgType == 3) {
            echo "background-image: url('" . (isset($cssData['box_background_image']) ? esc_attr($cssData['box_background_image']) : 'rgba(255, 255, 255, 0)') . "');";
        }
        ?>background-size: Cover;
        background-repeat: No-repeat;
        background-position: left top;
        background-attachment: fixed;
        overflow: hidden;
        font-size: 0;
    }

    .anc-6310-counter-17-common-overlay iframe {
        position: absolute;
        top: -100%;
        left: 0;
        width: 100%;
        height: 300%;
        pointer-events: none;
        opacity: .7;
    }

    .anc-6310-counter-17-common-overlay {
        background-color: <?php echo esc_attr($cssData['image_overlay_color']) ?>;
        font-size: 0;
        position: relative;
    }

    .anc-6310-counter-17-common-overlay:hover {
        background-color: <?php echo esc_attr($cssData['image_overlay_hover_color']) ?>;
    }

    .anc-6310-counter-17-row {
        padding: 75px 10px;
        overflow: hidden;
        font-size: 0;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .anc-6310-counter-17 {
        font-family: Amaranth;
        border-style: solid;
        text-align: <?php echo esc_attr($cssData['icon_text_align']) ?>;
        background-color: <?php echo esc_attr($cssData['box_background_color']) ?>;
        -webkit-border-radius: <?php echo esc_attr($cssData['box_radius']) ?>px;
        -o-border-radius: <?php echo esc_attr($cssData['box_radius']) ?>px;
        -moz-border-radius: <?php echo esc_attr($cssData['box_radius']) ?>px;
        -ms-border-radius: <?php echo esc_attr($cssData['box_radius']) ?>px;
        border-radius: <?php echo esc_attr($cssData['box_radius']) ?>px;
        border-width: <?php echo esc_attr($cssData['box_border_width']) ?>px;
        border-color: <?php echo esc_attr($cssData['box_border_color']) ?>;
        box-shadow: 0 0 <?php echo (esc_attr($cssData['box_shadow_blur']?$cssData['box_shadow_blur']:0) * 2) ?>px <?php echo esc_attr($cssData['box_shadow_width']) ?>px <?php echo esc_attr($cssData['box_shadow_color']) ?>;
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        -ms-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
        height: calc(100% - 2 * <?php echo esc_attr($cssData['box_border_width']) ?>px);
    }

    .anc-6310-counter-17:hover {
        background-color: <?php echo esc_attr($cssData['box_background_hover_color']) ?>;
        border-color: <?php echo esc_attr($cssData['box_border_hover_color']) ?>;
        box-shadow: 0 0 <?php echo (esc_attr($cssData['box_shadow_blur']?$cssData['box_shadow_blur']:0) * 2) ?>px <?php echo esc_attr($cssData['box_shadow_width']) ?>px <?php echo esc_attr($cssData['box_shadow_hover_color']) ?>;
    }

    .anc-6310-counter-17-title {
        letter-spacing: 2px;
        font-size: <?php echo esc_attr($cssData['title_font_size']) ?>px;
        line-height: <?php echo esc_attr($cssData['title_line_height']) ?>px;
        color: <?php echo esc_attr($cssData['title_font_color']) ?>;
        font-weight: <?php echo esc_attr($cssData['title_font_weight']) ?>;
        text-transform: <?php echo esc_attr($cssData['title_text_transform']); ?>;
        text-align: <?php echo esc_attr($cssData['title_text_align']) ?>;
        font-family: <?php echo str_replace("+", " ", esc_attr($cssData['title_font_family'])); ?>;
        margin-top: <?php echo esc_attr($cssData['title_margin_top']) ?>px;
        margin-bottom: <?php echo esc_attr($cssData['title_margin_bottom']) ?>px;
        margin-left: <?php echo esc_attr($cssData['title_margin_left']) ?>px;
        margin-right: <?php echo esc_attr($cssData['title_margin_right']) ?>px;
        word-wrap: break-word;
    }

    .anc-6310-counter-17:hover .anc-6310-counter-17-title {
        color: <?php echo esc_attr($cssData['title_font_hover_color']) ?>;
    }

    .anc-6310-counter-17-icon {
        display: inline-block;
    }

    .anc-6310-counter-17-icon i,
    .anc-6310-counter-17-icon img {
        float: left;
        color: <?php echo esc_attr($cssData['icon_color']) ?>;
        font-size: <?php echo esc_attr($cssData['icon_size']) ?>px;
        margin-left: <?php echo esc_attr($cssData['icon_margin_left']) ?>px;
        margin-right: <?php echo esc_attr($cssData['icon_margin_right']) ?>px;
        margin-top: <?php echo esc_attr($cssData['icon_margin_top']) ?>px;
        margin-bottom: <?php echo esc_attr($cssData['icon_margin_bottom']) ?>px;
    }

    .anc-6310-counter-17-icon img {
        margin-left: <?php echo esc_attr($cssData['icon_margin_left']) ?>px;
        margin-right: <?php echo esc_attr($cssData['icon_margin_right']) ?>px;
        margin-top: <?php echo esc_attr($cssData['icon_margin_top']) ?>px;
        margin-bottom: <?php echo esc_attr($cssData['icon_margin_bottom']) ?>px;
    }

    .anc-6310-counter-17:hover .anc-6310-counter-17-icon i,
    .anc-6310-counter-17:hover .anc-6310-counter-17-icon img {
        color: <?php echo esc_attr($cssData['icon_hover_color']) ?>;
        -webkit-animation-name: counter-17-icon-up;
        animation-name: counter-17-icon-up;
        -webkit-animation-duration: 0.75s;
        animation-duration: 0.75s;
        -webkit-animation-timing-function: ease-out;
        animation-timing-function: ease-out;
    }
    .anc-6310-counter-17-icon img { 
        width: <?php echo esc_attr($cssData['icon_size']); ?>px;
        height: <?php echo esc_attr($cssData['icon_size']); ?>px;
    }

    @-webkit-keyframes counter-17-icon-up {

        0%,
        50%,
        100% {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        25%,
        75% {
            -webkit-transform: translateY(-6px);
            transform: translateY(-6px);
        }
    }

    @keyframes counter-17-icon-up {

        0%,
        50%,
        100% {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        25%,
        75% {
            -webkit-transform: translateY(-6px);
            transform: translateY(-6px);
        }
    }

    .anc-6310-counter-17-number-content {
        float: left;
    }

    .anc-6310-counter-17-number {
        display: inline-block;
        font-size: <?php echo esc_attr($cssData['number_font_size']) ?>px;
        color: <?php echo esc_attr($cssData['number_font_color']) ?>;
        font-family: <?php echo str_replace("+", " ", esc_attr($cssData['number_font_family'])); ?>;
        font-weight: <?php echo esc_attr($cssData['number_font_weight']) ?>;
        line-height: <?php echo esc_attr($cssData['number_line_height']) ?>px;
        margin-left: <?php echo esc_attr($cssData['number_margin_left']) ?>px;
        margin-right: <?php echo esc_attr($cssData['number_margin_right']) ?>px;
        margin-top: <?php echo esc_attr($cssData['number_margin_top']) ?>px;
        margin-bottom: <?php echo esc_attr($cssData['number_margin_bottom']) ?>px;
    }

    .anc-6310-counter-17:hover .anc-6310-counter-17-number {
        color: <?php echo esc_attr($cssData['number_font_hover_color']) ?>;
    }

    .anc-6310-counter-17-count-prefix {
        display: <?php echo (isset($cssData['prefix_icon_show_hide']) && esc_attr($cssData['prefix_icon_show_hide'])) ? 'inline-block' : 'none' ?>;
        font-size: <?php echo isset($cssData['number_prefix_font_size']) && $cssData['number_prefix_font_size'] !== '' ? esc_attr($cssData['number_prefix_font_size']) : 20; ?>px;
        color: <?php echo isset($cssData['number_prefix_font_color']) && $cssData['number_prefix_font_color'] !== '' ? esc_attr($cssData['number_prefix_font_color']) : 'rgb(255, 255, 255)'; ?>;
        font-weight: <?php echo isset($cssData['number_prefix_font_weight']) && $cssData['number_prefix_font_weight'] !== '' ? esc_attr($cssData['number_prefix_font_weight']) : '100'; ?>;
        font-family: <?php echo isset($cssData['number_prefix_font_family']) && $cssData['number_prefix_font_family'] !== '' ? str_replace("+", " ", esc_attr($cssData['number_prefix_font_family'])) : 'Amaranth'; ?>;
        vertical-align: <?php echo isset($cssData['number_prefix_position']) && $cssData['number_prefix_position'] !== '' ? esc_attr($cssData['number_prefix_position']) : 2; ?>px;
        margin-left: <?php echo isset($cssData['number_prefix_margin_left']) && $cssData['number_prefix_margin_left'] !== '' ? esc_attr($cssData['number_prefix_margin_left']) : 0; ?>px;
        margin-right: <?php echo isset($cssData['number_prefix_margin_right']) && $cssData['number_prefix_margin_right'] !== '' ? esc_attr($cssData['number_prefix_margin_right']) : 0; ?>px;
    }

    .anc-6310-counter-17:hover .anc-6310-counter-17-count-prefix {
        color: <?php echo isset($cssData['number_prefix_font_hover_color']) && $cssData['number_prefix_font_hover_color'] !== '' ? esc_attr($cssData['number_prefix_font_hover_color']) : 'rgb(255, 255, 255)'; ?>;
    }

    .anc-6310-counter-17-count-suffix {
        display: <?php echo (isset($cssData['suffix_icon_show_hide']) && esc_attr($cssData['suffix_icon_show_hide'])) ? 'inline-block' : 'none' ?>;
        font-size: <?php echo isset($cssData['number_suffix_font_size']) && $cssData['number_suffix_font_size'] !== '' ? esc_attr($cssData['number_suffix_font_size']) : 20; ?>px;
        color: <?php echo isset($cssData['number_suffix_font_color']) && $cssData['number_suffix_font_color'] !== '' ? esc_attr($cssData['number_suffix_font_color']) : 'rgb(255, 255, 255)'; ?>;
        font-weight: <?php echo isset($cssData['number_suffix_font_weight']) && $cssData['number_suffix_font_weight'] !== '' ? esc_attr($cssData['number_suffix_font_weight']) : '100'; ?>;
        font-family: <?php echo isset($cssData['number_suffix_font_family']) && $cssData['number_suffix_font_family'] !== '' ? str_replace("+", " ", esc_attr($cssData['number_suffix_font_family'])) : 'Amaranth'; ?>;
        vertical-align: <?php echo isset($cssData['number_suffix_position']) && $cssData['number_suffix_position'] !== '' ? esc_attr($cssData['number_suffix_position']) : 2; ?>px;
        margin-left: <?php echo isset($cssData['number_suffix_margin_left']) && $cssData['number_suffix_margin_left'] !== '' ? esc_attr($cssData['number_suffix_margin_left']) : 0; ?>px;
        margin-right: <?php echo isset($cssData['number_suffix_margin_right']) && $cssData['number_suffix_margin_right'] !== '' ? esc_attr($cssData['number_suffix_margin_right']) : 0; ?>px;
    }

    .anc-6310-counter-17:hover .anc-6310-counter-17-count-suffix {
        color: <?php echo isset($cssData['number_suffix_font_hover_color']) && $cssData['number_suffix_font_hover_color'] !== '' ? esc_attr($cssData['number_suffix_font_hover_color']) : 'rgb(255, 255, 255)'; ?>;
    }

    .anc-6310-counter-17-description {
        font-size: <?php echo isset($cssData['description_font_size']) && $cssData['description_font_size'] !== '' ? esc_attr($cssData['description_font_size']) : 15; ?>px;
        line-height: <?php echo isset($cssData['description_line_height']) && $cssData['description_line_height'] !== '' ? esc_attr($cssData['description_line_height']) : 15; ?>px;
        color: <?php echo isset($cssData['description_font_color']) && $cssData['description_font_color'] !== '' ? esc_attr($cssData['description_font_color']) : 'rgb(255, 255, 255)'; ?>;
        font-weight: <?php echo isset($cssData['description_font_weight']) && $cssData['description_font_weight'] !== '' ? esc_attr($cssData['description_font_weight']) : 400; ?>;
        text-transform: <?php echo isset($cssData['description_text_transform']) && $cssData['description_text_transform'] !== '' ? esc_attr($cssData['description_text_transform']) : 'capitalize'; ?>;
        text-align: <?php echo isset($cssData['description_text_align']) && $cssData['description_text_align'] !== '' ? esc_attr($cssData['description_text_align']) : 'center'; ?>;
        font-family: <?php echo isset($cssData['description_font_family']) && $cssData['description_font_family'] !== '' ? str_replace("+", " ", esc_attr($cssData['description_font_family'])) : 'Vollkorn'; ?>;
        margin-top: <?php echo isset($cssData['description_margin_top']) && $cssData['description_margin_top'] !== '' ? esc_attr($cssData['description_margin_top']) : 20; ?>px;
        margin-bottom: <?php echo isset($cssData['description_margin_bottom']) && $cssData['description_margin_bottom'] !== '' ? esc_attr($cssData['description_margin_bottom']) : 10; ?>px;
        margin-left: <?php echo isset($cssData['description_margin_left']) && $cssData['description_margin_left'] !== '' ? esc_attr($cssData['description_margin_left']) : 0; ?>px;
        margin-right: <?php echo isset($cssData['description_margin_right']) && $cssData['description_margin_right'] !== '' ? esc_attr($cssData['description_margin_right']) : 0; ?>px;
        display: <?php echo isset($cssData['counter_description']) && $cssData['counter_description'] !== '' ? (($cssData['counter_description']) ? 'block' : 'none') : 'none'; ?>;
        word-break: break-word;
    }

    .anc-6310-counter-17:hover .anc-6310-counter-17-description {
        color: <?php echo isset($cssData['description_font_hover_color']) && $cssData['description_font_hover_color'] !== '' ? esc_attr($cssData['description_font_hover_color']) : 'rgb(255, 255, 255)'; ?>;
    }

    .anc-6310-counter-17-button {
        outline: none;
        display: <?php echo isset($cssData['counter_button']) && $cssData['counter_button'] !== '' ? (($cssData['counter_button']) ? 'block' : 'none') : 'none'; ?>;
        width: <?php echo isset($cssData['button_width']) && $cssData['button_width'] !== '' ? esc_attr($cssData['button_width']) : 110; ?>px;
        background-color: <?php echo isset($cssData['button_background_color']) && $cssData['button_background_color'] !== '' ? esc_attr($cssData['button_background_color']) : 'rgba(0, 158, 226, 1)'; ?>;
        text-align: <?php echo isset($cssData['button_text_align']) && $cssData['button_text_align'] !== '' ? esc_attr($cssData['button_text_align']) : 'center'; ?>;
        border-width: <?php echo isset($cssData['button_border_width']) && $cssData['button_border_width'] !== '' ? esc_attr($cssData['button_border_width']) : "0px"; ?>;
        border-style: solid;
        border-color: <?php echo isset($cssData['button_border_color']) && $cssData['button_border_color'] !== '' ? esc_attr($cssData['button_border_color']) : 'rgb(255, 255, 255)'; ?>;
        border-radius: <?php echo isset($cssData['button_border_radius']) && $cssData['button_border_radius'] !== '' ? esc_attr($cssData['button_border_radius']) : 0; ?>px;
        margin-top: <?php echo isset($cssData['button_margin_top']) && $cssData['button_margin_top'] !== '' ? esc_attr($cssData['button_margin_top']) : 25; ?>px;
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

    .anc-6310-counter-17-button:hover {
        background-color: <?php echo isset($cssData['button_background_hover_color']) && $cssData['button_background_hover_color'] !== '' ? esc_attr($cssData['button_background_hover_color']) : 'rgba(7, 144, 204, 0.8)'; ?>;
        border-color: <?php echo isset($cssData['button_border_hover_color']) && $cssData['button_border_hover_color'] !== '' ? esc_attr($cssData['button_border_hover_color']) : 'rgb(255, 255, 255)'; ?>;
    }

    .anc-6310-counter-17-button a {
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

    .anc-6310-counter-17-button:hover a {
        color: <?php echo isset($cssData['button_font_hover_color']) && $cssData['button_font_hover_color'] !== '' ? esc_attr($cssData['button_font_hover_color']) : 'rgb(255, 255, 255)'; ?>;
    }
</style>