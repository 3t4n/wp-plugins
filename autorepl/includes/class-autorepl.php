<?php

class Autorepl
{

	protected $loader;
	protected $plugin_name;
	protected $version;

	public function __construct()
	{
		if (defined('AUTOREPL_VERSION')) {
			$this->version = AUTOREPL_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'autorepl';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	private function load_dependencies()
	{

		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-autorepl-loader.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-autorepl-i18n.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-autorepl-admin.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-autorepl-public.php';

		$this->loader = new Autorepl_Loader();
	}

	private function set_locale()
	{
		$plugin_i18n = new Autorepl_i18n();
		$this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
	}

	private function define_admin_hooks()
	{
		$plugin_admin = new Autorepl_Admin($this->get_version());
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
		$this->loader->add_action('admin_menu', $plugin_admin, 'my_admin_menu');
		$this->loader->add_action('admin_init', $plugin_admin, 'register_autorepl_settings');
	}

	private function define_public_hooks()
	{
		$plugin_public = new Autorepl_Public($this->get_plugin_name(), $this->get_version());
		$this->loader->add_action('wp_head', $plugin_public, 'add_head_code');
		$this->loader->add_shortcode('autorepl', $plugin_public, 'add_autorepl_container');
	}

	public function run()
	{
		$this->loader->run();
	}

	public function get_plugin_name()
	{
		return $this->plugin_name;
	}

	public function get_loader()
	{
		return $this->loader;
	}

	public function get_version()
	{
		return $this->version;
	}
}
