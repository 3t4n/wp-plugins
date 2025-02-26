<?php 
/**** Returns author id. ****/

add_shortcode( 'apm_author_id', 'apm_author_id_func' );

function apm_author_id_func() {
  $apm_author_id = get_the_author_meta( 'ID' );
  return $apm_author_id;
}

/**** Returns author email. ****/

add_shortcode( 'apm_author_email', 'apm_author_email_func' );

function apm_author_email_func() {
  $apm_author_email = get_the_author_meta( 'user_email' );
  return $apm_author_email;
}

/**** Returns author website. ****/

add_shortcode( 'apm_author_website', 'apm_author_website_func' );

function apm_author_website_func() {
  $apm_author_website = get_the_author_meta( 'user_url' );
  return $apm_author_website;
}

/**** Returns author display name. ****/

add_shortcode( 'apm_author_display_name', 'apm_author_display_name_func' );

function apm_author_display_name_func() {
  $apm_author_display_name = get_the_author_meta( 'display_name' );
  return $apm_author_display_name;
}

/**** Returns author first name. ****/

add_shortcode( 'apm_author_first_name', 'apm_author_first_name_func' );

function apm_author_first_name_func() {
  $apm_author_fn = get_the_author_meta( 'first_name' );
  return $apm_author_fn;
}

/**** Returns author last name. ****/

add_shortcode( 'apm_author_last_name', 'apm_author_last_name_func' );

function apm_author_last_name_func() {
  $apm_author_ln = get_the_author_meta( 'last_name' );
  return $apm_author_ln;
}

/**** Returns author description. ****/

add_shortcode( 'apm_author_description', 'apm_author_description_func' );

function apm_author_description_func() {
  $apm_author_des = get_the_author_meta( 'description' );
  return $apm_author_des;
}

/**** Returns author jabber. ****/

add_shortcode( 'apm_author_jabber', 'apm_author_jabber_func' );

function apm_author_jabber_func() {
  $apm_author_jabber = get_the_author_meta( 'jabber' );
  return $apm_author_jabber;
}

/**** Returns author aim. ****/

add_shortcode( 'apm_author_aim', 'apm_author_aim_func' );

function apm_author_aim_func() {
  $apm_author_aim = get_the_author_meta( 'aim' );
  return $apm_author_aim;
}

/**** Returns author yim. ****/

add_shortcode( 'apm_author_yim', 'apm_author_yim_func' );

function apm_author_yim_func() {
  $apm_author_yim = get_the_author_meta( 'yim' );
  return $apm_author_yim;
}

/**** Returns author googleplus. ****/

add_shortcode( 'apm_author_googleplus', 'apm_author_googleplus_func' );

function apm_author_googleplus_func() {
  $apm_author_googleplus = get_the_author_meta( 'googleplus' );
  return $apm_author_googleplus;
}

/**** Returns author twitter. ****/

add_shortcode( 'apm_author_twitter', 'apm_author_twitter_func' );

function apm_author_twitter_func() {
  $apm_author_twitter = get_the_author_meta( 'twitter' );
  return $apm_author_twitter;
}

/**** Returns author avatar. ****/

add_shortcode( 'apm_author_avatar', 'apm_author_avatar_func' );

function apm_author_avatar_func() {
  $apm_author_id = get_the_author_meta( 'ID' );
  $apm_author_avatar = get_avatar( $apm_author_id );
  return $apm_author_avatar;
}

/**** Returns current author posts url. ****/

add_shortcode( 'apm_author_posts_url', 'apm_author_posts_url_func' );

function apm_author_posts_url_func() {
  $apm_author_id = get_the_author_meta( 'ID' );
  $apm_author_posts_url = get_author_posts_url( $apm_author_id );
  return $apm_author_posts_url;
}

/**** Returns author number of posts. ****/

add_shortcode( 'apm_author_posts', 'apm_author_posts_func' );

function apm_author_posts_func() {
  $apm_author_posts = get_the_author_posts();
  return $apm_author_posts;
}

/**** Returns current user display name. ****/

add_shortcode( 'apm_user_display_name', 'apm_user_display_name_func' );

