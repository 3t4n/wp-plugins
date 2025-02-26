<?php
/*
Plugin Name: AE FB Video Embed
Plugin URI: https://wordpress.org/plugins/ae-fb-video-embed/
Version: 1.2
Description: This plugin helps you embed public fb videos on your wordpress site
Author: Allan Empalmado
Author URI: https://www.facebook.com/allan.ramirez.empalmado
*/
?>
<?php
if ( ! defined( 'ABSPATH' ) ) exit;

if(!function_exists('ae_initfbsdk')){
  function ae_initfbsdk($content)
  {
      return "<div id='fb-root'></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = '//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>" . $content;
  }
}

add_filter ('the_content',"ae_initfbsdk");

if(!function_exists('ae_fb_start_embed_video')){
  function ae_fb_start_embed_video($atts ) {
        $a = shortcode_atts( array(
          'url'             => 'https://www.facebook.com/facebook/videos/10153231379946729/',
          'width'           => 500,
          'showtext'        => "false",
          'autoplay'        => "false",
          'allowfullscreen' => "false",
          'showcaptions'    => "false"
      ), $atts );
      
      /*
      * Since 1.0
      */
      $width            = $a['width'];
      $fburl            = $a['url'];

      /*
      * Since 1.2
      */
      $showtext         = $a['showtext'] === "true" ? 'true' : 'false';
      $autoplay         = $a['autoplay'] === "true" ? 'true' : 'false'; 
      $allowfullscreen  = $a['allowfullscreen'] === "true" ? 'true' : 'false'; 
      $showcaptions     = $a['showcaptions'] === "true" ? 'true' : 'false'; 
      
  	return '<div class="fb-video" data-href="'. $fburl.'" data-width="'.$width.'" data-show-text="'. $showtext . '" data-autoplay="' . $autoplay . '" data-allowfullscreen="' . $allowfullscreen . '" data-show-captions="' . $showcaptions . '"><div class="fb-xfbml-parse-ignore"></div></div>';
  }
}

add_shortcode( 'ae-fb-embed', 'ae_fb_start_embed_video' );



/*
  Since 1.2
*/
function ae_fb_shortcode_button() {
    echo '<a href="#" id="insert-ae-fb-video" class="button"><span class="dashicons dashicons-facebook"></span> AE FB Video Embed</a>';
}

add_action('media_buttons', 'ae_fb_shortcode_button', 15);

/*
  Since 1.2
*/
function ae_fb_embed_enqueue() {
    wp_enqueue_script( 'jquery-ui-dialog' ); 
    wp_enqueue_style( 'wp-jquery-ui-dialog' );
    wp_enqueue_script('ae-fb-video-embed-js', plugins_url('/assets/js/ae_fb_video_embed.js', __FILE__), array('jquery'), '1.0', true);
}

add_action('wp_enqueue_media', 'ae_fb_embed_enqueue');


