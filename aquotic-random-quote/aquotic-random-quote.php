<?php

/*
Plugin Name: aQuotic Random Quote
Plugin URI: http://www.aQuotic.com/wp-aQuotic/
Description: This plugin will display random quote from aQuotic.com database. So you don't have to enter quote manually.
Version: 1.0.0
Author: Kurniawan
Author URI: http://www.aQuotic.com/
*/

/* Copyright (C) 2007 Kurniawan
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
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA */
 

function aQuotic_random_quote() 
{
	if (get_option('aquotic_bgColor')) $bgColor = stripslashes(get_option('aquotic_bgColor'));	
	if (get_option('aquotic_color')) $color = stripslashes(get_option('aquotic_color'));	
	if (get_option('aquotic_fontSize')) $fontSize = stripslashes(get_option('aquotic_fontSize'));	
	if (get_option('aquotic_width')) $width = stripslashes(get_option('aquotic_width'));	
	if (get_option('aquotic_padding')) $padding = stripslashes(get_option('aquotic_padding'));	
	if (get_option('aquotic_favId')) $favId = stripslashes(get_option('aquotic_favId'));	

	$style = "";
	if ($bgColor != '') $style .= 'Background-Color:#' . $bgColor . ';';
	if ($color != '') $style .= 'Color:#' . $color . ';';
	if ($fontSize != '') $style .= 'Font-Size:' . $fontSize . ';';
	if ($textAlign != '') $style .= 'Text-Align:' . $textAlign . ';';
	if ($width != '') $style .= 'Width:' . $width . 'px' . ';';
	if ($padding != '') $style .= 'Padding:' . $padding . 'px' . ';';
	if ($color != '') $style .= 'Color:' . $color . ';';

	if ($style != '') $style = 'style="' . $style . '"';
		
	$aQuotic = 'aQuotic.com - <a href="http://localhost/website">Inspirational Quote Widget</a>';
	$divContent = '<div id="aquotic" ' . $style . '>' . $aQuotic . '</div>';

	$favIdParam = '';
	if ($favId != '') $favIdParam = '?favid=' . $favId;
	$url = 'http://localhost/website/DisplayQuote.aspx' . $favIdParam;
	$js = '<script type="text/javascript" src="' . $url .'"></script>';

	echo	$divContent . $js;
}

class aQuotic {
	var $bgColor = "CCFF00";
	var $color = "303030";
	var $fontSize = "medium";
	var $textAlign = "left";
	var $width = "";
	var $padding = "5";
	var $favId = "";		
			
	function retrieve_option()
	{
			if (get_option('aquotic_bgColor')) $bgColor = stripslashes(get_option('aquotic_bgColor'));	
			if (get_option('aquotic_color')) $color = stripslashes(get_option('aquotic_color'));	
			if (get_option('aquotic_fontSize')) $fontSize = stripslashes(get_option('aquotic_fontSize'));	
			if (get_option('aquotic_width')) $width = stripslashes(get_option('aquotic_width'));	
			if (get_option('aquotic_padding')) $padding = stripslashes(get_option('aquotic_padding'));	
			if (get_option('aquotic_favId')) $favId = stripslashes(get_option('aquotic_favId'));	
	}
	
	function update()
	{
			update_option('aquotic_bgColor', $_POST['aquotic_bgColor']);	
			update_option('aquotic_color', $_POST['aquotic_color']);	
			update_option('aquotic_fontSize', $_POST['aquotic_fontSize']);	
			update_option('aquotic_textAlign', $_POST['aquotic_textAlign']);	
			update_option('aquotic_width', $_POST['aquotic_width']);	
			update_option('aquotic_padding', $_POST['aquotic_padding']);	
			update_option('aquotic_favId', $_POST['aquotic_favId']);	
	}

	function addAdminMenu() {
		add_submenu_page('options-general.php', __('aQuotic Random Quote'), __('aQuotic Random Quote'), 5, __FILE__, array($this, 'plugin_menu'));
	}

