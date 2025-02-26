<?php
/*
Plugin Name: Ajax Categories Posts Dropdown
Plugin URI: http://learn-thai-podcast.com/ajax-categories-posts-dropdown/
Description: Plugin and widget that creates an easy to use Ajax dropdown of all categories. After selecting a category all posts of this category are shown in the next dropdown.
Version: 1.0
Author: Jay Schmidt
Author URI: http://learn-thai-podcast.com

	Copyright: 2010 Jay Thune
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA


########################################

If you like this plugin please include a link to 
<a href="http://learn-thai-podcast.com" title="Learn Thai">Learn Thai</a>
somewhere on your site.

########################################
*/

add_action('wp_head', 'acpd_add_js');
add_action('plugins_loaded','acpd_loaded');

// Add js files
function acpd_add_js()
{
	echo '<script type="text/javascript" src="'.get_bloginfo("url").'/wp-content/plugins/ajax-cats-posts-dropdown/js/ajax.js"></script>';
	echo '<script type="text/javascript" src="'.get_bloginfo("url").'/wp-content/plugins/ajax-cats-posts-dropdown/js/main.js"></script>';
	echo '<link rel="stylesheet" href="'.get_bloginfo("url").'/wp-content/plugins/ajax-cats-posts-dropdown/css/style.css" type="text/css" media="screen" />';
}

function acpd_loaded()
{
	register_sidebar_widget('Ajax Dropdown', 'acpd_widget');	
	register_widget_control('Ajax Dropdown', 'acpd_widget_config');
}

function acpd_widget($args)

{
extract($args);
echo $before_widget;
echo $before_title . $after_title;
acpd_display("");
echo $after_widget;
}



function acpd_display($acdp_title) {
	
	if ($acdp_title == "") {
	$acdp_title = (get_option(acpd_title) == "") ? "Quick Navigation" : get_option(acpd_title);
	}
	
	echo '<h2 id="acdp_title" class="widgettitle">'.$acdp_title.'</h2><form name="acdp_form">';
	$select = wp_dropdown_categories('show_option_none=Select category&show_count=1&orderby=name&echo=0&name=acpd_cats');
	$select = preg_replace("#<select([^>]*)>#", "<select$1 onchange='getacpd_postsList(this, \"".get_bloginfo("url")."\")'>", $select);
	echo $select;
	
	echo '<br><select id="acpd_posts" name="acpd_posts" onchange="gotoPost(this)">
		<option value="">Select a category first</option>
		</select></form>';
	
	}


function acpd_widget_config()
{
			
			if ( $_POST["acpd_submit"] ) 
			{
				update_option(acpd_title, $_POST[acpd_title]);
				update_option(acpd_post_count, $_POST[acpd_post_count]);
			}
	?>

			<div>
		<label for="acpd_title">Title</label>
		<input class="widefat" type="text" id="acpd_title" name="acpd_title" value="<?php echo get_option(acpd_title); ?>" /><br/>
        <input type="hidden" id="acpd_submit" name="acpd_submit" value="1" /><br>
		<label for="acpd_post_count">Post Count</label>
        
        <select name="acpd_post_count">
		<option value="5" <?php echo (get_option(acpd_post_count) == 5) ? "selected='selected'" : ""; ?>>5</option>
        <option value="10" <?php echo (get_option(acpd_post_count) == 10) ? "selected='selected'" : ""; ?>>10</option>
        <option value="15" <?php echo (get_option(acpd_post_count) == 15) ? "selected='selected'" : ""; ?>>15</option>
        <option value="20" <?php echo (get_option(acpd_post_count) == 20) ? "selected='selected'" : ""; ?>>20</option>
        <option value="50" <?php echo (get_option(acpd_post_count) == 50) ? "selected='selected'" : ""; ?>>50</option>
        <option value="100" <?php echo (get_option(acpd_post_count) == 100) ? "selected='selected'" : ""; ?>>100</option>
        <option value="9999" <?php echo (get_option(acpd_post_count) == 9999) ? "selected='selected'" : ""; ?>>All</option>
		</select>
        <br/>
        <input type="hidden" id="acpd_submit" name="acpd_submit" value="1" />
		</div>

	<?php
}

?>