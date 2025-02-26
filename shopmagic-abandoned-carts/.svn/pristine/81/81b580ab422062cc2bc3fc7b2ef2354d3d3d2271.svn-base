<?php

declare( strict_types=1 );

namespace WPDesk\ShopMagicCart\Interceptor;

use ShopMagicVendor\Psr\Log\LoggerInterface;
use ShopMagicCartVendor\WPDesk\PluginBuilder\Plugin\Hookable;
use WC_Order;
use WPDesk\ShopMagic\Customer\CustomerProvider;
use WPDesk\ShopMagic\Customer\CustomerRepository;
use WPDesk\ShopMagic\Exception\CannotProvideItemException;
use WPDesk\ShopMagic\Exception\ShopMagicException;
use WPDesk\ShopMagic\Helper\Conditional;
use WPDesk\ShopMagic\Helper\RestRequestUtil;
use WPDesk\ShopMagic\Helper\WooCommerceCookies;
use WPDesk\ShopMagicCart\Cart\AbandonedCart;
use WPDesk\ShopMagicCart\Cart\ActiveCart;
use WPDesk\ShopMagicCart\Cart\Cart;
use WPDesk\ShopMagicCart\Cart\CartFactory;
use WPDesk\ShopMagicCart\Cart\OrderedCart;
use WPDesk\ShopMagicCart\Cart\SubmittedCart;
use WPDesk\ShopMagicCart\Database\CartManager;
use WPDesk\ShopMagicCart\Database\CartRepository;

final class CartInterceptor implements Hookable, Conditional {
	const SESSION_TOKEN_KEY      = 'shopmagic_cart_token';
	const COOKIE_IS_CHANGED_NAME = 'shopmagic_cookie';

	/** @var CustomerProvider */
	private $customer_provider;

	/** @var LoggerInterface */
	private $logger;

	/** @var bool */
	private $is_changed = false;

	/** @var CartRepository */
	private $repository;

	/** @var CartManager */
	private $manager;

	/** @var CartFactory */
	private $factory;

	/** @var CustomerRepository */
	private $customer_repository;

	public function __construct(
		CartManager $manager,
		CartFactory $factory,
		CustomerRepository $customer_repository,
		CustomerProvider $customer_provider,
		LoggerInterface $logger
	) {
		$this->repository          = $manager->get_repository();
		$this->manager             = $manager;
		$this->factory             = $factory;
		$this->customer_repository = $customer_repository;
		$this->customer_provider   = $customer_provider;
		$this->logger              = $logger;
	}

	public function hooks(): void {
		add_action( 'woocommerce_add_to_cart', [ $this, 'set_changed' ] );
		add_action( 'woocommerce_applied_coupon', [ $this, 'set_changed' ] );
		add_action( 'woocommerce_removed_coupon', [ $this, 'set_changed' ] );
		add_action( 'woocommerce_cart_item_removed', [ $this, 'set_changed' ] );
		add_action( 'woocommerce_cart_item_restored', [ $this, 'set_changed' ] );
		add_action( 'woocommerce_before_cart_item_quantity_zero', [ $this, 'set_changed' ] );
		add_action( 'woocommerce_after_cart_item_quantity_update', [ $this, 'set_changed' ] );
		add_action( 'shopmagic/core/customer_interceptor/changed', [ $this, 'set_changed' ] );

		add_action( 'woocommerce_after_calculate_totals', [ $this, 'trigger_update_on_cart_and_checkout_pages' ] );

		add_action( 'wp_login', [ $this, 'set_changed_into_cookie' ], 20 );
		add_action( 'wp', [ $this, 'set_changed_from_cookie' ], 99 );

		add_action( 'shutdown', [ $this, 'save_cart' ] );

		add_action( 'woocommerce_checkout_order_processed', [ $this, 'sync_cart_with_order' ] );

		// We are hooked to late to inject action in API checkout
		// add_action( 'woocommerce_store_api_checkout_order_processed', [ $this, 'sync_cart_with_order' ] );

		add_action(
			'woocommerce_order_status_changed',
			[ $this, 'mark_as_ordered' ],
			10,
			4
		);
	}

	/** @internal */
	public function save_cart(): void {
		try {
			$this->do_save_cart();
		} catch ( \Throwable $e ) {
			$this->logger->critical( 'Impossible to save user cart!', [ 'exception' => $e->getMessage() ] );
		}
	}

