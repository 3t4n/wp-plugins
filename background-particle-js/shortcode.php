<?php
// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
    die("Don't try to access directly :-( ");
}

/**
* @Author: Maher Hossain
* @author_uri: https://maherhossain.com 
* @param $tag
* @param $callback
*/

add_shortcode('particlejs-banner', 'maher_particlejs_banner');
function maher_particlejs_banner(){
ob_start();
?>
  
  <section id="mh-particles-js" style="background-color: <?php echo get_option('background_color_of_banner'); ?>; background-image: url('<?php echo get_option("background_image_of_banner"); ?>'); height: <?php echo get_option('height_of_banner'); ?>px;">
    <div class="mh-banner-info">  
      
      <h1 id="banner-title" style="color: <?php echo get_option('banner_header_title_color'); ?>; font-size: <?php echo get_option('banner_header_title_font_size'); ?>px;">
          <?php echo get_option('banner_header_title'); ?>
        </h1>

      <p id="banner-text" style="color: <?php echo get_option('banner_description_text_color'); ?>; font-size: <?php echo get_option('banner_description_text_size'); ?>px;">
           <?php echo get_option('banner_description'); ?>
        </p>

      <a style="background: <?php echo get_option('banner_call_to_action_bg');?>; color: <?php echo get_option('banner_call_to_action_color');?>;" href="/<?php echo get_option('banner_call_to_action_url');?>">
          <?php echo get_option('banner_call_to_action'); ?>
        </a>
    </div> 
  </section>

 
   
<?php
    
  if( file_exists(dirname( __FILE__ ) . '/settings/options.php' )) {
        require_once( dirname( __FILE__ ) . '/settings/options.php' );
  }
  
    return ob_get_clean();
}

