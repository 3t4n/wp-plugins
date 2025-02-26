<?php

namespace MuzaPay\Models;

use MuzaPayDeps\Wpify\Model\Attributes\Meta;
use MuzaPayDeps\Wpify\Model\Order;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

class OrderModel extends Order {
	#[Meta('_muzapay_payment_id')]
	public $muzapay_payment_id;
}
