<?php
class berocket_old_force_sell_add_next {
    function __construct() {
        $options = $this->get_option();
        add_action( 'woocommerce_after_cart_item_quantity_update', array( $this, 'update_quantity'), 1, 2 );
        add_action( 'woocommerce_before_cart_item_quantity_zero', array( $this, 'update_quantity_zero'), 1, 2 );
        add_action( 'woocommerce_stock_amount_cart_item', array( $this, 'check_quantity_min'), 1, 2 );
        add_filter( 'woocommerce_cart_item_remove_link', array( $this, 'remove_link'), 10, 2 );
        add_filter( 'woocommerce_cart_item_quantity', array( $this, 'change_quantity' ), 10, 2 );
        add_action( 'woocommerce_cart_item_removed', array( $this, 'remove_item' ), 30 );
        add_action( 'woocommerce_cart_item_restored', array( $this, 'restore_item' ), 30 );
        add_filter( 'woocommerce_get_cart_item_from_session', array($this, 'get_from_session'), 10, 2 );
        add_filter( 'woocommerce_get_item_data', array($this, 'cart_item_data'), 10, 3 );
        add_action( 'woocommerce_after_add_to_cart_button', array( $this, 'echo_linked_products' ) );
        add_action( 'berocket_force_sell_echo_linked_products', array( $this, 'echo_linked_products' ) );
        add_action( 'woocommerce_add_to_cart', array( $this, 'add_to_cart' ), 1, 6 );
        if( ! empty($options['prevent_add_to_cart']) ) {
            add_filter( 'woocommerce_add_to_cart_validation', array( $this, 'validate_add_to_cart' ), 10, 4 );
        }
    }
    public function set_correct_cart_linked($cart_item_id, $product_id, $quantity, $first_time_add = true) {
        $products_cart_item = $this->correct_cart_linked($cart_item_id, $product_id, $quantity, $first_time_add);
        foreach( $products_cart_item as $md5_search => $product_cart_item ) {
            if( empty($product_cart_item['data']['linked']) && ! $first_time_add ) continue;
            if( $product_cart_item['find_item_id'] ) {
                if( $product_cart_item['quantity'] == 0 ) {
                    WC()->cart->remove_cart_item( $product_cart_item['find_item_id'] );
                } else {
                    WC()->cart->set_quantity( $product_cart_item['find_item_id'], $product_cart_item['quantity'] );
                }
            } elseif( $product_cart_item['quantity'] != 0 ) {
                $product_id = (empty($product_cart_item['variation']) ? $product_cart_item['product'] : $product_cart_item['variation']);
                WC()->cart->add_to_cart( $product_id, $product_cart_item['quantity'], '', '', $product_cart_item['data'] );
            }
        }
        $cart_contents = WC()->cart->cart_contents;
    }
    public function get_correct_cart_linked_data($cart_item_id, $product_id, $quantity, $first_time_add = true, $additional = array()) {
        if( empty($additional) ) {
            return;
        }
        $products_cart_item = $this->correct_cart_linked($cart_item_id, $product_id, $quantity, $first_time_add);
        if( $additional['type'] == 'get_min_qty' ) {
            if( empty($additional['cart_id']) || empty($products_cart_item[$additional['cart_id']]) ) {
                return 0;
            } else {
                return $products_cart_item[$additional['cart_id']]['min_quantity'];
            }
        }
        return;
    }
    public function correct_cart_linked($cart_item_id, $product_id, $quantity, $first_time_add = true) {
        $linked_products = $this->get_linked_products_list($product_id);
        if ( 'product_variation' === get_post_type( $product_id ) ) {
            $product_parent_id   = wp_get_post_parent_id( $product_id );
            $linked_products_parent = $this->get_linked_products_list($product_parent_id);
            $linked_products = $linked_products+$linked_products_parent;
        }
        $linked_products_parent = $this->get_linked_products_list($product_id);
        $products_cart_item = array();
        foreach($linked_products as $linked_product) {
            $products = $linked_product['products'];
            $product_data = $linked_product;
            unset($product_data['products']);
            $linked_quantity = $this->calculate_quantity_force_sell($product_data, $quantity);
            if( ! empty($product_data['linked']) ) {
                $product_data['linked_to'] = $cart_item_id;
            }
            foreach($products as $product) {
                $variation = '';
                if ( 'product_variation' === get_post_type( $product ) ) {
                    $variation = $product;
                    $product   = wp_get_post_parent_id( $product );
                }
                $md5_search = WC()->cart->generate_cart_id( $product, $variation, '', $product_data );
                $find_item_id = WC()->cart->find_product_in_cart( $md5_search );
                $final_quantity = apply_filters('berocket_correct_cart_linked_final_qty', $linked_quantity, $find_item_id, $md5_search, $product_data );
                $products_cart_item[$md5_search] = array(
                    'find_item_id' => $find_item_id,
                    'product' => $product,
                    'variation' => $variation,
                    'quantity' => ( $quantity == 0 ? 0 : $final_quantity),
                    'data' => $product_data,
                    'min_quantity' => ( $quantity == 0 ? 0 : $linked_quantity )
                );
            }
        }
        return $products_cart_item;
    }
    public function get_linked_products_list($_product_id, $search = array()) {
        $_product = wc_get_product($_product_id);
        $_product_post = br_wc_get_product_post($_product);
        $check_additional = array(
            'product'           => $_product,
            'product_post'      => $_product_post,
            'product_id'        => $_product_id,
        );
        $products_to_link = array();
        $single_product_datas = array(
            array('force_sell_id' => 'berocket_force_sell', 'linked' => '0', 'count' => ''),
            array('force_sell_id' => 'berocket_force_sell_linked', 'linked' => '1', 'count' => ''),
            array('force_sell_id' => 'berocket_force_sell_once', 'linked' => '0', 'count' => '1'),
            array('force_sell_id' => 'berocket_force_sell_linked_once', 'linked' => '1', 'count' => '1'),
        );
        foreach($single_product_datas as $single_product_data) {
            $products = get_post_meta( $_product_id, $single_product_data['force_sell_id'], true );
            if( ! empty($products) && is_array($products) && count($products) ) {
                $single_product_data['products'] = $products;
                $products_to_link[$single_product_data['force_sell_id']] = $single_product_data;
            }
        }
        $BeRocket_force_sell_custom_post = BeRocket_force_sell_custom_post::getInstance();
        $force_sell_ids = $BeRocket_force_sell_custom_post->get_custom_posts_frontend();
        foreach($force_sell_ids as $force_sell_id) {
            $options = get_post_meta( $force_sell_id, 'br_force_sell', true );
            if( ! is_array($options) ) {
                $options = array('condition' => array());
            } elseif( empty($options['condition']) ) {
                $options['condition'] = array();
            }
            if( BeRocket_conditions_force_sell::check($options['condition'], 'berocket_force_sell_custom_post', $check_additional)
                && ! empty($options['products']) && is_array($options['products']) && count($options['products']) ) {
                unset($options['condition']);
                $options['force_sell_id'] = $force_sell_id;
                $products_to_link[$force_sell_id] = $options;
            }
        }
        return $products_to_link;
    }
    public function update_quantity($item_id, $quantity = 0) {
        $cart_contents = WC()->cart->cart_contents;
        if( ! empty($cart_contents[$item_id]['linked_to']) ) {
            $item_id = $cart_contents[$item_id]['linked_to'];
        }
        $quantity = $cart_contents[$item_id]['quantity'];
        remove_action( 'woocommerce_after_cart_item_quantity_update', array( $this, 'update_quantity'), 1, 2 );
        $product_id = (empty($cart_contents[$item_id]['variation_id']) ? $cart_contents[$item_id]['product_id'] : $cart_contents[$item_id]['variation_id']);
        $this->set_correct_cart_linked($item_id, $product_id, $quantity, false);
        add_action( 'woocommerce_after_cart_item_quantity_update', array( $this, 'update_quantity'), 1, 2 );
    }
    public function update_quantity_zero($item_id) {
        $cart_contents = WC()->cart->cart_contents;
        $item_id_normal = $item_id;
        if( ! empty($cart_contents[$item_id]['linked_to']) ) {
            $item_id = $cart_contents[$item_id]['linked_to'];
            $quantity = $cart_contents[$item_id]['quantity'];
        } else {
            WC()->cart->remove_cart_item( $item_id );
            $quantity = 0;
        }
        remove_action( 'woocommerce_before_cart_item_quantity_zero', array( $this, 'update_quantity_zero'), 1, 2 );
        $product_id = (empty($cart_contents[$item_id]['variation_id']) ? $cart_contents[$item_id]['product_id'] : $cart_contents[$item_id]['variation_id']);
        $this->set_correct_cart_linked($item_id, $product_id, $quantity, false);
        add_action( 'woocommerce_before_cart_item_quantity_zero', array( $this, 'update_quantity_zero'), 1, 2 );
    }
    public function check_quantity_min($quantity, $cart_id) {
        $cart_contents = WC()->cart->cart_contents;
        if( ! empty($cart_contents[$cart_id]['linked_to']) ) {
            $item_id = $cart_contents[$cart_id]['linked_to'];
            $product_id = (empty($cart_contents[$item_id]['variation_id']) ? $cart_contents[$item_id]['product_id'] : $cart_contents[$item_id]['variation_id']);
            $new_quantity = $this->get_correct_cart_linked_data($item_id, $product_id, $cart_contents[$item_id]['quantity'], false, array('type' => 'get_min_qty', 'cart_id' => $cart_id));
            $quantity = apply_filters('berocket_check_quantity_min_force_sell', $new_quantity, $quantity, $cart_id);
        } 
        return $quantity;
    }
    public function remove_link($link, $cart_id) {
        $cart_contents = WC()->cart->cart_contents;
        if( ! empty($cart_contents[$cart_id]['linked_to']) ) {
            $link = '';
        }
        return $link;
    }
    public function change_quantity($quantity, $item_id) {
        $cart_contents = WC()->cart->cart_contents;
        if( ! empty($cart_contents[$item_id]['linked_to']) ) {
            $quantity = apply_filters('berocket_change_quantity_force_sell', $cart_contents[$item_id]['quantity'], $quantity, $item_id);
        }
        return $quantity;
    }
    public function remove_item($item_id = false) {
        $cart = WC()->cart->get_cart();
        $removed_cart_contents = WC()->cart->removed_cart_contents;
        if( ! empty($removed_cart_contents) 
        && ! empty($removed_cart_contents[$item_id]) 
        && ! empty($removed_cart_contents[$item_id]['linked_to']) 
        && isset($cart[$removed_cart_contents[$item_id]['linked_to']]) ) {
            WC()->cart->restore_cart_item( $item_id );
            return;
        }
        if( ! empty($cart) && is_array($cart) ) {
            foreach ( $cart as $key => $value ) {
                if( ! empty($value['linked_to']) && 
                ( ! array_key_exists( $value['linked_to'], $cart ) || 
                ( $item_id !== false && $item_id == $value['linked_to'] ) ) ) {
                    WC()->cart->remove_cart_item( $key );
                }
            }
        }
    }
    public function restore_item($item_id) {
        foreach ( WC()->cart->removed_cart_contents as $key => $value ) {
            if( ! empty($value['linked_to']) && $value['linked_to'] == $item_id ) {
                WC()->cart->restore_cart_item( $key );
            }
        }
    }
    public function get_from_session($cart_contents, $session_contents) {
        if( ! empty($session_contents['linked_to']) ) {
            $cart_contents['linked_to'] = $session_contents['linked_to'];
        }
        return $cart_contents;
    }
    public function cart_item_data($data, $item) {
        
        if( ! empty($item['linked_to']) ) {
            $find_item_id = WC()->cart->find_product_in_cart( $item['linked_to'] );
            $_product = WC()->cart->cart_contents[ $find_item_id ]['data'];
            $_product_post = br_wc_get_product_post($_product);
            $linked_to_name = $_product_post->post_title;
            $data[] = array('key' => apply_filters('product_linked_with_text', __('Linked with', 'force-sell-for-woocommerce'), 'Linked with'), 'value' => $linked_to_name);
        }
        return $data;
    }
    
