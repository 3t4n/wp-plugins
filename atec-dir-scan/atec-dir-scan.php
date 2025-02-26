<?php
if (!defined('ABSPATH')) { exit(); }
/**
* Plugin Name:  atec Dir Scan
* Plugin URI: https://atecplugins.com/
* Description: Navigate through the whole directory tree of your WP installation, including file count and file size.
* Version: 1.3.35
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
* Text Domain:  atec-dir-scan
*/
  
if (is_admin()) 
{
	if (!function_exists('atec_query')) @require('includes/atec-init.php');
	add_action('admin_menu', function() { atec_wp_menu(__FILE__,'atec_wpds','Dir Scan'); } );

	if (in_array($atec_active_slug=atec_get_slug(), ['atec_group','atec_wpds'])) { wp_cache_set('atec_wpds_version','1.3.35'); @require('includes/atec-wpds-install.php'); }
}
?>