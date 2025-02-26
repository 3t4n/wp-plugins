<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://vk.com/npa98
 * @since      1.0.0
 *
 * @package    Admin_In_Menu
 * @subpackage Admin_In_Menu/includes
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
 * @package    Admin_In_Menu
 * @subpackage Admin_In_Menu/includes
 * @author     Nikita Pavlov <nikosriwan@yandex.ru>
 */
class Admin_In_Menu {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Admin_In_Menu_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

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
		if ( defined( 'PLUGIN_NAME_VERSION' ) ) {
			$this->version = PLUGIN_NAME_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'admin-in-menu';

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
	 * - Admin_In_Menu_Loader. Orchestrates the hooks of the plugin.
	 * - Admin_In_Menu_i18n. Defines internationalization functionality.
	 * - Admin_In_Menu_Admin. Defines all hooks for the admin area.
	 * - Admin_In_Menu_Public. Defines all hooks for the public side of the site.
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-admin-in-menu-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-admin-in-menu-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-admin-in-menu-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-admin-in-menu-public.php';

		$this->loader = new Admin_In_Menu_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Admin_In_Menu_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Admin_In_Menu_i18n();

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

		$plugin_admin = new Admin_In_Menu_Admin( $this->get_plugin_name(), $this->get_version() );

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

		$plugin_public = new Admin_In_Menu_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/*public static function admin_in_menu_load_scripts_edit_form_func(){
		wp_enqueue_style( 'edit_form', plugin_dir_path( dirname( __FILE__ ) ) . "public/css/edit_form.css");
	} */

	public static function admin_in_menu_profile_func(){
		$logged = is_user_logged_in();
		if ( !$logged ) {
			echo "Авторизуйтесь на сайте"; 
			return;
		}

		//$loader = new Admin_In_Menu_Loader();
		//$loader->add_action("wp_enqueue_scripts", "Admin_In_Menu", "admin_in_menu_load_scripts_edit_form_func");

		//$path = plugin_dir_path( dirname( __FILE__ ) ) . "public/css/edit_form.css";

		require plugin_dir_path( dirname( __FILE__ ) ) . "profile/data.php";
		require plugin_dir_path( dirname( __FILE__ ) ) . "profile/form_edit.php";
	}

	public static function admin_in_menu_user_func(){
		require plugin_dir_path( dirname( __FILE__ ) ) . "profile/data.php";
		// $id = is_user_logged_in();
		// $user = get_userdata($id);
		if ( is_user_logged_in() ) {
			echo "Вы авторизованы, как $user->user_login<br/>"; 
			wp_loginout();
			$logged = is_user_logged_in();
			if ( !$logged ) {
				echo "Авторизуйтесь на сайте"; 
				return;
			}

		//$loader = new Admin_In_Menu_Loader();
		//$loader->add_action("wp_enqueue_scripts", "Admin_In_Menu", "admin_in_menu_load_scripts_edit_form_func");

		//$path = plugin_dir_path( dirname( __FILE__ ) ) . "public/css/edit_form.css";

		require plugin_dir_path( dirname( __FILE__ ) ) . "profile/form_edit.php";
		return;
		}

		require plugin_dir_path( dirname( __FILE__ ) ) . "login/login.php";
	}
	public static function admin_in_menu_auth_func(){
		require plugin_dir_path( dirname( __FILE__ ) ) . "profile/data.php";
		$logged = is_user_logged_in();
		if ( !$logged ) {
			echo "Авторизуйтесь на сайте"; 
			require plugin_dir_path( dirname( __FILE__ ) ) . "login/login.php";
			return;
		}
		else echo "Вы авторизованы, как $user->user_login<br/>"; 
		wp_loginout();
		
	}

	public static function admin_in_menu_reg_func(){
		require plugin_dir_path( dirname( __FILE__ ) ) . "reg/reg.php";
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */

	public static function admin_in_menu_redirect($redirect_to){
		return home_url();
	}

	public static function admin_in_menu_out_redirect($redirect_to){
		return home_url();
	}


	public static function admin_in_menu_(){
		if (current_user_can('subscriber')):
	  		show_admin_bar(false);
		endif;
	}

	public function run() {
		// $this->loader->add_action();
		$this->loader->add_action("init", "Admin_In_Menu", "admin_in_menu_");
		$this->loader->add_filter("registration_redirect", "Admin_In_Menu", "admin_in_menu_redirect");
		$this->loader->add_filter("login_redirect", "Admin_In_Menu", "admin_in_menu_redirect");
		$this->loader->add_filter("logout_redirect", "Admin_In_Menu", "admin_in_menu_out_redirect");
		$this->loader->add_filter("widget_text", "Admin_In_Menu", "do_shortcode");
		//$this->loader->add_shortcode("admin_in_menu_profile", "Admin_In_Menu", "admin_in_menu_profile_func");
		$this->loader->add_shortcode("admin-in-menu-user", "Admin_In_Menu", "admin_in_menu_user_func");
		$this->loader->add_shortcode("admin-in-menu-auth", "Admin_In_Menu", "admin_in_menu_auth_func");
		$this->loader->add_shortcode("admin-in-menu-reg", "Admin_In_Menu", "admin_in_menu_reg_func");
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
	 * @return    Admin_In_Menu_Loader    Orchestrates the hooks of the plugin.
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
