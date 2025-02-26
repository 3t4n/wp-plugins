<?php

namespace Ambikly\Repository;

use Ambikly\Database\Tables\Customers;
use Ambikly\Database\Tables\Orders;
use Ambikly\Database\Tables\Payments;

class PaymentRepository extends BaseRepository
{
    private $orders;

    private $customers;

    public function __construct()
    {
        /**
         * @var $products_table Payments
         */
        $this->table = ambikly()->getClass('Database.Tables.Payments');

        /**
         * @var $customers Customers
         */
        $this->customers = ambikly()->getClass('Database.Tables.Customers');

        /**
         * @var $orders Orders
         */
        $this->orders = ambikly()->getClass('Database.Tables.Orders');


        parent::__construct();

    }

    public function getPayments($per_page = 10, $offset = 0)
    {

        return $this->table->getAll([], ['*'], 'ORDER BY ID DESC', $per_page, $offset);
    }

    public function getPaymentsByOrderId($order_id)
    {

        return $this->table->getAll(['order_id' => $order_id]);
    }

    public function getPaymentsCount()
    {

        return $this->table->count();
    }

    public function save($payment_data, $id = 0)
    {
        if ($id > 0) {

            return $this->table->update($payment_data, ['ID' => $id]);
        }
        return $this->table->insert($payment_data);
    }

    public function getTransactionIdExists($order_id, $transaction_id)
    {
        $result = $this->table->getAll(['order_id' => $order_id, 'transaction_id' => $transaction_id]);

        if (is_array($result) && count($result) > 0) {

            return true;
        }
        return false;
    }

    public function isPaymentProceed($payment_id)
    {
        $result = $this->table->get(['payment_id' => $payment_id]);

        if (is_array($result) && count($result) > 0) {

            return isset($result['status']) && $result['status'] !== 'pending';
        }
        return false;
    }

    public function getPaymentById($id)
    {

        return $this->table->get(['ID' => $id]);
    }

    public function getPaymentsByUserId($user_id)
    {

        $query = "SELECT  payments.*, orders.currency
    FROM " . $this->table->getTableName() . " AS payments
        LEFT JOIN " . $this->orders->getTableName() . " AS orders ON orders.ID = payments.order_id
    LEFT JOIN " . $this->customers->getTableName() . " AS customer ON orders.customer_id = customer.ID 
    WHERE customer.user_id = %d ORDER BY payments.ID DESC";

        $result = $this->getResults($query, [$user_id]);


        return isset($result[0]) ? $result : [];
    }

    public function deleteByPaymentId($payment_id)
    {
        return $this->table->delete(['ID' => $payment_id]);
    }

}