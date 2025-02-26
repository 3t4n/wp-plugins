<?php
/* 
Plugin Name: Adblock blocker
Plugin URI: http://www.designersblog.net
Version: 1.2
Author: <a href="http://www.designersblog.net">Designersblog.net</a>
Description: A great plugin from the developers of Designersblog.net that will send a popup to people who have the Adblock browser extension installed.

 
Copyright 2012  Designersblog.net  (email : info@buitengewoonuniek.nl )

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/
if (!class_exists("DesignersblogAdblockblocker")) {
	class DesignersblogAdblockblocker {
		function DesignersblogAdblockblocker() { // constructor
			
		}
	
	}

} // End Class DesignersblogAdblockblocker

if (class_exists("DesignersblogAdblockblocker")) {
	$dl_pluginSeries = new DesignersblogAdblockblocker();
}
// Actions and Filters	
if (isset($dl_pluginSeries)) {
	//Start
	function AdblockBlockerHead() {
		include('scripts/loadhead.php');
		wp_enqueue_script("jquery");
	}
	function AdblockBlockerFooter() {
		include('scripts/loadfooter.php');
	}
	add_action('wp_head','AdblockBlockerHead'); 
	add_action('wp_footer','AdblockBlockerFooter'); 
	}
	
	// Add settings link on plugin page
function your_plugin_settings_link($links) { 
  $settings_link = '<a href="options-general.php?page=Adblock-blocker">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'your_plugin_settings_link' );

	register_activation_hook(__FILE__,'db_adblock_blocker_install');
	register_deactivation_hook( __FILE__, 'db_adblock_blocker_remove' );
	function db_adblock_blocker_install() {
	add_option("db_adblock_blocker_data_text", 'It seems like you have the browser extension Adblock installed. Please consider disabling this extension before visiting our website.', 'This is my first plugin panel data.', 'yes');
	add_option("db_adblock_blocker_data_title", 'Adblock detected', 'This is my first plugin panel data.', 'yes');
	add_option("db_adblock_ugroup", 'a:1:{s:9:"reg_users";s:4:"true";}', '', 'yes');
	add_option("db_adblock_allpages", 'a:1:{s:4:"page";s:5:"all";}', '', 'yes');
	}
	function db_adblock_blocker_remove() {
	delete_option('db_adblock_blocker_data_text');
	delete_option('db_adblock_blocker_data_title');
	delete_option('db_adblock_ugroup');
	delete_option('db_adblock_allpages');
	}
	add_action('admin_menu', 'db_adblock_blocker_admin_menu');
	function db_adblock_blocker_admin_menu() {
	add_options_page('Plugin Admin Options', 'Adblock blocker', 'manage_options',
	'Adblock-blocker', 'plugin_admin_options_page');
	}
?>
<?php
	function plugin_admin_options_page() {
?>
    <div class="wrap">
    <?php screen_icon(); ?>
    <h2>Adblock blocker settings</h2>
    <form method="post" action="options.php">
	<?php wp_nonce_field('update-options'); ?>
    <div style="height: 280px; width: auto;">
    <div style="float: left; width: 49%;">
    	<table class="widefat" style="margin-top: 15px;">
    		<thead>
    			<tr> 
    				<th><span style="margin-top: 20px; font-size: 14px;font-family: Helvetica, Arial, Sans-Serif;text-decoration: none; margin-left: 3px; color: #737373;">Adblock blocker - main text settings</span></th>
    			</tr>
    		</thead>
    		<tbody>
    			<tr>
    				<td>
    					<div style="margin: 10px;">
             		   	<h3 style="font-size: 14px;font-family: Helvetica, Arial, Sans-Serif;text-decoration: none; margin-left: 3px; color: #737373; margin-bottom: 0px;" >Title:</h3>
           	 	    	<input style="width: 100%;" name="db_adblock_blocker_data_title" type="text" id="db_adblock_blocker_data_title" value="<?php echo get_option('db_adblock_blocker_data_title'); ?>" />
           		     	<h3 style="font-size: 14px;font-family: Helvetica, Arial, Sans-Serif;text-decoration: none; margin-left: 3px; color: #737373; margin-bottom: 0px;">Main text:</h3><textarea name="db_adblock_blocker_data_text" id="db_adblock_blocker_data_text" style="width: 100%; height: 100px; resize: none;"><?php echo get_option('db_adblock_blocker_data_text'); ?></textarea><br />
    	            	</div>
                	</td>
                </tr>
            </tbody>
		</table>
	</div>
	<div style="float: right; width: 49%;">
    	<table class="widefat" style="margin-top: 15px;">
    		<thead>
    			<tr> 
    				<th><span style="margin-top: 20px; font-size: 14px;font-family: Helvetica, Arial, Sans-Serif;text-decoration: none; margin-left: 3px; color: #737373;">Adblock blocker - Show settings</span></th>
    			</tr>
    		</thead>
    		<tbody>
    			<tr>
    				<td>
    					<div style="margin: 10px;">
           		     	<h3 style="font-size: 14px;font-family: Helvetica, Arial, Sans-Serif;text-decoration: none; margin-left: 3px; color: #737373; margin-bottom: 0px;">Show settings:</h3>
           		     	<h2 style="font-size: 13px;font-family: Helvetica, Arial, Sans-Serif;text-decoration: none; margin-left: 3px; color: #737373; margin-bottom: 0px;">
           		     	Show Adblock-popup to registered users?</h2><span style="font-size: 13px;font-family: Helvetica, Arial, Sans-Serif;text-decoration: none; margin-left: 3px; color: #737373; margin-bottom: 0px;" ><?php $db_adblock_ugroup = get_option( 'db_adblock_ugroup' ); ?><input type="radio" style="margin-left: 15px;" name="db_adblock_ugroup[reg_users]" value="true"<?php checked( 'true' == $db_adblock_ugroup['reg_users'] ); ?> /> Yes <input type="radio" style="margin-left: 12px;" name="db_adblock_ugroup[reg_users]" value="false"<?php checked( 'false' == $db_adblock_ugroup['reg_users'] ); ?> /> No</br></span>
    	            	<h2 style="font-size: 13px;font-family: Helvetica, Arial, Sans-Serif;text-decoration: none; margin-left: 3px; color: #737373; margin-bottom: 0px;">
          		      	Show Adblock-popup on the following pages:</h2><span style="font-size: 13px;font-family: Helvetica, Arial, Sans-Serif;text-decoration: none; margin-left: 3px; color: #737373; margin-bottom: 0px;" ><?php $db_adblock_allpages = get_option( 'db_adblock_allpages' ); ?><input type="radio" style="margin-left: 15px;" name="db_adblock_allpages[page]" value="all"<?php checked( 'all' == $db_adblock_allpages['page'] ); ?> /> All <input type="radio" style="margin-left: 12px;" name="db_adblock_allpages[page]" value="index"<?php checked( 'index' == $db_adblock_allpages['page'] ); ?> /> Only on index/home<input type="radio" style="margin-left: 12px;" name="db_adblock_allpages[page]" value="post"<?php checked( 'post' == $db_adblock_allpages['page'] ); ?> /> Only on posts/pages</br></span>
    	            	</div>
                	</td>
                </tr>
            </tbody>
		</table>
	</div>
	</div>
	<input type="hidden" name="action" value="update" />
   	<input type="hidden" name="page_options" value="db_adblock_blocker_data_title,db_adblock_blocker_data_text,db_adblock_ugroup,db_adblock_allpages" />
   	<input style="margin-top: 10px; margin-bottom: 10px; vertical-align: middle; clear: both;" class="button-primary" type="submit" value="Save Changes" />
    </form>
    </div>
<?php
}
?>