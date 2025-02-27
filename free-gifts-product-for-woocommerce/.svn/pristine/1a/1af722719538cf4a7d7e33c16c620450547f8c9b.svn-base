<?php
if (!defined('ABSPATH')){
    exit;
}

// Default values and save settings
add_action('init','FGW_init_save');
function FGW_init_save(){
    global $fgw_comman;
    
    $optionget = array(
        'fgw_gift_enable' => 'enable',
        'fgw_gift_prod_display' => 'after_cart_table',
        'fgw_ckout_enable' => 'no',
        'fgw_gift_prod_display_ckout' => 'slider',
        'fgw_gift_title' => 'Select Your Gift',
        'fgw_gift_title_font_size' => '24',
        'fgw_gift_prod_txt_in_cart' => 'Gift Product',
        'fgw_gift_remove_gift_items' => 'enable',
        'fgw_allow_multiple_gift'=>'no',
        'fgw_gift_rule' => 'custom',
        'fgw_allow_only_logged_in' => '',
        'fgw_allow_incluidve_tax' => 'no',
        'fgw_add_to_cart_text' => 'Add To Cart',
        'fgw_mtvtion_msg_enable' => 'enable',
        'fgw_prodrule_mtvtion_multi_msg' => 'You will be eligible When you add this product Quantity {minqty} to {maxqty} in your cart, you will get {allow_gift} products for gift.',
        'fgw_catrule_mtvtion_multi_msg' => 'You will be eligible When you add these {categories} categories product Quantity {minqty} to {maxqty} in your cart,you will get {allow_gift} products for Gift.',
        'fgw_pricerule_mtvtion_multi_msg' => 'You will be eligible When your cart total between {mincarttotal} to {maxcarttotal} , you will get {allow_gift} products for Gift.',
        'fgw_eligiblity_message' => 'You are eligible for a free gift, You can add {allowed_gifts} gifts to your cart.',
        'fgw_eligiblity_btn_text' => 'Get Your Gift',
        'showslider_item_desktop' => '5',
        'showslider_item_tablet' => '3',
        'showslider_item_mobile' => '1',

    );

    foreach ($optionget as $key_optionget => $value_optionget) {
       $fgw_comman[$key_optionget] = get_option( $key_optionget,$value_optionget );
    }

    $fgw_comman['minimum_custom'] = unserialize(get_option('minimum_custom'));
    $fgw_comman['maximum_custom'] = unserialize(get_option('maximum_custom'));
    $fgw_comman['allowed_custom'] = unserialize(get_option('allowed_custom'));
    $fgw_comman['fgw_combo_custom'] = unserialize(get_option('fgw_combo_custom'));
    $fgw_comman['fgw_gift_multiple_custom'] = unserialize(get_option('fgw_gift_multiple_custom'));


    $fgw_comman['minimum_price'] = unserialize(get_option('minimum_price'));
    $fgw_comman['maximum_price'] = unserialize(get_option('maximum_price'));
    $fgw_comman['allowed_price'] = unserialize(get_option('allowed_price'));
    $fgw_comman['fgw_gift_multiple_price'] = unserialize(get_option('fgw_gift_multiple_price'));


    $fgw_comman['minimum_category'] = unserialize(get_option('minimum_category'));
    $fgw_comman['maximum_category'] = unserialize(get_option('maximum_category'));
    $fgw_comman['allowed_category'] = unserialize(get_option('allowed_category'));
    $fgw_comman['fgw_select_cats_category'] = unserialize(get_option('fgw_select_cats_category'));
    $fgw_comman['fgw_gift_multiple_category'] = unserialize(get_option('fgw_gift_multiple_category'));
}

