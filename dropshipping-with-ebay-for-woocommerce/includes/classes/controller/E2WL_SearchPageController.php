<?php

/**
 * Description of E2WL_SearchPage
 *
 * @author andrey
 *
 * @autoload: e2wl_init
 */
if (!class_exists('E2WL_SearchPageController')) {

    class E2WL_SearchPageController extends E2WL_AbstractAdminPage
    {

        private $loader;
        private $product_import_model;

        public function __construct()
        {
            parent::__construct("Search Products", "Search Products", 'manage_options', 'e2wl_dashboard', 10);

            $this->loader = new E2WL_Ebay();
            $this->localizator = E2WL_EbayLocalizator::getInstance();
            $this->product_import_model = new E2WL_ProductImport();

            add_action('wp_ajax_e2wl_add_to_import', array($this, 'ajax_add_to_import'));
            add_action('wp_ajax_e2wl_remove_from_import', array($this, 'ajax_remove_from_import'));
            add_action('wp_ajax_e2wl_load_shipping_info', array($this, 'ajax_load_shipping_info'));

            add_action('wp_ajax_e2wl_get_categories', array($this, 'ajax_get_categories'));
        }

        public function render($params = array())
        {
            $filter = array();
            if (is_array($_GET) && $_GET) {
                $filter = array_map('sanitize_text_field', array_merge($filter, $_GET));
                if (isset($filter['cur_page'])) {
                    unset($filter['cur_page']);
                }
                if (isset($filter['page'])) {
                    unset($filter['page']);
                }
            }

            foreach ($filter as $key => $val) {
                $new_key = preg_replace('/e2wl_/', '', $key, 1);
                unset($filter[$key]);
                $filter[$new_key] = wp_unslash($val);
            }

            if (!isset($filter['sort'])) {
                $filter['sort'] = "volumeDown";
            }

            $page = isset($_GET['cur_page']) && intval($_GET['cur_page']) ? intval($_GET['cur_page']) : 1;
            $per_page = intval(e2wl_get_setting('products_per_page'));

            if (!empty($_REQUEST['e2wl_search']) || !empty($_REQUEST['e2wl_s'])) {
                $load_products_result = $this->loader->load_products($filter, $page, $per_page);
            } else {
                $load_products_result = E2WL_ResultBuilder::buildError(__('Please enter some search keywords or select item from category list!', 'dropshipping-with-ebay-for-woocommerce'));
            }

            if ($load_products_result['state'] == 'error' || $load_products_result['state'] == 'warn') {
                add_settings_error('e2wl_products_list', esc_attr('settings_updated'), $load_products_result['message'], 'error');
            }

            if ($load_products_result['state'] != 'error') {
                $pages_list = array();
                $links = 4;
                $last = ceil($load_products_result['total'] / $per_page);
                $load_products_result['total_pages'] = $last;
                $start = (($load_products_result['page'] - $links) > 0) ? $load_products_result['page'] - $links : 1;
                $end = (($load_products_result['page'] + $links) < $last) ? $load_products_result['page'] + $links : $last;
                if ($start > 1) {
                    $pages_list[] = 1;
                    $pages_list[] = '';
                }
                for ($i = $start; $i <= $end; $i++) {
                    $pages_list[] = $i;
                }
                if ($end < $last) {
                    $pages_list[] = '';
                    $pages_list[] = $last;
                }
                $load_products_result['pages_list'] = $pages_list;

                e2wl_set_transient('e2wl_search_result', $load_products_result['products']);
            }

            $countryModel = new E2WL_Country();

            $this->model_put('sort_list', array('BestMatch' => 'Best Match', 'EndTimeSoonest' => 'Time: ending soonest', 'StartTimeNewest' => 'Time: newly listed', 'PricePlusShippingLowest' => 'Price + Shipping: lowest first', 'PricePlusShippingHighest' => 'Price + Shipping: highest first', 'CurrentPriceHighest' => 'Price: highest first'));
            $this->model_put('filter', $filter);
            $this->model_put('categories', E2WL_Categories::get_categories(isset($filter['sitecode']) ? $filter['sitecode'] : e2wl_get_setting('default_sitecode')));
            $this->model_put('countries', $countryModel->get_countries());

            $this->model_put('load_products_result', $load_products_result);
            $this->include_view('search.php');
        }

        public function ajax_add_to_import()
        {
            $product_id = isset($_POST['id']) ? sanitize_key($_POST['id']) : false;
            if ($product_id) {
                $product = array();
                $products = e2wl_get_transient('e2wl_search_result');

                if ($products && is_array($products)) {
                    foreach ($products as $p) {
                        if ($p['id'] == $product_id) {
                            $product = $p;
                            break;
                        }
                    }
                }

                $site = E2WL_EbaySite::get_site_by_code(!empty($product['globalId']) ? $product['globalId'] : e2wl_get_setting('default_sitecode'));
                $res = $this->loader->load_product($product_id, $site->siteid);

                if ($res['state'] !== 'error') {
                    $product = array_replace_recursive($product, $res['product']);

                    if ($product) {
                        $product = E2WL_PriceFormula::apply_formula($product);

                        $this->product_import_model->add_product($product);

                        echo json_encode(E2WL_ResultBuilder::buildOk());
                    } else {
                        echo json_encode(E2WL_ResultBuilder::buildError("Product not found in serach result"));
                    }
                } else {
                    echo json_encode($res);
                }

            } else {
                echo json_encode(E2WL_ResultBuilder::buildError("add_to_import: waiting for ID..."));
            }
            wp_die();
        }

        public function ajax_remove_from_import()
        {
            $product_id = isset($_POST['id']) ? sanitize_key($_POST['id']) : false;
            if ($product_id) {
                $product = false;
                $products = e2wl_get_transient('e2wl_search_result');

                foreach ($products as $p) {
                    if ($p['id'] == $product_id) {
                        $product = $p;
                        break;
                    }
                }
                if ($product) {
                    $this->product_import_model->del_product($product['id']);
                    echo json_encode(E2WL_ResultBuilder::buildOk());
                } else {
                    echo json_encode(E2WL_ResultBuilder::buildError("Product not found in serach result"));
                }
            } else {
                echo json_encode(E2WL_ResultBuilder::buildError("remove_from_import: waiting for ID..."));
            }
            wp_die();
        }

        public function ajax_load_shipping_info()
        {
            if (isset($_POST['id'])) {
                $ids = is_array($_POST['id']) ? array_map('sanitize_key', $_POST['id']) : array(sanitize_key($_POST['id']));

                $product = false;
                $products = e2wl_get_transient('e2wl_search_result');
                $result = array();
                foreach ($ids as $id) {
                    foreach ($products as &$product) {
                        if ($product['id'] == $id) {
                            $product_country = isset($product['shipping_to_country']) && sanitize_text_field($product['shipping_to_country']) ? $product['shipping_to_country'] : '';
                            $country = isset($_POST['country']) ? sanitize_text_field($_POST['country']) : $product_country;
                            if ($country && (!isset($product['shipping_info']) || $country != $product_country)) {
                                $product['shipping_to_country'] = $country;
                                $res = $this->loader->load_shipping_info($product['id'], 1, $country);
                                if ($res['state'] !== 'error') {
                                    $product['shipping_info'] = $res['items'];
                                } else {
                                    $product['shipping_info'] = array();
                                }
                            }
                            $result[] = array('product_id' => $id, 'items' => isset($product['shipping_info']) ? $product['shipping_info'] : array());
                            break;
                        }
                    }
                }
                e2wl_set_transient('e2wl_search_result', $products);

                echo json_encode(E2WL_ResultBuilder::buildOk(array('products' => $result)));
            } else {
                echo json_encode(E2WL_ResultBuilder::buildError("load_shipping_info: waiting for ID..."));
            }
            wp_die();
        }

        public function ajax_get_categories()
        {
            if (isset($_POST['sitecode'])) {
                echo json_encode(E2WL_ResultBuilder::buildOk(array('categories' => E2WL_Categories::get_categories(sanitize_text_field($_POST['sitecode'])))));
            } else {
                echo json_encode(E2WL_ResultBuilder::buildError("ajax_get_categories: waiting for sitecode..."));
            }
            wp_die();
        }

    }

}
