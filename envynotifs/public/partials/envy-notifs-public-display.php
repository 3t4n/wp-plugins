<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://envytheme.com/
 * @since      1.1
 *
 * @package    Envy_Notifs
 * @subpackage Envy_Notifs/public/partials
 */
  
$notifs_bar_start_date = (array)get_option('new_settings');
if( isset( $notifs_bar_start_date['select-start-date'] ) ) :
    $notifs_bar_start_date_new = $notifs_bar_start_date['select-start-date'];
else:
    $notifs_bar_start_date_new = '';  
endif;

$notifs_bar_end_date = (array)get_option('new_settings');
if( isset( $notifs_bar_end_date['select-end-date'] ) ) :
    $notifs_bar_end_date_new = $notifs_bar_end_date['select-end-date'];
else:
    $notifs_bar_end_date_new = '';  
endif;

$notifs_bar_start_time = (array)get_option('new_settings');
if( isset( $notifs_bar_start_time['select-start-time'] ) ) :
    $notifs_bar_start_time_new = $notifs_bar_start_time['select-start-time'];
else:
    $notifs_bar_start_time_new = '';  
endif;

$notifs_bar_end_time = (array)get_option('new_settings');
if( isset( $notifs_bar_end_time['select-end-time'] ) ) :
    $notifs_bar_end_time_new = $notifs_bar_end_time['select-end-time'];
else:
    $notifs_bar_end_time_new = '';
endif; ?>

<?php if( current_time('Y-m-d') >= $notifs_bar_start_date_new 
&& current_time('Y-m-d') <= $notifs_bar_end_date_new 
&& current_time('G:i') >= $notifs_bar_start_time_new 
&& current_time('G:i') <= $notifs_bar_end_time_new
|| current_time('Y-m-d') >= $notifs_bar_start_date_new && 
current_time('Y-m-d') <= $notifs_bar_end_date_new && $notifs_bar_start_time_new == ''
|| current_time('G:i') >= $notifs_bar_start_time_new 
&& current_time('G:i') <= $notifs_bar_end_time_new && $notifs_bar_start_date_new == ''
|| $notifs_bar_start_date_new == '' && $notifs_bar_start_date_new == '' ) :

$notifs_bar_single_show = (array)get_option('new_settings');
if( isset( $notifs_bar_single_show['select-single-position'] ) ) : 
    $notifs_bar_single_show_new = $notifs_bar_single_show['select-single-position'];
else:
    $notifs_bar_single_show_new = '';  
endif;

if( $notifs_bar_single_show_new == 'all'
|| $notifs_bar_single_show_new == 'home' && is_home()
|| $notifs_bar_single_show_new == 'home' && is_front_page() 
|| $notifs_bar_single_show_new == 'pages' && is_page() 
|| $notifs_bar_single_show_new == 'posts' && ! is_page() && ! is_home() ) :

$notifs_bar_position = (array)get_option('new_settings');
if ( isset( $notifs_bar_position['select-global-position'] ) ) :
    $envy_notifs_global = $notifs_bar_position['select-global-position'];
else:
    $envy_notifs_global = '';
endif;
$envy_notifs_pages = get_post_meta( get_the_ID(), 'custom_element_grid_class_meta_box', true );

if( $envy_notifs_global == 'popup' ) : 

require plugin_dir_path( __FILE__ ) . 'templates/envy-notifs-popup.php';

elseif( $envy_notifs_global == 'none' && $envy_notifs_pages == 'top'
|| $envy_notifs_global == 'top' && $envy_notifs_pages == '' 
|| $envy_notifs_global == 'top' && $envy_notifs_pages == 'default' 
|| $envy_notifs_global == 'top' && $envy_notifs_pages == 'top'
|| $envy_notifs_global == 'top' && $envy_notifs_pages == 'none'
|| $envy_notifs_global == 'bottom' && $envy_notifs_pages == 'top' 
|| $envy_notifs_global == 'leftside' && $envy_notifs_pages == 'top' 
|| $envy_notifs_global == 'rightside' && $envy_notifs_pages == 'top' ) :

