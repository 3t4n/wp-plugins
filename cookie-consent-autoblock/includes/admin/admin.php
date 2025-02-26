<?php
/**
 * WP-SpruceJoy Admin Functions
 *
 * Functions to manage administration.
 * 
 * This file is part of the WP-SpruceJoy plugin by SpruceJoy
 * You can find out more about this plugin at https://sprucejoy.com
 * Copyright (c) 2020-2021  SpruceJoy
 * WP-SpruceJoy(tm) is a trademark of sprucejoy.com
 *
 * @package WP-SpruceJoy
 * @author SpruceJoy
 * @copyright 2020-2021
 *
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

/**
 * Primary admin function.
 *
 *
 * @global object $wpsj The WP_Sprucejoy object.
 */
function wpsprucejoy_admin() {

	$did_update = ( isset( $_POST['wpsprucejoy_admin_a'] ) ) ? wpsprucejoy_admin_action( sanitize_text_field( $_POST['wpsprucejoy_admin_a'] ) ) : false;

	global $wpsj;
	?>

	<div class="wrap">
		<?php 
		$tab = sanitize_text_field( wpsprucejoy_get( 'tab', 'options', 'get' ) );

		// Render the tab being displayed.
		$wpsj->admin->do_tabs( $tab );

		do_action( 'wpsprucejoy_admin_do_tab', $tab );
		?>
	</div><!-- .wrap --><?php

	return;
}


/**
 * Handles the various update actions for the default tabs.
 */
function wpsprucejoy_admin_action( $action ) {

	$did_update = ''; // makes sure $did_update is defined
	switch ( $action ) {

	case 'update_settings':
	case 'update_cpts':
		$did_update = WP_Sprucejoy_Admin_Tab_Options::update( $action );
		break;
	}

	return $did_update;
}


// End of File.