<?php
class berocket_deprecated_force_sell_single {
    function __construct() {
        add_action( 'save_post', array( $this, 'wc_save_product' ) );
        add_action( 'woocommerce_product_options_related', array( $this, 'product_fields' ) );
        add_filter('berocket_force_sell_check_result_other', array($this, 'check_result_other'), 10, 2);
        add_filter('berocket_force_sell_check_result_add_to_cart', array($this, 'check_result_add_to_cart'), 10, 2);
        add_filter('berocket_force_sell_check_result_validate_add_to_cart', array($this, 'check_result_validate_add_to_cart'), 20, 2);
        add_filter('berocket_force_sell_check_linked_products', array($this, 'check_result_linked_products'));
        add_filter('berocket_force_sell_check_result_force_products', array($this, 'check_result_force_products'), 10, 2);
    }
    public function wc_save_product( $product_id ) {
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }
        if ( empty($_POST['berocket_force_sell_nonce']) || ! wp_verify_nonce( $_POST['berocket_force_sell_nonce'], 'berocket_edit_force_sell_nonce' ) ) {
            return;
        }
        if ( isset( $_POST['berocket_force_sell'] ) ) {
            update_post_meta( $product_id, 'berocket_force_sell', $_POST['berocket_force_sell'] );
        } else {
            delete_post_meta( $product_id, 'berocket_force_sell' );
        }
        if ( isset( $_POST['berocket_force_sell_linked'] ) ) {
            update_post_meta( $product_id, 'berocket_force_sell_linked', $_POST['berocket_force_sell_linked'] );
        } else {
            delete_post_meta( $product_id, 'berocket_force_sell_linked' );
        }
        if ( isset( $_POST['berocket_force_sell_once'] ) ) {
            update_post_meta( $product_id, 'berocket_force_sell_once', $_POST['berocket_force_sell_once'] );
        } else {
            delete_post_meta( $product_id, 'berocket_force_sell_once' );
        }
        if ( isset( $_POST['berocket_force_sell_linked_once'] ) ) {
            update_post_meta( $product_id, 'berocket_force_sell_linked_once', $_POST['berocket_force_sell_linked_once'] );
        } else {
            delete_post_meta( $product_id, 'berocket_force_sell_linked_once' );
        }
    }
    public function product_fields() {
        $product_id = get_the_ID();
        if( ! empty($product_id) ) {
            $products = get_post_meta( $product_id, 'berocket_force_sell', true );
            if( empty($products) || ! is_array($products) ) {
                $products = array();
            }
            $products_linked = get_post_meta( $product_id, 'berocket_force_sell_linked', true );
            if( empty($products_linked) || ! is_array($products_linked) ) {
                $products_linked = array();
            }
            $products_once = get_post_meta( $product_id, 'berocket_force_sell_once', true );
            if( empty($products_once) || ! is_array($products_once) ) {
                $products_once = array();
            }
            $products_linked_once = get_post_meta( $product_id, 'berocket_force_sell_linked_once', true );
            if( empty($products_linked_once) || ! is_array($products_linked_once) ) {
                $products_linked_once = array();
            }
        } else {
            $products = array();
            $products_linked = array();
            $products_once = array();
            $products_linked_once = array();
        }
        wp_enqueue_script('berocket_framework_admin');
        wp_enqueue_style('berocket_framework_admin_style');
        echo '<div class="options_group berocket_option_group_enable">';
        echo '<h3>Force Sell settings DEPRECATED (Please do not use it! In future release it will be removed)</h3>';
        echo '</div>';
        echo '<div class="options_group berocket_option_group">';
        wp_nonce_field( 'berocket_edit_force_sell_nonce', 'berocket_force_sell_nonce' );
        echo '<label>', __('Linked Products, that can be removed', 'force-sell-for-woocommerce'), '</label>';
        echo '<div class="br_framework_settings">';
        echo br_products_selector( 'berocket_force_sell', $products);
        echo '</div></div><div class="options_group berocket_option_group">';
        echo '<label>', __('Linked Products, that can be removed only with this product', 'force-sell-for-woocommerce'), '</label>';
        echo '<div class="br_framework_settings">';
        echo br_products_selector( 'berocket_force_sell_linked', $products_linked);
        echo '</div></div><div class="options_group berocket_option_group">';
        echo '<label>', __('Linked Products, that can be removed. Adds only once', 'force-sell-for-woocommerce'), '</label>';
        echo '<div class="br_framework_settings">';
        echo br_products_selector( 'berocket_force_sell_once', $products_once);
        echo '</div></div><div class="options_group berocket_option_group">';
        echo '<label>', __('Linked Products, that can be removed only with this product. Adds only once', 'force-sell-for-woocommerce'), '</label>';
        echo '<div class="br_framework_settings">';
        echo br_products_selector( 'berocket_force_sell_linked_once', $products_linked_once);
        echo '</div></div>';
        echo '<style>
            .berocket_option_group {
                padding: 10px;
                display: none;
            }
            .berocket_option_group label {
                float: none!important;
                margin: 0!important;
                width: initial!important;
            }
            .berocket_option_group_enable {
                cursor: pointer;
            }
            .berocket_option_group_enable:hover {
                background-color: #eee;
            }
        </style>
        <script>
            jQuery(document).on("click", ".berocket_option_group_enable", function() {
                jQuery(this).nextAll(".berocket_option_group").show();
            });
        </script>';
    }
    function check_result_linked_products($linked_products) {
        $cart = WC()->cart;
        $get_cart = $cart->get_cart();
        foreach($get_cart as $cart_item_key => $values) {
            if( ! empty($values['force_sell']) ) {
                if( ! empty($values['linked']) && $values['force_sell_id'] === '0' && isset($linked_products[$cart_item_key]) ) {
                    unset($linked_products[$cart_item_key]);
                }
            }
        }
        return $linked_products;
    }
    function check_result_add_to_cart($result, $data) {
        return $this->check_result_other($result, $data);
    }
    function check_result_other($result, $data) {
        $cart = WC()->cart;
        $get_cart = $cart->get_cart();
        $linked_products_single = array();
        foreach($get_cart as $cart_item_key => $values) {
            if( ! empty($values['force_sell']) ) {
                if( ! empty($values['linked']) && $values['force_sell_id'] === '0' ) {
                    $linked_products_single[$cart_item_key] = $cart_item_key;
                }
            }
        }
        extract($data);
        $BeRocket_force_sell_custom_post = BeRocket_force_sell_custom_post::getInstance();
        $default_settings = $BeRocket_force_sell_custom_post->default_settings;
        foreach($product_list as $cart_item_key => $product_data) {
            $single_product_datas = array(
                array('force_sell_id' => 'berocket_force_sell', 'linked' => '0', 'count' => ''),
                array('force_sell_id' => 'berocket_force_sell_linked', 'linked' => '1', 'count' => ''),
                array('force_sell_id' => 'berocket_force_sell_once', 'linked' => '0', 'count' => '1'),
                array('force_sell_id' => 'berocket_force_sell_linked_once', 'linked' => '1', 'count' => '1'),
            );
            foreach($single_product_datas as $single_product_data) {
                if( $action != 'add_to_cart' && empty($single_product_data['linked']) ) {
                    continue;
                }
                $products = get_post_meta( $product_data['product_id'], $single_product_data['force_sell_id'], true );
                if( ! empty($products) && is_array($products) && count($products) ) {
                    $force_sell_option = array_merge($default_settings, $single_product_data);
                    $force_sell_option = array_merge($force_sell_option, array(
                        'products' => $products,
                        'condition_mode' => 'each'
                    ));
                    $force_products_list = apply_filters('berocket_force_sell_condition_mode_each', array(), '0', $force_sell_option, $product_list, array('quantity' => $product_data['product_qty'], 'products' => array($cart_item_key => $product_data)));
                    foreach($force_products_list as $force_product) {
                        $find_item_id = WC()->cart->find_product_in_cart( $force_product['md5'] );
                        if( $find_item_id ) {
                            if( isset($linked_products_single[$force_product['md5']]) ) {
                                unset($linked_products_single[$force_product['md5']]);
                            }
                            $final_quantity = apply_filters('berocket_correct_cart_linked_final_qty', $force_product['quantity'], $find_item_id, $force_product['md5'], $force_product['data'] );
                            WC()->cart->set_quantity( $find_item_id, $final_quantity );
                        } else {
                            WC()->cart->add_to_cart( $force_product['product_id'], $force_product['quantity'], '', '', $force_product['data'] );
                        }
                    }
                }
            }
        }
        foreach($linked_products_single as $linked_product) {
            WC()->cart->remove_cart_item( $linked_product );
        }
        return true;
    }
    function check_result_force_products($result, $data) {
        extract($data);
        $BeRocket_force_sell_custom_post = BeRocket_force_sell_custom_post::getInstance();
        $default_settings = $BeRocket_force_sell_custom_post->default_settings;
        foreach($product_list as $cart_item_key => $product_data) {
            $single_product_datas = array(
                array('force_sell_id' => 'berocket_force_sell', 'linked' => '0', 'count' => ''),
                array('force_sell_id' => 'berocket_force_sell_linked', 'linked' => '1', 'count' => ''),
                array('force_sell_id' => 'berocket_force_sell_once', 'linked' => '0', 'count' => '1'),
                array('force_sell_id' => 'berocket_force_sell_linked_once', 'linked' => '1', 'count' => '1'),
            );
            foreach($single_product_datas as $single_product_data) {
                $products = get_post_meta( $product_data['product_id'], $single_product_data['force_sell_id'], true );
                if( ! empty($products) && is_array($products) && count($products) ) {
                    $force_sell_option = array_merge($default_settings, $single_product_data);
                    $force_sell_option = array_merge($force_sell_option, array(
                        'products' => $products,
                        'condition_mode' => 'each'
                    ));
                    $force_products_list = apply_filters('berocket_force_sell_condition_mode_each', array(), '0', $force_sell_option, $product_list, array('quantity' => $product_data['product_qty'], 'products' => array($cart_item_key => $product_data)));
                    foreach($force_products_list as $force_product) {
                        $result[$force_product['md5']] = $force_product;
                    }
                }
            }
        }
        return $result;
    }
    function check_result_validate_add_to_cart($result, $data) {
        if( ! $result ) return $result;
        extract($data);
        $BeRocket_force_sell_custom_post = BeRocket_force_sell_custom_post::getInstance();
        $default_settings = $BeRocket_force_sell_custom_post->default_settings;
        foreach($product_list as $cart_item_key => $product_data) {
            $single_product_datas = array(
                array('force_sell_id' => 'berocket_force_sell', 'linked' => '0', 'count' => ''),
                array('force_sell_id' => 'berocket_force_sell_linked', 'linked' => '1', 'count' => ''),
                array('force_sell_id' => 'berocket_force_sell_once', 'linked' => '0', 'count' => '1'),
                array('force_sell_id' => 'berocket_force_sell_linked_once', 'linked' => '1', 'count' => '1'),
            );
            foreach($single_product_datas as $single_product_data) {
                if( $action != 'add_to_cart' && empty($single_product_data['linked']) ) {
                    continue;
                }
                $products = get_post_meta( $product_data['product_id'], $single_product_data['force_sell_id'], true );
                if( ! empty($products) && is_array($products) && count($products) ) {
                    $force_sell_option = array_merge($default_settings, $single_product_data);
                    $force_sell_option = array_merge($force_sell_option, array(
                        'products' => $products,
                        'condition_mode' => 'each'
                    ));
                    $force_products_list = apply_filters('berocket_force_sell_condition_mode_each', array(), '0', $force_sell_option, $product_list, array('quantity' => $product_data['product_qty'], 'products' => array($cart_item_key => $product_data)));
                    foreach($force_products_list as $force_product) {
                        if( empty($force_product['data']['linked']) ) {
                            continue;
                        }
                        $product_id = $force_product['product_id'];
                        $quantity = $force_product['quantity'];
                        $product = wc_get_product($product_id);
                        if ( ! $product->is_purchasable() ) {
                            wc_add_notice( __( 'Sorry, this product cannot be purchased.', 'woocommerce' ), 'error' );
                            return false;
                        }
                        if ( ! $product->is_in_stock() ) {
                            wc_add_notice( sprintf( __( 'You cannot add &quot;%s&quot; to the cart because the product is out of stock.', 'woocommerce' ), $product->get_name() ), 'error' );
                            return false;
                        }

                        if ( ! $product->has_enough_stock( $quantity ) ) {
                            wc_add_notice( sprintf( __( 'You cannot add that amount of &quot;%1$s&quot; to the cart because there is not enough stock (%2$s remaining).', 'woocommerce' ), $product->get_name(), wc_format_stock_quantity_for_display( $product->get_stock_quantity(), $product ) ), 'error' );
                            return false;
                        }
                    }
                }
            }
        }
        return true;
    }
}
new berocket_deprecated_force_sell_single();
