<?php

use Ajax_Press\Theme_Configs;

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class AJAX_Press_Admin {

	private static $instance = null;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_menu' ) );

		add_action( 'wp_ajax_ajax_press_save_settings', array( $this, 'save_settings' ) );
		add_action( 'admin_notices', array( $this, 'admin_notice' ) );

		add_action( 'after_switch_theme', array( $this, 'handle_theme_switch' ) );

		add_action( 'admin_action_ajax_press_configuration', array( $this, 'handle_configuration' ) );
	}

	public function handle_configuration() {
		$type = ! empty( $_GET['type'] ) ? sanitize_key( $_GET['type'] ) : '';

		if ( 'hide_notice' == $type ) {
			update_option( 'ajax_press_theme_config_status', false );
		} elseif ( 'configure' == $type ) {
			$configs = Theme_Configs::instance()->get_current_theme_configs();

			if ( ! $configs ) {
				return;
			}

			$settings = (array) get_option( 'ajax_press_settings' );
			$settings = array_merge( $settings, $configs );

			update_option( 'ajax_press_settings', $settings );

			update_option( 'ajax_press_theme_config_status', false );

			wp_redirect( admin_url( 'admin.php?page=ajax-press' ) );
		}
	}

	public function handle_theme_switch() {
		$configs = Theme_Configs::instance()->get_current_theme_configs();

		if ( ! empty( $configs ) ) {
			update_option( 'ajax_press_theme_config_status', 'switch' );
		} else {
			update_option( 'ajax_press_theme_config_status', false );
		}
	}

	public function admin_notice() {
		$configure_status = get_option( 'ajax_press_theme_config_status' );
		if ( $configure_status ) {
			ob_start();
			include AJAX_PRESS_INCLUDES . '/theme-config-notice.php';
			$notice_html = ob_get_clean();

			ajax_press()->add_notice( 'info', $notice_html );
		}
	}

	public function save_settings() {

		$settings = $_POST['data'];

		if ( ! empty( $settings['scripts'] ) ) {
			$settings['scripts'] = trim( str_replace( [ "\'", '\"' ], [ "'", '"' ], $settings['scripts'] ) );
		}

		update_option( 'ajax_press_settings', $settings );

		wp_send_json_success();
	}

	public function add_menu() {
		add_menu_page( 'Ajax Press', 'Ajax Press', 'manage_options', 'ajax-press', array(
			$this,
			'render_main_page'
		), 'dashicons-superhero' );

		add_submenu_page( 'ajax-press', 'Ajax Press Settings', 'Settings', 'manage_options', 'ajax-press' );

		add_submenu_page( 'ajax-press', 'Getting Started', 'Getting Started', 'manage_options', 'ajax-press-getting-started', array(
			$this,
			'render_getting_started_page'
		) );

	}

	public function render_main_page() { ?>
        <div class="ajax-press-wrap" id="ajax-press-settings"></div>
	<?php }

	public function render_getting_started_page() { ?>
        <div class="ajax-press-getting-started-wrap" id="ajax-press-getting-started"></div>
	<?php }

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

}

new AJAX_Press_Admin();