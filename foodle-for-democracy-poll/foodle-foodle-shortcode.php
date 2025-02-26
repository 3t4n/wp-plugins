<?php
/*
 * Author: Michael Finkenberger
 * @since V1.0.0.0 (file separation @since V1.5.1.0)
 * Last change in plugin version: V2.5.21.1 (The comments column has now an equal column width and answerlist format has been improved related to comments and in 2.5.21.1., contribution was introduced for the protected spaces in sort lists)
 * Date: 07.11.2024
 * Tested with the latest plugin version
*/

if(!defined('ABSPATH')) die(); // no direct access



// Description: Front end AJAX-Function, displaying the Democracy Poll results from its database interactively.
function foodle_update_hook_ajax_script() {
  $js_url = plugin_dir_url(__FILE__).'js/foodle_update_sort_ajax_file.js';
  wp_register_script( 'foodle_update_ajax_script', $js_url, array('jquery'), FOODLE_VERSION, false );
  wp_enqueue_script( 'foodle_update_ajax_script' );

  wp_localize_script( 'foodle_update_ajax_script', 'foodle_update_ajax_var', array(
    'ajaxurl' => admin_url( 'admin-ajax.php' ),
    'title' => get_the_title()
    )
  );
}
add_action( 'wp_enqueue_scripts', 'foodle_update_hook_ajax_script' ); // for the front end



function foodle_ajax_update_php() {
  global $foodle_undefined_error;

  $out = $foodle_undefined_error;

  if ( isset($_POST["id"]) && isset($_POST["answerlist"]) && isset($_POST["categorysort"]) ) {
    
    $id           = sanitize_text_field($_POST["id"]);            // The foodle's id
    $showdate     = sanitize_text_field($_POST["showdate"]);      // The boolean value string whether to show the participation date (true) or not (false)
    $showcategory = sanitize_text_field($_POST["showcategory"]);  // The boolean value string whether to show the participant's category (true) or not (false)
    $categories   = sanitize_text_field($_POST["categories"]);    // The boolean value string whether to add a count of categorys per foodle answer (true)
    $mlss         = sanitize_text_field($_POST["mlss"]);          // The max number of returns with only one row providing a sum per answer
    $answerlist   = sanitize_text_field($_POST["answerlist"]);    // The boolean value string whether to display doodle-like (false) or as an answerlist (true)
    $categorysort = sanitize_text_field($_POST["categorysort"]);  // The boolean value string whether to sort by categorys (true) or date of entry (false)
    $blocksort    = sanitize_text_field($_POST["blocksort"]);     // The boolean value string whether to change the sorting is blocked (true) or not (false)
    $solo         = sanitize_text_field($_POST["solo"]);          // The boolean value string whether to display less, i.e. just the detailed answers (true)
    $maxcount     = sanitize_text_field($_POST["maxcount"]);      // The maximum number of responses selected in a foodle (0 or 0,y = ignore)
    $comments     = sanitize_text_field($_POST["comments"]);      // The boolean value string whether to display the poll relataed comments (true) or not (false)
    
    $out = do_shortcode("[foodle-democracy-poll-list-log id='".$id."' show_date='".$showdate."' show_category='".$showcategory."' categories='".$categories."' ml_single_sum='".$mlss."' answerlist='".$answerlist."' categorysort='".$categorysort."' blocksort='".$blocksort."' solo='".$solo."' maxcount='".$maxcount."' comments='".$comments."' ajax='true']");
    
  } else { $out = "<div style='color:red;'>".__('Error!<br />Essential parameters for shortcode execution are missing!','foodle-for-democracy-poll')."</div>"; }

  echo $out;
  die();
}
add_action( 'wp_ajax_nopriv_foodle_ajax_update_php', 'foodle_ajax_update_php' );
add_action( 'wp_ajax_foodle_ajax_update_php', 'foodle_ajax_update_php' );



