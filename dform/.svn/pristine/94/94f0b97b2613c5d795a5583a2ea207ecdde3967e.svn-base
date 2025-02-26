<?php
/*
Plugin Name: dForm
Plugin URI: http://www.divides.be
Description: Create forms in your pages and posts using standard html tags.
Version: 1.0
Author: divides.be
Author URI: http://www.divides.be
License: GPL2
*/
?>
<?php
/*  Copyright YEAR  PLUGIN_AUTHOR_NAME  (email : PLUGIN AUTHOR EMAIL)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?>
<?php
$dform_db_version = "1.0";

require_once(dirname (__FILE__) . '/options.php');

/* Activation functions */
register_activation_hook(__FILE__,'dform_install');

add_filter( $tag, "testForm", $priority, $accepted_args );

function testForm($content) {
	
} 

/* Update needed? */
add_action('plugins_loaded', 'dform_update_db_check');
function dform_update_db_check() {
    global $dform_db_version;
    if (true || get_site_option('dform_db_version') != $dform_db_version) {
        dform_install();
    }
}


/* Table creation */
function dform_install () 
{
   global $wpdb;
   global $dform_db_version;
   $installed_ver = get_option( "dform_db_version" );     
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');   
   $table_name = $wpdb->prefix . "dform_entries";
   $sql = "CREATE TABLE `".$table_name."` (
	eid mediumint(9) NOT NULL AUTO_INCREMENT,
	time int(11) NOT NULL,
	source int(11) NOT NULL,
	status tinyint NOT NULL,
	UNIQUE KEY eid (eid)
	);";
	dbDelta($sql);

   $table_name = $wpdb->prefix . "dform_data";
   $sql = "CREATE TABLE `".$table_name."` (
	id mediumint(9) NOT NULL AUTO_INCREMENT,
	entry int(11) NOT NULL,
	fname varchar(64) NOT NULL,
	fvalue longtext NOT NULL,
	UNIQUE KEY id (id)
	);";
	dbDelta($sql);

   $table_name = $wpdb->prefix . "dform_sources";
   $sql = "CREATE TABLE `".$table_name."` (
	id mediumint(9) NOT NULL AUTO_INCREMENT,
	fname varchar(64) NOT NULL,
	UNIQUE KEY id (id)
	);";
	dbDelta($sql);
	
   add_option("dform_db_version", $dform_db_version);
   add_option("dform_show_link",1);
   add_option("dform_recaptcha_private");
   add_option("dform_recaptcha_public");
   
   
}
/* Captcha insertion */
function dform_captcha() {
	$publickey = get_option('dform_recaptcha_public'); // you got this from the signup page	  
	if($publickey!="") {	 
		require_once('recaptchalib.php');
		return recaptcha_get_html($publickey);
	}
}

function dform_validcaptcha() {
 	$privatekey = get_option('dform_recaptcha_private');
 	if($privatekey!="") {	 
	 	require_once('recaptchalib.php');
		$resp = recaptcha_check_answer ($privatekey,  
			$_SERVER["REMOTE_ADDR"],
			$_POST["recaptcha_challenge_field"],
			$_POST["recaptcha_response_field"]);
		return $resp->is_valid;
	} else {
		return false;
	}
}

//captcha content filter
add_filter('the_content','dform_insert_captcha',10);
function dform_insert_captcha($content) {
	return str_replace('[dfcaptcha]', dform_captcha(), $content);
}

/* Link to divides */
add_filter('the_content','dform_insert_link',99);
function dform_insert_link($content) {
	if(get_site_option('dform_show_link')==1 && strpos($content, "dform_id")>0) {
		return $content."<br /> powered by dForm <a href='http://www.divides.be'>divides.be</a>";
	} else {
		return $content;	
	}
}

/* From processing */
function dform_process() 
{
	if($_POST['dform_id']!="") {
		global $wpdb;
		global $dform_data;
		$source=$_POST['dform_id'];
		if(($_POST["recaptcha_challenge_field"]!="" && dform_validcaptcha()) 
		||$_POST["recaptcha_challenge_field"]=="") { 
			//Create form entry
			$table_name = $wpdb->prefix . "dform_entries";
			$rows_affected = $wpdb->insert( $table_name, array( 'time' => time(), 'source' => $source ) );
			$entry=$wpdb->insert_id;
			//Loop through post values
			$table_name = $wpdb->prefix . "dform_data";
			foreach($_POST as $name => $value) {
				if($name!='dform_id' && $name!='recaptcha_response_field' && $name!='recaptcha_challenge_field' ) {
					$rows_affected = $wpdb->insert( $table_name, array('entry' => $entry, 'fname' => $name, 'fvalue' => $value ) );
				}
				$dform_data[$name]=$value;
			}
		} 	
	}	
}
add_action('wp_head', 'dform_process');

?>