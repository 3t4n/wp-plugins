<?php
/**
 * Plugin Name: Astro Elementor Widgets Lite
 * Plugin URI: https://robizstory.me/plguins/elementor-widgets-lite
 * Description: A modern collection of elementor widgets
 * Version: 1.0.1
 * Author: Md Rabiul Islam Robi
 * Author URI: https://robizstory.me
 * Text Domain: astro-elementor-widgets-lite
 */

 if( ! defined( 'ABSPATH' ) ) exit();

 /**
  * Require Plugin Updater
  */
 require_once 'libs/PluginUpdater.php';

 /**
 * Elementor Extension main CLass
 * @since 1.0.0
 */
final class Astro_Elementor_Widgets_Lite {

    // Plugin version
    const VERSION = '1.0.1';

    // Minimum Elementor Version
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

    // Minimum PHP Version
    const MINIMUM_PHP_VERSION = '7.0';

    // Instance
    private static $_instance = null;

    /**
    * SIngletone Instance Method
    * @since 1.0.0
    */
    public static function instance() {
        if( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
    * Construct Method
    * @since 1.0.0
    */
    public function __construct() {
        // Call Constants Method
        $this->define_constants();
        register_activation_hook( __FILE__, [ $this, 'activate' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'scripts_styles' ] );
        add_action( 'init', [ $this, 'i18n' ] );
        add_action( 'plugins_loaded', [ $this, 'init' ] );
    }

    /**
    * Define Plugin Constants
    * @since 1.0.0
    */
    public function define_constants() {
        define( 'AEWLITE_VERSION', self::VERSION );
        define( 'AEWLITE_PLUGIN_URL', trailingslashit( plugins_url( '/', __FILE__ ) ) );
        define( 'AEWLITE_PLUGIN_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
    }

    /**
     * On Plugin Activation
     * @since 1.0.0
     */
    public function activate() {
        $updater = new PluginUpdater();
        // Update Plugin Installed Version
        update_option( 'aewlite_plugin_version', $updater->update_plugin_version( AEWLITE_VERSION ) );
    }

    /**
    * Load Scripts & Styles
    * @since 1.0.0
    */
    public function scripts_styles() {
        wp_register_style( 'aewlite-style', AEWLITE_PLUGIN_URL . 'assets/dist/css/public.min.css', [], rand(), 'all' );
        wp_register_script( 'aewlite-script', AEWLITE_PLUGIN_URL . 'assets/dist/js/public.min.js', [ 'jquery' ], rand(), true );

        wp_enqueue_style( 'aewlite-style' );
        wp_enqueue_script( 'aewlite-script' );
    }

    /**
    * Load Text Domain
    * @since 1.0.0
    */
    public function i18n() {
       load_plugin_textdomain( 'astro-elementor-widgets-lite', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
    }

    /**
    * Initialize the plugin
    * @since 1.0.0
    */
    public function init() {
        // Check for Version Update
        $updater = new PluginUpdater();
        $updater->check_plugin_version( AEWLITE_VERSION, get_option( 'aewlite_plugin_version' ) );
        $updater->plugin_update_message();

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
    * @since 1.0.0
    */
    public function init_widgets() {
        require_once AEWLITE_PLUGIN_PATH . 'widgets/preview-card/preview-card.php';
        require_once AEWLITE_PLUGIN_PATH . 'widgets/pricing-table/pricing-table.php';
        require_once AEWLITE_PLUGIN_PATH . 'widgets/team-card/team-card.php';
    }

    /**
    * Init Category Section
    * @since 1.0.0
    */
    public function init_category() {
        Elementor\Plugin::instance()->elements_manager->add_category(
            'aewlite-for-elementor',
            [
                'title' => 'Astro Elementor Widgets Lite'
            ],
            1
        );
    }

    /**
    * Admin Notice
    * Warning when the site doesn't have Elementor installed or activated
    * @since 1.0.0
    */
    public function admin_notice_missing_main_plugin() {
        if( isset( $_GET[ 'activate' ] ) ) unset( $_GET[ 'activate' ] );
        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" to be installed and activated', 'astro-elementor-widgets-lite' ),
            '<strong>'.esc_html__( 'Elementor Widgets Lite', 'astro-elementor-widgets-lite' ).'</strong>',
            '<strong>'.esc_html__( 'Elementor', 'astro-elementor-widgets-lite' ).'</strong>'
        );

        printf( '<div class="notice notice-warning is-dimissible"><p>%1$s</p></div>', $message );
    }

    /**
    * Admin Notice
    * Warning when the site doesn't have a minimum required Elementor version.
    * @since 1.0.0
    */
    public function admin_notice_minimum_elementor_version() {
        if( isset( $_GET[ 'activate' ] ) ) unset( $_GET[ 'activate' ] );
        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater', 'astro-elementor-widgets-lite' ),
            '<strong>'.esc_html__( 'Elementor Widgets Lite', 'astro-elementor-widgets-lite' ).'</strong>',
            '<strong>'.esc_html__( 'Elementor', 'astro-elementor-widgets-lite' ).'</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf( '<div class="notice notice-warning is-dimissible"><p>%1$s</p></div>', $message );
    }

    /**
    * Admin Notice
    * Warning when the site doesn't have a minimum required PHP version.
    * @since 1.0.0
    */
    public function admin_notice_minimum_php_version() {
        if( isset( $_GET[ 'activate' ] ) ) unset( $_GET[ 'activate' ] );
        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater', 'astro-elementor-widgets-lite' ),
            '<strong>'.esc_html__( 'Elementor Widgets Lite', 'astro-elementor-widgets-lite' ).'</strong>',
            '<strong>'.esc_html__( 'PHP', 'astro-elementor-widgets-lite' ).'</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf( '<div class="notice notice-warning is-dimissible"><p>%1$s</p></div>', $message );
    }

}

Astro_Elementor_Widgets_Lite::instance();