<?php
/**
 * The main plugin file
 * 
 * PHP Version 7.4.9
 * 
 * @category WordPress_Plugin
 * @package  Related_Posts_404
 * @author   Ahmad Karim <ahmu83@gmail.com>
 * @license  https://opensource.org/licenses/GPL-2.0 GPL-2.0+
 * @link     https://ahmadkarim.com/
 * @since    1.0.0
 *
 * @wordpress-plugin
 * 
 * Plugin Name: Related posts on 404 page
 * Plugin URI: https://www.ahmadkarim.com/wordpress-plugins/related-posts-on-404-page/
 * Description: This plugin will show related posts on the 404 page. In order to make this plugin work you need to add this snippet (wrapped in php) in your 404 page template <code>do_action('404_related_posts')</code>
 * Author: Ahmad Karim
 * Version: 1.4
 * Author URI: https://ahmadkarim.com/
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Prefix: RPP
 */

defined('WPINC') || exit;

$rpp_dir = Rpp_dir();

require_once $rpp_dir . 'includes/constants.php';

/**
 * Get the plugin root directory helper function
 * 
 * @param boolean|string $append Append to base directory
 * 
 * @return string Plugin's root directory
 */
function Rpp_dir($append = false) {

  return plugin_dir_path(__FILE__) . $append;

}

/**
 * This code will run during plugin activation.
 * 
 * @return void
 */
function Rpp_activate() {

  require_once Rpp_dir('includes/Activator.class.php');

  Rpp_Activator::activate();

}
register_activation_hook(__FILE__, 'Rpp_activate');

/**
 * This code will run during plugin deactivation.
 * 
 * @return void
 */
function Ijt_deactivate() {

  require_once Rpp_dir('includes/Deactivator.class.php');

  Rpp_Deactivator::deactivate();

}
register_deactivation_hook(__FILE__, 'Ijt_deactivate');

require_once $rpp_dir . 'includes/print_are.php';
require_once $rpp_dir . 'admin/AdminSettings.class.php';
require_once $rpp_dir . 'admin/AdminNotice.class.php';
require_once $rpp_dir . 'admin/AdminAjaxActions.class.php';
require_once $rpp_dir . 'includes/RelatedPosts404.class.php';
require_once $rpp_dir . 'includes/functions.php';
require_once $rpp_dir . 'includes/actions.php';

