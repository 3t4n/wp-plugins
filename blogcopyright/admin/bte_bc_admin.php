<?php
/*  Copyright 2015 - 2016  Blog Traffic Exchange
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, see {License URI}
*/


function bte_bc_head_admin() {
	//wp_enqueue_script('jquery-ui-tabs');
	echo('<link rel="stylesheet" href="' . BTEBCCSS . '" type="text/css" media="screen" />');
}

function bte_bc_options() {		
	$message = null;
	//$message_updated = __("BlogCopyright Options Updated.", 'bte_bc');
	if (!empty($_POST['bte_bc_action'])) {
		$message = $message_updated;
		if (isset($_POST['bte_bc_html_tag'])) {
			update_option('bte_bc_html_tag',$_POST['bte_bc_html_tag']);
		}
		if (isset($_POST['bte_bc_align'])) {
			update_option('bte_bc_align',$_POST['bte_bc_align']);
		}
		if (isset($_POST['bte_bc_year'])) {
			update_option('bte_bc_year',$_POST['bte_bc_year']);
		}
		if (isset($_POST['bte_bc_org_name'])) {
			update_option('bte_bc_org_name',$_POST['bte_bc_org_name']);
		}
		if (isset($_POST['bte_bc_org_html_tag'])) {
			update_option('bte_bc_org_html_tag',$_POST['bte_bc_org_html_tag']);
		}
		if (isset($_POST['bte_bc_url'])) {
			update_option('bte_bc_url',$_POST['bte_bc_url']);
		}
		if (isset($_POST['bte_bc_rights'])) {
			update_option('bte_bc_rights',$_POST['bte_bc_rights']);
		}
		if (isset($_POST['bte_bc_add'])) {
			update_option('bte_bc_add',$_POST['bte_bc_add']);
		}	
	}
	
	$bte_bc_html_tag = get_option('bte_bc_html_tag');
	if (!isset($bte_bc_html_tag)) {
		$bte_bc_html_tag = "div";
	}
	$bte_bc_align = get_option('bte_bc_align');
	if (!isset($bte_bc_align)) {
		$bte_bc_align = "center";
	}
	$bte_bc_year = get_option('bte_bc_year');
	if (!isset($bte_bc_year)) {
		$bte_bc_year = date('Y');
	}
	$bte_bc_org_name = get_option('bte_bc_org_name');
	if (!isset($bte_bc_org_name)) {
		$bte_bc_org_name = get_bloginfo('name');
	}
	$bte_bc_org_html_tag = get_option('bte_bc_org_html_tag');
	if (!isset($bte_bc_org_html_tag)) {
		$bte_bc_org_html_tag = 'strong';
	}
	$bte_bc_url = get_option('bte_bc_url');
	if (!isset($bte_bc_url)) {
		$bte_bc_url = get_bloginfo('url');
	}
	$bte_bc_rights = get_option('bte_bc_rights');
	if (!isset($bte_bc_rights)) {
		$bte_bc_rights = 'All Rights Reserved';
	}
	$bte_bc_add = get_option('bte_bc_add');
	if (!isset($bte_bc_add)) {
		$bte_bc_add = true;
	}
	$bte_bc_link = true;
?>
	<div class="wrap">
	<div id="bte_bc">
		<? if (!empty($_POST['bte_bc_action'])) {
			print('<div id="message" class="updated fade"><p>'.__('BlogCopyright settings successfully updated.', 'bte_bc').'</p></div>');
		} ?>
		<div class="bc_head"><? print('<h1>'.__('Blog Copyright (BC) Settings', 'bte_bc').'</h1>'); ?><span><? print(__('Created by', 'bte_bc')); ?> <a href="http://www.blogtrafficexchange.com" target="_blank"><? print('<b>'.__('Blog Traffic Exchange', 'bte_bc').'</b>'); ?></a></span></div>
		
		<div class="bc_head bc_top">
			<form id="bc_bte" name="bc_bte_form" action="<?=get_bloginfo('wpurl')?>/wp-admin/admin.php?page=blogcopyright" method="post">
			<input type="hidden" name="bte_bc_action" value="bc_bte_update_settings" />
			<table cellpadding="10" cellspacing="0" border="0">
				<tr><td><label for="bte_bc_html_tag"><? print(__('Copyright Enclosure Tag', 'bte_bc')); ?></label></td>
					<td><select name="bte_bc_html_tag" id="bte_bc_html_tag">
							<option value="div" <?=bte_bc_optionselected('div',$bte_bc_html_tag);?>>< div >... < / div ></option>
							<option value="p" <?=bte_bc_optionselected('p',$bte_bc_html_tag);?>>< p >... < / p ></option>
							<option value="span" <?=bte_bc_optionselected('span',$bte_bc_html_tag);?>>< span >... < / span ></option>
						</select>
					</td>
				</tr>
				<tr><td valign="top" style="padding-top:15px"><label for="bte_bc_align"><? print(__('Copyright Alignment', 'bte_bc')); ?></label></td>
					<td><select name="bte_bc_align" id="bte_bc_align">
							<option value="center" <?=bte_bc_optionselected('center',$bte_bc_align);?>>Center</option>
							<option value="left" <?=bte_bc_optionselected('left',$bte_bc_align);?>>Left</option>
							<option value="right" <?=bte_bc_optionselected('right',$bte_bc_align);?>>Right</option>
						</select><br><span style="color:blue; font-size:10px">< span >... < / span > HTML tag does not work with alignment.</span>
					</td>
				</tr>
				<tr><td><label for="bte_bc_year"><? print(__('Starting Year', 'bte_bc')); ?></label></td>
					<td><input name="bte_bc_year" type="text" value="<?=htmlspecialchars(stripslashes($bte_bc_year))?>" /></td>
				</tr>
				<tr><td><label for="bte_bc_org_html_tag"><? print(__('Organization Enclosure Tag', 'bte_bc')); ?></label></td>
					<td><select name="bte_bc_org_html_tag" id="bte_bc_org_html_tag">
							<option value="strong" <?=bte_bc_optionselected('strong',$bte_bc_org_html_tag);?>>< strong >... < / strong ></option>
							<option value="i" <?=bte_bc_optionselected('i',$bte_bc_org_html_tag);?>>< i >... < / i ></option>
						</select>
					</td>
				</tr>
				<tr><td><label for="bte_bc_org_name"><? print(__('Organization Name', 'bte_bc')); ?></label></td>
					<td><input name="bte_bc_org_name" type="text" value="<?=htmlspecialchars(stripslashes($bte_bc_org_name))?>" /></td>
				</tr>
				<tr><td><label for="bte_bc_url"><? print(__('Organization URL', 'bte_bc')); ?></label></td>
					<td><input name="bte_bc_url" type="text" value="<?=htmlspecialchars(stripslashes($bte_bc_url))?>" /></td>
				</tr>
				<tr><td><label for="bte_bc_rights"><? print(__('Rights Reserved', 'bte_bc')); ?></label></td>
					<td><select name="bte_bc_rights" id="bte_bc_rights">
							<option value="<? echo BTEARR; ?>" <?=bte_bc_optionselected(BTEARR,$bte_bc_rights);?>><? echo BTEARR; ?></option>
							<option value="<? echo BTEBLK; ?>" <?=bte_bc_optionselected(BTEBLK,$bte_bc_rights);?>><? echo BTEBLK; ?></option>
						</select>
					</td>
				</tr>
				<tr><td><label for="bte_bc_add"><? print(__('Automaticaly add to footer', 'bte_bc')); ?></label></td>
					<td><select name="bte_bc_add" id="bte_rs_add" style="width:100px">
							<option value="0" <?=bte_bc_optionselected(0,$bte_bc_add)?>><? print(__('No', 'bte_bc')); ?></option>
							<option value="1" <?=bte_bc_optionselected(1,$bte_bc_add)?>><? print(__('Yes', 'bte_bc')); ?></option>
						</select> <? print('('.__('your theme must have a call to "wp_footer()" otherwise you will have to place manually'.')', 'bte_bc')); ?>
					</td>
				</tr>				
				<tr><td>&nbsp;</td><td><input type="submit" name="submit" value="<? print(__('Update Settings', 'bte_bc')); ?>" /></td></tr>
				<tr><td colspan="2">Copyright statement will look like this...<br><br><?=bte_bc_get_html()?></td></tr>
				<tr><td colspan="2"><p>To manually place the copyright notice place this code within your theme (typically in the footer).</p>
					<p><strong><code>&lt;?php if (function_exists('bte_bc_tag')) { bte_bc_tag(); } ?&gt;</code></strong></p>
				</td></tr>
			</table>
			</form>
		</div>	
		<div class="bc_head bc_top">
			<h3>Other  <a href="http://www.blogtrafficexchange.com/wordpress-plugins/">Wordpress Plugins</a> Coming up from Blog Traffic Exchange</h3>
			<ol><li><a href="http://www.blogtrafficexchange.com/related-websites">Related Websites</a></li>
				<li><a href="http://www.blogtrafficexchange.com/related-tweets/">Related Tweets</a></li>
				<li><a href="http://www.blogtrafficexchange.com/wordpress-backup/">Wordpress Backup</a></li>
				<li><a href="http://www.blogtrafficexchange.com/blog-copyright">Blog Copyright</a></li>
				<li><a href="http://www.blogtrafficexchange.com/related-posts">Related Posts</a></li>
			</ol>
		</div>
	</div>	
	</div>
<? }

function bte_bc_optionselected($opValue, $value) {
	if($opValue==$value) {
		return 'selected="selected"';
	}
	return '';
}

function bte_bc_options_setup() {	
	add_menu_page (
    'BlogCopyright',
    'Blog Copyright',
    'manage_options',
    'blogcopyright',
    'bte_bc_options',
    BTEBCICONURL //,'1'
);
}

?>
