<?php

namespace Ambikly\ListTable;

use Ambikly\Controllers\ProductController;
use WP_List_Table;

class ProductListTable extends WP_List_Table
{
    public function __construct()
    {
        parent::__construct(array(
            'singular' => esc_html__('Product', 'ambikly'),
            'plural' => esc_html__('Products', 'ambikly'),
            'ajax' => false,
            'screen' => 'ambikly-products',
        ));
    }

    public function get_columns()
    {
        return array(
            'cb' => '<input type="checkbox" />',
            'product_name' => esc_html__('Name', 'ambikly'),
            'status' => esc_html__('Status', 'ambikly'),
            'product_slug' => esc_html__('Slug', 'ambikly'),
            'regular_price' => esc_html__('Regular Price', 'ambikly'),
            'discounted_price' => esc_html__('Discount Price', 'ambikly'),
            'stock_quantity' => esc_html__('Stock', 'ambikly'),
            'updated_at' => esc_html__('Updated', 'ambikly'),
        );
    }

    public function prepare_items()
    {
        $per_page = 10;
        $current_page = $this->get_pagenum();
        $offset = ($current_page - 1) * $per_page;

        /**
         * @var ProductController $product_controller
         */
        $product_controller = ambikly()->getClass('Controllers.ProductController');
        $data = $product_controller->getProducts($per_page, $offset);
        $total_items = $product_controller->getProductCount();

        // Ensure data structure is correct
        $this->items = $data;

        $this->set_pagination_args(array(
            'total_items' => $total_items,
            'per_page' => $per_page,
        ));
    }

    public function column_default($item, $column_name)
    {
        switch ($column_name) {
            case 'status':
                $statuses = ambikly_product_statuses();
                return $statuses[$item[$column_name]] ?? 'N/A';
            case 'discounted_price':
            case 'regular_price':
                return ambikly_get_price($item[$column_name]);
            case 'created_at':
            case 'updated_at':
                return esc_html(ambikly_format_date($item[$column_name]));
            case 'product_name':
                return $this->column_product_name($item);
            default:
                return esc_html($item[$column_name]);
        }
    }

    public function column_product_name($item)
    {
        $edit_link = esc_url(admin_url('admin.php?page=ambikly&sub=add-new-product&action=edit&id=' . $item['ID']));
        $view_link = ambikly_permalink($item['product_slug'], 'product');

        $actions = array(
            'id'=>sprintf(esc_html__('ID: %d', 'ambikly'), $item['ID']),
            'edit' => sprintf('<a href="%s">%s</a>', $edit_link, esc_html__('Edit', 'ambikly')),
            'view' => sprintf('<a href="%s" target="_blank">%s</a>', esc_url($view_link), esc_html__('View', 'ambikly')),
        );

        return sprintf(
            '<a href="%s">%s</a> %s',
            $edit_link,
            esc_html($item['product_name']),
            $this->row_actions($actions)
        );
    }

    protected function column_cb($item)
    {
        return sprintf(
            '<input type="checkbox" name="product[]" value="%s" />',
            esc_attr($item['ID'])
        );
    }

    public function get_bulk_actions()
    {
        $actions = array(
            'delete' => esc_html__('Delete', 'ambikly'),
        );

        return $actions;
    }

    public function process_bulk_action()
    {
        if (!current_user_can('manage_options')) {
            return;
        }

        // Verify nonce before processing the bulk delete action
        if ('delete' === $this->current_action()) {
            if (!isset($_POST['bulk_products_nonce']) || !wp_verify_nonce(sanitize_text_field( wp_unslash($_POST['bulk_products_nonce'])), 'bulk_products_delete')) {
                wp_die(esc_html__('Security check failed!', 'ambikly'));
            }

            if (isset($_POST['product']) && is_array($_POST['product'])) {
                $product_ids = array_map('absint', $_POST['product']);

                $product_controller = ambikly()->getClass('Controllers.ProductController');
                foreach ($product_ids as $id) {
                    $product_controller->deleteByProductId($id);
                }

                // Display success message
                echo '<div class="updated notice is-dismissible"><p>' . esc_html__('Products deleted successfully.', 'ambikly') . '</p></div>';
            }
        }
    }

    /**
     * Render the nonce field for the bulk action
     */
    public function display()
    {
        // Display the nonce field for bulk actions
        echo '<form method="post">';
        wp_nonce_field('bulk_products_delete', 'bulk_products_nonce');
        parent::display();
        echo '</form>';
    }
}
