<?php
/*
Plugin Name: Featured Widget
Plugin URI: http://southsidesaloonandbistro.com
Description: This wordpress plugin allows you to have a custom "featured" widget with an image that links to your custom link.
Author: Dus
Version: 1
Author URI: http://southsidesaloonandbistro.com
*/

/*
Copyright 2011  Dustin Roberts  (email: dstnrob@gmail.com)
To use just enter in the link to your image, your text, the link to where you want your featured item to go to when a user clicks */

register_activation_hook(__FILE__,'featured_table');
register_activation_hook(__FILE__,'featured_data'); 
register_deactivation_hook( __FILE__, 'featured_de' );

register_uninstall_hook( __FILE__, array( 'featured_un', 'on_uninstall' ) );
function featured_de() {
	global $wpdb;
	$table_name = $wpdb->prefix . "featured";
	$sql = "DROP TABLE " . $table_name . ";";
	$wpdb->query($sql);
	require_once(ABSPATH .'wp-admin/includes/upgrade.php');
	dbDelta($sql);
	
	}
function featured_un() {
	global $wpdb;
	$table_name = $wpdb->prefix . "featured";
	$sql = "DROP TABLE " . $table_name . ";";
	$wpdb->query($sql);
	require_once(ABSPATH .'wp-admin/includes/upgrade.php');
	dbDelta($sql);
	
}
//create db table
function featured_table () {
   global $wpdb;

   $table_name = $wpdb->prefix . "featured";
   
//table variable   
   $sql = "CREATE TABLE " . $table_name . " (
	  id mediumint(9) NOT NULL AUTO_INCREMENT,
	  name text NOT NULL,
	  time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
	  url VARCHAR(200) DEFAULT '' NOT NULL,
	  link VARCHAR(200) DEFAULT '' NOT NULL,
	  width INT(3) NOT NULL,
	  UNIQUE KEY id (id)
	);";

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($sql);
}
//insert data into database;
function featured_data() {

$SqlTime = gmdate("Y-m-d H:i:s");
$imglink = $_POST['imglink'];
$bandname = $_POST['bandname'];
$pagelink = $_POST['pagelink'];
$width = $_POST['width'];
global $wpdb;
$table_name = $wpdb->prefix . "featured";
if(isset($_POST['new_post']) == '1') {
$rows_affected = $wpdb->insert( $table_name, array( 'name' => $bandname, 'time' => $time, 'url' => $imglink, 'time' => $SqlTime, 'link' => $pagelink, 'width' => $width ) );   
 }  
}

     

add_action('admin_menu', 'featured_menu');
function featured_menu() {
	add_menu_page('Featured Options', 'Featured Widget', 'manage_options', 'fw', 'featured_widget_options', plugins_url( 'fw_icon.png',  __FILE__ ), '8');
}

function featured_widget_options() {
	global $wpdb;
	echo "<div class='wrap'>";
	
	

//working
$table_name = $wpdb->prefix . "featured";
foreach( $wpdb->get_results("SELECT * FROM $table_name ORDER BY id DESC LIMIT 1;") as $key => $row) {
	// each column in your row will be accessible like this
	$id = $row->id;
	$band = $row->name;
	$url = $row->url;
	$pagel = $row->link;
	$dwidth = $row->width;
	echo "<div style='float: left;'>";
	echo "<div style='font-size: 16px;'>The last featured item</div>";
	echo "<div style='border: 1px solid #333; padding: 10px;'>";
	echo "<div>text: " . $band . "</div>";
	echo "<div>url: " . $url . "</div>";
	echo "<div>page: " . $pagel . "</div>";
	echo "</div>";
	echo "</div>";
	echo "<div style='clear: both'></div>";
	
	
}

echo "<div style='padding-top: 20px;'><form method='post' action='' enctype='multipart/form-data'><div><div style='font-size: 16px; color: green'>1. Enter the url where your image is located.</div><label>Link to image: </label><input id='featimg' name='imglink' type='text'></div><div><div style='font-size: 16px; color: green'>2. Enter the text you would like to display.</div><label>Text: </label><input id='band' name='bandname' type='text'></div><div><div style='font-size: 16px; color: green'>3. Enter the url where you would like to link the image to.</div><label>Link to page: </label><input id='page' name='pagelink' type='text'></div><div style='font-size: 16px; color: green'>4. Enter the width in pixels without 'px' at the end.<div>Example: Instead of entering 220px, enter just the number 220.</div></div><label>Width: </label><input id='nwidth' name='width' type='text'></div><div><input type='submit' value='submit' name='submit'><input type='hidden' name='new_post' value='1'></div></form></div>";
echo "<div style='height: 250px; width: 100px;'></div>";
echo "<form method='post' action='https://www.paypal.com/cgi-bin/webscr'><input type='hidden' value='_s-xclick' name='cmd'><input type='hidden' value='JGHSPYT93S5L4' name='hosted_button_id'><input type='image' border='0' alt='PayPal - The safer, easier way to pay online!' name='submit' src='https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif'><img width='1' height='1px' border='0' src='https://www.paypalobjects.com/en_US/i/scr/pixel.gif' alt=''></form>";
echo "</div>";
if (isset($_POST['submit'])) {
	echo "submitted";
	featured_data();
}
	}
include('featured.php');
?>
