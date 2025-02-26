<?php
/*
Plugin Name: ET Remove Comment Author Info
Plugin URI: http://efficienttips.com/remove-comment-author-info/
Description: This plugin will insert a link in the comment form that will allow the comment author to delete their personal info from it that is stored in a cookie. Only unregistered users will be provided with the delete link if they already had a previously posted comment.
Version: 1.0
Author: Milan Kaneria
Author URI: http://efficienttips.com/
*/


function ET_RemoveCommentAuthorInfo()
{
	print "\n" . '<!-- ET Remove Comment Author Info -->' . "\n";

	global $user_ID;

	if (!$user_ID && $_COOKIE['comment_author_' . COOKIEHASH])
	{
		print '<script type="text/javascript">function ETRemoveCommentAuthorInfo(){var cSplit=d.cookie.split(";");for(var a=0;a<cSplit.length;a++){var cPart=cSplit[a];if(cPart.match("comment_author_")){var cHash=cPart.slice(cPart.lastIndexOf("_")+1,cPart.indexOf("="));break;}}if(cHash){var date=new Date();date.setHours(date.getHours()-24);var expires=date.toGMTString();d.cookie="comment_author_"+cHash+"=\'\';expires="+expires+";path=/";d.cookie="comment_author_email_"+cHash+"=\'\';expires="+expires+";path=/";d.cookie="comment_author_url_"+cHash+"=\'\';expires="+expires+";path=/";d.location.reload(true);}}</script>' . "\n";
		print '<p><a href="javascript:void(0)" onclick="ETRemoveCommentAuthorInfo();">Delete</a> your personal information from this form.</p>';
	}

	print "\n" . '<!-- ET Remove Comment Author Info -->' . "\n";
}


add_action('comment_form', 'ET_RemoveCommentAuthorInfo');


?>