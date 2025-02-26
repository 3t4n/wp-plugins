<?php
/*
Plugin Name: Auto-Fill Infusionsoft Forms
Plugin URI: https://www.geekgoddess.com/auto-fill-infusionsoft-forms/
Description: Automatically Pre-Fill Infusionsoft Web Forms and Legacy Order Forms with data passed to the form in the URL
Version: 1.0.4
Author: Jaime Lerner - the Geek Goddess
Author URI: https://www.geekgoddess.com
License: GPL2
Copyright: Jaime Lerner

Auto-Fill Infusionsoft Forms is free software: you can redistribute it and/or modify  it under the terms of the GNU General Public License as published by  the Free Software Foundation, either version 2 of the License, or  any later version.
 
Auto-Fill Infusionsoft Forms is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See http://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html for for more details.
*/

  ////////////////////// KILL DIRECT ACCESS ////////////////////////////////////////////////////////

  if(!defined('ABSPATH')){ exit; }

  ////////////////////// SETTINGS PAGE /////////////////////////////////////////////////////////////

  function gg_af_plugin_menu() {  
  	add_options_page('Auto-Fill Infusionsoft Forms Settings', 'Auto-Fill Infusionsoft Forms', 'administrator', 'gg-af-plugin-settings', 'gg_af_plugin_settings_page');
  }

  function gg_af_plugin_settings_page() {
    $ggAppId = get_option('gg_af_app_id');
    $ggTrackingId = get_option('gg_af_tracking_id');
    $ggCustomFieldsCell = get_option('gg_custom_fields_cell');
    ?>
    <div class="wrap">
    <h2><?php _e("Auto-Fill Infusionsoft Forms Settings","gg-af-plugin-settings"); ?></h2>
    <form method="post" action="options.php">
    <?php settings_fields('gg-af-plugin-settings-group'); ?>
    <?php do_settings_sections('gg-af-plugin-settings-group'); ?>
    <table class="form-table" style="width:780px;max-width: 100%">
      <tr valign="top">
        <td colspan="2" scope="row"><?php _e("<h3 style=\"margin-top:0;\"><strong>Web Analytics Tracking Code</strong></h2>If you'd like to automatically insert your Infusionsoft Tracking Code site-wide, you can do so here.<br /><br /><strong>Note: If you use this option, you should remove the tracking code link from your web form embed code (HTML versions only).</strong>","gg-af-plugin-settings");?></td>
      </tr>
      <tr valign="top">
        <td scope="row"><?php _e("Enter your Infusionsoft app name:","gg-af-plugin-settings");?></td>
        <td><input type="text" name="gg_af_app_id" style="min-width:370px" value="<?php echo _e("$ggAppId","gg-af-plugin-settings"); ?>" /></td>
      </tr>
      <tr valign="top">
        <td colspan="2" scope="row"><?php _e("Your Infusionsoft app name is the first section of the URL for your Infusionsoft app. For example, if your url was https://ab123.infusionsoft.com, your app name would be <strong>ab123</strong>.","gg-af-plugin-settings");?></td>
      </tr>
      <tr valign="top">
        <td colspan="2" scope="row"><?php _e("<h3 style=\"margin-top:0;\"><strong>Form Fields</strong></h2>Customize and add additional* form fields here. FirstName, LastName, Email, Phone1, StreetAddress1, StreetAddress2, City, State, Postal Code and Country are all automatically filled.<br /><span style='font-size:smaller'><em>* Pro Version only</em></span>","gg-af-plugin-settings");?></td>
      </tr>
      <tr valign="top">
        <td scope="row"><?php _e("Enter the Infusionsoft field you use for cell phone (if applicable):","gg-af-plugin-settings");?></td>
        <td><select name="gg_custom_fields_cell" style="min-width:370px">
          <option value=""></option>
          <option value="Phone2"<?php if($ggCustomFieldsCell=="Phone2"){ echo " selected=\"selected\""; } ?>><?php _e("Phone 2","gg-af-plugin-settings"); ?></option>
          <option value="Phone3"<?php if($ggCustomFieldsCell=="Phone3"){ echo " selected=\"selected\""; } ?>><?php _e("Phone 3","gg-af-plugin-settings"); ?></option>
          <option value="Phone4"<?php if($ggCustomFieldsCell=="Phone4"){ echo " selected=\"selected\""; } ?>><?php _e("Phone 4","gg-af-plugin-settings"); ?></option>
          <option value="Phone5"<?php if($ggCustomFieldsCell=="Phone5"){ echo " selected=\"selected\""; } ?>><?php _e("Phone 5","gg-af-plugin-settings"); ?></option>
        </select>
        </td>
      </tr>
    </table>
    <?php submit_button(); ?>
    </form>
    <table class="form-table" style="width:780px;max-width: 100%;border:1px solid #e5e5e5;background-color:#fff;">
      <tr valign="top">
        <td colspan="2" scope="row"><?php _e("<h3 style=\"margin-top:0;\"><strong>Pro Version</strong></h3>The Pro version of this plugin is coming soon. Included in the Pro version will be:<ul style=\"list-style-type:disc;margin-left:20px;\"><li>The ability to add in additional custom fields to auto-fill</li><li>Edit the placeholder text</li><li>Add in the LeadSource field to capture lead source IDs for tracking</li><li>Automatically add in custom fields to capture Google Analytics variables</li><li>Add custom CSS to make your forms instantly responsive and cleanly laid out (beta)<li>...and more</li></ul> When available, information will be listed here.","gg-af-plugin-settings");?></td>
      </tr>
    </table>
    </div>
   <?php 
  }
  
  // Save settings to options
  function gg_af_plugin_settings() {
  	register_setting( 'gg-af-plugin-settings-group', 'gg_af_app_id' );
  	//register_setting( 'gg-af-plugin-settings-group', 'gg_af_tracking_id' );
  	register_setting( 'gg-af-plugin-settings-group', 'gg_custom_fields_cell' );
  }
  
  // Add settings link on plugin page
  function gg_af_plugin_settings_link($links) { 
    $settings_link = '<a href="options-general.php?page=gg-af-plugin-settings">Settings</a>'; 
    array_unshift($links, $settings_link); 
    return $links; 
  }
  
  //////////////////////// AUTO-FILL THE FORMS!  ////////////////////////////////////////
  
  function gg_af_js_code(){
    wp_register_script("autoinf-js",plugins_url()."/auto-fill-infusionsoft-forms/js/autoinf.js",array("jquery"),false);
    wp_enqueue_script( 'autoinf-js');
  }


  //////////////////////// CUSTOM OPTIONS  ////////////////////////////////////////
  
  function gg_customjs_code(){
    $ggCustomFieldsCell = get_option('gg_custom_fields_cell');
    if($ggCustomFieldsCell!=""){
      ?>
  <script type="text/javascript">
    jQuery(document).ready(function(){
      jQuery(".nolabel input[name='inf_field_<?php echo $ggCustomFieldsCell; ?>'], .nolabel input[name='Contact0<?php echo $ggCustomFieldsCell; ?>']").prop('placeholder','Cell Phone Number');
    });
  </script>
    <?php
    }
  }


  //////////////////////// ADD TRACKING CODE  ////////////////////////////////////////
  
  function gg_af_tracking_code(){
    $appName = get_option('gg_af_app_id');
    $appTrackingID = get_option('gg_af_tracking_id');
    $code="<h1><strong>this is a test</strong></h1>";
    if($appName){  // check if string is not empty
      echo "<script type=\"text/javascript\" src=\"https://".$appName.".infusionsoft.com/app/webTracking/getTrackingCode\"></script>\n";
    }
  }

add_action('admin_menu', 'gg_af_plugin_menu');// create a menu entry where we can place our settings user interface
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'gg_af_plugin_settings_link');
add_action('admin_init', 'gg_af_plugin_settings');
add_action('wp_enqueue_scripts', 'gg_af_js_code',15);
add_action('wp_footer','gg_af_tracking_code');
add_action('wp_footer','gg_customjs_code');
