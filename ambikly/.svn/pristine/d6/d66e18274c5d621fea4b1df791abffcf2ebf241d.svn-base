<?php

namespace Ambikly\Admin\Pages;

use Ambikly\Admin\UIComponents;
use Ambikly\Controllers\CategoryController;
use Ambikly\Controllers\OrderController;
use Ambikly\Controllers\PaymentController;
use Ambikly\Controllers\ProductController;
use Ambikly\Options\CategoryOptions;
use Ambikly\Options\OrderOptions;
use Ambikly\Options\PaymentOptions;
use Ambikly\Options\ProductOptions;
use EDD\Compat\Payment;
use EDD\Orders\Order;

class AddNewOrderPage extends BasePage
{
    public function __construct()
    {

        parent::__construct();

        $this->page_id = 'ambikly-add-order-page';

        $this->data = $this->getData();

        if ($this->action == "edit") {

            $this->page_title = esc_html__('Edit Order', 'ambikly');

        } else {

            $this->page_title = esc_html__('Add New Order', 'ambikly');
        }
        $options = new OrderOptions();

        $this->options = $options->getOptions();

    }

    public function output()
    {
        $breadcrumbs = [
            ['title' => esc_html__('Orders', 'ambikly'), 'url' => admin_url('admin.php?page=ambikly&sub=categories')],
            ['title' => $this->page_title],

        ];
        UIComponents::breadcrumb($breadcrumbs);
        ?>

        <div class="wrap <?php echo esc_attr($this->page_id) ?>">
            <form method="post" action="" class="ambikly-form">

                <?php
                ambikly_nonce_field('save_order');
                ambikly_action_field('save_order');
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
         * @var $order OrderController
         */
        $order = ambikly()->getClass('Controllers.OrderController');

        return $order->getOrderById($this->id);

    }
}