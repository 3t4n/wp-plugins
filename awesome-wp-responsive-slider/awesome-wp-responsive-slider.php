<?php 

/*
Plugin Name: Awesome responsive slider
Plugin URI: httts://wordpress.org/plugins/Awesome-wp-responsive-slider
Description: easy and very collerful plugin
Version:     1.0
Author:      nayon
Author URI:  http://nayonbd.com
*/




 


class Awrs_Awesome_responsive_slider{

  public function __construct(){

    add_action('wp_enqueue_scripts',array($this,'slider_script_area'));
    add_action('init',array($this,'main_slider_area'));
    add_shortcode('awesome-slider',array($this,'awesome_slider_area'));
  }

  public function slider_script_area(){

    wp_enqueue_style('immersive-css',PLUGINS_URL('css/jquery.bxslider.min.css',__FILE__));
    
    wp_enqueue_script('bxslider',PLUGINS_URL('js/jquery.bxslider.min.js',__FILE__),array('jquery'));
    wp_enqueue_script('custom-slider',PLUGINS_URL('js/custom.js',__FILE__),array('jquery'));

  }

  public function main_slider_area(){
	  
    register_post_type('slider-area',array(
      'labels'=>array(
          'name'=>'Slider'
        ),
      'public'=>true,
      'supports'=>array('title','thumbnail'),
      'menu_icon'=>'dashicons-format-gallery'
    ));
	

	load_plugin_textdomain('Awrs_slider_textdomain', false, dirname( __FILE__).'/lang');


	
	
	
	
	
  }

public function awesome_slider_area(){
    ob_start();
    ?>

  <ul class="bxslider">

    <?php $slider = new wp_Query(array(
      'post_type'=>'slider-area',
      'posts_per_page'=>-1
    )); ?>

    <?php while( $slider->have_posts() ) : $slider->the_post(); ?>
           <li>
            <?php the_post_thumbnail(); ?>
          </li>
     <?php endwhile; ?>    

  </ul>

    <?php 
    return ob_get_clean();
  }


 

}

new Awrs_Awesome_responsive_slider();









