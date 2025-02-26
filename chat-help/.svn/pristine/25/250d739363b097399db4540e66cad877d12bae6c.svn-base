<?php

/**
 * Views class for Shortcode generator options.
 *
 * @link       https://themeatelier.net
 * @since      1.0.0
 *
 * @package chat-help
 * @subpackage chat-help/src/Admin/Views/WooCommerceButton
 * @author     ThemeAtelier<themeatelierbd@gmail.com>
 */

namespace ThemeAtelier\ChatWhatsapp\Admin\Views;

use ThemeAtelier\ChatWhatsapp\Admin\Framework\Classes\CHAT_WHATSAPP;

class WooCommerceButton
{

    /**
     * Create Option fields for the setting options.
     *
     * @param string $prefix Option setting key prefix.
     * @return void
     */
    public static function options($prefix)
    {
        //
        // Field: backup
        //
        CHAT_WHATSAPP::createSection($prefix, array(
            'title'       => esc_html__('WOOCOMMERCE BUTTON', 'chat-help'),
            'icon'        => 'icofont-shopping-cart',
            'fields'      => array(
                array(
                    'id'    => 'wooCommerce_button',
                    'type'  => 'switcher',
                    'title' => esc_html__('WooCommerce Button', 'chat-help'),
                    'title_help' => '<div class="chat-whatsapp-info-label">' . esc_html__('Show chat whatsapp button on single product page.', 'chat-help') . '</div>',
                    'text_on' => esc_html__('Show', 'chat-help'),
                    'text_off'  => esc_html__('Hide', 'chat-help'),
                    'text_width'    => 80,
                ),
                array(
                    'id'    => 'wooCommerce_button_position',
                    'type'  => 'button_set',
                    'title' => esc_html__('Button Position', 'chat-help'),
                    'title_help' => '<div class="chat-whatsapp-info-label">' . esc_html__('Select button position. Default: After Cart Button.', 'chat-help') . '</div>',
                    'options'    => array(
                        'before'  => array(
                            'text' => esc_html__('Before Cart', 'chat-help'),
                        ),
                        'after' => array(
                            'text' => esc_html__('After Cart', 'chat-help'),
                        ),
                    ),
                    'default'   => 'after',
                    'dependency' => array('wooCommerce_button', '==', 'true'),
                ),
                array(
                    'id'    => 'wooCommerce_button_number',
                    'type'  => 'text',
                    'title' => esc_html__('Whatsapp Number', 'chat-help'),
                    'title_help' => '<div class="chat-whatsapp-info-label">' . esc_html__('Add your WhatsApp number including country code. eg: +880123456189', 'chat-help') . '</div>',
                    'default'   => '+880123456789',
                    'dependency' => array('wooCommerce_button', '==', 'true'),
                ),
                array(
                    'id'    => 'wooCommerce_button_target',
                    'type'  => 'switcher',
                    'title' => esc_html__('Open Link In New Window', 'chat-help'),
                    'text_on' => esc_html__('Show', 'chat-help'),
                    'text_off'  => esc_html__('Hide', 'chat-help'),
                    'default'   => true,
                    'text_width'    => 80,
                    'dependency' => array('wooCommerce_button', '==', 'true'),
                ),
                array(
                    'id'    => 'wooCommerce_button_icon',
                    'type'  => 'switcher',
                    'title' => esc_html__('Show/Hide Icon', 'chat-help'),
                    'title_help' => '<div class="chat-whatsapp-info-label">' . esc_html__('Show chat whatsapp button on single product page.', 'chat-help') . '</div>',
                    'text_on' => esc_html__('Show', 'chat-help'),
                    'text_off'  => esc_html__('Hide', 'chat-help'),
                    'default'   => true,
                    'text_width'    => 80,
                    'dependency' => array('wooCommerce_button', '==', 'true'),
                ),
                // Circle button icon
                array(
                    'id'    => 'wooCommerce_button_icon_open',
                    'type'  => 'icon',
                    'title' => esc_html__('Icon For Circle Button', 'chat-help'),
                    'title_help' => '<div class="chat-whatsapp-info-label">' . esc_html__('Change icon for circle button.', 'chat-help') . '</div>',
                    'default' => 'icofont-brand-whatsapp',
                    'dependency' => array('wooCommerce_button|wooCommerce_button_icon', '==|==', 'true|true'),
                ),
                array(
                    'id'    => 'wooCommerce_button_text',
                    'type'  => 'text',
                    'title' => esc_html__('Button Text', 'chat-help'),
                    'title_help' => '<div class="chat-whatsapp-info-label">' . esc_html__('Change text to show in button.', 'chat-help') . '</div>',
                    'default'   => 'How may I help you?',
                    'dependency' => array('wooCommerce_button', '==', 'true'),
                ),
                array(
                    'id'    => 'wooCommerce_button_padding',
                    'type'    => 'spacing',
                    'title'   => esc_html__('Button Padding', 'chat-help'),
                    'title_help' => '<div class="chat-whatsapp-info-label">' . esc_html__('Change button padding.', 'chat-help') . '</div>',
                    'default'     => array(
                        'top'       => '5',
                        'right'     => '15',
                        'bottom'    => '5',
                        'left'      => '15',
                        'unit'      => 'px',
                    ),
                    'output'        => '.bubble.wooCommerce_button',
                    'output_mode'   => 'padding',
                    'dependency' => array('wooCommerce_button', '==', 'true'),
                ),
                array(
                    'id'    => 'wooCommerce_button_margin',
                    'type'    => 'spacing',
                    'title'   => esc_html__('Button Margin', 'chat-help'),
                    'title_help' => '<div class="chat-whatsapp-info-label">' . esc_html__('Change button margin.', 'chat-help') . '</div>',
                    'default'     => array(
                        'top'       => '0',
                        'right'     => '0',
                        'bottom'    => '20',
                        'left'      => '0',
                        'unit'      => 'px',
                    ),
                    'output'        => '.bubble.wooCommerce_button',
                    'output_mode'   => 'margin',
                    'dependency' => array('wooCommerce_button', '==', 'true'),
                ),
                array(
                    'id'    => 'wooCommerce_button_border_radius',
                    'type'    => 'spacing',
                    'title'   => esc_html__('Button Border Radius', 'chat-help'),
                    'title_help' => '<div class="chat-whatsapp-info-label">' . esc_html__('Change button border radius.', 'chat-help') . '</div>',
                    'default'     => array(
                        'top'       => '5',
                        'right'     => '5',
                        'bottom'    => '5',
                        'left'      => '5',
                        'unit'      => 'px',
                    ),
                    'output'        => '.bubble.wooCommerce_button',
                    'output_mode'   => 'border-radius',
                    'dependency' => array('wooCommerce_button', '==', 'true'),
                ),
                array(
                    'id'      => 'wooCommerce_button_visibility',
                    'type'    => 'button_set',
                    'title'   => esc_html__('Bubble Visibility', 'chat-help'),
                    'default' => 'everywhere',
                    'options' => array(
                        'everywhere' => array(
                            'text' => esc_html__('Everywhere', 'chat-help'),
                        ),
                        'desktop'    => array(
                            'text' => esc_html__('Desktop Only', 'chat-help'),
                        ),
                        'tablet'     => array(
                            'text' => esc_html__('Tablet Only', 'chat-help'),
                        ),
                        'mobile'     => array(
                            'text' => esc_html__('Mobile Only', 'chat-help'),
                        ),
                    ),
                    'dependency' => array('wooCommerce_button', '==', 'true'),
                ),
            )
        ));
    }
}
