<?php

namespace AGA\Admin;

use AGA\Admin\Settings;

/**
 * Class Init
 * @package AGA\Admin
 */
class Init {

	/**
	 * Construct the admin
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'hook_submenu_items' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'hook_admin_style' ) );
	}

	/**
	 * Hook the admin style
	 */
	public function hook_admin_style() {
		wp_enqueue_style( 'awesome-google-analytics-backend', plugins_url( 'assets/aga.backend.min.css', AGA_ROOT_PATH ) );
	}

	/**
	 * Hook the sub menu items
	 */
	public function hook_submenu_items() {
		add_menu_page( 'Google Analytics', 'Google Analytics', 'manage_options', 'aga_googleanalytics', array(
			$this,
			'show_page'
		), 'dashicons-chart-pie', 76.1564 );

//		$pages = array();
//		$pages['upload'] = array(
//			'label'      => __( 'Upload photo(s)', 'apg' ),
//			'capability' => 'publish_posts',
//			'action'     => 'apg_upload',
//			'callback'   => array( $this, 'show_page' ),
//		);
//		$pages['settings'] = array(
//			'label'      => __( 'Settings', 'apg' ),
//			'capability' => 'manage_options',
//			'action'     => 'apg_settings',
//			'callback'   => array( $this, 'show_page' ),
//		);
//
//		array_merge( $pages, apply_filters( 'apg_submenu_items', array() ) );
//
//		/**
//		 * Loop through the pages and add them as a submenu item
//		 */
//		foreach( $pages as $key => $item ) {
//			add_submenu_page('admin.php?post_type=aga_manage', $item['label'], $item['label'], $item['capability'], $item['action'], $item['callback'] );
//		}
	}

	/**
	 * Render the requested page
	 */
	public function show_page() {
		switch( filter_input (INPUT_GET, 'page', FILTER_SANITIZE_STRING) ){
			case 'aga_googleanalytics':
				$settings = new Settings();
				$settings->render();
				break;
		}
	}

}