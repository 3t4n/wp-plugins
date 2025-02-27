<?php
/**
 * The file that defines the Genral functions of this plugin.
 *
 * @link       https://wbcomdesigns.com
 * @since      1.0.0
 *
 * @package    Buddypress_Ads_Rotator
 * @subpackage Buddypress_Ads_Rotator/includes
 */
function wb_ads_rotator_gets_ads_id() {
	global $post;
	$args = array(
		'post_type' => 'wb-ads',
		'fields'    => 'ids',
	);

	$wb_ads_rotator_get_ads_ids = get_posts( $args );
	foreach ( $wb_ads_rotator_get_ads_ids as $wb_ads_rotator_get_ads_id ) {
		return apply_filters( 'alter_wb_ads_rotator_gets_ads_id', $wb_ads_rotator_get_ads_id );
	}
}
