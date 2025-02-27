<?php
/**
* Plugin Name: My Youtube Playlist
* Plugin URI: https://plugins.followmedarling.se/my-youtube-playlist/
* Description: Custom playlist from YouTube with thumbnails, loads YouTube clips without reloading your page.  Example: [myyoutubeplaylist WnY59mDJ1gg, bKwQ_zeRwEs]
* Version: 2.54
* Author: Jonk @ Follow me Darling
* Author URI: https://plugins.followmedarling.se/
* Domain Path: /languages
* Text Domain: my-youtube-playlist
**/

define("myYoutubePlaylist_REGEXP", "/\[myyoutubeplaylist ([[:print:]]+)\]/");

define("myYoutubePlaylist_TARGET", "<div class=\"myYoutubePlaylist\">
	<div id=\"myYoutubePlaylist_###STARTVIDEO###\" class=\"myYoutubePlaylist_YoutubeMovie\">
		<noscript><iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/###STARTVIDEO###?playlist=###ALLVIDEOS###&amp;feature=oembed&amp;modestbranding=1&amp;showinfo=0&amp;rel=0\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe></noscript>
	</div>
	<div class=\"myYoutubePlaylist_YoutubePlaylist\" id=\"myYoutubePlaylist_YoutubePlaylist_###STARTVIDEO###\"></div>
</div>
<div class=\"myYoutubePlaylist_clearer\"><script language=\"JavaScript\" type=\"text/javascript\">
<!--
myYoutubePlaylist_cy('###STARTVIDEO###','myYoutubePlaylist_###STARTVIDEO###', '', '###ALLVIDEOS###');
myYoutubePlaylist_dl('###ALLVIDEOS###','myYoutubePlaylist_YoutubePlaylist_###STARTVIDEO###','myYoutubePlaylist_###STARTVIDEO###');
//-->∫
</script></div>
");

function myYoutubePlaylist_callback($match) {
	$output = myYoutubePlaylist_TARGET;
	$video = explode(", ", $match[1]);
	$allVideos = str_replace(' ', '', $match[1]);
	$output = str_replace("###STARTVIDEO###", $video[0], $output);
	$output = str_replace("###ALLVIDEOS###", $allVideos, $output);
	return ($output);
}

function myYoutubePlaylist($content) {
	return (preg_replace_callback(myYoutubePlaylist_REGEXP, 'myYoutubePlaylist_callback', $content));
}

//add_action ('init', 'checkExtLogin');
add_action( 'wp_enqueue_scripts', 'myYoutubePlaylist_enqueue_script' );
function myYoutubePlaylist_enqueue_script() {
	$myYoutubePlaylistGlobal_Path = plugin_dir_url( __FILE__ );
	wp_enqueue_style( 'my-youtube-playlist-css', $myYoutubePlaylistGlobal_Path . 'myYoutubePlaylist.css' );
	wp_enqueue_script( 'my-youtube-playlist-js', $myYoutubePlaylistGlobal_Path . 'myYoutubePlaylist.js', array('jquery') );
	add_filter('the_content', 'myYoutubePlaylist',1);
}
?>
