<?php
class fastspring {
	protected $loader;
	protected $plugin_name;
	protected $version;
	public function __construct() {
		$this->plugin_name = 'fastspring';
		$this->version = '1.0.0';
		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}
	private function load_dependencies() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-fastspring-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fastspring-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-fastspring-public.php';
		$this->loader = new fastspring_Loader();
	}
	private function set_locale() {
	}
	private function define_admin_hooks() {
		$plugin_admin = new fastspring_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
	}
	private function define_public_hooks() {
		$plugin_public = new fastspring_Public( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
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