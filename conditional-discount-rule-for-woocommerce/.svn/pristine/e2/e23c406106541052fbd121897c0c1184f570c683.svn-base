<?php

class Pi_Cdrw_Apply_Discount{
    function __construct(){

        if(get_option('pi_cdrw_old_way_of_discount','coupon') == 'additional-cost'){
            add_action('woocommerce_cart_calculate_fees' , array($this,'addDiscount'));
            add_action('woocommerce_cart_totals_get_fees_from_cart_taxes', array($this,'excludeCartFeesTaxes'), 10 ,3);
        }else{
            add_action('woocommerce_before_calculate_totals', array($this,'applyDiscountCode'));
            add_action('woocommerce_after_calculate_totals', array($this,'applyDiscountCode'));

            add_filter('woocommerce_get_shop_coupon_data', array($this, 'addDiscountCouponData'),10,3);
            
            /** Removes the [Remove] coupon option next to discount */
            add_filter('woocommerce_cart_totals_coupon_html', array($this, 'removeCouponOption'),10,3);

            /** Removes the Coupon: next to the discount name  */
            add_filter('woocommerce_cart_totals_coupon_label', array($this, 'setLabel'),10,2);

            add_action('woocommerce_check_cart_items', array(__CLASS__,'removeNotices'));
        }

        add_action('woocommerce_checkout_update_order_meta', [$this, 'addFutureCoupon']);
    }

    /**
     * this is needed else WooCommerce will apply tax on the discount amount as well
     */
    function excludeCartFeesTaxes($taxes, $fee, $cart)
    {
        if(isset($fee->object) && $fee->object->amount < 0){
            return [];
        }
        return $taxes;
    }

    function applyDiscountCode(WC_Cart $cart){

        /**
         * we do not want to start adding coupon on cart page as initial addition on cart page always comes 0
         */
        if(function_exists('is_cart') && is_cart()) return;
       
        $discounts = $this->matchedShippingMethods($cart);
       
        foreach($discounts as $discount){
            $discount_id = $discount->ID;

            if(isset($cart->applied_coupons) && is_array($cart->applied_coupons) && in_array("pisol-cdrw-discount:{$discount_id}", $cart->applied_coupons)) continue;
            
            $cart->applied_coupons[] = "pisol-cdrw-discount:{$discount_id}";
        }
    }

    function addDiscountCouponData($false, $data, $coupon){
        if(!function_exists('WC') || !isset(WC()->cart) || strpos($data,'pisol-cdrw-discount') === false ) return false;

        $cart  = WC()->cart;
        
        if(!empty($this->applicable_discounts)){
            $discounts = $this->applicable_discounts;
        }else{
            $this->applicable_discounts = $this->matchedShippingMethods($cart);
            $discounts = $this->applicable_discounts;
        }

        foreach($discounts as $discount){
            $title = $discount->post_title;
            $discount_id = $discount->ID;

            $coupon_id = "pisol-cdrw-discount:{$discount_id}";
            if($data != $coupon_id) continue;
            
            $discount_type = get_post_meta( $discount_id, 'pi_discount_type', true);
            $discount = get_post_meta( $discount_id, 'pi_discount', true);
            $start_time = get_post_meta( $discount_id, 'pi_discount_start_time', true);
            $end_time = get_post_meta( $discount_id, 'pi_discount_end_time', true);
            $total = $cart->get_displayed_subtotal();

            if(self::offerStarted($start_time) && !self::offerEnded( $end_time ) ){
                if($discount_type == 'percentage'){
                    
                    $discount_value = $this->evaluate_cost($discount, $discount_id, $cart);

                    $discount_amount = $discount_value * $total  /100;
                
                }else{
                    $discount_amount = $this->evaluate_cost($discount, $discount_id, $cart);
                }

                if(!is_numeric($discount_amount) || $discount_amount < 0 ) return false;

                $coupon->set_discount_type('fixed_cart');
                $coupon->set_description( $title );
                $discount_amount = self::multiCurrencyCompatible($discount_amount);
                $coupon->set_amount(abs($discount_amount));
                
                return $coupon;
            }
        }

        WC()->cart->remove_coupon( $data );

        return false;
    }

