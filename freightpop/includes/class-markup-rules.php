<?php

class FreightPop_Markup_Rules{
    public function get_markup_rules(){
        global $wpdb;
        $markups = $wpdb->get_results("SELECT * FROM `markups`");
        return $markups;
    }
}