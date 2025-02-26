<?php

/**
 * The WP Integration plugin for Channelize.io platform
 *
 * @link              https://channelize.io/
 * @since             1.0.0
 * @package           Channelize Shopping
 *
 * Plugin Name:       Live Shopping & Shoppable Videos For WooCommerce
 * Plugin URI:        N/A
 * Description:       Easy-to-install Plugin that adds Live Shopping, Shoppable Videos & Live Commerce as Sales Channels to WooCommerce Stores to Sell & Promote Products
 * Author URI:        https://channelize.io/
 * Version:           2.1.8
 * Author:            Channelize.io
 * Text Domain:       channelize
 */

defined('ABSPATH') || exit;

define('CHLS_VERSION', '2.1.8');
define('CHLS_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('CHLS_PLUGIN_URL', plugin_dir_url(__FILE__));
define('CHLS_PLUGIN', plugin_basename(__FILE__));


if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}


use Includes\Base\CHLSActivate;
use Includes\Base\CHLSDeactivate;


/**
 * The code that runs during plugin activation
 */
function activate_channelize_live_shopping_plugin()
{
    CHLSActivate::activate();
}

/**
 * The code that runs during plugin deactivation
 */
function deactivate_channelize_live_shopping_plugin()
{
    CHLSDeactivate::deactivate();
}

register_activation_hook(__FILE__, 'activate_channelize_live_shopping_plugin');
register_deactivation_hook(__FILE__, 'deactivate_channelize_live_shopping_plugin');

/**
 * Initialize all the core classes of the plugin
 * 
 */

include_once(ABSPATH . 'wp-admin/includes/plugin.php');

add_action('admin_notices',  'global_note');


/**
 * Notify if WooCommerce is not activated
 */
function global_note()
{
    if (!is_plugin_active('woocommerce/woocommerce.php')) {
?>
        <div id="message" class="error">
            <p>Please install and activate WooCommerce to use Live Shopping & Shoppable Videos plugin.</p>
        </div>
<?php
    }
}


if (is_plugin_active('woocommerce/woocommerce.php')) {
    if (class_exists('Includes\\Init')) {

        Includes\Init::register_services();
    }
}
