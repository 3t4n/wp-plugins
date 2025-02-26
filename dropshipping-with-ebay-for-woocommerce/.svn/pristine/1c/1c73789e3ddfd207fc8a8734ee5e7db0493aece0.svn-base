<?php
/* * class
 * Description of E2WL_WooCommerceProductListController
 *
 * @author MA_GROUP
 *
 * @autoload: e2wl_init
 */
if (!class_exists('E2WL_WooCommerceProductListController')) {

    class E2WL_WooCommerceProductListController
    {

        private $bulk_actions = array();
        private $bulk_actions_text = array();
        private $woocommerce_model;
        private $ebay_model;
        private $sync_model;

        public function __construct()
        {
            if (is_admin()) {
                add_action('admin_footer-edit.php', array($this, 'scripts'));
                add_action('load-edit.php', array($this, 'bulk_actions'));
                add_filter('post_row_actions', array($this, 'row_actions'), 2, 150);
                add_action('admin_enqueue_scripts', array($this, 'assets'));
                add_action('admin_init', array($this, 'init'));

                add_action('wp_ajax_e2wl_product_info', array($this, 'ajax_product_info'));
                add_action('wp_ajax_e2wl_sync_products', array($this, 'ajax_sync_products'));
                add_action('wp_ajax_e2wl_get_product_id', array($this, 'ajax_get_product_id'));

            }

            $this->woocommerce_model = new E2WL_Woocommerce();
            $this->ebay_model = new E2WL_Ebay();
            $this->sync_model = new E2WL_Synchronize();
        }

        public function init()
        {
            

            list($this->bulk_actions, $this->bulk_actions_text) = apply_filters('e2wl_wcpl_bulk_actions_init', array($this->bulk_actions, $this->bulk_actions_text));
        }

        public function row_actions($actions, $post)
        {
            if ('product' === $post->post_type) {
                $external_id = get_post_meta($post->ID, "_e2w_external_id", true);
                if ($external_id) {
                    $actions = array_merge($actions, array('e2wl_product_info' => sprintf('<a class="e2wl-product-info" id="e2wl-%1$d" href="/">%2$s</a>', $post->ID, 'Ebay Info')));
                }
            }

            return $actions;
        }

        public function assets()
        {

            wp_enqueue_style('e2wl-wc-pl-style', E2WL()->plugin_url . 'assets/css/wc_pl_style.css', array(), E2WL()->version);

            wp_style_add_data('e2wl-wc-pl-style', 'rtl', 'replace');

            wp_enqueue_script('jquery-ui-dialog');
            wp_enqueue_script('e2wl-wc-pl-script', E2WL()->plugin_url . 'assets/js/wc_pl_script.js', array(), E2WL()->version);

            wp_enqueue_script('e2wl-sprintf-script', E2WL()->plugin_url . 'assets/js/sprintf.js', array(), E2WL()->version);

            $lang_data = array(
                'please_wait_data_loads' => _x('Please wait, data loads..', 'Status', 'ebay2woo-lite'),
                'process_update_d_of_d' => _x('Process update %d of %d.', 'Status', 'ebay2woo-lite'),
                'process_update_d_of_d_erros_d' => _x('Process update %d of %d. Errors: %d.', 'Status', 'ebay2woo-lite'),
                'complete_result_updated_d_erros_d' => _x('Complete! Result updated: %d; errors: %d.', 'Status', 'ebay2woo-lite'),
            );

            wp_localize_script('e2wl-wc-pl-script', 'e2wl_wc_pl_script', array('lang' => $lang_data));
        }

        public function scripts()
        {
            global $post_type;

            if ($post_type == 'product') {

                foreach ($this->bulk_actions as $action) {
                    $text = $this->bulk_actions_text[$action];
                    ?>
                    <script type="text/javascript">
                        jQuery(document).ready(function () {
                            jQuery('<option>').val('<?php echo esc_attr($action); ?>').text('<?php _e($text)?>').appendTo("select[name='action']");
                            jQuery('<option>').val('<?php echo esc_attr($action); ?>').text('<?php _e($text)?>').appendTo("select[name='action2']");
                        });
                    </script>
                    <?php
}
            }
        }

        public function bulk_actions()
        {
            global $typenow;
            $post_type = $typenow;

            if ($post_type == 'product') {

                $wp_list_table = _get_list_table('WP_Posts_List_Table');
                $action = $wp_list_table->current_action();

                $allowed_actions = $this->bulk_actions;
                if (!in_array($action, $allowed_actions)) {
                    return;
                }

                check_admin_referer('bulk-posts');

                // make sure ids are submitted.  depending on the resource type, this may be 'media' or 'ids'
                if (isset($_REQUEST['post'])) {
                    $post_ids = array_map('intval', $_REQUEST['post']);
                }

                if (empty($post_ids)) {
                    return;
                }

                $sendback = remove_query_arg(array_merge($allowed_actions, array('untrashed', 'deleted', 'ids')), wp_get_referer());
                if (!$sendback) {
                    $sendback = admin_url("edit.php?post_type=$post_type");
                }

                $pagenum = $wp_list_table->get_pagenum();
                $sendback = add_query_arg('paged', $pagenum, $sendback);

                $sendback = apply_filters('e2wl_wcpl_bulk_actions_perform', $sendback, $action, $post_ids);

                $sendback = remove_query_arg(array('action', 'action2', 'tags_input', 'post_author', 'comment_status', 'ping_status', '_status', 'post', 'bulk_edit', 'post_view'), $sendback);

                wp_redirect($sendback);
                exit();
            }
        }

        public function ajax_product_info()
        {
            $result = array("state" => "ok", "data" => "");

            $post_id = isset($_POST['id']) ? intval($_POST['id']) : false;

            if (!$post_id) {
                $result['state'] = 'error';
                echo json_encode($result);
                wp_die();
            }

            $external_id = get_post_meta($post_id, "_e2w_external_id", true);

            $time_value = get_post_meta($post_id, '_e2w_last_update', true);

            $time_value = $time_value ? date("Y-m-d H:i:s", $time_value) : 'not updated';

            $product_url = get_post_meta($post_id, '_product_url', true);

            $content = array();

            $content[] = "Product url: <a target='_blank' href='" . $product_url . "'>here</a>";

            /*
             * Seller URL disabled, maybe in future we turn it on again
            $seller_url = get_post_meta($post_id, '_e2w_seller_url', true);
            if ($seller_url) {
            $content[] = "Seller url: <a target='_blank' href='" . $seller_url . "'>here</a>";
            }
             */

            $content[] = "External ID: <span class='e2wl_value'>" . $external_id . "</span>";
            $content[] = "Last auto-update: <span class='e2wl_value'>" . $time_value . "</span>";

            $content = apply_filters('e2wl_ajax_product_info', $content, $post_id, $external_id);
            $result['data'] = array('content' => $content, 'id' => $post_id);

            echo json_encode($result);
            wp_die();
        }

        public function ajax_sync_products()
        {
            e2wl_init_error_handler();
            try {
                $ids = isset($_POST['ids']) ? (is_array($_POST['ids']) ? array_map('intval', $_POST['ids']) : array(intval($_POST['ids']))) : array();
                $e2wl_sync_type = e2wl_get_setting('sync_type');

                $products = array();
                foreach ($ids as $post_id) {
                    $product = $this->woocommerce_model->get_product_by_post_id($post_id, false);
                    if ($product) {
                        if ($e2wl_sync_type === 'price') {
                            $product['disable_var_quantity_change'] = true;
                        } else if ($e2wl_sync_type === 'stock') {
                            $product['disable_var_price_change'] = true;
                        } else if ($e2wl_sync_type === 'no') {
                            $product['disable_var_price_change'] = true;
                            $product['disable_var_quantity_change'] = true;
                        }

                        $products[$product['site_id'] . '#' . $product['id']] = $product;
                    }
                }
                $result = array("state" => "ok", "update_state" => array('ok' => count($ids), 'error' => 0));
                if (count($products) > 0) {
                    $res = $this->ebay_model->sync_products(array_keys($products), array('manual_update' => 1, 'pc' => $this->sync_model->get_product_cnt()));
                    if ($res['state'] === 'error') {
                        $result = $res;
                    } else {
                        foreach ($res['products'] as $product) {
                            $product = array_replace_recursive($products[$product['site_id'] . '#' . $product['id']], $product);
                            $product = E2WL_PriceFormula::apply_formula($product);
                            $this->woocommerce_model->upd_product($product['post_id'], $product);
                        }
                    }
                }
            } catch (Exception $e) {
                $result = E2WL_ResultBuilder::buildError($e->getMessage());
            }

            echo json_encode($result);
            wp_die();
        }

        public function ajax_get_product_id()
        {
            if (!empty($_POST['post_id'])) {
                $id = $this->woocommerce_model->get_product_external_id(intval($_POST['post_id']));
                if ($id) {
                    $result = E2WL_ResultBuilder::buildOk(array('id' => $id));
                } else {
                    $result = E2WL_ResultBuilder::buildError('uncknown ID');
                }
            } else {
                $result = E2WL_ResultBuilder::buildError("get_product_id: waiting for ID...");
            }
            echo json_encode($result);
            wp_die();
        }

    }

}
