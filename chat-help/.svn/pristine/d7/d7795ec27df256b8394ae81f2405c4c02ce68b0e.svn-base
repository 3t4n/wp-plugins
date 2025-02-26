<?php

/**
 * Multi Template Class
 *
 * This class handles the multi template functionality for Chat WhatsApp .
 *
 * @link       https://themeatelier.net
 * @since      1.0.0
 *
 * @package    chat-whatsapp
 * @subpackage chat-help/src/Frontend
 * @author     ThemeAtelier<themeatelierbd@gmail.com>
 */

namespace ThemeAtelier\ChatWhatsapp\Frontend\Templates;

/**
 * Class WooButton
 *
 * Handles the rendering of multiple templates in the plugin.
 *
 * @since 1.0.0
 */
class WooButton
{
    public static function woo_button()
    {
        $options = get_option('cwp_option');
        $wooCommerce_button_number = isset($options['wooCommerce_button_number']) ? $options['wooCommerce_button_number'] : '';
        $wooCommerce_button_icon = isset($options['wooCommerce_button_icon']) ? $options['wooCommerce_button_icon'] : 1;
        $wooCommerce_button_icon_open = isset($options['wooCommerce_button_icon_open']) ? $options['wooCommerce_button_icon_open'] : 'icofont-brand-whatsapp';
        $wooCommerce_button_text = isset($options['wooCommerce_button_text']) ? $options['wooCommerce_button_text'] : 'How may I help you?';
        $wooCommerce_button_visibility = isset($options['wooCommerce_button_visibility']) ? $options['wooCommerce_button_visibility'] : 'everywhere';
        $wooCommerce_button_visibility = 'wooCommerce-'. $wooCommerce_button_visibility .'-only';
        $wooCommerce_button_target = isset($options['wooCommerce_button_target']) ? $options['wooCommerce_button_target'] : true;
        $wooCommerce_button_target = $wooCommerce_button_target ? '_blank' : '_self';
        global $product;
        if (! $product || ! is_a($product, 'WC_Product')) {
            return false;
        }

        echo '<a target="'. esc_attr($wooCommerce_button_target) .'" href="https://wa.me/' . esc_attr($wooCommerce_button_number) . '" class="bubble wHelp-btn-bg wooCommerce_button '. esc_attr($wooCommerce_button_visibility) .'">';
        if ($wooCommerce_button_icon) {
            echo '<i class="' . esc_attr($wooCommerce_button_icon_open) . '"></i>';
        }
        echo esc_html($wooCommerce_button_text);
        echo '</a>';
    }
}
