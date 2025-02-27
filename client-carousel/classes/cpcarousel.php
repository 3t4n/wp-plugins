<?php
/*
Version: 1.0.0
Author:Creative pig
Author URI: www.creativepig.net
*/
class Logo_Carousel {

	protected $loader;

	protected $plugin_name;

	
	public function __construct() {

		$this->plugin_name = 'client-logo-carousel';
		$this->load_dependencies();
		$this->register_admin_hooks();
		$this->define_public_hooks();
		$this->init_shortcodes();

	}

	private function load_dependencies() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'classes/cploader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'classes/cpshortcode.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/cpadmin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'classes/cpsetting.php';

		$this->loader = new Loader();

	}

	

	public function init_shortcodes(){

		$plugin_shortcode = new CP_Shortcode();
		$plugin_shortcode->init();


	}
// LOAD script and style
	private function register_admin_hooks() {

		$plugin_admin = new Admin( $this->get_plugin_name() );

		// Load styles and scripts
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		

		// Add Admin column
		$this->loader->add_filter( "manage_".LOGO_CAROUSEL."_posts_columns", $plugin_admin, 'usage_column_head' );
		$this->loader->add_action( "manage_".LOGO_CAROUSEL."_posts_custom_column", $plugin_admin, 'usage_column_content', 10, 2 );

		// Add metaboxes
		$this->loader->add_action( 'add_meta_boxes', $plugin_admin, 'add_Client_meta_boxes' );
		$this->loader->add_action( 'save_post', $plugin_admin, 'save_clogos_meta_box' );
		$this->loader->add_action( 'save_post', $plugin_admin, 'save_settings_meta_box' );

		
		// Row action
		$this->loader->add_filter( 'post_row_actions', $plugin_admin, 'customize_row_actions', 10, 2 );



		// Templates
		$this->loader->add_action( 'admin_footer', $plugin_admin, 'html_templates' );

		// Post messages
		$this->loader->add_filter( 'post_updated_messages', $plugin_admin, 'updated_messages' );

		}

	private function define_public_hooks() {

		$plugin_public = new Setting( $this->get_plugin_name() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

		$this->loader->add_filter( 'init', $plugin_public, 'custom_post_types' );

		// Enable shortcode in Text widget
		add_filter( 'widget_text', 'shortcode_unautop');
		add_filter( 'widget_text', 'do_shortcode');


	}
	

	public function run() {
		$this->loader->run();
	}

	public function get_plugin_name() {
		return $this->plugin_name;
	}

	public function get_loader() {
		return $this->loader;
	}

	
}
