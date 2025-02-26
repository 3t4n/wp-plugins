<?php

/**
 * Fired during plugin activation.
 *
 * @link       https://alessioruggieri.com
 * @since      1.0.0
 *
 * @package    Arpcso_Page_Cpt_Style_Organizer
 * @subpackage Arpcso_Page_Cpt_Style_Organizer/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all the code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Arpcso_Page_Cpt_Style_Organizer
 * @subpackage Arpcso_Page_Cpt_Style_Organizer/includes
 * @author     Alessio Ruggieri <info@alessioruggieri.com>
 */
class Arpcso_Page_Cpt_Style_Organizer_Activator
{

    /**
     * Method to execute during plugin activation.
     *
     * Ensures that the plugin runs only on supported WordPress and PHP versions.
     * Initializes the required options for the plugin.
     *
     * @since    1.0.0
     */
    public static function activate()
    {
        global $wp_version;

        // Check the minimum required WordPress version
        if (version_compare($wp_version, '5.6', '<')) {
            deactivate_plugins(plugin_basename(__FILE__)); // Deactivate the plugin
            wp_die(esc_html__('This plugin requires WordPress 5.6 or higher.', 'arpcso-page-cpt-style-organizer'));
        }

        // Check the minimum required PHP version
        if (version_compare(PHP_VERSION, '7.4', '<')) {
            deactivate_plugins(plugin_basename(__FILE__)); // Deactivate the plugin
            wp_die(esc_html__('This plugin requires PHP 7.4 or higher.', 'arpcso-page-cpt-style-organizer'));
        }

        // Remove old data and set default options
        delete_option('arpcso_page_cpt_ct_groups');
        add_option('arpcso_page_cpt_ct_groups', array());
    }
}
