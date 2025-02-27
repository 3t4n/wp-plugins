<?php
declare( strict_types=1 );

namespace WPDesk\ShopMagic\Customer\Interceptor;

use WPDesk\ShopMagic\Customer\Customer;
use WPDesk\ShopMagic\Customer\UserAsCustomer;
use WPDesk\ShopMagic\Exception\CannotProvideCustomerException;

/**
 * Can provide customer from registered user, as that it cannot serve for Guest customers. Mainly
 * used as a fallback, when session data is not accessible.
 */
class RegisteredCustomerProvider implements \WPDesk\ShopMagic\Customer\CustomerProvider2 {

	public function get_customer(): Customer {
		if ( ! $this->can_provide_customer() ) {
			throw new CannotProvideCustomerException( 'No customer provided' );
		}

		return new UserAsCustomer( wp_get_current_user() );
	}

	public function can_provide_customer(): bool {
		return wp_get_current_user()->exists();
	}

	public function is_customer_provided(): bool {
		return $this->can_provide_customer();
	}
}
