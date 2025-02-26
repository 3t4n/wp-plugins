<?php
/* 	Plugin Name: Class Booking Plugin
	Plugin Uri: http://singhalrohitashv.com
	Description: This plugin allows you to accept appointments from your students or clients any time any where from your website or blog. This plugin directly allows you
			to book appoinment with your business directly from your website.
			There is no need of registration. With a single click your customers can be the schedule for the day.
			Class booking by lordlinus can be used for : 
			a) Class Booking
			b) Gym class
			c) Physiotherapist
			d) Ballon ride
			Features 
			a) Add Staff
			b) Add class
			c) Add shift to a class
			d) Tuition classes
			e) Summer classes
	Version: 3.4
	Author: lordlinus
	Author URI: http://singhalrohitashv.com
	Licence: GPVl
*/
register_activation_hook( __FILE__, 'classbooking_InstallScript');
function classbooking_InstallScript()
{
	include('install-script.php');
}
function class_boking_menu()
{
	echo "<link rel='stylesheet' type='text/css' href='".plugins_url('/bootstrap-assets/css/bootstrap.css', __FILE__)."' />";
	add_menu_page( 'Class Booking', 'Class Booking', 'administrator','class-booking' ,'class_booking');
	add_submenu_page('class-booking', 'Class Booking','Staff','administrator','entries-staff','entries_staff');
	add_submenu_page('class-booking', 'Class Booking','Appointments','administrator','lord_appointments','lord_appointments');
	add_submenu_page('class-booking', 'Class Booking','Uninstall','administrator','uninstall_lordlinus','uninstall_lordlinus');
	add_submenu_page('class-booking', 'Class Booking','Settings','administrator','settings_lordlinus','settings_lordlinus');
	add_submenu_page('class-booking', 'Class Booking','Help and Support','administrator','lord_help_sup','lord_help_sup');
}
function uninstall_lordlinus()
{
	include("uninstall-script.php");
}
function lord_help_sup()
{
	include("help_support.php");
}
function lord_appointments()
{
	include("lordlinus-appointment.php");
}
function entries_staff()
{
	include("lord-entries.php");
}
function settings_lordlinus()
{
	include("settings.php");
}
function class_booking()
{
	echo wp_enqueue_script('jquery');
	include("lordlinus-class-booking-main.php");
}
add_action( 'admin_menu','class_boking_menu' );
add_action( 'init', 'llcb_init' );
add_shortcode('BOOK_MY_CLASS','lordlinus_shortcode');
function lordlinus_shortcode()
{
	include("lordlinus_class_shortcode.php");
}
function llcb_init() {
		load_plugin_textdomain( 'lordlinus-class-booking', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}
?>