function FGW_setfree_product($cart_object, $fgw_gift_combo, $fgw_maximum_gift) {
    global $woocommerce;
    $custom_price = 0;
    $d_qty = 0;
    $cart_totalss=0;
    foreach ( $cart_object->cart_contents as $key => $value ) {
        if($d_qty < $fgw_maximum_gift) {
            if($value['variation_id'] != 0) {
                if(in_array($value['variation_id'], $fgw_gift_combo)) {
                    $cart_totalss += $value['quantity'];
                    if($cart_totalss <= $fgw_maximum_gift){  
                        $product_price = $value['data']->get_price();
                        $product_price = $custom_price;
                        $value['data']->set_price($custom_price);  
                        // $cart_object->set_quantity( $key, $new_qty );
                        $d_qty = $d_qty + 1;
                        $woocommerce->cart->cart_contents[$key]['isgift'] = 'yes';
                    } 
                } elseif (in_array($value['product_id'], $fgw_gift_combo)) {
                    $cart_totalss += $value['quantity'];
                    if($cart_totalss <= $fgw_maximum_gift){  
                        $value['data']->price = $custom_price;
                        $value['data']->set_price($custom_price);
                        $d_qty = $d_qty + 1;
                        $woocommerce->cart->cart_contents[$key]['isgift'] = 'yes';
                    }
                }
            } else {
                if(in_array($value['product_id'], $fgw_gift_combo)) {
                    $cart_totalss += $value['quantity'];
                    if($cart_totalss <= $fgw_maximum_gift){  
                        $product_price = $value['data']->get_price();
                        $product_price = $custom_price;
                        $value['data']->set_price($custom_price);
                        $d_qty = $d_qty + 1;
                        $woocommerce->cart->cart_contents[$key]['isgift'] = 'yes';
                    }
                }
            }
        }
    }
    WC()->cart->set_session();
}

