<?php

/**
 * The shortcode functionality of the plugin.
 *
 * @link       https://forhad.net/
 * @since      1.0.0
 *
 * @package    ACC_Conditional_Typo
 * @subpackage ACC_Conditional_Typo/public
 */

/**
 * The shortcode functionality of the plugin.
 *
 * @package    ACC_Conditional_Typo
 * @subpackage ACC_Conditional_Typo/public
 * @author     GrandPlugin <help@grandplugin.com>
 */
class ACC_Conditional_Typo_Shortcode {

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

		/**
		 * A Custom function to get post meta with sanitization and validation.
		 *
		 * @param [type] $post_id Current post ID.
		 * @param string $option Meta key.
		 * @param [type] $default Default meta value.
		 * @param string $option_two Nested meta key.
		 * @param [type] $default_two Nested meta value.
		 * @return mixed
		 */
		function wpgp_get_post_meta( $post_id, $option = '', $default = null, $option_two = '', $default_two = null ) {

			$options = get_post_meta( $post_id, '_wpgp_page_options', true );
			if ( ! empty( $option_two ) ) {

				return ( isset( $options[ $option ][ $option_two ] ) ) ? $options[ $option ][ $option_two ] : $default_two;
			} else {

				return ( isset( $options[ $option ] ) ) ? $options[ $option ] : $default;
			}
		}

	}

	/**
	 * A shortcode for this plugin.
	 *
	 * @since   1.0.0
	 * @param   string $atts attribute of this shortcode.
	 */
	public function gpsc_shortcode_execute( $atts ) {

		$post_id = intval( $atts['id'] );

		// Get Codes.
		$acc_wp_editor        = wpgp_get_post_meta( $post_id, 'acc_wp_editor' );
		$acc_custom_code_html = wpgp_get_post_meta( $post_id, 'acc_code_editor_html' );
		$acc_custom_code_css  = wpgp_get_post_meta( $post_id, 'acc_code_editor_css' );
		$acc_custom_code_js   = wpgp_get_post_meta( $post_id, 'acc_code_editor_js' );

		// Enqueue From CDN Repeater.
		foreach ( wpgp_get_post_meta( $post_id, 'acc_lib_load_repeater' ) as $acc_cdn_lnk_key => $acc_cdn_lnk_value ) {

			if ( $acc_cdn_lnk_value['acc_is_lib_cdn_load'] ) {

				// Check whether remote URL has a valid extension CSS or JS.
				if ( preg_match( '/\.(css)$/i', $acc_cdn_lnk_value['acc_lib_load_cdn_link'] ) ) {

					wp_enqueue_style( uniqid(), $acc_cdn_lnk_value['acc_lib_load_cdn_link'] );
				} elseif ( preg_match( '/\.(js)$/i', $acc_cdn_lnk_value['acc_lib_load_cdn_link'] ) ) {

					wp_enqueue_script( uniqid(), $acc_cdn_lnk_value['acc_lib_load_cdn_link'] );
				} else {

					wp_enqueue_style( uniqid(), $acc_cdn_lnk_value['acc_lib_load_cdn_link'] );
				}
			}
		}

		ob_start();

		if ( ! empty( $acc_wp_editor ) ) {

			echo $acc_wp_editor;
		}

		if ( ! empty( $acc_custom_code_html ) ) {

			echo $acc_custom_code_html;
		}

		if ( ! empty( $acc_custom_code_css ) ) {

			echo '<style>' . $acc_custom_code_css . '</style>';
		}

		if ( ! empty( $acc_custom_code_js ) ) {

			echo "<script>
				(function( $ ) {
					'use strict';
					$( document ).ready(function() {
					{$acc_custom_code_js}
					});
				})( jQuery );
			</script>";
		}

		return ob_get_clean();
	}

}
