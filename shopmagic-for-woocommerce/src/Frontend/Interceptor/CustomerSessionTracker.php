<?php

declare( strict_types=1 );

namespace WPDesk\ShopMagic\Frontend\Interceptor;

use ShopMagicVendor\WPDesk\PluginBuilder\Plugin\Hookable;
use WPDesk\ShopMagic\Admin\Settings\GeneralSettings;
use WPDesk\ShopMagic\Components\HookProvider\Conditional;
use WPDesk\ShopMagic\Customer\Guest\Guest;
use WPDesk\ShopMagic\Customer\Guest\GuestDataAccess;
use WPDesk\ShopMagic\Exception\CannotProvideCustomerException;
use WPDesk\ShopMagic\Frontend\Session\SessionPersistence;
use WPDesk\ShopMagic\Helper\RestRequestUtil;
use WPDesk\ShopMagic\Helper\WordPressPluggableHelper;

final class CustomerSessionTracker implements Hookable, Conditional {

	/** @var SessionPersistence */
	private $session;

	/** @var ?array{user_id?: numeric, email?: string, meta?: string[]} */
	private $tracking_data;

	public function __construct( SessionPersistence $session ) {
		$this->session = $session;
	}

	public static function is_needed(): bool {
		$enabled = WordPressPluggableHelper::is_plugin_active( 'woocommerce/woocommerce.php' ) &&
					filter_var( GeneralSettings::get_option( 'enable_session_tracking', true ), \FILTER_VALIDATE_BOOLEAN );

		if ( is_admin() && ! wp_doing_ajax() ) {
			$request_valid = false;
		} elseif ( RestRequestUtil::is_rest_request() ) {
			$request_valid = false;
		} elseif ( wp_doing_cron() ) {
			$request_valid = false;
		} else {
			$request_valid = true;
		}

		return $enabled && $request_valid;
	}

	public function hooks(): void {
		add_action( 'wp', [ $this, 'persist_tracking_data' ], 99 );
		add_action( 'shutdown', [ $this, 'persist_tracking_data' ], 0 );
		add_action( 'set_logged_in_cookie', [ $this, 'refresh_tracking_user_id' ] );

		// this captures, maybe not session?
		add_action( 'comment_post', [ $this, 'capture_from_comment' ] );
		add_action( 'woocommerce_new_order', [ $this, 'capture_from_order' ], 10, 2 );
		add_action( 'woocommerce_api_create_order', [ $this, 'capture_from_order' ], 10, 2 );

		$this->refresh_tracking_user_id();
	}

	/**
	 * @internal
	 */
	public function persist_tracking_data(): void {
		if ( ! isset( $this->tracking_data ) ) {
			$this->initialize();
		}

		$this->session->save_tracking_data( $this->tracking_data );
	}

	/**
	 * @internal
	 */
	public function refresh_tracking_user_id(): void {
		if ( ! is_user_logged_in() ) {
			return;
		}

		if ( ! isset( $this->tracking_data ) ) {
			$this->initialize();
		}

		$previous = $this->tracking_data['user_id'] ?? 0;

		$this->tracking_data['user_id'] = wp_get_current_user()->ID;

		if ( $previous !== $this->tracking_data['user_id'] ) {
			$this->persist_tracking_data();
			/** @ignore Action used to internally sync customer status with other interceptors. */
			do_action( 'shopmagic/core/customer_interceptor/changed', $this->tracking_data );
		}
	}


	/**
	 * @internal
	 */
	public function capture_from_comment( int $comment_id ): void {
		if ( is_user_logged_in() ) {
			return;
		}

		$comment = get_comment( $comment_id );
		if ( ! $comment instanceof \WP_Comment ) {
			return;
		}

		if ( $comment->user_id <= 0 ) {
			return;
		}
		$this->set_user_email( $comment->comment_author_email );
	}

	/**
	 * @param int        $order_id
	 * @param ?\WC_Order $order
	 *
	 * @internal
	 */
	public function capture_from_order( $order_id, $order = null ): void {
		if ( is_user_logged_in() ) {
			return;
		}

		if ( ! $order instanceof \WC_Abstract_Order ) {
			$order = wc_get_order( $order_id );
		}

		$this->set_user_email( $order->get_billing_email() );
	}

	/** @phpstan-assert !null $this->tracking_data */
	private function initialize(): void {
		$this->tracking_data = array_merge(
			[ 'meta' => [] ],
			$this->session->get_tracking_data()
		);
	}

	public function set_meta( string $meta_name, string $meta_value ): void {
		if ( ! isset( $this->tracking_data ) ) {
			$this->initialize();
		}

		$previous = $this->tracking_data['meta'][ $meta_name ] ?? '';

		$this->tracking_data['meta'][ $meta_name ] = $meta_value;

		if ( $previous !== $this->tracking_data['meta'][ $meta_name ] ) {
			$this->persist_tracking_data();
			/** @ignore Action used to internally sync customer status with other interceptors. */
			do_action( 'shopmagic/core/customer_interceptor/changed', $this->tracking_data );
		}
	}


	public function set_user_email( string $email ): void {
		if ( ! isset( $this->tracking_data ) ) {
			$this->initialize();
		}

		$previous = $this->tracking_data['email'] ?? '';

		$this->tracking_data['email'] = $email;

		if ( $previous !== $this->tracking_data['email'] ) {
			$this->persist_tracking_data();
			/** @ignore Action used to internally sync customer status with other interceptors. */
			do_action( 'shopmagic/core/customer_interceptor/changed', $this->tracking_data );
		}
	}
}
