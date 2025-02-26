<?php
/*
 * Author: Michael Finkenberger
 * @since V1.1.0.0
 * Last change in plugin version: V2.5.10.1 (the list of user ids to be reminded and other data is now drawn from function 'foodle_get_the_poll_participation_data()')
 * Date: 12.02.2024
 * Tested with the latest plugin version
*/

if(!defined('ABSPATH')) die(); // no direct access



// Description: AJAX-Function, sending an email to remind users who didn't yet vote a foodle poll.
function foodle_email_hook_ajax_script() {
  $js_url = plugin_dir_url(__FILE__).'js/foodle_email_ajax_file.js';
  wp_register_script( 'foodle_email_ajax_script', $js_url, array('jquery'), FOODLE_VERSION, false );
  wp_enqueue_script( 'foodle_email_ajax_script' );

  wp_localize_script( 'foodle_email_ajax_script', 'mf_bob', array(
    'ajaxurl' => admin_url( 'admin-ajax.php' ),
    'title' => get_the_title()
    )
  );
}
add_action( 'wp_enqueue_scripts', 'foodle_email_hook_ajax_script' );



// Send the Foodle reminders to those who didn't vote, yet
function foodle_php_send_email() {
  global $foodle_undefined_error;
  global $wpdb;
  global $foodle_title;
  
  $out = $foodle_undefined_error;
  $foodle_error = __('Error','foodle-for-democracy-poll');
  $foodle_not_sent = __('No emails were sent','foodle-for-democracy-poll');

  if ( isset($_POST["foodle_id"]) ) {

    $reminder_id = sanitize_text_field($_POST["foodle_id"]); // The Poll ID for which the reminder is to be sent by eMail if end is defined in the Poll

    if ( get_option("foodle_email_content") ) {
    
      $poll = $wpdb->get_row("SELECT * FROM $wpdb->democracy_q WHERE id = ".$reminder_id); // get the relevant poll data
      $poll_start = $poll->added;
      $poll_end = $poll->end;
      $poll_url = get_permalink( explode(",",$poll->in_posts)[0], false );
      $poll_link = '<a href="'.$poll_url.'">'.$foodle_title.__(' link','foodle-for-democracy-poll').'...</a>';
      $poll_title = esc_html($poll->question);

      if ( ($poll_start <> 0) && ($poll_start <> "") ) {
        $poll_start = date_i18n('d. F Y', $poll_start);
      } else $poll_start="---";

      if ( ($poll_end <> 0) && ($poll_end <> "") ) { // continue only, if the poll has a valid end date
        $poll_end = date_i18n('d. F Y', $poll_end);
        
        $users = get_users(array(
                   'orderby'  => 'meta_value',
                   'meta_key' => 'last_name', // just a habit ;-)
                   'order'    => 'ASC'
        ));

        $foodle_participation_data = foodle_get_the_poll_participation_data($reminder_id);
        $list_of_user_ids_to_remind = $foodle_participation_data['list_of_user_ids_to_remind'];
        $number_of_users_to_remind = $foodle_participation_data['number_of_users_to_remind'];
        $number_of_users_voted = $foodle_participation_data['number_of_users_voted'];

        if ( $number_of_users_to_remind > 0 ) { // continue only, if the resulting list of addressees is not empty
//          $list_of_user_ids_to_remind = array();  // initialize the receipients array for email testing purposes only!
//          $list_of_user_ids_to_remind[] = 1;      // just send to administrator for email testing purposes only!

          $betreff = sprintf(__('Your %s response is still missing','foodle-for-democracy-poll'), $foodle_title).'...';
          
          $curr_user_id = get_current_user_id();
          $curr_user_data = get_userdata($curr_user_id);
          $curr_user_firstname = $curr_user_data->first_name;
          $curr_user_lastname = $curr_user_data->last_name;
          
          $good_count = 0;
          $bad_count = 0;

          $foodle_placeholder_array = array(
            '{foodle-title}'          =>  $foodle_title,
            '{poll-ID}'               =>  $reminder_id,
            '{poll-title}'            =>  $poll_title,
            '{poll-start}'            =>  $poll_start,
            '{poll-end}'              =>  $poll_end,
            '{poll-url}'              =>  $poll_url,
            '{poll-link}'             =>  $poll_link,
            '{users-voted}'           =>  $number_of_users_voted,
            '{username}'              =>  '{user-login}',
            '{first-name}'            =>  '{first-name}',
            '{last-name}'             =>  '{last-name}',
            '{nickname}'              =>  '{nickname}',
            '{user-nicename}'         =>  '{user-nicename}',
            '{display-name}'          =>  '{display-name}',
            '{firstname-trigger}'     =>  $curr_user_firstname,
            '{lastname-trigger}'      =>  $curr_user_lastname,
            '{password-forgot-url}'   =>  wp_lostpassword_url(),
            '{password-forgot-link}'  =>  '<a href = "'.wp_lostpassword_url().'">'.__('lost password','foodle-for-democracy-poll').'...</a>'
          );

          //eMail-Sendeschleife
          foreach($list_of_user_ids_to_remind as $send_to_id) {
            $sent_to_user = get_userdata($send_to_id);
            $send_to_email = $sent_to_user->user_email;
            
            $foodle_placeholder_array['{user-login}'] = $sent_to_user->user_login; // fill the missing data
            $foodle_placeholder_array['{first-name}'] = $sent_to_user->first_name; // fill the missing data            $foodle_placeholder_array['{first-name}'] = $sent_to_user->first_name; // fill the missing data
            $foodle_placeholder_array['{last-name}'] = $sent_to_user->last_name; // fill the missing data
            $foodle_placeholder_array['{nickname}'] = $sent_to_user->nickname; // fill the missing data
            $foodle_placeholder_array['{user-nicename}'] = $sent_to_user->user_nicename; // fill the missing data
            $foodle_placeholder_array['{display-name}'] = $sent_to_user->display_name; // fill the missing data
          
            $message = html_entity_decode(get_option("foodle_email_content"));
      
            foreach ( $foodle_placeholder_array as $placeholder => $ph_content ) {
              $message = str_replace($placeholder, $ph_content, $message);
            }

            add_filter( 'wp_mail_from_name', function( $adminname ) { return explode('@', get_option('admin_email'))[0]; }, 10 );
            add_filter( 'wp_mail_from', function( $email ) {return get_option('admin_email');}, 10 );
            add_filter( 'wp_mail_content_type','foodle_set_html_mail_content_type', 10 );
            $mail_sent = wp_mail( $send_to_email, $foodle_title.' '.__('reminder for','foodle-for-democracy-poll').' '.get_option('blogname'), $message );
          
            // Remove all those filters while not needed to avoid any conflict with other plugins or themes...
            remove_filter( 'wp_mail_from_name', function( $adminname ) {return explode('@', get_option('admin_email'))[0];}, 10 );
            remove_filter( 'wp_mail_from', function( $email ) {return get_option('admin_email');}, 10 );
            remove_filter( 'wp_mail_content_type','foodle_set_html_mail_content_type', 10 );
        
            if ( $mail_sent ) {
              $good_count += 1;
            } else {
              $bad_count += 1;
            }
          }

          if ( $good_count > 0 ) {
            $poll_reminders = (array)get_option('foodle_reminders');
            $poll_reminders[$reminder_id][]= date_i18n('U').'/'.$curr_user_id.'/'.$number_of_users_to_remind.'/'.$good_count.'/'.$bad_count; // new reduced
            update_option('foodle_reminders', $poll_reminders, 'yes');
          }
        
          $foodle_sent_message = sprintf(__("The reminder for '%s' was sent to %d&nbsp;of&nbsp;%d addressees",'foodle-for-democracy-poll'), $poll_title, $good_count, $number_of_users_to_remind);
          if ( $bad_count == 0 ) {
            $out = "<span style='color:darkgreen;'>OK!<br>".$foodle_sent_message.".</span>";
          } else {
            $out = "<span style='color:darkred;'>".__('Errors occurred','foodle-for-democracy-poll')."!<br />".$foodle_sent_message.".<br />".sprintf(__('An error occurred with %d&nbsp;of&nbsp;%d addressees','foodle-for-democracy-poll'), $bad_count, $number_of_users_to_remind)."!</span>";
          }
    
        } else { $out = "<span style='color:SteelBlue;'>".__('Well','foodle-for-democracy-poll')."...<br />".sprintf(__("Obviously, everyone answered on '%s'",'foodle-for-democracy-poll'), $poll_title).".<br />".$foodle_not_sent."!</span>"; }
      } else {
        if ($poll_end == "") {
          $out = "<span style='color:darkred;'>".$foodle_error."!<br/>".sprintf(__('%s with ID %d: doesn\'t exist','foodle-for-democracy-poll'), $foodle_title, $reminder_id)."!</span>";
          $reminder_id = get_option('foodle_variables')["gl_dem_id"]; // Take the ID from the option data, trying to get back properly
        } else { $out = "<span style='color:darkred;'>".$foodle_error."!<br />'".$poll_title."': ".__('has no defined ending date','foodle-for-democracy-poll').".<br />".$foodle_not_sent."!</span>"; }
      }
    } else {
      $out = "<span style='color:darkred;'>".$foodle_error."!<br />".__('The email text was not stored, yet','foodle-for-democracy-poll')."!</span>";
    }
  } else {
    $out = "<span style='color:darkred;'>".$foodle_error."!<br />".__('The ID is missing','foodle-for-democracy-poll')."!</span>";
    $reminder_id = get_option('foodle_variables')["gl_dem_id"]; // Take the ID from the option data, trying to get back properly
}
  
  $ajax_call = "javascript:mf_sw_foodle_sort_js(".$reminder_id.",false,false,false,123456789,false,false,false,false,0.1)";

  $out .= "<p style='margin-top:15px; margin-bottom:0px; padding:0px;'><a class='ajax-link foodle-button' href='".$ajax_call."'>".__('Fine - and now go back','foodle-for-democracy-poll')."...</a></p>";

  echo $out;
  die();
}
add_action( 'wp_ajax_nopriv_foodle_php_send_email', 'foodle_php_send_email' );
add_action( 'wp_ajax_foodle_php_send_email', 'foodle_php_send_email' );



// Setting the email type to HTML...
function foodle_set_html_mail_content_type() {
  return 'text/html';
}


