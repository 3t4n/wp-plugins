<?php
/**
 * Load Google Fonts
 *
 * @since 1.0.0
 * @package AfftraBlocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'AfftraBlocks_Fonts_Loader' ) ) {

	/**
	 * Load Google Fonts
	 *
	 * @since 1.0.0
	 */
	class AfftraBlocks_Fonts_Loader {

		/**
		 * All fonts
		 *
		 * @var array
		 */
		private static $all_fonts = array();

		/**
		 * Constructor
		 *
		 * @return void
		 */
		public function __construct() {
			add_action( 'wp_enqueue_scripts', array( $this, 'fonts_loader' ), 9999 );
			add_action( 'admin_enqueue_scripts', array( $this, 'fonts_loader' ), 9999 );
			add_action( 'afftra_render_block', array( $this, 'font_generator' ) );
		}

		/**
		 * Font generator
		 *
		 * @param array $block Block attributes.
		 * @return void
		 */
		public function font_generator( $block ) {
			if ( isset( $block['attrs'] ) && is_array( $block['attrs'] ) ) {
				$attributes = $block['attrs'];

				foreach ( $attributes as $key => $value ) {
					if ( ! empty( $value ) && strpos( $key, 'afftra_' ) === 0 && strpos( $key, 'FontFamily' ) !== false ) {
						self::$all_fonts[] = $value;
					}
				}

				$this->fonts_loader();
			}
		}

		/**
		 * Load fonts
		 *
		 * @return void
		 */
		public function fonts_loader() {
			if ( is_array( self::$all_fonts ) && count( self::$all_fonts ) > 0 ) {

				$fonts = array_filter( array_unique( self::$all_fonts ) );

				if ( ! empty( $fonts ) ) {

					$system = array(
						'Default',
						'Arial',
						'Tahoma',
						'Verdana',
						'Helvetica',
						'Times New Roman',
						'Trebuchet MS',
						'Georgia',
					);

					$gfonts      = '';
					$gfonts_attr = ':100,200,300,400,500,600,700,800,900';

					foreach ( $fonts as $font ) {
						if ( ! in_array( $font, $system, true ) && ! empty( $font ) ) {
							$gfonts .= str_replace( ' ', '+', trim( $font ) ) . $gfonts_attr . '|';
						}
					}

					if ( ! empty( $gfonts ) ) {
						$font_array = explode( '|', $gfonts );

						foreach ( $font_array as $font ) {
							if ( empty( $font ) || in_array( $font, $system, true ) ) {
								continue;
							}

							$query_args  = array( 'family' => $font );
							$font_handle = 'afftrablocks-font-' . sanitize_title( $font );

							wp_register_style(
								$font_handle,
								add_query_arg( $query_args, '//fonts.googleapis.com/css' ),
								array(),
								AFFTRA_VERSION,
								'all'
							);

							wp_enqueue_style( $font_handle );
						}
					}

					// Reset.
					$gfonts = '';
				}
			}
		}
	}
}

new AfftraBlocks_Fonts_Loader();    // Initialize the class.
