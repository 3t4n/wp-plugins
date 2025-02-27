<?php
class berocket_force_sell_add_next {
    function __construct() {
        $options = $this->get_option();
        add_action('wp_loaded', array($this, 'check_cart'));
        add_action( 'woocommerce_after_calculate_totals', array( $this, 'check_cart' ) );
        add_filter('berocket_force_sell_condition_mode_normal', array($this, 'condition_mode_normal'), 10, 5);
        add_filter('berocket_force_sell_condition_mode_cart', array($this, 'condition_mode_normal'), 10, 5);
        add_filter('berocket_force_sell_condition_mode_each', array($this, 'condition_mode_each'), 10, 5);
        add_filter('berocket_force_sell_check_result_other', array($this, 'check_result_other'), 10, 2);
        add_filter('berocket_force_sell_check_result_add_to_cart', array($this, 'check_result_add_to_cart'), 10, 2);
        add_filter('berocket_force_sell_check_result_validate_add_to_cart', array($this, 'check_result_validate_add_to_cart'), 10, 2);
        add_filter('berocket_force_sell_check_result_force_products', array($this, 'check_result_force_products'), 10, 2);
        add_action( 'woocommerce_add_to_cart', array( $this, 'add_to_cart' ) );
        add_filter( 'woocommerce_cart_item_remove_link', array( $this, 'remove_link'), 10, 2 );
        add_filter( 'woocommerce_cart_item_quantity', array( $this, 'change_quantity' ), 10, 2 );
        add_filter( 'woocommerce_get_item_data', array($this, 'cart_item_data'), 10, 3 );
        add_filter('BeRocket_force_sell_custom_post_after_conditions', array($this, 'condition_additional'), 10, 2);

        $BeRocket_force_sell = BeRocket_force_sell::getInstance();
        $general_options = $BeRocket_force_sell->get_option();
        add_action( $general_options['show_on_product_page'], array( $this, 'echo_linked_products' ) );

        add_action( 'berocket_force_sell_echo_linked_products', array( $this, 'echo_linked_products' ) );
        if( ! empty($options['prevent_add_to_cart']) ) {
            add_filter( 'woocommerce_add_to_cart_validation', array( $this, 'validate_add_to_cart' ), 10, 4 );
        }
    }
    function add_to_cart() {
        $this->check_cart_and_add_linked('add_to_cart');
    }
    function check_cart() {
        $this->check_cart_and_add_linked();
    }
    function check_cart_and_add_linked($action = 'other', $additional_product = false) {
        do_action('berocket_before_check_cart_and_add_linked', $action, $additional_product);
        $cart = WC()->cart;
        if( empty($cart) ) {
            return false;
        }
        $get_cart = $cart->get_cart();
        $BeRocket_force_sell_custom_post = BeRocket_force_sell_custom_post::getInstance();
        $force_sell_ids = $BeRocket_force_sell_custom_post->get_custom_posts_frontend();
        $force_sell_options = array();
        $force_sell_quantity = array();
        foreach($force_sell_ids as $force_sell_id) {
            $options = $BeRocket_force_sell_custom_post->get_option($force_sell_id);
            if( ! is_array($options) ) {
                $options = array('condition' => array());
            } elseif( empty($options['condition']) ) {
                $options['condition'] = array();
            }
            if( ! empty($options['products']) && is_array($options['products']) && count($options['products']) ) {
                $force_sell_options[$force_sell_id] = $options;
                $force_sell_quantity[$force_sell_id] = array('quantity' => 0, 'products' => array());
            }
        }
        $product_list = array();
        $linked_products =  array();
        $additional_product_added = false;
        foreach($get_cart as $cart_item_key => $values) {
            if( ! empty($values['force_sell']) ) {
                if( ! empty($values['linked']) ) {
                    $linked_products[$cart_item_key] = $cart_item_key;
                }
                continue;
            }
            if( ! empty($values['linked_to']) ) {
                $linked_products[$cart_item_key] = $cart_item_key;
                continue;
            }
            //INIT PRODUCT VARIABLES
            $_product = $values['data'];
            if ( $_product->is_type( 'variation' ) ) {
                $_product = wc_get_product($values['variation_id']);
                $_product_post = br_wc_get_product_post($_product);
                $_product_id = br_wc_get_product_id($_product);
            } else {
                $_product_post = br_wc_get_product_post($_product);
                $_product_id = br_wc_get_product_id($_product);
            }
            $_product_qty = $values['quantity'];
            if( $additional_product !== FALSE && $additional_product['product_id'] == $_product_id ) {
                $_product_qty += $additional_product['product_qty'];
                $additional_product_added = true;
            }
            $check_additional = array(
                'product' => $_product,
                'product_post' => $_product_post,
                'product_id' => $_product_id,
                'product_qty' => $_product_qty,
            );
            $product_list[$cart_item_key] = $check_additional;
        }
        if( $additional_product !== FALSE && ! $additional_product_added ) {
            $variation = '';
            $product_id = $additional_product['product_id'];
            if ( 'product_variation' === get_post_type( $additional_product['product_id'] ) ) {
                $variation = $additional_product['product_id'];
                $product_id   = wp_get_post_parent_id( $additional_product['product_id'] );
            }
            $cart_key = WC()->cart->generate_cart_id( $product_id, $variation );
            $product_list[$cart_key] = $additional_product;
        }
        foreach($product_list as $cart_item_key => $check_additional) {
            foreach($force_sell_options as $force_sell_id => $force_sell_option) {
                $check_additional['settings_force_sell'] = $force_sell_option;
                if( BeRocket_conditions_force_sell::check($force_sell_option['condition'], 'berocket_force_sell_custom_post', $check_additional)
                && ! empty($force_sell_option['products']) && is_array($force_sell_option['products']) && count($force_sell_option['products']) ) {
                    $force_sell_quantity[$force_sell_id]['quantity'] += $check_additional['product_qty'];
                    $force_sell_quantity[$force_sell_id]['products'][$cart_item_key] = $check_additional;
                }
            }
        }
        $linked_products = apply_filters('berocket_force_sell_check_linked_products', $linked_products);
        $return = apply_filters('berocket_force_sell_check_result_'.$action, true, array(
            'force_sell_options'    => $force_sell_options,
            'product_list'          => $product_list,
            'force_sell_quantity'   => $force_sell_quantity,
            'linked_products'       => $linked_products,
            'action'                => $action,
            'additional_product'    => $additional_product,
        ));
        return $return;
    }
    function condition_mode_normal($force_products_list, $force_sell_id, $force_sell_option, $product_list, $force_sell_quantity) {
        foreach($force_sell_option['products'] as $product_id) {
            $product_data = array(
                'product_id'    => $product_id,
                'quantity'      => $this->calculate_quantity($force_sell_quantity['quantity'], $force_sell_option),
                'data'          => $force_sell_option
            );
            $product_data['data']['force_sell_id'] = $force_sell_id;
            $product_data['data']['force_sell'] = true;
            $variation = '';
            if ( 'product_variation' === get_post_type( $product_id ) ) {
                $variation = $product_id;
                $product_id   = wp_get_post_parent_id( $product_id );
            }
            $variation_data = $this->woocommerce_variation_cart_data($product_id, $variation);
            $md5_search = WC()->cart->generate_cart_id( $product_id, $variation, $variation_data, $product_data['data'] );
            $product_data['md5'] = $md5_search;
            $force_products_list[] = $product_data;
        }
        return $force_products_list;
    }
    function condition_mode_each($force_products_list, $force_sell_id, $force_sell_option, $product_list, $force_sell_quantity) {
        foreach($force_sell_option['products'] as $product_id) {
            $product_data = array(
                'product_id'    => $product_id,
                'quantity'      => $force_sell_quantity['quantity'],
                'data'          => $force_sell_option
            );
            $product_data['data']['force_sell_id'] = $force_sell_id;
            $product_data['data']['force_sell'] = true;
            $variation = '';
            if ( 'product_variation' === get_post_type( $product_id ) ) {
                $variation = $product_id;
                $product_id   = wp_get_post_parent_id( $product_id );
            }
            foreach($force_sell_quantity['products'] as $cart_item_key => $product_cart) {
                $each_product_data = $product_data;
                $each_product_data['quantity'] = $this->calculate_quantity($product_cart['product_qty'], $force_sell_option);
                $each_product_data['data']['linked_to'] = $cart_item_key;
                $variation_data = $this->woocommerce_variation_cart_data($product_id, $variation);
                $md5_search = WC()->cart->generate_cart_id( $product_id, $variation, $variation_data, $each_product_data['data'] );
                $each_product_data['md5'] = $md5_search;
                $force_products_list[] = $each_product_data;
            }
        }
        return $force_products_list;
    }
    function check_result_add_to_cart($result, $data) {
        return $this->check_result_other($result, $data);
    }
    function check_result_other($result, $data) {
        extract($data);
        foreach($force_sell_options as $force_sell_id => $force_sell_option) {
            if ( ! isset($force_sell_quantity[$force_sell_id]) 
              || ! isset($force_sell_quantity[$force_sell_id]['products']) 
              || ! is_array($force_sell_quantity[$force_sell_id]['products'])
              || ! count($force_sell_quantity[$force_sell_id]['products'])
            ) continue;
            $check_additional = array(
                'cart' => $force_sell_quantity[$force_sell_id]['products'],
                'settings_force_sell' => $force_sell_option
            );
            if( BeRocket_conditions_force_sell::check($force_sell_option['condition'], 'berocket_force_sell_custom_post', $check_additional) ) {
                $condition_mode = br_get_value_from_array($force_sell_option, 'condition_mode');
                if( empty($condition_mode) ) $condition_mode = 'each';
                $force_products_list = apply_filters('berocket_force_sell_condition_mode_'.$condition_mode, array(), $force_sell_id, $force_sell_option, $product_list, $force_sell_quantity[$force_sell_id]);
                foreach($force_products_list as $force_product) {
                    if( $action != 'add_to_cart' && empty($force_product['data']['linked']) ) {
                        continue;
                    }
                    if( $action == 'add_to_cart' && empty($force_product['data']['linked']) && isset(WC()->cart->removed_cart_contents[$force_product['md5']]) ) {
                        continue;
                    }
                    $find_item_id = WC()->cart->find_product_in_cart( $force_product['md5'] );
                    if( $find_item_id ) {
                        if( isset($linked_products[$force_product['md5']]) ) {
                            unset($linked_products[$force_product['md5']]);
                        }
                        $final_quantity = apply_filters('berocket_correct_cart_linked_final_qty', $force_product['quantity'], $find_item_id, $force_product['md5'], $force_product['data'] );
                        if( WC()->cart->cart_contents[ $find_item_id ]['quantity'] != $final_quantity ) {
                            WC()->cart->set_quantity( $find_item_id, $final_quantity );
                        }
                    } else {
                        $variation = '';
                        $product_id = $force_product['product_id'];
                        if ( 'product_variation' === get_post_type( $product_id ) ) {
                            $variation = $force_product['product_id'];
                            $product_id   = wp_get_post_parent_id( $product_id );
                        }
                        WC()->cart->add_to_cart( $product_id, $force_product['quantity'], $variation, '', $force_product['data'] );
                    }
                }
            }
        }
        foreach($linked_products as $linked_product) {
            WC()->cart->remove_cart_item( $linked_product );
        }
        return true;
    }
    function check_result_validate_add_to_cart($result, $data) {
        extract($data);
        foreach($force_sell_options as $force_sell_id => $force_sell_option) {
            if( ! isset($force_sell_quantity[$force_sell_id]) ) continue;
            $check_additional = array(
                'cart' => $force_sell_quantity[$force_sell_id]['products'],
                'settings_force_sell' => $force_sell_option
            );
            if( BeRocket_conditions_force_sell::check($force_sell_option['condition'], 'berocket_force_sell_custom_post', $check_additional) ) {
                $condition_mode = br_get_value_from_array($force_sell_option, 'condition_mode');
                if( empty($condition_mode) ) $condition_mode = 'each';
                $force_products_list = apply_filters('berocket_force_sell_condition_mode_'.$condition_mode, array(), $force_sell_id, $force_sell_option, $product_list, $force_sell_quantity[$force_sell_id]);
                foreach($force_products_list as $force_product) {
                    if( empty($force_product['data']['linked']) ) {
                        continue;
                    }
                    $product_id = $force_product['product_id'];
                    $quantity = $force_product['quantity'];
                    $product = wc_get_product($product_id);
                    if( ! $product ) {
                        wc_add_notice( __( 'Sorry, this product not exist anymore.', 'woocommerce' ), 'error' );
                        return false;
                    }
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
        return true;
    }
    function check_result_force_products($result, $data) {
        extract($data);
        $force_sell_products_list = array();
        foreach($force_sell_options as $force_sell_id => $force_sell_option) {
            if ( ! isset($force_sell_quantity[$force_sell_id]) 
              || ! isset($force_sell_quantity[$force_sell_id]['products']) 
              || ! is_array($force_sell_quantity[$force_sell_id]['products'])
              || ! count($force_sell_quantity[$force_sell_id]['products'])
            ) continue;
            $check_additional = array(
                'cart' => $force_sell_quantity[$force_sell_id]['products'],
                'settings_force_sell' => $force_sell_option
            );
            if( BeRocket_conditions_force_sell::check($force_sell_option['condition'], 'berocket_force_sell_custom_post', $check_additional) ) {
                $condition_mode = br_get_value_from_array($force_sell_option, 'condition_mode');
                if( empty($condition_mode) ) $condition_mode = 'each';
                $force_products_list = apply_filters('berocket_force_sell_condition_mode_'.$condition_mode, array(), $force_sell_id, $force_sell_option, $product_list, $force_sell_quantity[$force_sell_id]);
                foreach($force_products_list as $force_product) {
                    if( empty($force_product['data']['linked']) && isset(WC()->cart->removed_cart_contents[$force_product['md5']]) ) {
                        continue;
                    }
                    $force_sell_products_list[$force_product['md5']] = $force_product;
                }
            }
        }
        return $force_sell_products_list;
    }
    function calculate_quantity($qty, $options) {
        $quantity = $qty;
        if( ! empty( $options['count'] ) ) {
            $quantity = $options['count'];
        }
        $quantity = apply_filters('berocket_calculate_quantity_force_sell', $quantity, $options, $qty);
        return $quantity;
    }
    public function remove_link($link, $cart_id) {
        $cart_contents = WC()->cart->cart_contents;
        if( ! empty($cart_contents[$cart_id]['linked']) ) {
            $link = '';
        }
        return $link;
    }
    public function change_quantity($quantity, $item_id) {
        $cart_contents = WC()->cart->cart_contents;
        if( ! empty($cart_contents[$item_id]['linked']) ) {
            $quantity = apply_filters('berocket_change_quantity_force_sell', $cart_contents[$item_id]['quantity'], $quantity, $item_id);
        }
        return $quantity;
    }
    public function cart_item_data($data, $item) {
        
        if( ! empty($item['linked_to']) ) {
            if( ( $find_item_id = WC()->cart->find_product_in_cart( $item['linked_to'] ) ) ) {
                $_product = WC()->cart->cart_contents[ $find_item_id ]['data'];
            } else {
                $removed_cart_contents = WC()->cart->get_removed_cart_contents();
                if( isset($removed_cart_contents[$item['linked_to']]) ) {
                    $removed_cart_contents = $removed_cart_contents[$item['linked_to']];
                    $product_id = (empty($removed_cart_contents['variation_id']) ? $removed_cart_contents['product_id'] : $removed_cart_contents['variation_id']);
                    $_product = wc_get_product($product_id);
                }
            }
            $_product_post = br_wc_get_product_post($_product);
            $linked_to_name = $_product_post->post_title;
            $data[] = array('key' => apply_filters('product_linked_with_text', __('Linked with', 'force-sell-for-woocommerce'), 'Linked with'), 'value' => $linked_to_name);
        }
        return $data;
    }
    public function condition_additional($echo, $post) {
        $BeRocket_force_sell_custom_post = BeRocket_force_sell_custom_post::getInstance();
        $options = $BeRocket_force_sell_custom_post->get_option( $post->ID );
        $condition_mode = br_get_value_from_array($options, 'condition_mode');
        $echo['open_settings']          = '<h3>'.__('Condition Additional settings', 'BeRocket_cart_notices_domain').'</h3><table>';
        $echo['condition_mode_open']    = '<tr><th>'.__('Condition Mode', 'BeRocket_cart_notices_domain').'</th><td>';

        $echo['condition_mode_normal1'] = '<p><label>';
        $echo['condition_mode_normal2'] = '<input name="br_force_sell[condition_mode]" type="radio" value="normal"'.($condition_mode == 'normal' ? ' checked' : '').'>';
        $echo['condition_mode_normal3'] = __('Normal', 'BeRocket_cart_notices_domain').'</label>
        <small>'.__('Condition will check each product, but add to cart only one force sell for products summary', 'BeRocket_cart_notices_domain').'</small></p>';

        $echo['condition_mode_cart1']   = '<p><label>';
        $echo['condition_mode_cart2']   = '<input name="br_force_sell[condition_mode]" type="radio" value="cart"'.($condition_mode == 'cart' ? ' checked' : '').'>';
        $echo['condition_mode_cart3']   = __('Cart', 'BeRocket_cart_notices_domain').'</label>
        <small>'.__('Condition will check all products in cart and add to cart only one force sell for cart summary', 'BeRocket_cart_notices_domain').'</small></p>';

        $echo['condition_mode_each1']   = '<p><label>';
        $echo['condition_mode_each2']   = '<input name="br_force_sell[condition_mode]" type="radio" value="each"'.(empty($condition_mode) || $condition_mode == 'each' ? ' checked' : '').'>';
        $echo['condition_mode_each3']   = __('Each product', 'BeRocket_cart_notices_domain').'</label>
        <small>'.__('Condition will check each product and will add to cart one force sell for each product, that match conditions', 'BeRocket_cart_notices_domain').'</small></p>';

        $echo['condition_mode_close']   = '</td></tr>';
        $echo['close_settings']         = '</table>';
        return $echo;
    }
    public function validate_add_to_cart($valid, $product_id, $quantity, $variation_id = false) {
        if( ! $valid ) return $valid;

        $product_id = ($variation_id == false ? $product_id : $variation_id);
        $product = wc_get_product($product_id);
        $additional_product = array(
            'product' => $product,
            'product_post' => br_wc_get_product_post($product),
            'product_id' => $product_id,
            'product_qty' => $quantity,
        );
        return $this->check_cart_and_add_linked('validate_add_to_cart', $additional_product);
    }
    public function get_option() {
        $BeRocket_force_sell = BeRocket_force_sell::getInstance();
        return $BeRocket_force_sell->get_option();
    }
    
    public function echo_linked_products($options_custom = array()) {
        global $post;
        if( ! empty($options_custom['product_id']) && intval($options_custom['product_id']) ) {
            $product_id = intval($options_custom['product_id']);
        } else {
            if( ! is_product() ) {
                return false;
            }
            $product_id = $post->ID;
        }
        $product = wc_get_product($product_id);
        if( empty($product) || ! is_a($product, 'WC_Product') ) return;
        $additional_product = array(
            'product' => $product,
            'product_post' => br_wc_get_product_post($product),
            'product_id' => $product_id,
            'product_qty' => 1,
        );
        $linked_products_cart = $this->check_cart_and_add_linked('force_products');
        $linked_products_product = $this->check_cart_and_add_linked('force_products', $additional_product);
        $linked_products = array();
        foreach($linked_products_product as $cart_key => $data_value) {
            if( ! isset($linked_products_cart[$cart_key]) || $data_value['quantity'] != $linked_products_cart[$cart_key]['quantity'] ) {
                $linked_products[$cart_key] = $data_value;
            }
        }
        $options = $this->get_option();
        if( ! is_array($options_custom) ) {
            $options_custom = array();
        }
        $options = array_merge($options, $options_custom);
        $products = array();
        $products_linked = array();
        foreach($linked_products as $linked_product) {
            if( empty($linked_product['data']['linked']) ) {
                $products[] = $linked_product['product_id'];
            } else {
                $products_linked[] = $linked_product['product_id'];
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
                $products = array_unique($products);
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
                $products_linked = array_unique($products_linked);
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
    function woocommerce_variation_cart_data($product_id = 0, $variation_id = 0) {
        $variation = array();
        if ( 'product_variation' === get_post_type( $product_id ) ) {
            $variation_id = $product_id;
            $product_id   = wp_get_post_parent_id( $variation_id );
        }

        $product_data = wc_get_product( $variation_id ? $variation_id : $product_id );
        if ( $product_data->is_type( 'variation' ) ) {
            $missing_attributes = array();
            $parent_data        = wc_get_product( $product_data->get_parent_id() );

            $variation_attributes = $product_data->get_variation_attributes();
            // Filter out 'any' variations, which are empty, as they need to be explicitly specified while adding to cart.
            $variation_attributes = array_filter( $variation_attributes );

            // Gather posted attributes.
            $posted_attributes = array();
            foreach ( $parent_data->get_attributes() as $attribute ) {
                if ( ! $attribute['is_variation'] ) {
                    continue;
                }
                $attribute_key = 'attribute_' . sanitize_title( $attribute['name'] );

                if ( isset( $variation[ $attribute_key ] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
                    if ( $attribute['is_taxonomy'] ) {
                        // Don't use wc_clean as it destroys sanitized characters.
                        $value = sanitize_title( wp_unslash( $variation[ $attribute_key ] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
                    } else {
                        $value = html_entity_decode( wc_clean( wp_unslash( $variation[ $attribute_key ] ) ), ENT_QUOTES, get_bloginfo( 'charset' ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
                    }

                    // Don't include if it's empty.
                    if ( ! empty( $value ) || '0' === $value ) {
                        $posted_attributes[ $attribute_key ] = $value;
                    }
                }
            }

            // Merge variation attributes and posted attributes.
            $posted_and_variation_attributes = array_merge( $variation_attributes, $posted_attributes );

            // If no variation ID is set, attempt to get a variation ID from posted attributes.
            if ( empty( $variation_id ) ) {
                $data_store   = WC_Data_Store::load( 'product' );
                $variation_id = $data_store->find_matching_product_variation( $parent_data, $posted_attributes );
            }

            // Do we have a variation ID?
            if ( empty( $variation_id ) ) {
                throw new Exception( __( 'Please choose product options&hellip;', 'woocommerce' ) );
            }

            // Check the data we have is valid.
            $variation_data = wc_get_product_variation_attributes( $variation_id );
            $attributes     = array();

            foreach ( $parent_data->get_attributes() as $attribute ) {
                if ( ! $attribute['is_variation'] ) {
                    continue;
                }

                // Get valid value from variation data.
                $attribute_key = 'attribute_' . sanitize_title( $attribute['name'] );
                $valid_value   = isset( $variation_data[ $attribute_key ] ) ? $variation_data[ $attribute_key ] : '';

                /**
                 * If the attribute value was posted, check if it's valid.
                 *
                 * If no attribute was posted, only error if the variation has an 'any' attribute which requires a value.
                 */
                if ( isset( $posted_and_variation_attributes[ $attribute_key ] ) ) {
                    $value = $posted_and_variation_attributes[ $attribute_key ];

                    // Allow if valid or show error.
                    if ( $valid_value === $value ) {
                        $attributes[ $attribute_key ] = $value;
                    } elseif ( '' === $valid_value && in_array( $value, $attribute->get_slugs(), true ) ) {
                        // If valid values are empty, this is an 'any' variation so get all possible values.
                        $attributes[ $attribute_key ] = $value;
                    } else {
                        /* translators: %s: Attribute name. */
                        throw new Exception( sprintf( __( 'Invalid value posted for %s', 'woocommerce' ), wc_attribute_label( $attribute['name'] ) ) );
                    }
                } elseif ( '' === $valid_value ) {
                    $missing_attributes[] = wc_attribute_label( $attribute['name'] );
                }

                $variation = $attributes;
            }
            if ( ! empty( $missing_attributes ) ) {
                /* translators: %s: Attribute name. */
                throw new Exception( sprintf( _n( '%s is a required field', '%s are required fields', count( $missing_attributes ), 'woocommerce' ), wc_format_list_of_items( $missing_attributes ) ) );
            }
        }
        return $variation;
    }
}
new berocket_force_sell_add_next();
