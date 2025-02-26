<?php
/*
* Plugin Name: Last phpbb3 topics
* Plugin URI: http://www.gekkotaku.com/
* Description: Plugin for display last phpbb3 topics.
* Version: 1.8
* Author: @netOrX
* Author URI: http://www.twitter.com/netOrX
* 
* 
* For display the results, put this in your template:
* <?php lastPhpbbTopic('displays=8&location=1&dir=http://YOUR_FORUM_ADDRESS.com/&table_prefix=YOUR_DB_TABLE_PREFIX'); ?>
* 
* 
* VERY IMPORTANT
* if you forum and the wordpress was in the same DataBase use 1
* if the forum are in different DataBase use 0, and fill your DataBase information
*/

/**
* @param array $args The argument array
* @return list of topics
*/
function lastPhpbbTopic($args = '') {
	
	$defaults = array(
		'location' => 1,
		'displays' => 3,
		'before' => '<li>',
		'after' => '</li>',
		'table_prefix' => 'phpbb_', // this is your forum DB table prefix, CHANGE BY YOUR OWN
		'char_limit' => 80,
		'dir' => 'http://foro.gekkotaku.com/' // this is your forum address, CHANGE BY YOUR OWN
	);
	
	$r = wp_parse_args( $args, $defaults );
	extract($r, EXTR_SKIP);
	
	// follow me for exclude your hidden or private forums...
	// if you dont know what ID have your hidden forums:
	// * go to your hidden forum
	// * check your direction bar (in your navigator, EX. firefox, explorer)
	// * put atention on this~ viewforum.php?f=8
	// f - means forum, in this case, my hidden forum is the id - 8
	$hidden_forum = "12,33,36"; // separate your forum ID with ,
	
	if ( $location ) {
		global $wpdb;
	} else { // CONFIGURE THIS IF YOUR DATABASE FOURM ARE IN DIFFERENT PLACE THAN WORDPRESS
		// fill with your db acces information
		$DB_HOST = ''; // host (localhost, 06.mysqlprovider.com)
		$DB_NAME = ''; // your data base name
		$DB_USER = ''; // your data base user name
		$DB_PASS = ''; // your data base password

		$wpdb = new wpdb($DB_USER, $DB_PASS, $DB_NAME, $DB_HOST);
	}
	
	// IF YOU DONT HAVE EXPERIENCE... DONT TOUCH THIS
	$sql = "SELECT
		forum.forum_name, post.forum_id, post.post_text,
		topic.topic_id, topic.topic_title, topic.topic_replies,
		topic.topic_last_post_id, user.username
		FROM " . $table_prefix . "posts post
		LEFT JOIN " . $table_prefix . "forums forum ON post.forum_id = forum.forum_id
		LEFT JOIN " . $table_prefix . "users user ON post.poster_id = user.user_id
		LEFT JOIN " . $table_prefix . "topics topic ON post.topic_id = topic.topic_id
		WHERE post.forum_id NOT IN (".$hidden_forum.")
		ORDER BY post.post_time DESC LIMIT $displays
		";
	
	$result = $wpdb->get_results($sql);
	
	if ( !$result ) { die('Invalid query: ' . mysql_error()); }
	
	foreach ($result as $topic) {
		$start = round($topic->topic_replies / 10).'0';
		$topic->post_text = preg_replace("(\[.+?\])is",'',$topic->post_text);
		$topic->post_text = substr($topic->post_text,0,$char_limit)."..."; 

		echo $before.'<a href="'.$dir.'viewtopic.php?f='.$topic->forum_id.'&t='.$topic->topic_id.'&start='.$start.'#p'.$topic->topic_last_post_id.'" title="'.$topic->post_text.'" target="_blank">'.$topic->username.' en: '.$topic->forum_name.' &raquo; '.$topic->topic_title.'</a>'.$after;
	}
}
?>