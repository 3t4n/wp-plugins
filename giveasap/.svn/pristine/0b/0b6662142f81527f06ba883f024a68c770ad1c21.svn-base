<?php

/**
 * Holding all the AJAX calls on the admin side
 */

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

add_action( 'wp_ajax_giveasap_activate_integration', 'giveasap_activate_integration_ajax' );
add_action( 'wp_ajax_giveasap_deactivate_integration', 'giveasap_deactivate_integration_ajax' );

/**
 * Activating the Integration through AJAX
 *
 * @return void
 */
function giveasap_activate_integration_ajax() {

	if ( ! isset( $_POST['nonce'] )
		|| ! wp_verify_nonce( \Simple_Giveaways\Helpers::unslash_and_clean( $_POST['nonce'] ), 'gasap-admin' ) ) {

		wp_send_json_error( array( 'message' => __( 'Something went wrong!', 'giveasap' ) ) );
		die();
	}

	if ( ! isset( $_POST['integration'] ) ) {
		wp_send_json_error( array( 'message' => __( 'No Integration Sent', 'giveasap' ) ) );
		die();
	}

	$integration = \Simple_Giveaways\Helpers::unslash_and_clean( $_POST['integration'] );

	$active_integrations = get_option( 'giveasap_active_integrations', array() );

	if ( ! isset( $active_integrations[ $integration ] ) ) {
		$integrations = giveasap_get_integrations();

		if ( isset( $integrations[ $integration ] ) ) {
			$active_integrations[ $integration ] = $integrations[ $integration ];

			$integration_settings = get_option( $integration, array() );
			if ( isset( $integration_settings['active'] ) && 0 === absint( $integration_settings['active'] ) ) {
				$integration_settings['active'] = '1';
			}
			update_option( $integration, $integration_settings );
			do_action( 'giveasap_' . $integration . '_integration_activated' );
			update_option( 'giveasap_active_integrations', $active_integrations );
			wp_send_json_success( array( 'message' => __( 'Activated', 'giveasap' ) ) );
			die();
		}
	} else {
		wp_send_json_success( array( 'message' => __( 'Already Activated', 'giveasap' ) ) );
		die();
	}

	wp_send_json_error( array( 'message' => __( 'Nothing Happened', 'giveasap' ) ) );
	die();
}

/**
 * Deactivating the Integration through AJAX
 *
 * @return void
 */
function giveasap_deactivate_integration_ajax() {

	if ( ! isset( $_POST['nonce'] )
		|| ! wp_verify_nonce( \Simple_Giveaways\Helpers::unslash_and_clean( $_POST['nonce'] ), 'gasap-admin' ) ) {

		wp_send_json_error( array( 'message' => __( 'Something went wrong!', 'giveasap' ) ) );
		die();
	}

	if ( ! isset( $_POST['integration'] ) ) {
		wp_send_json_error( array( 'message' => __( 'No Integration Sent', 'giveasap' ) ) );
		die();
	}

	$integration = \Simple_Giveaways\Helpers::unslash_and_clean( $_POST['integration'] );

	$active_integrations = get_option( 'giveasap_active_integrations', array() );

	if ( isset( $active_integrations[ $integration ] ) ) {
		unset( $active_integrations[ $integration ] );
		$integration_settings = get_option( $integration, array() );

		if ( isset( $integration_settings['active'] ) && 1 === absint( $integration_settings['active'] ) ) {
			$integration_settings['active'] = 0;
		}
		update_option( $integration, $integration_settings );
		do_action( 'giveasap_' . $integration . '_integration_deactivated' );
		update_option( 'giveasap_active_integrations', $active_integrations );
		wp_send_json_success( array( 'message' => __( 'Deactivated', 'giveasap' ) ) );
		die();
	} else {
		wp_send_json_error( array( 'message' => __( 'Not Activated', 'giveasap' ) ) );
		die();
	}
}

add_action( 'wp_ajax_sg_get_giveaway_form_fields', 'giveasap_get_giveaway_form_fields_ajax' );

/**
 * Get form fields for a Giveaway.
 *
 * @return void
 */
