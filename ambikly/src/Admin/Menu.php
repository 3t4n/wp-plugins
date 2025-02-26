<?php

namespace Ambikly\Admin;

use Ambikly\Admin\Pages\AddNewCategoryPage;
use Ambikly\Admin\Pages\AddNewOrderPage;
use Ambikly\Admin\Pages\AddNewPaymentPage;
use Ambikly\Admin\Pages\AddNewProductPage;
use Ambikly\Admin\Pages\CategoryTablePage;
use Ambikly\Admin\Pages\CustomersTablePage;
use Ambikly\Admin\Pages\DashboardPage;
use Ambikly\Admin\Pages\OrderTablePage;
use Ambikly\Admin\Pages\PaymentsTablePage;
use Ambikly\Admin\Pages\ProductTablePage;
use Ambikly\ListTable\OrderListTable;
use Ambikly\Settings\CheckoutSettings;
use Ambikly\Settings\GeneralSettings;
use Ambikly\Settings\PaymentCashOnDelivery;
use Ambikly\Settings\PaymentPayPal;

class Menu
{
    public function __construct()
    {
        add_action('admin_menu', [$this, 'add_admin_menu']);
        add_action('admin_menu', [$this, 'set_active_submenu']);

    }

    public function add_admin_menu()
    {
        // Main menu page
        add_menu_page(
            esc_html__('Ambikly', 'ambikly'),
            esc_html__('Ambikly', 'ambikly'),
            'manage_options',
            'ambikly',
            [$this, 'admin_page'],
            'dashicons-cart',
            6
        );
        add_submenu_page(
            'ambikly',
            esc_html__('Dashboard', 'ambikly'),
            esc_html__('Dashboard', 'ambikly'),
            'manage_options',
            'ambikly',
            [$this, 'admin_page']
        );
        add_submenu_page(
            'ambikly',                                   // Parent slug
            esc_html__('Products', 'ambikly'),           // Page title
            esc_html__('Products', 'ambikly'),           // Menu title
            'manage_options',                            // Capability
            'admin.php?page=ambikly&sub=products',       // Custom URL for 'Products' section
            null
        );

        add_submenu_page(
            'ambikly',                                   // Parent slug
            esc_html__('Add New Product', 'ambikly'),    // Page title
            esc_html__('↳ Add New', 'ambikly'),    // Menu title
            'manage_options',                            // Capability
            'admin.php?page=ambikly&sub=add-new-product',// Custom URL for 'Add New Product'
            null
        );
        add_submenu_page(
            'ambikly',                                   // Parent slug
            esc_html__('Categories', 'ambikly'),    // Page title
            esc_html__('↳ Categories', 'ambikly'),    // Menu title
            'manage_options',                            // Capability
            'admin.php?page=ambikly&sub=categories',// Custom URL for 'Add New Product'
            null
        );
        add_submenu_page(
            'ambikly',                                   // Parent slug
            esc_html__('Orders', 'ambikly'),    // Page title
            esc_html__('Orders', 'ambikly'),    // Menu title
            'manage_options',                            // Capability
            'admin.php?page=ambikly&sub=orders',// Custom URL for 'Add New Product'
            null
        );
        add_submenu_page(
            'ambikly',                                   // Parent slug
            esc_html__('Payments', 'ambikly'),    // Page title
            esc_html__('↳ Payments', 'ambikly'),    // Menu title
            'manage_options',                            // Capability
            'admin.php?page=ambikly&sub=payments',// Custom URL for 'Add New Product'
            null
        );
        add_submenu_page(
            'ambikly',
            esc_html__('Customers', 'ambikly'),
            esc_html__('Customers', 'ambikly'),
            'manage_options',
            'admin.php?page=ambikly&sub=customers',
            null
        );
        add_submenu_page(
            'ambikly',                                   // Parent slug
            esc_html__('Settings', 'ambikly'),           // Page title
            esc_html__('Settings', 'ambikly'),           // Menu title
            'manage_options',                            // Capability
            'admin.php?page=ambikly&sub=settings&tab=general',       // Custom URL for 'Settings'
            null
        );
    }

