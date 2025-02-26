<?php

namespace Ambikly\Controllers;

use Ambikly\Repository\ProductRepository;
use Ambikly\Repository\ProductCategoriesRepository;

class ProductController extends BaseController
{

    public function __construct()
    {
        /**
         * @property ProductRepository $repository
         */
        $this->repository = ambikly()->getClass('Repository.ProductRepository');


    }

    public function getProducts($per_page = 10, $offset = 0)
    {

        return $this->repository->getProducts($per_page, $offset);
    }

    public function getProductCount()
    {

        return $this->repository->getProductCount();
    }

    public function deleteByProductId($product_id)
    {

        return $this->repository->deleteByProductId($product_id);
    }

    public function saveProduct($product = [])
    {
        $categories = $product['category_ids'] ?? [];

        unset($product['category_ids']);

        /**
         * @var ProductCategoriesRepository $product_category_repository
         */
        $product_category_repository = ambikly()->getClass('Repository.ProductCategoriesRepository');

        $product_id = $this->repository->save($product);

        if (!is_wp_error($product_id) && absint($product_id) > 0) {

            $product_category_repository->save($product_id, $categories);

        }
        return $product_id;


    }

    public function getProductById($product_id)
    {

        return $this->repository->getProductDetailsById($product_id);
    }

    public function updateProduct($product, $product_id = 0)
    {
        $categories = $product['category_ids'] ?? [];

        unset($product['category_ids']);
        /**
         * @var ProductCategoriesRepository $product_category_repository
         */
        $product_category_repository = ambikly()->getClass('Repository.ProductCategoriesRepository');

        if ($product_id > 0) {

            $product_category_repository->save($product_id, $categories);

            return $this->repository->save($product, $product_id);

        }
        return false;
    }

    public function getProductsByCategorySlug($slug)
    {
        return $this->repository->getProductsByCategorySlug($slug);
    }
}