<?php
/**
 * @package audiodub
 * @version 1.0.2
*/

/*
Plugin Name: Audiodub
Plugin URI: https://www.audiodub.app/learn
Description: Convert your blog into a podcast in seconds.
Author: Audiodub
Version: 1.0.2
License: GPL-3.0
License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

/**
 * The [audiodub] shortcode.
 *
 * Places the audiodub player at this location
 *
 * Params are ignored for now;
 * @param array  $atts    Shortcode attributes. Default empty.
 * @param string $content Shortcode content. Default null.
 * @param string $tag     Shortcode tag (name). Default empty.
 * @return string Shortcode output.
 */
function audiodub_shortcode( $atts = [], $content = null, $tag = '' ) {
    // Enqueue the script to the footer to load all the audio
    wp_enqueue_script( 'audiodub', 'https://sdk.audiodub.app/free.js', null, null, true );
 
    // Create the player stub to be populated
    return '<div id="audiodub-player"></div>';
}
 
/**
 * Initialize the audiodub shortcode
 */
function audiodub_shortcodes_init() {
    add_shortcode( 'audiodub', 'audiodub_shortcode' );
}
 
add_action( 'init', 'audiodub_shortcodes_init' );
