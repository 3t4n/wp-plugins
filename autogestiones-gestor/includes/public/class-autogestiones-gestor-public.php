<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


/**
 * Public-facing functionality of the plugin.
 *
 * @link       https://autogestiones.net
 * @since      1.0.0
 *
 * @package    Autogestiones_Plugin
 * @subpackage Autogestiones_Plugin/public
 */

class Autogestiones_Plugin_Public {
    /**
     * The name of the plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The name of the plugin.
     */
    private $plugin_name;

    /**
     * The version of the plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of the plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param    string    $plugin_name       The name of the plugin.
     * @param    string    $version    The version of the plugin.
     */
    public function __construct( $plugin_name, $version ) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {
        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/autogestiones-gestor-public.css', array(), $this->version, 'all' );
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {
        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/autogestiones-gestor-public.js', array( 'jquery' ), $this->version, false );
    }

    /**
     * Register the hooks for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function init() {
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
    }
}