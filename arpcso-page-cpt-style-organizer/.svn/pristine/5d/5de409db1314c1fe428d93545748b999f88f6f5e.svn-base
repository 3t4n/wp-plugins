<?php

/**
 * Plugin Name:       ARPCSO Page CPT-Style Organizer
 * Plugin URI:        https://alessioruggieri.com
 * Description:       Simplify the management of pages in complex WordPress sites by introducing custom filters and flags in the admin dashboard.
 * Version:           1.0.0
 * Author:            Alessio Ruggieri
 * Author URI:        https://alessioruggieri.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       arpcso-page-cpt-style-organizer
 * Domain Path:       /languages
 */

if (! defined('WPINC')) {
	die;
}

/**
 * Plugin version
 */
define('ARPCSO_PAGE_CPT_STYLE_ORGANIZER_VERSION', '1.0.0');

/**
 * Include the necessary classes and files.
 */
require plugin_dir_path(__FILE__) . 'includes/class-arpcso-page-cpt-style-organizer.php';

/**
 * Activation hook.
 */
register_activation_hook(__FILE__, function () {
	require_once plugin_dir_path(__FILE__) . 'includes/class-arpcso-page-cpt-style-organizer-activator.php';
	Arpcso_Page_Cpt_Style_Organizer_Activator::activate();
});

/**
 * Run the core plugin.
 */
function arpcso_run_page_cpt_style_organizer()
{
	$plugin = new Arpcso_Page_Cpt_Style_Organizer();
	$plugin->run();

	// Register the save action
	add_action('admin_post_arpcso_page_cpt_save', [$plugin->get_admin_instance(), 'save_settings']);
}
arpcso_run_page_cpt_style_organizer();

