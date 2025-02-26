<?php

namespace Profitblue\Models;

use Profitblue\Deps\Model\Abstracts\AbstractDbTableModel;

class ProductItemIdModel extends AbstractDbTableModel {

	/** @var int */
	public $id;
	/** @var int */
	public int $product_id;
	/** @var string */
	public string $item_id;
	/** @var string */
	public string $meta_key;

}
