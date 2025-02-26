<?php

/**
 * Plugin Name:       Awesome Accordions
 * Plugin URI:        https://awesome-accordions.awesome-plugins.com/
 * Description:       Helps you to create and manage collapsible content panels for presenting information in a limited amount of space.
 * Version:           1.0.6
 * Author:            Awesome Plugins
 * Author URI:        https://awesome-plugins.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       awesome-accordions
 * Domain Path:       /languages
 */

if (!defined('WPINC'))
{
    die;
}

define("AWESOME_ACCORDIONS_DIR", __DIR__);
define("AWESOME_ACCORDIONS_FILE", __FILE__);

function activate_awesome_accordions() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-awesome-accordions-activator.php';
    Awesome_Accordions_Activator::activate();
}

function deactivate_awesome_accordions() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-awesome-accordions-deactivator.php';
    Awesome_Accordions_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_awesome_accordions');
register_deactivation_hook(__FILE__, 'deactivate_awesome_accordions');

require plugin_dir_path(__FILE__) . 'includes/class-awesome-accordions.php';

function run_awesome_accordions() {

    $plugin = new Awesome_Accordions();
    $plugin->run();
}

run_awesome_accordions();