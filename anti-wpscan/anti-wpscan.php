<?php
/*
Plugin Name: anti-wpscan 
Plugin URI: http://www.blackfault.com/projects/anti-wpscan
Description: This plugin will (should) block wordpress version and wordpress plugin version detection by wpscan, a tool used to can Wordpress blogs for outdated and vulnerable plugins.
Version: 1.1
Author: BlackFault
Author URI: http://www.blackfault.com
License: GPL2
*/


/* PLugin setup events. */
register_activation_hook( __FILE__, array( 'AntiWPSCAN', 'on_activation' ) );

register_deactivation_hook( __FILE__, array( 'AntiWPSCAN', 'on_deactivation' ) );



/* Remove generator tag from header */
remove_action('wp_head', 'wp_generator');


/* 
Remove generator tag from RSS 
*/
add_filter('the_generator', array( 'AntiWPSCAN', 'remove_generator' ));



/* 
Block plugin detection as best as we can. 
*/
add_filter('mod_rewrite_rules',array( 'AntiWPSCAN', 'add_plugin_rules' ));


/* 
New as of 1.1. Modify output before letting it get to the browser. 
Strip all comments as plugin authors are getting hardons advertising their names.
*/
function blackfault_callback($buffer) {
  $buffer = preg_replace("/<!--.*?-->/ms","",$buffer);

  return $buffer;
}

function bf_buffer_start() { ob_start("blackfault_callback"); }

function bf_buffer_end() { ob_end_flush(); }

add_action('init', 'bf_buffer_start');
add_action('shutdown', 'bf_buffer_end');



class AntiWPSCAN {

    
    public function __construct()
    {
      
      
    }
    
    

    
    /* Add mod_rewrite rules to prevent plugin detection. */
    
    function add_plugin_rules( $rules )
    {
   
 		  
       $siteurl = get_option('siteurl');
       $therules = "\n\n#RULES ADDED BY anti-wpscan\n";


	//***********Turn off directory browsing.
	$therules .= "Options -Indexes\n";
	
  
	//Block misc readme html, txt files. Complete block by all clients.
	$therules .= "RewriteRule readme\.html? - [NC,F]\n"; 

	$therules .= "RewriteRule changelog\.txt? - [NC,F]\n"; 

        $therules .= "RewriteRule readme\.txt? - [NC,F]\n"; 
    
	//External files not need to be accessed without refferer
	$therules .= "RewriteCond %{HTTP_REFERER} !^" . $siteurl . ".*\n";
	$therules .= "RewriteRule \.css? - [NC,F]\n"; 
	

    $therules .= "#END ANTI-WPSCAN RULES\n\n";
    //end rule
    $therules .= "\n</IfModule>";
    $newrules =  preg_replace('/\<\/IfModule\>/', $therules, $rules);
    $was_newrules = $newrules;
    

     return $newrules;
 
  }
  
  /* Add rules to prevent wordpress version detection. */
  
  function add_version_rules()
  {
  
  
  
  }
  
  
    function flush_rules()
    {
    
     flush_rewrite_rules();
    
    }
    
    
    function remove_generator()
    {
    
       return '';
    
    }
    
    
 
  
  function on_activation()
  {
    
    AntiWPSCAN::flush_rules();
  
  }
  
  function de_activation()
  {
  
    AntiWPSCAN::flush_rules();
  
  }
    
}


