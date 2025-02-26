<?php

require_once 'class-ampsy-router.php';
require_once 'class-ampsy-options.php';
require_once 'class-ampsy-widget.php';
require_once 'class-ampsy-widget-model.php';
require_once 'class-ampsy-instance-key-creater.php';

class WP_Plugin_Ampsy {
	private $settings_controller;

	public function __construct() {
		$this->options = new Ampsy_Options;
		$this->key = $this->options->key();
		$this->router = new Ampsy_Router();

		add_action( 'admin_menu', array( $this, 'admin_menu' ) );

		add_action( 'widgets_init', function() {
		   register_widget( 'Ampsy_Widget' );
		} );

		add_shortcode( 'ampsy_widget', array( $this, 'shortcode' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admins_javascripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admins_styles' ) );

		add_action( 'admin_init', function() {
			if ( $this->options->redirect_to_settings() ) {
				$this->router->redirect_to_settings_page();
			}
		} );

		add_action( 'admin_notices', array( $this, 'flash_messages' ) );
	}

	public function flash_messages() {
		foreach ( $this->options->flash() as $message ) {
			echo "<div class=\"{$message['type']} notice is-dismissible\"><p>{$message['text']}</p><button type=\"button\" class=\"notice-dismiss\"><span class=\"screen-reader-text\">Dismiss this notice.</span></button></div>";
		}
	}

	public function activate() {
		$instance_key_creater = new Ampsy_Instance_Key_Creater( $this->options );
		if ( !$this->key ) {
			$this->key = $instance_key_creater->create();
		}

		$this->options->set_flash( 'Plugin <strong>activated</strong>.', 'updated' );

		$this->options->set_redirect_to_settings();
	}

	public function deactivate() {
	}

	public static function uninstall() {
		delete_option( 'ampsy-instance-key' );
		delete_option( 'ampsy-redirect-to-settings-page' );
		delete_option( 'ampsy-flash' );
	}

	public function admin_page() {
		$settings_url = $this->router->settings_url( $this->options->key() );
		include( plugin_dir_path( __FILE__ ) . '../templates/admin_page.php' );
	}

	public function admin_menu() {
		add_menu_page( 'Ampsy widgets', 'Ampsy widgets', 'manage_options', 'ampsy_widgets', array( $this, 'admin_page' ), plugin_dir_url( __FILE__ ).'../images/menu-icon.png' );
	}

	public function shortcode( $attrs ) {
		$router = new Ampsy_Router;
		if ( isset ( $attrs['id'] ) ) {
			$attrs['url'] = $router->widget_url( $attrs['id'] );
			$widget = new Ampsy_Widget_Model( $attrs );
			include( plugin_dir_path( __FILE__ ) . '../templates/widgets/short-code.php' );
		}
	}

	public function enqueue_styles() {
		$style_url = plugins_url( '../css/ampsy.css', __FILE__ );
		wp_register_style( 'ampsy', $style_url );
		wp_enqueue_style( 'ampsy' );
	}

	public function enqueue_admins_javascripts( $hook ) {
		if ( 'widgets.php' == $hook || 'customize.php' == $hook ) {
			wp_enqueue_script( 'admin_widgets', plugin_dir_url( __FILE__ ) . '../js/admin_widgets.js' );
		}
	}

	public function enqueue_admins_styles( $hook ) {
		if ( 'widgets.php' == $hook || 'toplevel_page_ampsy_widgets' == $hook || 'customize.php' == $hook ) {
			wp_enqueue_style( 'ampsy_admin', plugin_dir_url( __FILE__ ) . '../css/ampsy_admin.css' );
		}
	}
}

?>
