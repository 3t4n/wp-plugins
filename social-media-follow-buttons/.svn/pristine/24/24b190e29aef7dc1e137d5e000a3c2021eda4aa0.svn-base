<?php
/**
display functions for social media information
 */


function media ()
{
    global $smfbvv_options;
    global $images;
    global $social;

    $icon =  'style="padding-left: '.$smfbvv_options['icon_padding'] . ';"';

    /* Social Media links - check if enabled and display    */
    if (isset($smfbvv_options['facebook']) == true) {
        $facebook_url = '<a href="' . $smfbvv_options['facebook_url'] . '" target="_blank" ><img ' . $icon . ' src="' . $images . $smfbvv_options['size'] . '/' . 'facebook.png"></a>';
    } else {
        $facebook_url = '';
    }

    if( isset($smfbvv_options['twitter']) == true ) {
        $twitter_url = '<a href="' .$smfbvv_options['twitter_url'] .'" target="_blank" ><img ' . $icon .' src="'.$images .$smfbvv_options['size'] .'/' .'twitter.png"></a>';
    }   else {
        $twitter_url = '';
    }

    if( isset($smfbvv_options['linkedin']) == true ) {
        $linkedin_url = '<a href="' .$smfbvv_options['linkedin_url'] .'" target="_blank" ><img ' . $icon .' src="'.$images .$smfbvv_options['size'] .'/' .'linkedin.png"></a>';
    }   else {
        $linkedin_url = '';
    }

    if( isset($smfbvv_options['youtube']) == true ) {
        $youtube_url = '<a href="' .$smfbvv_options['youtube_url'] .'" target="_blank" ><img ' . $icon .' src="'.$images .$smfbvv_options['size'] .'/' .'youtube.png"></a>';
    }   else {
        $youtube_url = '';
    }

    if( isset($smfbvv_options['google']) == true ) {
        $google_url = '<a href="' .$smfbvv_options['google_url'] .'" target="_blank" ><img ' . $icon .' src="'.$images .$smfbvv_options['size'] .'/' .'google+.png"></a>';
    }   else {
        $google_url = '';
    }

    if( isset($smfbvv_options['pinterest']) == true ) {
        $pinterest_url = '<a href="' .$smfbvv_options['pinterest_url'] .'" target="_blank" ><img ' . $icon .' src="'.$images .$smfbvv_options['size'] .'/' .'pinterest.png"></a>';
    }   else {
        $pinterest_url = '';
    }

    if( isset($smfbvv_options['blogger']) == true ) {
        $blogger_url = '<a href="' .$smfbvv_options['blogger_url'] .'" target="_blank" ><img ' . $icon .' src="'.$images .$smfbvv_options['size'] .'/' .'blogger.png"></a>';
    }   else {
        $blogger_url = '';
    }

    if( isset($smfbvv_options['tumblr']) == true ) {
        $tumblr_url = '<a href="' .$smfbvv_options['tumblr_url'] .'" target="_blank" ><img ' . $icon .' src="'.$images .$smfbvv_options['size'] .'/' .'tumblr.png"></a>';
    }   else {
        $tumblr_url = '';
    }

    if( isset($smfbvv_options['digg']) == true ) {
        $digg_url = '<a href="' .$smfbvv_options['digg_url'] .'" target="_blank" ><img ' . $icon .' src="'.$images .$smfbvv_options['size'] .'/' .'digg.png"></a>';
    }   else {
        $digg_url = '';
    }

    if( isset($smfbvv_options['stumble']) == true ) {
        $stumble_url = '<a href="' .$smfbvv_options['stumble_url'] .'" target="_blank" ><img ' . $icon .' src="'.$images .$smfbvv_options['size'] .'/' .'stumbleupon.png"></a>';
    }   else {
        $stumble_url = '';
    }

    if( isset($smfbvv_options['upload']) == true ) {
        $upload_url = '<a href="' . $smfbvv_options['custom_url'] . '" target="_blank" ><img ' . $icon . ' src="' . $smfbvv_options['upload_image'] . '"></a>';
    } else {
        $upload_url = '';
    }
    /* Social Media links - end    */

    $social = $facebook_url . $twitter_url . $linkedin_url . $youtube_url . $google_url . $pinterest_url . $blogger_url . $tumblr_url . $digg_url . $stumble_url .$upload_url;

}