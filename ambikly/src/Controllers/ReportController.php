<?php

namespace Ambikly\Controllers;

use Ambikly\Repository\SettingsRepository;
use Ambikly\Sanitization;
use Ambikly\Validation;

class ReportController extends BaseController {

    public function __construct() {
        /**
         * @property SettingsRepository $repository
         */
        $this->repository = ambikly()->getClass( 'Repository.ReportRepository' );

    }

    public function getTotalSales()
    {

        return $this->repository->getTotalSales();
    }

    public function getTotalOrders()
    {
        return $this->repository->getTotalOrders();

    }

    public function getTotalCustomers()
    {

        return $this->repository->getTotalCustomers();

    }

    public function getPendingPayments()
    {
       return $this->repository->getPendingPayments();

    }

    public function getTotalProducts()
    {
        return $this->repository->getTotalProducts();

    }

    public function getTotalCategories()
    {
        return $this->repository->getTotalCategories();

    }

    public function getTotalRefundedOrders()
    {

        return $this->repository->getTotalRefundedOrders();
    }

    public function getTotalProcessingOrders()
    {
        return $this->repository->getTotalProcessingOrders();

    }
}