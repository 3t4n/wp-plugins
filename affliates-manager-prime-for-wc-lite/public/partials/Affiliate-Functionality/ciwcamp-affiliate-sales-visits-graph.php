<?php 

/**
 * this file included for affiliate sales and visits graph
 *
 * @since    1.0.0
 */

if(isset($_POST['ciwcamp_sales_data_type']) && !empty($_POST['ciwcamp_sales_data_type']))
{ 
    global $wpdb;

    $ciwcamp_table_name = $wpdb->prefix . "ciwcamp_visits";

    $ciwcamp_affiliate_id = get_current_user_id();
    $ciwcamp_visits_query = "SELECT MONTHNAME(created_date) as month, COUNT(visits_id) as monthly_visits FROM ".$ciwcamp_table_name. " WHERE affiliate_id = %s GROUP BY month(created_date)";
    $ciwcamp_visits_data = $wpdb->get_results( $wpdb->prepare( $ciwcamp_visits_query, $ciwcamp_affiliate_id ) ); 

    $ciwcamp_sales_query = "SELECT MONTHNAME(created_date) as month, COUNT(visits_id) as monthly_sales FROM ".$ciwcamp_table_name." WHERE status = 'Converted' AND affiliate_id = %s  GROUP BY month(created_date) ";
    $ciwcamp_sales_data = $wpdb->get_results( $wpdb->prepare( $ciwcamp_sales_query, $ciwcamp_affiliate_id ) ); 

    $ciwcamp_total_visits = count($ciwcamp_visits_data);
    $ciwcamp_visits_array = array(0,0,0,0,0,0,0,0,0,0,0,0);
    for($ciwcamp_data=--$ciwcamp_total_visits; $ciwcamp_data>=0; $ciwcamp_data--)
    {
        if($ciwcamp_visits_data[$ciwcamp_data]->month=="January")
        {
            $ciwcamp_visits_array[0] = (int)$ciwcamp_visits_data[$ciwcamp_data]->monthly_visits;
        }
        else if($ciwcamp_visits_data[$ciwcamp_data]->month=="February")
        {
            $ciwcamp_visits_array[1] = (int)$ciwcamp_visits_data[$ciwcamp_data]->monthly_visits;
        }
        else if($ciwcamp_visits_data[$ciwcamp_data]->month=="March")
        {
            $ciwcamp_visits_array[2] = (int)$ciwcamp_visits_data[$ciwcamp_data]->monthly_visits;
        }
        else if($ciwcamp_visits_data[$ciwcamp_data]->month=="April")
        {
            $ciwcamp_visits_array[3] = (int)$ciwcamp_visits_data[$ciwcamp_data]->monthly_visits;
        }
        else if($ciwcamp_visits_data[$ciwcamp_data]->month=="May")
        {
            $ciwcamp_visits_array[4] = (int)$ciwcamp_visits_data[$ciwcamp_data]->monthly_visits;
        }
        else if($ciwcamp_visits_data[$ciwcamp_data]->month=="June")
        {
            $ciwcamp_visits_array[5] = (int)$ciwcamp_visits_data[$ciwcamp_data]->monthly_visits;
        }
        else if($ciwcamp_visits_data[$ciwcamp_data]->month=="July")
        {
            $ciwcamp_visits_array[6] = (int)$ciwcamp_visits_data[$ciwcamp_data]->monthly_visits;
        }
        else if($ciwcamp_visits_data[$ciwcamp_data]->month=="August")
        {
            $ciwcamp_visits_array[7] = (int)$ciwcamp_visits_data[$ciwcamp_data]->monthly_visits;
        }
        else if($ciwcamp_visits_data[$ciwcamp_data]->month=="September")
        {
            $ciwcamp_visits_array[8] = (int)$ciwcamp_visits_data[$ciwcamp_data]->monthly_visits;
        }
        else if($ciwcamp_visits_data[$ciwcamp_data]->month=="October")
        {
            $ciwcamp_visits_array[9] = (int)$ciwcamp_visits_data[$ciwcamp_data]->monthly_visits;
        }
        else if($ciwcamp_visits_data[$ciwcamp_data]->month=="November")
        {
            $ciwcamp_visits_array[10] = (int)$ciwcamp_visits_data[$ciwcamp_data]->monthly_visits;
        }
        else if($ciwcamp_visits_data[$ciwcamp_data]->month=="December")
        {
            $ciwcamp_visits_array[11] = (int)$ciwcamp_visits_data[$ciwcamp_data]->monthly_visits;
        }			
    }			

    $ciwcamp_total_sales = count($ciwcamp_sales_data);
    $ciwcamp_sales_array = array(0,0,0,0,0,0,0,0,0,0,0,0);

    for($ciwcamp_data=--$ciwcamp_total_sales; $ciwcamp_data>=0; $ciwcamp_data--)
    {
        if($ciwcamp_sales_data[$ciwcamp_data]->month=="January")
        {
            $ciwcamp_sales_array[0] = (int)$ciwcamp_sales_data[$ciwcamp_data]->monthly_sales;
        }
        else if($ciwcamp_sales_data[$ciwcamp_data]->month=="February")
        {
            $ciwcamp_sales_array[1] = (int)$ciwcamp_sales_data[$ciwcamp_data]->monthly_sales;
        }
        else if($ciwcamp_sales_data[$ciwcamp_data]->month=="March")
        {
            $ciwcamp_sales_array[2] = (int)$ciwcamp_sales_data[$ciwcamp_data]->monthly_sales;
        }
        else if($ciwcamp_sales_data[$ciwcamp_data]->month=="April")
        {
            $ciwcamp_sales_array[3] = (int)$ciwcamp_sales_data[$ciwcamp_data]->monthly_sales;
        }
        else if($ciwcamp_sales_data[$ciwcamp_data]->month=="May")
        {
            $ciwcamp_sales_array[4] = (int)$ciwcamp_sales_data[$ciwcamp_data]->monthly_sales;
        }
        else if($ciwcamp_sales_data[$ciwcamp_data]->month=="June")
        {
            $ciwcamp_sales_array[5] = (int)$ciwcamp_sales_data[$ciwcamp_data]->monthly_sales;
        }
        else if($ciwcamp_sales_data[$ciwcamp_data]->month=="July")
        {
            $ciwcamp_sales_array[6] = (int)$ciwcamp_sales_data[$ciwcamp_data]->monthly_sales;
        }
        else if($ciwcamp_sales_data[$ciwcamp_data]->month=="August")
        {
            $ciwcamp_sales_array[7] = (int)$ciwcamp_sales_data[$ciwcamp_data]->monthly_sales;
        }
        else if($ciwcamp_sales_data[$ciwcamp_data]->month=="September")
        {
            $ciwcamp_sales_array[8] = (int)$ciwcamp_sales_data[$ciwcamp_data]->monthly_sales;
        }
        else if($ciwcamp_sales_data[$ciwcamp_data]->month=="October")
        {
            $ciwcamp_sales_array[9] = (int)$ciwcamp_sales_data[$ciwcamp_data]->monthly_sales;
        }
        else if($ciwcamp_sales_data[$ciwcamp_data]->month=="November")
        {
            $ciwcamp_sales_array[10] = (int)$ciwcamp_sales_data[$ciwcamp_data]->monthly_sales;
        }
        else if($ciwcamp_sales_data[$ciwcamp_data]->month=="December")
        {
            $ciwcamp_sales_array[11] = (int)$ciwcamp_sales_data[$ciwcamp_data]->monthly_sales;
        }
    }
    echo json_encode(array($ciwcamp_visits_array, $ciwcamp_sales_array));
    wp_die();
}
?>