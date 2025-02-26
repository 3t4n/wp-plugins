<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link  https://profiles.wordpress.org/apsaraaruna/
 * @since 1.0.0
 *
 * @package    Admin_Allow_By_Ip
 * @subpackage Admin_Allow_By_Ip/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Admin_Allow_By_Ip
 * @subpackage Admin_Allow_By_Ip/includes
 * @author     Apsara Aruna <apsaraaruna@email.com>
 */
class Admin_Allow_By_Ip_i18n
{


    /**
     * Load the plugin text domain for translation.
     *
     * @since 1.0.0
     */
    public function load_plugin_textdomain()
    {

        load_plugin_textdomain(
            'admin-allow-by-ip',
            false,
            dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
        );

    }



}
