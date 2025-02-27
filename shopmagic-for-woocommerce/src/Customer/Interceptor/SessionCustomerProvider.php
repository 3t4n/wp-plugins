<?php
declare( strict_types=1 );

namespace WPDesk\ShopMagic\Customer\Interceptor;

use WPDesk\ShopMagic\Customer\Customer;
use WPDesk\ShopMagic\Customer\CustomerRepository;
use WPDesk\ShopMagic\Customer\Guest\Guest;
use WPDesk\ShopMagic\Customer\Guest\GuestFactory;
use WPDesk\ShopMagic\Exception\CannotProvideCustomerException;
use WPDesk\ShopMagic\Exception\CustomerNotFound;
use WPDesk\ShopMagic\Frontend\Session\SessionPersistence;

class SessionCustomerProvider implements \WPDesk\ShopMagic\Customer\CustomerProvider2 {

	/** @var SessionPersistence */
	private $session;

	/** @var GuestFactory */
	private $guest_factory;

	/** @var CustomerRepository */
	private $customer_repository;

	public function __construct(
		SessionPersistence $session,
		CustomerRepository $customer_repository,
		GuestFactory $guest_factory
	) {
		$this->session             = $session;
		$this->guest_factory       = $guest_factory;
		$this->customer_repository = $customer_repository;
	}

	public function get_customer(): Customer {
		$tracking_data = $this->session->get_tracking_data();
		$customer      = null;

		if ( isset( $tracking_data['user_id'] ) ) {
			try {
				$customer = $this->customer_repository->fetch_user( $tracking_data['user_id'] );
			} catch ( CustomerNotFound $e ) {
				throw new CannotProvideCustomerException( $e->getMessage(), 0, $e );
			}
		} elseif ( isset( $tracking_data['email'] ) ) {
			$customer = $this->provide_from_email( $tracking_data['email'] );
		}

		if ( $customer instanceof Customer ) {
			return $customer;
		}

		throw new CannotProvideCustomerException( 'No customer provided' );
	}

	public function can_provide_customer(): bool {
		$tracking_data = $this->session->get_tracking_data();
		return ! empty( $tracking_data['user_id'] ) || ! empty( $tracking_data['email'] );
	}

	public function is_customer_provided(): bool {
		return $this->can_provide_customer();
	}

	private function provide_from_email( string $email ): Customer {
		try {
			$customer = $this->customer_repository->find_by_email( $email );
		} catch ( CustomerNotFound $e ) {
			$customer = $this->guest_factory->from_email( $email );
		}

		if ( $customer instanceof Guest ) {
			$tracking_data = $this->session->get_tracking_data();
			foreach ( $tracking_data['meta'] as $meta_key => $meta_value ) {
				$customer->add_meta( $meta_key, $meta_value );
			}
		}

		return $customer;
	}
}
