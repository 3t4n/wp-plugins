<?php

 /*

Plugin Name:  Auto Generating RSS News Content Sidebar Widget
Version: 1.0

Description: Automatically create highly targeted news content from Google, Bing & Yahoo in your sidebar and add to the professional reputation you already have.

type the search term they like, and the result will be displayed on the website's sidebar.

Author: David Johnston - MoneyBlogNewz
Author URI: http://wordpress.org/support/profile/personalmoneystore/
Plugin URI: http://personalmoneystore.com/moneyblog/financial-gadgets-and-widgets/auto-generating-rss-news-content-sidebar-widget/

*/

 /*

   Copyright 2010  Director of Personal Money Store: David Johnston  (email : webmaster@personalmoneystore.com)

   The image is compiled by Google and this gadget author has no control over what is displayed or the accuracy of it.
   This program is free software; you can redistribute it and/or modify
   it under the terms of the GNU General  License as published by
   the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
   This program is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General  License for more details.
  You should have received a copy of the GNU General  License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

   */

  global $wp_version;

  $exit_message ='WP Auto Generating RSS News Content Sidebar Widget 2.6 or newer. <a href="http://codex.wordpress.org/Upgrading_WordPress">Please update!</a>';

  

  /*if (version_compare("2.6", "<")){

  	

  	exit($exit_message);

  }*/


    $wp_plugin_url = trailingslashit( WP_PLUGIN_URL.'/'. dirname( plugin_basename(__FILE__) ));

  	 //	$rss_link = 'http://pipes.yahoo.com/pipes/pipe.run?_id=3e222835c067a34bb0e59f28a8489814&_render=rss&search_term=';

  	 	$external_file_connect = '<link rel="stylesheet" href="' . $wp_plugin_url. '/wp-auto_gen.css" type="text/css" />';

  	  function getPluginOptionsControl(){

  	 	$options = get_option("wp-auto_gen");
 

  	 	if($_POST["auto_submit"]){

  	 		//get all options

  	 		$options['auto_widget_title'] = strip_tags(stripslashes($_POST['auto_widget_title']));

  	 		$options['auto_news_topic'] = strip_tags(stripslashes($_POST['auto_news_topic']));

  	 		$options['auto_exclude_topic'] = strip_tags(stripslashes($_POST['auto_exclude_topic']));

  	 		$options['auto_exclude_site']  = strip_tags(stripslashes($_POST['auto_exclude_site']));
  	 		$options['auto_add_topic']     = strip_tags(stripslashes($_POST['auto_add_topic']));
  	 		$options['auto_remove_topic']  = strip_tags(stripslashes($_POST['auto_remove_topic']));

  	 		$options['auto_post_category']  = strip_tags(stripslashes($_POST['auto_post_category']));

  	 		$options['auto_post_first'] = strip_tags(stripslashes($_POST['auto_post_first']));

  	 		$options['auto_display_content'] = strip_tags(stripslashes($_POST['auto_display_content']));
  	 		update_option('wp-auto_gen',$options);

  	 	}

  	 	$auto_title = $options['auto_widget_title'];

	    $auto_topic = $options['auto_news_topic'];

	    $auto_exclude_topic = $options['auto_exclude_topic'];

	    $auto_exclude_site = $options['auto_exclude_site'];
	    $auto_add_topic   = $options['auto_add_topic'];
	    $auto_remove_topic = $options['auto_remove_topic'];

	    $auto_post_category = $options['auto_post_category'];
	    
	    $auto_post_first = $options['auto_post_first'];

	    $auto_display_content = $options['auto_display_content'];

	  
	// print out the widget control, links to widget control    

	include('wp-auto-widgetControl.php');

  	 	//assigning the variables their respective values

  	 }

  	  function PluginShowWidget($args = array()){

  	 	//extract arguments

  	 	extract($args);

  	 	$options = get_option('wp-auto_gen');

  	 	$auto_title = $options['auto_widget_title'];

  	 	$auto_topic = $options['auto_news_topic'];

  	 	$auto_exclude_topic = $options['auto_exclude_topic'];

  	 	$auto_exclude_site  = $options['auto_exclude_site'];
  	 	
  	 	

  	 	$auto_post_category = $options['auto_post_category'];

  	 	$auto_post_first = $options['auto_post_first'];

  	 	$auto_display_content =$options['auto_display_content'];

  	 	
  	 	    // print the theme compatibility code

	    echo $before_widget;

	    echo $before_title . $auto_title. $after_title;

	       // include our widget

	      include('wp-auto_widget.php');

	    echo $after_widget;

  	 	   //include('wp-widget.php');

  	 }

  	  function autoPluginInit(){

  	    //initialize the plugin by registering to the sidebar

  	    register_sidebar_widget(' WP Auto Generating RSS News Content Sidebar Widget ', 'PluginShowWidget');

  	    register_widget_control(' WP Auto Generating RSS News Content Sidebar Widget', 'getPluginOptionsControl');

  	 }

  	   add_action('init', 'autoPluginInit');

     //links to css

      add_action('wp_head', 'auto_HeadAction');

    

      function auto_HeadAction()

      {

	       global $wp_plugin_url;

           echo '<link rel="stylesheet" href="' .$wp_plugin_url. '/wp-auto_gen.css" type="text/css" />';

       }

//links to javascript



     add_action('wp_print_scripts', 'scriptAction');

      function scriptAction(){
      global $wp_plugin_url;
     	if(!is_admin()){

     		//$wp_plugin_url;

     		wp_enqueue_script('jquery');

	        wp_enqueue_script('jquery-form');

	        wp_enqueue_script('wp_auto_script', $wp_plugin_url. '/wp-auto_gen.js', array('jquery'));

     	}

      }
      function getjquery($content){
        return '<span class="livelinks">'.$content.'</span>';
      }
      function autoGetJquery(){
      	if(!is_admin()){
      		wp_deregister_script( 'jquery');
      		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js');
      		wp_enqueue_script('jquery');
      	}
      }
      add_action('init', 'autoGetJquery');

?>