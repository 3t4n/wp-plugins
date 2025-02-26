<?php
/*
Plugin Name: All in One Facebook Pack
Plugin URI: http://www.wpcode.net/all-in-one-facebook-pack/
Description: Complete solution for the Facebook Social Plugins and Facebook Open Graph.
Version: 0.1b
Author: Pigi
Author URI: http://www.wpcode.net
License: GPL2
*/


/*  Copyright 2010  Pigi  (email : support@wpcode.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Load the Dashboard Widget if not exist
if ( function_exists('wpcode_widget')) {} else { require_once('dash_wpcode.php'); }
// Check if support Thumbnail
if ( function_exists('wp_get_attachment_thumb_url()')) {} else { add_theme_support('post-thumbnails'); }
// Load the Settings Panel
require_once('aiofpsetup.php');
// Add Open Graph to your blog's header

function wpc_aiofp_opengraph() {

?>
<!-- All in One Facebook Pack by Pigi Wpcode.net -->

<meta property="og:title" content="<?php the_title(); ?>" />
<meta property="og:url" content="<?php the_permalink(); ?>" />
<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
<?php if(get_option('wpc_aiofp_desc') == "excerpt") { ?>
<meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
<?php } if(get_option('wpc_aiofp_desc')== "content") {?>
<meta property="og:description" content="<?php echo strip_tags(get_the_content($post->ID)); ?>" />
<?php } if(get_option('wpc_aiofp_desc')== "manually") { ?>
<meta property="og:description" content="Ciao Oh banana Giò" />
<?php } ?>
<?php if (get_option('wpc_aiofp_manager') == "appid") { ?>
<meta property="fb:app_id" content="<?php echo get_option("wpc_aiofp_appid"); ?>"/>
<?php } if (get_option('wpc_aiofp_manager') == "userid") { ?>
<meta property="fb:admins" content="<?php echo get_option("wpc_aiofp_uid"); ?>"/>
<?php } if(get_option('wpc_aiofp_manager')=="both") { ?>
<meta property="fb:app_id" content="<?php echo get_option("wpc_aiofp_appid"); ?>"/> 
<meta property="fb:admins" content="<?php echo get_option("wpc_aiofp_uid"); ?>">
<?php } ?>
<meta property="og:image" content="<?php echo wp_get_attachment_thumb_url( get_post_thumbnail_id( $post->ID ) ) ?>"/>

<!-- All in One Facebook Pack by Pigi Wpcode.net -->
<?php }
if (get_option('wpc_aiofp_opengraph') == "disable"){} else { 
add_action('wp_head', 'wpc_aiofp_opengraph');
} 
//this will close the first conditional tag

// Add the Facebook "Like Button" with the shortocde

function wpc_likebutton() { ?>

<div id="fb-root"></div>
<script src="http://connect.facebook.net/<?php echo get_option('wpc_aiofp_language'); ?>/all.js#appId=<?php echo get_option('wpc_aiofp_appid'); ?>&amp;xfbml=1"></script>
<fb:like href="<?php the_permalink(); ?>" send="<?php echo get_option('wpc_aiofp_send_button'); ?>" layout="<?php echo get_option('wpc_aiofp_layout_button'); ?>" width="<?php echo get_option('wpc_aiofp_width_button'); ?>" show_faces="<?php echo get_option('wpc_aiofp_face_button'); ?>" font="<?php echo get_option('wpc_aiofp_font'); ?>"></fb:like>
<?php  }

add_shortcode('like_button', 'wpc_likebutton');

// Add the Facebook "Like Box" with the shortocde

function wpc_likebox() { ?>
<div id="fb-root"></div>
<script src="http://connect.facebook.net/<?php echo get_option('wpc_aiofp_language'); ?>/all.js#xfbml=1"></script>
<fb:like-box href="<?php echo get_option('wpc_aiofp_url_box'); ?>" width="<?php echo get_option('wpc_aiofp_width_box'); ?>" show_faces="<?php echo get_option('wpc_aiofp_face_box'); ?>" border_color="<?php echo get_option('wpc_aiofp_border_color_box'); ?>" stream="<?php echo get_option('wpc_aiofp_stream_box'); ?>" header="true"></fb:like-box>
<?php }
add_shortcode('like_box', 'wpc_likebox');

// Add the Facebook "Send Button" with the shortocde

function wpc_send_button() { ?>
<div id="fb-root"></div><script src="http://connect.facebook.net/<?php echo get_option('wpc_aiofp_language'); ?>/all.js#xfbml=1"></script><fb:send href="<?php the_permalink(); ?>" font="<?php echo get_option('wpc_aiofp_font'); ?>"></fb:send>
<?php }
add_shortcode('send_button', 'wpc_send_button');

// Add the Facebook "Comment Box" with the shortocde

function wpc_commentsbox() { ?>
<div id="fb-root"></div><script src="http://connect.facebook.net/<?php echo get_option('wpc_aiofp_language'); ?>/all.js#xfbml=1"></script>
<fb:comments href="<?php the_permalink(); ?>" num_posts="<?php echo get_option('wpc_aiofp_number_comment'); ?>" width="<?php echo get_option('wpc_aiofp_width_comment'); ?>"></fb:comments>
<?php }
add_shortcode('comments_box', 'wpc_commentsbox');

// Add the Facebook "FacePile" with the shortocde

function wpc_facepile() { ?>
<div id="fb-root"></div>
<script src="http://connect.facebook.net/<?php echo get_option('wpc_aiofp_language'); ?>/all.js#xfbml=1"></script>
<fb:facepile href="<?php echo get_option('wpc_aiofp_url_box'); ?>" width="<?php echo get_option('wpc_aiofp_width_facepile'); ?>" max_rows="<?php echo get_option('wpc_aiofp_rows_facepile'); ?>"></fb:facepile>
<?php }
add_shortcode('facepile', 'wpc_facepile');

// Add the Facebook "LiveStream Box" with the shortocde

function wpc_livestream() { ?>
<div id="fb-root"></div>
<script src="http://connect.facebook.net/<?php echo get_option('wpc_aiofp_language'); ?>/all.js#appId=<?php echo get_option('wpc_aiofp_appid'); ?>&amp;xfbml=1"></script>
<fb:live-stream event_app_id="<?php echo get_option('wpc_aiofp_appid'); ?>" width="<?php echo get_option('wpc_aiofp_width_livestream'); ?>" height="<?php echo get_option('wpc_aiofp_height_livestream'); ?>" xid="" via_url="<?php bloginfo('url'); ?>" always_post_to_friends="<?php echo (get_option('wpc_aiofp_friend_livestream')); ?>"></fb:live-stream>
<?php }
add_shortcode('live_stream', 'wpc_livestream');

?>