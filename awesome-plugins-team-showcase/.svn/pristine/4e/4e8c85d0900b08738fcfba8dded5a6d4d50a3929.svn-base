<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @wordpress-plugin
 * Plugin Name:       Awesome Team Showcase
 * Plugin URI:        https://awesome-plugins.com
 * Description:       Create and manage beautiful, interactive team showcases with our drag and drop builder and shortcode generator.
 * Version:           1.0.2
 * Author:            Awesome Plugins
 * Author URI:        https://awesome-plugins.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       awesome-plugins-team-showcase
 * Domain Path:       /languages
 */
if (!defined('WPINC'))
{
    die;
}

define('AWESOME_PLUGINS_TEAM_SHOWCASE_VERSION', '1.0.0');
define('AWESOME_PLUGINS_TEAM_SHOWCASE_DIR', __DIR__);
define('AWESOME_PLUGINS_TEAM_SHOWCASE_FILE', __FILE__);

function activate_awesome_plugins_team_showcase() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-awesome-plugins-team-showcase-activator.php';
    Awesome_Plugins_Team_Showcase_Activator::activate();
}

function deactivate_awesome_plugins_team_showcase() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-awesome-plugins-team-showcase-deactivator.php';
    Awesome_Plugins_Team_Showcase_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_awesome_plugins_team_showcase');
register_deactivation_hook(__FILE__, 'deactivate_awesome_plugins_team_showcase');

require plugin_dir_path(__FILE__) . 'includes/class-awesome-plugins-team-showcase.php';

function run_awesome_plugins_team_showcase() {

    $plugin = new Awesome_Plugins_Team_Showcase();
    $plugin->run();
}

run_awesome_plugins_team_showcase();
