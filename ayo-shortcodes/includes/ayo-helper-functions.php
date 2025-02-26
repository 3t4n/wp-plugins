<?php
/**
 * Helper functions
 *
 * @author   	AyoThemes
 * @package   	Ayo Shortcodes
 * @since 		0.1
 * @copyright 	Copyright (c) 2013, AyoThemes
 * @license  	http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 */

/** Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Function to strip WordPress autoformat
 * 
 * @since  	0.1
 */
function ayo_strip_autoformat( $text ) {
	$no_br = preg_replace("/<br.?\/>/is", "", $text);
	$no_p = preg_replace("/<p>/is", "", $no_br);
	return preg_replace("/<\/p>/is", "\n", $no_p);
}


/**
 * Retrieve coordinates for an address
 *
 * Coordinates are cached using transients and a hash of the address
 * @since 		0.1
 * @link 		http://pippinsplugins.com/simple-google-maps-short-code
 * @version 	1.0.2
 * @access      private
 * @return      void
*/
function ayo_get_map_coordinates( $address, $force_refresh = false ) {
	
    $address_hash = md5( $address );

    $coordinates = get_transient( $address_hash );

    if ($force_refresh || $coordinates === false) {

    	$args       = array( 'address' => urlencode( $address ), 'sensor' => 'false' );
    	$url        = add_query_arg( $args, 'http://maps.googleapis.com/maps/api/geocode/json' );
     	$response 	= wp_remote_get( $url );

     	if( is_wp_error( $response ) )
     		return;

     	$data = wp_remote_retrieve_body( $response );

     	if( is_wp_error( $data ) )
     		return;

		if ( $response['response']['code'] == 200 ) {

			$data = json_decode( $data );

			if ( $data->status === 'OK' ) {

			  	$coordinates = $data->results[0]->geometry->location;

			  	$cache_value['lat'] 	= $coordinates->lat;
			  	$cache_value['lng'] 	= $coordinates->lng;
			  	$cache_value['address'] = (string) $data->results[0]->formatted_address;

			  	// cache coordinates for 3 months
			  	set_transient($address_hash, $cache_value, 3600*24*30*3);
			  	$data = $cache_value;

			} elseif ( $data->status === 'ZERO_RESULTS' ) {
			  	return __( 'No location found for the entered address.', 'ayoshortcodes' );
			} elseif( $data->status === 'INVALID_REQUEST' ) {
			   	return __( 'Invalid request. Did you enter an address?', 'ayoshortcodes' );
			} else {
				return __( 'Something went wrong while retrieving your map, please ensure you have entered the short code correctly.', 'ayoshortcodes' );
			}

		} else {
		 	return __( 'Unable to contact Google API service.', 'ayoshortcodes' );
		}

    } else {
       // return cached results
       $data = $coordinates;
    }

    return $data;
}

/**
 * Adds links to the contents of a tweet.
 *
 * Takes the content of a tweet, detects @replies, #hashtags, and
 * http:// links, and links them appropriately.
 *
 * @since 		0.1
 * @link 		http://www.snipe.net/2009/09/php-twitter-clickable-links/
 * @param 		string $text A string representing the content of a tweet
 * @return 		string Linkified tweet content
 */
function ayo_link_twitterify( $text ) {

	$text = preg_replace( "#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", '\\1<a href="\\2" target="_blank">\\2</a>', $text );
	$text = preg_replace( "#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", '\\1<a href="http://\\2" target="_blank">\\2</a>', $text );
	$text = preg_replace( '/@(\w+)/', '<a href="http://www.twitter.com/\\1" target="_blank">@\\1</a>', $text );
	$text = preg_replace( '/#(\w+)/', '<a href="http://search.twitter.com/search?q=\\1" target="_blank">#\\1</a>', $text );

	return $text;

}