<?php

namespace Ambikly\Models;

use Ambikly\Repository\CategoryRepository;
use Ambikly\Repository\ProductRepository;

class Category extends BaseModel
{

    public function __construct($product_id = null)
    {


    }

    public function setCategory($by_value, $by_context = 'slug', $set_global = false)
    {


        $by_value = $by_context == 'id' ? absint($by_value) : sanitize_text_field($by_value);

        /**
         * @property CategoryRepository $repository
         */
        $repository = ambikly()->getClass('Repository.CategoryRepository');

        $this->model_data = strtolower($by_context) == 'id' ? $repository->getCategoryDetailsById($by_value) : $repository->getCategoryDetailsBySlug($by_value);

        /**
         * @var $products_repo ProductRepository
         */
        $products_repo = ambikly()->getClass('Repository.ProductRepository');

        $products = $products_repo->getProductsByCategoryId($this->getID());

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

        $this->model_data['products'] = $mapped_products;

        if ($this->getStatus() !== 'publish' && !current_user_can('manage_options')) {

            $this->model_data = [];
        }

        if ($set_global) {

            global $ambikly_category;

            $ambikly_category = $this;
        }

        return $this;

    }

    public function getID()
    {

        if (isset($this->model_data['ID'])) {

            return $this->model_data['ID'];
        }

        return 0;
    }

    public function getCategoryName()
    {

        if (isset($this->model_data['category_name'])) {

            return $this->model_data['category_name'];
        }

        return '';
    }


    public function getDescription()
    {

        if (isset($this->model_data['description'])) {

            return $this->model_data['description'];
        }

        return '';
    }


    public function getStatus()
    {

        if (isset($this->model_data['status'])) {

            return $this->model_data['status'];
        }

        return '';
    }

    public function getImage()
    {

        if (isset($this->model_data['image'])) {

            return $this->model_data['image'];
        }

        return '';
    }

    public function getCreatedAt()
    {

        if (isset($this->model_data['created_at'])) {

            return $this->model_data['created_at'];
        }

        return '';
    }

    public function getUpdatedAt()
    {

        if (isset($this->model_data['updated_at'])) {

            return $this->model_data['updated_at'];
        }

        return '';
    }

    public function getProducts()
    {

        if (isset($this->model_data['products'])) {

            return $this->model_data['products'];
        }
        return [];
    }

    public function hasProducts()
    {
        $products = $this->model_data['products'] ?? [];

        if (!is_array($products)) {
            return false;
        }
        if (count($products) < 1) {
            return false;
        }
        return true;
    }
}