<?php
/*

**************************************************************************

Plugin Name:  Delete Post Revision
Plugin URI:   http://www.arefly.com/delete-post-revision/
Description:  Help you clean out redundant & repetitive post revisions and thin out the database.
Version:      1.1
Author:       Arefly
Author URI:   http://www.arefly.com/
Text Domain:  delete-post-revision
Domain Path:  /lang/

**************************************************************************

	Copyright 2014  Arefly  (email : eflyjason@gmail.com)

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

**************************************************************************/

define("DELETE_POST_REVISION_PLUGIN_URL", plugin_dir_url( __FILE__ ));
define("DELETE_POST_REVISION_FULL_DIR", plugin_dir_path( __FILE__ ));
define("DELETE_POST_REVISION_TEXT_DOMAIN", "delete-post-revision");

if(!get_option('delete_post_revision_no')){
	update_option("delete_post_revision_no", 0);
}
if(!get_option('delete_post_revision_getPosts')){
	update_option("delete_post_revision_getPosts", 0);
}

/* Plugin Localize */
function delete_post_revision_load_plugin_textdomain() {
	load_plugin_textdomain(DELETE_POST_REVISION_TEXT_DOMAIN, false, dirname(plugin_basename( __FILE__ )).'/lang/');
}
add_action('plugins_loaded', 'delete_post_revision_load_plugin_textdomain');

/* Add Links to Plugins Management Page */
function delete_post_revision_action_links($links){
	$links[] = '<a href="'.get_admin_url(null, 'tools.php?page='.DELETE_POST_REVISION_TEXT_DOMAIN.'-main').'">'.__("Delete Post Revision", DELETE_POST_REVISION_TEXT_DOMAIN).'</a>';
	return $links;
}
add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'delete_post_revision_action_links');

function delete_post_revision_register_management() {
	add_management_page(__('Delete Post Revision', DELETE_POST_REVISION_TEXT_DOMAIN), __('Delete Post Revision', DELETE_POST_REVISION_TEXT_DOMAIN), 'manage_options', DELETE_POST_REVISION_TEXT_DOMAIN.'-main', 'delete_post_revision_management_page');
}
add_action('admin_menu', 'delete_post_revision_register_management');

function delete_revision_act() {
	global $wpdb;
	$sql = "DELETE FROM $wpdb->posts WHERE post_type = 'revision'";
	$results = $wpdb -> get_results($sql);
}

function delete_post_revision_management_page() {
	$get_post_count = get_post_count();
	$delete_post_revision_no = get_option('delete_post_revision_no');
?>
<div class="wrap">
	<h2><?php _e("Delete Post Revision", DELETE_POST_REVISION_TEXT_DOMAIN); ?></h2>
	<div class="widget">
		<p><?php printf(__("Now you have %s posts, Up to now Delete Post Revision has deteted %s post revision of redundancy.", DELETE_POST_REVISION_TEXT_DOMAIN), '<span style="color: red; font-weight: bolder;">'.$get_post_count.'</span>', '<span id="revs_no" style="color: red; font-weight: bolder;">'.$delete_post_revision_no.'</span>'); ?></p>
	</div>
	<?php
	if (isset($_POST['del_act'])) {
		delete_revision_act();
		$del_no = $_POST['rev_no'];
		update_option("delete_post_revision_no", get_option("delete_post_revision_no") + $del_no);
	?>
	<div class="updated below-h2">
		<p><?php printf(__("Deleted %s redundancy posts!", DELETE_POST_REVISION_TEXT_DOMAIN), '<span style="color: red; font-weight: bolder;">'.$del_no."</span>"); ?></p>
	</div>
	<?php } ?>

	<?php get_revision_revision(); ?>
</div>
<?php
}

function get_post_count() {
	return wp_count_posts()->publish;
}

function get_revision_revision() {
	global $wpdb;
	
	$sql = "SELECT `ID`,`post_date`,`post_title`,`post_modified`
			FROM (
			$wpdb->posts
			)
			WHERE `post_type` = 'revision'
			ORDER BY `ID` DESC";
	$results = $wpdb -> get_results($sql);
	if($results) {
	$res_no = count($results);
	?>
<table class="widefat">
	<thead>
		<tr>
			<th width="30">ID</th>
			<th width="450">Title</th>
			<th width="180">Post Date</th>
			<th width="180">Last Modified</th>
		</tr>
	</thead>
	<?php for($i = 0; $i < $res_no; $i++) { ?>
	<tr>
		<td><?php echo $results[$i] -> ID; ?></td>
		<td><?php echo $results[$i] -> post_title; ?></td>
		<td><?php echo $results[$i] -> post_date; ?></td>
		<td><?php echo $results[$i] -> post_modified; ?></td>
	</tr>
	<?php
	}
	?>
</table>
<br />

<form method="POST" action="">
	<input type="hidden" name="rev_no" value="<?php echo $res_no; ?>" />
	<input class="button-primary" type="submit" name="del_act" value="<?php printf(__('Delete %s redundancy revision post!', DELETE_POST_REVISION_TEXT_DOMAIN), $res_no); ?>" />
</form>
<?php
	} else {
?>
<div class="updated below-h2">
	<p><?php _e('Great, There are no redundant revision posts in your blog!', DELETE_POST_REVISION_TEXT_DOMAIN); ?></p>
</div>
<?php
	}
}