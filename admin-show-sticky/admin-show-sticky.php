<?php
/*
Plugin Name: Admin Show Sticky
Plugin URI: http://sivel.net/wordpress/admin-show-sticky/
Description: Adds a new column to the posts table in the admin to display if a post is sticky or not.
Author: Matt Martz
Author URI: http://sivel.net
Version: 1.0

        Copyright (c) 2009 Matt Martz (http://sivel.net)
        Admin Show Sticky is released under the GNU General Public License (GPL)
        http://www.gnu.org/licenses/gpl-2.0.txt
*/

// Only continue if we are on the admin
if (is_admin()) :

// Prepend the new column to the columns array
function sticky_column($cols) {
	$cols['sticky'] = 'Sticky';
	return $cols;
}

// Echo the ID for the new column
function sticky_value($column_name, $id) {
	if ($column_name == 'sticky')
		if (is_sticky($id))
			echo '&#10004;';
}

// Output CSS for width of new column
function sticky_css() {
?>
<style type="text/css">
	/* Admin Show Sticky */
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
