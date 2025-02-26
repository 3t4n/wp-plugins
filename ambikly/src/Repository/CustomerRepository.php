<?php

namespace Ambikly\Repository;

use Ambikly\Database\Tables\Customers;

class CustomerRepository extends BaseRepository
{
    public function __construct()
    {
        /**
         * @var $products_table Customers
         */
        $this->table = ambikly()->getClass('Database.Tables.Customers');


        parent::__construct();

    }

    public function exists($email)
    {
        $customer = $this->table->get(['email' => $email]);

        if ($customer) {

            return true;
        }
        return false;
    }

    public function getCustomers($per_page = 10, $offset = 0)
    {

        return $this->table->getAll([], ['*'], '', $per_page, $offset);
    }

    public function getCustomerCount()
    {

        return $this->table->count();
    }

    public function deleteByCustomerId($customer_id)
    {

        return $this->table->delete(['id' => $customer_id]);
    }

    public function save($customer, $id = 0)
    {
        if ($id > 0) {

            return $this->table->update($customer, ['ID' => $id]);
        }

        return $this->table->insert($customer);
    }

    public function getCustomerById($customer_id)
    {

        return $this->table->get(['ID' => $customer_id]);

    }
    public function getCustomerIDByEmail($email)
    {

        $customer = $this->table->get(['email' => $email]);

        if (is_wp_error($customer)) {

            return false;
        }
        if (!is_array($customer)) {
            return false;
        }
        if (!isset($customer['ID'])) {
            return false;
        }
        return $customer['ID'];

    }

    public function getMappedCustomers()
    {
        $all_customers = $this->table->getAll([], ['*'], '', 0, 0);

        return is_array($all_customers) ? $all_customers : [];
    }

}