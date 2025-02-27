<?php
declare(strict_types=1);

namespace WPDesk\ShopMagic\Customer;

use WPDesk\ShopMagic\Exception\CannotProvideCustomerException;

interface CustomerProvider2 extends CustomerProvider {

	public function can_provide_customer(): bool;
}
