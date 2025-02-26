<?php
/*
Plugin Name: Akismet Spam Counter Widget
Plugin URI: http://viperfang.net/2009/07/akismet-spam-counter-widget-for-wordpress/
Description: Slot the Akismet spam counter into the page as a widget, to remove the dependency on the theme.
Version: 1.0
Author: Ben Bewick
Author URI: http://viperfang.net/
*/
/*  Copyright 2009  Ben Bewick  (email : contact me at viperfang.net)

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

add_action('plugins_loaded', 'widget_vfn_ascw_init');

// Init / install
function widget_vfn_ascw_init() {
	register_sidebar_widget('Akismet Spam Counter', 'widget_vfn_ascw');
	register_widget_control('Akismet Spam Counter', 'widget_vfn_ascw_control');
}

// Setup / control
function widget_vfn_ascw_control() {
	$options = $newoptions = get_option('widget_vfn_ascw');
	if ( $_POST['vfn_ascw-submit'] ) {
		$newoptions['title'] = strip_tags(stripslashes($_POST['vfn_ascw-title']));
		$newoptions['info'] = strip_tags(stripslashes($_POST['vfn_ascw-info']));
	}
	if ( $options != $newoptions ) {
		$options = $newoptions;
		update_option('widget_vfn_ascw', $options);
	}
	$title = htmlspecialchars($options['title'], ENT_QUOTES);
	$info = htmlspecialchars($options['info'], ENT_QUOTES);
	?>
	<div>
		<label for="vfn_ascw-title">Title: <input type="text" id="vfn_ascw-title" name="vfn_ascw-title" value="<?=$title;?>" style="width: 100%; margin-bottom: 5px;" /></label>
		<label for="vfn_ascw-info">Info: <textarea id="vfn_ascw-info" name="vfn_ascw-info" rows="5" style="width: 100%; margin-bottom: 5px;" ><?=$info;?></textarea></label>
		<input type="hidden" name="vfn_ascw-submit" id="vfn_ascw-submit" value="1" />
		<p style="padding: 3px;">Available tokens:
			<ul>
				<li>!akismettotal!</li>
				<li>!currentspam!</li>
				<li>!approved!</li>
				<li>!unapproved!</li>
			</ul>
		</p>
	</div>
<?
}

// Display / render
function widget_vfn_ascw($args) {
	extract($args);
	$options = get_option('widget_vfn_ascw');
	$title = empty($options['title']) ? 'Akismet Spam Counter' : $options['title'];
	$info = empty($options['info']) ? '!akismettotal! so far' : $options['info'];
	
	//load tokens
	$token['akismettotal'] = number_format_i18n(get_option('akismet_spam_count'));
	$token['currentspam'] = count(get_comments(array('status' => 'spam')));
	$token['approved'] = count(get_comments(array('status' => 'approve')));
	$token['unapproved'] = count(get_comments(array('status' => 'hold')));
	
	// Splice tokens into info
	foreach($token as $key => $value) {
		$info = str_replace("!$key!",$value,$info);
	}
	
	$info = str_replace("\n",'<br />',$info);
	
	// Output	
	echo '<li class="widget"><h2 class="widgettitle">';
	echo "$title</h2>$info</li>\n";
}

?>
