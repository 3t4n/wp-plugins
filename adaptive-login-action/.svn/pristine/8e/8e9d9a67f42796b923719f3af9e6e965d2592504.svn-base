<?php
/*
 * WPGear.
 * Adaptive Login Action
 * admin.php
 */

	/* Create plugin SubMenu
	----------------------------------------------------------------- */		
	add_action('admin_menu', 'AdaptiveLoginAction_Action_admin_menu');	
	function AdaptiveLoginAction_Action_admin_menu() {
		add_options_page(
			__( 'Adaptive Login Action. Options', 'adaptive-login-action' ),
			__( 'Adaptive Login Action', 'adaptive-login-action' ),
			'edit_dashboard',
			'adaptive-login-action/includes/admin/options.php',
			''
		);
	}	
	
	/* Admin Console - Styles.
	----------------------------------------------------------------- */	
	add_action ('admin_enqueue_scripts', 'AdaptiveLoginAction_Action_admin_enqueue_scripts' );
	function AdaptiveLoginAction_Action_admin_enqueue_scripts ($hook) {
		$screen = get_current_screen();
		$screen_base = $screen -> base;	

		if ($screen_base == 'adaptive-login-action/includes/admin/options') {
			global $AdaptiveLoginAction_plugin_url;			
		
			wp_enqueue_style ('adaptive-login-action_admin-style', $AdaptiveLoginAction_plugin_url .'includes/admin/admin-style.css'); // phpcs:ignore 
		}
	}