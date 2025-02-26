<?php

namespace Ambikly\Admin\Pages;

use Ambikly\Admin\UIComponents;
use Ambikly\Controllers\ProductController;
use Ambikly\ListTable\CategoryListTable;
use Ambikly\ListTable\CustomersListTable;
use Ambikly\Options\ProductOptions;

class CustomersTablePage extends BasePage
{
    public function __construct()
    {
        parent::__construct();

        $this->page_id = 'ambikly-customers-table-page';

        $this->page_title = esc_html__('Customers', 'ambikly');

    }

    public function output()
    {
        $breadcrumbs = [
            ['title' => $this->page_title]
        ];

        UIComponents::breadcrumb($breadcrumbs, false);

        $list_table = new CustomersListTable();
        // Process any bulk actions before preparing items
        $list_table->process_bulk_action();
        $list_table->prepare_items();
        ?>

        <div class="wrap ambikly-admin-page <?php echo esc_attr($this->page_id) ?>">
             <form method="post" action="" class="ambikly-list-table-form">
                <?php
                $list_table->display();
                ?>
            </form>
        </div>
        <?php

    }
}