function FGW_wp_kama_woocommerce_init_action($cart_object){
    if ( is_admin() && ! defined( 'DOING_AJAX' ) )
    return;

    if ( did_action( 'woocommerce_before_calculate_totals' ) >= 2 )
    return;

    global $post, $woocommerce,$fgw_comman;
     if(!is_admin()){
        $fgw_comman['fgw_rulepassed'] = false;
        $fgw_comman['fgw_rulepassed_motivation_message'] = '';
        $fgw_comman['fgw_eligiblity_message_final'] = '';
        $fgw_comman['fgw_rulepassed_motivation_products'] = array();
        //for product 
        if($fgw_comman['fgw_gift_rule']=='custom'){

            $fgw_comman['fgw_custom_arr'] = array();
            if($fgw_comman['fgw_gift_multiple_custom'] && is_array($fgw_comman['fgw_gift_multiple_custom'])){
                for($i=0; $i<count($fgw_comman['fgw_gift_multiple_custom']); $i++) {   
                    $fgw_comman['fgw_custom_arr'][]= array(
                        'minimum_custom'=>$fgw_comman['minimum_custom'][$i],
                        'maximum_custom'=>$fgw_comman['maximum_custom'][$i],
                        'allowed_custom'=>$fgw_comman['allowed_custom'][$i],
                        'fgw_combo_custom'=>explode(",",$fgw_comman['fgw_combo_custom'][$i]),
                        'fgw_gift_multiple_custom'=>explode(",",$fgw_comman['fgw_gift_multiple_custom'][$i]),
                    );
                }
            }
            if (! empty( WC()->cart )) {
                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                    if($cart_item['variation_id'] != 0) {
                        $pid = $cart_item['variation_id'];
                    } else {
                        $pid = $cart_item['product_id'];
                    }
                    foreach($fgw_comman['fgw_custom_arr'] as $fgw_custom_arr_key=>$fgw_custom_arr_val){
                        if(!empty($fgw_custom_arr_val['fgw_combo_custom'])){
                                if(in_array($pid, $fgw_custom_arr_val['fgw_combo_custom']) && 
                                    $cart_item['quantity']>=$fgw_custom_arr_val['minimum_custom'] && 
                                    $cart_item['quantity']<=$fgw_custom_arr_val['maximum_custom']) {
                                    $fgw_comman['fgw_rulepassed'] = true;
                                    $fgw_comman['fgw_rulepassed_arr'] = $fgw_custom_arr_val;
                                    $fgw_comman['fgw_eligiblity_message_final'] = str_replace("{allowed_gifts}", $fgw_custom_arr_val['allowed_custom'],$fgw_comman['fgw_eligiblity_message']);
                                }else{
                                    $fgw_pricerule_mtvtion_msg_final = $fgw_comman['fgw_prodrule_mtvtion_multi_msg'];
                                    $fgw_prodrule_mtvtion_msg_final = str_replace("{minqty}", $fgw_custom_arr_val['minimum_custom'], $fgw_pricerule_mtvtion_msg_final);
                                    $fgw_prodrule_mtvtion_msg_final = str_replace("{maxqty}", $fgw_custom_arr_val['maximum_custom'], $fgw_prodrule_mtvtion_msg_final);
                                    $fgw_prodrule_mtvtion_msg_final = str_replace("{allow_gift}",$fgw_custom_arr_val['allowed_custom'], $fgw_prodrule_mtvtion_msg_final);
                                    $fgw_comman['fgw_rulepassed_motivation_message'] = $fgw_prodrule_mtvtion_msg_final;
                                    $fgw_comman['fgw_rulepassed_motivation_products'] = $fgw_custom_arr_val['fgw_combo_custom'];
                                }
                           
                        }
                    }
                    
                }
            }

            if($fgw_comman['fgw_rulepassed'] == true){
                echo FGW_setfree_product($cart_object, $fgw_comman['fgw_rulepassed_arr']['fgw_gift_multiple_custom'], $fgw_comman['fgw_rulepassed_arr']['allowed_custom']);
            } 
        }

        //for price 
        if($fgw_comman['fgw_gift_rule']=='price'){

            $fgw_comman['fgw_price_arr'] = array();
            for($i=0; $i<count($fgw_comman['fgw_gift_multiple_price']); $i++) {   
                $fgw_comman['fgw_price_arr'][]= array(
                    'minimum_price'=>$fgw_comman['minimum_price'][$i],
                    'maximum_price'=>$fgw_comman['maximum_price'][$i],
                    'allowed_price'=>$fgw_comman['allowed_price'][$i],
                    'fgw_gift_multiple_price'=>explode(",",$fgw_comman['fgw_gift_multiple_price'][$i]),
                );
            }
            $cart_total=0;
            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                if($cart_item['variation_id'] != 0) {
                    $pid = $cart_item['variation_id'];
                } else {
                    $pid = $cart_item['product_id'];
                }
                //print_r($cart_item['isgift']);
                if(!isset($cart_item['isgift'])){
                    $cart_item['isgift']='no';
                }
                if(!empty($cart_item['line_subtotal']) && $cart_item['isgift']!='yes'){
                    if($fgw_comman['fgw_allow_incluidve_tax'] == "enable"){
                        $cart_total += $cart_item['line_subtotal']+$cart_item['line_tax'];
                    }else{
                        $cart_total += $cart_item['line_subtotal'];
                    }
                 }
            }
            $applied_coupons = WC()->cart->get_applied_coupons();
            if (!empty($applied_coupons)) {
                foreach ($applied_coupons as $coupon_code) {
                    $coupon = new WC_Coupon($coupon_code);
                    if ($coupon->is_valid()) {
                        $coupon_value = $coupon->get_amount();
                        if ($coupon->get_discount_type() === 'percent') {
                            $discount_amount = ($coupon_value / 100) * $cart_total;
                            $cart_total -= $discount_amount;
                        }else if ($coupon->get_discount_type() === 'fixed_cart' || $coupon->get_discount_type() === 'fixed_product') {
                            // Subtract the fixed coupon amount from $cart_total
                            $cart_total -= $coupon_value;
                        }
                    }
                }
            }
            foreach($fgw_comman['fgw_price_arr'] as $fgw_price_arr_key=>$fgw_price_arr_val){
                if(!empty($fgw_price_arr_val['fgw_gift_multiple_price'])){
                    if( $cart_total >= $fgw_price_arr_val['minimum_price']  &&  $cart_total <= $fgw_price_arr_val['maximum_price'] ){
                        $fgw_comman['fgw_rulepassed'] = true;
                        $fgw_comman['fgw_rulepassed_arr'] = $fgw_price_arr_val;
                        $fgw_comman['fgw_eligiblity_message_final'] = str_replace("{allowed_gifts}", $fgw_price_arr_val['allowed_price'],$fgw_comman['fgw_eligiblity_message']);
                    }else{
                        $fgw_pricerule_mtvtion_msg_final = $fgw_comman['fgw_pricerule_mtvtion_multi_msg'];
                        $fgw_pricerule_mtvtion_msg_final = str_replace("{mincarttotal}", $fgw_price_arr_val['minimum_price'], $fgw_pricerule_mtvtion_msg_final);
                        $fgw_pricerule_mtvtion_msg_final = str_replace("{maxcarttotal}", $fgw_price_arr_val['maximum_price'], $fgw_pricerule_mtvtion_msg_final);
                        $fgw_pricerule_mtvtion_msg_final = str_replace("{allow_gift}", $fgw_price_arr_val['allowed_price'], $fgw_pricerule_mtvtion_msg_final);
                        $fgw_comman['fgw_rulepassed_motivation_message'] = $fgw_pricerule_mtvtion_msg_final;
                    }
                }
            }

            if($fgw_comman['fgw_rulepassed'] == true){
                echo FGW_setfree_product($cart_object, $fgw_comman['fgw_rulepassed_arr']['fgw_gift_multiple_price'], $fgw_comman['fgw_rulepassed_arr']['allowed_price']);
            } 
            add_action( 'woocommerce_before_calculate_totals', 'FGW_wp_kama_woocommerce_init_action' );
        }
        //for category
        if($fgw_comman['fgw_gift_rule']=='category'){

            $fgw_comman['fgw_category_arr'] = array();
            for($i=0; $i<count($fgw_comman['fgw_gift_multiple_category']); $i++) {   
                $fgw_comman['fgw_category_arr'][]= array(
                    'minimum_category'=>$fgw_comman['minimum_category'][$i],
                    'maximum_category'=>$fgw_comman['maximum_category'][$i],
                    'allowed_category'=>$fgw_comman['allowed_category'][$i],
                    'fgw_gift_multiple_category'=>explode(",",$fgw_comman['fgw_gift_multiple_category'][$i]),
                    'fgw_select_cats_category'=>explode(",",$fgw_comman['fgw_select_cats_category'][$i]),
                );
            }
            
            foreach($fgw_comman['fgw_category_arr'] as $fgw_category_arr_key=>$fgw_category_arr_val){
                if(!empty($fgw_category_arr_val['fgw_gift_multiple_category']) && !empty($fgw_category_arr_val['fgw_select_cats_category']) ){
                    $cart_total_qty_count=0;
                    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                        if($cart_item['variation_id'] != 0) {
                            $pid = $cart_item['variation_id'];
                        } else {
                            $pid = $cart_item['product_id'];
                        }
                        foreach($fgw_comman['fgw_category_arr'] as $fgw_category_arr_key=>$fgw_category_arr_val){
                            if(!empty($fgw_category_arr_val['fgw_gift_multiple_category'])){

                                $terms = get_the_terms ($cart_item['product_id'],'product_cat');
                                foreach ($terms as $key => $value) {
                                    if(!empty($fgw_category_arr_val['fgw_select_cats_category'])){
                                        if (in_array($value->term_id, $fgw_category_arr_val['fgw_select_cats_category'])) {
                                            $cart_total_qty_count += $cart_item['quantity'];

                                        }
                                    }
                                }
                            }
                        }
                    }
                    if( $cart_total_qty_count >= $fgw_category_arr_val['minimum_category']  &&  $cart_total_qty_count <= $fgw_category_arr_val['maximum_category'] ){
                        $fgw_comman['fgw_rulepassed'] = true;
                        $fgw_comman['fgw_rulepassed_arr'] = $fgw_category_arr_val;
                        $fgw_comman['fgw_eligiblity_message_final'] = str_replace("{allowed_gifts}", $fgw_category_arr_val['allowed_category'],$fgw_comman['fgw_eligiblity_message']);
                    }else{
                        $fgw_catrule_mtvtion_msg_final = $fgw_comman['fgw_catrule_mtvtion_multi_msg'];
                        $cat_list = array();
                        foreach ($fgw_category_arr_val['fgw_select_cats_category'] as $key => $value) {
                            $term = get_term_by( 'id', $value, 'product_cat' );
                            $term_link = get_term_link( $term->slug, 'product_cat' );
                            $cat_list[] = "<a href='".$term_link."' target='_blank'>".$term->name."</a>";
                        }

                        $cat_list = implode(', ', $cat_list);
                        $fgw_catrule_mtvtion_msg_final = str_replace("{minqty}", $fgw_category_arr_val['minimum_category'], $fgw_catrule_mtvtion_msg_final);
                        $fgw_catrule_mtvtion_msg_final = str_replace("{maxqty}", $fgw_category_arr_val['maximum_category'], $fgw_catrule_mtvtion_msg_final);
                        $fgw_catrule_mtvtion_msg_final = str_replace("{categories}", $cat_list, $fgw_catrule_mtvtion_msg_final);
                        $fgw_catrule_mtvtion_msg_final = str_replace("{allow_gift}", $fgw_category_arr_val['allowed_category'], $fgw_catrule_mtvtion_msg_final);
                        $fgw_comman['fgw_rulepassed_motivation_message'] = $fgw_catrule_mtvtion_msg_final;
                    }
                }
            }

            if($fgw_comman['fgw_rulepassed'] == true){
                echo FGW_setfree_product($cart_object, $fgw_comman['fgw_rulepassed_arr']['fgw_gift_multiple_category'], $fgw_comman['fgw_rulepassed_arr']['allowed_category']);
            } 
        }


        // quantity_gift
        $fgw_comman['fgw_quantity_gift'] = 0;
        $fgw_comman['fgw_gift_disable'] = false;
        foreach( WC()->cart->get_cart() as $cart_item ) {
            if(!empty($cart_item['isgift'])){
                if($cart_item['isgift'] == 'yes'){
                    $fgw_comman['fgw_quantity_gift'] +=$cart_item['quantity'];
                }
            }
        }

        if(!empty($fgw_comman['fgw_rulepassed_arr']['fgw_gift_multiple_custom'])){
            $fgw_comman['final_gift_array'] = $fgw_comman['fgw_rulepassed_arr']['fgw_gift_multiple_custom'];
            $fgw_comman['fgw_maximum_gift'] = $fgw_comman['fgw_rulepassed_arr']['allowed_custom'];
        }
        if(!empty($fgw_comman['fgw_rulepassed_arr']['fgw_gift_multiple_price'])){
            $fgw_comman['final_gift_array']  = $fgw_comman['fgw_rulepassed_arr']['fgw_gift_multiple_price'];
            $fgw_comman['fgw_maximum_gift'] = $fgw_comman['fgw_rulepassed_arr']['allowed_price'];
        }
        if(!empty($fgw_comman['fgw_rulepassed_arr']['fgw_gift_multiple_category'])){
            $fgw_comman['final_gift_array']  = $fgw_comman['fgw_rulepassed_arr']['fgw_gift_multiple_category'];
            $fgw_comman['fgw_maximum_gift'] = $fgw_comman['fgw_rulepassed_arr']['allowed_category'];
        }
        if(!empty($fgw_comman['fgw_quantity_gift']) && !empty($fgw_comman['fgw_maximum_gift'])){
            if($fgw_comman['fgw_quantity_gift'] >= $fgw_comman['fgw_maximum_gift'] ){
                $fgw_comman['fgw_gift_disable'] = true;
            }
        }

        foreach ( WC()->cart->get_cart() as $key => $value ) {
            if(isset($value['isgift']) && $value['isgift'] == 'yes') {
               $woocommerce->cart->cart_contents[$key]['isgift'] = 'no';
            }

            $fgw_gift_remove_gift_items = $fgw_comman['fgw_gift_remove_gift_items'];
            if($fgw_gift_remove_gift_items == 'enable') {
                if(isset($value['isgift']) && $value['isgift'] == 'no') {
                   WC()->cart->remove_cart_item( $key );
                }
            }
        }

        /*if ($fgw_comman['fgw_rulepassed']==false){
            foreach ( WC()->cart->get_cart() as $key => $value ) {
                if(isset($value['isgift']) && $value['isgift'] == 'yes') {
                    $woocommerce->cart->cart_contents[$key]['isgift'] = 'no';
                }

                $fgw_gift_remove_gift_items = $fgw_comman['fgw_gift_remove_gift_items'];
                if($fgw_gift_remove_gift_items == 'enable') {
                    if(isset($value['isgift']) && $value['isgift'] == 'no') {
                       WC()->cart->remove_cart_item( $key );
                    }
                }
            }
        }*/


    }
}

add_action('init','FGW_commangift_item_load_actions_front');
function FGW_commangift_item_load_actions_front(){
    global $fgw_comman;
    if($fgw_comman['fgw_gift_enable'] == 'enable' ) {
        if($fgw_comman['fgw_allow_only_logged_in'] == 'enable') {
            if(is_user_logged_in()) {
                add_action( 'woocommerce_before_calculate_totals', 'FGW_wp_kama_woocommerce_init_action',1 );              
            }
        } else {
            add_action( 'woocommerce_before_calculate_totals', 'FGW_wp_kama_woocommerce_init_action',1 );
        }
    }
}