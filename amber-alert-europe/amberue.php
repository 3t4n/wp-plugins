<?php
/*
Plugin Name: AMBER Alert Europe
Plugin URI: http://www.spep.nl/
Version: 1.20
Author: <a href="http://www.spep.nl/">Peter Braun</a>
Description: A AMBER Alert Europe rss alerts plugin.
short : Amber alert Europe
*/

function addAlert_Europe($content)
{
  if(false !== strpos($content, '[amber]'))
  {
    include('ambermain.php');
 $content = str_replace('[amber]', $txt,$content); 
    return $content;
  }
  else
  {
    return $content;
  }
}

function Alert_Europe_options()
{
	include('amberoptions.php');
}

function Alert_Europe_menu()
{
  add_options_page('AMBER Europe Options', 'Alert_Europe', 8, __FILE__, 'Alert_Europe_options');
}


add_action('admin_menu', 'Alert_Europe_menu');
add_filter('the_content','addAlert_Europe');
?>