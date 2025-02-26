<?php 

/**
 * this file included to show affiliate earnings graph
 *
 * @since    1.0.0
 */

if(isset($_POST['ciwcamp_type']) && !empty($_POST['ciwcamp_type']))
{
    global $wpdb;

    $ciwcamp_affiliate_id = get_current_user_id();
        
    $ciwcamp_monthly_commission_query = "SELECT MONTHNAME(created_date) as month, SUM(commission) as total_commission FROM ". $wpdb->prefix . "ciwcamp_sales WHERE affiliate_id = %s GROUP BY month(created_date)";
    $ciwcamp_monthly_commission_data = $wpdb->get_results( $wpdb->prepare( $ciwcamp_monthly_commission_query, $ciwcamp_affiliate_id ) ); 

    $ciwcamp_monthly_commission = count($ciwcamp_monthly_commission_data);

    $ciwcamp_affiliate_commission_array = array(0,0,0,0,0,0,0,0,0,0,0,0);

    for($ciwcamp_data=--$ciwcamp_monthly_commission; $ciwcamp_data>=0; $ciwcamp_data--)
    {
        if($ciwcamp_monthly_commission_data[$ciwcamp_data]->month=="January")
        {
            $ciwcamp_affiliate_commission_array[0] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_commission;
        }
        else if($ciwcamp_monthly_commission_data[$ciwcamp_data]->month=="February")
        {
            $ciwcamp_affiliate_commission_array[1] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_commission;
        }
        else if($ciwcamp_monthly_commission_data[$ciwcamp_data]->month=="March")
        {
            $ciwcamp_affiliate_commission_array[2] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_commission;
        }
        else if($ciwcamp_monthly_commission_data[$ciwcamp_data]->month=="April")
        {
            $ciwcamp_affiliate_commission_array[3] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_commission;
        }
        else if($ciwcamp_monthly_commission_data[$ciwcamp_data]->month=="May")
        {
            $ciwcamp_affiliate_commission_array[4] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_commission;
        }
        else if($ciwcamp_monthly_commission_data[$ciwcamp_data]->month=="June")
        {
            $ciwcamp_affiliate_commission_array[5] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_commission;
        }
        else if($ciwcamp_monthly_commission_data[$ciwcamp_data]->month=="July")
        {
            $ciwcamp_affiliate_commission_array[6] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_commission;
        }
        else if($ciwcamp_monthly_commission_data[$ciwcamp_data]->month=="August")
        {
            $ciwcamp_affiliate_commission_array[7] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_commission;
        }
        else if($ciwcamp_monthly_commission_data[$ciwcamp_data]->month=="September")
        {
            $ciwcamp_affiliate_commission_array[8] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_commission;
        }
        else if($ciwcamp_monthly_commission_data[$ciwcamp_data]->month=="October")
        {
            $ciwcamp_affiliate_commission_array[9] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_commission;
        }
        else if($ciwcamp_monthly_commission_data[$ciwcamp_data]->month=="November")
        {
            $ciwcamp_affiliate_commission_array[10] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_commission;
        }
        else if($ciwcamp_monthly_commission_data[$ciwcamp_data]->month=="December")
        {
            $ciwcamp_affiliate_commission_array[11] = (int)$ciwcamp_monthly_commission_data[$ciwcamp_data]->total_commission;
        }
    }
    echo json_encode($ciwcamp_affiliate_commission_array);
    wp_die();
}
?>