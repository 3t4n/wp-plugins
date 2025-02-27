<?php
defined('ABSPATH') or die("No script kiddies please!");

/**
 * The file that defines the library plugin class
 *
 * @package    CV Demo Importer
 * @subpackage /includes
 */
if ( ! class_exists( 'CVDI_Library' ) ) :

	class CVDI_Library {
		/**
		 * Retrieve the version number of the plugin.
		 *
		 * @since     1.0.0
		 * @return    string    The version number of the plugin.
		 */
		public function get_version() {
			$this->version = CVDI_VERSION;
			return $this->version;
		}

		/**
		 * Retrieve the json data for activated theme
		 *
		 * @since     1.0.0
		 * @return    string JSON
		 */
		public function retrieve_demo_by_activatetheme( $activated_theme ) {

			if ( strpos( $activated_theme, 'pro' ) !== false ) {
				$activated_theme = str_replace( '-pro', '', $activated_theme );
			} elseif ( strpos( $activated_theme, '-lite' ) !== false ) {
				$activated_theme = str_replace( '-lite', '', $activated_theme );
			}

			if ( 'wisdom-pro' == $activated_theme || 'wisdom' == $activated_theme ) {
				$activated_theme = 'wisdom-blog';
			} elseif( 'azure-pro' == $activated_theme || 'azure' == $activated_theme ) {
				$activated_theme = 'azure-news';
			}
			
			$all_json_data 	= array();
			// fetching required demo files from json according to activated theme through our own server.
			$cv_demo_config_file_url  		= 'https://gitlab.com/codevibrant/themes-demo-pack/-/raw/main/'.esc_html( $activated_theme ).'/demo.json';
			$cv_demo_config_file = apply_filters( 'cvdi_custom_json_config_path', esc_url( $cv_demo_config_file_url ) );
			$all_json_data 	= CVDI_Library::get_remote_data( $cv_demo_config_file );
			if ( is_wp_error( $all_json_data ) ) {
				return $all_json_data;
			}
			$all_json_data 	= json_decode( $all_json_data , true );
			return apply_filters( 'cvdi_all_json_demo_data', $all_json_data );
		}

		/**
		 * Gets and returns url body using wp_remote_get
		 *
		 * @since 1.0.0
		 */
		public static function get_remote_data( $url ) {

			// Get data
			$response = wp_remote_get( $url );

			// Check for errors
			if ( is_wp_error( $response ) or ( wp_remote_retrieve_response_code( $response ) != 200 ) ) {
				return false;
			}

			// Get remote body val
			$body = wp_remote_retrieve_body( $response );

			// Return data
			if ( ! empty( $body ) ) {
				return $body;
			} else {
				return false;
			}
		}
	}
	
endif;