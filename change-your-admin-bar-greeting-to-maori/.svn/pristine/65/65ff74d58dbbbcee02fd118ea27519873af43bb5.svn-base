<?php
/*
Plugin Name: Change Your Admin Bar Greeting To Maori
Description: This simple to use plugin will change the standard Admin Greeting from 'Howdy' to the Maori version 'Kia Ora'. 
Author: ROIMarketing.co.nz
Version: 1.0
Author URI: http://www.roimarketing.co.nz/
*/
function jeba_howdy_wp_latest_jquery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'jeba_howdy_wp_latest_jquery');


function jeba_howdy_wp_file() {
	wp_enqueue_style( 'jeba-file-csss', plugins_url( '/jeba-style.css', __FILE__ ));
}
add_action('init', 'jeba_howdy_wp_file');

add_action( 'admin_bar_menu', 'wp_admin_bar_my_custom_account_menu', 11 );

function wp_admin_bar_my_custom_account_menu( $wp_admin_bar ) {
$user_id = get_current_user_id();
$current_user = wp_get_current_user();
$profile_url = get_edit_profile_url( $user_id );

if ( 0 != $user_id ) {
/* Add the "My Account" menu */
$avatar = get_avatar( $user_id, 28 );
$howdy = sprintf( __('<img id="jeba_img" src="' . plugins_url( 'change-your-admin-bar-greeting-to-maori/flag.png', dirname(__FILE__) ) . '"/>  Kia Ora, %1$s'), $current_user->display_name );
$class = empty( $avatar ) ? '' : 'with-avatar';

$wp_admin_bar->add_menu( array(
'id' => 'my-account',
'parent' => 'top-secondary',
'title' => $howdy . $avatar,
'href' => $profile_url,
'meta' => array(
'class' => $class,
),
) );

}
}




?>