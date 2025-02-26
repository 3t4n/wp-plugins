<?php

namespace Ambikly\Ajax;

use Ambikly\Controllers\CartController;
use Ambikly\Controllers\CategoryController;
use Ambikly\Controllers\CheckoutController;
use Ambikly\Controllers\CustomerController;
use Ambikly\Controllers\OrderController;
use Ambikly\Controllers\ProductController;
use Ambikly\Controllers\SettingsController;
use Ambikly\Forms\CheckoutForm;
use Ambikly\Forms\ContactForm;
use Ambikly\Message;
use Ambikly\Options\CategoryOptions;
use Ambikly\Options\OrderOptions;
use Ambikly\Options\ProductOptions;
use Exception;

class Ajax
{

    public function __construct()
    {

        $admin_actions = $this->admin_actions();

        $public_actions = $this->public_actions();

        $all_ajax_actions = array_unique(array_merge($admin_actions, $public_actions));

        foreach ($all_ajax_actions as $action) {

            add_action('wp_ajax_ambikly_' . $action, array($this, $action));

            if (in_array($action, $public_actions)) {

                add_action('wp_ajax_nopriv_ambikly_' . $action, array($this, $action));
            }

        }
    }

    private function admin_actions()
    {
        return array(
            'save_product',
            'save_category',
            'save_settings',
            'save_order'
        );
    }

    private function public_actions()
    {
        return array(
            'add_to_cart',
            'update_cart',
            'checkout'

        );
    }

    private function validate_nonce()
    {
        $debug_backtrace = debug_backtrace();

        if (@isset($debug_backtrace[1]['function'])) {

            $nonce_action = 'ambikly_' . $debug_backtrace[1]['function'] . '_nonce';

            $nonce_value = $_REQUEST['ambikly_nonce'] ? sanitize_text_field($_REQUEST['ambikly_nonce']) : '';

            return wp_verify_nonce($nonce_value, $nonce_action);

        }

        return false;
    }

    public function save_product()
    {

        if (!$this->validate_nonce()) {

            wp_send_json_error(Message::Error(esc_html__('Nonce verification error! Please refresh the page and retry', 'ambikly')));
        }

        if (!current_user_can('manage_options')) {

            wp_send_json_error(Message::Error(esc_html__('You do not have sufficient permission!', 'ambikly')));
        }
        $_POST = wp_unslash($_POST);

        $product_settings = new ProductOptions();

        $sanitized_data = $product_settings->sanitize($_POST);

        $validation = $product_settings->validate($sanitized_data);

        if (is_array($validation) && count($validation) > 0) {

            $error_message = esc_html__('Validation error! Please validate the form properly!', 'ambikly');

            wp_send_json_error(Message::ValidationError($error_message, $validation));

            exit;
        }

        $ID = isset($_POST['ID']) ? absint($_POST['ID']) : 0;
        /**
         * @var $product_controller ProductController
         */
        $product = ambikly()->getClass('Controllers.ProductController');

        if ($ID > 0) {

            $status = $product->updateProduct($sanitized_data, $ID);

        } else {

            $status = $product->saveProduct($sanitized_data);
        }
        $redirect = '';

        if ($ID) {

            // Check if the update was successful
            if ($status === false) {

                $message = esc_html__('Product update failed.', 'ambikly');

            } elseif ($status === 0) {

                $message = esc_html__('Product updated successfully.', 'ambikly');

                $status = true;

            } else {

                $message = esc_html__('Product updated successfully.', 'ambikly');

            }

        } else {

            $message = $status ? esc_html__('Product added successfully!', 'ambikly') : esc_html__('Failed to add product.', 'ambikly');

            if ($status) {

                $redirect = ambikly_get_edit_link($status, 'product');

            }
        }

        if (!$status) {
            wp_send_json_error(Message::Error($message));
        } else {
            wp_send_json_success(Message::Success($message, $redirect));
        }
    }

