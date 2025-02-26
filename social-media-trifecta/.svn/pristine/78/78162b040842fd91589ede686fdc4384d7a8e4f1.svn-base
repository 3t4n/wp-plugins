<?php

/**
 * Plugin Name: Social Media Trifecta
 * Plugin URI:  https://wordpress.org/plugins/social-media-trifecta/
 * Description: This is a plugin that combines Facebook, Twitter and Instagram all in one feed
 * Version:     1.0.0
 * Author:      Ayush Malakar
 * Author URI:  http://ayushmalakar.com.np
 * Text Domain: social-meida-trifecta
 */

if ( ! defined( 'SOCIAL_MEDIA_TIRFECTA' ) ) {
	define( 'SOCIAL_MEDIA_TIRFECTA', dirname( __FILE__ ) );
}

if ( ! class_exists( 'SOCIAL_MEDIA_TIRFECTA' ) ) {
	class SOCIAL_MEDIA_TIRFECTA {


		public static  $page_slug = 'social_media_trifecta';
		private static $instance;


		function __construct() {

			add_action( 'admin_menu', array( &$this, 'add_admin_second_menu' ) );
			add_filter('widget_text', 'do_shortcode');
			add_action('wp_enqueue_scripts',array($this,'enqueue_font_awesome') );
		}

		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		public function enqueue_font_awesome() {
			wp_register_style( 'font-awesome', plugins_url( 'css/font-awesome.min.css', __FILE__ ) );
			wp_enqueue_style( 'font-awesome' );
		}

		public function add_admin_second_menu() {

			add_menu_page( 'Social Meida Trifecta', 'Trifecta Settings', 'manage_options', $this::$page_slug, function () {
				TRIFECTA_FACBOOK::admin_menu_settings();
				TRIFECTA_INSTAGRAM::admin_menu_settings();
				TRIFECTA_TWITTER::admin_menu_settings();


			} );


		}

	}
}

add_action( 'plugins_loaded', array( 'SOCIAL_MEDIA_TIRFECTA', 'get_instance' ) );
require_once( 'admin_menus/classes/class-trifecta-facebook.php' );
require_once( 'admin_menus/classes/class-trifecta-instagram.php' );
require_once( 'admin_menus/classes/class-trifecta-twitter.php' );

require_once( 'facebook/class-smt-facebook-generator.php' );
require_once( 'Twitter/class-smt-twitter-generator.php' );
require_once( 'instagram/class-smt-instagram-generator.php' );

