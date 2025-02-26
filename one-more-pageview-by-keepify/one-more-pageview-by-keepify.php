<?php
/*
	Plugin Name: One More Pageview by Keepify
	Description: Convert abandoning visitors with targeted offers before they leave. Customize your offers.
	Author: Keepify.com & Nick Young
	Version: 0.1
	Author URI: 
 */


if(!class_exists('Wait')) {
	class Wait {
		private $html = '';
		private $code = '';
		private $before_code = '<div class="wait-box hidden"></div><div class="wait-box-inner hidden"><p class="close-wait-box"></p>';
		private $after_code = '</div>';
		
		function __construct() {
			// Add initial loading code here
			
			// Add scripts
			add_action('wp_head', array($this, add_scripts));
			
			// Add default styles
			add_action('wp_head', array($this, add_styles));
			
			// Add Wait Box
			add_action('wp_footer', array($this, create_popup_code));
			
			// Add Settings Page
			add_action('admin_menu', array($this, add_admin_page));
			add_action('admin_init', array($this, wait_settings_options));
		}
		
		function add_admin_page() {
			//add_options_page('Wait!', 'Wait!', 'manage_options', 'wait_plugin', array($this, wait_plugin_admin_page));
			add_menu_page('Wait! Plugin Settings', 'One More Pageview', 'manage_options', __FILE__, array($this, wait_settings_page));
		}
		
		function wait_settings_options() {
			register_setting('wait_settings_options', 'wait_settings_options');
			register_setting('wait_settings_options', 'wait_html');
		}
		
		function wait_settings_page() {
			include(dirname(__FILE__) . '/admin/options.php');
		}
		
		function add_scripts() {
			// Add jQuery
			wp_enqueue_script('jquery');
			
			// Add our custom script
			wp_enqueue_script('wait_main', plugin_dir_url(__FILE__) . 'js/main.js');
		}
		
		function add_styles() {
			// Add our default styles
			wp_register_style( 'wait-css', plugin_dir_url(__FILE__) . 'css/main.css');
			wp_enqueue_style( 'wait-css' );
		}
		
		function create_popup_code($content) {
			$this->code = get_option('wait_html');
			
			if($this->code != '') {
				$this->html .= $this->before_code . $this->code . $this->after_code;
			} else {
				// If user has not entered anything into custom code then fall to default
				$this->code = $this->before_code . file_get_contents(dirname(__FILE__).'/default-html.php') . $this->after_code;
				$this->html = $this->before_code . $this->code . $this->after_code;
			}
			echo $this->html;
		}	
	}
}

$wait = new Wait();

?>