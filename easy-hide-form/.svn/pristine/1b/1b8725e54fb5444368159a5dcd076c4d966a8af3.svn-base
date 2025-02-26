<?php

/**
 * @link       https://bitbucket.org/allouise/easy-hide-form/
 * @since      1.0.0
 *
 * @package    Alf_Easy_Hide_Form
 * @subpackage Alf_Easy_Hide_Form/includes
 */

/**
 * @since      1.0.0
 * @package    Alf_Easy_Hide_Form
 * @subpackage Alf_Easy_Hide_Form/includes
 * @author     Allyson Flores <elixirlouise@gmail.com>
 */
class Alf_Easy_Hide_Form {

	/**
	 * @since    1.0.0
	 * @access   protected
	 * @var      Alf_Easy_Hide_Form_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'ALF_EASY_HIDE_FORM_VERSION' ) ) {
			$this->version = ALF_EASY_HIDE_FORM_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'easy-hide-form';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Alf_Easy_Hide_Form_Loader. Orchestrates the hooks of the plugin.
	 * - Alf_Easy_Hide_Form_i18n. Defines internationalization functionality.
	 * - Alf_Easy_Hide_Form_Admin. Defines all hooks for the admin area.
	 * - Alf_Easy_Hide_Form_Public. Defines all hooks for the public side of the site.
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-easy-hide-form-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-easy-hide-form-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-easy-hide-form-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-easy-hide-form-public.php';

		$this->loader = new Alf_Easy_Hide_Form_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Alf_Easy_Hide_Form_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Alf_Easy_Hide_Form_i18n();

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

		$plugin_admin = new Alf_Easy_Hide_Form_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'add_admin_menu_page' );
		$this->loader->add_action( 'admin_init', $plugin_admin, 'register_setting' );

		$this->loader->add_filter( 'plugin_action_links_'.$this->get_plugin_name().'/'.$this->get_plugin_name().'.php', $plugin_admin, 'add_settings_link_plugin', 10, 4 );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Alf_Easy_Hide_Form_Public( $this->get_plugin_name(), $this->get_version() );
		
		$this->loader->add_filter( 'comments_open', $plugin_public, 'remove_comment_form', 10 , 2 );

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
	 * @return    Alf_Easy_Hide_Form_Loader    Orchestrates the hooks of the plugin.
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
