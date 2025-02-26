<?php

namespace Ambikly\Repository;

use Ambikly\Database\Tables\Orders;

class OrderItemsRepository extends BaseRepository
{
    public function __construct()
    {
        /**
         * @var $products_table Orders
         */
        $this->table = ambikly()->getClass('Database.Tables.OrderItems');


        parent::__construct();

    }


    public function save($customer, $id = 0)
    {
        if ($id > 0) {

            return $this->table->update($customer, ['ID' => $id]);
        }

        return $this->table->insert($customer);
    }

    public function getOrderItemsByOrderId($order_id)
    {

        return $this->table->getAll(['order_id' => $order_id]);
    }

}