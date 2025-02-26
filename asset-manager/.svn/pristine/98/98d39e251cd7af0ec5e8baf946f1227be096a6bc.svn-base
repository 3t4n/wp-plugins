<?php

	/**
	 * Bind assets manager meta box to post edit screen
	 */
	function paam_add_assets_manager() {
		//wp_enqueue_style('paam-admin', PAAM_PLUGINURL . '/css/paam-admin.css');
		wp_enqueue_script('swfupload');
		add_meta_box( 'paam_assetsmanager', __('Assets manager <img id="paam-loading" style="display:none;" src="' . PAAM_PLUGINURL . '/images/loading.gif" alt="Loading..." />'), 'paam_display_metabox', 'post', 'normal' );
		add_meta_box( 'paam_assetsmanager', __('Assets manager <img id="paam-loading" style="display:none;" src="' . PAAM_PLUGINURL . '/images/loading.gif" alt="Loading..." />'), 'paam_display_metabox', 'page', 'normal' );
	}
	
	
	/**
	 * Display main administrative interface for managing brands and products
	 */
	function paam_display_metabox() {
		include(PAAM_PLUGINDIR . '/views/assets-metabox.php');
	}
	
	/**
	 * Add path to plugin
	 */
	function paam_add_js_globals() {
		echo '<script type="text/javascript">
			var PAAM_WP_URL = "' . get_bloginfo('wpurl') . '";
			var PAAM_PLUGIN_URL = "' . get_bloginfo('wpurl') . '/wp-content/plugins/asset-manager";</script>';
	}
		
	add_action('admin_menu', 'paam_add_assets_manager');
	add_action('admin_head', 'paam_add_js_globals');
	
?>