<?php
/*
Plugin Name: Advanced Custom Fields: Snippets
Plugin URI: https://bitbucket.org/tomekthewo/acf-snippets/
Description: Adds useful function for rendering image fields, link fields, repeater fields and flexible content for the Advanced Custom Fields plugin.
Version: 1.0.0
Author: Tomáš Langer
Author URI: http://tomekthewo.cz/
Copyright: Tomáš Langer
Text Domain: acf-snippets
Domain Path: /language
*/

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.


if ( ! class_exists( 'AdvancedCustomFields_Snippets' ) ) {

	class AdvancedCustomFields_Snippets {

		const VERSION = '1.0.0';
		const TEXT_DOMAIN = 'acf-snippets';

		function __construct() {

		}

		public function init() {

			$this->checkDependency();

			/* INCLUDE SNIPPETS */
			include_once( __DIR__ . '/inc/snippet-image.php' );
			include_once( __DIR__ . '/inc/snippet-flexible-content.php' );
			include_once( __DIR__ . '/inc/snippet-link.php' );
			include_once( __DIR__ . '/inc/snippet-repeater.php' );

		}

		public function checkDependency() {

			if ( !class_exists('ACF') ) {
				add_action( 'admin_notices', array($this, 'acfRequired') );
			}

		}

		public function acfRequired() {

			echo '<div class="error"><p>'. __( 'Advanced Custom Fields are required.', self::TEXT_DOMAIN ) .'</p></div>';

		}

	}


	function acf_snippets() {

		global $acf_snippets;
		$acf_snippets = new AdvancedCustomFields_Snippets;
		$acf_snippets->init();

		return $acf_snippets;
	}

	acf_snippets();
}