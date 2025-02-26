<?php

namespace MuzaPay\Managers;

use MuzaPay\Repositories\OrderRepository;
use MuzaPay\Repositories\ProductRepository;
use MuzaPayDeps\Wpify\Model\Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

class RepositoryManager {
	public function __construct(
		Manager $manager,
		OrderRepository $order_repository,
		ProductRepository $product_repository
	) {
		$manager->register_repository( $order_repository );
		$manager->register_repository( $product_repository );
	}
}
