<?php

class pisol_cdrw_pro_rules{
    function __construct($slug){
        $this->slug = $slug;
         /* this adds the condition in set of rules dropdown */
        add_filter("pi_".$this->slug."_condition", array($this, 'addRule'));
    }

    function addRule($rules){
        $rules['state'] = array(
            'name'=>__('State (Available in PRO Version)','conditional-discount-rule-woocommerce'),
            'group'=>'location_related',
            'condition'=>'state',
            'pro'=>true
        );
        $rules['postcode'] = array(
            'name'=>__('Postcode (Available in PRO Version)','conditional-discount-rule-woocommerce'),
            'group'=>'location_related',
            'condition'=>'postcode',
            'pro'=>true
        );
        $rules['variable_product'] = array(
            'name'=>__('Cart has variable product (Available in PRO Version)','conditional-discount-rule-woocommerce'),
            'group'=>'product_related',
            'condition'=>'variable_product',
            'pro'=>true
        );
        $rules['product_tag'] = array(
            'name'=>__('Product Tags (Available in PRO Version)','conditional-discount-rule-woocommerce'),
            'group'=>'product_related',
            'condition'=>'product_tag',
            'pro'=>true
        );
        $rules['user_role'] = array(
            'name'=>__('User role (Available in PRO Version)','conditional-discount-rule-woocommerce'),
            'group'=>'user_related',
            'condition'=>'user_role',
            'pro'=>true
        );

        $rules['zones'] = array(
            'name'=>__('Zone (Available in PRO Version)','conditional-discount-rule-woocommerce'),
            'group'=>'location_related',
            'condition'=>'zones',
            'pro'=>true
        );

        $rules['payment_method'] = array(
            'name'=>__('Payment Method (Available in PRO Version)','conditional-discount-rule-woocommerce'),
            'group'=>'cart_related',
            'condition'=>'payment_method',
            'pro'=>true
        );

        $rules['day_of_week'] = array(
            'name'=>__('Days of the week (Available in PRO Version)','conditional-discount-rule-woocommerce'),
            'group'=>'cart_related',
            'condition'=>'day_of_week',
            'pro'=>true
        );
        
        $rules['local_pickup'] = array(
            'name'=>__('Local pickup discount (Available in PRO Version)','conditional-discount-rule-woocommerce'),
            'group'=>'delivery_method',
            'condition'=>'local_pickup',
            'pro'=>true
        );

        $rules['shipping_method'] = array(
            'name'=>__('Shipping method (Available in PRO Version)','conditional-discount-rule-woocommerce'),
            'group'=>'delivery_method',
            'condition'=>'shipping_method',
            'pro'=>true
        );

        $rules['shipping_method'] = array(
            'name'=>__('Quantity of product from category (Available in PRO Version)','conditional-discount-rule-woocommerce'),
            'group'=>'product_related',
            'condition'=>'category_quantity',
            'pro'=>true
        );

        $rules['first_order'] = array(
            'name'=>__('First order (Available in PRO Version)','conditional-discount-rule-woocommerce'),
            'group'=>'purchase_history',
            'condition'=>'first_order',
            'pro'=>true
        );

        $rules['last_order'] = array(
            'name'=>__('Last Order Total (Available in PRO Version)','conditional-discount-rule-woocommerce'),
            'group'=>'purchase_history',
            'condition'=>'last_order',
            'pro'=>true
        );

        $rules['number_of_order'] = array(
            'name'=>__('Number of Orders during a period (Available in PRO Version)','conditional-discount-rule-woocommerce'),
            'group'=>'purchase_history',
            'condition'=>'first_order',
            'pro'=>true
        );

        $rules['total_of_orders'] = array(
            'name'=>__('Total amount spend during a period (Available in PRO Version)','conditional-discount-rule-woocommerce'),
            'group'=>'purchase_history',
            'condition'=>'last_order',
            'pro'=>true
        );

        $rules['reordered_product'] = array(
            'name'=>__('Purchasing the same product again (Available in PRO Version)','conditional-discount-rule-woocommerce'),
            'group'=>'purchase_history',
            'condition'=>'reordered_product',
            'pro'=>true
        );
        
        return $rules;
    }
}

new pisol_cdrw_pro_rules(PI_CDRW_SELECTION_RULE_SLUG);