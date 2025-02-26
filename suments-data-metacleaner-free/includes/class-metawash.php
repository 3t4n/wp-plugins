<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.suments.com
 * @since      1.0.0
 *
 * @package           Metawash
 * @subpackage Metawash/includes
 */

class Metawash {

	
	protected $loader;

	protected $Metawash;

	protected $version;

	
	public function __construct() {
		if ( defined( 'METAWASH_VERSION' ) ) {
			$this->version = METAWASH_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->Metawash = '';


		if (!function_exists('wp_handle_upload'))
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
		
		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	
	private function load_dependencies() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-metawash-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-metawash-i18n.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-metawash-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-metawash-public.php';
		$this->loader = new METAWASH_Loader();
	}

	private function set_locale() {
		$plugin_i18n = new METAWASH_i18n();
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}

	private function define_admin_hooks() {

		$plugin_admin = new METAWASH_Admin( $this->get_Directory_Files_Converter(), $this->get_version() );

		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action('admin_menu', $plugin_admin, 'dirFileCon_options_page');
		

		$this->loader->add_action("wp_ajax_directory_files_connvert", $plugin_admin, "directory_files_connvert");
        $this->loader->add_action("wp_ajax_nopriv_directory_files_connvert", $plugin_admin, "directory_files_connvert");

		$this->loader->add_action("wp_ajax_config_update_automatic", $plugin_admin, "config_update_automatic");
        $this->loader->add_action("wp_ajax_nopriv_config_update_automatic", $plugin_admin, "config_update_automatic");


		$this->loader->add_action("wp_ajax_mc_save_token", $plugin_admin, "mc_save_token");
        $this->loader->add_action("wp_ajax_nopriv_mc_save_token", $plugin_admin, "mc_save_token");

		$this->loader->add_action("wp_ajax_mc_contact_mail", $plugin_admin, "mc_contact_mail");
        $this->loader->add_action("wp_ajax_nopriv_mc_contact_mail", $plugin_admin, "mc_contact_mail");

		$this->loader->add_action("wp_ajax_mc_delete_token", $plugin_admin, "mc_delete_token");
        $this->loader->add_action("wp_ajax_nopriv_mc_delete_token", $plugin_admin, "mc_delete_token");

		$this->loader->add_action('wp_handle_upload',  $plugin_admin, "mc_catch_uploaded");
		
	}


	private function define_public_hooks() {

		$plugin_public = new METAWASH_Public( $this->get_Directory_Files_Converter(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
	}

	public function run() {
		$this->loader->run();
	}

	public function get_Directory_Files_Converter() {
		return $this->Metawash;
	}

	public function get_loader() {
		return $this->loader;
	}

	public function get_version() {
		return $this->version;
	}

}
