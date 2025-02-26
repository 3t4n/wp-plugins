<?php

namespace Ambikly\Repository;

 use Ambikly\Database\Tables\Orders;

class OrderAddressesRepository extends BaseRepository
{
    public function __construct()
    {
        /**
         * @var $products_table Orders
         */
        $this->table = ambikly()->getClass('Database.Tables.OrderAddresses');


        parent::__construct();

    }


    public function save($customer, $id = 0)
    {
        if ($id > 0) {

            return $this->table->update($customer, ['ID' => $id]);
        }

        return $this->table->insert($customer);
    }

}