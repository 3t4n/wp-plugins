<?php
/*
Plugin Name: Skinnytip Tooltips
Plugin URI: http://www.ebrueggeman.com/skinnytip
Description: Easy JavaScript tooltip generator for your pages and posts. 
Version: 1.03
Author: Elliott Brueggeman
Author URI: http://www.ebrueggeman.com
Please see readme.txt version for more information.
*/

/*  Copyright 2008  Elliott Brueggeman  (email : ebrueggeman@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, version 3. 

License on the web: http://www.gnu.org/licenses/gpl-3.0.txt

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

//path to skinnytip folder
$skinnytip_path = get_option('siteurl') . "/wp-content/plugins/skinnytip-tooltip-generator/";

//function prints the main tooltip js file into the head
function skinnytip_header() {
	global $skinnytip_path;
	$header_text = '<!-- SkinnyTip (c) Elliott Brueggeman | www.ebrueggeman.com/skinnytip -->' . "\n";
	$header_text .= '<script type="text/javascript" src="' . $skinnytip_path . 'js/skinnytip.js"></script>' . "\n";
	print($header_text);
}

//function prints the admin specific js file into the head, allowing generation of tooltip code
function skinnytip_admin_header() {
	global $skinnytip_path;
	$header_text = '<script type="text/javascript" src="' . $skinnytip_path . 'js/skinnytip_admin.js"></script>' . "\n";
	print($header_text);
}

//prints an empty div that tooltips use
function skinnytip_div() {
	$div = '<div id="tiplayer" style="position:absolute; visibility:hidden; z-index:10000;"></div>' . "\n";
	print($div);
}

//prints admin panel that generates the tooltip code
function skinnytip_write_display() {
	global $skinnytip_path;

	?>
	<div id="postaiosp" class="postbox open">
	<h3>Skinnytip Tooltip Generator</h3>
	<div class="inside">
	<div id="postaiosp">
	<p>Generate a tooltip tag using this wizard. Specify if you want to start with either an 
	image or a text tooltip. Then enter the text to display in the tooltip and the sizing 
	and color scheme</p>

	<br/>
	
	<p><strong><label for="skinnytip_title">Tooltip Title:</label></strong> 
	<input size="32" name="skinnytip_title" id="skinnytip_title" value="" onChange="skinnytip_manage_code();" 
	 onKeyUp="skinnytip_manage_code();">
	<span style="font-style:italic; color:#666;">Optional</span></p>
	
	<p><strong><label for="skinnytip_text">Tooltip Text:</label></strong> 
	<input size="64" name="skinnytip_text" id="skinnytip_text" value="" onChange="skinnytip_manage_code();" 
	 onKeyUp="skinnytip_manage_code();"></p>
	 
	<br/>
	
	<p><strong>Tooltip Type:</strong> <input type="radio" name="skinnytip_type" id="skinnytip_type_link" 
	 value="link" onClick="skinnytip_manage_type();skinnytip_manage_code();this.blur();" checked>
	<label for="skinnytip_type_link">On Link</label>
	<input type="radio" name="skinnytip_type" id="skinnytip_type_image" value="image" 
	 onClick="skinnytip_manage_type();skinnytip_manage_code();this.blur();">
	<label for="skinnytip_type_image">On Image</label></p>
	
	<div id="skinnytip_image_div" style="display:none;">
	<table style="width:80%;">
		<tr>
			<td style="text-align:right;"><label for="skinnytip_image">Image Filename:</label></td>
			<td><input size="40" name="skinnytip_image" id="skinnytip_image" value="replace_with_image_filename" 
			 onChange="skinnytip_manage_code();" onKeyUp="skinnytip_manage_code();" 
			 onFocus="skinnytip_manage_greyed_input(this, 'true', 'replace_with_image_filename');" 
			 onBlur="skinnytip_manage_greyed_input(this, 'false', 'replace_with_image_filename'); skinnytip_manage_code();">
			</td>
		</tr>
	</table>
	</div>
	
	<div id="skinnytip_link_div">
	<table style="width:80%;">
		<tr>
			<td style="text-align:right;"><label for="skinnytip_link">Link Text:</label> </td>
			<td><input size="40" name="skinnytip_link" id="skinnytip_link" value="replace_with_link_text" onChange="skinnytip_manage_code();" 
			 onKeyUp="skinnytip_manage_code();" onFocus="skinnytip_manage_greyed_input(this, 'true', 'replace_with_link_text');" 
			  onBlur="skinnytip_manage_greyed_input(this, 'false', 'replace_with_link_text'); skinnytip_manage_code();"></td>
		</tr>
		<tr>
			<td style="text-align:right;"><label for="skinnytip_link">Link Destination:</label> </td>
			<td><input size="40" name="skinnytip_link_dest" id="skinnytip_link_dest" value="replace_with_link_dest" 
			 onChange="skinnytip_manage_code();" onKeyUp="skinnytip_manage_code();" 
			 onFocus="skinnytip_manage_greyed_input(this, 'true', 'replace_with_link_dest');" 
			 onBlur="skinnytip_manage_greyed_input(this, 'false', 'replace_with_link_dest'); skinnytip_manage_code();"></td>
		</tr>
	</table>
	</div>
	
	<p><strong>Advanced Options:</strong> 
	<input type="radio" name="skinnytip_advanced_options" id="skinnytip_advanced_options_on" value="on" 
	 onClick="skinnytip_manage_advanced();skinnytip_manage_code();this.blur();">
	<label for="skinnytip_advanced_options_on">On</label>
	<input type="radio" name="skinnytip_advanced_options" id="skinnytip_advanced_options_off" value="off" 
	 onClick="skinnytip_manage_advanced();skinnytip_manage_code();this.blur();" checked>
	<label for="skinnytip_advanced_options_off">Off</label></p>
	
	<div id="skinnytip_advanced_div" style="display:none;">
	<table style="width:80%;">
		<tr>
			<td style="text-align:right;"><label for="skinnytip_width">Width:</label></td>
			<td><input size="4" name="skinnytip_width" id="skinnytip_width" value="300" onChange="skinnytip_manage_code();" 
			 onKeyUp="skinnytip_manage_code();">px</td>
			<td style="text-align:right;"><label for="skinnytip_backcolor">Background Color:</label></td>
			<td><input size="7" name="skinnytip_backcolor" id="skinnytip_backcolor" value="#FFFFCC" 
			 onChange="skinnytip_manage_code();" onKeyUp="skinnytip_manage_code();"></td>
		</tr>
		<tr>
			<td style="text-align:right;"><label for="skinnytip_border_width">Border Width:</label></td>
			<td><input size="4" name="skinnytip_border_width" id="skinnytip_border_width" value="2" 
			 onChange="skinnytip_manage_code();" onKeyUp="skinnytip_manage_code();">px</td>
			<td style="text-align:right;"><label for="skinnytip_titlecolor">Title Color:</label></td>
			<td><input size="7" name="skinnytip_titlecolor" id="skinnytip_titlecolor" value="#000000" 
			 onChange="skinnytip_manage_code();" onKeyUp="skinnytip_manage_code();"></td>
		</tr>
		<tr>
			<td style="text-align:right;"><label for="skinnytip_title_padding">Title Padding:</label></td>
			<td><input size="8" name="skinnytip_title_padding" id="skinnytip_title_padding" value="1px" 
			 onChange="skinnytip_manage_code();" onKeyUp="skinnytip_manage_code();">
			<img src="<?php echo $skinnytip_path; ?>images/icon_lightbulb.png" onMouseOver="return tooltip('Specify padding in the CSS way, including the px unit.');" onMouseOut="return hideTip();"></td>
			<td style="text-align:right;"><label for="skinnytip_textcolor">Text Color:</label></td>
			<td><input size="7" name="skinnytip_textcolor" id="skinnytip_textcolor" value="#000000" 
			 onChange="skinnytip_manage_code();" onKeyUp="skinnytip_manage_code();"></td>
		</tr>
		<tr>
			<td style="text-align:right;"><label for="skinnytip_text_padding">Text Padding</label></td>
			<td><input size="8" name="skinnytip_text_padding" id="skinnytip_text_padding" value="1px 3px" 
			 onChange="skinnytip_manage_code();" onKeyUp="skinnytip_manage_code();">
			<img src="<?php echo $skinnytip_path; ?>images/icon_lightbulb.png" onMouseOver="return tooltip('Specify padding in the CSS way, including the px unit.');" onMouseOut="return hideTip();"></td>
			<td style="text-align:right;"><label for="skinnytip_bordercolor">Border Color:</label></td>
			<td><input size="7" name="skinnytip_bordercolor" id="skinnytip_bordercolor" value="#FFCC66" 
			 onChange="skinnytip_manage_code();" onKeyUp="skinnytip_manage_code();"></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align:center;"><input type="button" onClick="skinnytip_reset_advanced(); skinnytip_manage_code(); this.blur();" value="Reset Advanced Options"></td>
			<td colspan="2" style="text-align:center;"><a href="http://www.ebrueggeman.com/skinnytip" target="_blank">Explanation of Advanced Options</a></td>
		</tr>
	</table>
	<br/>
	</div>
	
	<br/>
	
	<strong>Generated Tooltip Code</strong> -  copy and paste this into the HTML view of your post. <span id="skinnytip_preview"></span>
	<textarea id="skinnytip_code" cols="80" rows="3"></textarea>
	
	</div>
	</div>
	</div>
	<?php
}

//add skinnytip tooltip js code to admin & page heads
add_action('wp_head', 'skinnytip_header');
add_action('admin_head', 'skinnytip_header');

//add empty skinnytip div to admin & page heads, necessary to use tooltips
add_action('wp_footer', 'skinnytip_div');
add_action('admin_footer', 'skinnytip_div');

//add js code needed to generate the proper tooltip code for the admin page
add_action('admin_head', 'skinnytip_admin_header');

//add admin widget to page and post write/edit pages
add_action('edit_form_advanced', 'skinnytip_write_display');
add_action('edit_page_form', 'skinnytip_write_display');

?>