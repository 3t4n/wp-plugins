<?php
require_once('../../../wp-load.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$cdata = $_REQUEST["cdata"];  global $wpdb;
	if (!$cdata['author'] || $cdata['author'] == '') {echo '<p class="err">'.__('Please enter the required field correctly.', 'h2cweb').'</p>';}
	elseif (!is_email($cdata['email'])) {echo '<p class="err">'.__('Please enter the required field correctly.', 'h2cweb').'</p>';}
	else {
		$cid = $wpdb->insert('ep_comment', $cdata);
		if ($cid) {echo '<p>'.__('Your comment has been successfully submited.', 'h2cweb').'</p>';}
		else {echo '<p class="err">'.__('Error in adding your comment.', 'h2cweb').'</p>';}
	}
}
?>