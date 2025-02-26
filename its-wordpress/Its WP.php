<?php
/*
Plugin Name: Its WordPress
Version: 0.5
Plugin URL: http://www.wpart.tk
Description: "It's "WordPress"" is a simple WP plugin that will eliminate your mistakes from the post of the spelling WordPress or WP. If you write wordpress or Wordpress it will automatically make that WordPress in the post body and title. So you need no to worry for that anymore. This will make auto correction of your spelling, so you will see "wordpress" in the editor , but the readers will see WordPress or WP in the page/post.
Author: Arif Nezami
*/

function my_function ($text) {
	$text = str_replace('Wordpress', 'WordPress', $text);
	$text = str_replace('wordpress', 'WordPress', $text);
	$text = str_replace('wordPress', 'WordPress', $text);
	$text = str_replace('WORDPRESS', 'WordPress', $text);
	$text = str_replace('wORDpRESS', 'WordPress', $text);
	$text = str_replace('WordPRESS', 'WordPress', $text);
	$text = str_replace('WORDpress', 'WordPress', $text);
	$text = str_replace('wOrdpRess', 'WordPress', $text);
	$text = str_replace('wp', 'WP', $text);
	$text = str_replace('Wp', 'WP', $text);
	$text = str_replace('wP', 'WP', $text);
	return $text;
}


add_filter('the_title', 'my_function');
add_filter('the_content', 'my_function');

?>