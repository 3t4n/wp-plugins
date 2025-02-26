<?php
/**
 * Email class.
 *
 * @package CP24\Email\Inc\Email
 * @since 1.0.0
 * @version 1.0.0
 */

namespace CP24\Tools\Inc\Email;

defined( 'ABSPATH' ) || exit;

use CP24\Tools\Inc\Email\Smtp\Ajax_Handler;
use CP24\Tools\Inc\Base;
use CP24\Tools\Inc\Settings;

/**
 * Moderate email common requirements.
 *
 * @since 1.0.0
 * @version 1.0.0
 */
class Email extends Base {
	const EMAIL_NONCE    = 'cp24-wp-tools';
	const EMAIL_SETTINGS = 'cp24-wp-tools-email-settings';

	/**
	 * Section required files.
	 *
	 * @since 1.2.0
	 * @version 1.2.0
	 * @var array $files
	 */
	protected $files = [
		'inc/email/smtp/class-ajax-handler.php',
		'inc/email/log-sent-email/class-log-sent-email.php',
	];

	/**
	 * Class constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		parent::__construct();

		// Rest section common hook.
		add_action( 'wp_ajax_cp24_email_get_options', [ $this, 'get_options' ] );

		// Add email menu
		add_filter( Settings::DASHBOARD_MENU_ITEMS, [ $this, 'add_menu_items' ], 10 );
	}

	/**
	 * Get all option about email.
	 *
	 * @since 1.0.0
	 * @version 1.0.0
	 */
	public function get_options() {
		check_ajax_referer( self::EMAIL_NONCE, 'nonce' );

		$smtp       = get_option( Ajax_Handler::SMTP_OPTION_NAME, [] );
		$multi_smtp = get_option( Ajax_Handler::SMTP_MULTI_OPTION_NAME, [] );

		wp_send_json_success(
			[
				'smtp'           => $smtp,
				'multi'          => $multi_smtp,
				'multi_count'    => count( $multi_smtp ),
				'email_settings' => get_option( self::EMAIL_SETTINGS, [] ),
			]
		);
	}

	/**
	 * Add menu items to the dashboard menu.
	 *
	 * @param array $menu_items The existing menu items.
	 * @return array The updated menu items.
	 *
	 * @since 1.2.0
	 */
	public function add_menu_items( $menu_items ) {
		$menu_items['email'] = [
			'title'    => esc_html__( 'Email', 'cp24-wp-tools' ),
			'slug'     => 'cp24-email',
			'priority' => 3,
		];

		return $menu_items;
	}
}

new Email();
