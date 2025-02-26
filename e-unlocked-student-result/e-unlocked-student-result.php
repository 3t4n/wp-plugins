<?php 
ob_start();
ob_clean();
/**
 * E Unlocked - Student Result
 *
 * @package           PluginPackage
 * @author            Purna Chandra Sarkar
 * @copyright         2020 Purna Chandra Sarkar
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       E Unlocked - Student Result
 * Description:       This is a plugin specially made for showing results with a marksheet, add students using CSV, Full Customizable.
 * Version:           1.0.4
 * Requires at least: 4.1
 * Author:            Purna Chandra Sarkar
 * Text Domain:       e-unlocked-student-result
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */
 DEFINED('ABSPATH') or die("You can't access this file.");
global $wpdb;

 add_action('admin_menu' , 'eusr_add_menu_page_func');

 function eusr_add_menu_page_func(){
    add_menu_page( 'EU Student Result', 'EU Student Result', 'manage_options', 'eusr-student-result', 'eusr_plugin_page', 'dashicons-welcome-learn-more', 25);
    add_submenu_page( 'eusr-student-result','Dashboard', 'Dashboard', 'manage_options', 'eusr-student-result', 'eusr_plugin_page');
    add_submenu_page( 'eusr-student-result','Classes', 'Classes', 'manage_options', 'eusr-class', 'eusr_add_class');
    add_submenu_page( 'eusr-student-result','Subjects', 'Subjects', 'manage_options', 'eusr-subject', 'eusr_add_subject');
    add_submenu_page( 'eusr-student-result','Add Student', 'Add Student', 'manage_options', 'eusr-add-record', 'eusr_add_student');
    add_submenu_page( 'eusr-student-result','Add Mark', 'Add Mark', 'manage_options', 'eusr-add-mark', 'eusr_add_mark');
    add_submenu_page( 'eusr-student-result','All Students', 'All Students', 'manage_options', 'eusr-all-students', 'eusr_all_students');
    add_submenu_page( 'eusr-student-result','Settings', 'Settings', 'manage_options', 'eusr-settings', 'eusr_settings');
    $helphook = add_submenu_page( 'eusr-student-result','Help & Guide', 'Help & Guide', 'manage_options', 'eusr-help', 'eusr_help');
    add_submenu_page( 'v','View', 'View', 'manage_options', 'eusr-viewrec', 'eusr_viewrec');
    add_submenu_page( 'd','Delete', 'Delete', 'manage_options', 'eusr-delrec', 'eusr_delrec');
    add_submenu_page( 'f','Edit Record', 'Edit Record', 'manage_options', 'eusr-editrec', 'eusr_editrec');
    
 }

 function eusr_add_student(){
    include 'menu-files/add-student/add-student.php';
 }
  function eusr_add_mark(){
    include 'menu-files/mark/mark.php';
 }

 function eusr_plugin_page(){
    include 'menu-files/dashboard.php';
}
 function eusr_all_students(){
    include 'menu-files/all-students/all-students.php';
}
function eusr_add_class(){
    include 'menu-files/class/add-class.php';
}
function eusr_add_subject(){
    include 'menu-files/subject/add-subject.php';
}
function eusr_dashboard(){
    include 'menu-files/dashboard.php';
}
function eusr_help(){
    include 'menu-files/help.php';
}
 function eusr_viewrec(){
    include 'menu-files/view/view.php';
}
 function eusr_editrec(){
    require 'menu-files/editrecord/editrec.php';
}
function eusr_delrec(){
    include 'menu-files/delete.php';
}
 function eusr_settings(){
    include 'menu-files/settings/settings.php';
}
function eusr_remove_footer_admin () 
{
    return '';
}

add_action('admin_enqueue_scripts', 'eusr_my_admin_css');
 
