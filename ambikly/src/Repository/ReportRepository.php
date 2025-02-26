<?php

namespace Ambikly\Repository;

use Ambikly\Database\Tables\Categories;
use Ambikly\Database\Tables\Customers;
use Ambikly\Database\Tables\Orders;
use Ambikly\Database\Tables\Payments;
use Ambikly\Database\Tables\Products;

class ReportRepository extends BaseRepository
{
    private $orders;

    private $customers;

    private $payments;


    private $products;


    private $categories;

    public function __construct()
    {
        /**
         * @var $orders Orders
         */
        $this->orders = ambikly()->getClass('Database.Tables.Orders');

        /**
         * @var $customers Customers
         */
        $this->customers = ambikly()->getClass('Database.Tables.Customers');


        /**
         * @var $payments Payments
         */
        $this->payments = ambikly()->getClass('Database.Tables.Payments');


        /**
         * @var $products Products
         */
        $this->products = ambikly()->getClass('Database.Tables.Products');


        /**
         * @var $categories Categories
         */
        $this->categories = ambikly()->getClass('Database.Tables.Categories');

        parent::__construct();
    }

    public function getTotalSales()
    {

        $query = "SELECT SUM(total_amount) as total_amount
    FROM " . $this->orders->getTableName();


        $result = $this->getResults($query);

        if (!isset($result[0])) {
            return 0;
        }
        if (!isset($result[0]['total_amount'])) {
            return 0;
        }
        return $result[0]['total_amount'];
    }

    public function getTotalOrders()
    {
        $query = "SELECT count(total_amount) as total_orders
    FROM " . $this->orders->getTableName();


        $result = $this->getResults($query);

        if (!isset($result[0])) {
            return 0;
        }
        if (!isset($result[0]['total_orders'])) {
            return 0;
        }
        return $result[0]['total_orders'];

    }

    public function getTotalCustomers()
    {

        $query = "SELECT count(ID) as total_customers
    FROM " . $this->customers->getTableName();


        $result = $this->getResults($query);

        if (!isset($result[0])) {
            return 0;
        }
        if (!isset($result[0]['total_customers'])) {
            return 0;
        }
        return $result[0]['total_customers'];

    }

    public function getPendingPayments()
    {
        $query = "SELECT count(ID) as pending_payments
    FROM " . $this->payments->getTableName() . " WHERE status = %s";

        $result = $this->getResults($query, ['pending']);

        if (!isset($result[0])) {
            return 0;
        }
        if (!isset($result[0]['pending_payments'])) {
            return 0;
        }
        return $result[0]['pending_payments'];

    }

    public function getTotalProducts()
    {
        $query = "SELECT count(ID) as total_products
    FROM " . $this->products->getTableName();


        $result = $this->getResults($query);

        if (!isset($result[0])) {
            return 0;
        }
        if (!isset($result[0]['total_products'])) {
            return 0;
        }
        return $result[0]['total_products'];

    }

    public function getTotalCategories()
    {
        $query = "SELECT count(ID) as total_categories
    FROM " . $this->categories->getTableName();


        $result = $this->getResults($query);

        if (!isset($result[0])) {
            return 0;
        }
        if (!isset($result[0]['total_categories'])) {
            return 0;
        }
        return $result[0]['total_categories'];

    }

    public function getTotalRefundedOrders()
    {

        $query = "SELECT count(ID) as total_orders
    FROM " . $this->orders->getTableName() . " WHERE status = %s";


        $result = $this->getResults($query, ['refunded']);

        if (!isset($result[0])) {
            return 0;
        }
        if (!isset($result[0]['total_orders'])) {
            return 0;
        }
        return $result[0]['total_orders'];
    }

    public function getTotalProcessingOrders()
    {
        $query = "SELECT count(ID) as total_orders
    FROM " . $this->orders->getTableName() . " WHERE status = %s";


        $result = $this->getResults($query, ['processing']);

        if (!isset($result[0])) {
            return 0;
        }
        if (!isset($result[0]['total_orders'])) {
            return 0;
        }
        return $result[0]['total_orders'];

    }

}