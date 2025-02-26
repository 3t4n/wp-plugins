<?php
  
/*
Plugin Name: Auto Loan Calculator
Version: 0.1
Description: Auto loan calculator calculates loan payment and validates numbers inserted by user from Wordpress sidebar widget. Shows only 2 buttons: used or new auto loan. User chooses and calculator opens. Interest rate inserted by admin (that can be changed by user). User inserts purchase amount, down payment, changes interest rate if necessary and selects number of months of loan from a drop down.  
Author: Car Deal Expert-Lisa Plumb
Author URI: http://wordpress.org/support/profile/car-deal-expert-lisa-plumb
Plugin URI: http://www.cardealexpert.com/gadgets-and-widgets/auto-loan-calculator-widgets/*/

  /*
   Copyright 2010  Car Deal Expert-Lisa Plumb  (email : lisap@adworkz.com)
   
   This program is free software; you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation; either version 2 of the License, or
   (at your option) any later version.
   
   This program is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.
   
   You should have received a copy of the GNU General Public License
   along with this program; if not, write to the Free Software
   Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
   */
  
global $wp_version;
  
	$exit_msg = 'WP Auto Loan Calculator requires WordPress 2.6 or newer. <a href="http://codex.wordpress.org/Upgrading_WordPress">Please update!</a>';
  
	if (version_compare($wp_version, "2.6", "<")) {
      exit($exit_msg);
	}
  
$wp_alc_plugin_url =  trailingslashit( WP_PLUGIN_URL.'/'. dirname( plugin_basename(__FILE__) ));
  
function WPAlc_WidgetControl()
{
	// get saved options
	$options = get_option('wp_alc');
      
	// handle user input
	if ($_POST["alc_submit"]) {
		// retireve alc title from the request
		$options['alc_title'] = strip_tags(stripslashes($_POST["alc_title"]));
		$options['alc_new_rate'] = strip_tags(stripslashes($_POST["alc_new_rate"]));
		$options['alc_used_rate'] = strip_tags(stripslashes($_POST["alc_used_rate"]));
          
 		// update the options to database
        update_option('wp_alc', $options);
	}
      
	$title = $options['alc_title'];
	$new_rate = $options['alc_new_rate'];
	$used_rate = $options['alc_used_rate'];

	// print out the widget control, links to widget control    
	include('wp-alc-widget-control.php');
}  
  
function WPAlc_Widget($args = array())
{      
	// extract the parameters
	extract($args);
      
	// get our options
	$options = get_option('wp_alc');
	$title = $options['alc_title'];
	$new_rate = $options['alc_new_rate'];
	$used_rate = $options['alc_used_rate'];
    
	// print the theme compatibility code
	echo $before_widget;
	echo $before_title . $title . $after_title;
      
	// include our widget
	include('wp-alc-widget.php');
      
	echo $after_widget;
}
 
//loads from the start
 
function WPAlc_Init()
{
	// register widget
	register_sidebar_widget('WP Auto Loan Calculator', 'WPAlc_Widget');
            
	// register widget control
	register_widget_control('WP Auto Loan Calculator', 'WPAlc_WidgetControl');      
}
add_action('init', 'WPAlc_Init');
  
//links to css
add_action('wp_head', 'WPAlc_HeadAction');
function WPAlc_HeadAction()
{
	global $wp_alc_plugin_url;     
    echo '<link rel="stylesheet" href="' . $wp_alc_plugin_url . '/wp-alc.css" type="text/css" />';
}
  
//links to javascript
add_action('wp_print_scripts', 'WPAlc_ScriptsAction');
function WPAlc_ScriptsAction()
{
	if (!is_admin()) {
	global $wp_alc_plugin_url;
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-form');
	wp_enqueue_script('wp_alc_script', $wp_alc_plugin_url . '/wp-alc.js', array('jquery', 'jquery-form'));
	}
}
  
?>