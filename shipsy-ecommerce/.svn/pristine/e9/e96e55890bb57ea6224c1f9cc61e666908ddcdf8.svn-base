<?php
/**
 * The file contains settings to be used by the plugin.
 *
 * @link       https://shipsy.io/
 * @since      1.0.0
 *
 * @package    Shipsy_Econnect
 * @subpackage Shipsy_Econnect/admin
 */

//phpcs:disable
require 'base.php';

$BASE_URL = $BASE_URL = 'https://app.shipsy.in';
$PROJECTX_INTEGRATION_CONFIG = array(
	'1' => 'https://dtdcapi.shipsy.io'
);

$ORGANISATION = 'Shipsy';
$ORIGIN_COUNTRY = 'India';
$DOMESTIC = True;

$VALID_CONSIGNMENT_STATUSES = array(
	'pickup_scheduled' => array(
		'status' => 'Pickup Scheduled',
		'comment' => 'Waiting for pickup',
		'style' => array(
			'background' => '#e5e5e5',
			'color'      => '#777',
		)
	),
	'out_for_pickup' => array(
		'status' => 'Out for Pickup',
		'comment' => 'Out for pickup',
		'style' => array(
			'background' => '#e5e5e5',
			'color'      => '#777',
		)
	),
	'reached_at_hub' => array(
		'status' => 'Reached at Hub',
		'comment' => 'Order reached at hub',
		'style' => array(
			'background' => '#e5e5e5',
			'color'      => '#777',
		)
	),
	'outfordelivery' => array(
		'status' => 'Out for Delivery',
		'comment' => 'Out for delivery',
		'style' => array(
			'background' => '#e5e5e5',
			'color'      => '#777',
		)
	),
	'attempted' => array(
		'status' => 'Attempted',
		'comment' => 'Delivery attempted',
		'style' => array(
			'background' => '#e5e5e5',
			'color'      => '#777',
		)
	),
	'delivered' => array(
		'status' => 'Delivered',
		'comment' => 'Order successfully delivered',
		'style' => array(
			'background' => '#c6e1c6',
			'color'      => '#5b841b',
		)
	),
	'cancelled' => array(
		'status' => 'Cancelled',
		'comment' => 'Order cancelled',
		'style' => array(
			'background' => '#e5adae',
			'color'      => '#6d4546',
		)
	)
);

/*
Unset the local variables after use, or else they will leak into the files where
we include this file
*/
unset( $API );  // phpcs:ignore
unset( $URL );  // phpcs:ignore
//phpcs:enable
