<?php
/*
Plugin Name: Add Tags To Posts
Plugin URI: http://www.freshnewhome.com
Description: Add tags to posts
Author: Jesse
Version: 0.0.1
Author URI: http://www.freshnewhome.com
*/
set_time_limit(0);
add_action('admin_menu', 'attp_menu_setup');

function attp_menu_setup() {

  add_options_page('Add Tags To Posts', 'Add Tags To Posts', 8, __FILE__, 'attp_menu');
}

function attp_menu() {

echo '<div class="wrap">';
echo '<h1>Add Tags To Posts</h1>';

if( !empty($_POST["attp_tags"]) && $_POST['attp_submit'] == 'attp_submit' ){
	
	global $wpdb;

 $tags=preg_split('/(\r\n|\r|\n)/',$_POST["attp_tags"]);
 $sql="select ID,post_content,post_title from $wpdb->posts where post_type='post'";
 $posts = $wpdb->get_results($sql,OBJECT);

	foreach($posts as $post){

              	foreach($tags as $atag){

			$id=$post->ID;

		 	$title=$post->post_title;

		 	$content= $post->post_content;
			

		 	if(preg_match("/\b".preg_quote($atag)."\b/i",$title)){

				wp_add_post_tags($id, $atag);

			}elseif(preg_match("/\b".preg_quote($atag)."\b/i",$content)){

				wp_add_post_tags($id, $atag);

			}
				
				
			
		}//end tags
	}//end posts
	echo	'<div id="message" class="updated fade"><p>Done.</p></div>';
}

echo '<h2>One Tag Per Line</h2>';
echo "<form method ='post' action=''>";
echo "<p><textarea name='attp_tags' id='attp_tags' rows='20' cols='30'></textarea></p>";
echo "<p><input type='hidden' name='attp_submit' value='attp_submit' /></p>";
echo "<p><input type='submit' value='submit'> </form></p>";
echo "</div>" ;
}
?>
