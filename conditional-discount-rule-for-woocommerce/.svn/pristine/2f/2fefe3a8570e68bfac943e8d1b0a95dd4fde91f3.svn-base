<?php

class pisol_cdrw_showing_coupons{
    function __construct(){
        add_action('woocommerce_email_after_order_table', [__CLASS__, 'showCouponInEmail'], 10, 1);
        add_action('woocommerce_order_details_after_order_table_items', [__CLASS__, 'showCouponInOrderCompletionPage'],10, 1);

        add_action( 'add_meta_boxes', [__CLASS__,'showCouponInOrderDetailPageAdmin'] );
    }

    static function showCouponInEmail($order){
        $order_id = version_compare( WC_VERSION, '3.0.0', '<' ) ? $order->id : $order->get_id();

        $coupons = get_post_meta($order_id, '_linked_coupon');

        $order_status = $order->get_status();

        $status_to_activate_coupon = apply_filters('pisol_cdrw_order_status_to_activate_coupon', get_option('pi_cdrw_order_status_to_activate_coupon', array('processing','completed')), $order_id);

        if(!in_array($order_status, $status_to_activate_coupon)) return;

        if(empty($coupons) || !is_array($coupons)) return;
        $html = '';
        foreach($coupons as $coupon){
            $status = get_post_status($coupon);
            $html .= self::template($coupon);
        }

        if(!empty($html)) echo '<h2>'.__('You won the lucky coupon', 'conditional-discount-rule-woocommerce').'</h2>';

        echo $html;
    }

    static function showCouponInOrderCompletionPage($order){
        $order_id = version_compare( WC_VERSION, '3.0.0', '<' ) ? $order->id : $order->get_id();

        $coupons = get_post_meta($order_id, '_linked_coupon');

        $order_status = $order->get_status();

        $status_to_activate_coupon = apply_filters('pisol_cdrw_order_status_to_activate_coupon', get_option('pi_cdrw_order_status_to_activate_coupon', array('processing','completed')), $order_id);

        if(!in_array($order_status, $status_to_activate_coupon)) return;

        if(empty($coupons) || !is_array($coupons)) return;
        $html = '';
        foreach($coupons as $coupon){
            $status = get_post_status($coupon);
            $html .= self::template($coupon);
        }

        if(!empty($html)) echo '<h2>'.__('You won the lucky coupon', 'conditional-discount-rule-woocommerce').'</h2>';

        echo $html;
    }

    static function showCouponInOrderDetailPageAdmin(){
        add_meta_box(
            'pisol_cdrw_given_coupons',
            __( 'Issued coupons','conditional-discount-rule-woocommerce'),
            array(__CLASS__,'showCouponInSideOrder'),
            'shop_order',
            'side'
          );
    }

    static function showCouponInSideOrder($order){
        $order_id = $order->ID;

        $coupons = get_post_meta($order_id, '_linked_coupon');
        
        if(empty($coupons) || !is_array($coupons)) {
            echo '<strong>No coupons issued on the basis of this order</strong>';
            return;
        }

        $html = '<strong>Following coupons are created based on this order</strong><br><br>';

        foreach($coupons as $coupon){
            $status = get_post_status($coupon);

            $coupon_template = self::template($coupon);

            if(empty($coupon_template)) continue;

            $html .= '<strong>Status: '.($status == 'publish' ? 'Active' : 'Inactive').'</strong>';
            $html .= '<a href="'.admin_url("/post.php?post={$coupon}&action=edit").'" target="_blank">'.$coupon_template.'</a>';
           
        }
        echo $html;
    }

    static function template($coupon_id, $return = true){
        $title = get_post_meta($coupon_id, 'pi_title', true);
        $desc = get_post_meta($coupon_id, 'pi_desc', true);

        $code = get_the_title($coupon_id);

        if(empty($code)) return;

        $html = '<div class="pi-template-boundary" style="border:6px red dashed; border-radius:10px; padding:20px 15px; text-align:center; margin-bottom:20px;">';
        $html .= '<h2 style="text-align:center; margin-top:0px;">'.$title.'</h2>';
        $html .= '<strong style="text-align:center;">'.$code.'</strong>';
        $html .= '<p style="text-align:center; margin-bottom:0px;">'.$desc.'</p>';
        $html .='</div>';
        return $html;
    }

}
new pisol_cdrw_showing_coupons();