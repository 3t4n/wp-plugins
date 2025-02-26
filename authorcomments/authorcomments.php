<?php
/*
Plugin Name: authorcomments
Plugin URI: http://webwoke.com/wp-plugins/authorcomments.html
Description: GNU/GPL AuthorComment is a plugins that help to administrate Comment in Author Page as like a testimonial for author.
Version: 1.0.0
Author: Harry Sudana, I Nym
Author URI: http://webwoke.com/
*/

class authorcomments{

	public static function activateAC(){
		$loadusers = self::loadUserAC();
		foreach($loadusers as $loaduser){
			$loadPostID = self::loadACpostid($loaduser->ID);
			//print($loadPostID);
			if(sizeof($loadPostID)==0){
				self::createPostAC($loaduser->ID);
			}
		}
	}
	
	public static function loadACpostid($userid){
		global $wpdb;
		$table = $wpdb->prefix."posts";
		return $wpdb->get_results( "SELECT * FROM $table WHERE post_author=".$userid." AND post_type='authorcomments' " );
	}
	
	public static function loadUserAC(){
		global $wpdb;
		$table_name = $wpdb->prefix . 'users';
		$results = $wpdb->get_results(" SELECT ID FROM $table_name ");
		return $results;
	}
	
	public static function reguserAC($userid){
		$loadPostID = self::loadACpostid($userid);
		if(sizeof($loadPostID)==0){
			self::createPostAC($userid);
		}
	}
	
	public static function deluserAC($userid){
		$loadPostID = self::loadACpostid($userid);
		if(sizeof($loadPostID)==0){
			self::delPostAC($userid);
		}
	}
	
	public static function createPostAC($userid){
		global $wpdb;
		$table = $wpdb->prefix."posts";
		$query = "INSERT INTO $table (
						post_author, post_date, post_date_gmt, post_content, post_title, post_category, post_excerpt, post_status, comment_status, ping_status, 
						post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered,
						post_parent, guid, menu_order, post_type, post_mime_type, comment_count
					  ) VALUES (
							".$userid.", '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."', '', 
							'Author Comment ".$userid." - Do Not Edit/Delete', 0, '', 'inherit', 'open', 'open', '', 'Author Comment ".$userid." - Do Not Edit/Delete', '', '', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."', '', 0, 
							'?author=".$userid."', 0, 'authorcomments', '', 0)
							";
							
		$result = $wpdb->query( $query );
	  	return $result;
	}
	
	public static function delPostAC($userid){
		global $wpdb;
		$table = $wpdb->prefix."posts";
		$query = "DELETE FROM $table WHRERE post_author=".$userid." AND post_type='authorcomments' ";
		$result = $wpdb->query( $query );
	  	return $result;
	}
	
}

add_action("activate_authorcomments/authorcomments.php", array("authorcomments", "activateAC"));
add_action("user_register", array("authorcomments", "reguserAC"));
add_action("user_delete", array("authorcomments", "deluserAC"));

?>