function foodle_democracy_poll_list_log( $atts, $out = "" ) {
  global $wpdb;
  global $foodle_title;
  global $foodle_frontend_tooltips;
  global $foodle_sorting;
  global $foodle_results_text;
  global $foodle_unknown_user;
  global $foodle_email_link_admins;
  global $foodle_email_link_non_admins;
  global $foodle_show_vote_date_admins;
  global $foodle_show_vote_time_admins;
  global $foodle_show_vote_date_specview;
  global $foodle_show_vote_time_specview;
  global $foodle_scroll_up_button_visible;

  if ( ( isset($foodle_scroll_up_button_visible['foodle']) ) && ( $foodle_scroll_up_button_visible['foodle'] ) ) foodle_provide_scroll_up_button();
 
  // check who is visiting
  if ( ! is_user_logged_in() ) return ''; // this shortcode doesn't make sense (and therefore doesn't work) for not logged-in users...

  $atts = array_change_key_case((array)$atts, CASE_LOWER); //normalize attribute keys, lowercase
  $ajax = ( isset ($atts['ajax']) ) ? ( $atts['ajax'] == 'true' ) : false ; // If "true" like shortcode parameter ajax="true" to behave as an ajax returner - default: false
  $dem_id = ( isset ($atts['id']) ) ? $atts['id'] : 0 ; // Poll ID submitted through shortcode like id="x" - default: 0
  $show_date = ( isset ($atts['show_date']) ) ? ( $atts['show_date'] == 'true' ) : false ; // If "true" like shortcode parameter show_date="true" to display the date of individual participation - default: false
  $show_category = ( isset ($atts['show_category']) ) ? ( $atts['show_category'] == 'true' ) : false ; // If "true" like shortcode parameter show_category="true" to display the paricipant's main category - default: false
  $dem_categories = ( isset ($atts['categories']) ) ? ( $atts['categories'] == 'true' ) : false ; // If "true" like shortcode parameter categories="true" to display the number of categories per answer - default: false
  $maxlines_single_summary = ( isset ($atts['ml_single_sum']) ) ? (int)$atts['ml_single_sum'] : 10 ; // Shortcode parameter to display second sum for list longer than... like ml_single_sum="10" - default: 10
  $answerlist = ( isset ($atts['answerlist']) ) ? ( $atts['answerlist'] == 'true' ) : false ; // If "true" like shortcode parameter answerlist="true" to display a list of answers sorted by main category instead of doodle like display - default: false
  $categorysort = ( isset ($atts['categorysort']) ) ? ( $atts['categorysort'] == 'true' ) : false ; // If "true" like shortcode parameter categorysort="true" to sort the answers like *** the VOICES are standing on stage *** - default: false
  $blocksort = ( isset ($atts['blocksort']) ) ? ( $atts['blocksort'] == 'true' ) : false ; // If "true" like shortcode parameter blocksort="true" to define whether changing the sorting is blocked (true) or not (false) - default: false
  $solo = ( isset ($atts['solo']) ) ? ( $atts['solo'] == 'true' ) : false ; // If "true" like shortcode parameter solo="true" to display the very list only - default: false
  $maxcount_raw = ( isset ($atts['maxcount']) ) ? explode(".", $atts['maxcount']) : array(0,0) ; // Shortcode parameter like maxcount="x.y" to mark the maximum number of returns x in an answer y (first come / first serve) to be highlighted; 0 = ignore like "0" or "0.y"; if only one (z) is supplied, it is interpreted as z.1 for the first column - default: 0.0
  $maxcount = (int)$maxcount_raw[0]; // the maximum number allowed...
  $maxcount_answer = (int)$maxcount_raw[1]; // ...in the answer row, starting with one
  if ( $maxcount == 0 ) $maxcount_answer = 0; // just to be sure to avoid any malfuntion
  if ( $maxcount_answer == 0 ) $maxcount = 0; // just to be sure to avoid any malfuntion
  $ajmaxcount = $maxcount.'.'.$maxcount_answer; // the same parameter for an ajax call
  $comments = ( isset ($atts['comments']) ) ? ( $atts['comments'] == 'true' ) : false ; // If "true" like shortcode parameter comments="true" to define whether poll related comments are beingdisplayed (true) or not (false) - default: false

  // determine, whether the function is called from the shortcode or from an ajax call
  if ( ( $ajax ) && ( $maxlines_single_summary != 123456789 ) ) { // coming from AJAX, but not from the email reminder
    $foodle_private_token = $dem_id; // the $foodle_private_token coming from AJAX interaction
    $dem_id = substr($foodle_private_token, 10);
  } else if ( $maxlines_single_summary == 123456789 ) {
    $foodle_private_token = $dem_id; // the $foodle_private_token coming from AJAX interaction is idem $dem_id
    $dem_id = $foodle_private_token;
  } else if ( ! $ajax ) {
    $dem_id = $dem_id; // Poll ID submitted through shortcode like id="x" stays what it is, just to be complete for better understanding
    $foodle_private_token = mt_rand(1000000000, 1999999999).$dem_id; // a new one
  }
  
  // skip everything, if there's not such poll, otherwise, set the main poll parameters
  $poll = $wpdb->get_row("SELECT * FROM $wpdb->democracy_q WHERE id = ".$dem_id);
  if ( ( ! isset($poll) ) && ( ! $ajax ) ) return; // skip only, if it isn't an AJAX call...

  $poll_ende = $poll->end;
  $poll_closed = ( ( $poll->active == 0 ) || ( $poll->open == 0 ) );
  $poll_name = esc_html($poll->question);

  $poll_comments = maybe_unserialize($poll->poll_comments); // if not yet filled
  if ( $poll_comments == "") $poll_comments = array(); // if not yet filled

  // Check whether to display the shortcode for the current user
  $foodle_roles_concerned = maybe_unserialize($poll->roles_concerned); // if not yet filled
  if ( ! is_array($foodle_roles_concerned) ) $foodle_roles_concerned = array(); // if not yet filled
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['roles_show_foodle'][$dem_id]) ) )
    $roles_show_foodle = get_option('foodle_dem_categories')['roles_show_foodle'][$dem_id];
  else
    $roles_show_foodle = true;
  if ( ! ( ( $foodle_roles_concerned == array() ) || ( ! $roles_show_foodle ) || ( ( $roles_show_foodle ) && ( count(array_intersect((array)wp_get_current_user()->roles, $foodle_roles_concerned)) > 0 ) ) ) )
    return; // hide Foodle

  // initialize some variables
  $out = "";
  $out1 = "";
  $out2 = "";
  $out3 = "";
  $outjs = "";
  $outsumo = "";
  $outsumu = "";
  $answer_count = 0;
  $all_answers = array();        // Initialize the answer array in case of answerlist="true"
  $users_voted = 0;
  $participant_count = 0;
  $yes_participants = 0;
  $yes_count = 0;
  $yes_answer_found = false;
  $is_to_be_marked = false;
  $yes_aid = 0;
  $is_in = false;
  $foodle_acc_input = __('acc. input','foodle-for-democracy-poll');
  $answerlines = array(); // Store table rows for later sorting
  $line = -1; // First increase will generate 0 as line index

  $default_category_column = '('.__('No category, yet','foodle-for-democracy-poll').')';
  if ( get_option('foodle_dem_categories') ) {
    if ( ( isset(get_option('foodle_dem_categories')['category_column'][$dem_id]) ) && ( get_option('foodle_dem_categories')['category_column'][$dem_id] != '' ) )
      $foodle_column_category_name = get_option('foodle_dem_categories')['category_column'][$dem_id];
    else
      $foodle_column_category_name = $default_category_column;
    if ( ( isset(get_option('foodle_dem_categories')['sorting_button_text'][$dem_id]) ) && ( get_option('foodle_dem_categories')['sorting_button_text'][$dem_id] != '' ) )
      $foodle_column_sort_title = get_option('foodle_dem_categories')['sorting_button_text'][$dem_id];
    else
      $foodle_column_sort_title = $foodle_sorting;
  } else {
    $foodle_column_category_name = $default_category_column;
    $foodle_column_sort_title = $foodle_sorting;
  }

  // set the global foodle variables for use in Democracy Poll's vote and result screens
  $foodle_user_id = get_current_user_id();
  $foodle_variables = (array)get_user_meta($foodle_user_id, 'foodle_variables', true);                        // for use in Democracy Poll's vote and result screens
  $foodle_variables[$dem_id][$foodle_private_token]["gl_maxlines_single_summary"] = $maxlines_single_summary; // for use in Democracy Poll's vote and result screens
  $foodle_variables[$dem_id][$foodle_private_token]["gl_maxcount"] = $ajmaxcount;                             // for use in Democracy Poll's vote and result screens  
  $ajshow_date = ( $show_date ) ? 'true' : 'false';                                                           // for AJAX call
  $foodle_variables[$dem_id][$foodle_private_token]["gl_ajshow_date"] = $ajshow_date;                         // for use in Democracy Poll's vote and result screens
  $ajshow_category = ( $show_category ) ? 'true' : 'false';                                                   // for AJAX call
  $foodle_variables[$dem_id][$foodle_private_token]["gl_ajshow_category"] = $ajshow_category;                 // for use in Democracy Poll's vote and result screens
  $ajdem_categories = ( $dem_categories ) ? 'true' : 'false';                                                 // for AJAX call
  $foodle_variables[$dem_id][$foodle_private_token]["gl_ajdem_categories"] = $ajdem_categories;               // for use in Democracy Poll's vote and result screens
  $ajanswerlist = ( $answerlist ) ? 'true' : 'false';                                                         // for AJAX call
  $foodle_variables[$dem_id][$foodle_private_token]["gl_ajanswerlist"] = $ajanswerlist;                       // for use in Democracy Poll's vote and result screens
  $ajcategorysortinv = ( $categorysort ) ? 'false' : 'true';                                                  // for AJAX call (do it the other way round)
  $ajcategorysort = ( $categorysort ) ? 'true' : 'false';                                                     // for AJAX call
  $foodle_variables[$dem_id][$foodle_private_token]["gl_ajcategorysort"] = $ajcategorysort;                   // for use in Democracy Poll's vote and result screens
  $ajblocksort = ( $blocksort ) ? 'true' : 'false';                                                           // for AJAX call
  $foodle_variables[$dem_id][$foodle_private_token]["gl_ajblocksort"] = $ajblocksort;                         // for use in Democracy Poll's vote and result screens
  $ajsolo = ( $solo ) ? 'true' : 'false';                                                                     // for AJAX call
  $foodle_variables[$dem_id][$foodle_private_token]["gl_ajsolo"] = $ajsolo;                                   // for use in Democracy Poll's vote and result screens
  $ajcomments = ( $comments ) ? 'true' : 'false';                                                             // for AJAX call
  $foodle_variables[$dem_id][$foodle_private_token]["gl_ajcomments"] = $ajcomments;                           // for use in Democracy Poll's vote and result screens
  if ( ! get_the_ID() === false ) $foodle_variables[$dem_id][$foodle_private_token]["foodle_the_post_id"] = get_the_ID(); // for use in Democracy Poll's vote and result screens
  if ($maxlines_single_summary != '123456789')                                         // don't overwrite if it is the special token, thus coming back for the specialview area refresh
    update_user_meta($foodle_user_id, 'foodle_variables', $foodle_variables);                                 // for use in Democracy Poll's vote and result screens

  if ( $ajax ) $solo = true;                                          // reduce the output for AJAX return

