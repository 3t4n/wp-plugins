<?php 

class FreightPop_Discount_Rules{
    public function get_discount_rules(){
        global $wpdb;
        $discount = $wpdb->get_results("SELECT * FROM `discounts`");
        return $discount;
    }
}