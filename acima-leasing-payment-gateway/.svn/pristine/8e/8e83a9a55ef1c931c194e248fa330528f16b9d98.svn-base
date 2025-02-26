<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( WC_Gateway_Acima_Credit_Template_Engine::class ) ) {
	/**
	 * Acima Digital Payment Gateway Template Engine
	 *
	 * Render HTML Files
	 *
	 * Note: This class uses file_get_contents() for loading local template files,
	 * which is safe in this context as we're only loading files from our plugin's
	 * views directory. These templates are part of our plugin and not user-generated
	 * or remote content.
	 *
	 * @class   WC_Gateway_Acima_Credit_Template_Engine
	 * @package WooCommerce/Classes/Payment
	 * @author  Acima Digital, Inc
	 */
	class WC_Gateway_Acima_Credit_Template_Engine {
		/**
		 * Render a template file with parameters.
		 *
		 * @param string $filename Template filename without extension
		 * @param array  $params   Parameters to replace in template
		 * @return void
		 *
		 * phpcs:disable WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
		 * phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
		 */
		public static function render( $filename = '', $params = array() ) {
			if ( $filename ) {
				$template_path = __DIR__ . '/../views/' . $filename . '.html';

				// Verify template exists in our plugin directory
				if ( ! file_exists( $template_path ) ) {
					return;
				}

				$html = file_get_contents( $template_path );

				foreach ( $params as $param => $value ) {
					// Escape HTML output appropriately since they are dynamic values
					$escaped_value = wp_kses_post($value);
					$html = str_replace( "%{$param}%", $escaped_value, $html );
				}

				// Output is safe as templates are static files in our plugin
				echo $html;
			}
		}
		// phpcs:enable
	}
}
