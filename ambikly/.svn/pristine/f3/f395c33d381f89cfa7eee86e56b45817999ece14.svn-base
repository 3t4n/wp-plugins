<?php

namespace Ambikly\Admin\Pages;

use Ambikly\Admin\UIComponents;
use Ambikly\Controllers\CategoryController;
use Ambikly\Controllers\PaymentController;
use Ambikly\Controllers\ProductController;
use Ambikly\Options\CategoryOptions;
use Ambikly\Options\PaymentOptions;
use Ambikly\Options\ProductOptions;
use EDD\Compat\Payment;

class AddNewPaymentPage extends BasePage
{
    public function __construct()
    {
        parent::__construct();

        $this->page_id = 'ambikly-add-payment-page';

        $this->data = $this->getData();

        if ($this->action == "edit") {

            $this->page_title = esc_html__('Edit Payment', 'ambikly');

        } else {

            $this->page_title = esc_html__('Add New Payment', 'ambikly');
        }
        $options = new PaymentOptions();

        $this->options = $options->getOptions();
    }

    public function output()
    {
        $breadcrumbs = [
            ['title' => esc_html__('Payments', 'ambikly'), 'url' => admin_url('admin.php?page=ambikly&sub=categories')],
            ['title' => $this->page_title],

        ];
        UIComponents::breadcrumb($breadcrumbs);
        ?>

        <div class="wrap <?php echo esc_attr($this->page_id) ?>">
            <form method="post" action="" class="ambikly-form">

                <?php
                ambikly_nonce_field('save_payment');
                ambikly_action_field('save_payment');
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
         * @var $payment PaymentController
         */
        $payment = ambikly()->getClass('Controllers.PaymentController');

        return $payment->getPaymentById($this->id);

    }
}