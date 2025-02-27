<?php
/**
 * Hayat Developers
 *
 * @package     Smart Investment Calculator
 * @author      Hayat Developers
 * @copyright   2021 Smart Investment Calculator
 * @license     GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: Smart Investment Calculator 
 
 * Description: Consistent investing over a long period of time can be an effective strategy to accumulate wealth. Even small investment can add up over time. The Wp Plugin Box's Smart Investment Calculator demonstrates how to put this savings strategy to work.

 * Version:     1.7
 * Author:      Hayat Developers | Smart Investment Calculator - Made for Businesses
 * Author URI:  https://wppluginbox.com
 * Text Domain: Smart Investment Calculator 
 * License:     GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

include __DIR__.'/functions-admin.php';
include __DIR__.'/functions-wp.php';

$short_code = 'inv-cal-wppluginbox';



add_action( 'admin_enqueue_scripts', 'WPBOX_CSSJS' ,111);

add_action('admin_menu', 'WPBOX_menu');
add_action('wp_enqueue_scripts', 'WPBOX_scripts',111);


$web_url =  sanitize_url($_SERVER['REQUEST_URI']);
$filter_w = 'wp-admin';
if(strpos($web_url, $filter_w) !== false){return 0;} else {
add_shortcode($short_code, 'WPBOX_initiate');
}

?>