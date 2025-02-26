<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class wc_PCSVIS_Importer {

	/**
	 * Product Exporter Tool
	 */
	public static function load_wp_importer() {
		// Load Importer API
		require_once ABSPATH . 'wp-admin/includes/import.php';

		if ( ! class_exists( 'WP_Importer' ) ) {
			$class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
			if ( file_exists( $class_wp_importer ) ) {
				require $class_wp_importer;
			}
		}
	}

	/**
	 * Product Importer Tool
	 */
	public static function product_importer() {
		if ( ! defined( 'WP_LOAD_IMPORTERS' ) ) {
			return;
		}

		self::load_wp_importer();

		// includes
		require 'class-rs-pcsvis-product-import.php';
		require 'class-rs-csv-parser.php';

		// Dispatch
		$GLOBALS['wc_CSV_Product_Import'] = new wc_PCSVIS_Product_Import();
		$GLOBALS['wc_CSV_Product_Import'] ->dispatch();
	}

	/**
	 * Variation Importer Tool
	 */
	public static function variation_importer() {
		if ( ! defined( 'WP_LOAD_IMPORTERS' ) ) {
			return;
		}

		self::load_wp_importer();

		// includes
		require 'class-rs-pcsvis-product-import.php';
		require 'class-rs-pcsvis-product_variation-import.php';
		require 'class-rs-csv-parser.php';

		// Dispatch
		$GLOBALS['wc_CSV_Product_Import'] = new wc_PCSVIS_Product_Variation_Import();
		$GLOBALS['wc_CSV_Product_Import'] ->dispatch();
	}
}
