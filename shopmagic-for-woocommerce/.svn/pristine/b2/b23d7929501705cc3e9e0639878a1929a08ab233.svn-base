<?php
declare( strict_types=1 );

namespace WPDesk\ShopMagic\Customer\Interceptor;

use WPDesk\ShopMagic\Customer\Customer;
use WPDesk\ShopMagic\Customer\CustomerProvider2;
use WPDesk\ShopMagic\Exception\CannotProvideCustomerException;

final class CompositeCustomerProvider implements CustomerProvider2 {

	/** @var CustomerProvider2[] */
	private $providers;

	/** @param CustomerProvider2[] $providers */
	public function __construct( array $providers ) {
		$this->providers = $providers;
	}

	public function get_customer(): Customer {
		foreach ( $this->providers as $provider ) {
			if ( $provider->can_provide_customer() ) {
				return $provider->get_customer();
			}
		}

		throw new CannotProvideCustomerException( 'No customer provided' );
	}

	public function can_provide_customer(): bool {
		foreach ( $this->providers as $provider ) {
			if ( $provider->can_provide_customer() ) {
				return true;
			}
		}

		return false;
	}

	public function is_customer_provided(): bool {
		return $this->can_provide_customer();
	}
}
