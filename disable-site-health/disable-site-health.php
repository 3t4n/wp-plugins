<?php
/**
 * Plugin Name: Disable Site Health
 * Description: Disable the Site Health pages in the admin interface that were added as part of WordPress v5.2
 * Version: 1.0
 * Author: Caleb Zahnd
 * Author URI: https://calebzahnd.com
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

// disable the admin menu
function remove_site_health_menu() {
    remove_submenu_page( 'tools.php', 'site-health.php' );
}
add_action( 'admin_menu', 'remove_site_health_menu' );


add_action('wp_dashboard_setup', 'remove_site_health_dashboard_widget');
function remove_site_health_dashboard_widget()
{
    remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
}