<?php

declare(strict_types=1);

namespace WPDesk\ShopMagic\Frontend\Session;

use WPDesk\ShopMagic\Helper\WooCommerceCookies;

final class CookiePersistence implements SessionPersistence {

	/** @var string */
	private $cookie_name;

	/** @var int */
	private $days_to_expire_cookie;

	public function __construct() {
		$this->cookie_name =
			/**
			 * Cookie name for customer tracking. Used to properly identify the same guest users.
			 *
			 * @param string $cookie_name Current cookie name. shopmagic_visitor_HASH by default.
			 *
			 * @return string New cookie name.
			 * @sice 2.17
			 */
			apply_filters( 'shopmagic/core/customer_interceptor/cookie_name', 'shopmagic_visitor_' . COOKIEHASH );

		$this->days_to_expire_cookie =
			/**
			 * The expiration time for customer tracking cookie.
			 *
			 * @param int $cookie_expiry Current cookie expiration. 365 by default.
			 *
			 * @return int New expiration time.
			 * @sice 2.17
			 * @see  shopmagic/core/customer_interceptor/cookie_name
			 */
			apply_filters( 'shopmagic/core/customer_interceptor/cookie_expiry', 365 );
	}

	public function get_tracking_data(): array {
		if ( ! $this->has_cookies_enabled() ) {
			return [];
		}

		$raw_data = WooCommerceCookies::get( $this->cookie_name );
		if ( strlen( $raw_data ) === 0 ) {
			return [];
		}

		return json_decode( wp_unslash( $raw_data ), true ) ?: [];
	}

	public function save_tracking_data( array $data ): void {
		if (
			headers_sent() ||
				$this->has_cookies_enabled() === false ||
				( empty( $data['email'] ) && empty( $data['user_id'] ) ) ||
				wp_unslash( WooCommerceCookies::get( $this->cookie_name ) ) === json_encode( $data )
		) {
			return;
		}

		WooCommerceCookies::set(
			$this->cookie_name,
			json_encode( $data ) ?: '',
			time() + $this->days_to_expire_cookie * DAY_IN_SECONDS
		);
	}

	private function has_cookies_enabled(): bool {
		/**
		 * Can be used to globally override cookie usage. When disabled no cookies will ever be created
		 * by the ShopMagic plugins.
		 *
		 * @param bool $enabled Current value. True by default.
		 *
		 * @returns bool
		 * @since 2.17
		 */
		return apply_filters( 'shopmagic/core/customer_interceptor/cookies_enabled', true );
	}
}
