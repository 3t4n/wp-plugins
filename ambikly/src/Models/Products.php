<?php

namespace Ambikly\Models;

use Ambikly\Repository\ProductRepository;

class Products extends BaseModel
{

    public function __construct($product_id = null)
    {

    }

    public function setProducts($set_global = false)
    {

        /**
         * @property ProductRepository $repository
         */
        $repository = ambikly()->getClass('Repository.ProductRepository');

        /**
         * @var $products_repo ProductRepository
         */

        $products = $repository->getProducts();

        $products = is_array($products) ? $products : [];

        $mapped_products = [];

        foreach ($products as $product) {

            /**
             * @var Product $product_model
             */
            $product_model = ambikly()->getClass('Models.Product', true);

            $mapped_product = $product_model->setProduct($product['ID'], 'id');

            if ($product_model->getID() > 0) {

                $mapped_products[] = $mapped_product;
            }

        }

        $this->model_data = $mapped_products;


        if ($set_global) {

            global $ambikly_products;

            $ambikly_products = $this;
        }

        return $this;

    }

    public function hasProducts()
    {

        if (count($this->model_data) > 0) {

            return true;
        }
        return false;
    }

    public function getProducts()
    {

        if (count($this->model_data) > 0) {

            return $this->model_data;
        }
        return [];
    }
}