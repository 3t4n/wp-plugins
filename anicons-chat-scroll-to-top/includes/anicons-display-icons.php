<?php

if (!defined('ABSPATH')) {
    exit;
}

// to Display icons in the frontend
function anicons_display_icons() {
    $whatsapp_number = esc_attr(get_option('anicons_whatsapp_number', ''));
    $whatsapp_enabled = get_option('anicons_whatsapp_enabled', 'yes') === 'yes';
    $scroll_enabled = get_option('anicons_scroll_enabled', 'yes') === 'yes';
    $whatsapp_bottom = intval(get_option('anicons_whatsapp_bottom', 20));
    $whatsapp_left = intval(get_option('anicons_whatsapp_left', 20));
    $scroll_bottom = intval(get_option('anicons_scroll_bottom', 20));
    $scroll_right = intval(get_option('anicons_scroll_right', 20));
    $whatsapp_icon = esc_attr(get_option('anicons_whatsapp_icon', 'icon-whatsapp-01.png'));
    $scroll_icon = esc_attr(get_option('anicons_scroll_icon', 'icon-scroll-to-top-01.png'));

    // Get the switch's state
    $switch_enabled = get_option('anicons_switch_enabled', 'yes') === 'yes';

    // Determine positioning based on switch state
    $whatsapp_position_style =  esc_attr($switch_enabled 
        ? "right: {$whatsapp_left}px; left: auto;" 
        : "left: {$whatsapp_left}px; right: auto;");

    $scroll_position_style =  esc_attr($switch_enabled 
        ? "left: {$scroll_right}px; right: auto;" 
        : "right: {$scroll_right}px; left: auto;");

    // WhatsApp Icon
    if ($whatsapp_enabled && !empty($whatsapp_number)) {
        // Register the WhatsApp icon
        wp_register_style(
            'anicons-whatsapp-icon',
            false,
            array(),
            '1.0.0'
        );

        // Add the icon as a background image via CSS 
        $icon_url = esc_url(plugin_dir_url(__FILE__). 'assets/'. $whatsapp_icon);
        $custom_css = "
          .anicons-whatsapp-icon {
                display: block;
                width: 50px;
                height: 50px;
                background-image: url('{$icon_url}');
                background-size: contain;
                background-repeat: no-repeat;
            }
        ";
        wp_add_inline_style('anicons-whatsapp-icon', $custom_css);
        wp_enqueue_style('anicons-whatsapp-icon');

        // Modify the WhatsApp link
        $whatsapp_link = is_mobile()
          ? 'https://api.whatsapp.com/send?phone='. esc_attr($whatsapp_number)
          : 'https://web.whatsapp.com/send?phone='. esc_attr($whatsapp_number);

        echo '<div class="anicons-whatsapp" style="bottom: '. esc_attr($whatsapp_bottom). 'px; '. esc_attr($whatsapp_position_style). '">'. "\n".
             '<a href="'. esc_url($whatsapp_link). '" target="_blank" rel="noopener noreferrer">'. "\n".
             '<span class="anicons-whatsapp-icon" role="img" aria-label="'. esc_attr__('WhatsApp Icon', 'anicons-chat-scroll-to-top'). '"></span>'. "\n".
             '</a>'. "\n".
             '</div>';
    }

    // Scroll to Top Icon
    if ($scroll_enabled) {
        // Register the scroll icon
        wp_register_style(
            'anicons-scroll-icon',
            false,
            array(),
            '1.0.0'
        );

        // Add the icon as a background image via CSS
        $icon_url = esc_url(plugin_dir_url(__FILE__). 'assets/'. $scroll_icon);
        $custom_css = "
          .anicons-scroll-icon {
                display: block;
                width: 50px;
                height: 50px;
                background-image: url('{$icon_url}');
                background-size: contain;
                background-repeat: no-repeat;
            }
        ";
        wp_add_inline_style('anicons-scroll-icon', $custom_css);
        wp_enqueue_style('anicons-scroll-icon');

        echo '<div class="anicons-scroll" style="bottom: '. esc_attr($scroll_bottom). 'px; '. esc_attr($scroll_position_style). '">'. "\n".
             '<span class="anicons-scroll-icon" role="img" aria-label="'. esc_attr__('Scroll to Top Icon', 'anicons-chat-scroll-to-top'). '"></span>'. "\n".
             '</div>';
    }
}
add_action('wp_footer', 'anicons_display_icons');

// Add scroll-to-top Animation
function anicons_add_scroll_script() {
    if (get_option('anicons_scroll_enabled', 'yes') === 'yes') {
        wp_enqueue_script( 'anicons-scroll-script', esc_url(plugin_dir_url(__FILE__). 'js/scroll-script.js'),  array( 'jquery' ), '1.0', true );

        wp_add_inline_script( 'anicons-scroll-script', '
            jQuery(document).ready(function ($) {

                // Scroll-to-top functionality
                $(\'.anicons-scroll\').click(function () {
                    $(\'html, body\').animate({ scrollTop: 0 }, \'slow\');
                });

                // Show or hide the scroll-to-top button based on scroll position
                $(window).scroll(function () {
                    if ($(this).scrollTop() > 100) {
                        $(\'.anicons-scroll\').fadeIn();
                    } else {

                        $(\'.anicons-scroll\').fadeOut();
                    }
                });
                // Initially hide the scroll-to-top button
                $(\'.anicons-scroll\').hide();
            });
        ' );
    }
}
add_action('wp_footer', 'anicons_add_scroll_script', 100);

// Function to detect mobile devices
function is_mobile() {
    return wp_is_mobile();
}?>