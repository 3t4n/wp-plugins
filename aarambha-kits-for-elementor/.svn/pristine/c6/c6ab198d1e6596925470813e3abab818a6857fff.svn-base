<?php
/**
 * Define the inline style output functionality
 *
 * @link       https://aarambhathemes.com/
 * @since      1.0.0
 *
 * @package    Aarambha_Kits
 * @subpackage Aarambha_Kits/includes
 * @author     Aarambha Themes <aarambhathemes@gmail.com>
 */

class Aarambha_Kits_Inline_Style {

	/**
	 * Get CSS Built from plugin Options.
	 *
	 * @access static public
	 * @param string $type Whether to return CSS for the "front-end", "block-editor" or "classic-editor".
	 * @return string
	 */
	public static function css_output( $type = null ) {

		ob_start();

		/*
		--------------------------------------------------------------
		# CSS
		--------------------------------------------------------------*/
		// Front-End Styles.
		if ( 'front-end' === $type ) {

			$categories = get_categories( array( 'hide_empty' => '0' ) );

			foreach ( $categories as $category ) {

				$color_code = get_term_meta( $category->term_id, '_term_bg_color', true );

				// $color_code = aarambha_kits_category_color( $category->term_id );

				if ( ! empty( $color_code ) ) {
					// Background
					self::generate_css(
						array(
							'
                        #secondary .widget.widget-aarambha-kits ul li.cat-item-' . absint( $category->term_id ) . ' a::before,
                        .widget.widget-aarambha-kits ul li.cat-item-' . absint( $category->term_id ) . ' a::before,
                        #secondary .widget.widget-aarambha-kits ul li.cat-item-' . absint( $category->term_id ) . ' .post-count,
                        .widget.widget-aarambha-kits ul li.cat-item-' . absint( $category->term_id ) . ' .post-count,
                        .elementor .aarambha-kits-container .aarambha-kits-post-detail-wrap .entry-categories a.cat-item-' . absint( $category->term_id ) . '
                        ',
						),
						array( 'background-color' ),
						esc_attr( $color_code )
					);
					// Border Color
					self::generate_css(
						array(
							'
                        #secondary .widget.widget-aarambha-kits ul li.cat-item-' . absint( $category->term_id ) . ' a,
                        .widget.widget-aarambha-kits ul li.cat-item-' . absint( $category->term_id ) . ' a
                        ',
						),
						array( 'border-color' ),
						esc_attr( $color_code )
					);
				}
			}
		}

		// Return the results.
		return ob_get_clean();

	}

	/**
	 * Generate CSS.
	 *
	 * @param array|string    $selector The CSS selector.
	 * @param array           $property  The CSS style.
	 * @param string          $values The CSS value.
	 * @param string          $prefix The CSS prefix.
	 * @param string          $suffix The CSS suffix.
	 * @param void echo style
	 */
	public static function generate_css( $selector, $property, $values, $prefix = '', $suffix = '', $media = null ) {

		$output = '';

		/*
		 * Bail early if we have no $selector elements or properties and $value.
		 */
		if ( ! $values || ! $selector ) {
			return;
		}

		if ( $media ) {
			$output .= $media . '{';
		}

		$selector = is_array( $selector ) ? join( ',', $selector ) : $selector;

		$output .= $selector . '{';
		foreach ( $property  as $key => $style ) {
			$output .= $style . ':' . esc_attr( $prefix . $values . $suffix ) . ';';
		}
		$output .= '}';

		if ( $media ) {
			$output .= '}';
		}

		echo wp_kses_post($output);
	}

}
new Aarambha_Kits_Inline_Style();
