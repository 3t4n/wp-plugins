<?php
/**
 * Plugin Name: Affiliate Product Review
 * Plugin URI: https://github.com/nazmunsakib/affiliate-product-review/
 * Description: Affiliate Product Review is a powerful plugin you can add Easily turn Product Review , pros and cons, affiliate links into blog posts!
 * Author: Nazmun sakib
 * Author URI:  https://nazmunsakib.com
 * Version: 1.0.0
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: apr
 * Domain Path: /languages/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * This is mane class for the plugin
 */
final class Affiliate_Product_Review {

	/**
	 * Plugin version
	 *
	 * @var string
	 */
	const version = '1.0';

	private function __construct() {

		$this->define_constants();

		register_activation_hook( __FILE__, [ $this, 'apr_active' ] );

		add_action( 'wp_enqueue_scripts', [ $this, 'apr_assets' ] );
		add_action( 'init', [ $this, 'load_plugin_text_domain' ] );

		add_action( 'plugins_loaded', [ $this, 'apr_file_include' ] );

	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * @access public
	 */
	public function load_plugin_text_domain() {
		load_plugin_textdomain( 'apr', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
	}

	/**
	 * Inisialize Plugin instence
	 *
	 * @access public
	 * @static
	 *
	 * @return \Affiliate_Product_Review
	 */
	public static function init() {

		$instence = false;

		if ( ! $instence ) {
			$instence = new self();
		}

		return $instence;
	}

	/**
	 * defin plugin constence
	 *
	 * @void
	 */
	public function define_constants() {

		define( 'APR_VERSION', self::version );
		define( 'APR_FILE', __FILE__ );
		define( 'APR_PATH', __DIR__ );
		define( 'APR_URL', plugins_url( '', APR_FILE ) );
		define( 'APR_ASSETS', APR_URL . '/assets' );

	}

	/**
	 * Do stuff upon plugin activation
	 *
	 * @return void
	 */
	public function apr_active() {

		$installed = get_option( 'apr_isntalled' );

		if ( ! $installed ) {
			update_option( 'apr_isntalled', time() );
		}

		update_option( 'apr_version', APR_VERSION );
	}

	/**
	 * Include Files
	 *
	 * Load core files required to run the plugin.
	 *
	 * @access public
	 */
	public function apr_file_include() {

		require_once APR_PATH . '/lib/codestar-framework/codestar-framework.php';
		require_once APR_PATH . '/include/Admin/Metaboxes.php';
		require_once APR_PATH . '/include/Frontend/Review.php';

	}

	/**
	 * Load plugin js and css file
	 */
	public function apr_assets() {

		wp_enqueue_style( 'apr-main-style', APR_ASSETS . '/css/main-style.css', [], '1.0' );

	}

}

/**
 * Isnisial The main class
 *
 * @return false|Affiliate_Product_Review
 */
function affiliate_product_riview() {
	return Affiliate_Product_Review::init();
}

affiliate_product_riview();