<?php
/**
 * RenderUser Init
 *
 * @version 1.0.1
 * @package 'datalayer'
 */

namespace DatalayerForWoocommerceFree;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'RenderUser' ) ) :
	/**
	 * Class RenderUser
	 */
	class RenderUser {
		/**
		 * Show_user_info.
		 *
		 * @name 'show_user_info'
		 */
		public static function show_user_info() {
			$options = get_option( 'options_tracking_option_free' );
			return $options['data_layer_google_tag_manager_show_user_info'];
		}
	}
endif;
