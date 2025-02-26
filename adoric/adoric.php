<?php
/**
 * @package Adoric
 */
/*
Plugin Name: Adoric
Plugin URI: https://adoric.com/
Description: <b>Best popup builder for WP</b>
Requires at least: 4.7.0
Requires PHP: 5.4.0
Version: 1.1.2
Author: Adoric
Author URI: https://adoric.com/
License: GPLv2 or later
Text Domain: adoric.com
 */
defined( 'ABSPATH' ) or exit;
defined( 'ADORIC__FILE__' ) or define( 'ADORIC__FILE__', __FILE__ );
defined( 'ADORIC_PLUGIN_BASE' ) or define( 'ADORIC_PLUGIN_BASE', plugin_basename( ADORIC__FILE__ ) );
defined( 'ADORIC__APP__HOST__' ) or define( 'ADORIC__APP__HOST__', 'https://adoric.com' );
defined( 'ADORIC__CATALOG__' ) or define( 'ADORIC__CATALOG__', dirname(__FILE__) );
defined( 'ADORIC_MAIN_DIR' ) or define ( 'ADORIC_MAIN_DIR', basename( ADORIC__CATALOG__ ) );
// config
defined( 'ADORIC_PLUGIN_NAME' ) or define( 'ADORIC_PLUGIN_NAME', 'Adoric' );
defined( 'ADORIC_PLUGIN_SLUG' ) or define( 'ADORIC_PLUGIN_SLUG', 'ADORIC' );
defined( 'ADORIC_PLUGIN_VERSION' ) or define( 'ADORIC_PLUGIN_VERSION', '1.0.0' );
defined( 'ADORIC_PLUGIN_PATH' ) or define( 'ADORIC_PLUGIN_PATH', plugin_dir_path( ADORIC__FILE__ ) );
defined( 'ADORIC_PLUGIN_URL' ) or define( 'ADORIC_PLUGIN_URL' , plugin_dir_url(__FILE__));

include_once ADORIC_PLUGIN_PATH . "class/class-adoric_uninstall.php";
include_once ADORIC_PLUGIN_PATH . "class/class-adoric_activate.php";
include_once ADORIC_PLUGIN_PATH . "class/class-adoric_admin.php";
include_once ADORIC_PLUGIN_PATH . "class/class-adoric_sql.php";
include_once ADORIC_PLUGIN_PATH . "class/class-adoric_ajax.php";
include_once ADORIC_PLUGIN_PATH . "class/class-adoric_util.php";
include_once ADORIC_PLUGIN_PATH . "class/class-adoric_embed_handler.php";

final class ADORICWP {
    private static  $_instance = null ;
    public  $activate = null ;
    public  $deactivate = null ;
    public  $admin = null ;
    public  $sql = null ;
    public  $ajax = null ;
    public  $util = null ;
    public  $embed_handler = null ;
    public function __construct()
    {        
        if ( is_admin()) {
            $this->activate = new adoric_activated();
            $this->deactivate = new adoric_uninstall();
            $this->admin = new adoric_admin();
        } else {
            add_action( 'plugins_loaded', array( $this, 'frontend_init' ) );
        }
        
        $this->sql = new adoric_sql();
        $this->ajax = new adoric_ajax();
        $this->util = new adoric_util();
    }
    
    public static function instance()
    {
        return ( is_null( self::$_instance ) ? self::$_instance = new ADORICWP() : self::$_instance );
    }
    
    public function frontend_init()
    {
        $this->embed_handler = new adoric_embed_handler();
    }
}

ADORICWP::instance();