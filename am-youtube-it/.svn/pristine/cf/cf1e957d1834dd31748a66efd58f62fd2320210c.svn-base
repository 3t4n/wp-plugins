<?php
/*
Plugin Name: AM YouTube it
Plugin URI: http://ayoubmedia.com/wp-plugins/youtube-it
Description: To start using AM YouTube it plugin click on new post, click inside text box to get focused then on YouTube icon.
Version: 1.1
Author: Ayoub Media
Author URI: http://ayoubmedia.com
License: GPL2
*/
add_thickbox();

//add a button to the content editor, next to the media button
//this button will show a popup that contains inline content
add_action('media_buttons_context', 'add_am_youtube');

//action to add a custom button to the content editor
function add_am_youtube($context) {
  
  //path 
  $img = plugins_url( 'button.png' , __FILE__ );
  $ytv = plugins_url( 'youtube_video.html' , __FILE__ );
  
  //the id of the container I want to show in the popup
  $container_id = 'popup_container';
  
  //our popup's title
  $title = 'Insert YouTube video';

  //append the icon
  $context .= "<a class='thickbox button' title='{$title}' href='{$ytv}?TB_iframe=true&width=450&height=450'><img src='{$img}' /></a>";
  
  return $context;
}

function am_youtube_content_filter($content) {
	if (strstr($content,"[am_youtube]") and strstr($content,"[/am_youtube]")){
		preg_match_all("/\[am_youtube](.*?)\[\/am_youtube]/",$content, $youtubeMatches);
		foreach($youtubeMatches[0] as $youtube)
		{
			$thisYoutube = str_replace(array("[am_youtube]","[/am_youtube]"),"",$youtube);
			$youtubePart = explode('|',$thisYoutube);
			$youtubeEmbed = "<iframe src=\"http://www.youtube.com/embed/{$youtubePart[2]}\" width=\"{$youtubePart[0]}\" height=\"{$youtubePart[1]}\" frameborder=\"0\" scrolling=\"no\" allowfullscreen=\"allowfullscreen\"></iframe>";
			$content = str_replace($youtube,$youtubeEmbed,$content);
		}
	}
	return  str_replace(array("[am_youtube]","[/am_youtube]"),"",$content);
}

add_filter( 'the_content', 'am_youtube_content_filter' );
?>