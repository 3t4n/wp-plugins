<?php

namespace Ambikly\Repository;

use Ambikly\Database\Tables\Categories;
use Ambikly\Database\Tables\ProductCategories;
use Ambikly\Database\Tables\Products;

class ProductRepository extends BaseRepository
{
    private $product_categories;

    private $categories;

    public function __construct()
    {
        /**
         * @var $products_table Products
         */
        $this->table = ambikly()->getClass('Database.Tables.Products');

        /**
         * @var $product_categories ProductCategories
         */
        $this->product_categories = ambikly()->getClass('Database.Tables.ProductCategories');

        /**
         * @var $categories Categories
         */
        $this->categories = ambikly()->getClass('Database.Tables.Categories');

        parent::__construct();

    }

    public function getProducts($per_page = 10, $offset = 0)
    {

        return $this->table->getAll([], ['*'], 'ORDER BY ID DESC', $per_page, $offset);
    }

    public function getProductCount()
    {

        return $this->table->count();
    }

    public function deleteByProductId($product_id)
    {

        return $this->table->delete(['id' => $product_id]);
    }

    public function save($product, $id = 0)
    {
        if ($id > 0) {
            
            return $this->table->update($product, ['ID' => $id]);
        }

        return $this->table->insert($product);
    }

    public function getProductDetailsById($id)
    {


        $query = "
    SELECT p.*, 
           GROUP_CONCAT(pc.category_id SEPARATOR ',') AS category_ids,
           GROUP_CONCAT(c.category_name SEPARATOR ',') AS category_names,
           GROUP_CONCAT(c.category_slug SEPARATOR ',') AS category_slugs
    FROM " . $this->table->getTableName() . " p
    LEFT JOIN " . $this->product_categories->getTableName() . " pc ON p.ID = pc.product_id
    LEFT JOIN " . $this->categories->getTableName() . " c ON pc.category_id = c.ID
    WHERE p.ID=%d
    GROUP BY p.ID";

        $result = $this->getResults($query, [$id]);

        return $result[0] ?? [];
    }

    public function getProductDetailsBySlug($slug)
    {


        $query = "
    SELECT p.*, 
           GROUP_CONCAT(pc.category_id SEPARATOR ',') AS category_ids,
           GROUP_CONCAT(c.category_name SEPARATOR ',') AS category_names,
           GROUP_CONCAT(c.category_slug SEPARATOR ',') AS category_slugs
    FROM " . $this->table->getTableName() . " p
    LEFT JOIN " . $this->product_categories->getTableName() . " pc ON p.ID = pc.product_id
    LEFT JOIN " . $this->categories->getTableName() . " c ON pc.category_id = c.ID
    WHERE p.product_slug=%s
    GROUP BY p.ID";

        $result = $this->getResults($query, [$slug]);

        return $result[0] ?? [];
    }

    public function getProductBySlug($product_slug)
    {

        return $this->table->get(['product_slug' => $product_slug]);
    }

    public function getProductsByCategoryId($category_id)
    {
        $category_id = absint($category_id);

        $query = "
    SELECT p.*, 
           c.category_name,
           c.category_slug
    FROM " . $this->table->getTableName() . " p
    LEFT JOIN " . $this->product_categories->getTableName() . " pc ON p.ID = pc.product_id
    LEFT JOIN " . $this->categories->getTableName() . " c ON pc.category_id = c.ID
    WHERE c.ID = %d";

        $result = $this->getResults($query, [$category_id]);

        return isset($result[0]) ? $result : [];

    }

}