<?php
/*
Plugin Name: Add Your Comment Link
Plugin URI: http://websmartcentral.com/addcommentlink
Description: Adds a prominent Add Your Comment link to the bottom of each post.
Author: Aaron Dwyer
Version: 1.0.0
Author URI: http://websmartcentral.com/
Text Domain: add-comment-link
*/

function addcommmentlink_install() {
	add_option('addyourcomment_linktext','[ Add Your Comment ]');
	add_option('addyourcomment_linktitle','Add Your Comment - Share Your Thoughts');
}

function addcommentlink_uninstall() {
	delete_option('addyourcomment_linktext');
	delete_option('addyourcomment_linktitle');
}


register_activation_hook(basename(__FILE__), "addcommentlink_install");
register_deactivation_hook(basename(__FILE__), "addcommentlink_uninstall");

/*
if ( isset($_GET['action']) ) {
	if ( $_GET['action'] == 'activate' ) {
		addcommentlink_install();
	} else if ( $_GET['action'] == 'deactivate' ) {
		addcommentlink_uninstall();
	}
}
*/



add_action('admin_menu', 'addcommentlink_menu');
add_filter('the_content', 'addcommentlink_filter');


function addcommentlink_menu() {
//   add_options_page('Add Comment Link Settings', 'Add Comment Link', 8, basename(__FILE__) . '/settings.php');
   add_options_page('Add Comment Link Settings', 'Add Comment Link', 8, basename(__FILE__), 'addcommentlink_options');
}

function addcommentlink_options() {
?>
<div class="wrap">
	<h2>Add Comment Link Options</h2>
	<form method="post" action="options.php">
	<?php wp_nonce_field( "update-options" ); ?>
	Link Text: <input type="text" name="addyourcomment_linktext" size="60" value="<?php echo get_option('addyourcomment_linktext'); ?>" /><br/>
	Link Title: <input type="text" name="addyourcomment_linktitle" size="60" value="<?php echo get_option('addyourcomment_linktitle'); ?>" /><br/>
	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="addyourcomment_linktext,addyourcomment_linktitle" />
	<p class="submit">
	<input type="submit" name="Submit" value="<?php _e('Update Options'); ?>" />
	</p>
	</form>
</div>
<?php
}

function addcommentlink_filter($input) {
	$sAddCommentLinkText = get_option('addyourcomment_linktext');
	$sAddCommentLinkTitle = get_option('addyourcomment_linktitle');
	
	if (is_page()){
		//do nothing
	}
	else {
		$link = "<div class=\"add-comments-link\"><center><b><a href=\"" . get_permalink() . "#respond\" title=\"" . $sAddCommentLinkTitle . "\">" . $sAddCommentLinkText . "</a></b></center></div>";
		$input .= $link;
	}
return $input;
}



?>