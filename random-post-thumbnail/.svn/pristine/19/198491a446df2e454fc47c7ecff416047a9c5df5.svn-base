<?php
/*
Plugin Name: Random Post Thumbnail
Plugin URI: http://www.webikon.sk/
Description: Automatic adding of random thumbnails to the posts without featured image based on images from media gallery.
Version: 0.1
Author: Ján Bočínec
Author URI: http://www.johnnypea.wp.sk/
License: GPL2
*/

add_action('admin_menu', 'rpt_menu');

function rpt_menu() {

  add_submenu_page('tools.php', 'Random Post Thumbnail', 'Random Thumbnail', 'manage_options', 'random-post-thumbnail', 'rpt_settings_page' );

}

function rpt_settings_page() { ?>
	<div class="wrap">
	<h2>Random Post Thumbnails</h2>
		<form action="" method="post">
			<p>
			<select name="posttype">
				<option value="post">Select post type</option>
				<option value="post">Posts</option>
				<option value="page">Pages</option>
				<option value="any">Any</option>
			</select>		
			<input type="hidden" value="1" name="submit" />
			<input type="submit" value="Add Posts Thumbnails" class="button-primary" />
			</p>
		</form>
	<?php
	if ( isset($_POST['submit']) && $_POST['submit'] ) {
		$post_type = ( isset($_POST['posttype']) && $_POST['posttype'] ) ? $_POST['posttype'] : 'post';
		rpt_function($post_type);	
	}
	?></div><?php
}

function rpt_function($post_type) {

	$images = array();

	$args = array(
	    'post_type' => 'attachment',
	    'numberposts' => -1,
	    'post_status' => null,
	    'post_parent' => null, // any parent
	    ); 
	$attachments = get_posts($args);
	if ($attachments) {
	    foreach ($attachments as $post) {
	    	$images[] = $post->ID;
	    }
	}	
	
	$posts = get_posts( 'numberposts=-1&post_type='.$post_type );

	if ($posts) {
		echo '<ol>';
		$added = array();
		foreach ( $posts as $post ) {
			if ( !has_post_thumbnail( $post->ID) ) {
				$rand_img_key = array_rand($images);
				$added[] = set_post_thumbnail( $post->ID, $images[$rand_img_key] );
				echo "<li>Random thumbnail added to post <b>$post->post_title</b></li>";
			}

		}
		echo '</ol>';

		if ( empty($added) ) { 
			echo '<h3>No thumbnail added!</h3>';
		} else {
			echo '<h3>'.sprintf('All done <a href="%s">Have fun!</a>', get_option('home')).'</h3>';

		}
	}
}