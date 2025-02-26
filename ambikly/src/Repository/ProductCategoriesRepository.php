<?php

namespace Ambikly\Repository;

use Ambikly\Constants;
use Ambikly\Database\Tables\ProductCategories;

class ProductCategoriesRepository extends BaseRepository
{
    public function __construct()
    {
        /**
         * @var $product_categories_table ProductCategories
         */
        $this->table = ambikly()->getClass('Database.Tables.ProductCategories');

        parent::__construct();

    }

    public function checkIfProductCategoriesIdentical($product_id, $categories = [])
    {
        $categories = is_array($categories) ? $categories : [];
        $product_categories = $this->getCategoriesByProductId($product_id);
        $product_category_from_db = wp_list_pluck($product_categories, 'category_id');
        $product_category_from_db = is_array($product_category_from_db) ? $product_category_from_db : [];

        if (count($product_category_from_db) === count($categories) &&
            !array_diff($product_category_from_db, $categories) &&
            !array_diff($categories, $product_category_from_db)) {
            return true;
        }

        return false;
    }

    public function getProductCategories($per_page = 10, $offset = 0)
    {

        return $this->table->getAll([], ['*'], '', $per_page, $offset);
    }

    public function deleteByProductId($product_id)
    {

        return $this->table->delete(['product_id' => $product_id]);
    }

    public function deleteByCategoryId($category_id)
    {

        return $this->table->delete(['category_id' => $category_id]);
    }

    public function save($product_id, $categories = [])
    {

        if ($this->checkIfProductCategoriesIdentical($product_id, $categories)) {

            return true;
        }

        $this->deleteByProductId($product_id);

        $categories = is_array($categories) ? $categories : [];

        foreach ($categories as $category_id) {

            $this->table->insert([

                'product_id' => $product_id,

                'category_id' => $category_id
            ]);
        }

        return true;
    }

    public function getCategoriesByProductId($product_id)
    {
        return $this->table->getAll(['product_id' => $product_id]);
    }

}