<?php
/**
 * PasswordLess auth Email
 *
 * @package 1-click-passwordless-login
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Xclickpw_Email
 *
 * Handles the sending of passwordless login emails with magic links.
 *
 * @package 1-click-passwordless-login
 */
class Xclickpw_Email {

	/**
	 * Sends a magic login link to the user's email.
	 *
	 * Generates a secure authentication link and sends an HTML email
	 * with login instructions.
	 *
	 * @param WP_User $user The user object.
	 * @return void
	 */
	public static function send_magic_link( $user ): void {
		$magic_link = Xclickpw_Handler::generate_magic_link( $user );
		$site_name  = get_bloginfo( 'name' );

		// Get expiration time from settings.
		$minutes = xclickpw_core()->settings->options['password_less_expiry'];

		// Translatable email subject.
		// Translators: %s is the site name.
		$subject = sprintf( __( '🔑 Your Secure Login Link - %s', '1-click-passwordless-login' ), $site_name );

		// Translators: %s is the site name.
		$header = sprintf( __( 'Welcome back to %s!', '1-click-passwordless-login' ), $site_name );

		$instructions = __( 'Click the button below to securely log in:', '1-click-passwordless-login' );
		$button_text  = __( 'Login Now', '1-click-passwordless-login' );

		// Translators: %s is the expiration time in minutes.
		$expiration_text = sprintf( __( 'This link will expire in <strong>%s minutes</strong>.', '1-click-passwordless-login' ), $minutes );

		$footer_text = __( 'If you didn\'t request this email, you can safely ignore it.', '1-click-passwordless-login' );

		$login_button = "<a href='{$magic_link}' style='background:#0073aa;color:#ffffff;padding:12px 20px;font-size:16px;text-decoration:none;border-radius:5px;display:inline-block;margin-top:10px;'>{$button_text}</a>";

		$message = "
        <html>
        <head>
            <title>{$subject}</title>
        </head>
        <body style='background:#f4f4f4;margin:0;padding:20px;font-family:Arial, sans-serif;'>
            <div style='max-width:600px;margin:0 auto;background:#ffffff;padding:20px;border-radius:8px;box-shadow:0px 0px 10px rgba(0,0,0,0.1);'>
                <h2 style='color:#333;text-align:center;'>{$header}</h2>
                <p style='font-size:16px;color:#555;text-align:center;'>{$instructions}</p>
                <div style='text-align:center;'>{$login_button}</div>
                <p style='font-size:14px;color:#666;text-align:center;'>{$expiration_text}</p>
                <hr style='border:0;border-top:1px solid #ddd;margin:20px 0;'>
                <p style='font-size:12px;color:#666;text-align:center;'>{$footer_text}</p>
            </div>
        </body>
        </html>";

		$headers = array(
			'Content-Type: text/html; charset=UTF-8',
			'From: ' . get_bloginfo( 'name' ) . ' <no-reply@' . wp_parse_url( get_home_url(), PHP_URL_HOST ) . '>',
		);

		wp_mail( $user->user_email, $subject, $message, $headers );
	}
}
