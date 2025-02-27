<?php

class Css
{
	public function __construct()
	{
		$this->init();
	}

	public function init()
	{
		add_action('admin_enqueue_scripts',  array($this, 'enqueueStyles'));
	}

	public function enqueueStyles($hook)
	{
		if ($hook != "toplevel_page_yceEditor") {
			return false;
		}

		wp_register_style('yce_bootstrap_css', YCE_EDITOR_CSS_URL.'bootstrap.css');
		wp_enqueue_style('yce_bootstrap_css');
		wp_register_style('yce_admin_css', YCE_EDITOR_CSS_URL.'admin.css');
		wp_enqueue_style('yce_admin_css');

		return true;
	}
}

new Css();