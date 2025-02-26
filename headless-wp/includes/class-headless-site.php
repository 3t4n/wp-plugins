<?php

class Mo_Headless_Site {

	protected $loader;
	protected $plugin_name;
	protected $version;

	public function __construct() {
		if ( defined( 'HEADLESS_SITE_VERSION' ) ) {
			$this->version = HEADLESS_SITE_VERSION;
		} else {
			$this->version = '1.0.2';
		}
		$this->plugin_name = 'headless-site';

		$this->load_dependencies();
		$this->define_admin_hooks();
	}

	private function load_dependencies() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-headless-site-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-headless-site-admin.php';

		$this->loader = new Mo_Headless_Site_Loader();
	}

	private function define_admin_hooks() {
		$plugin_admin = new Mo_Headless_Site_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'admin_menu' );
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

	public function get_version() {
		return $this->version;
	}
}