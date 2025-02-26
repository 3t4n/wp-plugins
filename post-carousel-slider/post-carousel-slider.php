<?php
/*
Plugin Name: Post Carousel Slider
Plugin URI:  bhaskardhote.in
Description: A simple plugin to show a horizontal post carousel silder 
Version: 2.0.1
Author: Bhaskar Dhote
Author URI: bhaskardhote.in
*/
define( 'WP_POSTSLIDER_URL', plugin_dir_url(__FILE__) );
define( 'WP_POSTSLIDER_PATH', plugin_dir_path(__FILE__) );
define( 'WP_POSTSLIDER_SLUG','post_slider' );
$plugin_dir = plugin_dir_url( __FILE__ ).'images/';
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
global $wpdbb_content_dir;
if(!function_exists('wp_get_current_user')){
	include(ABSPATH."wp-includes/pluggable.php") ; // Include pluggable.php for current user	
}
function installation_plugin() {
	add_option('tn_post_type','post');
	add_option('tn_showimage', "YES");
	add_option('tn_word_limit', "55");
	add_option('tn_query_post', "5");
	add_option('tn_orderby', "id");
	add_option('tn_order', "desc");
	add_option('tn_posts_category', "1");
	add_option('tn_autoplay','false');
	add_option('tn_mode','horizontal');
	add_option('tn_speed','500');
	add_option('tn_minSlides',"2");
	add_option('tn_maxSlides',"4");
}
register_activation_hook( __FILE__, 'installation_plugin' );
/*
 * Method :-- custom_style
 * Task   :-- Include All the style and script into the plugin.
 * Action   :-- wp_head
*/
add_action('admin_enqueue_scripts','custom_style');
add_action('wp_footer', 'custom_style', 5);
function custom_style(){
	wp_enqueue_style('thickbox');
	wp_enqueue_style('jquery_custom_styles',WP_POSTSLIDER_URL.'css/jquery_custom.css');
	wp_enqueue_style('back_styles',WP_POSTSLIDER_URL.'css/back_styels.css');
    wp_enqueue_script('jquery');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('bxslider',WP_POSTSLIDER_URL.'js/bxslider.js');
}
/*	
 * Method :-- add_menu
 * Task   :-- Create the menu in the admin dashboard to save the setting
 * Action   :-- wp_head
*/
add_action('admin_menu', 'add_menu');
function add_menu(){
	add_menu_page('Post Carousel Setting', 'Post Carousel Setting', 'add_users', 'manage_link', 'post_carousel_setting',plugin_dir_url( __FILE__ ).'images/icon.png');
}
/*	
 * Method :-- show_wordlimit
 * Task   :-- Create the menu in the admin dashboard to save the setting
 * Action   :-- wp_head
*/
function show_wordlimit($word, $lenght) {
		$string = $word;
		$string = strip_shortcodes(wp_trim_words( $string, $lenght ));
		return $string;
}
/*
 * Method :-- post_carousel
 * Task   :-- Create a shortcode for post carousel slider 
 * Action   :-- wp_head
*/
function post_carousel_slider(){
	global $wpdb;
	$post_type = get_option('tn_post_type');
	$displayimage = get_option('tn_showimage');
	$word_imit = get_option('tn_word_limit');
	$query_post = get_option('tn_query_post');
	$orderby= get_option('tn_orderby');
	$order= get_option('tn_order');
	$posts_category= get_option('tn_posts_category');
	$autoplay= get_option('tn_autoplay');
	$autoplay = ($autoplay=='')?'false':$autoplay;
	$mode= get_option('tn_mode');
	$mode = ($mode=='')?'horizontal':$mode;
	$tn_speed= get_option('tn_speed');
	$tn_speed = ($tn_speed=='')?'500':$tn_speed;
	$tn_minSlides= get_option('tn_minSlides');
	$tn_minSlides = ($tn_minSlides=='')?'2':$tn_minSlides;
	$tn_maxSlides= get_option('tn_maxSlides');
	$tn_maxSlides = ($tn_maxSlides=='')?'2':$tn_maxSlides;
	global $post;
	//$args = array( 'numberposts' => 10,'post_type' => 'post'  );
	$args = array( 'numberposts' => $query_post,  'category' => $posts_category, 'order'=> $order, 'orderby' => $orderby, 'post_type' => $post_type  );
	$myposts = get_posts( $args );
	$slider_gallery ='<script>
		jQuery(document).ready(function(){
		  jQuery(".slider1").bxSlider({
			  infiniteLoop: true,
			  slideWidth: 300,
			  minSlides: '.$tn_minSlides.',
			  maxSlides: '.$tn_maxSlides.',
			  slideMargin: 20,
			  auto: '.$autoplay.',
			  mode: "'.$mode.'",
			  speed : '.$tn_speed.',
			  pager: false
		  });});
</script><div class="slider1">';
	foreach( $myposts as $post ){
		$post_title = $post->post_title;
		$post_link =  get_permalink($post->ID);
		$post_content = strip_shortcodes($post->post_content);
		$displaydesc = $word_imit;
		$slider_gallery.= '<div class="post-carousel-main"><div class="post-carousel-inner">' ;
		if($displayimage=="YES"){
			if (has_post_thumbnail( $post->ID ) ): 
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); 
			endif; 
			//featured image
			if(empty($image[0])) {
    		$image = WP_POSTSLIDER_URL."/images/default.png";
    					$featured_img = "<img  src='". $image . "' " . $attributes . " />";
  			}else{
						$featured_img = "<img src='". $image[0] . "' " . $attributes . " />";
  			}

			$slider_gallery.= '<div class="top_blk"><a href="'.$post_link.'">'.$featured_img.'</a></div>';

		}

  		$slider_gallery.='<h2 class="post-carousel-title">'.$post_title.'</h2><div class="btn_des">

    <div class="post-carousel-content">'.show_wordlimit($post_content, $displaydesc).'</div>

    <div class="post-carousel-readmore"><a href="'.$post_link.'">Read more <i class="post-carousel-double-right"></i></a></div></div>

</div></div>';



	}

	$slider_gallery .= '</div>';

	return $slider_gallery;

}

add_shortcode('post_carousel_slider', 'post_carousel_slider'); 



/*

 * Method :-- post_carousel

 * Task   :-- Create a shortcode for post carousel slider 

 * Action   :-- wp_head

*/

function post_carousel_setting(){

	include_once('setting.php');	

}



?>