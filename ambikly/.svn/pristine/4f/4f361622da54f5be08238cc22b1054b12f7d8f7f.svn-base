<?php

namespace Ambikly\Controllers;

use Ambikly\Repository\CategoryRepository;

class CategoryController extends BaseController
{

    public function __construct()
    {
        /**
         * @property CategoryRepository $repository
         */
        $this->repository = ambikly()->getClass('Repository.CategoryRepository');


    }

    public function getCategories($per_page = 10, $offset = 0)
    {

        return $this->repository->getCategories($per_page, $offset);
    }

    public function getCategoryCount()
    {

        return $this->repository->getCategoryCount();
    }

    public function deleteByCategoryId($id)
    {

        return $this->repository->deleteByCategoryId($id);
    }

    public function saveCategory($category = [])
    {

        return $this->repository->save($category);
    }

    public function getCategoryById($id)
    {

        return $this->repository->getCategoryById($id);
    }

    public function updateCategory($category, $id = 0)
    {
        return $this->repository->save($category, $id);
    }

    public function getCategoryLists(){
        return $this->repository->getCategoryLists();
    }
    public function getPublishCategoryLists(){
        return $this->repository->getPublishCategoryLists();
    }
}