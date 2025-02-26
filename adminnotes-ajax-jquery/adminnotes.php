<?php
/*
Plugin Name: adminnotes
Plugin URI: http://www.newdezigns.com/?page_id=10
Description: Adds a todo style notes adding-listing-deleting capability to the admin area - available via toggle on all admin pages. Uses ajax-jquery-dom.
Version: 0.1
Author: Bob Powers 
Author URI: http://NewDezigns.com
*/
/*/////////////////////////////////////////////////////////////////////////////////////////
“Copyright 2009 Robert Pwwers” -This program is distributed under the terms of the Lesser GPL or the Lesser General Public License).
*//////////////////////////////////////////////////////////////////////////////////////////
/*  

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU Lesser General Public Locemse as published by
    the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA
*/
/*///////////////////////////////////////////////////////////////////////////////////////////////
Got the idea for a todo style notes plugin and searched  - found the Plugin "AdNotes"
by Paul Morley of http://www.developedat.com

 -That plugin puts a text area under the Top Level Manage Menu and displays notes on the Dashboard only and a Std Form page for input. 
 
 Decided to expand the implementation of the idea to have notes available from anywhere in admin and to hide when not in use and use ajax for updating.
*/
//require_once 'Zend/Json.php';
	
// --------------------------------------------------------------------
// Plugin activation
// --------------------------------------------------------------------



if (isset($_GET['activate']) && $_GET['activate'] == 'true') {
	if (defined('WPINC') && strpos($_SERVER['HTTP_REFERER'], $_SERVER['SERVER_NAME']) > 0) {
		add_action('init', 'install_AdminNotes');
		
		
	}
}
		
		

		
		
// --------------------------------------------------------------------
// create and populate the database on installing the plugin
// --------------------------------------------------------------------
	function install_AdminNotes() {
	

		global $wpdb;
		global $table_name;
		
		

		
		$table_name = $wpdb->prefix . 'admin_notes';
		
		if($wpdb->get_var("SHOW TABLES LIKE '" . $table_name ."'") != $table_name) {
			$sql = "CREATE TABLE $table_name (
				task_id 	bigint(32) 	not null auto_increment,
				notes		text		not null default '',
				unique key id(task_id)
				);";
				
			$results = $wpdb->query($sql);
			
			// Add initial data
			$sql = "INSERT INTO `$table_name` (notes) VALUES ('This is a sample note.')";
			$results = $wpdb->query($sql);
		}
	}

   function load_js_admin_head()
		{
			
			
		wp_enqueue_script('js-adminnotes', '/wp-content/plugins/adminnotes/js-adminnotes.php', array('jquery'), '1.0');
		
			
		}
		

// --------------------------------------------------------------------
// Add actions
// --------------------------------------------------------------------
		add_action("admin_print_scripts", 'load_js_admin_head');
		add_action('admin_notices', 'render_adminnotes_page');
		add_action('wp-ajax_check_notes', 'check_notes', 10);

		add_action('wp_ajax_del_notes', 'del_notes', 10);
		add_action('wp_ajax_save_notes', 'save_notes', 10);
		add_action('wp_ajax_update_adminnotes_page', 'update_adminnotes_page', 10);

add_action('wp_ajax_check_notes', 'check_notes', 10);
	
// --------------------------------------------------------------------
// Render the Admin Notes page on all admin pages
// --------------------------------------------------------------------
	function render_adminnotes_page()
	{	
	 
	    global $table_name;
		global $wpdb;
		global $notesarray;
	
		$table_name = $wpdb->prefix . 'admin_notes';
	   	$notesarray = $wpdb->get_results("SELECT task_id, notes FROM $table_name ORDER BY `task_id` ASC");
		
		include('html-adminnotes.php');
		
		
	}

//-----------------------------------------------------------------------------
// update the admin notes page on adding a note - to show immediately in list.
//-----------------------------------------------------------------------------
function update_adminnotes_page()
	{		
	    global $wpdb;
		global $table_name;
		global $notesarray;
	
	
	
		$table_name = $wpdb->prefix . 'admin_notes';
		usleep(500000);
		$notesarray = $wpdb->get_results("SELECT * FROM $table_name ORDER BY `task_id` ASC");
		
		include('html-update_notes.php');
	

		
	}


//----------------------------------------------------------------------
// add the Save Function
//--------------------------------------------------------------------
function save_notes()
		{
		 
		global $wpdb;
		global $table_name;
		global $notesarray;
		
		$table_name = $wpdb->prefix . 'admin_notes';
		$name = 'notes_input';
		$value = $_POST['notes_input'];

		$sql = "INSERT INTO $table_name (notes) VALUES ('$value')";
		$results = $wpdb->query($sql);
		
		
		}


// --------------------------------------------------------------------
// Delete function
//---------------------------------------------------------------------
function del_notes()
		{
		 
		global $wpdb;
		global $table_name;
		
		$table_name = $wpdb->prefix . 'admin_notes';
		$deletestring = $_POST['post_string'];
		$deleteid = explode('|',$deletestring);
		foreach($deleteid as $delid) {
			
		///////////
		$sql = "DELETE FROM $table_name  WHERE task_id = '$delid'";
		$results = $wpdb->query($sql)or die(mysql_error()); 
		////////////////
		
		
		$notesarray = $wpdb->get_results("SELECT task_id, notes FROM $table_name");
			
		if(!empty($notesarray)){
	    	$havenotes = 'yes';
		}else{
	    	$havenotes = 'no';
		}

		echo $havenotes;
		}
		//exit;		
					
		}
		
// --------------------------------------------------------------------
// Check function
//---------------------------------------------------------------------
function check_notes()
		{
		 
		global $wpdb;
		global $table_name;
		
		$table_name = $wpdb->prefix . 'admin_notes';
		
		////////////////
		$notesarray = $wpdb->get_results("SELECT task_id FROM $table_name");
			
		if(!empty($notesarray)){
	    	$havenotes = 'yes';
		}else{
	    	$havenotes = 'no';
		}
		echo $havenotes;
		exit;		
		}			


?>