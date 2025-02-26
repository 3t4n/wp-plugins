<?php 
    /*
    Plugin Name: At a Glance
    Plugin URI: http://allfables.com/
    Description: It will allow you to display blog statistics to the user, like total posts, total comments, total pages, etc. The widget is provided to display these information anywhere to your blog front-end.
    Author: peaceful-monk
    Version: 1.0
    Author URI: http://allfables.com/
    */
?>
<?php
define('AG_PATH', plugins_url().'/at-a-glance');
define('AG_META_KEY', "ag_lists");
define('AG_USER_OPTION_KEY', "ag_user_options");

function ag_init() {
    $ag_options = array();
	$ag_options['ag_widget_title']='At a glance';
    add_option(AG_USER_OPTION_KEY, $ag_options);
}
add_action('activate_at-a-glance/at-a-glance.php', 'ag_init');

function ag_widget() {
	$count_posts = wp_count_posts();
	$published_posts = $count_posts->publish;
	$draft_posts = $count_posts->draft;
	$count_pages = wp_count_posts('page');
	$comments_count = wp_count_comments();
	$total_comments = $comments_count->total_comments;
	echo '<ul><li>Published posts: '.$published_posts.'</li>';
	echo '<li>Posts in-draft: '.$draft_posts.'</li>';
	echo '<li>Total pages: '.$count_pages->publish.'</li>';
	echo '<li>Comments in moderation: '.$comments_count->moderated.'</li>';
	echo '<li>Comments approved: '.$comments_count->approved.'</li>';
	echo '<li>Total Comments: '.$total_comments.'</li></ul>';
}

include("ag-widgets.php");
?>