<?php

class plugin_functions extends Advanced_cf7_database{
		
	private $table_name;
	
	public function __construct(){
		parent::__construct();
		global $wpdb;
		$this->table_name = $wpdb->prefix.'advanced_cf7_data';
	}
	/*------ Listing Contact Forms Page --------*/
	public function create_plugin_settings_page(){
		$page_title = 'Contact Forms';
		$menu_title = 'Contact Forms';
		$capability = 'manage_options';
		$slug = self::$plugin_slug;
		$callback = array($this, 'custom_details_page');
		$icon = 'dashicons-admin-plugins';
		$position = 100;
		add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );
	}
}