function apm_user_display_name_func() {
  global $current_user;
  get_currentuserinfo();
  $apm_user_display_name = $current_user->display_name;
  return $apm_user_display_name;
}

/**** Returns current user first name. ****/

add_shortcode( 'apm_user_first_name', 'apm_user_first_name_func' );

function apm_user_first_name_func() {
  global $current_user;
  get_currentuserinfo();
  $apm_user_first_name = $current_user->first_name;
  return $apm_user_first_name;
}

/**** Returns current user last name. ****/

add_shortcode( 'apm_user_last_name', 'apm_user_last_name_func' );

function apm_user_last_name_func() {
  global $current_user;
  get_currentuserinfo();
  $apm_user_last_name = $current_user->last_name;
  return $apm_user_last_name;
}

/**** Returns user id. ****/

add_shortcode( 'apm_user_id', 'apm_user_id_func' );

function apm_user_id_func() {
  global $current_user;
  get_currentuserinfo();
  $apm_user_id = $current_user->ID;
  return $apm_user_id;
}

/**** Returns user email. ****/

add_shortcode( 'apm_user_email', 'apm_user_email_func' );

function apm_user_email_func() {
  global $current_user;
  get_currentuserinfo();
  $apm_user_email = $current_user->user_email;
  return $apm_user_email;
}

/**** Returns user website. ****/

add_shortcode( 'apm_user_website', 'apm_user_website_func' );

function apm_user_website_func() {
  global $current_user;
  get_currentuserinfo();
  $apm_user_website = $current_user->user_url;
  return $apm_user_website;
}

/**** Returns user description. ****/

add_shortcode( 'apm_user_description', 'apm_user_description_func' );

function apm_user_description_func() {
  global $current_user;
  get_currentuserinfo();
  $apm_user_description = $current_user->description;
  return $apm_user_description;
}

/**** Returns user jabber. ****/

add_shortcode( 'apm_user_jabber', 'apm_user_jabber_func' );

function apm_user_jabber_func() {
  global $current_user;
  get_currentuserinfo();
  $apm_user_jabber = $current_user->jabber;
  return $apm_user_jabber;
}

/**** Returns user aim. ****/

add_shortcode( 'apm_user_aim', 'apm_user_aim_func' );

function apm_user_aim_func() {
  global $current_user;
  get_currentuserinfo();
  $apm_user_aim = $current_user->aim;
  return $apm_user_aim;
}

/**** Returns user yim. ****/

add_shortcode( 'apm_user_yim', 'apm_user_yim_func' );

function apm_user_yim_func() {
  global $current_user;
  get_currentuserinfo();
  $apm_user_yim = $current_user->yim;
  return $apm_user_yim;
}

/**** Returns user googleplus. ****/

add_shortcode( 'apm_user_googleplus', 'apm_user_googleplus_func' );

function apm_user_googleplus_func() {
  global $current_user;
  get_currentuserinfo();
  $apm_user_googleplus = $current_user->googleplus;
  return $apm_user_googleplus;
}

/**** Returns user twitter. ****/

add_shortcode( 'apm_user_twitter', 'apm_user_twitter_func' );

function apm_user_twitter_func() {
  global $current_user;
  get_currentuserinfo();
  $apm_user_twitter = $current_user->twitter;
  return $apm_user_twitter;
}

/**** Returns user avatar. ****/

add_shortcode( 'apm_user_avatar', 'apm_user_avatar_func' );

function apm_user_avatar_func() {
  global $current_user;
  get_currentuserinfo();
  $apm_user_id = $current_user->ID;
  $apm_user_avatar = get_avatar( $apm_user_id );
  return $apm_user_avatar;
}

/**** Returns site/blog title. ****/

add_shortcode( 'apm_blog_title', 'apm_blog_title_func' );

function apm_blog_title_func() {
  return get_bloginfo( 'name' );
}

/**** Returns site/blog tagline. ****/

add_shortcode( 'apm_blog_tagline', 'apm_blog_tagline_func' );

function apm_blog_tagline_func() {
  return get_bloginfo( 'description' );
}

/**** Returns site/blog url. ****/

add_shortcode( 'apm_blog_url', 'apm_blog_url_func' );

function apm_blog_url_func() {
  return get_bloginfo( 'url' );
}