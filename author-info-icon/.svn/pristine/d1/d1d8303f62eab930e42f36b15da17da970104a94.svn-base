<?php
/*
Plugin Name: Author Info Icon 
Description: Author Info Icon Plugins show your social icon and your social link with content where you post the content.
Version:     2017.01.02
Author:      Majadul
Author URI:  https://profiles.wordpress.org/majadul
License:     GPL2
*/
/*
// font-awesome.css
*/
function social_user_icon_style() {
wp_enqueue_style ('font_awesome_css', plugin_dir_url(__FILE__ ).'font-awesome/css/font-awesome.css');
wp_enqueue_style ('font_awesome_min_css', plugin_dir_url(__FILE__ ).'font-awesome/css/font-awesome.min.css');
wp_enqueue_style ('social_style', plugin_dir_url(__FILE__ ).'css/social_style.css');
}
add_action('wp_enqueue_scripts', 'social_user_icon_style');

/**
 * Add additional custom field
 */

function social_user_icon_author($shareSocial) {
	// Add Twitter
	$shareSocial['twitter'] = 'Twitter';
	$shareSocial['facebook'] = 'Facebook';	
	$shareSocial['google'] = 'Google';	
	return $shareSocial;
}
add_filter('user_contactmethods','social_user_icon_author',10,1);


add_filter ('the_content', 'social_user_icon_social_info');
function social_user_icon_social_info($content) {
   if( null!==(is_single())) {
      $content.= '<div class="authorSocial">';
      $content.= '<ul>';
      $content.= "<li class='socialLink'><a href='".get_the_author_link()."'>".get_avatar( get_the_author_meta('email') , 30 )."</a></li>";
      $content.= "<li class='socialLinkName'><a href='".get_the_author_link()."'>".get_the_author_meta('display_name')."</a></li>";
// Facebook Icon
    $fempty = get_the_author_meta('facebook');
		if (!$fempty== "") {
      	$content.= "
      	<li class='socialLinkFacebook'><a href='".get_the_author_meta('facebook')."'><i class='fa fa-facebook face' aria-hidden='true'></i><span>Facebook</span></li>";
      }
      $tempty = get_the_author_meta('google');
      if (!$tempty == "") {
      	// Google Icon
          $content.= 
          "<li class='socialLinkGoogle'><a href='".get_the_author_meta('google')."'><i class='fa fa-twitter goog' aria-hidden='true'></i><span>Google</span></a></li>";
      	}
	$tempty = get_the_author_meta('twitter');
	if (!$tempty == "") {
		// Twitter Icon
	    $content.= 
	    "<li class='socialLinkTwitter'><a href='".get_the_author_meta('twitter')."'><i class='fa fa-twitter twit' aria-hidden='true'></i><span>Twitter</span></a></li>";
		}
// Date & Time
      $content.= "<li class='dateNtime'>  ".get_the_date(__(F))."-".get_the_date(__(j)).", ".get_the_date(__(Y))." | ".get_the_date(__(g)).":".get_the_date(__(i)).":".get_the_date(__(s))." ".get_the_date(__(A))."</li>";
      $content.= '</ul></div>';
   }
   return $content;
}
?>




