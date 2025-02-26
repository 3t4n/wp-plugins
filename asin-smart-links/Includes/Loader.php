<?php
namespace AsinSmartInternationalLinks\Includes;

class Loader
{
	protected $plugin_name;
	protected $plugin_version;

	public function __construct()
	{
		$this->plugin_version = defined('ASINSMARTINTERNATIONALLINKS_VERSION') ? ASINSMARTINTERNATIONALLINKS_VERSION : '1.0.0';
		$this->plugin_name = 'asin-smart-links';
		$this->load_dependencies();

		add_action('plugins_loaded', [$this, 'load_plugin_textdomain']);
		add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
	}

	private function load_dependencies()
	{
		foreach (glob(ASINSMARTINTERNATIONALLINKS_PATH . 'Functionality/*.php') as $filename) {
			$class_name = '\\AsinSmartInternationalLinks\Functionality\\'. basename($filename, '.php');
			if (class_exists($class_name)) {
				try {
					new $class_name($this->plugin_name, $this->plugin_version);
				}
				catch (\Throwable $e) {
					pb_log($e);
					continue;
				}
			}
		}
	}

	public function load_plugin_textdomain()
	{
		load_plugin_textdomain('asin-smart-links', false, dirname(ASINSMARTINTERNATIONALLINKS_BASENAME) . '/languages/');
	}

	public function register_scripts()
	{
		wp_register_style( $this->plugin_name . '-styles', ASINSMARTINTERNATIONALLINKS_URL . 'dist/app.css', [], $this->plugin_version, 'all' );
		wp_register_script( $this->plugin_name . '-script', ASINSMARTINTERNATIONALLINKS_URL . 'dist/app.js', [], $this->plugin_version, 'all' );
	}
}