	private function do_save_cart(): void {
		if ( ! $this->should_save_cart() ) {
			return;
		}

		$cart = $this->get_cart();
		if ( ! $cart instanceof ActiveCart ) {
			$this->logger->notice( 'Found cart "{cid}" is no longer active. Ignoring.', [ 'cid' => $cart->get_id() ] );
			return;
		}

		$this->store_tracking_key( $cart->get_token() );
		$cart->sync( WC()->cart, $this->customer_provider->get_customer() );

		if ( count( $cart->get_items() ) > 0 ) {
			$saved = $this->manager->save( $cart );
			$this->logger->info(
				'Saved cart "{cid}" for {type}',
				[
					'cid'     => $cart->get_id(),
					'type'    => $cart->get_customer()->is_guest() ? 'guest' : 'user',
					'email'    => $cart->get_customer()->get_email(),
					'ua'    => self::get_user_agent(),
					'success' => $saved,
				]
			);
			return;
		}

		if ( $cart->get_id() !== null && $cart->get_status() === 'active' ) {
			$deleted = $this->manager->delete( $cart );
			$this->logger->info(
				'Deleted empty cart "{cid}" for {type}',
				[
					'cid'     => $cart->get_id(),
					'type'    => $cart->get_customer()->is_guest() ? 'guest' : 'user',
					'success' => $deleted,
				]
			);
		}
	}

	private function should_save_cart(): bool {
		if ( ! $this->is_changed ) {
			return false;
		}
		if ( is_admin() && ! wp_doing_ajax() ) {
			return false;
		}
		if ( did_action( 'wp_logout' ) ) {
			return false;
		}
		if ( ! $this->customer_provider->is_customer_provided() ) {
			return false;
		}
		if ( ! WC()->cart ) {
			return false;
		}

		if ( ! WC()->session ) {
			return false;
		}

		// ensure checkout has not been processed in the last 5 minutes
		// this is a fallback for a rare case when the cart session is not cleared after checkout.
		$last_checkout = WC()->session->get( 'shopmagic_checkout_processed_time' );
		if ( $last_checkout && $last_checkout > ( time() - 5 * MINUTE_IN_SECONDS ) ) {
			$this->logger->debug(
				'Skip saving a cart. It was recently purchased.',
				[
					'purchased_at' => date( 'Y-m-d H:i:s', (int) $last_checkout ),
					'ua'           => self::get_user_agent(),
				]
			);

			return false;
		}

		return true;
	}

	/**
	 * @param \WC_Order|int $order
	 * @return void
	 * @internal
	 */
	public function sync_cart_with_order( $order ) {
		if ( ! WC()->session instanceof \WC_Session ) {
			$this->logger->error( 'Cart-order synchronization performed without session context!', [ 'order' => gettype( $order ) ] );
			return;
		}

		if ( is_int( $order ) ) {
			$order = wc_get_order( $order );
		}

		if ( ! $order instanceof WC_Order ) {
			$this->logger->error(
				'Impossible to sync cart with order! Invalid order type.',
				[ 'order' => gettype( $order ) ]
			);
			return;
		}

		$this->logger->debug(
			'Syncing cart with order {oid}...',
			[
				'oid' => $order->get_id(),
				'ua'  => self::get_user_agent(),
			]
		);

		try {
			$cart = $this->repository->find_one_by_customer( $this->customer_repository->find_by_email( $order->get_billing_email() ) );
			$this->logger->debug(
				'Found previous user cart by user email.',
				[
					'oid' => $order->get_id(),
					'cid' => $cart->get_id(),
				]
			);
		} catch ( ShopMagicException $e ) {
			$this->logger->warning(
				'Customer cart for order email not found. Trying to get cart from session data...',
				[
					'order_id'       => $order->get_id(),
					'customer_email' => $order->get_billing_email(),
					'exception'      => $e->getMessage(),
				]
			);

			$cart = $this->get_cart();
		}

		if ( $cart->get_id() === null ) {
			$this->logger->error( 'No existing cart found for order {oid}!', [ 'oid' => $order->get_id() ] );
			return;
		}

		try {
			$submitted_cart = SubmittedCart::convert( $cart );
		} catch ( \InvalidArgumentException $e ) {
			$this->logger->error(
				'An error occurred during converting cart {cid} to submitted cart. Reason: {message}',
				[
					'cid'         => $cart->get_id(),
					'oid'         => $order->get_id(),
					'message'     => $e->getMessage(),
					'cart_status' => $cart->get_status(),
				]
			);
			return;
		}
		$submitted_cart->bind_with_order( $order );
		$order->save();

		$saved = $this->manager->save( $submitted_cart );
		if ( $saved ) {
			$this->logger->info(
				'Cart "{cid}" successfully saved after order. Cart status is "{status}"',
				[
					'cid'    => $submitted_cart->get_id(),
					'status' => $submitted_cart->get_status(),
				]
			);
		} else {
			$this->logger->warning( 'An error occurred during saving cart "{cid}"', [ 'cid' => $submitted_cart->get_id() ] );
		}

		$this->separate_cart_from_session();
	}

	private function get_cart(): Cart {
		$token = $this->get_tracking_key();

		$this->logger->debug( 'Attempting to find cart by token...' );

		try {
			$cart = $this->repository->find_one_by( [ 'token' => $token ] );
			$this->logger->debug(
				'Found cart "{cid}" with token',
				[
					'cid'   => $cart->get_id(),
					'token' => $token,
				]
			);

			return $cart;
		} catch ( CannotProvideItemException $e ) {
			$this->logger->debug( 'Could not find cart by token. Attempting to find cart by session-provided customer...', [ 'token' => $token ] );
		}

		try {
			$cart = $this->repository->find_one_by_customer( $this->customer_provider->get_customer() );
			$this->logger->debug( 'Found cart "{cid}" by session-provided customer', [ 'cid' => $cart->get_id() ] );

			// Refresh token.
			if ( empty( $cart->get_token() ) ) {
				$cart->set_token( $token );
			}

			return $cart;
		} catch ( ShopMagicException $e ) {
			// Fallthrough to new cart.
		}

		$this->logger->debug( 'No cart found. Returning a new cart.' );
		return $this->factory->with_token( $token );
	}

