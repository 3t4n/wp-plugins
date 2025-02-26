<?php

/**
 * this file included for sales and commission graph
 *
 * @since    1.0.0
 */


if(isset($_POST['ciwcamp_chart_type']) && !empty($_POST['ciwcamp_chart_type']))
{
    global $wpdb;
    $ciwcamp_monthly_commission_query = "SELECT MONTHNAME(created_date) as month, SUM(product_price) as total_product_price, SUM(commission) as total_commission FROM " . $wpdb->prefix . "ciwcamp_sales WHERE product_id!=%s GROUP BY month(created_date)";
    $ciwcamp_monthly_commission_data = $wpdb->get_results( $wpdb->prepare( $ciwcamp_monthly_commission_query, "" ) ); 
    
    $ciwcamp_monthly_commission = count($ciwcamp_monthly_commission_data);
    $ciwcamp_sales_price_array = array(0,0,0,0,0,0,0,0,0,0,0,0);
    $ciwcamp_affiliate_commission_array = array(0,0,0,0,0,0,0,0,0,0,0,0);

    for($ciwcamp_data=--$ciwcamp_monthly_commission; $ciwcamp_data>=0; $ciwcamp_data--)
    {
        if($ciwcamp_monthly_commission_data[$ciwcamp_data]->month=="January")
        {
            $ciwcamp_sales_price_array[0] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_product_price;
            $ciwcamp_affiliate_commission_array[0] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_commission;
        }
        else if($ciwcamp_monthly_commission_data[$ciwcamp_data]->month=="February")
        {
            $ciwcamp_sales_price_array[1] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_product_price;
            $ciwcamp_affiliate_commission_array[1] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_commission;
        }
        else if($ciwcamp_monthly_commission_data[$ciwcamp_data]->month=="March")
        {
            $ciwcamp_sales_price_array[2] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_product_price;
            $ciwcamp_affiliate_commission_array[2] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_commission;
        }
        else if($ciwcamp_monthly_commission_data[$ciwcamp_data]->month=="April")
        {
            $ciwcamp_sales_price_array[3] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_product_price;
            $ciwcamp_affiliate_commission_array[3] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_commission;
        }
        else if($ciwcamp_monthly_commission_data[$ciwcamp_data]->month=="May")
        {
            $ciwcamp_sales_price_array[4] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_product_price;
            $ciwcamp_affiliate_commission_array[4] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_commission;
        }
        else if($ciwcamp_monthly_commission_data[$ciwcamp_data]->month=="June")
        {
            $ciwcamp_sales_price_array[5] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_product_price;
            $ciwcamp_affiliate_commission_array[5] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_commission;
        }
        else if($ciwcamp_monthly_commission_data[$ciwcamp_data]->month=="July")
        {
            $ciwcamp_sales_price_array[6] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_product_price;
            $ciwcamp_affiliate_commission_array[6] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_commission;
        }
        else if($ciwcamp_monthly_commission_data[$ciwcamp_data]->month=="August")
        {
            $ciwcamp_sales_price_array[7] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_product_price;
            $ciwcamp_affiliate_commission_array[7] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_commission;
        }
        else if($ciwcamp_monthly_commission_data[$ciwcamp_data]->month=="September")
        {
            $ciwcamp_sales_price_array[8] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_product_price;
            $ciwcamp_affiliate_commission_array[8] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_commission;
        }
        else if($ciwcamp_monthly_commission_data[$ciwcamp_data]->month=="October")
        {
            $ciwcamp_sales_price_array[9] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_product_price;
            $ciwcamp_affiliate_commission_array[9] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_commission;
        }
        else if($ciwcamp_monthly_commission_data[$ciwcamp_data]->month=="November")
        {
            $ciwcamp_sales_price_array[10] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_product_price;
            $ciwcamp_affiliate_commission_array[10] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_commission;
        }
        else if($ciwcamp_monthly_commission_data[$ciwcamp_data]->month=="December")
        {
            $ciwcamp_sales_price_array[11] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_product_price;
            $ciwcamp_affiliate_commission_array[11] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_commission;
        }
    }
    echo json_encode(array($ciwcamp_sales_price_array, $ciwcamp_affiliate_commission_array));
    wp_die();
}

?>