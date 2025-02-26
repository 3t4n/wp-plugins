<?php

namespace Ambikly\Admin\Pages;

use Ambikly\Admin\UIComponents;
use Ambikly\Controllers\ProductController;
use Ambikly\Options\ProductOptions;

class AddNewProductPage extends BasePage
{
    public function __construct()
    {
        parent::__construct();

        $this->page_id = 'ambikly-add-product-page';

        $this->data = $this->getData();

        $this->page_title = $this->action == "edit" ? esc_html__('Edit Product', 'ambikly') : esc_html__('Add New Product', 'ambikly');

        $product_settings = new ProductOptions();

        $this->options = $product_settings->getOptions();

    }

    public function output()
    {
        $breadcrumbs = [
            ['title' => esc_html__('Products', 'ambikly'), 'url' => admin_url('admin.php?page=ambikly&sub=products')],
            ['title' => $this->page_title],

        ];

        UIComponents::breadcrumb($breadcrumbs);
        ?>

        <div class="wrap <?php echo esc_attr($this->page_id) ?>">
            <form method="post" action="" class="ambikly-form">

                <?php
                ambikly_nonce_field('save_product');
                ambikly_action_field('save_product');
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
         * @var $product_controller ProductController
         */
        $product = ambikly()->getClass('Controllers.ProductController');

        return $product->getProductById($this->id);

    }
}