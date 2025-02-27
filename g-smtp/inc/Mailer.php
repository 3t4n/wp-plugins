<?php

namespace G_Smtp;

use Exception;
use G_Smtp\Traits\Singleton;
use PHPMailer\PHPMailer\SMTP;
use WP_Error;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Class Mailer
 */
class Mailer {

	use Singleton;

	/**
	 * Init function
	 *
	 * @return void
	 */
	public function init() {
		if ( static::is_setup() ) {
			if ( static::is_smtp_from_address_set() ) {
				add_filter( 'wp_mail_from', [ $this, 'set_from_email' ], PHP_INT_MAX );
			}

			if ( static::is_smtp_from_name_set() ) {
				add_filter( 'wp_mail_from_name', [ $this, 'set_from_name' ], PHP_INT_MAX );
			}

			add_action( 'phpmailer_init', [ $this, 'setup_smtp_connection' ] );
		}
	}

	/**
	 * Set from name
	 *
	 * @param string $from_name
	 * @return string
	 */
	public function set_from_name( $from_name ) {
		if ( $from_name === 'WordPress' || static::should_force_smtp_from() ) {
			$from_name = static::get_smtp_from_name();
		}

		return $from_name;
	}

	/**
	 * Set from e-mail
	 *
	 * @param string $from_email
	 * @return string
	 */
	public function set_from_email( $from_email ) {
		if ( $this->get_default_from_email() === $from_email || static::should_force_smtp_from() ) {
			$from_email = static::get_smtp_from_address();
		}

		return $from_email;
	}

	/**
	 * Get default from e-mail
	 *
	 * @return string
	 */
	protected function get_default_from_email() {
		// Get the site domain and get rid of www.
		$site_name = wp_parse_url( network_home_url(), PHP_URL_HOST );
		if ( substr( $site_name, 0, 4 ) === 'www.' ) {
			$site_name = substr( $site_name, 4 );
		}

		return 'wordpress@' . $site_name;
	}

	/**
	 * Setup SMTP connection
	 *
	 * @param \PHPMailer $phpmailer
	 * @return void
	 */
	public function setup_smtp_connection( $phpmailer ) {
		// phpcs:ignore
		$phpmailer->Mailer = 'smtp';

		$encryption = in_array( static::get_smtp_encryption(), [ 'tls', 'ssl' ], true ) ? static::get_smtp_encryption() : '';

		// phpcs:disable
		$phpmailer->SMTPSecure = $encryption;
		$phpmailer->SMTPAutoTLS = false;
		$phpmailer->Host = static::get_smtp_host();
		$phpmailer->Port = static::get_smtp_port();
		// phpcs:enable

		$user = static::get_smtp_user();
		$password = static::get_smtp_password();

		if ( ! empty( $user ) && ! empty( $password ) ) {
			// phpcs:disable
			$phpmailer->SMTPAuth = true;
			$phpmailer->Username = $user;
			$phpmailer->Password = $password;
			// phpcs:enable
		} else {
			// phpcs:ignore
			$phpmailer->SMTPAuth = false;
		}

		$phpmailer = apply_filters( 'g_smtp_phpmailer_settings', $phpmailer );
	}

	/**
	 * Whether or not settings for the mailer has been setup
	 *
	 * @return bool
	 */
	public static function is_setup() {
		if ( ! defined( 'G_SMTP_ENABLED' ) || ! \G_SMTP_ENABLED ) {
			return false;
		}

		$required_constants = [
			'G_SMTP_HOST',
			'G_SMTP_PORT',
		];

		foreach ( $required_constants as $const ) {
			if ( ! defined( $const ) ) {
				return false;
			}
		}

		return true;
	}

	/**
	 * Get SMTP host
	 *
	 * @return string|bool
	 */
	public static function get_smtp_host() {
		if ( ! defined( 'G_SMTP_HOST' ) ) {
			return false;
		}

		return \G_SMTP_HOST;
	}

	/**
	 * Get SMTP port
	 *
	 * @return string|bool
	 */
	public static function get_smtp_port() {
		if ( ! defined( 'G_SMTP_PORT' ) ) {
			return false;
		}

		return \G_SMTP_PORT;
	}

