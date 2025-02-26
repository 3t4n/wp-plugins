<?php
class Ajs_Instagram_Feed {
	protected $loader;
	protected $plugin_slug;
	protected $version;
	public function __construct() {
		$this->plugin_slug = 'ajs-instagram-feed';
		$this->version = '1.0';
		$this->load_dependencies();
		$this->define_admin_hooks();	
	}
	private function load_dependencies() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-ajs-instagram-feed-admin.php';
		require_once plugin_dir_path( __FILE__ ) . 'class-ajs-instagram-feed-loader.php';
		$this->loader = new Ajs_Instagram_Feed_Loader();
	}
	private function define_admin_hooks() {		$admin = new Ajs_Instagram_Feed_Admin( $this->get_version() );
		$this->loader->add_action( 'admin_enqueue_scripts', $admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_menu', $admin, 'ajs_instagram_feed_admin_actions' );
	}
	public function run() {
		$this->loader->run();
	}
	public function get_version() {
		return $this->version;
	}
}
