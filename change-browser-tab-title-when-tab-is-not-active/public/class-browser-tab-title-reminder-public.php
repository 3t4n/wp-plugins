<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://plugin.nl
 * @since      1.0.0
 *
 * @package    Browser_Tab_Title_Reminder
 * @subpackage Browser_Tab_Title_Reminder/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Browser_Tab_Title_Reminder
 * @subpackage Browser_Tab_Title_Reminder/public
 * @author     Tim van Iersel <tim@plugin.nl>
 */
class Browser_Tab_Title_Reminder_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		//Grab all options
	  $options = get_option($this->plugin_name);
		if (!isset($options['bttr_delay'])){
      $delay = 3000;
    }else{
      $delay = $options['bttr_delay'];
    }
		// only display title when title isset
    if (isset($options['bttr_title']) && $options['bttr_title'] != ""){
			$params = array(
				'delay' => $delay,
				'new_title' => $options['bttr_title'],
			);
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/browser-tab-title-reminder-public.js', array( 'jquery' ), $this->version, true );
			wp_localize_script($this->plugin_name, 'browser_tab_title_params', $params);
    }


	}

}
