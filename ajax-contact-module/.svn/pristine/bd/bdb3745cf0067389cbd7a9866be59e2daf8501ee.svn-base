<?php
/*
Plugin Name: Ajax Contact Module
Plugin URI: http://www.daext.com/ajax-contact-module/
Description: When activated you will see a contact module fixed on the bottom of the page. See the plugin page for more details on the plugin.
Version: 1.0
Author: Danilo Andreini
Author URI: http://www.daext.com
License: GPLv2 or later
*/

/*  Copyright 2012  Danilo Andreini (email : andreini.danilo@gmail.com)

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

//variables for the fields initialization
if(strlen(get_option('acm_label1'))==0){update_option('acm_label1',"Do you want to be contacted?");}
if(strlen(get_option('acm_label2'))==0){update_option('acm_label2',"Insert your email address");}
if(strlen(get_option('acm_label3'))==0){update_option('acm_label3',"You will be contacted soon");}
if(strlen(get_option('acm_label4'))==0){update_option('acm_label4',"Submit");}

//admin menu


function acm_menu() {
	add_options_page( 'Ajax Contact Module', 'Ajax Contact Module', 'manage_options', 'acm_options', 'acm_options' );
}
add_action( 'admin_menu', 'acm_menu' );

function acm_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}

    // Read in existing options value from database
    $label1 = get_option('acm_label1');
    $label2 = get_option('acm_label2');
    $label3 = get_option('acm_label3');
    $label4 = get_option('acm_label4');
    
    // Save options if user has posted some information
    if(isset($_POST[label1]) or isset($_POST[label2]) or isset($_POST[label3]) or isset($_POST[label4])){        
        $label1=$_POST[label1];$label2=$_POST[label2];$label3=$_POST[label3];$label4=$_POST[label4];
        //regexp check
        $error=0;
	    if(preg_match('/[^a-z_, .?\-0-9]/i',$label1)){$error=1;}
	    if(preg_match('/[^a-z_, .?\-0-9]/i',$label2)){$error=1;}
	    if(preg_match('/[^a-z_, .?\-0-9]/i',$label3)){$error=1;}
	    if(preg_match('/[^a-z_, .?\-0-9]/i',$label4)){$error=1;}
        if($error==0){
			// Save into database
			update_option('acm_label1',$label1);update_option('acm_label2',$label2);update_option('acm_label3',$label3);update_option('acm_label4',$label4);
			echo '<p class="acm-saved">Your options has been saved</p>';
		}else{
			//show error message
			echo '<p class="acm-saved">Only letters and characters [. , ?] are allowed</p>';
		}
	}
	
	echo '<div class="acm-admin">';
	echo '<h2>Ajax Contact Module options:</h2>';
	echo '<form method="post" action="">';
	echo '<input maxlenght="40" class="acm-text" type="text" name="label1" value="'.$label1.'"><span>Welcome message</span><br />';
	echo '<input maxlenght="40" class="acm-text" type="text" name="label2" value="'.$label2.'"><span>Email Input text</span><br />';
	echo '<input maxlenght="40" class="acm-text" type="text" name="label3" value="'.$label3.'"><span>Success message</span><br />';
	echo '<input maxlenght="10" class="acm-text" type="text" name="label4" value="'.$label4.'"><span>Sumbit button text</span><br />';
	echo '<input class="acm-submit" type="submit" value="Save">';
	echo '</form>';
	echo '</div>';   	
	
}

//admin menu


//embedding files
wp_enqueue_script('jquery');

//writing in frontend head
function head_embed()
{
echo '<script type="text/javascript">';
echo 'var blog_url = \''.get_bloginfo('wpurl').'\'';
echo '</script>'."\n";
echo '<script type="text/javascript" src="'.WP_PLUGIN_URL.'/ajax-contact-module/js/script.js"></script>';
echo '<link rel="stylesheet" type="text/css" media="all" href="'.WP_PLUGIN_URL.'/ajax-contact-module/css/style.css" />';
}
add_action( 'wp_head', 'head_embed' );

//writing in backend head
function acm_admin_head()
{
echo '<link rel="stylesheet" type="text/css" media="all" href="'.WP_PLUGIN_URL.'/ajax-contact-module/css/style.css" />';
}
add_action( 'admin_head', 'acm_admin_head' );

function daext_nl()
{
//check if the user has just submitted the module
if(isset($_COOKIE['acmcookie'])){exit();}
//print the module
echo '<div id="daext-newsletterform">';
	echo '<div id="daext-newsletterform-container" class="clearfix">';
		echo '<p id="daext-p">'.get_option('acm_label1').'</p>';
		echo '<p id="daext-p-sent">'.get_option('acm_label3').'</p>';
		echo '<div id="daext-form">';
			echo '<img id="daext-img" src="'.WP_PLUGIN_URL.'/ajax-contact-module/img/daext-acf.gif">';
			echo '<input id="daext-email" type="text" autocomplete="off" value="'.get_option('acm_label2').'" onfocus="deleteMe(this)";>';
			echo '<input id="daext-email-recipient" type="hidden" value="'.get_option('admin_email').'" >';
			echo '<input id="daext-button" type="submit" value="'.get_option('acm_label4').'" onclick="contactMe()">';
		echo '</div>';
	echo '</div>';
echo '</div>';
}
add_action( 'get_footer', 'daext_nl' );

?>
