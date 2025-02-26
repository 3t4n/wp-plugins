<?php
/*
Plugin Name: Auto Thumbnail 
Plugin URI: http://www.kopkap.in.th
Description: Sometimes you're forget add feature Image. So I think make about this plugin for get thumbnails form your post
Version: 1.0
Author: K'opkap
Author URI: http://www.kopkap.in.th
Text Domain: Auto Thumbnail
*/


function athn_thumbnails($atts){
  $atts = shortcode_atts(
   array(
     'width' => '300',
     'height' => '300'
         ), $atts);

  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ 
    $first_img = plugins_url( '/images/error.jpg', __FILE__ );
  }

  if ( has_post_thumbnail() ) {
    $a = the_post_thumbnail();
  }else{
    $a = '<img src=" ' . $first_img . '" alt="<?php the_title(); ?>" width="' . $atts['width'] . '" height="' . $atts['height'] . '" />';
  }
  
  return $a;

}
add_shortcode('thumbnails','athn_thumbnails');

