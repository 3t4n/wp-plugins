<?
/**
 * 
 * 
 * 
 */
/*
Plugin Name: Andy's List Subpage
Plugin URI: http://barsnesssolutions.com
Description: Just type {list} in each page or post that you want your subpages listed
Author: Andy Stramer
Version: 1.0
Author URI: http://barsnesssolutions.com
*/

add_filter('the_content', 'checkSubs');

function checkSubs($text)
{
	global $id;
	if(strpos($text, '{list}'))
	{
		$replace = '<ul class="subpage-style">'.wp_list_pages("title_li=&child_of=$id&echo=0").'</ul>';
		$text = str_replace('{list}', $replace, $text);
	}
	return $text;
}
?>