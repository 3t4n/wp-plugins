<?php

/*
Plugin Name: Easy WP Cleaner
Plugin URI: https://www.brainvine.tech
Description: Easy WP Cleaner is user friendly plugin to clean unnecessary data from WordPress database and also allows you to optimize your WordPress database.
Version: 2.1
Author: Nikunj Soni
Author URI: https://www.brainvine.tech
Text Domain: Easy-WP-Cleaner


THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR
IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

*/

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed this file directly
} 

function easy_wp_cleaner_admin_menu() {
    add_menu_page( "Easy WP Cleaner", "Easy WP Cleaner", "manage_options", "easy-wp-cleaner", "easy_wp_cleaner_admin" );
	add_submenu_page( "easy-wp-cleaner", "Help", "Help", "manage_options", "easy-wp-cleaner-help", "easy_wp_cleaner_help" );
}
add_action( 'admin_menu', 'easy_wp_cleaner_admin_menu' );

function easy_wp_cleaner($type){
	global $wpdb;
	switch($type){
		case "revision":
			$ewc_sql = "DELETE FROM $wpdb->posts WHERE post_type = 'revision'";
			$wpdb->query($ewc_sql);
			break;
		case "draft":
			$ewc_sql = "DELETE FROM $wpdb->posts WHERE post_status = 'draft'";
			$wpdb->query($ewc_sql);
			break;
		case "autodraft":
			$ewc_sql = "DELETE FROM $wpdb->posts WHERE post_status = 'auto-draft'";
			$wpdb->query($ewc_sql);
			break;
		case "moderated":
			$ewc_sql = "DELETE FROM $wpdb->comments WHERE comment_approved = '0'";
			$wpdb->query($ewc_sql);
			break;
		case "spam":
			$ewc_sql = "DELETE FROM $wpdb->comments WHERE comment_approved = 'spam'";
			$wpdb->query($ewc_sql);
			break;
		case "trash":
			$ewc_sql = "DELETE FROM $wpdb->comments WHERE comment_approved = 'trash'";
			$wpdb->query($ewc_sql);
			break;
		case "postmeta":
			$ewc_sql = "DELETE pm FROM $wpdb->postmeta pm LEFT JOIN $wpdb->posts wp ON wp.ID = pm.post_id WHERE wp.ID IS NULL";
			$wpdb->query($ewc_sql);
			break;
		case "commentmeta":
			$ewc_sql = "DELETE FROM $wpdb->commentmeta WHERE comment_id NOT IN (SELECT comment_id FROM $wpdb->comments)";
			$wpdb->query($ewc_sql);
			break;
		case "relationships":
			$ewc_sql = "DELETE FROM $wpdb->term_relationships WHERE term_taxonomy_id=1 AND object_id NOT IN (SELECT id FROM $wpdb->posts)";
			$wpdb->query($ewc_sql);
			break;
		case "feed":
			$ewc_sql = "DELETE FROM $wpdb->options WHERE option_name LIKE '_site_transient_browser_%' OR option_name LIKE '_site_transient_timeout_browser_%' OR option_name LIKE '_transient_feed_%' OR option_name LIKE '_transient_timeout_feed_%'";
			$wpdb->query($ewc_sql);
			break;
	}
}

function easy_wp_cleaner_count($type){
	global $wpdb;
	switch($type){
		case "revision":
			$ewc_sql = "SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = 'revision'";
			$count = $wpdb->get_var($ewc_sql);
			break;
		case "draft":
			$ewc_sql = "SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'draft'";
			$count = $wpdb->get_var($ewc_sql);
			break;
		case "autodraft":
			$ewc_sql = "SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'auto-draft'";
			$count = $wpdb->get_var($ewc_sql);
			break;
		case "moderated":
			$ewc_sql = "SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = '0'";
			$count = $wpdb->get_var($ewc_sql);
			break;
		case "spam":
			$ewc_sql = "SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = 'spam'";
			$count = $wpdb->get_var($ewc_sql);
			break;
		case "trash":
			$ewc_sql = "SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = 'trash'";
			$count = $wpdb->get_var($ewc_sql);
			break;
		case "postmeta":
			$ewc_sql = "SELECT COUNT(*) FROM $wpdb->postmeta pm LEFT JOIN $wpdb->posts wp ON wp.ID = pm.post_id WHERE wp.ID IS NULL";
			$count = $wpdb->get_var($ewc_sql);
			break;
		case "commentmeta":
			$ewc_sql = "SELECT COUNT(*) FROM $wpdb->commentmeta WHERE comment_id NOT IN (SELECT comment_id FROM $wpdb->comments)";
			$count = $wpdb->get_var($ewc_sql);
			break;
		case "relationships":
			$ewc_sql = "SELECT COUNT(*) FROM $wpdb->term_relationships WHERE term_taxonomy_id=1 AND object_id NOT IN (SELECT id FROM $wpdb->posts)";
			$count = $wpdb->get_var($ewc_sql);
			break;
		case "feed":
			$ewc_sql = "SELECT COUNT(*) FROM $wpdb->options WHERE option_name LIKE '_site_transient_browser_%' OR option_name LIKE '_site_transient_timeout_browser_%' OR option_name LIKE '_transient_feed_%' OR option_name LIKE '_transient_timeout_feed_%'";
			$count = $wpdb->get_var($ewc_sql);
			break;
	}
	return $count;
}

function easy_wp_cleaner_optimize(){
	global $wpdb;
	$ewc_sql = 'SHOW TABLE STATUS FROM `'.DB_NAME.'`';
	$result = $wpdb->get_results($ewc_sql);
	foreach($result as $row){
		$ewc_sql = 'OPTIMIZE TABLE '.$row->Name;
		$wpdb->query($ewc_sql);
	}
}

function easy_wp_cleaner_admin() {
	include('easy-wp-cleaner-admin.php');
}

function easy_wp_cleaner_help() {
	include('easy-wp-cleaner-help.php');
}

?>