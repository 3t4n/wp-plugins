<?php
/**
 * Elusive controller
 *
 * @package Spam Master
 */

/**
 * Main elusive class.
 *
 * @since 6.0.0
 */
class SpamMasterElusiveController {

	/**
	 * Variable spam_elusive.
	 *
	 * @var spam_elusive $spam_elusive
	 **/
	protected $spam_elusive;

	/**
	 * Variable dest_url.
	 *
	 * @var dest_url $dest_url
	 **/
	protected $dest_url;

	/**
	 * Spam master elusive.
	 *
	 * @param spam_elusive $spam_elusive for collection.
	 * @param dest_url     $dest_url for scan.
	 *
	 * @return string
	 */
	public function spammasterelusive( $spam_elusive, $dest_url ) {
		global $wpdb, $blog_id;

		// Add Table and load spam master options.
		if ( is_multisite() ) {
			$spam_master_keys = $wpdb->get_blog_prefix( $blog_id ) . 'spam_master_keys';
		} else {
			$spam_master_keys = $wpdb->prefix . 'spam_master_keys';
		}

		// Check malformed uris.
		if ( ! empty( $dest_url ) ) {
			if ( stripos( $dest_url, 'autodiscover.xml' ) !== false || stripos( $dest_url, 'wp_1_wc_privacy_cleanup' ) !== false ) {

				// Spam Buffer Controller.
				$spam_master_buffer_controller = new SpamMasterBufferController();
				$is_buffer_count               = $spam_master_buffer_controller->spammasterbuffercount();

				$bail = 'bail';
				return $bail;
			}
		}

		// Start scan of post.
		if ( ! empty( $spam_elusive ) && is_array( $spam_elusive ) ) {
			$spam_elusive_count = count( $spam_elusive );
			if ( 1 === $spam_elusive_count ) {
				if ( isset( $spam_elusive['time'] ) || isset( $spam_elusive['security'] ) || isset( $spam_elusive['cart_nonce'] ) || isset( $spam_elusive['cart_item_key'] ) || isset( $spam_elusive['product_ids'] ) ) {
					// Spam Buffer Controller.
					$spam_master_buffer_controller = new SpamMasterBufferController();
					$is_buffer_count               = $spam_master_buffer_controller->spammasterbuffercount();

					$bail = 'bail';
					return $bail;
				}
			}
			if ( 2 === $spam_elusive_count ) {
				if ( isset( $spam_elusive['security'] ) && isset( $spam_elusive['shipping_method'] ) ) {
					// Spam Buffer Controller.
					$spam_master_buffer_controller = new SpamMasterBufferController();
					$is_buffer_count               = $spam_master_buffer_controller->spammasterbuffercount();

					$bail = 'bail';
					return $bail;
				}
				if ( isset( $spam_elusive['product_id'] ) ) {
					// Spam Buffer Controller.
					$spam_master_buffer_controller = new SpamMasterBufferController();
					$is_buffer_count               = $spam_master_buffer_controller->spammasterbuffercount();

					$bail = 'bail';
					return $bail;
				}
			}
			if ( 3 === $spam_elusive_count ) {
				if ( isset( $spam_elusive['product_sku'] ) && isset( $spam_elusive['product_id'] ) && isset( $spam_elusive['quantity'] ) ) {
					// Spam Buffer Controller.
					$spam_master_buffer_controller = new SpamMasterBufferController();
					$is_buffer_count               = $spam_master_buffer_controller->spammasterbuffercount();

					$bail = 'bail';
					return $bail;
				}
				if ( isset( $spam_elusive['security'] ) && isset( $spam_elusive['shipping_method'] ) && isset( $spam_elusive['is_product_page'] ) ) {
					// Spam Buffer Controller.
					$spam_master_buffer_controller = new SpamMasterBufferController();
					$is_buffer_count               = $spam_master_buffer_controller->spammasterbuffercount();

					$bail = 'bail';
					return $bail;
				}
			}
			if ( 4 === $spam_elusive_count ) {
				if ( isset( $spam_elusive['security'] ) && isset( $spam_elusive['price'] ) && isset( $spam_elusive['currency'] ) && isset( $spam_elusive['country'] ) ) {
					// Spam Buffer Controller.
					$spam_master_buffer_controller = new SpamMasterBufferController();
					$is_buffer_count               = $spam_master_buffer_controller->spammasterbuffercount();

					$bail = 'bail';
					return $bail;
				}
				if ( isset( $spam_elusive['security'] ) && isset( $spam_elusive['product_id'] ) && isset( $spam_elusive['qty'] ) && isset( $spam_elusive['addon_value'] ) ) {
					// Spam Buffer Controller.
					$spam_master_buffer_controller = new SpamMasterBufferController();
					$is_buffer_count               = $spam_master_buffer_controller->spammasterbuffercount();

					$bail = 'bail';
					return $bail;
				}
				if ( isset( $spam_elusive['order_id'] ) && isset( $spam_elusive['intent_id'] ) && isset( $spam_elusive['payment_method_id'] ) && isset( $spam_elusive['_ajax_nonce'] ) ) {
					// Spam Buffer Controller.
					$spam_master_buffer_controller = new SpamMasterBufferController();
					$is_buffer_count               = $spam_master_buffer_controller->spammasterbuffercount();

					$bail = 'bail';
					return $bail;
				}
				if ( isset( $spam_elusive['security'] ) && isset( $spam_elusive['shipping_method'] ) && isset( $spam_elusive['payment_request_type'] ) && isset( $spam_elusive['is_product_page'] ) ) {
					// Spam Buffer Controller.
					$spam_master_buffer_controller = new SpamMasterBufferController();
					$is_buffer_count               = $spam_master_buffer_controller->spammasterbuffercount();

					$bail = 'bail';
					return $bail;
				}
			}
			if ( 5 === $spam_elusive_count ) {
				if ( isset( $spam_elusive['security'] ) && isset( $spam_elusive['product_id'] ) && isset( $spam_elusive['qty'] ) && isset( $spam_elusive['attributes'] ) && isset( $spam_elusive['addon_value'] ) ) {
					// Spam Buffer Controller.
					$spam_master_buffer_controller = new SpamMasterBufferController();
					$is_buffer_count               = $spam_master_buffer_controller->spammasterbuffercount();

					$bail = 'bail';
					return $bail;
				}
			}
			if ( 6 === $spam_elusive_count ) {
				if ( isset( $spam_elusive['product_id'] ) && isset( $spam_elusive['variation_id'] ) && isset( $spam_elusive['qty'] ) && isset( $spam_elusive['payment_method'] ) && isset( $spam_elusive['currency'] ) && isset( $spam_elusive['page_id'] ) ) {
					// Spam Buffer Controller.
					$spam_master_buffer_controller = new SpamMasterBufferController();
					$is_buffer_count               = $spam_master_buffer_controller->spammasterbuffercount();

					$bail = 'bail';
					return $bail;
				}
			}
			if ( 7 === $spam_elusive_count ) {
				if ( isset( $spam_elusive['product_id'] ) && isset( $spam_elusive['variation_id'] ) && isset( $spam_elusive['qty'] ) && isset( $spam_elusive['payment_method'] ) && isset( $spam_elusive['currency'] ) && isset( $spam_elusive['page_id'] ) && isset( $spam_elusive['attribute_color'] ) ) {
					// Spam Buffer Controller.
					$spam_master_buffer_controller = new SpamMasterBufferController();
					$is_buffer_count               = $spam_master_buffer_controller->spammasterbuffercount();

					$bail = 'bail';
					return $bail;
				}
				if ( isset( $spam_elusive['product_id'] ) && isset( $spam_elusive['variation_id'] ) && isset( $spam_elusive['qty'] ) && isset( $spam_elusive['payment_method'] ) && isset( $spam_elusive['currency'] ) && isset( $spam_elusive['page_id'] ) && isset( $spam_elusive['attribute_size'] ) ) {
					// Spam Buffer Controller.
					$spam_master_buffer_controller = new SpamMasterBufferController();
					$is_buffer_count               = $spam_master_buffer_controller->spammasterbuffercount();

					$bail = 'bail';
					return $bail;
				}
			}
			if ( isset( $spam_elusive['rcp_user_email'] ) ) {
				if ( empty( $spam_elusive['rcp_user_email'] ) ) {
					// Spam Buffer Controller.
					$spam_master_buffer_controller = new SpamMasterBufferController();
					$is_buffer_count               = $spam_master_buffer_controller->spammasterbuffercount();

					$bail = 'bail';
					return $bail;
				}
			}
			$spampoststr = str_replace( '=', ' ', urldecode( http_build_query( $spam_elusive, '', ' ' ) ) );
			// Plugins without action key check other keys.
			// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.PreparedSQL.InterpolatedNotPrepared
			$spam_master_exempt_key = $wpdb->get_var(
				$wpdb->prepare(
					// phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
					"SELECT spamvalue FROM {$spam_master_keys} WHERE spamkey = %s AND spamtype = %s AND POSITION(spamvalue IN %s) > %s",
					'Option',
					'exempt-key',
					$spampoststr,
					'0',
				)
			);
			if ( ! empty( $spam_master_exempt_key ) ) {
				// Spam Buffer Controller.
				$spam_master_buffer_controller = new SpamMasterBufferController();
				$is_buffer_count               = $spam_master_buffer_controller->spammasterbuffercount();

				$bail = 'bail';
				return $bail;
			}
			// Plugins without action key check other keys values.
			// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.PreparedSQL.InterpolatedNotPrepared
			$spam_master_exempt_value = $wpdb->get_var(
				$wpdb->prepare(
					// phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
					"SELECT spamvalue FROM {$spam_master_keys} WHERE spamkey = %s AND spamtype = %s AND POSITION(spamvalue IN %s) > %s",
					'Option',
					'exempt-value',
					$spampoststr,
					'0',
				)
			);
			if ( ! empty( $spam_master_exempt_value ) ) {
				// Spam Buffer Controller.
				$spam_master_buffer_controller = new SpamMasterBufferController();
				$is_buffer_count               = $spam_master_buffer_controller->spammasterbuffercount();

				$bail = 'bail';
				return $bail;
			}
			// Plugins via action key.
			if ( isset( $spam_elusive['action'] ) ) {
				// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.PreparedSQL.InterpolatedNotPrepared
				$spam_master_exempt_action = $wpdb->get_var(
					$wpdb->prepare(
						// phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
						"SELECT spamvalue FROM {$spam_master_keys} WHERE spamkey = %s AND spamtype = %s AND POSITION(spamvalue IN %s) > %s",
						'Option',
						'exempt-action',
						$spam_elusive['action'],
						'0',
					)
				);
				if ( ! empty( $spam_master_exempt_action ) ) {
					// Spam Buffer Controller.
					$spam_master_buffer_controller = new SpamMasterBufferController();
					$is_buffer_count               = $spam_master_buffer_controller->spammasterbuffercount();

					$bail = 'bail';
					return $bail;
				}
			}

			// Collect email to scan.
			preg_match( '/[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})/i', $spampoststr, $matches );
			if ( $matches ) {
				// Spam Buffer Controller.
				$spam_master_buffer_controller = new SpamMasterBufferController();
				$is_buffer_count               = $spam_master_buffer_controller->spammasterbuffercount();
				foreach ( $matches as $key => $val ) {
					if ( filter_var( $val, FILTER_VALIDATE_EMAIL ) ) {
						$bail = wp_strip_all_tags( substr( $val, 0, 256 ) );
						return $bail;
					} else {
						$bail = 'haf@' . wp_rand( 10000000, 99999999 ) . '.wp';
						return $bail;
					}
				}
			} else {
				// Spam Buffer Controller.
				$spam_master_buffer_controller = new SpamMasterBufferController();
				$is_buffer_count               = $spam_master_buffer_controller->spammasterbuffercount();
				$bail                          = 'haf@' . wp_rand( 10000000, 99999999 ) . '.wp';
				return $bail;
			}
		} else {
			$bail = 'bail';
			return $bail;
		}
	}

}