    public function echo_linked_products($options_custom = array()) {
        $options = $this->get_option();
        if( ! is_array($options_custom) ) {
            $options_custom = array();
        }
        $options = array_merge($options, $options_custom);
        global $post;
        $linked_products = $this->get_linked_products_list($post->ID);
        $products = array();
        $products_linked = array();
        foreach($linked_products as $linked_product) {
            if( empty($linked_product['linked']) ) {
                $products = array_merge($products, $linked_product['products']);
            } else {
                $products_linked = array_merge($products_linked, $linked_product['products']);
            }
        }
        $is_products = count($products) && ! empty($options['display_force_sell']);
        $is_products_linked = count($products_linked) && ! empty($options['display_force_sell_linked']);
        ob_start();
        if( $is_products || $is_products_linked ) {
            echo '<div style="clear:both;"></div>';
            echo '<div class="berocket_linked_products">
                <p>', apply_filters('products_that_added_text', __('Products that will be added:', 'force-sell-for-woocommerce')), '</p>';
            if( $is_products ) {
                echo '<ul class="force_sell_list">';
                foreach($products as $product) {
                    $title = get_the_title( $product );
                    if( ! empty($options['display_as_link']) ) {
                        $wc_product = wc_get_product( $product );
                        $url = $wc_product->get_permalink();
                        echo "<li><a href='{$url}'>{$title}</a></li>";
                    } else {
                        echo "<li>{$title}</li>";
                    }
                }
                echo '</ul>';
            }
            if( $is_products_linked ) {
                echo '<ul class="force_sell_linked">';
                foreach($products_linked as $product) {
                    $title = get_the_title( $product );
                    if( ! empty($options['display_as_link']) ) {
                        $wc_product = wc_get_product( $product );
                        $url = $wc_product->get_permalink();
                        echo "<li><a href='{$url}'>{$title}</a></li>";
                    } else {
                        echo "<li>{$title}</li>";
                    }
                }
                echo '</ul>';
            }
            echo '</div>';
            echo '<div style="clear:both;"></div>';
        }
        echo ob_get_clean();
    }
    public function add_to_cart($cart_item_id, $product_id, $quantity, $variation_id, $variation, $cart_item_data) {
        if( empty($cart_item_data['force_sell_id']) ) {
            $this->set_correct_cart_linked($cart_item_id, (empty($variation_id) ? $product_id : $variation_id), $quantity);
        }
    }
    public function validate_add_to_cart($valid, $product_id, $quantity, $variation_id = false) {
        $product_id = ($variation_id == false ? $product_id : $variation_id);
        $md5_search = WC()->cart->generate_cart_id( $product_id, '', '', array() );
        $find_item_id = WC()->cart->find_product_in_cart( $md5_search );
        if( $find_item_id ) {
            $quantity = $quantity + WC()->cart->cart_contents[ $find_item_id ]['quantity'];
        }
        $products_cart_item = $this->correct_cart_linked($md5_search, $product_id, $quantity, false);
        foreach($products_cart_item as $product_cart_item) {
            $_product = wc_get_product((empty($product_cart_item['variation']) ? $product_cart_item['product'] : $product_cart_item['variation']));
            if( ! $_product->has_enough_stock( $product_cart_item['min_quantity'] ) ) {
                $valid = false;
            }
            if ( ! $_product->is_purchasable() ) {
                wc_add_notice( __( 'Sorry, this product cannot be purchased.', 'woocommerce' ), 'error' );
                $valid = false;
            }
            if ( ! $_product->is_in_stock() ) {
                wc_add_notice( sprintf( __( 'You cannot add &quot;%s&quot; to the cart because the product is out of stock.', 'woocommerce' ), $_product->get_name() ), 'error' );
                $valid = false;
            }

            if ( ! $_product->has_enough_stock( $product_cart_item['min_quantity'] ) ) {
                wc_add_notice( sprintf( __( 'You cannot add that amount of &quot;%1$s&quot; to the cart because there is not enough stock (%2$s remaining).', 'woocommerce' ), $_product->get_name(), wc_format_stock_quantity_for_display( $_product->get_stock_quantity(), $_product ) ), 'error' );
                $valid = false;
            }
        }
        return $valid;
    }
    public function calculate_quantity_force_sell($settings, $quantity) {
        $linked_quantity = $quantity;
        if( ! empty( $settings['count'] ) ) {
                $linked_quantity = $settings['count'];
        }
        return apply_filters('berocket_calculate_quantity_force_sell', $linked_quantity, $settings, $quantity);
    }
    public function get_option() {
        $BeRocket_force_sell = BeRocket_force_sell::getInstance();
        return $BeRocket_force_sell->get_option();
    }
}
new berocket_old_force_sell_add_next();