	function buildDivContent()
	{
		if (get_option('aquotic_bgColor')) $bgColor = stripslashes(get_option('aquotic_bgColor'));	
		if (get_option('aquotic_color')) $color = stripslashes(get_option('aquotic_color'));	
		if (get_option('aquotic_fontSize')) $fontSize = stripslashes(get_option('aquotic_fontSize'));	
		if (get_option('aquotic_width')) $width = stripslashes(get_option('aquotic_width'));	
		if (get_option('aquotic_padding')) $padding = stripslashes(get_option('aquotic_padding'));	
		if (get_option('aquotic_favId')) $favId = stripslashes(get_option('aquotic_favId'));	

		$style = "";
		if ($bgColor != '') $style .= 'Background-Color:#' . $bgColor . ';';
		if ($color != '') $style .= 'Color:#' . $color . ';';
		if ($fontSize != '') $style .= 'Font-Size:' . $fontSize . ';';
		if ($textAlign != '') $style .= 'Text-Align:' . $textAlign . ';';
		if ($width != '') $style .= 'Width:' . $width . 'px' . ';';
		if ($padding != '') $style .= 'Padding:' . $padding . 'px' . ';';
		if ($color != '') $style .= 'Color:' . $color . ';';
		
		if ($style != '') $style = 'style="' . $style . '"';
		$aQuotic = 'aQuotic.com - <a href="http://localhost/website">Inspirational Quote Widget</a>';
		$divContent = '<div id="aquotic" ' . $style . '>' . $aQuotic . '</div>';

 		return $divContent;
	}
	
	function buildJavaScript()
	{
		$favIdParam = '';
		if ($favId != '') $favIdParam = '?favid=' . $favId;
		$url = 'http://localhost/website/DisplayQuote.aspx' . $favIdParam;
		$js = '<script type="text/javascript" src="' . $url .'"></script>';
		return $js;
	}
	
	function aQuoticScript()
	{
		return $this->buildDivContent(). $this->buildJavaScript();
	}
	
	function filter_aquotic($content)
	{
		$content=str_replace('<!-- aQuoticRandomQuote -->',$this->aQuoticScript(),$content);
		return $content;
	}

	function get_quote() 
	{
		if (get_option('aquotic_bgColor')) $bgColor = stripslashes(get_option('aquotic_bgColor'));	
		if (get_option('aquotic_color')) $color = stripslashes(get_option('aquotic_color'));	
		if (get_option('aquotic_fontSize')) $fontSize = stripslashes(get_option('aquotic_fontSize'));	
		if (get_option('aquotic_width')) $width = stripslashes(get_option('aquotic_width'));	
		if (get_option('aquotic_padding')) $padding = stripslashes(get_option('aquotic_padding'));	
		if (get_option('aquotic_favId')) $favId = stripslashes(get_option('aquotic_favId'));	
	}
	
	function output_select($list,$selected)
	{
		foreach($list as $key=>$value)
		{
			?><option <?php if($key==$selected){ echo "selected"; }?> value="<?php echo $key; ?>"> <?php echo $value; ?></option><?php
		}
	}		
	
