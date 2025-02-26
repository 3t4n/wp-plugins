<?php

namespace Ambikly\Admin\Pages;

use Ambikly\Admin\UIComponents;
use Ambikly\ListTable\CategoryListTable;
use Ambikly\ListTable\ProductListTable;

class ProductTablePage extends BasePage
{
    public function __construct()
    {
        parent::__construct();

        $this->page_id = 'ambikly-product-table-page';

        $this->page_title = esc_html__('Products', 'ambikly');

    }

    public function output()
    {
        $breadcrumbs = [
            ['title' => $this->page_title]
        ];

        UIComponents::breadcrumb($breadcrumbs, false);

        $list_table = new ProductListTable();
        // Process any bulk actions before preparing items
        $list_table->process_bulk_action();
        $list_table->prepare_items();
        ?>

        <div class="wrap ambikly-admin-page <?php echo esc_attr($this->page_id) ?>">
            <a href="<?php echo esc_url(admin_url('admin.php?page=ambikly&sub=add-new-product')); ?>"
               class="page-title-action ambikly-add-new-button">
                <?php echo esc_html__('Add New Product', 'ambikly'); ?>
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