<?php

/**
 * Plugin Name: Job Blitz Feed
 * Plugin URI: http://AFitgeek.com/job-blitz/
 * Description: Easily display job opportunities to your viewers. Place job feed results on any given page. Just use the [job-blitz] tag anywhere on your blog.
 * Version: 1.0
 * Author: A FitGeek
 * Author URI: http://AFitGeek.com
 */
 
 //[job-blitz]
function jobblitz_content($atts){
    if(isset($atts['height'])){
        $height = $atts['height'];
    } else {
        $height = '300';
    }
    if(isset($atts['width'])){
        $width = $atts['width'];
    } else {
        $width = '200';
    }
    $injected_content = '<div style="height:'.$height.'px; width:'.$width.'px;" >';
    $injected_content .= '<iframe src="http://job-blitz.com/?show_header=0" style="width:100%; height:100%; border:0px;"></iframe>';
    $injected_content .= '</div>';
    
    return $injected_content;
}
add_shortcode('job-blitz', 'jobblitz_content');



?>