function giveasap_get_giveaway_form_fields_ajax() {
	if ( ! isset( $_GET['nonce'] )
		|| ! wp_verify_nonce( \Simple_Giveaways\Helpers::unslash_and_clean( $_GET['nonce'] ), 'gasap-admin' ) ) {

		wp_send_json_error( array( 'message' => __( 'Something went wrong!', 'giveasap' ) ) );
		die();
	}

	if ( ! isset( $_GET['giveaway'] ) ) {
		wp_send_json_error( array( 'message' => __( 'No Giveaway provided', 'giveasap' ) ) );
		die();
	}

	$giveaway = \Simple_Giveaways\Helpers::unslash_and_clean( $_GET['giveaway'] );

	$form_fields = giveasap_get_form_fields( $giveaway );

	if ( $form_fields ) {
		$html = '';
		ob_start();
		foreach ( $form_fields as $field ) {
			giveasap_render_form_field( $field );
		}
		$html = ob_get_clean();
		wp_send_json_success( $html );
		die();
	}

	wp_send_json_error( array( 'message' => __( 'Nothing Happened', 'giveasap' ) ) );
	die();
}

add_action( 'wp_ajax_sg_get_available_giveaways', 'giveasap_get_available_giveaways_ajax' );

/**
 * Get available Giveaways.
 *
 * @return void
 */
function giveasap_get_available_giveaways_ajax() {

	if ( ! current_user_can( 'edit_posts' ) ) {
		wp_send_json_error( __( 'No permission to get giveaways', 'giveasap' ) );
		wp_die();
	}

	$giveaways = giveasap_get_giveaways(
		array(
			'post_status' => array( 'publish', 'giveasap_ended', 'giveasap_winners', 'giveasap_notified' ),
		)
	);

	if ( $giveaways ) {
		wp_send_json_success( $giveaways );
	} else {
		wp_send_json_error( __( 'No Giveaways found. Please create some first', 'giveasap' ) );
	}
	wp_die();
}

add_action( 'wp_ajax_sg_get_giveaways', 'giveasap_get_giveaways_ajax' );

/**
 * Get available Giveaways.
 *
 * @return void
 */
function giveasap_get_giveaways_ajax() {

	if ( ! current_user_can( 'edit_posts' ) ) {
		wp_send_json_error( __( 'No permission to search giveaways', 'giveasap' ) );
		wp_die();
	}

	if ( ! isset( $_REQUEST['search'] ) ) {
		wp_send_json_error();
	}

	$giveaways = giveasap_get_giveaways(
		array(
			'post_status' => array( 'publish', 'giveasap_ended', 'giveasap_winners', 'giveasap_notified' ),
			's'           => isset( $_REQUEST['search'] ) ? \Simple_Giveaways\Helpers::unslash_and_clean( $_REQUEST['search'] ) : '',
		)
	);

	if ( $giveaways ) {
		wp_send_json_success( $giveaways );
	} else {
		wp_send_json_error( __( 'No Giveaways found. Please create some first', 'giveasap' ) );
	}
	wp_die();
}

add_action( 'wp_ajax_sg_import_site_users', 'giveasap_import_site_users_ajax' );

function giveasap_import_site_users_ajax() {
	check_ajax_referer( 'gasap-admin', 'nonce' );

	if ( empty( $_REQUEST['giveaway_id'] ) ) {
		wp_send_json_error( [ 'message' => __( 'Giveaway required', 'giveasap' ) ] );
		wp_die();
	}

	$giveaway_id = \Simple_Giveaways\Helpers::unslash_and_clean( $_REQUEST['giveaway_id'] );
	$giveaway    = giveasap_get_giveaway( $giveaway_id );

	if ( ! $giveaway ) {
		wp_send_json_error( [ 'message' => __( 'Giveaway required', 'giveasap' ) ] );
		wp_die();
	}

	$registered_users = giveasap_get_entries_for( $giveaway_id );
	$total_users      = count_users();

	if ( count( $registered_users ) >= absint( $total_users['total_users'] ) ) {
		wp_send_json_success([
			'done'  => true,
			'users' => '(' . count( $registered_users ) . '/' . absint( $total_users['total_users'] ) . ')',
		]);
		wp_die();
	}

	$import_page = get_post_meta( $giveaway_id, '_user_import_page', true );

	if ( ! $import_page ) {
		$import_page = 0;
	}

	$import_page = absint( $import_page ) + 1;

	$users = get_users([
		'number'  => 100,
		'paged'   => $import_page,
		'orderby' => 'ID'
	]);

	foreach ( $users as $user ) {
		if ( $user->first_name ) {
			$_POST['sg_form'] = [
				'user_name' => $user->first_name,
			];
		} else {
			unset( $_POST['sg_form'] );
		}

		$giveaway->add_subscriber( $user->user_email );
	}

	update_post_meta( $giveaway_id, '_user_import_page', $import_page );

	$registered_users = giveasap_get_entries_for( $giveaway_id );
	wp_send_json_success([
		'done'  => false,
		'users' => '(' . count( $registered_users ) . '/' . absint( $total_users['total_users'] ) . ')',
	]);
	wp_die();
}