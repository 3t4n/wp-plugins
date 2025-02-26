<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class BAPSAAdminMain
{

	public function bapsa_notification()
	{

		if( is_admin() && get_option( 'bapsa_dismiss_notice' ) !== 'dismiss' ) {

			add_action( 'admin_notices', array( $this, 'bapsa_notification_init' ) );		

		}

	}

	public function bapsa_notification_init() {
	    ?>
	    <div class="notice notice-warning is-dismissible bapsa_notice-warning">
	        <p>Notice, Buddypress Activity Plus Styling plugin requires installation:</p>
	        <p>
	        	<a href="https://wordpress.org/plugins/buddypress/" target="_blank">BuddyPress</a><br>
				<a href="https://wordpress.org/plugins/buddypress-activity-plus/" target="_blank">BuddyPress Activity Plus</a>
	        </p>
	    </div>
	    <?php
	}

	// register
	public function bapsa_register()
	{

		add_action( 'admin_enqueue_scripts', array( $this, 'bapsa_admin_enqueue' ) );

	}

		public function bapsa_admin_enqueue()
		{

			wp_enqueue_script( 'bapsa_admin_script', BAPSA_PLUGIN_URL . 'includes/admin/assets/js/bapsa_admin_script.js', array( 'jquery' ), BAPSA_PLUGIN_VERSION, false );

			wp_localize_script( 'bapsa_admin_script', 'bapsa_admin_localize', array(
				'ajaxurl' 					=> admin_url( 'admin-ajax.php' ),
				'bapsa_admin_nonce' 		=> wp_create_nonce( 'bapsa_admin_nonce' )
			) );		

		}

	// ajax
	public function bapsa_dismiss_notification()
	{

		add_action( 'wp_ajax_bapsa_dismiss_notification', array( $this, 'bapsa_dismiss_notification_action' ) );

	}

		public function bapsa_dismiss_notification_action()
		{

			// Checked POST nonce is not empty
			if( empty( $_POST['nonce'] ) ) wp_die( '0' );

			// Checked or nonce match
			if( wp_verify_nonce( $_POST['nonce'], 'bapsa_admin_nonce' ) ){

				add_option( 'bapsa_dismiss_notice', 'dismiss' );

			}

			wp_die();

			

		}
	
}

/*
* Initialize
*/
$initialize_class = new BAPSAAdminMain();

$initialize_class->bapsa_notification();

$initialize_class->bapsa_register();

$initialize_class->bapsa_dismiss_notification();