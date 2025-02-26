<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Setup assets.
 */
class JCK_STOC_Shortcodes {
	/**
	 * Run class.
	 */
	public static function run() {
		if ( is_admin() ) {
			return;
		}

		add_shortcode( 'toc', array( __CLASS__, 'output_toc' ) );
	}

	/**
	 * Output the TOC shortcode.
	 *
	 * @param array $atts
	 *
	 * @return string|void
	 */
	public static function output_toc( $atts ) {
		$atts = shortcode_atts( array(
			'content'      => null,
			'headers'      => 'h1, h2, h3, h4, h5, h6', // headers that you wish to target
			'speed'        => 200, // speed of sliding back to top
			'anchor-class' => 'anchor', // class of anchor links
			'anchor-text'  => '', // prepended or appended to anchor headings
			'top_class'    => '.top', // back to top button or link class
			'spy'          => false, // scroll spy
			'position'     => 'append', // position of anchor text
			'spy-offset'   => 0 // specify heading offset for spy scrolling
		), $atts, 'toc' );

		if ( is_null( $atts['content'] ) ) {
			return;
		}

		$atts['spy'] = filter_var( $atts['spy'], FILTER_VALIDATE_BOOLEAN );

		ob_start();
		?>
		<div class="shortcode-toc"></div>
		<script>
			(function( $, document ) {
				$( document ).ready( function() {
					$( '<?php echo esc_attr( $atts['content'] ); ?>' ).anchorific( {
						navigation: '.shortcode-toc', // position of navigation
						headers: '<?php echo esc_attr( $atts['headers'] ); ?>', // headers that you wish to target
						speed: <?php echo (int) $atts['speed']; ?>, // speed of sliding back to top
						anchorClass: '<?php echo esc_attr( $atts['anchor-class'] ); ?>', // class of anchor links
						anchorText: '<?php echo esc_attr( $atts['anchor-text'] ); ?>', // prepended or appended to anchor headings
						top: '<?php echo esc_attr( $atts['top_class'] ); ?>', // back to top button or link class
						spy: <?php echo $atts['spy'] ? 'true' : 'false'; ?>, // scroll spy
						position: '<?php echo esc_attr( $atts['position'] ); ?>', // position of anchor text
						spyOffset: <?php echo esc_attr( $atts['spy-offset'] ); ?> // specify heading offset for spy scrolling
					} );
				} );
			}( jQuery, document ));
		</script>
		<?php

		return ob_get_clean();
	}
}