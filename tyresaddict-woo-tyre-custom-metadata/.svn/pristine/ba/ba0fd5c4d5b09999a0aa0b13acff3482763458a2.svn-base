<?php
/**
 * Plugin Name: TyresAddict - Tyre Custom Metadata for WooCommerce
 * Plugin URI: http://b2b.tyresaddict.com/
 * Description: Create custom tyre (size specification, season, vehicle, etc) and wheel metadata via MetaBox for WooCommerce Products. Native import support, show on product page with human-readable form (speed/load indexes), edit in admin. Additionally, showing tyres-specific metas as product attributes.
 * Version: 2.2.11
 * Author: TyresAddict
 * Author URI: http://www.tyresaddict.com
 * License: GPLv2
 *
 */


defined( 'ABSPATH' ) || exit;


// const version

class TyresAddictWooTyreCustomMetadataPluginVer
{
	const title 	= 'TyresAddict - Tyre Custom Metadata for WooCommerce';
	const name 		= 'tyresaddict-woo-tyre-custom-metadata';
	const lang 		= 'tyresaddict-woo-tyre-custom-metadata';
	const code 		= 'tcm';
	const version 	= '2.2.11';
	const features 	= [ 'FeatureWheels',
						'FeatureTyres',
						];
}


// Check WooCommerce & Metabox plugins

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) &&
	in_array( 'meta-box/meta-box.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	require plugin_dir_path( __FILE__ ) . 'includes/Plugin.php';

	function tyresaddict_woo_tyre_custom_metadata_init() {
		TyresAddict\TCM\Plugin::get_instance();
	}

	add_action( 'plugins_loaded', 'tyresaddict_woo_tyre_custom_metadata_init' );
}

