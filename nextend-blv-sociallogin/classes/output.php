<?php
/*=================================================
LoginPage
=================================================*/
if( true === blvnsl_facebook_judgment() || true === blvnsl_google_judgment() || true === blvnsl_twitter_judgment()){

  function blvnsl_jquery_output_loginpage() {

    //CSS
    if( 'default' === get_option('blvnsl_css_inclde') ){
      wp_enqueue_style( 'blv-sociallogin-css', plugins_url() .'/nextend-blv-sociallogin/css/login.css', array(), '1.0');
    }elseif( 'designation' ===  get_option('blvnsl_css_inclde') ){
      $blvnslcss_files = get_option('blvnsl_css_newurl');
      wp_enqueue_style( 'blv-sociallogin-css', $blvnslcss_files, array(), '1.0');
    }

    //It is JavaScript used to respond when changing the specification of each social button.
    if( 'default' === get_option('blvnsl_js_inclde') ){
      wp_enqueue_script('blv-sociallogin-js',  plugins_url() .'/nextend-blv-sociallogin/js/social-login-rule.js', array(), true);
    }elseif( 'designation' ===  get_option('blvnsl_js_inclde') ){
      $blvnsljs_files = get_option('blvnsl_js_newurl');
      wp_enqueue_script('blv-sociallogin-js',  $blvnsljs_files, array(), true);
    }

    //Facebook
    if( true === blvnsl_facebook_judgment() ){
      if( 'flag_valid' === get_option('blvnsl_facebookbtn_login') ){
        $tag_facebook = blvnsl_facebook_btn_source();
        $tag .= $tag_facebook;
      }
    }
    //Google
    if( true === blvnsl_google_judgment() ){
      if( 'flag_valid' === get_option('blvnsl_googlebtn_login') ){
        $tag_google = blvnsl_google_btn_source();
        $tag .= $tag_google;
      }
    }
    //Twitte
    if( true === blvnsl_twitter_judgment() ){
      if( 'flag_valid' === get_option('blvnsl_twitterbtn_login') ){
        $tag_twitter = blvnsl_twitter_btn_source();
        $tag .= $tag_twitter;
      }
    }

  if( isset($tag) ){
    wp_add_inline_script('blv-sociallogin-js', $tag, 'after');
  }
  }
  add_action( 'login_enqueue_scripts', 'blvnsl_jquery_output_loginpage' );
}


/*=================================================
 WP Members
=================================================*/
if( true === blvnsl_WP_Members_judgment()){
  function blvnsl_WP_Members_output() {

    //CSS
    if( 'default' === get_option('blvnsl_css_inclde') ){
      wp_enqueue_style( 'blv-sociallogin-css', plugins_url() .'/nextend-blv-sociallogin/css/login.css', array(), '1.0');
    }elseif( 'designation' ===  get_option('blvnsl_css_inclde') ){
      $blvnslcss_files = get_option('blvnsl_css_newurl');
      wp_enqueue_style( 'blv-sociallogin-css', $blvnslcss_files, array(), '1.0');
    }

    //It is JavaScript used to respond when changing the specification of each social button.
    if( 'default' === get_option('blvnsl_js_inclde') ){
      wp_enqueue_script('blv-sociallogin-js',  plugins_url() .'/nextend-blv-sociallogin/js/social-login-rule.js', array(), true);
    }elseif( 'designation' ===  get_option('blvnsl_js_inclde') ){
      $blvnsljs_files = get_option('blvnsl_js_newurl');
      wp_enqueue_script('blv-sociallogin-js',  $blvnsljs_files, array(), true);
    }

    //Facebook
    if( true === blvnsl_facebook_judgment() ){
      if( 'flag_valid' === get_option('blvnsl_facebookbtn_WP_Members') ){
        $tag_facebook = blvnsl_facebook_btn_sourceWP_Members();
        $tag .= $tag_facebook;
      }
    }
    //Google
    if( true === blvnsl_google_judgment() ){
      if( 'flag_valid' === get_option('blvnsl_googlebtn_WP_Members') ){
        $tag_google = blvnsl_google_btn_sourceWP_Members();
        $tag .= $tag_google;
      }
    }
    //Twitte
    if( true === blvnsl_twitter_judgment() ){
      if( 'flag_valid' === get_option('blvnsl_twitterbtn_WP_Members') ){
        $tag_twitter = blvnsl_twitter_btn_sourceWP_Members();
        $tag .= $tag_twitter;
      }
    }

  if( isset($tag) ){
    wp_add_inline_script('blv-sociallogin-js', $tag, 'after');
  }


  }
  add_action( 'wp_head', 'blvnsl_WP_Members_output', 10 );
}

