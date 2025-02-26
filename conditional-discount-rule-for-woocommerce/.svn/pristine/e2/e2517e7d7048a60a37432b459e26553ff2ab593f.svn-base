<?php
class pisol_cdrw_future_coupon_manager{

    function __construct(){
        add_action( 'woocommerce_order_status_changed', [__CLASS__, 'statusChange'],10, 3 );
    }

    static function statusChange($order_id, $old_status, $new_status){
        $status_to_activate_coupon = apply_filters('pisol_cdrw_order_status_to_activate_coupon', get_option('pi_cdrw_order_status_to_activate_coupon', array('processing','completed')), $order_id);

        $linked_coupons = get_post_meta($order_id, '_linked_coupon');

        if(empty($linked_coupons)) return;

        if(in_array($new_status, $status_to_activate_coupon)){
            $status = 'publish';
        }else{
            $status = 'draft';
        }

        foreach($linked_coupons as $coupon_id){
            $update_post = array(
				'ID' 			=> $coupon_id,
				'post_status'	=>	$status,
				'post_type'	=>	'shop_coupon' 
            );
			wp_update_post($update_post);
        }
    }

    static function getTemplatesFromRules($discounts_rules){
        $templates = [];
        foreach($discounts_rules as $rule){
            $id = $rule->ID;
            $template_id = get_post_meta($id, 'pi_coupon_template', true);

            if(empty($template_id)) continue;

            $template_status =  get_post_status( $template_id );
            if($template_status != 'publish') continue;

            $templates[] = $template_id;
        }
        return $templates;
    }

    static function getTemplateDetails($template_id, $order_id){
        $order = wc_get_order($order_id);
        if(!is_object($order) ) return false;

        $data['discount_type']                 = get_post_meta( $template_id, 'discount_type', true );

        $data['coupon_amount']                 = get_post_meta( $template_id, 'coupon_amount', true );

        $data['free_shipping']                 = get_post_meta( $template_id, 'free_shipping', true );

        $data['date_expires']                 = get_post_meta( $template_id, 'expiry_date', true );

        $data['expiry_after_days']                 = get_post_meta( $template_id, 'expiry_after_days', true );

        if(!empty($data['expiry_after_days'])){
            $expiry_date = date('Y-m-d', strtotime(current_time('Y-m-d')." + ".$data['expiry_after_days']." days"));
            $data['date_expires'] = $expiry_date;
        }

        $data['minimum_amount']                 = get_post_meta( $template_id, 'minimum_amount', true );

        $data['maximum_amount']                 = get_post_meta( $template_id, 'maximum_amount', true );

        $data['individual_use']                 = get_post_meta( $template_id, 'individual_use', true );

        $data['exclude_sale_items']  =  get_post_meta( $template_id, 'exclude_sale_items', true ); 

        $data['product_ids'] = get_post_meta( $template_id, 'product_ids', true );

        if(is_array($data['product_ids'])){
            $data['product_ids'] = implode(',', $data['product_ids']);
        }

        $data['exclude_product_ids'] = get_post_meta( $template_id, 'exclude_product_ids', true );

        if(is_array($data['exclude_product_ids'])){
            $data['exclude_product_ids'] = implode(',', $data['exclude_product_ids']);
        }

        $data['product_categories'] = get_post_meta( $template_id, 'product_categories', true );

        $data['exclude_product_categories'] = get_post_meta( $template_id, 'exclude_product_categories', true );


        $data['restrict_to_purchaser_email'] = get_post_meta( $template_id, 'restrict_to_purchaser_email', true );

        if($data['restrict_to_purchaser_email'] == 'yes'){
            $data['customer_email'] = $order->get_billing_email();
        }

        $data['usage_limit'] = get_post_meta( $template_id, 'usage_limit', true );

        $data['usage_limit_per_user'] = get_post_meta( $template_id, 'usage_limit_per_user', true );

        $data['limit_usage_to_x_items'] = get_post_meta( $template_id, 'limit_usage_to_x_items', true );

        $data['linked_order_id'] = $order_id;
        $data['pi_title'] = get_post_meta( $template_id, 'pi_title', true );
        $data['pi_desc'] = get_post_meta( $template_id, 'pi_desc', true );

        return $data;
        
    }

    static function createCoupon($template_id, $order_id){
        $data = self::getTemplateDetails($template_id, $order_id);
        if($data === false) return false;

        $coupon_code = self::uniqueCouponCode($template_id, $order_id);
        $coupon = array(
            'post_title' => $coupon_code,
            'post_content' => '',
            'post_status' => 'draft',
            'post_author' => 1,
            'post_type'		=> 'shop_coupon',
            'meta_input' => $data
        );
                            
        $new_coupon_id = wp_insert_post( $coupon );
        add_post_meta($order_id, '_linked_coupon', $new_coupon_id);
        return $new_coupon_id;
    }

    static function uniqueCouponCode($template_id, $order_id){
        $characters = md5($template_id.$order_id);
        $char_length = "7";
        $random_string = substr( str_shuffle( $characters ),  0, $char_length );
        return $random_string;
    }
}
new pisol_cdrw_future_coupon_manager();