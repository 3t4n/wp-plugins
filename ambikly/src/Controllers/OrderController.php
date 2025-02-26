<?php

namespace Ambikly\Controllers;

use Ambikly\Repository\OrderRepository;

class OrderController extends BaseController
{
    private $order_items_repository;

    public function __construct()
    {
        /**
         * @property OrderRepository $repository
         */
        $this->repository = ambikly()->getClass('Repository.OrderRepository');

        $this->order_items_repository = ambikly()->getClass('Repository.OrderItemsRepository');


    }


    public function getOrderById($order_id)
    {
        return $this->repository->getOrderById($order_id);
    }

    public function getOrderItemsByOrderId($order_id)
    {
        return $this->order_items_repository->getOrderItemsByOrderId($order_id);
    }

    public function getOrders($per_page = 10, $offset = 0)
    {

        return $this->repository->getOrders($per_page, $offset);
    }

    public function getOrdersCount()
    {

        return $this->repository->getOrdersCount();
    }

    public function getOrdersByUserId($user_id)
    {
        return $this->repository->getOrdersByUserId($user_id);
    }

    public function deleteByOrderId($order_id)
    {
        return $this->repository->deleteByOrderId($order_id);
    }

    public function updateOrder($order, $order_id = 0)
    {
        return $this->repository->save($order, $order_id);
    }
}