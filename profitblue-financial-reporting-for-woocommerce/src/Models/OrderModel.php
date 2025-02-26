<?php

namespace Profitblue\Models;

use Profitblue\Repositories\OrderRepository;
use Profitblue\Deps\Model\Order;

/**
 * @method OrderRepository model_repository()
 */
class OrderModel extends Order {

	public int $_order_id;

}
