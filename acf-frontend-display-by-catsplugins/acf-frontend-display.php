<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://catsplugins.com
 * @since             1.0.0
 * @package           Acf_Frontend_Display
 *
 * @wordpress-plugin
 * Plugin Name:       ACF Frontend Display
 * Plugin URI:        https://wordpress.org/plugins/acf-frontend-display
 * Description:       Show custom fields value in frontend without touching source code
 * Version:           1.5
 * Author:            catsplugins
 * Author URI:        http://catsplugins.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       acf-frontend-display
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-acf-frontend-display-activator.php
 */
function activate_acf_frontend_display() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-acf-frontend-display-activator.php';
	Acf_Frontend_Display_Activator::activate();
}

/**
	 * Add how to use instruction to dashboard. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */

	add_action('wp_dashboard_setup', 'catsplugins_instruction_widget');
 
	function catsplugins_instruction_widget() {
	global $wp_meta_boxes;
	wp_add_dashboard_widget('custom_help_widget', "&#169;ACF Frontend Display Instruction", 'catsplugins_instruction_widget_help');
	}

	function catsplugins_instruction_widget_help() {

	echo '<style>.inside code {background:#00a0d2;
    border-radius: 4px;
    color: #fff;} p.acf-cta-action {
    background: #ff2828;
    padding: 10px;
    text-align: center;
    color: #FFFFFF;
} p.acf-cta-action a {
    color: #fff;
    font-size: 18px;
    font-weight: 800;
}</style>';
    echo '<p class="acf-cta-action"><strong><a  href="https://www.wpwiseguys.com/recommends/acf-frontend-display-pro-dashboard-widget/">UPDATE TO PRO VERSION</a><p></strong>';
	echo '<p><strong>Show custom field or meta_key value on frontend without coding</strong>. Pain-free plugin for <strong>non-tech savvy</strong> &amp; help you <strong>make website faster!</strong></p>';
	echo '<p>To use the plugin:</p>';
	echo '<code>[cats_field group_id= field= auto_loop= excerpt= post_id=]</code>';
	echo '<ul>In which:';
	echo '<li><code>group_id</code> <strong>(required)</strong>: ID of field group</li>';
	echo '<li><code>field</code> (required, optional if auto loop is yes): field slug, if you want to show one by one</li>';
	echo '<li><code>auto_loop</code> (optional): auto show all the fields value of the group ID, accepted <code>yes</code> or <code>no</code></li>';
	echo '<li><code>excerpt</code> (optional): exclude specific field from displaying, use field slug here</li>';
	echo '<li><code>post_id</code> (optional): if you want to show field from specific page/post, use this param, else will get current post ID</li>';
	echo '</ul>';
	echo '<p><strong>PRO version can display more field types & also meta_key of any post/page/taxonomy</strong><p>';
	echo '<p class="acf-cta-action"><strong><a  href="https://www.wpwiseguys.com/recommends/acf-frontend-display-pro-dashboard-widget/">UPDATE TO PRO VERSION NOW</a><p></strong>';
	}

	add_action('admin_notices', 'acf_frontend_display_notice');
function acf_frontend_display_notice() {
    if (is_plugin_active('acf-frontend-display/acf-frontend-display.php')) {
    	$admin_url = get_admin_url();
        echo '<div class="updated acf-frontend-display"><p>Voila! <strong>ACF Frontend Display is activated</strong>. The <strong>instruction is available on your dashboard</strong>, please take a look at <a href="'.$admin_url.'">your Dashboard</a></p></div>';
    }
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-acf-frontend-display-deactivator.php
 */
function deactivate_acf_frontend_display() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-acf-frontend-display-deactivator.php';
	Acf_Frontend_Display_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_acf_frontend_display' );
register_deactivation_hook( __FILE__, 'deactivate_acf_frontend_display' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-acf-frontend-display.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_acf_frontend_display() {

	$plugin = new Acf_Frontend_Display();
	$plugin->run();

}
run_acf_frontend_display();
