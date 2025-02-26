<?php
/*
 * Author: Michael Finkenberger
 * @since V2.3.0.0
 * Last change in plugin version: V2.5.15.0 (Upon show_just_mine="true" in shortcode [foodle-comments], comments of pending voters will be displayed alongside own and admin comments.)
 * Date: 10.06.2024
 * Tested with the latest plugin version
*/

if(!defined('ABSPATH')) die(); // no direct access



function foodle_esc_attr( $foodle_string ) {
  return str_replace('\\','.',str_replace('&lt;br&gt;','<br>',esc_attr(str_replace("&#39;","´",str_replace("&#039;","´",$foodle_string)))));
}



// Description: AJAX-Function, displaying the comments of a poll interactively.
function foodle_comments_hook_ajax_script() {
  $js_url = plugin_dir_url(__FILE__).'js/foodle_comments_ajax_file.js';
  wp_register_script( 'foodle_comments_ajax_script', $js_url, array('jquery'), FOODLE_VERSION, false );
  wp_enqueue_script( 'foodle_comments_ajax_script' );

  wp_localize_script( 'foodle_comments_ajax_script', 'foodle_comments_ajax_var', array(
    'ajaxurl' => admin_url( 'admin-ajax.php' ),
    'message' => __('Waiting for the comments<br>regarding Democracy id ','foodle-for-democracy-poll')
    )
  );
}
add_action( 'wp_enqueue_scripts', 'foodle_comments_hook_ajax_script' ); // for front end...
add_action( 'admin_enqueue_scripts', 'foodle_comments_hook_ajax_script' ); // ...and back end



// Copy the related comments to the calling tooltip
function foodle_copy_comments_to_tooltip_php() {
  global $foodle_undefined_error;

  $out = $foodle_undefined_error;

  if ( isset($_POST["foodle_id"]) && isset($_POST["comments_active"]) && isset($_POST["show_comments"]) && isset($_POST["show_date"]) && isset($_POST["show_time"]) && isset($_POST["edit_comments"]) && isset($_POST["delete_comments"]) ) {
    $id              = sanitize_text_field($_POST["foodle_id"]);       // The Democracy id
    $comments_active = sanitize_text_field($_POST["comments_active"]); // The boolean value string whether comments can be entered (true) or not (false)
    $show_comments   = sanitize_text_field($_POST["show_comments"]);   // The boolean value string whether comments shall be visible (true) or not (false)
    $show_date       = sanitize_text_field($_POST["show_date"]);       // The boolean value string whether to show the comments' date (true) or not (false)
    $show_time       = sanitize_text_field($_POST["show_time"]);       // The boolean value string whether to show the comments' time (true) or not (false)
    $show_just_mine  = sanitize_text_field($_POST["show_just_mine"]);  // The boolean value string whether to show only the user's own comments (true) or not (false)
    $edit_comments   = sanitize_text_field($_POST["edit_comments"]);   // The boolean value string whether comments can be edited (true) or not (false)
    $delete_comments = sanitize_text_field($_POST["delete_comments"]); // The boolean value string whether comments can be deleted (true) or not (false)
    
    $out = do_shortcode("[foodle-comments id='".$id."' comments_active='".$comments_active."' show_comments='".$show_comments."' show_date='".$show_date."' show_time='".$show_time."' show_just_mine='".$show_just_mine."' edit_comments='".$edit_comments."' delete_comments='".$delete_comments."' ajax='true']");
    
  } else { $out = "<div style='color:red;'>".__('Error!<br />Essential parameters for shortcode execution are missing!','foodle-for-democracy-poll')."</div>"; }

  echo $out;
  die();
}
add_action( 'wp_ajax_nopriv_foodle_copy_comments_to_tooltip', 'foodle_copy_comments_to_tooltip_php' );
add_action( 'wp_ajax_foodle_copy_comments_to_tooltip', 'foodle_copy_comments_to_tooltip_php' );



