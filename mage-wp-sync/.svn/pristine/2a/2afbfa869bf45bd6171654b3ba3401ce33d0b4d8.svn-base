<?php
/**
 * Mage WP Sync.
 *
 * Mage WP Sync plugin file.
 *
 * @package   Smackcoders\MWS
 * @copyright Copyright (C) 2010-2020, Smackcoders Inc - info@smackcoders.com
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License, version 3 or higher
 *
 * @wordpress-plugin
 * Plugin Name: Mage WP Sync
 * Version:     1.0.0
 * Plugin URI:  https://www.smackcoders.com/wp-ultimate-csv-importer-pro.html
 * Description: A plugin that helps to sync the data's from your Magento to WordPress.
 * Author:      Smackcoders
 * Author URI:  https://www.smackcoders.com/wordpress.html
 * Text Domain: mage-wp-sync
 * Domain Path: /languages
 * License:     GPL v3
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

define('WP_CONST_MAGE_WOOCOM_URL', 'http://www.smackcoders.com');
define('WP_CONST_MAGE_WOOCOM_NAME', 'Mage WP Sync');
define('WP_CONST_MAGE_WOOCOM_SLUG', 'mage-wp-sync');
define('WP_CONST_MAGE_WOOCOM_SETTINGS', 'Magento Wordpress Sync');

define('WP_CONST_MAGE_WOOCOM_DIR', WP_PLUGIN_URL . '/' . WP_CONST_MAGE_WOOCOM_SLUG . '/');
define('WP_CONST_MAGE_WOOCOM_DIRECTORY', plugin_dir_path(__FILE__));
define('WP_MAGE_WOOCOM_PLUGIN_BASE', WP_CONST_MAGE_WOOCOM_DIRECTORY);

require_once('includes/WPMageWooComHelper.php');
require_once('includes/TransferData.php');

register_activation_hook(__FILE__, array('WPMageWooComHelper', 'smack_magewoocom_activate'));

function action_magewoocom_admin_menu() {
	add_menu_page(WP_CONST_MAGE_WOOCOM_SETTINGS, WP_CONST_MAGE_WOOCOM_NAME, 'manage_options', __FILE__, array('WPMageWooComHelper', 'output_fd_page'), WP_CONST_MAGE_WOOCOM_DIR . "images/sync.png");
}
add_action("admin_menu" , "action_magewoocom_admin_menu") ;

function action_magewoocomsync_admin_init() {
	if (isset($_REQUEST['page']) && ($_REQUEST['page'] == 'mage-wp-sync/index.php' || $_REQUEST['page'] == 'page')) {
		wp_enqueue_style('magewoocom-bootstrap-css', plugins_url('css/bootstrap.css', __FILE__));
		wp_enqueue_style('magewoocom-style-css', plugins_url('css/style.css', __FILE__));
		wp_enqueue_style('magewoocom-font-awesome-min-css', plugins_url('css/font-awesome.min.css', __FILE__));
		wp_enqueue_style('magewoocom-jquery-dataTables-css', plugins_url('css/jquery.dataTables.css', __FILE__));
		wp_enqueue_style('magewoocom-jquery-dataTables-min-css', plugins_url('css/jquery.dataTables.min.css', __FILE__));
		wp_enqueue_script('letme_sync_js', plugins_url('js/letmesync.js', __FILE__)); 
		wp_enqueue_script('jquery_js', plugins_url('js/jquery.js', __FILE__)); 
		wp_enqueue_script('jquery_dataTables_js', plugins_url('js/jquery.dataTables.js', __FILE__)); 
	}
}
add_action('admin_init', 'action_magewoocomsync_admin_init');
?>
