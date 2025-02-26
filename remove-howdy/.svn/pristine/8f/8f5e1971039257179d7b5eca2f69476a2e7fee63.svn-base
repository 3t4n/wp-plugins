<?php
   /*
   Plugin Name: Remove Howdy
   Plugin URI: http://nickadams.tv/remove-howdy
   Description: This plugin will remove "Howdy" in the top right corner of your WordPress dashboard.
   Version: 1.0
   Author: Nick Adams
   Author URI: http://nickadams.tv
   License: GPL2
   */

function remove_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Howdy,', '', $my_account->title );
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
}
add_filter( 'admin_bar_menu', 'remove_howdy',25 );

?>