<?php

/*
Plugin Name: Custom CSS and JavaScript
Plugin URI: http://pjdietz.com/wordpress-plugins/custom-css-js/
Description: Add custom stylesheets and JavaScript to individual posts.
Version: 1.0
Author: PJ Dietz
Author URI: http://pjdietz.com
*/

/*  
Copyright 2010 PJ Dietz (email: pj@pjdietz.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


// Feel free to edit these if you don't like the defaults.
define('PJ_CUSTOM_CSS_EXTERNAL', 'custom_css');
define('PJ_CUSTOM_CSS_INTERNAL', 'custom_css_code');
define('PJ_CUSTOM_JS_EXTERNAL',  'custom_js');
define('PJ_CUSTOM_JS_INTERNAL',  'custom_js_code');


function pj_custom_css_js()
{
    global $wp_query;
	
	if (is_single() or is_page())
	{
		
		if ($wp_query->post)
		{
            $post = $wp_query->post;
	        $id = $post->ID;   
	
	
	        ///////////////
    	    // CSS Links //
    	    ///////////////
    	     
            $css_libs = get_post_meta($id, PJ_CUSTOM_CSS_EXTERNAL, false);
            
            foreach ($css_libs as &$css)
                printf('<link rel="stylesheet" type="text/css" href="%s" />', $css);    

	
            //////////////	
            // CSS Code //
            //////////////
            
            $css_code = get_post_meta($id, PJ_CUSTOM_CSS_INTERNAL, false);
            
            if ($css_code)
            {
                print "\n";
                
                print '<style type="text/css">' . "\n";
                print '/* <![CDATA[ */' . "\n";
                
                foreach ($css_code as &$css)
                    print $css . "\n";
                
                print '/* ]]> */' . "\n";
                print '</style>' . "\n";
            }   
       
       
            //////////////////////
            // JavaScript Links //
            //////////////////////
            
            $js_libs = get_post_meta($id, PJ_CUSTOM_JS_EXTERNAL, false);
            
            foreach ($js_libs as &$js)
                printf('<script type="text/javascript" src="%s"></script>', $js);    
            
            
            /////////////////////
            // JavaScript Code //
            /////////////////////
            
            $js_code = get_post_meta($id, PJ_CUSTOM_JS_INTERNAL, false);
            
            if ($js_code)
            {
                print '<script type="text/javascript">' . "\n";
                print '/* <![CDATA[ */' . "\n";
                
                foreach ($js_code as &$js)
                    print $js;
                
                print '/* ]]> */' . "\n";
                print '</script>' . "\n";
            }   

        }

    }
    
}

add_filter('wp_head', 'pj_custom_css_js');

?>
