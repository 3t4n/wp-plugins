<?php
/**
 * Plugin Name: TyresAddict - Tyre Product Filter for WooCommerce
 * Plugin URI: http://b2b.tyresaddict.com/
 * Description: The Tyre Product Filter for shops. Search tyres by size, season and other parameters. Use tyre metadata for filtering, works better with Tyre Custom Metadata plugin.
 * Version: 1.4.18
 * Author: TyresAddict
 * Author URI: http://www.tyresaddict.com
 * License: GPLv2
 *
 */


defined( 'ABSPATH' ) || exit;



// Current plugin version

class TyresAddictWooProductFilterPluginVer
{
	const title 	= 'TyresAddict Tyre Product Filter for WooCommerce';
	const name 		= 'tyresaddict-woo-tyre-product-filter';
	const lang 		= 'tyresaddict-woo-tyre-product-filter';
	const code 		= 'tpf';
	const version 	= '1.4.18';
	const features 	= [ ];
}




// Install \ UnInstall

require plugin_dir_path( __FILE__ ) . 'includes/Woo.php';

require_once plugin_dir_path( __FILE__ ) . 'includes/PluginInstaller.php';

register_activation_hook( __FILE__, [ '\TyresAddict\TyreFilter\PluginInstaller', 'activate' ] );
register_deactivation_hook( __FILE__, [ '\TyresAddict\TyreFilter\PluginInstaller', 'deactivate' ] );



// The core plugin class that is used to define locale, admin-specific hooks, and public-facing site hooks.

require plugin_dir_path( __FILE__ ) . 'includes/DB.php';
require plugin_dir_path( __FILE__ ) . 'includes/Plugin.php';

function tyresaddict_woo_tyre_filter_plugin_init() 
{
	\TyresAddict\TyreFilter\Woo::activate_notices();

    if ( \TyresAddict\TyreFilter\PluginInstaller::check_environment() )		// check depended plugins
		\TyresAddict\TyreFilter\Plugin::get_instance();
}

add_action( 'plugins_loaded', 'tyresaddict_woo_tyre_filter_plugin_init' );



// Widgets

require plugin_dir_path( __FILE__ ) . 'includes/FilterWidget.php';

function tyresaddict_woo_tyre_filter_register_widget() 
{
    register_widget( 'TyresAddict\TyreFilter\FilterWidget' );
}

add_action( 'widgets_init', 'tyresaddict_woo_tyre_filter_register_widget' );


