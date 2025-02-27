<?php
/**
 * Cart related events
 *
 * @package super-payments
 */

/**
 * Send cart id created event.
 *
 * @param string $super_cart_id ID of the cart.
 *
 * @return void
 */
function wcsp_send_cart_id_created_event( $super_cart_id ) {
	wcsp_send_event(
		'CartIdCreated',
		[
			'id'                => $super_cart_id,
			'cartIdDateCreated' => gmdate( DATE_ISO8601 ),
		]
	);
}
add_action( 'wcsp_cart_id_generated', 'wcsp_send_cart_id_created_event', 10, 1 );
