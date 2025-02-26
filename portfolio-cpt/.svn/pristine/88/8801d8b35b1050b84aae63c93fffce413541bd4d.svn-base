<?php
/**
 * Portfolio CPT
 *
 * Plugin Name: Portfolio CPT
 * Plugin URI:  https://wordpress.org/plugins/portfolio-cpt/
 * Description: Enables a portfolio post type and tag taxonomy.
 * Version:     1.0.0
 * Author:      Danny Cooper
 * Author URI:  http://olympusthemes.com/
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 *
 * @package portfolio-cpt
 */

/**
 * Main Portfolio_CPT Class
 */
class Portfolio_CPT {

	/**
	 * Initialize plugin.
	 */
	public function __construct() {

		$this->includes();

		add_image_size( 'portfolio-cpt-750', 750, 750, true );

		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );

	}

	/**
	 * Load plugin files.
	 */
	public function includes() {

		// Required files for registering the post type, taxonomies. settings and widget.
		require plugin_dir_path( __FILE__ ) . 'includes/register-cpt.php';
		require plugin_dir_path( __FILE__ ) . 'includes/register-taxonomy.php';
		require plugin_dir_path( __FILE__ ) . 'includes/register-shortcode.php';
		require plugin_dir_path( __FILE__ ) . 'includes/class-portfolio-cpt-permalink.php';

	}

	/**
	 * Load plugin textdomain.
	 */
	public function load_textdomain() {

		load_plugin_textdomain( 'portfolio-cpt', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

	}

	/**
	 * Enqueue styles.
	 */
	public function enqueue() {

		wp_enqueue_style( 'portfolio-cpt-styles', plugins_url( '/assets/css/style.css', __FILE__ ) );

	}

	/**
	 * Flush rewrites.
	 */
	public static function flush_rewrites() {

		portfolio_cpt_register();
		portfolio_cpt_tags();
		flush_rewrite_rules();

	}

}

$portfolio_cpt = new Portfolio_CPT();

register_activation_hook( __FILE__, array( 'Portfolio_CPT', 'flush_rewrites' ) );
