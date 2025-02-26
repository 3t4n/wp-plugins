<?php
/*
Plugin Name: Credible Names
Plugin URI: http://wordpress.org/plugins/credible-names/
Description: Ensure user's nickname and display name are unique and not a display name or nick name or user name of someone else within the site.
Version: 0.1.2
Author: nafSadh Khan
Author URI: http://nafSadh.com/Khan
*/

// based on code by  Ashok & Vaughan Montgomery
// from: http://wordpress.org/support/topic/how-to-make-displayname-nicknames-unique
// adopted by nafSadh (khan@nafSadh.com)
// Checks if display_name is already in use as display_name, nickname or login_name of some other user
// Checks if nickname is already in use as display_name, nickname or login_name of some other user
/*
 * adding action when user profile is updated
 */
add_action('personal_options_update', 'validate_profile_name');
add_action('edit_user_profile_update', 'validate_profile_name');
function validate_profile_name($user_id) {
  global $wpdb;
  // Getting user data and user meta data
  $err['display'] = $wpdb->get_var($wpdb->prepare("SELECT COUNT(ID) FROM $wpdb->users WHERE display_name = %s AND ID <> %d", $_POST['display_name'], $_POST['user_id']));
  $err['display'] += $wpdb->get_var($wpdb->prepare("SELECT COUNT(ID) FROM $wpdb->users WHERE user_login = %s AND ID <> %d", $_POST['display_name'], $_POST['user_id']));
  $err['display'] += $wpdb->get_var($wpdb->prepare("SELECT COUNT(ID) FROM $wpdb->users as users, $wpdb->usermeta as meta WHERE users.ID = meta.user_id AND meta.meta_key = 'nickname' AND meta.meta_value = %s AND users.ID <> %d", $_POST['display_name'], $_POST['user_id']));

  $err['nick'] = $wpdb->get_var($wpdb->prepare("SELECT COUNT(ID) FROM $wpdb->users as users, $wpdb->usermeta as meta WHERE users.ID = meta.user_id AND meta.meta_key = 'nickname' AND meta.meta_value = %s AND users.ID <> %d", $_POST['nickname'], $_POST['user_id']));
  $err['nick'] += $wpdb->get_var($wpdb->prepare("SELECT COUNT(ID) FROM $wpdb->users WHERE user_login = %s AND ID <> %d", $_POST['nickname'], $_POST['user_id']));
  $err['nick'] += $wpdb->get_var($wpdb->prepare("SELECT COUNT(ID) FROM $wpdb->users WHERE display_name = %s AND ID <> %d", $_POST['nickname'], $_POST['user_id']));

  foreach ($err as $key => $e) {
    // If display name or nickname already exists
    if ($e >= 1) {
      $err[$key] = $_POST['username'];
      // Adding filter to corresponding error
      add_filter('user_profile_update_errors', "check_{$key}_field", 10, 3);
    }
  }
}

/*
 * Filter function for display name error
 */
function check_display_field($errors, $update, $user) {
  $errors->add('display_name_error', __('<span id="IL_AD9" class="IL_AD">Sorry</span>, Display Name is already in use. It needs to be unique.'));
  return false;
}

/*
 * Filter function for nickname error
 */
function check_nick_field($errors, $update, $user) {
  $errors->add('display_nick_error', __('Sorry, Nickname is already in use. It needs to be unique.'));
  return false;
}

?>