    function addDiscount($cart){
        $discounts = $this->matchedShippingMethodsOld($cart);

        foreach($discounts as $discount){
            $title = $discount->post_title;
            $discount_id = $discount->ID;
            $discount_type = get_post_meta( $discount_id, 'pi_discount_type', true);
            $discount = get_post_meta( $discount_id, 'pi_discount', true);
            $start_time = get_post_meta( $discount_id, 'pi_discount_start_time', true);
            $end_time = get_post_meta( $discount_id, 'pi_discount_end_time', true);
            $total = $cart->get_displayed_subtotal();

            if(self::offerStarted($start_time) && !self::offerEnded( $end_time ) ){
                if($discount_type == 'percentage'){
                    
                    $discount_value = $this->evaluate_cost($discount, $discount_id, $cart);

                    $discount_amount = $discount_value * $total  /100;
                
                }else{
                    $discount_amount = $this->evaluate_cost($discount, $discount_id, $cart);
                }

                $fee_arg = array(
                    'id' => 'pisol-cdrw-discount:'.$discount_id,
                    'name'=> $title,
                    'amount' => - $discount_amount
                );

                $cart->fees_api()->add_fee( $fee_arg );

            }
        }
       
    }

     /**
		 * function taken from woocommerce / includes / shipping / flat_rate / class-wc-shipping-flat-rate.php
		 * https://docs.woocommerce.com/document/flat-rate-shipping/
		 * https://github.com/woocommerce/woocommerce/blob/9431b34f0dc3d1ed7b45807ffde75de4bb58f831/includes/shipping/flat-rate/class-wc-shipping-flat-rate.php
		 */
	protected function evaluate_cost( $sum, $discount_id, $cart) {
	
        include_once WC()->plugin_path() . '/includes/libraries/class-wc-eval-math.php';

        // Allow 3rd parties to process shipping cost arguments.
        
        $locale         = localeconv();
        $decimals       = array( wc_get_price_decimal_separator(), $locale['decimal_point'], $locale['mon_decimal_point'], ',' );

        $this->short_code_discount_id = $discount_id;
        $this->short_code_cart = $cart;

        // Expand shortcodes.
        add_shortcode( 'selected_product_qty', array( $this, 'selected_product_qty' ) );

        add_shortcode( 'qty', array( $this, 'qty' ) );

        $sum = do_shortcode( $sum );

        remove_shortcode( 'selected_product_qty', array( $this, 'selected_product_qty' ) );
        remove_shortcode( 'qty', array( $this, 'qty' ) );

        // Remove whitespace from string.
        $sum = preg_replace( '/\s+/', '', $sum );

        // Remove locale from string.
        $sum = str_replace( $decimals, '.', $sum );

        // Trim invalid start/end characters.
        $sum = rtrim( ltrim( $sum, "\t\n\r\0\x0B+*/" ), "\t\n\r\0\x0B+-*/" );

        // Do the math.
        if($sum){
            try{
                $result = WC_Eval_Math::evaluate( $sum );
                return $result !== false ? $result : 0;
            }catch(Exception $e){
                return 0;
            }
        }
}

function qty($arg){
    $atts = shortcode_atts(
        array(
            'max_qty' => '',
            'max_product_qty'=> '',
            'excluded_products' => ''
        ),
        $arg,
        'qty'
    );
    $discount_id = $this->short_code_discount_id;
    $cart = $this->short_code_cart;

    $obj_for_qty = new pi_products_matching_rule($discount_id, $cart);
    $matched_product_qty = $obj_for_qty->getProductQty($atts['max_qty'], $atts['max_product_qty'], $atts['excluded_products']);
    return $matched_product_qty;
}

function selected_product_qty($arg){
        $atts = shortcode_atts(
            array(
                'max_qty' => '',
                'max_product_qty'=> '',
                'excluded_products' => ''
            ),
            $arg,
            'selected_product_qty'
        );
        $discount_id = $this->short_code_discount_id;
        $cart = $this->short_code_cart;

        $obj_for_qty = new pi_products_matching_rule($discount_id, $cart);
        $matched_product_qty = $obj_for_qty->getMatchedProductsQuantity($atts['max_qty'], $atts['max_product_qty'], $atts['excluded_products']);
        return $matched_product_qty;
}

    function matchedShippingMethods( $package ){
        $matched_methods = array();
        $args         = array(
            'post_type'      => 'pi_discount_rule',
            'posts_per_page' => - 1
        );
        $all_methods        = get_posts( $args );
        foreach ( $all_methods as $method ) {

            $start_time = get_post_meta( $method->ID, 'pi_discount_start_time', true);
            $end_time = get_post_meta( $method->ID, 'pi_discount_end_time', true);
            
            if(self::offerStarted($start_time) && !self::offerEnded( $end_time ) ){

                remove_filter('woocommerce_get_shop_coupon_data', array($this, 'addDiscountCouponData'),10,3);
                $is_match = $this->matchConditions( $method, $package );
                add_filter('woocommerce_get_shop_coupon_data', array($this, 'addDiscountCouponData'),10,3);

                if ( $is_match === true ) {
                    $matched_methods[] = $method;
                }
                
            }
        }

        return $matched_methods;
    }

