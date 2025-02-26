<?php
/**
 * Hayat Developers
 *
 * @package     Smart Loan Calculator Lite
 * @author      Hayat Developers
 * @copyright   2021 Smart Loan Calculator Lite
 * @license     GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: Smart Loan Calculator Lite 
 
 * Description: The Smart Loan Calculator lets you estimate your monthly payments based on how much you want to borrow, the interest rate, how much time you have to pay it.

 * Version:     1.3
 * Author:      Hayat Developers | Smart Loan Calculator Lite
 * Author URI:  https://wppluginbox.com
 * Text Domain: Smart Loan Calculator Lite 
 * License:     GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

include __DIR__.'/functions-admin.php';
include __DIR__.'/functions-wp.php';

$short_code = 'smart-loan-calc';

// register_activation_hook(__File__, 'SLC_createDB');
// register_deactivation_hook(__FILE__, 'SLC_DELDB');

add_action( 'admin_enqueue_scripts', 'SLC_CSSJS' ,111);
add_action('admin_menu', 'SLC_menu');
add_action('wp_enqueue_scripts', 'SLC_scripts',111);


$web_url =  $_SERVER['REQUEST_URI'];
$filter_w = 'wp-admin';
if(strpos($web_url, $filter_w) !== false){return 0;} else {
add_shortcode($short_code, 'SLC_initiate');
}?>