require plugin_dir_path( __FILE__ ) . 'templates/envy-notifs-top-bar.php';

elseif( $envy_notifs_global == 'none' && $envy_notifs_pages == 'bottom' 
|| $envy_notifs_global == 'bottom' && $envy_notifs_pages == '' 
|| $envy_notifs_global == 'none' && $envy_notifs_pages == 'bottom' 
|| $envy_notifs_global == 'bottom' && $envy_notifs_pages == 'default' 
|| $envy_notifs_global == 'top' && $envy_notifs_pages == 'bottom' 
|| $envy_notifs_global == 'bottom' && $envy_notifs_pages == 'bottom' 
|| $envy_notifs_global == 'leftside' && $envy_notifs_pages == 'bottom' 
|| $envy_notifs_global == 'rightside' && $envy_notifs_pages == 'bottom' ) :

require plugin_dir_path( __FILE__ ) . 'templates/envy-notifs-bottom-bar.php';

elseif( $envy_notifs_global == 'none' && $envy_notifs_pages == 'leftside' 
|| $envy_notifs_global == 'leftside' && $envy_notifs_pages == '' 
|| $envy_notifs_global == 'none' && $envy_notifs_pages == 'leftside' 
|| $envy_notifs_global == 'leftside' && $envy_notifs_pages == 'default' 
|| $envy_notifs_global == 'top' && $envy_notifs_pages == 'leftside' 
|| $envy_notifs_global == 'bottom' && $envy_notifs_pages == 'leftside' 
|| $envy_notifs_global == 'leftside' && $envy_notifs_pages == 'leftside' 
|| $envy_notifs_global == 'rightside' && $envy_notifs_pages == 'leftside' ) :

$notifs_left_right_position = (array)get_option('new_settings');
if( isset( $notifs_left_right_position['select-left-right-position'] ) ) :
    $notifs_left_right_position_new = $notifs_left_right_position['select-left-right-position'];
else: $notifs_left_right_position_new = '';
endif;

if( $notifs_left_right_position_new == 'inside-window' ) : 
    require plugin_dir_path( __FILE__ ) . 'templates/envy-notifs-left-sidebar-inside.php';
elseif( $notifs_left_right_position_new == 'outside-window' ) :
    require plugin_dir_path( __FILE__ ) . 'templates/envy-notifs-left-sidebar-outside.php';
endif;

elseif( $envy_notifs_global == 'none' && $envy_notifs_pages == 'rightside' 
|| $envy_notifs_global == 'rightside' && $envy_notifs_pages == '' 
|| $envy_notifs_global == 'none' && $envy_notifs_pages == 'rightside' 
|| $envy_notifs_global == 'rightside' && $envy_notifs_pages == 'default' 
|| $envy_notifs_global == 'top' && $envy_notifs_pages == 'rightside' 
|| $envy_notifs_global == 'bottom' && $envy_notifs_pages == 'rightside' 
|| $envy_notifs_global == 'leftside' && $envy_notifs_pages == 'rightside' 
|| $envy_notifs_global == 'rightside' && $envy_notifs_pages == 'rightside' ) :

$notifs_left_right_position = (array)get_option('new_settings');
if( isset( $notifs_left_right_position['select-left-right-position'] ) ) :
    $notifs_left_right_position_new = $notifs_left_right_position['select-left-right-position'];
else: $notifs_left_right_position_new = '';
endif;

if( $notifs_left_right_position_new == 'inside-window' ) : 
    require plugin_dir_path( __FILE__ ) . 'templates/envy-notifs-right-sidebar-inside.php';
elseif( $notifs_left_right_position_new == 'outside-window' ) :
    require plugin_dir_path( __FILE__ ) . 'templates/envy-notifs-right-sidebar-outside.php';
endif;

endif;

endif;

endif;
