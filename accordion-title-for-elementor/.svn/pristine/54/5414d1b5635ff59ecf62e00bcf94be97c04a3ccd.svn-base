<?php
/**
 * Plugin Name
 *
 * @package           PluginPackage
 * @author            Michael Gangolf
 * @copyright         2022 Michael Gangolf
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Accordion title for Elementor
 * Description:       'Accordion title' lets you use the next container element as a accordion content. Clicking on the 'Accordion title' will show/hide the content.
 * Version:           1.2.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Michael Gangolf
 * Author URI:        https://www.migaweb.de/
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       elementor_accordion_title
 */

use Elementor\Plugin;

add_action('init', static function () {
    if (! did_action('elementor/loaded')) {
        return false;
    }
    require_once(__DIR__ . '/widget/accordion_title.php');
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \ATFE_Widget());
});



function elementor_accordion_title_add_elements($element)
{
    if ($element->get_settings('show_border') === "yes") {
        $element->add_render_attribute(
            '_wrapper',
            [
              'class' => 'apfe__border',
          ]
        );
    }
}


function apfe_load_textdomain()
{
    load_plugin_textdomain('elementor_accordion_title');
}

add_action('elementor/frontend/before_render', 'elementor_accordion_title_add_elements');
add_action('plugins_loaded', 'apfe_load_textdomain');
