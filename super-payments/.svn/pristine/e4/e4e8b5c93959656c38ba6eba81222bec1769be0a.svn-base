<?php
/**
 * Product ingestion events
 *
 * @package super-payments
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Check if the event response indicates success.
 *
 * @param mixed $response Response from wcsp_send_event.
 * @return bool True if successful, false otherwise.
 */
function wcsp_is_event_successful( $response ) {
	return ! ( is_wp_error( $response ) ||
		! is_array( $response ) ||
		empty( $response['response'] ) ||
		empty( $response['response']['code'] ) ||
		( 200 !== $response['response']['code'] && 201 !== $response['response']['code'] )
	);
}

/**
 * Process and schedule product ingestion batches.
 *
 * @param array $retry_item_ids Array of product or variation IDs to retry, or empty array to start/continue ingestion.
 * @param int   $retry_count Number of retry attempts for this batch.
 * @return void
 */
function wcsp_process_ingestion_batch( $retry_item_ids = [], $retry_count = 0 ) {
	// Maximum number of retry attempts per batch.
	$max_retries = 3;

	// If ingestion is completed, do nothing.
	$ingestion_status = get_option( 'wcsp_product_ingestion_status', 'not_started' );
	if ( 'completed' === $ingestion_status ) {
		return;
	}

	// Skip if max retries reached for this batch.
	if ( $retry_count >= $max_retries ) {
		return;
	}

	// Check API key and product ingestion setting.
	$gateway          = new WC_Super_Payments_Gateway();
	$api_key          = $gateway->get_option( 'api_key' );
	$enable_ingestion = $gateway->get_option( 'enable_product_ingestion' );

	if ( 'no' === $enable_ingestion ) {
		return;
	}

	if ( empty( $api_key ) ) {
		// If API key is empty, reschedule for tomorrow at 2 AM.
		$tomorrow_2am = strtotime( 'tomorrow 2:00', time() );
		as_schedule_single_action( $tomorrow_2am, 'wcsp_process_ingestion_batch', [ $retry_item_ids, $retry_count ], 'product-ingestion' );
		return;
	}

	// Set current page if we're starting fresh.
	$current_page = 1;
	if ( 'not_started' === $ingestion_status ) {
		update_option( 'wcsp_product_ingestion_status', $current_page );
	} elseif ( is_numeric( $ingestion_status ) ) {
		$current_page = (int) $ingestion_status;
	}

	// Get items to process.
	if ( empty( $retry_item_ids ) ) {
		$batch_size = 50;
		$item_ids   = wc_get_products(
			[
				'limit'   => $batch_size,
				'page'    => $current_page,
				'status'  => 'any',
				'return'  => 'ids',
				'orderby' => 'ID',
				'order'   => 'ASC',
			]
		);

		if ( empty( $item_ids ) ) {
			update_option( 'wcsp_product_ingestion_status', 'completed' );
			return;
		}
	} else {
		$item_ids = $retry_item_ids;
	}

	// Send batch started event.
	wcsp_send_event(
		'ProductIngestionBatchStarted',
		[
			'batchNumber' => $current_page,
			'itemCount'   => count( $item_ids ),
			'isRetry'     => ! empty( $retry_item_ids ),
			'retryCount'  => $retry_count,
		]
	);

	$failed_items  = [];
	$success_count = 0;

	foreach ( $item_ids as $item_id ) {
		$item = wc_get_product( $item_id );
		if ( ! $item ) {
			continue;
		}

		if ( $item->is_type( 'variation' ) ) {
			$parent = wc_get_product( $item->get_parent_id() );
			if ( ! $parent ) {
				continue;
			}
			$event_data = wcsp_get_variation_properties( $item, $parent );
			$event_type = 'ProductVariationIngested';
		} else {
			$event_data = array_merge(
				[ 'productId' => $item_id ],
				wcsp_get_product_properties( $item )
			);
			$event_type = 'ProductIngested';
		}

		$response = wcsp_send_event( $event_type, $event_data );

		if ( ! wcsp_is_event_successful( $response ) ) {
			$failed_items[] = $item_id;
			continue;
		}

		$success_count++;

		// Process variations if this is a variable product.
		if ( $item->is_type( 'variable' ) ) {
			$variations = $item->get_available_variations();
			foreach ( $variations as $variation_data ) {
				$variation_id = $variation_data['variation_id'];

				$variation = wc_get_product( $variation_id );
				if ( ! $variation ) {
					continue;
				}

				$event_data = wcsp_get_variation_properties( $variation, $item );
				$response   = wcsp_send_event( 'ProductVariationIngested', $event_data );
				if ( ! wcsp_is_event_successful( $response ) ) {
					$failed_items[] = $variation_id;
				} else {
					$success_count++;
				}
			}
		}
	}

	// Send batch completed event.
	wcsp_send_event(
		'ProductIngestionBatchCompleted',
		[
			'batchNumber'   => $current_page,
			'successCount'  => $success_count,
			'failureCount'  => count( $failed_items ),
			'isRetry'       => ! empty( $retry_item_ids ),
			'retryCount'    => $retry_count,
			'maxRetriesHit' => $retry_count + 1 >= $max_retries && ! empty( $failed_items ),
		]
	);

	// Check if we're within the processing window.
	$current_time = time();
	$today_2am    = strtotime( 'today 2:00', $current_time );
	$today_5am    = strtotime( 'today 5:00', $current_time );
	$next_run     = $current_time;

	// If we're outside of the processing window, schedule next run for the next 2 AM slot.
	if ( $current_time < $today_2am || $current_time >= $today_5am ) {
		$next_run = $current_time < $today_2am ? $today_2am : strtotime( 'tomorrow 2:00', $current_time );
	}

	// Schedule next batch or retry failed items.
	if ( ! empty( $failed_items ) ) {
		as_schedule_single_action(
			$next_run,
			'wcsp_process_ingestion_batch',
			[ $failed_items, $retry_count + 1 ],
			'product-ingestion'
		);
	} else {
		update_option( 'wcsp_product_ingestion_status', $current_page + 1 );
		as_schedule_single_action(
			$next_run,
			'wcsp_process_ingestion_batch',
			[ [], 0 ],
			'product-ingestion'
		);
	}
}

// Register the cron event hook.
add_action( 'wcsp_process_ingestion_batch', 'wcsp_process_ingestion_batch', 10, 2 );
