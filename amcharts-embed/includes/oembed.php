<?php
/**
 * Security check
 * Prevent direct access to the file.
 *
 * @since 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/**
 * amCharts oEmbed
 * Register oEmbed provider.
 *
 * @since 1.0
 */
function amcharts_oembed_provider() {

	wp_oembed_add_provider( '#https?://live.amcharts.com/.*#i', 'http://live.amcharts.com/oembed/', true );

}
add_action( 'init', 'amcharts_oembed_provider' );
