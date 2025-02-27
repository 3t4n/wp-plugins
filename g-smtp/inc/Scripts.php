<?php

namespace G_Smtp;

use G_Smtp\Traits\Singleton;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Class Scripts
 */
class Scripts {
	use Singleton;

	/**
	 * Init function
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_backend_scripts' ] );
	}

	/**
	 * Enqueues scripts and styles for the backend
	 *
	 * @param string $hook The current admin hook
	 *
	 * @return void
	 */
	public function enqueue_backend_scripts( $hook ) {
		wp_enqueue_style( 'fontawesome', plugins_url( 'assets/fontawesome/css/all.min.css', G_SMTP_FILE ), false, '5.10.1' );
		wp_enqueue_style( 'g-smtp', plugins_url( 'assets/css/backend/application.min.css', G_SMTP_FILE ), false, Plugin::VERSION );
		wp_enqueue_script( 'g-smtp', plugins_url( 'assets/js/backend/application.min.js', G_SMTP_FILE ), [], Plugin::VERSION, true );

		$ajax_url = admin_url( 'admin-ajax.php' );

		if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
			$ajax_url = add_query_arg(
				[
					'lang' => \ICL_LANGUAGE_CODE,
				],
				$ajax_url
			);
		}

		$g_smtp_vars = [
			'ajax_url' => $ajax_url,
		];

		wp_localize_script(
			'g-smtp',
			'g_smtp_vars',
			$g_smtp_vars
		);
	}

}
