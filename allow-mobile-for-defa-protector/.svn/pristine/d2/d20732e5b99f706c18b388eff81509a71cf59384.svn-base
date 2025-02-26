<?php
/*
Plugin Name: Allow Mobile Plugin For Defa Protector
Plugin URI: http://www.juthawong.com/
Description: A Simple Plugin that allow mobile to play defa protector 5.5 or upper version video ( Caution : Can cause video security leaks )
Version: 1.0
Author: Juthawong Naisanguansee
Author URI: http://www.juthawong.com/
License: GPL2
*/
add_action( 'init','defaallowmobile');
function defaallowmobile(){
	if (wp_is_mobile()){
remove_action('wp_head','defago');
remove_action('wp_footer', 'defaset');
 

	}
}
