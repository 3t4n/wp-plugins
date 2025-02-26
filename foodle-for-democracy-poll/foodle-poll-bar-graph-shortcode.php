<?php
/*
 * Author: Michael Finkenberger
 * @since V2.5.0.0
 * Last change in plugin version: V2.5.11.3 (Users with more than one role are not counted more than once.)
 * Date: 06.03.2024
 * Tested with the latest plugin version
*/

if(!defined('ABSPATH')) die(); // no direct access



// enqueue the front end bar graph animation jQuery function
function hook_foodle_bar_graph_script() {
  $js_url = plugin_dir_url(__FILE__).'js/foodle_bar_graph_animate.js';
  wp_register_script( 'foodle-bar-graph-script', $js_url, array('jquery'), FOODLE_VERSION, false ); // false = not in the footer
  wp_enqueue_script( 'foodle-bar-graph-script' );
}
add_action( 'wp_enqueue_scripts', 'hook_foodle_bar_graph_script' ); // for the front end as well



// Description: AJAX-Function, displaying the comments of a poll interactively.
function foodle_non_voters_hook_ajax_script() {
  $js_url = plugin_dir_url(__FILE__).'js/foodle_non_voters_ajax_file.js';
  wp_register_script( 'foodle_non_voters_ajax_script', $js_url, array('jquery'), FOODLE_VERSION, false );
  wp_enqueue_script( 'foodle_non_voters_ajax_script' );

  wp_localize_script( 'foodle_non_voters_ajax_script', 'foodle_non_voters_ajax_var', array(
    'ajaxurl' => admin_url( 'admin-ajax.php' ),
    'message' => __('Waiting for the users that did not yet<br>vote regarding Democracy id ','foodle-for-democracy-poll')
    )
  );
}
add_action( 'wp_enqueue_scripts', 'foodle_non_voters_hook_ajax_script' ); // for front end...
add_action( 'admin_enqueue_scripts', 'foodle_non_voters_hook_ajax_script' ); // ...and back end



// Copy the related non-voting members to the calling tooltip
function foodle_copy_non_voters_to_tooltip() {
  global $foodle_undefined_error;

  $out = $foodle_undefined_error;

  if ( isset($_POST["foodle_id"]) ) {
    $id  = sanitize_text_field($_POST["foodle_id"]); // The Democracy id
    $out = foodle_get_non_voters($id);
    
  } else { $out = "<div style='color:red;'>".__('Error!<br />Essential parameters for AJAX execution are missing!','foodle-for-democracy-poll')."</div>"; }

  echo $out;
  die();
}
add_action( 'wp_ajax_nopriv_foodle_copy_non_voters_to_tooltip', 'foodle_copy_non_voters_to_tooltip' );
add_action( 'wp_ajax_foodle_copy_non_voters_to_tooltip', 'foodle_copy_non_voters_to_tooltip' );



function foodle_get_non_voters($foodle_id) {
  global $wpdb;

  $foodle_participation_data = foodle_get_the_poll_participation_data($foodle_id); // returns false or an array of data
  if ( $foodle_participation_data === false ) return '<span style="color:Red;">'.__('Poll id error','foodle-for-democracy-poll').'</span>'; // no such poll id or other sql error

  $list_of_users_to_vote = $foodle_participation_data['list_of_users_to_vote'];
  $number_of_users_concerned = $foodle_participation_data['number_of_users_concerned'];
  $number_of_users_voted = $foodle_participation_data['number_of_users_voted'];
  $number_of_users_to_vote = $foodle_participation_data['number_of_users_to_vote'];
  $list_of_users_to_vote = $foodle_participation_data['list_of_users_to_vote'];
  $number_of_unexpected_voters = $foodle_participation_data['number_of_unexpected_voters'];
  $list_of_unexpected_voters = $foodle_participation_data['list_of_unexpected_voters'];

  $list_of_users_to_vote_table = '';

  if ( ( $number_of_unexpected_voters > 0 ) && ( current_user_can('manage_options') ) ) {
    $list_of_users_to_vote_table .= '<figure class="foodle-unexpected-voters-table-figure"><table class="foodle-unexpected-voters-table">';
    $list_of_users_to_vote_table .= '<thead><tr class="foodle-unexpected-voters-table-headline"><th><strong>'.__('Unexpected poll participants','foodle-for-democracy-poll').'</strong><br>'.__('unexpected','foodle-for-democracy-poll').': '.$number_of_unexpected_voters.'</th></tr></thead><tbody>';
    foreach ( $list_of_unexpected_voters as $unexpected_voter ) {
      $list_of_users_to_vote_table .= '<tr><td>'.$unexpected_voter.'</td></tr>';
    }
    $list_of_users_to_vote_table .= '</tbody></table></figure>';
  $list_of_users_to_vote_table .= '<div style="width:100%;text-align:center;color:red;margin:0px auto 0px auto;">&#x26A0;</div>';
  }

  $list_of_users_to_vote_table .= '<figure class="foodle-non-voters-table-figure"><table class="foodle-non-voters-table">';
  $list_of_users_to_vote_table .= '<thead><tr class="foodle-non-voters-table-headline"><th><strong>'.__('Poll participants who<br>did not vote, yet','foodle-for-democracy-poll').'</strong><br><span style="color:DarkGreen;">'.__('voted','foodle-for-democracy-poll').': '.$number_of_users_voted.'/'.$number_of_users_concerned.'</span>&nbsp;&nbsp;•&nbsp;&nbsp;'.__('did not vote','foodle-for-democracy-poll').': '.$number_of_users_to_vote.'/'.$number_of_users_concerned.'</th></tr></thead><tbody>';
  foreach ( $list_of_users_to_vote as $user_to_vote ) {
    $list_of_users_to_vote_table .= '<tr><td>'.$user_to_vote.'</td></tr>';
  }
  $list_of_users_to_vote_table .= '</tbody></table></figure>';

  return $list_of_users_to_vote_table;
}



