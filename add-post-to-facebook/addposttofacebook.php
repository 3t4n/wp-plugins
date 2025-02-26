<?php
/*
Plugin Name: Add Post To Facebook
Version: 0.8 a
Plugin URI: http://detoxdietabc.com/webmasters/add-post-to-facebook
Description: Adds a footer link to add the current post or page to a Facebook Mini-Feed.
Author: Pedro Maia
Author URI: http://detoxdietabc.com/
*/

/*
Change Log

0.8 a - Minor changes in the plugins functions. Speeding up it's work.

0.8 - First official public launch (Your blog will never be the same again)

*/ 

function add_post_to_facebook($data){
	global $post;
	$current_options = get_option('add_post_to_facebook_options');
	$linktype = $current_options['link_type'];
	switch ($linktype) {
		case "text":
			$data=$data."<p class=\"facebook\"><a href=\"http://www.facebook.com/share.php?u=".get_permalink($post->ID)."\" target=\"_blank\" title=\"Share on Facebook\">Share on Facebook</a></p>";
			break;
		case "image":
			$data=$data."<p class=\"facebook\"><a href=\"http://www.facebook.com/share.php?u=".get_permalink($post->ID)."\" target=\"_blank\"><img src=\"".get_bloginfo(wpurl)."/wp-content/plugins/add-post-to-facebook-plugin/facebook_share_icon.gif\" alt=\"Share on Facebook\" title=\"Share on Facebook\" /></a></p>";
			break;
		case "both":
			$data=$data."<p class=\"facebook\"><a href=\"http://www.facebook.com/share.php?u=".get_permalink($post->ID)."\" target=\"_blank\"><img src=\"".get_bloginfo(wpurl)."/wp-content/plugins/add-post-to-facebook-plugin/facebook_share_icon.gif\" alt=\"Share on Facebook\" title=\"Share on Facebook\" /></a><a href=\"http://www.facebook.com/share.php?u=".get_permalink($post->ID)."\" target=\"_blank\" title=\"Share on Facebook\">Share on Facebook</a></p>";
			break;
		}
		return $data;
}

function activate_add_post_to_facebook(){
	global $post;
	$current_options = get_option('add_post_to_facebook_options');
	$insertiontype = $current_options['insertion_type'];
	if ($insertiontype != 'template'){
		add_filter('the_content', 'add_post_to_facebook', 10);
		add_filter('the_excerpt', 'add_post_to_facebook', 10);
	}
}

activate_add_post_to_facebook();

function addposttofacebook(){
	global $post;
	$current_options = get_option('add_post_to_facebook_options');
	$insertiontype = $current_options['insertion_type'];
	if ($insertiontype != 'auto'){
		$linktype = $current_options['link_type'];
		switch ($linktype) {
			case "text":
				echo "<p class=\"facebook\"><a href=\"http://www.facebook.com/share.php?u=".get_permalink($post->ID)."\" target=\"_blank\" title=\"Share on Facebook\">Share on Facebook</a></p>";
				break;
			case "image":
				echo "<p class=\"facebook\"><a href=\"http://www.facebook.com/share.php?u=".get_permalink($post->ID)."\" target=\"_blank\"><img src=\"".get_bloginfo(wpurl)."/wp-content/plugins/add-post-to-facebook-plugin/facebook_share_icon.gif\" alt=\"Share on Facebook\" title=\"Share on Facebook\" /></a></p>";
				break;
			case "both":
				echo "<p class=\"facebook\"><a href=\"http://www.facebook.com/share.php?u=".get_permalink($post->ID)."\" target=\"_blank\"><img src=\"".get_bloginfo(wpurl)."/wp-content/plugins/add-post-to-facebook-plugin/facebook_share_icon.gif\" alt=\"Share on Facebook\" title=\"Share on Facebook\" /></a><a href=\"http://www.facebook.com/share.php?u=".get_permalink($post->ID)."\" target=\"_blank\" title=\"Share on Facebook\">Share on Facebook</a></p>";
				break;
			}
		}
}

// Create the options page
function add_post_to_facebook_options_page() { 
	$current_options = get_option('add_post_to_facebook_options');
	$link = $current_options["link_type"];
	$insert = $current_options["insertion_type"];
	if ($_POST['action']){ ?>
		<div id="message" class="updated fade"><p><strong>Options saved.</strong></p></div>
	<?php } ?>
	<div class="wrap" id="add-post-to-facebook-options">
		<h2>Add Post to Facebook Options</h2>
		
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']; ?>">
			<fieldset>
				<legend>Options:</legend>
				<input type="hidden" name="action" value="save_add_post_to_facebook_options" />
				<table width="100%" cellspacing="2" cellpadding="5" class="editform">
					<tr>
						<th valign="top" scope="row"><label for="link_type">Link Type:</label></th>
						<td><select name="link_type">
						<option value ="text"<?php if ($link == "text") { print " selected"; } ?>>Text Only</option>
						<option value ="image"<?php if ($link == "image") { print " selected"; } ?>>Image Only</option>
						<option value ="both"<?php if ($link == "both") { print " selected"; } ?>>Image and Text</option>
						</select></td>
					</tr>
					<tr>
						<th valign="top" scope="row"><label for="insertion_type">Insertion Type:</label></th>
						<td><select name="insertion_type">
						<option value ="auto"<?php if ($insert == "auto") { print " selected"; } ?>>Auto</option>
						<option value ="template"<?php if ($insert == "template") { print " selected"; } ?>>Template</option>
						</select></td>
					</tr>
				</table>
			</fieldset>
			<p class="submit">
				<input type="submit" name="Submit" value="Update Options &raquo;" />
			</p>
		</form>
	</div>
<?php 
}

function add_post_to_facebook_add_options_page() {
	// Add a new menu under Options:
	add_options_page('Add to Facebook', 'Add to Facebook', 10, __FILE__, 'add_post_to_facebook_options_page');
}

function add_post_to_facebook_save_options() {
	// create array
	$add_post_to_facebook_options["link_type"] = $_POST["link_type"];
	$add_post_to_facebook_options["insertion_type"] = $_POST["insertion_type"];
	
	update_option('add_post_to_facebook_options', $add_post_to_facebook_options);
	$options_saved = true;
}

add_action('admin_menu', 'add_post_to_facebook_add_options_page');

if (!get_option('add_post_to_facebook_options')){
	// create default options
	$add_post_to_facebook_options["link_type"] = 'text';
	$add_post_to_facebook_options["insertion_type"] = 'auto';
	
	update_option('add_post_to_facebook_options', $add_post_to_facebook_options);
}

if ($_POST['action'] == 'save_add_post_to_facebook_options'){
	add_post_to_facebook_save_options();
}

function facebookcss() {
	?>
	<link rel="stylesheet" href="<?php bloginfo('wpurl'); ?>/wp-content/plugins/add-post-to-facebook-plugin/facebook.css" type="text/css" media="screen" />
	<?php
}

add_action('wp_head', 'facebookcss');
?>