<?php
/**
 * Add Overcast Payments to Seriously Simple Podcasting.
 *
 * @package overcast-ss-podcasting
 */

/**
 * Plugin Name: Add Overcast payments to Seriously Simple Podcasting
 * Version: 0.5.0
 * Description: Add payments in Overcast for Seriously Simple Podcasting.
 * Author: Jake Spurlock
 * Author URI: http://jakespurlock.com
 * Text Domain: overcast-ss-podcasting
 * Domain Path: /languages
 */

add_filter( 'ssp_settings_fields', 'overcast_add_new_settings' );

/**
 * Add new settings with a new tab to Seriously Simple Podcasting.
 *
 * @param  array $settings Array of fields to pass into the main array of settings options of Seriously Simple Podcasting.
 * @return array The full array.
 */
function overcast_add_new_settings( $settings ) {

	$settings['podtrac'] = array(
		'title'       => __( 'Overcast', 'overcast-ss-podcasting' ),
		'description' => __( 'For users that are using Overcast, with the relase of an update coming in fall 2018, Overcast will display a currency-symbol button that opens a payment, membership, donation, Patreon, etc. URL when present in the currently playing episode’s HTML body (“show notes”).', 'overcast-ss-podcasting' ),
		'fields'      => array(
			array(
				'id'          => 'payment_url',
				'label'       => __( 'Overcast Payment URL', 'overcast-ss-podcasting' ),
				'description' => __( 'Add URL to payment/donation/Patreon page.', 'overcast-ss-podcasting' ),
				'type'        => 'text',
				'default'     => '',
				'placeholder' => __( 'Payment URL', 'overcast-ss-podcasting' ),
				'callback'    => 'esc_url_raw',
				'class'       => 'regular-text',
			),
		),
	);

	return $settings;
}

add_filter( 'the_content_feed', 'add_overcast_payment_url', 10, 3 );

/**
 * If we have the option enabled for the measurement service, filter that onto the URL.
 *
 * @param  string  $content       The URL pointing to the file download.
 * @param  integer $episode_id    The post ID of the podcast episode.
 * @return string                 The URL pointing to the file download.
 */
function add_overcast_payment_url( $content, $episode_id ) {
	$payment_url = get_option( 'ss_podcasting_payment_url' );

	if ( ! empty( $payment_url ) ) {
		$content = sprintf( "%s\n<div class='payment'><a href='%s' rel='payment'>Support our show</a></div>", $content, esc_url( $payment_url ) );
	}

	return $content;
}
