<?php

namespace Ambikly\Repository;

use Ambikly\Database\Tables\Customers;
use Ambikly\Database\Tables\Orders;

class OrderRepository extends BaseRepository
{
    private $customers;

    public function __construct()
    {
        /**
         * @var $products_table Orders
         */
        $this->table = ambikly()->getClass('Database.Tables.Orders');
        /**
         * @var $customers Customers
         */
        $this->customers = ambikly()->getClass('Database.Tables.Customers');

        parent::__construct();

    }

    public function getOrders($per_page = 10, $offset = 0)
    {

        return $this->table->getAll([], ['*'], 'ORDER BY ID DESC', $per_page, $offset);
    }

    public function getOrderById($order_id)
    {

        return $this->table->get(['ID' => $order_id]);
    }

    public function getOrdersCount()
    {

        return $this->table->count();
    }

    public function save($order_data, $id = 0)
    {
        if ($id > 0) {

            return $this->table->update($order_data, ['ID' => $id]);
        }

        $order_data['order_code'] = $this->get_unique_order_code();

        return $this->table->insert($order_data);
    }

    private function get_unique_order_code($order_data = [])
    {
        $data_string = implode('|', $order_data);

        $order_data_hash = hash('sha256', $data_string);

        $timestamp = (int)microtime(true);

        $random_string = bin2hex(random_bytes(5));

        return strtoupper('ORD-' . base_convert($timestamp, 10, 36) . '-' . $random_string);
    }

    public function getOrdersByUserId($user_id)
    {

        $query = "SELECT orders.*
    FROM " . $this->table->getTableName() . " AS orders
        LEFT JOIN " . $this->customers->getTableName() . " AS customer ON orders.customer_id = customer.ID
    WHERE customer.user_id = %d ORDER BY orders.ID DESC";

        $result = $this->getResults($query, [$user_id]);

        return isset($result[0]) ? $result : [];
    }
    public function deleteByOrderId($order_id)
    {

        return $this->table->delete(['id' => $order_id]);
    }


}