<?php
/**
 * WP_CF7DB_Scripts class
 *
 * @author   Devendra Mer <davanwp@gmail.com>
 * @package  WP_CF7DB
 * @since    1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * CSS And Js Enquer for frontend.
 *
 * @class    WP_CF7DB_Scripts
 * @version  1.0.0
 */
class WP_CF7DB_Scripts {

	/**
	 * Initialization.
	 */
	public static function init() {

		self::add_hooks();
	}

	/**
	 * Hook-in.
	 */
	private static function add_hooks() {

		// Enqueue scripts and styles.
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'frontend_scripts' ) );
	}
	

	/**
	 * Front end styles and scripts.
	 *
	 * @return void
	 */
	public static function frontend_scripts() {

		wp_register_style( 'wp_cf7db', WP_CF7DB()->plugin_url() . '/assets/css/style.css', false, WP_CF7DB::VERSION, 'all' );
		wp_register_script( 'wp_cf7db', WP_CF7DB()->plugin_url() . '/assets/js/scripts.js', array( 'jquery' ), WP_CF7DB::VERSION, true );
   		wp_localize_script( 
            'wp_cf7db', 
            'WP_CF7DB_Ajax_Obj', 
            array( 
                'ajax_url' => admin_url( 'admin-ajax.php' ), 
                'site_url' => get_bloginfo('url'), 
                'load_more_nonce' => wp_create_nonce("ajax_load_nonce") 
            )
        );
        wp_enqueue_style( 'wp_cf7db' );
		wp_enqueue_script( 'wp_cf7db' );
		
	}
	
}

WP_CF7DB_Scripts::init();