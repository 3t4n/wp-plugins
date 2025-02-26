<?php
/*
 * Plugin Name: Advanced Pricing Table
 * Description: Pricing table for wordpress, easy to use, user friendly and highly customizable
 * Plugin URI:
 * Author URI: http://cybercraftit.com/
 * Author: Cybercraft
 * Text Domain: WPPT
 * Domain Path: /languages
 * Version: 1.0
 * License: GPL3
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( $_SERVER['HTTP_HOST'] == 'localhost' ) {
    define( 'WPPT_ENV', 'development' );
} else {
    define( 'WPPT_ENV', 'production' );
}

define( 'WPPT_VERSION', '5.0.2.4' );
define( 'WPPT_ROOT', dirname(__FILE__) );
define( 'WPPT_ASSET_PATH', plugins_url('assets',__FILE__) );

if( !function_exists( 'pri' ) ) {
    function pri( $data ) {
        echo '<pre>';print_r( $data ); echo '</pre>';
    }
}

class WPPT_Init {

    /**
     * @var Singleton The reference the *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     *
     * @return Singleton The *Singleton* instance.
     */
    public static function get_instance() {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Protected constructor to prevent creating a new instance of the
     * *Singleton* via the `new` operator from outside of this class.
     */
    protected function __construct() {
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts_styles' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts_styles' ) );
        $this->includes();
    }

    public function includes() {
        include_once 'register-data.php';
        include_once 'pricing-table-data.php';
        include_once 'pricing-table-admin.php';
        include_once 'shortcode.php';
        include_once 'more-products.php';
    }

    public function admin_enqueue_scripts_styles( $hook ) {
        global $pagenow;
        if( get_post_type() != 'wppt_pricing_table' )return;

        if( in_array( $pagenow, array( 'post.php', 'post-new.php' ) ) ) {
            wp_enqueue_style( 'temp-demo', WPPT_ASSET_PATH.'/css/demo.css' );
            wp_enqueue_style( 'temp-icons', WPPT_ASSET_PATH.'/css/icons.css' );
            wp_enqueue_style( 'temp-component', WPPT_ASSET_PATH.'/css/pricing-templates.css' );


            if( WPPT_ENV == 'production' ) {
                wp_enqueue_script( 'wppt-vue', WPPT_ASSET_PATH.'/js/vue.min.js', array(), false, true );
            } else {
                wp_enqueue_script( 'wppt-vue', WPPT_ASSET_PATH.'/js/vue.js', array(), false, true );
            }

            wp_enqueue_script( 'wppt-pricing-templates-js', WPPT_ASSET_PATH.'/js/pricing-templates.js', array( 'jquery', 'wppt-vue' ), false, true );
            wp_enqueue_script( 'wppt-admin-js', WPPT_ASSET_PATH.'/js/admin.js', array( 'jquery', 'wppt-vue' ), false, true );
        }
    }

    public function wp_enqueue_scripts_styles( $hook ) {
        wp_register_style( 'temp-component', WPPT_ASSET_PATH.'/css/pricing-templates.css' );

        if( WPPT_ENV == 'production' ) {
            wp_register_script( 'wppt-vue', WPPT_ASSET_PATH.'/js/vue.min.js', array(), false, true );
        } else {
            wp_register_script( 'wppt-vue', WPPT_ASSET_PATH.'/js/vue.js', array(), false, true );
        }
        wp_register_script( 'wppt-pricing-templates-js', WPPT_ASSET_PATH.'/js/pricing-templates.js', array( 'jquery', 'wppt-vue' ), false, true );
        wp_register_script( 'wppt-public-js', WPPT_ASSET_PATH.'/js/public.js', array( 'jquery', 'wppt-vue' ), false, true );
    }
}

WPPT_Init::get_instance();