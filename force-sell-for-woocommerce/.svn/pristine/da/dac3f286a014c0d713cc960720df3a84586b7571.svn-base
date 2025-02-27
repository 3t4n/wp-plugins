<?php
class BeRocket_force_sell_Paid extends BeRocket_plugin_variations {
    public $plugin_name = 'force_sell';
    public $version_number = 15;
    public $types;
    function __construct() {
        parent::__construct();
        add_filter('brfr_data_berocket_force_sell_custom_post', array($this, 'post_data_options'), $this->version_number);
        add_filter('berocket_calculate_quantity_force_sell', array($this, 'calculate_quantity_force_sell'), $this->version_number, 3);
        add_filter('berocket_correct_cart_linked_final_qty', array($this, 'correct_cart_linked_final_qty'), $this->version_number, 4);
        add_filter('berocket_check_quantity_min_force_sell', array($this, 'check_quantity_min'), $this->version_number, 3);
        add_filter('berocket_change_quantity_force_sell', array($this, 'change_quantity'), $this->version_number, 3);
        add_action('berocket_force_sell_version_diff', array($this, 'older_version_update'));
    }
    public function calculate_quantity_force_sell($linked_quantity, $settings, $quantity) {
        if( ! empty( $settings['count'] ) ) {
            if( empty($settings['for_every']) ) {
                $linked_quantity = $settings['count'];
            } else {
                $linked_quantity = $settings['count'] * (int)($quantity/$settings['for_every']);
                if( empty($settings['reach_limit']) && ($quantity%$settings['for_every']) ) {
                    $linked_quantity += $settings['count'];
                }
            }
        }
        return $linked_quantity;
    }
    public function correct_cart_linked_final_qty($linked_quantity, $find_item_id, $md5_search, $product_data) {
        if( $find_item_id ) {
            if( ! (! empty( $product_data['linked'] ) && empty( $product_data['change_count'] )) ) {
                if( WC()->cart->cart_contents[ $find_item_id ]['quantity'] > $linked_quantity && $linked_quantity != 0 ) {
                    $linked_quantity = WC()->cart->cart_contents[ $find_item_id ]['quantity'];
                }
            }
        }
        return $linked_quantity;
    }
    public function check_quantity_min($new_quantity, $quantity, $cart_id) {
        $cart_contents = WC()->cart->cart_contents;
        if( empty($cart_contents[$cart_id]['change_count']) || $quantity < $new_quantity ) {
            $quantity = $new_quantity;
        }
        return $quantity;
    }
    public function change_quantity($new_quantity, $quantity, $item_id) {
        $cart_contents = WC()->cart->cart_contents;
        if( empty($cart_contents[$item_id]['change_count']) ) {
            $quantity = $new_quantity;
        }
        return $quantity;
    }
    function older_version_update($version) {
        if( empty($version) ) {
            $options = $this->get_option();
            $default_settings = array(
                'products'      => array(),
                'linked'        => '',
                'count'         => '',
                'for_every'     => '',
                'reach_limit'   => '',
                'change_count'  => '',
            );
            $add_posts = array();
            $all_options = array(
                'force_sell' => array('name' => 'Products for all products: Can be removed', 'settings' => array()),
                'force_sell_linked' => array('name' => 'Products for all products: Can not be removed', 'settings' => array('linked' => '1')),
                'force_sell_once' => array('name' => 'Products for all products: Can be removed. Once for cart', 'settings' => array('count' => '1')),
                'force_sell_linked_once' => array('name' => 'Products for all products: Can not be removed. Once for product', 'settings' => array('linked' => '1', 'count' => '1')),
            );
            foreach($all_options as $option_name => $settings) {
                if( ! empty($options[$option_name]) && is_array($options[$option_name]) && count($options[$option_name]) ) {
                    $settings['settings']['products'] = $options[$option_name];
                    $settings['settings'] = array_merge($default_settings, $settings['settings']);
                    $add_posts[] = $settings;
                }
            }
            if( ! empty($options['category_linked']) && is_array($options['category_linked']) && count($options['category_linked']) ) {
                foreach($options['category_linked'] as $category_linked) {
                    if( ! empty($category_linked['products']) && is_array($category_linked['products']) && count($category_linked['products']) ) {
                        $settings = array(
                            'name' => 'Category: '.$category_linked['category'],
                            'settings' => array(
                                'condition'=> array('1' => array('1' => array(
                                    'type'      => 'attribute',
                                    'equal'     => 'equal',
                                    'attribute' => 'product_cat',
                                    'values'    => array('product_cat' => $category_linked['category']),
                                ))),
                                'products' => $category_linked['products'],
                                'linked'   => (empty($category_linked['linked']) ? '' : '1'),
                                'count'   => (empty($category_linked['once']) ? '' : '1'),
                            ),
                        );
                        $settings['settings'] = array_merge($default_settings, $settings['settings']);
                        $add_posts[] = $settings;
                    }
                }
            }
            if( ! empty($options['product_linked']) && is_array($options['product_linked']) && count($options['product_linked']) ) {
                foreach($options['product_linked'] as $product_linked) {
                    if(! empty($product_linked['product_ids']) && is_array($product_linked['product_ids']) && count($product_linked['product_ids'])
                    && ! empty($product_linked['products']) && is_array($product_linked['products']) && count($product_linked['products']) ) {
                        $settings = array(
                            'name' => 'Products: '.implode(', ', $product_linked['product_ids']),
                            'settings' => array(
                                'condition'=> array('1' => array('1' => array(
                                    'type'      => 'product',
                                    'equal'     => 'equal',
                                    'product' => $product_linked['product_ids'],
                                ))),
                                'products' => $product_linked['products'],
                                'linked'   => (empty($product_linked['linked']) ? '' : '1'),
                                'count'   => (empty($product_linked['once']) ? '' : '1'),
                            ),
                        );
                        $settings['settings'] = array_merge($default_settings, $settings['settings']);
                        $add_posts[] = $settings;
                    }
                }
            }
            foreach($add_posts as $add_post) {
                $post_id = wp_insert_post(array(
                    'post_title'    => $add_post['name'],
                    'post_type'     => 'br_force_sell',
                    'post_status'   => 'publish'
                ));
                update_post_meta( $post_id, 'br_force_sell', $add_post['settings'] );
            }
        }
    }
    public function post_data_options($data) {
        $data['General'] = berocket_insert_to_array(
            $data['General'],
            'count',
            array(
                'for_every' => array(
                    "label"     => __('Every', 'force-sell-for-woocommerce'),
                    "type"      => "number",
                    "name"      => "for_every",
                    "value"     => "",
                    "extra"     => "placeholder='All' min='1'",
                    "class"     => "br_force_sell_for_every",
                    "tr_class"  => "br_force_sell_for_every_tr",
                    "label_for" => __('What count of product must be to add next forced', 'force-sell-for-woocommerce')
                ),
                'reach_limit' => array(
                    "label"     => __('Add after Every', 'force-sell-for-woocommerce'),
                    "type"      => "checkbox",
                    "name"      => "reach_limit",
                    "value"     => "1",
                    "class"     => "br_force_sell_reach_limit",
                    "tr_class"  => "br_force_sell_reach_limit_tr",
                    "label_for" => __('Add linked products only when count of products will be equal "Every"', 'force-sell-for-woocommerce')
                ),
                'change_count' => array(
                    "label"     => __('Change Count', 'force-sell-for-woocommerce'),
                    "type"      => "checkbox",
                    "name"      => "change_count",
                    "value"     => "1",
                    "tr_class"  => "br_force_sell_change_count",
                    "label_for" => __('Customer can change count of products, but not less then required by settings before', 'force-sell-for-woocommerce')
                ),
            )
        );
        return $data;
    }
    public function get_option($options = false) {
        if( $options === false ) {
            $BeRocket_force_sell = BeRocket_force_sell::getInstance();
            $options = $BeRocket_force_sell->get_option();
        }
        return $options;
    }
}
new BeRocket_force_sell_Paid();
