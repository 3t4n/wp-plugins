<?php

namespace Ambikly\Controllers;

use Ambikly\Repository\CustomerRepository;

class CustomerController extends BaseController
{

    public function __construct()
    {
        /**
         * @property CustomerRepository $repository
         */
        $this->repository = ambikly()->getClass('Repository.CustomerRepository');


    }

    public function getCustomers($per_page = 10, $offset = 0)
    {

        return $this->repository->getCustomers($per_page, $offset);
    }

    public function getCustomerCount()
    {

        return $this->repository->getCustomerCount();
    }

    public function getCustomerById($customer_id)
    {
        return $this->repository->getCustomerById($customer_id);
    }

    public function getMappedCustomers()
    {

        $customers = $this->repository->getMappedCustomers();

        $customer_mapped = [];

        foreach ($customers as $customer) {

            $customer_mapped[$customer['ID']] = '#' . $customer['ID'] . ' - ' . trim($customer['firstname'] . ' ' . $customer['lastname']) . '[ ' . $customer['email'] . ' ]';

        }

        return $customer_mapped;
    }
}