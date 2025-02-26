<?php
/*
Plugin Name: All social share button
Plugin URI:  
Description: It will add all the social share buttons to the website.
Version:     1.0.0.0
Author:      DevDiz
Author URI:  http://www.devdiz.com/
*/
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function assb_addcssfile() {
    $plugin_url = plugin_dir_url( __FILE__ );
    wp_enqueue_style( 'style', $plugin_url . 'css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'assb_addcssfile' );

add_filter('the_content', 'assb_addsharebuttons', 99999);
function assb_addsharebuttons($content)
	{
		$tag_pattern = '/<div id="sharepost"/i';

		if(!preg_match($tag_pattern,$content)) // Make sure we dont intefere with the plugins
		{	
			// Check for an existing copy of the text in the post
			$title = the_title("","",false);
			$url = get_permalink();	
			$content .= __('<div id="ASSB-block">');
			if(!get_option( 'social_share_title' )==""){
				$content .= __('<div class="title"><span>'.get_option( 'social_share_title' ).'</span></div>');
			}
			
			if(get_option( 'socialcheckbox' ) == ''){
				
			}
			else{
			if	(__(get_option( 'socialcheckbox' )['digg']) == 1) {
				$content .= __(' <a href="http://digg.com/submit?url=' . $url . '&amp;title=' . $title . '&amp;bodytext=&amp;media=&amp;topic=" target="_blank"><img src="'.plugins_url( 'images/digg-sq-bent.png', __FILE__ ).'" alt="" /></a>');
			}
			if (__(get_option( 'socialcheckbox' )['facebook']) == 1) {
				$content .= __(' <a href="http://www.facebook.com/share.php?u=' . $url . '" target="_blank"><img src="'.plugins_url( 'images/fb-sq-bent.png', __FILE__ ).'" alt="" /></a> ');
			}
			if (__(get_option( 'socialcheckbox' )['gmail']) == 1) {
				$content .= __(' <a href="mailto:?subject=' . $title . '&body=Check out this site: '. $url .'" target="_blank"><img src="'.plugins_url( 'images/gmail-sq-bent.png', __FILE__ ).'" alt="" /></a>');
			}
			if (__(get_option( 'socialcheckbox' )['gplus']) == 1) {
				$content .= __(' <a href="https://plus.google.com/share?url=' . $url . '" target="_blank"><img src="'.plugins_url( 'images/google-sq-bent.png', __FILE__ ).'" alt="" /></a>');
			}
			if (__(get_option( 'socialcheckbox' )['linkedin']) == 1) {
				$content .= __(' <a href="http://www.linkedin.com/shareArticle?url=' . $url . '&amp;title=' . $title . '" target="_blank"><img src="'.plugins_url( 'images/linkedin-sq-bent.png', __FILE__ ).'" alt="" /></a>');
			}
			if (__(get_option( 'socialcheckbox' )['pinterest']) == 1) {
				$content .= __(' <a href="https://pinterest.com/pin/create/bookmarklet/?url=' . $url .'" target="_blank"><img src="'.plugins_url( 'images/pinterest-sq-bent.png', __FILE__ ).'" alt="" /></a>');
			}
			if (__(get_option( 'socialcheckbox' )['reddit']) == 1) {
				$content .= __(' <a href="http://digg.com/submit?url=' . $url . '&amp;title=' . $title . '&amp;bodytext=&amp;media=&amp;topic=" target="_blank"><img src="'.plugins_url( 'images/reddit-sq-bent.png', __FILE__ ).'" alt="" /></a>');
			}
			if (__(get_option( 'socialcheckbox' )['tumbler']) == 1) {
				$content .= __(' <a href="http://www.tumblr.com/share/link?url=' . $url . '&amp;title=' . $title . '&amp;bodytext=&amp;media=&amp;topic=" target="_blank"><img src="'.plugins_url( 'images/tumbler-sq-bent.png', __FILE__ ).'" alt="" /></a>');
			}
			if (__(get_option( 'socialcheckbox' )['twitter']) == 1) {
				$content .= __(' <a href="http://twitter.com/home?status=' . $url . ' target="_blank"><img src="'.plugins_url( 'images/twitter-sq-bent.png', __FILE__ ).'" alt="" /></a> ');
			}
			if (__(get_option( 'socialcheckbox' )['vk']) == 1) {
				$content .= __(' <a href="http://vk.com/share.php?url=' . $url . '&amp;title=' . $title . '&amp;bodytext=&amp;media=&amp;topic=" target="_blank"><img src="'.plugins_url( 'images/vk-sq-bent.png', __FILE__ ).'" alt="" /></a>');
			}
			if (__(get_option( 'socialcheckbox' )['whatsapp']) == 1) {
				$content .= __(' <a href="whatsapp://send?text=' . $url . '&amp;title=' . $title . '&amp;bodytext=&amp;media=&amp;topic=" target="_blank"><img src="'.plugins_url( 'images/whatsapp-sq-bent.png', __FILE__ ).'" alt="" /></a>');
			}
		}
			$content .= __('</div>');
		  
		  
    }
    
    return $content;
	}	

// Include the dependencies needed to instantiate the plugin.
foreach ( glob( plugin_dir_path( __FILE__ ) . 'admin/*.php' ) as $file ) {
   include_once $file;
}

add_action( 'plugins_loaded', 'assb_socialbuttonload' );
/**
* Starts the plugin.
*/
function assb_socialbuttonload() {
   $plugin = new assb_sharebuttonMainpage( new assb_sharebuttonPage() );
   $plugin->assb_init();

}
?>