<?php

class Social_Parts {

	protected $loader;

	protected $plugin_name;

	protected $version;

	public function __construct() {
		$this->version     = defined( 'SOCIAL_PARTS_VERSION' )
			? SOCIAL_PARTS_VERSION : '1.0.0';
		$this->plugin_name = defined( 'SOCIAL_PARTS_PLUGIN_NAME' )
			? SOCIAL_PARTS_PLUGIN_NAME : 'Social Parts';
		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	private function load_dependencies() {
        $loadPath = plugin_dir_path( __DIR__ );
		require_once $loadPath . 'includes/class-social-parts-loader.php';
		require_once $loadPath . 'admin/class-social-parts-admin.php';
		require_once $loadPath . 'public/class-social-parts-public.php';
		$this->loader = new Social_Parts_Loader();
	}

	private function define_admin_hooks() {
		$plugin_admin = new Social_Parts_Admin( $this->get_plugin_name(),
			$this->get_version() );
		$this->loader->add_action( 'admin_menu', $plugin_admin,
			'register_menu_page' );
		$this->loader->add_action( 'wp_ajax_social_parts_register',
			$plugin_admin, 'insert_plugin_data' );
	}

	private function define_public_hooks() {
		$plugin_public = new Social_Parts_Public( $this->get_plugin_name(),
			$this->get_version() );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public,
			'insert_script_data' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public,
			'enqueue_scripts' );
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

	public static function get_domain_id() {
		global $wpdb;
		$table_name = $wpdb->prefix . SOCIAL_PARTS_TABLE_NAME;
		$options
		            = $wpdb->get_row( "SELECT `id`, `time`, `domain_id` FROM $table_name" );
		if ( $options ) {
			return (int) $options->domain_id;
		}

		return 0;
	}

}