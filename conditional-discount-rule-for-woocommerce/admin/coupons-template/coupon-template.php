<?php

class pisol_cdrw_coupon_template{
    private $name = '';
    private $code = '';
    private $discount_type = 'fixed_cart'; // percent || fixed_cart || fixed_product
    private $coupon_amount = 0;
    private $free_shipping = ''; //yes or blank
    private $expiry_date = '';
    private $expiry_after_days = '';
    private $minimum_amount = '';
    private $maximum_amount = '';
    private $individual_use = '';
    private $exclude_sale_items = '';
    private $product_ids = [];
    private $exclude_product_ids = [];
    private $product_categories = [];
    private $exclude_product_categories = [];
    private $restrict_to_purchaser_email = 'yes';
    private $usage_limit = '';
    private $usage_limit_per_user = '';
    private $limit_usage_to_x_items = '';

    static function getAllTemplates(){
        $coupons_templates = get_posts(array(
            'post_type'=>'pi_coupon_template',
            'numberposts'      => -1
        ));
        return $coupons_templates;
    }
}