<?php

class StoreYa_Benchmark_Admin {
	public static function init() {
		add_action( 'admin_menu', array( get_called_class(), 'register_admin_page' ) );
		add_action( 'admin_enqueue_scripts', array( get_called_class(), 'enqueue_assets' ) );
		add_filter( 'plugin_action_links_' . STOREYA_BENCHMARK_PLUGIN_BASENAME, array( get_called_class(), 'plugin_action_links' ), 10, 4 );
	}

	public static function register_admin_page() {
		add_menu_page( 
			'Benchmark', 
			'Benchmark', 
			'manage_options', 
			STOREYA_BENCHMARK_PLUGIN_DOMAIN, 
			array( get_called_class(), 'render_admin_page' ), 
			'dashicons-admin-tools', 
			66
		);
	}

	public static function render_admin_page() {
		require STOREYA_BENCHMARK_PLUGIN_DIR_PATH . 'templates/admin-page.php';
	}

	public static function enqueue_assets() {
		if ( isset( $_GET['page'] ) && $_GET['page'] === STOREYA_BENCHMARK_PLUGIN_DOMAIN ) {
			wp_enqueue_style( 'sybm-admin-styles', STOREYA_BENCHMARK_PLUGIN_DIR_URL . 'css/admin.css' );
			
			wp_enqueue_script( 'sybm-admin-scripts', STOREYA_BENCHMARK_PLUGIN_DIR_URL . 'js/admin.js' );
			wp_enqueue_script( 'sybm-admin-ajax-scripts', STOREYA_BENCHMARK_PLUGIN_DIR_URL . 'js/admin-ajax.js' );

			wp_localize_script( 'sybm-admin-ajax-scripts', 'sybmVariables', array(
				'ajaxURL' => admin_url( 'admin-ajax.php' )
			) );
		}
	}

	public static function plugin_action_links( $actions, $plugin_file, $plugin_data, $context ) {
		$custom_actions = array(
			'open_report' => '<a href="' . admin_url( 'admin.php?page=' . STOREYA_BENCHMARK_PLUGIN_DOMAIN ) . '">Open Report</a>'
		);

    return array_merge( $custom_actions, $actions );
	}
}