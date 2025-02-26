<?php
/*
Plugin Name: IKJ Events Calendar For Divi
Plugin URI: https://wordpress.org/plugins/ikjweb-events-calendar-for-divi/
Description: A Divi module that implements The Events Calendar
Version:     1.0.2
Author:      Ilene Johnson
Author URI:  https://ikjweb.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: diviec-events-calendar-divi
Domain Path: /languages

IKJ Events Calendar For Divi is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

IKJ Events Calendar For Divi is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with IKJ Events Calendar For Divi. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

namespace DIEC_events_cal\events;

function Show_Notice_EC()
{
    if (current_user_can('activate_plugins')) {
        printf(
            '<div class="notice notice-warning "><p>' .
            esc_html(__('%1$s %2$s', 'diviec-events-calendar-divi')),
            esc_html(__('In order to use IKJ Events Calendar For Divi, Please first install the latest version of', 'diviec-events-calendar-divi')),
            sprintf(
                '<a href="%s">%s</a>',
                esc_url('plugin-install.php?tab=plugin-information&plugin=the-events-calendar&TB_iframe=true'),
                esc_html(__('The Events Calendar', 'diviec-events-calendar-divi'))
            ) . '</p></div>'
        );
    }
}
function Show_Notice_DIVI()
{
    if (current_user_can('activate_plugins')) {
        if (! function_exists('et_builder_options')) {

            printf(
                '<div class="notice notice-warning "><p>' .
              'In order to use IKJ Events Calendar For Divi, Please first install the latest version of DIVI theme or DIVI plugin. </p></div>'
            );

        }
    }
}

if (! function_exists('diviec_initialize_extension')):
    /**
     * Creates the extension's main class instance.
     *
     * @since 1.0.0
     */
    function diviec_initialize_extension()
    {
        require_once plugin_dir_path(__FILE__) . 'includes/IKJEventsCalendarForDivi.php';
    }
    add_action('divi_extensions_init', 'DIEC_events_cal\\events\\diviec_initialize_extension');
endif;




function check_ec_installation()
{
    if (! function_exists('et_builder_options')) {
        add_action('admin_notices', 'DIEC_events_cal\\events\\Show_Notice_DIVI');
    }

    if (! class_exists('Tribe__Events__Main') or ! defined('Tribe__Events__Main::VERSION')) {
        add_action('admin_notices', 'DIEC_events_cal\\events\\Show_Notice_EC');
    }
}
add_action('plugins_loaded', 'DIEC_events_cal\\events\\check_ec_installation');
