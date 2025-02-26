<?php

/**
 * CEX Scroll To Top
 *
 * @package           CEXScrollToTop
 * @author            Shazahanul Islam Shohag
 * @copyright         2020 Shazahanul Islam Shohag
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       CEX Scroll To Top
 * Plugin URI:        https://coderexpo.com/
 * Description:       This is a simple Scroll To Top plugin. just active this plugin and get a beautiful scroll to top button in your website.
 * Version:           1.4.3
 * Requires at least: 5.0
 * Requires PHP:      5.6
 * Author:            Shazahanul Islam Shohag
 * Author URI:        https://coderexpo.com
 * Text Domain:       ce-scroll-to-top
 * Domain Path:       /languages
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

$autoload = __DIR__ . '/vendor/autoload.php';
if ( ! file_exists( $autoload ) ) {
	exit();
}

require_once $autoload;

/**
 * Class CEXScrollToTop
 */
final class CEXScrollToTop {


	/**
	 * Plugin Current Version.
	 */
	const VERSION = '1.4.3';

	/**
	 * CEXScrollToTop constructor.
	 */
	private function __construct() {
		$this->define_constants();
		register_activation_hook( __FILE__, array( $this, 'activation' ) );
		$this->run_functions();
		register_deactivation_hook( __FILE__, array( $this, 'deactivation' ) );
	}

	/**
	 * Initiate singlet instance.
	 *
	 * @return CEXScrollToTop
	 */
	public static function init() {
		static $instance = false;

		if ( ! $instance ) {
			$instance = new self();
		}

		return $instance;
	}

	/**
	 * Define all constants.
	 */
	public function define_constants() {
		define( 'CEXSTT_VERSION', self::VERSION );
		define( 'CEXSTT_FILE', __FILE__ );
		define( 'CEXSTT_PATH', __DIR__ );
		define( 'CEXSTT_URL', plugins_url( '', CEXSTT_FILE ) );
		define( 'CEXSTT_ASSETS', CEXSTT_URL . '/assets' );
	}

	/**
	 * Run Plugin functionality.
	 */
	public function run_functions() {
		new \Shohag\ScrollToTop\Appsero();
		if ( ! is_admin() ) {
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		}
	}

	/**
	 * Run Activation Procedure.
	 */
	public function activation() {
	}

	/**
	 * Run Deactivation Procedure.
	 */
	public function deactivation() {
	}

	/**
	 * Define all the plugin assets
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( 'cexscrolltotop', CEXSTT_ASSETS . '/js/jquery.scrollUp.min.js', array( 'jquery' ), filemtime( CEXSTT_PATH . '/assets/js/jquery.scrollUp.min.js' ), true );
		wp_enqueue_script( 'cexscrolltotopactive', CEXSTT_ASSETS . '/js/active.js', array( 'jquery', 'cexscrolltotop' ), filemtime( CEXSTT_PATH . '/assets/js/active.js' ), true );
		wp_enqueue_style( 'cexsttfawsam', CEXSTT_ASSETS . '/css/all.min.css', array(), '5.15.3' );
		wp_enqueue_style( 'cexsttcssmain', CEXSTT_ASSETS . '/css/style.css', array( 'cexsttfawsam' ), filemtime( CEXSTT_PATH . '/assets/css/style.css' ) );

	}

	/**
	 * Settings for appsero.
	 */
	private function appsero() {}

}

/**
 * Initiate plugin main class.
 */
function cex_scroll_to_top_button() {
	return \CEXScrollToTop::init();
}

/**
 * Run the plugin.
 */
cex_scroll_to_top_button();
