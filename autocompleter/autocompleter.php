<?php
/*
Plugin Name: Autocompleter
Plugin URI: http://nik.chankov.net/autocompleter
Description: Create autocomplete search form.
Version: 1.3.5.2
Author: Nik Chankov
Author URI: http://nik.chankov.net
*/

/*
  Copyright 2008 Nik Chankov (http://nik.chankov.net/)

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
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

$path = dirname(dirname(dirname(dirname(__FILE__))));
require_once($path.'/wp-config.php');

/* Add Prototype and Script.aculo.us to the head */
function lib_javascript_autocompleter(){
	wp_enqueue_script('jquery');
	wp_enqueue_script('autocompleter',WP_PLUGIN_URL.'/autocompleter/jquery.autocomplete.js',array('jquery'),'1.0'); 
}
add_action('init', 'lib_javascript_autocompleter');

/* Add the autocompleter css */
function css_autocompleter(){
	//Style
	wp_register_style('autocompleter', WP_PLUGIN_URL.'/autocompleter/autocompleter.css');
	wp_enqueue_style('autocompleter');
	wp_print_styles();
}

function autocomplete_link_function() {
	if(get_option('autocompleter_link')==0){
		echo '<div style="text-align:center; font-size: 80%;"><a href="http://nik.chankov.net">web development</a></div>';
	}
}
add_action('wp_footer', 'autocomplete_link_function');


add_action('wp_head', 'css_autocompleter');

