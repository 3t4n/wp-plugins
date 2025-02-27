<?php
/*
Plugin Name: WP Social Buttons
Description: "wp-social-buttons" is the very simple plugin to add official social buttons on your site!.
Author: WP Experts Team
Author URI: https://www.wp-experts.in/
Version: 2.2
*/

/*  Copyright 2017-2022  (email : raghunath.0087@gmail.com)

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

/*
 * WP Social Buttons
 * @add_action
 * @register_setting
 * 
 * */
//Admin "WP Social Buttons" Menu Item
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
add_action('admin_menu','wpsb_sidebar_menu');
if(!function_exists('wpsb_sidebar_menu')):
function wpsb_sidebar_menu(){
add_options_page('WP Social Buttons','WP Social Buttons','manage_options','wpsb-settings','wpsb_sidebar_admin_option_page');
}
endif;
//Define Action for register "WP Social Buttons" Options
add_action('admin_init','wpsb_sidebar_init');
//Register "WP Social Buttons" options
if(!function_exists('wpsb_sidebar_init')):
function wpsb_sidebar_init(){
	register_setting('wpsb_sidebar_options','wpsb_active','sanitize_text_field');
	register_setting('wpsb_sidebar_options','wpsb_position','sanitize_text_field');
	register_setting('wpsb_sidebar_options','wpsb_hide_frame','sanitize_text_field');
	register_setting('wpsb_sidebar_options','wpsb_top_margin','sanitize_text_field');
	register_setting('wpsb_sidebar_options','wpsb_delayTimeBtn','sanitize_text_field');
	register_setting('wpsb_sidebar_options','wpsb_page_hide_home','sanitize_text_field');
	register_setting('wpsb_sidebar_options','wpsb_page_hide_post','sanitize_text_field');
	register_setting('wpsb_sidebar_options','wpsb_page_hide_page','sanitize_text_field');
	register_setting('wpsb_sidebar_options','wpsb_fpublishBtn','sanitize_text_field');			
	register_setting('wpsb_sidebar_options','wpsb_ppublishBtn','sanitize_text_field');	
	register_setting('wpsb_sidebar_options','wpsb_lpublishBtn','sanitize_text_field');
	register_setting('wpsb_sidebar_options','wpsb_twitterpublishBtn','sanitize_text_field');
	register_setting('wpsb_sidebar_options','wpsb_tumpublishBtn','sanitize_text_field');
	register_setting('wpsb_sidebar_options','wpsb_fb_url', 'sanitize_url');
	register_setting('wpsb_sidebar_options','wpsb_tw_url', 'sanitize_url');
	register_setting('wpsb_sidebar_options','wpsb_li_url', 'sanitize_url');		
	register_setting('wpsb_sidebar_options','wpsb_pin_url', 'sanitize_url');		
	register_setting('wpsb_sidebar_options','wpsb_deactive_for_mob','sanitize_text_field');
	register_setting('wpsb_sidebar_options','wpsb_disable_for_home','sanitize_text_field');	
} 
endif;
// Add settings link to plugin list page in admin
if(!function_exists('wpsb_add_settings_link')):
function wpsb_add_settings_link( $links ) {
  $settings_link = '<a href="options-general.php?page=wpsb-settings">' . __( 'Settings', 'wpsb' ) . '</a>';
   array_unshift( $links, $settings_link );
  return $links;
}
endif;
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'wpsb_add_settings_link' );

