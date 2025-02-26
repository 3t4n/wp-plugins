<?php
/*
Plugin Name: AStickyPostOrderER Show Sticky
Plugin URI: http://www.opentech.co.il
Description: Adds a new column to the posts table in the admin to display if a post marked by AStickyPostOrderER as sticky or not.
Version: 1.2
Author: Sahar Ben-Attar
Author URI: http://www.opentech.co.il
Notes: Based on Admin Show Sticky Plugin by Matt Martz (http://sivel.net)
*/

/*
        Copyright (c) 2009 Sahar Ben-Attar (http://www.opentech.co.il)
        AStickyPostOrderER Show Sticky is released under the GNU General Public License (GPL)
        http://www.gnu.org/licenses/gpl-2.0.txt
*/

// Only continue if we are on the admin
if (is_admin()) :

// Prepend the new column to the columns array
function sticky_column($cols) {
	$cols['sticky'] = 'Sticky';
	return $cols;
}
// Echo the ID for the new column and check if this is a sticky post by AStickyPostOrderER
function sticky_value($column_name, $id) {
	global $wpdb;
	$sticky_post = $wpdb->get_row("SELECT * FROM wp_croer_posts WHERE post_id = $id");
	if ($column_name == 'sticky' && $sticky_post) {
		echo '<a href="'. get_bloginfo('url').'/wp-admin/tools.php?page=astickypostorderer&cat='.$sticky_post->cat_id.'">&#10004;</a>';
	}
}

// Output CSS for width of new column
function sticky_css() {
?>
<style type="text/css">
	/* AStickyPostOrderER Show Sticky */
	#sticky { width: 50px; }
	td.sticky { padding-left: 12px; font-size: 175%; color: #727272; }
</style>
<?php	
}

// Actions/Filters for various tables and the css output
add_filter('manage_posts_columns', 'sticky_column');
add_action('manage_posts_custom_column', 'sticky_value', 10, 2);
add_action('admin_head', 'sticky_css');

// End is_admin check
endif;
?>