/* function which write the javascript call for autocomplete */
/* Add the autocompleter css */
function javascript_autocompleter(){
	$matches = (get_option('autocompleter_matches_label')!='')?get_option('autocompleter_matches_label'):'matches';
	$autosubmit = (get_option('autocompleter_autosubmit')==1)?'
		function onSelectItem(row){
			if(typeof(jQuery(row).find(\'span\').attr(\'attr\')) != \'undefined\'){
				window.location = jQuery(row).find(\'span\').attr(\'attr\').toString();
			} else {
				if(typeof(jQuery(\'input[name="s"]\').parents("form").find(\'input[type="submit"]\')) == "object"){
					jQuery(\'input[name="s"]\').parents("form").find(\'input[type="submit"]\').trigger("click");
				} else {
					jQuery(\'input[name="s"]\').parents("form").submit();
				}
			}
		}':'function onSelectItem(row){jQuery("input#s").focus();}';
	$extra = (get_option('autocompleter_show_items')==1)?'
		function formatItem(row) {
			if(row.length == 3){
				var attr = "attr=\"" + row[2] + "\"";
			} else {
				attr = "";
			}
			return "<span "+attr+">" + row[1] + " '.$matches.'</span>" + row[0];
		}':'
		function formatItem(row) {
			var attr;
			if(row.length == 3){
				attr = "attr=\"" + row[2] + "\"";
			} else {
				attr = "";
			}
			return row[0] + "<span "+attr+"></span>"
		}';
	$results = (get_option('autocompleter_results')!='')?get_option('autocompleter_results'):1;
	echo '<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery("input[name=s]").autocomplete(
				"'.WP_PLUGIN_URL.'/autocompleter/values.php",
				{
					delay:10,
					minChars:2,
					matchSubset:1,
					matchContains:1,
					cacheLength:10,
					formatItem:formatItem,
					onItemSelect:onSelectItem,
					autoFill:true
				}
			);
		});
		
		'.$autosubmit.'
		
		'.$extra.'

	</script>';
}

function autocompleter_options(){
	if($_POST['autocompleter_save']){
		update_option('autocompleter_show_items',$_POST['autocompleter_show_items']);
		update_option('autocompleter_matches_label',$_POST['autocompleter_matches_label']);
		update_option('autocompleter_autosubmit',$_POST['autocompleter_autosubmit']);
		update_option('autocompleter_link',$_POST['autocompleter_link']);
		update_option('autocompleter_results',$_POST['autocompleter_results']);
		echo '<div class="updated"><p>Changes were saved successfully.</p></div>';
	}
	?>
	<div class="wrap">
	<h2>Autocompleter Options</h2>
	<form method="post" id="autocompleter_options">
		<fieldset class="options">
		<legend></legend>
		<table width="100%" cellspacing="2" cellpadding="5" class="editform"> 
			<tr valign="top"> 
				<th width="33%" scope="row" style="text-align: right;">Display number of items per result:</th> 
				<td><input name="autocompleter_show_items" type="hidden" id="autocompleter_show_items" value="0"><input name="autocompleter_show_items" type="checkbox" id="autocompleter_show_items" <?php echo (get_option('autocompleter_show_items') == 1)?'checked="true"':'';?> value="1"/></td>
				<td width="20%">&nbsp;</td>
				<td  width="30%"><em>add number of items found in the blog in the search results.</em></td> 
			</tr>
			<tr><td colspan="4">&nbsp;</td><tr>
			<tr valign="top"> 
				<th width="33%" scope="row" style="text-align: right;">Label for 'matches':</th> 
				<td><input name="autocompleter_matches_label" type="text" id="autocompleter_matches_label" size="10"value="<?php echo (get_option('autocompleter_matches_label')!='')?get_option('autocompleter_matches_label'):'matches';?>" /></td>
				<td width="20%">&nbsp;</td>
				<td  width="30%"><em>It's a kinda of label translation for the wors 'matches' in the autocompleter suggestion.</em></td> 
			</tr>
			<tr><td colspan="4">&nbsp;</td><tr>
			<tr valign="top"> 
				<th width="33%" scope="row" style="text-align: right;">Autosubmit the form on select an option:</th> 
				<td><input name="autocompleter_autosubmit" type="hidden" id="autocompleter_autosubmit" value="0"><input name="autocompleter_autosubmit" type="checkbox" id="autocompleter_autosubmit" <?php echo (get_option('autocompleter_autosubmit') == 1)?'checked="true"':'';?> value="1"/></td>
				<td width="20%">&nbsp;</td>
				<td  width="30%"><em>if an option is selected, the search form automatically is triggered.</em></td> 
			</tr>
			<tr><td colspan="4">&nbsp;</td><tr>
			<tr valign="top">
				<th width="33%" scope="row" style="text-align: right;">Results:</th> 
				<td>
					<input type="radio" name="autocompleter_results" <?php echo (get_option('autocompleter_results') == 1 || get_option('autocompleter_results') === false)?'checked="true"':'';?> value="1"><label>Tags and categories</label><br/>
					<input type="radio" name="autocompleter_results" <?php echo (get_option('autocompleter_results') == 2)?'checked="true"':'';?> value="2"><label>Only tags</label><br/>
					<input type="radio" name="autocompleter_results" <?php echo (get_option('autocompleter_results') == 3)?'checked="true"':'';?> value="3"><label>Only categories</label><br/>
					<input type="radio" name="autocompleter_results" <?php echo (get_option('autocompleter_results') == 4)?'checked="true"':'';?> value="4"><label>Posts and pages titles</label><br/>
					<input type="radio" name="autocompleter_results" <?php echo (get_option('autocompleter_results') == 5)?'checked="true"':'';?> value="5"><label>Posts titles</label><br/>
					<input type="radio" name="autocompleter_results" <?php echo (get_option('autocompleter_results') == 6)?'checked="true"':'';?> value="6"><label>Pages titles</label>
				</td>
				<td width="20%">&nbsp;</td>
				<td  width="30%"></td> 
			</tr>
			<tr><td colspan="4">&nbsp;<br/><br/></td><tr>
			<tr valign="top"> 
				<th width="33%" scope="row" style="text-align: right;">Display author's link:</th> 
				<td><input name="autocompleter_link" type="hidden" value="1"><input name="autocompleter_link" type="checkbox" <?php echo (get_option('autocompleter_link') == 0)?'checked="true"':'';?> value="0"/></td>
				<td width="20%">&nbsp;</td>
				<td  width="30%"><em>If it's checked a link will be placed in the footer of your web page pointing to the autor's web site. I would appreciate if you keep this link on your site. Thanks!</em></td> 
			</tr>
		</table>
		<p class="submit"><input type="submit" name="autocompleter_save" value="Save" /></p>
		</fieldset>
	</form>
	</div>
	<?php
}

function autocompleter_adminmenu(){
	add_options_page('Autocompleter Options', 'Autocompleter', 8, __FILE__, 'autocompleter_options');
}
add_action('admin_menu','autocompleter_adminmenu',1);

add_action('wp_head', 'javascript_autocompleter', 1000);

// Add settings link on plugin page
function autocompleter_settings_link($links) { 
  $settings_link = '<a href="options-general.php?page=autocompleter/autocompleter.php">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
add_filter( 'plugin_action_links', 'autocompleter_settings_link', 10, 2 );
?>