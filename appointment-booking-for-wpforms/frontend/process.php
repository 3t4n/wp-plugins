<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
class Booknow_Process {
    function __construct(){
        add_filter( 'booknow_exclude_available', array($this,'booknow_check_available'),10,4 );
        add_filter( 'booknow_exclude_available', array($this,'booknow_exclude_before_current_time'),10,2 );
        add_filter( 'booknow_time_format', array($this,'booknow_time_format'),10 );
        add_filter( 'booknow_holidays', array($this,'booknow_holidays'),10 );
    }
    //remove date holidays
    function booknow_holidays($lists){
        $time_settings = get_option("booknow_settings");
        if( isset($time_settings["holidays"]) && is_array($time_settings["holidays"]) ){
            $lists = array_merge($lists,$time_settings["holidays"]);
        }
        return $lists;
    }
    function booknow_time_format($time_format){
        $time_format = "h:i A";
        return $time_format;
    }
    //Remove before time
    function booknow_exclude_before_current_time($lists,$initial_date){
        $time_format = apply_filters("booknow_time_format","h:i");
        $settings = get_option("booknow_settings");
        $time_settings = $settings["working_hours"];
        $current_time_date = current_time("Y-m-d");
        $current_time_date_str = strtotime($current_time_date);
        $current_time = current_time($time_format);
        //before end booking
        $end_book_time = $settings["before_booking"] * 60; //hours
        $current_time_date_strtotime_full = strtotime($current_time) + $end_book_time;  
        $day_of_the_week = date('w', $current_time_date_str);
        $starttimes = $time_settings[$day_of_the_week]["start"]; 
        $endtimes = $time_settings[$day_of_the_week]["end"];
        $duration = $settings["time_slot"];  // split by 30 mins
        $add_mins  = $duration * 60;
        foreach( $starttimes as $starttime_key => $starttime ) {
            if($starttime == "off"){
                continue;
            }
            $start_time    = strtotime ($starttime);
            $end_time      = strtotime ($endtimes[$starttime_key]);
            while ($start_time <= $current_time_date_strtotime_full) 
            {
               $time = date($time_format, $start_time);
               $lists[$current_time_date][] = $time;
               $start_time += $add_mins; 
            }
        }
        return $lists;
    }
    //remove time Appointments booked 
    function booknow_check_available($lists,$initial_date,$col,$service_id){
        $lists_date = array();
        $initial_date    = strtotime ($initial_date); 
        for ($i=0; $i < $col; $i++) { 
            $lists_date[] = date ("Y-m-d", $initial_date);
            $initial_date += 1 * 60 * 60 * 24; //1 day
        }
        $services = get_posts( array(
            "post_type"=>"booknow",
            "posts_per_page"=>-1,
            'meta_query'=> array(
                'relation' => 'AND',
                array(
                    "key"=> "_booknow_appointment_date",
                    "value" => $lists_date,
                    "compare"=>'IN'
                ),
                array(
                    "key"=> "_booknow_appointment_status",
                    "value" => array("approved","pending"),
                    "compare"=>'IN'
                )
            )
        ) );
        $time_format = apply_filters("booknow_time_format","h:i");
        $services_datas = array();
        $services_datas_custom = array();
        if ( $services ) :
            foreach ( $services as $post ) : 
                $post_id = $post->ID;
                $appointment_date = get_post_meta( $post_id , '_booknow_appointment_date' , true );
                $appointment_time = get_post_meta( $post_id , '_booknow_appointment_time' , true );

                if( $service_id !="" &&is_numeric($service_id) > 0 && $service_id ){
                    //max capacity service in settings
                    $appointment_service = get_post_meta( $post_id , '_booknow_appointment_service' , true );
                    $max_capacity = $this->get_max_capacity($appointment_service);
                    $appointment_date_time_service = $appointment_date."_".$appointment_time."_".$appointment_service;
                    if( isset($services_datas_custom[$appointment_date_time_service]) ){
                        $services_datas_custom[$appointment_date_time_service] = $services_datas_custom[$appointment_date_time_service] + 1; 
                    }else{
                       $services_datas_custom[$appointment_date_time_service] = 1; 
                    }
                    if( $services_datas_custom[$appointment_date_time_service] >= $max_capacity){
                       $lists[$appointment_date][] = date ($time_format,strtotime($appointment_time)); 
                    } 
                }else{
                    //max capacity in settings
                    $datas = get_option("booknow_settings");
                    $appointment_date_time = $appointment_date."_".$appointment_time;
                    if( isset($services_datas[$appointment_date_time]) ){
                        $services_datas[$appointment_date_time] = $services_datas[$appointment_date_time] + 1; 
                    }else{
                       $services_datas[$appointment_date_time] = 1; 
                    }
                    if( $services_datas[$appointment_date_time] >= $datas["max_capacity"]){
                       $lists[$appointment_date][] = date ($time_format,strtotime($appointment_time)); 
                    } 
                } 
            endforeach;
            wp_reset_postdata(); 
        endif;
        return $lists;
    }
    function get_max_capacity($service_id){
        $appointment_service = get_post_meta( $service_id , '_booknow_services' , true );
        if(isset($appointment_service["max_capacity"]) && $appointment_service["max_capacity"] > 0){
            return $appointment_service["max_capacity"];
        }else{
            $datas = get_option("booknow_settings");
            return $datas["max_capacity"];
        }
    }
}
new Booknow_Process;