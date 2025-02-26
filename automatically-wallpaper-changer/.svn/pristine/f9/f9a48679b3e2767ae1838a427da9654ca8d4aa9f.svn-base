<?php
/*
Plugin Name: WallpaperChanger
Description: A small WordPress plugin allows you to automatically change the wallpaper(morning,evening) according to server daytime.
Version: 1.0
Author: Tani_Afi
Author URI: https://www.fiverr.com/tani_afi
License: GPLv2 or later
*/

add_action( 'wp_enqueue_scripts', 'wpc_safely_add_stylesheet' );
  /**
   * Add stylesheet to the page
   */
function wpc_safely_add_stylesheet()
{
	wp_enqueue_style( 'prefix-style', plugins_url('css/style.css.php', __FILE__) );
}
add_filter( 'body_class','wpc_background_image_classes' );
function wpc_background_image_classes($classes)
{
	$classes[] = 'wpc_changewallpaper';
	return $classes;
}
?>