function foodle_get_the_poll_participation_data($poll_id) {
  global $wpdb;

  // get the poll and return if there's an issue
  $sql = "SELECT * FROM $wpdb->democracy_q WHERE id={$poll_id}";
  $get_foodle_poll = $wpdb->get_row($sql);
  if ( ! isset($get_foodle_poll) ) return false; // no such poll id or other sql error

  $sql = "SELECT userid FROM $wpdb->democracy_log WHERE qid={$poll_id}";
  $list_of_user_ids_voted = $wpdb->get_col($sql);
  if ( ! isset($list_of_user_ids_voted) ) return false; // no such poll id or other sql error

  // Get the list of users to vote and determine the list of users that did not vote, yet
  $foodle_roles_concerned = maybe_unserialize($get_foodle_poll->roles_concerned); // in case not yet filled
  if ( ! is_array($foodle_roles_concerned) ) $foodle_roles_concerned = array(); // if not yet filled
  if ( $foodle_roles_concerned == array() ) $foodle_roles_concerned = array_keys(wp_roles()->get_names());
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['roles_show_admin'][$poll_id]) ) )
    $foodle_remove_admin = ( ! ( get_option('foodle_dem_categories')['roles_show_admin'][$poll_id] ) );
  else
    $foodle_remove_admin = false;
  $list_of_user_ids_concerned = array();
  $list_of_users_concerned = array();
  $list_of_user_ids_to_vote = array();
  $list_of_users_to_vote = array();
  $list_of_user_ids_to_remind = array();
  $list_of_users_to_remind = array();
  $list_of_users_voted = array();
  $list_of_unexpected_voters = array();
  if ( get_option('foodle_special_functions') )
    $list_of_user_foodle_capabilities = get_option('foodle_special_functions');
  else
    $list_of_user_foodle_capabilities = array();
  foreach( $foodle_roles_concerned as $foodle_role_concerned ) {
    if ( ( $foodle_remove_admin ) && ( $foodle_role_concerned == 'administrator' ) ) continue;
    $args = array( 'role' => $foodle_role_concerned );
    $list_of_role_users_to_vote = get_users( $args );
    foreach ( $list_of_role_users_to_vote as $role_user_to_vote ) {
      if ( ( isset($list_of_user_foodle_capabilities[$role_user_to_vote->ID]) ) && ( in_array('no-voter', $list_of_user_foodle_capabilities[$role_user_to_vote->ID]) ) ) continue;
      if ( in_array($role_user_to_vote->ID,$list_of_user_ids_concerned) ) continue;
      $list_of_user_ids_concerned[] = $role_user_to_vote->ID;
      $list_of_users_concerned[] = $role_user_to_vote->display_name;
      if ( in_array( $role_user_to_vote->ID, $list_of_user_ids_voted ) ) continue;
      $list_of_user_ids_to_vote[] = $role_user_to_vote->ID;
      $list_of_users_to_vote[] = $role_user_to_vote->display_name;
      if ( ( ! isset($list_of_user_foodle_capabilities[$foodle_role_concerned]) ) || ( ! in_array('no-remind', $list_of_user_foodle_capabilities[$foodle_role_concerned]) ) )
        if ( ( ! isset($list_of_user_foodle_capabilities[$role_user_to_vote->ID]) ) || ( ! in_array('no-remind', $list_of_user_foodle_capabilities[$role_user_to_vote->ID]) ) ) {
          $list_of_user_ids_to_remind[] = $role_user_to_vote->ID;
          $list_of_users_to_remind[] = $role_user_to_vote->display_name;
        }
    }
  }
  $number_of_users_concerned = count($list_of_user_ids_concerned);
  $number_of_users_to_vote = count($list_of_users_to_vote);
  $number_of_users_to_remind = count($list_of_user_ids_to_remind);
  $number_of_users_voted = count($list_of_user_ids_voted);
  $list_of_expected_voter_ids = array_intersect($list_of_user_ids_voted,$list_of_user_ids_concerned);
  $list_of_unexpected_voter_ids = array_diff($list_of_user_ids_voted,$list_of_expected_voter_ids);
  $number_of_unexpected_voters = count($list_of_unexpected_voter_ids);
  foreach($list_of_user_ids_voted as $user_id_voted) {
    $user_voted = get_userdata($user_id_voted);
    $list_of_users_voted[] = $user_voted->display_name;
  }
  foreach($list_of_unexpected_voter_ids as $unexpected_voter_id) {
    $unexpected_voter = get_userdata($unexpected_voter_id);
    $list_of_unexpected_voters[] = $unexpected_voter->display_name;
  }

  // determine the participation rate for the poll
  if ( $number_of_users_concerned == 0 ) $number_of_users_concerned = 0.001;
  $foodle_participation_rate = round($number_of_users_voted / $number_of_users_concerned * 100,0); // > 100 indicates: something's wrong with the votes and the users concernd

  $foodle_participation_data = array(
    'participation_rate'           => $foodle_participation_rate,
    'roles_concerned'              => $foodle_roles_concerned,
    'remove_admin'                 => $foodle_remove_admin,
    'number_of_users_concerned'    => (int)$number_of_users_concerned,
    'list_of_user_ids_concerned'   => $list_of_user_ids_concerned,
    'list_of_users_concerned'      => $list_of_users_concerned,
    'number_of_users_to_vote'      => $number_of_users_to_vote,
    'list_of_user_ids_to_vote'     => $list_of_user_ids_to_vote,
    'list_of_users_to_vote'        => $list_of_users_to_vote,
    'number_of_users_to_remind'    => $number_of_users_to_remind,
    'list_of_user_ids_to_remind'   => $list_of_user_ids_to_remind,
    'list_of_users_to_remind'      => $list_of_users_to_remind,
    'number_of_users_voted'        => $number_of_users_voted,
    'list_of_user_ids_voted'       => $list_of_user_ids_voted,
    'list_of_users_voted'          => $list_of_users_voted,
    'number_of_unexpected_voters'  => $number_of_unexpected_voters,
    'list_of_unexpected_voter_ids' => $list_of_unexpected_voter_ids,
    'list_of_unexpected_voters'    => $list_of_unexpected_voters
  );
  return $foodle_participation_data; // return false or an array of data
}



