<?php
/**
 * Plugin main file.
 * php version 7.4.33
 *
 * Plugin Name:         InstaCash BNPL
 * Plugin URI:          https://instacash.hu/
 * Description:         Buy Now Pay Later solution for woocommerce checkout.
 * Version:             1.2.44
 * Requires at least:   5.2
 * Requires PHP:        7.2
 * Author:              Fintrous Group Kft.
 * Author URI:          https://fintrous.com
 * Developer:           Fintrous Group Kft.
 * Developer URI:       https://fintrous.com
 * Text Domain:         instacash-bnpl
 * Domain Path:         /languages/
 * License:             GNU General Public License v3.0
 * License URI:         http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @category Woocommerce-plugin
 * @package  instacashBnpl
 * @author   Fintrous Group Kft. <fintrous.com>
 * @license  GNU General Public License v3.0
 * @link     https://instacash.hu/
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Load necessary classes from autoloader.
require_once __DIR__ . '/vendor/autoload.php';

use InstaCash\BNPL\Config;
use InstaCash\BNPL\Events;

/**
 * Define plugin root dir.
 *
 * @param string $path
 *
 * @return string
 */
function instaCashBnplPluginPath($path = '')
{
    return dirname(__FILE__) . $path;
}

/**
 * Define plugin root url.
 *
 * @param string $path
 *
 * @return string
 */
function instaCashBnplPluginUri($path = '')
{
    return plugin_dir_url(__FILE__) . $path;
}

/**
 * Init application handler.
 *
 * @return void
 */
function instacashBnplApplicationInit()
{
    load_plugin_textdomain('instacash-bnpl', false, plugin_basename(dirname(__FILE__)) . '/languages');
    new InstaCashBNPLApplication;

    // Add cron Event.
    if ( ! wp_next_scheduled( 'instacash_bnpl_offer_check' ) ) {
        wp_schedule_event( \strtotime( '06:00:00' ), 'daily', 'instacash_bnpl_offer_check' );
    }
}

/**
 * Add Gateway to payment methods.
 *
 * @param array<string> $methods
 *
 * @return array<string>
 */
function instaCashBnplApplicationGW( $methods )
{
    $methods[] = InstaCashBNPLApplication::class;
    return $methods;
}

/**
 * Flush routes for adding endpoint.
 *
 * @return void
 */
function instaCashBnplActivate()
{
    flush_rewrite_rules();
    Events::installed();
}

/**
 * Flush routes for removing endpoint and options.
 *
 * @return void
 */
function instaCashBnplRemove()
{
    delete_option(Config::OPTIONS_NAME);
    delete_option(Config::OFFERS_OPTION_NAME);
    wp_clear_scheduled_hook('instacash_bnpl_offer_check');
    flush_rewrite_rules();
    Events::removed();
}

add_action('init', 'instacashBnplApplicationInit', 0);
add_filter('woocommerce_payment_gateways', 'instaCashBnplApplicationGW');

register_activation_hook(__FILE__, 'instaCashBnplActivate');
register_deactivation_hook(__FILE__, 'instaCashBnplRemove');

(new Events)->hooks();
