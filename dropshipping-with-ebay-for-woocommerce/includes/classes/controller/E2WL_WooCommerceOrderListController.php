<?php
/**
 * Description of E2WL_WooCommerceOrderListController
 *
 * @author AlexKu
 *
 * @autoload: e2wl_init
 */
if (!class_exists('E2WL_WooCommerceOrderListController')) {
    class E2WL_WooCommerceOrderListController
    {
        private $bulk_actions = array();
        private $bulk_actions_text = array();
        private $woocommerce_model;

        public function __construct()
        {
            if (is_admin()) {
                add_filter("bulk_actions-edit-shop_order", array($this, 'bulk_actions'));

                add_action('admin_enqueue_scripts', array($this, 'assets'));

                add_action('e2wl_install', array($this, 'install'));

                add_filter('woocommerce_admin_order_actions', array($this, 'admin_order_actions'), 2, 100);

                add_action('wp_ajax_e2wl_order_info', array($this, 'ajax_order_info'));

                //    add_action('wp_ajax_e2wl_get_fulfilled_orders', array($this, 'ajax_get_fulfilled_orders'));
                //    add_action('manage_posts_extra_tablenav', array($this, 'add_bulk_order_sunc_button'));
                //    add_action('wp_ajax_e2wl_save_tracking_code', array($this, 'ajax_save_tracking_code'));

                $this->woocommerce_model = new E2WL_Woocommerce();
                list($this->bulk_actions, $this->bulk_actions_text) = apply_filters('e2wl_wcol_bulk_actions_init', array($this->bulk_actions, $this->bulk_actions_text));
            }
        }

        public function install()
        {
            $user = wp_get_current_user();
            $page = "edit-shop_order";
            $hidden = array("billing_address");
            update_user_option($user->ID, "manage{$page}columnshidden", $hidden, true);
        }

        public function bulk_actions($actions)
        {
            foreach ($this->bulk_actions as $action) {
                $actions[$action] = $this->bulk_actions_text[$action];
            }
            return $actions;
        }

        public function ajax_order_info()
        {
            $result = array("state" => "ok", "data" => "");

            $post_id = isset($_POST['id']) ? intval($_POST['id']) : false;

            if (!$post_id) {
                $result['state'] = 'error';
                echo json_encode($result);
                wp_die();
            }

            $content = array();

            $order = new WC_Order($post_id);

            $items = $order->get_items();

            $order_external_id_array = get_post_meta($order->get_id(), '_e2w_external_order_id');

            $k = 1;

            foreach ($items as $item) {
                $normalized_item = new A2W_WooCommerceOrderItem($item);

                $product_name = $normalized_item->getName();
                $product_id = $normalized_item->getProductID();

                $tmp = '';

                if ($product_id > 0) {
                    $product_url = get_post_meta($product_id, '_e2w_product_url', true);
                    $seller_url = get_post_meta($product_id, '_e2w_seller_url', true);

                    if ($product_url) {
                        $tmp = $k . '). <a title="' . $product_name . '" href="' . $product_url . '" target="_blank" class="link_to_source product_url">' . _x('Product page', 'hint', 'dropshipping-with-ebay-for-woocommerce') . '</a>';
                    }

                    if ($seller_url) {
                        $tmp .= "<span class='seller_url_block'> | <a href='" . $seller_url . "' target='_blank' class='seller_url'>" . _x('Seller', 'hint', 'dropshipping-with-ebay-for-woocommerce') . "</a></span>";
                    }

                } else {
                    $tmp .= $k . '). <span style="color:red;">' . _x('The product has been deleted', 'hint', 'dropshipping-with-ebay-for-woocommerce') . '</span>';
                }

                $content[] = $tmp;
                $k++;
            }

            if (!empty($order_external_id_array) && isset($order_external_id_array[0]) && !empty($order_external_id_array[0])) {
                $content[] = "eBay order ID(s): <span class='seller_url_block'>" . implode(", ", $order_external_id_array) . "</span>";
            }
            /*
            if (!empty($order_tracking_codes)) {
            $content[] = "Tracking number(s): <span class='seller_url_block'>" . (is_array($order_tracking_codes) ? implode(", ", $order_tracking_codes) : strval($order_tracking_codes)) . "</span>";
            }
             */

            $content = apply_filters('e2wl_get_order_content', $content, $post_id);
            $result['data'] = array('content' => $content, 'id' => $post_id);

            echo json_encode($result);
            wp_die();
        }

        public function assets()
        {
            wp_enqueue_style('e2wl-wc-ol-style', E2WL()->plugin_url . 'assets/css/wc_ol_style.css', array(), E2WL()->version);
            wp_enqueue_script('jquery-ui-dialog');
            wp_enqueue_script('e2wl-wc-ol-script', E2WL()->plugin_url . 'assets/js/wc_ol_script.js', array(), E2WL()->version);

            $lang_data = array(
                'ebay_info' => _x('EBay Info', 'Dialog title', 'dropshipping-with-ebay-for-woocommerce'),
                'please_wait_data_loads' => _x('Please wait, data loads...', 'Status', 'dropshipping-with-ebay-for-woocommerce'),
                'please_wait' => _x('Please wait...', 'Status', 'dropshipping-with-ebay-for-woocommerce'),
                'sync_process' => _x('Sync process', 'Status', 'dropshipping-with-ebay-for-woocommerce'),
                'sync_done' => _x('Sync done!', 'Button text', 'dropshipping-with-ebay-for-woocommerce'),
                'error' => _x('Error!', 'Button text', 'dropshipping-with-ebay-for-woocommerce'),
                'error_please_install_new_extension' => _x('Error! Please install the latest Chrome extension.', 'Error text', 'dropshipping-with-ebay-for-woocommerce'),
                'error_cant_do_tracking_sync' => _x('Can`t do Tracking Sync. Unknown error in the Chrome extension. Please contact with the support.', 'Error text', 'dropshipping-with-ebay-for-woocommerce'),
                'try_again' => _x('Try again?', 'Button text', 'dropshipping-with-ebay-for-woocommerce'),
                'error_didnt_do_find_ebay_order_num' => _x('Didn`t find the eBay order №', 'Error text', 'dropshipping-with-ebay-for-woocommerce'),
                'error_cant_do_tracking_sync_login_to_account' => _x('Can`t do Tracking Sync. Please log-in to your eBay account first.', 'Error text', 'dropshipping-with-ebay-for-woocommerce'),
                'no_tracking_codes_for_order' => _x('No tracking codes for given order on AliExpress.', 'Status', 'dropshipping-with-ebay-for-woocommerce'),
                'tracking_sync' => _x('Tracking Sync All', 'Button text', 'dropshipping-with-ebay-for-woocommerce'),
                'error_403_code' => _x('The error with 403 code occured for the eBay order №', 'Error text', 'dropshipping-with-ebay-for-woocommerce'),
                'tracking_sync_done' => _x('The Tracking Sunc has been done!', 'Status', 'dropshipping-with-ebay-for-woocommerce'),
            );

            wp_localize_script('e2wl-wc-ol-script', 'e2wl_script_data', array('lang' => $lang_data));
        }

        public function admin_order_actions($actions, $object)
        {
            $actions['e2wl_order_fulfillment'] = array(
                'url' => '#' . $object->get_id(),
                'name' => __('Place order on eBay', 'dropshipping-with-ebay-for-woocommerce'),
                'action' => 'e2wl_ebay_order_fulfillment',
            );
            return $actions;
        }
    }
}
