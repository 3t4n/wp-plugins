<?php
/**
 * Plugin name: AnchorPress
 * Description: A VERY simple plugin to add link to each title tag of your posts
 * Version: 0.4
 * Author: Julien Maury
 * Author URI: https://tweetpress.fr
 */

if ( ! function_exists( 'add_filter' ) ) {
	die( '~Tryin~' );
}

add_action( 'plugins_loaded', function() {
	$i = AnchorPress::getInstance();
	$i->hooks();
});

class AnchorPress {
	protected static $instance;

	protected function __construct() {

	}
	/**
	 * @return self
	 */
	final public static function getInstance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new static;
		}
		return self::$instance;
	}

	public function hooks() {
		add_filter( 'the_content', [ $this, 'add_anchors' ] );
	}

	/**
	 *  Whether to add anchors or not
	 * @author Julien Maury
	 */
	public function want_anchors() {

		$condition = apply_filters( 'anchorpress_want_anchors_condition', __return_null() );

		if ( ! empty( $condition ) ) {
			return $condition;
		}
		return is_singular();
	}

	/**
	 * Add anchor as ID to each <h*>
	 * @param $content
	 *
	 * @author Julien Maury
	 * @return mixed
	 */
	public function add_anchors( $content ) {

		if ( ! $this->want_anchors() ) {
			return $content;
		}

		return preg_replace_callback( '/(\<h[1-6](.*?))\>(.*)(<\/h[1-6]>)/i', function( $matches ) {

			$_to_return = reset( $matches );
			$unicode    = apply_filters( 'anchorpress_unicode', '&#128279;', $matches );
			$classes[]  = 'link-hn';
			$classes    = apply_filters( 'anchorpress_href_classes', array_map( 'esc_attr', $classes ), $matches );
			$classes    = join( ' ', array_unique( $classes ) );

			if ( false === stripos( $_to_return, 'id=' ) ) {
				$id           = wp_trim_words( $matches[3], 3 );
				$heading_link = '<a href="#' . sanitize_title( $id ) . '" class="'. $classes . '">' .  esc_html( $unicode ) . '</a>';
				$_to_return   = $matches[1] . $matches[2] . ' id="' . sanitize_title( $id ) . '">' . $heading_link . ' ' . $matches[3] . $matches[4];
			}
			return $_to_return;
		}, $content );
	}
}
