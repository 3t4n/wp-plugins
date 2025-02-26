<?php

/**
 * @since      1.0.0
 * @package    Wp_Smart_Tv
 * @subpackage Wp_Smart_Tv/includes
 * @author     Rovidx Media <plugins@rovidx.com>
 */
class Wp_Smart_Tv {

	
	protected $loader;

	protected $plugin_name;

	protected $version;

	public function __construct() {
		if ( defined( 'WP_SMART_TV_VERSION' ) ) {
			$this->version = WP_SMART_TV_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'wp-smart-tv';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
        $this->set_image_sizes();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Wp_Smart_Tv_Loader. Orchestrates the hooks of the plugin.
	 * - Wp_Smart_Tv_i18n. Defines internationalization functionality.
	 * - Wp_Smart_Tv_Admin. Defines all hooks for the admin area.
	 * - Wp_Smart_Tv_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-smart-tv-loader.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-smart-tv-i18n.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wp-smart-tv-admin.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wp-smart-tv-public.php';
        
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-smart-tv-settings.php';
        
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-smart-tv-tools.php';
        
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/builders/class-wp-smart-tv-roku-dp.php';
        
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-smart-tv-roku-settings.php';
        
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-smart-tv-import-settings.php';
        
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/builders/class-wp-smart-tv-shortcodes.php';
        
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/controls/class-wp-smart-tv-import-ajax.php';
        
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-smart-tv-content-meta.php';
        
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-smart-tv-series-meta.php';
        
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-smart-tv-license.php';
        
		// require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-smart-tv-addons.php';
        
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'lib/cmb2-conditionals.php';
        
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'lib/cmb2-switch-button.php';
        
        if( !class_exists( 'EDD_SL_Plugin_Updater' ) ) {
            require_once plugin_dir_path( dirname( __FILE__ ) ) . '/lib/EDD_SL_Plugin_Updater.php';
        }
       
        
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'lib/cmb2-icon-picker.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'lib/cmb2-fontawesome-picker.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'lib/cmb2-attached-posts-field.php';
	    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'lib/cmb-field-post-search-ajax.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'lib/cmb2-field-type-tags.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'lib/cmb-field-select2.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'lib/cmb2-switch-button.php';
        
        /* Load the CMB2 Libraries */
        if (!class_exists('CMB2')) {
            require_once plugin_dir_path( dirname( __FILE__ ) ) . 'lib/cmb2/init.php';
        }

		$this->loader = new Wp_Smart_Tv_Loader();

	}

	private function set_image_sizes() {
        add_image_size( 'rokudp', 800, 450, array( 'center', 'center' ) );
    }
    
	private function set_locale() {

		$plugin_i18n = new Wp_Smart_Tv_i18n();

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

		$plugin_admin = new Wp_Smart_Tv_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
        $this->loader->add_action( 'cmb2_admin_init', $plugin_admin, 'Wp_Smart_Tv_register_options_metabox' );
        // add_action( 'cmb2_admin_init', array($this, 'build_license_page'), 999 );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Wp_Smart_Tv_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
        $this->loader->add_action( 'init', $plugin_public, 'build_roku_dp' );
        
        $shortcode = new Wp_Smart_Tv_shortcodes();
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
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Wp_Smart_Tv_Loader    Orchestrates the hooks of the plugin.
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

}