    public function save_category()
    {

        if (!$this->validate_nonce()) {

            wp_send_json_error(Message::Error(esc_html__('Nonce verification error! Please refresh the page and retry', 'ambikly')));
        }

        if (!current_user_can('manage_options')) {

            wp_send_json_error(Message::Error(esc_html__('You do not have sufficient permission!', 'ambikly')));
        }

        $_POST = wp_unslash($_POST);

        $category_settings = new CategoryOptions();

        $sanitized_data = $category_settings->sanitize($_POST);

        $validation = $category_settings->validate($sanitized_data);

        if (is_array($validation) && count($validation) > 0) {

            $error_message = esc_html__('Validation error! Please validate the form properly!', 'ambikly');

            wp_send_json_error(Message::ValidationError($error_message, $validation));

            exit;
        }

        $ID = isset($_POST['ID']) ? absint($_POST['ID']) : 0;
        /**
         * @var $category CategoryController
         */
        $category = ambikly()->getClass('Controllers.CategoryController');

        if ($ID > 0) {

            $status = $category->updateCategory($sanitized_data, $ID);

        } else {

            $status = $category->saveCategory($sanitized_data);
        }
        $redirect = '';

        if ($ID) {

            // Check if the update was successful
            if ($status === false) {

                $message = esc_html__('Category update failed.', 'ambikly');

            } elseif ($status === 0) {

                $message = esc_html__('No changes made to the category.', 'ambikly');

                $status = true;

            } else {

                $message = esc_html__('Category updated successfully.', 'ambikly');

            }

        } else {

            $message = $status ? esc_html__('Category added successfully!', 'ambikly') : esc_html__('Failed to add category.', 'ambikly');

            if ($status) {

                $redirect = ambikly_get_edit_link($status, 'category');

            }
        }

        if (!$status) {
            wp_send_json_error(Message::Error($message, $redirect));
        } else {
            wp_send_json_success(Message::Success($message, $redirect));
        }
    }

    public function save_settings()
    {
        if (!$this->validate_nonce()) {

            wp_send_json_error(Message::Error(esc_html__('Nonce verification error! Please refresh the page and retry', 'ambikly')));
        }

        if (!current_user_can('manage_options')) {

            wp_send_json_error(Message::Error(esc_html__('You do not have sufficient permission!', 'ambikly')));
        }

        $current_tab = isset($_POST['current_tab']) ? sanitize_text_field($_POST['current_tab']) : null;

        $current_sub_tab = isset($_POST['current_sub_tab']) ? sanitize_text_field($_POST['current_sub_tab']) : null;

        try {

            $_POST = wp_unslash($_POST);

            $setting_class = ambikly_get_setting_class($current_tab, $current_sub_tab);


            if ($setting_class !== '' && $setting_class !== null) {

                $settings = new $setting_class();

            } else {

                throw new \Exception(esc_html__('Invalid setting class! Please refresh and try again.', 'ambikly'));
            }

            /**
             * @var $setting SettingsController
             */
            $setting = ambikly()->getClass('Controllers.SettingsController');

            $sanitized_data = $setting->sanitize($_POST, $settings->getSettings());

            $validation = $setting->validate($sanitized_data, $settings->getSettings());

            if (is_array($validation) && count($validation) > 0) {

                $error_message = esc_html__('Validation error! Please validate the form properly!', 'ambikly');

                wp_send_json_error(Message::ValidationError($error_message, $validation));

                exit;
            }
            $status = $setting->update($sanitized_data);

            wp_send_json_success(Message::Success('Settings updated successfully!'));

        } catch (\Exception $e) {
            wp_send_json_error(Message::Error($e->getMessage()));
        }
    }

    public function add_to_cart()
    {
        if (!$this->validate_nonce()) {

            wp_send_json_error(Message::Error(esc_html__('Nonce verification error! Please refresh the page and retry', 'ambikly')));
        }

        $product_id = isset($_POST['product_id']) ? absint($_POST['product_id']) : 0;

        $quantity = isset($_POST['quantity']) ? absint($_POST['quantity']) : 0;

        /**
         * @var $cart CartController
         */
        $cart = ambikly()->getClass('Controllers.CartController');

        $status = $cart->add_to_cart($product_id, $quantity);

        $cart_page_permalink = ambikly_get_cart_page(true);

        $success_message = esc_html__('Product successfully added to cart!', 'ambikly');

        if ($cart_page_permalink) {
            $success_message = sprintf(esc_html__('Product successfully added to cart! %sView Cart Page%s', 'ambikly'), '<a href="' . $cart_page_permalink . '">', '</a>');
        }


        if ($status) {

            wp_send_json_success(Message::Success($success_message));
        } else {

            wp_send_json_success(Message::Error('Unable to add product to cart!'));
        }
    }

    public function update_cart()
    {

        if (!$this->validate_nonce()) {

            wp_send_json_error(Message::Error(esc_html__('Nonce verification error! Please refresh the page and retry', 'ambikly')));
        }

        $product_id = isset($_POST['product_id']) ? absint($_POST['product_id']) : 0;

        $quantity = isset($_POST['quantity']) ? absint($_POST['quantity']) : 0;

        /**
         * @var $cart CartController
         */
        $cart = ambikly()->getClass('Controllers.CartController');

        $status = $cart->update_cart($product_id, $quantity);

        if ($quantity == 0) {

            $success_message = esc_html__('Product successfully removed from cart!', 'ambikly');

        } else {
            $success_message = esc_html__('Cart successfully updated!', 'ambikly');
        }
        if ($status) {

            wp_send_json_success(Message::Success($success_message));
        } else {

            wp_send_json_success(Message::Error('Unable to update the cart!'));
        }
    }

