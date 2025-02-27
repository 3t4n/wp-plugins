<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://kalender.digital
 * @since      1.0.0
 *
 * @package    Kalender_Digital
 * @subpackage Kalender_Digital/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Kalender_Digital
 * @subpackage Kalender_Digital/includes
 * @author     Kalender.digital <info@kalender.digital>
 */
class Kalender_Digital {

    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      Kalender_Digital_Loader    $loader    Maintains and registers all hooks for the plugin.
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $kalender_digital    The string used to uniquely identify this plugin.
     */
    protected $kalender_digital;

    /**
     * The current version of the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $version    The current version of the plugin.
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function __construct() {
        if ( defined( 'KALENDER_DIGITAL_VERSION' ) ) {
            $this->version = KALENDER_DIGITAL_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->kalender_digital = 'kalender-digital';

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();

        add_shortcode( 'kalender_digital', array( &$this, 'kalender_digital_shortcode' ) );
        add_shortcode( 'calendar_expert', array( &$this, 'kalender_digital_shortcode' ) );
        add_shortcode( 'calendar_online', array( &$this, 'kalender_digital_shortcode' ) );
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - Kalender_Digital_Loader. Orchestrates the hooks of the plugin.
     * - Kalender_Digital_i18n. Defines internationalization functionality.
     * - Kalender_Digital_Admin. Defines all hooks for the admin area.
     * - Kalender_Digital_Public. Defines all hooks for the public side of the site.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function load_dependencies() {

        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-kalender-digital-loader.php';

        /**
         * The class responsible for defining internationalization functionality
         * of the plugin.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-kalender-digital-i18n.php';

        /**
         * The class responsible for defining all actions that occur in the admin area.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-kalender-digital-admin.php';

        /**
         * The class responsible for defining all actions that occur in the public-facing
         * side of the site.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-kalender-digital-public.php';

        $this->loader = new Kalender_Digital_Loader();

    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the Kalender_Digital_i18n class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function set_locale() {

        $plugin_i18n = new Kalender_Digital_i18n();

        $this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_admin_hooks() {

        $plugin_admin = new Kalender_Digital_Admin( $this->get_kalender_digital(), $this->get_version() );

        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_public_hooks() {

        $plugin_public = new Kalender_Digital_Public( $this->get_kalender_digital(), $this->get_version() );

        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since    1.0.0
     */
    public function run() {
        $this->loader->run();
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @since     1.0.0
     * @return    string    The name of the plugin.
     */
    public function get_kalender_digital() {
        return $this->kalender_digital;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @since     1.0.0
     * @return    Kalender_Digital_Loader    Orchestrates the hooks of the plugin.
     */
    public function get_loader() {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @since     1.0.0
     * @return    string    The version number of the plugin.
     */
    public function get_version() {
        return $this->version;
    }

    function kalender_digital_shortcode($atts = [], $content = null, $tag = '')
    {
        // Examples
        // [kalender_digital height=650px width=100% border=1 link=https://kalender.digital/12073b2a94a3ac83cbf7]
        // [calendar_online height=650px width=100% border=1 link=https://calendar.online/45ebc4aef6fd5149539c]

        $schemeHttps = 'https://';

        if ($tag === 'kalender_digital') {
            $calendarDomain = 'kalender.digital';
        } else {
            $calendarDomain = 'calendar.online';
        }

        $atts = array_change_key_case((array)$atts, CASE_LOWER);
        $atts = shortcode_atts([
            'height' => '600px',
            'width' => '100%',
            'border' => '0',
            'link' => $schemeHttps . $calendarDomain . '/12073b2a94a3ac83cbf7',
        ], $atts, $tag);

        $height = trim($this->removeJavascript($atts['height']));
        $width = trim($this->removeJavascript($atts['width']));
        $border = trim($this->removeJavascript($atts['border']));
        $src = trim($this->removeJavascript($atts['link']));

        if (strpos($src, '/') === false) {
            $src = $schemeHttps . $calendarDomain . '/' . $src;
        }

        if (strpos($src, 'http://') === false && strpos($src, $schemeHttps) === false) {
            $src = $schemeHttps . $src;
        }

        $res = '<iframe height="' . $height . '" width="' . $width . '" src="' . $src . '?wp_iframe=true" style="border:' . $border . '"></iframe>';

        return $res;
    }

    private function removeJavascript($string)
    {
        return preg_replace('/[^a-zA-Z0-9_\-%:\/.]*/', '', $string);
    }
}
