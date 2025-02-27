<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Plugin Name: MisterPlan - Booking Engines
 * Description: Motores de reserva de alojamientos y actividades
 * Author: MisterPlan
 * Author URI: https://misterplan.es
 * Version: 1.1.41
 * Text Domain: misterplan
 * Domain Path: /languages
 * Requires at least: 5.2
 * Requires PHP:      7.2.5
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */
if ( ! class_exists( 'mrplan_TMrPlanPluginAbstract', false ) ) {
    require_once 'lib/class.mrplan_TMrPlanPluginAbstract.php';
}

if ( ! class_exists( 'mrplan_TMrPlanPlugin', false ) ) {
    require_once 'class.mrplan_TMrPlanPlugin.php';
}

if ( ! class_exists( 'mrplan_TMrPlanPluginAdmin', false ) ) {
    require_once 'class.mrplan_TMrPlanPluginAdmin.php';
}

define('MRPLAN_PLUGIN_URL', plugin_dir_url(__FILE__) );

if( !function_exists('get_plugin_data') ){
    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

$plugin_data = get_plugin_data( __FILE__ );

if (!defined('MRPLAN_PLUGIN_VERSION')) {
    define('MRPLAN_PLUGIN_VERSION', $plugin_data['Version'] );
}

$TMrPlanPlugin		= mrplan_TMrPlanPlugin::getInstance();