	function plugin_menu() {
		 $fontSizeArr=array('xx-small' => 'xx-small',
											'x-small' => 'x-small', 
											'small' => 'small', 
											'medium' => 'medium', 
											'large' => 'large', 
											'x-large' => 'x-large', 
											'xx-large' => 'xx-large');	
			
		$textAlignArr=array('left' => 'left',
										'center' => 'center', 
										'right' => 'right');
										
											
		$message = null;
		$message_updated = __("aQuotic updated.");
		
		// update options
		if ($_POST['action'] && $_POST['action'] == 'update_success') {
			$message = $message_updated;
			$this->update();
			wp_cache_flush();
		}
		
		
		if (get_option('aquotic_bgColor')) $bgColor = stripslashes(get_option('aquotic_bgColor'));	
		if (get_option('aquotic_color')) $color = stripslashes(get_option('aquotic_color'));	
		if (get_option('aquotic_fontSize')) $fontSize = stripslashes(get_option('aquotic_fontSize'));	
		if (get_option('aquotic_width')) $width = stripslashes(get_option('aquotic_width'));	
		if (get_option('aquotic_padding')) $padding = stripslashes(get_option('aquotic_padding'));	
		if (get_option('aquotic_favId')) $favId = stripslashes(get_option('aquotic_favId'));	
?>
<?php if ($message) : ?>
<div id="message" class="updated fade"><p><?php echo $message; ?></p></div>
<?php endif; ?>

	<form name="dofollow" action="" method="post">
		<center>
		<table style="width:75%;">
			<tr valign="top">
				<td class="wrap">
					<h2><?php _e('aQuotic Random Quote Option'); ?></h2>
					aQuotic Random Quote can be included in templates using <strong>&lt;?php aQuotic_random_quote(); ?&gt;</strong>. <br />
					You also can use <strong>&lt;!-- aQuoticRandomQuote --&gt;</strong> on your post.	
					<br /><br />
					<table cellspacing="5">
						<tr>
							<td><label for="bgColor">Background color:</label></td>
							<td>#</td>
							<td>
							  	<input name="aquotic_bgColor" onChange="set_color(this,'backgroud-color','color');" size="8" value="<?php echo htmlspecialchars($bgColor, ENT_QUOTES); ?>" />
							</td>
						</tr>
						<tr>
							<td><label for="fontColor">Font color:</label></td>
							<td>#</td>
							<td>
							  	<input name="aquotic_color" onChange="set_color(this,'font-color','color');" size="8" value="<?php echo htmlspecialchars($color, ENT_QUOTES); ?>" />
							</td>
						</tr>
						<tr>
						  <td><label for="fontSize">Font size:</label></td>
						  <td></td>
						  <td>
								<select name="aquotic_fontSize" onchange="aquotic_fontsize_options(this.value);">
				        	<?php $this->output_select($fontSizeArr,$fontSize);?>
				        </select>
							</td>
						</tr>
						<tr>
							<td><label for="textAlign">Text algin:</label></td>
							<td></td>
							<td>
								<select name="aquotic_textAlign" onchange="aquotic_textalign_options(this.value);">
				        	<?php $this->output_select($textAlignArr,$textAlign);?>
				        </select>
							</td>
						</tr>
						<!--
						<tr>
							<td><label for="width">Width:</label></td>
							<td>
								<input name="aquotic_width" size="5" title="" value="<?php echo htmlspecialchars($width, ENT_QUOTES); ?>" /> px
							</td>
						</tr>
						-->			
						<tr>
							<td><label for="padding">Padding:</label></td>
							<td></td>
							<td>
								<input name="aquotic_padding" size="5" title="" value="<?php echo htmlspecialchars($padding, ENT_QUOTES); ?>" /> px
							</td>
						</tr>
						<!--
						<tr>
							<td><label for="favId">Fav Id:</label></td>
							<td>
								<input name="aquotic_favId" size="15" title="Enter multiple Channels seperated by + signs" value="<?php echo htmlspecialchars($settings['channel'], ENT_QUOTES); ?>" />
							</td>
						</tr>
						-->			
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<p class="submit">
						<input type="hidden" name="action" value="update_success" /> 
						<input type="submit" name="Submit" value="<?php _e('Update Options')?> &raquo;" /> 
					</p>
				</td>
			</tr>
	</table>	
	</center>
</form>
<?php
	} // plugin_menu
} // aQuotic

$_aQuotic_plugin = new aQuotic();
add_option("aquotic_bgColor", null, __('aQuotic background color'), 'yes');
add_option("aquotic_color", null, __('aQuotic color'), 'yes');
add_option("aquotic_fontSize", null, __('aQuotic font size'), 'yes');
add_option("aquotic_textAlign", null, __('aQuotic text align'), 'yes');
add_option("aquotic_width", null, __('aQuotic width'), 'yes');
add_option("aquotic_padding", null, __('aQuotic padding'), 'yes');
add_option("aquotic_favId", null, __('aQuotic fav id'), 'yes');
add_action('admin_menu', array($_aQuotic_plugin, 'addAdminMenu'));
add_filter('the_content', array($_aQuotic_plugin,'filter_aquotic')); 
?>