	/**
	 * Get SMTP encryption
	 *
	 * @return string|bool
	 */
	public static function get_smtp_encryption() {
		if ( ! defined( 'G_SMTP_ENCRYPTION' ) ) {
			return false;
		}

		return \G_SMTP_ENCRYPTION;
	}

	/**
	 * Get SMTP user
	 *
	 * @return string|bool
	 */
	public static function get_smtp_user() {
		if ( ! defined( 'G_SMTP_USER' ) ) {
			return false;
		}

		return \G_SMTP_USER;
	}

	/**
	 * Get SMTP password
	 *
	 * @return string|bool
	 */
	protected static function get_smtp_password() {
		if ( ! defined( 'G_SMTP_PASSWORD' ) ) {
			return false;
		}

		return \G_SMTP_PASSWORD;
	}

	/**
	 * Get SMTP from name
	 *
	 * @return string|bool
	 */
	public static function get_smtp_from_name() {
		return defined( 'G_SMTP_FROM_NAME' ) ? \G_SMTP_FROM_NAME : false;
	}

	/**
	 * Get SMTP from address
	 *
	 * @return string|bool
	 */
	public static function get_smtp_from_address() {
		return defined( 'G_SMTP_FROM_ADDRESS' ) ? \G_SMTP_FROM_ADDRESS : false;
	}

	/**
	 * Whether or not from name is set
	 *
	 * @return bool
	 */
	public static function is_smtp_from_name_set() {
		return defined( 'G_SMTP_FROM_NAME' ) && ! empty( \G_SMTP_FROM_NAME );
	}

	/**
	 * Whether or not from address is set
	 *
	 * @return bool
	 */
	public static function is_smtp_from_address_set() {
		return defined( 'G_SMTP_FROM_ADDRESS' ) && ! empty( \G_SMTP_FROM_ADDRESS );
	}

	/**
	 * Whether or not to force from
	 *
	 * @return bool
	 */
	public static function should_force_smtp_from() {
		return defined( 'G_SMTP_FORCE_FROM' ) && \G_SMTP_FORCE_FROM;
	}

	/**
	 * Test connection
	 *
	 * @return bool|WP_Error
	 */
	public static function test_connection() {
		if ( ! static::is_setup() ) {
			return new WP_Error( 'smtp_not_setup', esc_html__( 'SMTP settings are not setup.', 'g-smtp' ) );
		}

		if ( ! class_exists( 'PHPMailer\PHPMailer\SMTP' ) ) {
			// Make sure PHP Mailer classes are loaded
			require_once ABSPATH . WPINC . '/PHPMailer/PHPMailer.php';
			require_once ABSPATH . WPINC . '/PHPMailer/SMTP.php';
			require_once ABSPATH . WPINC . '/PHPMailer/Exception.php';
		}

		$smtp = new SMTP();

		try {
			if ( ! $smtp->connect( static::get_smtp_host(), static::get_smtp_port(), 5 ) ) {
				return new WP_Error( 'smtp_connection_failed', esc_html__( 'Connection failed. Maybe you entered the wrong host or port?', 'g-smtp' ) );
			}

			if ( ! $smtp->hello( static::get_smtp_host() ) ) {
				return new WP_Error( 'smtp_helo_failed', esc_html__( 'Connection failed, is this really a SMTP server?', 'g-smtp' ) );
			}

			if ( static::get_smtp_encryption() === 'tls' ) {
				if ( ! $smtp->startTLS() ) {
					return new WP_Error( 'smtp_tls_failed', esc_html__( 'Failed to start TLS-connection. Is this a TLS encrypted SMTP-server?', 'g-smtp' ) );
				}

				if ( ! $smtp->hello( static::get_smtp_host() ) ) {
					return new WP_Error( 'smtp_helo_failed', esc_html__( 'TLS connection failed, is this a TLS encrypted SMTP-server?', 'g-smtp' ) );
				}
			}

			$user = static::get_smtp_user();
			$password = static::get_smtp_password();

			if ( ! empty( $user ) && ! empty( $password ) && ! $smtp->authenticate( $user, $password ) ) {
				return new WP_Error( 'smtp_auth_failed', esc_html__( 'Authentication failed, have you entered the correct credentials?', 'g-smtp' ) );
			}
		} catch ( Exception $e ) {
			return new WP_Error( 'smtp_connection_failed', esc_html__( 'Connection failed.', 'g-smtp' ) );
		}

		return true;
	}

}
