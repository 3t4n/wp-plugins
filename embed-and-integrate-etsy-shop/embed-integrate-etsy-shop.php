<?php

/**
 * The plugin bootstrap file.
 *
 * @see              Embed360
 * @since             1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:       Embed and Integrate Etsy Shop
 * Plugin URI:        https://embed360.io
 * Description:       The Embed and Integrate Etsy Shop plugin allows you to embed your Etsy shop listings on your website AND allows your visitors to get more details about any item.
 * Version:           1.0.4
 * Author:            Embed360
 * Author URI:        https://embed360.io
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       embed-integrate-etsy-shop
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    exit;
}

/*
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('EMBED_INTEGRATE_ETSY_SHOP_VERSION', '1.0.4');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-embed-integrate-etsy-shop-activator.php.
 */
function activate_embed_integrate_etsy_shop()
{
    require_once plugin_dir_path(__FILE__).'includes/class-embed-integrate-etsy-shop-activator.php';
    Embed_Integrate_Etsy_Shop_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-embed-integrate-etsy-shop-deactivator.php.
 */
function deactivate_embed_integrate_etsy_shop()
{
    require_once plugin_dir_path(__FILE__).'includes/class-embed-integrate-etsy-shop-deactivator.php';
    Embed_Integrate_Etsy_Shop_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_embed_integrate_etsy_shop');
register_deactivation_hook(__FILE__, 'deactivate_embed_integrate_etsy_shop');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__).'includes/class-embed-integrate-etsy-shop.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_embed_integrate_etsy_shop()
{
    $plugin = new Embed_Integrate_Etsy_Shop();
    $plugin->run();
}
run_embed_integrate_etsy_shop();
