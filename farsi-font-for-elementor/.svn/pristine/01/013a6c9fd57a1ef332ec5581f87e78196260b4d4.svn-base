<?php
/**
 * Plugin Name: 			Farsi Font for Elementor
 * Description: 			Adds Vazirmatn font to be used in Elementor Page Builder.
 * Plugin URI: 				https://wordpress.org/plugins/farsi-font-for-elementor/
 * Version: 				2.9.0
 * Author: 					babakfp
 * Author URI: 				https://babakfp.ir
 * Text Domain: 			farsi-font-for-elementor
 * Tested up to: 			6.0
 * Elementor tested up to: 	3.6
 * License: 				GPLv2 or later
 * License URI: 			https://www.gnu.org/licenses/gpl-2.0.html
 * Tags: 					farsi, farsi font, farsi font elementor, فونت فارسی, فونت فارسی المنتور, فونت فارسی برای المنتور
 * Domain Path: 			/languages
*/

defined( 'ABSPATH' ) || die;

use Farsi_Font_For_Elementor\Compatibility_Checks;

define( 'FARSI_FONT_FOR_ELEMENTOR', [
	'NAME' => 'Farsi Font for Elementor',
	'V' => '2.9.0',
	'PHP_MIN_V' => '7.4.0',
	'ELE_MIN_V' => '3.5.0',
	'INCLUDES' => plugin_dir_path( __FILE__ ) . 'includes/',
	'CSS' => plugin_dir_url( __FILE__ ) . 'assets/css/',
] );

final class Farsi_Font_For_Elementor
{

	private static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'plugins_loaded' ] );
		add_action( 'init', [ $this, 'i18n' ] );
	}

	public function plugins_loaded() {
		require_once FARSI_FONT_FOR_ELEMENTOR['INCLUDES'].'compatibility-checks.php';
		$compatibility_checks = new Compatibility_Checks();
		if ( $compatibility_checks->is_compatible() ) {
			add_action( 'elementor/init', [ $this, 'elementor_init' ] );
		}
	}

	public function elementor_init() {
		require_once FARSI_FONT_FOR_ELEMENTOR['INCLUDES'] .'fonts.php';
		require_once FARSI_FONT_FOR_ELEMENTOR['INCLUDES'] .'editor.php';
	}

	public function i18n() {
		load_plugin_textdomain( 'farsi-font-for-elementor', false, 'farsi-font-for-elementor/languages' );
	}

}

if ( class_exists( 'Farsi_Font_For_Elementor' ) ) {
	Farsi_Font_For_Elementor::instance();
}