function eusr_my_admin_css() {
	if (isset($_GET['page'])){
		if ($_GET['page'] == 'eusr-student-result' || $_GET['page'] == 'eusr-subject' || $_GET['page'] == 'eusr-class' || $_GET['page'] == 'eusr-add-record' || $_GET['page'] == 'eusr-add-mark' || $_GET['page'] == 'eusr-all-students' || $_GET['page'] == 'eusr-settings' || $_GET['page'] == 'eusr-help' || $_GET['page'] == 'eusr-viewrec' || $_GET['page'] == 'eusr-editrec' ) {
			wp_enqueue_style( 'eusr_bootstrap', plugins_url( '/e-unlocked-student-result/css/bootstrap.css' ));
			wp_enqueue_style( 'eusr_w3schools', 'https://www.w3schools.com/w3css/4/w3.css');
		}
		if ($_GET['page'] == 'eusr-subject') {
			wp_enqueue_style( 'eusr-subject', plugins_url('/e-unlocked-student-result/menu-files/subject/style.css'));
		}
		if ($_GET['page'] == 'eusr-class') {
				wp_enqueue_style( 'eusr-class', plugins_url('/e-unlocked-student-result/menu-files/class/style.css'));
		}
		if ($_GET['page'] == 'eusr-add-record') {
				wp_enqueue_style( 'eusr-add-record', plugins_url('/e-unlocked-student-result/menu-files/add-student/style.css'));
		}
		if ($_GET['page'] == 'eusr-add-mark') {
				wp_enqueue_style( 'eusr-add-mark', plugins_url('/e-unlocked-student-result/menu-files/class/style.css'));
		}
		if ($_GET['page'] == 'eusr-all-students') {
				wp_enqueue_style( 'eusr-all-students', plugins_url('/e-unlocked-student-result/menu-files/all-students/style.css'));
		}
		if ($_GET['page'] == 'eusr-settings') {
				wp_enqueue_style( 'eusr-settings', plugins_url('/e-unlocked-student-result/menu-files/settings/style.css'));
		}
		if ($_GET['page'] == 'eusr-viewrec') {
				wp_enqueue_style( 'eusr-viewrec', plugins_url('/e-unlocked-student-result/menu-files/show-result/style.css'));
		}
	}
}
add_action( 'wp_enqueue_scripts', 'eusr_frontend_css' );
function eusr_frontend_css() {
	wp_enqueue_style( 'eusr-show-result-css', plugins_url('/e-unlocked-student-result/menu-files/show-result/style.css'));
    wp_enqueue_style( 'eusr-show-result-bootstrap', plugins_url( '/e-unlocked-student-result/css/bootstrap.css' ));
}

add_filter('admin_footer_text', 'eusr_remove_footer_admin');
function eusr_change_footer_version() {
    return '';
}
add_filter( 'update_footer', 'eusr_change_footer_version', 9999 );
register_activation_hook(__FILE__, 'eusr_activation_func');
function eusr_activation_func(){
    include 'installation.php';
}


register_uninstall_hook(__FILE__, 'eusr_uninstall_func');
function eusr_uninstall_func(){
    // global $wpdb;
    // $prefix = $wpdb->prefix;
    // $wpdb->query("Drop table if exists {$prefix}eusr_student_result");
    // $wpdb->query("Drop table if exists {$prefix}eusr_school_info");
    // $wpdb->query("Drop table if exists {$prefix}eusr_view_settings");
    // $wpdb->query("Drop table if exists {$prefix}eusr_subject");
    // $wpdb->query("Drop table if exists {$prefix}eusr_class");
    // $wpdb->query("Drop table if exists {$prefix}eusr_mark");
    
  function rmrf($dir) {
    foreach (glob($dir) as $file) {
        if (is_dir($file)) { 
            rmrf("$file/*");
            rmdir($file);
        } else {
            unlink($file);
        }
    }
}
    rmrf(wp_get_upload_dir()['basedir'].'/result');
}

   add_shortcode('eusr_show_result', 'eusr_show_result_func');

function eusr_show_result_func(){
    require 'menu-files/show-result/show-result.php';
}
