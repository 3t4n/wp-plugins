<?php
/**
* Plugin Name: Add Google Social Profiles to Knowledge Graph Box
* Plugin URI: http://palfbapps.com/gsp
* Description: Display Your Facebook, Twitter & Other Social Accounts In Its Knowledge Graph Boxes
* Version: 1.0 
* Author: Omar Abu Safieh
* Author URI: http://omarnas.com/
* License: GPL12
*/


function setup_theme_plugin_menus() {
    add_menu_page(
        'Google Social Profiles', 'Google Social Profiles', 'manage_options', 
        'Knowledge-Graph-Boxes', 'gsp_page_settings'); 
}

 
// This tells WordPress to call the function named "setup_theme_admin_menus"
// when it's time to create the menu pages.
add_action("admin_menu", "setup_theme_plugin_menus");

function gsp_page_settings() {
//require("themesoptions.php"); 
//echo " i am gere";
require("gsp-options.php");
}

function addgsp(){ 
    if(get_option("gsp_type")){
      $gspsocial='';
      if(get_option("gsp_facebook")!=''){
        $gspsocial.='"'.get_option("gsp_facebook").'",';
      }
      if(get_option("gsp_instagram")!=''){
        $gspsocial.='"'.get_option("gsp_instagram").'",';
      }
      if(get_option("gsp_twitter")!=''){
        $gspsocial.='"'.get_option("gsp_twitter").'",';
      }
      if(get_option("gsp_google")!=''){
        $gspsocial.='"'.get_option("gsp_google").'",';
      }
      if(get_option("gsp_linkedin")!=''){
        $gspsocial.='"'.get_option("gsp_linkedin").'",';
      }
      if(get_option("gsp_youtube")!=''){
        $gspsocial.='"'.get_option("gsp_youtube").'",';
      }
      if(get_option("gsp_myspace")!=''){
            $gspsocial.='"'.get_option("gsp_myspace").'",';
          }
      if(get_option("gsp_pinterest")!=''){
            $gspsocial.='"'.get_option("gsp_pinterest").'",';
          }
      if(get_option("gsp_soundcloud")!=''){
            $gspsocial.='"'.get_option("gsp_soundcloud").'",';
          }
      if(get_option("gsp_tumblr")!=''){
            $gspsocial.='"'.get_option("gsp_tumblr").'",';
          }  
    $gspsocial=str_replace('""', '', $gspsocial);
    $gspsocial=str_replace(',,', '', $gspsocial);
    $gspsocial=rtrim($gspsocial,",");
  
echo '

<script type="application/ld+json">
{ "@context" : "http://schema.org",
  "@type" : "'.get_option("gsp_type").'",
  "name" : "'.get_option("gsp_name").'",
  "url" : "'.get_site_url().'",
  "sameAs" : ['.$gspsocial.'] 
}
</script>'."\t\n";
   } 
      }
add_action('wp_head','addgsp');
