<?php
/*
Plugin Name: Fix NoFollow
Plugin URI: http://www.wp-creative.co.uk
Description:  Simple plugin to fix the latest Google algorithm update. It will add `rel=&quot;nofollow&quot;` and `target=&quot;_blank&quot;` to all EXTERNAL links only. This is good if you have previously sold links or have guest blog posts. If Webmaster Tools gives you a message "Unnatural outbound links", this will help you fix it and quickly!
Version: 2.0
Author: WP Creative (Ian Norris, James White)
Author URI: http://www.wp-creative.co.uk
License: GPL2+
*/

/*
Administration
*/
add_action("admin_menu","fixnf_menu");
function fixnf_menu()
{
	if(function_exists("add_menu_page")):
		add_menu_page("Fix NoFollow","Search External Links","administrator","fix-nofollow\external.php","");
	endif;
	
	if(function_exists("add_submenu_page")):		
		add_submenu_page("fix-nofollow\external.php","Scan External Links","Posts","administrator","fix-nofollow\posts.php","");
		add_submenu_page("fix-nofollow\external.php","Scan External Links","Custom Fields","administrator","fix-nofollow\customfields.php","");
	endif;
}

add_filter( 'the_content', 'fixnf_url');

function fixnf_url( $content ) {

	$regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>";
	if(preg_match_all("/$regexp/siU", $content, $matches, PREG_SET_ORDER)) {
		if( !empty($matches) ) {
			
			$srcUrl = get_option('siteurl');
			for ($i=0; $i < count($matches); $i++)
			{
			
				$tag = $matches[$i][0];
				$tag2 = $matches[$i][0];
				$url = $matches[$i][0];
				
				$noFollow = '';

				$pattern = '/target\s*=\s*"\s*_blank\s*"/';
				preg_match($pattern, $tag2, $match, PREG_OFFSET_CAPTURE);
				if( count($match) < 1 )
					$noFollow .= ' target="_blank" ';
					
				$pattern = '/rel\s*=\s*"\s*[n|d]ofollow\s*"/';
				preg_match($pattern, $tag2, $match, PREG_OFFSET_CAPTURE);
				if( count($match) < 1 )
					$noFollow .= ' rel="nofollow" ';
			
				$pos = strpos($url,$srcUrl);
				if ($pos === false) {
					$tag = rtrim ($tag,'>');
					$tag .= $noFollow.'>';
					$content = str_replace($tag2,$tag,$content);
				}
			}
		}
	}
	
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;

}