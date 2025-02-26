<?php

namespace Ambikly\Admin\Pages;

use Ambikly\Admin\UIComponents;
use Ambikly\ListTable\PaymentListTable;
use Ambikly\ListTable\ProductListTable;

class PaymentsTablePage extends BasePage
{
    public function __construct()
    {
        parent::__construct();

        $this->page_id = 'ambikly-payment-table-page';

        $this->page_title = esc_html__('Payments', 'ambikly');

    }

    public function output()
    {
        $breadcrumbs = [
            ['title' => $this->page_title]
        ];

        UIComponents::breadcrumb($breadcrumbs, false);

        $list_table = new PaymentListTable();
        // Process any bulk actions before preparing items
        $list_table->process_bulk_action();
        $list_table->prepare_items();
        ?>

        <div class="wrap ambikly-admin-page <?php echo esc_attr($this->page_id) ?>">
            <a style="display: none" href="<?php echo esc_url(admin_url('admin.php?page=ambikly&sub=new-payment')); ?>"
               class="page-title-action ambikly-add-new-button">
                <?php echo esc_html__('New Payment', 'ambikly'); ?>
            </a>
            <form method="post" action="" class="ambikly-list-table-form">
                <?php
                $list_table->display();
                ?>
            </form>
        </div>
        <?php

    }
}