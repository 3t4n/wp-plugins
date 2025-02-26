<?php
/**
 * AWSA Quick_Buy
 *
 * @package           AWSA_Quick_Buy
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:         awsa-quick-buy
 * Plugin URI:          http://sajjadaslani.ir/awsa-quick-buy
 * Description:         With this plugin, you can make your sales easier for your social network customers, and with just a SKU and using the quick buy form
 * Version:             1.0.0
 * Requires at least:   4.2
 * Requires PHP:        7.2
 * Author:              Sajjad Aslani
 * Author URI:          http://sajjadaslani.ir
 * License:             GPL v2 or later
 * License URI:         https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domian:         awsa-quick-buy
 * Domain Path:         /languages
 * Developer Contact:   09100844292
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'AWSA_QUICK_BUY_FILE' ) ) {
	define( 'AWSA_QUICK_BUY_FILE', __FILE__ );
}

/**
 * Include Primary Class Plugin
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-quick-buy.php';

$GLOBALS['awsa_quick_buy'] = AWSA_Quick_Buy::instance()->init();
