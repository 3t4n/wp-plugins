<?php
/**
 * Plugin Name: Animated Hamburger for Elementor
 * Description: Simple plugin that adds an animated hamburger menù widget to Elementor
 * Version:     1.5.0
 * Author URI:  https://www.linkedin.com/in/giacomo-zoffoli-9bb33bb0/
 * Author:      Giacomo Zoffoli
 * Text Domain: clicche-elementor
 */ 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

define( 'CLICCHE_ANIMATED_HAMBURGER_DIR', plugin_dir_path( __FILE__ ) );
define( 'CLICCHE_ANIMATED_HAMBURGER_NAME', 'animated-hamburger-for-elementor');
define( 'CLICCHE_ANIMATED_HAMBURGER_VERSION', '1.5.0');
/**
 * Main Clicche Animated Hamburger
 *
 * The init class that runs the Clicche Animated Hamburger plugin.
 * Intended To make sure that the plugin's minimum requirements are met.
 *
 * @since 1.0.0
 */
final class CliccheAnimatedHamburger { 

  /**
   * Minimum Elementor Version
   *
   * @since 1.0.0
   * @var string Minimum Elementor version required to run the plugin.
   */
  const MINIMUM_ELEMENTOR_VERSION = '3.0.0';
  /**
   * Minimum PHP Version
   *
   * @since 1.0.0
   * @var string Minimum PHP version required to run the plugin.
   */
  const MINIMUM_PHP_VERSION = '7.0';
  /**
   * Constructor
   *
   * @since 1.0.0
   * @access public
   */
  public function __construct() {
		// Load translation
		add_action( 'init', array( $this, 'i18n' ) );
		// Init Plugin
		add_action( 'plugins_loaded', array( $this, 'init' ) );
  }
  /**
   * Load Textdomain
   *
   * Load plugin localization files.
   * Fired by `init` action hook.
   *
   * @since 1.2.0
   * @access public
   */
  public function i18n() {
    load_plugin_textdomain( 'clicche-elementor' );
  }
  /**
   * Initialize the plugin
   *
   * Validates that Elementor is already loaded.
   * Checks for basic plugin requirements, if one check fail don't continue,
   * if all check have passed include the plugin class.
   *
   * Fired by `plugins_loaded` action hook.
   *
   * @since 1.2.0
   * @access public
   */
  public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {		
			add_action( 'admin_notices', array( $this, 'admin_notice_missing_main_plugin' ) );
			return;  
		} 
		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {	
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );
			return;
		}   	
    // Once we get here, We have passed all validation checks so we can safely include our plugin
    // and load autoloader
    $this->bootstrap();
		require_once( 'plugin.php' );
  }

  public function bootstrap()
  {	    
      require( CLICCHE_ANIMATED_HAMBURGER_DIR . '/autoloader.php' );  
  }
  /**
   * Admin notice
   *
   * Warning when the site doesn't have Elementor installed or activated.
   *
   * @since 1.0.0
   * @access public
   */
  public function admin_notice_missing_main_plugin() {	  

    if ( isset( $_GET['activate'] ) ) {
      unset( $_GET['activate'] );
    } 

    $message = sprintf(    
      esc_html__( 'Elementor Animated Hamburger requires Elementor to be installed and activated.', 'clicche-elementor' ) 

    );

    printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

  }

  public function admin_notice_minimum_elementor_version() {

    if ( isset( $_GET['activate'] ) ) {
      unset( $_GET['activate'] );
    } 

    $message = sprintf(     
      esc_html__( 'Elementor Animated Hamburger requires Elementor version %3$s or greater.', 'clicche-elementor' ), 
      self::MINIMUM_ELEMENTOR_VERSION
    ); 

    printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

  }

}
// Instantiate Clicche Animated Hamburger.
new CliccheAnimatedHamburger();