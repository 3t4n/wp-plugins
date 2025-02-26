<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Lexilink_Shortcodes {

	const ALPHABIT = array( 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z' );
	
	/**
	 * add_shrortcodes
	 *
	 * @since    1.0.0
	 * @return void
	 */
	public function add_shortcodes() {
		add_shortcode( 'lexilink_display', array( $this, 'lexilink_display_cb' ) );
	}
	
	/**
	 * shortcode_lexilink_informations
	 * 
	 * @since    1.0.0
	 * @param  mixed $atts
	 * @return void
	 */
	public function lexilink_display_cb( $atts ) {

		$shortcode_display_assets = include( LEXILINK_PLUGIN_PATH . 'public/assets/build/shortcode-display.asset.php' );
		wp_enqueue_style( 'shortcode_display', LEXILINK_PLUGIN_URL . 'public/assets/build/shortcode-display.css', array(), $shortcode_display_assets['version'], 'all' );
		wp_enqueue_script( 'shortcode_display', LEXILINK_PLUGIN_URL . 'public/assets/build/shortcode-display.js', $shortcode_display_assets['dependencies'], $shortcode_display_assets['version'], true );

		$settings_class   = new Lexilink_Settings();
        $settings         = $settings_class->get_settings();
		$text_color       = isset($settings['text_color']) ? sanitize_hex_color($settings['text_color']) : '';
		$background_color = isset($settings['background_color']) ? sanitize_hex_color($settings['background_color']) : '';
		$accent_color     = isset($settings['accent_color']) ? sanitize_hex_color($settings['accent_color']) : '';


		$custom_css = "
			.lexilink-display {
				--lexilink-color: {$text_color};
				--lexilink-background-color: {$background_color};
				--lexilink-background-color-active: {$accent_color};
			}
		";
        wp_add_inline_style( 'shortcode_display', esc_attr( $custom_css ) );

		$glossary_arrays = array();
		$glossary        = get_posts( array(
			'post_type'      => 'lexilink-glossary',
			'posts_per_page' => -1,
			'orderby'        => 'title',
			'order'          => 'ASC',
			'fields'         => 'ids',
		));

		foreach ( $glossary as $item ) {
			
			$title        = get_the_title( $item );
			$link         = get_permalink( $item );
			$excerpt      = get_the_excerpt( $item );
			$first_letter = strtoupper( substr( $title, 0, 1 ) );

			$glossary_arrays[ $first_letter ][] = array(
				'id'      => $item,
				'title'   => $title,
				'link'    => $link,
				'excerpt' => $excerpt,
			);
		}
		
		ob_start();

		include LEXILINK_PLUGIN_PATH . 'public/templates/shortcode-display.php';

		return ob_get_clean();
	}
}