//------------------------------------------------------------------------------------------------------------------------------------------

  $specialview_refresh = false; // for the AJAX refresh of the "specialview"
  if ( $maxlines_single_summary == 123456789 ) $specialview_refresh = true;  // special token to reduce output for the specialview area update
  $is_special_view = false; // determine whether the current user has a special view allowance for the selected viewers' specialview area below

  $foodle_special_functions = array();
  if ( get_option('foodle_special_functions') ) {
    foreach( get_option('foodle_special_functions') as $function_role_or_user => $function_data ) {
      // add only function_roles_or_user with certain properties: $function_data contains 'mark' = is_to_be_marked, 'view' = special_views_allowed, 'no-remind' = is_not_to_be_reminded - here, we need a list of each special function containing 'view'
      if ( in_array('view',$function_data) ) $foodle_special_functions[] = $function_role_or_user;
    }
  }

  $foodle_users_roles = (array)wp_get_current_user()->roles; // these two lines identify special functions for viewing
  $is_special_view = ( ( in_array(get_current_user_id(),$foodle_special_functions) ) || ( count(array_intersect($foodle_special_functions, $foodle_users_roles)) != 0 ) );

//------------------------------------------------------------------------------------------------------------------------------------------

  // Display only for selected viewers
  $confirm_message = __('Shall those reminders really be submitted?','foodle-for-democracy-poll');
  if ( ( ! $solo ) || ( $specialview_refresh ) ) {
    if ( $is_special_view ) {
      if ( ! $specialview_refresh ) {
        $out1 .= "<p class='foodle-table-hidden-top-spacing'></p>";
        $out1 .= "<div class='foodle-line'></div>";
        $out1 .= "<p class='foodle-table-hidden-spacing'></p>";
        $out1 .= "<div class='foodle-reminder-email-area'>";
      }
      if ( isset(get_option('foodle_reminders')[$dem_id]) )
        $poll_reminders = (array)get_option('foodle_reminders')[$dem_id];
      else
        $poll_reminders = array();
      $only_visible_for = __('This information is visible for selected viewers only','foodle-for-democracy-poll');
      if ($poll_ende != 0) {
        if ( ! $poll_closed ) {
          if ( ! $specialview_refresh ) $out1 .= '<div class="mf_foodle_email_response" id="mf_foodle_email_response_'.$dem_id.'"><div class="mf_foodle_email_overlay" id="mf_foodle_email_overlay_'.$dem_id.'"></div><div class="mf_foodle_email_content" id="mf_foodle_email_content_'.$dem_id.'" style="color:#540450;">';  // two opening div
          $out1 .= "<p style='margin-top:0px; margin-bottom:0px; padding:0px;'><div style='font-size:0.84em;'>(".__('This reminder area is only visible for selected viewers','foodle-for-democracy-poll').")</div>";
          $out1 .= "<div style='margin-top:20px; margin-bottom:0px; padding:0px;'><a class='mail-link foodle-button' href='javascript:send_foodle_email(".$dem_id.", \"".$confirm_message."\")'>".__('Reminder for Lazybones &#x1F609;','foodle-for-democracy-poll')."</a></div></p>";
          $out1 .= "<p style='margin-top:20px; margin-bottom:0px; padding:0px;'>".$foodle_title." '".$poll_name."' ".__('will end on','foodle-for-democracy-poll')." ".date_i18n('d. F Y', $poll_ende).".</p>";
        } else {
          $out1 .= "<div style='margin-top:0px; margin-bottom:0px; padding:0px;'><div style='color:#540450;'>"; // two opening div
          $out1 .= "<div style='margin-top:0px; margin-bottom:0px; padding:0px; font-size:0.84em;'>(".$only_visible_for.")</div>";
          $out1 .= "<div style='margin-top:20px; margin-bottom:0px; padding:0px;'>".$foodle_title." '".$poll_name."' ".__('has ended or is currently inactive. Therefore, reminders are inhibited.','foodle-for-democracy-poll')."</div>";
        }
      } else {
        $out1 .= "<p style='margin-top:0px; margin-bottom:0px; padding:0px; color:#540450; font-size:0.84em;'>(".$only_visible_for.")</p>";
        $out1 .= "<p style='margin-top:20px; margin-bottom:0px; padding:0px; color:#540450;'>".$foodle_title." '".$poll_name."' ".__('has no ending date. Therefore, reminders are inhibited.','foodle-for-democracy-poll')."</p>";
      }
      if ( count( $poll_reminders ) == 0 ) {
        $out1 .= " <div style='margin-top:20px; margin-bottom:0px; padding:0px; color:#540450;'>".__('There were no reminders so far.','foodle-for-democracy-poll')."</div>";
      } else {
        $out1 .= " <div style='margin-top:20px; margin-bottom:0px; padding:0px; color:#540450;'>".__('The following reminders were already submitted:','foodle-for-democracy-poll')."</div>";
        $reminder_no = 0;
        foreach($poll_reminders as $poll_reminder) {
          $reminder_no += 1;
          $poll_reminder_detail = explode('/', $poll_reminder);
          $first_name = get_userdata($poll_reminder_detail[1])->display_name;
          $out1 .= "<p style='margin-top:0px; margin-bottom:0px; padding:0px; color:#540450; font-size:0.78em;'>".$reminder_no.".&nbsp;&nbsp;".__('On','foodle-for-democracy-poll')." ".date_i18n('d. F Y', $poll_reminder_detail[0])." ".__('at','foodle-for-democracy-poll')." ".date_i18n('H:i', $poll_reminder_detail[0])." ".__('by','foodle-for-democracy-poll')." ".$first_name.". Total: ".$poll_reminder_detail[2]." ".__('emails','foodle-for-democracy-poll').". OK: ".$poll_reminder_detail[3].", ".__('Error(s)','foodle-for-democracy-poll').": ".$poll_reminder_detail[4].".</p>";
        }
      }
      if ( ( ( ! $specialview_refresh ) && ( $poll_ende != 0 ) && ( ! $poll_closed ) ) || ( ( $poll_ende != 0 ) && ( $poll_closed ) ) ) {
        $out1 .= "</div></div>";  // two closing div
      }
      if ( ! $specialview_refresh ) {
        $out1 .= "</div>";
        $out1 .= "<p class='foodle-table-hidden-spacing'></p>";
        $out1 .= "<div class='foodle-line'></div>";
      }
    }
  }
  // Display only or selected viewers

