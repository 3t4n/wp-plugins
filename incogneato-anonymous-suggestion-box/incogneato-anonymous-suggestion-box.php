<?php
/*
Plugin Name: Incogneato Anonymous Suggestion Box
Plugin URI: https://www.incognea.to/how-to-add-incogneato-to-your-wordpress-site/
Description: Easily add your Incogneato anonymous suggestion box to your WordPress site in just seconds.
Author: Incogneato
Version: 1.0
Author URI: https://www.incognea.to
Text Domain: incogneato-anonymous-suggestion-box
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( ! class_exists( 'IncogneatoAnonymousSuggestionBox' ) ) {
	class IncogneatoAnonymousSuggestionBox {
		private $box_id;
		private $box_title;
		public function __construct() {
			$box_id = trim( get_option( 'iasb_box_id', '' ) );
			$box_title = trim( get_option( 'iasb_box_title', '' ) );
			$box_title = $box_title == '' ? 'Suggestion Box' : $box_title;
			if( $box_id != '' ) {
				$this->box_id = $box_id;
				$this->box_title = $box_title;
				add_action( 'wp_head', array( $this, 'ob_start_head' ) );
				add_action( 'wp_footer', array( $this, 'ob_end_footer' ) );
			}
			add_action( 'admin_menu', array( $this, 'add_menu' ) );
			add_action( 'admin_init', array( $this, 'register_settings' ) );
		}
		public function ob_start_head() {
			ob_start();
		}
		public function ob_end_footer() {
			$js_inject = '<script src="https://whoanswered.me/embed/widget.js"></script><script>var mybox = "'.$this->box_id.'";var buttontext = "'.$this->box_title.'";</script>';
			$buffer = ob_get_clean();
			$buffer = preg_replace('/(<body[^>]*>)/ims', "$1" . PHP_EOL . $js_inject, $buffer);
			echo $buffer;
		}
		public function add_menu() {
			add_menu_page(
				'Incogneato',
				'Incogneato',
				'manage_options',
				'incogneato-anonymous-suggestion-box',
				array($this, 'add_settings_page'),
				plugins_url( 'images/16px.png', __FILE__ )
			);
		}
		public function register_settings() {
			register_setting( 'incogneato-anonymous-suggestion-box', 'iasb_box_id' );
			register_setting( 'incogneato-anonymous-suggestion-box', 'iasb_box_title' );
		}
		public function add_settings_page() {
			require( dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'settings.php' );
		}
	}
}

$IASB_Instance = new IncogneatoAnonymousSuggestionBox();