<?php

namespace MuzaPay\Repositories;

use MuzaPay\Models\OrderModel;
use MuzaPayDeps\Wpify\Model\OrderRepository as AbstractOrderRepository;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

class OrderRepository extends AbstractOrderRepository {
	/**
	 * @inheritDoc
	 */
	public function model(): string {
		return OrderModel::class;
	}
}
