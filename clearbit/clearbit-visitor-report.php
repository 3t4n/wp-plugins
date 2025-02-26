<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://clearbit.com
 *
 * @wordpress-plugin
 * Plugin Name:       Clearbit
 * Plugin URI:        https://clearbit.com/resources/tools/visitor-report
 * Description:       Know who's visiting your website. With the Weekly Visitor Report, you get a weekly dashboard of de-anonymized companies visiting your website and showing intent — for free.
 * Version:           1.0.6
 * Author:            Clearbit
 * Author URI:        https://clearbit.com/
 * Text Domain:       clearbit
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}

define( 'CLEARBIT_VISITOR_REPORT_VERSION', '1.0.6' );

function activate_clearbit_visitor_report() {
  require_once plugin_dir_path( __FILE__ ) . 'includes/class-clearbit-visitor-report-activator.php';
  Clearbit_Visitor_Report_Activator::activate();
}

function deactivate_clearbit_visitor_report() {
  require_once plugin_dir_path( __FILE__ ) . 'includes/class-clearbit-visitor-report-deactivator.php';
  Clearbit_Visitor_Report_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_clearbit_visitor_report' );
register_deactivation_hook( __FILE__, 'deactivate_clearbit_visitor_report' );

require plugin_dir_path( __FILE__ ) . 'includes/class-clearbit-visitor-report.php';

function run_clearbit_visitor_report() {

  $plugin = new Clearbit_Visitor_Report();
  $plugin->run();

}
run_clearbit_visitor_report();
