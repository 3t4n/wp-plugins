<?php

namespace Ambikly\ListTable;

use Ambikly\Constants;
use Ambikly\Controllers\OrderController;
use Ambikly\Controllers\PaymentController;
use Ambikly\Controllers\ProductController;
use WP_List_Table;

class PaymentListTable extends WP_List_Table
{
    public function __construct()
    {
        parent::__construct(array(
            'singular' => esc_html__('Payment', 'ambikly'),
            'plural' => esc_html__('Payments', 'ambikly'),
            'ajax' => false,
            'screen' => 'ambikly',
        ));
    }

    public function get_columns()
    {
        return array(
            'cb' => '<input type="checkbox" />',
            'ID' => esc_html__('ID', 'ambikly'),
            'order_id' => esc_html__('Order', 'ambikly'),
            'payment_method' => esc_html__('Gateway', 'ambikly'),
            'amount' => esc_html__('Amount', 'ambikly'),
            'status' => esc_html__('Status', 'ambikly'),
            'transaction_id' => esc_html__('Transaction ID', 'ambikly'),
            'payment_note' => esc_html__('Note', 'ambikly'),
            'updated_at' => esc_html__('Updated', 'ambikly'),
        );
    }

    public function prepare_items()
    {
        $per_page = 10;
        $current_page = $this->get_pagenum();
        $offset = ($current_page - 1) * $per_page;

        /**
         * @var PaymentController $payment_controller
         */
        $payment_controller = ambikly()->getClass('Controllers.PaymentController');
        $data = $payment_controller->getPayments($per_page, $offset);
        $total_items = $payment_controller->getPaymentsCount();

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
            case 'ID':
                return $this->column_product_name($item);
            case 'order_code':
            case 'customer_email':
            case 'stock_quantity':
                return esc_html($item[$column_name]);
            case 'created_at':
            case 'updated_at':
                return esc_html(ambikly_format_date($item[$column_name]));
            case 'status':
                $order_status = ambikly_get_payment_statuses();
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
        $edit_link = esc_url(admin_url('admin.php?page=ambikly&sub=new-payment&action=edit&id=' . $item['ID']));

        $actions = array(
            'edit' => sprintf('<a href="%s">%s</a>', $edit_link, esc_html__('Edit', 'ambikly')),
        );

        return sprintf(
            '<a href="%s">%s</a> %s',
            $edit_link,
            esc_html($item['ID']),
            $this->row_actions($actions)
        );
    }

    public function column_total_amount($item)
    {
        $currency = $item['currency'] ?? '';
        $amount = $item['total_amount'] ?? '';

        echo esc_html(ambikly_get_price($amount, $currency));
    }

    protected function column_cb($item)
    {
        return sprintf(
            '<input type="checkbox" name="payments[]" value="%s" />',
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
            if (!isset($_POST['bulk_payments_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['bulk_payments_nonce'])), 'bulk_payments_delete')) {
                wp_die(esc_html__('Security check failed!', 'ambikly'));
            }

            if (isset($_POST['payments']) && is_array($_POST['payments'])) {
                $payment_ids = array_map('absint', $_POST['payments']);

                $payment_controller = ambikly()->getClass('Controllers.PaymentController');
                foreach ($payment_ids as $id) {
                    $payment_controller->deleteByPaymentId($id);
                }

                // Display success message
                echo '<div class="updated notice is-dismissible"><p>' . esc_html__('Payments deleted successfully.', 'ambikly') . '</p></div>';
            }
        }
    }


    public function display()
    {
        echo '<form method="post">';
        wp_nonce_field('bulk_payments_delete', 'bulk_payments_nonce');
        parent::display();
        echo '</form>';
    }
}