//------------------------------------------------------------------------------------------------------------------------------------------

  if ( ! $specialview_refresh ) {
    if ( ( ! $ajax ) && ( ! $solo ) ) {
      $out1 .= "<p class='foodle-table-top-spacing'></p>";
      if ( $foodle_results_text != '---' )
        $out1 .= "<div class='foodle-table-headline'><strong>".$foodle_results_text."</strong></div>";
    }

  // AJAX area starts here

    if ( ! $ajax ) $out1 .= '<div class="mf_sw_foodle_sort_response" id="mf_sw_foodle_sort_response_'.$foodle_private_token.'"><div class="mf_sw_foodle_sort_overlay" id="mf_sw_foodle_sort_overlay_'.$foodle_private_token.'"></div><div class="mf_sw_foodle_sort_content" id="mf_sw_foodle_sort_content_'.$foodle_private_token.'">';

    $out1 .= "<figure class='foodle-block-table is-foodle-stripes has-subtle-light-grey-background-color'><table class='foodle-table' id='T".$foodle_private_token."'><tbody>";

    if ( ! $blocksort ) {
      $ajax_call = "javascript:mf_sw_foodle_sort_js(".$foodle_private_token.",".$ajshow_date.",".$ajshow_category.",".$ajdem_categories.",".$maxlines_single_summary.",".$ajanswerlist.",".$ajcategorysortinv.",".$ajblocksort.",".$ajsolo.",".$ajmaxcount.",".$ajcomments.")";
      $buttontext = ($categorysort == "true") ? $foodle_acc_input."&nbsp;>" : $foodle_column_sort_title."&nbsp;>";   // for AJAX call (do it the other way round)
    }
    $switch_sort = ($blocksort == "true") ? "" : "<span style='display:block;' class='foodle-sort-button-gap'></span><a class='ajax-link' style='text-decoration:none;' href='".$ajax_call."'><span class='foodle-sort-button'>".$buttontext."</span></a>"; // allow or disallow change of sorting

    $show_vote_date = ( ( ( current_user_can('manage_options') ) && ( $foodle_show_vote_date_admins ) ) || ( ( $is_special_view ) && ( $foodle_show_vote_date_specview ) ) );
    $show_vote_time = ( ( ( current_user_can('manage_options') ) && ( $foodle_show_vote_time_admins ) ) || ( ( $is_special_view ) && ( $foodle_show_vote_time_specview ) ) );

    $date = __('Date','foodle-for-democracy-poll');
    $datecolumnheader = ( ! $show_date ) ? $date."<br style='mso-data-placement:same-cell;' /><span style='color:#540450; font-weight:normal; font-size:1.0em;'>(".__('hidden','foodle-for-democracy-poll').")</span>" : $date;
    $datecolumn = ( ( $show_date ) || ( $show_vote_date ) ) ? "<th class='foodle-datcol-header'><div class='foodle-vertical'>".$datecolumnheader."</div></th>" : "";
    $categorycolumn = ( $show_category ) ? "<th class='foodle-category-header'>".str_replace('••', '', $foodle_column_category_name)."</th>" : "";
    $out1 .= "<tr><th class='foodle-voters-header'>".__('Participants','foodle-for-democracy-poll');
    if ( $categorysort ) $out1 .= "<br style='mso-data-placement:same-cell;' /><span class='foodle-sort-is'>(".$foodle_column_sort_title.")</span><br style='mso-data-placement:same-cell;' />".$switch_sort."</th>".$datecolumn.$categorycolumn; else $out1 .= "<br style='mso-data-placement:same-cell;' /><span class='foodle-sort-is'>(".$foodle_acc_input.")</span><br style='mso-data-placement:same-cell;' />".$switch_sort."</th>".$datecolumn.$categorycolumn;
  
    $poll = $wpdb->get_row("SELECT * FROM $wpdb->democracy_q WHERE id = ".$dem_id);
    $users_voted = $poll->users_voted;

    $foodle_meta_array = array(); // store the usermeta names of the fieldnames
    $foodle_fieldindex = -1; // Initialize to -1 so that the first loop will see 0 as the first index
    foreach( (array)get_option('foodle_meta_fields') as $foodle_fieldname => $foodle_fielddescription_not_used_here) {
      $foodle_fieldindex += 1;
      $foodle_meta_array[] = foodle_fieldname_to_meta_name($foodle_fieldname);
    }

    $category_count_array_template = foodle_initialize_category_count_array(); // store the template array for the category counts
    $category_count_al_array = $category_count_array_template; // initialize this as the answerline array
    $category_count_per_answer_array = array(); // this will store the category and subcategories count - per answer id

    foreach ($wpdb->get_results("SELECT * FROM $wpdb->democracy_a WHERE qid = ".$dem_id." ORDER BY aorder ASC") as $answers) {
      $answer_count += 1;
      if ( $answer_count == $maxcount_answer ) {  // the answer that carries the participation "yes"
        $yes_participants = (int)$answers->votes;
        $yes_aid = (int)$answers->aid;
        $yes_answer_found = true;
      }
      $aids_order[$answer_count] = $answers->aid;

      $category_count_per_answer_array[$answer_count] = $category_count_array_template; // initialize the array to store the category and subcategories count - per answer id

      $answer_participant_count[$answer_count] = 0;                                     // Initialize partizipant count per answer
      if ( $answerlist ) {
        $all_answers[$answers->aid] = str_replace('••','',esc_html($answers->answer));
      } else {
        $out1 .= "<th class='foodle-answer-header'>".str_replace('••','',esc_html($answers->answer))."</th>";
      }
    }

    $display_none_comments = ( $comments ) ?  "" : "display:none;" ;
    $display_none_comment = ( $comments ) ?  " style='text-align:left;'" : " style='display:none;'" ;

    if ( !$yes_answer_found ) {
      $maxcount = 0;
      $maxcount_answer = 0;
      $foodle_variables = (array)get_user_meta($foodle_user_id, 'foodle_variables', true); // for use in Democracy Poll's vote and result screens
          $foodle_variables[$dem_id][$foodle_private_token]["gl_maxcount"] = "0.0"; // for use in Democracy Poll's vote and result screens
      if ($maxlines_single_summary != '123456789') // don't overwrite if it is the special token, thus coming back for the specialview area refresh
          update_user_meta($foodle_user_id, 'foodle_variables', $foodle_variables); // for use in Democracy Poll's vote and result screens
    }
    if ( $answerlist ) $out1 .= "<th class='foodle-answer-header'>".__('Answer(s)','foodle-for-democracy-poll')."</th>";
    $out1 .= "<th class='foodle-answer-header' style='".$display_none_comments."'>".__('Comments','foodle-for-democracy-poll')."</th></tr>";

    $answer_width_count = ( $comments ) ? $answer_count + 1 : $answer_count ;
    $column_width = ( ( $answerlist ) || ( $answer_count == 0 ) ) ? 100 : intval(100/$answer_width_count);

    $foodle_special_functions = array();
    if ( get_option('foodle_special_functions') ) {
      foreach( get_option('foodle_special_functions') as $function_role_or_user => $function_data ) {
        // add only function_roles_or_user with certain properties: $function_data contains 'mark' = is_to_be_marked, 'view' = special_views_allowed, 'no-remind' = is_not_to_be_reminded - here, we need a list of each special function containing 'mark'
        if ( in_array('mark',$function_data) ) $foodle_special_functions[] = $function_role_or_user;
      }
    }

    $yes_count_function = 0;
    foreach ($wpdb->get_results("SELECT * FROM $wpdb->democracy_log WHERE qid = ".$dem_id." ORDER BY date DESC") as $participation) {
      $foodle_user_id = $participation->userid;

      $foodle_user_info = get_userdata($foodle_user_id);

      if ( $foodle_user_info === false ) {
        $foodle_user_info = (object) [
          'roles' => array(),
          'display_name' => $foodle_unknown_user,
          'user_email' => '',
        ];
      }

      $foodle_users_roles = (array)$foodle_user_info->roles; // these two lines identify special functions for marking
      $is_to_be_marked = ( ( in_array($foodle_user_id,$foodle_special_functions) ) || ( count(array_intersect($foodle_special_functions, $foodle_users_roles)) != 0 ) );

      $answer_numbers = explode(",",$participation->aids);
      if ( ( $is_to_be_marked ) && ( in_array($yes_aid, $answer_numbers) ) ) $yes_count_function += 1;
    }

    if ( ( get_option('foodle_dem_categories') ) && ( ! isset(get_option('foodle_dem_categories')['count_marked_voters'][$dem_id]) ) ) { // just if not yet set since not there from the start
      $foodle_dem_categories = get_option('foodle_dem_categories');
      $foodle_dem_categories['count_marked_voters'][$dem_id] = false;
      update_option('foodle_dem_categories', $foodle_dem_categories, 'yes');
    }

    // Check if marked users are not to be counted anyway (i.e. just for title row: option says to not count marked voters)
    if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['count_marked_voters'][$dem_id]) ) && ( ! get_option('foodle_dem_categories')['count_marked_voters'][$dem_id] ) ) {
      $count_voters = false;
    }
    else {
      $count_voters = true;
    }

    foreach ($wpdb->get_results("SELECT * FROM $wpdb->democracy_log WHERE qid = ".$dem_id." ORDER BY date DESC") as $participation) {
      if ( $show_vote_time )
        $dem_vote_date = date_i18n('d.m.y', strtotime($participation->date))."<br style='mso-data-placement:same-cell;' />".date_i18n('H:i', strtotime($participation->date));
      else
        $dem_vote_date = date_i18n('d.m.y', strtotime($participation->date));
      $foodle_user_id = $participation->userid;
      $foodle_user_info = get_userdata($foodle_user_id);

      if ( $foodle_user_info === false ) {
        $foodle_user_info = (object) [
          'roles' => array(),
          'display_name' => $foodle_unknown_user,
          'user_email' => '',
        ];
      }

      $foodle_users_roles = (array)$foodle_user_info->roles; // these two lines identify special functions for marking
      $is_to_be_marked = ( ( in_array($foodle_user_id,$foodle_special_functions) ) || ( count(array_intersect($foodle_special_functions, $foodle_users_roles)) != 0 ) );

      // Check if the current user in the loop is not to be counted (i.e. voter is marked and option says to not count marked voters)
      if ( ( $is_to_be_marked ) && ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['count_marked_voters'][$dem_id]) ) && ( ! get_option('foodle_dem_categories')['count_marked_voters'][$dem_id] ) ) {
        $count_voter = false;
      }
      else {
        $count_voter = true;
      }

      $email = $foodle_user_info->user_email;
      if ( ( strlen($email) > 0 ) && ( ( ( current_user_can('manage_options') ) && ( $foodle_email_link_admins ) ) || ( (! current_user_can('manage_options') ) && ( $foodle_email_link_non_admins ) ) ) )
        $name = "&nbsp;&nbsp;&nbsp;<a class='mail-link' href='mailto:".$email."'>".str_replace ( " " , "&nbsp;" , $foodle_user_info->display_name )."</a>&nbsp;&nbsp;&nbsp;";
      else
        $name = "&nbsp;&nbsp;&nbsp;".str_replace ( " " , "&nbsp;" , $foodle_user_info->display_name )."&nbsp;&nbsp;&nbsp;";
      $answer_numbers = explode(",",$participation->aids);
      $participant_count += 1;

      $yes_count_function_valid = ( $count_voters ) ? 0 : $yes_count_function;
    
      if ( $answerlist ) $yes_participants = $users_voted;
      $is_in = false;
      if ( in_array($yes_aid, $answer_numbers) ) {
        $yes_count += 1;
        $is_in = ( ($yes_participants - $yes_count_function_valid - $maxcount) < $yes_count ) ? true : false;
      }

      $foodle_user_meta = get_user_meta($foodle_user_id);
      $foodle_main_category_meta = foodle_fieldname_to_meta_name($foodle_column_category_name);
      $main_category_content = ( isset($foodle_user_meta[$foodle_main_category_meta][0]) ) ? $foodle_user_meta[$foodle_main_category_meta][0] : '';
      $main_category_content = ( $main_category_content == '&nbsp;' ) ? '' : $main_category_content; // Necessary due to the sort list change in version 2.5.20.0

                    // Sorting! Up to 1000 (000_ - 999_) sorting keys possible!
                    // Fill the sorting field
                    $foodle_length = strlen($main_category_content);
                    $categoryorder = $main_category_content;
                    if ( get_option('foodle_meta_defaults_sorting') ) {
                      $foodle_meta_list_array = array(' ');
                      if ( isset(get_option('foodle_meta_defaults_sorting')[$foodle_column_category_name]['sortlist']) ) $foodle_meta_list_array = explode('<br>', get_option('foodle_meta_defaults_sorting')[$foodle_column_category_name]['sortlist']);
                      $foodle_item_count = -1; // to get 0 with the first iteration
                      foreach($foodle_meta_list_array as $foodle_meta_list_item) {
                        $foodle_item_count += 1;
                        if ( ( $foodle_meta_list_item != '' ) &&  ( strpos($main_category_content, $foodle_meta_list_item) !== false ) ) {
                          $categoryorder = sprintf("%03d", $foodle_item_count).'_'.$main_category_content;
                          break;
                        }
                      }
                    }
                    if ( $foodle_length == strlen($categoryorder) ) $categoryorder = '9999'.$main_category_content;

      $line += 1;
      $foodle_entry = get_user_meta($foodle_user_id, foodle_fieldname_to_meta_name($foodle_column_category_name), true);
      $foodle_entry = ( $foodle_entry == '&nbsp;' ) ? '' : $foodle_entry; // Not really necessary after the sort list change in version 2.5.20.0 - but implemented for completeness
      $datecolumn = ( ( $show_date ) || ( $show_vote_date ) ) ? "<td><div class='foodle-vertical'>".$dem_vote_date."</div></td>" : "";
      $categorycolumn = ( $show_category ) ? "<td>".str_replace(' ', '&nbsp;', $foodle_entry)."</td>" : "";
      if ( $is_to_be_marked ) {
        if ( ( ( $count_voters ) && ( $maxcount != 0 ) && ( $is_in ) ) || ( ( $count_voters ) && ( $maxcount == 0 ) ) )
          $out = "<tr><td class='foodle-cell-is-marked-in'>".$name."</td>".$datecolumn.$categorycolumn;
        else
          $out = "<tr><td class='foodle-cell-is-marked'>".$name."</td>".$datecolumn.$categorycolumn;
      } else {
        if ( ( $maxcount != 0 ) && ( $is_in ) )
          $out = "<tr><td class='foodle-cell-is-in'>".$name."</td>".$datecolumn.$categorycolumn;
        else
          $out = "<tr><td>".$name."</td>".$datecolumn.$categorycolumn;
      }
      $out2 .= $out;
      if ( $categorysort ) $answerlines[$line] = array($categoryorder, $out);
    
      if ( $answerlist ) {
        if ( $is_to_be_marked ) $out = "<td class='foodle-cell-is-marked'>"; if ( $is_in ) $out = "<td class='foodle-cell-is-in'"; else $out = "<td>";
        $out2 .= $out;
        if ( $categorysort ) $answerlines[$line][1] .= $out;
      }

      for ($i = 1; $i <= $answer_count; $i++) {
        if ( ( in_array($aids_order[$i],$answer_numbers) ) ) {
          if ( ( $maxcount_answer != $i ) || ( ( ( $answerlist ) || ( $maxcount_answer == $i ) ) && ( $is_in ) ) ) {

            $foodle_user_meta = get_user_meta($foodle_user_id);
            foreach( $foodle_user_meta as $foodle_meta_key => $foodle_category ) {
              $foodle_category[0] = ( $foodle_category[0] == '&nbsp;' ) ? '' : $foodle_category[0]; // Necessary due to the sort list change in version 2.5.20.0
              if ( str_replace(' ', '', $foodle_category[0]) != '' ) { // Do not count empty categories, if any
                if ( in_array($foodle_meta_key, $foodle_meta_array) ) { // check whether the usermeta key is part of the Foodle definition)
                  if ( strpos($foodle_meta_key, 'foodle-') === 0 ) // differentiate between Foodle usermeta files and existing usermeta fields
                    $foodle_fieldslug = substr($foodle_meta_key,13);
                  else
                    $foodle_fieldslug = $foodle_meta_key;

                    // Sorting! Up to 1000 (000_ - 999_) sorting keys possible!
                    // Mark the sorting items
                    $foodle_length = strlen($foodle_category[0]);
                    $category_new = $foodle_category[0];
                    if ( ( get_option('foodle_meta_defaults_sorting') ) && ( isset(get_option('foodle_meta_defaults_sorting')[$foodle_meta_key]) ) ) {
                      $foodle_meta_field = get_option('foodle_meta_defaults_sorting')[$foodle_meta_key];
                      $foodle_meta_list_array = array(' ');
                      if ( isset(get_option('foodle_meta_defaults_sorting')[$foodle_meta_field]['sortlist']) ) $foodle_meta_list_array = explode('<br>', get_option('foodle_meta_defaults_sorting')[$foodle_meta_field]['sortlist']);
                      $foodle_item_count = -1; // to get 0 with the first iteration
                      foreach($foodle_meta_list_array as $foodle_meta_list_item) {
                        $foodle_item_count += 1;
                        if ( ( $foodle_meta_list_item != '' ) &&  ( strpos($foodle_category[0], $foodle_meta_list_item) !== false ) ) {
                          $category_new = sprintf("%03d", $foodle_item_count).'_'.$foodle_category[0];
                          break;
                        }
                      }
                    }
                    if ( $foodle_length == strlen($category_new) ) $category_new = '9999'.$foodle_category[0];
                    $foodle_category[0] = $category_new;

                  $category_count_per_answer_array[$i][$foodle_fieldslug][$foodle_category[0]] = ( isset($category_count_per_answer_array[$i][$foodle_fieldslug][$foodle_category[0]]) ) ? $category_count_per_answer_array[$i][$foodle_fieldslug][$foodle_category[0]] + 1 : 1 ; // count the ticks per answer and per category
                  $category_count_al_array[$foodle_fieldslug][$foodle_category[0]] = ( isset($category_count_al_array[$foodle_fieldslug][$foodle_category[0]]) ) ? $category_count_al_array[$foodle_fieldslug][$foodle_category[0]] + 1 : 1 ; // count the ticks per category
                }
              }
            }
          }

          if ( $count_voter ) $answer_participant_count[$i] = ( isset ($answer_participant_count[$i]) ) ? $answer_participant_count[$i] + 1 : 1 ;
          $bg_c_in = "foodle-cell-is-in";
          $bg_c_fun = "foodle-cell-is-marked";
          $bg_c_normal = "";
          if ( $is_to_be_marked ) {
            if ( ( $i == $maxcount_answer ) && ( $is_in ) ) {
              $bg_c = ( $count_voter ) ? $bg_c_in : $bg_c_fun ;
            } else {
              if ( $i == $maxcount_answer ) {
                $bg_c = ( $count_voter ) ?  $bg_c_normal : $bg_c_fun ;
              } else {
                $bg_c_interim = ( $maxcount == 0 ) ? $bg_c_in : $bg_c_normal ; // the right bg_c_normal leads to unmark ticks outside the first-in/first-serve column, if marked users are being counted (next line)
                $bg_c = ( $count_voter ) ?  $bg_c_interim : $bg_c_fun ;
              }
            }
          } else {
            if ( ( $i == $maxcount_answer ) && ( $is_in ) ) {
              $bg_c = $bg_c_in;
            } else {
              if ( $i == $maxcount_answer ) {
                $bg_c = $bg_c_normal;
              } else {
                $bg_c = ( $maxcount == 0 ) ? $bg_c_in : $bg_c_normal; // the right bg_c_normal leads to unmark ticks outside the first-in/first-serve column
              }
            }
          }
          if ( $answerlist ) {
            if ($participant_count % 2 == 0) {
              $out = "<div class='".$bg_c."' style='text-align:left;'>".$all_answers[$aids_order[$i]]."</div>";
              $out2 .= $out;
              if ( $categorysort ) $answerlines[$line][1] .= $out;
            } else {
              $out = "<div class='".$bg_c."' style='text-align:left;'>".$all_answers[$aids_order[$i]]."</div>";
              $out2 .= $out;
              if ( $categorysort ) $answerlines[$line][1] .= $out;
            }
          } else {
            if ($participant_count % 2 == 0) {
              $out = "<td class='".$bg_c."'><div style='hight:0px; line-height:0px; opacity:0%;'>1</div><IMG class='foodle-tick' SRC='".plugin_dir_url(__FILE__)."img/tick_1.png' height='22' width='22'></td>";
              $out2 .= $out;
              if ( $categorysort ) $answerlines[$line][1] .= $out;
            } else {
              $out = "<td class='".$bg_c."'><div style='hight:0px; line-height:0px; opacity:0%;'>1</div><IMG class='foodle-tick'  SRC='".plugin_dir_url(__FILE__)."img/tick_1.png' height='22' width='22'></td>";
              $out2 .= $out;
              if ( $categorysort ) $answerlines[$line][1] .= $out;
            }
          }
        } else {
          if ( ! $answerlist ) {
            $out = "<td></td>";
            $out2 .= $out;
            if ( $categorysort ) $answerlines[$line][1] .= $out;
          }
        }
      }

      $category_count_per_answer_array = foodle_array_sort_answer($category_count_per_answer_array); // Sort the array
      $category_count_al_array = foodle_array_sort_al($category_count_al_array); // Sort the array

      if ( $answerlist ) {
        $out = "</td>";
        $out2 .= $out;
        if ( $categorysort ) $answerlines[$line][1] .= $out;
      }

      $foodle_voter_comments = array();
      foreach( $poll_comments as $poll_comment ) {
        if ( $poll_comment[0] == $foodle_user_id ) $foodle_voter_comments[] = $poll_comment[3];
      }
      $foodle_voter_comments = preg_replace('/\<br(\s*)?\/?\>/i', "<br style='mso-data-placement:same-cell;' />", implode('<br><br>', $foodle_voter_comments ));

      $out = "<td".$display_none_comment.">".$foodle_voter_comments."</td></tr>";
      $out2 .= $out;
      if ( $categorysort ) $answerlines[$line][1] .= $out;
    }
    if ( $categorysort ) {
      array_multisort(array_column($answerlines, 0), SORT_ASC, SORT_NUMERIC, $answerlines);
      $out2 = "";
      foreach ( $answerlines as $answerline ) {
        $out2 .= $answerline[1];
      }
    }

    if ( $answerlist )  {
      $answer_count = 1;
      if ( ! $maxcount == 0 ) $maxcount_answer = 1;
    }

    $col_span = ( ( $show_date ) || ( $show_vote_date ) ) ? "3" : "2";
    $col_span = ( $categorycolumn ) ? $col_span : $col_span - 1 ;
    $col_span_u = ( ( ! $dem_categories ) && ( $answerlist ) ) ? $col_span + 1 : $col_span ;

    // Check if marked users are not to be counted (i.e. jast for title row: option says to not count marked voters)
    if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['count_marked_voters'][$dem_id]) ) && ( ! get_option('foodle_dem_categories')['count_marked_voters'][$dem_id] ) ) {
      $count_voters = false;
    }
    else {
      $count_voters = true;
    }

    $accepted = "<br style='mso-data-placement:same-cell;' />".__('accepted','foodle-for-democracy-poll')." =<br style='mso-data-placement:same-cell;' /><span class='foodle-cell-is-in' style='display:block; margin:0px; padding:4px; border:2px solid lightgrey;'><img class='foodle-tick' style='margin:0px; padding:0px;' src='".plugin_dir_url(__FILE__)."img/tick_1.png' height='16' width='16'></span>";

    if ($maxcount != 0 ) // the definition in these 4 lines will remain valid only if ( $answerlist )
      $max_p = "<span style='font-size:1em; margin-left:auto; margin-right:auto'><strong>max.&nbsp;".$maxcount.$accepted."</strong></span>";
    else
      $max_p = "";

    $max_p_normal = "<br style='mso-data-placement:same-cell;' /><span style='margin:0px; padding:0px; font-size: 0.7em'>max. ".$maxcount.$accepted."</span>";

    $participated = __('participated','foodle-for-democracy-poll');

    $count_text = '';
    if ( ! $answerlist ) {
      $count_text = '<br style="mso-data-placement:same-cell;" /><span style="font-size:0.85em;">';
      $count_text .= '(';
      $count_text .= ( $count_voters ) ? ''.__('Righthand column sums <u>in</u>clude marked voters','foodle-for-democracy-poll') : __('Righthand column sums <u>exclude</u> marked voters','foodle-for-democracy-poll') ;
      $count_text .= ')';
      $count_text .= '</span>';
    }

    $outsumo .= "<tr>";
    $outsumo .= "<td class='foodle-info-rows' colspan='".$col_span."'><strong>".$participated.":&nbsp;&nbsp;".$participant_count."</strong>".$count_text."</td>";
    if ( $answerlist ) {
      if ( ( $maxcount != 0 ) && ( 1 == $maxcount_answer ) ) $bg_c = 'foodle-info-rows'; else $bg_c='foodle-info-rows'; // former first: foodle-cell-is-in
      $outsumo .= "<td class='".$bg_c."'>".$max_p."</td>";
    } else {
      for ($i = 1; $i <= $answer_count; $i++) {
        if ( ( $maxcount != 0 ) && ( $i == $maxcount_answer ) ) {
          $max_p = $max_p_normal;
          $bg_c = "foodle-info-rows"; // former: foodle-cell-is-in
        } else {
          $max_p = "";
          $bg_c = "foodle-info-rows";
        }
        $outsumo .= "<td class='".$bg_c."' style='width:".$column_width."%;'><div style='font-size:1.5em;'><strong>".$answer_participant_count[$i].$max_p."</strong></div></td>";
      }
    }
    $outsumo .= "<td class='".$bg_c."' style='width:".$column_width."%;".$display_none_comments."'></td></tr>";

    $outsumu .= "<tr>";
    $outsumu .= "<td class='foodle-info-rows' rowspan='2' colspan='".$col_span_u."'><strong>".$participated.":&nbsp;&nbsp;".$participant_count."</strong>".$count_text."</td>";
    if ( $answerlist ) {
      if ( $max_p != '' ) $outsumu .= "<td class='foodle-info-rows'>".$max_p."</td>"; // former: foodle-cell-is-in
    } else {
      for ($i = 1; $i <= $answer_count; $i++) {
        if ( ( $maxcount != 0 ) && ( $i == $maxcount_answer ) ) {
          $max_p = $max_p_normal;
          $bg_c = "foodle-info-rows"; // former: foodle-cell-is-in
        } else {
          $max_p = "";
          $bg_c = "foodle-info-rows";
        }
        $outsumu .= "<td class='".$bg_c."'><div style='font-size:1.5em;'><strong>".$answer_participant_count[$i].$max_p."</strong></div></td>";
      }
    }
    $outsumu .= "<td class='".$bg_c."' style='".$display_none_comments."'></td></tr>";

    if ( $dem_categories ) {
      if ( $participant_count > $maxlines_single_summary ) {
        $out3 .= "<tr>";
      } else {
        $out3 .= "<tr><td class='foodle-info-rows' colspan='".$col_span."'></td>";
      }
      for ($i = 1; $i <= $answer_count; $i++) {
        if ( ($maxcount != 0 ) && ( $i == $maxcount_answer ) ) $bg_c = "foodle-category-cells"; else $bg_c = "foodle-category-cells"; // former first foodle-category-cell-maxcount-answer
        $out3 .= "<td class='".$bg_c."'>";
        $out3 .= '<div class="category-inner-div">';

        if ( $answerlist ) {
          $foodle_fieldindex = -1; // Initialize to -1 so that the first loop will see 0 as the first index
          foreach( get_option('foodle_meta_fields') as $foodle_fieldname => $foodle_fielddescription_not_used_here ) {
            if ( ( ! isset(get_option('foodle_dem_categories')[$dem_id]) ) || ( ! in_array($foodle_fieldname, (array)get_option('foodle_dem_categories')[$dem_id] ) ) ) continue; // skip if not to be used as foodle category
            $foodle_fieldindex += 1; // just index the fields (0 = main-category, 1-... = sub-categories)
            $foodle_meta = foodle_fieldname_to_meta_name($foodle_fieldname);
            if ( strpos($foodle_fieldname, '••') !== 0 ) // differentiate between Foodle usermeta files and existing usermeta fields
              $foodle_fieldslug = substr($foodle_meta,13);
            else
              $foodle_fieldslug = $foodle_meta;
              if ( $foodle_fieldindex > 0 ) $out3 .='<br style="mso-data-placement:same-cell;" />';
            $out3 .= '<span class="inner-div-fieldname">'.str_replace('••','', str_replace(' ', '&nbsp;', $foodle_fieldname)).'</span><br style="mso-data-placement:same-cell;" />';
            foreach( (array)$category_count_al_array[$foodle_fieldslug] as $foodle_category => $foodle_value ) {
              $out3 .= '<span class="inner-div-category">'.substr(str_replace(' ', '&nbsp;', $foodle_category),4).':&nbsp;&nbsp;&nbsp;'.$foodle_value.'</span><br style="mso-data-placement:same-cell;" />'; // remove the first 4 digits (sorting digits)
            }
          }
        } else {
          $foodle_fieldindex = -1; // Initialize to -1 so that the first loop will see 0 as the first index
          foreach( get_option('foodle_meta_fields') as $foodle_fieldname => $foodle_fielddescription_not_used_here ) {
            if ( ( ! isset(get_option('foodle_dem_categories')[$dem_id]) ) || ( ! in_array($foodle_fieldname, (array)get_option('foodle_dem_categories')[$dem_id] ) ) ) continue; // skip if not to be used as foodle category
            $foodle_fieldindex += 1; // just index the fields (0 = main-category, 1-... = sub-categories)
            $foodle_meta = foodle_fieldname_to_meta_name($foodle_fieldname);
            if ( strpos($foodle_fieldname, '••') !== 0 ) // differentiate between Foodle usermeta files and existing usermeta fields
              $foodle_fieldslug = substr($foodle_meta,13);
            else
              $foodle_fieldslug = $foodle_meta;
            if ( $foodle_fieldindex > 0 ) $out3 .='<br style="mso-data-placement:same-cell;" />';
            $out3 .= '<span class="inner-div-fieldname">'.str_replace('••','', str_replace(' ', '&nbsp;', $foodle_fieldname)).'</span><br style="mso-data-placement:same-cell;" />';
            if ( ! isset($category_count_per_answer_array[$i][$foodle_fieldslug]) ) $category_count_per_answer_array[$i][$foodle_fieldslug] = array(); // to avoid a warning if selected for a poll but not yet used
            foreach( (array)$category_count_per_answer_array[$i][$foodle_fieldslug] as $foodle_category => $foodle_value ) {
              $out3 .= '<span class="inner-div-category">'.substr(str_replace(' ', '&nbsp;', $foodle_category),4).':&nbsp;&nbsp;&nbsp;'.$foodle_value.'</span><br style="mso-data-placement:same-cell;" />'; // remove the first 4 digits (sorting digits)
            }
          }
        }
        $out3 .= '</div>';
        $out3 .= '</td>';
      }
      $out3 .= "<td class='".$bg_c."' style='".$display_none_comments."'></td></tr>";
    }
    $out3 .= '</tbody></table>';
    $foodle_download_help = ( $foodle_frontend_tooltips ) ? ' foodle_tooltip="'.sprintf(__('Download the %s table to Excel format, incl. comments (Beta2).<br>Excel will probably complain for format issues.<br>Just hit &lt; OK &gt; for loading into Excel anyway!','foodle-for-democracy-poll'),$foodle_title).'"' : '';
    $out3 .= '<label '.$foodle_download_help.'><input type="submit" onclick="return foodle_table2excel_'.$foodle_private_token.'();" class="foodle-download-button" value="'.__('Download table to XLS-format','foodle-for-democracy-poll').' (Beta2)"/></label>';
    $out3 .= '<figcaption><div class="foodle-figcaption" style="font-size:9pt; color:#888888; font-weight:normal;">('.__('Hint for small screens: horizontal scrolling may be available through trackpad use, screen wiping or arrow keys','foodle-for-democracy-poll').')</div></figcaption>';
    $out3 .= '</figure>';
    $out3 .= '</div></div>';
    $out3 .= '
    <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.2/dist/jquery.table2excel.min.js"></script>
      <script id="foodle_table2excel" type="text/javascript">
        function foodle_table2excel_'.$foodle_private_token.'() {
          var $ = jQuery;
          $("#T'.$foodle_private_token.'").table2excel({
            name: "Poll-Result",
            filename: "'.$foodle_title.'-'.__('Table','foodle-for-democracy-poll').'.xls",
            preserveColors: true
          });
        }
      </script>
    ';
    if ( ! $ajax ) $out3 .= "<p class='foodle-table-bottom-spacing'></p>";
    if ( $participant_count > $maxlines_single_summary ) {
      $out = $out = $out1.$outsumo.$out2.$outsumu.$out3;
    } else {
      $out = $out = $out1.$outsumo.$out2.$out3;
    }
  } else $out = $out1;

  return $out;

  // AJAX area ends here

}
function foodle_init_foodle_democracy_poll_list_log_shortcode() {
  add_shortcode('foodle-democracy-poll-list-log', 'foodle_democracy_poll_list_log');
}
add_action('wp_loaded', 'foodle_init_foodle_democracy_poll_list_log_shortcode');



