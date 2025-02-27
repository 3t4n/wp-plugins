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
 * Jigsaw Planet oEmbed
 * Register oEmbed provider.
 *
 * @since 1.0
 */
function jigsaw_planet_oembed_provider() {

	wp_oembed_add_provider( 'http://jigsawplanet.com/*', 'https://www.jigsawplanet.com/api/oembed/game/' );
	wp_oembed_add_provider( 'https://jigsawplanet.com/*', 'https://www.jigsawplanet.com/api/oembed/game/' );
	wp_oembed_add_provider( 'http://www.jigsawplanet.com/*', 'https://www.jigsawplanet.com/api/oembed/game/' );
	wp_oembed_add_provider( 'https://www.jigsawplanet.com/*', 'https://www.jigsawplanet.com/api/oembed/game/' );
	//wp_oembed_add_provider( '#https?://(www\.)?jigsawplanet.com/.*#i', 'https://www.jigsawplanet.com/api/oembed/game/', true );

}
add_action( 'init', 'jigsaw_planet_oembed_provider' );
