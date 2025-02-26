<?php
/**
 * Main Advamentor Class
 *
 * @since      1.0
 * @package    Advamentor
 * @author     Themexa
 */

final class Advamentor {

    /**
     * Plugin Version
     *
     * @since 1.0
     *
     * @var string The plugin version.
     */
    const VERSION = '1.0.1';

    /**
     * Minimum Elementor Version
     *
     * @since 1.0
     *
     * @var string Minimum Elementor version required to run the plugin.
     */
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

    /**
     * Minimum PHP Version
     *
     * @since 1.0
     *
     * @var string Minimum PHP version required to run the plugin.
     */
    const MINIMUM_PHP_VERSION = '7.0';

    /**
     * Instance
     *
     * @since 1.0
     *
     * @access private
     * @static
     *
     * @var Advamentor The single instance of the class.
     */
    private static $_instance = null;

    /**
     * Instance
     *
     * Ensures only one instance of the class is loaded or can be loaded.
     *
     * @since 1.0
     *
     * @access public
     * @static
     *
     * @return Advamentor An instance of the class.
     */
    public static function instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;

    }

    /**
     * Constructor
     *
     * @since 1.0
     *
     * @access public
     */
    public function __construct() {

        add_action( 'init', [ $this, 'i18n' ] );
        add_action( 'plugins_loaded', [ $this, 'init' ] );

    }

    /**
     * Load Textdomain
     *
     * Load plugin localization files.
     *
     * Fired by `init` action hook.
     *
     * @since 1.0
     *
     * @access public
     */
    public function i18n() {

        load_plugin_textdomain( 'advamentor' );

    }

    /**
     * Initialize the plugin
     *
     * Load the plugin only after Elementor (and other plugins) are loaded.
     * Checks for basic plugin requirements, if one check fail don't continue,
     * if all check have passed load the files required to run the plugin.
     *
     * Fired by `plugins_loaded` action hook.
     *
     * @since 1.0
     *
     * @access public
     */
    public function init() {

        // Check if Elementor is installed and activated
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
            return;
        }

        // Check for required Elementor version
        if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
            return;
        }

        // Check for required PHP version
        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
            return;
        }

        // Add Plugin actions
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have Elementor installed or activated.
     *
     * @since 1.0
     *
     * @access public
     */
    public function admin_notice_missing_main_plugin() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__( '%1$s requires %2$s to be installed and activated.', 'advamentor' ),
            '<strong>' . esc_html__( 'Advamentor', 'advamentor' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'advamentor' ) . '</strong>'
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required Elementor version.
     *
     * @since 1.0
     *
     * @access public
     */
    public function admin_notice_minimum_elementor_version() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__( '%1$s requires %2$s version %3$s or greater.', 'advamentor' ),
            '<strong>' . esc_html__( 'Advamentor', 'advamentor' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'advamentor' ) . '</strong>',
             self::MINIMUM_ELEMENTOR_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required PHP version.
     *
     * @since 1.0
     *
     * @access public
     */
    public function admin_notice_minimum_php_version() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__( '%1$s requires %2$s version %3$s or greater.', 'advamentor' ),
            '<strong>' . esc_html__( 'Advamentor', 'advamentor' ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', 'advamentor' ) . '</strong>',
             self::MINIMUM_PHP_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

    /**
     * Init Widgets
     *
     * Include widgets files and register them
     *
     * @since 1.0
     *
     * @access public
     */
    public function init_widgets() {

        /*
         * Register widgets and include widget files
         */

        /* Advanced Banner */

        if ( ! get_option( 'disable_advanced_banner' ) == 1 ) {
            require_once( __DIR__ . '/widgets/advanced-banner.php' );

            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Advanced_Banner_Widget() );
        }

        /* Advanced Contact Form 7 */

        if ( ! get_option( 'disable_advanced_cf7' ) == 1 ) {
            require_once( __DIR__ . '/widgets/advanced-contact-form-7.php' );

            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Advanced_Contact_Form_7_Widget() );
        }

        /* Advanced Countdown */

        if ( ! get_option( 'disable_advanced_countdown' ) == 1 ) {
            require_once( __DIR__ . '/widgets/advanced-countdown.php' );

            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Advanced_Countdown_Widget() );
        }

        /* Advanced Counter */

        if ( ! get_option( 'disable_advanced_counter' ) == 1 ) {
            require_once( __DIR__ . '/widgets/advanced-counter.php' );

            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Advanced_Counter_Widget() );
        }

        /* Advanced Fancy Text */

        if ( ! get_option( 'disable_advanced_fancy_text' ) == 1 ) {
            require_once( __DIR__ . '/widgets/advanced-fancy-text.php' );

            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Advanced_Fancy_Text_Widget() );
        }

        /* Advanced Image Slider */

        if ( ! get_option( 'disable_advanced_image_slider' ) == 1 ) {
            require_once( __DIR__ . '/widgets/advanced-image-slider.php' );

            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Advanced_Image_Slider_Widget() );
        }

        /* Advanced Logo Carousel */

        if ( ! get_option( 'disable_advanced_logo_carousel' ) == 1 ) {
            require_once( __DIR__ . '/widgets/advanced-logo-carousel.php' );

            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Advanced_Logo_Carousel_Widget() );
        }

        /* Advanced Testimonial Carousel */

        if ( ! get_option( 'disable_advanced_testimonial_carousel' ) == 1 ) {
            require_once( __DIR__ . '/widgets/advanced-testimonial-carousel.php' );

            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Advanced_Testimonial_Carousel_Widget() );
        }

        /* Advanced Flip Carousel */

        if ( ! get_option( 'disable_advanced_flip_carousel' ) == 1 ) {
            require_once( __DIR__ . '/widgets/advanced-flip-carousel.php' );

            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Advanced_Flip_Carousel_Widget() );
        }

    }

}

Advamentor::instance();