	/** @param \WC_Order $order */
	public function mark_as_ordered( $id, $from, $to, $order ): void {
		if ( ! $order instanceof WC_Order ) {
			return;
		}

		if ( ! $order->is_paid() ) {
			return;
		}

		$cart_id = $order->get_meta( 'shopmagic_cart_id' );

		if ( is_numeric( $cart_id ) ) {
			$cart_finder = fn () => $this->repository->find( $cart_id );
		} else {
			$cart_finder = fn () => $this->repository->find_one_by_customer( $this->customer_repository->find_by_email( $order->get_billing_email() ) );
		}

		try {
			$cart = $cart_finder();
		} catch ( CannotProvideItemException $e ) {
			$this->logger->error(
				'Failed to associate any cart with order "{oid}"!',
				[
					'oid'       => $order->get_id(),
					'exception' => $e->getMessage(),
				]
			);
			return;
		}

		$this->logger->debug(
			'Attempting to mark potential cart as ordered for order {oid}...',
			[ 'oid' => $order->get_id() ]
		);

		if ( ! $cart instanceof SubmittedCart && ! $cart instanceof AbandonedCart ) {
			$this->logger->error(
				'Invalid cart type for order association. Expected status "submitted" or "abandoned".',
				[
					'cid'         => $cart_id,
					'oid'         => $order->get_id(),
					'cart_status' => $cart->get_status(),
				]
			);
			return;
		}

		$ordered_cart = OrderedCart::convert( $cart );
		$this->logger->info(
			'Converting cart "{cid}" for order "{oid}" to ordered status',
			[
				'cid'             => $cart->get_id(),
				'oid'             => $order->get_id(),
				'is_recovered'    => $ordered_cart->is_recovered(),
				'original_status' => $cart->get_status(),
				'new_status'      => $ordered_cart->get_status(),
			]
		);

		if ( $ordered_cart->is_recovered() ) {
			$saved = $this->manager->save( $ordered_cart );
			$this->logger->info(
				'Cart "{cid}" saved as recovered',
				[
					'cid'     => $ordered_cart->get_id(),
					'success' => $saved,
				]
			);
		} else {
			$deleted = $this->manager->delete( $ordered_cart );
			$this->logger->info(
				'Cart "{cid}" deleted after purchase within allowed timeframe.',
				[
					'cid'     => $ordered_cart->get_id(),
					'success' => $deleted,
				]
			);
		}
	}

	/** @internal */
	public function set_changed_into_cookie(): void {
		if ( ! headers_sent() ) {
			WooCommerceCookies::set( self::COOKIE_IS_CHANGED_NAME, '1' );
		}
	}

	/**
	 * Important not to run this in the admin area, may not update cart properly
	 *
	 * @internal
	 */
	public function set_changed_from_cookie(): void {
		if ( WooCommerceCookies::get( self::COOKIE_IS_CHANGED_NAME ) === '1' ) {
			$this->is_changed = true;
			WooCommerceCookies::clear( self::COOKIE_IS_CHANGED_NAME );
		}
	}

	/** @internal */
	public function trigger_update_on_cart_and_checkout_pages(): void {
		if (
			defined( 'WOOCOMMERCE_CART' )
				|| is_checkout()
				|| did_action( 'woocommerce_before_checkout_form' ) // support for one-page checkout plugins.
		) {
			$this->is_changed = true;
		}
	}


	/** @internal */
	public function set_changed(): void {
		$this->is_changed = true;
	}

	private function store_tracking_key( string $token ): void {
		WC()->session->set( self::SESSION_TOKEN_KEY, $token );
	}

	private function get_tracking_key(): string {
		$token = WC()->session->get( self::SESSION_TOKEN_KEY );
		if ( is_string( $token ) && strlen( $token ) > 0 ) {
			return $token;
		}

		return md5( uniqid( 'sm_', true ) );
	}

	private function separate_cart_from_session(): void {
		WC()->session->set( 'shopmagic_checkout_processed_time', time() );
		WooCommerceCookies::clear( self::COOKIE_IS_CHANGED_NAME );
		WC()->session->set( self::SESSION_TOKEN_KEY, '' );
	}

	public static function is_needed(): bool {
		if ( RestRequestUtil::is_rest_request() ) {
			return false;
		}

		return true;
	}

	private static function get_user_agent(): string {
		return sanitize_text_field( wp_unslash( $_SERVER['HTTP_USER_AGENT'] ) ) ?: 'unknown';
	}
}
