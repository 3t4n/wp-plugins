<?php

/**
 * Class Appizy_App_Embed
 *
 * @package Appizy App Embed
 */
class Appizy_App_Embed {

	public function __construct() {
		$functions_dir = __DIR__ . '/../includes';

		if ( is_admin() ) {
			include_once $functions_dir . '/admin-config.php';
		} else {
			include_once $functions_dir . '/app-embed.php';
		}

		$this->run();
	}

	/**
	 * Action hook
	 */
	public function run() {
		add_action( 'wp_loaded', array( $this, 'enqueue_appizy_scripts' ) );
		add_action( 'wp_loaded', array( $this, 'enqueue_appizy_styles' ) );

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_appizy_admin_script' ) );
	}

	public function enqueue_appizy_admin_script() {
		wp_register_script( 'appizy-admin-script', plugins_url( '/../js/admin-tools-screen.js', __FILE__ ), array( 'jquery' ), null, true );

		wp_enqueue_script( 'appizy-admin-script' );
	}

	/**
	 * Enqueues plugin-specific scripts.
	 */
	public function enqueue_appizy_scripts() {
		wp_register_script( 'appizy-script', plugins_url( '/../js/embed.js', __FILE__ ), array( 'jquery' ), null, true );

		wp_enqueue_script( 'appizy-script' );

		wp_localize_script(
			'appizy-script',
			'appizyApi',
			array(
				'root'  => rest_url(),
				'nonce' => wp_create_nonce( 'wp_rest' ),
			)
		);
	}

	/**
	 * Enqueues plugin-specific styles.
	 */
	public function enqueue_appizy_styles() {
		wp_register_style( 'appizy-styles', plugins_url( '/../css/appizy-styles.css', __FILE__ ) );

		wp_enqueue_style( 'appizy-styles' );
	}
}
