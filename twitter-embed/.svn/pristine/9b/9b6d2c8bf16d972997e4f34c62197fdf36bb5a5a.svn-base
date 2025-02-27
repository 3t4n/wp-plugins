<?php
/*
 * Plugin Name: Twitter Embed
 * Plugin URI: http://kovshenin.com/wordpress/plugins/twitter-embed/
 * Description: Easily embed tweets in your WordPress posts and pages via shortcode, embed HTML or URL on a line by itself.
 * Version: 1.1.1
 * Author: kovshenin
 * Author URI: http://kovshenin.com
 * License: GPL2
 */

/**
 * Twitter Embed Plugin Class
 */
class Twitter_Embed_Plugin {

	// This regular expression is used to compare URLs against tweet status URLs
	private $regex = '#https?://(www\.)?twitter.com/.+?/status(es)?/.*#i';

	function __construct() {
		add_action( 'init', array( $this, 'init' ) );
	}

	// Fired during init
	function init() {
		global $wp_version;

		add_shortcode( 'tweet', array( $this, 'tweet_shortcode_handler' ) );
		add_filter( 'pre_kses', array( $this, 'tweet_embed_reversal' ), 0 );
		add_filter( 'content_save_pre', array( $this, 'tweet_embed_reversal' ) );
		add_filter( 'content_filtered_save_pre', array( $this, 'tweet_embed_reversal' ) );

		// Pre 3.4 back-compat:
		if ( ! version_compare( $wp_version, '3.4', '>=') )
			wp_oembed_add_provider( $this->regex, 'http://api.twitter.com/1/statuses/oembed.{format}', true );
	}

	/**
	 * Embed Reversal
	 *
	 * Filters pre_kses, looks for the twitter-tweet blockquote and
	 * replaces with the appropriate URL if one is found.
	 *
	 * @uses DomDocument
	 */
	function tweet_embed_reversal( $content ) {
		$content = stripslashes( $content );
		if ( preg_match( '#<blockquote class="twitter-tweet">(.+)</blockquote>#', $content, $matches ) ) {
			$tweet_content = $matches[1];
			$doc = new DomDocument;
			$doc->loadHTML( $tweet_content );
			$links = $doc->getElementsByTagName( 'a' );
			foreach ( $links as $link ) {
				$link = $link->getAttribute( 'href' );
				if ( preg_match( $this->regex, $link ) ) {
					$content = str_replace( $matches[0], esc_url( $link ), $content );
					break;
				}
			}
		}
		// $content = addslashes( $content );
		return $content;
	}

	/**
	 * Tweet Shortcode Handler
	 *
	 * Handles the [tweet URL] shortcode, where URL is the 0'th
	 * attribute in $atts. Uses the WP_Embed class.
	 *
	 * @global $wp_embed
	 */
	function tweet_shortcode_handler( $atts ) {
		global $wp_embed;

		if ( ! isset( $atts[0] ) || ! preg_match( $this->regex, $atts[0], $matches ) )
			return;

		return $wp_embed->shortcode( array(), $atts[0] );
	}
}

// Initialize an object
new Twitter_Embed_Plugin;