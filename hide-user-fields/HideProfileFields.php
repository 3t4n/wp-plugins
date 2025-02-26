<?php
/**
* Plugin Name: Hide user fields
* Plugin URI: https://wordtune.me
* Description: Install an avtivate this Plugin to hide logged in user filds.
* Author: WordTune
* Author URI: https://wordtune.me
* Version:           1.0
* License:           GPL-2.0+
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
**/
add_filter( 'user_contactmethods', 'hide_user_fields' );

function hide_user_fields( $methods ) {

    // Remove user contact methods
    unset( $methods['aim']    );
    unset( $methods['jabber'] );
		unset( $methods['facebook'] );
		unset( $methods['instagram'] );
		unset( $methods['twitter'] );
		unset( $methods['myspace'] );
		unset( $methods['youtube'] );
		unset( $methods['tumbler'] );
		unset( $methods['linkedin'] );
		unset( $methods['pinterest'] );
		unset( $methods['soundcloud'] );
		unset( $methods['tumblr'] );
		unset( $methods['wikipedia'] );
		unset( $methods['yim'] );
		unset( $methods['Organization'] );



    return $methods;
}

	function hide_user_fields_start() {
		if ( ! current_user_can('manage_options') ) {
			ob_start( 'cor_remove_personal_options' );
		}
	}

	function hide_user_fields_end() {
		if ( ! current_user_can('manage_options') ) {
			ob_end_flush();
		}
	}

add_action( 'admin_head', 'hide_user_fields_start' );
add_action( 'admin_footer', 'hide_user_fields_end' );
?>