    function matchedShippingMethodsOld( $package ){
        $matched_methods = array();
        $args         = array(
            'post_type'      => 'pi_discount_rule',
            'posts_per_page' => - 1
        );
        $all_methods        = get_posts( $args );
        foreach ( $all_methods as $method ) {

           
            $is_match = $this->matchConditions( $method, $package );
           

            if ( $is_match === true ) {
                $matched_methods[] = $method;
            }
        }

        return $matched_methods;
    }

    public function matchConditions( $method = array(), $package = array(), $coupon_template = false  ) {

        if ( empty( $method ) || !is_object($method)) {
            return false;
        }

        $method_id = $method->ID;

        $discount_type = get_post_meta( $method_id, 'pi_discount_type', true);

        if($coupon_template == true && $discount_type != 'future_coupon'){
            return false;
        }

        if($coupon_template == false && $discount_type == 'future_coupon'){
            return false;
        }

        if ( ! empty( $method ) ) {
            $method_eval_obj = new Pisol_cdrw_method_evaluation( $method, $package );
            $final_condition_match = $method_eval_obj->finalResult();

            if ( $final_condition_match ) {
                return true;
            }
        }

        return false;
    }

    static function offerStarted($start_time){

        if($start_time == ""){
            return true;
        }

        $start_timestamp = strtotime($start_time);
        $now = current_time( 'timestamp' );
        if($start_timestamp <= $now){
            return true;
        }

        return false;
    }

    static function offerEnded( $end_time ){

        if($end_time == ""){
            return false;
        }

        $end_timestamp = strtotime($end_time);
        $now = current_time( 'timestamp' );
        if($end_timestamp <= $now){
            return true;
        }

        return false;
    }

    function removeCouponOption($coupon_html, $coupon, $discount_amount_html){
        $code = $coupon->get_code();
        if(strpos($code,'pisol-cdrw-discount') !== false){
            return $discount_amount_html;
        }
    
        return $coupon_html;
    }

    function setLabel($label, $coupon) {
        $code = $coupon->get_code();
        if(strpos($code,'pisol-cdrw-discount') !== false){
            $title = $coupon->get_description();
            return !empty($title) ? $title : '';
        }
        return $label;
    }

    /**
     * this is must else checkout page will show warning message of
     * some thing wrong in your cart to to cart page to correct the mistake
     */
    static function removeNotices(){
        if(wc_notice_count('error') > 0){
            self::removeCouponRelatedError();
        }
    }

    static function removeCouponRelatedError(){
        $all_notices  = WC()->session->get( 'wc_notices', array() );
        if(isset($all_notices['error'])){
            foreach($all_notices['error'] as $key => $value){
                if(strpos($value['notice'], 'pisol-cdrw-discount') !== false){
                    unset($all_notices['error'][$key]);
                }
            }
        }
        WC()->session->set( 'wc_notices', $all_notices );
    }

    static function multiCurrencyCompatible($discount_amount){
        /**
         * this reverse the coupon amount to base currency
         * https://wordpress.org/plugins/woo-multi-currency/
         */
        if(function_exists('wmc_revert_price')){
            $discount_amount =  wmc_revert_price($discount_amount);
        }

        return apply_filters('pisol_cdrw_coupon_discount_amt', $discount_amount);
    }

    function addFutureCoupon($order_id){
        $cart = WC()->cart->get_cart();
        $discounts_rules = $this->matchedDiscountMethodsForCouponTemplate( $cart );
        $templates = pisol_cdrw_future_coupon_manager::getTemplatesFromRules($discounts_rules);
        foreach($templates as $template_id){
            pisol_cdrw_future_coupon_manager::createCoupon($template_id, $order_id);
        }
        return;
    }

    function matchedDiscountMethodsForCouponTemplate( $package ){
        $matched_methods = array();
        $args         = array(
            'post_type'      => 'pi_discount_rule',
            'posts_per_page' => - 1
        );
        $all_methods        = get_posts( $args );
        foreach ( $all_methods as $method ) {

            $is_match = $this->matchConditions( $method, $package, true );
            if ( $is_match === true ) {
                $matched_methods[] = $method;
            }
        }

        return apply_filters('pi_cdrw_filter_discounts', $matched_methods);
    }
}