<?php

namespace QuadLayers\QLTGM;

final class Plugin {

	protected static $instance;

	private function __construct() {

		load_plugin_textdomain( 'quadlayers-telegram-chat', false, QLTGM_PLUGIN_DIR . '/languages/' );

		Settings::instance();
		Frontend::instance();
		Backend::instance();

		add_action( 'admin_footer', array( __CLASS__, 'add_premium_css' ) );
		do_action( 'qltgm_init' );
	}

	public static function is_min() {
		return;
		if ( ! defined( 'SCRIPT_DEBUG' ) || ! SCRIPT_DEBUG ) {
			return '.min';
		}
	}

	public static function add_premium_css() {
		if ( ! class_exists( 'QLTGM_PRO', false ) ) {
			?>
			<style>
			.qltgm-premium-field {
				opacity: 0.5;
				pointer-events: none;
			}
			.qltgm-premium-field .description {
				display: block!important;
			}
			</style>
			<?php

		}
	}

	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
}

Plugin::instance();
