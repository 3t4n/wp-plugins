<?php
/*
 * Author: Michael Finkenberger
 * @since V1.0.0.0 (file separation @since V1.5.1.0)
 * Last change in plugin version: V2.4.3.0 (isolated from [foodle-link-democracy-poll] shortcode)
 * Date: 09.01.2024
 * Tested with the latest plugin version
*/

if(!defined('ABSPATH')) die(); // no direct access



function foodle_democracy_poll_database_check( $atts ) {
  global $wpdb;
  global $foodle_title;

  $vstatus = "";
  
  $is_shortcode = ( null != $atts );  // Detect whether the function was called by a shortcode (any parameter must be given in the shortcode!)
  $mf_statistics = ( ( $is_shortcode ) && ( isset($atts['use']) ) && ( 'statistics' == $atts['use'] ) ); // use="statistics" to display the statistics only
  $mf_check = ( ( $is_shortcode ) && ( isset($atts['use']) ) && ( "check" == $atts['use'] ) ); // use="check" to display the check only
  $mf_all = ( ( $is_shortcode ) && ( isset($atts['use']) ) && ( "all" == $atts['use'] ) ); // use="all" to display everything  
  if ( $is_shortcode && !$mf_statistics && !$mf_check && !$mf_all ) return ""; // Display nothing...
  $democracy_polls = array();         // stores the foodles and the number of participants for each
  $democracy_poll_names = array();    // stores the foodle names
  $democracy_polls_check = array();   // counts the number of participants for each foodle by the democracy_log
  $democracy_answers = array();       // stores the foodle answers and the number of voters for each
  $democracy_answer_names = array();  // stores the answer names
  $democracy_answers_check = array(); // counts the number of voters for each foodle's answers
  $democracy_link = admin_url()."options-general.php?page=democracy-poll&edit€poll="; // Link to edit the foodle
  $foodle_count = 0;                  // Counts the number of foodles
  $foodle_active_count = 0;           // Counts the number of active foodles
  $foodle_open_count = 0;             // Counts the number of open foodles
  $foodle_democratic_count = 0;       // Counts the number of democratic foodles (i.e. with the ability to add own answers)
  $foodle_participants_count = 0;     // Counts the total participants for all foodles
  $foodle_votes_count = 0;            // Counts the total votes for all foodle answers
  $foodle_post_count = 0;             // Counts the number of posts with foodles inside
  $foodle_no_post_count = 0;          // Counts the number of foodles without post representation
  $foodle_multiple_post_count = 0;    // Counts the number of foodles which are located in more than one post
  $foodle_reminders = 0;              // Counts all foodles with reminders
  $vstatus = "";                      // Output-String
  $no_error_text = "<tr><td></td><td>".__('no_errors','foodle-for-democracy-poll').".</td></tr><tr><td></td><td></td></tr>";
  $error_text = "<tr><td></td><td></td></tr>";
  $pt = "<span style='font-size:1.5em;'>•</span>_";
  
  // Collect the data...
  
  foreach($wpdb->get_results("SELECT * FROM $wpdb->democracy_q ORDER BY id ASC") as $poll ) {
    $democracy_polls[$poll->id] = $poll->users_voted;
    $democracy_poll_names[$poll->id] = esc_html($poll->question);
    $foodle_count += 1;
    $foodle_participants_count += $poll->users_voted;
    if ( $poll->active == 1 ) $foodle_active_count += 1;
    if ( $poll->open == 1 ) $foodle_open_count += 1;
    if ( $poll->democratic == 1 ) $foodle_democratic_count += 1;
    $foodle_posts = explode(",",$poll->in_posts);
    $foodle_post_count += ( $foodle_posts[0] == "" ) ? 0 : count(explode(",",$poll->in_posts));
    $foodle_no_post_count += ( $foodle_posts[0] == "" ) ? 1 : 0;
    $foodle_multiple_post_count += ( count(explode(",",$poll->in_posts)) > 1 ) ? 1 : 0;
  }
  
  foreach($wpdb->get_results("SELECT * FROM $wpdb->democracy_a ORDER BY qid ASC") as $poll ) {
    $democracy_answers[$poll->qid][$poll->aid] = $poll->votes;
    $democracy_answer_names[$poll->aid] = esc_html($poll->answer);
    $foodle_votes_count += $poll->votes;
  }
  
  foreach($wpdb->get_results("SELECT * FROM $wpdb->democracy_log ORDER BY qid ASC") as $poll ) {
    $democracy_polls_check[$poll->qid] = ( isset($democracy_polls_check[$poll->qid]) ) ? $democracy_polls_check[$poll->qid] + 1 : 1 ;
    $answers=explode(",",$poll->aids);
    foreach($answers as $answer_number) {
      $democracy_answers_check[$poll->qid][(int)$answer_number] = ( isset($democracy_answers_check[$poll->qid][(int)$answer_number]) ) ? $democracy_answers_check[$poll->qid][(int)$answer_number] + 1 : 1 ;
    }
  }
  
  if ( get_option('foodle_reminders') )
    $foodle_reminders = count((array)get_option('foodle_reminders'));
  else
    $foodle_reminders = 0;

  // Analyze and display...
  
  $vstatus .= "<table class='foodle-statistics-check-table'><tbody>";
  
  if ( !$mf_check ) {
    
    $txtnumof = __('Number_of','foodle-for-democracy-poll');
    $txtactive = __('active','foodle-for-democracy-poll');
    $txtopen = __('open','foodle-for-democracy-poll');
    $txtinteractive = __('Interactive','foodle-for-democracy-poll');
    $txttotal_part = __('Total_participants','foodle-for-democracy-poll');
    $txtper = __('per','foodle-for-democracy-poll');
    $txtwithrem = __('with_reminder(s)','foodle-for-democracy-poll');
    $txttotal_votes = __('Total_number_of_votes','foodle-for-democracy-poll');
    $txtnum_of_posts = __('Number_of_','foodle-for-democracy-poll').$foodle_title.__('_posts_(recorded)','foodle-for-democracy-poll');
    $txtin_diff_posts = __('in_different_posts','foodle-for-democracy-poll');
    $txtwithout_post = __('without_post','foodle-for-democracy-poll');
    
    if ( !$mf_statistics ) $vstatus .= "<tr><td><strong>".$pt."<strong></td><td><strong>".$foodle_title.__('_Statistics','foodle-for-democracy-poll').":</strong></td></tr>"; // some statistics
    $vstatus .= "<tr><td></td><td>".$txtnumof."_".$foodle_title.":_".$foodle_count." / ".$txtactive.":_".$foodle_active_count." / ".$txtopen.":_".$foodle_open_count."</td></tr>";
    $vstatus .= "<tr><td></td><td>".$txtinteractive."_".$foodle_title.":_".$foodle_democratic_count."</td></tr>";
    $perfoodle = ( $foodle_count == 0 ) ? 0 : round($foodle_participants_count/$foodle_count,1);
    $vstatus .= "<tr><td></td><td>".$txttotal_part.":_".$foodle_participants_count." (Ø_".$perfoodle."_".$txtper."_".$foodle_title.")</td></tr>";
    $percent = ( $foodle_count == 0 ) ? 0 : round($foodle_reminders/$foodle_count*100,0);
    $vstatus .= "<tr><td></td><td>".$foodle_title."_".$txtwithrem.":_".$foodle_reminders."_(".$percent."%)</td></tr>";
    $vstatus .= "<tr><td></td><td>".$txttotal_votes.":_".$foodle_votes_count."</td></tr>";
    $vstatus .= "<tr><td></td><td>".$txtnum_of_posts.":_".$foodle_post_count."</td></tr>";
    $vstatus .= "<tr><td></td><td>".$foodle_title."_".$txtin_diff_posts.":_".$foodle_multiple_post_count."</td></tr>";
    $vstatus .= "<tr><td></td><td>".$foodle_title."_".$txtwithout_post.":_".$foodle_no_post_count."</td></tr>";
    $vstatus .= "<tr><td></td><td></td></tr>";
  }
  
  if ( !$mf_statistics ) {
   
    $txterror_in = __('Error_in','foodle-for-democracy-poll');
    $txtbut = __('but','foodle-for-democracy-poll');
    $txtparticipants = __('participants','foodle-for-democracy-poll');
    $txtvotes = __('votes','foodle-for-democracy-poll');
    $txtanswer = __('Answer','foodle-for-democracy-poll');

    $vstatus .= "<tr><td><strong>".$pt."</strong></td><td><strong>".$foodle_title.__('_Participants_Check','foodle-for-democracy-poll').":</strong></td></tr>";
  
    $no_errors = true;
    foreach($democracy_polls as $id => $participants) {
      $democracy_polls_check_id = ( isset($democracy_polls_check[$id]) ) ? (int)$democracy_polls_check[$id] : 0 ;
      if ( $democracy_polls_check_id != $participants ) {
        $no_errors = false;
        $vstatus .= "<tr><td></td><td><span style='color:#bb0000;'>".$txterror_in."_<a href='".$democracy_link.$id."'>foodle_ID_".$id."</a> <span style='font-size:0.75em;'>(".$democracy_poll_names[$id].")</span>:<br/>Democracy_(log)_=_".$democracy_polls_check_id."<br />".$txtbut."<br />Democracy_(q)_=_".$participants."_".$txtparticipants.".</span></td></tr>";
      }
    }
    
    $vstatus .= ( $no_errors ) ? $no_error_text : $error_text;
    
    $vstatus .= "<tr><td><strong>".$pt."</strong></td><td><strong>".$foodle_title.__('_Votes_Check','foodle-for-democracy-poll').":</strong></td></tr>";
    
    $no_errors = true;
    foreach ($democracy_answers as $id => $answer_numbers) {
      foreach ( $answer_numbers as $answer_number => $votes ) {
        $democracy_answers_check_id_answer_number = ( isset($democracy_answers_check[$id][$answer_number]) ) ? (int)$democracy_answers_check[$id][$answer_number] : 0 ;
        if ( $democracy_answers_check_id_answer_number != $votes ) {
          $no_errors = false;
          $vstatus .= "<tr><td></td><td><span style='color:#bb0000;'>".$txterror_in."_<a href='".$democracy_link.$id."'>Foodle_ID_".$id."</a> <span style='font-size:0.75em;'>(".$democracy_poll_names[$id].")</span>,<br/>".$txtanswer."_ID_".$answer_number." <span style='font-size:0.75em;'>(".$democracy_answer_names[$answer_number].")</span>:<br/>Democracy_(log)_=_".$democracy_answers_check_id_answer_number."<br />".$txtbut."<br />Democracy_(a)_=_".$votes."_".$txtvotes.".</span></td></tr>";
        }
      }
    }
    
    $vstatus .= ( $no_errors ) ? $no_error_text : $error_text;
    
  }
  
  $vstatus .= "</tbody></table>";
  
  $vstatus = str_replace("_"," ",$vstatus);
  $vstatus = str_replace("€","_",$vstatus);
  
  if ( $is_shortcode ) return $vstatus; else echo $vstatus;
  
}
function foodle_init_foodle_democracy_poll_database_check_shortcode() {
  add_shortcode('foodle-democracy-poll-database-check', 'foodle_democracy_poll_database_check');
}
add_action('wp_loaded','foodle_init_foodle_democracy_poll_database_check_shortcode');

function foodle_add_dashboard_widgets() {
  global $foodle_title;
  wp_add_dashboard_widget( 'foodle_database_check', $foodle_title.' '.__('Statistics & Database Check','foodle-for-democracy-poll'), 'foodle_democracy_poll_database_check');
}
add_action( 'wp_dashboard_setup', 'foodle_add_dashboard_widgets' );