    public function checkout()
    {

        if (!$this->validate_nonce()) {

            wp_send_json_error(Message::Error(esc_html__('Nonce verification error! Please refresh the page and retry', 'ambikly')));
        }

        $payment_method = isset($_POST['payment_method']) ? sanitize_text_field($_POST['payment_method']) : null;

        /**
         * @var $cart CartController
         */
        $cart = ambikly()->getClass('Controllers.CartController');

        $cart_items = $cart->get_cart();

        $cart_items = is_array($cart_items) ? $cart_items : [];

        if (count($cart_items) < 1) {

            wp_send_json_error(Message::Error(esc_html__('Empty cart items!', 'ambikly')));
        }

        $checkout_form = new CheckoutForm();

        $contact_form = new ContactForm();

        $checkout_sanitized_data = $checkout_form->sanitize($_POST);

        $checkout_error = $checkout_form->validate($checkout_sanitized_data);

        $contact_sanitized_data = $contact_form->sanitize($_POST);

        $contact_error = $contact_form->validate($contact_sanitized_data);

        $all_errors = array_merge($contact_error, $checkout_error);


        if (count($all_errors) > 0) {

            ambikly_order_response(['order_status' => 'failed', 'message' => $all_errors]);

            exit;
        }

        $sanitized_data = array_merge($contact_sanitized_data, $checkout_sanitized_data);

        /**
         * @var $checkout CheckoutController
         */
        $checkout = ambikly()->getClass('Controllers.CheckoutController');

        $checkout_result = $checkout->process($sanitized_data, $payment_method);

        wp_send_json_success($checkout_result);

    }

    public function save_order()
    {

        if (!$this->validate_nonce()) {

            wp_send_json_error(Message::Error(esc_html__('Nonce verification error! Please refresh the page and retry', 'ambikly')));
        }

        if (!current_user_can('manage_options')) {

            wp_send_json_error(Message::Error(esc_html__('You do not have sufficient permission!', 'ambikly')));
        }


        /**
         * @var $order OrderController
         */
        $order = ambikly()->getClass('Controllers.OrderController');

        $_POST = wp_unslash($_POST);

        $order_options = new OrderOptions();

        $sanitized_data = $order_options->sanitize($_POST);

        $validation = $order_options->validate($sanitized_data);

        if (is_array($validation) && count($validation) > 0) {

            $error_message = esc_html__('Validation error! Please validate the form properly!', 'ambikly');

            wp_send_json_error(Message::ValidationError($error_message, $validation));

            exit;
        }
        $ID = isset($_POST['ID']) ? absint($_POST['ID']) : 0;


        if ($ID > 0) {

            $order_data = $order->getOrderById($ID);


            /**
             * @var $order CustomerController
             */
            $customer = ambikly()->getClass('Controllers.CustomerController');

            $customer_id = $sanitized_data['customer_id'] ? absint($sanitized_data['customer_id']) : 0;

            $customer_data = $customer->getCustomerById($customer_id);

            $customer_email_db = $customer_data['email'] ?? '';

            $customer_email_db = $customer_email_db == '' && isset($order_data['email']) ? $order_data['email'] : $customer_email_db;

            $order_status_db = $order_data['status'] ?? '';

            $new_order_status = $sanitized_data['status'] ?? '';

            $sanitized_data['email'] = sanitize_text_field($customer_email_db);


            $status = $order->updateOrder($sanitized_data, $ID);

            if ($status && $new_order_status != $order_status_db && $new_order_status !== '') {
                
                do_action('ambikly_after_order_status_changed', $ID, $order_status_db, $new_order_status, $sanitized_data);
            }

        } else {

            $status = $order->updateOrder($sanitized_data);
        }

        $redirect = '';

        if ($ID) {

            // Check if the update was successful
            if ($status === false) {

                $message = esc_html__('Order update failed.', 'ambikly');

            } elseif ($status === 0) {

                $message = esc_html__('No changes made to the order.', 'ambikly');

                $status = true;

            } else {

                $message = esc_html__('Order updated successfully.', 'ambikly');

            }

        } else {

            $message = $status ? esc_html__('Order added successfully!', 'ambikly') : esc_html__('Failed to add order.', 'ambikly');

            if ($status) {

                $redirect = ambikly_get_edit_link($status, 'order');

            }
        }

        if (!$status) {
            wp_send_json_error(Message::Error($message, $redirect));
        } else {
            wp_send_json_success(Message::Success($message, $redirect));
        }


    }

}