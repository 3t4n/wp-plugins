<?php 
/* 
Plugin Name: Google Adsense Ads 
Plugin URI: http://www.w3cgallery.com/w3c-css/wordpress-google-adsense-ads-by-san
Description: Display Google Adsense,Affliate ads on your website easily, just copy and paste. It creates a tab "Google Adsense Ads" in "Settings" or "Options" tab
Version: 1.2
Author: SAN - w3cgallery.com & Windowshostingpoint.com
Author URI: http://www.w3cgallery.com/
*/

/*  Copyright 2008  SAN - w3cgallery.com & Windowshostingpoint.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; 
*/


// Main function to diplay on front end

function DisplayAds($type='SideBar') {
global $post, $wpdb, $ads_sidebar, $ads_contenttop;
// posts_id from database
if($type=='SideBar') {
$sidebar = $ads_sidebar['sidebar'];
 if($sidebar) {
 echo stripslashes($sidebar);
  }
  }else{
 
 $contenttop = $ads_contenttop['contenttop'];
 if($contenttop) {
 echo stripslashes($contenttop);
  } 
  
  }	

}

$data = array(
				'sidebar' 			=> '',
				'contenttop' 		=> ''
							);
$ol_flash = '';

 $ads_sidebar = get_option('ads_sidebar');
 $ads_contenttop = get_option('ads_contenttop');
// print_r($posts_google_data);
// ADMIN PANLE SEETTING
function posts_google_ads() {
    // Add new menu in Setting or Options tab:
    add_options_page('Google Adsense Ads', 'Google Adsense Ads', 8, 'postsgoogleads', 'posts_google_options_page');
}


/* Define Constants and variables*/
define('PLUGIN_URI', get_option('siteurl').'/wp-content/plugins/');

/* Functions */

function posts_google_options_page() {
global $ol_flash, $ads_sidebar, $ads_contenttop, $_POST, $wp_rewrite;
if (isset($_POST['sidebar']) OR isset($_POST['contenttop'])) { 
	$ads_sidebar['sidebar'] = str_replace('\\','',$_POST['sidebar']);
	$ads_contenttop['contenttop'] = str_replace('\\','',$_POST['contenttop']);
	update_option('ads_sidebar',$ads_sidebar);
	update_option('ads_contenttop',$ads_contenttop);
	$ol_flash = "Your List has been saved.";
		}

if ($ol_flash != '') echo '<div id="message"class="updated fade"><p>' . $ol_flash . '</p></div>';

echo '<div class="wrap">';
		echo '<h2>Google Adsense Ads by SAN</h2>';
		echo "<table class='optiontable form-table'><form action='' method='post'>
		<tr><td colspan='2'><strong>This plugin gives option to copy and paste your ad codes (like: google adsense, affliate codes etc.) and banner display on your website.</strong></td></tr>
		<tr><td><strong>SideBar</strong></td><td><textarea rows='6' name='sidebar' cols='43'>" . htmlentities($ads_sidebar['sidebar']) . "</textarea></td></tr>
		<tr><td><strong>ContentTop</strong></td><td><textarea rows='6' name='contenttop' cols='43'>" . htmlentities($ads_contenttop['contenttop']) . "</textarea></td></tr>
		</table>";
				
echo '<Div class="submit"><input type="submit" value="Save your Ads" /></div>
<p>Paste this code where you want it to display Ads <strong>&lt;?php DisplayAds(); ?&gt;</strong> <br/> Or you can pass variable too like this default setting <strong>&lt;?php DisplayAds($type = "SideBar") ?&gt;</strong> for display SideBar ads.</p>
		</form>';
echo '<p><a href="http://www.w3cgallery.com/w3c-css/wordpress-google-adsense-ads-by-san">for Instructions and help online Please visit.</a> <br/>
If you like this plugin, please leave your comments on <a href="http://www.w3cgallery.com/w3c-validate/w3c-blog">w3cgallery.com</a> & <a href="http://www.Windowshostingpoint.com">Windowshostingpoint.com</a></p>';
		echo '</div>';

}

add_action('admin_menu', 'posts_google_ads');

?>