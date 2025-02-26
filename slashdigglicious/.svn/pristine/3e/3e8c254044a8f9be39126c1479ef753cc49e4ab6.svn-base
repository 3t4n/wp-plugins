<?php
/*
Plugin Name: Slashdigglicious
Plugin URI: http://www.tsaiberspace.net/projects/wordpress/slashdigglicious/
Description: Add user-submission icons and links at the bottom of each post: Digg, del.icio.us, etc.
Author: Robert Tsai
Author URI: http://www.tsaiberspace.net/
Version: 1.0.6
*/

function slashdiggliciousEnabled($unused)
{
	/*
	 * You can suppress links by including <!--noslashdigglicious--> in the
	 * text of your post.
	 *
	 * (See get_the_content implementation.)
	 */
	global $post, $page, $pages, $single;
	if ($page > count($pages))
		$page = count($pages);
        $post_content = $pages[$page-1];

	if (strpos($post_content, '<!--slashdigglicious-->') !== false)
		return true;
	if (!$single && strpos($post_content, '<!--more-->') !== false)
		return false;
	if (strpos($post_content, '<!--noslashdigglicious-->') !== false)
		return false;
	return true;
}

function slashdiggliciousLinks($link, $title)
{
	$link = urlencode($link);
	$title = urlencode($title);

	$slashdot = '<a href="http://slashdot.org/bookmark.pl?url='
			. "$link&amp;title=$title\""
			. ' title="Slashdot It!">'
		. '<img src="http://slashdot.org/favicon.ico"'
			. ' height="16" width="16" alt="[Slashdot]" />'
		. '</a>';

	$digg = '<a href="http://digg.com/submit?phase=2&amp;url='
			. "$link&amp;title=$title"
			. '" title="Digg This Story">'
		. '<img src="http://cdn1.diggstatic.com/img/favicon.a015f25c.ico"'
			. ' width="16" height="16" alt="[Digg]" />'
		. '</a>';

	$reddit = '<a href="http://reddit.com/submit?url='
			. "$link&amp;title=$title"
			. '" title="Reddit">'
		. '<img src="http://reddit.com/favicon.ico"'
			. ' width="16" height="16" alt="[Reddit]" />'
		. '</a>';

	$delicious = '<a href="http://del.icio.us/post?url='
			. "$link&amp;title=$title"
			. '"'
		. ' title="Save to del.icio.us"'
		. ' onclick="window.open(\'http://del.icio.us/post'
			. '?v=4&amp;noui&amp;jump=close&amp;url='
			. "$link&amp;title=$title', 'delicious',"
			. " 'toolbar=no,width=700,height=400');"
			. ' return false;">'
		. '<img src="http://images.del.icio.us/static/img/delicious.small.gif"'
			. ' width="16" height="16" alt="[del.icio.us]" />'
		. '</a>';

	$facebook = '<a href="http://www.facebook.com/share.php?'
			. "u=$link"
			. '" title="Share on Facebook">'
		. '<img src="http://www.facebook.com/favicon.ico"'
			. ' width="16" height="16" alt="[Facebook]" />'
		. '</a>';

	$technorati = '<a href="http://technorati.com/faves?add='
		. $link . '" title="Add to my Technorati Favorites">'
		. '<img src="http://technorati.com/favicon.ico"'
			. ' width="16" height="16" alt="[Technorati]" />'
		. '</a>';

	$google = '<a href="http://www.google.com/bookmarks/mark?op=edit&amp;'
			. 'output=popup&amp;bkmk='
			. "$link&amp;title=$title"
			. '" title="Save to Google Bookmarks">'
		. '<img src="http://www.google.com/favicon.ico"'
			. ' width="16" height="16" alt="[Google]" />'
		. '</a>';

	$stumbleupon = '<a href="http://www.stumbleupon.com/submit?url='
			. "$link&amp;title=$title"
			. '" title="Stumble it!">'
		. '<img src="http://www.stumbleupon.com/favicon.ico"'
			. ' width="16" height="16" alt="[StumbleUpon]" />'
		. '</a>';

	return "<span class=\"slashdigglicious\">\n"
		. implode("\n", array(
			$slashdot,
			$digg,
			$reddit,
			$delicious,
			$facebook,
			$technorati,
			$google,
			$stumbleupon,
			))
		. "\n</span>";
}

function slashdiggliciousify($content)
{
	if (!slashdiggliciousEnabled($content))
		return $content;

	return "$content\n"
		. slashdiggliciousLinks(get_permalink(),
			the_title('', '', false));
}

if (function_exists('add_action')) {
	add_action('the_content', 'slashdiggliciousify');
}

?>
