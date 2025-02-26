<?php
/**
 * @package aTokens
 * @author Abdelilah Sawab
 * @version 1.0
 */
/*
Plugin Name: aTokens
Description: aTokens widget integration into posts and pages. 
Author: Abdelilah Sawab
Version: 1.0
*/



// Hook admin menu | options page
add_action('admin_menu', 'atokens_menu');

function atokens_menu() {
  add_options_page('atokens Options', 'aTokens', 'administrator', 'atokens-admin', 'atokens_options');
}

function atokens_options() {
  require dirname(__FILE__).'/page_options.php';
}


add_filter("the_posts", "atokens_content_filter" );


function atokens_content_filter($content)
{
	$options = get_option('atokens_config');
	
	$posts = array();
	foreach($content as $item)
	{
		if(
			($item->post_type == 'post' && $options['posts'] == '1') || 
			($item->post_type == 'page' && $options['pages'] == '1')
		)
		{
			$style = "";
			if($options['hpos'] == 'right')
				$style .= "float: right;";
			
			$code = '<div class="atokens" style="'.$style.'"><script>var atokens_settings = {"username": "'.$options['username'].'", "style": "'.$options['style'].'", "url": "'.$item->guid.'"} 
</script><script src="https://atokens.com/js/widget/widget.js?v=0" type="text/javascript"></script><br style="clear: both" /></div>';
			
			if($options['vpos'] == 'top')
				$item->post_content = $code . $item->post_content;
			else
				$item->post_content .= $code;
		}
		
		$posts[] = $item;
	}
	
	return $posts;
}



