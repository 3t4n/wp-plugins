<?php
/*=================================================
Determine plugin
=================================================*/
/* Nextend Facebook Connect ----------*/
function blvnsl_facebook_judgment(){
  include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
  if(is_plugin_active( 'nextend-facebook-connect/nextend-facebook-connect.php' )){
    return true;
  } else {
    return false;
  }
};
/* Nextend Google Connect ----------*/
function blvnsl_google_judgment(){
  include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
  if(is_plugin_active( 'nextend-google-connect/nextend-google-connect.php' )){
    return true;
  } else {
    return false;
  }
};
/* Nextend Twitter Connect ----------*/
function blvnsl_twitter_judgment(){
  include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
  if(is_plugin_active( 'nextend-twitter-connect/nextend-twitter-connect.php' )){
    return true;
  } else {
    return false;
  }
};
/* WP Members check ----------*/
function blvnsl_WP_Members_judgment(){
  include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
  if(is_plugin_active( 'wp-members/wp-members.php' )){
    return true;
  } else {
    return false;
  }
};

/*=================================================
Login-page Button setting
=================================================*/
/* Nextend Facebook Button ----------*/
function blvnsl_facebook_btn_source(){
  $blvnsl_wordpressurl   = site_url();
  $blvnsl_facebook_title = __('Facebook Connect','nextend-blv-sociallogin');
  $blvnsl_facebook_btn   = <<< EOM
jQuery(document).ready(function () {
  (function ($) {
  $('p.forgetmenot').before("<div class='login-pagebtn login-pagebtn-facebook'><a href='{$blvnsl_wordpressurl}/wp-login.php?loginFacebook=1&redirect={$blvnsl_wordpressurl}' onclick='window.location ='{$blvnsl_wordpressurl}/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;'>{$blvnsl_facebook_title}</a></div>" )
  }(jQuery));
});
EOM;
  return $blvnsl_facebook_btn;
};

/* Nextend Google Button ----------*/
function blvnsl_google_btn_source(){
  $blvnsl_wordpressurl = site_url();
  $blvnsl_Google_title = __('Google+ Connect','nextend-blv-sociallogin');
  $blvnsl_google_btn   = <<< EOM
jQuery(document).ready(function () {
  (function ($) {
  $('p.forgetmenot').before("<div class='login-pagebtn login-pagebtn-google'><a href='{$blvnsl_wordpressurl}/wp-login.php?loginGoogle=1&redirect={$blvnsl_wordpressurl}' onclick='window.location ='{$blvnsl_wordpressurl}/wp-login.php?loginGoogle=1&redirect='+window.location.href; return false;'>{$blvnsl_Google_title}</a></div>" );
  }(jQuery));
});
EOM;
  return $blvnsl_google_btn;
};

/* Nextend Twitter Button ----------*/
function blvnsl_twitter_btn_source(){
  $blvnsl_wordpressurl  = site_url();
  $blvnsl_twitter_title = __('Twitter Connect','nextend-blv-sociallogin');
  $blvnsl_twitter_btn   = <<< EOM
jQuery(document).ready(function () {
  (function ($) {
  $('p.forgetmenot').before("<div class='login-pagebtn login-pagebtn-twitter'><a href='{$blvnsl_wordpressurl}/wp-login.php?loginTwitter=1&redirect={$blvnsl_wordpressurl}' onclick='window.location ='{$blvnsl_wordpressurl}/wp-login.php?loginTwitter=1&redirect='+window.location.href; return false;'>{$blvnsl_twitter_title}</a></div>" );
  }(jQuery));
});
EOM;
  return $blvnsl_twitter_btn;
};

/*=================================================
WP Members Widget Button setting
=================================================*/
/* Nextend Facebook Button WP Members ----------*/
function blvnsl_facebook_btn_sourceWP_Members(){
  $blvnsl_wordpressurlWP_Members  = site_url();
  $blvnsl_facebook_title          = __('Facebook Connect','nextend-blv-sociallogin');
  $blvnsl_facebook_btnWP_Members  = <<< EOM
jQuery(document).ready(function () {
  (function ($) {
  $('.button_div').before("<div class='widget-pagebtn widget-pagebtn-facebook'><a href='{$blvnsl_wordpressurlWP_Members}/wp-login.php?loginFacebook=1&redirect={$blvnsl_wordpressurlWP_Members}' onclick='window.location ='{$blvnsl_wordpressurl}/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;'>{$blvnsl_facebook_title}</a></div>" );
  }(jQuery));
});
EOM;
  return $blvnsl_facebook_btnWP_Members;
};

/* Nextend Google Button ----------*/
function blvnsl_google_btn_sourceWP_Members(){
  $blvnsl_wordpressurlWP_Members = site_url();
  $blvnsl_Google_title           = __('Google+ Connect','nextend-blv-sociallogin');
  $blvnsl_google_btnWP_Members   = <<< EOM
jQuery(document).ready(function () {
  (function ($) {
  $('.button_div').before("<div class='widget-pagebtn widget-pagebtn-google'><a href='{$blvnsl_wordpressurlWP_Members}/wp-login.php?loginGoogle=1&redirect={$blvnsl_wordpressurlWP_Members}' onclick='window.location ='{$blvnsl_wordpressurl}/wp-login.php?loginGoogle=1&redirect='+window.location.href; return false;'>{$blvnsl_Google_title}</a></div>" )
  }(jQuery));
});
EOM;
  return $blvnsl_google_btnWP_Members;
};

/* Nextend Twitter Button ----------*/
function blvnsl_twitter_btn_sourceWP_Members(){
  $blvnsl_wordpressurlWP_Members = site_url();
  $blvnsl_twitter_title          = __('Twitter Connect','nextend-blv-sociallogin');
  $blvnsl_twitter_btnWP_Members  = <<< EOM
jQuery(document).ready(function () {
  (function ($) {
  $('.button_div').before("<div class='widget-pagebtn widget-pagebtn-twitter'><a href='{$blvnsl_wordpressurlWP_Members}/wp-login.php?loginTwitter=1&redirect={$blvnsl_wordpressurlWP_Members}' onclick='window.location ='{$blvnsl_wordpressurl}/wp-login.php?loginTwitter=1&redirect='+window.location.href; return false;'>{$blvnsl_twitter_title}</a></div>" )
  }(jQuery));
});
EOM;
  return $blvnsl_twitter_btnWP_Members;
};
