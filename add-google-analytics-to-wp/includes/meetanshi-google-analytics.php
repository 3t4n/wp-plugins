<?php
class Google_Analytics_Meetanshi{
    protected $loader;
    protected $google_analytics_meet;
    protected $version;
    public function __construct() {
        if ( defined( 'PLUGIN_NAME_VERSION' ) ) {
            $this->version = PLUGIN_NAME_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->plugin_name = 'google-analytics-meet';

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();


    }
    private function load_dependencies() {
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/meetanshi-google-analytics-loader.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/meetanshi-google-analytics-i18n.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/meetanshi-google-analytics-admin.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/meetanshi-google-analytics-public.php';
        $this->loader = new Meetanshi_Google_Analytics_Loader();
    }
    private function set_locale() {

        $plugin_i18n = new Meetanshi_Google_Analytics_i18n();

        $this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

    }
    private function define_admin_hooks() {

        $plugin_admin = new Meetanshi_Google_Analytics_Admin( $this->get_meetanshi_google_analytics(), $this->get_version() );

        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

    }
    private function define_public_hooks() {

        $plugin_public = new Meetanshi_Google_Analytics_Public( $this->get_meetanshi_google_analytics(), $this->get_version() );

        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

    }
    public function run() {
        $this->loader->run();
    }
    public function get_meetanshi_google_analytics() {
        return $this->meetanshi_google_analytics;
    }

    public function get_loader() {
        return $this->loader;
    }
    public function get_version() {
        return $this->version;
    }

}
