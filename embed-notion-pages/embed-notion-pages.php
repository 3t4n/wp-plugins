<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.embednotionpages.com
 * @since             1.0.0
 * @package           Embed_Notion_Pages
 *
 * @wordpress-plugin
 * Plugin Name:       Embed Notion Pages
 * Plugin URI:        https://www.embednotionpages.com/wordpress
 * Description:       Embed Notion Pages lets you get the most out of your public facing Notion pages. You can create your content in Notion, get an embed code, and embed a beautiful and always up-to-date page into your own website.

Notion is great, but sending people off to a public Notion domain is not the best user experience. With Embed Notion Pages you get to have all the creative freedom Notion offers, customise your embed to match your brand, and let people experience it as part of your own website.
 * Version:           1.0.0
 * Author:            Embed Notion Pages
 * Author URI:        https://www.embednotionpages.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       embed-notion-pages
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('EMBED_NOTION_PAGES_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-embed-notion-pages-activator.php
 */
function activate_embed_notion_pages()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-embed-notion-pages-activator.php';
	Embed_Notion_Pages_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-embed-notion-pages-deactivator.php
 */
function deactivate_embed_notion_pages()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-embed-notion-pages-deactivator.php';
	Embed_Notion_Pages_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_embed_notion_pages');
register_deactivation_hook(__FILE__, 'deactivate_embed_notion_pages');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-embed-notion-pages.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_embed_notion_pages()
{

	$plugin = new Embed_Notion_Pages();
	$plugin->run();

}
run_embed_notion_pages();