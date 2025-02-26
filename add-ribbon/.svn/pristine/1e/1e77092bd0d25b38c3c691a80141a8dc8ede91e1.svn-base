<?php

class AddRibbonCssJsScripts {

	/**
	 *
	 *  Include classes essential for the plugin
	 *
	 * @return void
	 */

	public function __construct() {
		
		add_action('wp_enqueue_scripts', array($this, '_include_add_ribbon_css_js'));		
	}



	/**
	 *
	 * @access public
	 * @return void
	 */
	public function _include_add_ribbon_css_js() {
		
		wp_register_style('add-ribbon-styles', AddRibbon::get_plugin_url().'assets/css/style.css', array(), '0.0', 'all' );
		wp_enqueue_style('add-ribbon-styles');
		
	}

}



new AddRibbonCssJsScripts();
