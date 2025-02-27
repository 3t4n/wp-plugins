<?php

/**
 * @link              https://www.linkedin.com/in/suhas-surse/
 * @since             1.0.0
 * @package           WP Employee Attendance System
 *
 * Plugin Name:       WP Employee Attendance System
 * Description:       WP Employee Attendance System is the plugin created in order to track daily employee attendance, show previous attendance.
 * Version:           3.5
 * Author:            Suhas Surse
 * Author URI:        https://www.linkedin.com/in/suhas-surse/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// create tables automatically functions starts here
  function wpeas_jal_install_employee_details() {
    global $wpdb;
    global $jal_db_version;

    $table_name = $wpdb->prefix . 'employee_details';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `name` varchar(25) NOT NULL,
      `gender` varchar(20) NOT NULL,
      `email` varchar(25) NOT NULL,
      `DOB` varchar(25) NOT NULL,
      `contact_no` varchar(25) NOT NULL,
      `department` varchar(20) NOT NULL,
      PRIMARY KEY (`id`)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

    add_option( 'jal_db_version', $jal_db_version );
}
register_activation_hook( __FILE__, 'wpeas_jal_install_employee_details' );

// second function starts here
  function wpeas_jal_install_attendance_taken() {
    global $wpdb;
    global $jal_db_version;

    $table_name = $wpdb->prefix . 'attendance_taken';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `eid` varchar(20) NOT NULL,
      `name` varchar(20) NOT NULL,
      `date` varchar(20) NOT NULL,
      `attendance` varchar(20) NOT NULL,
      PRIMARY KEY (`id`)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

    add_option( 'jal_db_version', $jal_db_version );
}
register_activation_hook( __FILE__, 'wpeas_jal_install_attendance_taken' );
// create tables automatically functions ends here 

// adding styles
add_action('admin_enqueue_scripts','wpeas_reg_admin_stylesheets');
function wpeas_reg_admin_stylesheets() {
    wp_enqueue_style('cover_stylesheet',plugins_url('css/attendancewp-admin.css',__FILE__));
    wp_enqueue_style('cover_stylesheet_fonts',plugins_url('css/attendancewp-admin-fonts.css',__FILE__));
    wp_enqueue_style('cover_stylesheet_rtl',plugins_url('css/attendancewp-admin-rtl.css',__FILE__));
}

//adding in menu
add_action('admin_menu', 'wpeas_employee_attendance_menu');

function wpeas_employee_attendance_menu() {
    //adding plugin in menu
    add_menu_page('Employee Attendance', //page title
        'Employee Attendance', //menu title
        'manage_options', //capabilities
        'Employee_Attendance', //menu slug
        'wpeas_employee_attendance_welcome' //function
    );
    //adding submenu to a menu
    add_submenu_page('Employee_Attendance',//parent page slug
        'Employee Listing',//page title
        'Employee Listing',//menu titel
        'manage_options',//manage optios
        'Employee_Listing',//slug
        'wpeas_employee_list'//function
    );

    add_submenu_page('Employee_Attendance',//parent page slug
        'employee_insert',//page title
        'Employee Insert',//menu titel
        'manage_options',//manage optios
        'Employee_Insert',//slug
        'wpeas_employee_insert'//function
    );
    add_submenu_page( null,//parent page slug
        'employee_update',//$page_title
        'Employee Update',// $menu_title
        'manage_options',// $capability
        'Employee_Update',// $menu_slug,
        'wpeas_employee_update'// $function
    );
    add_submenu_page( null,//parent page slug
        'employee_delete',//$page_title
        'Employee Delete',// $menu_title
        'manage_options',// $capability
        'Employee_Delete',// $menu_slug,
        'wpeas_employee_delete'// $function
    );
    add_submenu_page('Employee_Attendance',//parent page slug
        'Take Todays Attendance',//page title
        'Take Todays Attendance',//menu title
        'manage_options',//manage optios
        'Attendance_Panel',//slug
        'wpeas_attendance_panel'//function
    );
    add_submenu_page('Employee_Attendance',//parent page slug
        'View Todays Attendance',//page title
        'View Todays Attendance',//menu title
        'manage_options',//manage optios
        'View_Todays_Attendance',//slug
        'wpeas_view_todays_attendance'//function
    );
    add_submenu_page('Employee_Attendance',//parent page slug
        'View All Attendance',//page title
        'View All Attendance',//menu title
        'manage_options',//manage optios
        'View_All_Attendance',//slug
        'wpeas_view_all_attendance'//function
    );
    add_submenu_page( null,//parent page slug
        'Attendance Update',//$page_title
        'Attendance Update',// $menu_title
        'manage_options',// $capability
        'Attendance_Update',// $menu_slug,
        'wpeas_attendance_update'// $function
    );
}

include('employee_attendance_welcome.php');
include('employee_list.php');
include('employee_insert.php');
include('employee_update.php');
include('employee_delete.php');
// employee CRUD operation ends here
include('attendance_panel.php');
include('view_todays_attendance.php');
include('view_all_attendance.php');
include('update_todays_attendance.php');
?>
