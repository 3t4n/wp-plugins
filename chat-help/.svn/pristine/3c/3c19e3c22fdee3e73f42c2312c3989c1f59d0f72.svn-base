<?php

/**
 * Views class for Shortcode generator options.
 *
 * @link       https://themeatelier.net
 * @since      1.0.0
 *
 * @package chat-whatsapp
 * @subpackage chat-whatsapp/src/Admin/Views/Advance
 * @author     ThemeAtelier<themeatelierbd@gmail.com>
 */

namespace ThemeAtelier\ChatWhatsapp\Admin\Views;

use ThemeAtelier\ChatWhatsapp\Admin\Framework\Classes\CHAT_WHATSAPP;

class GetHelp
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
        // Field: advance
        //
        CHAT_WHATSAPP::createSection($prefix, array(
            'title'       => esc_html__('GET HELP', 'chat-help'),
            'icon'        => 'icofont-life-buoy',

            'fields'      => array(
                array(
                    'id'   => 'ta_help',
                    'type' => 'ta_help',
                ),
            )
        ));
    }
}
