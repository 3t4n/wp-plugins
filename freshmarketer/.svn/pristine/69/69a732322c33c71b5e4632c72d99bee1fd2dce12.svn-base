<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; 

/**
 * Add Freshmarketer tab to the admin menu.
 */
function freshmarketer_admin_menu() {
	add_menu_page( __( 'Freshmarketer', 'freshmarketer' ), __( 'Freshmarketer', 'freshmarketer' ), 'manage_options', 'freshmarketer-config', 'freshmarketer_conf', plugin_dir_url( __FILE__ ) . '../public/images/freshmarketer-icon.png' );
}
add_action( 'admin_menu', 'freshmarketer_admin_menu' );


/**
 * Add plugin action links for Freshmarketer.
 * @param array $links
 * @param string $file
 * @return array
 */
function freshmarketer_plugin_action_links( $links, $file ) {
	if ( $file == 'freshmarketer/freshmarketer.php' ) {
		$links[] = '<a href="admin.php?page=freshmarketer-config">' . esc_html__( 'Settings', 'freshmarketer' ) . '</a>';
	}
	return $links;
}
add_filter( 'plugin_action_links', 'freshmarketer_plugin_action_links', 10, 2 );


/**
 * Update the Freshmarketer option params.
 */
function freshmarketer_conf() {
	
	if ( ! current_user_can( 'manage_options' ) ) {
			die;
        }
	if ( isset($_POST['nonce']) && isset( $_POST['token']) &&
			wp_verify_nonce($_POST['nonce'], 'wporg_authtoken_verify') ) {

		// Sanitizing the input params
		$token = sanitize_text_field( $_POST['token'] );
		$auth_token = sanitize_text_field( $_POST['auth_token'] );
		$org_id= sanitize_text_field( $_POST['org_id'] );
		$project_id= sanitize_text_field( $_POST['project_id'] );
		$user_id= sanitize_text_field( $_POST['user_id'] );
		$project_code = sanitize_text_field( $_POST['project_code'] );

		// Processing org's script	
		if ( empty( $project_code) ) {
			delete_option( 'freshmarketer_project_code' );
		} else {
			update_option( 'freshmarketer_project_code', $project_code);
		}
		// Processing org's token 
		if ( empty( $token ) ) {
			delete_option( 'freshmarketer_token' );
		} else {
			update_option( 'freshmarketer_token', $token );
		}
		// Processing org's autsh token 
		if ( empty( $auth_token ) ) {
			delete_option( 'freshmarketer_auth_token' );
		} else {
			update_option( 'freshmarketer_auth_token', $auth_token );
		}
		// Processing org id
		if ( empty( $org_id ) ) {
			delete_option( 'freshmarketer_org_id' );
		} else {
			update_option( 'freshmarketer_org_id', $org_id );
		}
		// Processing project id
		if ( empty( $project_id ) ) {
			delete_option( 'freshmarketer_project_id' );
		} else {
			update_option( 'freshmarketer_project_id', $project_id );
		}

		// Processing user id
		if ( empty( $user_id ) ) {
			delete_option( 'freshmarketer_user' );
		} else {
			update_option( 'freshmarketer_user_id', $user_id );
		}

	}
	//Navigating to configure page
	include( dirname( __FILE__ ) . '/../config/config.php' );
}

// Calling adminutils.php to get data from Freshmarketer App
if(isset($_GET['token'],$_GET['orgid'])){
	$site_url = get_site_url();
	include 'adminutils.php'; 
	echo getOrgDetails($_GET['token'],$_GET['orgid'], $site_url);
}

?>
