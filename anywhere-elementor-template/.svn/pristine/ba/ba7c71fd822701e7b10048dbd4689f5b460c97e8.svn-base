<?php
/**
 * Plugin Name: Anywhere Elementor Template by Shortcode
 * Requires Plugins: elementor
 * Description: Display Elementor sections/canvas/templates using shortcode in anywhere of your site. Example: [AETS_Template id='123']
 * Author: Saiful Islam
 * Author URI: https://profiles.wordpress.org/codersaiful/#content-plugins
 * Tags: elementor template, elementor template anywhere, elementor shortcode, elementor anywhere, elementor template shortcode
 * 
 * Version: 1.0.1
 * Requires at least:    6.2
 * Tested up to:         6.7
 * 
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * 
 * Text Domain: anywhere-elementor-template
 * Domain Path: /languages/
 */

 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! defined( 'AETS_BASE_DIR_BASE' ) ){
    define( "AETS_BASE_DIR_BASE", plugin_dir_path( __FILE__ ) );
}
if( ! defined( 'AETS_BASE_BASE_DIR' ) ){
    define( "AETS_BASE_BASE_DIR", str_replace( '\\', '/', AETS_BASE_DIR_BASE ) );
}

class AETS_BASE_Init
{
    public static $instance;

    public static function instance()
    {
        if( is_null( self::$instance ) ){
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * Base constructor.
     * called when the class is instantiated
     * called only once and called automatically
     * here called hook 'plugins_loaded' to run the main functionality of the plugin
     */
    public function __construct()
    {

        include_once AETS_BASE_BASE_DIR . 'autoloader.php';
        add_action('plugins_loaded', [$this, 'init']);

    }

    /**
     * Main plugin initialization
     * It will execute when found Elementor is installed and activated 
     * Then will run all other functionality 
     * 
     * @since 1.0.0
     * 
     * @return void
     */
    public function init()
    {
        $inAdmin = new AETS_Base\Admin\Show_Shortcode(); 
        $inAdmin->run();      
        AETS_Base\Inc\Shortcode::init();
    }
}

AETS_BASE_Init::instance(); 


