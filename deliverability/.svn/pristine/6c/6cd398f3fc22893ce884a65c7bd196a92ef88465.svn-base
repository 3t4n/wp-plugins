<?php

namespace TopDeliverability\Plugin;

use Exception;
use PHPMailer\PHPMailer\PHPMailer as OriginalPHPMailer;
use TopDeliverability\Email\ExtendedPHPMailer;

class Hooks {

	/**
	 * @return void
	 */
	public static function activate() {
		Wiring::wire()->get_plugin_activator()->activate();
	}

	/**
	 * @return void
	 */
	public static function deactivate() {
		Wiring::wire()->get_plugin_activator()->deactivate();
	}

	/**
	 * @return void
	 */
	public static function uninstall() {
		Wiring::wire()->get_plugin_uninstaller()->uninstall();
	}

	/**
	 * @return void
	 */
	public static function register_menu() {
		Wiring::wire()->get_main_menu()->init();
	}

	/**
	 * @return void
	 */
	public static function configure_admin_pages() {
		Wiring::wire()->get_plugin_configurer()->configure();
	}

	/**
	 * @return void
	 * @throws Exception
	 */
	public static function handle_callback() {
		Wiring::wire()->get_callback_page()->render();
	}

	/**
	 * @return void
	 */
	public static function load_translations() {
		$plugin_rel_path = dirname( plugin_basename( TOP_DELIVERABILITY_PLUGIN_INDEX_FILE ) ) . '/i18n/';
		load_plugin_textdomain( 'deliverability', false, $plugin_rel_path );
	}

	/**
	 * @param OriginalPHPMailer $phpmailer
	 * @return void
	 */
	public static function overwrite_phpmailer( &$phpmailer ) {
		Wiring::wire()->get_phpmailer_overwriter()->overwrite( $phpmailer );
	}

	/**
	 * @param OriginalPHPMailer & ExtendedPHPMailer $phpmailer
	 * @return void
	 */
	public static function append_dkim_signature( $phpmailer ) {
		Wiring::wire()->get_dkim_header_appender()->appendTo( $phpmailer );
	}
}
