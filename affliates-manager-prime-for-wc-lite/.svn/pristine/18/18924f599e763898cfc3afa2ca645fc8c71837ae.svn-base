<?php
/**
 * file included for Visits  and conversion graph
 *
 * @since    1.0.0
 */

if(isset($_POST['ciwcamp_chart_type']) && !empty($_POST['ciwcamp_chart_type']))
{ 
    global $wpdb;
    $ciwcamp_visits_query = "SELECT MONTHNAME(created_date) as month, COUNT(visits_id) as monthly_visits FROM " . $wpdb->prefix . "ciwcamp_visits GROUP BY month(created_date)";
    $ciwcamp_visits_data = $wpdb->get_results( $wpdb->prepare( $ciwcamp_visits_query ) ); 

    $ciwcamp_visits_array = array(0,0,0,0,0,0,0,0,0,0,0,0);
    if(isset($ciwcamp_visits_data) && !empty($ciwcamp_visits_data) && is_array($ciwcamp_visits_data))
    {
        $ciwcamp_total_visits = count($ciwcamp_visits_data);

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

    }
    $ciwcamp_conversion_query = "SELECT MONTHNAME(created_date) as month, COUNT(visits_id) as monthly_conversion FROM " . $wpdb->prefix . "ciwcamp_visits WHERE status = %s GROUP BY month(created_date) ";
    $ciwcamp_conversion_data = $wpdb->get_results( $wpdb->prepare( $ciwcamp_conversion_query, "Converted" ) ); 
    $ciwcamp_conversion_array = array(0,0,0,0,0,0,0,0,0,0,0,0);
    if(isset($ciwcamp_conversion_data) && !empty($ciwcamp_conversion_data) && is_array($ciwcamp_conversion_data))
    {
        $ciwcamp_total_conversion = count($ciwcamp_conversion_data);

        for($ciwcamp_data=--$ciwcamp_total_conversion; $ciwcamp_data>=0; $ciwcamp_data--)
        {
            if($ciwcamp_conversion_data[$ciwcamp_data]->month=="January")
            {
                $ciwcamp_conversion_array[0] = (int)$ciwcamp_conversion_data[$ciwcamp_data]->monthly_conversion;
            }
            else if($ciwcamp_conversion_data[$ciwcamp_data]->month=="February")
            {
                $ciwcamp_conversion_array[1] = (int)$ciwcamp_conversion_data[$ciwcamp_data]->monthly_conversion;
            }
            else if($ciwcamp_conversion_data[$ciwcamp_data]->month=="March")
            {
                $ciwcamp_conversion_array[2] = (int)$ciwcamp_conversion_data[$ciwcamp_data]->monthly_conversion;
            }
            else if($ciwcamp_conversion_data[$ciwcamp_data]->month=="April")
            {
                $ciwcamp_conversion_array[3] = (int)$ciwcamp_conversion_data[$ciwcamp_data]->monthly_conversion;
            }
            else if($ciwcamp_conversion_data[$ciwcamp_data]->month=="May")
            {
                $ciwcamp_conversion_array[4] = (int)$ciwcamp_conversion_data[$ciwcamp_data]->monthly_conversion;
            }
            else if($ciwcamp_conversion_data[$ciwcamp_data]->month=="June")
            {
                $ciwcamp_conversion_array[5] = (int)$ciwcamp_conversion_data[$ciwcamp_data]->monthly_conversion;
            }
            else if($ciwcamp_conversion_data[$ciwcamp_data]->month=="July")
            {
                $ciwcamp_conversion_array[6] = (int)$ciwcamp_conversion_data[$ciwcamp_data]->monthly_conversion;
            }
            else if($ciwcamp_conversion_data[$ciwcamp_data]->month=="August")
            {
                $ciwcamp_conversion_array[7] = (int)$ciwcamp_conversion_data[$ciwcamp_data]->monthly_conversion;
            }
            else if($ciwcamp_conversion_data[$ciwcamp_data]->month=="September")
            {
                $ciwcamp_conversion_array[8] = (int)$ciwcamp_conversion_data[$ciwcamp_data]->monthly_conversion;
            }
            else if($ciwcamp_conversion_data[$ciwcamp_data]->month=="October")
            {
                $ciwcamp_conversion_array[9] = (int)$ciwcamp_conversion_data[$ciwcamp_data]->monthly_conversion;
            }
            else if($ciwcamp_conversion_data[$ciwcamp_data]->month=="November")
            {
                $ciwcamp_conversion_array[10] = (int)$ciwcamp_conversion_data[$ciwcamp_data]->monthly_conversion;
            }
            else if($ciwcamp_conversion_data[$ciwcamp_data]->month=="December")
            {
                $ciwcamp_conversion_array[11] = (int)$ciwcamp_conversion_data[$ciwcamp_data]->monthly_conversion;
            }
        }
    }
}
echo json_encode(array($ciwcamp_visits_array, $ciwcamp_conversion_array));

wp_die();

?>