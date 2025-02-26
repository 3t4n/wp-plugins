<?php
/*
Plugin Name: Aye member read only
Plugin URI: http://wordpress.org/extend/plugins/aye-member-read-only/
Description: How to use >> just type [membersonly]Hidden text for loged in user[/membersonly] in your post.
Version: 1.00
Author: Amnuay Jitklang
Author URI: http://www.thlive.com
*/
function aye_user_only( $atts, $content = null ){
    if( null != $content && current_user_can('read') ){
        return $content;
    } else {
$mylink = get_permalink();
        return '<br/>[ <font color=red>Please<a href=/wp-login.php?redirect_to='.$mylink.'>Login</a> Or <a href=/wp-login.php?action=register>Register</a> To read more </font> ]';
    }
}
add_shortcode('membersonly', 'aye_user_only');
?>