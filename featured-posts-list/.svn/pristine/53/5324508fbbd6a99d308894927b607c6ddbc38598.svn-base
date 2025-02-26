<?php 
/* 
Plugin Name: Featured Posts List 
Plugin URI: http://www.w3cgallery.com/w3c-css/display-specificmultiple-posts-as-featured-post-list-plugins
Description: Display specific/multiple posts List on your sidebar or any place of your site. It creates a tab "Featured Posts List" in "Settings" or "Options" tab
Version: 1.0
Author: SAN - w3cgallery.com & Windowshostingpoint.com
Author URI: http://www.w3cgallery.com/
*/

/*  Copyright 2008  SAN - w3cgallery.com & Windowshostingpoint.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; 
*/


// Main function to diplay on front end

function featuredpostsList($before = '<li>', $after = '</li>') {
global $post, $wpdb, $posts_settings;
// posts_id from database
$posts_id = $posts_settings['posts_id'];

 if($posts_id) {
 
	$posts_idarray = explode(',',$posts_id);
	
		foreach ($posts_idarray as $list){
			$post = new WP_Query('p='.$list.'');
			$post->the_post();
			$post_title = stripslashes($post->post_title);
			$permalink = get_permalink($post->ID);
			echo $before . '<a href="' . $permalink . '" rel="bookmark" title="Permanent Link: ' . $post_title . '">' . $post_title . '</a>'. $after;

  }	
  } else {
		echo $before ."None found". $after;
	}
}

$data = array(
				'posts_id' 			=> ''
							);
$ol_flash = '';

 $posts_settings = get_option('posts_settings');

// ADMIN PANLE SEETTING
function posts_add_pages() {
    // Add new menu in Setting or Options tab:
    add_options_page('Featured Posts List', 'Featured Posts List', 8, 'postsoptions', 'posts_options_page');
}


/* Define Constants and variables*/
define('PLUGIN_URI', get_option('siteurl').'/wp-content/plugins/');

/* Functions */

function posts_options_page() {
global $ol_flash, $posts_settings, $_POST, $wp_rewrite;
if (isset($_POST['posts_id'])) { 
	$posts_settings['posts_id'] = $_POST['posts_id'];
	update_option('posts_settings',$posts_settings);
	$ol_flash = "Your Featured List has been saved.";
		}

if ($ol_flash != '') echo '<div id="message"class="updated fade"><p>' . $ol_flash . '</p></div>';

echo '<div class="wrap">';
		echo '<h2>Add Posts ID to Create Featured Post List</h2>';
		echo '<table class="optiontable form-table"><form action="" method="post">
		<tr><td colspan="2"><strong>This plugin gives full freedom to display multiple posts as Featured Post List to your site.</strong></td></tr>
		<tr><td><strong>Post ID :</strong></td><td><input type="text" name="posts_id" value="' . htmlentities($posts_settings['posts_id']) . '" size="50%" /></td></tr>
		<tr><td colspan="2"><strong>SAN Hint: To Add Multiple Post IDs use " , " for exmple : " 1, 2, 3" </strong></td></tr>
		</table>';
				
echo '<Div class="submit"><input type="submit" value="Save your list" /></div>
<p>Paste this code into where you want it to display featured posts list <strong>&lt;?php featuredpostsList(); ?&gt;</strong> <br/> Or you can pass variable before and after like this default setting <strong>&lt;?php featuredpostsList($before = &lt;li&gt;", $after = &lt;/li&gt;") ?&gt;</strong></p>
		</form>';
echo '<p><a href="http://www.w3cgallery.com/w3c-css/display-specificmultiple-posts-as-featured-post-list-plugins">for Instructions and help online Please visit.</a> <br/>
If you like this plugin, please leave your comments on <a href="http://www.w3cgallery.com/w3c-validate/w3c-blog">w3cgallery.com</a> & <a href="http://www.Windowshostingpoint.com">Windowshostingpoint.com</a></p>';
		echo '</div>';

}

add_action('admin_menu', 'posts_add_pages');

?>