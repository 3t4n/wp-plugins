<?php
/*
Plugin Name: Auto Add Tags
Plugin URI: http://dekisugi.net/wpplugins
Description:  If any existing tags are found in the post content, this plugin will automatically add those tags to the posts when saved. Please <a href="http://wordpress.org/extend/plugins/auto-add-tags">[Rate]</a> this plugin or <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=TQBF5W4FHCS56">[Donate]</a>.
Version: 1.0
Author: Narin Olankijanan
Author URI: http://dekisugi.net/wpplugins
License: GPLv2
*/

add_action('save_post', 'dk_save_post');

function dk_save_post(){

        $tags = get_tags( array('hide_empty' => false) );
        $post_id = get_the_ID();
        $post_content = get_post($post_id)->post_content;
        
        if ($tags) {
        foreach ( $tags as $tag ) {
            if ( strpos($post_content, $tag->name) !== false)  
             wp_set_post_tags( $post_id, $tag->name, true );
           
        }
        }

}



/* EOF */