function foodle_send_comment_email($poll_id, $poll_title, $foodle_poll_comment_text = '', $new_or_updated = true) {
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['send_comment_email'][$poll_id]) ) )
    $foodle_send_comment_email = ( get_option('foodle_dem_categories')['send_comment_email'][$poll_id] );
  else
    $foodle_send_comment_email = false;
  if ( ! $foodle_send_comment_email ) return;

  if ( $new_or_updated )
    $message = sprintf(__('Dear administrator,<br><br>on your site %s, the following new or updated comment for \'%s\' was submitted by %s','foodle-for-democracy-poll'), '<a href="'.get_option('siteurl').'">'.get_option('blogname').'</a>', '<a href="'.get_option('siteurl').'/wp-admin/options-general.php?page=democracy-poll&edit_poll='.$poll_id.'">'.$poll_title.'</a>', '<a href=mailto:"'.wp_get_current_user()->user_email.'">'.wp_get_current_user()->user_login.'</a>').':<br><br>'.$foodle_poll_comment_text.'<br><br>'.__('Kind regards','foodle-for-democracy-poll').'<br>'.get_option('admin_email');
  else
    $message = sprintf(__('Dear administrator,<br><br>on your site %s, a comment for \'%s\' was deleted by %s','foodle-for-democracy-poll'), '<a href="'.get_option('siteurl').'">'.get_option('blogname').'</a>', '<a href="'.get_option('siteurl').'/wp-admin/options-general.php?page=democracy-poll&edit_poll='.$poll_id.'">'.$poll_title.'</a>', '<a href=mailto:"'.wp_get_current_user()->user_email.'">'.wp_get_current_user()->user_login.'</a>').'.<br><br>'.__('Kind regards','foodle-for-democracy-poll').'<br>'.get_option('admin_email');

  add_filter( 'wp_mail_from_name', function( $adminname ) { return explode('@', get_option('admin_email'))[0]; }, 10 );
  add_filter( 'wp_mail_from', function( $email ) {return get_option('admin_email');}, 10 );
  add_filter( 'wp_mail_content_type','foodle_set_html_mail_content_type', 10 );
  $mail_sent = wp_mail( get_option('admin_email'), $poll_title.' - '.__('Comment','foodle-for-democracy-poll').' ('.get_option('blogname').') ', $message );

  // Remove all those filters while not needed to avoid any conflict with other plugins or themes...
  remove_filter( 'wp_mail_from_name', function( $adminname ) {return explode('@', get_option('admin_email'))[0];}, 10 );
  remove_filter( 'wp_mail_from', function( $email ) {return get_option('admin_email');}, 10 );
  remove_filter( 'wp_mail_content_type','foodle_set_html_mail_content_type', 10 );
}



