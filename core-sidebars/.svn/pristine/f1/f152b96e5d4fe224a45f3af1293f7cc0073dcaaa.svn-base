<?php
/*
Component Name: Display Function
Plugin: Core Sidebars
Purpose: Adds the necessary input boxes and links to the various Wordpress default pages.
Author: Daniel
Author URI: http://www.nexterous.com
*/

// Define a few initial variables
	$post = postinfo($id);
		$option = get_option('pswidgets');
		$option = unserialize($option);
	if(isset($option[$slug])){	$var = TRUE;	} else {	$var = FALSE	;}

// Add the meta box first
add_meta_box('coresidebars', 'Sidebars and Widgets', 'show_contents', 'post');
add_meta_box('coresidebars', 'Sidebars and Widgets', 'show_contents', 'page');

// Function for adding the actual content
function show_contents(){
	$post = postinfo($id);
?>
<h2>Sidebar Title</h2>
	<input type="text" name="sidebar[0]" size="30" value="<?php echo stripslashes($post['title']); ?>" style="width: 90%;" />
<h2>Sidebar Content</h2>
	<textarea rows='10' cols='40' name="sidebar[1]" style="width: 90%;"><?php echo stripslashes($post['content']); ?></textarea>
<?php
	$slug = $post['slug'];
	$option = get_option('pswidgets');
	$option = unserialize($option);
	if(isset($option[$slug])){	$var = TRUE;	} else {	$var = FALSE	;}

if($option){
?>
<h2>Widget Support</h2>
<div style="font-size: 130%;">
Go to the <a href="widgets.php">Widgets</a> page to customize your widget sidebar.</div>
<?php
}}
?>