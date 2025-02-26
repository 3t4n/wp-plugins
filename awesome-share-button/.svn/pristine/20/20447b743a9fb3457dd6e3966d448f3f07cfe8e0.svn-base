<?php 

/*
Plugin Name: Awesome Share Button
Plugin URI: http://pristine-bd.com/r-scroll-up/
Description: Awesome Share Button plugin is Simple  wordpress plugin for share your post on Facebook,Twitter and other social network. 
Author: Rasel
Version: 1.0
Author URI: http://pristine-bd.com/
*/

// colorpicker
add_action( 'admin_enqueue_scripts', 'awesome_share_button_2339_css_file_color_picker' );
function awesome_share_button_2339_css_file_color_picker( ) {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker-script', plugins_url('js/script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}


// load css file
function awesome_share_button_2339_css_file() {

	 wp_enqueue_style('theme_style_css', plugins_url( 'css/style.css' , __FILE__ ),array(), '', 'all');
	 wp_enqueue_style('awesome_share_button_2339_font_awesome', plugins_url( 'css/font-awesome.min.css' , __FILE__ ),array(), '', 'all');

}
add_action( 'wp_enqueue_scripts', 'awesome_share_button_2339_css_file' );

//facebook button
function awesome_share_button_2339_facebook () {
	?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<?php
}
add_action('wp_head', 'awesome_share_button_2339_facebook');

// HTML structure 
function awesome_share_button_2339 () {
	?>
	 <ul class="awesome-share-button">
<!-- Google Plus -->
    <li>
   <a class="awesome-share-button-list-item" href="https://plus.google.com/share?url=<?php the_permalink();?>" onclick="javascript:void window.open('https://plus.google.com/share?url=<?php the_permalink();?>','1411807436466','width=700,height=500,toolbar=1,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;"><i class="fa <?php $options = get_option('asb_2339_option');  
  							if ( $options['google_icon'] == '' ) {
  								echo "fa-google";
  							} 
  							else {
  								echo $options['google_icon'];
  								} ?>" 
  								style="color:<?php $options = get_option('asb_2339_option');  
  							if ( $options['google_icon_color'] == '' ) {
  								echo "#dd4b39";
  							} 
  							else {
  								echo $options['google_icon_color'];
  								} ?>;"></i> </a>
  </li>

<!-- facebook -->
   <li>
  <a class="awesome-share-button-list-item" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" onclick="javascript:void window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>','1411807436466','width=700,height=500,toolbar=1,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;"><i class="fa 
  					<?php $options = get_option('asb_2339_option');  
  							if ( $options['facebook_icon'] == '' ) {
  								echo "fa-facebook";
  							} 
  							else {
  								echo $options['facebook_icon'];
  								} ?>" 
  								style="color:<?php $options = get_option('asb_2339_option');  
  							if ( $options['facebook_icon_color'] == '' ) {
  								echo "#44609d";
  							} 
  							else {
  								echo $options['facebook_icon_color'];
  								} ?>;" ></i> </a>   
  </li>


<!-- Twitter -->
   <li>
  <a class="awesome-share-button-list-item" href="https://twitter.com/share?url=<?php the_permalink();?>" onclick="javascript:void window.open('https://twitter.com/share?url=<?php the_permalink();?>','1411807436466','width=700,height=500,toolbar=1,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;"><i class="fa 
  					<?php $options = get_option('asb_2339_option');  
  							if ( $options['twitter_icon'] == '' ) {
  								echo "fa-twitter";
  							} 
  							else {
  								echo $options['twitter_icon'];
  								} ?>" 
  								style="color:<?php $options = get_option('asb_2339_option');  
  							if ( $options['twitter_icon_color'] == '' ) {
  								echo "#5eaade";
  							} 
  							else {
  								echo $options['twitter_icon_color'];
  								} ?>;""></i> </a>   
  </li>
 
</ul>
	<?php
}

add_action('wp_footer', 'awesome_share_button_2339');


require_once('inc/settings.php');

?>