<?php

namespace AsinSmartInternationalLinks\Functionality;

use AsinSmartInternationalLinks\Includes\BladeLoader;

class Shortcodes
{

	protected $plugin_name;
	protected $plugin_version;

	private $blade;

	public function __construct($plugin_name, $plugin_version)
	{
		$this->plugin_name = $plugin_name;
		$this->plugin_version = $plugin_version;
		$this->blade = BladeLoader::getInstance();

		add_action('init', [$this, 'add_shortcodes']);
	}

	public function add_shortcodes()
	{
		add_shortcode( 'asin-smart-links', [$this, 'display_asin_form'] );
	}

	public function display_asin_form($atts, $content = "")
	{
		wp_enqueue_style($this->plugin_name . '-styles');
		wp_enqueue_script($this->plugin_name . '-script');
		return $this->blade->template('asin-form');
	}
}
