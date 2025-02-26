<?php

namespace Ambikly\Repository;

use Ambikly\Database\Tables\Categories;

class CategoryRepository extends BaseRepository
{
    public function __construct()
    {
        /**
         * @var $products_table Categories
         */
        $this->table = ambikly()->getClass('Database.Tables.Categories');

    }

    public function getCategories($per_page = 10, $offset = 0)
    {

        return $this->table->getAll([], ['*'], 'ORDER BY ID DESC', $per_page, $offset);
    }

    public function getCategoryCount()
    {

        return $this->table->count();
    }

    public function deleteByCategoryId($id)
    {

        return $this->table->delete(['ID' => $id]);
    }

    public function save($category, $id = 0)
    {
        if ($id > 0) {

            return $this->table->update($category, ['ID' => $id]);
        }

        return $this->table->insert($category);
    }

    public function getCategoryById($id)
    {

        return $this->table->get(['ID' => $id]);
    }

    public function getCategoryLists()
    {

        $category_list = $this->table->getAll([], ['ID', 'category_name'], 'ORDER BY ID desc');

        return wp_list_pluck($category_list, 'category_name', 'ID');
    }

    public function getPublishCategoryLists()
    {

        $category_list = $this->table->getAll(['status' => 'publish'], ['ID', 'category_name'], 'ORDER BY ID desc');

        return wp_list_pluck($category_list, 'category_name', 'ID');
    }

    public function getCategoryDetailsById($id)
    {
        return $this->table->get(['ID' => $id]);
    }

    public function getCategoryDetailsBySlug($slug)
    {
        return $this->table->get(['category_slug' => $slug]);
    }
}