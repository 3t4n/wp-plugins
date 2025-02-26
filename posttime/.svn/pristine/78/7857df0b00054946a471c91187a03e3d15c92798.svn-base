<?php
/*
Plugin Name: postTime
Plugin Script: posttime.php
Plugin URI: http://www.jtb-productions.com/project/posttime/
Description: Adds a "Post Time" column to the admin menu
Version: 1.1
License: GPLv3 or later
Author: Jake Blank
Author URI: http://www.jtb-productions.com

=== RELEASE NOTES ===
2013-09-30 - v1.1 - added settings page and width option
2013-09-28 - v1.0 - first version
*/

/*
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
Online: http://www.gnu.org/licenses/gpl.txt
*/


/* Register postTime Column */
function pT_columns($columns) {
    $columns['postTime'] = 'Post Time';
    return $columns;
}
add_filter('manage_posts_columns', 'pT_columns');

/* Show postTime Column */
add_action('manage_posts_custom_column', 'pT_show_columns');
    function pT_show_columns($name) {
    	global $post;
    	switch ($name) {
    		case 'postTime':
    		$time = get_the_time('g:i:s A');
    		echo $time;
			echo ('
				<style type="text/css">
					th#postTime{
						width:'.get_option('pT_colWidth').'px;
					}
				</style>
			');
    	}
    }	

add_action('admin_menu', 'pT_plugin_settings');

function pT_plugin_settings() {

    add_menu_page('postTime Options', 'postTime', 'administrator', 'pT_settings', 'pT_display_settings');

}

function pT_display_settings() {

    $colWidth = (get_option('pT_colWidth') != '') ? get_option('pT_colWidth') : '65';

    $html = '</pre>
<div class="wrap"><form action="options.php" method="post" name="options">
<h2>Set Your Options</h2>
' . wp_nonce_field('update-options') . '
<table class="form-table" width="100%" cellpadding="10">
<tbody>
<tr>
<td width="100px" style="padding-top:0;">
Column Width:
</td>
<td scope="row" style="padding-left:0;">
<input type="range"
       min="10"
       max="200"
       step="5"
       value="' . $colWidth . '" name="pT_colWidth" style="margin-left: 5px;"></td>
</tr>
</tbody>
</table>
 <input type="hidden" name="action" value="update" />

 <input type="hidden" name="page_options" value="pT_colWidth" />

 <input type="submit" name="Submit" value="Update" /></form></div>
<pre>
';

    echo $html;

}


?>
