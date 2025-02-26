<?php

namespace MuzaPay\Repositories;

use MuzaPay\Models\ProductModel;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

class ProductRepository extends \MuzaPayDeps\Wpify\Model\ProductRepository {
	/**
	 * @inheritDoc
	 */
	public function model(): string {
		return ProductModel::class;
	}
}
