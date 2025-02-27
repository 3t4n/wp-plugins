<?php
class BeRocket_conditions_force_sell extends BeRocket_conditions {
    public static function move_product_var_to_product($additional) {
        if( ! empty($additional['var_product_id']) ) {
            $additional['product_id'] = $additional['var_product_id'];
        }
        if( ! empty($additional['var_product']) ) {
            $additional['product'] = $additional['var_product'];
        }
        if( ! empty($additional['var_product_post']) ) {
            $additional['product_post'] = $additional['var_product_post'];
        }
        return $additional;
    }
        public static function save_condition_product($condition) {
            $condition = parent::save_condition_product($condition);
            if( isset($condition['product']) && is_array($condition['product']) ) {
                foreach($condition['product'] as $product) {
                    $wc_product = wc_get_product($product);
                    if( $wc_product->get_type() == 'variable' ) {
                        $children = $wc_product->get_children();
                        if( ! is_array($children) ) {
                            $children = array();
                        }
                        $condition['additional_product'] = array_merge($condition['additional_product'], $children);
                    }
                }
            }
            return $condition;
        }
    public static function check_prepare_data($show, $condition, $additional, $function) {
        $condition_mode = br_get_value_from_array($additional['settings_force_sell'], 'condition_mode');
        if( $condition_mode == 'cart' ) {
            if( ! isset($additional['cart']) ) {
                return true;
            } else {
                foreach($additional['cart'] as $cart_item) {
                    $new_additional = $cart_item;
                    $new_additional['product_variables'] = $cart_item;
                    $new_additional['settings_force_sell'] = $additional['settings_force_sell'];
                    if( self::check_prepare_data_execute_after($show, $condition, $new_additional, $function) ) {
                        return true;
                    }
                }
                return false;
            }
        }
        if( ! isset($additional['cart']) ) {
            return self::check_prepare_data_execute_after($show, $condition, $additional, $function);
        } else {
            return true;
        }
    }
    public static function check_prepare_data_execute_after($show, $condition, $additional, $function) {
        if( method_exists(__CLASS__, $function.'2') ) {
            return self::{$function.'2'}($show, $condition, $additional);
        } else {
            $additional = self::move_product_var_to_product($additional);
            return parent::$function($show, $condition, $additional);
        }
    }
    public static function check_condition_product($show, $condition, $additional) {
        return self::check_prepare_data($show, $condition, $additional, __FUNCTION__);
    }
    public static function check_condition_product_sale($show, $condition, $additional) {
        return self::check_prepare_data($show, $condition, $additional, __FUNCTION__);
    }
    public static function check_condition_product_bestsellers($show, $condition, $additional) {
        return self::check_prepare_data($show, $condition, $additional, __FUNCTION__);
    }
    public static function check_condition_product_price($show, $condition, $additional) {
        return self::check_prepare_data($show, $condition, $additional, __FUNCTION__);
    }
    public static function check_condition_product_stockstatus($show, $condition, $additional) {
        return self::check_prepare_data($show, $condition, $additional, __FUNCTION__);
    }
    public static function check_condition_product_totalsales($show, $condition, $additional) {
        return self::check_prepare_data($show, $condition, $additional, __FUNCTION__);
    }
    public static function check_condition_product_attribute($show, $condition, $additional) {
        return self::check_prepare_data($show, $condition, $additional, __FUNCTION__);
    }
    public static function check_condition_product_age($show, $condition, $additional) {
        return self::check_prepare_data($show, $condition, $additional, __FUNCTION__);
    }
    public static function check_condition_product_saleprice($show, $condition, $additional) {
        return self::check_prepare_data($show, $condition, $additional, __FUNCTION__);
    }
    public static function check_condition_product_stockquantity($show, $condition, $additional) {
        return self::check_prepare_data($show, $condition, $additional, __FUNCTION__);
    }
    public static function check_condition_product_category($show, $condition, $additional) {
        return self::check_prepare_data($show, $condition, $additional, __FUNCTION__);
    }
    public static function check_condition_product_category2($show, $condition, $additional) {
        $product_id = $additional['product_id'];
        if ( 'product_variation' === get_post_type( $product_id ) ) {
            $product_id   = wp_get_post_parent_id( $product_id );
        }
        if( ! is_array($condition['category']) ) {
            $condition['category'] = array($condition['category']);
        }
        $terms = get_the_terms( $product_id, 'product_cat' );
        if( is_array( $terms ) ) {
            foreach( $terms as $term ) {
                if( in_array($term->term_id, $condition['category']) ) {
                    $show = true;
                }
                if( ! empty($condition['subcats']) && ! $show ) {
                    foreach($condition['category'] as $category) {
                        $show = term_is_ancestor_of($category, $term->term_id, 'product_cat');
                        if( $show ) {
                            break;
                        }
                    }
                }
                if($show) break;
            }
        }
        if( $condition['equal'] == 'not_equal' ) {
            $show = ! $show;
        }
        return $show;
    }
    public static function check_condition_product_attribute2($show, $condition, $additional) {
        $terms = array();
        $product_id   = $additional['product_id'];
        if( $additional['product']->is_type( 'variation' ) ) {
            $product_id   = wp_get_post_parent_id( $product_id );
            $var_attributes = $additional['product']->get_variation_attributes();
            if( ! empty($var_attributes['attribute_'.$condition['attribute']]) ) {
                $term = get_term_by('slug', $var_attributes['attribute_'.$condition['attribute']], $condition['attribute']);
                if( $term !== false ) {
                    $terms[] = $term;
                }
            }
        }
        if( ! count($terms) ) {
            $terms = get_the_terms( $product_id, $condition['attribute'] );
        }
        if( is_array( $terms ) ) {
            foreach( $terms as $term ) {
                if( $term->term_id == $condition['values'][$condition['attribute']]) {
                    $show = true;
                    break;
                }
            }
        }
        if( $condition['equal'] == 'not_equal' ) {
            $show = ! $show;
        }
        return $show;
    }
}
class BeRocket_force_sell_custom_post extends BeRocket_custom_post_class {
    public $hook_name = 'berocket_force_sell_custom_post';
    public $conditions;
    public $post_type_parameters = array('can_be_disabled' => true);
    protected static $instance;
    function __construct() {
        $this->post_name = 'br_force_sell';
        $this->post_settings = array(
            'label' => 'Force Sell',
            'labels' => array(
                'menu_name'          => 'Force Sell', 'Admin menu name',
                'add_new_item'       => 'Add New Force Sell',
                'edit'               => 'Edit',
                'edit_item'          => 'Edit Force Sell',
                'new_item'           => 'New Force Sell',
                'view'               => 'View Force Sells',
                'view_item'          => 'View Force Sell',
                'search_items'       => 'Search Force Sell',
                'not_found'          => 'No Force Sells found',
                'not_found_in_trash' => 'No Force Sells found in trash',
            ),
            'description'     => 'This is where you can add Sales Reports.',
            'public'          => true,
            'show_ui'         => true,
            'capability_type' => 'post',
            'publicly_queryable'  => false,
            'exclude_from_search' => true,
            'show_in_menu'        => 'berocket_account',
            'hierarchical'        => false,
            'rewrite'             => false,
            'query_var'           => false,
            'supports'            => array( 'title' ),
            'show_in_nav_menus'   => false,
        );
        $this->default_settings = array(
            'products'      => array(),
            'linked'        => '',
            'count'         => '',
            'for_every'     => '',
            'reach_limit'   => '',
            'change_count'  => '',
            'condition_mode'=> '',
        );
        parent::__construct();
    }
    function init_translation() {
        $this->post_settings['label'] = __( 'Force Sell', 'force-sell-for-woocommerce' );
        $this->post_settings['labels'] = array(
            'menu_name'          => _x( 'Force Sell', 'Admin menu name', 'force-sell-for-woocommerce' ),
            'add_new_item'       => __( 'Add New Force Sell', 'force-sell-for-woocommerce' ),
            'edit'               => __( 'Edit', 'force-sell-for-woocommerce' ),
            'edit_item'          => __( 'Edit Force Sell', 'force-sell-for-woocommerce' ),
            'new_item'           => __( 'New Force Sell', 'force-sell-for-woocommerce' ),
            'view'               => __( 'View Force Sells', 'force-sell-for-woocommerce' ),
            'view_item'          => __( 'View Force Sell', 'force-sell-for-woocommerce' ),
            'search_items'       => __( 'Search Force Sell', 'force-sell-for-woocommerce' ),
            'not_found'          => __( 'No Force Sells found', 'force-sell-for-woocommerce' ),
            'not_found_in_trash' => __( 'No Force Sells found in trash', 'force-sell-for-woocommerce' ),
        );
        $this->post_settings['description'] = __( 'This is where you can add Sales Reports.', 'force-sell-for-woocommerce' );
        $this->conditions = new BeRocket_conditions_force_sell($this->post_name.'[condition]', $this->hook_name, array(
            'condition_product',
            'condition_product_sale',
            'condition_product_bestsellers',
            'condition_product_price',
            'condition_product_stockstatus',
            'condition_product_totalsales',
        ));
        $this->add_meta_box('conditions', __( 'Conditions', 'force-sell-for-woocommerce' ));
        $this->add_meta_box('settings', __( 'Settings', 'force-sell-for-woocommerce' ));
    }
    public function conditions($post) {
        $options = $this->get_option( $post->ID );
        if( empty($options['condition']) ) {
            $options['condition'] = array();
        }
        echo $this->conditions->build($options['condition']);
        $echo = apply_filters('BeRocket_force_sell_custom_post_after_conditions', array(), $post);
        $echo = implode($echo);
        echo $echo;
    }
    public function settings($post) {
        wp_enqueue_script( 'berocket_force_sell_admin', plugins_url( '../js/admin.js', __FILE__ ), array( 'jquery' ), BeRocket_force_sell_version );
        $options = $this->get_option( $post->ID );
        $BeRocket_force_sell = BeRocket_force_sell::getInstance();
        echo '<div class="br_framework_settings">';
        $BeRocket_force_sell->display_admin_settings(
            array(
                'General' => array(
                    'icon' => 'cog',
                ),
            ),
            array(
                'General' => array(
                    'products' => array(
                        "label"     => __('Products', 'force-sell-for-woocommerce'),
                        "type"      => "products",
                        "name"      => "products",
                        "value"     => array()
                    ),
                    'linked' => array(
                        "label"     => __('Linked', 'force-sell-for-woocommerce'),
                        "type"      => "checkbox",
                        "name"      => "linked",
                        "value"     => "1",
                        "class"     => "br_force_sell_linked",
                        "label_for" => __('Products cannot be removed', 'force-sell-for-woocommerce')
                    ),
                    'count' => array(
                        "label"     => __('Count', 'force-sell-for-woocommerce'),
                        "type"      => "number",
                        "name"      => "count",
                        "value"     => "",
                        "extra"     => "placeholder='Added product count' min='1'",
                        "class"     => "br_force_sell_count",
                        "label_for" => __('How many products will be linked', 'force-sell-for-woocommerce')
                    ),
                ),
            ),
            array(
                'name_for_filters' => $this->hook_name,
                'hide_header' => true,
                'hide_form' => true,
                'hide_additional_blocks' => true,
                'hide_save_button' => true,
                'settings_name' => $this->post_name,
                'options' => $options
            )
        );
        echo '</div>';
    }
    public function wc_save_product_without_check( $post_id, $post ) {
        parent::wc_save_product_without_check( $post_id, $post );
        if( method_exists($this->conditions, 'save') ) {
            $settings = get_post_meta( $post_id, $this->post_name, true );
            if( ! empty($settings['products']) && is_array($settings['products']) && count($settings['products']) ) {
                $settings['products'] = $this->replace_variable_product_with_variation($settings['products']);
            }
            $settings['condition'] = $this->conditions->save( ( isset($settings['condition']) ? $settings['condition'] : array() ), $this->hook_name );
            update_post_meta( $post_id, $this->post_name, $settings );
        }
    }
    function replace_variable_product_with_variation($products) {
        if( ! is_array($products) ) {
            $products = array($products);
        }
        $data_store = WC_Data_Store::load( 'product' );
        foreach($products as $i => $product) {
            $product_data = wc_get_product($product);
            if( is_a($product_data, 'WC_Product') && $product_data->get_type() == 'variable' ) {
                $attributes = (method_exists( $product_data, 'get_default_attributes' ) ? $product_data->get_default_attributes() : $product_data->get_variation_default_attributes());
                if( ! is_array($attributes) ) {
                    $attributes = array();
                }
                if( ! count($attributes) ) {
                    $variations = $product_data->get_children();
                    if( is_array($variations) && count($variations) ) {
                        $products[$i] = array_shift($variations);
                        if( ! $products[$i] ) {
                            unset($products[$i]);
                        }
                    } else {
                        unset($products[$i]);
                    }
                } else {
                    foreach( $attributes as $key => $value ) {
                        if( strpos( $key, 'attribute_' ) === 0 ) continue;
                        unset( $attributes[ $key ] );
                        $attributes[ sprintf( 'attribute_%s', $key ) ] = $value;
                    }
                    if( class_exists('WC_Data_Store') ) {
                        $products[$i] = $data_store->find_matching_product_variation( $product_data, $attributes );
                    } else {
                        $products[$i] = $product_data->get_matching_variation( $attributes );
                    }
                }
            }
        }
        return $products;
    }
}
