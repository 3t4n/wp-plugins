<?php
/**
 * Mailer plugin file
 *
 * @since      1.0
 * @package    Best WP SMTP Email
 * @author     TinyPixi
 */

add_action( 'phpmailer_init', 'bwpse_send_smtp_email' );

function bwpse_send_smtp_email( $phpmailer ) {

	if ( ! empty( $_POST ) && check_admin_referer( 'smtp_credentials_update_action' ) && is_admin() ) {

		$host       		= sanitize_text_field( substr( get_option( 'bwpse_host' ), -64 ) );
		$port       		= intval( get_option( 'bwpse_port' ) );
		$auth       		= intval( get_option( 'bwpse_auth' ) );
		$username   		= sanitize_text_field( substr( get_option( 'bwpse_username' ), -64 ) );
		$password   		= sanitize_text_field( substr( get_option( 'bwpse_password' ), -128 ) );
		$encrypt 			= sanitize_text_field( substr( get_option( 'bwpse_encrypt' ), -4 ) );
		$override_defaults  = intval( get_option( 'bwpse_override_defaults' ) );
		$from_email			= sanitize_email( substr( get_option( 'bwpse_from_email' ), -64 ) );
		$from_name			= sanitize_text_field( substr( get_option( 'bwpse_from_name' ), -64 ) );
		
		if (current_user_can( 'manage_options')) {

			$phpmailer->Host = esc_url( $host );
			$phpmailer->Port = esc_html( $port );

			if ( $auth == 1 ) {

				$phpmailer->SMTPAuth = true;
				$phpmailer->Username = esc_html( $username );
				$phpmailer->Password = esc_html( $password );

			} else {

				$phpmailer->SMTPAuth = false;

			}

			if ( $encrypt == 'ssl' ) {

				$phpmailer->SMTPSecure = 'ssl';

			} elseif ( $encrypt == 'tls' ) {

				$phpmailer->SMTPSecure = 'tls';

			} else {

				$phpmailer->SMTPSecure = '';

			}

			if ( $override_defaults == 1 ) {

				if ( $from_email != '' ) {

					$phpmailer->From = is_email( $from_email );

				}

				if ( $from_name != '' ) {

					$phpmailer->FromName = esc_html( $from_name );

				}

			}
			
			$phpmailer->isSMTP();

		}

	}

}
