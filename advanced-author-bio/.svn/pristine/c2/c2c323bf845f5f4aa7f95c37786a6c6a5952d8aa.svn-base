<?php
/*
Plugin Name: Advanced Author Bio
Plugin URI: http://www.itsabhik.com/advanced-author-bio-wordpress-plugin/
Description: Adds a short author bio after every single post on your blog. Also, adds Facebook, Twitter, Google+ and LinkedIn field in author's profile.
Version: 3.1
Author: Abhik
Author URI: http://www.itsabhik.com
License: GPL2
*/
?>
<?php
function aab_style() {
	echo ( '<link rel="stylesheet" type="text/css" href="'. WP_PLUGIN_URL . '/advanced-author-bio/style.css">' ); 
	}

function aab_contactmethods( $contactmethods ) {
	unset($contactmethods['jabber']);
	unset($contactmethods['yim']);
	unset($contactmethods['aim']);
	$contactmethods['websitename'] = 'Website Title';
	$contactmethods['googleplus'] = 'Google+ Profile';
	$contactmethods['linkedin'] = 'LinkedIn Profile';
	$contactmethods['twitter'] = 'Twitter Profile';
	$contactmethods['facebook'] = 'Facebook Profile';
	$contactmethods['pinterest'] = 'Pinterest Profile';
	$contactmethods['youtube'] = 'YouTube Profile';
	$contactmethods['flickr'] = 'Flickr Profile';
	$contactmethods['yahoo'] = 'Yahoo Profile';
	$contactmethods['stumble'] = 'StumbleUpon Profile';
return $contactmethods;
    }

function aab_author_meta($content){
	global $post;
	$email = get_the_author_meta('email');
	$default = WP_PLUGIN_URL . '/advanced-author-bio/images/default.png';
	$size = 70;
	$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&amp;s=" . $size;
	$aab_author = array();
	$aab_author['name'] = get_the_author();
	$aab_author['numberofposts'] = number_format_i18n(get_the_author_posts());
	$aab_author['authorpage'] = get_author_posts_url(get_the_author_meta( 'ID' ));
	$aab_author['description'] = get_the_author_meta('description');
	$aab_author['twitter'] = get_the_author_meta('twitter');
	$aab_author['facebook'] = get_the_author_meta('facebook');
	$aab_author['googleplus'] = get_the_author_meta('googleplus');
	$aab_author['linkedin'] = get_the_author_meta('linkedin');
	$aab_author['website'] = get_the_author_meta('url');
	$aab_author['gravatar'] = get_avatar(get_the_author_meta('email'), '50');
	$aab_author['websitename'] = get_the_author_meta('websitename');
	$aab_author['firstname'] = get_the_author_meta('first_name');
	$aab_author['youtube'] = get_the_author_meta('youtube');
	$aab_author['flickr'] = get_the_author_meta('flickr');
	$aab_author['pinterest'] = get_the_author_meta('pinterest');
	$aab_author['yahoo'] = get_the_author_meta('yahoo');
	$aab_author['stumble'] = get_the_author_meta('stumble');
	

if(!is_feed() && !is_home() && !is_404() && !is_archive() && !is_page() && !is_category()) {
	$content .='<div id="authorboxbody"><div class="authorinfo">';
	$content .='<img class="gravatar" src="'.$grav_url.'" alt="" />';
	$content .='<p class="authorname">Post By <a href="'.$aab_author['authorpage'].'">'.$aab_author['name'].'</a> (<span style="text-decoration:underline;">'.$aab_author['numberofposts'].' Posts</span>)</p>';
	$content .='<p class="description">'.$aab_author['description'].'</p>';
	if ($aab_author['website']) {
	$content .='<p class="website">Website: &rarr; <a href="'.$aab_author['website'].'">'.$aab_author['websitename'].'</a></p>'; }
	$content .='</div><div class="authorsocial">';
	$content .='<p>Connect</p>';
	$content .='<div class="socialicons">';
	
    if ($aab_author['facebook']) {
               $content .='<a href="'. $aab_author['facebook'].'"><img src="'.WP_PLUGIN_URL.'/advanced-author-bio/images/facebook.png" alt="" /></a>'; }
    if ($aab_author['twitter']) {
               $content .='<a href="'. $aab_author['twitter'].'"><img src="'.WP_PLUGIN_URL.'/advanced-author-bio/images/twitter.png" alt="" /></a>'; }
    if ($aab_author['googleplus']) {
               $content .='<a href="'. $aab_author['googleplus'].'"><img src="'.WP_PLUGIN_URL.'/advanced-author-bio/images/googleplus.png" alt="" /></a>'; }
    if ($aab_author['linkedin']) {
               $content .='<a href="'. $aab_author['linkedin'].'"><img src="'.WP_PLUGIN_URL.'/advanced-author-bio/images/linkedin.png" alt="" /></a>'; }
	if ($aab_author['pinterest']) {
               $content .='<a href="'. $aab_author['pinterest'].'"><img src="'.WP_PLUGIN_URL.'/advanced-author-bio/images/pinterest.png" alt="" /></a>'; }
	if ($aab_author['flickr']) {
               $content .='<a href="'. $aab_author['flickr'].'"><img src="'.WP_PLUGIN_URL.'/advanced-author-bio/images/flickr.png" alt="" /></a>'; }
	if ($aab_author['youtube']) {
               $content .='<a href="'. $aab_author['youtube'].'"><img src="'.WP_PLUGIN_URL.'/advanced-author-bio/images/youtube.png" alt="" /></a>'; }
	if ($aab_author['pinterest']) {
               $content .='<a href="'. $aab_author['linkedin'].'"><img src="'.WP_PLUGIN_URL.'/advanced-author-bio/images/pinterest.png" alt="" /></a>'; }
	if ($aab_author['yahoo']) {
               $content .='<a href="'. $aab_author['yahoo'].'"><img src="'.WP_PLUGIN_URL.'/advanced-author-bio/images/yahoo.png" alt="" /></a>'; }
	if ($aab_author['stumble']) {
               $content .='<a href="'. $aab_author['stumble'].'"><img src="'.WP_PLUGIN_URL.'/advanced-author-bio/images/stumbleupon.png" alt="" /></a>'; }

	$content .='</div></div>';
	$content .='<div class="clear"></div></div>';			   
}
	return $content;
}
remove_filter('pre_user_description', 'wp_filter_kses');
add_filter( 'pre_user_description', 'wp_filter_post_kses' );
add_filter('user_contactmethods','aab_contactmethods',10,1);
add_action('wp_head', 'aab_style');
add_filter ('the_content', 'aab_author_meta');
?>