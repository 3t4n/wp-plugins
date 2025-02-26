<?php

/*
 * UtmvGrabber Main class
 * @package utmv_grabber/inc
 * @since   1.0.0
 */

class UtmvGrabber {

    /**
     * UtmvGrabber version.
     *
     * @var string
     */
    public $version = '1.0.0';

    /**
     * The single instance of the class.
     *
     * @var UtmvGrabber
     * @since 1.0.0
     */
    protected static $_instance = null;

    /**
     * UtmvGrabber core functions
     *
     * @var engine
     * @since 1.0.0
     */
    public $engine;

    /**
     * Main UtmvGrabber Instance.
     *
     * Ensures only one instance of IsLayouts is loaded or can be loaded.
     *
     * @since 1.0.0
     * @static
     * @return UtmvGrabber.
     */
    public static function instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * NeonMaker Constructor.
     *
     * @global Array $UtmvGrabberSetting
     *
     */
    function __construct() {
        global $UtmvGrabberSetting;

        $UtmvGrabberSetting = get_option('UtmvGrabber_options', true);
        $this->define_constants();
        $this->includes();
        $this->init_hooks();
        $this->engine = new UtmvGrabberCore();
		
    }

    /**
     * Hook into actions and filters.
     *
     * @since 1.0.0
     */
    public function init_hooks() {
        register_activation_hook(UTMV_GRABBER_PLUGIN_FILE, array($this, 'UtmvGrabber_plugin_install'));
        add_action('init', array($this, 'init'), 0);

        /* register front end scripts */
        add_action('wp_enqueue_scripts', array($this, 'UtmvGrabberScripts'), 0);

        /* register admin scripts */
        add_action('admin_enqueue_scripts', array($this, 'UtmvGrabberAdminScripts'), 0);
    }

    /*
     * UtmvGrabber installation hook
     */

    public function UtmvGrabber_plugin_install() {
        global $wpdb;
        $prefix=$wpdb->prefix;
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        //$gb_orders = $this->NeonMaker_orders($prefix);          //40
        //$gb_inquiries = $this->NeonMaker_inquiries($prefix);          //40
        //$gb_email = $this->NeonMaker_emailtemp($prefix);          //40
    }

    /**
     * Init plugin when WordPress Initialises.
     */
    public function init() {

    }
    /**
     * Define UtmvGrabber Constants.
     */
    public function define_constants() {
        $this->define('UTMV_GRABBER_ABSPATH', dirname(UTMV_GRABBER_PLUGIN_FILE) . '/');
        $this->define('UTMV_GRABBER_BASENAME', plugin_basename(UTMV_GRABBER_PLUGIN_FILE));
        $this->define('UTMV_GRABBER_URL', plugins_url(basename(UTMV_GRABBER_ABSPATH)));
        $this->define('UTMV_GRABBER_VERSION', $this->version);
        $this->define('UTMV_GRABBER_CURRENCY', 'USD');
		//$this->define('UTMV_GRABBER_UTM_FIELDS', ['utm_source', 'utm_medium', 'utm_term', 'utm_content', 'utm_campaign', 'gclid']);
    }

    /**
     * Include required core files used in admin and on the frontend.
     */
    public function includes() {
        include_once UTMV_GRABBER_ABSPATH . '/inc/ClassUtmvGrabberCore.php';
		include_once UTMV_GRABBER_ABSPATH . '/inc/ClassActions.php';
        include_once UTMV_GRABBER_ABSPATH . '/inc/ClassShortcodes.php';
        if (is_admin()) {
            include_once UTMV_GRABBER_ABSPATH . '/inc/ClassAdminOptions.php';
        } 
    }

    /**
     * register and enque front end styles and scripts.
     *
     * @since 1.0.0
     */
    public function UtmvGrabberScripts() {
        global $post;
        global $UtmvGrabberSetting;

		wp_register_script('cokkies', UTMV_GRABBER_URL . "/assets/js/jquery.cookie.js", array(), UTMV_GRABBER_VERSION);
        wp_enqueue_script('UtmvGrabber_script', UTMV_GRABBER_URL . "/assets/js/utmv_grabber.js", array('jquery', 'cokkies'), UTMV_GRABBER_VERSION);
        wp_enqueue_style('UtmvGrabber_style', UTMV_GRABBER_URL . '/assets/css/utmv_grabber.css', array(), UTMV_GRABBER_VERSION);

        wp_localize_script('UtmvGrabber_script', 'UtmvGrabber_localize', array(
                'ajax_url' => admin_url('admin-ajax.php'),                
                'utm_fields' => UtmvGrabber()->engine->getShortcode(),                
            )
        );
    }

    public function UtmvGrabberAdminScripts() {
        wp_enqueue_script('UtmvGrabber_admin_script', UTMV_GRABBER_URL . '/assets/js/utmv_grabber_admin.js', array('jquery'), UTMV_GRABBER_VERSION);
        wp_enqueue_style('UtmvGrabber_admin_style', UTMV_GRABBER_URL . '/assets/css/utmv_grabber_admin.css', array(), UTMV_GRABBER_VERSION);
    }

    /**
     * Define constant if not already set.
     *
     * @param string      $name  Constant name.
     * @param string|bool $value Constant value.
     */
    private function define($name, $value) {
        if (!defined($name)) {
            define($name, $value);
        }
    }	
}
?>