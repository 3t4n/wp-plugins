<?php
/**
 * Display Ads in web pages.
 */

global $wpdb;

// Get user custamized shortcode tag from DB table.
$result = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}option WHERE option_name = 'zumi_ad_tag'" );


// If the user haven't setup custimize tag, use 'ad'.
$ad_tag = $result[0] ?? 'ad';


// Add shortcode.
add_shortcode(
	$ad_tag,
	function( $attrs, $content ) {

		// Get Ad id.
		$ad_id = $attrs[0];

		// Get the record from DB.
		$ad = ZumiAd::get( $ad_id );

			// If id doesn't existst return message.
		if ( null === $ad ) {
			return 'Not Exists';
		}

		// Get code.
		$code = $ad->code;

		// Convert {text}.
		$code = str_replace( '{text}', $content, $code );

		// Loop attributes.
		foreach ( $attrs as $key => $attr ) {
			// If the key is not number.
			if ( ! is_numeric( $key ) ) {
				// Convert {key} into $attr value.
				$code = str_replace( '{' . $key . '}', $attr, $code );
			}
		}
		// Do shortcode.
		$code = do_shortcode( $code );

		return $code;

	}
);


// Add shortcodes which are registered by the user.

// Get all records.
$zumi_shortcodes = ZumiAdShortcode::all();

// Loop all shortcode records.
foreach ( $zumi_shortcodes as $shortcode ) {
	// Add shortcode.
	add_shortcode(
		$shortcode->tag,
		function( $attrs, $content, $tag ) {

			global $zumi_shortcodes;

			// Get the shortcode record from the tag.
			foreach ( $zumi_shortcodes as $shortcode ) {
				if ( $shortcode->tag === $tag ) {
					break;
				}
			}

			// Do shortcode and return it.
			return do_shortcode( $shortcode->content );
		}
	);
}



// Display fixed_ads which are registered by the user.

// Get all records.
$zumi_fixed_ads = ZumiFixedAd::all();

// Loop all ads.
foreach ( $zumi_fixed_ads as $ad ) {
	$content = $ad->content;
	// If the position is before content.
	if ( 'before_content' === $ad->position ) {
		// Add it before content with add_filter.
		add_filter(
			'the_content',
			function( $the_content ) use ( $content ) {
				return $content . $the_content;
			}
		);
	}

	// If the position is after content.
	if ( 'after_content' === $ad->position ) {
		// Add it after content with add_filter.
		add_filter(
			'the_content',
			function ( $the_content ) use ( $content ) {
				return $the_content . $content;
			}
		);
	}
}
