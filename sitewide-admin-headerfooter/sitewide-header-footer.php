<?php
/*
Plugin Name: Sitewide (Admin) Header/Footer
Description:Add something to the header/footer of the front- and backend of WP
Version: 1.1
Requires at least: WP 3.0.0
Tested up to: WP 3.2 RC1
License: GNU General Public License 2.0 (GPL) http://www.gnu.org/licenses/gpl.html
Author: Philipp Schr&ouml;er
Author URI: 
Plugin URI:
Sitewide Only:true
Network:true
Last Modified: 18 June, 2011
*/
/***
    Copyright (C) 2011 Philipp Schröer

    This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 3 of the License, or  any later version.

    This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

    You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses>.

    */


class Sitewide_Header_Footer {
	
	public static function displayOptions() 
	{
		
		//if there is already the sitewide footer content
		//show it in the form 
		$admin_footer = get_site_option("shf_admin_footer_content");
		$admin_header = get_site_option("shf_admin_header_content");
		$frontend_footer = get_site_option("shf_footer_content");
		$frontend_header = get_site_option("shf_header_content");
		
		$add_to_admin_footer = get_site_option("shf_add_to_admin_footer");
		
?>
		<h3>Sitewide Headers/Footers</h3>
		<table class="form-table">
			<tr valign="top">
						<th scope="row">Sitewide Admin Header Content</th> 
							<td>
								<textarea rows="5" cols="45" id="shf_admin_header_content" name="shf_admin_header_content" class="large-text"><?php echo stripslashes($admin_header); ?></textarea>
								
							</td> 
					</tr>
					   <tr>
					   <th scope="row">Sitewide Admin Footer Content</th> 
							<td>
								<textarea rows="5" cols="45" id="shf_admin_footer_content" name="shf_admin_footer_content" class="large-text"><?php echo stripslashes($admin_footer); ?></textarea>
								<p><label for="shf_add_to_admin_footer">This will replace your Admin Footer Bar with this text. If you want to only add your text, click here: </label><input type="checkbox" name="shf_add_to_admin_footer" id="shf_add_to_admin_footer" value="Add to Admin Footer" <?php if($add_to_admin_footer == true) { echo 'checked="checked"'; } ?></p>
							</td> 
					</tr>
					<tr>
					   <th scope="row">Sitewide Header Content</th> 
							<td>
								<textarea rows="5" cols="45" id="shf_header_content" name="shf_header_content" class="large-text"><?php echo stripslashes($frontend_header); ?></textarea>
								
							</td> 
					</tr>
					<tr>
					   <th scope="row">Sitewide Footer Content</th> 
							<td>
								<textarea rows="5" cols="45" id="shf_footer_content" name="shf_footer_content" class="large-text"><?php echo stripslashes($frontend_footer); ?></textarea>
							</td> 
					</tr>
					
			</table>
<?php
	}
	
	public static function updateOptions()
	{
		
		
		// Admin header
		$admin_header = (empty($_POST['shf_admin_header_content'])) ? '' : $_POST['shf_admin_header_content'];
		update_site_option( 'shf_admin_header_content' ,  $admin_header);

		// Admin footer
		$admin_footer = (empty($_POST['shf_admin_footer_content'])) ? '' : $_POST['shf_admin_footer_content'];
		update_site_option( 'shf_admin_footer_content' ,  $admin_footer);
		
		// Add to or replace the admin footer?
		$add_to_admin_footer = (isset($_POST['shf_add_to_admin_footer'])) ? true : false;
		update_site_option( 'shf_add_to_admin_footer' ,  $add_to_admin_footer);

		// Frontend header
		$frontend_header = (empty($_POST['shf_header_content'])) ? '' : $_POST['shf_header_content'];
		update_site_option( 'shf_header_content' ,  $frontend_header);

		// Frontend footer
		$frontend_footer = (empty($_POST['shf_footer_content'])) ? '' : $_POST['shf_footer_content'];
		update_site_option( 'shf_footer_content' ,  $frontend_footer);
	}
		
	
	public static function getAdminHeader()
	{
		$admin_header = get_site_option("shf_admin_header_content");
		echo stripslashes($admin_header);
	}
	
	public static function getAdminFooter($before)
	{
		$admin_footer = get_site_option("shf_admin_footer_content");
		$add_to_admin_footer = get_site_option("shf_add_to_admin_footer");

		if(empty($admin_footer)) {
			return $before;
		} else {
				
			if($add_to_admin_footer == true) {
				return stripslashes($before.$admin_footer);
			} else {
				return stripslashes($admin_footer);
			}
				
		}	
	}
	
	public static function getFrontendHeader()
	{
		$frontend_header = get_site_option("shf_header_content");
		echo stripslashes($frontend_header);	
	}
	
	public static function getFrontendFooter()
	{
		$frontend_footer = get_site_option("shf_footer_content");
		echo stripslashes($frontend_footer);		
	}

}

// add form to WP MultiSite options page
add_action('wpmu_options', array('Sitewide_Header_Footer', 'displayOptions'));

// set options after clicking 'save' in WP MultiSite options page 
add_action('update_wpmu_options', array('Sitewide_Header_Footer', 'updateOptions'));

// add actions/filters for output
add_action('admin_head', array('Sitewide_Header_Footer', 'getAdminHeader'));
add_filter('admin_footer_text', array('Sitewide_Header_Footer', 'getAdminFooter'));
add_action('wp_head', array('Sitewide_Header_Footer', 'getFrontendHeader'));
add_action('wp_footer', array('Sitewide_Header_Footer', 'getFrontendFooter'));

?>