    /**
     * This method ensures the correct submenu is highlighted
     */
    public function set_active_submenu()
    {
        global $submenu_file, $parent_file;

        // Check if 'sub' parameter is present
        $sub = isset($_GET['sub']) ? sanitize_text_field($_GET['sub']) : '';

        // If 'sub' parameter is empty or invalid, highlight the main Ambikly menu
        switch ($sub) {
            case 'products':
                $submenu_file = 'admin.php?page=ambikly&sub=products';
                break;

            case 'categories':
                $submenu_file = 'admin.php?page=ambikly&sub=categories';
                break;
            case 'add-new-product':
                $submenu_file = 'admin.php?page=ambikly&sub=add-new-product';
                break;
            case 'add-new-category':
                $submenu_file = 'admin.php?page=ambikly&sub=categories';
                break;
            case 'orders':
                $submenu_file = 'admin.php?page=ambikly&sub=orders';
                break;
            case 'payments':
                $submenu_file = 'admin.php?page=ambikly&sub=payments';
                break;
            case 'new-payment':
                $submenu_file = 'admin.php?page=ambikly&sub=payments';
                break;
            case 'new-order':
                $submenu_file = 'admin.php?page=ambikly&sub=orders';
                break;
            case 'settings':
                $submenu_file = 'admin.php?page=ambikly&sub=settings&tab=general';
                break;
            case 'customers':
                $submenu_file = 'admin.php?page=ambikly&sub=customers';
                break;

            default:
                // If no valid 'sub', highlight the main Ambikly page
                $submenu_file = 'ambikly';
                break;
        }


        // Always ensure 'ambikly' is the parent file
        $parent_file = 'ambikly';


    }

    public function admin_page()
    {
        $sub = isset($_GET['sub']) ? sanitize_text_field($_GET['sub']) : '';

        switch ($sub) {
            case 'products':
                $this->products_page();
                break;
            case 'categories':
                $this->categories_page();
                break;
            case 'add-new-product':
                $this->add_new_product_page();
                break;
            case 'add-new-category':
                $this->add_new_category_page();
                break;
            case 'orders':
                $this->orders_page();
                break;
            case 'payments':
                $this->payments_page();
                break;
            case 'new-payment':
                $this->add_payment_page();
                break;
            case 'new-order':
                $this->add_order_page();
                break;
            case 'settings':
                $this->settings_page();
                break;
            case 'customers':
                $this->customers_page();
                break;
            default:
                $this->dashboard_page();  // Default to the dashboard page
                break;
        }
    }

    public function dashboard_page()
    {
        $page = apply_filters('ambikly_admin_page', new DashboardPage());

        $page->output();
    }

    public function products_page()
    {
        $product_table_page = new ProductTablePage();

        $product_table_page->output();
    }

    public function categories_page()
    {
        $category_table_page = new CategoryTablePage();

        $category_table_page->output();
    }

    public function orders_page()
    {
        $order_table_page = new OrderTablePage();

        $order_table_page->output();
    }

    public function payments_page()
    {
        $payments_table_page = new PaymentsTablePage();

        $payments_table_page->output();
    }

    public function add_payment_page()
    {
        $payment_page = new AddNewPaymentPage();

        $payment_page->output();
    }

    public function add_order_page()
    {
        $payment_page = new AddnewOrderPage();

        $payment_page->output();
    }

    public function add_new_product_page()
    {
        $add_new_product_page = new AddNewProductPage();

        $add_new_product_page->output();
    }

    public function add_new_category_page()
    {
        $category_page = new AddNewCategoryPage();

        $category_page->output();
    }

    public function customers_page()
    {
        $page = new CustomersTablePage();

        $page->output();
    }

    public function settings_page()
    {
        $current_tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'general';

        $current_subtab = isset($_GET['subtab']) ? sanitize_text_field($_GET['subtab']) : '';

        $current_tab = $current_tab == '' ? 'general' : $current_tab;

        $setting_class = ambikly_get_setting_class($current_tab, $current_subtab);

        if ($setting_class !== '' && $setting_class !== null) {

            $settings = new $setting_class();

            $settings->output();
        } else {
            echo esc_html__('Undefined Class', 'ambikly');
        }

    }
}