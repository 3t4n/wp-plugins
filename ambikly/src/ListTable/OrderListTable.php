<?php

namespace Ambikly\ListTable;

use Ambikly\Controllers\OrderController;
use WP_List_Table;

class OrderListTable extends WP_List_Table
{
    public function __construct()
    {
        parent::__construct(array(
            'singular' => esc_html__('Order', 'ambikly'),
            'plural' => esc_html__('Orders', 'ambikly'),
            'ajax' => false,
            'screen' => 'ambikly-products',
        ));
    }

    public function get_columns()
    {
        return array(
            'cb' => '<input type="checkbox" />',
            'order_code' => esc_html__('Order Code', 'ambikly'),
            'email' => esc_html__('Customer', 'ambikly'),
            'total_amount' => esc_html__('Amount', 'ambikly'),
            'status' => esc_html__('Status', 'ambikly'),
            'created_at' => esc_html__('Created', 'ambikly')
        );
    }

    public function prepare_items()
    {
        $per_page = 10;
        $current_page = $this->get_pagenum();
        $offset = ($current_page - 1) * $per_page;

        /**
         * @var OrderController $order_controller
         */
        $order_controller = ambikly()->getClass('Controllers.OrderController');
        $data = $order_controller->getOrders($per_page, $offset);
        $total_items = $order_controller->getOrdersCount();

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
            case 'order_code':
                return $this->column_product_name($item);
            case 'ID':
            case 'customer_email':
            case 'stock_quantity':
                return esc_html($item[$column_name]);
            case 'created_at':
            case 'updated_at':
                return esc_html(ambikly_format_date($item[$column_name]));
            case 'status':
                $order_status = ambikly_get_order_statuses();
                $status_text = $order_status[$item[$column_name]] ?? 'N/A';
                return esc_html($status_text);
            case 'total_amount':
                return $this->column_total_amount($item);
            default:
                return esc_html($item[$column_name]);
        }
    }

    public function column_product_name($item)
    {
        $edit_link = esc_url(admin_url('admin.php?page=ambikly&sub=new-order&action=edit&id=' . $item['ID']));
        $actions = array(
            'id'=>sprintf(esc_html__('ID: %d', 'ambikly'), $item['ID']),
            'edit' => sprintf('<a href="%s">%s</a>', $edit_link, esc_html__('Edit', 'ambikly')),
        );

        return sprintf(
            '<a href="%s">%s</a> %s',
            $edit_link,
            esc_html($item['order_code']),
            $this->row_actions($actions)
        );
    }

    public function column_total_amount($item)
    {
        $currency = $item['currency'] ?? '';
        $amount = $item['total_amount'] ?? '';

        echo ambikly_get_price($amount, $currency);
    }

    protected function column_cb($item)
    {
        return sprintf(
            '<input type="checkbox" name="orders[]" value="%s" />',
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
            if (!isset($_POST['bulk_orders_nonce']) || !wp_verify_nonce(sanitize_text_field( wp_unslash($_POST['bulk_orders_nonce'])), 'bulk_orders_delete')) {
                wp_die(esc_html__('Security check failed!', 'ambikly'));
            }

            if (isset($_POST['orders']) && is_array($_POST['orders'])) {
                $order_ids = array_map('absint', $_POST['orders']);

                $order_controller = ambikly()->getClass('Controllers.OrderController');
                foreach ($order_ids as $id) {
                    $order_controller->deleteByOrderId($id);
                }

                // Display success message
                echo '<div class="updated notice is-dismissible"><p>' . esc_html__('Orders deleted successfully.', 'ambikly') . '</p></div>';
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
        wp_nonce_field('bulk_orders_delete', 'bulk_orders_nonce');
        parent::display();
        echo '</form>';
    }
}
