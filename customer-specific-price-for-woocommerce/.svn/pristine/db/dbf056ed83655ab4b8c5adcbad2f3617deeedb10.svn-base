<?php

if (!defined('ABSPATH'))
  exit;

if (!class_exists('CSPFW_front')) {

    class CSPFW_front {

        protected static $instance;

        public static function instance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
                self::$instance->init();
            }
             return self::$instance;
        }

        function cspfw_specific_price_texts() { 
            global $cspfw_comman;
            $current_pro_id = get_the_id();
            $user_id = get_current_user_id();
            $args = array(
              'numberposts' => -1,
              'post_type'   => 'specific_price'
            );
            $postsss = new WP_Query( $args );
            ?>
            <div class="cspfw_specific_price_section_main" style="background-color: <?php echo esc_attr($cspfw_comman['cspfw_rule_bg_color']); ?>;border-color: <?php echo esc_attr($cspfw_comman['cspfw_rule_border_color']); ?>;">
                <h3 class="cspfw_specific_price_heading" style="background-color: <?php echo esc_attr($cspfw_comman['cspfw_heading_bg_color']); ?>;color: <?php echo esc_attr($cspfw_comman['cspfw_heading_text_color']); ?>;text-align: <?php echo esc_attr($cspfw_comman['cspfw_single_product_page_price_heading_text_align']);?>;"><?php echo $cspfw_comman['cspfw_single_product_page_price_heading_text'];?></h3>
                <div class="cspfw_specific_price_section_inner">
                    <ul class="cspfw_specific_price_rules" style="color: <?php echo esc_attr($cspfw_comman['cspfw_message_text_color']); ?>;">
                        <?php
                        foreach ($postsss->posts as $key => $posts) {
                            $post_id = $posts->ID;
                            $cspfw_enable_rule_main = get_post_meta($post_id, 'cspfw_enable_rule_main', true);
                            $cspfw_apply_pro_and_cat = get_post_meta($post_id, 'cspfw_apply_pro_and_cat', true);
                            if ($cspfw_enable_rule_main == 'yes') {
                                $pro_cat = false;
                                if ($cspfw_apply_pro_and_cat == 'products') {
                                    $products = get_post_meta($post_id,'cspfw_select2',true);
                                    if (in_array($current_pro_id, $products)) {
                                        $pro_cat = true;
                                    }else{
                                        $pro_cat = false;
                                    }
                                }elseif ($cspfw_apply_pro_and_cat == 'categories') {
                                    $products_cat = get_post_meta($post_id,'cspfw_cats_select2',true);
                                    $terms = get_the_terms ( $current_pro_id, 'product_cat' );
                                    foreach ( $terms as $term ) {
                                        $cat_id = $term->term_id;
                                        if (in_array($cat_id, $products_cat)) {
                                            $pro_cat = true;
                                        }else{
                                            $pro_cat = false;
                                        }
                                    }
                                }
                                    
                                $cspfw_apply_cust_and_role = get_post_meta($post_id,'cspfw_apply_cust_and_role',true);
                                if ($cspfw_apply_cust_and_role == 'customer_base') {
                                    $cspfw_customer_rule = get_post_meta($post_id, 'cspfw_customer_rule', true);
                                    $cspfw_price_rule = get_post_meta($post_id, 'cspfw_price_rule', true);
                                    $cspfw_price = get_post_meta($post_id, 'cspfw_price', true);
                                    $cspfw_qty_min = get_post_meta($post_id, 'cspfw_qty_min', true);
                                    $cspfw_qty_max = get_post_meta($post_id, 'cspfw_qty_max', true);
                                    $cspfw_start_date = get_post_meta($post_id, 'cspfw_start_date', true);
                                    $cspfw_end_date = get_post_meta($post_id, 'cspfw_end_date', true);
                                    foreach($cspfw_start_date as $keyyyy => $start_date){
                                        if ($user_id == $cspfw_customer_rule[$keyyyy]) {
                                            if ($pro_cat == true) {
                                                $price = $cspfw_price[$keyyyy];
                                                $min_qty = $cspfw_qty_min[$keyyyy];
                                                $max_qty = $cspfw_qty_max[$keyyyy];
                                                $cspfw_rule = $cspfw_price_rule[$keyyyy];
                                                $end_date = $cspfw_end_date[$keyyyy];
                                                if (empty($min_qty)) {$min_qty = 1;}
                                                if (empty($max_qty)) {$max_qty = 'infinite';}
                                                if (!empty($price)) {
                                                    if ($cspfw_rule == 'fixed_price') {
                                                        $message = str_replace("{min}",$min_qty,$cspfw_comman['cspfw_fixed_price_text']);
                                                        $message = str_replace("{max}",$max_qty,$message);
                                                        $message = str_replace("{price}",wc_price($price),$message);
                                                    }elseif ($cspfw_rule == 'fixed_increase') {
                                                        $message = str_replace("{min}",$min_qty,$cspfw_comman['cspfw_fixed_increase_price_text']);
                                                        $message = str_replace("{max}",$max_qty,$message);
                                                        $message = str_replace("{price}",wc_price($price),$message);
                                                    }elseif ($cspfw_rule == 'fixed_decrease') {
                                                        $message = str_replace("{min}",$min_qty,$cspfw_comman['cspfw_fixed_decrease_price_text']);
                                                        $message = str_replace("{max}",$max_qty,$message);
                                                        $message = str_replace("{price}",wc_price($price),$message);
                                                    }elseif ($cspfw_rule == 'percentage_decrease') {
                                                        $message = str_replace("{min}",$min_qty,$cspfw_comman['cspfw_percentage_decrease_price_text']);
                                                        $message = str_replace("{max}",$max_qty,$message);
                                                        $message = str_replace("{percentage}",$price.'%',$message);
                                                    }elseif ($cspfw_rule == 'percentage_increase') {
                                                        $message = str_replace("{min}",$min_qty,$cspfw_comman['cspfw_percentage_increase_price_text']);
                                                        $message = str_replace("{max}",$max_qty,$message);
                                                        $message = str_replace("{percentage}",$price.'%',$message);
                                                    }
                                                    if (!empty($start_date) && !empty($end_date)) {
                                                        if (strtotime(date("Y-m-d")) >= strtotime($start_date) && strtotime(date("Y-m-d")) <= strtotime($end_date)) {
                                                            ?>
                                                            <li class="cspfw_specific_price_body_content">
                                                                <?php echo wp_kses_post($message);?>
                                                            </li>
                                                            <?php
                                                        }
                                                    }elseif (!empty($start_date) && empty($end_date)) {
                                                        if (strtotime(date("Y-m-d")) >= strtotime($start_date)) {
                                                            ?>
                                                            <li class="cspfw_specific_price_body_content">
                                                                <?php echo wp_kses_post($message);?>
                                                            </li>
                                                            <?php
                                                        }
                                                    }elseif (empty($start_date) && !empty($end_date)) {
                                                        if (strtotime(date("Y-m-d")) <= strtotime($end_date)) {
                                                            ?>
                                                            <li class="cspfw_specific_price_body_content">
                                                                <?php echo wp_kses_post($message);?>
                                                            </li>
                                                            <?php
                                                        }
                                                    }else{
                                                        ?>
                                                        <li class="cspfw_specific_price_body_content">
                                                            <?php echo wp_kses_post($message);?>
                                                        </li>
                                                        <?php
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }elseif ($cspfw_apply_cust_and_role == 'role_base') {
                                    $cspfw_role_rule = get_post_meta($post_id, 'cspfw_role_rule', true);
                                    $cspfw_role_price_rule = get_post_meta($post_id, 'cspfw_role_price_rule', true);
                                    $cspfw_role_price = get_post_meta($post_id, 'cspfw_role_price', true);
                                    $cspfw_role_qty_min = get_post_meta($post_id, 'cspfw_role_qty_min', true);
                                    $cspfw_role_qty_max = get_post_meta($post_id, 'cspfw_role_qty_max', true);
                                    $cspfw_role_start_date = get_post_meta($post_id, 'cspfw_role_start_date', true);
                                    $cspfw_role_end_date = get_post_meta($post_id, 'cspfw_role_end_date', true);
                                    foreach ($cspfw_role_start_date as $key => $start_date_role) {
                                        $user = new WP_User( $user_id );
                                        if ($user->roles[0] == $cspfw_role_rule[$key]) {
                                            if ($pro_cat == true) {
                                                $price = $cspfw_role_price[$key];
                                                $min_qty = $cspfw_role_qty_min[$key];
                                                $max_qty = $cspfw_role_qty_max[$key];
                                                if (empty($min_qty)) {$min_qty = 1;}
                                                if (empty($max_qty)) {$max_qty = 'infinite';}
                                                if (!empty($price)) {
                                                    if ($cspfw_role_price_rule[$key] == 'fixed_price') {
                                                        $message = str_replace("{min}",$min_qty,$cspfw_comman['cspfw_fixed_price_text']);
                                                        $message = str_replace("{max}",$max_qty,$message);
                                                        $message = str_replace("{price}",wc_price($price),$message);
                                                    }elseif ($cspfw_role_price_rule[$key] == 'fixed_increase') {
                                                        $message = str_replace("{min}",$min_qty,$cspfw_comman['cspfw_fixed_increase_price_text']);
                                                        $message = str_replace("{max}",$max_qty,$message);
                                                        $message = str_replace("{price}",wc_price($price),$message);
                                                    }elseif ($cspfw_role_price_rule[$key] == 'fixed_decrease') {
                                                        $message = str_replace("{min}",$min_qty,$cspfw_comman['cspfw_fixed_decrease_price_text']);
                                                        $message = str_replace("{max}",$max_qty,$message);
                                                        $message = str_replace("{price}",wc_price($price),$message);
                                                    }elseif ($cspfw_role_price_rule[$key] == 'percentage_decrease') {
                                                        $message = str_replace("{min}",$min_qty,$cspfw_comman['cspfw_percentage_decrease_price_text']);
                                                        $message = str_replace("{max}",$max_qty,$message);
                                                        $message = str_replace("{percentage}",$price.'%',$message);
                                                    }elseif ($cspfw_role_price_rule[$key] == 'percentage_increase') {
                                                        $message = str_replace("{min}",$min_qty,$cspfw_comman['cspfw_percentage_increase_price_text']);
                                                        $message = str_replace("{max}",$max_qty,$message);
                                                        $message = str_replace("{percentage}",$price.'%',$message);
                                                    }
                                                    if (!empty($start_date_role) && !empty($cspfw_role_end_date[$key])) {
                                                        if (strtotime(date("Y-m-d")) >= strtotime($start_date_role) && strtotime(date("Y-m-d")) <= strtotime($cspfw_role_end_date[$key])) {
                                                            ?>
                                                            <li class="cspfw_specific_price_body_content">
                                                                <?php echo wp_kses_post($message);?>
                                                            </li>
                                                            <?php
                                                        }
                                                    }elseif (!empty($start_date_role) && empty($cspfw_role_end_date[$key])) {
                                                        if (strtotime(date("Y-m-d")) >= strtotime($start_date_role)) {
                                                            ?>
                                                            <li class="cspfw_specific_price_body_content">
                                                                <?php echo wp_kses_post($message);?>
                                                            </li>
                                                            <?php
                                                        }
                                                    }elseif (empty($start_date_role) && !empty($cspfw_role_end_date[$key])) {
                                                        if (strtotime(date("Y-m-d")) <= strtotime($cspfw_role_end_date[$key])) {
                                                            ?>
                                                            <li class="cspfw_specific_price_body_content">
                                                                <?php echo wp_kses_post($message);?>
                                                            </li>
                                                            <?php
                                                        }
                                                    }else{
                                                        ?>
                                                        <li class="cspfw_specific_price_body_content">
                                                            <?php echo wp_kses_post($message);?>
                                                        </li>
                                                        <?php
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }    

                                if (!empty($message)) {
                                    ?>
                                    <script type="text/javascript">
                                        jQuery('.cspfw_specific_price_section_main').addClass('remove_section');
                                    </script>
                                    <?php
                                }         
                            }
                        }
                        ?>
                    </ul>
                    <style type="text/css">
                        .cspfw_specific_price_section_main .woocommerce-Price-amount {
                            color: <?php echo esc_attr($cspfw_comman['cspfw_message_text_color']); ?>;
                        }
                    </style>
                </div>
            </div>
            <?php
        }

        function cspfw_add_custom_price( $cart_object ) { 
            global $post, $woocommerce, $cspfw_comman;
            
            foreach ( $cart_object->cart_contents as $key => $value ) {
                $product_id = $value['product_id'];
                $qty = $value['quantity'];

                if($value['variation_id'] != 0){
                    $product = wc_get_product($value['variation_id']);
                    $product_id = $value['variation_id'];
                }else{
                    $product = wc_get_product( $product_id );
                    $product_id = $product_id;
                }

                $user_id = get_current_user_id();
                $args = array(
                  'numberposts' => -1,
                  'post_type'   => 'specific_price',
                );
                $postsss = new WP_Query( $args );
                foreach ($postsss->posts as $key => $posts) {
                    $post_id = $posts->ID;
                    $cspfw_enable_rule_main = get_post_meta($post_id, 'cspfw_enable_rule_main', true);
                    $cspfw_apply_pro_and_cat = get_post_meta($post_id, 'cspfw_apply_pro_and_cat', true);
                    if ($cspfw_enable_rule_main == 'yes') {
                        $pro_cat = false;
                        if ($cspfw_apply_pro_and_cat == 'products') {
                            $products = get_post_meta($post_id,'cspfw_select2',true);
                            if (in_array($product_id, $products)) {
                                $pro_cat = true;
                            }else{
                                $pro_cat = false;
                            }
                        }elseif ($cspfw_apply_pro_and_cat == 'categories') {
                            $products_cat = get_post_meta($post_id,'cspfw_cats_select2',true);
                            $terms = get_the_terms ( $product_id, 'product_cat' );
                            foreach ( $terms as $term ) {
                                $cat_id = $term->term_id;
                                if (in_array($cat_id, $products_cat)) {
                                    $pro_cat = true;
                                }else{
                                    $pro_cat = false;
                                }
                            }
                        }
                            
                        $cspfw_apply_cust_and_role = get_post_meta($post_id,'cspfw_apply_cust_and_role',true);
                        if ($cspfw_apply_cust_and_role == 'customer_base') {
                            $cspfw_customer_rule = get_post_meta($post_id, 'cspfw_customer_rule', true);
                            $cspfw_price_rule = get_post_meta($post_id, 'cspfw_price_rule', true);
                            $cspfw_price = get_post_meta($post_id, 'cspfw_price', true);
                            $cspfw_qty_min = get_post_meta($post_id, 'cspfw_qty_min', true);
                            $cspfw_qty_max = get_post_meta($post_id, 'cspfw_qty_max', true);
                            $cspfw_start_date = get_post_meta($post_id, 'cspfw_start_date', true);
                            $cspfw_end_date = get_post_meta($post_id, 'cspfw_end_date', true);
                            foreach ($cspfw_customer_rule as $key => $customer) {
                                if ($user_id == $customer) {
                                    if ($pro_cat == true) {
                                        $min_qty = $cspfw_qty_min[$key];
                                        $max_qty = $cspfw_qty_max[$key];
                                        $start_date = $cspfw_start_date[$key];
                                        $end_date = $cspfw_end_date[$key];
                                        $cspfw_rule = $cspfw_price_rule[$key];
                                        $cspfw_prices = $cspfw_price[$key];
                                        $this->min_max_and_start_end_date_custom_fun($qty, $min_qty, $max_qty, $start_date, $end_date, $product, $value, $cspfw_rule, $cspfw_prices);
                                    }
                                }
                            }
                        }elseif ($cspfw_apply_cust_and_role == 'role_base') {
                            $cspfw_role_rule = get_post_meta($post_id, 'cspfw_role_rule', true);
                            $cspfw_role_price_rule = get_post_meta($post_id, 'cspfw_role_price_rule', true);
                            $cspfw_role_price = get_post_meta($post_id, 'cspfw_role_price', true);
                            $cspfw_role_qty_min = get_post_meta($post_id, 'cspfw_role_qty_min', true);
                            $cspfw_role_qty_max = get_post_meta($post_id, 'cspfw_role_qty_max', true);
                            $cspfw_role_start_date = get_post_meta($post_id, 'cspfw_role_start_date', true);
                            $cspfw_role_end_date = get_post_meta($post_id, 'cspfw_role_end_date', true);
                            foreach ($cspfw_role_rule as $key => $role) {
                                $user = new WP_User( $user_id );
                                if ($user->roles[0] == $role) {
                                    if ($pro_cat == true) {
                                        $min_qty = $cspfw_role_qty_min[$key];
                                        $max_qty = $cspfw_role_qty_max[$key];
                                        $start_date = $cspfw_role_start_date[$key];
                                        $end_date = $cspfw_role_end_date[$key];
                                        $price_rule = $cspfw_role_price_rule[$key];
                                        $price = $cspfw_role_price[$key];
                                        $this->min_max_and_start_end_date_custom_fun($qty, $min_qty, $max_qty, $start_date, $end_date, $product, $value, $price_rule, $price);
                                    }
                                }
                            }
                        }             
                    }
                } 
            }    
        }

        function min_max_and_start_end_date_custom_fun($qty, $min_qty, $max_qty, $start_date, $end_date, $product, $value, $cspfw_rule, $cspfw_prices) {
            if (!empty($min_qty) && !empty($max_qty)) {
                if($min_qty <= $qty && $max_qty >= $qty) {
                    if (!empty($start_date) && !empty($end_date)) {
                        if (strtotime(date("Y-m-d")) >= strtotime($start_date) && strtotime(date("Y-m-d")) <= strtotime($end_date)) {
                            $this->discount_custom_price($cspfw_rule,$cspfw_prices,$product,$value);
                        }
                    }elseif (!empty($start_date) && empty($end_date)) {
                        if (strtotime(date("Y-m-d")) >= strtotime($start_date)) {
                            $this->discount_custom_price($cspfw_rule,$cspfw_prices,$product,$value);
                        }
                    }elseif (empty($start_date) && !empty($end_date)) {
                        if (strtotime(date("Y-m-d")) <= strtotime($end_date)) {
                            $this->discount_custom_price($cspfw_rule,$cspfw_prices,$product,$value);
                        }
                    }else{
                        $this->discount_custom_price($cspfw_rule,$cspfw_prices,$product,$value);
                    }
                }
            }elseif (empty($min_qty) && !empty($max_qty)) {
                if($max_qty >= $qty) {
                    if (!empty($start_date) && !empty($end_date)) {
                        if (strtotime(date("Y-m-d")) >= strtotime($start_date) && strtotime(date("Y-m-d")) <= strtotime($end_date)) {
                            $this->discount_custom_price($cspfw_rule,$cspfw_prices,$product,$value);
                        }
                    }elseif (!empty($start_date) && empty($end_date)) {
                        if (strtotime(date("Y-m-d")) >= strtotime($start_date)) {
                            $this->discount_custom_price($cspfw_rule,$cspfw_prices,$product,$value);
                        }
                    }elseif (empty($start_date) && !empty($end_date)) {
                        if (strtotime(date("Y-m-d")) <= strtotime($end_date)) {
                            $this->discount_custom_price($cspfw_rule,$cspfw_prices,$product,$value);
                        }
                    }else{
                        $this->discount_custom_price($cspfw_rule,$cspfw_prices,$product,$value);
                    }
                }   
            }elseif (!empty($min_qty) && empty($max_qty)) {
                if($min_qty <= $qty) {
                    if (!empty($start_date) && !empty($end_date)) {
                        if (strtotime(date("Y-m-d")) >= strtotime($start_date) && strtotime(date("Y-m-d")) <= strtotime($end_date)) {
                            $this->discount_custom_price($cspfw_rule,$cspfw_prices,$product,$value);
                        }
                    }elseif (!empty($start_date) && empty($end_date)) {
                        if (strtotime(date("Y-m-d")) >= strtotime($start_date)) {
                            $this->discount_custom_price($cspfw_rule,$cspfw_prices,$product,$value);
                        }
                    }elseif (empty($start_date) && !empty($end_date)) {
                        if (strtotime(date("Y-m-d")) <= strtotime($end_date)) {
                            $this->discount_custom_price($cspfw_rule,$cspfw_prices,$product,$value);
                        }
                    }else{
                        $this->discount_custom_price($cspfw_rule,$cspfw_prices,$product,$value);
                    }
                }
            }elseif (empty($min_qty) && empty($max_qty)) {
                if($qty) {
                    if (!empty($start_date) && !empty($end_date)) {
                        if (strtotime(date("Y-m-d")) >= strtotime($start_date) && strtotime(date("Y-m-d")) <= strtotime($end_date)) {
                            $this->discount_custom_price($cspfw_rule,$cspfw_prices,$product,$value);
                        }
                    }elseif (!empty($start_date) && empty($end_date)) {
                        if (strtotime(date("Y-m-d")) >= strtotime($start_date)) {
                            $this->discount_custom_price($cspfw_rule,$cspfw_prices,$product,$value);
                        }
                    }elseif (empty($start_date) && !empty($end_date)) {
                        if (strtotime(date("Y-m-d")) <= strtotime($end_date)) {
                            $this->discount_custom_price($cspfw_rule,$cspfw_prices,$product,$value);
                        }
                    }else{
                        $this->discount_custom_price($cspfw_rule,$cspfw_prices,$product,$value);
                    }
                }
            }
        }

        function discount_custom_price($cspfw_rule,$cspfw_price,$product,$value){
            $price  = $product->get_price();
            $new_price = $this->DPFW_count_price($cspfw_rule, $cspfw_price, $price);
            $value['data']->price = $new_price;
            $value['data']->set_price($new_price);
        }

        function DPFW_count_price($cspfw_ruless, $cspfw_pricess, $price) {
            if (!empty($cspfw_pricess)) {
                if($cspfw_ruless == "fixed_price") {
                    $prices = (int)$cspfw_pricess;
                }
                if($cspfw_ruless == "fixed_increase") {
                    $prices = (int)$price + (int)$cspfw_pricess;
                }
                if($cspfw_ruless == "fixed_decrease") {
                    $prices = (int)$price - (int)$cspfw_pricess;
                }
                if($cspfw_ruless == "percentage_decrease") {
                    $prices = (int)$price - ((int)$price * (int)$cspfw_pricess / 100);
                }
                if($cspfw_ruless == "percentage_increase") {
                    $prices = (int)$price + ((int)$price * (int)$cspfw_pricess / 100);
                }
            }elseif (empty($cspfw_pricess)) {
                $prices = $price;
            }
            return $prices;
        }
         
        function init() {
            global $cspfw_comman;
            if ($cspfw_comman['cspfw_enable_features'] == 'yes' && is_user_logged_in()) {
                if ($cspfw_comman['cspfw_show_single_product_page'] == 'yes') {
                    add_action( 'woocommerce_before_add_to_cart_form', array($this,'cspfw_specific_price_texts'), 10, 0 );
                }
                add_action( 'woocommerce_before_calculate_totals', array($this, 'cspfw_add_custom_price' ));
            }
        }
    }
    CSPFW_front::instance();
}