add_shortcode('foodle-comments',function($attr, $content){
  global $wpdb;
  global $foodle_title;
  global $foodle_frontend_tooltips;
  global $foodle_scroll_up_button_visible;

  if ( ( isset($foodle_scroll_up_button_visible['comments']) ) && ( $foodle_scroll_up_button_visible['comments'] ) ) foodle_provide_scroll_up_button();
 
  // Not logged in or Foodle id is missing
  if ( ( ! is_user_logged_in() ) || ( ! isset($attr["id"]) ) ) return;

  $poll_id = $attr["id"];

  // Define some basic variables related to the democracy database (quit if poll does not exist)
  $sql = "SELECT * FROM $wpdb->democracy_q WHERE id={$poll_id}";
  $get_foodle_poll = $wpdb->get_row($sql);
  if ( ! isset($get_foodle_poll) ) return; // no such poll id
  $poll_title = esc_html($get_foodle_poll->question);
  $foodle_poll_comments = maybe_unserialize($get_foodle_poll->poll_comments); // if not yet filled
  if ( ! is_array($foodle_poll_comments) ) $foodle_poll_comments = array(); // if not yet filled
  $foodle_roles_concerned = maybe_unserialize($get_foodle_poll->roles_concerned); // if not yet filled
  if ( ! is_array($foodle_roles_concerned) ) $foodle_roles_concerned = array(); // if not yet filled

  // Check whether to display the shortcode for the current user
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['roles_show_comments'][$poll_id]) ) )
    $roles_show_comments = get_option('foodle_dem_categories')['roles_show_comments'][$poll_id];
  else
    $roles_show_comments = true;
  if ( ! ( ( $foodle_roles_concerned == array() ) || ( ! $roles_show_comments ) || ( ( $roles_show_comments ) && ( count(array_intersect((array)wp_get_current_user()->roles, $foodle_roles_concerned)) > 0 ) ) ) )
    return; // hide comments

  // Check whether to display the new comments textarea
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['roles_do_comments'][$poll_id]) ) )
    $roles_allow_new_comments = get_option('foodle_dem_categories')['roles_do_comments'][$poll_id];
  else
    $roles_allow_new_comments = false; // for backward compatibility
  if ( ! ( ( $foodle_roles_concerned == array() ) || ( ! $roles_allow_new_comments ) || ( ( $roles_allow_new_comments ) && ( count(array_intersect((array)wp_get_current_user()->roles, $foodle_roles_concerned)) > 0 ) ) ) )
    $allow_new_comments = false;
  else
    $allow_new_comments = true;

  // Define some basic variables related to the other shortcode parameters
  $comments_active = true; // default = true
  if ( isset($attr["comments_active"]) ) $comments_active = ( $attr["comments_active"] === "true" ) ? true : false;
  $show_comments = true; // default = true
  if ( isset($attr["show_comments"]) ) $show_comments = ( $attr["show_comments"] === "true" ) ? true : false;
  $show_date = false; // default = false
  if ( isset($attr["show_date"]) ) $show_date = ( $attr["show_date"] === "true" ) ? true : false;
  $show_time = false; // default = false
  if ( isset($attr["show_time"]) ) $show_time = ( ( $show_date ) && ( $attr["show_time"] === "true" ) ) ? true : false;
  $show_just_mine = false; // default = false
  if ( isset($attr["show_just_mine"]) ) $show_just_mine = ( $attr["show_just_mine"] === "true" ) ? true : false; //ERROR!!!
  $edit_comments = false; // default = false
  if ( isset($attr["edit_comments"]) ) $edit_comments = ( $attr["edit_comments"] === "true" ) ? true : false;
  $delete_comments = false; // default = false
  if ( isset($attr["delete_comments"]) ) $delete_comments = ( $attr["delete_comments"] === "true" ) ? true : false;

  /* Get the input if a new comment was submitted */
  $foodle_comment_new_or_changed = false;
  if ( ( isset($_POST['save_poll_comment_'.$poll_id]) ) && ( isset($_POST['foodle_poll_new_comment_text_'.$poll_id]) ) ) {
    $foodle_poll_comment_text = nl2br($_POST['foodle_poll_new_comment_text_'.$poll_id],false);
    $foodle_poll_comment_text = foodle_esc_attr(html_entity_decode(sanitize_text_field(htmlentities(stripslashes(str_replace('<br><br>','<br>',preg_replace('#\r|\n#','',$foodle_poll_comment_text)))))));
    if ( $foodle_poll_comment_text != '' )
      if ( ( isset($_POST['comment_edit_no_'.$poll_id]) ) && ( $_POST['comment_edit_no_'.$poll_id] !== "" ) ) {
        if ( foodle_esc_attr($foodle_poll_comments[$_POST['comment_edit_no_'.$poll_id]][3]) !== $foodle_poll_comment_text ) {
          $foodle_poll_comments[$_POST['comment_edit_no_'.$poll_id]] = array(get_current_user_id(),wp_date('j.n.y'),wp_date('G:i'),$foodle_poll_comment_text,true);
          $foodle_comment_new_or_changed = true;
        }
      }
      else {
        $foodle_poll_comments[] = array(get_current_user_id(),wp_date('j.n.y'),wp_date('G:i'),$foodle_poll_comment_text,false);
        $foodle_comment_new_or_changed = true;
      }
    $foodle_poll_comments_serialized = serialize($foodle_poll_comments);
    $sql = "UPDATE $wpdb->democracy_q SET poll_comments='{$foodle_poll_comments_serialized}' WHERE id={$poll_id}";
    $wpdb->query($sql);
    unset($_POST['save_poll_comment_'.$poll_id]); // prohibit a second reaction
    if ( $foodle_comment_new_or_changed ) foodle_send_comment_email($poll_id, $poll_title, $foodle_poll_comment_text, true); // notify the admin if applicable for this poll, new/changed = true
  } /* */

  /* Get the input if a comment was deleted */
  if ( ( isset($_POST['foodle_delete_comment_'.$poll_id]) ) && ( isset($_POST['foodle_delete_row_'.$poll_id]) ) ) {
    $foodle_delete_row = $_POST['foodle_delete_comment_'.$poll_id];
    $foodle_poll_comments[$foodle_delete_row][3] = '- - -';
    $foodle_poll_comments[$foodle_delete_row][4] = false;
    $foodle_poll_comments_serialized = serialize($foodle_poll_comments);
    $sql = "UPDATE $wpdb->democracy_q SET poll_comments='{$foodle_poll_comments_serialized}' WHERE id={$poll_id}";
    $wpdb->query($sql);
    unset($_POST['foodle_delete_comment_'.$poll_id]); // prohibit a second reaction
    foodle_send_comment_email($poll_id, $poll_title, $foodle_poll_comment_text, false); // notify the admin if applicable for this poll, new/changed = false
  } /* */

  /* Get the input if all comments were deleted */
  if ( isset($_POST['foodle_delete_all_comments_'.$poll_id]) ) {
    $foodle_poll_comments = array();
    $sql = "UPDATE $wpdb->democracy_q SET poll_comments='' WHERE id={$poll_id}";
    $wpdb->query($sql);
    unset($_POST['foodle_delete_all_comments_'.$poll_id]); // prohibit a second reaction
  }

  /* Generate an array with the IDs of all that voted already */
  $sql = "SELECT userid FROM $wpdb->democracy_log WHERE qid={$poll_id}";
  $list_of_user_ids_voted = $wpdb->get_col($sql);

  // Reduce the display of comments to own & admin comments if the related parameter is set
  $foodle_poll_comments_own = $foodle_poll_comments;
  if ( $show_just_mine ) {
    $foodle_poll_comments_own = array();
    $current_user_id = get_current_user_id();
    foreach ( $foodle_poll_comments as $foodle_poll_comment ) {
      if ( ( $foodle_poll_comment[0] == $current_user_id ) || ( user_can($foodle_poll_comment[0],'manage_options') ) || ( ! in_array($foodle_poll_comment[0], $list_of_user_ids_voted) ) ) $foodle_poll_comments_own[] = $foodle_poll_comment[0];
    }
  }

  $output = "";

  if ( ( $show_comments ) && ( $comments_active ) ) $output .= '<div class="foodle-comments-complete">';

  if ( $show_comments ) {
    if ( count($foodle_poll_comments_own) == 0 ) {
      $output .= ( $show_just_mine ) ? __('So far no own, pending voters\' and/or admin comments','foodle-for-democracy-poll') : __('So far no comments','foodle-for-democracy-poll');
      $output .= '<span class="foodle-no-comments-detailed-message-'.$poll_id.'" id="foodle_no_comments_detailed_message_'.$poll_id.'"> '.__('for','foodle-for-democracy-poll').' \''.$poll_title.'\'</span>!';
    } else {
      $help_edit_comment = ( $foodle_frontend_tooltips ) ? " foodle_tooltip='".__('Edit this comment.<br>The comment background color and<br>date will change to indicate this.','foodle-for-democracy-poll')."'" : "";
      $help_delete_comment = ( $foodle_frontend_tooltips ) ? " foodle_tooltip='".__('Delete this comment.<br>However, a related note will remain visible.','foodle-for-democracy-poll')."'" : "";
      $help_delete_all_comments = ( $foodle_frontend_tooltips ) ? " foodle_tooltip='".__('Administrator function:<br>Delete all comments for this poll.<br>Warning: this will be irreversible!','foodle-for-democracy-poll')."'" : "";
      $output .= "<figure class='foodle-comments-table-figure'><table class='foodle-comments-table foodle-comments-table-".$poll_id."' id='foodle_comments_table_".$poll_id."'>";
      $colspan = ( $show_date ) ? 3 : 2;
      $colspan = ( ( $edit_comments ) || ( $delete_comments ) ) ? $colspan + 1 : $colspan;
      $output .= "<thead><tr class='foodle-comments-table-headline' id='foodle_comments_table_headline_".$poll_id."'><th style='font-size:14px;' colspan='".$colspan."'>".$foodle_title.": '".$poll_title."'</th></tr>";
      $output .= "<tr class='foodle-comments-table-headline-columns'><th class='foodle-comments-user' style='text-align:center;'>".__('User','foodle-for-democracy-poll')."</th>";
      if ( $show_date ) $output .= "<th class='foodle-comments-date' style='text-align:center;font-size:0.7em;'>".__('Date','foodle-for-democracy-poll');
      if ( $show_time ) $output .= "<br>".__('Time','foodle-for-democracy-poll');
      if ( $show_date ) $output .= "</th>";
      $delete_all_visible = ( ( current_user_can('manage_options') ) && ( ! isset($attr["ajax"]) ) ) ? "" : "display:none!important;" ;
      $output .= '<th class="foodle-comments-comment" style="padding:auto;text-align:center;width:66%;">';
      $comment_email_image = ( ( isset($attr["ajax"]) ) && ( $attr["ajax"] == 'true' ) && ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['send_comment_email'][$poll_id]) ) && ( get_option('foodle_dem_categories')['send_comment_email'][$poll_id]) ) ? '<img style=\'width:17px;margin:4px 0px 0px 4px;float:left;\' src=\''.plugin_dir_url(__FILE__).'img/comments__yes_wemail.png\'>' : '' ;
      $output .= $comment_email_image.'';
      $output .= ( $show_just_mine ) ? __('Just Own, Pending Voters\' & Admin Comments here','foodle-for-democracy-poll') : __('Comment','foodle-for-democracy-poll');
      $output .= '<form style="float:right;padding:auto;margin:0px;" action="" method="post"><input type="hidden" name="foodle_delete_all_comments_'.$poll_id.'" value=""><input '.$help_delete_all_comments.' type="image" style="float:right;'.$delete_all_visible.'padding:auto;margin:0px;opacity:0.9;" width="22px" height="22px" src="'.plugin_dir_url(__FILE__).'img/delete_all.png" onclick="return ( confirm(\''.sprintf(__('Administrator function:\nDo you really want to delete all comments for\npoll \`%s\`?\nThis will be irreversible!','foodle-for-democracy-poll'),$poll_title).'\') && confirm(\''.__('Are you really sure?','foodle-for-democracy-poll').'\') )"></form></th>';
      if ( ( $edit_comments ) || ( $delete_comments ) ) {
        $output .= "<th class='foodle-comments-edit-delete' style='text-align:center;'>";
        $output .= "<table class='comment-execute-table' style='border-collapse:collapse;margin:0px;padding:0px;'><tbody><tr>";
        if ( $edit_comments ) $output .= "<th class='foodle-comments-delete' style='text-align:center;border:none!important;margin:0px!important;padding:0px!important;' ".$help_edit_comment."><img style='display:block;margin:auto;opacity:0.9;' width='22px' height='22px' src='".plugin_dir_url(__FILE__)."img/edit.png'></th>";
        if ( $delete_comments ) $output .= "<th class='foodle-comments-delete' style='text-align:center;border:none!important;margin:0px!important;padding:0px!important;' ".$help_delete_comment."><img style='display:block;margin:auto;opacity:0.9;' width='22px' height='22px' src='".plugin_dir_url(__FILE__)."img/delete.png'></th>";
        $output .= "</tr></tbody></table>";
        $output .= "</th>";
      }
      $output .= "</tr></thead>";
      $comments_row = -1;
      foreach($foodle_poll_comments as $poll_comment_data) {
        $comments_row += 1;
        if ( ( $show_just_mine ) && ( ! in_array($poll_comment_data[0],$foodle_poll_comments_own) ) ) continue;
        $poll_commenter = get_userdata($poll_comment_data[0]);
        if ( ( $poll_comment_data[0] == get_current_user_id() ) && ( $poll_comment_data[3] !== '- - -' ) ) {
          $foodle_del_comment_attr = "";
          $foodle_del_comment_style = "opacity:0.75; cursor:pointer;";
          $foodle_comment_edit = true;
        } else {
          $foodle_del_comment_attr = "disabled='disabled'";
          $foodle_del_comment_style = "opacity:0.1; cursor:not-allowed;";
          $foodle_comment_edit = false;
        }
        $poll_commenter_name = $poll_commenter->display_name;
        $poll_comment_date = $poll_comment_data[1];
        $poll_comment_time = $poll_comment_data[2];
        $poll_comment = foodle_esc_attr($poll_comment_data[3]);
        if ( isset($poll_comment_data[4]) ) // for backward compatibility
          $poll_edited = $poll_comment_data[4];
        else
          $poll_edited = false;
        $output .= ( $poll_edited ) ? "<tr class='foodle-comment-edited'>" : "<tr>";
        $output .= "<td style='text-align:center;'>".$poll_commenter_name."</td>";
        if ( $show_date ) $output .= "<td style='text-align:center;font-size:0.7em;'>".$poll_comment_date;
        if ( $show_time ) $output .= "<br>".$poll_comment_time;
        if ( $show_date ) $output .= "</td>";
        $output .= "<td style='text-align:left!important;'>".$poll_comment."</td>";
        if ( ( $edit_comments ) || ( $delete_comments ) ) {
          $output .= "<td style='text-align:center;'>";
          $output .= "<table class='comment-execute-table' style='border-collapse:collapse;margin:0px;padding:0px;'><tbody><tr>";
          if ( $edit_comments ) {
            $output .= "<td ".$help_edit_comment." style='border:none!important;margin:0px!important;padding:0px!important;'>";
            $output .= "<input type='submit' name='foodle_delete_row_".$poll_id."' value='&#9997;' style='margin:0px!important;padding:0px!important;text-align:center;color:white;font-size:13px;font-weight:400;width:20px;height:20px;".$foodle_del_comment_style." background-color:darkgreen; border-radius:20px;' ".$foodle_del_comment_attr."
              onclick=\" var $=jQuery; if ( $('#foodle_poll_new_comment_text_".$poll_id."').length == 0) alert('".__('A valid input area for comments entry\nseems to be missing here!','foodle-for-democracy-poll')."'); else { if ( confirm('".__('Are you sure you want to edit your comment?','foodle-for-democracy-poll')."') ) { $(this).parents('.foodle-comments-table').find('[style*=\'outline\']').css('outline','none'); $(this).parents(':eq(5)').css('outline','2px solid darkgreen'); $('#comment_edit_no_".$poll_id."').val('".$comments_row."'); $('#foodle_poll_new_comment_text_".$poll_id."').val('".preg_replace('#<br\s*/?>#i', '\n', foodle_esc_attr($foodle_poll_comments[$comments_row][3]))."').focus();
              var visible_height = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
              $('html, body').animate({ scrollTop: $('#foodle_poll_new_comment_title_".$poll_id."').offset().top - ( visible_height / 2 ) }, 2000);
              $('#foodle_poll_new_comment_title_pre_".$poll_id."').html('<span style=\'color:darkgreen;\'>(".__('Edit-Mode','foodle-for-democracy-poll').")</span> &nbsp;'); } }\">";
            $output .= "</td>";
          }
          if ( $delete_comments ) {
            $output .= "<td ".$help_delete_comment." style='border:none!important;margin:0px!important;padding:0px!important;'>";
            $output .= "<form action='' method='post'>";
            $output .= "<input type='submit' name='foodle_delete_row_".$poll_id."' value='✘' style='margin:0px!important;padding:0px!important;text-align:center;color:white;font-size:13px;font-weight:400;width:20px;height:20px;".$foodle_del_comment_style." background-color:darkred; border-radius:20px;' ".$foodle_del_comment_attr." onclick=\"return confirm('".__('Are you sure you want to delete this comment?\nThis will be irreversible!','foodle-for-democracy-poll')."')\">";
            $output .= "<input type='hidden' name='foodle_delete_comment_".$poll_id."' value='".$comments_row."'>";
            $output .= "</form>";
            $output .= "</td>";
          }
          $output .= "</tr></tbody></table>";
          $output .= "</td>";
        }
        $output .= "</tr>";
      }
      $output .= "</table>";
      if ( ! isset($attr["ajax"]) ) $output .= "<figcaption><div class='foodle-figcaption' style='font-size:9pt; color:#888888; font-weight:normal;'>(".__('Hint for small screens: horizontal scrolling may be available through trackpad use, screen wiping or arrow keys','foodle-for-democracy-poll').")</div></figcaption>";
      $output .= "</figure>";
    }
    // remove headline, when inside the Democracy textarea
    $output .= '
      <script type="text/javascript">
        var $=jQuery;
        $(document).ready(function() {
          $(".foodle-comments-table-'.$poll_id.'").parents("div#democracy-'.$poll_id.'").find("#foodle_comments_table_headline_'.$poll_id.'").remove();
          $(".foodle-no-comments-detailed-message-'.$poll_id.'").parents("div#democracy-'.$poll_id.'").find("#foodle_no_comments_detailed_message_'.$poll_id.'").remove();
          $(".foodle-poll-new-comment-title-'.$poll_id.'").parents("div#democracy-'.$poll_id.'").find("#foodle_poll_new_comment_title_for_part_'.$poll_id.'").remove();
          $(".foodle-poll-new-comment-title-'.$poll_id.'").parents("div.dem-poll-note").find(".foodle-comments-complete").css({"border-color":"#d4d4d4","background-color":"#e4e4e4"});
        });
      </script>
    ';
  }

  if ( ( $show_comments ) && ( $comments_active ) && ( $allow_new_comments ) ) $output .= '<div class="foodle-comment-table-space">&nbsp;</div>';

  if ( ( $comments_active ) && ( $allow_new_comments ) ){
    $output .= '<form action="" method="post">';
    if ( $show_comments )
      $output .= '<p class="foodle-poll-new-comment-wrapper" ><label class="foodle-poll-new-comment-title foodle-poll-new-comment-title-'.$poll_id.'" id="foodle_poll_new_comment_title_'.$poll_id.'" for="foodle_poll_new_comment_text_'.$poll_id.'"><span id="foodle_poll_new_comment_title_pre_'.$poll_id.'"></span>'.__('New comment','foodle-for-democracy-poll').'<br>';
    else
      $output .= '<p class="foodle-poll-new-comment-wrapper" ><label style="width:100%;" class="foodle-poll-new-comment-title foodle-poll-new-comment-title-'.$poll_id.'" id="foodle_poll_new_comment_title_'.$poll_id.'" for="foodle_poll_new_comment_text_'.$poll_id.'"><span id="foodle_poll_new_comment_title_pre_'.$poll_id.'"></span>'.__('New comment','foodle-for-democracy-poll').'<span id="foodle_poll_new_comment_title_for_part_'.$poll_id.'"> '.__('for','foodle-for-democracy-poll').' \''.$poll_title.'\'</span><br>';
    $output .= '<textarea style="font-size:14px;" class="foodle-poll-new-comment-text" id="foodle_poll_new_comment_text_'.$poll_id.'" name="foodle_poll_new_comment_text_'.$poll_id.'" placeholder="'.__('Your comment goes here...','foodle-for-democracy-poll').'" rows="4"></textarea>';
    $output .= '<input type="hidden" id="comment_edit_no_'.$poll_id.'" name="comment_edit_no_'.$poll_id.'" value="">';
    $output .= '<input type="submit" class="foodle-new-comments-button" name="save_poll_comment_'.$poll_id.'" value="'.__('Save poll comment','foodle-for-democracy-poll').'..."/>';
    $output .= '</label></p>';
    $output .= '</form>';
  }

  if ( ( $show_comments ) && ( $comments_active )  && ( $allow_new_comments ) ) $output .= '</div>';

	return $output;
});