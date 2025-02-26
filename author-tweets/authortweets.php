<?php
/*
Plugin Name: Author Tweets
Plugin URI:  http://krisjaydesigns.com
Description: Display's Author Info, a Link To Their Website, and The Author's Last Tweet every time they Tweet! Just enter Your Twitter Username. Uses jQuery and JSON.
Author: Kris Jonasson
Author URI:  http://krisjaydesigns.com
Version: 1.0

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/
function add_author_twitter( $contactmethods ) {
$contactmethods['twitter'] = 'Twitter Username';
  return $contactmethods;
}
add_filter('user_contactmethods','add_author_twitter',10,1);
function authortweets_css() {
	$authortweetscss = WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__)).'/authortweets.css';
	echo '<link rel="stylesheet" type="text/css" href="' . $authortweetscss . '" media="screen" />';
}
add_action('wp_head', 'authortweets_css');
function authortweets_box( $content='' ) {
	if( is_single() ) {
		$content .= '<div class="authortweetswrap"><br class="clear"/>'
			 .'<h4>About the Author</h4><div class="clear"><div class="atbghrt"></div><div class="atbghrb"></div>'
			 .get_avatar( get_the_author_email(), '60' )
			 .'<p><strong>'.get_the_author_firstname().' '
			 .get_the_author_lastname().' Has Written '
			 .get_the_author_posts().' Articles For Us&#33;</strong></p>'
			 .get_the_author_meta( 'description' ).'</div><div class="atbghrt2"></div>'
                         .'<div id="latest_authortweet">Getting The Latest Tweet...</div><div class="atbghrt"></div><div class="atbghrb"></div>'
                         .'<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>'
                            .'<script src="/wp-content/plugins/author-tweets/authortweets.1.0.js" type="text/javascript"></script>';
		$author = get_the_author();
		$content .= '<div class="authfoot" style="text-align:center;"><a href="http://gdsweb.ca" target="_blank" style="float:left;" title="Powered By Author Tweets"><img src="/wp-content/plugins/author-tweets/gdlogo.png"  style="float:left;padding:1px;margin:0 3px 0 0;" alt=""/></a>  Did you know '.get_the_author_firstname().' has a <b>'.__("").'<a href="' . get_the_author_meta('url')
        	         .'" rel="external" target="_blank">'.__("website").'</a></b>&#63; Go see what you&#39;re missing...<br/>';
		$author_twitter = get_the_author_meta('twitter');		
		$content .= '<div class="clear"></div></div></div><script src="http://twitter.com/statuses/user_timeline/'. $author_twitter . '.json?callback=twitter_callback_function&count=1" type="text/javascript"></script>';
	}
	return $content;
}
add_filter('the_content', 'authortweets_box');
 ?>
