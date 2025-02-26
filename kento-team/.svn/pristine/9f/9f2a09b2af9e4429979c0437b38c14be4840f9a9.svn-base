<?php
/*
Plugin Name: Kento Team
Plugin URI: http://kentothemes.com
Description: Unlimited Team Members for your company website team page
Version: 1.0
Author: KentoThemes
Author URI: http://kentothemes.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

define('KENTO_TEAM_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
wp_enqueue_style('kento-team-style', KENTO_TEAM_PLUGIN_PATH.'css/style.css');

add_filter('widget_text', 'do_shortcode');

function kento_team_contact_add($profile_fields) {

	// Add new fields
	$profile_fields['position'] = 'Position';
	$profile_fields['twitter'] = 'Twitter URL';
	$profile_fields['facebook'] = 'Facebook URL';
	$profile_fields['googleplus'] = 'Google+ URL';
	$profile_fields['linkedin'] = 'Linkedin URL';
	$profile_fields['youtube'] = 'Youtube URL';
	$profile_fields['skype'] = 'Skype ID';
	return $profile_fields;
}
add_filter('user_contactmethods', 'kento_team_contact_add');




function kento_team_shortcode($atts, $content = null) {

        $atts = shortcode_atts(
            array(
                'id' => '',
				'style' => '',
            ), $atts);


$ids = explode(',', $atts['id']);

foreach ($ids as $id)
	{
	
	$email = get_the_author_meta( user_email, $id );
	if($atts['style']==3 OR $atts['style']==4 )
		{
			$image = get_avatar( $email, 100 );
		}
	else
		{
		$image = get_avatar( $email, 512 );
		}
	
	
	$display_name = get_the_author_meta( display_name  , $id );
	$position = get_the_author_meta(position,$id);
	$facebook = get_the_author_meta(facebook,$id);
	$twitter = get_the_author_meta(twitter,$authorid);
	$googleplus = get_the_author_meta(googleplus,$authorid);
	$linkedin = get_the_author_meta(linkedin,$authorid);
	$youtube = get_the_author_meta(youtube,$authorid);
	$skype = get_the_author_meta(skype,$authorid);




	$count.= "<div class='single-member' id='style-".$atts['style']."'>";	
	$count.= 	"<div class='single-member-thumbnail'>".$image."</div>";
	$count.= 	"<div class='single-member-name'>".$display_name."</div>";
	$count.= 	"<div class='single-member-position'>".$position."</div>";	
	$count.= 	"<div class='social-links'>";
	$count.= 	"<div class='facebook sl'><a href='".$facebook."'></a></div>";
	$count.= 	"<div class='twitter sl'><a href='".$twitter."'></a></div>";
	$count.= 	"<div class='googleplus sl'><a href='".$googleplus."'></a></div>";	
	$count.= 	"<div class='linkedin sl'><a href='".$linkedin."'></a></div>";	
	$count.= 	"<div class='youtube sl'><a href='".$youtube."'></a></div>";	
	$count.= 	"<div class='skype sl'><a href='skype:".$skype."?call'></a></div>";		
	
	$count.= 	"</div>";
	
	
	$count.= "</div>";
	
	}



return "<div class='kento-team'>".$count."</div>";  
}

add_shortcode('team', 'kento_team_shortcode');



?>