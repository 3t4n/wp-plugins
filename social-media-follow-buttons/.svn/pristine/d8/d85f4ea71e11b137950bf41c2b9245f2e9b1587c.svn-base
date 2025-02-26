<?php

function smfbvv_content_output ($content) {

    global $smfbvv_options;
    global $social;

    include_once ('display-functions.php');

    $styles = 'style="background-color:' .$smfbvv_options['background'] .';font-size:' .$smfbvv_options['font_size'] .';color:' .$smfbvv_options['font_color'] .';text-align:' .$smfbvv_options['font_align'] .';padding:' .$smfbvv_options['padding'].';"'   ;

    if(isset($smfbvv_options['include_site_name']) == true ) {
        $blogname = get_bloginfo('name');
    }   else {
        $blogname = '';
    }

    if( $smfbvv_options['follow_message'] == true ) {
        $message = $smfbvv_options['follow_message'];
    } else {
        $message = 'Follow';
    }

    if(is_front_page() && ($smfbvv_options['location'] == 'Enable on home page only')) {
        $extra_content_home = '<div ID="smfbvv" ' . $styles  .'>' . $message . ' ' . $blogname . ' on '  .media() . $social . '</div> ';
    }   else {
        $extra_content_home = '';
    }

    if(is_singular() && ($smfbvv_options['location'] == 'Enable on all single posts and pages')) {
        $extra_content = '<div ID="smfbvv" ' . $styles  .'>' . $message . ' ' . $blogname . ' on '  .media() . $social . '</div> ';
    }   else {
        $extra_content = '';
    }

    if(is_single() && ($smfbvv_options['location'] == 'Enable on all single posts')) {
        $extra_content1 = '<div ID="smfbvv" ' . $styles  .'>' . $message . ' ' . $blogname . ' on ' .media() . $social . '</div> ';
    }   else {
        $extra_content1 = '';
    }


    if(is_page() && ($smfbvv_options['location'] == 'Enable on all single pages')) {
        $extra_content2 = '<div ID="smfbvv" ' . $styles  .'>' . $message . ' ' . $blogname . ' on ' .media() . $social . '</div> ';
    }   else {
        $extra_content2 = '';
    }


    if( isset($smfbvv_options['position_above']) == true ) {
        $content =  $extra_content_home . $extra_content . $extra_content1. $extra_content2 . $content ;
    }

    if( isset ($smfbvv_options['position_below']) == true ) {
        $content .=  $extra_content_home . $extra_content . $extra_content1. $extra_content2 ;
    }

    return $content;

}   add_filter('the_content', 'smfbvv_content_output');

