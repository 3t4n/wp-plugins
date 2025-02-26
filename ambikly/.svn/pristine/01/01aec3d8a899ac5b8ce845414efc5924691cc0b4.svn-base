<?php

namespace Ambikly\Admin\Pages;

use Ambikly\Admin\UIComponents;
use Ambikly\Controllers\ProductController;
use Ambikly\ListTable\CategoryListTable;
use Ambikly\Options\ProductOptions;

class CategoryTablePage extends BasePage
{
    public function __construct()
    {
        parent::__construct();

        $this->page_id = 'ambikly-category-table-page';

        $this->page_title = esc_html__('Categories', 'ambikly');

    }

    public function output()
    {
        $breadcrumbs = [
            ['title' => $this->page_title]
        ];

        UIComponents::breadcrumb($breadcrumbs, false);

        $list_table = new CategoryListTable();
        // Process any bulk actions before preparing items
        $list_table->process_bulk_action();
        $list_table->prepare_items();
        ?>

        <div class="wrap ambikly-admin-page <?php echo esc_attr($this->page_id) ?>">
            <a href="<?php echo esc_url(admin_url('admin.php?page=ambikly&sub=add-new-category')); ?>"
               class="page-title-action ambikly-add-new-button">
                <?php echo esc_html__('Add New Category', 'ambikly'); ?>
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