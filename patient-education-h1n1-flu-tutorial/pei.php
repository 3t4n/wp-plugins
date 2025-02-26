<?php
/*
Plugin Name:Patient-Education
Version: 1.0
Plugin URI: http://wp.patient-education.com
Description: Health and medical educational tutorials. Easy to use, just embed the code <code>[PEI-H1N1,480,360]</code> in a page/post after having installed and activated the plugin. Other topics and more information about the X-Plain series are available at the following website: http://wp.patient-education.com .
Author: Patient Education Institute
Author URI: http://www.Patient-Education.com
*/

function PEI_plugin_callback($content = '') {       
         preg_match( "[\[PEI-([0-9,A-Z])+[,]([0-9])+[,]([0-9])+\]]" , $content, $matches);
         $tag = $matches[0] ;
         $tmp = str_replace( "[" , "" , $tag ) ;
         $tmp = str_replace( "]" , "" , $tmp ) ;
	 $sizeA = split( "," , $tmp )  ; 
         $peicode = str_replace( "PEI-" , "" , $sizeA[0] )  ; 
         $PEI_content= "<iframe src=\"http://wp.patient-education.com/$peicode\" width=$sizeA[1] height=$sizeA[2] scrolling='no' frameborder='0' marginwidth='0' marginheight='0' vspace='0' hspace='0' ></iframe>" ;
         $content = str_replace($tag,$PEI_content,$content);
         return $content;
}

add_filter('the_content', 'PEI_plugin_callback');