<?php

/*
* Plugin Name: Animated Buttons
* Author: Yash
* Author URI: https://www.yashomparkash.com/
* Description: This plugin use for create animated buttons by using shortcodes and auto downlaod zip,pdf,and image file on website page load.This plugin also help to get thousands of clicks on the affiliate links.
* Version: 1.0.0
* License: GPL2
* License URI:  https://www.gnu.org/licenses/gpl-2.0.html
*/

//Define Plugin version
 if ( !defined('ABBY-PLUGIN-VERSION')) {
    define('ABBY-PLUGIN-VERSION', '1.0.0');
}

//Get plugin location
if ( !defined('ABBY_PLUGIN_DIR')) {
    define('ABBY_PLUGIN_DIR', plugin_dir_url( __FILE__ ));
}

//adding script and style
if( !function_exists('ABBY_plugin_scripts')) {
    function ABBY_plugin_scripts() {
        wp_enqueue_style('ABBY-css', ABBY_PLUGIN_DIR. 'assets/css/style.css');
        wp_enqueue_script('ABBY-js', ABBY_PLUGIN_DIR. 'assets/js/main.js', 'jQuery', '1.0.0', true );

    }
    add_action('wp_enqueue_scripts', 'ABBY_plugin_scripts');
}
//admin page script
if( !function_exists('ABBY_Admin_plugin_scripts')) {
    function ABBY_Admin_plugin_scripts() {
        wp_enqueue_style('ABBY-admin-css', ABBY_PLUGIN_DIR. 'assets/css/styleadmin.css');
        wp_enqueue_script('ABBYCall-admin-js', ABBY_PLUGIN_DIR. 'assets/js/clipboard.min.js', 'jQuery', '1.0.0', 'all' );
        wp_enqueue_script('ABBY-admin-js', ABBY_PLUGIN_DIR. 'assets/js/mainadmin.js', 'jQuery', '1.0.0', true );
		
    }
    add_action('admin_enqueue_scripts', 'ABBY_Admin_plugin_scripts');
}

//creating and calling admin page
require plugin_dir_path( __FILE__ ). 'inc/settings.php';

//adding script and style End Here

//shortcode defining
add_shortcode('auto-downloader','auto_downloader_show');
 
 //shortcode function start
 function auto_downloader_show($atts)
 {
 
	 $a = shortcode_atts( array(
        'link' => '3',
        'seconds' => '4',
        'auto' => '5',
        'style' => '6',
        'bg' => '',
        'text' => '',
    ), $atts );	 
	 $auto = $a['auto'];
     $link = $a['link']; 
     $style = $a['style']; 
     $seconds = $a['seconds']*1000;
     $bg = $a['bg'];
     $text= $a['text'];
     //get text from shortcode start
      if(empty($text)){
          $text="click me";
      }
	  if(empty($bg)){
          $bg="#000";
      }
   //get text from shortcode end
   //if auto redirect is on
     if($auto == 'on'){
     return ("
     <a id='yash' href='$link' sec='$seconds'></a>
     ");
     } //else default button will shown
     else{
         if($style=="1"){
    return ("
    <div class='item button-pulse'>
    <div class='button__wrapper'>
      <div class='pulsing'></div>
     <a href='$link'> <button style='background:$bg;'>$text</button></a>
    </div>
  </div>
  ");
         }
         else if($style=="2"){
         return ("
  <div class='item button-jittery'>
    <a href='$link'><button style='background:$bg;' >$text</button></a>
  </div>
	 ");
         }
          else if($style=="3"){
         return ("
   <div class='item button-hand'>
  <a href='$link'> <button style='background:$bg;' >$text
      <div class='hands'></div>
    </button></a>
  </div>
	 ");
         }
          else if($style=="4"){
         return ("
    <div class='item button-parrot' >
   <a href='$link'> <button style='background:$bg;' >$text
      <div class='parrot'></div>
      <div class='parrot'></div>
      <div class='parrot'></div>
      <div class='parrot'></div>
      <div class='parrot'></div>
      <div class='parrot'></div>
    </button></a>
  </div>
	 ");
         }
              else if($style=="5"){
         return ("
    <div class='item button-rainbow'>
    <a href='$link'> <button style='background:$bg;' >$text
      <div class='rainbow'></div>
    </button></a>
  </div>
	 ");
         }
     }
 }
 

 //shortcode function End
 //Add shortode tag to editor Start
function ABBY_quicktag() 
{
	 if (  current_user_can( 'manage_options' ) ) {
    if(wp_script_is("quicktags"))
    {
        ?>
            <script type="text/javascript">
               

                QTags.addButton("shortcode_quicktag", "Animated Button Shortcode", ABBY_get_shortcode);
                QTags.addButton("shortcode_quicktag2", "Animated Auto-Download Shortcode", ABBY_get_shortcode2);
                function ABBY_get_shortcode()
                {
                    QTags.insertContent('[auto-downloader link="http://example.com/wp-content/uploads/2020/04/example.png|jpg|pdf|zip" text="Download" style="1" ]');
                }
				 function ABBY_get_shortcode2()
                {
                    QTags.insertContent('[auto-downloader link="http://example.com/wp-content/uploads/2020/04/example.png|jpg|pdf|zip" auto="on" seconds="10" ]');
                }
            </script>
        <?php
    }
	 }
}

add_action("admin_print_footer_scripts", "ABBY_quicktag");
//Add shortode tag to editor End

//adding setting link start
function ABBY_Settings_Page( $links ) {
    $settings_link = '<a href="admin.php?page=AD-settings">' . __( 'Shortcodes' ) . '</a>';
    array_push( $links, $settings_link );
  	return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'ABBY_Settings_Page' );

function ABBY_Settings_Page2( $links2 ) {
    $settings_link2 = '<a href="admin.php?page=AD-how-to-use">' . __( 'Guide' ) . '</a>';
    array_push( $links2, $settings_link2 );
  	return $links2;
}
$plugin2 = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin2", 'ABBY_Settings_Page2' );
//adding setting link end
?>