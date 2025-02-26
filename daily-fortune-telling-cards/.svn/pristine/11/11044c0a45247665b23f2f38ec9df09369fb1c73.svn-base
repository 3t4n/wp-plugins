<?php
/**
 * Daily Fortune Telling Cards
 * @package		Daily Fortune Telling Cards
 * @author		PowerFortunes.com 
 * @copyright	2019 PowerFortunes.com
 * @license		GPL v2 or later
 * 
 * @wordpress-plugin
 * Plugin Name:			Daily Fortune Telling Cards
 * Plugin URI:			https://www.powerfortunes.com/zodiac-sign-fortunetellingcards.php
 * Description:			Display Fortune Telling Cards that are updated every day.
 * Version:				1.3.5
 * Requires at least:	5.2
 * Requires PHP:		7.0
 * Author:				PowerFortunes.com 
 * Author URI:			https://www.powerfortunes.com/about-astrology.php
 * License URI:			https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:			daily-fortunetelling-cards-plugin
 */
/*
The Daily Fortune Telling Cards plugin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
The Daily Fortune Telling Cards plugin is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with the Daily Fortune Telling Cards plugin. If not, see {URI to Plugin License}.
*/

if ( ! defined( 'ABSPATH' ) ) {
exit; // Exit if accessed directly.
}

$ver = "1.3.3";
define( 'DFTC_PLUGIN_FILE', __FILE__ );
define( 'DFTC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'DFTC_PLUGIN_URL', plugins_url( '/', __FILE__ ) );

if (!defined('DFTC__VERSION')){
define( 'DFTC__VERSION', $ver);
}

add_option('power_daily_cards_plugin_version', $ver);
require_once( DFTC_PLUGIN_DIR . 'functions.php' );
register_activation_hook( __FILE__, 'power_daily_cards_plugin' );
register_deactivation_hook( __FILE__, 'daily_cards_deactive' );

function power_daily_cards_activation($vrs) {
if (get_option('power_daily_cards_plugin_version') !== $vrs){
update_option('power_daily_cards_plugin_version', DFTC__VERSION);
	}
}
power_daily_cards_activation($ver);

function dftc_load_css() {
wp_enqueue_style( 'dftc_update_styles', DFTC_PLUGIN_URL . 'css/dftc_styles.css', '',  DFTC__VERSION); 
}
add_action('get_footer', 'dftc_load_css');
?>