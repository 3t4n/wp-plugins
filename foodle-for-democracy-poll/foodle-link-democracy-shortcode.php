<?php
/*
 * Author: Michael Finkenberger
 * @since V1.0.0.0 (file separation @since V1.5.1.0)
 * Last change in plugin version: V2.5.4.1 (Improve robustness: esc_html() for strings entered by users)
 * Date: 22.01.2024
 * Tested with the latest plugin version
*/

if(!defined('ABSPATH')) die(); // no direct access



function foodle_link_democracy_poll( $atts ) {
  global $wpdb;
  global $foodle_title;

  $foodle_link_text = __('Link','foodle-for-democracy-poll').': ';
  $foodle_link_img = '<img style="vertical-align:-9px;display:inline-block;" src="'.plugin_dir_url(__FILE__).'img/link.png" width="30">&nbsp;&nbsp;&nbsp;';

  $not_same = ( isset($atts['not_same']) ) ? ( $atts['not_same'] == 'true' ) : true ; // not_same="true" means: no link if shortcode is in main poll page
  $verbose = ( isset($atts['verbose']) ) ? ( $atts['verbose'] == 'true' ) : true ;
  $horizontal = ( isset($atts['horizontal']) ) ? $atts['horizontal'] : 'left' ;
  $status = ( isset($atts['status']) ) ? explode(',', preg_replace('/\s+/', '', $atts['status'])) : array('logged-in', 'not-logged-in') ;

  $link_id = ( isset($atts['id']) ) ? $atts['id'] : -1 ; // Poll ID submitted through shortcode like id="x"

  if ( $link_id != -1 ) {
    $is_user_logged_in = ( is_user_logged_in() ) ? 'logged-in' : 'not-logged-in' ;
    $poll = $wpdb->get_row("SELECT * FROM $wpdb->democracy_q WHERE id = {$link_id}");
    if ( null == $poll ) return ( $verbose ) ? '<div>'.$foodle_link_img.__('Poll id seems incorrect','foodle-for-democracy-poll').'!</div>' : '' ;
/*
    $poll_voted = $wpdb->get_col("SELECT userid FROM $wpdb->democracy_log WHERE qid = {$link_id}");
    $has_user_voted = 'not_voted';
    if ( ! null == $poll_voted ) $has_user_voted = ( in_array(get_current_user_id(), $poll_voted) ) ? 'voted' : 'not-voted' ;
*/
    if ( in_array($is_user_logged_in, $status) ) {
      $poll_post = explode(",",$poll->in_posts)[0];
      $poll_title = esc_html($poll->question);
      $poll_link = get_permalink( $poll_post, false );
      if ( $poll_link !== false ) {
        if ( ( ! $not_same ) || ( ( $not_same ) && ( $poll_post != get_the_ID() ) ) )
        // Set the link but then remove it by jQuery, if we are inside a Democracy Poll archive
        return "<p class='foodle-link-shortcode foodle-link-shortcode-".$link_id."' style='text-align:".$horizontal."; margin-top:0px; margin-bottom:0px; padding:0px; white-space:nowrap !important;'><a class='foodle-link-button' poll-id='".$link_id."' href='".$poll_link."'>".$foodle_link_img.$foodle_title." '".$poll_title."'</a></p>
                <script type='text/javascript'>
                  var $ = jQuery;
                  $(document).ready(function() {
                    $('.foodle-link-shortcode-".$link_id."').parents('div.dem-archives').find('.foodle-link-shortcode-".$link_id."').remove();
                  });
                </script>";
        else return '';
      } else return ( $verbose ) ? '<div>'.$foodle_link_img.__('Permalink could not be retrieved','foodle-for-democracy-poll').'!</div>' : '' ;
    }
  }
  return ( $verbose ) ? '<div>'.$foodle_link_img.__('Poll id is missing','foodle-for-democracy-poll').'!</div>' : '' ;
}
function foodle_init_foodle_link_democracy_poll_shortcode() {
  add_shortcode('foodle-link-democracy-poll', 'foodle_link_democracy_poll');
}
add_action('wp_loaded', 'foodle_init_foodle_link_democracy_poll_shortcode');


