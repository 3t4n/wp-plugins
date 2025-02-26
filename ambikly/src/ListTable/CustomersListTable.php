<?php

namespace Ambikly\ListTable;

use Ambikly\Controllers\CategoryController;
use Ambikly\Controllers\CustomerController;
use WP_List_Table;

class CustomersListTable extends WP_List_Table
{
    public function __construct()
    {
        parent::__construct(array(
            'singular' => esc_html__('Customer', 'ambikly'),
            'plural' => esc_html__('Customers', 'ambikly'),
            'ajax' => false,
            'screen' => 'ambikly-customers',
        ));
    }

    public function get_columns()
    {
        return array(
            'cb' => '<input type="checkbox" />',
            'ID' => esc_html__('ID', 'ambikly'),
            'user_id' => esc_html__('User', 'ambikly'),
            'firstname' => esc_html__('First Name', 'ambikly'),
            'lastname' => esc_html__('Last Name', 'ambikly'),
            'email' => esc_html__('Email', 'ambikly'),
            'created_at' => esc_html__('Created', 'ambikly'),
        );
    }

    public function prepare_items()
    {
        $per_page = 10;
        $current_page = $this->get_pagenum();
        $offset = ($current_page - 1) * $per_page;

        /**
         * @var CustomerController $customer
         */
        $customer = ambikly()->getClass('Controllers.CustomerController');
        $data = $customer->getCustomers($per_page, $offset);
        $total_items = $customer->getCustomerCount();

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
            case 'created_at':
            case 'updated_at':
                return esc_html(ambikly_format_date($item[$column_name]));
            case 'user_id':
                return $this->column_user($item);
            default:
                return esc_html($item[$column_name]);
        }
    }

    protected function column_cb($item)
    {
        return sprintf(
            '<input type="checkbox" name="customers[]" value="%s" />',
            esc_attr($item['ID'])
        );
    }

    public function column_user($item)
    {
        $user_id = $item['user_id'] ?? 0;

        if ($user_id < 1) {
            return 'N/A';
        } else {
            $edit_link = esc_url(admin_url('user-edit.php?user_id=' . $item['user_id']));

            $actions = array(
                'edit' => sprintf('<a target="_blank" href="%s">%s</a>', $edit_link, esc_html__('View User', 'ambikly')),
            );

            return sprintf(
                '<a target="_blank" href="%s">%s</a> %s',
                $edit_link,
                esc_html($item['user_id']),
                $this->row_actions($actions)
            );
        }
    }

    public function get_bulk_actions1()
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
            if (!isset($_POST['bulk_categories_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['bulk_categories_nonce'])), 'bulk_categories_delete')) {
                wp_die(esc_html__('Security check failed!', 'ambikly'));
            }

            if (isset($_POST['categories']) && is_array($_POST['categories'])) {
                $category_ids = array_map('absint', $_POST['categories']);

                $category = ambikly()->getClass('Controllers.CategoryController');
                foreach ($category_ids as $id) {
                    $category->deleteCategoryById($id);
                }

                // Display success message
                echo '<div class="updated notice is-dismissible"><p>' . esc_html__('Categories deleted successfully.', 'ambikly') . '</p></div>';
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
        wp_nonce_field('bulk_categories_delete', 'bulk_categories_nonce');
        parent::display();
        echo '</form>';
    }
}
