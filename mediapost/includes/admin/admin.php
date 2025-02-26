<?php
defined( 'ABSPATH' ) or exit;

function mpwpFormsSettingsPage(){
	require_once( MPWP_DIR . 'includes/admin/views/settings.php' );
}

add_action( 'admin_init', 'mpwpFormsUpdateSettingsCallback' );
function mpwpFormsUpdateSettingsCallback(){
	if ( !empty($_POST) && isset($_POST['mpwp_update_settings']) ){
		
		check_admin_referer( 'update_settings', '_mpwp_nonce' );
		
		$settings = stripslashes_deep( $_POST['mpwp_settings'] );
		
		if ( mpwpFormsUpdateSettings( $settings ) ){
			if ( mpwpFormsIsConected() ){
				add_settings_error(
					'mpwp_settings',
					'form-saved',
					__( 'Alterações salvas. Estamos conectados à sua conta @MediaPost.', 'mpwp_forms' ),
					'updated'
				);
			} else {
				add_settings_error(
					'mpwp_settings',
					'form-saved',
					__( 'Alterações salvas, mas não foi possivel conectar à sua conta @MediaPost.', 'mpwp_forms' ),
					'error'
				);
			}
		} else {
			add_settings_error(
				'mpwp_settings',
				'form-not-saved',
				__( 'Suas alterações não puderam ser salvas. Por favor, tente novamente.', 'mpwp_forms' ),
				'error'
			);
		}
	}
}
?>