/* 
*Display Options form for WP Social Buttons 
*/
if(!function_exists('wpsb_sidebar_admin_option_page')):
function wpsb_sidebar_admin_option_page(){ 
	// Get an array of options from the database.
	?>

	<div id="wpsb-settings"> 

	<h1>WP Social Buttons Settings</h1>

<!-- Start Options Form -->
	<form action="options.php" method="post" id="wpsb-sidebar-admin-form">
	<div id="wpsb-tab-menu"><a id="wpsb-general" class="wpsb-tab-links active" >General</a> <a  id="wpsb-advance" class="wpsb-tab-links">Advance Settings</a> <a  id="wpsb-support" class="wpsb-tab-links">Support</a> <a  id="wpsb-gopro" class="wpsb-tab-links">GO Pro</a> </div>
	<div class="wpsb-setting">
	<!-- General Setting -->	
	<div class="first wpsb-tab" id="div-wpsb-general">
	<h2>General Settings</h2>
	<p><label><strong><?php _e('Enable:');?></strong></label>&nbsp;<input type="checkbox" id="wpsb_active" name="wpsb_active" value='1' <?php if(get_option('wpsb_active')!=''){ _e( ' checked="checked"','wpexpertsin' ); }?>/></p>
	
	<p><label><strong><?php _e('Siderbar Position:');?></strong></label>&nbsp;<select id="wpsb_position" name="wpsb_position" >
				<option value="left" <?php selected(get_option('wpsb_position'),'left');?>>Left</option>
				<option value="right" <?php selected(get_option('wpsb_position'),'right');?>>Right</option>
				</select></p>
	<p><label><strong><?php _e('Disable Style Frame:');?></strong></label>&nbsp;<input type="checkbox" id="wpsb_hide_frame" value="yes" name="wpsb_hide_frame" <?php checked(get_option('wpsb_hide_frame'),'yes');?>/></p>
	<p><label><strong><?php _e('Publish Buttons:');?></strong></label>&nbsp;<input type="checkbox" id="publish1" value="yes" name="wpsb_fpublishBtn" <?php checked( get_option('wpsb_fpublishBtn'), 'yes' ); ?>/> Facebook&nbsp;<input type="checkbox" id="publish4" name="wpsb_lpublishBtn" value="yes" <?php checked( get_option('wpsb_lpublishBtn'), 'yes' ); ?>/>Linkedin&nbsp;<input type="checkbox" id="publish6" name="wpsb_ppublishBtn" value="yes" <?php checked( get_option('wpsb_ppublishBtn'), 'yes' ); ?>/> Pinterest&nbsp;<input type="checkbox" id="publish7" name="wpsb_twitterpublishBtn" value="yes" <?php checked( get_option('wpsb_twitterpublishBtn'), 'yes' ); ?>/> Twitter&nbsp;<input type="checkbox" id="publish8" name="wpsb_tumpublishBtn" value="yes" <?php checked( get_option('wpsb_tumpublishBtn'), 'yes' ); ?>/> Tumblr</p>
	
	<p><label><strong><?php _e('Delay Time:'); ?></strong><label>&nbsp;<input type="text" name="wpsb_delayTimeBtn" id="wpsb_delayTimeBtn" value="<?php _e( get_option('wpsb_delayTimeBtn') ? get_option('wpsb_delayTimeBtn') : 2000 );?>"  size="15">[<i>Publish share buttons after given time(millisecond)</i>]</p>	
	
	</div>
	
	<!-- Advance Setting -->	
	<div class="wpsb-tab" id="div-wpsb-advance">
	<h2>Advance Settings</h2>
   <p><label><strong><?php _e('Top Margin:');?></strong></label>&nbsp;<input type="text" id="wpsb_top_margin" name="wpsb_top_margin" value="<?php _e( get_option('wpsb_top_margin') ); ?>" placeholder="10% OR 10px" size="15"/></p>
	<p><label><strong><?php _e('Disable For Mobile','wpsb');?></strong></label>&nbsp;<input type="checkbox" id="wpsb_deactive_for_mob" name="wpsb_deactive_for_mob" value="yes" <?php if(get_option('wpsb_deactive_for_mob')=='yes'){ _e( 'checked="checked"');}?>/></p>
	<p><label><strong><?php _e('Disable On Home Page','wpsb');?></strong></label>&nbsp;<input type="checkbox" id="wpsb_disable_for_home" name="wpsb_disable_for_home" value="yes" <?php if(get_option('wpsb_disable_for_home')=='yes'){ _e( 'checked="checked"');}?>/></p>
	</div>
	<!-- Support -->
	<div class=" author wpsb-tab" id="div-wpsb-support">
	<h2>Plugin Support</h2>
	<table>
	<tr>
	<td width="50%"><p><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZEMSYQUZRUK6A" target="_blank" style="font-size: 17px; font-weight: bold;"><img src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" title="Donate for this plugin"></a></p>
	<p><strong>Plugin Author:</strong><a href="https://www.wp-experts.in" target="_blank">WP Experts Team</a></p>
	<p><a href="mailto:raghunath.0087@gmail.com" target="_blank" class="contact-author">Contact Author</a></p></td>
	<td><p><strong>Our Other Plugins:</strong><br>
		<ol>
					<li><a href="https://wordpress.org/plugins/custom-share-buttons-with-floating-sidebar" target="_blank">Custom Share Buttons With Floating Sidebar</a></li>
					<li><a href="https://wordpress.org/plugins/seo-manager/" target="_blank">SEO Manager</a></li>
							<li><a href="https://wordpress.org/plugins/protect-wp-admin/" target="_blank">Protect WP-Admin</a></li>
							<li><a href="https://wordpress.org/plugins/wp-sales-notifier/" target="_blank">WP Sales Notifier</a></li>
							<li><a href="https://wordpress.org/plugins/wp-tracking-manager/" target="_blank">WP Tracking Manager</a></li>
							<li><a href="https://wordpress.org/plugins/wp-categories-widget/" target="_blank">WP Categories Widget</a></li>
							<li><a href="https://wordpress.org/plugins/wp-protect-content/" target="_blank">WP Protect Content</a></li>
							<li><a href="https://wordpress.org/plugins/wp-version-remover/" target="_blank">WP Version Remover</a></li>
							<li><a href="https://wordpress.org/plugins/wp-posts-widget/" target="_blank">WP Post Widget</a></li>
							<li><a href="https://wordpress.org/plugins/wp-importer" target="_blank">WP Importer</a></li>
							<li><a href="https://wordpress.org/plugins/wp-csv-importer/" target="_blank">WP CSV Importer</a></li>
							<li><a href="https://wordpress.org/plugins/wp-testimonial/" target="_blank">WP Testimonial</a></li>
							<li><a href="https://wordpress.org/plugins/wc-sales-count-manager/" target="_blank">WooCommerce Sales Count Manager</a></li>
							<li><a href="https://wordpress.org/plugins/wp-social-buttons/" target="_blank">WP Social Buttons</a></li>
							<li><a href="https://wordpress.org/plugins/wp-youtube-gallery/" target="_blank">WP Youtube Gallery</a></li>
							<li><a href="https://wordpress.org/plugins/tweets-slider/" target="_blank">Tweets Slider</a></li>
							<li><a href="https://wordpress.org/plugins/rg-responsive-gallery/" target="_blank">RG Responsive Slider</a></li>
							<li><a href="https://wordpress.org/plugins/cf7-advance-security" target="_blank">Contact Form 7 Advance Security WP-Admin</a></li>
							<li><a href="https://wordpress.org/plugins/wp-easy-recipe/" target="_blank">WP Easy Recipe</a></li>
					</ol>
		</p></td>
	</tr>
	</table>
	</div>
	<!-- gopro -->
	<div class="author wpsb-tab" id="div-wpsb-gopro">
	<h2>Pro Verion</h2>
	<p>Please find feature of addon given below :</p>
	<ol>
		<li>Floating Sidebar</li>
		<li>Social Share Buttons</li>
		<li>An option to hide “Floating Sidebar” on page/post/product/categoyr/archive pages</li>
		<li>An option to define distance of sidebar from left/right/bottom</li>
		<li>An option to hide “Social Share Buttons” on page/post/product/categoyr/archive pages</li>
		<li>An option to define position of “Social Share Buttons” (bottom/above of content)</li>
		<li>An option to set floating sidebar position to horizontal automaticaly to mobile users</li>
		<li>An option to define “Sidebar Backgroung Color”</li>
		<li>An option to disable “Show/Hide” buttons of sidebar</li>
		<li>An option to define your message (show/hide)</li>
		<li>Show/Hide “Social Share Buttons” and “Floating Sidebar” on any specific pages</li>
		<li>An options to show/hide the social buttons</li>
		<li>An options to define the postion(Left/Right/Bottom) of floating sidebar</li>
		<li>An option To Disabe For Mobile</li>
		<li>Extra Buttons (Tumblr, Buffer, StumbleUpon, Print, Email, Youtube)</li>
		<li>An option to set feature image as pinterest image</li>
	</ol>

<p><a target="_blank" href="https://rgaddons.wordpress.com/wp-social-buttons-pro/" class="pagelink">GO Pro</a></p>
 
	</div>
	
	</div>
<p>&nbsp;</p>	
<span class="submit-btn"><?php _e( get_submit_button('Save Settings','button-primary','submit','','') );?></span>
    <?php settings_fields('wpsb_sidebar_options'); ?>
</form>
<!-- End Options Form -->
</div>
<?php
}
endif;
require dirname(__FILE__).'/wpsb-class.php';
/** add js into admin footer */
add_action('admin_footer','init_wpsb_admin_scripts');

