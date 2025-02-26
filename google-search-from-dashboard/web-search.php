<?php
/*
Plugin Name: Web search from dashboard.
Plugin URI: http://sethradio.com/projects/wp-plugins#gsfdb
Description: Lets you search the web form your dashboard
Version: 2.0
Author: Seth Schroeder
Author URI: http://sethradio.com
License: GPL3
Copyright (C) 2011  Seth Schroeder
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
function ws_register_settings(){	
	register_setting( 'wsfdb_options', 'ws_engine');
}
function google_search(){
echo "<div align=\"right\"><form action=\"http://google.com/search\" method=\"get\"><input type=\"text\" name=\"q\" /><input type=\"submit\" class=\"button-primary\" value=\"Search\" /></form></div>";
}
function bing_search(){
echo "<div align=\"right\"><form action=\"http://bing.com/search\" method=\"get\"><input type=\"text\" name=\"q\" /><input type=\"submit\" class=\"button-primary\" value=\"Search\" /></form></div>";
}
function yahoo_search(){
echo "<div align=\"right\"><form action=\"http://search.yahoo.com/search\" method=\"get\"><input type=\"text\" name=\"p\" /><input type=\"submit\" class=\"button-primary\" value=\"Search\" /></form></div>";
}
function ask_search(){
echo "<div align=\"right\"><form action=\"http://ask.com/web\" method=\"get\"><input type=\"text\" name=\"q\" /><input type=\"submit\" class=\"button-primary\" value=\"Search\" /></form></div>";
}
function all_search(){
echo "<div align=\"right\"><form action=\"http://back.sethradio.com/wp/plugins/fwpform.php\" method=\"get\"><input type=\"text\" name=\"q\" /><input type=\"submit\" class=\"button-primary\" value=\"Search\" /></form></div>";
}

//settings
add_action( 'admin_menu', 'ws_menu');
function ws_menu(){
	add_options_page('Web Search Settings', 'Web Search', 'administrator', 'wsfdb', ws_settings_page);
	add_action('admin_init', 'ws_register_settings');
}
function ws_settings_page(){
?>
<div class="icon32" id="icon-options-general"><br /></div><div class="wrap">
<h2>Web Search Settings</h2>
<form method="post" action="options.php">
<?php settings_fields('wsfdb_options') ?>
	<p><input type="radio" name="ws_engine" value="google" <?php if(get_option('ws_engine')=="google") echo "CHECKED"; ?> />Google</p>
	<p><input type="radio" name="ws_engine" value="yahoo" <?php if(get_option('ws_engine')=="yahoo") echo "CHECKED"; ?> />Yahoo!</p>
	<p><input type="radio" name="ws_engine" value="bing" <?php if(get_option('ws_engine')=="bing") echo "CHECKED"; ?> />Bing</p>
	<p><input type="radio" name="ws_engine" value="ask" <?php if(get_option('ws_engine')=="ask") echo "CHECKED"; ?> />Ask.com</p>
	<p><input type="radio" name="ws_engine" value="" <?php if(get_option('ws_engine')=="") echo "CHECKED"; ?> />Select on search</p>
	<p><input type="submit" value="<?php _e('Save Changes'); ?>" class="button-primary" />
<?php }
if(get_option('ws_engine')=="google")
add_action('admin_notices', google_search);
elseif(get_option('ws_engine')=="yahoo")
add_action('admin_notices', yahoo_search);
elseif(get_option('ws_engine')=="ask")
add_action('admin_notices', ask_search);
elseif(get_option('ws_engine')=="bing")
add_action('admin_notices', bing_search);
else
add_action('admin_notices', all_search);
?>