<?php

namespace Ambikly\ListTable;

use Ambikly\Controllers\CategoryController;
use WP_List_Table;

class CategoryListTable extends WP_List_Table
{
    public function __construct()
    {
        parent::__construct(array(
            'singular' => esc_html__('Category', 'ambikly'),
            'plural' => esc_html__('Categories', 'ambikly'),
            'ajax' => false,
            'screen' => 'ambikly-categories',
        ));
    }

    public function get_columns()
    {
        return array(
            'cb' => '<input type="checkbox" />',
            'category_name' => esc_html__('Name', 'ambikly'),
            'status' => esc_html__('Status', 'ambikly'),
            'category_slug' => esc_html__('Slug', 'ambikly'),
            'updated_at' => esc_html__('Updated', 'ambikly'),
        );
    }

    public function prepare_items()
    {
        $per_page = 10;
        $current_page = $this->get_pagenum();
        $offset = ($current_page - 1) * $per_page;

        /**
         * @var CategoryController $category
         */
        $category = ambikly()->getClass('Controllers.CategoryController');
        $data = $category->getCategories($per_page, $offset);
        $total_items = $category->getCategoryCount();

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
            case "status":
                $statuses = ambikly_product_category_statuses();
                return $statuses[$item[$column_name]] ?? 'N/A';
            case 'created_at':
            case 'updated_at':
                return esc_html(ambikly_format_date($item[$column_name]));
            case 'category_name':
                return $this->column_product_name($item);
            default:
                return esc_html($item[$column_name]);
        }
    }

    protected function column_cb($item)
    {
        return sprintf(
            '<input type="checkbox" name="categories[]" value="%s" />',
            esc_attr($item['ID'])
        );
    }

    public function column_product_name($item)
    {
        $edit_link = esc_url(admin_url('admin.php?page=ambikly&sub=add-new-category&action=edit&id=' . $item['ID']));
        $view_link = ambikly_permalink($item['category_slug'], 'category');

        $actions = array(
            'id'=>sprintf(esc_html__('ID: %d', 'ambikly'), $item['ID']),
            'edit' => sprintf('<a href="%s">%s</a>', $edit_link, esc_html__('Edit', 'ambikly')),
            'view' => sprintf('<a href="%s" target="_blank">%s</a>', esc_url($view_link), esc_html__('View', 'ambikly')),
        );

        return sprintf(
            '<a href="%s">%s</a> %s',
            $edit_link,
            esc_html($item['category_name']),
            $this->row_actions($actions)
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
            if (!isset($_POST['bulk_categories_nonce']) || !wp_verify_nonce(sanitize_text_field( wp_unslash($_POST['bulk_categories_nonce'])), 'bulk_categories_delete')) {
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
