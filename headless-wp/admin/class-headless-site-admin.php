<?php

require 'partials/class-headless-site-admin-menu.php';

class Mo_Headless_Site_Admin {

	private $plugin_name;
	private $version;

	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	public function enqueue_styles() {		
		wp_enqueue_style('headless-site-phone-css', plugin_dir_url( __FILE__ ) . 'css/headless-phone.css');
	}

	public function enqueue_scripts() {
		wp_enqueue_script('headless-site-phone-js', plugin_dir_url( __FILE__ ) . 'js/headless-site-phone.js');
		wp_enqueue_script('headless-site-popper-min', plugin_dir_url( __FILE__ ) . 'js/popper.min.js');
	}

	public function admin_menu() {
		$page = add_menu_page( 'MO Headless Settings ' . __( 'Configure Headless', 'mo_headless_settings' ), 'Headless WP', 'administrator', 'mo_headless_settings', array( $this, 'menu_options' ) ,plugin_dir_url(__FILE__) . 'images/miniorange.png');
	}
		
	function menu_options () {
		update_option("mo_headless_host_name", "https://login.xecurify.com");		
		
		if(isset($_GET['tab']) && sanitize_text_field($_GET['tab']) == 'customapi' || isset($_GET['action'])) {
			wp_enqueue_style('headless-site-bootstrap-min', plugin_dir_url( __FILE__ ) . 'css/bootstrap-min.css');
			wp_enqueue_style('headless-site-bootstrap-multiselect', plugin_dir_url( __FILE__ ) . 'css/bootstrap-multiselect.css');
			wp_enqueue_style('headless-site-bootstrap', plugin_dir_url( __FILE__ ) . 'css/bootstrap.css');

			wp_enqueue_script('headless-site-bootstrap-min', plugin_dir_url( __FILE__ ) . 'js/bootstrap-min.js');
			wp_enqueue_script('headless-site-bootstrap-multiselect', plugin_dir_url( __FILE__ ) . 'js/bootstrap-multiselect.js');
			wp_enqueue_script('headless-site-bootstrap', plugin_dir_url( __FILE__ ) . 'js/bootstrap.js');
		}
		
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/headless-site-admin.css', array(), $this->version, 'all' );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/headless-site-admin.js', array( 'jquery' ), $this->version, false );

		mo_headless_site_main_menu();
	}
}