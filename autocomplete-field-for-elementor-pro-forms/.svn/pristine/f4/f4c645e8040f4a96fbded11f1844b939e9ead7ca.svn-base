<?php
/**
 * Plugin Name: Autocomplete field for Elementor Pro Forms
 * Version:     0.91
 * Author:      Giacomo Zoffoli | GH srl
 * Author URI:  https://growthackers.io/
 * Requires Plugins: elementor
 * Elementor tested up to: 3.26.0
 * Requires PHP: 7.1
 * Elementor Pro tested up to: 3.26.0
 * Text Domain: autocomplete-field-for-elementor-pro-forms
 * License: GPLv2 or later
 * Description: Plugin that adds an autocomplete field with search functionality to Elementor Pro Forms widget
**/

namespace GHElementorAutocomplete;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* Define variables */
define( 'GH_ELEMENTOR_AUTOCOMPLETE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'GH_ELEMENTOR_AUTOCOMPLETE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'GH_ELEMENTOR_AUTOCOMPLETE_VERSION', '0.91' );
/* Define variables */

final class GHElementorAutocomplete
{ 
    /**
     * Constructor
     *
     * @since 1.0.0
     * @access public
     */
    public function __construct()
    {   
            add_action( 'plugins_loaded', array( $this, 'init' ) );
    } 

    /**
    * Fired by `init` action hook.
    *   
    * @access public
    */
    public function init() 
    {	
        if ( $this->is_compatible() && defined( 'GH_ELEMENTOR_AUTOCOMPLETE_PLUGIN_DIR' )  ) 
        {
            add_action( 'init', array( $this, 'load_textdomain' ) );

            require( GH_ELEMENTOR_AUTOCOMPLETE_PLUGIN_DIR . '/autoloader.php' );
            require_once( 'plugin.php' );

            return;	 
           
        }        

    } 
    
    public function is_compatible()
    {   
        if ( ! did_action( 'elementor/loaded' ) ) 
        {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
           
			return false;
		}
        
        return true;

    }

    public function admin_notice_missing_main_plugin()
    {
        return "";
	}

    public function load_textdomain() 
    {    
        load_plugin_textdomain( 'autocomplete-field-for-elementor-pro-forms', false, basename( __DIR__ ) . '/languages/' );	   
    } 
    
}

new GHElementorAutocomplete();