<?php
/**
 * Output our dynamic CSS.
 *
 * @package ShopCred
 */
namespace ShopCred;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class GenerateCSS {

	/**
	 * Instance.
	 *
	 * @access private
	 * @var object Instance
	 * @since 1.0.0
	 */
	private static $instance;

	/**
	 * Initiator.
	 *
	 * @since 1.0.0
	 * @return object initialized object of class.
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 *  Build the CSS from our block attributes.
	 *
	 * @since 1.0.0
	 * @param string $content The content we're looking through.
	 *
	 * @return string The dynamic CSS.
	 */
	public static function get_dynamic_css( $content = '' ) {
		
		if ( ! $content ) {
			return;
		}
		
		$data = Block_Data::get_block_data( $content );

		if ( empty( $data ) ) {
			return;
		}

		$blocks_exist = false;
		$icon_css_added = false;
		$main_css_data = array();
		$desktop_css_data = array();
		$tablet_css_data = array();
		$tablet_only_css_data = array();
		$mobile_css_data = array();


		foreach ( $data as $name => $blockData ) {

			/**
			 * Get our Button block CSS.
			 *
			 * @since 1.0.0
			 */
			
			if ( empty( $blockData ) ) {
				continue;
			}

			$blocks_exist = true;

			$css = new Dynamic_CSS();
			$desktop_css = new Dynamic_CSS();
			$tablet_css = new Dynamic_CSS();
			$tablet_only_css = new Dynamic_CSS();
			$mobile_css = new Dynamic_CSS();

			$block_file_name = base_init()->plugin_path( 'includes/frontend/'. $name .'.php' );

			
			if ( file_exists( $block_file_name ) ) {
				include $block_file_name;
			}


			if ( $css->css_output() ) {
				$main_css_data[] = $css->css_output();
			}

			if ( $desktop_css->css_output() ) {
				$desktop_css_data[] = $desktop_css->css_output();
			}

			if ( $tablet_css->css_output() ) {
				$tablet_css_data[] = $tablet_css->css_output();
			}

			if ( $tablet_only_css->css_output() ) {
				$tablet_only_css_data[] = $tablet_only_css->css_output();
			}

			if ( $mobile_css->css_output() ) {
				$mobile_css_data[] = $mobile_css->css_output();
			}
			

		}

		if ( ! $blocks_exist ) {
			return false;
		}

		return apply_filters(
			'shopcred_css_device_data',
			array(
				'main' => $main_css_data,
				'desktop' => $desktop_css_data,
				'tablet' => $tablet_css_data,
				'tablet_only' => $tablet_only_css_data,
				'mobile' => $mobile_css_data,
			),
			// $settings
		);
	}

	/**
	 *  Build the JS from our block attributes.
	 *
	 * @since 1.0.0
	 * @param string $content The content we're looking through.
	 *
	 * @return string The dynamic CSS.
	 */
	public static function get_dynamic_js( $content = '' ) {
		if ( ! $content ) {
			return;
		}
		
		$data = Block_Data::get_block_data( $content );

		if ( empty( $data ) ) {
			return;
		}

		$blocks_exist = false;
		$icon_css_added = false;
		$main_css_data = array();
		$desktop_css_data = array();
		$tablet_css_data = array();
		$tablet_only_css_data = array();
		$mobile_css_data = array();

		ob_start();

		foreach ( $data as $name => $blockData ) {

			/**
			 * Get our Button block CSS.
			 *
			 * @since 1.0.0
			 */
			if ( 'tabs' === $name ) {
				if ( empty( $blockData ) ) {
					continue;
				}

				$blocks_exist = true;

				//$content = '';

				foreach ( $blockData as $atts ) {
					if ( ! isset( $atts['block_id'] ) ) {
						continue;
					}

					$defaults = Block_Defaults_Attributes::get_Block_DefaultsAttributes();

					$settings = wp_parse_args(
						$atts,
						$defaults['tabs']
					);

					$selector = '.spc-block-' . $atts['block_id'];

					?>
					document.addEventListener("DOMContentLoaded", function() { 
						window.addEventListener( 'load', function() {
						SPCTabs.init( '<?php echo esc_attr( $selector ); ?>' );
						SPCTabs.anchorTabId( '<?php echo esc_attr( $selector ); ?>' );
					});
					window.addEventListener( 'hashchange', function() {
						SPCTabs.anchorTabId( '<?php echo esc_attr( $selector ); ?>' );
					}, false );
					})

					<?php
				}
			}
		}

		return ob_get_clean();

		if ( ! $blocks_exist ) {
			return false;
		}
	}


	/**
	 * Turn our CSS array into plain CSS.
	 *
	 * @since 1.0.0
	 *
	 * @param array $data Our CSS data.
	 */
	public static function get_parsed_css( $data ) {
		$output = '';

		foreach ( $data as $device => $selectors ) {
			foreach ( $selectors as $selector => $properties ) {
				if ( ! count( $properties ) ) {
					continue;
				}

				$temporary_output = $selector . '{';
				$elements_added = 0;

				foreach ( $properties as $key => $value ) {
					if ( empty( $value ) ) {
						continue;
					}

					$elements_added++;
					$temporary_output .= $value;
				}

				$temporary_output .= '}';

				if ( $elements_added > 0 ) {
					$output .= $temporary_output;
				}
			}
		}

		return $output;
	}

	/**
	 * Print our CSS for each block.
	 *
	 * @since 1.0.0
	 */
	public static function get_frontend_block_css() {
		if ( ! function_exists( 'has_blocks' ) ) {
			return;
		}

		$content = Block_Data::get_parsed_content();

		if ( ! $content ) {
			return;
		}

		$data = self::get_dynamic_css( $content );

		
		if ( ! $data ) {
			return;
		}

		$css = '';

		$css .= self::get_parsed_css( $data['main'] );

		if ( ! empty( $data['desktop'] ) ) {
			$css .= sprintf(
				'@media %1$s {%2$s}',
				Block_Data::get_media_query( 'desktop' ),
				self::get_parsed_css( $data['desktop'] )
			);
		}

		if ( ! empty( $data['tablet'] ) ) {
			$css .= sprintf(
				'@media %1$s {%2$s}',
				Block_Data::get_media_query( 'tablet' ),
				self::get_parsed_css( $data['tablet'] )
			);
		}

		if ( ! empty( $data['tablet_only'] ) ) {
			$css .= sprintf(
				'@media %1$s {%2$s}',
				Block_Data::get_media_query( 'tablet_only' ),
				self::get_parsed_css( $data['tablet_only'] )
			);
		}

		if ( ! empty( $data['mobile'] ) ) {
			$css .= sprintf(
				'@media %1$s {%2$s}',
				Block_Data::get_media_query( 'mobile' ),
				self::get_parsed_css( $data['mobile'] )
			);
		}

		return apply_filters( 'shopcred_css_output', $css );
	}


	/**
	 * Print our JS for each block.
	 *
	 * @since 1.0.0
	 */
	public function get_frontend_block_js() {
		if ( ! function_exists( 'has_blocks' ) ) {
			return;
		}

		$content = Block_Data::get_parsed_content();

		if ( ! $content ) {
			return;
		}

		$data = self::get_dynamic_js( $content );

		if ( ! $data ) {
			return;
		}

		$js = '';

		$js .= self::get_parsed_css( $data['main'] );


		return apply_filters( 'shopcred_css_output', $js );
	}

}

GenerateCSS::get_instance();