if(!function_exists('init_wpsb_admin_scripts')):

function init_wpsb_admin_scripts() {
wp_register_style( 'wpsb_admin_style', plugins_url( 'css/wpsb-admin.css',__FILE__ ) );
wp_enqueue_style( 'wpsb_admin_style' );
wp_register_script( 'wpsb_admin_script', '');
wp_enqueue_script( 'wpsb_admin_script', '');
$script=' 
	/* WP Social Buttons js for admin */
	jQuery(document).ready(function(){
		jQuery(".wpsb-tab").hide();
		jQuery("#div-wpsb-general").show();
	    jQuery(".wpsb-tab-links").click(function(){
		var divid=jQuery(this).attr("id");
		jQuery(".wpsb-tab-links").removeClass("active");
		jQuery(".wpsb-tab").hide();
		jQuery("#"+divid).addClass("active");
		jQuery("#div-"+divid).fadeIn();
		})
		})
	 ';
wp_add_inline_script('wpsb_admin_script',$script );
}
endif;	
/* 
*Delete the options during disable the plugins 
*/
if( function_exists('register_uninstall_hook') )
	register_uninstall_hook(__FILE__,'wpsb_sidebar_uninstall');   
//Delete active status
if(!function_exists('wpsb_sidebar_uninstall')):
function wpsb_sidebar_uninstall(){
	delete_option('wpsb_active');	
}
endif; 
?>
