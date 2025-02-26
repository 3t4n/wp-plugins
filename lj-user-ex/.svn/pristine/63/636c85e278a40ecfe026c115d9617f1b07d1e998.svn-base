<?php
/*
Plugin Name: LJ user ex
Plugin URI: http://elfimov.com/lj-user-ex/
Description: Replaces &lt;lj user="username"/> and &lt;lj comm="community"/> with correct HTML code. Like "LJ user" plugin, but supports both &lt;lj user="username"/> and &lt;lj user="username"> forms, plus communities.
Author: Michael Elfimov
Version: 0.2
Author URI: http://elfimov.com/
*/

function lj_user_ex($content) {
	$content = preg_replace('/<lj user="([a-z0-9_]+)"\/?>/', '<a href="http://users.livejournal.com/$1/profile"><img src="http://stat.livejournal.com/img/userinfo.gif" alt="[info]" width="17" height="17" border="0" align="absmiddle"/></a><a href="http://users.livejournal.com/$1/"><b>$1</b></a>', $content);
	$content = preg_replace('/<lj comm="([a-z0-9_]+)"\/?>/', '<a href="http://community.livejournal.com/$1/profile"><img src="http://stat.livejournal.com/img/community.gif" alt="[info]" width="16" height="16" align="absmiddle" border="0"/></a><a href="http://community.livejournal.com/$1/"><b>$1</b></a>', $content);
	return $content;
}

add_filter('the_content', 'lj_user_ex');
add_filter('comment_text', 'lj_user_ex');

?>