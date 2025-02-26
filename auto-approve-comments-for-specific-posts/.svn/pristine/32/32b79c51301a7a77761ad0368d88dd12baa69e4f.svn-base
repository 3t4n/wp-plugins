<?php
/*

Plugin Name: Auto approve comments for specific posts
Plugin URI: http://albastru.eu/auto-approve-comments-for-specific-posts/
Description: This plugin will help you if want that only the comments of some specific posts/pages to be auto-approved.
Author: Ioni
License: GPL
Version: 1.0.1
Author URI: http://albastru.eu
*/


function ics_app_page(){
$ics_app_ids = get_option('ics_app_ids');
?>

<form method="post" action="">
<h2>Auto approve comments for specific posts</h2>


<p><b>Auto approve comments for these posts/pages:</b><br/>
(separated by coma, no spaces. e.g: 1,2,50,999)<br/></p>
<input type="text" name="ics_app_ids" value="<?php echo $ics_app_ids; ?>" />

<div>
<input type="hidden" name="ics_submit" value="ics_submit" />
<input type="submit" value="Update"/>
</div>
</form>

<?php 
}

function ics_app_menu() {
	if($_POST['ics_submit']=="ics_submit"){
		$ics_app_ids = $_POST['ics_app_ids'];
		update_option('ics_app_ids', $ics_app_ids);
	}
	
	if (function_exists('add_options_page')) {
	add_options_page('Auto-Approve Comments', 'Auto-Approve Comments', 8, __FILE__, 'ics_app_page');
	}

}

function ics_approve_comments($approved)
{

$ics_app_ids = get_option('ics_app_ids');
$ics_auto_app = explode(",",$ics_app_ids);


$comment_post_ID = isset($_POST['comment_post_ID']) ? (int) $_POST['comment_post_ID'] : 0;

    if (!$approved) {
       if (in_array($comment_post_ID, $ics_auto_app)) {
       $approved = 1;
       }
    }
   return $approved;
}

add_action('pre_comment_approved', 'ics_approve_comments');
add_action('admin_menu', 'ics_app_menu');


 
?>