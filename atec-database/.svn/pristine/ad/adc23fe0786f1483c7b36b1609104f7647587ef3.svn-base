<?php
if (!defined('ABSPATH')) { exit(); }
/**
* Plugin Name:  atec Database
* Plugin URI: https://atecplugins.com/
* Description: Optimize WP database tables.
* Version: 1.0.28
* Requires at least:4.9
* Tested up to: 6.7
* Tested up to PHP: 8.4.2
* Requires PHP: 7.4
* Requires CP: 1.7
* Premium URI: https://atecplugins.com
* Author: Chris Ahrweiler ℅ atecplugins.com
* Author URI: https://atec-systems.com/
* License: GPL2
* License URI:  https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain:  atec-database
*/

if (is_admin()) 
{
	register_activation_hook(__FILE__, function() { @require('includes/atec-wpdb-activation.php'); });
	
	if (!function_exists('atec_query')) @require('includes/atec-init.php');
	add_action('admin_menu', function() { atec_wp_menu(__FILE__,'atec_wpdb','Database'); });

	if (in_array($atec_active_slug=atec_get_slug(), ['atec_group','atec_wpdb'])) { wp_cache_set('atec_wpdb_version','1.0.28'); @require('includes/atec-wpdb-install.php'); }
}

if (filter_var(get_option('atec_WPDB_settings',[])['auto_timedout']??0,258))
{
	function atec_wpdb_auto_timedout() { @require(__DIR__.'/includes/atec-wpdb-del-timedout.php'); }
	add_action( 'atec_wpdb_auto_timedout', 'atec_wpdb_auto_timedout' );
}
?>