<?php

namespace Ambikly\Controllers;

use Ambikly\Repository\PaymentRepository;

class PaymentController extends BaseController
{


    public function __construct()
    {
        /**
         * @property PaymentRepository $repository
         */
        $this->repository = ambikly()->getClass('Repository.PaymentRepository');


    }

    public function save($data)
    {

        return $this->repository->save($data);
    }

    public function getPaymentsByOrderId($order_id)
    {
        return $this->repository->getPaymentsByOrderId($order_id);
    }

    public function getTransactionIdExists($order_id, $transaction_id)
    {
        return $this->repository->getTransactionIdExists($order_id, $transaction_id);
    }

    public function isPaymentProceed($payment_id)
    {
        return $this->repository->isPaymentProceed($payment_id);
    }

    public function update($data, $id)
    {
        return $this->repository->save($data, $id);
    }



    public function getPayments($per_page = 10, $offset = 0)
    {

        return $this->repository->getPayments($per_page, $offset);
    }

    public function getPaymentsCount()
    {

        return $this->repository->getPaymentsCount();
    }
    public function getPaymentById($id)
    {

        return $this->repository->getPaymentById($id);
    }
    public function getPaymentsByUserId($user_id)
    {
        return $this->repository->getPaymentsByUserId($user_id);
    }
    public function deleteByPaymentId($payment_id)
    {
        return $this->repository->deleteByPaymentId($payment_id);

    }
}