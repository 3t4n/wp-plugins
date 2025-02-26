<?php

namespace Ambikly\Admin\Pages;

use Ambikly\Admin\UIComponents;
use Ambikly\Controllers\CategoryController;
use Ambikly\Controllers\ProductController;
use Ambikly\Options\CategoryOptions;
use Ambikly\Options\ProductOptions;

class AddNewCategoryPage extends BasePage
{
    public function __construct()
    {
        parent::__construct();

        $this->page_id = 'ambikly-add-category-page';

        $this->data = $this->getData();

        if ($this->action == "edit") {

            $this->page_title = esc_html__('Edit Category', 'ambikly');

        } else {

            $this->page_title = esc_html__('Add New Category', 'ambikly');
        }

        $options = new CategoryOptions();

        $this->options = $options->getOptions();

    }

    public function output()
    {
        $breadcrumbs = [
            ['title' => esc_html__('Categories', 'ambikly'), 'url' => admin_url('admin.php?page=ambikly&sub=categories')],
            ['title' => $this->page_title],

        ];
        UIComponents::breadcrumb($breadcrumbs);
        ?>

        <div class="wrap <?php echo esc_attr($this->page_id) ?>">
            <form method="post" action="" class="ambikly-form">

                <?php
                ambikly_nonce_field('save_category');
                ambikly_action_field('save_category');
                ambikly_hidden_field('ID', $this->id);
                ?>

                <div class="ambikly-product-container">
                    <!-- Right Content Area -->
                    <div class="ambikly-content">
                        <?php $this->Render('general'); ?>
                        <?php $this->Render('pricing'); ?>
                        <?php $this->Render('stock'); ?>
                    </div>

                    <!-- Left Sidebar Tabs -->
                    <div class="ambikly-sidebar">
                        <?php $this->Render('status'); ?>
                    </div>
                </div>
                <?php
                ambikly_submit_button();
                ?>
            </form>
        </div>
        <?php

    }

    public function getData()
    {
        if ($this->action != 'edit' && $this->id != 0) {

            return [];
        }
        /**
         * @var $category CategoryController
         */
        $category = ambikly()->getClass('Controllers.CategoryController');

        return $category->getCategoryById($this->id);

    }
}