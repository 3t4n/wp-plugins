<?php
/*
Plugin Name: AMP Img Shortcode
Plugin URI: https://wpza.net/how-to-convert-img-to-amp-img-tags-in-wordpress/
Description: WPZA AMP Img Shortcode provides your website with a shortcode to display AMP images in WordPress.
Version: 1.0.1
Author: WPZA
Author URI: https://www.wpza.net/
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/
defined( 'ABSPATH' ) or die();

if( ! class_exists( 'wpza_ais' ) ) {
	final class wpza_ais {
		public function __construct() {
			$this->wpza_ais__define_constants();
			$this->wpza_ais__includes();
		}

		private function wpza_ais__define_constants() {
			define( 'wpza_ais__directory', __DIR__ );
			define( 'wpza_ais__full_name', 'AMP Img Shortcode' );
		}

		private function wpza_ais__includes() {
			$dir = scandir( wpza_ais__directory . '/includes' );
			if( $dir ) {
				foreach( $dir as $module ) {
					$path = wpza_ais__directory . '/includes';
					if( $path && substr( $module, 0, 1 ) !== '.' ) {
						$file = '/' . $module;
						if( is_readable( $path . $file ) ) {
							include_once( $path . $file );
						}
					}
				}
			}
		}
	}
}

new wpza_ais();