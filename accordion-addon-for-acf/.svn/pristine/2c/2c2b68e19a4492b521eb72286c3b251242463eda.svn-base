<?php
/*
 * Plugin Name: Accordion Addon for ACF
 * Plugin URI:  https://wordpress.org/plugins/accordion-addon-for-acf/
 * Description: The Accordian Type field is used to group together fields into Accordian sections.
 * Version:     1.3
 * Author:      Galaxy Weblinks
 * Author URI:  http://www.galaxyweblinks.com
 * Text Domain: accordion-addon-for-acf
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if (!defined('ABSPATH')) {
    exit; // disable direct access
}

/**
 * Add backend option for Accordion Addon in field type "Accordion Addon" in ACF.
 * @param array $field
 * @return void
 */
class aafa_accordion_addon_plugin
{

    // Construct
    function __construct()
    {
        load_plugin_textdomain('accordion-addon-for-acf', false, dirname(plugin_basename(__FILE__)) . '/lang/');
        add_action('acf/include_field_types', array($this, 'include_field_types_accordion'));
        add_action('acf/register_fields', array($this, 'register_fields_accordion'));
        add_filter('plugin_row_meta', array($this, 'aafa_add_custom_plugin_links'), 10, 2);
    }

    function include_field_types_accordion($version)
    {
        include_once('accordion-addon-for-acf-include.php');
    }

    /**
     * You can use these filters to add custom links to your plugin row in the plugin list.
     * @param $links, $file
     * @return $links [array]
     */
    function aafa_add_custom_plugin_links($links, $file)
    {
        if ($file === 'accordion-addon-for-acf/accordion-addon-for-acf.php') {
            $links[] = '<a href="https://wp-plugins.galaxyweblinks.com/wp-plugins/accordion-addon-for-acf/doc/" target="_blank">Documentation</a>';
            $links[] = '<a href="https://wp-plugins.galaxyweblinks.com/contact/" target="_blank">Contact Support</a>';
        }
        return $links;
    }
}

new aafa_accordion_addon_plugin();
