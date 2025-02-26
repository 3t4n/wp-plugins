<?php

namespace Ambikly\Models;

use Ambikly\Repository\ProductRepository;

class Product extends BaseModel
{

    public function __construct($product_id = null)
    {


    }

    public function setProduct($by_value, $by_context = 'slug', $set_global = false)
    {

        $by_value = $by_context == 'id' ? absint($by_value) : sanitize_text_field($by_value);

        /**
         * @property ProductRepository $repository
         */
        $repository = ambikly()->getClass('Repository.ProductRepository');

        $this->model_data = strtolower($by_context) == 'id' ? $repository->getProductDetailsById($by_value) : $repository->getProductDetailsBySlug($by_value);

        if ($this->getStatus() !== 'publish' && !current_user_can('manage_options')) {

            $this->model_data = [];
        }

        if ($set_global) {

            global $ambikly_product;

            $ambikly_product = $this;
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

    public function getProductName()
    {

        if (isset($this->model_data['product_name'])) {

            return $this->model_data['product_name'];
        }

        return '';
    }

    public function getCategoriesName()
    {

        if (isset($this->model_data['category_names'])) {

            return $this->model_data['category_names'];
        }

        return '';
    }

    public function getProductSlug()
    {

        if (isset($this->model_data['product_slug'])) {

            return $this->model_data['product_slug'];
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

    public function getRegularPrice()
    {

        if (isset($this->model_data['regular_price'])) {

            return $this->model_data['regular_price'];
        }

        return '';
    }

    public function getDiscountedPrice()
    {

        if (isset($this->model_data['discounted_price'])) {

            return floatval($this->model_data['discounted_price']);
        }

        return '';
    }

    public function getFinalPrice()
    {
        $regular_price = $this->getRegularPrice();

        $discounted_price = $this->getDiscountedPrice();

        if ($discounted_price > 0) {

            return $discounted_price;
        }
        return $regular_price;
    }

    public function getStockQuantity()
    {

        if (isset($this->model_data['stock_quantity'])) {

            return $this->model_data['stock_quantity'];
        }

        return '';
    }

    public function getCategoryId()
    {

        if (isset($this->model_data['category_id'])) {

            return $this->model_data['category_id'];
        }

        return '';
    }

    public function getCategories()
    {
        $categories = [];

        if (isset($this->model_data['category_slugs'])) {

            $category_slugs = $this->model_data['category_slugs'];

            $category_slugs = explode(',', $category_slugs);

            $category_names = $this->model_data['category_names'];

            $category_names = explode(',', $category_names);

            foreach ($category_slugs as $slug_index => $slug) {

                $categories[$slug] = $category_names[$slug_index] ?? '';
            }

        }

        return $categories;
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
}