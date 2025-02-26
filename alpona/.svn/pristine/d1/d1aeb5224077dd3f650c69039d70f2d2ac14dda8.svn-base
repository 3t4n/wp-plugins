<?php
/**
 * Plugin Name: Alpona
 * Description: Minimal Elementor Card Widget
 * Version:     0.0.1
 * Author:      Mazharul
 * Author URI:  https://stackoverflow.com/users/15277579/mazharul-islam
 * Text Domain: alpona-addons-lite
 */

// Exit if accessed this file directly
 if( ! defined( 'ABSPATH' ) ) exit();

 /**
 * Elementor Extension main CLass
 * @since 0.0.1
 */
final class ALPONA_Elementor_Addons {

    // Plugin version
    const VERSION = '0.0.1';

    // Minimum Elementor Version
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

    // Minimum PHP Version
    const MINIMUM_PHP_VERSION = '7.0';

    // Instance
    private static $_instance = null;

    /**
    * Singletone Instance Method
    * @since 0.0.1
    */
    public static function instance() {
        if( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
    * Construct Method
    * @since 0.0.1
    */
    public function __construct() {
        // Call Constants Method
        $this->define_constants();
        add_action( 'wp_enqueue_scripts', [ $this, 'scripts_styles' ] );
        add_action( 'init', [ $this, 'i18n' ] );
        add_action( 'plugins_loaded', [ $this, 'init' ] );
    }

    /**
    * Define Plugin Constants
    * @since 0.0.1
    */
    public function define_constants() {
        define( 'ALPONAADDONS_PLUGIN_URL', trailingslashit( plugins_url( '/', __FILE__ ) ) );
        define( 'ALPONAADDONS_PLUGIN_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
    }

    /**
    * Load Scripts & Styles
    * @since 0.0.1
    */
    public function scripts_styles() {
        wp_register_style( 'alponaaddons-style', ALPONAADDONS_PLUGIN_URL . 'assets/source/css/public.css', [], rand(), 'all' );
        wp_register_script( 'alponaaddons-script', ALPONAADDONS_PLUGIN_URL . 'assets/source/js/public.js', [ 'jquery' ], rand(), true );

        wp_enqueue_style( 'alponaaddons-style' );
        wp_enqueue_script( 'alponaaddons-script' );
    }

    /**
    * Load Text Domain
    * @since 0.0.1
    */
    public function i18n() {
       load_plugin_textdomain( 'alpona-addons-lite', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
    }

    /**
    * Initialize the plugin
    * @since 0.0.1
    */
    public function init() {
        // Check if the ELementor installed and activated
        if( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
            return;
        }

        if( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
            return;
        }

        if( ! version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
            return;
        }

        add_action( 'elementor/init', [ $this, 'init_category' ] );
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
    }

    /**
    * Init Widgets
    * @since 0.0.1
    */
    public function init_widgets() {
        require_once ALPONAADDONS_PLUGIN_PATH . '/widgets/alpona-card-widget.php';
    }

    /**
    * Init Category Section
    * @since 0.0.1
    */
    public function init_category() {
        Elementor\Plugin::instance()->elements_manager->add_category(
            'alponaaddons-for-elementor',
            [
                'title' => 'Alpona Addons'
            ],
            1
        );
    }

    /**
    * Admin Notice
    * Warning when the site doesn't have Elementor installed or activated
    * @since 0.0.1
    */
    public function admin_notice_missing_main_plugin() {
        if( isset( $_GET[ 'activate' ] ) ) unset( $_GET[ 'activate' ] );
        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" to be installed and activated', 'alpona-addons-lite' ),
            '<strong>'.esc_html__( 'Alpona Elementor Addons', 'alpona-addons-lite' ).'</strong>',
            '<strong>'.esc_html__( 'Elementor', 'alpona-addons-lite' ).'</strong>'
        );

        printf( '<div class="notice notice-warning is-dimissible"><p>%1$s</p></div>', $message );
    }

    /**
    * Admin Notice
    * Warning when the site doesn't have a minimum required Elementor version.
    * @since 0.0.1
    */
    public function admin_notice_minimum_elementor_version() {
        if( isset( $_GET[ 'activate' ] ) ) unset( $_GET[ 'activate' ] );
        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater', 'alpona-addons-lite' ),
            '<strong>'.esc_html__( 'Alpona Elementor Addons', 'alpona-addons-lite' ).'</strong>',
            '<strong>'.esc_html__( 'Elementor', 'alpona-addons-lite' ).'</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf( '<div class="notice notice-warning is-dimissible"><p>%1$s</p></div>', $message );
    }

    /**
    * Admin Notice
    * Warning when the site doesn't have a minimum required PHP version.
    * @since 0.0.1
    */
    public function admin_notice_minimum_php_version() {
        if( isset( $_GET[ 'activate' ] ) ) unset( $_GET[ 'activate' ] );
        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater', 'alpona-addons-lite' ),
            '<strong>'.esc_html__( 'Alpona Elementor Addons', 'alpona-addons-lite' ).'</strong>',
            '<strong>'.esc_html__( 'PHP', 'alpona-addons-lite' ).'</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf( '<div class="notice notice-warning is-dimissible"><p>%1$s</p></div>', $message );
    }

}

ALPONA_Elementor_Addons::instance();