function foodle_initialize_category_count_array() {
  $users = get_users(array(
    'orderby'  => 'meta_value',
    'meta_key' => 'last_name', // just a habit ;-)
    'order'    => 'ASC'
  ));
  $category_count_array_temp = array();
  $category_count_array = array();
  $foodle_fieldindex = -1; // Initialize to -1 so that the first loop will see 0 as the first index
  foreach( (array)get_option('foodle_meta_fields') as $foodle_fieldname => $foodle_fielddescription_not_used_here) {
    $foodle_fieldindex += 1;
    $foodle_user_meta_key = foodle_fieldname_to_meta_name($foodle_fieldname);
    foreach ( $users as $user ) {
      $foodle_user_id = $user->ID;
      $foodle_category = get_user_meta( $foodle_user_id, $foodle_user_meta_key, true);
      $foodle_category = ( $foodle_category == '&nbsp;' ) ? '' : $foodle_category; // Necessary due to the sort list change in version 2.5.20.0
      if ( str_replace(' ', '', $foodle_category) != '' ) { // Do not count empty categories, if any
        if ( strpos($foodle_user_meta_key, 'foodle-') === 0 ) // differentiate between Foodle usermeta files and existing usermeta fields
          $foodle_fieldslug = substr($foodle_user_meta_key,13);
        else
          $foodle_fieldslug = $foodle_user_meta_key;

                    // Sorting! Up to 1000 (000_ - 999_) sorting keys possible!
                    // Mark the sorting items
                    $foodle_length = strlen($foodle_category);
                    $category_new = $foodle_category;
                    if ( get_option('foodle_meta_defaults_sorting') ) {
                      $foodle_meta_list_array = array(' ');
                      if ( isset(get_option('foodle_meta_defaults_sorting')[$foodle_fieldname]['sortlist']) ) $foodle_meta_list_array = explode('<br>', get_option('foodle_meta_defaults_sorting')[$foodle_fieldname]['sortlist']);
                      $foodle_item_count = -1; // to get 0 with the first iteration
                      foreach($foodle_meta_list_array as $foodle_meta_list_item) {
                        $foodle_item_count += 1;
                        if ( ( $foodle_meta_list_item != '' ) && ( strpos($foodle_category, $foodle_meta_list_item) !== false ) ) {
                          $category_new = sprintf("%03d", $foodle_item_count).'_'.$foodle_category;
                          break;
                        }
                      }
                    }
                    if ( $foodle_length == strlen($category_new) ) $category_new = '9999'.$foodle_category;
                    $foodle_category = $category_new;

                    $category_count_array[$foodle_fieldslug][$foodle_category] = 0;
      }
    }
  }
  return $category_count_array;
}



function foodle_array_sort_answer($category_count_per_answer_array_old) {
  $category_count_per_answer_array = array();
  foreach((array)$category_count_per_answer_array_old as $answer => $category_count_array) { // reduce one level
    $category_count_per_answer_array[$answer] = foodle_array_sort_al($category_count_array); // apply the sort and add the level again
  }
  return $category_count_per_answer_array;
}



function foodle_array_sort_al($category_count_al_array_old) {
  $category_count_al_array = array();
  foreach((array)$category_count_al_array_old as $top_category => $categories) {
    ksort($categories);
    foreach ($categories as $category => $value) {
      $category_count_al_array[$top_category][$category] = $value;
    }
  }
  return $category_count_al_array;
}