add_shortcode('foodle-poll-bar-graph',function($attr, $content){
  global $wpdb;
  global $foodle_title;
  global $foodle_frontend_tooltips;
  global $foodle_scroll_up_button_visible;
  global $foodle_bar_graph_text;
 
  // Not logged in or Foodle id is missing
  if ( ( ! is_user_logged_in() ) || ( ! isset($attr["id"]) ) ) return;

  $poll_id = $attr["id"];

  // Define some basic variables related to the democracy database (quit if poll does not exist)
  $sql = "SELECT * FROM $wpdb->democracy_q WHERE id={$poll_id}";
  $get_foodle_poll = $wpdb->get_row($sql);
  if ( ! isset($get_foodle_poll) ) return ''; // no such poll id or something's wrong

  $poll_title = esc_html($get_foodle_poll->question);

  if ( ( isset($foodle_scroll_up_button_visible['bar_graph']) ) && ( $foodle_scroll_up_button_visible['bar_graph'] ) ) foodle_provide_scroll_up_button();

  // determine the participation rate for the poll
  $foodle_participation_data = foodle_get_the_poll_participation_data($poll_id); // returns false or an array of data
  if ( $foodle_participation_data === false ) return ''; // no such poll id or something's wrong
  $foodle_participation_rate = $foodle_participation_data['participation_rate'];
  $number_of_users_concerned = $foodle_participation_data['number_of_users_concerned'];
  $number_of_users_to_vote = $foodle_participation_data['number_of_users_to_vote'];
  $number_of_users_voted = $foodle_participation_data['number_of_users_voted'];
  $number_of_unexpected_voters = $foodle_participation_data['number_of_unexpected_voters'];
  $foodle_roles_concerned = $foodle_participation_data['roles_concerned'];
  $foodle_participation_rate_initial = ( $foodle_participation_rate > 100 ) ? 0 : $foodle_participation_rate; // for the initial bar graph

  // Check whether to display the shortcode for the current user
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['roles_show_bar_graph'][$poll_id]) ) )
    $roles_show_bar_graph = get_option('foodle_dem_categories')['roles_show_bar_graph'][$poll_id];
  else
    $roles_show_bar_graph = false;
  if ( ! ( ( $foodle_roles_concerned == array() ) || ( ! $roles_show_bar_graph ) || ( ( $roles_show_bar_graph ) && ( count(array_intersect((array)wp_get_current_user()->roles, $foodle_roles_concerned)) > 0 ) ) ) )
    return; // hide bar graph

  // decide which tooltip is to be displayed, depending on the Foodle poll setttings; default: for admins only.
  $help_bar_graph = ( $foodle_frontend_tooltips ) ? " foodle_tooltip='".__('This bar graph provides data and a graphical<br>impression of the participation rate for this poll.','foodle-for-democracy-poll')."'" : "";
  $show_non_voters = ' foodle_non_voters_tooltip="'.$poll_id.'"';
  $help_bar_graph_or_show_non_voters = ( current_user_can('manage_options') ) ? $show_non_voters : $help_bar_graph; // for backward compatibility
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['non_voters_to_admin_only'][$poll_id]) ) && ( ! ( get_option('foodle_dem_categories')['non_voters_to_admin_only'][$poll_id] ) ) ) // for backward compatibility
    $help_bar_graph_or_show_non_voters = $show_non_voters; // for backward compatibility
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['roles_for_not_voted'][$poll_id]) ) )
    $roles_for_not_voted = get_option('foodle_dem_categories')['roles_for_not_voted'][$poll_id];
  else
    $roles_for_not_voted = ( $help_bar_graph_or_show_non_voters == $show_non_voters ) ? array('administrator') : array(''); // for backward compatibility
  $help_bar_graph_or_show_non_voters = ( ( $roles_for_not_voted == array()  ) || ( count(array_intersect((array)wp_get_current_user()->roles, $roles_for_not_voted)) > 0 ) ) ? $show_non_voters : $help_bar_graph;
  $foodle_bar_graph_text_html = ( $foodle_bar_graph_text !== '---' ) ? '<span class="foodle-votes-txt-votes">'. $foodle_bar_graph_text .': </span>' : '<span class="foodle-votes-txt-votes"></span>';
  $output = '
    <div class="foodle-graph-wrapper foodle-graph-wrapper-'.$poll_id.'" id="foodle_graph_wrapper_'.$poll_id.'">
      <div class="foodle-graph-title" id="foodle_graph_title_'.$poll_id.'">'.$poll_title.'</div>
      <div class="foodle-graph-box">
        <div'.$help_bar_graph_or_show_non_voters.' class="foodle-graph">
          <span class="foodle-fill foodle-fill-'.$poll_id.'" id="foodle_fill_'.$poll_id.'" style="width:0%;"></span>
          <div class="foodle-votes-txt">
            '.$foodle_bar_graph_text_html.'
            <span class="foodle-votes-txt-percent foodle-votes-txt-percent-'.$poll_id.'">'.$foodle_participation_rate_initial.'%</span>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" id="foodle_bar_graph_animate_and_title_auto_remove">
      var $ = jQuery;
      $(document).ready(function() {
        $(".foodle-graph-wrapper-'.$poll_id.'").parents("div#democracy-'.$poll_id.'").find("#foodle_graph_title_'.$poll_id.'").remove();
        setTimeout(function(){ $(".foodle-fill-'.$poll_id.'").foodle_adjust_bar_graph('.$foodle_participation_rate.',"('.$number_of_users_voted.'/'.$number_of_users_concerned.')",'.$number_of_users_concerned.','.$number_of_unexpected_voters.'); }, 50);
      });
    </script>
  ';

	return $output;
});

