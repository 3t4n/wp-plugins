<?php
class Contact_Info_Scripts {
	
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'plugin_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'plugin_scripts_admin' ) );
	}
	
	public function plugin_scripts(){
		 wp_enqueue_style( 'font-awesome.min', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );
		 wp_enqueue_style( 'contact_info', plugins_url( CI_DIR_NAME . '/css/contact_info.css' )  );
	}
	
	public function plugin_scripts_admin(){
		wp_enqueue_style( 'font-awesome.min', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );
		wp_enqueue_style( 'contact_info', plugins_url( CI_DIR_NAME . '/css/contact_info.css' )  );
		wp_enqueue_script( 'ap.cookie', plugins_url( CI_DIR_NAME . '/js/ap.cookie.js' ) );
		wp_enqueue_script( 'ap-tabs', plugins_url( CI_DIR_NAME . '/js/ap-tabs.js' ) );
	}
	
	
}