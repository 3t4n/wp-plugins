<?php

namespace Bundler\Admin;

use Bundler\Includes\Traits\Instance;
use Bundler\Admin\Admin_App;
use Bundler\Controllers\OfferController;
use Bundler\Controllers\SettingsController;
use Bundler\Helpers\CartHelper;
use Bundler\Helpers\ProductHelper;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Admin_Ajax
{
    use Instance;

    protected $offer_controller;
    protected $settings_controller;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->offer_controller    = OfferController::get_instance();
        $this->settings_controller = SettingsController::get_instance();
        $this->handle_private_ajax();
    }

    /**
     * Verify nonce
     *
     * @return void
     */
    public function verify_nonce()
    {
        $nonce = filter_input(INPUT_POST, 'bdlr_nonce', FILTER_UNSAFE_RAW);
        if (is_null($nonce) || !wp_verify_nonce($nonce, 'bdlr_nonce')) {
            wp_send_json(array(
                'msg'  => __('Security check failed', 'bundler'),
                'code' => 401
            ));
        }
    }

    /**
     * Add private ajax endpoints
     *
     * @return void
     */
    public function handle_private_ajax()
    {
        $endpoints = $this->get_available_private_endpoints();
        foreach ($endpoints as $action => $function) {
            add_action('wp_ajax_' . $action, array($this, $function));
            add_action('wp_ajax_nopriv_' . $action, array($this, $function));
        }
    }

    /**
     * Get private endpoints
     *
     * @return array
     */
    public function get_available_private_endpoints()
    {
        return [
            'bdlr_get_analytics'          => 'get_analytics',

            'bdlr_get_all_offers'        => 'get_all_offers',
            'bdlr_get_offer'             => 'get_offer',
            'bdlr_new_offer'             => 'new_offer',
            'bdlr_update_offer'          => 'update_offer',
            'bdlr_duplicate_offer'       => 'duplicate_offer',
            'bdlr_delete_offer'          => 'delete_offers',
            'bdlr_change_offer_status'   => 'change_offer_status',

            'bdlr_search_products' => 'search_products',

            'bdlr_get_mc_price'            => 'get_mc_price',
            'bdlr_get_currency_data'       => 'get_currency_data',
            'bdlr_get_product_for_preview' => 'get_product_for_preview',
            'bdlr_get_product_permalink'   => 'get_product_permalink',

            'bdlr_get_settings'    => 'get_settings',
            'bdlr_update_settings' => 'update_settings',
        ];
    }

    /**
     * Get sales analytics
     * 
     * @return json
     */
    public function get_analytics()
    {
        $this->verify_nonce();

        $start_date = isset($_POST['start_date']) ? sanitize_text_field($_POST['start_date']) : null;
        $end_date   = isset($_POST['end_date']) ? sanitize_text_field($_POST['end_date']) : null;

        $args = [
            'limit'  => -1,
            'status' => ['completed', 'processing'],
        ];

        if ($start_date && $end_date) {
            $args['date_query'] = [
                'after' => $start_date,
                'before' => $end_date,
                'inclusive' => true,
            ];
        }

        $orders = wc_get_orders($args);

        $analytics = [
            'total_bundle_orders' => 0,
            'bundle_revenue' => 0,
            'average_order_value' => 0,
            'average_items_per_bundle' => 0,
            'daily_revenue' => [], // For storing revenue by date
        ];

        $total_items = 0;

        foreach ($orders as $order) {
            $order_date = $order->get_date_created()->date('Y-m-d');

            foreach ($order->get_items() as $item_id => $item) {
                $bundle_data = $item->get_meta('_wbdl_data', true);

                if (!empty($bundle_data)) {
                    $analytics['total_bundle_orders']++;
                    $item_quantity = $item->get_quantity();
                    $sale_price = floatval($bundle_data['sale_price'] ?? 0);
                    $order_revenue = $sale_price * $item_quantity;

                    // Add to total revenue
                    $analytics['bundle_revenue'] += $order_revenue;

                    // Add to total items
                    $total_items += $item_quantity;

                    // Add to daily revenue
                    if (!isset($analytics['daily_revenue'][$order_date])) {
                        $analytics['daily_revenue'][$order_date] = 0;
                    }
                    $analytics['daily_revenue'][$order_date] += $order_revenue;
                }
            }
        }

        if ($analytics['total_bundle_orders'] > 0) {
            $analytics['average_items_per_bundle'] = round($total_items / $analytics['total_bundle_orders'], 2);
            $analytics['average_order_value'] = round($analytics['bundle_revenue'] / $analytics['total_bundle_orders'], 2);
        }

        // Format revenue values
        $analytics['bundle_revenue'] = html_entity_decode(wp_strip_all_tags(wc_price($analytics['bundle_revenue'])));
        $analytics['average_order_value'] = html_entity_decode(wp_strip_all_tags(wc_price($analytics['average_order_value'])));

        // Prepare daily revenue for frontend (convert associative array to indexed array)
        $analytics['daily_revenue'] = array_map(
            function ($date, $revenue) {
                return [
                    'date' => $date,
                    'revenue' => round($revenue, 2), // Keep 2 decimal places for revenue
                ];
            },
            array_keys($analytics['daily_revenue']),
            $analytics['daily_revenue']
        );

        return wp_send_json([
            "success" => true,
            "analytics" => $analytics,
            "orders" => $orders,
            "start date" => $start_date,
            "end date" => $end_date
        ]);
    }

    /**
     * get all offers
     * 
     * @return json
     */
    public function get_all_offers()
    {
        $this->verify_nonce();

        $type   = isset($_POST['type']) ? sanitize_text_field($_POST['type']) : null;
        $offers = $type === 'bundle' ? $this->offer_controller->get_bundle_offers() : $this->offer_controller->get_all_offers();

        if (is_array($offers)) {
            return wp_send_json(array(
                'status' => true,
                'offers' => $offers,
                "test" => 'test',
                'msg'    => __('fetched offers', 'bundler'),
            ));
        }

        return wp_send_json(array(
            'status'   => false,
            'msg'      => __('Error fetching offers', 'bundler'),
        ));
    }

    /**
     * get offer 
     * 
     * @return json
     */
    public function get_offer()
    {
        $this->verify_nonce();

        $offer_id = isset($_POST['offer_id']) ? json_decode(stripslashes($_POST['offer_id'])) : null;

        if ($offer_id) {
            $response = $this->offer_controller->get_offer($offer_id);
            wp_send_json($response);
        }

        return wp_send_json(array(
            'status'   => false,
            'msg'      => __('Invalid offer ID', 'bundler'),
        ));
    }

    /**
     * AJAX new offer
     * 
     * @return json
     */
    public function new_offer()
    {
        $this->verify_nonce();
        $this->clear_cache();

        $offer_json = isset($_POST['offer']) ? stripslashes($_POST['offer']) : '';
        $offer_data = json_decode($offer_json, true);

        if (!$offer_data) {
            wp_send_json(array(
                'status'   => false,
                'msg'      => __('Error with offer data', 'bundler'),
            ));
        }

        $product_ids = isset($offer_data['products']) ? array_column($offer_data['products'], 'id') : [];

        foreach ($product_ids as $product_id) {
            $product = wc_get_product($product_id);
            if (!$product) {
                wp_send_json(array(
                    'status'   => false,
                    'msg'      => __('Invalid product ID:' . $product_id, 'bundler'),
                ));
            }

            $product_type = $product->get_type();

            if (!($product_type === 'simple' || $product_type === 'simple-subscription')) {
                wp_send_json(array(
                    'status'   => false,
                    'msg'      => __('You are on Bundler Lite. You cannot create offers for variable products.', 'bundler'),
                ));
            }
        }

        $result = $this->offer_controller->new_offer($offer_data);

        if ($result->status) {
            wp_send_json(array(
                'status' => true,
                'offerId' => $result->offerId,
                'msg'    => __('Offer created successfully!', 'bundler'),
            ));
        } else {
            wp_send_json(array(
                'status'   => false,
                // 'msg'      => __('Error creating the offer.', 'bundler'),
                'msg' => $result->msg
            ));
        }
    }

    /**
     * AJAX update offer
     * 
     * @return json
     */
    public function update_offer()
    {
        $this->verify_nonce();
        $this->clear_cache();

        $offer_json = isset($_POST['offer']) ? stripslashes($_POST['offer']) : '';
        $offer_data = json_decode($offer_json, true);

        if (!$offer_data) {
            wp_send_json(array(
                'status'   => false,
                'msg'      => __('Error with offer data', 'bundler'),
            ));
        }

        $product_ids = isset($offer_data['products']) ? array_column($offer_data['products'], 'id') : [];

        foreach ($product_ids as $product_id) {
            $product = wc_get_product($product_id);
            if (!$product) {
                wp_send_json(array(
                    'status'   => false,
                    'msg'      => __('Invalid product ID:' . $product_id, 'bundler'),
                ));
            }

            $product_type = $product->get_type();

            if (!($product_type === 'simple' || $product_type === 'subscription')) {
                wp_send_json(array(
                    'status'   => false,
                    'msg'      => __('You are on Bundler Lite. You cannot create offers for variable products.', 'bundler'),
                ));
            }
        }

        $result = $this->offer_controller->update_offer($offer_data);

        if ($result->status) {
            wp_send_json(array(
                'status'   => true,
                'msg'      => __('Offer updated successfully!', 'bundler'),
            ));
        } else {
            wp_send_json(array(
                'status'   => false,
                'msg'      => __('Error updating the offer.', 'bundler'),
            ));
        }
    }

    /**
     * AJAX change offer status (enable or disble)
     * 
     * @return json
     */
    public function change_offer_status()
    {
        $this->verify_nonce();
        $this->clear_cache();

        $offer_ids = isset($_POST['offer_ids']) ? json_decode(stripslashes($_POST['offer_ids'])) : [];
        if (empty($offer_ids)) {
            wp_send_json(array(
                'status' => false,
                'msg'    => __('Invalid offer ID', 'bundler'),
            ));
        }

        $status = sanitize_text_field($_POST['status']);

        foreach ($offer_ids as $id) {
            $this->offer_controller->update_offer_status($id, $status);
        }

        wp_send_json(array(
            'status'   => true,
            'msg'      => __('Offer status changed', 'bundler'),
        ));
    }

    /**
     * AJAX delete offer
     * 
     * @return object
     */
    public function delete_offers()
    {
        $this->verify_nonce();
        $this->clear_cache();

        $offer_ids = isset($_POST['offer_ids']) ? json_decode(stripslashes($_POST['offer_ids'])) : [];

        if (empty($offer_ids)) {
            wp_send_json(array(
                'status' => false,
                'msg'    => __('Invalid offer ID', 'bundler'),
            ));
        }

        $result = $this->offer_controller->delete_offers($offer_ids);

        if ($result) {
            wp_send_json(array(
                'status' => true,
                'msg'    => __('Offer(s) deleted successfully', 'bundler'),
            ));
        } else {
            wp_send_json(array(
                'status' => false,
                'msg'    => __('Failed to delete offer(s)', 'bundler'),
            ));
        }
    }

    /**
     * Duplicate offer
     * 
     * @return object
     */
    public function duplicate_offer()
    {
        $this->verify_nonce();
        $this->clear_cache();

        $offer_json = isset($_POST['offer']) ? stripslashes($_POST['offer']) : '';
        $offer_data = json_decode($offer_json, true);

        if (!$offer_data) {
            wp_send_json(array(
                'status'   => false,
                'msg'      => __('Error with offer data', 'bundler'),
            ));
        }

        $product_ids = isset($offer_data['products']) ? array_column($offer_data['products'], 'id') : [];

        foreach ($product_ids as $product_id) {
            $product = wc_get_product($product_id);
            if (!$product) {
                wp_send_json(array(
                    'status'   => false,
                    'msg'      => __('Invalid product ID:' . $product_id, 'bundler'),
                ));
            }

            $product_type = $product->get_type();

            if (!($product_type === 'simple' || $product_type === 'simple-subscription')) {
                wp_send_json(array(
                    'status'   => false,
                    'msg'      => __('You are on Bundler Lite. You cannot create offers for variable products.', 'bundler'),
                ));
            }
        }

        $result = $this->offer_controller->new_offer($offer_data);

        if ($result->status) {
            wp_send_json(array(
                'status' => true,
                'result' => $result,
                'msg'    => __('Offer created successfully!', 'bundler'),
            ));
        } else {
            wp_send_json(array(
                'status'   => false,
                'msg'      => __('Error creating the offer.', 'bundler'),
            ));
        }
    }

    /**
     * AJAX product search
     * 
     * @return void
     */
    public function search_products()
    {
        $this->verify_nonce();

        //For loading all language Product in select box.
        //$this->load_all_wpml_products();
        //$query = $this->input->post('query', '');
        $query = isset($_POST['query']) ? sanitize_text_field($_POST['query']) : '';

        $products = ProductHelper::search_products($query, 10);

        wp_send_json(array(
            'status' => true,
            'products' => $products,
            'msg'    => __('success', 'bundler'),
        ));
    }

    /**
     * @return object
     */
    public function get_product_for_preview()
    {
        $this->verify_nonce();

        $product = ProductHelper::get_product_for_preview();

        wp_send_json(array(
            'status' => true,
            'product' => $product,
            'msg'    => __('success', 'bundler'),
        ));
    }

    /**
     * Get a product permalink
     * 
     * @return mixed
     */
    public function get_product_permalink()
    {
        $this->verify_nonce();

        $product_id = isset($_POST['product_id']) ? sanitize_text_field($_POST['product_id']) : '';

        $product_permalink = get_permalink($product_id);

        wp_send_json(array(
            'status' => true,
            'permalink' => $product_permalink,
            'msg'    => __('success', 'bundler'),
        ));
    }

    /**
     * Get the price in a given currency if a multicurrency plugin is enabled
     * 
     * @return object
     */
    public function get_mc_price()
    {
        $price = isset($_POST['price']) ? sanitize_text_field($_POST['price']) : 0;
        if ($price > 0)
            $price = CartHelper::get_wmc_price($price);

        wp_send_json(array(
            'status' => true,
            'price' => $price,
            'msg'    => __('success', 'bundler'),
        ));
    }

    /**
     * Get the settings
     * 
     * @return object
     */
    public function get_settings()
    {
        $this->verify_nonce();

        $settings = $this->settings_controller->get_settings();

        wp_send_json(array(
            'status'   => true,
            'settings' => $settings,
            'msg' => __('success', 'bundler'),
        ));
    }

    /**
     * Get the volume discount settings
     * 
     * @return object
     */
    public function update_settings()
    {
        $this->verify_nonce();
        $this->clear_cache();

        $settings_json = filter_input(INPUT_POST, 'settings', FILTER_DEFAULT);
        $settings = json_decode($settings_json, true);

        $result = $this->settings_controller->update_settings($settings);

        if ($result) {
            wp_send_json(array(
                'status' => true,
                'msg'    => __('Settings updated successfully', 'bundler'),
            ));
        } else {
            wp_send_json(array(
                'status' => false,
                'msg'    => __('Failed to update settings', 'bundler'),
            ));
        }
    }

    /**
     * Clear cache
     *
     * @return void
     */
    protected function clear_cache()
    {
        Admin_App::maybe_clear_cache();
    }
}

if (is_admin()) {
    return Admin_Ajax::get_instance();
}
