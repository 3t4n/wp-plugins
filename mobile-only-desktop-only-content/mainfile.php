<?php

/*

Plugin Name: Wordpress Mobile only & Desktop Only Content

Plugin URI:  http://uzzyraja.com

Description: A small plugin which lets you add Mobile Only & Desktop only content on your wordpress website/blog. Use [mobileonly] your content[/mobileonly] shortcode and [desktoponly] your content[/desktoponly] shortcode for content for relevant device.

Version:     1.2

Author:      Raja Usman Latif

Author URI:  http://uzzyraja.com

License:     GPL2

License URI: https://www.gnu.org/licenses/gpl-2.0.html

*/

add_shortcode('desktoponly', 'uzzy_desktop_only_shortcode');

function uzzy_desktop_only_shortcode($atts, $content = null){ 

    if( !wp_is_mobile() ){ 

        return wpautop( do_shortcode( $content ) ); 

    } else {

        return null; 

    } 

}

 add_shortcode('mobileonly', 'uzzy_mobile_only_shortcode');

function uzzy_mobile_only_shortcode($atts, $content = null){ 

    if( wp_is_mobile() ){ 

        return  wpautop( do_shortcode( $content ) ); 

    } else {

        return null; 

    } 

}
function uzy_dmo() {
	wp_enqueue_script(
		'uzy_dmo',
		plugin_dir_url( __FILE__ ) . 'custom-func.js',
		array( 'quicktags' )
	);
}
add_action( 'admin_print_scripts', 'uzy_dmo' );

?>
