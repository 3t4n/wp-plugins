<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    AllContactOrgV
 * @subpackage AllContactOrgV/includes
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
 * @package    AllContactOrgV
 * @subpackage AllContactOrgV/includes
 * @author     Your Name <email@example.com>
 */




class AllContactOrgV {

	
	

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      AllContactOrgV_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $allcontactorgv    The string used to uniquely identify this plugin.
	 */
	protected $allcontactorgv;

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
		if ( defined( 'ALLCONTACTORGV_VERSION' ) ) {
			$this->version = ALLCONTACTORGV_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->allcontactorgv = 'allcontactorgv';

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
	 * - AllContactOrgV_Loader. Orchestrates the hooks of the plugin.
	 * - AllContactOrgV_i18n. Defines internationalization functionality.
	 * - AllContactOrgV_Admin. Defines all hooks for the admin area.
	 * - AllContactOrgV_Public. Defines all hooks for the public side of the site.
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-allcontactorgv-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-allcontactorgv-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-allcontactorgv-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-allcontactorgv-public.php';


		$this->loader = new AllContactOrgV_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the AllContactOrgV_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new AllContactOrgV_i18n();

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

		$plugin_admin = new AllContactOrgV_Admin( $this->get_allcontactorgv(), $this->get_version() );

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

		$plugin_public = new AllContactOrgV_Public( $this->get_allcontactorgv(), $this->get_version() );

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

	public function register() {
		add_action( 'admin_menu', [$this,'add_menu_item']);
		add_action( 'admin_init', [$this,'settings_init']);
		
		
		
	}

	public function add_menu_item(){
		add_menu_page(
			esc_html__('allcontactorgv Settings Page', 'allcontactorgv'),
			esc_html__('Карточка организации', 'allcontactorgv'),
			'manage_options',
			'allcontactorgv_settings',
			[$this,'main_admin_page'],
			'dashicons-text-page',
			50,
		);
		
	}



	function main_admin_page(){
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/welcome.php';
		
	}

	public function settings_init(){

		register_setting('allcontactorgv_settings','allcontactorgv_settings_options');
		add_settings_section( 'allcontactorgv_settings_section', 'Контакты', [$this,'allcontactorgv_settings_section_html'], 'allcontactorgv_settings' );
		add_settings_field('allcontact_address', esc_html__('Адрес','allcontactorgv' ),[$this,'allcontact_address_html'],'allcontactorgv_settings','allcontactorgv_settings_section');
		add_settings_field('allcontact_telephon', esc_html__('Телефон','allcontactorgv' ),[$this,'allcontact_telephon_html'],'allcontactorgv_settings','allcontactorgv_settings_section');
		add_settings_field('allcontact_telephon2', esc_html__('Телефон №2','allcontactorgv' ),[$this,'allcontact_telephon2_html'],'allcontactorgv_settings','allcontactorgv_settings_section');
		add_settings_field('allcontact_comers_text', esc_html__('Рекламный текст','allcontactorgv' ),[$this,'allcontact_comers_text_html'],'allcontactorgv_settings','allcontactorgv_settings_section');
	}

	public function allcontact_address_html(){
		$options = get_option('allcontactorgv_settings_options');
		?>
		<input type="text" name="allcontactorgv_settings_options[allcontact_address]" value="<?php print isset($options['allcontact_address']) ? $options['allcontact_address'] : ""; ?>"><br>
		<br>Шорткод: [allcontactv_address]
		<br>Вывести в теме: <?php print '&lt;?php print do_shortcode("[allcontactv_address]"); ?&gt' ; ?> 
		<?php
	}
	public function allcontact_telephon_html(){
		$options = get_option('allcontactorgv_settings_options');
		?>
				<input type="text" name="allcontactorgv_settings_options[allcontact_telephon]" value="<?php print isset($options['allcontact_telephon']) ? $options['allcontact_telephon'] : ""; ?>">
				<br>Шорткод: [allcontact_telephon]
		<br>Вывести в теме: <?php print '&lt;?php print do_shortcode("[allcontact_telephon]"); ?&gt' ; ?> 
		<?php
	}
	public function allcontact_telephon2_html(){
		$options = get_option('allcontactorgv_settings_options');
		?>
			<input type="text" name="allcontactorgv_settings_options[allcontact_telephon2]" value="<?php print isset($options['allcontact_telephon2']) ? $options['allcontact_telephon2'] : ""; ?>">
			<br>Шорткод: [allcontact_telephon2]
			<br>Вывести в теме: <?php print '&lt;?php print do_shortcode("[allcontact_telephon2]"); ?&gt' ; ?> 
		<?php
	}

	public function allcontact_comers_text_html(){
		$options = get_option('allcontactorgv_settings_options');
		?>
			<textarea rows="10" cols="45" name="allcontactorgv_settings_options[allcontact_comers_text]" ><?php print isset($options['allcontact_comers_text']) ? $options['allcontact_comers_text'] : ""; ?></textarea>
			<br>Шорткод: [allcontact_comers_text]
			<br>Вывести в теме: <?php print '&lt;?php print do_shortcode("[allcontact_comers_text]"); ?&gt' ; ?> 
		<?php
	}

	public function allcontactorgv_settings_section_html(){
		
	}



	

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_allcontactorgv() {
		return $this->allcontactorgv;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    AllContactOrgV_Loader    Orchestrates the hooks of the plugin.
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
	static function activation()
	{

		flash_rewrite_rules();
	}

	static function deactivation()
	{

		flash_rewrite_rules();
	}
}


$allcontactorgv = new AllContactOrgV();
$allcontactorgv->register();
