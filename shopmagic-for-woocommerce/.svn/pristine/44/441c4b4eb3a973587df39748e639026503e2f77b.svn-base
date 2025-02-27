<?php
declare(strict_types=1);

namespace WPDesk\ShopMagic\Customer;

use WPDesk\ShopMagic\Exception\CannotProvideCustomerException;

interface CustomerProvider {

	/**
	 * Customer returned from this method is not guaranteed to be persisted. Entity instance must be saved by client.
	 *
	 * @throws CannotProvideCustomerException;
	 */
	public function get_customer(): Customer;

	/**
	 * @deprecated 4.3.0 This should be renamed to can_provide_customer
	 */
	public function is_customer_provided(): bool;
}
