<?php

if (class_exists('envo_business_kingcomposer_SettingsPage'))
return;

add_action( 'admin_notices', 'ebdi_kc_admin_notice' );

function ebdi_kc_admin_notice() {
	global $current_user;
	$user_id = $current_user->ID;
	/* Check that the user hasn't already clicked to ignore the message */
	if ( !get_user_meta( $user_id, 'ebdi_kc_ignore_notice' ) ) {
		echo '<div class="updated notice-info point-notice" style="position:relative;"><p>';
      printf( __( 'Thank you for activating Demo Importer for KingComposer plugin. To import our demo layouts, visit the %1$s %2$s', 'ebdi-kc' ), '<a class="button button-secondary" href="' . admin_url( 'themes.php?page=et-import' ) . '">'. esc_html__( 'Demo Import Page', 'ebdi-kc' ) . '</a>', '<a href="?ebdi_kc_notice_ignore=0" class="notice-dismiss dashicons dashicons-dismiss dashicons-dismiss-icon"></a>' );
    echo "</p></div>";
	}
}

add_action( 'admin_init', 'ebdi_kc_notice_ignore' );

function ebdi_kc_notice_ignore() {
	global $current_user;
	$user_id = $current_user->ID;
	/* If user clicks to ignore the notice, add that to their user meta */
	if ( isset( $_GET[ 'ebdi_kc_notice_ignore' ] ) && '0' == $_GET[ 'ebdi_kc_notice_ignore' ] ) {
		add_user_meta( $user_id, 'ebdi_kc_ignore_notice', 'true', true );
	}
}




