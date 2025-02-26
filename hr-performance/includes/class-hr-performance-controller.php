<?php

class Hr_Performance_Controller{
    
    public static function create_performance_review(){
        global $wpdb;
        $performance = $wpdb->prefix . 'innovs_hr_performance';
        $employee = $wpdb->prefix . "innovs_employee";

        // $data = $query = $wpdb->get_results( "SELECT * FROM $performance ORDER BY id DESC");
        // return $data; 
        $data = $query = $wpdb->get_results( "SELECT * FROM $performance INNER JOIN $employee on $performance.reporting = $employee.userID ORDER BY $performance.pr_id DESC");
        return $data; 
    }   
    
    public static function create_performance_comment(){
        global $wpdb;
        $performance_comments = $wpdb->prefix . 'innovs_hr_performance_comments';
        $employee = $wpdb->prefix . "innovs_employee";

        $data = $query = $wpdb->get_results( "SELECT * FROM $performance_comments INNER JOIN $employee on $performance_comments.performance_reviewer = $employee.userID ORDER BY $performance_comments.pc_id DESC");
        return $data; 
    } 
    
    public static function create_performance_goal(){
        global $wpdb;
        $performance_goal = $wpdb->prefix . 'innovs_hr_performance_goal';
        $employee = $wpdb->prefix . "innovs_employee";

        $data = $query = $wpdb->get_results( "SELECT * FROM $performance_goal INNER JOIN $employee on $performance_goal.pg_supervisor = $employee.userID ORDER BY $performance_goal.pg_id DESC");
        return $data;
    }

    public static function get_employee(){
        global $wpdb;
        $employee = $wpdb->prefix . "innovs_employee";

        $data = $query = $wpdb->get_results( "SELECT * FROM $employee ORDER BY id DESC");
        return $data;
    }
}