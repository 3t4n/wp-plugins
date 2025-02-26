<?php
/*
 * Plugin Name: Foodle Add-on for Democracy Poll
 * Description: Enhances the Democracy Poll plugin from Kama to interactively display the results of polls in various ways, depending on shortcode parameters, incl. additional functions.
 *
 * Author: Michael Finkenberger
 * Author URI: 
 * Plugin URI: https://de.wordpress.org/plugins/foodle-for-democracy-poll/
 *
 * Text Domain: foodle-for-democracy-poll
 * Domain Path: /languages
 *
 * Requires at least: 4.3
 * Tested up to: 6.7
 * Requires PHP: 7.4
 *
 * Licence: GPLv2 or later
 *
 * Version: 2.5.23.3
 * Date: 23.11.2024
*/



if(!defined('ABSPATH')) die(); // no direct access

const FOODLE_VERSION = '2.5.23.3';
global $foodle_title;                    // just the administrator's choice
global $foodle_admin_menu_color;         // color value
global $foodle_help_tooltips;            // boolean
global $foodle_frontend_tooltips;        // boolean
global $foodle_warnings_removed;         // boolean
global $foodle_no_safety_query;          // boolean
global $foodle_undefined_error;          // translated (WordPress action hook 'init')
global $foodle_sorting;                  // translated (WordPress action hook 'init')
global $thanks_for_using_foodle;         // translated (WordPress action hook 'init')
global $foodle_like_me_1;                // translated (WordPress action hook 'init')
global $foodle_like_me_2;                // translated (WordPress action hook 'init')
global $foodle_results_text_default;     // translated (WordPress action hook 'init')
global $foodle_results_text;             // just the administrator's choice or the default
global $foodle_bar_graph_text_default;   // translated (WordPress action hook 'init')
global $foodle_bar_graph_text;           // just the administrator's choice or the default
global $foodle_unknown_user;             // translated (WordPress action hook 'init')
global $foodle_roles_metafields;         // the Foodle functions for other roles
global $foodle_roles_sorting;            // the Foodle functions for other roles
global $foodle_roles_sproles;            // the Foodle functions for other roles
global $foodle_roles_email;              // the Foodle functions for other roles
global $foodle_roles_usage;              // the Foodle functions for other roles
global $foodle_roles_settings;           // the Foodle functions for other roles
global $foodle_roles_tips;               // the Foodle functions for other roles
global $foodle_roles_deleteun;           // the Foodle functions for other roles
global $foodle_email_link_admins;        // the Foodle email link for administrators
global $foodle_email_link_non_admins;    // the Foodle email link for non-administrators
global $foodle_show_vote_date_admins;    // the Foodle voting date for administrators
global $foodle_show_vote_time_admins;    // the Foodle voting hour for administrators
global $foodle_show_vote_date_specview;  // the Foodle voting date for selected special viewers
global $foodle_show_vote_time_specview;  // the Foodle voting hour for selected special viewers
global $foodle_scroll_up_button_visible; // array of boolean

// Set the global booleans
$foodle_help_tooltips = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['help-tooltips']) ) ) ? get_option('foodle_settings')['help-tooltips'] : true;
$foodle_frontend_tooltips = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['frontend-tooltips']) ) ) ? get_option('foodle_settings')['frontend-tooltips'] : true;
$foodle_warnings_removed = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['remove-warnings']) ) ) ? get_option('foodle_settings')['remove-warnings'] : false;
$foodle_no_safety_query = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['no-safety-query']) ) ) ? get_option('foodle_settings')['no-safety-query'] : false;
$foodle_roles_metafields = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle-roles-metafields']) ) ) ? get_option('foodle_settings')['foodle-roles-metafields'] : true;
$foodle_roles_sorting = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle-roles-sorting']) ) ) ? get_option('foodle_settings')['foodle-roles-sorting'] : true;
$foodle_roles_sproles = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle-roles-sproles']) ) ) ? get_option('foodle_settings')['foodle-roles-sproles'] : false;
$foodle_roles_email = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle-roles-email']) ) ) ? get_option('foodle_settings')['foodle-roles-email'] : true;
$foodle_roles_usage = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle-roles-usage']) ) ) ? get_option('foodle_settings')['foodle-roles-usage'] : true;
$foodle_roles_settings = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle-roles-settings']) ) ) ? get_option('foodle_settings')['foodle-roles-settings'] : false;
$foodle_roles_tips = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle-roles-tips']) ) ) ? get_option('foodle_settings')['foodle-roles-tips'] : true;
$foodle_roles_deleteun = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle-roles-deleteun']) ) ) ? get_option('foodle_settings')['foodle-roles-deleteun'] : false;
$foodle_email_link_admins = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['voter-email-link-for-admins']) ) ) ? get_option('foodle_settings')['voter-email-link-for-admins'] : true;
$foodle_email_link_non_admins = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['voter-email-link-for-non-admins']) ) ) ? get_option('foodle_settings')['voter-email-link-for-non-admins'] : false;
$foodle_show_vote_date_admins = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['vote-date-for-admins']) ) ) ? get_option('foodle_settings')['vote-date-for-admins'] : true;
$foodle_show_vote_time_admins = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['vote-time-for-admins']) ) ) ? get_option('foodle_settings')['vote-time-for-admins'] : true;
$foodle_show_vote_date_specview = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['vote-date-for-specview']) ) ) ? get_option('foodle_settings')['vote-date-for-specview'] : true;
$foodle_show_vote_time_specview = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['vote-time-for-specview']) ) ) ? get_option('foodle_settings')['vote-time-for-specview'] : false;
$foodle_scroll_up_button_visible['frontend'] = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle-scroll-up-button-visible']['frontend']) ) ) ? get_option('foodle_settings')['foodle-scroll-up-button-visible']['frontend'] : false;
$foodle_scroll_up_button_visible['democracy'] = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle-scroll-up-button-visible']['democracy']) ) ) ? get_option('foodle_settings')['foodle-scroll-up-button-visible']['democracy'] : false;
$foodle_scroll_up_button_visible['foodle'] = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle-scroll-up-button-visible']['foodle']) ) ) ? get_option('foodle_settings')['foodle-scroll-up-button-visible']['foodle'] : false;
$foodle_scroll_up_button_visible['comments'] = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle-scroll-up-button-visible']['comments']) ) ) ? get_option('foodle_settings')['foodle-scroll-up-button-visible']['comments'] : false;
$foodle_scroll_up_button_visible['bar_graph'] = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle-scroll-up-button-visible']['bar_graph']) ) ) ? get_option('foodle_settings')['foodle-scroll-up-button-visible']['bar_graph'] : false;
$foodle_scroll_up_button_visible['backend'] = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle-scroll-up-button-visible']['backend']) ) ) ? get_option('foodle_settings')['foodle-scroll-up-button-visible']['backend'] : false;
$foodle_scroll_up_button_visible['democracy_admin'] = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle-scroll-up-button-visible']['democracy_admin']) ) ) ? get_option('foodle_settings')['foodle-scroll-up-button-visible']['democracy_admin'] : true;
$foodle_scroll_up_button_visible['foodle_admin'] = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle-scroll-up-button-visible']['foodle_admin']) ) ) ? get_option('foodle_settings')['foodle-scroll-up-button-visible']['foodle_admin'] : true;



// Set the global Foodle version and initialize in case
if ( ! get_option('foodle_version') ) {
    update_option('foodle_version', '0', 'no');
    $foodle_version = '0';
} else
    $foodle_version = get_option('foodle_version');



// make sure that this plugin is only activated under certain conditions...
function foodle_suppress_activation($plugin, $network_wide) {
  global $wp_version;

  // the same 4 lines as below
  $this_is_me = 'foodle-for-democracy-poll/foodle-for-democracy-poll.php';
  $this_is_my_name = 'Foodle';
  $i_need_this_one = 'democracy-poll/democracy.php';
  $this_is_its_name = 'Democracy Poll';

  $wp_version_min = '4.8';

  $is_not_ok_version = ( $wp_version < $wp_version_min ) ? '<p>WordPress version needs to be at least '.$wp_version_min.' to activate '.$this_is_my_name.'.</p>' : '';
  $is_not_ok_needing = ( ! is_plugin_active( $i_need_this_one ) ) ? '<p>\''.$this_is_its_name.'\' plugin needs to be active to activate '.$this_is_my_name.'.</p>' : '';

  if ( ( $plugin == $this_is_me ) && ( strlen($is_not_ok_version.$is_not_ok_needing) != 0 ) ) {
    error_log( 'The plugin activiation conditions for '.$this_is_my_name.' ('.$this_is_me.') are not met!' );      
    $args = var_export( func_get_args(), true );
    error_log( $args );
    wp_die( $is_not_ok_version.$is_not_ok_needing.'<p><a href="javascript:history.back()">You can press here to return</a></p>' );
  }
}
add_action( 'activate_plugin', 'foodle_suppress_activation' , 10, 2);

// ... and later, just in case: Deactivate this plugin if the plugin activation condtions are no longer met in terms of plugins needed
function foodle_check_activation_conditions() {
  // the same 4 lines as above
  $this_is_me = 'foodle-for-democracy-poll/foodle-for-democracy-poll.php';
  $this_is_my_name = 'Foodle';
  $i_need_this_one = 'democracy-poll/democracy.php';
  $this_is_its_name = 'Democracy Poll';  

  $is_not_ok_needing = '<p>\''.$this_is_its_name.'\' plugin needs to be active to activate '.$this_is_my_name.'.</p>';

  include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); // in order to avoid an 'undefined error message' for is_plugin_active() under circumstances not clear to me...
  if ( ! is_plugin_active( $i_need_this_one ) ) {
    error_log( 'The plugin activiation conditions for '.$this_is_my_name.' ('.$this_is_me.') are not met!' );      
    $args = var_export( func_get_args(), true );
    error_log( $args );
    deactivate_plugins($this_is_me, false, null);
    wp_die( $is_not_ok_needing.'<p><a href="javascript:history.back(); window.location.reload(true);">You can press here to return</a></p>' ); // additional reload(true) to see the change
  }
}
add_action( 'wp_loaded', 'foodle_check_activation_conditions' );



// Activate plugin (conditions check is already done above)
function foodle_for_democracy_poll_activate() {
  delete_option('foodle_variables'); // no longer used from 1.1.8.0 onwards: now stored in user_meta
  // generate the option array for the flag storage when foodle_change_demCollectAnsw() has been replaced in case it doesn't exist, yet
  if ( ! get_option('foodle_change_demCollectAnsw') ) update_option('foodle_change_demCollectAnsw', array(), 'yes');
  // generate the option array (see above) in case it doesn't exist, yet
  if ( ! get_option('foodle_meta_fields') ) update_option('foodle_meta_fields', array(), 'yes');
  // generate the option array (see above) in case it doesn't exist, yet
  if ( ! get_option('foodle_meta_defaults_sorting') ) update_option('foodle_meta_defaults_sorting', array(), 'yes');
  // generate the option array (see above) in case it doesn't exist, yet
  if ( ! get_option('foodle_special_functions') ) update_option('foodle_special_functions', array(), 'yes');
  // generate the option array (see above) in case it doesn't exist, yet
  if ( ! get_option('foodle_reminders') ) update_option('foodle_reminders', array(), 'yes');
  // generate the option array (see above) in case it doesn't exist, yet
  if ( ! get_option('foodle_regex_main') ) update_option('foodle_regex_main', array(), 'yes');
  // generate the option array (see above) in case it doesn't exist, yet
  if ( ! get_option('foodle_email_content') ) update_option('foodle_email_content', array(), 'yes');
  // generate the option array (see above) in case it doesn't exist, yet
  if ( ! get_option('foodle_settings') ) update_option('foodle_settings', array(), 'yes');
  // generate the option array (see above) in case it doesn't exist, yet
  if ( ! get_option('foodle_dem_categories') ) update_option('foodle_dem_categories', array(), 'yes');
  // generate the option foodle_version in case it doesn't exist, yet (since 2.1.0.0)
  if ( ! get_option('foodle_version') ) update_option('foodle_version', FOODLE_VERSION, 'no');

  // Add the Foodle capability to the Administrator, in case
    if ( ! get_role( 'administrator' )->has_cap( 'manage_foodle' ) ) wp_roles()->add_cap( 'administrator', 'manage_foodle' );

  // Add columns 'in_comments', 'in_foodles', 'roles_concerned' and 'poll_comments' to democracy_q, in case
  global $wpdb;
  $table_name = $wpdb->prefix . 'democracy_q';
  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
  $column_name = 'in_comments';
  $create_ddl = "ALTER TABLE $table_name ADD $column_name TEXT NOT NULL DEFAULT '';";
  maybe_add_column($table_name, $column_name, $create_ddl);
  $column_name = 'in_foodles';
  $create_ddl = "ALTER TABLE $table_name ADD $column_name TEXT NOT NULL DEFAULT '';";
  maybe_add_column($table_name, $column_name, $create_ddl);
  $column_name = 'roles_concerned';
  $create_ddl = "ALTER TABLE $table_name ADD $column_name TEXT NOT NULL DEFAULT '';";
  maybe_add_column($table_name, $column_name, $create_ddl);
  $column_name = 'poll_comments';
  $create_ddl = "ALTER TABLE $table_name ADD $column_name TEXT NOT NULL DEFAULT '';";
  maybe_add_column($table_name, $column_name, $create_ddl);
}
register_activation_hook( __FILE__, 'foodle_for_democracy_poll_activate' );



// Do something if this is an update (an update will not trigger plugin activation, expecially not if an update is done through FTP)
if ( $foodle_version !== FOODLE_VERSION ) {
    // Check for administrator role capability, in case
    if ( ! get_role( 'administrator' )->has_cap( 'manage_foodle' ) ) wp_roles()->add_cap( 'administrator', 'manage_foodle' );

    // Add columns 'in_comments', 'in_foodles', 'roles_concerned' and 'poll_comments' to democracy_q, in case
    global $wpdb;
    $table_name = $wpdb->prefix . 'democracy_q';
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    $column_name = 'in_comments';
    $create_ddl = "ALTER TABLE $table_name ADD $column_name TEXT NOT NULL DEFAULT '';";
    maybe_add_column($table_name, $column_name, $create_ddl);
    $column_name = 'in_foodles';
    $create_ddl = "ALTER TABLE $table_name ADD $column_name TEXT NOT NULL DEFAULT '';";
    maybe_add_column($table_name, $column_name, $create_ddl);
    $column_name = 'roles_concerned';
    $create_ddl = "ALTER TABLE $table_name ADD $column_name TEXT NOT NULL DEFAULT '';";
    maybe_add_column($table_name, $column_name, $create_ddl);
    $column_name = 'poll_comments';
    $create_ddl = "ALTER TABLE $table_name ADD $column_name TEXT NOT NULL DEFAULT '';";
    maybe_add_column($table_name, $column_name, $create_ddl);

    // Set the new Foodle_version
    update_option('foodle_version', FOODLE_VERSION, 'no');
    $foodle_version = FOODLE_VERSION;

    // Delete no longer used
    delete_option('foodle_shortcode_usage_update'); // no longer used since version 2.5.23.2
    delete_option('foodle_democracy_post_usage'); // no longer used since version 2.5.23.2
    delete_option('foodle_foodle_post_usage'); // no longer used since version 2.5.23.2
    delete_option('foodle_comments_post_usage'); // no longer used since version 2.5.23.2

    // do something
    if ( $foodle_version == '2.5.23.3' ) foodle_check_shortcode_presence();
}



// Do some stuff upon plugin deactivation
function foodle_for_democracy_poll_deactivate() {
  // Unschedule Foodle's wp_cron job, in case it is currently scheduled
  $foodle_timestamp = wp_next_scheduled( 'foodle_cron_hook' );
  wp_unschedule_event( $foodle_timestamp, 'foodle_cron_hook' );
}
register_deactivation_hook( __FILE__, 'foodle_for_democracy_poll_deactivate' );



// Clean up upon plugin uninstall
function foodle_for_democracy_poll_uninstall() {
  global $wp_roles;
  global $wpdb;
  
  // Delete all options used in the foodle-for-democracy-poll plugin
  delete_option('foodle_variables'); // no longer used from 1.1.8.0 onwards: now stored in user_meta
  delete_option('foodle_change_demCollectAnsw');
  delete_option('foodle_meta_fields');
  delete_option('foodle_meta_defaults_sorting');
  delete_option('foodle_special_functions');
  delete_option('foodle_reminders');
  delete_option('foodle_regex_main');
  delete_option("foodle_email_content");
  delete_option('foodle_settings');
  delete_option('foodle_dem_categories');
  delete_option('foodle_shortcode_usage_update'); // no longer used since version 2.5.23.2
  delete_option('foodle_democracy_post_usage'); // no longer used since version 2.5.23.2
  delete_option('foodle_foodle_post_usage'); // no longer used since version 2.5.23.2
  delete_option('foodle_comments_post_usage'); // no longer used since version 2.5.23.2
  delete_option('foodle_shortcode_usage_error_pages_posts');
  delete_option('foodle_version');

  // Remove capability 'manage_foodle' from all roles, just in case...
  foreach ( $wp_roles->role_names as $foodle_wp_role_slug=>$foodle_wp_role_name ) {
    wp_roles()->remove_cap( $foodle_wp_role_slug, 'manage_foodle' );
  }

  // Delete all foodle meta data
  $users = get_users(array(
    'orderby'  => 'meta_value',
    'meta_key' => 'last_name', // just a habit ;-)
    'order'    => 'ASC'
  ));
  foreach ( $users as $user ) {
    $foodle_user_id = $user->ID;
    $foodle_user_meta = get_user_meta($foodle_user_id);
    foreach( $foodle_user_meta as $foodle_meta_key => $foodle_meta_value ) {
      if ( strpos($foodle_meta_key, 'foodle-') === 0 ) delete_user_meta($foodle_user_id, $foodle_meta_key);
    }
  }

  // Unschedule Foodle's wp_cron job, just in case...
  $foodle_timestamp = wp_next_scheduled( 'foodle_cron_hook' );
  wp_unschedule_event( $foodle_timestamp, 'foodle_cron_hook' );

  // Remove columns 'in_comments', 'in_foodles', 'roles_concerned' and 'poll_comments' from database 'democracy_q' (if it exists)
  $table_name = $wpdb->prefix . 'democracy_q';
  require_once(ABSPATH . 'wp-admin/install-helper.php');
  $column_name = 'in_comments';
  $drop_ddl = "ALTER TABLE $table_name DROP $column_name;";
  maybe_drop_column($table_name, $column_name, $drop_ddl);
  $column_name = 'in_foodles';
  $drop_ddl = "ALTER TABLE $table_name DROP $column_name;";
  maybe_drop_column($table_name, $column_name, $drop_ddl);
  $column_name = 'roles_concerned';
  $drop_ddl = "ALTER TABLE $table_name DROP $column_name;";
  maybe_drop_column($table_name, $column_name, $drop_ddl);
  $column_name = 'poll_comments';
  $drop_ddl = "ALTER TABLE $table_name DROP $column_name;";
  maybe_drop_column($table_name, $column_name, $drop_ddl);
}
register_uninstall_hook( __FILE__, 'foodle_for_democracy_poll_uninstall' );



// Set title from option
if ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle_title']) ) && ( get_option('foodle_settings')['foodle_title'] != '' ) ) {
  $foodle_title = esc_html(get_option('foodle_settings')['foodle_title']);
} else $foodle_title = 'Foodle';



// Get admin menu color from option, store it in a global variable...
if ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle_admin_menu_color']) ) && ( get_option('foodle_settings')['foodle_admin_menu_color'] != '' ) ) {
    $foodle_admin_menu_color = get_option('foodle_settings')['foodle_admin_menu_color'];
}
else $foodle_admin_menu_color = '#8CBD5A';
// ...and use it in the admin area, marking the admin bar entry for Democracy and the submenu entires for Democracy Poll and Foodle
function modify_admin_submenu_colors() {
  global $foodle_admin_menu_color;
  
  echo '
    <script type="text/javascript" id="set_democracy_and_foodle_menu_color">
    $(document).ready( function() {
        foodle_color = "'.$foodle_admin_menu_color.'";
        $("li a[href$=\'?page=foodle-admin-page\']").css("color",foodle_color);                 // in submenu
        $("li a[href^=\'options-general.php?page=democracy-poll\']").css("color",foodle_color); // in submenu
        $("#wp-admin-bar-dem_settings :first").css("color",foodle_color);                       // in admin bar
        $("#wp-admin-bar-foodle-main :first").css("color",foodle_color);                        // in admin bar
        $("#toplevel_page_foodle-admin-page a").css("color",foodle_color);                      // as top level menu (just in case...)
  });
    </script>
  ';
}
add_action('admin_footer', 'modify_admin_submenu_colors',2147483647); // Let it work as late as possible in the back end to avoid being overridden by other color settings
add_action('wp_footer', 'modify_admin_submenu_colors',2147483647); // Let it work as late as possible in the front end to avoid being overridden by other color settings



function foodle_get_poll_vote_participation_icon($poll_id) {
  // determine the participation rate for the poll in order to select the correct icon color
  $foodle_participation_data = foodle_get_the_poll_participation_data($poll_id); // returns false or an array of data
  if ( $foodle_participation_data !== false ) {
    $foodle_participation_rate = $foodle_participation_data['participation_rate'];
    $number_of_users_concerned = $foodle_participation_data['number_of_users_concerned'];
    $number_of_unexpected_voters = $foodle_participation_data['number_of_unexpected_voters'];
    $foodle_poll_participation_error = ( $number_of_unexpected_voters > 0 );
  }
  if ( ( $foodle_participation_data === false ) || ( $foodle_participation_rate > 100 ) || ( $foodle_poll_participation_error ) ) { // no such poll id or something's wrong
    $foodle_participation_rate = 101; // indicate an error
    $foodle_participation_image = 'img/votes_error.png';
  } else {
    $foodle_participation_image_initial = ( $number_of_users_concerned == 0 ) ? 'img/nobody_to_vote.png' : 'img/not_voted_yet.png';
    $foodle_participation_image = ( $foodle_participation_rate == 100 ) ? 'img/votes_complete.png' : $foodle_participation_image_initial;
  }
  return $foodle_participation_image;
} // this function is initially just called from foodle_add_category_selection_to_democracy_poll() for the Democracy Poll backend poll list and edit pages!



function foodle_add_category_selection_to_democracy_poll() {
  global $wpdb;
  global $wp_roles;
  global $foodle_title;
  global $foodle_sorting;
  global $foodle_help_tooltips;
  global $foodle_no_safety_query;
  global $foodle_scroll_up_button_visible;

  if ( get_current_screen()->base != 'settings_page_democracy-poll' ) return; // Not the Democracy Poll settings page

  if ( ( isset($foodle_scroll_up_button_visible['democracy_admin']) ) && ( $foodle_scroll_up_button_visible['democracy_admin'] ) ) foodle_provide_scroll_up_button();

  $foodle_sorting_button_text = __('Sorting button text','foodle-for-democracy-poll');
  $foodle_show_refresh_button_voted = __('Show refresh button <u>after</u> voting','foodle-for-democracy-poll');
  $foodle_show_refresh_button_not_voted = __('Show refresh button <u>before</u> voting','foodle-for-democracy-poll');
  $foodle_count_marked_voters = __('Count marked voters in the answer column sum','foodle-for-democracy-poll');
  $foodle_delete_poll_IP_addresses = __('Prevent from storing voter IP addresses for this poll','foodle-for-democracy-poll');
  $foodle_send_comment_email = __('Send an email to the admin upon each new, updated or deleted comment for this poll','foodle-for-democracy-poll');
  $foodle_select_roles_concerned = __('Select the roles concerned for this Foodle (none selected = all roles)','foodle-for-democracy-poll');
  $foodle_select_roles_for_not_voted = __('Select the roles to see the bar graph tooltip about users<br>who did not vote so far (none selected = all roles)','foodle-for-democracy-poll');
  $foodle_democracy_email_reminders_users = __('Impact &rArr; Reminder email recipients','foodle-for-democracy-poll');
  $foodle_democracy_count_as_voters_users = __('Impact &rArr; Count as voters (bar graph / voting)','foodle-for-democracy-poll');
  $foodle_select_roles_admin = _x('Administrator','User role').': '.__('Roll members can be voters','foodle-for-democracy-poll');
  $foodle_select_roles_democracy = __('Impact &rArr; Democracy Poll visibility','foodle-for-democracy-poll');
  $foodle_select_roles_foodle = __('Impact &rArr; Foodle visibility','foodle-for-democracy-poll');
  $foodle_select_roles_comments = __('Impact &rArr; Comments visibility','foodle-for-democracy-poll');
  $foodle_select_roles_do_comments = __('Impact &rArr; Entering new comments','foodle-for-democracy-poll').'&nbsp;☝️';
  $foodle_select_roles_bar_graph = __('Impact &rArr; Bar graph visibility','foodle-for-democracy-poll');
  $foodle_select_event = __('Enter related event data for use by shortcode [foodle-create-ics] in case this is an event poll','foodle-for-democracy-poll');
  $foodle_select_event_use = __('This poll concerns an event','foodle-for-democracy-poll');
  $foodle_select_event_auto = __('Generate an ICS auto button','foodle-for-democracy-poll');
  $foodle_select_event_summary = __('The Event Summary/Title','foodle-for-democracy-poll');
  $foodle_select_event_start = __('The Event Start','foodle-for-democracy-poll');
  $foodle_select_event_end = __('The Event End','foodle-for-democracy-poll');
  $foodle_select_event_description = __('The Event Description','foodle-for-democracy-poll');
  $foodle_select_event_location = __('The Event Location','foodle-for-democracy-poll');
  $foodle_select_event_url = __('The Event URL','foodle-for-democracy-poll');
  $foodle_select_ics_button_text = __('The ICS Button Text','foodle-for-democracy-poll');

  // Check, whether this is invoked from saving the foodle poll settings and react accordingly
  $poll_id = -1;
  if ( isset($_GET["edit_poll"]) ) $poll_id = $_GET["edit_poll"];
  if ( ( isset($_GET["foodle_dem_edit"]) ) && ( $poll_id != -1 )  && ( ! isset($_POST["dmc_qid"]) ) ) {
    if ( $_GET["foodle_dem_edit"] == "foodle_changed")
      foodle_pwx_admin_notice__success('<p>'.__('The Foodle categories settings were properly stored for poll id','foodle-for-democracy-poll').' '.$poll_id.'.</p>');
    else
    if ( $_GET["foodle_dem_edit"] == "foodle_unchanged") 
      foodle_pwx_admin_notice__success('<p>'.__('No change in the Foodle categories settings for poll id','foodle-for-democracy-poll').' '.$poll_id.'.</p>');
    echo '<script type="text/javascript">window.history.replaceState("",window.title,window.location.href.replace("changed","nothing"));</script>'; // avoid message to re-appear upon page reload
  }
  
  $foodle_democracy_textarea_template = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle-democracy-textarea-template']) ) ) ? get_option('foodle_settings')['foodle-democracy-textarea-template'] : "";
  $foodle_democracy_textarea_template = preg_replace( '/[\r][\r\n]/', '\n',$foodle_democracy_textarea_template);
  $foodle_democracy_textarea_template_style = ( $foodle_democracy_textarea_template !== "" ) ? 'style=\"opacity:1.0;cursor:pointer;\"' : 'style=\"opacity:0.1;cursor:not-allowed;\"';
  $foodle_democracy_textarea_clear_style = 'style=\"opacity:1.0;cursor:pointer;\"';
  $foodle_democracy_textarea_template_set = ( $foodle_democracy_textarea_template !== "" ) ? true : false;

  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['sorting_button_text'][$poll_id]) ) )
    $poll_sorting_button_text = get_option('foodle_dem_categories')['sorting_button_text'][$poll_id];
  else
    $poll_sorting_button_text = '';

  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['refresh_button_voted'][$poll_id]) ) )
    $democracy_refresh_button_voted_checked = ( get_option('foodle_dem_categories')['refresh_button_voted'][$poll_id] ) ? " checked='checked'" : "";
  else
    $democracy_refresh_button_voted_checked = '';
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['refresh_button_not_voted'][$poll_id]) ) )
    $democracy_refresh_button_not_voted_checked = ( get_option('foodle_dem_categories')['refresh_button_not_voted'][$poll_id] ) ? " checked='checked'" : "";
  else
    $democracy_refresh_button_not_voted_checked = '';
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['count_marked_voters'][$poll_id]) ) )
    $democracy_count_marked_voters_checked = ( get_option('foodle_dem_categories')['count_marked_voters'][$poll_id] ) ? " checked='checked'" : "";
  else
    $democracy_count_marked_voters_checked = '';
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['delete_poll_IP_addresses'][$poll_id]) ) )
    $democracy_delete_poll_IP_addresses_checked = ( get_option('foodle_dem_categories')['delete_poll_IP_addresses'][$poll_id] ) ? " checked='checked'" : "";
  else
    $democracy_delete_poll_IP_addresses_checked = '';
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['send_comment_email'][$poll_id]) ) )
    $democracy_send_comment_email_checked = ( get_option('foodle_dem_categories')['send_comment_email'][$poll_id] ) ? " checked='checked'" : "";
  else
    $democracy_send_comment_email_checked = '';
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['non_voters_to_admin_only'][$poll_id]) ) )
    $democracy_non_voters_to_admin_only_checked = ( get_option('foodle_dem_categories')['non_voters_to_admin_only'][$poll_id] ) ? "administrator" : ""; // for backward compatibility
  else
    $democracy_non_voters_to_admin_only_checked = "administrator"; // for backward compatibility
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['roles_for_not_voted'][$poll_id]) ) )
    $foodle_roles_for_not_voted = ( get_option('foodle_dem_categories')['roles_for_not_voted'][$poll_id] );
  else
    $foodle_roles_for_not_voted = array($democracy_non_voters_to_admin_only_checked); // for backward compatibility
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['roles_show_democracy'][$poll_id]) ) )
    $foodle_roles_show_democracy_checked = ( get_option('foodle_dem_categories')['roles_show_democracy'][$poll_id] ) ? " checked='checked'" : "";
  else
    $foodle_roles_show_democracy_checked = '';
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['roles_show_foodle'][$poll_id]) ) )
    $foodle_roles_show_foodle_checked = ( get_option('foodle_dem_categories')['roles_show_foodle'][$poll_id] ) ? " checked='checked'" : "";
  else
    $foodle_roles_show_foodle_checked = " checked='checked'";
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['roles_show_comments'][$poll_id]) ) )
    $foodle_roles_show_comments_checked = ( get_option('foodle_dem_categories')['roles_show_comments'][$poll_id] ) ? " checked='checked'" : "";
  else
    $foodle_roles_show_comments_checked = " checked='checked'";
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['roles_do_comments'][$poll_id]) ) )
    $foodle_roles_do_comments_checked = ( get_option('foodle_dem_categories')['roles_do_comments'][$poll_id] ) ? " checked='checked'" : "";
  else
    $foodle_roles_do_comments_checked = ""; // for backward compatibility
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['roles_show_bar_graph'][$poll_id]) ) )
    $foodle_roles_show_bar_graph_checked = ( get_option('foodle_dem_categories')['roles_show_bar_graph'][$poll_id] ) ? " checked='checked'" : "";
  else
    $foodle_roles_show_bar_graph_checked = '';
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['roles_show_admin'][$poll_id]) ) )
    $foodle_roles_show_admin_checked = ( get_option('foodle_dem_categories')['roles_show_admin'][$poll_id] ) ? " checked='checked'" : "";
  else
    $foodle_roles_show_admin_checked = " checked='checked'";
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['event_use'][$poll_id]) ) ) {
    $foodle_event_use_checked = ( get_option('foodle_dem_categories')['event_use'][$poll_id] ) ? " checked='checked'" : "";
    $event_disable = ( get_option('foodle_dem_categories')['event_use'][$poll_id] ) ? "" : " disabled='disabled' ";
  } else {
    $foodle_event_use_checked = "";
    $event_disable = " disabled='disabled' ";
  }
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['event_auto'][$poll_id]) ) )
    $foodle_event_auto_checked = ( get_option('foodle_dem_categories')['event_auto'][$poll_id] ) ? " checked='checked'" : "";
  else
    $foodle_event_auto_checked = "";
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['event_summary'][$poll_id]) ) )
    $foodle_event_summary = get_option('foodle_dem_categories')['event_summary'][$poll_id];
  else
    $foodle_event_summary = "";
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['event_start'][$poll_id]) ) )
    $foodle_event_start = get_option('foodle_dem_categories')['event_start'][$poll_id];
  else
    $foodle_event_start = "";
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['event_end'][$poll_id]) ) )
    $foodle_event_end = get_option('foodle_dem_categories')['event_end'][$poll_id];
  else
    $foodle_event_end = "";
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['event_description'][$poll_id]) ) )
    $foodle_event_description = get_option('foodle_dem_categories')['event_description'][$poll_id];
  else
    $foodle_event_description = "";
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['event_location'][$poll_id]) ) )
    $foodle_event_location = get_option('foodle_dem_categories')['event_location'][$poll_id];
  else
    $foodle_event_location = "";
    if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['event_url'][$poll_id]) ) )
      $foodle_event_url = get_option('foodle_dem_categories')['event_url'][$poll_id];
    else
      $foodle_event_url = "";
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['ics_button_text'][$poll_id]) ) )
    $foodle_ics_button_text = get_option('foodle_dem_categories')['ics_button_text'][$poll_id];
  else
    $foodle_ics_button_text = "";
  // check whether comments exist for this poll
  $sql = "SELECT * FROM $wpdb->democracy_q WHERE id={$poll_id}";
  $get_foodle_poll = $wpdb->get_row($sql);
  $foodle_poll_comments = maybe_unserialize($get_foodle_poll->poll_comments); // if not yet filled
  if ( ! is_array($foodle_poll_comments) ) $foodle_poll_comments = array(); // if not yet filled
  $foodle_comments_exist_here = ( $foodle_poll_comments == array() ) ? false : true;

  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['category_column'][$poll_id]) ) )
    $poll_category_column = get_option('foodle_dem_categories')['category_column'][$poll_id];
  else
    $poll_category_column = ''; // if empty, use the first category as default category column

  $category_selection = __('Category & Parameter Selection','foodle-for-democracy-poll');
  $foodle_meta_fields = (array)get_option('foodle_meta_fields');

  $foodle_category_column_help = ( $foodle_help_tooltips ) ? " foodle_tooltip='".__('Define the category (see righthand) to be used as category column.<br>Whether displayed or not is being defined in the Foodle shortcode.','foodle-for-democracy-poll')."'" : "";
  $foodle_category_display_help = ( $foodle_help_tooltips ) ? " foodle_tooltip='".__('Define which of the categories to be displayed<br>underneath the answer columns.','foodle-for-democracy-poll')."'" : "";
  $foodle_sortbutton_help = ( $foodle_help_tooltips ) ? " foodle_tooltip='".__('Define the sortbutton text<br>for the Foodle table.','foodle-for-democracy-poll')."'" : "";
  $foodle_refreshbutton_help = ( $foodle_help_tooltips ) ? " foodle_tooltip='".__('Decide whether or not to show the \"refresh\" button in the results display<br>after voting and/or before voting. When e.g. in a simultaneous voting<br>situation, this would refresh the results when pressed.','foodle-for-democracy-poll')."'" : "";
  $foodle_count_marked_voters_help = ( $foodle_help_tooltips ) ? " foodle_tooltip='".__('Decide whether or not to count marked voters<br>in the total sum of an answer column.','foodle-for-democracy-poll')."'" : "";
  $foodle_send_category_selection_help = ( $foodle_help_tooltips ) ? " foodle_tooltip='".__('Submit your Foodle category & parameter<br>selections with this button.','foodle-for-democracy-poll')."'" : "";
  $foodle_delete_poll_IP_adresses_help = ( $foodle_help_tooltips ) ? " foodle_tooltip='".__('When set, IP addresses will not be stored for this poll, preserving<br>full functionality even when voters have the same IP address.<br>Logging and IP storage of Democracy Poll must remain activated!','foodle-for-democracy-poll')."'" : "";
  $foodle_send_comment_email_help = ( $foodle_help_tooltips ) ? " foodle_tooltip='".__('When set, an email notification will be sent to the admin upon<br>each new comment, comment change or deletion for this poll.<br>This is to be set individually for each poll.','foodle-for-democracy-poll')."'" : "";
  $foodle_roles_for_not_voted_help = ( $foodle_help_tooltips ) ? " foodle_tooltip='".__('Select the roles to see the bar graph tooltip, which displays users who did not vote so far.<br>Remark: The bar graph should of course be visible for the roles selected (check above).','foodle-for-democracy-poll')."'" : "";
  $foodle_select_roles_concerned_help = ( $foodle_help_tooltips ) ? " foodle_tooltip='".__('Select the roles concerned for this Foodle.<br>The selected roles are typically used for the reminder emails and for statistics.<br>You might want to use this feature for polls, which just concern selected roles.<br>For backward compatibility, with no role selected, all roles are considered concerned.','foodle-for-democracy-poll')."'" : "";
  $foodle_log_and_ip_help = ( $foodle_help_tooltips ) ? __('<strong>This is mandatory for Foodle to work!</strong><br>In order to overcome the restrictions<br>when voting with the same IP address,<br>you can prohibit IP address storage<br>for each poll individually.','foodle-for-democracy-poll') : ""; // special format due to introduction by .attr("foodle_tooltip","...")
  $foodle_registered_only_help = ( $foodle_help_tooltips ) ? __('Whether you select this one here as a general selection,<br>do this individually in each poll admin page or alternatively<br>only provide Foodle on pages accessible<br>just for registered users:<br><strong>The Foodle shortcode only makes sense for registered<br>voters! All other features will of course work :).</strong>','foodle-for-democracy-poll') : ""; // special format due to introduction by .attr("foodle_tooltip","...")
  $foodle_registered_only_alt_help = ( $foodle_help_tooltips ) ? __('Whether you select this one here individually, do this<br>generally in the democracy settings or alternatively<br>only provide Foodle on pages accessible<br>just for registered users:<br><strong>The Foodle shortcode only makes sense for registered<br>voters! All other features will of course work :).</strong>','foodle-for-democracy-poll') : ""; // special format due to introduction by .attr("foodle_tooltip","...")
  $foodle_ip_off_help_text = __("<strong>IP storage is off for this poll.</strong><br>Votes from same WLAN<br>are fine without issues.",'foodle-for-democracy-poll');
  $foodle_ip_off_help = ( true ) ? ' foodle_tooltip_touch=\"true\" foodle_tooltip=\"'.$foodle_ip_off_help_text.'\"' : ''; // " must be escaped here due to introduction by echo'append("...")';
  $foodle_ip_on_help_text = __("<strong>IP storage is ON for this poll!</strong><br>Votes from same WLAN<br>can generate issues!",'foodle-for-democracy-poll');
  $foodle_ip_on_help = ( true ) ? ' foodle_tooltip_touch=\"true\" foodle_tooltip=\"'.$foodle_ip_on_help_text.'\"' : ''; // " must be escaped here due to introduction by echo'append("...")';
  $foodle_comments_received_help_text = __("This poll did receive comments.",'foodle-for-democracy-poll');
  $foodle_comments_received_wemail_help_text = __("This poll did receive comments.<br>Email comment notifications are switched on for his poll.",'foodle-for-democracy-poll');
  $foodle_comments_received_help = ( true ) ? ' foodle_tooltip_touch=\"true\" foodle_tooltip=\"'.$foodle_comments_received_help_text.'\"' : ''; // " must be escaped here due to introduction by echo'append("...")';
  $foodle_comments_received_wemail_help = ( true ) ? ' foodle_tooltip_touch=\"true\" foodle_tooltip=\"'.$foodle_comments_received_wemail_help_text.'\"' : ''; // " must be escaped here due to introduction by echo'append("...")';
  $foodle_no_comments_received_help_text = __("This poll did not yet receive comments.",'foodle-for-democracy-poll');
  $foodle_no_comments_received_wemail_help_text = __("This poll did not yet receive comments.<br>Email comment notifications are switched on for this poll.",'foodle-for-democracy-poll');
  $foodle_no_comments_received_help = ( true ) ? ' foodle_tooltip_touch=\"true\" foodle_tooltip=\"'.$foodle_no_comments_received_help_text.'\"' : ''; // " must be escaped here due to introduction by echo'append("...")';
  $foodle_no_comments_received_wemail_help = ( true ) ? ' foodle_tooltip_touch=\"true\" foodle_tooltip=\"'.$foodle_no_comments_received_wemail_help_text.'\"' : ''; // " must be escaped here due to introduction by echo'append("...")';
  $foodle_textarea_help = ( $foodle_help_tooltips ) ? __('The Democracy Poll textarea.<br>The text herein will be displayed under the poll.<br>Shortcodes are welcome.<br><span style=\'color:#0047b3\'>For all foodle shortcodes with poll id parameter, e.g. [foodle-comments],<br>[foodle-link-democracy-poll] or [foodle-create-ics], id=\'self\' can be used here.</span>','foodle-for-democracy-poll') : ''; // No embedding foodle_tooltip=\"\" as this help will be inserted by jQuery attr();
  $foodle_insert_before_textarea_help = ( $foodle_help_tooltips ) ? ' foodle_tooltip=\"'.__('Insert the template before existing text<br>in the Democracy Poll textarea.','foodle-for-democracy-poll').'\"' : ''; // " must be escaped here due to introduction by echo'append("...")';
  $foodle_copy_textarea_help = ( $foodle_help_tooltips ) ? ' foodle_tooltip=\"'.__('Replace the whole Democracy Poll<br>textarea with the template.','foodle-for-democracy-poll').'\"' : ''; // " must be escaped here due to introduction by echo'append("...")';
  $foodle_insert_after_textarea_help = ( $foodle_help_tooltips ) ? ' foodle_tooltip=\"'.__('Insert the template after existing text<br>in the Democracy Poll textarea.','foodle-for-democracy-poll').'\"' : ''; // " must be escaped here due to introduction by echo'append("...")';
  $foodle_clear_textarea_help = ( $foodle_help_tooltips ) ? ' foodle_tooltip=\"'.__('Clear the Democracy Poll<br>textarea content.','foodle-for-democracy-poll').'\"' : ''; // " must be escaped here due to introduction by echo'append("...")';
  $foodle_roles_email_reminders_help = ( $foodle_help_tooltips ) ? ' foodle_tooltip=\"'.__('The roles selection will influence the reminder email recipients.<br><strong>Remark: Additional control through Foodle\'s \'Special Roles & Users\' tab</strong>.','foodle-for-democracy-poll').'\"' : ''; // " must be escaped here due to introduction by echo'append("...")';
  $foodle_roles_count_as_voters_help = ( $foodle_help_tooltips ) ? ' foodle_tooltip=\"'.__('The roles selected will be considered to be part of the pool of voters for a poll (bar graph / voting).<br><strong>Remark: Additional control for administrators with the next selection below</strong>.','foodle-for-democracy-poll').'\"' : ''; // " must be escaped here due to introduction by echo'append("...")';
  $foodle_roles_show_admin_help = ( $foodle_help_tooltips ) ? ' foodle_tooltip=\"'.__('Decide whether administrators shall really be considered to be part of the pool of voters (bar graph / voting)<br>when they are selected (left). By this, you can e.g. control the visibility without being \'in the game\'.<br><strong>Remark: Additional control through Foodle\'s \'Special Roles & Users\' tab (reminders)</strong>.','foodle-for-democracy-poll').'\"' : ''; // " must be escaped here due to introduction by echo'append("...")';
  $foodle_roles_show_democracy_help = ( $foodle_help_tooltips ) ? ' foodle_tooltip=\"'.__('Decide whether the roles selection will influence the Democracy Poll visibility.','foodle-for-democracy-poll').'\"' : ''; // " must be escaped here due to introduction by echo'append("...")';
  $foodle_roles_show_foodle_help = ( $foodle_help_tooltips ) ? ' foodle_tooltip=\"'.__('Decide whether the roles selection will influence the Foodle visibility.<br><strong>Remark: Foodle will only be visible for logged-in users.</strong>','foodle-for-democracy-poll').'\"' : ''; // " must be escaped here due to introduction by echo'append("...")';
  $foodle_roles_show_comments_help = ( $foodle_help_tooltips ) ? ' foodle_tooltip=\"'.__('Decide whether the roles selection will influence the comments visibility.<br><strong>Remark: Comments will only be visible for logged-in users.</strong>','foodle-for-democracy-poll').'\"' : ''; // " must be escaped here due to introduction by echo'append("...")';
  $foodle_roles_do_comments_help = ( $foodle_help_tooltips ) ? ' foodle_tooltip=\"'.__('Decide whether the roles selection will influence being able to enter new comments.<br>Remark: The textarea for new comments must be visible (check above the general<br>visibility of comments).','foodle-for-democracy-poll').'\"' : ''; // " must be escaped here due to introduction by echo'append("...")';
  $foodle_roles_show_bar_graph_help = ( $foodle_help_tooltips ) ? ' foodle_tooltip=\"'.__('Decide whether the roles selection will influence the bar graph visibility.<br><strong>Remark: The bar graph will only be visible for logged-in users.</strong>','foodle-for-democracy-poll').'\"' : ''; // " must be escaped here due to introduction by echo'append("...")';
  $foodle_event_help = ( $foodle_help_tooltips ) ? ' foodle_tooltip=\"'.__('<strong>Should this be an event poll:</strong><br>Enter the related data.<br>Shortcode [foodle-create-ics] will use this data in case you determine the poll id.<br>However, shortcode definitions will overwrite the related data herein!','foodle-for-democracy-poll').'\"' : ''; // " must be escaped here due to introduction by echo'append("...")';
  $foodle_event_use_help = ( $foodle_help_tooltips ) ? ' foodle_tooltip=\"'.__('Check here if this poll concerns an event.','foodle-for-democracy-poll').'\"' : ''; // " must be escaped here due to introduction by echo'append("...")';
  $foodle_event_auto_help = ( $foodle_help_tooltips ) ? ' foodle_tooltip=\"'.__('Check here if an automatic ICS download<br>button shall be generated.','foodle-for-democracy-poll').'\"' : ''; // " must be escaped here due to introduction by echo'append("...")';
  $foodle_event_summary_help = ( $foodle_help_tooltips ) ? ' foodle_tooltip=\"'.__('<strong>Should this be an event poll:</strong><br>Determine the event summary/title.<br>Remember: shortcode definitions will overwrite the<br>related data herein (must not be empty at the end)!','foodle-for-democracy-poll').'\"' : ''; // " must be escaped here due to introduction by echo'append("...")';
  $foodle_event_start_help = ( $foodle_help_tooltips ) ? ' foodle_tooltip=\"'.__('<strong>Should this be an event poll:</strong><br>Determine the event start date/time.<br>Remember: shortcode definitions will overwrite the<br>related data herein (must not be empty at the end)!','foodle-for-democracy-poll').'\"' : ''; // " must be escaped here due to introduction by echo'append("...")';
  $foodle_event_end_help = ( $foodle_help_tooltips ) ? ' foodle_tooltip=\"'.__('<strong>Should this be an event poll:</strong><br>Determine the event end date/time.<br>Remember: shortcode definitions will<br>overwrite the related data herein!','foodle-for-democracy-poll').'\"' : ''; // " must be escaped here due to introduction by echo'append("...")';
  $foodle_event_description_help = ( $foodle_help_tooltips ) ? ' foodle_tooltip=\"'.__('<strong>Should this be an event poll:</strong><br>Determine the event description.<br>Remember: shortcode definitions will<br>overwrite the related data herein!','foodle-for-democracy-poll').'\"' : ''; // " must be escaped here due to introduction by echo'append("...")';
  $foodle_event_location_help = ( $foodle_help_tooltips ) ? ' foodle_tooltip=\"'.__('<strong>Should this be an event poll:</strong><br>Determine the event\'s location.<br>Remember: shortcode definitions will<br>overwrite the related data herein!','foodle-for-democracy-poll').'\"' : ''; // " must be escaped here due to introduction by echo'append("...")';
  $foodle_event_url_help = ( $foodle_help_tooltips ) ? ' foodle_tooltip=\"'.__('<strong>Should this be an event poll:</strong><br>Determine the event URL.<br>Remember: shortcode definitions will<br>overwrite the related data herein!','foodle-for-democracy-poll').'\"' : ''; // " must be escaped here due to introduction by echo'append("...")';
  $foodle_ics_button_text_help = ( $foodle_help_tooltips ) ? ' foodle_tooltip=\"'.__('<strong>Should this be an event poll:</strong><br>You may define an individual ics button text here.<br>If empty, the standard text will be used.<br>Remember: shortcode definitions will overwrite<br>the related data herein!','foodle-for-democracy-poll').'\"' : ''; // " must be escaped here due to introduction by echo'append("...")';

  $foodle_dem_poll_form = "
  <p id='foodle_dem_poll_form' style='margin:30px; padding:0px;'></p>
    <h2>".$foodle_title." ".$category_selection."</h2>
    <form class='foodle-dem-poll-form' style='margin:0px; padding:10px 20px;' action='".admin_url( 'admin.php?page=foodle-admin-page' )."' method='post'>
    <table style='border-collapse:collapse;'><tbody><tr><th style='text-align:right; padding-right:20px;padding-bottom:8px;'".$foodle_category_column_help.">".__('Use as<br>Category Column','foodle-for-democracy-poll')."</th><th style='text-align:left; padding-left:20px; padding-bottom:8px;'".$foodle_category_display_help.">".__('Category display<br>per Answer Column','foodle-for-democracy-poll')."</th></tr>";
  $category_count = -1; // to get 0 after the first iteration
  if ( count($foodle_meta_fields) == 0 ) $foodle_dem_poll_form .= "<tr><td colspan='2'>".__('No metafields to select from for this poll, yet!','foodle-for-democracy-poll')."</td></tr>";
  foreach($foodle_meta_fields as $foodle_category => $foodle_category_data) {
    $foodle_category_data []= ''; // avoid an error as there's a new field (version 1.8.4.0)
    $category_count += 1;
    $foodle_category_id = str_replace('.', '€', str_replace(' ', '_', $foodle_category));
    $foodle_category_attr = '';
    $foodle_category_column_attr = '';
    $foodle_category_style = '';
    $foodle_category_column_style = '';
    $foodle_label_style = '';
    $external_color = 'steelblue';
    $foodle_category_column_checked = ( $poll_category_column == $foodle_category ) ? "checked='checked'" : "";
    $foodle_checked = ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')[$poll_id]) ) && ( in_array($foodle_category, (array)get_option('foodle_dem_categories')[$poll_id]) ) ) ? " checked='checked'" : "";
    $foodle_disabled_selection = false;
    if ( $foodle_category_data[2] == 'no' ) {
      if ( $foodle_checked != "" ) $foodle_disabled_selection = true;
      $foodle_category_attr = " disabled='disabled'";
      $foodle_category_style = "cursor:not-allowed;";
      $foodle_label_style = "color:darkred; cursor:default;";
      $external_color = "darkred";
    }
    if ( $foodle_category_data[3] == 'no' ) {
      if ( $foodle_category_column_checked != "" ) $foodle_disabled_selection = true;
      $foodle_category_column_attr = " disabled='disabled'";
      $foodle_category_column_style = "cursor:not-allowed;";
      $foodle_label_style = "color:darkred; cursor:default;";
      $external_color = "darkred";
    }
    $foodle_label_txt = ( $foodle_disabled_selection ) ? " (".__('Disabled selections will not be stored upon saving','foodle-for-democracy-poll').")" : "" ;
    if ( strpos($foodle_category, '••') === 0 )
        $foodle_category_display = "<span style='color:".$external_color."'>".str_replace('••', '', $foodle_category)." (".__('existing field','foodle-for-democracy-poll').")</span>";
      else
        $foodle_category_display = $foodle_category;
    $foodle_dem_poll_form .= "
      <tr>
        <td style='text-align:right;border-top:1px solid LightGrey;padding-top:auto;padding-bottom:auto;padding-left:auto;padding-right:20px;'".$foodle_category_column_help."><input type='radio' style='".$foodle_category_column_style."' name='foodle_dem_category_column' value='".$foodle_category."' ".$foodle_category_column_attr.$foodle_category_column_checked." /></td>
        <td style='text-align:left;border-top:1px solid LightGrey;padding-top:6px;padding-bottom:6px;padding-left:24px;padding-right:auto;'".$foodle_category_display_help."><label style='".$foodle_label_style."'><input type='checkbox' style='".$foodle_category_style."' id='".$foodle_category_id."' name='foodle_dem_categories[]' value='".$foodle_category."' ".$foodle_category_attr.$foodle_checked." />".$foodle_category_display.$foodle_label_txt."</label></td>
      </tr>
    ";
  }
  $foodle_dem_poll_form .= "
    </tbody></table>
    <br>
    <label".$foodle_sortbutton_help."><strong>".$foodle_sorting_button_text."</strong><br><input type='text' name='sorting_button_text' value='".$poll_sorting_button_text."' placeholder='".$foodle_sorting."'/></label>
    <br><br>
    <label".$foodle_refreshbutton_help."><input type='checkbox' name='democracy_refresh_button_voted' value='yes'".$democracy_refresh_button_voted_checked."/><strong>".$foodle_show_refresh_button_voted."</strong></label>
    <br><br>
    <label".$foodle_refreshbutton_help."><input type='checkbox' name='democracy_refresh_button_not_voted' value='yes'".$democracy_refresh_button_not_voted_checked."/><strong>".$foodle_show_refresh_button_not_voted."</strong></label>
    <br><br>
    <label".$foodle_count_marked_voters_help."><input type='checkbox' name='democracy_count_marked_voters' value='yes'".$democracy_count_marked_voters_checked."/><strong>".$foodle_count_marked_voters."</strong></label>
    <br><br>
    <label".$foodle_delete_poll_IP_adresses_help."><input type='checkbox' name='democracy_delete_poll_IP_addresses' value='yes'".$democracy_delete_poll_IP_addresses_checked."/><strong>".$foodle_delete_poll_IP_addresses."</strong></label>
    <br><br>
    <label".$foodle_send_comment_email_help."><input type='checkbox' name='democracy_send_comment_email' value='yes'".$democracy_send_comment_email_checked."/><strong>".$foodle_send_comment_email."</strong></label>
    <br><br>
    <table style='border:1px solid #e4e4e4;border-radius:4px;border-spacing:6px;border-collapse:separate;background-color:#f4f4f4;'><tbody>
    <tr><th colspan='2'><span".$foodle_select_roles_concerned_help."><strong>".$foodle_select_roles_concerned."</strong></span><br></th></tr><tr>
    <td style='border-width:0px;padding:0px;'><select".$foodle_select_roles_concerned_help." style='font-size:0.8em;' id='foodle-roles-concerned' name='foodle_roles_concerned[]' size='12' multiple>";
  $sql = "SELECT * FROM $wpdb->democracy_q WHERE id={$poll_id}";
  $current_roles_concerned = maybe_unserialize($wpdb->get_row($sql)->roles_concerned); // if not yet filled
  if ( ! is_array($current_roles_concerned) ) $current_roles_concerned = array(); // if not yet filled
  foreach ( $wp_roles->role_names as $foodle_role_key=>$foodle_role_value) {
    $foodle_role_selected = ( in_array($foodle_role_key,$current_roles_concerned) ) ? "selected='selected'" : "";
    $foodle_dem_poll_form .= "<option value='".$poll_id."|".$foodle_role_key."' ".$foodle_role_selected.">"._x($foodle_role_value,'User role')."</option>";
  }
  // Add a hidden field to identify the roles selection, even if no role was selected. A bit redundant, as no entry in the database equals an empty array entry.
  $foodle_dem_poll_form .= "
    </select></td>
    <td style='border-width:0px;padding:auto; padding-left:10px;'>
    <label".$foodle_roles_email_reminders_help."><input type='checkbox' name='no-name-no-function2' value='no' disabled='disabled' checked='checked' /><strong>".$foodle_democracy_email_reminders_users."</strong></label>
    <br><br>
    <label".$foodle_roles_count_as_voters_help."><input type='checkbox' name='no-name-no-function1' value='no' disabled='disabled' checked='checked' /><strong>".$foodle_democracy_count_as_voters_users."</strong></label>
    <br><br>
    <span style='display:inline-block;width:20px;'>&nbsp;</span><label".$foodle_roles_show_admin_help."><input type='checkbox' name='foodle_roles_show_admin' value='yes'".$foodle_roles_show_admin_checked."/><strong>".$foodle_select_roles_admin."</strong></label>
    <hr style='height:1px;border-width:0;color:#e0e0e0;background-color:#e0e0e0;margin: 10px 0px 10px 0px;width:100%;' />
    <label".$foodle_roles_show_democracy_help."><input type='checkbox' name='foodle_roles_show_democracy' value='yes'".$foodle_roles_show_democracy_checked."/><strong>".$foodle_select_roles_democracy."</strong></label>
    <br><br>
    <label".$foodle_roles_show_foodle_help."><input type='checkbox' name='foodle_roles_show_foodle' value='yes'".$foodle_roles_show_foodle_checked."/><strong>".$foodle_select_roles_foodle."</strong></label>
    <br><br>
    <label".$foodle_roles_show_comments_help."><input type='checkbox' name='foodle_roles_show_comments' id='foodle_roles_show_comments' value='yes'".$foodle_roles_show_comments_checked."/><strong>".$foodle_select_roles_comments."</strong></label>
    <br><br>
    <span style='display:inline-block;width:20px;'>&nbsp;</span><label".$foodle_roles_do_comments_help."><input type='checkbox' name='foodle_roles_do_comments' id='foodle_roles_do_comments' value='yes'".$foodle_roles_do_comments_checked."/><strong>".$foodle_select_roles_do_comments."</strong></label>
    <br><br>
    <label".$foodle_roles_show_bar_graph_help."><input type='checkbox' name='foodle_roles_show_bar_graph' id='foodle_roles_show_bar_graph' value='yes'".$foodle_roles_show_bar_graph_checked."/><strong>".$foodle_select_roles_bar_graph."</strong></label>
    </td></tr></tbody></table>
    <input type='hidden' name='foodle_roles_concerned[]' value='".$poll_id."|*'/>
    <br><br>
    <table style='border:1px solid #e4e4e4;border-radius:4px;border-spacing:6px;border-collapse:separate;background-color:#f4f4f4;'><tbody>
    <tr><th colspan='2'><span".$foodle_roles_for_not_voted_help."><strong>".$foodle_select_roles_for_not_voted."</strong></span><br></th></tr>
    <tr><td style='border-width:0px;padding:0px;'>
    <select".$foodle_roles_for_not_voted_help." style='font-size:0.8em;' id='foodle-roles-for-not-voted' name='foodle_roles_for_not_voted[]' size='12' multiple>";
  foreach ( $wp_roles->role_names as $foodle_role_key=>$foodle_role_value) {
    $foodle_role_selected = ( in_array($foodle_role_key,$foodle_roles_for_not_voted) ) ? "selected='selected'" : "";
    $foodle_dem_poll_form .= "<option value='".$poll_id."|".$foodle_role_key."' ".$foodle_role_selected.">"._x($foodle_role_value,'User role')."</option>";
  }
  // Add a potential warning and a hidden field to identify the roles selection, even if no role was selected. A bit redundant, as no entry in the option equals an empty array entry.
  $foodle_dem_poll_form .= "
    </select>
    </td><td><span id='foodle_bar_graph_roles_visibility_does_not_match' style='color:DarkGoldenrod;'>".__('<strong>Warning:</strong><br>The saved tooltip roles selection does not match<br>the saved bar graph visibility (check above)!','foodle-for-democracy-poll')."</span></td></tr>
    </tbody><table>
    <br><br>
    <table style='border:1px solid #e4e4e4;border-radius:4px;border-spacing:6px;border-collapse:separate;background-color:#f4f4f4;'><tbody>
    <tr><th colspan='2'><span".$foodle_event_help."><strong>".$foodle_select_event."</strong></span><br></th></tr>
    <tr><td style='border-width:0px;padding:0px;'>
    <br>
    <label".$foodle_event_use_help."><strong>".$foodle_select_event_use."</strong><br><input id='event_use_switch' type='checkbox' name='event_use'  value='yes'".$foodle_event_use_checked."/></label>
    <br><br>
    <label".$foodle_event_auto_help."><strong>".$foodle_select_event_auto."</strong><br><input ".$event_disable." class='event_use' type='checkbox' name='event_auto'  value='yes'".$foodle_event_auto_checked."/></label>
    <br><br>
    <label".$foodle_event_summary_help."><strong>".$foodle_select_event_summary."</strong><br><input ".$event_disable." class='event_use' type='text' size='60' name='event_summary' value='".$foodle_event_summary."' placeholder='"."'/></label>
    <br><br>
    <label".$foodle_event_start_help."><strong>".$foodle_select_event_start."</strong><br><input ".$event_disable." class='event_use' type='datetime-local' name='event_start' value='".$foodle_event_start."' placeholder='"."'/></label>
    <br><br>
    <label".$foodle_event_end_help."><strong>".$foodle_select_event_end."</strong><br><input ".$event_disable." class='event_use' type='datetime-local' name='event_end' value='".$foodle_event_end."' placeholder='"."'/></label>
    <br><br>
    <label".$foodle_event_description_help."><strong>".$foodle_select_event_description."</strong><br><input ".$event_disable." class='event_use' type='text' size='60' name='event_description' value='".$foodle_event_description."' placeholder='"."'/></label>
    <br><br>
    <label".$foodle_event_location_help."><strong>".$foodle_select_event_location."</strong><br><input ".$event_disable." class='event_use' type='text' size='60' name='event_location' value='".$foodle_event_location."' placeholder='"."'/></label>
    <br><br>
    <label".$foodle_event_url_help."><strong>".$foodle_select_event_url."</strong><br><input ".$event_disable." class='event_use' type='text' size='60' name='event_url' value='".$foodle_event_url."' placeholder='"."'/></label>
    <br><br>
    <label".$foodle_ics_button_text_help."><strong>".$foodle_select_ics_button_text."</strong><br><input ".$event_disable." class='event_use' type='text' size='60' name='ics_button_text' value='".$foodle_ics_button_text."' placeholder='"."'/></label>
    </td></tr>
    </tbody><table>
    <input type='hidden' name='foodle_roles_for_not_voted[]' value='".$poll_id."|*'/>
    <br><br><br>
    <input type='hidden' name='democracy_url' value='\" + window.location.href + \"'/>
    <input".$foodle_send_category_selection_help." type='submit' class='button-primary' name='select_poll_categories' value='".__('Submit category & parameter selection','foodle-for-democracy-poll')."...'";
    if ( ! $foodle_no_safety_query ) $foodle_dem_poll_form .= " onclick='return foodle_confirm_category_save();'";
    $foodle_dem_poll_form .= "/></form>
  ";
  $foodle_dem_poll_announce = "
  <p style='margin:40px; padding:0px;'></p>
    <h2>".$foodle_title." ".$category_selection."</h2>
    <p style='margin:0px; padding:10px 20px;'>".__('Category and parameter selection will be available, once the poll was created','foodle-for-democracy-poll')."</p>
  ";
  $foodle_icon_wlan_ok_help = " foodle_tooltip_touch='true' foodle_tooltip = '".$foodle_ip_off_help_text."'";
  $foodle_icon_wlan_no_help = " foodle_tooltip_touch='true' foodle_tooltip = '".$foodle_ip_on_help_text."'";
  $foodle_icon_comments_yes_help = " foodle_tooltip_touch='true' foodle_tooltip = '".$foodle_comments_received_help_text."'";
  $foodle_icon_comments_yes_wemail_help = " foodle_tooltip_touch='true' foodle_tooltip = '".$foodle_comments_received_wemail_help_text."'";
  $foodle_icon_comments_no_help = " foodle_tooltip_touch='true' foodle_tooltip = '".$foodle_no_comments_received_help_text."'";
  $foodle_icon_comments_no_wemail_help = " foodle_tooltip_touch='true' foodle_tooltip = '".$foodle_no_comments_received_wemail_help_text."'";
  $foodle_icon_votes_complete_help = " foodle_tooltip_touch='true' foodle_tooltip = '".__('Everyone voted already.','foodle-for-democracy-poll')."'";
  $foodle_icon_not_voted_yet_help = " foodle_tooltip_touch='true' foodle_tooltip = '".__('Not everyone voted so far.','foodle-for-democracy-poll')."'";
  $foodle_icon_nobody_to_vote_help = " foodle_tooltip_touch='true' foodle_tooltip = '".__('The number of users to vote is zero.','foodle-for-democracy-poll')."'";
  $foodle_icon_votes_error_help = " foodle_tooltip_touch='true' foodle_tooltip = '".__('An unexpected voter did vote or the<br>participation rate exceeds 100%.','foodle-for-democracy-poll')."'";
  $foodle_icon_foodle_parameters_not_fully_saved_help = " foodle_tooltip_touch='true' foodle_tooltip = '".__('NOT all (maybe the brandnew) Foodle poll parameters have been saved so far, so they are still in their programmed default state.','foodle-for-democracy-poll')."'";
  $foodle_comments_visualize_help = "&nbsp;<span foodle_tooltip_touch='true' foodle_tooltip = '".__('Received comments will be<br>visualized as a tooltip.','foodle-for-democracy-poll')."'>(&#x1F441;)</span>";
  $foodle_not_voted_visualize_help = "&nbsp;<span foodle_tooltip_touch='true' foodle_tooltip = '".__('A list of users who did not yet vote<br>will be visualized as a tooltip.','foodle-for-democracy-poll')."'>(&#x1F441;)</span>";
  echo '
    <script type="text/javascript" id="foodle-add-category-selection-to-democracy-poll">
      var $ = jQuery;

      function foodle_confirm_category_save() { return confirm("'.__('Are you sure to submit the category & parameter selection?','foodle-for-democracy-poll').'") }

      $(document).ready( function() {
        var foodle_href_check = window.location.href;
        $(".new-poll-answers").before("<p style=\'margin:0px 25px; padding:0px;\'>('.__('Use','foodle-for-democracy-poll').' •• '.__('as first two digits of an answer to identify it as \'radio\' selection inside a \'multiple answers\' poll','foodle-for-democracy-poll').')</p>");
        $("input[name=dmc_multiple]").parent().append("&nbsp;('.__('The use of •• as first two digits of an answer will make a difference if this option is active!','foodle-for-democracy-poll').')");
        $foodle_log_message="'.foodle_check_keeping_logs().'";
        if ( foodle_href_check.indexOf("&edit_poll=") != -1 ) {
          $(".button-primary").addClass("foodle-democracy-button");
        }
        if ( foodle_href_check.indexOf("&subpage=add_new") == -1 ) {
          $("textarea[name=dmc_note]").parent("label").find(".description").remove();
          $("textarea[name=dmc_note]").attr("foodle_tooltip","'.$foodle_textarea_help.'");
          $("textarea[name=dmc_note]").css({"transition":"0.15s","transition-delay":"0.15s","min-height":"3.5em","height":"3.5em","overflow":"hidden","color":"#0047b3"}).prop("placeholder","'.__('The text herein will be displayed under the poll. Shortcodes are welcome.','foodle-for-democracy-poll').'");
          $("textarea[name=dmc_note]").focusin( function() {
            setTimeout(function(){
              $("textarea[name=dmc_note]").css("height","3.5em");
              setTimeout(function(){
                $("textarea[name=dmc_note]").css("height",($("textarea[name=dmc_note]").prop("scrollHeight") + 10) + "px");
              },100);
            },100);
          });
          $("textarea[name=dmc_note]").focusout( function() {
            $(this).css("height","3.5em");
          });
          $("textarea[name=dmc_note]").on("input", function() {
            $(this).css("height","");
            $(this).css("height",($(this).prop("scrollHeight") + 10) + "px");
          });
          $("textarea[name=dmc_note]").parent("label").after("<p><img '.$foodle_democracy_textarea_template_style.' id=\"foodle-template-insert-before\"'.$foodle_insert_before_textarea_help.' src=\"'.plugin_dir_url(__FILE__).'img/insert before.png'.'\" height=\"30\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img '.$foodle_democracy_textarea_template_style.' id=\"foodle-template-copy\"'.$foodle_copy_textarea_help.' src=\"'.plugin_dir_url(__FILE__).'img/copy.png'.'\" height=\"30\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img '.$foodle_democracy_textarea_template_style.' id=\"foodle-template-insert-after\"'.$foodle_insert_after_textarea_help.' src=\"'.plugin_dir_url(__FILE__).'img/insert after.png'.'\" height=\"30\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img '.$foodle_democracy_textarea_clear_style.' id=\"foodle-textarea-clear\"'.$foodle_clear_textarea_help.' src=\"'.plugin_dir_url(__FILE__).'img/delete.png'.'\" height=\"30\"></p>");
          $(".dem-new-poll").before($foodle_log_message);
          $(".dempolls").before($foodle_log_message);
          $(".demlogs").before($foodle_log_message);
          $("input[name*=\'dmc_forusers\'").parent().attr("foodle_tooltip","'.$foodle_registered_only_alt_help.'");
          if ( foodle_href_check.indexOf("&subpage=") == -1 ) {
            $(".dempolls").before("<span class=\'foodle-icon-info\' style=\'font-size:0.85em;opacity:0.7;\'>&nbsp;'.__('Mouse-hover or touch (here and below)','foodle-for-democracy-poll').':&nbsp;&nbsp; <img'.$foodle_icon_wlan_ok_help.' src=\''.plugin_dir_url(__FILE__).'img/same_wlan_ok.png\' width=\'17\'>&nbsp;<img'.$foodle_icon_wlan_no_help.' src=\''.plugin_dir_url(__FILE__).'img/same_wlan_no.png\' width=\'17\'> '.__('IPs storage status','foodle-for-democracy-poll').'&nbsp;&nbsp; •&nbsp;&nbsp;&nbsp;<img'.$foodle_icon_comments_yes_help.' src=\''.plugin_dir_url(__FILE__).'img/comments__yes.png\' width=\'17\'>&nbsp;<img'.$foodle_icon_comments_yes_wemail_help.' src=\''.plugin_dir_url(__FILE__).'img/comments__yes_wemail.png\' width=\'17\'>&nbsp;<img'.$foodle_icon_comments_no_help.' src=\''.plugin_dir_url(__FILE__).'img/comments__no.png\' width=\'17\'>&nbsp;<img'.$foodle_icon_comments_no_wemail_help.' src=\''.plugin_dir_url(__FILE__).'img/comments__no_wemail.png\' width=\'17\'> '.__('Comments status','foodle-for-democracy-poll').$foodle_comments_visualize_help.'&nbsp;&nbsp; •&nbsp;&nbsp;&nbsp;<img'.$foodle_icon_votes_complete_help.' src=\''.plugin_dir_url(__FILE__).'img/votes_complete.png\' width=\'17\'>&nbsp;<img'.$foodle_icon_not_voted_yet_help.' src=\''.plugin_dir_url(__FILE__).'img/not_voted_yet.png\' width=\'17\'>&nbsp;<img'.$foodle_icon_nobody_to_vote_help.' src=\''.plugin_dir_url(__FILE__).'img/nobody_to_vote.png\' width=\'17\'>&nbsp;<img'.$foodle_icon_votes_error_help.' src=\''.plugin_dir_url(__FILE__).'img/votes_error.png\' width=\'17\'>&nbsp;<img'.$foodle_icon_foodle_parameters_not_fully_saved_help.' src=\''.plugin_dir_url(__FILE__).'img/foodle_parameters_not_fully_saved.png\' width=\'17\'> '.__('Poll participation/warning status','foodle-for-democracy-poll').$foodle_not_voted_visualize_help.'<br>");
            if ( $("td.column-id").length > 7 ) $(".dempolls").after("<span class=\'foodle-icon-info\' style=\'display:inline-block;margin-top:4px;font-size:0.85em;opacity:0.7;\'>&nbsp;'.__('Mouse-hover or touch (here and above)','foodle-for-democracy-poll').':&nbsp;&nbsp; <img'.$foodle_icon_wlan_ok_help.' src=\''.plugin_dir_url(__FILE__).'img/same_wlan_ok.png\' width=\'17\'>&nbsp;<img'.$foodle_icon_wlan_no_help.' src=\''.plugin_dir_url(__FILE__).'img/same_wlan_no.png\' width=\'17\'> '.__('IPs storage status','foodle-for-democracy-poll').'&nbsp;&nbsp; •&nbsp;&nbsp;&nbsp;<img'.$foodle_icon_comments_yes_help.' src=\''.plugin_dir_url(__FILE__).'img/comments__yes.png\' width=\'17\'>&nbsp;<img'.$foodle_icon_comments_yes_wemail_help.' src=\''.plugin_dir_url(__FILE__).'img/comments__yes_wemail.png\' width=\'17\'>&nbsp;<img'.$foodle_icon_comments_no_help.' src=\''.plugin_dir_url(__FILE__).'img/comments__no.png\' width=\'17\'>&nbsp;<img'.$foodle_icon_comments_no_wemail_help.' src=\''.plugin_dir_url(__FILE__).'img/comments__no_wemail.png\' width=\'17\'> '.__('Comments status','foodle-for-democracy-poll').$foodle_comments_visualize_help.'&nbsp;&nbsp; •&nbsp;&nbsp;&nbsp;<img'.$foodle_icon_votes_complete_help.' src=\''.plugin_dir_url(__FILE__).'img/votes_complete.png\' width=\'17\'>&nbsp;<img'.$foodle_icon_not_voted_yet_help.' src=\''.plugin_dir_url(__FILE__).'img/not_voted_yet.png\' width=\'17\'>&nbsp;<img'.$foodle_icon_nobody_to_vote_help.' src=\''.plugin_dir_url(__FILE__).'img/nobody_to_vote.png\' width=\'17\'>&nbsp;<img'.$foodle_icon_votes_error_help.' src=\''.plugin_dir_url(__FILE__).'img/votes_error.png\' width=\'17\'>&nbsp;<img'.$foodle_icon_foodle_parameters_not_fully_saved_help.' src=\''.plugin_dir_url(__FILE__).'img/foodle_parameters_not_fully_saved.png\' width=\'17\'> '.__('Poll participation/warning status','foodle-for-democracy-poll').$foodle_not_voted_visualize_help.'<br>");
            $foodle_ID_IP_list = [];
            $foodle_comment_list = [];
            $foodle_comment_email_list = [];
            $foodle_icon_list = [];';
        if ( ! $foodle_no_safety_query ) echo '$(".button-primary").attr("onclick","return confirm(\"'.__('Are you sure to save the Democracy poll?','foodle-for-democracy-poll').'\");")';
        if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['delete_poll_IP_addresses']) ) ) {
          foreach(get_option('foodle_dem_categories')['delete_poll_IP_addresses'] as $foodle_poll_ID=>$foodle_poll_IP) {
            // Check whether IP storage is on or off and make it known to javascript
            if ( $foodle_poll_IP ) $foodle_poll_IP = 1; else $foodle_poll_IP = 0;
            echo '
            $foodle_ID_IP_list["'.$foodle_poll_ID.'"] = '.$foodle_poll_IP.';';
            // Check whether comments exist and make it known to javascript
            $sql = "SELECT * FROM $wpdb->democracy_q WHERE id={$foodle_poll_ID}";
            $get_foodle_poll = $wpdb->get_row($sql);
            $foodle_poll_comments = maybe_unserialize($get_foodle_poll->poll_comments); // if not yet filled
            if ( ! is_array($foodle_poll_comments) ) $foodle_poll_comments = array(); // if not yet filled
            if ( $foodle_poll_comments == array() ) $foodle_comments_exist = 0; else $foodle_comments_exist = 1;
            if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['send_comment_email'][$foodle_poll_ID]) ) && ( get_option('foodle_dem_categories')['send_comment_email'][$foodle_poll_ID] ) ) $foodle_comments_email = 1; else $foodle_comments_email = 0;
            $foodle_poll_vote_participation_icon = ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['roles_for_not_voted'][$foodle_poll_ID]) ) ) ? foodle_get_poll_vote_participation_icon($foodle_poll_ID) : 'img/foodle_parameters_not_fully_saved.png' ; // ALWAYS PUT HERE THE FOODLE POLL PARAMETER OF get_option('foodle_dem_categories') THAT WAS INTRODUCED LAST !!!
            echo '
              $foodle_comment_list["'.$foodle_poll_ID.'"] = '.$foodle_comments_exist.';
              $foodle_comment_email_list["'.$foodle_poll_ID.'"] = '.$foodle_comments_email.';
              $foodle_icon_list["'.$foodle_poll_ID.'"] = "'.$foodle_poll_vote_participation_icon.'";
            ';
          }
        }
        echo '
            $("td.column-id").each(function(){
              $foodle_poll_ID = $(this).html().substr(0,$(this).html().indexOf("<button"));
              if ( $foodle_ID_IP_list[$foodle_poll_ID] == 1 ) $(this).append("<br /><img align=\"right\"'.$foodle_ip_off_help.' src=\"'.plugin_dir_url(__FILE__).'img/same_wlan_ok.png'.'\">"); else $(this).append("<br /><img align=\"right\"'.$foodle_ip_on_help.' src=\"'.plugin_dir_url(__FILE__).'img/same_wlan_no.png'.'\">");
              if ( $foodle_comment_email_list[$foodle_poll_ID] == 1 )
                { if ( $foodle_comment_list[$foodle_poll_ID] == 1 ) $(this).append("<br /><img style=\"margin-top:3px;width:25px;\" align=\"right\" foodle_com_tooltip=\"" + $foodle_poll_ID + "\" src=\"'.plugin_dir_url(__FILE__).'img/comments__yes_wemail.png'.'\" />"); else $(this).append("<br /><img style=\"margin-top:3px;width:25px;\" align=\"right\"'.$foodle_no_comments_received_wemail_help.' src=\"'.plugin_dir_url(__FILE__).'img/comments__no_wemail.png'.'\" />"); }
              else
                { if ( $foodle_comment_list[$foodle_poll_ID] == 1 ) $(this).append("<br /><img style=\"margin-top:3px;width:25px;\" align=\"right\" foodle_com_tooltip=\"" + $foodle_poll_ID + "\" src=\"'.plugin_dir_url(__FILE__).'img/comments__yes.png'.'\" />"); else $(this).append("<br /><img style=\"margin-top:3px;width:25px;\" align=\"right\"'.$foodle_no_comments_received_help.' src=\"'.plugin_dir_url(__FILE__).'img/comments__no.png'.'\" />"); }
              if ( $foodle_icon_list[$foodle_poll_ID] !== undefined ) $(this).append("<br /><img style=\"margin-top:3px;width:25px;\" align=\"right\" foodle_non_voters_tooltip=\"" + $foodle_poll_ID + "\" src=\"'.plugin_dir_url(__FILE__).'" + $foodle_icon_list[$foodle_poll_ID] + "\">");
                else $(this).append("<br /><img style=\"margin-top:3px;width:25px;\" align=\"right\" foodle_non_voters_tooltip=\"" + $foodle_poll_ID + "\" src=\"'.plugin_dir_url(__FILE__).'img/foodle_parameters_not_fully_saved.png\">");
            });
          }';

          // determine the correct poll participation icon
          $foodle_poll_vote_participation_icon = ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['roles_for_not_voted'][$poll_id]) ) ) ? foodle_get_poll_vote_participation_icon($poll_id) : 'img/foodle_parameters_not_fully_saved.png' ; // ALWAYS PUT HERE THE FOODLE POLL PARAMETER OF get_option('foodle_dem_categories') THAT WAS INTRODUCED LAST !!!
          $foodle_poll_comment_email = ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['send_comment_email'][$poll_id]) ) && ( get_option('foodle_dem_categories')['send_comment_email'][$poll_id] ) ) ? '_wemail' : '' ;
          $foodle_no_comments_received_help_detail = ( $foodle_poll_comment_email == '_wemail' ) ? $foodle_no_comments_received_wemail_help : $foodle_no_comments_received_help ;
  
          if ( $democracy_delete_poll_IP_addresses_checked == '' )
            echo '$(".dem-new-poll").before("<br /><br /><img'.$foodle_ip_on_help.' src=\''.plugin_dir_url(__FILE__).'img/same_wlan_no.png\'/>");';
          else
            echo '$(".dem-new-poll").before("<br /><br /><img'.$foodle_ip_off_help.' src=\''.plugin_dir_url(__FILE__).'img/same_wlan_ok.png\'/>");';
          if ( $foodle_comments_exist_here )
            echo '$(".dem-new-poll").before("<br /><img foodle_com_tooltip=\"'.$poll_id.'\" style=\"margin-top:3px;width:25px;\" src=\''.plugin_dir_url(__FILE__).'img/comments__yes'.$foodle_poll_comment_email.'.png\' />");';
          else
            echo '$(".dem-new-poll").before("<br /><img'.$foodle_no_comments_received_help_detail.' style=\"margin-top:3px;width:25px;\" src=\''.plugin_dir_url(__FILE__).'img/comments__no'.$foodle_poll_comment_email.'.png\' />");';
          echo '$(".dem-new-poll").before("<br /><img foodle_non_voters_tooltip=\"'.$poll_id.'\" style=\"margin-top:3px;width:25px;\" src=\''.plugin_dir_url(__FILE__).$foodle_poll_vote_participation_icon.'\' /><br />");';

                echo '
                if ( foodle_href_check.indexOf("&subpage=general_settings") != -1 ) {
                    if ( $foodle_log_message.length == 0 ) {
                        $mf_color = "2px solid Green";
                        $foodle_log_mark_color = "Green";
                    }
                    else {
                        $(".dempage_settings").before($foodle_log_message);
                        $mf_color = "2px solid Red";
                        $foodle_log_mark_color = "Red";
                    }
                    $("input[name*=\'keep_logs\'").parent().append("<span class=\'foodle-log-mark\'> ☞ Foodle</span>").parent().css({"border":$mf_color,"padding":"6px 6px 0px 6px","margin-bottom":"20px"});
                    $("input[name*=\'keep_logs\'").parent().attr("foodle_tooltip","'.$foodle_log_and_ip_help.'");
                    $("input[name*=\'only_for_users\'").parent().attr("foodle_tooltip","'.$foodle_registered_only_help.'");
                    $(".foodle-log-mark").css("color",$foodle_log_mark_color);
                    $("input[name*=\'keep_logs\'").change(function() {
                        if ( $(this).prop("checked") ) {
                            $(this).parent().parent().css("border-color","Green");
                            $(".foodle-log-mark").css("color","Green");
                        }
                        else {
                            $(this).parent().parent().css("border-color","Red");
                            $(".foodle-log-mark").css("color","Red");
                        }
                    });
                }
                $(".dem-new-poll").before("<p><a class=\"button-primary foodle-smooth-scroll\" foodle_smooth_scroll_duration=\"1500\" foodle_smooth_scroll_effect=\"easeInOutCubic\" foodle_smooth_scroll_offset=\"-40\" style=\"background-color:SlateGrey;\" href=\"#foodle_dem_poll_form\">☟ '.__('Down to the Foodle settings','foodle-for-democracy-poll').'</a></p>");
                $(".dem-new-poll").after("'.preg_replace('/\s+/', ' ', $foodle_dem_poll_form).'");
            }
            else {
                $(".dem-new-poll").before($foodle_log_message);
                $(".dem-new-poll").after("'.preg_replace('/\s+/', ' ', $foodle_dem_poll_announce).'");
            }
            $(".foodle--scroll").on("click", function(event) {
                if (this.hash !== "") {
                    event.preventDefault();
                    var hash = this.hash;
                    $("html, body").animate({
                        scrollTop: $(hash).offset().top
                    }, 1500, function(){
                        window.location.hash = hash;
                    }); 
            
                } // End if
            });';
            if ( $foodle_democracy_textarea_template_set ) echo '
            $("#foodle-template-insert-before").on("click", function(event) {
              var foodle_template = "'.$foodle_democracy_textarea_template.'";
              var new_democracy_textarea = foodle_template + "\n\n" + $("textarea[name=dmc_note]").val();
              $("textarea[name=dmc_note]").focus().val(new_democracy_textarea).trigger("change").focus();
            });
            $("#foodle-template-copy").on("click", function(event) {
              var foodle_template = "'.$foodle_democracy_textarea_template.'";
              var new_democracy_textarea = foodle_template;
              $("textarea[name=dmc_note]").focus().val(new_democracy_textarea).trigger("change").focus();
            });
            $("#foodle-template-insert-after").on("click", function(event) {
              var foodle_template = "'.$foodle_democracy_textarea_template.'";
              var new_democracy_textarea = $("textarea[name=dmc_note]").val() + "\n\n" + foodle_template;
              $("textarea[name=dmc_note]").focus().val(new_democracy_textarea).trigger("change").focus();
            });
            $("#foodle-textarea-clear").on("click", function(event) {
              $("textarea[name=dmc_note]").val("").trigger("change");
            });
            ';
  // Determine whether the roles to see the bargraph tooltip are equal to or a subset of the roles who really see the bargraph
  if ( $current_roles_concerned == array() ) $current_roles_concerned = array_keys(wp_roles()->get_names());
  if ( $foodle_roles_for_not_voted == array() ) $foodle_roles_for_not_voted = array_keys(wp_roles()->get_names());
  $foodle_roles_for_not_voted_is_ok = ( count(array_intersect($foodle_roles_for_not_voted,$current_roles_concerned)) == count($foodle_roles_for_not_voted) ) ? 'true' : 'false';
  echo '
        // Enter comments visibility
        if ( ! $("#foodle_roles_show_comments").prop("checked") )
          $("#foodle_roles_do_comments").prop("disabled",true);
        $($("#foodle_roles_show_comments")).change(function(){
          if ( $(this).prop("checked") )
            $("#foodle_roles_do_comments").prop("disabled",false);
          else
            $("#foodle_roles_do_comments").prop("disabled",true);
        });
        // Enter event data ability & disability
        $($("#event_use_switch")).change(function(){
          if ( $(this).prop("checked") )
            $(".event_use").prop("disabled",false);
          else
            $(".event_use").prop("disabled",true);
        });
        // Bar graph tooltip visibility
        if ( ( ! $("#foodle_roles_show_bar_graph").prop("checked") ) || ( '.$foodle_roles_for_not_voted_is_ok.' ) )
          $("#foodle_bar_graph_roles_visibility_does_not_match").css("visibility","hidden");
        $($("#foodle_roles_show_bar_graph")).change(function(){
          if ( ( $(this).prop("checked") ) && ( ! '.$foodle_roles_for_not_voted_is_ok.' ) )
            $("#foodle_bar_graph_roles_visibility_does_not_match").css("visibility","visible");
          else
            $("#foodle_bar_graph_roles_visibility_does_not_match").css("visibility","hidden");
        });
        if ( foodle_href_check.indexOf("#dmc-note-anchor") != -1 ) {
          $("html,body").animate({scrollTop: $("textarea[name=dmc_note]").offset().top + 0},1500,"easeInOutCubic");
          $("textarea[name=dmc_note]").focus();
        }
      });
    </script>
  ';
}
add_action('admin_footer', 'foodle_add_category_selection_to_democracy_poll', 2147483647);



function foodle_watch_form_changes_without_saving_before_leave() {

    if ( ( get_current_screen()->base != 'settings_page_democracy-poll' ) && ( get_current_screen()->base != 'settings_page_foodle-admin-page' ) ) return; // Not the Democracy Poll or the Foodle settings page 

  echo '
    <script type="text/javascript" id="foodle-watch-form-changes-without-saving-before-leave">
      var $ = jQuery;
      $(document).ready( function() {
        setTimeout(function(){ // just for the first new answer handling
          var foodle_href_check = window.location.href;
          if ( ( foodle_href_check.indexOf("?page=foodle-admin-page") != -1 ) || ( foodle_href_check.indexOf("?page=democracy-poll&") != -1 ) ) {
            var $foodle_unload_trigger = true;
            $("input,textarea").addClass("unload-input-msg");
            $("select").addClass("unload-select-msg");
            $(".unload-input-msg").on("input",function(){
              $(this).css("outline","2px solid GoldenRod");
              foodle_unload_watch_on();
              $(this).parent().parent().parent().find(".auto-sortlist-button").attr("disabled",true);
              $(this).parent().parent().parent().find(".auto-sortlist-label").html("");
            });
            $(".unload-input-msg").change(function(){ // just for the template modifications buttons handling
              $(this).css("outline","2px solid GoldenRod");
              foodle_unload_watch_on();
            });
            $(".unload-select-msg").change(function(){
              $(this).css("outline","2px solid GoldenRod");
              foodle_unload_watch_on();
            });
            $("form").submit(function() {
              foodle_unload_watch_off();
            });
            function foodle_unload_watch_on() {
              if ( true === $foodle_unload_trigger ) {
                $(window).on("beforeunload", function () {
                  return "?";
                });
                $foodle_unload_trigger = false;
              }
            }
            function foodle_unload_watch_off() {
              $(window).off("beforeunload");
              $foodle_unload_trigger = true;
            }
          }
        },200); // just for the first new answer handling
      });
    </script>
  ';
}
add_action('admin_footer', 'foodle_watch_form_changes_without_saving_before_leave', 2147483647);



// Initialize the individual foodle variables prior their use upon page load in order to
// avoid the array getting bigger and bigger with the foodle private tokens above 20KB
function foodle_initialize_foodle_variables_in_user_meta() {
  $foodle_current_user_id = get_current_user_id();
  $foodle_variable_size = strlen(serialize(get_user_meta($foodle_current_user_id, 'foodle_variables', true)));
  if ( $foodle_variable_size > 20480 )
    update_user_meta($foodle_current_user_id, 'foodle_variables', array());
}
add_action('set_current_user', 'foodle_initialize_foodle_variables_in_user_meta');



// Introduce AJAX call to foodle display function after democracy poll screen change and introduce a few adaptations
function foodle_democracy_update( $html, $foodle_this ) {
  global $wpdb;
  global $foodle_scroll_up_button_visible;

  if ( ( isset($foodle_scroll_up_button_visible['democracy']) ) && ( $foodle_scroll_up_button_visible['democracy'] ) ) foodle_provide_scroll_up_button();

  $foodle_user_id = get_current_user_id();
  $foodle_id = $foodle_this->id;
  $foodle_variables = (array)get_user_meta($foodle_user_id, 'foodle_variables', true);
  $foodle_update = ""; // for use below (AJAX) or not

  if ( isset($foodle_variables[$foodle_id]) ) foreach( $foodle_variables[$foodle_id] as $foodle_private_token => $dummy ) {
    $gl_ajshow_date = $foodle_variables[$foodle_id][$foodle_private_token]["gl_ajshow_date"];
    $gl_ajshow_category = $foodle_variables[$foodle_id][$foodle_private_token]["gl_ajshow_category"];
    $gl_ajdem_categories = $foodle_variables[$foodle_id][$foodle_private_token]["gl_ajdem_categories"];
    $gl_maxlines_single_summary = $foodle_variables[$foodle_id][$foodle_private_token]["gl_maxlines_single_summary"];
    $gl_ajanswerlist = $foodle_variables[$foodle_id][$foodle_private_token]["gl_ajanswerlist"];
    $gl_ajcategorysort = $foodle_variables[$foodle_id][$foodle_private_token]["gl_ajcategorysort"];
    $gl_ajblocksort = $foodle_variables[$foodle_id][$foodle_private_token]["gl_ajblocksort"];
    $gl_ajsolo = $foodle_variables[$foodle_id][$foodle_private_token]["gl_ajsolo"];
    $gl_maxcount = $foodle_variables[$foodle_id][$foodle_private_token]["gl_maxcount"];
    $gl_ajcomments = $foodle_variables[$foodle_id][$foodle_private_token]["gl_ajcomments"];
    if ( ! get_the_ID() === false ) {
      $foodle_the_post_id = get_the_ID();
      $foodle_variables[$foodle_id][$foodle_private_token]["foodle_the_post_id"] = $foodle_the_post_id;
      update_user_meta($foodle_user_id, 'foodle_variables', $foodle_variables);
    } else
      if ( isset(get_user_meta($foodle_user_id, 'foodle_variables', true)[$foodle_id][$foodle_private_token]["foodle_the_post_id"]) ) {
        $foodle_the_post_id = get_user_meta($foodle_user_id, 'foodle_variables', true)[$foodle_id][$foodle_private_token]["foodle_the_post_id"];
    } else {
      $foodle_the_post_id = 0;
    }

    // call the AJAX function
    $not_post = array();
    if ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle_page_post_exclusion']) ) && ( get_option('foodle_settings')['foodle_page_post_exclusion'] != '' ) ) $not_post = (array)get_option('foodle_settings')['foodle_page_post_exclusion'];
    if ( !in_array( $foodle_the_post_id, $not_post ) ) {
      $foodle_update = '
        if ( $("#mf_sw_foodle_sort_content_'.$foodle_private_token.'").length > 0 ) mf_sw_foodle_sort_js('.$foodle_private_token.','.$gl_ajshow_date.','.$gl_ajshow_category.','.$gl_ajdem_categories.','.$gl_maxlines_single_summary.','.$gl_ajanswerlist.','.$gl_ajcategorysort.','.$gl_ajblocksort.','.$gl_ajsolo.','.$gl_maxcount.','.$gl_ajcomments.');';
    }
  }

  // determine the participation rate for the poll and update the related bar graph(s)
  $foodle_participation_data = foodle_get_the_poll_participation_data($foodle_id); // returns false or an array of data
  if ( $foodle_participation_data === false ) { // no such poll id or something's wrong
    $foodle_participation_rate = 101; // indicate an error
    $number_of_users_to_vote = 0; // indicate an error
    $number_of_users_voted = 0; // who could vote anyway here...
    $foodle_roles_concerned = array('foodle-foo-role'); // no existing role (hopefully)
    $foodle_remove_admin = false; // default state
  } else {
    $foodle_participation_rate = $foodle_participation_data['participation_rate'];
    $number_of_users_concerned = $foodle_participation_data['number_of_users_concerned'];
    $number_of_users_to_vote = $foodle_participation_data['number_of_users_to_vote'];
    $number_of_users_voted = $foodle_participation_data['number_of_users_voted'];
    $number_of_unexpected_voters = $foodle_participation_data['number_of_unexpected_voters'];
    $foodle_roles_concerned = $foodle_participation_data['roles_concerned'];
    $foodle_remove_admin = $foodle_participation_data['remove_admin'];
  }

  // prohibit administrators and others to vote if they are not part of the pool of voters
  $current_user_is_excluded = ( ( get_option('foodle_special_functions') ) && ( isset(get_option('foodle_special_functions')[$foodle_user_id]) ) ) ? ( in_array('no-voter',get_option('foodle_special_functions')[$foodle_user_id]) ) : false;
  $current_user_is_allowed_to_vote = ( count(array_intersect((array)wp_get_current_user()->roles, $foodle_roles_concerned)) > 0 );
  if ( ( ( $foodle_remove_admin ) && ( in_array('administrator',(array)wp_get_current_user()->roles ) ) ) || ( ! $current_user_is_allowed_to_vote ) || ( $current_user_is_excluded ) )
    $foodle_disable_to_vote = '
      $("#democracy-'.$foodle_id.'").find("[data-dem-act=\'vote\']").attr("disabled",true);
    ';
  else
    $foodle_disable_to_vote = '';

  // animate the existing related bar graphs and delay this a little bit in order to be robust
  $foodle_animate = '
    setTimeout(function(){ $(".foodle-fill-'.$foodle_id.'").foodle_adjust_bar_graph('.$foodle_participation_rate.',"('.$number_of_users_voted.'/'.$number_of_users_concerned.')",'.$number_of_users_concerned.','.$number_of_unexpected_voters.'); }, 50);
  ';

  // enable to have check and radio buttons in parallel
  $foodle_radio = '
    foodle_radio();
  ';
  $html = str_replace('<form ', '<form id="mf_foodle_form" ', $html); // Mark the Democracy Poll form with a unique ID

  // Check whether to display Democracy Poll for the current user
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['roles_show_democracy'][$foodle_id]) ) )
    $roles_show_democracy = get_option('foodle_dem_categories')['roles_show_democracy'][$foodle_id];
  else
    $roles_show_democracy = false;
  if ( ( ! $roles_show_democracy ) || ( ( $roles_show_democracy ) && ( $current_user_is_allowed_to_vote ) ) )
    // show Democracy Poll
    $foodle_show_or_delete_democracy = '';
  else
    // hide Democracy Poll
    $foodle_show_or_delete_democracy = '
      $(".dem-poll-shortcode").find("#democracy-'.$foodle_id.'").parents(".dem-poll-shortcode").first().unbind().hide();
      $(".dem-archives-shortcode").find("#democracy-'.$foodle_id.'").parents(".dem-elem-wrap").first().unbind().hide();
    ';

  // Start the script
  $foodle_script_start = '
    <script type="text/javascript">
      var $ = jQuery;
    ';

  // replace the original function temporarily to support check and radio buttons in parallel
  $foodle_fnscript = '
      $("#mf_foodle_form").parent().parent().mouseenter( function () {
        ';
  if ( ! get_option('foodle_change_demCollectAnsw')) {
    $foodle_fnscript .= 'foodle_change_demCollectAnsw();'; // Replace the Democracy Poll function, adding mixed polls (checkbox and radio)
    update_option('foodle_change_demCollectAnsw', 'true', 'no');
  }
  $foodle_refresh = __('Refresh','foodle-for-democracy-poll');
  $foodle_refresh_pic = plugin_dir_url(__FILE__).'img/refresh.png';
  $foodle_fnscript .= '
      });
        $.each( $(".dem-label, .dem__radio_label"), function( i, foodle_result_label){
        var foodle_this = $(foodle_result_label);
        mf_label_html = foodle_this.html();
        mf_search = mf_label_html.search("••");
        if ( mf_search != -1 ) {
          mf_label_html = mf_label_html.replace("••", "");
          foodle_this.html(mf_label_html);
        }
      });

      $("#democracy-'.$foodle_id.' .dem-voted-this .dem-label").each(function(){
        if ( $(this).children().last().attr("class") != "democracy-your-vote" )
          $(this).append("<div class=\"democracy-your-vote\">('.__('You voted here','foodle-for-democracy-poll').')</div");
      });

      if ( $("#foodle-democracy-top-spacing-'.$foodle_id.'").length == 0 ) $("#democracy-'.$foodle_id.'").before("<p class=\'foodle-democracy-top-spacing\' id=\'foodle-democracy-top-spacing-'.$foodle_id.'\'></p>");

      $(".democracy .dem-vote").closest(".democracy").removeClass("democracy-results").addClass("democracy-voting");
      $(".democracy .dem-answers").closest(".democracy").removeClass("democracy-voting").addClass("democracy-results");
      $(".democracy").removeClass("democracy-voted").addClass("democracy-not-voted");
      $(".democracy .dem-voted-this").closest(".democracy").removeClass("democracy-not-voted").addClass("democracy-voted");';
  if ( ( $foodle_this->poll->open == 1 ) && ( isset(get_option('foodle_dem_categories')['refresh_button_voted'][$foodle_id])) && ( get_option('foodle_dem_categories')['refresh_button_voted'][$foodle_id]) ) $foodle_fnscript .= '
      $("#democracy-'.$foodle_id.'.democracy-results.democracy-voted .dem-poll-info").append("<button type=\"submit\" margin-top:5px; style=\"float:right; box-shadow:5px 5px 5px SteelBlue; font-size:0.65em;\" class=\"dem-button democracy-refresh-button\" data-dem-act=\"view\">'.$foodle_refresh.'&nbsp;&nbsp;<img src=\"'.$foodle_refresh_pic.'\" width=\"18\"></button>");';
  if ( ( $foodle_this->poll->open == 1 ) && ( isset(get_option('foodle_dem_categories')['refresh_button_not_voted'][$foodle_id])) && ( get_option('foodle_dem_categories')['refresh_button_not_voted'][$foodle_id]) ) $foodle_fnscript .= '
      $("#democracy-'.$foodle_id.'.democracy-results.democracy-not-voted .dem-poll-info").append("<button type=\"submit\" margin-top:5px; style=\"float:right; box-shadow:5px 5px 5px SteelBlue; font-size:0.65em;\" class=\"dem-button democracy-refresh-button\" data-dem-act=\"view\">'.$foodle_refresh.'&nbsp;&nbsp;<img src=\"'.$foodle_refresh_pic.'\" width=\"18\"></button>");
  '; // add foodle-democracy-top-spacing only once in case it doesn't exist, yet, and add some classes for use with CSS

  // End the script
  $foodle_script_end = '
    </script>
  ';

  // Delete the poll voters' IP addresses - if requested for this poll
  if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['delete_poll_IP_addresses'][$foodle_id]) ) )
  if ( get_option('foodle_dem_categories')['delete_poll_IP_addresses'][$foodle_id] ) {
    $wpdb->query("UPDATE {$wpdb->democracy_log} SET ip = NULL WHERE qid = {$foodle_id}");
  }
  return $html.$foodle_script_start.$foodle_show_or_delete_democracy.$foodle_fnscript.$foodle_radio.$foodle_update.$foodle_animate.$foodle_disable_to_vote.$foodle_script_end;
}
add_filter( 'dem_vote_screen', 'foodle_democracy_update', 10, 2 );
add_filter( 'dem_result_screen', 'foodle_democracy_update', 10, 2 );



// Enable a shortcode inside the democracy shortcode (purpose: to allow e.g. 'foodle-link-democracy-poll' shortcode to be used inside the Democracy text field underneath
// the voting/results) and make "From posts" (first string found between <b> and :</b> by RegEx for flexibility upon changes) in [democracy_archives] translatable
function foodle_execute_shortcode_inside_democracy($output, $tag, $attr) {

  if ( ('democracy' == $tag) || ( 'democracy_archives' == $tag ) ) {
    // replace all id="self" occurences by the correct poll id for use with shortcodes inside the Democracy Poll's textarea
    preg_match_all('/(?<=id="democracy-).*?(?=")/i',$output,$foodle_result); // find all Democracy screens (even those in an archive)
    $foodle_strings = array();
    $startpos = 0;
    foreach( $foodle_result[0] as $foodle_id ) {
      $findpos = strpos($output,'id="democracy-'.$foodle_id.'"');
      $foodle_strings[] = substr($output,$startpos,$findpos-$startpos);
      $startpos = $findpos;
    }
    $foodle_strings[] = substr($output,$startpos);
    $count = 0;
    $output = $foodle_strings[0];
    foreach( $foodle_result[0] as $foodle_id ) {
      $count += 1;

      if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['event_auto'][$foodle_id]) ) && ( get_option('foodle_dem_categories')['event_auto'][$foodle_id] ) ) {
        $ics_shortcode_result = do_shortcode('[foodle-create-ics id="'.$foodle_id.'"]');
        $ics_shortcode_result = ( $ics_shortcode_result == "" ) ? "" : "<br>".$ics_shortcode_result."<br><br>";
        $output .= str_replace('<div class="dem-poll-note">',$ics_shortcode_result.'<div class="dem-poll-note">',preg_replace('/(?<=id="|\')self(?="|\')/i',$foodle_id,$foodle_strings[$count]));
      }
      else
        $output .= preg_replace('/(?<=id="|\')self(?="|\')/i',$foodle_id,$foodle_strings[$count]);
    }
  
    if ( 'democracy_archives' == $tag ) {
      $output = do_shortcode($output);
      $output = preg_replace("/(?<=<b>).*?(?=:<\/b>)/",__('Found in posts','foodle-for-democracy-poll'),$output);
    }
    else {
      $output = do_shortcode($output);
    }
    return $output;
  } else {
    return $output;
  }
}
add_filter( 'do_shortcode_tag','foodle_execute_shortcode_inside_democracy', 10, 3 );



// Schedule, unschedule and execute wp_cron jobs for Foodle
// Set a new bi-monthly interval
function foodle_bi_monthly_interval( $schedules ) { 
    $schedules['two_months'] = array(
        'interval' => 60 * 60 * 24 * 30 * 2, // 2 months in seconds
        'display'  => esc_html__('Every second month','foodle-for-democracy-poll' ),
    );
    return $schedules;
}
add_filter( 'cron_schedules', 'foodle_bi_monthly_interval' );
// schedule the wp_cron task if not already done (to be called when needed)
function foodle_schedule_cron() {
  if ( ! wp_next_scheduled( 'foodle_cron_hook' ) ) {
      wp_schedule_event( time(), 'two_months', 'foodle_cron_hook' );
  }
}
// unschedule the wp_cron task (to be called when needed)
function foodle_unschedule_cron() {
  $foodle_timestamp = wp_next_scheduled( 'foodle_cron_hook' );
  wp_unschedule_event( $foodle_timestamp, 'foodle_cron_hook' );
  // set all democracy poll's answer expiry dates to one year from the answer date
  foodle_set_democracy_poll_answer_expiry_dates('vote_date');
}
// this is the very task done every two months
function foodle_execute_cron() {
  // set all democracy poll's answer expiry dates to one year from now
  foodle_set_democracy_poll_answer_expiry_dates('now');
}
add_action( 'foodle_cron_hook', 'foodle_execute_cron' );
// Now do the job as requested
function foodle_set_democracy_poll_answer_expiry_dates($timeframe) {
  global $wpdb;
  $database_prefix = $wpdb->prefix;
  
  if ( ( $timeframe == 'vote_date' ) || ( $timeframe == 'now' ) ) {
    if ( $timeframe == 'now' ) {
      $one_year_timestamp = date_i18n('U') + 60 * 60 * 24 * 365; // one year in seconds from today
      $sql = "UPDATE $wpdb->democracy_log SET expire={$one_year_timestamp}";
      $wpdb->query($sql); 
    } else {
      foreach($wpdb->get_results("SELECT * FROM $wpdb->democracy_log") as $poll_vote ) { // get the relevant poll data
        $poll_voted = $poll_vote->date;
        $poll_logid = $poll_vote->logid;
        $poll_vote_expire = strtotime($poll_voted) + 60 * 60 * 24 * 365;
        $sql = "UPDATE $wpdb->democracy_log SET expire={$poll_vote_expire}  where logid={$poll_logid}";
        $wpdb->query($sql);
      }
    }
  }
}



delete_option('foodle_change_demCollectAnsw'); // Mark an internal Democracy Poll function as not yet amended (used for mixed polls)



// For the time being: Remove an unwanted an not completely understood language file!
unlink(WP_LANG_DIR."/plugins/foodle-for-democracy-poll-de_DE.l10n.php");



// Load the plugin's textdomain to retrieve the translations
function foodle_translations() {
  $domain = 'foodle-for-democracy-poll';
  load_plugin_textdomain( $domain, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); // load WordPress plugin translations with normal logic
 }
add_action( 'init', 'foodle_translations' );



function foodle_translate_global_strings () {
  global $foodle_undefined_error;        // translated
  global $foodle_sorting;                // translated
  global $thanks_for_using_foodle;       // translated
  global $foodle_review;                 // translated
  global $foodle_like_me_1;              // translated
  global $foodle_like_me_2;              // translated
  global $foodle_results_text_default;   // translated
  global $foodle_results_text;           // just the administrator's choice or the default
  global $foodle_bar_graph_text_default; // translated
  global $foodle_bar_graph_text;         // just the administrator's choice or the default
  global $foodle_unknown_user;           // translated  $foodle_icon_comments_yes_wemail_help = " foodle_tooltip_touch='true' foodle_tooltip = '".$foodle_comments_received_wemail_help_text."'";
  
  $foodle_sorting = __('Sorting','foodle-for-democracy-poll'); // default text e.g. for the foodle category column sorting
  $foodle_undefined_error = __('Undefined error','foodle-for-democracy-poll').'!'; // Generic error message used more than once
  $thanks_for_using_foodle = __('Thanks a lot for using Foodle','foodle-for-democracy-poll');
  $foodle_review = __('If you like this plugin, then <a target="_blank" href="https://wordpress.org/support/plugin/foodle-for-democracy-poll/reviews/#new-post">please leave a review</a> for others to see. Many thanks! ','foodle-for-democracy-poll');
  $foodle_like_me_1 = __('In such case, you could as well ','foodle-for-democracy-poll');
  $foodle_like_me_2 = __(' your appreciation...','foodle-for-democracy-poll');
  $foodle_results_text_default = __('Poll results so far','foodle-for-democracy-poll');
  $foodle_bar_graph_text_default = __('Rate of participation','foodle-for-democracy-poll');
  $foodle_unknown_user = __('Unknown User','foodle-for-democracy-poll');

  // Set table headline from option
  if ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle_results_text']) ) && ( get_option('foodle_settings')['foodle_results_text'] != '' ) ) {
    $foodle_results_text = get_option('foodle_settings')['foodle_results_text'];
  } else $foodle_results_text = $foodle_results_text_default;
  // Set bar graph text from option
  if ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle_bar_graph_text']) ) && ( get_option('foodle_settings')['foodle_bar_graph_text'] != '' ) ) {
    $foodle_bar_graph_text = get_option('foodle_settings')['foodle_bar_graph_text'];
  } else $foodle_bar_graph_text = $foodle_bar_graph_text_default;
}
add_action('init', 'foodle_translate_global_strings');



// Change Admin Footer Text for Foodle
function foodle_update_admin_footer_text($content) {
  global $thanks_for_using_foodle;
  if ( strpos(get_current_screen()->base, 'foodle-admin-page') !== false ) {
    remove_all_filters( 'admin_footer_text' );
    return $thanks_for_using_foodle.'!';
  }
  else
    return $content;
}
add_filter( 'admin_footer_text', 'foodle_update_admin_footer_text', 1, 1); // Priority 1 to make it work



// Change Admin Footer Update for Foodle
function foodle_update_admin_footer_version($content) {
  if ( strpos(get_current_screen()->base, 'foodle-admin-page') !== false ) {
    remove_all_filters( 'update_footer' );
    return 'Foodle © 2019-'.wp_date("Y").', Version '.FOODLE_VERSION;
  }
  else
    return $content;
}
add_filter( 'update_footer', 'foodle_update_admin_footer_version', 1, 1); // Priority 1 to make it work



// Enqueue back end "Touch Punch" for touchscreen use and at the same time ensure jquery-ui-sortable is active
function hook_foodle_touch_punch_script( $foodle_hook ) {
    if ( strpos($foodle_hook,'foodle-admin-page') !== false ) { // only in 'Foodle'
    $js_url = plugin_dir_url(__FILE__).'js/foodle_jquery.ui.touch-punch.js';
    wp_register_script( 'foodle-touch-punch-script', $js_url, array('jquery','jquery-ui-core','jquery-ui-sortable','jquery-ui-widget','jquery-ui-mouse'), FOODLE_VERSION, false );
    wp_enqueue_script( 'foodle-touch-punch-script' );
  }
}
add_action( 'admin_enqueue_scripts', 'hook_foodle_touch_punch_script' ); // for the admin area



// Enqueue back end plugin style-file
function add_back_end_foodle_stylesheet( $foodle_hook ) {
  if ( ( strpos($foodle_hook,'foodle-admin-page') !== false ) || ( strpos($foodle_hook,'democracy-poll') !== false ) ) { // only in 'Foodle' and 'Democracy'
    $css_url = plugin_dir_url(__FILE__).'styles/foodle-for-democracy-poll-back-end.css';
    wp_register_style( 'foodle-back-end-css', $css_url, array(), FOODLE_VERSION, 'all' );
    wp_enqueue_style( 'foodle-back-end-css' );
  }
}
add_action( 'admin_enqueue_scripts', 'add_back_end_foodle_stylesheet' ); // for the admin area



// enqueue back end and front end tooltips js
function hook_foodle_tooltips_script() {
  $js_url = plugin_dir_url(__FILE__).'js/foodle_tooltips.js';
  wp_register_script( 'foodle-tooltips-script', $js_url, array('jquery'), FOODLE_VERSION, true ); // true = 'in_footer' to reach Democracy Poll from here
  wp_enqueue_script( 'foodle-tooltips-script' );
}
add_action( 'admin_enqueue_scripts', 'hook_foodle_tooltips_script' ); // for the admin area
add_action( 'wp_enqueue_scripts', 'hook_foodle_tooltips_script' ); // for the front end as well



// enqueue back end and front end comments tooltips js
function hook_foodle_comments_tooltips_script() {
  $js_url = plugin_dir_url(__FILE__).'js/foodle_comments_tooltips.js';
  wp_register_script( 'foodle-comments-tooltips-script', $js_url, array('jquery'), FOODLE_VERSION, true ); // true = 'in_footer' to reach Democracy Poll from here
  wp_enqueue_script( 'foodle-comments-tooltips-script' );
}
add_action( 'admin_enqueue_scripts', 'hook_foodle_comments_tooltips_script' ); // for the admin area
add_action( 'wp_enqueue_scripts', 'hook_foodle_comments_tooltips_script' ); // for the front end as well



// enqueue back end and front end non-voters tooltips js
function hook_foodle_non_voters_tooltips_script() {
  $js_url = plugin_dir_url(__FILE__).'js/foodle_non_voters_tooltips.js';
  wp_register_script( 'foodle-non-voters-tooltips-script', $js_url, array('jquery'), FOODLE_VERSION, true ); // true = 'in_footer' to reach Democracy Poll from here
  wp_enqueue_script( 'foodle-non-voters-tooltips-script' );
}
add_action( 'admin_enqueue_scripts', 'hook_foodle_non_voters_tooltips_script' ); // for the admin area
add_action( 'wp_enqueue_scripts', 'hook_foodle_non_voters_tooltips_script' ); // for the front end as well



// enqueue front end jQuery table2excel script
function hook_foodle_table2excel_script() {
  $js_url = plugin_dir_url(__FILE__).'js/foodle_jquery.table2excel.js';
  wp_register_script( 'foodle-table2excel-script', $js_url, array('jquery'), FOODLE_VERSION, true ); // true = 'in_footer' to reach the Foodle table from here
  wp_enqueue_script( 'foodle-table2excel-script' );
}
//add_action( 'wp_enqueue_scripts', 'hook_foodle_table2excel_script' ); // for the front end



// enqueue back end and front end tooltips style-file including comments tooltips
function hook_foodle_tooltips_stylesheet() {
  $css_url = plugin_dir_url(__FILE__).'styles/foodle-tooltips.css';
  wp_register_style( 'foodle-tooltips-css', $css_url, array(), FOODLE_VERSION, 'all' );
  wp_enqueue_style( 'foodle-tooltips-css' );
}
add_action( 'admin_enqueue_scripts', 'hook_foodle_tooltips_stylesheet' ); // for the admin area
add_action( 'wp_enqueue_scripts', 'hook_foodle_tooltips_stylesheet' ); // for the front end as well



// Enqueue front end plugin style-file
function add_front_end_foodle_stylesheet() {
  $css_url = plugin_dir_url(__FILE__).'styles/foodle-for-democracy-poll-front-end.css';
  wp_register_style( 'foodle-front-end-css', $css_url, array(), FOODLE_VERSION, 'all' );
  wp_enqueue_style( 'foodle-front-end-css' );
}
add_action( 'wp_enqueue_scripts', 'add_front_end_foodle_stylesheet' ); // for the front end



// Enqueue front end plugin script to convert checkboxes marked with &bull; into a radio button
function foodle_hook_radioconvert_script() {
  $js_url = plugin_dir_url(__FILE__).'js/foodle_radio.js';
  wp_register_script( 'foodle_radioconvert', $js_url, array('jquery'), FOODLE_VERSION, false);
  wp_enqueue_script( 'foodle_radioconvert' );
}
add_action( 'wp_enqueue_scripts', 'foodle_hook_radioconvert_script' ); // for the front end



// enqueue back end and front end smoothscroll js
function hook_foodle_smoothscroll_script() {
  $js_url = plugin_dir_url(__FILE__).'js/foodle_smoothscroll.js';
  wp_register_script( 'foodle-smoothscroll-script', $js_url, array('jquery','jquery-ui-core','jquery-effects-core'), FOODLE_VERSION, true ); // true = 'in_footer' to reach anything from here
  wp_enqueue_script( 'foodle-smoothscroll-script' );
}
add_action( 'admin_enqueue_scripts', 'hook_foodle_smoothscroll_script' ); // for the admin area
add_action( 'wp_enqueue_scripts', 'hook_foodle_smoothscroll_script' ); // for the front end as well



// Description: AJAX-Function, generating the sortlist from the first meta field and the regular expression.
function foodle_hook_auto_generate_sortlist_script() {
  $js_url = plugin_dir_url(__FILE__).'js/foodle_auto_sortlist_ajax_file.js';
  wp_register_script( 'foodle_auto_sortlist_ajax_script', $js_url, array('jquery'), FOODLE_VERSION, false );
  wp_enqueue_script( 'foodle_auto_sortlist_ajax_script' );

  wp_localize_script( 'foodle_auto_sortlist_ajax_script', 'foodle_auto_sortlist_ajax_var', array(
    'ajaxurl' => admin_url( 'admin-ajax.php' ),
    'auto_message' => '*AUTO*'
    )
  );
}
add_action('admin_enqueue_scripts','foodle_hook_auto_generate_sortlist_script'); // just for the back end
// And now the related action
function foodle_auto_generate_sortlist_php() {
  global $foodle_undefined_error;

  $out = $foodle_undefined_error;

  if ( isset($_POST['foodle_metafield']) ) {
    $foodle_metafield = sanitize_text_field($_POST['foodle_metafield']); // The meta field
    $foodle_base_metafield = array_keys((array)get_option('foodle_meta_fields'))[0]; // The base meta field
    $foodle_regexp = get_option('foodle_regex_main')[$foodle_metafield][0];
    $foodle_regrep = ( isset(get_option('foodle_regex_main')[$foodle_metafield][1]) ) ? get_option('foodle_regex_main')[$foodle_metafield][1] : '';
    $replace_limit = ( strpos($foodle_regexp,'/g') === false ) ? 1 : -1;
    $foodle_regexp = str_replace('/g','/',$foodle_regexp);
    $foodle_sortlist_array = explode('<br>',get_option('foodle_meta_defaults_sorting')[$foodle_base_metafield]['sortlist']);
    $foodle_sortlist_array_new = array();
    foreach($foodle_sortlist_array as $foodle_sortlist_item) {
      $foodle_sortlist_item_new = ( $foodle_sortlist_item == '&nbsp;' ) ? '&nbsp;' : preg_replace($foodle_regexp,$foodle_regrep,$foodle_sortlist_item, $replace_limit);
      if ( ( $foodle_sortlist_item_new == '&nbsp;' ) || ( ! in_array($foodle_sortlist_item_new,$foodle_sortlist_array_new) ) ) $foodle_sortlist_array_new[] = $foodle_sortlist_item_new;
    }
    $out = implode('&#13;&#10;',$foodle_sortlist_array_new);
  }

  echo $out;
  die();
}
add_action('wp_ajax_nopriv_foodle_auto_generate_sortlist','foodle_auto_generate_sortlist_php');
add_action('wp_ajax_foodle_auto_generate_sortlist','foodle_auto_generate_sortlist_php');



// Add the submenu entry and the help tabs...
function add_foodle_admin_menu_items() {
  global $submenu;

  $location = 10;
  if ( isset($submenu['options-general.php']) ) {
    $dem_count = 0;
    $settings_menu = $submenu['options-general.php'];
    foreach($settings_menu as $menu_entry ) { // search the related submenu for Democracy and locate Foodle behind
      $dem_count += 1;
      $found = strpos($menu_entry[2],'democracy-poll'); // check the page slug
      if ( $found !== false ) {
        $location = $dem_count;
        break;
      }
    }
  }
  $foodle_admin_page = add_options_page(
                          'Foodle for Democracy Poll', // page title
                          'Foodle ➤ Democracy', // submenu title
                          'manage_foodle', // required capability (or role)
                          'foodle-admin-page', // page slug foodle-admin-page
                          'foodle_admin_page_callback', // callback function: the main plugin function
                          $location // position behind Democracy
                        );
  add_action( 'load-'.$foodle_admin_page, 'foodle_add_help' ); // Add the help tabs callback function...
}
add_action('admin_menu','add_foodle_admin_menu_items', 2147483647);



// Add the same entry in the WordPress toolbar
function add_foodle_admin_toolbar( WP_Admin_Bar $wp_admin_bar ) {
    global $foodle_roles_metafields;
    global $foodle_roles_sorting;
    global $foodle_roles_sproles;
    global $foodle_roles_email;
    global $foodle_roles_usage;
    global $foodle_roles_settings;
    global $foodle_roles_tips;

    // Capability allowed
    if ( ! current_user_can('manage_foodle') ) return;

    // Case 1: Not coming from Foodle settings
    if ( ! isset($_POST['save_foodle_settings']) ) {
        if ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['show-in-admin-menu-bar']) ) && ( ! get_option('foodle_settings')['show-in-admin-menu-bar'] ) ) return;
        if ( ( ! get_option('foodle_settings') ) || ( ( get_option('foodle_settings') ) && ( ! isset(get_option('foodle_settings')['show-in-admin-menu-bar']) ) ) ) return;
    }
    // Case 2: Coming from Foodle settings
    else {
      if ( ! isset($_POST['show-in-admin-menu-bar']) ) return;
      if ( current_user_can('manage_options') ) { // last line of defence for an administrator privilege
        $foodle_roles_tips = ( isset($_POST['foodle-roles-tips'] ) ) ? true : false;
        $foodle_roles_settings = ( isset($_POST['foodle-roles-settings'] ) ) ? true : false;
        $foodle_roles_usage = ( isset($_POST['foodle-roles-usage'] ) ) ? true : false;
        $foodle_roles_email = ( isset($_POST['foodle-roles-email'] ) ) ? true : false;
        $foodle_roles_sproles = ( isset($_POST['foodle-roles-sproles'] ) ) ? true : false;
        $foodle_roles_sorting = ( isset($_POST['foodle-roles-sorting'] ) ) ? true : false;
        $foodle_roles_metafields = ( isset($_POST['foodle-roles-metafields'] ) ) ? true : false;
      }
    }

    // check first submenu entry
    $foodle_first_admin_tab = 'foodle-admin-page&tab=define-metafields';
    if ( $foodle_roles_tips ) $foodle_first_admin_tab = 'foodle-admin-page&tab=foodle-tips';
    if ( $foodle_roles_settings ) $foodle_first_admin_tab = 'foodle-admin-page&tab=foodle-settings';
    if ( $foodle_roles_usage ) $foodle_first_admin_tab = 'foodle-admin-page&tab=foodle-usage';
    if ( $foodle_roles_email ) $foodle_first_admin_tab = 'foodle-admin-page&tab=edit-email';
    if ( $foodle_roles_sproles ) $foodle_first_admin_tab = 'foodle-admin-page&tab=special-roles-users';
    if ( $foodle_roles_sorting ) $foodle_first_admin_tab = 'foodle-admin-page&tab=metafield-default-sorting';
    if ( ( $foodle_roles_metafields ) || ( current_user_can('manage_options') ) ) $foodle_first_admin_tab = 'foodle-admin-page&tab=define-metafields';

	$wp_admin_bar->add_menu(
      array(
		'id'    => 'foodle-main',
		'parent' => null,
		'group'  => false,
		'title' => 'Foodle ➤ Democracy',
		'href'  => admin_url('options-general.php?page='.$foodle_first_admin_tab),
		'meta' => [
			'title' => 'Plugin: Foodle for Democracy Poll',
        ]
      )
    );
    if  ( ( current_user_can('manage_options') ) || ( $foodle_roles_metafields ) ) $wp_admin_bar->add_menu(
      array(
        'id'    => 'foodle-define-meta',
        'parent' => 'foodle-main',
        'title' => __('Define Metafields','foodle-for-democracy-poll'),
        'href'  => admin_url('options-general.php?page=foodle-admin-page&tab=define-metafields'),
      )
	);
	if ( ( current_user_can('manage_options') ) || ( $foodle_roles_sorting ) ) $wp_admin_bar->add_menu(
      array(
        'id'    => 'metafield-default-sorting',
        'parent' => 'foodle-main',
        'title' => __('Metafield Defaults & Sorting','foodle-for-democracy-poll'),
        'href'  => admin_url('options-general.php?page=foodle-admin-page&tab=metafield-default-sorting'),
      )
    );
    if ( ( current_user_can('manage_options') ) || ( $foodle_roles_sproles ) ) $wp_admin_bar->add_menu( // for administrators only
      array(
        'id'    => 'special-roles-users',
        'parent' => 'foodle-main',
        'title' => __('Special Roles & Users','foodle-for-democracy-poll'),
        'href'  => admin_url('options-general.php?page=foodle-admin-page&tab=special-roles-users'),
      )
    );
    if ( ( current_user_can('manage_options') ) || ( $foodle_roles_email ) ) $wp_admin_bar->add_menu(
      array(
        'id'    => 'edit-email',
        'parent' => 'foodle-main',
        'title' => __('Edit Email','foodle-for-democracy-poll'),
        'href'  => admin_url('options-general.php?page=foodle-admin-page&tab=edit-email'),
      )
    );
    if ( ( current_user_can('manage_options') ) || ( $foodle_roles_usage ) ) $wp_admin_bar->add_menu(
        array(
          'id'    => 'foodle-usage',
          'parent' => 'foodle-main',
          'title' => __('Shortcode Use','foodle-for-democracy-poll'),
          'href'  => admin_url('options-general.php?page=foodle-admin-page&tab=foodle-usage'),
        )
      );
    if ( ( current_user_can('manage_options') ) || ( $foodle_roles_settings ) ) $wp_admin_bar->add_menu( // for administrators only
      array(
        'id'    => 'foodle-settings',
        'parent' => 'foodle-main',
        'title' => __('Foodle Settings','foodle-for-democracy-poll'),
        'href'  => admin_url('options-general.php?page=foodle-admin-page&tab=foodle-settings'),
      )
    );
      if ( ( current_user_can('manage_options') ) || ( $foodle_roles_tips ) ) $wp_admin_bar->add_menu(
      array(
        'id'    => 'foodle-tips',
        'parent' => 'foodle-main',
        'title' => __('Widespread Tips','foodle-for-democracy-poll'),
        'href'  => admin_url('options-general.php?page=foodle-admin-page&tab=foodle-tips'),
      )
    );
}
add_action('admin_bar_menu', 'add_foodle_admin_toolbar', 100);



// Add the help tabs and sidebar here...
function foodle_add_help () {
  global $version;
  global $foodle_review;
  global $foodle_like_me_1;
  global $foodle_like_me_2;

  $mfem_screen = get_current_screen();
  
  // Generic explanations
  $id = 'foodle_gen_ex';
  $title = __('Information','foodle-for-democracy-poll');
  $content  = '<p>'.__('The following \'help\' tabs may be consulted for detailed explanations and hints for their related topic\'s usage.</p>
               <p>More detailed information is available in the <a href="/wp-admin/options-general.php?page=foodle-admin-page&tab=foodle-tips">Tips tab</a> or by activating \'Help-Tooltips\' in the <a href="/wp-admin/options-general.php?page=foodle-admin-page&tab=foodle-settings">Foodle Settings tab</a>.</p>
               <p>Additional information may be found in the FAQs.','foodle-for-democracy-poll').'</p>';
  $content .= '<p>&nbsp;</p>
               <p style="font-size:1.2em;">'.$foodle_review.'</p>
               <p style="font-size:1.2em;">'.$foodle_like_me_1.'<img src="'.plugin_dir_url( __FILE__ ).'img/PayPal-Logo-2019-kl.jpg" height="16" alt="PayPal">'.$foodle_like_me_2.'</p>
               <form action="https://www.paypal.com/donate" method="post" target="_top">
               <input type="hidden" name="hosted_button_id" value="W3V5CKXFJS948" />
               <input type="image" src="https://www.paypalobjects.com/en_US/DK/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
               <img alt="" border="0" src="https://www.paypal.com/en_DE/i/scr/pixel.gif" width="1" height="1" />
               </form>';

  $mfem_screen->add_help_tab( array( 
   'id' => $id,            // unique id for the tab
   'title' => $title,      // unique visible title for the tab
   'content' => $content   // actual help text
  ) );

  // Foodle Shortcode and email option
  $id = 'foodle_short_code';
  $title = __('Foodle Shortcode and Email Option','foodle-for-democracy-poll');
  $content = '<p>'.__('The Foodle shortcode is used to display the poll results in various ways. It can be used on the same page as the democracy poll shortcode and will be have interactively (AJAX) when voting. However, it can as well be used independently on any page or post.</p>
              <p>You may consult the <a href="/wp-admin/options-general.php?page=foodle-admin-page&tab=foodle-tips">Tips tab</a> for shortcode details.</p>
              <p>For <a href="/wp-admin/options-general.php?page=foodle-admin-page&tab=special-roles-users">selectable viewers</a>, the shortcode provides an automated email reminder option for those who didn\'t vote, yet. The email text can be edited in the <a href="/wp-admin/options-general.php?page=foodle-admin-page&tab=edit-email">related tab</a>. Placeholders are available to configure the email in many ways. This includes name information of the person that will trigger the email (can be anyone of those special viewers having access).','foodle-for-democracy-poll').'</p>';
  $mfem_screen->add_help_tab( array( 
   'id' => $id,            // unique id for the tab
   'title' => $title,      // unique visible title for the tab
   'content' => $content   // actual help text
  ) );

  // Questions & Answers
  $id = 'foodle_q_a';
  $title = __('FAQs','foodle-for-democracy-poll');
  $content = '<p id="foodle-faq-p"></p><script type="text/javascript">jQuery("#foodle-faq-p").load("/wp-admin/plugin-install.php?tab=plugin-information&plugin=foodle-for-democracy-poll&section=faq #section-faq");</script>';
  if ( current_user_can('manage_options') ) $mfem_screen->add_help_tab( array( // will anyway not work for non-admins...
   'id' => $id,            // unique id for the tab
   'title' => $title,      // unique visible title for the tab
   'content' => $content   // actual help text
  ) );
  
  // The help sidebar
  $mfem_sidebar =  '<p style="font-weight:bold;">'.__('Support Hints','foodle-for-democracy-poll').'</p>';
  $mfem_sidebar .= '<p>'.__('For plugin information, please consult the','foodle-for-democracy-poll');
  $mfem_sidebar .= ' <a href="https://de.wordpress.org/plugins/foodle-for-democracy-poll/" target="_blank">';
  $mfem_sidebar .= __('WordPress&nbsp;Plugin&nbsp;Page','foodle-for-democracy-poll').'</a>.</p>';
  $mfem_sidebar .= '<p>'.__('In case of questions or issues, you may use the','foodle-for-democracy-poll');
  $mfem_sidebar .= ' <a href="https://wordpress.org/support/plugin/foodle-for-democracy-poll/" target="_blank">';
  $mfem_sidebar .= __('Plugin&nbsp;Supportpage','foodle-for-democracy-poll').'</a> ';
  $mfem_sidebar .= __('or contact the plugin author directly under','foodle-for-democracy-poll').' <a href="mailto:plugins@finkenberger.net?subject=Foodle for Democracy Poll Plugin Direct Support">';
  $mfem_sidebar .= __('Direct&nbsp;Support','foodle-for-democracy-poll').'</a>.</p>';
  $mfem_sidebar .= '<p>V'.FOODLE_VERSION.'</p>';
  $mfem_screen->set_help_sidebar( $mfem_sidebar );
}



// Adding WordPress plugin action links 
function foodle_add_plugin_action_links( $links ) {
  $foodle_color = '';
  if ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle_admin_menu_color']) ) )
    $foodle_color = get_option('foodle_settings')['foodle_admin_menu_color'];
  else
    $foodle_color = '#8CBD5A'; // the default
  return array_merge(
    array(
      'settings' => '<a style="font-size:1.1em; color:'.$foodle_color.'"; href="' . get_bloginfo( 'wpurl' ) . '/wp-admin/options-general.php?page=foodle-admin-page">'.__('Foodle-Settings','foodle-for-democracy-poll').'</a>'
    ),
    $links
  );
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'foodle_add_plugin_action_links' );



require('foodle-extra-fields.php'); // add the requested additional fields to each user's profile

require('foodle-foodle-shortcode.php'); // the main [foodle-democracy-poll-list-log] shortcode definition and supporting functions in separate file

require('foodle-link-democracy-shortcode.php'); // the [foodle-link-democracy-poll] shortcode in separate file

require('foodle-database-check-shortcode.php'); // the [foodle-democracy-poll-database-check] shortcode and related dashboard widget in separate file

require('foodle-comments-shortcode.php'); // the [foodle-comments] shortcode in separate file

require('foodle-send-reminder.php'); // email function enqueuing and sending in separate file

require('foodle-display-on-for-roles-shortcode.php'); // the [foodle-display-on-for-roles] shortcode (with separate end tag) to limit enclosed content for specific roles

require('foodle-archive-do-not-show-shortcode.php'); // the [foodle-archive-do-not-show] shortcode (with separate end tag) to not display certain ids in an archive listing

require('foodle-poll-bar-graph-shortcode.php'); // the [foodle-poll-bar-graph] shortcode to display a bar graph for a poll, indicating the percentage of voters that voted

require('foodle-create-ics-shortcode.php'); // the [foodle-create-ics] shortcode to generate an ics file download for storing an event to a calendar

require('foodle-tips.php'); // the foodle tips and detailed explanations



// Check and record the related shortcodes' page/post use and correct/update democracy's "in_posts" entries, which are sometimes not fully correct plus fill the database's 'in_foodles' and 'in_comments' entries
function foodle_check_shortcode_presence($post_id = "", $post = "", $update = "") {
  global $wpdb;

  // delete the old errors
  delete_option('foodle_shortcode_usage_error_pages_posts');

  // Retrieve all except 'inherit' {prefix}posts database entries for all registered post_types
  $foodle_post_statuses = array_keys(get_post_statuses());
  unset($foodle_post_statuses['inherit']);
  $pages_posts_args = array(
    'numberposts' => -1,
    'post_type'   => array_keys(get_post_types()),
    'post_status' => $foodle_post_statuses,
    'orderby'     => 'date',
    'order'       => 'ASC',
  ); // 'orderby date' and 'order ASC' are important to make sure that the first shortcode use stays available for shortcode [foodle-link-democracy-poll]
  $pages_posts = get_posts($pages_posts_args);

  // Initialize variables
  $matches = array();
  $democracy_uses = array();
  $democracy_uses_serial = array();
  $foodle_uses = array();
  $foodle_uses_serial = array();
  $comments_uses = array();
  $comments_uses_serial = array();

  // Delete previous use entries in democracy_q database
  $wpdb->query("UPDATE $wpdb->democracy_q SET in_posts = '', in_foodles = '', in_comments = ''");

  // Initialize error_logs
  $erroneous_uses = array();

  // All related democracy and foodle shortcodes to be recorded at this time
  $shortcodes_search = array('democracy','foodle-democracy-poll-list-log','foodle-comments','foodle-poll-bar-graph','foodle-link-democracy-poll');
  $pattern = get_shortcode_regex($shortcodes_search);

  foreach ($pages_posts as $page_post) {

    if ( preg_match_all( '/'. $pattern .'/s', $page_post->post_content, $matches )
    && array_key_exists( 2, $matches ) ) {
      $shortcode_count  = count( $matches[2] );
      $shortcodes_array = $matches[2];
      $atts_array       = $matches[3];
      for ( $i = 0; $i < $shortcode_count; $i++ ) {
        $shortcode = $shortcodes_array[ $i ];
        $atts      = shortcode_parse_atts( $atts_array[ $i ] );
        if ( ! in_array('id',array_keys($atts)) || ( $atts['id'] == '' ) ) {
          $erroneous_uses[] = sprintf(__('Missing or erroneous poll id for [%s] in pages/posts','foodle-for-democracy-poll'),$shortcode).': <a style="color:darkgreen;" href="'.get_edit_post_link($page_post->ID).'">'.get_the_title($page_post->ID).' ('.$page_post->ID.', id: '.$shortcode_id.')</a>';
        } else {
          $poll_question = '';
          $shortcode_id = $atts['id'];
          if ( is_numeric($shortcode_id) ) {
            $sql = "SELECT * FROM $wpdb->democracy_q where id={$shortcode_id}";
            $poll_question = $wpdb->get_row($sql)->question; // Check whether id exists
          }
          if ( strlen($poll_question) == 0 ) {
            $erroneous_uses[] = sprintf(__('Not existing poll id for [%s] in pages/posts','foodle-for-democracy-poll'),$shortcode).': <a style="color:darkgreen;" href="'.get_edit_post_link($page_post->ID).'">'.get_the_title($page_post->ID).' ('.$page_post->ID.', id: '.$shortcode_id.')</a>';
          } else {
            if ( $shortcode == 'democracy' ) $democracy_uses[$shortcode_id][] = $page_post->ID;
            else if ( $shortcode == 'foodle-democracy-poll-list-log' ) $foodle_uses[$shortcode_id][] = $page_post->ID;
            else if ( $shortcode == 'foodle-comments' ) $comments_uses[$shortcode_id][] = $page_post->ID;
          }
        }
      }
    }
  }

  foreach ( $democracy_uses as $shortcode_id => $shortcode_id_uses) {
      $democracy_uses_serial[$shortcode_id] = implode(',', $shortcode_id_uses);
  }
  foreach ( $foodle_uses as $shortcode_id => $shortcode_id_uses) {
    $foodle_uses_serial[$shortcode_id] = implode(',', $shortcode_id_uses);
  }
  foreach ( $comments_uses as $shortcode_id => $shortcode_id_uses) {
    $comments_uses_serial[$shortcode_id] = implode(',', $shortcode_id_uses);
  }

  $error_database_update = __('Error while trying to update the shortcode use for [%s] in pages/posts','foodle-for-democracy-poll');

  foreach( $democracy_uses_serial as $shortcode_id => $shortcode_id_uses_serial) {
    $sql = "UPDATE $wpdb->democracy_q SET in_posts='{$shortcode_id_uses_serial}' where id={$shortcode_id}";
    $oktest = $wpdb->query($sql); // Correct/update democracy's use entries
    if ( $oktest === false ) $erroneous_uses[] = sprintf($error_database_update,'democracy')." - id: ".$shortcode_id;
  }
  foreach( $foodle_uses_serial as $shortcode_id => $shortcode_id_uses_serial) {
    $sql = "UPDATE $wpdb->democracy_q SET in_foodles='{$shortcode_id_uses_serial}' where id={$shortcode_id}";
    $oktest = $wpdb->query($sql); // Correct/update democracy's use entries
    if ( $oktest === false ) $erroneous_uses[] = sprintf($error_database_update,'foodle-democracy-poll-list-log')." - id: ".$shortcode_id;
  }
  foreach( $comments_uses_serial as $shortcode_id => $shortcode_id_uses_serial) {
    $sql = "UPDATE $wpdb->democracy_q SET in_comments='{$shortcode_id_uses_serial}' where id={$shortcode_id}";
    $oktest = $wpdb->query($sql); // Correct/update democracy's use entries
    if ( $oktest === false ) $erroneous_uses[] = sprintf($error_database_update,'foodle_comments')." - id: ".$shortcode_id;
  }

  $erroneous_uses_democracy_foodle_comments = $erroneous_uses;
  if ( count($erroneous_uses_democracy_foodle_comments) > 0 ) {
    $erroneous_uses_democracy_foodle_comments_html = '<ul style="list-style-type:disc;margin-left:20px;"><li>'.implode('</li><li>',$erroneous_uses_democracy_foodle_comments).'</li></ul>';
    update_option('foodle_shortcode_usage_error_pages_posts', $erroneous_uses_democracy_foodle_comments_html, false);
  }
}
add_action('save_post', 'foodle_check_shortcode_presence', 2147483647, 0); // Upon post save, search the Democracy and Foodle shortcode use and do this late
add_action('dem_poll_inserted', 'foodle_check_shortcode_presence', 2147483647, 0); // Upon Democracy poll save, search the Democracy and Foodle shortcode use and do this late



function foodle_provide_scroll_up_button() {
  global $foodle_help_tooltips;
  global $foodle_scroll_up_button_visible;
  // Show a dynamic scroll up button - before, prevent an unwanted scroll button in the democracy design window
  $foodle_inhibit_democracy_scroll_in_design_backend = ( ( ! $foodle_scroll_up_button_visible['democracy_admin'] ) && ( ! $foodle_scroll_up_button_visible['backend'] ) ) ? "democracy-poll&subpage=design" : "foodle_foo";
  $foodle_inhibit_democracy_scroll_in_texte_backend = ( ( ! $foodle_scroll_up_button_visible['democracy_admin'] ) && ( ! $foodle_scroll_up_button_visible['backend'] ) ) ? "democracy-poll&subpage=l10n" : "foodle_foo";
  $help_scroll_to_top = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('Scroll to top','foodle-for-democracy-poll').'." ' : '';
  echo "<script type='text/javascript' id='foodle_scroll_to_top'>
    var $ = jQuery;
    var foodle_href_check2 = window.location.href;
    if ( ( foodle_href_check2.indexOf('".$foodle_inhibit_democracy_scroll_in_design_backend."') == -1 ) && ( foodle_href_check2.indexOf('".$foodle_inhibit_democracy_scroll_in_texte_backend."') == -1 ) )
      if ( $('html').attr('name') != 'foodle_top' ) {
        $('html').attr('name','foodle_top');
        $('body').append('<a".$help_scroll_to_top." foodle_tooltip_dx=\"-100\" class=\"foodle-smooth-scroll scrollToTopBtn\" id=\"scrollToTopBtn\" foodle_smooth_scroll_duration=\"2000\" foodle_smooth_scroll_effect=\"easeInOutCubic\" foodle_smooth_scroll_offset=\"0\" href=\"#foodle_top\">👆</a>');
        $('head').append('<style>.scrollToTopBtn{position:fixed;bottom:35px;right:35px;z-index:999;opacity:0;transform:translateY(77px);transition: all 0.8s ease;text-align:center;text-decoration:none;background-color:#8Db8c6;border:1px solid #888888;border-radius:4px;cursor:pointer;font-size:30px;line-height:40px;height:40px;width:40px;}.showBtn{opacity:0.9;transform:translateY(0)}</style>');
        $(document).on('scroll',function(){ 
          var scroll_position = $(document).scrollTop();
          if ( scroll_position > ( $(window).height() * 1.5 ))
            $('.scrollToTopBtn').addClass('showBtn');
          else
            $('.scrollToTopBtn').removeClass('showBtn');
        });
      }
  </script>";
}
if ( ( isset($foodle_scroll_up_button_visible['frontend']) ) && ( $foodle_scroll_up_button_visible['frontend'] ) ) add_action('wp_print_footer_scripts', 'foodle_provide_scroll_up_button', 2147483647, 0); // for front end
if ( ( isset($foodle_scroll_up_button_visible['backend']) ) && ( $foodle_scroll_up_button_visible['backend'] ) ) add_action('admin_footer', 'foodle_provide_scroll_up_button', 2147483647, 0); // for back end
//-----------------------------------------
function foodle_remove_scroll_up_button() {
  // Remove the same dynamic scroll up button - just for the Foodle settings to have immediate effect :)
  echo "<script type='text/javascript' id='foodle_scroll_to_top_remove'>
    var $ = jQuery;
    $(document).ready(function(){
      $('html').attr('name','');
      $(document).off('scroll');
      $('.scrollToTopBtn').remove();
    });
  </script>";
}



// ************************************************************************************************************************************************************************************
// ************************************************************************************************************************************************************************************
// ************************************************************************************************************************************************************************************
// **************************************************************************                              ****************************************************************************
// **************************************************************************   The main plugin function   ****************************************************************************
// **************************************************************************                              ****************************************************************************
// ************************************************************************************************************************************************************************************
// ************************************************************************************************************************************************************************************
// ************************************************************************************************************************************************************************************

function foodle_admin_page_callback() {
  global $wpdb;
  global $wp_roles;
  global $wp_admin_bar;
  global $foodle_title;
  global $foodle_admin_menu_color;
  global $foodle_undefined_error;
  global $foodle_sorting;
  global $foodle_help_tooltips;
  global $foodle_frontend_tooltips;
  global $foodle_warnings_removed;
  global $foodle_no_safety_query;
  global $foodle_results_text_default;
  global $foodle_results_text;
  global $foodle_bar_graph_text_default;
  global $foodle_bar_graph_text;
  global $foodle_roles_metafields;
  global $foodle_roles_sorting;
  global $foodle_roles_sproles;
  global $foodle_roles_email;
  global $foodle_roles_usage;
  global $foodle_roles_settings;
  global $foodle_roles_tips;
  global $foodle_roles_deleteun;
  global $foodle_email_link_admins;
  global $foodle_email_link_non_admins;
  global $foodle_show_vote_date_admins;
  global $foodle_show_vote_time_admins;
  global $foodle_show_vote_date_specview;
  global $foodle_show_vote_time_specview;
  global $foodle_scroll_up_button_visible;

  // check user capabilities
  if ( ! current_user_can( 'manage_foodle' ) ) return; // Not allowed!
  
  if ( ! get_option('foodle_dem_categories') ) update_option('foodle_dem_categories', array(), 'yes'); // just to be sure

  $update_in_progress = __('Update in progress ','foodle-for-democracy-poll'); // default text when jumping to another admin page

  // handle and store the Foodle category selection from the democracy poll edit page in option 'foodle_dem_categories'
  if ( isset($_POST['select_poll_categories']) ) {
    $foodle_admin_notice = '';
    $foodle_error = false;
    $foodle_warning = false;

    if ( isset($_POST['democracy_url']) ) {
      $democracy_url = filter_var(esc_url_raw($_POST['democracy_url']), FILTER_VALIDATE_URL);
      $new_poll = __('New Poll','foodle-for-democracy-poll');
      if (! $democracy_url === false ) {
        if ( strpos( $democracy_url, 'add_new') !== false )
          $poll_id = $new_poll;
        else {
          $poll_id = substr($democracy_url,strpos($democracy_url,"&edit_poll=") + 11);
          if ( strpos($poll_id, "&") !== false )
            $poll_id = substr($poll_id,0,strpos($poll_id,"&"));
        }
        if ( $poll_id != $new_poll ) {
          $foodle_dem_categories = (array)get_option('foodle_dem_categories');
          if ( isset($_POST['foodle_dem_categories']) ) {
            $foodle_dem_categories[$poll_id] = array(); // initialize
            foreach($_POST['foodle_dem_categories'] as $foodle_dem_category) {
              $foodle_dem_categories[$poll_id][] = sanitize_text_field($foodle_dem_category);
            }
          } else {
              $foodle_dem_categories[$poll_id] = array(); // no categories
          }
          if ( isset($_POST['sorting_button_text']) ) // determine and store the sorting button text for this Democracy Poll id
            $foodle_dem_categories['sorting_button_text'][$poll_id] = sanitize_text_field($_POST['sorting_button_text']);
          else
            $foodle_dem_categories['sorting_button_text'][$poll_id] = $foodle_sorting;
          if ( isset($_POST['democracy_refresh_button_voted']) ) // determine whether the refresh button shall be displayed after voting for this Democracy Poll id
            $foodle_dem_categories['refresh_button_voted'][$poll_id] = ( $_POST['democracy_refresh_button_voted'] == 'yes' );
          else
            $foodle_dem_categories['refresh_button_voted'][$poll_id] = false;
          if ( isset($_POST['democracy_refresh_button_not_voted']) ) // determine whether the refresh button shall be displayed before voting for this Democracy Poll id
            $foodle_dem_categories['refresh_button_not_voted'][$poll_id] = ( $_POST['democracy_refresh_button_not_voted'] == 'yes' );
          else
            $foodle_dem_categories['refresh_button_not_voted'][$poll_id] = false;
          if ( isset($_POST['democracy_count_marked_voters']) ) // determine whether the refresh button shall be displayed before voting for this Democracy Poll id
            $foodle_dem_categories['count_marked_voters'][$poll_id] = ( $_POST['democracy_count_marked_voters'] == 'yes' );
          else
            $foodle_dem_categories['count_marked_voters'][$poll_id] = false;
          if ( isset($_POST['democracy_delete_poll_IP_addresses']) ) // determine whether storage of IP addresses shall be inhibited for this Democracy Poll id
            $foodle_dem_categories['delete_poll_IP_addresses'][$poll_id] = ( $_POST['democracy_delete_poll_IP_addresses'] == 'yes' );
          else
            $foodle_dem_categories['delete_poll_IP_addresses'][$poll_id] = false;
          if ( isset($_POST['democracy_send_comment_email']) ) // determine whether storage of IP addresses shall be inhibited for this Democracy Poll id
            $foodle_dem_categories['send_comment_email'][$poll_id] = ( $_POST['democracy_send_comment_email'] == 'yes' );
          else
            $foodle_dem_categories['send_comment_email'][$poll_id] = false;
          if ( isset($_POST['foodle_roles_show_democracy']) ) // determine whether storage of IP addresses shall be inhibited for this Democracy Poll id
            $foodle_dem_categories['roles_show_democracy'][$poll_id] = ( $_POST['foodle_roles_show_democracy'] == 'yes' );
          else
            $foodle_dem_categories['roles_show_democracy'][$poll_id] = false;
          if ( isset($_POST['foodle_roles_show_foodle']) ) // determine whether storage of IP addresses shall be inhibited for this Democracy Poll id
            $foodle_dem_categories['roles_show_foodle'][$poll_id] = ( $_POST['foodle_roles_show_foodle'] == 'yes' );
          else
            $foodle_dem_categories['roles_show_foodle'][$poll_id] = false;
          if ( isset($_POST['foodle_roles_show_comments']) ) // determine whether storage of IP addresses shall be inhibited for this Democracy Poll id
            $foodle_dem_categories['roles_show_comments'][$poll_id] = ( $_POST['foodle_roles_show_comments'] == 'yes' );
          else
            $foodle_dem_categories['roles_show_comments'][$poll_id] = false;
          if ( isset($_POST['foodle_roles_do_comments']) ) // determine whether storage of IP addresses shall be inhibited for this Democracy Poll id
            $foodle_dem_categories['roles_do_comments'][$poll_id] = ( $_POST['foodle_roles_do_comments'] == 'yes' );
          else
            $foodle_dem_categories['roles_do_comments'][$poll_id] = false;
          if ( isset($_POST['foodle_roles_show_bar_graph']) ) // determine whether storage of IP addresses shall be inhibited for this Democracy Poll id
            $foodle_dem_categories['roles_show_bar_graph'][$poll_id] = ( $_POST['foodle_roles_show_bar_graph'] == 'yes' );
          else
            $foodle_dem_categories['roles_show_bar_graph'][$poll_id] = false;
          if ( isset($_POST['foodle_roles_show_admin']) ) // determine whether storage of IP addresses shall be inhibited for this Democracy Poll id
            $foodle_dem_categories['roles_show_admin'][$poll_id] = ( $_POST['foodle_roles_show_admin'] == 'yes' );
          else
            $foodle_dem_categories['roles_show_admin'][$poll_id] = false;
          if ( isset($_POST['foodle_dem_category_column']) ) // determine and store the category column for this Democracy Poll id
            $foodle_dem_categories['category_column'][$poll_id] = sanitize_text_field($_POST['foodle_dem_category_column']);
          else
            $foodle_dem_categories['category_column'][$poll_id] = '';
          if ( isset($_POST['event_use']) ) // determine whether the poll concerns an event
            $foodle_dem_categories['event_use'][$poll_id] = ( $_POST['event_use'] == 'yes' );
          else
            $foodle_dem_categories['event_use'][$poll_id] = false;
          if ( isset($_POST['event_auto']) ) // determine whether the poll concerns an event
            $foodle_dem_categories['event_auto'][$poll_id] = ( $_POST['event_auto'] == 'yes' );
          else
            $foodle_dem_categories['event_auto'][$poll_id] = false;
          if ( isset($_POST['event_summary']) ) // determine and store the event_summary/title for this Democracy Poll id
            $foodle_dem_categories['event_summary'][$poll_id] = sanitize_text_field($_POST['event_summary']);
          else
            $foodle_dem_categories['event_summary'][$poll_id] = "";
          if ( isset($_POST['event_start']) ) // determine and store the event_summary/title for this Democracy Poll id
            $foodle_dem_categories['event_start'][$poll_id] = sanitize_text_field($_POST['event_start']);
          else
            $foodle_dem_categories['event_start'][$poll_id] = "";
          if ( isset($_POST['event_end']) ) // determine and store the event_summary/title for this Democracy Poll id
            $foodle_dem_categories['event_end'][$poll_id] = sanitize_text_field($_POST['event_end']);
          else
            $foodle_dem_categories['event_end'][$poll_id] = "";
          if ( isset($_POST['event_description']) ) // determine and store the event_summary/title for this Democracy Poll id
            $foodle_dem_categories['event_description'][$poll_id] = sanitize_text_field($_POST['event_description']);
          else
            $foodle_dem_categories['event_description'][$poll_id] = "";
          if ( isset($_POST['event_location']) ) // determine and store the event_summary/title for this Democracy Poll id
            $foodle_dem_categories['event_location'][$poll_id] = sanitize_text_field($_POST['event_location']);
          else
            $foodle_dem_categories['event_location'][$poll_id] = "";
          if ( isset($_POST['event_url']) ) // determine and store the event_summary/title for this Democracy Poll id
            $foodle_dem_categories['event_url'][$poll_id] = sanitize_text_field($_POST['event_url']);
          else
            $foodle_dem_categories['event_url'][$poll_id] = "";
          if ( isset($_POST['ics_button_text']) ) // determine and store the event_summary/title for this Democracy Poll id
            $foodle_dem_categories['ics_button_text'][$poll_id] = sanitize_text_field($_POST['ics_button_text']);
          else
            $foodle_dem_categories['ics_button_text'][$poll_id] = "";
          $foodle_roles_concerned_selection = false;
          if ( isset($_POST['foodle_roles_concerned']) ) {
            $sanitized_foodle_roles_array = array();
            $poll_id = 0;
            foreach ( $_POST['foodle_roles_concerned'] as $selected_foodle_role ) {
              $foodle_role_sanitized = sanitize_text_field($selected_foodle_role);
              if ( $poll_id == 0 ) $poll_id = (int)substr($foodle_role_sanitized, 0, strpos($foodle_role_sanitized, '|'));
              $foodle_role = substr($foodle_role_sanitized, strpos($foodle_role_sanitized, '|') + 1);
              if ( $foodle_role != "*" ) $sanitized_foodle_roles_array[] = $foodle_role;
            }
            $sanitized_foodle_roles_array_serialized = serialize($sanitized_foodle_roles_array);
            $sql = "SELECT * FROM $wpdb->democracy_q WHERE id={$poll_id}";
            $current_roles_concerned = $wpdb->get_row($sql)->roles_concerned;
            if ( $current_roles_concerned == "") $current_roles_concerned = serialize(array()); // Make sure that the change from an unfilled database field to a serialized empty array is not recognized as a change in content.
            $sql = "UPDATE $wpdb->democracy_q SET roles_concerned='{$sanitized_foodle_roles_array_serialized}' WHERE id={$poll_id}";
            $wpdb->query($sql);
            if ( $current_roles_concerned !== $sanitized_foodle_roles_array_serialized ) $foodle_roles_concerned_selection = true;
          }
          $foodle_roles_for_not_voted_selection = false;
          if ( isset($_POST['foodle_roles_for_not_voted']) ) { // determine for which roles the tooltip with users that did not vote for a poll shall be displayed
            $sanitized_foodle_roles_for_not_voted_array = array();
            $poll_id = 0;
            foreach ( $_POST['foodle_roles_for_not_voted'] as $selected_foodle_role ) {
              $foodle_role_sanitized = sanitize_text_field($selected_foodle_role);
              if ( $poll_id == 0 ) $poll_id = (int)substr($foodle_role_sanitized, 0, strpos($foodle_role_sanitized, '|'));
              $foodle_role = substr($foodle_role_sanitized, strpos($foodle_role_sanitized, '|') + 1);
              if ( $foodle_role != "*" ) $sanitized_foodle_roles_for_not_voted_array[] = $foodle_role;
            }
            $foodle_dem_categories['roles_for_not_voted'][$poll_id] = $sanitized_foodle_roles_for_not_voted_array;
            if ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['roles_for_not_voted'][$poll_id]) ) )
              $roles_for_not_voted = ( get_option('foodle_dem_categories')['roles_for_not_voted'][$poll_id] );
            else
              $roles_for_not_voted = array('');
            if ( $roles_for_not_voted !== $sanitized_foodle_roles_for_not_voted_array ) $foodle_roles_for_not_voted_selection = true;
          }
        }
        foodle_pwx_admin_notice__info('<p><span style="vertical-align:160%;">'.$update_in_progress.'...&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <img src="'.plugin_dir_url(__FILE__).'img/loader.gif"></p>');
        if ( ( update_option('foodle_dem_categories', $foodle_dem_categories, 'yes') ) || ( $foodle_roles_concerned_selection ) ) // store it, check success and jump back with the news as GET parameters...
          echo '<script type="text/javascript">window.location.href="'.$democracy_url.'&foodle_dem_edit=foodle_changed"</script>';
        else
          echo '<script type="text/javascript">window.location.href="'.$democracy_url.'&foodle_dem_edit=foodle_unchanged"</script>';
      } else {
        foodle_pwx_admin_notice__defined_error('<p>'.__('The democracy poll url could not properly be retrieved','foodle-for-democracy-poll').'</p>');
      }
    } else {
      foodle_pwx_admin_notice__defined_error('<p>'.__('The Foodle categories could not properly be set during democracy poll edit','foodle-for-democracy-poll').'</p>');
    }
  }

  // handle the update of the shortcode use
  if ( isset($_POST['update_shortcode_usage']) ) {
    foodle_check_shortcode_presence();
    if ( ! get_option('foodle_shortcode_usage_error_pages_posts') ) {
      $foodle_admin_notice = __('The shortcode use update was performed successfully','foodle-for-democracy-poll').'.';
      foodle_pwx_admin_notice__success('<p>'.$foodle_admin_notice.'</p>');
    } else {
      $foodle_admin_notice = __('Errors were found during the shortcode use update','foodle-for-democracy-poll');
      foodle_pwx_admin_notice__warning('<p>'.$foodle_admin_notice.'</p>');
    }
  }

  // handle and store the other Foodle settings in option 'foodle_settings'
  if ( isset($_POST['save_foodle_settings']) ) {
    $foodle_admin_notice = '';
    $foodle_error = false;
    $foodle_warning = false;

    if ( ( current_user_can('manage_options') ) && ( isset($_POST['foodle_title']) ) && ( $_POST['foodle_title'] != '' ) ) { // last line of defence for an administrator privilege
      $foodle_title = sanitize_text_field($_POST['foodle_title']);
    }
    else if ( ( current_user_can('manage_options') ) && ( isset($_POST['foodle_title']) ) )
      $foodle_title = 'Foodle';

    if ( ( isset($_POST['foodle_results_text']) ) && ( $_POST['foodle_results_text'] != '' ) ) {
      $foodle_results_text = sanitize_text_field($_POST['foodle_results_text']);
    } else $foodle_results_text = $foodle_results_text_default;

    if ( ( isset($_POST['foodle_bar_graph_text']) ) && ( $_POST['foodle_bar_graph_text'] != '' ) ) {
      $foodle_bar_graph_text = sanitize_text_field($_POST['foodle_bar_graph_text']);
    } else $foodle_bar_graph_text = $foodle_bar_graph_text_default;

    if ( current_user_can('manage_options') ) { // last line of defence for an administrator privilege
      $foodle_email_link_admins = ( isset($_POST['voter-email-link-for-admins']) ) ? true : false;
      $foodle_email_link_non_admins = ( isset($_POST['voter-email-link-for-non-admins']) ) ? true : false;
    }

    if ( current_user_can('manage_options') ) { // last line of defence for an administrator privilege
      $foodle_show_vote_date_admins = ( isset($_POST['vote-date-for-admins']) ) ? true : false;
      $foodle_show_vote_time_admins = ( isset($_POST['vote-time-for-admins']) ) ? true : false;
      $foodle_show_vote_date_specview = ( isset($_POST['vote-date-for-specview']) ) ? true : false;
      $foodle_show_vote_time_specview = ( isset($_POST['vote-time-for-specview']) ) ? true : false;
    }

    if ( ( isset($_POST['foodle_admin_menu_color']) ) && ( $_POST['foodle_admin_menu_color'] != '' ) ) {
      $foodle_admin_menu_color = sanitize_text_field($_POST['foodle_admin_menu_color']);
    } else $foodle_admin_menu_color = '#8CBD5A';

    if ( ( current_user_can('manage_options') ) && ( isset($_POST['foodle_page_post_exclusion']) ) && ( $_POST['foodle_page_post_exclusion'] != '' ) ) { // last line of defence for an administrator privilege
      $foodle_page_post_exclusion = array_filter(explode(',', sanitize_text_field($_POST['foodle_page_post_exclusion'])));
    } else
    if ( ( current_user_can('manage_options') ) && ( isset($_POST['foodle_page_post_exclusion']) ) )
      $foodle_page_post_exclusion = array();
    else
      $foodle_page_post_exclusion = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle_page_post_exclusion']) ) ) ? get_option('foodle_settings')['foodle_page_post_exclusion'] : array();

    if ( ( current_user_can('manage_options') ) && ( isset($_POST['foodle_democracy_textarea_template']) ) ) { // last line of defence for an administrator privilege
      $foodle_democracy_textarea_template_new = sanitize_textarea_field($_POST['foodle_democracy_textarea_template']);
    }

      if ( ( isset($_POST['foodle_date_format']) ) && ( $_POST['foodle_date_format'] != '' ) ) {
      $foodle_date_format = sanitize_text_field($_POST['foodle_date_format']);
    } else $foodle_date_format = 'mm/dd/yy';

    if ( ( current_user_can('manage_options') ) && ( isset($_POST['foodle_selected_roles']) ) ) { // last line of defence for an administrator privilege
      $foodle_selected_roles = array();
      foreach($_POST['foodle_selected_roles'] as $foodle_selected_role) {
        $foodle_selected_roles[] = sanitize_text_field($foodle_selected_role);
      }
    } 
    else
    if ( current_user_can('manage_options' ) )
      $foodle_selected_roles = array();
    else
      $foodle_selected_roles = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle_selected_roles']) ) ) ? get_option('foodle_settings')['foodle_selected_roles'] : array();
    
    if ( current_user_can('manage_options') ) { // last line of defence for an administrator privilege
      $foodle_roles_metafields = ( isset($_POST['foodle-roles-metafields']) ) ? true : false;
      $foodle_roles_sorting = ( isset($_POST['foodle-roles-sorting']) ) ? true : false;
      $foodle_roles_sproles = ( isset($_POST['foodle-roles-sproles']) ) ? true : false;
      $foodle_roles_email = ( isset($_POST['foodle-roles-email']) ) ? true : false;
      $foodle_roles_usage = ( isset($_POST['foodle-roles-usage']) ) ? true : false;
      $foodle_roles_settings = ( isset($_POST['foodle-roles-settings']) ) ? true : false;
      $foodle_roles_tips = ( isset($_POST['foodle-roles-tips']) ) ? true : false;
      $foodle_roles_deleteun = ( isset($_POST['foodle-roles-deleteun']) ) ? true : false;
    }
    $foodle_show_in_admin_menu_bar = ( isset($_POST['show-in-admin-menu-bar']) ) ? true : false;
    if ( current_user_can('manage_options') ) // last line of defence for an administrator privilege
      $foodle_remove_vote_expiry = ( isset($_POST['remove-vote-expiry']) ) ? true : false;
    else
      $foodle_remove_vote_expiry = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['remove-vote-expiry']) ) ) ? get_option('foodle_settings')['remove-vote-expiry'] : false;
    $foodle_metafield_user_profile = ( isset($_POST['metafields-user-profile']) ) ? true : false;
    $foodle_help_tooltips = ( isset($_POST['help-tooltips']) ) ? true : false;
    $foodle_frontend_tooltips = ( isset($_POST['frontend-tooltips']) ) ? true : false;
    $foodle_warnings_removed = ( isset($_POST['remove-warnings']) ) ? true : false;
    $foodle_no_safety_query = ( isset($_POST['no-safety-query']) ) ? true : false;

    if ( current_user_can('manage_options') ) { // last line of defence for an administrator privilege
      $foodle_scroll_up_button_visible['frontend'] = ( isset($_POST['scroll-up-visible-frontend']) ) ? true : false;
      $foodle_scroll_up_button_visible['democracy'] = ( isset($_POST['scroll-up-visible-democracy']) ) ? true : false;
      $foodle_scroll_up_button_visible['foodle'] = ( isset($_POST['scroll-up-visible-foodle']) ) ? true : false;
      $foodle_scroll_up_button_visible['comments'] = ( isset($_POST['scroll-up-visible-comments']) ) ? true : false;
      $foodle_scroll_up_button_visible['bar_graph'] = ( isset($_POST['scroll-up-visible-bar-graph']) ) ? true : false;
      $foodle_scroll_up_button_visible['backend'] = ( isset($_POST['scroll-up-visible-backend']) ) ? true : false;
      $foodle_scroll_up_button_visible['democracy_admin'] = ( isset($_POST['scroll-up-visible-democracy-admin']) ) ? true : false;
      $foodle_scroll_up_button_visible['foodle_admin'] = ( isset($_POST['scroll-up-visible-foodle-admin']) ) ? true : false;
      if ( ( ! ( $foodle_scroll_up_button_visible['foodle_admin'] ) ) && ( ! ( $foodle_scroll_up_button_visible['backend'] ) ) ) foodle_remove_scroll_up_button();
      if ( ( $foodle_scroll_up_button_visible['foodle_admin'] ) || ( $foodle_scroll_up_button_visible['backend'] ) ) foodle_provide_scroll_up_button();
    }

    $foodle_settings = array();
    $foodle_settings['foodle_title'] = $foodle_title;
    $foodle_settings['foodle_results_text'] = $foodle_results_text;
    $foodle_settings['foodle_bar_graph_text'] = $foodle_bar_graph_text;
    $foodle_settings['foodle_admin_menu_color'] = $foodle_admin_menu_color;
    $foodle_settings['foodle_page_post_exclusion'] = $foodle_page_post_exclusion;
    $foodle_settings['foodle_date_format'] = $foodle_date_format;
    $foodle_settings['foodle_selected_roles'] = $foodle_selected_roles;
    $foodle_settings['show-in-admin-menu-bar'] = $foodle_show_in_admin_menu_bar;
    $foodle_settings['remove-vote-expiry'] = $foodle_remove_vote_expiry;
    $foodle_settings['metafields-user-profile'] = $foodle_metafield_user_profile;
    $foodle_settings['help-tooltips'] = $foodle_help_tooltips;
    $foodle_settings['frontend-tooltips'] = $foodle_frontend_tooltips;
    $foodle_settings['remove-warnings'] = $foodle_warnings_removed;
    $foodle_settings['no-safety-query'] = $foodle_no_safety_query;
    $foodle_settings['foodle-roles-metafields'] = $foodle_roles_metafields;
    $foodle_settings['foodle-roles-sorting'] = $foodle_roles_sorting;
    $foodle_settings['foodle-roles-sproles'] = $foodle_roles_sproles;
    $foodle_settings['foodle-roles-email'] = $foodle_roles_email;
    $foodle_settings['foodle-roles-usage'] = $foodle_roles_usage;
    $foodle_settings['foodle-roles-settings'] = $foodle_roles_settings;
    $foodle_settings['foodle-roles-tips'] = $foodle_roles_tips;
    $foodle_settings['foodle-roles-deleteun'] = $foodle_roles_deleteun;
    $foodle_settings['voter-email-link-for-admins'] = $foodle_email_link_admins;
    $foodle_settings['voter-email-link-for-non-admins'] = $foodle_email_link_non_admins;
    $foodle_settings['vote-date-for-admins'] = $foodle_show_vote_date_admins;
    $foodle_settings['vote-time-for-admins'] = $foodle_show_vote_time_admins;
    $foodle_settings['vote-date-for-specview'] = $foodle_show_vote_date_specview;
    $foodle_settings['vote-time-for-specview'] = $foodle_show_vote_time_specview;
    $foodle_settings['foodle-democracy-textarea-template'] = $foodle_democracy_textarea_template_new;
    $foodle_settings['foodle-scroll-up-button-visible'] = $foodle_scroll_up_button_visible;

    if ( $foodle_error ) {
      foodle_pwx_admin_notice__defined_error('<p>'.$foodle_admin_notice.'</p>');
    } else {
      if ( update_option('foodle_settings', $foodle_settings, 'yes') ) { // Settings were changed
        // Set or remove the roles' capability for Foodle
        foreach ( $wp_roles->role_names as $foodle_wp_role_slug=>$foodle_wp_role_name ) {
            if ( $foodle_wp_role_slug == 'administrator' ) continue;
            if ( in_array($foodle_wp_role_slug,$foodle_selected_roles) )
                wp_roles()->add_cap( $foodle_wp_role_slug, 'manage_foodle' );
            else
                wp_roles()->remove_cap( $foodle_wp_role_slug, 'manage_foodle' );
        }
        // Set or remove cronjob for vote expiry
        if ( $foodle_remove_vote_expiry )
            foodle_schedule_cron();
        else
            foodle_unschedule_cron();
        foodle_pwx_admin_notice__success('<p>'.__('The Foodle settings were properly stored','foodle-for-democracy-poll').'.</p>');
      }
      else
        foodle_pwx_admin_notice__success('<p>'.__('The Foodle settings did not change','foodle-for-democracy-poll').'.</p>');
    }
  }

  // handle and store the user / role properties in option 'foodle_special_functions'
  if ( isset($_POST['save_special_roles_users']) ) {
    $foodle_admin_notice = 'Error: No error found - but nothing done!';
    $foodle_error = false;
    $foodle_warning = false;

    $foodle_special_functions = array();
    if ( ( isset($_POST['foodle_functions_line']) ) && ( isset($_POST['roles_users_field']) ) ) {
      $foodle_line_count = -1; // to have the first iteration see 0
      foreach( $_POST['foodle_functions_line'] as $foodle_line_ref ) { // just for referring to the input lines, even if some had been deleted
        $foodle_line_count += 1;
        $foodle_line_ref = sanitize_text_field($foodle_line_ref);

        if ( ( $_POST['roles_users_field'][$foodle_line_count] == 'no_selection' ) ) {
            $foodle_warning = true;
            $foodle_admin_notice = __('Minimum one role/user name found empty. Such rows are ignored','foodle-for-democracy-poll');
            continue; // remove lines without user or role selection but allow lines without a capability being set
        }

        $roles_users_field = ($_POST['roles_users_field'][$foodle_line_count]);

        $foodle_capabilities_raw = ( isset($_POST['capabilities'.$foodle_line_ref]) ) ? $_POST['capabilities'.$foodle_line_ref] : array() ;
        $foodle_capabilities = array();
        foreach( (array)$foodle_capabilities_raw as $foodle_capability ) {
          $foodle_capabilities[] = sanitize_text_field($foodle_capability);
        }
        $foodle_special_functions[$roles_users_field] = $foodle_capabilities;
      }

      if ( $foodle_error ) {
        foodle_pwx_admin_notice__defined_error('<p>'.$foodle_admin_notice.'</p>');
      } else {
        if ( $foodle_warning )
          foodle_pwx_admin_notice__warning('<p>'.$foodle_admin_notice.'</p>');
        if ( update_option('foodle_special_functions', $foodle_special_functions, 'yes') )
          foodle_pwx_admin_notice__success('<p>'.__('The Foodle \'Special Roles & Users\' definiton was properly set','foodle-for-democracy-poll').'.</p>');
        else
          foodle_pwx_admin_notice__success('<p>'.__('The Foodle \'Special Roles & Users\' definiton did not change','foodle-for-democracy-poll').'.</p>');
    }
    } else {
      foodle_pwx_admin_notice__error();
    }
  }

  // handle the metafield defaults & sorting definitions and storage in option 'foodle_defaults_sorting' and replacements directly in database 'usermeta'
  if ( isset($_GET['foodle_sorting_done']) ) { // coming back from changing the data
    if ( $_GET['foodle_sorting_done'] == 'yes' ) { // all good
      $foodle_admin_notice = '<p>'.__('The Foodle Defaults & Sorting definition was properly saved','foodle-for-democracy-poll').'.</p>';
      foodle_pwx_admin_notice__success($foodle_admin_notice);
    } else
    if ( $_GET['foodle_sorting_done'] == 'no' ) { // not good
      $foodle_admin_notice = '<p>'.__('The Foodle Defaults & Sorting update failed','foodle-for-democracy-poll').'.</p>';
      foodle_pwx_admin_notice__defined_error($foodle_admin_notice);
    } else
    if ( $_GET['foodle_sorting_done'] == 'nochange' ) { // not good
      $foodle_admin_notice = '<p>'.__('The Foodle Defaults & Sorting did not change','foodle-for-democracy-poll').'.</p>';
      foodle_pwx_admin_notice__success($foodle_admin_notice);
    }
  }
  if ( isset($_POST['save_meta_defaults_sorting']) ) {
    $foodle_admin_notice = '';
    $foodle_error = false;
    $foodle_warning = false;
    
    $foodle_meta_defaults_sorting = array();
    if ( isset($_POST['subreplace']) ) {
      foreach($_POST['subreplace'] as $foodle_meta_name => $foodle_meta_name_replace_data) {
        $foodle_meta_name = sanitize_text_field($foodle_meta_name);
        foreach($foodle_meta_name_replace_data as $foodle_subcategory_old => $foodle_subcategory_new) {
          $foodle_subcategory_old = ( $foodle_subcategory_old == ' ' ) ? '&nbsp;' : $foodle_subcategory_old;
          $foodle_subcategory_old = sanitize_text_field($foodle_subcategory_old);
          $foodle_subcategory_new = sanitize_text_field($foodle_subcategory_new);
          if ( $foodle_subcategory_new != '') {
            $foodle_meta_key=foodle_fieldname_to_meta_name($foodle_meta_name);
            $sql = "UPDATE $wpdb->usermeta SET meta_value='".$foodle_subcategory_new."' WHERE meta_key='".$foodle_meta_key."' AND meta_value='".$foodle_subcategory_old."'";
            $wpdb->query($sql);
          }
        }
      }
      $wpdb->flush(); // flush any cached query result
    } else $foodle_error = true;
    if ( isset($_POST['sorttype']) ) {
      foreach($_POST['sorttype'] as $foodle_meta_name => $foodle_meta_sort_type) {
        $foodle_meta_name = sanitize_text_field($foodle_meta_name);
        $foodle_meta_sort_type = sanitize_text_field($foodle_meta_sort_type);
        if ( isset($_POST['sortlist'][$foodle_meta_name]) ) {
          $foodle_meta_sort_list = '';
          if ( isset($_POST['sortlist']) ) {
              $foodle_meta_sort_list = nl2br($_POST['sortlist'][$foodle_meta_name],false);
              $foodle_meta_sort_list = html_entity_decode(sanitize_text_field(htmlentities(stripslashes(str_replace('<br><br>','<br>',preg_replace('#\r|\n#','',$foodle_meta_sort_list))))));
              // cope with empty lines
              $foodle_meta_sort_list = str_replace('<br><br>','<br>&nbsp;<br>',str_replace('<br><br>','<br>&nbsp;<br>',str_replace(' <br>','&nbsp;<br>',preg_replace('/(?:\xC2\xA0)+<br>/','&nbsp;<br>',$foodle_meta_sort_list))));
              $foodle_meta_sort_list = ( substr($foodle_meta_sort_list,0,4) == "<br>") ? "&nbsp;".$foodle_meta_sort_list : $foodle_meta_sort_list;
              $foodle_meta_sort_list = ( substr($foodle_meta_sort_list,-4,4) == "<br>") ? $foodle_meta_sort_list."&nbsp;" : $foodle_meta_sort_list;
            } else $foodle_error = true;
          $foodle_meta_defaults_sorting[$foodle_meta_name]['sorttype'] = $foodle_meta_sort_type;
          $foodle_meta_defaults_sorting[$foodle_meta_name]['sortlist'] = $foodle_meta_sort_list;
          $foodle_meta_defaults_sorting[foodle_fieldname_to_meta_name($foodle_meta_name)] = $foodle_meta_name;
        } else $foodle_error = true;
      }
    } else $foodle_error = true;
    foodle_pwx_admin_notice__info('<p><span style="vertical-align:160%;">'.$update_in_progress.'...&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <img src="'.plugin_dir_url(__FILE__).'img/loader.gif"></p>');
    if (! $foodle_error ) {
        if ( update_option('foodle_meta_defaults_sorting', $foodle_meta_defaults_sorting, 'yes') )
          echo '<script type="text/javascript">window.location.href="'.admin_url( 'admin.php?page=foodle-admin-page&tab=metafield-default-sorting&foodle_sorting_done=yes' ).'"</script>'; // ... and jump back to properly reload the user meta data
        else
          echo '<script type="text/javascript">window.location.href="'.admin_url( 'admin.php?page=foodle-admin-page&tab=metafield-default-sorting&foodle_sorting_done=nochange' ).'"</script>'; // ... and jump back to properly reload the user meta data
    } else {
        echo '<script type="text/javascript">window.location.href="'.admin_url( 'admin.php?page=foodle-admin-page&tab=metafield-default-sorting&foodle_sorting_done=no' ).'"</script>'; // ... and jump back to properly reload the user meta data
    }
  }

  // Handle the meta field clean-up initiatied from the defaults & soting tab
  if ( isset($_POST['meta_field_clean_up']) ) { // can only be fired by administrators and only if there is a non-empty drop down list!
    $foodle_meta_field = sanitize_text_field($_POST['meta_field_clean_up']);
    $foodle_meta_field_slug = foodle_fieldname_to_meta_name($foodle_meta_field);
    $users = get_users(array(
      'orderby'  => 'meta_value',
      'meta_key' => 'last_name', // just a habit ;-)
      'order'    => 'ASC'
    ));
    $foodle_related_roles_array = ( isset(get_option('foodle_meta_fields')[$foodle_meta_field][5]) ) ? get_option('foodle_meta_fields')[$foodle_meta_field][5] : array('all') ;
    // Clean the sortlist as if it was saved with the 2.5.20.0 algorithm - just to be sure
    $foodle_meta_defaults_sorting = get_option('foodle_meta_defaults_sorting');
    $foodle_meta_sort_list = $foodle_meta_defaults_sorting[$foodle_meta_field]['sortlist'];
    // cope with empty lines
    $foodle_meta_sort_list = str_replace('<br><br>','<br>&nbsp;<br>',str_replace('<br><br>','<br>&nbsp;<br>',str_replace(' <br>','&nbsp;<br>',preg_replace('/(?:\xC2\xA0)+<br>/','&nbsp;<br>',$foodle_meta_sort_list))));
    $foodle_meta_sort_list = ( substr($foodle_meta_sort_list,0,4) == "<br>") ? "&nbsp;".$foodle_meta_sort_list : $foodle_meta_sort_list;
    $foodle_meta_sort_list = ( substr($foodle_meta_sort_list,-4,4) == "<br>") ? $foodle_meta_sort_list."&nbsp;" : $foodle_meta_sort_list;
    $foodle_meta_defaults_sorting[$foodle_meta_field]['sortlist'] = $foodle_meta_sort_list;
    update_option('foodle_meta_defaults_sorting',$foodle_meta_defaults_sorting,true);
    // And now get it to use it
    $foodle_sortlist_array = explode('<br>',get_option('foodle_meta_defaults_sorting')[$foodle_meta_field]['sortlist']);
    foreach($users as $user) {
      $foodle_user_id = $user->id;
      $foodle_user_roles = (array)$user->roles;
      $foodle_user_meta = get_user_meta($user->id,$foodle_meta_field_slug,true);
      if ( ( ! in_array('all',$foodle_related_roles_array) ) && ( count(array_intersect($foodle_user_roles,$foodle_related_roles_array)) == 0 ) ) {
      //if ( ( ! in_array('all',$foodle_related_roles_array) ) && ( count(array_intersect($foodle_user_roles,$foodle_related_roles_array)) == 0 ) && ( ! in_array('administrator',$foodle_user_roles) ) ) { // This could be used to leave administrators out of the game, however, currently not!
        delete_user_meta($user->id,$foodle_meta_field_slug);
      } else {
        if ( ! in_array($foodle_user_meta,$foodle_sortlist_array) ) {
        //if ( ( ! in_array($foodle_user_meta,$foodle_sortlist_array) ) && ( ! in_array('administrator',$foodle_user_roles) ) ) { // This could be used to leave administrators out of the game, however, currently not!
          update_user_meta($foodle_user_id,$foodle_meta_field_slug,'&nbsp;');
        }
      }
    }
    $foodle_admin_notice = __('The meta field clean-up was performed for','foodle-for-democracy-poll').' "<strong>'.str_replace('••','',$foodle_meta_field).'</strong>".';
    foodle_pwx_admin_notice__success('<p>'.$foodle_admin_notice.'</p>');
  }

  // Handle the listing of meta field sub-category members

  $help_click_for_user_edit = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('Click to edit this user.','foodle-for-democracy-poll').'"' : '';
  if ( isset($_POST['foodle_list_meta_sub_members']) ) {
    $foodle_list_meta_sub_members = sanitize_text_field($_POST['foodle_list_meta_sub_members']);
    $foodle_user_meta = explode('|',$foodle_list_meta_sub_members)[0];
    $foodle_user_meta_fieldname = foodle_fieldname_to_meta_name($foodle_user_meta);
    $foodle_user_meta_input = explode('|',$foodle_list_meta_sub_members)[1];
    $foodle_user_meta_input = ( $foodle_user_meta_input == ' ' ) ? '&nbsp;' : $foodle_user_meta_input;
    $users = get_users(array(
      'orderby'  => 'meta_value',
      'meta_key' => 'last_name', // just a habit ;-)
      'order'    => 'ASC'
    ));
    $foodle_admin_notice = '';
    $foodle_list_count = 0;
    foreach ( $users as $user ) {
      $foodle_user_id = $user->ID;
      $foodle_user_info = get_userdata($foodle_user_id);
      if ( get_user_meta($foodle_user_id,$foodle_user_meta_fieldname,true) == $foodle_user_meta_input ) {
        $foodle_list_count += 1;
        $foodle_admin_notice .= '<p '.$help_click_for_user_edit.' ><a href="'.get_admin_url().'user-edit.php?user_id='.$foodle_user_id.'">'.$foodle_user_info->user_login.' (ID='.$user->ID.')</a></p>';
      }
    }
    $foodle_admin_notice = '<p>'.sprintf(_n('%d user found for','%d users found for',$foodle_list_count,'foodle-for-democracy-poll'),$foodle_list_count).' <strong>'.str_replace('••','',$foodle_user_meta).' - '.$foodle_user_meta_input.'</strong>:</p>'.$foodle_admin_notice;
    foodle_pwx_admin_notice__info('<p>'.$foodle_admin_notice.'</p>');
  }

  // Handle the deletion of orphaned metafields in the database (usermeta)
  if ( ( ( current_user_can('manage_options') ) || ( $foodle_roles_deleteun ) ) && ( isset($_POST['delete_no_longer_used_metafields']) ) ) {
    $foodle_admin_notice = '';
    $foodle_meta_fields = array();

    $users = get_users(array(
        'orderby'  => 'meta_value',
        'meta_key' => 'last_name', // just a habit ;-)
        'order'    => 'ASC'
    ));

    if ( get_option('foodle_meta_fields') ) {

        // Build an array with the current foodle field names as stored in usermeta
        foreach ( get_option('foodle_meta_fields') as $foodle_fieldname => $foodle_fielddescription ) {
            $foodle_meta_fields[] = foodle_fieldname_to_meta_name($foodle_fieldname);
        }
        
        // Delete all orphaned foodle meta data
        $foodle_usermeta_count = 0;
        $foodle_user_count = 0;
        foreach ( $users as $user ) {
            $foodle_single_user_usermeta_count = 0;
            $foodle_user_id = $user->ID;
            $foodle_user_meta = get_user_meta($foodle_user_id);
            foreach( $foodle_user_meta as $foodle_meta_key => $foodle_meta_value ) {
                if ( ( strpos($foodle_meta_key,'foodle-field-') === 0 ) && ( ! in_array($foodle_meta_key,$foodle_meta_fields,true) ) ) {
                    delete_user_meta($foodle_user_id, $foodle_meta_key);
                    $foodle_single_user_usermeta_count +=1;
                    $foodle_usermeta_count += 1;
                }
            }
            if ( $foodle_single_user_usermeta_count > 0 ) $foodle_user_count += 1;
        }
        $foodle_admin_notice = __('Result','foodle-for-democracy-poll').': '.$foodle_usermeta_count.' '.__('database','foodle-for-democracy-poll').' '._n('entry was','entries were',$foodle_usermeta_count,'foodle-for-democracy-poll').' '.__('deleted for','foodle-for-democracy-poll').' '.$foodle_user_count.' '._n('registered user','registered users',$foodle_user_count,'foodle-for-democracy-poll');
        foodle_pwx_admin_notice__success('<p>'.$foodle_admin_notice.'</p>');
    } else {
        $foodle_admin_notice = __('The metafield definition was not found: deleting all metadata!','foodle-for-democracy-poll');
        foodle_pwx_admin_notice__info('<p>'.$foodle_admin_notice.'</p>');

        // Delete all foodle meta data as no metafields are defined any more
        $foodle_usermeta_count = 0;
        $foodle_user_count = 0;
        foreach ( $users as $user ) {
            $foodle_single_user_usermeta_count = 0;
            $foodle_user_id = $user->ID;
            $foodle_user_meta = get_user_meta($foodle_user_id);
            foreach( $foodle_user_meta as $foodle_meta_key => $foodle_meta_value ) {
                if ( strpos($foodle_meta_key,'foodle-field-') === 0 ) {
                    delete_user_meta($foodle_user_id, $foodle_meta_key);
                    $foodle_single_user_usermeta_count +=1;
                    $foodle_usermeta_count += 1;
                }
            }
            if ( $foodle_single_user_usermeta_count > 0 ) $foodle_user_count += 1;
        }
        $foodle_admin_notice = __('Result','foodle-for-democracy-poll').': '.$foodle_usermeta_count.' '.__('database','foodle-for-democracy-poll').' '._n('entry was','entries were',$foodle_usermeta_count,'foodle-for-democracy-poll').' '.__('deleted for','foodle-for-democracy-poll').' '.$foodle_user_count.' '._n('registered user','registered users',$foodle_user_count,'foodle-for-democracy-poll');
        foodle_pwx_admin_notice__success('<p>'.$foodle_admin_notice.'</p>');
    }
  } else if ( isset($_POST['delete_no_longer_used_metafields']) ) {
        $foodle_admin_notice = __('This function is for Foodle administrators only','foodle-for-democracy-poll').'!';
        foodle_pwx_admin_notice__defined_error('<p>'.$foodle_admin_notice.'</p>');        
  }

  // Handle the complex user meta and regexp handling and storage in options 'foodle_meta_fields' and 'foodle_regex_main'
  if ( isset($_POST['save_metafields_definition']) ) {
    $foodle_admin_notice = '';
    $foodle_error = false;
    $foodle_warning = false;

    $foodle_meta_fields = array();
    $foodle_regex_main = array();
    if ( ( isset($_POST['foodle_meta_line']) ) && ( isset($_POST['own_meta_field']) ) && ( isset($_POST['existing_meta_field']) ) && ( isset($_POST['description']) ) && ( isset($_POST['foodle_roles_for_meta_field']) ) && ( isset($_POST['regexp_field']) ) && ( isset($_POST['foodle_poll_use0']) ) && ( isset($_POST['foodle_category_use0']) ) && ( isset($_POST['meta_field_type']) ) ) {
      $foodle_line_count = -1; // to have the first iteration see 0
      foreach( $_POST['foodle_meta_line'] as $foodle_line_ref ) { // just for referring to the input lines, even if some had been deleted
        $foodle_line_count += 1;
        $foodle_line_ref = sanitize_text_field($foodle_line_ref);
        if ( $_POST['own_meta_field'][$foodle_line_count] == '---' ) {
          if ( strpos($_POST['existing_meta_field'][$foodle_line_count],'foodle-field-') === false ) {
            $foodle_field_name = '••'.sanitize_text_field($_POST['existing_meta_field'][$foodle_line_count]);
          }
          else { // recovery of still existing data
            $user_meta_key = sanitize_text_field($_POST['existing_meta_field'][$foodle_line_count]);
            $foodle_meta_field_slug = substr($user_meta_key,13);
            $foodle_field_name = str_replace('_',' ',str_replace('€','.',$foodle_meta_field_slug));
          }
        } else {
            $foodle_field_name = sanitize_text_field($_POST['own_meta_field'][$foodle_line_count]);
        }
        $description = sanitize_text_field($_POST['description'][$foodle_line_count]);
        $description = ($description == '---') ? '' : $description;

        $foodle_roles_for_meta_field_array = array();
        foreach ( $_POST['foodle_roles_for_meta_field'][$foodle_line_ref] as $selected_foodle_role ) {
          $foodle_role_sanitized = sanitize_text_field($selected_foodle_role);
          if ( $foodle_role_sanitized != "*" ) $foodle_roles_for_meta_field_array[] = $foodle_role_sanitized;
        }
        if ( count($foodle_roles_for_meta_field_array) == 0 ) $foodle_roles_for_meta_field_array = array('all');

        $link_meta_field = sanitize_text_field($_POST['link_meta_field'][$foodle_line_count]);
        $link_meta_field = ($link_meta_field == '---') ? '' : $link_meta_field;
        $foodle_poll_use = sanitize_text_field($_POST['foodle_poll_use'.$foodle_line_ref]);
        $foodle_category_use = sanitize_text_field($_POST['foodle_category_use'.$foodle_line_ref]);
        $foodle_field_type_save = sanitize_text_field($_POST['meta_field_type'][$foodle_line_count]);

        if ( $foodle_field_name != '' ) $foodle_meta_fields[$foodle_field_name] = array($description, $link_meta_field, $foodle_poll_use, $foodle_category_use, $foodle_field_type_save, $foodle_roles_for_meta_field_array);
        else {
            $foodle_warning = true;
            $foodle_admin_notice = __('Minimum one metafield name found empty. Such rows are ignored','foodle-for-democracy-poll');
        }
        $regexp_field = ( $foodle_line_count == 0 ) ? '---' : sanitize_text_field($_POST['regexp_field'][$foodle_line_count]); // if - after moving - the first row would carry such a content
        $regrep_field = ( $foodle_line_count == 0 ) ? '---' : sanitize_text_field($_POST['regrep_field'][$foodle_line_count]); // if - after moving - the first row would carry such a content
        $regrep_field = ($regrep_field == '---') ? '' : $regrep_field;
        if ( ( $regexp_field != '---' ) && ( $foodle_field_name != '' ) ) { 
          $foodle_regex_main[$foodle_field_name] = array($regexp_field, $regrep_field);
        }
      }
      if ( $foodle_error ) {
        foodle_pwx_admin_notice__defined_error('<p>'.$foodle_admin_notice.'</p>');
      } else {
        $foodle_meta_result = update_option('foodle_meta_fields', $foodle_meta_fields, 'yes');
        $foodle_regex_result = update_option('foodle_regex_main', $foodle_regex_main, 'yes');
        if ( $foodle_warning )
          foodle_pwx_admin_notice__warning('<p>'.$foodle_admin_notice.'.</p>');
        if ( ( $foodle_meta_result ) || ( $foodle_regex_result ) )
          foodle_pwx_admin_notice__success('<p>'.__('The Foodle metafields definiton was properly set','foodle-for-democracy-poll').'.</p>');
        else
          foodle_pwx_admin_notice__success('<p>'.__('The Foodle metafields definiton did not change','foodle-for-democracy-poll').'.</p>');
      } 
    } else {
      foodle_pwx_admin_notice__error();
    }
  }

  // In case the eMail text was set or updated: check if eMail text is sufficient (min. one word with min. three letters) or needs to be updated and store it as option 'mfem_email_content'
  if ( isset($_POST['foodle_email_content']) ) {
    $foodle_admin_notice = '';
    $foodle_new_email_content = sanitize_text_field(htmlentities(stripslashes($_POST['foodle_email_content'])));
    if ( ( $foodle_new_email_content <> '' ) && ( $foodle_new_email_content === get_option('foodle_email_content') ) ) {
      $foodle_admin_notice .= __('The email content didn\'t change.','foodle-for-democracy-poll');
      foodle_pwx_admin_notice__success('<p>'.$foodle_admin_notice.'</p>');
    }
    else {
      if ( ( preg_match('/[a-zA-Z]{3}/', $foodle_new_email_content) )
          && ( update_option('foodle_email_content', $foodle_new_email_content) ) ) {
        $foodle_admin_notice .= __('The email content was properly stored.','foodle-for-democracy-poll');
        foodle_pwx_admin_notice__success('<p>'.$foodle_admin_notice.'</p>');
      }
      else {
        $foodle_admin_notice .= __('The email content wasn\'t stored due to text missing (looking for at least one word with three letters minimum...)!','foodle-for-democracy-poll');
        foodle_pwx_admin_notice__defined_error('<p>'.$foodle_admin_notice.'</p>');
      }
    }
  }

  // Get the active tab from the $_GET parameter
  $default_tab = 'nothing';
  if ( $foodle_roles_tips ) $default_tab = 'foodle-tips';
  if ( $foodle_roles_settings ) $default_tab = 'foodle-settings';
  if ( $foodle_roles_usage ) $default_tab = 'foodle-usage';
  if ( $foodle_roles_email ) $default_tab = 'edit-email';
  if ( $foodle_roles_sproles ) $default_tab = 'special-roles-users';
  if ( $foodle_roles_sorting ) $default_tab = 'metafield-default-sorting';
  if ( ( $foodle_roles_metafields ) || ( current_user_can('manage_options') ) ) $default_tab = 'define-metafields';

  $tab = ( isset($_GET['tab']) ) ? sanitize_text_field($_GET['tab']) : $default_tab;

  // Admin page should be inside a 'wrap': opening div
  echo '<div class="wrap">';

  // Display the page title
  echo '<h1 class="mfem-h1">Foodle for Democracy Poll</h1>'; // get_admin_page_title() does not work in all cases for capability 'manage_foodle'...
  echo '<h2 class="mfem-h2">'.__('An add-on to display poll responses in various ways and much more...','foodle-for-democracy-poll').'</h2>';


  // Specify the path to the plugin's readme.txt file
  $file_path = plugin_dir_path( __FILE__ ).'README.txt';

  // Read the contents of the file into a string
  $file_contents = file_get_contents($file_path);

  // Split the file contents into an array of lines
  $file_lines = explode("\n", $file_contents);

  // Initialize a flag to indicate whether we're in the FAQ section
  $in_faq_section = false;

  // Initialize an empty string to hold the FAQ section
  $faq_section = '';

  // Loop through each line in the file
  foreach ($file_lines as $line) {
    // If we encounter the FAQ section header, set the flag
    if (strpos($line, '== Frequently Asked Questions ==') !== false) {
        $in_faq_section = true;
    }
    // If we encounter the end of the FAQ section, unset the flag and exit the loop
    elseif (strpos($line, '==') === 0 && $in_faq_section) {
        $in_faq_section = false;
        break;
    }
    // If we're in the FAQ section, add the line to the FAQ section string
    elseif ($in_faq_section) {
        $faq_section .= $line . "<br>";
    }
  }

  // Remove any HTML tags from the FAQ section
  //$faq_section = strip_tags($faq_section);

  // Output the FAQs
  //echo str_replace('= ','<strong>',str_replace(' =','</strong>',$faq_section));

  //echo wp_remote_retrieve_body(wp_remote_get(get_site_url().'/wp-admin/plugin-install.php?tab=plugin-information&plugin=foodle-for-democracy-poll&section=faq #section-faq'));


  // Check whether Democracy will keep logs. Otherwise, issue a warning!
  echo foodle_check_keeping_logs();
  
  ?><!-- Here are the tabs -->
    <nav style="text-align:center;" class="nav-tab-wrapper">
      <?php if ( ( current_user_can('manage_options') ) || ( $foodle_roles_metafields ) ): ?><a href="?page=foodle-admin-page&tab=define-metafields" class="nav-tab <?php if($tab==='define-metafields'): ?>nav-tab-active<?php endif; ?>"><?php _e('Define<br>Metafields','foodle-for-democracy-poll')?></a><?php endif; ?>
      <?php if ( ( current_user_can('manage_options') ) || ( $foodle_roles_sorting ) ): ?><a href="?page=foodle-admin-page&tab=metafield-default-sorting" class="nav-tab <?php if($tab==='metafield-default-sorting'): ?>nav-tab-active<?php endif; ?>"><?php _e('Metafield<br>Defaults & Sorting','foodle-for-democracy-poll')?></a><?php endif; ?>
      <?php if ( ( current_user_can('manage_options') ) || ( $foodle_roles_sproles ) ): ?><a href="?page=foodle-admin-page&tab=special-roles-users" class="nav-tab <?php if($tab==='special-roles-users'): ?>nav-tab-active<?php endif; ?>"><?php _e('Special<br>Roles & Users','foodle-for-democracy-poll')?></a><?php endif; ?>
      <?php if ( ( current_user_can('manage_options') ) || ( $foodle_roles_email ) ): ?><a href="?page=foodle-admin-page&tab=edit-email" class="nav-tab <?php if($tab==='edit-email'): ?>nav-tab-active<?php endif; ?>"><?php _e('Edit<br>Email','foodle-for-democracy-poll')?></a><?php endif; ?>
      <?php if ( ( current_user_can('manage_options') ) || ( $foodle_roles_usage ) ): ?><a href="?page=foodle-admin-page&tab=foodle-usage" class="nav-tab <?php if($tab==='foodle-usage'): ?>nav-tab-active<?php endif; ?>"><?php _e('Shortcode<br>Use','foodle-for-democracy-poll')?></a><?php endif; ?>
      <?php if ( ( current_user_can('manage_options') ) || ( $foodle_roles_settings ) ): ?><a href="?page=foodle-admin-page&tab=foodle-settings" class="nav-tab <?php if($tab==='foodle-settings'): ?>nav-tab-active<?php endif; ?>"><?php _e('Foodle<br>Settings','foodle-for-democracy-poll')?></a><?php endif; ?>
      <?php if ( ( current_user_can('manage_options') ) || ( $foodle_roles_tips ) ): ?><a href="?page=foodle-admin-page&tab=foodle-tips" class="nav-tab <?php if($tab==='foodle-tips'): ?>nav-tab-active<?php endif; ?>"><?php _e('Widespread<br>Tips','foodle-for-democracy-poll')?></a><?php endif; ?>
    </nav>

    <div class="tab-content">
    <?php $foodle_please_consult = __('Please consult the \'Help\' tabs at the top and the Tips tab above for detailed explanations and/or use cases.','foodle-for-democracy-poll');
      switch($tab) :
      case 'define-metafields':
        echo '<p>&nbsp;</p>';
        echo '<h2>'.__('Define the Metafields for the User Profile','foodle-for-democracy-poll').'</h2>';
        echo '<p>('.$foodle_please_consult.')</p>';
        echo '<p>&nbsp;</p>';
        foodle_define_metafields();
        break;
      case 'metafield-default-sorting':
        echo '<p>&nbsp;</p>';
        echo '<h2>'.__('Define Metafield Default Values and their Sorting','foodle-for-democracy-poll').'</h2>';
        echo '<p>('.$foodle_please_consult.')</p>';
        echo '<p>&nbsp;</p>';
        foodle_metafield_defaults_sorting();
        break;
      case 'special-roles-users':
        echo '<p>&nbsp;</p>';
        echo '<h2>'.__('Select Special Roles and / or Users for Poll Marking, Hidden Views and eMail Non-Reminders','foodle-for-democracy-poll').'</h2>';
        echo '<p>('.$foodle_please_consult.')</p>';
        echo '<p>&nbsp;</p>';
        foodle_set_special_roles_users();
        break;
      case 'edit-email':
        echo '<p>&nbsp;</p>';
        echo '<h2>'.__('Edit the Reminder Email for "Lazybones"','foodle-for-democracy-poll').'</h2>';
        echo '<p>('.$foodle_please_consult.')</p>';
        echo '<p>&nbsp;</p>';
        foodle_edit_email();
        break;
      case 'foodle-usage':
        echo '<p>&nbsp;</p>';
        echo '<h2>'.__('Use of Democracy and Foodle shortcodes','foodle-for-democracy-poll').'</h2>';
        echo '<p>('.$foodle_please_consult.')</p>';
        echo '<p>&nbsp;</p>';
        foodle_usage();
        break;
      case 'foodle-settings':
        echo '<p>&nbsp;</p>';
        echo '<h2>'.__('Other Settings to Control Foodle','foodle-for-democracy-poll').'</h2>';
        echo '<p>('.$foodle_please_consult.')</p>';
        echo '<p>&nbsp;</p>';
        foodle_settings();
        break;
      case 'foodle-tips':
        echo '<p>&nbsp;</p>';
        echo '<h2>'.__('Tips for using Foodle','foodle-for-democracy-poll').'</h2>';
        echo '<p>('.$foodle_please_consult.')</p>';
        echo '<p>&nbsp;</p>';
        foodle_tips();
        break;
      default:
        echo '<p>&nbsp;</p>';
        echo '<h2>'.__('There\'s no Foodle access available!','foodle-for-democracy-poll').'</h2>';
        echo '<p>&nbsp;</p>';
        break;
    endswitch; ?>
    </div>

  <?php

  echo '<p>&nbsp;</p>';

  if ( ( isset($foodle_scroll_up_button_visible['foodle_admin']) ) && ( $foodle_scroll_up_button_visible['foodle_admin'] ) ) foodle_provide_scroll_up_button();

  // Admin page should be inside a 'wrap': closing div
  echo '</div>';
}



function foodle_define_metafields() {
  global $wpdb;
  global $wp_roles;
  global $foodle_help_tooltips;
  global $foodle_warnings_removed;
  global $foodle_no_safety_query;
  global $foodle_roles_metafields;
  global $foodle_roles_deleteun;

  if ( ( ! current_user_can('manage_options') ) && ( ! $foodle_roles_metafields ) ) {
    echo '<p style="font-size:1.5em;color:darkred;"><strong>'.__('This tab is for Foodle administrators only!','foodle-for-democracy-poll').'</strong></p>';
    return;
}

  // Help and Warnings Tooltips
  $help_meta_own_metafield_name = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('You may define your own field names to be filled in the user\'s profiles.<br>They can be used to display categorized voter information in polls<br>or even be used independently from this plugin.<br>For ease of use, own field names are NOT case sensitive!<br>(Content is being validated during input)<br><br><strong>Whether own or existing metafield:</strong><br>The metafield name will be displayed as field title in the user profile.<br>Sorting is always done in the same order as the fields are defined in this table!','foodle-for-democracy-poll').'" ' : '';
  $help_metafield_type = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('You can select from a few HTML input types for<br>the metafield, be it an existing or an own field.<br>Type \'foodle-date\' will refuse any text input but<br>select a date by the jQuery datepicker (see<br>the Foodle settings for format defintion).<br>In the \'Metafield Defaults & Sorting\' tab, the<br>\'range\' type will be shown as \'number\' type,<br>\'foodle-date\' as plain text.','foodle-for-democracy-poll').'" ' : '';
  $help_meta_regexp_def = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('With the help of Regular Expressions, fields can be filled automatically in the user\'s profile,<br>based on future entries in the first user metafield (even when the first field is filled using<br>drop-down). Therefore, this option is only available for the second and further fields.<br>However, Regular Expressions for fields will be overruled, when the same field is defined<br>as a drop-down field for user entry!<br>(Content is being validated partially during input and the RegExp prior submit)','foodle-for-democracy-poll').'" ' : '';
  $help_meta_existing_metafield_name = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('Alternatively, you may choose already existing fields (maybe brought by another plugin).<br>This plugin tries to avoid unwanted or dangerous existing user-meta content.<br>Any unused Foodle field names with still existing data are identified for recovery!<br><span style=\'color:darkred;\'>However, you must take extreme special care when using such<br>existing user metafields as the results may not be foreseeable!</span><br><br><strong>Whether own or existing metafield:</strong><br>The metafield name will be displayed as field title in the user profile.<br>Sorting is always done in the same order as the fields are defined in this table!','foodle-for-democracy-poll').'" ' : '';
  $help_meta_regexp_repl = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('Once a Regular Expression match is found (if defined in the lefthand input),<br>this is the replacement string. Leave empty to delete the matched string.<br>\'---\' will be entered automatically throughout this table for empty inputs.<br>(Content is being validated during input)','foodle-for-democracy-poll').'" ' : '';
  $help_meta_link_input = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('If you determine the id or name of a related existing input field in the user profile,<br>you can herewith link this existing input with your own input field.<br>The other input field will be deactivated and a remark will be displayed.<br>To mark an id, you may (or not) use # in front.<br>For a name reference, you must use &.<br>(Content is being validated during input)','foodle-for-democracy-poll').'" ' : '';
  $help_meta_category_allow = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('Determines, whether the field can be activated as category column in the<br>democracy poll edit page. If not, the field will be shown but be disabled for selection.<br>It is used there to select the left hand category colum, which is as well a sorting criterium.<br>The use underneath the poll\'s answer columns in the Foodle table is not concerned here.','foodle-for-democracy-poll').'" ' : '';
  $help_meta_poll_allow = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('Determines, whether the field can be activated as category per answer column in the<br>democracy poll edit page. If not, the field will be shown but be disabled for selection.<br>It is used there to select the categories shown underneath the poll\'s answer columns.<br>The definition as category column in the Foodle table is not concerned here.','foodle-for-democracy-poll').'" ' : '';
  $help_meta_description = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('You can define a description to be displayed alongside the input field in the user profile.<br>This could be used to explain the field use or the expected input format (if not defined anyway through drop-down).<br>(Content is being validated during input)','foodle-for-democracy-poll').'" ' : '';
  $help_meta_roles = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('Select the related roles for this meta field.<br>This will as well determine the meta field\'s<br>visibility in the concerned user profiles.<br>Administrators will get a visualization thereof<br>in the user profiles (default = all roles).','foodle-for-democracy-poll').'" ' : '';
  $help_meta_delete_row = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('Delete this metafield row.','foodle-for-democracy-poll').'"' : '';
  $help_meta_add_row = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('Add a new metafield row.','foodle-for-democracy-poll').'"' : '';
  $help_dragging_rows = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('You may drag each row to where you want in order to change the row order.<br>When moving the first row or when moving another row there,<br>a new row will take that special place <strong>after saving</strong>.','foodle-for-democracy-poll').'<br><span style=\'color:DarkGoldenRod;\'>'.__('In such case, any RegExp content will be lost in that new first row.','foodle-for-democracy-poll').'</span>"' : '';
  $warning_delete_unused_metafield_entries = ( ! $foodle_warnings_removed ) ? ' foodle_ttwarning="'.__('Warning:<br>This may delete Foodle categories used for previous Foodles, if any.<br>In this case, the Foodles will most probably no longer display as before!','foodle-for-democracy-poll').'" ' : '';
  $warning_meta_existing_metafield_name = ( ! $foodle_warnings_removed ) ? ' foodle_ttwarning="'.__('Warning:<br>Be careful when working with unknown existing fields.<br>This may harm WordPress\' or other plugins\' functionality!','foodle-for-democracy-poll').'" ' : '';
  $warning_metafield_type = ( ! $foodle_warnings_removed ) ? ' foodle_ttwarning="'.__('Warning:<br>Changing field types can \'damage\' already existing<br>user profile data upon saving the user profile again.','foodle-for-democracy-poll').'" ' : '';

  $DB_PREFIX = $wpdb->prefix;
  $users = get_users(array(
    'orderby'  => 'meta_value',
    'meta_key' => 'last_name', // just a habit ;-)
    'order'    => 'ASC'
  ));
  $all_user_meta = array();
  foreach( $users as $user ) {
    $user_metas = array_keys(get_user_meta($user->ID));
    foreach( $user_metas as $user_meta ) {
      if (
        ( ! in_array ( $user_meta, array(
          'login','first_name','last_name','nickname','description','rich_editing','comment_shortcuts','role',
          'email','action','pending','admin_color','jabber','aim','yim','default_password_nag','use_ssl','show_admin_bar_front',
          'show_welcome_panel','dismissed_wp_pointers','nav_menu_recently_edited','managenav-menuscolumnshidden','facebook',
          'instagram','linkedin','myspace','pinterest','soundcloud','tumblr','twitter','wikipedia','youtube') )
        )
        && ( ! is_array(get_user_meta($user->ID,$user_meta,true) ) ) // avoid any user meta with array content
        && ( strpos($user_meta,'closedpostboxes_') === false )
        && ( strpos($user_meta,'metaboxhidden_') === false )
        && ( strpos($user_meta,'meta-box-order_') === false )
        && ( strpos($user_meta,'puresimple_') === false )
        && ( strpos($user_meta,'editprofile_') === false )
        && ( strpos($user_meta,'avatar_') === false )
        && ( strpos($user_meta,'upload_') === false )
        && ( strpos($user_meta,'users_') === false )
        && ( strpos($user_meta,'roc_') === false )
        && ( strpos($user_meta,'i4t3_') === false )
        && ( strpos($user_meta,'enable_') === false )
        && ( strpos($user_meta,'puresimple_') === false )
        && ( strpos($user_meta,'screen_layout_') === false )
        && ( strpos($user_meta,substr($DB_PREFIX,0,5)) === false )
        && ( strpos($user_meta,'username') === false )
        && ( strpos($user_meta,'user_login') === false )
        && ( strpos($user_meta,'meta') === false )
        && ( strpos($user_meta,'session') === false )
        && ( strpos($user_meta,'locale') === false )
        && ( strpos($user_meta,'syntax') === false )
        && ( strpos($user_meta,'nocaptcha') === false )
        && ( strpos($user_meta,'_wp_http') === false )
        && ( strpos($user_meta,'essential_blocks_') === false )
        && ( strpos($user_meta,'flamingo_') === false )
        && ( strpos($user_meta,'melange_') === false )
        && ( strpos($user_meta,'wpseo_') === false )
        && ( strpos($user_meta,'_yoast_') === false )
        && ( strpos($user_meta,'wpda_') === false )
        && ( strpos($user_meta,'edit_') === false )
        && ( strpos($user_meta,'ppress') === false )
        // && ( strpos($user_meta,'dbem_') === false ) // already covered
        && ( strpos($user_meta,'_jpum_') === false )
        && ( strpos($user_meta,'_pum_') === false )
        && ( strpos($user_meta,'nonce') === false )
        && ( strpos($user_meta,'crypt') === false )
        && ( strpos($user_meta,'pass') === false )
        && ( strpos($user_meta,'wsal') === false )
        && ( strpos($user_meta,'em_') === false )
        // && ( strpos($user_meta,'dem_') === false ) // already covered
        // && ( strpos($user_meta,'foodle') === false ) // will now be shown but modified to allow recovery of STILL EXISTING own field data
        && ( strpos($user_meta,'mfem') === false ) // MF :)
        && ( strpos($user_meta,'mfdwc') === false ) // MF :)
      ) $all_user_meta[$user_meta] = true; // each user meta key exists here only once
    }
  }
  $all_user_meta = array_keys($all_user_meta);
  sort($all_user_meta); // a sorted list of all existing user meta keys except the foodle ones and except the database and WP related ones

  echo '<div style="max-width:1250px"><form action="'.admin_url( 'admin.php?page=foodle-admin-page&tab=define-metafields' ).'" method="post">';
  $foodle_reg_ex = __('Regular Expression','foodle-for-democracy-poll');
  ?>
    <figure class="foodle-block-table">
      <table unselectable="on" class="foodle-meta-table unselectable">
        <thead>
          <tr class="foodle-header-row">
            <th style="padding:20px 0px 20px 0px; text-align:center;"><div style="opacity:0.4; margin:auto; width:18px; height:16px; background-size:contain; background-image: url('<?php echo plugin_dir_url(__FILE__).'img/move_sm.png'; ?>');" <?php echo $help_dragging_rows ?>></div></th>
            <th style="padding:20px 0px 20px 0px; text-align:center;"><?php echo __('Use Own Metafields','foodle-for-democracy-poll') ?><br>&nbsp;<hr style="height:1px;border-width:0;color:grey;background-color:grey;margin: 10px 10% 10px 10%;" /><?php echo $foodle_reg_ex ?></th>
            <th style="padding:20px 0px 20px 0px; text-align:center;"><?php echo __('Use Existing Metafields<br>(filtered)','foodle-for-democracy-poll') ?><hr style="height:1px;border-width:0;color:grey;background-color:grey;margin: 10px 10% 10px 10%;" /><?php echo __('Replacement String','foodle-for-democracy-poll') ?></th>
            <th style="padding:20px 0px 20px 0px; text-align:center;"><?php echo __('Enable/Disable Category Selections','foodle-for-democracy-poll') ?></th>
            <th style="padding:20px 0px 20px 0px; text-align:center;"><?php echo __('Add Input Description','foodle-for-democracy-poll') ?><hr style="height:1px;border-width:0;color:grey;background-color:grey;margin: 10px 10% 10px 10%;" /><?php echo __('Roles concerned for the meta field','foodle-for-democracy-poll') ?></th>
            <th style="padding:20px 0px 20px 0px; text-align:center;"></th> <!-- the column with the buttons -->
          </tr>
          <tr class="foodle-meta-row-above">
            <td colspan="6" style="text-align:center;">
              <?php echo __('This first row is the basis for any other fields\' user-defined content fed by regular expressions','foodle-for-democracy-poll').'!'; ?>
            </td>
          </tr>
        </thead>
        <tbody id="foodle-meta-sortable" style="overflow-y:auto;">
  <?php
  if ( get_option('foodle_meta_fields') ) {
    $foodle_meta_fields = get_option('foodle_meta_fields');
  } else {
    $foodle_meta_fields[''] = array('', '', 'yes');
  }
  $foodle_meta_fieldslugs = array();
  foreach($foodle_meta_fields as $foodle_meta_fieldname => $foodle_meta_field_content) {
    $foodle_meta_fieldslugs[] = foodle_fieldname_to_meta_name($foodle_meta_fieldname);
  }
//  if ( get_option('foodle_regex_main') ) {
//    $foodle_regex_main = get_option('foodle_meta_fields');
//  } else {
//    $foodle_regex_main['---'] = array('','');
//  }

  $foodle_number_of_rows = count($foodle_meta_fields);
  $foodle_meta_count = -1; // in order to have the first iteration see 0
  foreach ( $foodle_meta_fields as $foodle_meta_field_raw => $foodle_meta_data ) {
    $foodle_meta_data []= ''; // avoid an error for existing users as there's a new field (version 1.8.4.0)
    $foodle_meta_data []= ''; // avoid an error for existing users as there's a new field (version 1.8.6.0)
    $foodle_meta_data []= ''; // avoid an error for existing users as there's a new field (version 2.5.19.2)
    $foodle_meta_data []= ''; // just in case...
    $foodle_meta_count += 1;
    if ( strpos($foodle_meta_field_raw, '••') === 0 ) {
      $foodle_meta_field = '---';
      $foodle_own_field_style='opacity:0.4; cursor:not-allowed;';
      $foodle_own_field_attr='readonly="readonly"';
      $foodle_existing_field = str_replace('••', '', $foodle_meta_field_raw);
      $foodle_link_meta_field_style='opacity:1.0;';
      $foodle_link_meta_field_attr='';
    } else {
      $foodle_meta_field = $foodle_meta_field_raw;
      $foodle_own_field_style='opacity:1.0;';
      $foodle_own_field_attr='';
      $foodle_existing_field = 'own-field';
      $foodle_link_meta_field_style='opacity:0.4; cursor:not-allowed;';
      $foodle_link_meta_field_attr='readonly="readonly"';
    }
    $foodle_link_meta_field = ( $foodle_meta_data[1] == '' ) ? '---' : $foodle_meta_data[1];
    $foodle_description = ( $foodle_meta_data[0] == '' ) ? '---' : $foodle_meta_data[0];
    $poll_use_yes_checked = ( $foodle_meta_data[2] != 'no' ) ? 'checked="checked"' : ''; // avoid an undefined condition as a new field
    $poll_use_no_checked = ( $foodle_meta_data[2] == 'no' ) ? 'checked="checked"' : '';
    $category_use_yes_checked = ( $foodle_meta_data[3] != 'no' ) ? 'checked="checked"' : ''; // avoid an undefined condition as a new field
    $category_use_no_checked = ( $foodle_meta_data[3] == 'no' ) ? 'checked="checked"' : '';
    $foodle_field_type_stored = $foodle_meta_data[4];
    $foodle_roles_for_meta_field = ( $foodle_meta_data[5] == '' ) ?  array('all') : $foodle_meta_data[5] ;
    $column_category_checked = '';
    $required = ''; // no requirement at this time, maybe in a later plugin version
    if ($foodle_meta_count == 0) {
      $foodle_del_button_style = 'opacity:0.1; cursor:not-allowed;';
      $foodle_del_button_attr = 'disabled="disabled"';
      if ( $foodle_number_of_rows == 1 ) { // just one row existing
        $foodle_add_button_style = 'opacity:1.0; cursor:pointer;';
        $foodle_add_button_attr = '';
      } else {
        $foodle_add_button_style = 'opacity:0.1; cursor:not-allowed;';
        $foodle_add_button_attr = 'disabled="disabled"';
      }
      $foodle_regexp_field = '---';
      $foodle_regexp_style = 'opacity:0.2; cursor:not-allowed;';
      $foodle_regexp_attr = 'readonly="readonly"';
      $foodle_regrep_field = '---';
      $foodle_regrep_style = 'opacity:0.2; cursor:not-allowed;';
      $foodle_regrep_attr = 'readonly="readonly"';
    } else {
      $foodle_del_button_style = 'opacity:1.0; cursor:pointer;';
      $foodle_del_button_attr = '';
      if ( $foodle_meta_count + 1 == $foodle_number_of_rows ) { // the last row
        $foodle_add_button_style = 'opacity:1.0; cursor:pointer;';
        $foodle_add_button_attr = '';
      } else {
        $foodle_add_button_style = 'opacity:0.1; cursor:not-allowed;';
        $foodle_add_button_attr = 'disabled="disabled"';
      }
      $foodle_regexp_style = 'opacity:1.0;';
      $foodle_regexp_attr = '';
      $foodle_regrep_style = 'opacity:1.0;';
      $foodle_regrep_attr = '';
      if ( get_option('foodle_regex_main') ) {
        $foodle_regexp_meta_field = str_replace('', '', $foodle_meta_field_raw); // optional later str_replace
        if ( isset(get_option('foodle_regex_main')[$foodle_regexp_meta_field]) ) {
          $foodle_regexp_field = get_option('foodle_regex_main')[$foodle_regexp_meta_field][0];
          $foodle_regexp_field = ( $foodle_regexp_field == '' ) ? '---' : $foodle_regexp_field;
          $foodle_regrep_field = get_option('foodle_regex_main')[$foodle_regexp_meta_field][1];
          $foodle_regrep_field = ( $foodle_regrep_field == '' ) ? '---' : $foodle_regrep_field;
        } else {
          $foodle_regexp_field = '---';
          $foodle_regrep_field = '---';
        }
      } else {
      $foodle_regexp_field = '---';
      $foodle_regrep_field = '---';
      }
    }
    $not_used = __('not used','foodle-for-democracy-poll');

    $foodle_orphan_metafields = false; // Initialize: no orphan metafields

    $foodle_field_types = array('foodle-date','date','time','datetime-local','number','tel','email','url','range');

    if ($foodle_meta_count == 0 ): ?>
          <tr id="foodle-meta-row-<?php echo $foodle_meta_count ?>" class="foodle-meta-row-above">
    <?php
    else:
    ?>
          <tr id="foodle-meta-row-<?php echo $foodle_meta_count ?>" class="foodle-meta-row">
    <?php
    endif
    ?>
            <td style="padding: 15px 10px 15px 10px;">
              <div class="foodle-meta-handle" style="cursor:move; margin:auto; width:18px; height:16px; background-size:contain; background-image: url('<?php echo plugin_dir_url(__FILE__).'img/move_sm.png'; ?>');" <?php echo $help_dragging_rows ?>></div>
            </td>
            <td style="padding: 15px 10px 15px 10px;">
              <label <?php echo $help_meta_own_metafield_name ?>><span style="font-weight:bold;"><?php echo __('Define own field name','foodle-for-democracy-poll').':' ?></span><br>
                <input type="text" style="font-size:0.95em;<?php echo $foodle_own_field_style ?>" id="own-foodle-sel-<?php echo $foodle_meta_count ?>" name="own_meta_field[]" value="<?php echo $foodle_meta_field; ?>" placeholder="<?php echo __('Field key and name','foodle-for-democracy-poll') ?>" onkeyup="foodle_check_metafield_name(this);" <?php echo $required." ".$foodle_own_field_attr ?>>
              </label><br><br>
              <label <?php echo $warning_metafield_type.$help_metafield_type ?>><span style="font-weight:bold;"><?php echo __('Define field type','foodle-for-democracy-poll').':' ?></span><br>
              <select style="font-size:0.95em;" id="foodle-field-type-<?php echo $foodle_meta_count ?>"  name="meta_field_type[]" size="1">
                  <option style="font-size:0.95em;" value="text" selected="selected">text</option>
                  <?php foreach ( $foodle_field_types as $foodle_field_type ) { ?>
                    <option style="font-size:0.95em;" value="<?php echo $foodle_field_type;?>" <?php if ( $foodle_field_type == $foodle_field_type_stored ) echo 'selected="selected"';?>><?php echo $foodle_field_type; ?></option>
                  <?php } ?>
                </select>
              </label>
              <hr style="height:1px;border-width:0;color:grey;background-color:grey;margin: 41px 0px 20px 0px;" />
              <label <?php echo $help_meta_regexp_def ?>style="color:DarkGoldenRod;"><span style="font-weight:bold;"><?php echo __('Optional RegExp','foodle-for-democracy-poll').'...' ?></span><br>
                <input type="text" style="font-size:0.95em; border-color:DarkGoldenRod; <?php echo $foodle_regexp_style ?>" id="regexp-foodle-sel-<?php echo $foodle_meta_count ?>" name="regexp_field[]" value="<?php echo $foodle_regexp_field ?>" placeholder="<?php echo $foodle_reg_ex ?>" onkeyup="foodle_check_regexp_input(this);" onfocusin="if ( ( this.value.match(/^[/]/) == null ) && ( ! $(this).prop('readonly') ) ) this.value='';" onfocusout="foodle_check_regexp_static($(this)); foodle_check_regexp($(this));" autocomplete="off" <?php echo $foodle_regexp_attr ?>>
                <br>&nbsp;&nbsp;&nbsp;--- = <?php echo $not_used; ?>
              </label>
            </td>
            <td style="padding: 15px 10px 15px 10px;">
              <label <?php echo $warning_meta_existing_metafield_name.$help_meta_existing_metafield_name; ?>><span style="font-weight:bold;"><?php echo __('Select existing field name','foodle-for-democracy-poll').':' ?></span><br>
                <select style="font-size:0.95em;" id="exist-foodle-sel-<?php echo $foodle_meta_count ?>"  name="existing_meta_field[]" size="1" onchange="foodle_manage_meta($(this));">
                  <option style="font-size:0.95em;" value="own-field" selected="selected"><?php echo __('Use own field name','foodle-for-democracy-poll')?></option>
                  <?php foreach ( $all_user_meta as $user_meta_key ) {
                    $foodle_meta_value = $user_meta_key;
                    $foodle_meta_view = $user_meta_key;
                    $foodle_meta_selected = ( $user_meta_key == $foodle_existing_field ) ? ' selected="selected" ' : '' ;
                    $foodle_disabled = false;
                    if ( strpos($user_meta_key,'foodle-field-') !== false ) {
                        if ( ! in_array($user_meta_key,$foodle_meta_fieldslugs) ) {
                            $foodle_orphan_metafields = true; // Found orphan metafield
                            $foodle_meta_field_slug = substr($user_meta_key,13);
                            $foodle_meta_field_name = str_replace('_',' ',str_replace('€','.',$foodle_meta_field_slug));
                            $foodle_meta_view = __('RECOVER','foodle-for-democracy-poll').': \''.$foodle_meta_field_name.'\' ('.__('as there\'s still data there','foodle-for-democracy-poll').'!)';
                            $foodle_disabled = false;
                        } else continue;
                    } ?>
                    <option styl_e="font-size:0.95em;" value="<?php echo $foodle_meta_value;?>" <?php echo $foodle_meta_selected; if ( $foodle_disabled ) echo ' disabled="disabled" ';?>><?php echo $foodle_meta_view; ?></option>
                  <?php } ?>
                </select>
              </label><br><br>
              <label <?php echo $help_meta_link_input ?>><span style="font-weight:bold;"><?php echo __('Link existing id/#id/&name','foodle-for-democracy-poll').':' ?></span><br>
                <input type="text" style="font-size:0.95em; <?php echo $foodle_link_meta_field_style ?>" id="link-foodle-sel-<?php echo $foodle_meta_count ?>"   name="link_meta_field[]" value="<?php echo $foodle_link_meta_field; ?>" placeholder="<?php echo __('Original input id or name','foodle-for-democracy-poll') ?>" onkeyup="foodle_check_link_input(this);" onfocusin="if ( ( this.value.match(/^[#&a-zA-Z]/) == null ) && ( ! $(this).prop('readonly') ) ) this.value='';" onfocusout="foodle_check_link_content($(this));" <?php echo $foodle_link_meta_field_attr ?>>
                <br>&nbsp;&nbsp;&nbsp;--- = <?php echo $not_used; ?>
              </label>
              <hr style="height:1px;border-width:0;color:grey;background-color:grey;margin: 20px 0px 20px 0px;" />
              <label <?php echo $help_meta_regexp_repl ?>style="color:DarkGoldenRod;"><span style="font-weight:bold;"><?php echo __('... and replacement','foodle-for-democracy-poll').':' ?></span><br>
                <input type="text" style="font-size:0.95em;
                  border-color:DarkGoldenRod; <?php echo $foodle_regrep_style ?>" id="regrep-foodle-sel-<?php echo $foodle_meta_count ?>" name="regrep_field[]" value="<?php echo $foodle_regrep_field ?>" placeholder="<?php echo __('Match replacement','foodle-for-democracy-poll') ?>" onkeyup="foodle_check_text_input(this);" onfocusin="if ( ( this.value.match(/^[a-zA-Z]/) == null ) && ( ! $(this).prop('readonly') ) ) this.value='';" onfocusout="foodle_check_content($(this));" <?php echo $foodle_regrep_attr ?>>
                <br>&nbsp;&nbsp;&nbsp;--- = <?php echo __('eliminate match','foodle-for-democracy-poll'); ?>
              </label>
            </td>
            <td style="padding: 15px 10px 15px 10px;min-width:140px;">
              <label <?php echo $help_meta_category_allow ?>><span style="font-weight:bold;"><?php echo __('Allow selection in democracy poll edit as Foodle table left hand category column','foodle-for-democracy-poll').':' ?></span><br>
                <label><input type="radio" style="margin: 0px 4px 0px 20px; font-size:0.95em;" name="foodle_category_use<?php echo $foodle_meta_count ?>" <?php echo $category_use_yes_checked ?> value="yes" /><?php echo __('yes','foodle-for-democracy-poll') ?></label><label><input type="radio" style="margin:0px 4px 0px 20px; font-size:0.95em;" name="foodle_category_use<?php echo $foodle_meta_count ?>" <?php echo $category_use_no_checked ?> value="no" /><?php echo __('no','foodle-for-democracy-poll') ?></label>
              </label>
              <hr style="height:1px;border-width:0;color:silver;background-color:silver;margin: 15px 0px 15px 0px;" />
              <label <?php echo $help_meta_poll_allow ?>><span style="font-weight:bold;"><?php echo __('Allow selection in democracy poll edit as Foodle table category per answer column','foodle-for-democracy-poll').':' ?></span><br>
                <label><input type="radio" style="margin: 0px 4px 0px 20px; font-size:0.95em;" name="foodle_poll_use<?php echo $foodle_meta_count ?>" <?php echo $poll_use_yes_checked ?> value="yes" /><?php echo __('yes','foodle-for-democracy-poll') ?></label><label><input type="radio" style="margin:0px 4px 0px 20px; font-size:0.95em;" name="foodle_poll_use<?php echo $foodle_meta_count ?>" <?php echo $poll_use_no_checked ?> value="no" /><?php echo __('no','foodle-for-democracy-poll') ?></label>
              </label>
            </td>
            <td style="padding: 15px 10px 15px 10px;">
              <label <?php echo $help_meta_description ?>><span style="font-weight:bold;"><?php echo __('Input description','foodle-for-democracy-poll').':' ?></span><br>
                <textarea style="font-size:0.95em;" id="descr-foodle-sel-<?php echo $foodle_meta_count ?>" name="description[]" placeholder="<?php echo __('Description displayed under the metafield','foodle-for-democracy-poll') ?>" rows="4" cols="30" onkeyup="foodle_check_text_input(this);" onfocusin="if ( this.value.match(/^[a-zA-Z]/) == null ) this.value='';" onfocusout="foodle_check_content($(this));"><?php echo $foodle_description ?></textarea>
                <br>&nbsp;&nbsp;&nbsp;--- = <?php echo __('no description','foodle-for-democracy-poll'); ?>
              </label>
              <hr style="height:1px;border-width:0;color:silver;background-color:silver;margin: 15px 0px 15px 0px;" />
              <label <?php echo $help_meta_roles ?>><span style="font-weight:bold;"><?php echo __('Related roles','foodle-for-democracy-poll').':' ?></span><br>
                <select style="font-size:0.8em;" id="foodle-roles-for-meta-field-sel-<?php echo $foodle_meta_count ?>" name="foodle_roles_for_meta_field[<?php echo $foodle_meta_count ?>][]" size="9" multiple>
                <option value="all" <?php if ( in_array('all',$foodle_roles_for_meta_field) ) echo 'selected="selected"'; ?>><?php echo __('All','foodle-for-democracy-poll'); ?></option>
                  <?php foreach ( $wp_roles->role_names as $foodle_role_key=>$foodle_role_value) {
                    //if ( $foodle_role_key == 'administrator' ) continue; // This could be used to leave administrators out of the game, however, currently not!
                  $foodle_role_selected = ( in_array($foodle_role_key,$foodle_roles_for_meta_field) ) ? 'selected="selected"' : "";
                  //$foodle_role_selected = 'selected="selected"';
                  echo '<option value="'.$foodle_role_key.'" '.$foodle_role_selected.'>'._x($foodle_role_value,'User role').'</option>';
                  }
                  // Add a hidden field to identify the roles selection, even if no role was selected. A bit redundant, as no entry in the option equals an empty array entry.
                  ?>
                  <input type="hidden" name="foodle_roles_for_meta_field[]" value="*">
                </select>
              </label>
            </td>
            <td style="padding: 15px 10px 15px 10px;">
              <div style="display:block; padding: 10px;">
                <input <?php echo $help_meta_delete_row ?>type="button" style="padding:0px; border: 0px solid darkred; color:white; font-size:1em; width:25px; height:25px;<?php echo $foodle_del_button_style; ?> background-color:darkred; border-radius:25px;" id="del-foodle-sel-<?php echo $foodle_meta_count ?>" value="✘" onclick="foodle_remove_meta_row($(this));" <?php echo $foodle_del_button_attr; ?>><br><br>
                <input type="hidden" name="foodle_meta_line[]" value="<?php echo $foodle_meta_count ?>">
                <input <?php echo $help_meta_add_row ?>type="button" style="padding:5px 8px; border: 0px solid darkgreen; color:white; font-size:1em; width:25px; height:25px;<?php echo $foodle_add_button_style; ?> background-color:darkgreen; border-radius:25px;" id="add-foodle-sel-<?php echo $foodle_meta_count ?>" value="✛" onclick="foodle_add_meta_row($(this));" <?php echo $foodle_add_button_attr; ?>>
              </div>
            </td>
          </tr>
  <?php
  }
  ?>
        </tbody>
      </table>
    </figure>

    <script type="text/javascript">
      var $ = jQuery;
      var foodle_regexp_good = true;
      var foodle_regexp_error = '';
      var foodle_regexp_this;
      var foodle_scroll_store;
      var foodle_width_allow_unset = true;
      var plugin_url = '<?php echo plugin_dir_url(__FILE__); ?>';

      function foodle_activate_event_handler_to_store_meta_scrolltop() {
        $('.foodle-meta-handle').on('mousedown', function() {
          foodle_scroll_store = $('html').scrollTop();
        });
      }

      function foodle_activate_event_handler_to_set_meta_column_widths() {
        $('.foodle-meta-handle').on('mousedown', function() {
          $(".foodle-meta-table").css("width", $(".foodle-meta-table").outerWidth());
          $(".foodle-meta-table th, .foodle-meta-table td").each( function() {
            $(this).css("width", $(this).width() + 0.001);
          });
        });
        $('.foodle-meta-handle').on('mouseup', function() {
          if ( foodle_width_allow_unset )
            $(".foodle-meta-table, .foodle-meta-table th, .foodle-meta-table td").each( function() {
              $(this).css("width", '');
          });
        });
      }

      function foodle_unset_meta_column_widths() {
        $(".foodle-meta-table, .foodle-meta-table th, .foodle-meta-table td").each( function() {
          $(this).css("width", '');
        });
      }

      $('#foodle-meta-sortable').sortable({
        opacity: 0.75,
        revert: true,
        forcePlaceholderSize: true,
        forceHelperSize: true,
        handle: '.foodle-meta-handle',
        //axis: 'y',
        pull: 'clone',
        tolerance: 'pointer',
        delay: 150,
        scroll: true,
        scrollSensitivity: 10,
        scrollSpeed: 40,
        create: function(e, ui){
          foodle_activate_event_handler_to_store_meta_scrolltop();
          foodle_activate_event_handler_to_set_meta_column_widths();
        },
        start: function(e, ui){
          ui.placeholder.css('visibility', 'visible');
          ui.placeholder.children().css({'background-color':'AliceBlue','background-image':'url("' + plugin_url + 'img/foodle.png")','background-repeat':'no-repeat','background-position':'center','opacity':'0'}).fadeTo(660,0.4);
          ui.placeholder.height(ui.item.outerHeight());
          foodle_width_allow_unset = false;
        },
        activate: function(e, ui){
          $('html').scrollTop(foodle_scroll_store);
        },
        stop: function(e, ui){
          foodle_unset_meta_column_widths();
          foodle_width_allow_unset = true;
        }
      });



      function foodle_add_meta_row(foodle_this) {
        foodle_meta_last_row = foodle_this.closest('tr').prop('outerHTML');

        idtitle = 'foodle-meta-row-';
        idlength = idtitle.length; // characters
        posstart = foodle_meta_last_row.indexOf(idtitle);
        posend = foodle_meta_last_row.indexOf('"', posstart);
        old_val = foodle_meta_last_row.substring(posstart, posend);
        newcount = parseInt(foodle_meta_last_row.substring( posstart + idlength, posend)) + 1; // this value is valid for all further fields
        new_val = idtitle + newcount;
        foodle_meta_last_row = foodle_meta_last_row.replace(old_val, new_val);

        idtitle = 'foodle-field-type-';
        idlength = idtitle.length; // characters
        posstart = foodle_meta_last_row.indexOf(idtitle);
        posend = foodle_meta_last_row.indexOf('"', posstart);
        old_val = foodle_meta_last_row.substring(posstart, posend);
        new_val = idtitle + newcount; // newcount defined before
        foodle_meta_last_row = foodle_meta_last_row.replace(old_val, new_val);

        idtitle = 'own-foodle-sel-';
        idlength = idtitle.length; // characters
        posstart = foodle_meta_last_row.indexOf(idtitle);
        posend = foodle_meta_last_row.indexOf('"', posstart);
        old_val = foodle_meta_last_row.substring(posstart, posend);
        new_val = idtitle + newcount; // newcount defined before
        foodle_meta_last_row = foodle_meta_last_row.replace(old_val, new_val);

        idtitle = 'exist-foodle-sel-';
        idlength = idtitle.length; // characters
        posstart = foodle_meta_last_row.indexOf(idtitle);
        posend = foodle_meta_last_row.indexOf('"', posstart);
        old_val = foodle_meta_last_row.substring(posstart, posend);
        new_val = idtitle + newcount; // newcount defined before
        foodle_meta_last_row = foodle_meta_last_row.replace(old_val, new_val);

        idtitle = 'link-foodle-sel-';
        idlength = idtitle.length; // characters
        posstart = foodle_meta_last_row.indexOf(idtitle);
        posend = foodle_meta_last_row.indexOf('"', posstart);
        old_val = foodle_meta_last_row.substring(posstart, posend);
        new_val = idtitle + newcount; // newcount defined before
        foodle_meta_last_row = foodle_meta_last_row.replace(old_val, new_val);

        idtitle = 'descr-foodle-sel-';
        idlength = idtitle.length; // characters
        posstart = foodle_meta_last_row.indexOf(idtitle);
        posend = foodle_meta_last_row.indexOf('"', posstart);
        old_val = foodle_meta_last_row.substring(posstart, posend);
        new_val = idtitle + newcount; // newcount defined before
        foodle_meta_last_row = foodle_meta_last_row.replace(old_val, new_val);

        idtitle = 'add-foodle-sel-';
        idlength = idtitle.length; // characters
        posstart = foodle_meta_last_row.indexOf(idtitle);
        posend = foodle_meta_last_row.indexOf('"', posstart);
        old_val = foodle_meta_last_row.substring(posstart, posend);
        new_val = idtitle + newcount; // newcount defined before
        foodle_meta_last_row = foodle_meta_last_row.replace(old_val, new_val);

        idtitle = 'del-foodle-sel-';
        idlength = idtitle.length; // characters
        posstart = foodle_meta_last_row.indexOf(idtitle);
        posend = foodle_meta_last_row.indexOf('"', posstart);
        old_val = foodle_meta_last_row.substring(posstart, posend);
        new_val = idtitle + newcount; // newcount defined before
        foodle_meta_last_row = foodle_meta_last_row.replace(old_val, new_val);

        idtitle = 'regexp-foodle-sel-';
        idlength = idtitle.length; // characters
        posstart = foodle_meta_last_row.indexOf(idtitle);
        posend = foodle_meta_last_row.indexOf('"', posstart);
        old_val = foodle_meta_last_row.substring(posstart, posend);
        new_val = idtitle + newcount; // newcount defined before
        foodle_meta_last_row = foodle_meta_last_row.replace(old_val, new_val);

        idtitle = 'regrep-foodle-sel-';
        idlength = idtitle.length; // characters
        posstart = foodle_meta_last_row.indexOf(idtitle);
        posend = foodle_meta_last_row.indexOf('"', posstart);
        old_val = foodle_meta_last_row.substring(posstart, posend);
        new_val = idtitle + newcount; // newcount defined before
        foodle_meta_last_row = foodle_meta_last_row.replace(old_val, new_val);

        idtitle = 'foodle_category_use'; // is a name, not an ID, but variable names are unchanged for convenience
        idlength = idtitle.length; // characters
        posstart = foodle_meta_last_row.indexOf(idtitle);
        posend = foodle_meta_last_row.indexOf('"', posstart);
        old_val = foodle_meta_last_row.substring(posstart, posend);
        const regex1 = new RegExp(old_val,'g'); // replace all occurrences
        new_val = idtitle + newcount; // newcount defined before
        foodle_meta_last_row = foodle_meta_last_row.replace(' checked="checked"', '');
        foodle_meta_last_row = foodle_meta_last_row.replace(' checked="checked"', ''); // 'foodle_poll_use' as well
        //foodle_meta_last_row = foodle_meta_last_row.replace(' checked="checked"', '');
        foodle_meta_last_row = foodle_meta_last_row.replace(regex1, new_val); // all occurrences
        foodle_meta_last_row = foodle_meta_last_row.replace(new_val, new_val + '" checked="checked'); // just the first

        idtitle = 'foodle_poll_use'; // is a name, not an ID, but variable names are unchanged for convenience
        idlength = idtitle.length; // characters
        posstart = foodle_meta_last_row.indexOf(idtitle);
        posend = foodle_meta_last_row.indexOf('"', posstart);
        old_val = foodle_meta_last_row.substring(posstart, posend);
        const regex2 = new RegExp(old_val,'g'); // replace all occurrences
        new_val = idtitle + newcount; // newcount defined before
        // "checked" was already removed above :)
        foodle_meta_last_row = foodle_meta_last_row.replace(regex2, new_val); // all occurrences
        foodle_meta_last_row = foodle_meta_last_row.replace(new_val, new_val + '" checked="checked'); // just the first

        idtitle = 'foodle_meta_line[]" value="';
        idlength = idtitle.length; // characters
        posstart = foodle_meta_last_row.indexOf(idtitle);
        posend = foodle_meta_last_row.indexOf('"', posstart);
        old_val = foodle_meta_last_row.substring(posstart, posend);
        new_val = idtitle + newcount; // newcount defined before
        foodle_meta_last_row = foodle_meta_last_row.replace(old_val, new_val);

        $('.foodle-meta-row-above').addClass('foodle-meta-row');
        $('.foodle-meta-row').last().after(foodle_meta_last_row);
        $('.foodle-meta-row-above').removeClass('foodle-meta-row');

        oldcount = newcount - 1;
        $('#foodle-meta-row-' + newcount + ' td').css('background-color','#dddddd').css('border-top','1px solid grey');

        $('#own-foodle-sel-' + newcount).prop('readonly',false).css('cursor','').css('opacity','1.0').val('');
        $('#foodle-field-type-' + newcount).val('text');
        $('#exist-foodle-sel-' + newcount).val('own-field');
        $('#link-foodle-sel-' + newcount).prop('readonly',true).css('cursor','not-allowed').css('opacity','0.4').val('---');
        $('#descr-foodle-sel-' + newcount).val('---');
        $('#regexp-foodle-sel-' + newcount).prop('readonly',false).css('cursor','').css('opacity','1.0').val('---');
        $('#regrep-foodle-sel-' + newcount).prop('readonly',false).css('cursor','').css('opacity','1.0').val('---');
        $('#add-foodle-sel-' + oldcount).prop('readonly',true).css('cursor','not-allowed').css('opacity','0.1');
        $('#del-foodle-sel-' + newcount).prop('disabled',false).css('cursor','pointer').css('opacity','1.0');
        foodle_activate_tooltips(); // to catch the new row as well
        foodle_activate_event_handler_to_store_meta_scrolltop(); // to catch the new row as well
        foodle_activate_event_handler_to_set_meta_column_widths(); // to catch the new row as well
      }



      function foodle_remove_meta_row(foodle_this) {
        foodle_this.closest('tr').remove();
        $('.foodle-meta-row-above').addClass('foodle-meta-row');
        $('.foodle-meta-row').last().children().last().children().first().children().last().prop('disabled',false).css('opacity','1.0').css('cursor','pointer');
        $('.foodle-meta-row-above').removeClass('foodle-meta-row');
      }



      function foodle_manage_meta(foodle_this) {
        own_input_id = '#own' + foodle_this.attr('id').substring(5);
        link_input_id = '#link' + foodle_this.attr('id').substring(5);
        if ( foodle_this.val() == 'own-field' ) {
          $(own_input_id).prop('readonly',false).css('cursor','').val('').css('opacity','1.0');
          $(link_input_id).prop('readonly',true).css('cursor','not-allowed').val('---').css('opacity','0.4');
        } else {
          $(own_input_id).prop('readonly',true).css('cursor','not-allowed').val('---').css('opacity','0.4');
          $(link_input_id).prop('readonly',false).css('cursor','').val('---').css('opacity','1.0');
        }
      }



      function foodle_check_metafield_name(foodle_this) {
        if ( ( ! ( ( event.shiftKey ) && ( ( event.keyCode == 37 ) || ( event.keyCode == 38 ) || ( event.keyCode == 39 ) || ( event.keyCode == 40 ) ) ) ) && ( event.keyCode != 16 ) && ( event.keyCode != 17 ) && ( event.keyCode != 18 ) ) {
          foodle_save_curpos = foodle_this.selectionStart;
          foodle_save_selend = foodle_this.selectionEnd;
          foodle_save_value = foodle_this.value;

          // this is the very check - the rest is just there to smoothen the user input
          foodle_this.value=foodle_this.value.replace(/^[^a-zA-Z]/, '').replace(/[^a-zA-Z0-9.\-_ ]/g, '').replace(/\s+/g, ' ');

          foodle_len_diff = foodle_this.value.length - foodle_save_value.length;
          if ( foodle_this.value.length > foodle_save_value.length ) {
            foodle_this.selectionStart = foodle_save_curpos - 1;
            foodle_this.selectionEnd = foodle_this.selectionStart;
          }
          if ( foodle_this.value.length < foodle_save_value.length ) {
            foodle_this.selectionStart = foodle_save_curpos + foodle_len_diff;
            foodle_this.selectionEnd = foodle_this.selectionStart;
          } else {
            foodle_this.selectionStart = foodle_save_curpos - foodle_len_diff;
            foodle_this.selectionEnd = foodle_save_selend - foodle_len_diff;
          }
        }
      }



      function foodle_check_content(foodle_this) {
        $v = foodle_this.val();
        if ( $v.match(/^[a-zA-Z]/) == null ) { // must start with a letter
          foodle_this.val('---');
        }
      }



      function foodle_check_link_content(foodle_this) {
        $v = foodle_this.val();
        if ( $v.match(/^[#&a-zA-Z]/) == null ) { // must start with a letter or # or &
          foodle_this.val('---');
        }
      }



      function foodle_check_text_input(foodle_this) {
        if ( ( ! ( ( event.shiftKey ) && ( ( event.keyCode == 37 ) || ( event.keyCode == 38 ) || ( event.keyCode == 39 ) || ( event.keyCode == 40 ) ) ) ) && ( event.keyCode != 16 ) && ( event.keyCode != 17 ) && ( event.keyCode != 18 ) ) {
          foodle_save_curpos = foodle_this.selectionStart;
          foodle_save_selend = foodle_this.selectionEnd;
          foodle_save_value = foodle_this.value;

          // this is the very check - the rest is just there to smoothen the user input
          foodle_this.value=foodle_this.value.replace(/^[^a-zA-Z]/, '');

          foodle_len_diff = foodle_this.value.length - foodle_save_value.length;
          if ( foodle_this.value.length > foodle_save_value.length ) {
            foodle_this.selectionStart = foodle_save_curpos - 1;
            foodle_this.selectionEnd = foodle_this.selectionStart;
          }
          if ( foodle_this.value.length < foodle_save_value.length ) {
            foodle_this.selectionStart = foodle_save_curpos + foodle_len_diff;
            foodle_this.selectionEnd = foodle_this.selectionStart;
          } else {
            foodle_this.selectionStart = foodle_save_curpos - foodle_len_diff;
            foodle_this.selectionEnd = foodle_save_selend - foodle_len_diff;
          }
        }
      }



      function foodle_check_link_input(foodle_this) {
        if ( ( ! ( ( event.shiftKey ) && ( ( event.keyCode == 37 ) || ( event.keyCode == 38 ) || ( event.keyCode == 39 ) || ( event.keyCode == 40 ) ) ) ) && ( event.keyCode != 16 ) && ( event.keyCode != 17 ) && ( event.keyCode != 18 ) ) {
          foodle_save_curpos = foodle_this.selectionStart;
          foodle_save_selend = foodle_this.selectionEnd;
          foodle_save_value = foodle_this.value;

          // this is the very check - the rest is just there to smoothen the user input
          foodle_this.value=foodle_this.value.replace(/^[^#&a-zA-Z]/, '');

          foodle_len_diff = foodle_this.value.length - foodle_save_value.length;
          if ( foodle_this.value.length > foodle_save_value.length ) {
            foodle_this.selectionStart = foodle_save_curpos - 1;
            foodle_this.selectionEnd = foodle_this.selectionStart;
          }
          if ( foodle_this.value.length < foodle_save_value.length ) {
            foodle_this.selectionStart = foodle_save_curpos + foodle_len_diff;
            foodle_this.selectionEnd = foodle_this.selectionStart;
          } else {
            foodle_this.selectionStart = foodle_save_curpos - foodle_len_diff;
            foodle_this.selectionEnd = foodle_save_selend - foodle_len_diff;
          }
        }
      }



      function foodle_check_regexp_static(foodle_this) {
        $v = foodle_this.val();
        if ( $v.match(/^[/]/) == null ) { // must start with '/'
          foodle_this.val('---');
        }
      }



      function foodle_check_regexp_input(foodle_this) {
        if ( ( ! ( ( event.shiftKey ) && ( ( event.keyCode == 37 ) || ( event.keyCode == 38 ) || ( event.keyCode == 39 ) || ( event.keyCode == 40 ) ) ) ) && ( event.keyCode != 16 ) && ( event.keyCode != 17 ) && ( event.keyCode != 18 ) ) {
          foodle_save_curpos = foodle_this.selectionStart;
          foodle_save_selend = foodle_this.selectionEnd;
          foodle_save_value = foodle_this.value;

          // this is the very check - the rest is just there to smoothen the user input
          foodle_this.value=foodle_this.value.replace(/^[^/]/, '');

          foodle_len_diff = foodle_this.value.length - foodle_save_value.length;
          if ( foodle_this.value.length > foodle_save_value.length ) {
            foodle_this.selectionStart = foodle_save_curpos - 1;
            foodle_this.selectionEnd = foodle_this.selectionStart;
          }
          if ( foodle_this.value.length < foodle_save_value.length ) {
            foodle_this.selectionStart = foodle_save_curpos + foodle_len_diff;
            foodle_this.selectionEnd = foodle_this.selectionStart;
          } else {
            foodle_this.selectionStart = foodle_save_curpos - foodle_len_diff;
            foodle_this.selectionEnd = foodle_save_selend - foodle_len_diff;
          }
        }
      }



      function foodle_check_regexp(foodle_this) {
        foodle_regexp_good = true;
        foodle_regexp_error = '';
        foodle_regexp_value = foodle_this.val();
        if ( foodle_regexp_value == '---' ) return; // no Regular Expression
        foodle_regexp_first = foodle_regexp_value.indexOf('/');
        foodle_regexp_last = foodle_regexp_value.lastIndexOf('/');
        if ( foodle_regexp_first == foodle_regexp_last ) {
          foodle_regexp_this = foodle_this;
          foodle_regexp_good = false;
          foodle_regexp_error = 'SyntaxError: Missing pattern delimiter.';
        } else {
          if ( ( foodle_regexp_value != '---' ) && ( foodle_regexp_first == foodle_regexp_last ) ) {
            foodle_regexp_this = foodle_this;
            foodle_regexp_good = false;
          }
          else if ( foodle_this.attr('id').substring(0,6) == 'regexp' ) { // just to be sure
            foodle_regexp_pattern = foodle_regexp_value.substr(foodle_regexp_first + 1, foodle_regexp_last - foodle_regexp_first - 1);
            foodle_regexp_flags = foodle_regexp_value.substr(foodle_regexp_last + 1);
            try {
              var regex = new RegExp(foodle_regexp_pattern, foodle_regexp_flags);
              foodle_this.css('border-color', 'DarkGoldenRod');
              foodle_regexp_good = true;
            }
            catch (e) {
              foodle_regexp_this = foodle_this;
              foodle_regexp_good = false;
              foodle_regexp_error = e;
            }
          }
        }
      }



      function foodle_false_regexp_prevent_submit() {

        if ( foodle_regexp_good ) {
            <?php if ( ! $foodle_no_safety_query ): ?> return confirm('<?php echo __('Are you sure to save the metafield definition?','foodle-for-democracy-poll') ?>'); <?php endif ?>
        } else {
          regexp_content = foodle_regexp_this.val();
          foodle_regexp_this.css('border-color', 'red');

          foodle_regexp_this.focus();
          alert('<?php echo __('Invalid Regular Expression','foodle-for-democracy-poll') ?>!\n\n' + foodle_regexp_error);
          return false;
        }
      }



      $(document).ready(function() {
      $(window).keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          return false;
        }
        });
      });
    </script>
  <?php

  $foodle_delete_button_text = ( $foodle_orphan_metafields ) ? __('Delete all orphaned metafield entries in the database','foodle-for-democracy-poll') : __('No orphaned metafields to delete in the database','foodle-for-democracy-poll');
  $foodle_delete_button_inhibit = ( $foodle_orphan_metafields ) ? '' : ' disabled';
  $foodle_delete_warning = __('Are you sure to delete the orphaned metafield database entries?\n \nIf not sure, you might want to look into the following:\n&bull; Check the drop-down of existing field names for RECOVER: entries\n&bull; Recover the field name(s) found there by selecting accordingly\n&bull; Then, consult the Metafield Defaults & Sorting tab and...\n&bull; ...in there, check the data still stored and decide!\n&bull; You may fine-tune the recovered own field names (not case sensitive)\n \nSo, do you want to proceed deleting?','foodle-for-democracy-poll');
  $foodle_delete_button = ( ( ! current_user_can('manage_options') ) && ( ! $foodle_roles_deleteun ) ) ? '' : '<div style="float:right;margin:30px 0px 0px 5px;"><input type="submit" class="button-primary"'.$warning_delete_unused_metafield_entries.' style="background-color:DarkGoldenrod !important;" name="delete_no_longer_used_metafields" value="'.$foodle_delete_button_text.'..."'.$foodle_delete_button_inhibit.' onclick="return confirm(\''.$foodle_delete_warning.'\');"/></div>';
  echo '<div style="float:left;margin:30px 5px 0px 0px;"><input type="submit" class="button-primary" name="save_metafields_definition" value="'.__('Save metafields definition','foodle-for-democracy-poll').'..." onclick="return foodle_false_regexp_prevent_submit();"/></div>'.$foodle_delete_button.'</form></div>';
}



function foodle_metafield_defaults_sorting() {
  global $foodle_sorting;
  global $foodle_help_tooltips;
  global $foodle_warnings_removed;
  global $foodle_no_safety_query;
  global $foodle_roles_sorting;

  if ( ( ! current_user_can('manage_options') ) && ( ! $foodle_roles_sorting ) ) {
    echo '<p style="font-size:1.5em;color:darkred;"><strong>'.__('This tab is for Foodle administrators only!','foodle-for-democracy-poll').'</strong></p>';
    return;
  }

  // Help and Warnings Tooltips
  $help_sort_metafield_name = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('The metafield name.<br><br><strong>Whether own or existing metafield:</strong><br>The metafield name will be displayed as field title in the user profile.<br>Sorting is always done in the same order as the fields are defined!','foodle-for-democracy-poll').'" ' : '';
  $help_sort_metafield_input = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('One metafield content found (number of occurrences).<br>Click to list the related users.','foodle-for-democracy-poll').'" ' : '';
  $help_sort_metafield_input_replace = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('Replace the existing input found (and all its occurrences) by a new input (= sub-category for the polls).<br>This may be used to normalize user inputs if not done through (or for to prepare) drop-down.<br><span style=\'color:darkred;\'>However, you must take extreme special care when modifying content of<br>such existing user metafields as the results may not be foreseeable!</span>','foodle-for-democracy-poll').'" ' : '';
  $help_sort_metafield_not_used_yet = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('This metafield is currently not used.','foodle-for-democracy-poll').'" ' : '';
  $help_sort_metafield_sort = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('If selected:<br>The below list is used for metafield content (sub-categories) sorting only.<br>In this case, you may as well use substrings for sorting.','foodle-for-democracy-poll').'" ' : '';
  $help_sort_metafield_sort_drop_down = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('If selected:<br>The below list is used for metafield content (sub-categories) sorting and drop-down entry.<br>Users can only select data found in this list!<br>A Drop-Down will override Regular Expressions!','foodle-for-democracy-poll').'" ' : '';
  $help_sort_metafield_sort_list = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('This list defines the sorting for the sub-categories (metafield input).<br>One line per element is required.<br>For Drop-Down, leaving the first line empty will allow to leave the field empty<br>when a user wants to save his profile without such content.','foodle-for-democracy-poll').'" ' : '';
  $help_generate_sortlist = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('Click to auto-generate the above list<br>based on the basic meta field and<br>the regular expression.<br>(<strong>Disabled upon any input!</strong>)','foodle-for-democracy-poll').'" ' : '';
  $warning_sort_existing_metafield = ( ! $foodle_warnings_removed ) ? ' foodle_ttwarning="'.__('Warning:<br>Be careful when modifying content of unknown existing fields.<br>This may have unwanted effects and may harm WordPress or other plugins!','foodle-for-democracy-poll').'" ' : '';
  $warning_sort_metafield_error_dont_use = ( ! $foodle_warnings_removed ) ? ' foodle_ttwarning_dy="-63" foodle_ttwarning="'.__('This metafield is obviously not to be used!<br>Array content has been detected!','foodle-for-democracy-poll').'" ' : '';
  $warning_sort_metafield_error_disabled = ( ! $foodle_warnings_removed ) ? ' foodle_ttwarning_dy="-63"  foodle_ttwarning="'.__('This metafield is obviously not to be used!<br>It was disabled in the user profile!','foodle-for-democracy-poll').'" ' : '';
  $warning_clean_meta_fields = ( ! $foodle_warnings_removed ) ? ' foodle_ttwarning_dy="-110"  foodle_ttwarning="'.__('The clean-up of meta fields works for non-empty drop down lists only.<br><strong>Be aware that it may have unwanted effects:</strong><br>It will make sure that all users of related user roles will get an entry (protected space),<br>if they are not part of the drop-down list.<br>This could replace previous user entries and will delete entries from not related user roles!','foodle-for-democracy-poll').'" ' : '';

  echo '<p><form action="'.admin_url( 'admin.php?page=foodle-admin-page&tab=metafield-default-sorting' ).'" method="post">';
  ?>
    <figure class="foodle-block-table">
      <table class="foodle-sort-table">
        <thead>
          <tr class="foodle-header-row">
            <th style="padding:0px 10px; text-align:center;"><br><?php echo __('Metafield Name','foodle-for-democracy-poll') ?><br><br></th>
            <th style="padding:0px 10px; text-align:center;" colspan="2"><br><?php echo __('Current Values<br>& Replacements','foodle-for-democracy-poll') ?><br><br></th>
            <th style="padding:0px 10px; text-align:center;"><br><?php echo $foodle_sorting ?><br><br></th>
          </tr>
        </thead>
        <tbody>
  <?php
  $users = get_users(array(
    'orderby'  => 'meta_value',
    'meta_key' => 'last_name', // just a habit ;-)
    'order'    => 'ASC'
  ));
  $foodle_user_metas = array();
  $foodle_user_metas_types = array();
  foreach((array)get_option('foodle_meta_fields') as $foodle_meta_field => $foodle_meta_field_data ) {
    $foodle_user_metas_types[$foodle_meta_field] = "text";
    if ( isset($foodle_meta_field_data[4]) ) $foodle_user_metas_types[$foodle_meta_field] = ( $foodle_meta_field_data[4] != "range" ) ? $foodle_meta_field_data[4] : "number" ;
    foreach($users as $user) {
      update_meta_cache( 'user', array($user->ID) ); // get new data in case it was updated
      $foodle_user_meta = get_user_meta($user->ID, foodle_fieldname_to_meta_name($foodle_meta_field), true );
      if ( ( $foodle_user_meta != '' ) &&  ( ! is_array($foodle_user_meta) ) )
        $foodle_user_metas[$foodle_meta_field][$foodle_user_meta] = ( isset($foodle_user_metas[$foodle_meta_field][$foodle_user_meta]) ) ? $foodle_user_metas[$foodle_meta_field][$foodle_user_meta] + 1 : 1 ;
      else
        if ( is_array($foodle_user_meta) )
          $foodle_user_metas[$foodle_meta_field]['Error: don\'t use!'] = ( isset ($foodle_user_metas[$foodle_meta_field]['Error: don\'t use!']) ) ? $foodle_user_metas[$foodle_meta_field]['Error: don\'t use!'] + 1 : 1 ;
    }
    if ( isset($foodle_user_metas[$foodle_meta_field]) )
      ksort($foodle_user_metas[$foodle_meta_field]);
    else
      $foodle_user_metas[$foodle_meta_field] = array('•••not•used•yet•••' => 0);
  }
  $foodle_meta_defaults_sorting = array();
  $is_foodle_meta_defaults_sorting = true;
  if ( get_option('foodle_meta_defaults_sorting') ) {
    $foodle_meta_defaults_sorting = get_option('foodle_meta_defaults_sorting');
  } else {
    $is_foodle_meta_defaults_sorting = false;
  }
  $foodle_new_sub_category = __('Modify sub-category','foodle-for-democracy-poll');
  $foodle_one_line_per_item = __('One line per item (sorted)','foodle-for-democracy-poll');
  if ( count($foodle_user_metas) == 0 ) echo '<tr><td style="text-align:center;padding:10px; color:SteelBlue;" colspan="4">'.__('No categories to define sorting for, yet','foodle-for-democracy-poll').'!</td></tr>';
  $foodle_base_sortlist = false; // Whether the basic metafield carries a sortlist
  $foodle_field_count = -1; // to get 0 as first iteration
  foreach($foodle_user_metas as $foodle_user_meta => $foodle_user_meta_data ) {
    $foodle_field_count += 1;
    $foodle_user_meta_clean = str_replace('.','-',$foodle_user_meta);
    $foodle_number_of_lines = count($foodle_user_meta_data);
    $foodle_row_count = -1; // to get 0 as first iteration
    foreach ( $foodle_user_meta_data as $foodle_user_meta_input => $foodle_user_meta_count ) {
      $foodle_row_count += 1; // just count the rows
      $foodle_row_class = ( $foodle_field_count == 0 ) ? 'foodle-sorting-row-above' : 'foodle-sorting-row';
      $foodle_checked_list = 'checked="checked"';
      $foodle_checked_drop_down = '';
      $foodle_sortlist = '';
      $foodle_clean_up_enabled = false;
      if ( ( $is_foodle_meta_defaults_sorting) && ( isset($foodle_meta_defaults_sorting[$foodle_user_meta]['sorttype']) ) ) {
        if ( $foodle_meta_defaults_sorting[$foodle_user_meta]['sorttype'] == 'drop-down') {
          $foodle_checked_list = '';
          $foodle_checked_drop_down = 'checked="checked"';
          if ( current_user_can('manage_options') ) $foodle_clean_up_enabled = true; // Clean-up is for administrators only
        }
        $foodle_sortlist = str_replace('<br>','&#13;&#10;',$foodle_meta_defaults_sorting[$foodle_user_meta]['sortlist']);
        if ( ( $foodle_field_count == 0 ) && ( strlen($foodle_sortlist) != 0 ) ) $foodle_base_sortlist = true;
        $foodle_number_of_sortitems = count(explode('<br>',$foodle_meta_defaults_sorting[$foodle_user_meta]['sortlist']));
      }
      if ( strlen($foodle_sortlist) == 0 ) $foodle_clean_up_enabled = false; // No clean-up if drop down list is empty
    ?>
          <tr class="<?php echo $foodle_row_class; ?>">
    <?php
      if ( $foodle_row_count == 0 ):
    ?>
            <td <?php echo $help_sort_metafield_name ?>rowspan="<?php echo $foodle_number_of_lines ?>" style="padding:10px 10px; border-right: 1px solid #888888;">
              <?php echo '<span style="font-size:1.1em;font-weight:bold;">'.str_replace('••', '', $foodle_user_meta).'</span>' ?>
              <?php if ( $foodle_clean_up_enabled ): ?>
                <br>
                <div <?php echo $warning_clean_meta_fields; ?>  style="margin:20px 8px 0px 8px;"><button type="submit" class="button-primary" style="background-color:Green!important;border:1px solid DarkRed !important;" name="meta_field_clean_up" value="<?php echo $foodle_user_meta; ?>" onclick="return confirm('<?php echo __('Are you sure to start the clean-up for','foodle-for-democracy-poll').' <'.str_replace('••','',$foodle_user_meta).'>?'; ?>');"><?php echo __('Clean-up','foodle-for-democracy-poll'); ?>...</button></div>
              <?php endif ?>
            </td>
    <?php
      endif;
      if ( ( $foodle_user_meta_input != '•••not•used•yet•••' ) && ( $foodle_user_meta_input != 'Error: don\'t use!' ) ):
    ?>
            <td style="padding:10px 10px;"><?php echo '<span'.$help_sort_metafield_input.'><button type="submit" class="button-primary" style="background-color:#80abb9!important;" name="foodle_list_meta_sub_members" value="'.$foodle_user_meta.'|'.$foodle_user_meta_input.'">'.str_replace(' ', '&nbsp;', $foodle_user_meta_input.'  ('.$foodle_user_meta_count.')').'</button></span>' ?></td>
            <td style="padding:10px 10px;"><label <?php echo $warning_sort_existing_metafield.$help_sort_metafield_input_replace ?>><?php echo sprintf(_n('Replace this entry by:','Replace all %d entries by:',$foodle_user_meta_count,'foodle-for-democracy-poll'), $foodle_user_meta_count) ?><br><input type="<?php echo $foodle_user_metas_types[$foodle_user_meta] ?>" name="subreplace[<?php echo $foodle_user_meta.']['.$foodle_user_meta_input ?>]" placeholder="<?php echo $foodle_new_sub_category ?>"></label></td>
    <?php
      elseif (  $foodle_user_meta_input == 'Error: don\'t use!' ):
    ?>
            <td colspan="2" style="padding:10px 10px; color:darkred;"><?php echo '<span'.$warning_sort_metafield_error_dont_use.'>'.__('Error: don\'t use (array content found)','foodle-for-democracy-poll').'!!!'.'</span>' ?></td>
    <?php
      else:
    ?>
            <td colspan="2" style="padding:10px 10px;"><?php echo '<span'.$help_sort_metafield_not_used_yet.'>'.__('Not used, yet','foodle-for-democracy-poll').'!'.'</span>' ?></td>
    <?php
      endif;
      if ( ( $foodle_row_count == 0 ) && ( $foodle_user_meta_input != 'Error: don\'t use!' ) ):
    ?>
            <td rowspan="<?php echo $foodle_number_of_lines ?>" style="padding:10px 10px; border-left: 1px solid #888888">
              <label <?php echo $help_sort_metafield_sort ?>><input type="radio" name="sorttype[<?php echo $foodle_user_meta ?>]" value="list" <?php echo $foodle_checked_list ?>><?php echo __('(Sub-)String List','foodle-for-democracy-poll')?></label>&nbsp;&nbsp;&nbsp;
              <label <?php echo $help_sort_metafield_sort_drop_down ?>><input type="radio" name="sorttype[<?php echo $foodle_user_meta ?>]" value="drop-down" <?php echo $foodle_checked_drop_down ?>><?php echo __('Drop-Down','foodle-for-democracy-poll'); ?></label><?php if ( ( isset(get_option('foodle_regex_main')[$foodle_user_meta]) ) && ( get_option('foodle_regex_main')[$foodle_user_meta] != '---' ) ): ?><br><span style="font-size:0.8em; color:darkred;"><?php echo str_replace(' ','&nbsp;', '('.__('Warning: A Regular Expression is set for this field','foodle-for-democracy-poll').')'); ?></span><?php endif ?><br><br>
              <label <?php echo $help_sort_metafield_sort_list ?>><span  style="float:left;color:SteelBlue;font-weight:bold;" class="auto-sortlist-label" id="auto_sortlist_label_<?php echo $foodle_user_meta_clean ?>"></span><?php echo __('Definition per sorted list (empty = not used)','foodle-for-democracy-poll') ?><br>
              <div class="mf_foodle_auto_sortlist_response" id="mf_foodle_auto_sortlist_response_<?php echo $foodle_user_meta_clean ?>"><div class="mf_foodle_auto_sortlist_overlay" id="mf_foodle_auto_sortlist_overlay_<?php echo $foodle_user_meta_clean ?>"></div>
                <textarea id="foodle_sortlist_<?php echo $foodle_user_meta_clean ?>" name="sortlist[<?php echo $foodle_user_meta ?>]" rows="<?php echo ($foodle_number_of_sortitems + 1) ?>" cols="30" wrap="hard" placeholder="<?php echo $foodle_one_line_per_item ?>"><?php echo $foodle_sortlist ?></textarea>
              </div>
              </label>
              <?php if ( ( isset(get_option('foodle_regex_main')[$foodle_user_meta]) ) && ( get_option('foodle_regex_main')[$foodle_user_meta] != '---' ) && ( $foodle_base_sortlist ) && ( $foodle_checked_drop_down == '' ) ): ?>
                <br><br>
                <button <?php echo $help_generate_sortlist; ?>onclick="foodle_auto_generate_sortlist_js('<?php echo $foodle_user_meta; ?>'); return false;" class="button-primary auto-sortlist-button" id="auto_sortlist_button_" style="background-color:#80abb9!important;" value="<?php echo $foodle_user_meta; ?>"><?php echo __('Generate list from regular expression','foodle-for-democracy-poll'); ?></button><br>
              <?php endif ?>
            </td>
    <?php
      elseif ( $foodle_user_meta_input == 'Error: don\'t use!' ):
    ?>
            <td rowspan="<?php echo $foodle_number_of_lines ?>" style="padding:10px 10px; border-left: 1px solid #888888; color:darkred;">
              <?php echo '<span'.$warning_sort_metafield_error_disabled.'>'.__('Error: Use has been disabled','foodle-for-democracy-poll').'!!!'.'</span>' ?>
            </td>
    <?php
      endif
    ?>
          </tr>
    <?php
    }
  }
  ?>
        </tbody>
      </table>
    </figure>
  <?php
  echo '<script type="text/javascript"> var $=jQuery; $("[type=foodle-date]").addClass("foodle-date").attr("type","text"); </script>';
  echo '<p>&nbsp;</p>';
  echo '<input type="submit" class="button-primary" name="save_meta_defaults_sorting" value="'.__('Save defaults & sorting','foodle-for-democracy-poll').'..."'; if ( ! $foodle_no_safety_query ) echo ' onclick="return confirm(\''.__('Are you sure to save the Replacements\nand the Defaults & Sorting data?','foodle-for-democracy-poll').'\');"'; echo '/></form></p>';
}



function foodle_set_special_roles_users() {
  global $wp_roles;
  global $foodle_help_tooltips;
  global $foodle_no_safety_query;
  global $foodle_roles_sproles;

  if ( ( ! current_user_can('manage_options') ) && ( ! $foodle_roles_sproles ) ) {
    echo '<p style="font-size:1.5em;color:darkred;"><strong>'.__('This tab is for Foodle administrators only!','foodle-for-democracy-poll').'</strong></p>';
    return;
}

  $help_special_role_user = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('Selection of roles and users.<br> A \'No selection\' entry will delete the row upon saving.','foodle-for-democracy-poll').'" ' : '';
  $help_special_capabilities = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('<strong><u>Definition of capabilities:</u></strong><br><strong>Mark:</strong> This role or user and his votes will be marked when found in a poll results list. It will,<br>however, not be considered in the category statistics per answer, nor for \'maxcount\'.<br><strong>Special view:</strong> This role or user can view (and execute) hidden content (like reminder activity).<br><strong>No voter:</strong> This user will not be considered a voter, regardless his role.<br><strong>No reminders:</strong> This role or user will receive no email reminders for poll votes.<br>(The latter may be typical for the administrator and a few other registered users.<br>&nbsp;Reason: On command, this plugin would remind all users with a role determined for a certain poll<br> &nbsp;in case they didn\'t vote so far for this poll, except those referred to herein!)','foodle-for-democracy-poll').'" ' : '';
  $help_special_delete_row = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('Delete this Foodle capabilities row.','foodle-for-democracy-poll').'" ' : '';
  $help_special_add_row = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('Add a new Foodle capabilities row.','foodle-for-democracy-poll').'" ' : '';
  $help_dragging_su_rows = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('You may drag each row to where you want in order to change the row order.<br>This will become active <strong>upon saving</strong>.<br>However, this is a rather cosmetic, not a functional option.','foodle-for-democracy-poll').'"' : '';

  $users = get_users(array(
    'orderby'  => 'meta_value',
    'meta_key' => 'last_name', // just a habit ;-)
    'order'    => 'ASC'
  ));

  echo '<p><form action="'.admin_url( 'admin.php?page=foodle-admin-page&tab=special-roles-users' ).'" method="post">';
  ?>
    <figure class="foodle-block-table">
      <table unselectable="on" class="foodle-special-roles-table unselectable">
        <thead>
          <tr class="foodle-header-row">
            <th style="padding:0px 10px; text-align:center;"><div style="opacity:0.4; margin:auto; width:18px; height:16px; background-size:contain; background-image: url('<?php echo plugin_dir_url(__FILE__).'img/move_sm.png'; ?>');" <?php echo $help_dragging_su_rows ?>></div></th>
            <th style="padding:0px 10px; text-align:center;"><br><?php echo __('Select Roles & Users','foodle-for-democracy-poll') ?><br><br></th>
            <th style="padding:0px 10px; text-align:center;"><br><?php echo __('Set Foodle Capabilities','foodle-for-democracy-poll') ?><br><br></th>
            <th style="padding:0px 10px; text-align:center;">&nbsp;</th> <!-- the column with the buttons -->
          </tr>
        </thead>
        <tbody id="foodle-special-roles-sortable">
  <?php
  if ( ( get_option('foodle_special_functions') ) && ( count(get_option('foodle_special_functions')) != 0 ) ) {
    $foodle_special_functions = get_option('foodle_special_functions');
  } else {
    $foodle_special_functions['no_selection'] = array('');
  }

  $foodle_number_of_rows = count($foodle_special_functions);
  $foodle_meta_count = -1; // in order to have the first iteration see 0
  foreach ( $foodle_special_functions as $selected_user_role => $foodle_capabilities ) {
    $foodle_meta_count += 1;
    if ($foodle_meta_count == 0) {
      $foodle_del_button_style = 'opacity:0.1; cursor:not-allowed;';
      $foodle_del_button_attr = 'disabled="disabled"';
      if ( $foodle_number_of_rows == 1 ) { // just one row existing
        $foodle_add_button_style = 'opacity:1.0; cursor:pointer;';
        $foodle_add_button_attr = '';
      } else {
        $foodle_add_button_style = 'opacity:0.1; cursor:not-allowed;';
        $foodle_add_button_attr = 'disabled="disabled"';
      }
    } else {
      $foodle_del_button_style = 'opacity:1.0; cursor:pointer;';
      $foodle_del_button_attr = '';
      if ( $foodle_meta_count + 1 == $foodle_number_of_rows ) { // the last row
        $foodle_add_button_style = 'opacity:1.0; cursor:pointer;';
        $foodle_add_button_attr = '';
      } else {
        $foodle_add_button_style = 'opacity:0.1; cursor:not-allowed;';
        $foodle_add_button_attr = 'disabled="disabled"';
      }
    }
  ?>
          <tr class="foodle-functions-row" id="foodle-functions-row-<?php echo $foodle_meta_count ?>">
            <td style="padding: 10px 10px;">
              <div class="foodle-special-roles-handle" style="cursor:move; margin:auto; width:18px; height:16px; background-size:contain; background-image: url('<?php echo plugin_dir_url(__FILE__).'img/move_sm.png'; ?>');" <?php echo $help_dragging_su_rows ?>></div>
            </td>
            <td style="padding:10px 10px;">
              <label <?php echo $help_special_role_user ?>><span style="font-weight:bold;"><?php echo __('Role / User','foodle-for-democracy-poll').':' ?></span><br>
                <select style="font-size:0.95em;" class="roles-users-sel" id="roles-users-sel-<?php echo $foodle_meta_count ?>"  name="roles_users_field[]" size="1">
                  <optgroup label ="<?php echo __('Nothing','foodle-for-democracy-poll') ?>">
                    <option style="font-size:0.95em;" value="no_selection" <?php if ( $selected_user_role == 'no_selection' ) echo 'selected="selected"';?>><?php echo __('No selection','foodle-for-democracy-poll') ?></option>
                  </optgroup>
                  <optgroup label ="<?php echo __('Roles','foodle-for-democracy-poll') ?>">
                    <?php   foreach ( $wp_roles->role_names as $foodle_role_slug => $foodle_role_name) { ?>
                      <option style="font-size:0.95em;" value="<?php echo $foodle_role_slug;?>" <?php if ( $selected_user_role == $foodle_role_slug ) echo 'selected="selected"';?>><?php echo _ex($foodle_role_name,'User role'); ?></option>
                    <?php } ?>
                  </optgroup>
                  <optgroup label ="<?php echo __('Users','foodle-for-democracy-poll') ?>">
                    <?php foreach ( $users as $user ) {
                            $foodle_user_id = $user->ID;
                            $foodle_user_info = get_userdata($foodle_user_id);
                            $foodle_user = $foodle_user_info->user_login;
                           ?>
                      <option style="font-size:0.95em;" value="<?php echo $foodle_user_id;?>" <?php if ( $selected_user_role == $foodle_user_id ) echo 'selected="selected"';?>><?php echo $foodle_user; ?></option>
                    <?php } ?>
                  </optgroup>
                </select>
              </label>
            </td>
            <td style="padding:10px 10px;">
              <span  <?php echo $help_special_capabilities ?>>
                <span style="font-weight:bold;"><?php echo __('Capabilities','foodle-for-democracy-poll').':' ?></span><br>
                <label>
                  <input type ="checkbox" style="font-size:0.95em;" id="check-mark-<?php echo $foodle_meta_count ?>" name="capabilities<?php echo $foodle_meta_count ?>[]" value="mark" <?php if ( in_array('mark', $foodle_capabilities ) ) echo 'checked="checked"';?>/><?php echo __('Mark','foodle-for-democracy-poll') ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </label>
                <label>
                  <input type ="checkbox" style="font-size:0.95em;" id="check-view-<?php echo $foodle_meta_count ?>" name="capabilities<?php echo $foodle_meta_count ?>[]" value="view" <?php if ( in_array('view', $foodle_capabilities ) ) echo 'checked="checked"';?>/><?php echo __('Special view','foodle-for-democracy-poll') ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </label>
                <label>
                  <input type ="checkbox" style="font-size:0.95em;" class='check-no-voter' id="check-no-voter-<?php echo $foodle_meta_count ?>" name="capabilities<?php echo $foodle_meta_count ?>[]" value="no-voter" <?php if ( ! is_numeric($selected_user_role) ) echo 'disabled="disabled"'; if ( in_array('no-voter', $foodle_capabilities ) ) echo 'checked="checked"';?>/><?php echo __('No voter','foodle-for-democracy-poll') ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </label>
                <label>
                  <input type ="checkbox" style="font-size:0.95em;" id="check-no-remind-<?php echo $foodle_meta_count ?>" name="capabilities<?php echo $foodle_meta_count ?>[]" value="no-remind" <?php if ( in_array('no-remind', $foodle_capabilities ) ) echo 'checked="checked"';?>/><?php echo __('No reminders','foodle-for-democracy-poll') ?>
                </label>
              </span>
            </td>
            <td style="padding:0px 10px;">
              <div style="display:block; padding:10px;">
                <input <?php echo $help_special_delete_row ?>type="button" style="padding:0px; border: 0px solid darkred; color:white; font-size:1em; width:25px; height:25px;<?php echo $foodle_del_button_style; ?> background-color:darkred; border-radius:25px;" id="del-foodle-sel-<?php echo $foodle_meta_count ?>" value="✘" onclick="foodle_remove_functions_row($(this));" <?php echo $foodle_del_button_attr; ?>><br><br>
                <input type="hidden" name="foodle_functions_line[]" value="<?php echo $foodle_meta_count ?>">
                <input <?php echo $help_special_add_row ?>type="button" style="padding:5px 8px; border: 0px solid darkgreen; color:white; font-size:1em; width:25px; height:25px;<?php echo $foodle_add_button_style; ?> background-color:darkgreen; border-radius:25px;" id="add-foodle-sel-<?php echo $foodle_meta_count ?>" value="✛" onclick="foodle_add_functions_row($(this));" <?php echo $foodle_add_button_attr; ?>>
              </div>
            </td>
          </tr>
  <?php
  }
  ?>
        </tbody>
      </table>
    </figure>

    <script type="text/javascript">
      var $ = jQuery;
      var foodle_scroll_store;
      var foodle_width_allow_unset = true;
      var plugin_url = '<?php echo plugin_dir_url(__FILE__); ?>';

      function foodle_activate_event_handler_to_store_special_roles_scrolltop() {
        $('.foodle-special-roles-handle').on('mousedown', function() {
          foodle_scroll_store = $('html').scrollTop();
        });
      }

      function foodle_activate_event_handler_to_set_special_roles_column_widths() {
        $('.foodle-special-roles-handle').on('mousedown', function() {
          $(".foodle-special-roles-table").css("width", $(".foodle-special-roles-table").outerWidth());
          $(".foodle-special-roles-table th, .foodle-special-roles-table td").each( function() {
            $(this).css("width", $(this).width() + 0.001);
          });
        });
        $('.foodle-special-roles-handle').on('mouseup', function() {
          if ( foodle_width_allow_unset )
            $(".foodle-special-roles-table, .foodle-special-roles-table th, .foodle-special-roles-table td").each( function() {
              $(this).css("width", '');
          });
        });
      }

      function foodle_unset_special_roles_column_widths() {
        $(".foodle-special-roles-table, .foodle-special-roles-table th, .foodle-special-roles-table td").each( function() {
          $(this).css("width", '');
        });
      }

      $('#foodle-special-roles-sortable').sortable({
        opacity: 0.66,
        revert: true,
        forcePlaceholderSize: true,
        forceHelperSize: true,
        handle: '.foodle-special-roles-handle',
        //axis: 'y',
        pull: 'clone',
        tolerance: 'pointer',
        delay: 150,
        scroll: true,
        scrollSensitivity: 10,
        scrollSpeed: 40,
        create: function(e, ui){
          foodle_activate_event_handler_to_store_special_roles_scrolltop();
          foodle_activate_event_handler_to_set_special_roles_column_widths();
        },
        start: function(e, ui){
          ui.placeholder.css('visibility', 'visible');
          ui.placeholder.children().css({'background-color':'AliceBlue','background-image':'url("' + plugin_url + 'img/foodle.png")','background-repeat':'no-repeat','background-position':'center','opacity':'0'}).fadeTo(660,0.4);
          ui.placeholder.height(ui.item.outerHeight());
          foodle_width_allow_unset = false;
        },
        activate: function(e, ui){
          $('html').scrollTop(foodle_scroll_store);
        },
        stop: function(e, ui){
          foodle_unset_special_roles_column_widths();
          foodle_width_allow_unset = true;
        }
      });

      function check_no_voter_change(){
        $('.roles-users-sel').change(function(){
          if ( isNaN($(this).val()) )
            $(this).parents('.foodle-functions-row').find('.check-no-voter').prop('disabled',true);
          else
            $(this).parents('.foodle-functions-row').find('.check-no-voter').prop('disabled',false);
        });
      }
      check_no_voter_change();

      function foodle_add_functions_row(foodle_this) {
        foodle_functions_last_row = foodle_this.closest('tr').prop('outerHTML');

        idtitle = 'roles-users-sel-';
        idlength = idtitle.length; // characters
        posstart = foodle_functions_last_row.indexOf(idtitle);
        posend = foodle_functions_last_row.indexOf('"', posstart);
        old_val = foodle_functions_last_row.substring(posstart, posend);
        newcount = (foodle_functions_last_row.substring( posstart + idlength, posend)) * 1 + 1; // this value is valid for all further fields
        new_val = idtitle + newcount;
        foodle_functions_last_row = foodle_functions_last_row.replace(old_val, new_val);

        idtitle = 'capabilities';
        idlength = idtitle.length; // characters
        posstart = foodle_functions_last_row.indexOf(idtitle);
        posend = foodle_functions_last_row.indexOf('[', posstart);
        old_val = foodle_functions_last_row.substring(posstart, posend);
        const regex = new RegExp(old_val,'g'); // replace all occurrences
        new_val = idtitle + newcount;
        foodle_functions_last_row = foodle_functions_last_row.replace(regex, new_val); // all occurrences

        idtitle = 'check-mark-';
        idlength = idtitle.length; // characters
        posstart = foodle_functions_last_row.indexOf(idtitle);
        posend = foodle_functions_last_row.indexOf('"', posstart);
        old_val = foodle_functions_last_row.substring(posstart, posend);
        new_val = idtitle + newcount;
        foodle_functions_last_row = foodle_functions_last_row.replace(old_val, new_val);

        idtitle = 'check-view-';
        idlength = idtitle.length; // characters
        posstart = foodle_functions_last_row.indexOf(idtitle);
        posend = foodle_functions_last_row.indexOf('"', posstart);
        old_val = foodle_functions_last_row.substring(posstart, posend);
        new_val = idtitle + newcount; // newcount defined before
        foodle_functions_last_row = foodle_functions_last_row.replace(old_val, new_val);

        idtitle = 'no-voter-';
        idlength = idtitle.length; // characters
        posstart = foodle_functions_last_row.indexOf(idtitle);
        posend = foodle_functions_last_row.indexOf('"', posstart);
        old_val = foodle_functions_last_row.substring(posstart, posend);
        new_val = idtitle + newcount; // newcount defined before
        foodle_functions_last_row = foodle_functions_last_row.replace(old_val, new_val);

        idtitle = 'check-no-remind-';
        idlength = idtitle.length; // characters
        posstart = foodle_functions_last_row.indexOf(idtitle);
        posend = foodle_functions_last_row.indexOf('"', posstart);
        old_val = foodle_functions_last_row.substring(posstart, posend);
        new_val = idtitle + newcount; // newcount defined before
        foodle_functions_last_row = foodle_functions_last_row.replace(old_val, new_val);

        idtitle = 'add-foodle-sel-';
        idlength = idtitle.length; // characters
        posstart = foodle_functions_last_row.indexOf(idtitle);
        posend = foodle_functions_last_row.indexOf('"', posstart);
        old_val = foodle_functions_last_row.substring(posstart, posend);
        new_val = idtitle + newcount; // newcount defined before
        foodle_functions_last_row = foodle_functions_last_row.replace(old_val, new_val);

        idtitle = 'del-foodle-sel-';
        idlength = idtitle.length; // characters
        posstart = foodle_functions_last_row.indexOf(idtitle);
        posend = foodle_functions_last_row.indexOf('"', posstart);
        old_val = foodle_functions_last_row.substring(posstart, posend);
        new_val = idtitle + newcount; // newcount defined before
        foodle_functions_last_row = foodle_functions_last_row.replace(old_val, new_val);

        idtitle = 'foodle_functions_line[]" value="';
        idlength = idtitle.length; // characters
        posstart = foodle_functions_last_row.indexOf(idtitle);
        posend = foodle_functions_last_row.indexOf('"', posstart);
        old_val = foodle_functions_last_row.substring(posstart, posend);
        new_val = idtitle + newcount; // newcount defined before
        foodle_functions_last_row = foodle_functions_last_row.replace(old_val, new_val);

        $('.foodle-functions-row').last().after(foodle_functions_last_row);

        oldcount = newcount - 1;

        $('#roles-users-sel-' + newcount).children().children().prop('selected',false);
        $('#roles-users-sel-' + newcount).children().first().children().first().prop('selected',true);

        $('#check-mark-' + newcount).prop('checked',false);
        $('#check-view-' + newcount).prop('checked',false);
        $('#check-no-voter-' + newcount).prop('checked',false);
        $('#check-no-remind-' + newcount).prop('checked',false);

        $('#add-foodle-sel-' + oldcount).prop('disabled',true).css('cursor','not-allowed').css('opacity','0.1');
        $('#del-foodle-sel-' + newcount).prop('disabled',false).css('cursor','pointer').css('opacity','1.0');
        foodle_activate_tooltips(); // to catch the new row as well
        foodle_activate_event_handler_to_store_special_roles_scrolltop(); // to catch the new row as well
        foodle_activate_event_handler_to_set_special_roles_column_widths(); // to catch the new row as well

        check_no_voter_change();
      }



      function foodle_remove_functions_row(foodle_this) {
        foodle_this.closest('tr').remove();
        $('.foodle-functions-row').last().children().last().children().first().children().last().prop('disabled',false).css('opacity','1.0').css('cursor','pointer');
      }



      $(document).ready(function() {
        $(window).keydown(function(event) {
          if(event.keyCode == 13) {
            event.preventDefault();
            return false;
          }
        });
      });
    </script>
  <?php

  echo '<p>&nbsp;</p>';
  echo '<input type="submit" class="button-primary" name="save_special_roles_users" value="'.__('Save special users setting','foodle-for-democracy-poll').'..."'; if ( ! $foodle_no_safety_query ) echo ' onclick="return confirm(\''.__('Are you sure to save the special rights\nfor roles and users?','foodle-for-democracy-poll').'\');"'; echo '/></form></p>';
}



function foodle_edit_email() {
  global $foodle_no_safety_query;
  global $foodle_roles_email;

  if ( ( ! current_user_can('manage_options') ) && ( ! $foodle_roles_email ) ) {
    echo '<p style="font-size:1.5em;color:darkred;"><strong>'.__('This tab is for Foodle administrators only!','foodle-for-democracy-poll').'</strong></p>';
    return;
}

  if (!get_option('foodle_email_content') )
    echo '<div style="color:#500404;">('.__('The eMail content has not been set, yet. You will not be able to send reminder emails to late poll users!','foodle-for-democracy-poll').')</div><br />';
  else
    echo '<div style="color:#045004;">('.__('The eMail content is ready to use. You may initiate reminder emails to late poll users!','foodle-for-democracy-poll').')</div><br />';

  echo '<p><table><tr><th>'.__('eMail Content','foodle-for-democracy-poll').'</th></tr></table></p>';

  $settings = array(
    'wpautop' => false,
    'media_buttons' => true,
    'default_editor' => '',
    'drag_drop_upload' => true,
    'textarea_rows' => 30,
    'tabindex' => 5,
    'editor_css' => '',
    'editor_class' => 'foodle-email-editor',
    'teeny' => false,
    'tinymce' => true,
    'quicktags' => true
  );
  $foodle_email_content = '';
  if ( get_option('foodle_email_content') ) $foodle_email_content = html_entity_decode(get_option('foodle_email_content'));
  echo '<form name="foodle_email_editor" action="'.admin_url( 'admin.php?page=foodle-admin-page&tab=edit-email' ).'" method="post">';
  echo '<div style="width:90%;">';
  wp_editor($foodle_email_content, 'foodle_email_content', $settings);
  echo '</div>';
  echo '<br><strong>'.__('Available placeholders','foodle-for-democracy-poll').':</strong><br>
  '.__('Poll','foodle-for-democracy-poll').':&nbsp;&nbsp;{foodle-title}&nbsp;&nbsp;{poll-ID}&nbsp;&nbsp;{poll-title}&nbsp;&nbsp;{poll-start}&nbsp;&nbsp;{poll-end}&nbsp;&nbsp;{users-voted}&nbsp;&nbsp;{poll-url}&nbsp;&nbsp;{poll-link}<br>
  '.__('User','foodle-for-democracy-poll').':&nbsp;&nbsp;{user-login}&nbsp;&nbsp;{first-name}&nbsp;&nbsp;{last-name}&nbsp;&nbsp;{display-name}&nbsp;&nbsp;{nickname}&nbsp;&nbsp;{user-nicename}<br>
  '.__('Admin','foodle-for-democracy-poll').':&nbsp;&nbsp;{firstname-trigger}&nbsp;&nbsp;{lastname-trigger}&nbsp;&nbsp;{password-forgot-url}&nbsp;&nbsp;{password-forgot-link}';
  echo '<p>&nbsp;</p>';
  echo '<input type="submit" class="button-primary" value="'.__('Update email content...','foodle-for-democracy-poll').'"'; if ( ! $foodle_no_safety_query ) echo ' onclick="return confirm(\''.__('Are you sure to save the email content?','foodle-for-democracy-poll').'\');"'; echo '/></form></p>';
}



function foodle_settings() {
  global $wp_roles;
  global $foodle_title;
  global $foodle_admin_menu_color;
  global $foodle_help_tooltips;
  global $foodle_frontend_tooltips;
  global $foodle_warnings_removed;
  global $foodle_no_safety_query;
  global $foodle_results_text_default;
  global $foodle_results_text;
  global $foodle_bar_graph_text_default;
  global $foodle_bar_graph_text;
  global $foodle_roles_metafields;
  global $foodle_roles_sorting;
  global $foodle_roles_sproles;
  global $foodle_roles_email;
  global $foodle_roles_usage;
  global $foodle_roles_settings;
  global $foodle_roles_tips;
  global $foodle_roles_deleteun;
  global $foodle_email_link_admins;
  global $foodle_email_link_non_admins;
  global $foodle_show_vote_date_admins;
  global $foodle_show_vote_time_admins;
  global $foodle_show_vote_date_specview;
  global $foodle_show_vote_time_specview;
  global $foodle_scroll_up_button_visible;

  if ( ( ! current_user_can('manage_options') ) && ( ! $foodle_roles_settings ) ) {
    echo '<p style="font-size:1.5em;color:darkred;"><strong>'.__('This tab is for Foodle administrators only!','foodle-for-democracy-poll').'</strong></p>';
    return;
  }

  $help_settings_foodle_title = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('The \'Foodle Title\' will be used and displayed throughout this plugin<br>in several places including the user profile area.<br><span style=\'color:DarkGoldenrod;\'>This settings line will remain an administrator privilege!</span>','foodle-for-democracy-poll').'" ' : '';
  $help_settings_results_text = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('Define the text to be displayed above the Foodle table.<br>Three dashes (\'---\') means: no headline.','foodle-for-democracy-poll').'" ' : '';
  $help_settings_bar_graph_text = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('Define the text to be displayed inside the bar graph.<br>Three dashes (\'---\') means: no text.','foodle-for-democracy-poll').'" ' : '';
  $help_settings_show_email_links = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('When checked, voters\' names will contain a mailto link to their email<br>address, visible for administrators and/or non-administrators.<br><span style=\'color:DarkGoldenrod;\'>This settings line will remain an administrator privilege!</span>','foodle-for-democracy-poll').'" ' : '';
  $help_settings_show_vote_date_time = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('When checked, the date and time of each vote will be diplayed for admins<br>and/or special viewers (see tab \'Special Roles & Users\'), even when the<br>poll\'s date display is switched off.<br><span style=\'color:DarkGoldenrod;\'>This settings line will remain an administrator privilege!</span>','foodle-for-democracy-poll').'" ' : '';
  $help_settings_admin_menu_color = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('In order to identify this plugin and Democracy Poll easier in the admin menu<br> and/or admin toolbar, you may chose any convenient highlighting color.<br>An invalid color name/value will retain the original color setting.<br>Default: #8CBD5A.','foodle-for-democracy-poll').'" ' : '';
  $help_settings_page_post_exclusion = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('With this comma-separated list of IDs, you may determine all pages and/or posts where<br>the Foodle table\'s interactive AJAX shall be switched off. This could become necessary<br>to avoid conflicts, e.g. when more than one Foodle shortcode is present.<br>(Content is being validated during input)<br><span style=\'color:DarkGoldenrod;\'>This settings line will remain an administrator privilege!</span>','foodle-for-democracy-poll').'" ' : '';
  $help_settings_date_format = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('Define the date format to be used for the metafield input type \'foodle-date\'.<br>The jQuery datepicker documentation should be consulted for details.','foodle-for-democracy-poll').'" ' : '';
  $help_settings_roles = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('Define the additional roles which will have the capability to manage Foodle<br>(allowed functions can be tailored).<br><span style=\'color:DarkGoldenrod;\'>This settings line will remain an administrator privilege!</span><br>Democracy also provides roles delegation in the Democracy settings.','foodle-for-democracy-poll').'<br>'.__('Remark','foodle-for-democracy-poll').': \''._x("Subscriber",'User role').'\' '.__('is not included for safety reasons.','foodle-for-democracy-poll').'" ' : '';
  $help_settings_roles_allowance = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('Define the accessible Foodle functions for such roles carefully.<br><span style=\'color:DarkGoldenrod;\'>This settings line will remain an administrator privilege!</span>','foodle-for-democracy-poll').'" ' : '';
  $help_democracy_textarea_template = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('Can be used to define a default content, e.g. inserting certain Foodle shortcodes.<br>The content can be copied into each Democracy poll\'s textarea during poll edit<br>by the click of a button.<br><span style=\'color:DarkGoldenrod;\'>This settings line will remain an administrator privilege!','foodle-for-democracy-poll').'" ' : '';
  $help_settings_show_in_admin_bar = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('When checked, the Foodle menu will be shown in the admin menu toolbar.','foodle-for-democracy-poll').'" ' : '';
  $help_settings_vote_expiry = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('When checked, a regular task will update the poll logs database to avoid vote expiry.<br>If not, Democracy Poll will not use any votes older than one year for re-voting.<br>In such case, the user can vote again in polls still active and his former vote<br>will remain visible in additon.<br><span style=\'color:DarkGoldenrod;\'>This settings line will remain an administrator privilege!</span>','foodle-for-democracy-poll').'" ' : '';
  $help_settings_show_extra_metafields = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('When checked, the Foodle metafields will be accessible in the user profile.<br>If not, the administrator will still see them, marked by a red dashed border.<br>There\'s as well a shortcode to access them in the front end.','foodle-for-democracy-poll').'" ' : '';
  $help_settings_enable_help = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('When checked, Help-Tooltips (like this one) will be activated.','foodle-for-democracy-poll').'" ' : '';
  $help_settings_disable_warnings = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('When checked, warning tooltips will be disabled.','foodle-for-democracy-poll').'" ' : '';
  $help_settings_no_safety_query = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('When checked, the safety query to avoid inadvertent saving<br>will be disabled in the Foodle admin tabs.<br>This will not affect the button to clean-up the meta fields or<br>to delete the orphaned metafield entries.','foodle-for-democracy-poll').'" ' : '';
  $help_settings_enable_frontend_tooltips = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('When checked, Tooltips (like this one) will be activated in the Foodle frontend.<br>This does not influence the administrator\'s individual use<br>of the tooltip function provided by Foodle.','foodle-for-democracy-poll').'" ' : '';
  $help_settings_scroll_up_button = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('Select the locations where to display the Foodle scroll up button.<br>You can thus also avoid conflicts with the theme or other plugins.<br><span style=\'color:DarkGoldenrod;\'>This settings line will remain an administrator privilege!</span>','foodle-for-democracy-poll').'" ' : '';

  $foodle_democracy_textarea_template = ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle-democracy-textarea-template']) ) ) ? get_option('foodle_settings')['foodle-democracy-textarea-template'] : "";
  $foodle_democracy_textarea_template = str_replace("\'","'",str_replace('\"','"',$foodle_democracy_textarea_template));

  $foodle_vote_expiry_checked = '';
  if ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['remove-vote-expiry']) ) ) {
    $foodle_vote_expiry_checked = ( get_option('foodle_settings')['remove-vote-expiry'] ) ? 'checked="checked"' : '';
  }

  $foodle_page_post_exclusion = '';
  if ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle_page_post_exclusion']) ) )
    if ( get_option('foodle_settings')['foodle_page_post_exclusion'] != '' ) $foodle_page_post_exclusion = implode(',', get_option('foodle_settings')['foodle_page_post_exclusion']);

  $foodle_date_format = 'mm/dd/yy';
  if ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle_date_format']) ) )
    $foodle_date_format = get_option('foodle_settings')['foodle_date_format'];

  $foodle_timestamp = ( wp_next_scheduled( 'foodle_cron_hook' ) ) ?  date_i18n('j. F Y', wp_next_scheduled( 'foodle_cron_hook' )) : __('Not scheduled','foodle-for-democracy-poll');

  $foodle_selected_roles = array();
  if ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle_selected_roles']) ) )
    $foodle_selected_roles = get_option('foodle_settings')['foodle_selected_roles'];

  $foodle_show_in_admin_menu_bar = false;
  if ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['show-in-admin-menu-bar']) ) )
    $foodle_show_in_admin_menu_bar = get_option('foodle_settings')['show-in-admin-menu-bar'];
  $foodle_show_in_admin_menu_bar_checked = ( $foodle_show_in_admin_menu_bar ) ? 'checked="checked"' : '';

  $foodle_metafields_user_profile = true;
  if ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['metafields-user-profile']) ) )
    $foodle_metafields_user_profile = get_option('foodle_settings')['metafields-user-profile'];
  $foodle_metafields_user_profile_checked = ( $foodle_metafields_user_profile ) ? 'checked="checked"' : '';

  $foodle_help_tooltips_checked = ( $foodle_help_tooltips ) ? 'checked="checked"' : '';
  $foodle_frontend_tooltips_checked = ( $foodle_frontend_tooltips ) ? 'checked="checked"' : '';
  $foodle_warnings_removed_checked = ( $foodle_warnings_removed ) ? 'checked="checked"' : '';
  $foodle_no_safety_query_checked = ( $foodle_no_safety_query ) ? 'checked="checked"' : '';

  $foodle_roles_metafields_checked = ( $foodle_roles_metafields ) ? 'checked="checked"' : '';
  $foodle_roles_sorting_checked = ( $foodle_roles_sorting ) ? 'checked="checked"' : '';
  $foodle_roles_sproles_checked = ( $foodle_roles_sproles ) ? 'checked="checked"' : '';
  $foodle_roles_email_checked = ( $foodle_roles_email ) ? 'checked="checked"' : '';
  $foodle_roles_usage_checked = ( $foodle_roles_usage ) ? 'checked="checked"' : '';
  $foodle_roles_settings_checked = ( $foodle_roles_settings ) ? 'checked="checked"' : '';
  $foodle_roles_tips_checked = ( $foodle_roles_tips ) ? 'checked="checked"' : '';
  $foodle_roles_deleteun_checked = ( $foodle_roles_deleteun ) ? 'checked="checked"' : '';
  $foodle_email_link_admins_checked = ( $foodle_email_link_admins ) ? 'checked="checked"' : '';
  $foodle_email_link_non_admins_checked = ( $foodle_email_link_non_admins ) ? 'checked="checked"' : '';
  $foodle_show_vote_date_admins_checked = ( $foodle_show_vote_date_admins ) ? 'checked="checked"' : '';
  $foodle_show_vote_time_admins_checked = ( $foodle_show_vote_time_admins ) ? 'checked="checked"' : '';
  $foodle_show_vote_date_specview_checked = ( $foodle_show_vote_date_specview ) ? 'checked="checked"' : '';
  $foodle_show_vote_time_specview_checked = ( $foodle_show_vote_time_specview ) ? 'checked="checked"' : '';

  $foodle_scroll_up_button_frontend_visible_checked = ( $foodle_scroll_up_button_visible['frontend'] ) ? 'checked="checked"' : '';
  $foodle_scroll_up_button_democracy_visible_checked = ( $foodle_scroll_up_button_visible['democracy'] ) ? 'checked="checked"' : '';
  $foodle_scroll_up_button_foodle_visible_checked = ( $foodle_scroll_up_button_visible['foodle'] ) ? 'checked="checked"' : '';
  $foodle_scroll_up_button_comments_visible_checked = ( $foodle_scroll_up_button_visible['comments'] ) ? 'checked="checked"' : '';
  $foodle_scroll_up_button_bar_graph_visible_checked = ( $foodle_scroll_up_button_visible['bar_graph'] ) ? 'checked="checked"' : '';
  $foodle_scroll_up_button_backend_visible_checked = ( $foodle_scroll_up_button_visible['backend'] ) ? 'checked="checked"' : '';
  $foodle_scroll_up_button_democracy_admin_visible_checked = ( $foodle_scroll_up_button_visible['democracy_admin'] ) ? 'checked="checked"' : '';
  $foodle_scroll_up_button_foodle_admin_visible_checked = ( $foodle_scroll_up_button_visible['foodle_admin'] ) ? 'checked="checked"' : '';
  
  $foodle_row_hidden = ( current_user_can('manage_options') ) ? "" : ' hidden ';

    echo '<p><form action="'.admin_url( 'admin.php?page=foodle-admin-page&tab=foodle-settings' ).'" method="post">';
  ?>
    <figure class="foodle-block-table">
      <table class="foodle-settings-table">
        <thead>
          <tr class="foodle-header-row">
            <th style="padding:0px 10px; text-align:center;"><br><?php echo __('Subject','foodle-for-democracy-poll') ?><br><br></th>
            <th colspan="3" style="padding:0px 10px; text-align:center;"><br><?php echo __('Setting','foodle-for-democracy-poll') ?><br><br></th>
          </tr>
        </thead>
        <tbody>
          <tr <?php echo $foodle_row_hidden ?> <?php echo $help_settings_foodle_title ?>class="foodle-standard-row">
            <td style="padding:10px 10px;">
              <span style="font-weight:bold;">
              <?php echo __('Foodle Title','foodle-for-democracy-poll').':' ?>
              </span><br><?php echo __('This title is used throughout the plugin incl. the profile pages.','foodle-for-democracy-poll') ?>
            </td>
            <td colspan="3" class="foodle-settings-row-hidden" style="padding:10px 10px; background-image:url('<?php echo plugin_dir_url( __FILE__ ); ?>img/lock-open-red-22x30.png');">
                <input type="text" style="font-size:0.95em;" id="foodle-title" name="foodle_title" value="<?php echo $foodle_title; ?>" placeholder="Foodle"/>
            </td>
          </tr>
          <tr <?php echo $help_settings_results_text ?>class="foodle-standard-row">
            <td style="padding:10px 10px;">
              <span style="font-weight:bold;">
              <?php echo __('Foodle Table Headline','foodle-for-democracy-poll').':' ?>
              </span><br><?php echo __('This text will be displayed above the Foodle table, \'---\' = no headline.','foodle-for-democracy-poll') ?>
            </td>
            <td colspan="3" style="padding:10px 10px;">
                <input type="text" style="font-size:0.95em;" id="foodle-results-text" name="foodle_results_text" value="<?php echo $foodle_results_text; ?>" size="50" placeholder="<? echo $foodle_results_text_default ?>"/>
            </td>
          </tr>
          <tr <?php echo $help_settings_bar_graph_text ?>class="foodle-standard-row">
            <td style="padding:10px 10px;">
              <span style="font-weight:bold;">
              <?php echo __('Bar Graph Text','foodle-for-democracy-poll').':' ?>
              </span><br><?php echo __('This text will be displayed in each bar graph, \'---\' = no text.','foodle-for-democracy-poll') ?>
            </td>
            <td colspan="3" style="padding:10px 10px;">
                <input type="text" style="font-size:0.95em;" id="foodle-bar-graph-text" name="foodle_bar_graph_text" value="<?php echo $foodle_bar_graph_text; ?>" size="50" placeholder="<? echo $foodle_bar_graph_text_default ?>"/>
            </td>
          </tr>
          <tr <?php echo $foodle_row_hidden ?> <?php echo $help_settings_show_email_links ?>class="foodle-standard-row">
            <td style="padding:10px 10px;">
              <span style="font-weight:bold;">
              <?php echo __('Add a mailto link to the voters\' names in the Foodle table','foodle-for-democracy-poll').':' ?>
              </span>
            </td>
            <td class="foodle-settings-row-hidden" colspan="3" style="padding:10px 10px; background-image:url('<?php echo plugin_dir_url( __FILE__ ); ?>img/lock-open-red-22x30.png');">
                <label><input type="checkbox" style="font-size:0.95em;" id="voter-email-link-for-admins" name="voter-email-link-for-admins" <?php echo $foodle_email_link_admins_checked; ?> /> <?php echo __('Link visible for admins','foodle-for-democracy-poll') ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                <label><input type="checkbox" style="font-size:0.95em;" id="voter-email-link-for-non-admins" name="voter-email-link-for-non-admins" <?php echo $foodle_email_link_non_admins_checked; ?> /> <?php echo __('Link visible for non-admins','foodle-for-democracy-poll') ?></label>
            </td>
          </tr>
          <tr <?php echo $foodle_row_hidden ?> <?php echo $help_settings_show_vote_date_time ?>class="foodle-standard-row">
            <td style="padding:10px 10px;">
              <span style="font-weight:bold;">
              <?php echo __('Show any vote date and vote time to administrators and special viewers anyway','foodle-for-democracy-poll').':' ?>
              </span><br><?php echo __('Special viewers can be selected in the tab \'Special Roles & Users\'. Time will only display if the date is being displayed!','foodle-for-democracy-poll') ?>
            </td>
            <td class="foodle-settings-row-hidden" colspan="3" style="padding:10px 10px; background-image:url('<?php echo plugin_dir_url( __FILE__ ); ?>img/lock-open-red-22x30.png');">
                <label><input type="checkbox" style="font-size:0.95em;" id="vote-date-for-admins" name="vote-date-for-admins" <?php echo $foodle_show_vote_date_admins_checked; ?> /> <?php echo __('Vote date for administrators','foodle-for-democracy-poll') ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                <label><input type="checkbox" style="font-size:0.95em;" id="vote-time-for-admins" name="vote-time-for-admins" <?php echo $foodle_show_vote_time_admins_checked; ?> /> <?php echo __('Vote time for administrators','foodle-for-democracy-poll') ?></label><br>
                <label><input type="checkbox" style="font-size:0.95em;" id="vote-date-for-specview" name="vote-date-for-specview" <?php echo $foodle_show_vote_date_specview_checked; ?> /> <?php echo __('Vote date for special viewers','foodle-for-democracy-poll') ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                <label><input type="checkbox" style="font-size:0.95em;" id="vote-time-for-specview" name="vote-time-for-specview" <?php echo $foodle_show_vote_time_specview_checked; ?> /> <?php echo __('Vote time for special viewers','foodle-for-democracy-poll') ?></label>
            </td>
          </tr>
          <tr <?php echo $help_settings_admin_menu_color ?>class="foodle-standard-row">
            <td style="padding:10px 10px;">
              <span style="font-weight:bold;">
              <?php echo __('Democracy Poll & Foodle Admin Menu Colors','foodle-for-democracy-poll').':' ?>
              </span><br><?php echo __('Just meant as a smooth highlighting of these two plugin links.','foodle-for-democracy-poll') ?>
            </td>
            <td colspan="3" style="padding:10px 10px;">
                <input type="text" id="foodle-admin-color-select" style="font-size:0.95em;" id="foodle-admin-menu-color" name="foodle_admin_menu_color" value="<?php echo $foodle_admin_menu_color; ?>" placeholder="#8CBD5A" onkeyup="foodle_check_hex_color(this);"/><input type="text" id="foodle-admin-color-view" disabled="disabled" style="width:30px;border:0px; background-color:<?php echo $foodle_admin_menu_color; ?>;"/>
            </td>
          </tr>
          <tr <?php echo $foodle_row_hidden ?> <?php echo $help_settings_page_post_exclusion ?>class="foodle-standard-row">
            <td style="padding:10px 10px;">
              <span style="font-weight:bold;">
              <?php echo __('Page and Post IDs with Foodle\'s interactive AJAX switched off','foodle-for-democracy-poll').':' ?>
              </span><br><?php echo __('May be necessary to avoid conflicts in certain cases.','foodle-for-democracy-poll') ?>
            </td>
            <td class="foodle-settings-row-hidden" colspan="3" style="padding:10px 10px; background-image:url('<?php echo plugin_dir_url( __FILE__ ); ?>img/lock-open-red-22x30.png');">
                <input type="text" style="font-size:0.95em;" id="foodle-page-post-exclusion" name="foodle_page_post_exclusion" value="<?php echo $foodle_page_post_exclusion; ?>" size="50" placeholder="<?php echo __('Comma-separated list','foodle-for-democracy-poll') ?>" onkeyup="foodle_check_post_list(this);"/>
            </td>
          </tr>
          <tr <?php echo $help_settings_date_format ?>class="foodle-standard-row">
            <td style="padding:10px 10px;">
              <span style="font-weight:bold;">
              <?php echo __('The datepicker format to be used for input type \'foodle-date\'','foodle-for-democracy-poll').':' ?>
              </span><br><?php echo __('To make sure that date inputs are formatted - see <a href=\'https://api.jqueryui.com/datepicker/#utility-formatDate\'>jQuery datepicker API</a>.','foodle-for-democracy-poll') ?>
            </td>
            <td colspan="3" style="padding:10px 10px;">
                <input type="text" style="font-size:0.95em;" id="foodle-date-format" name="foodle_date_format" value="<?php echo $foodle_date_format; ?>" size="50" placeholder="<?php echo __('Date format acc. jQuery datepicker API','foodle-for-democracy-poll') ?>"/>
            </td>
          </tr>
          <tr <?php echo $foodle_row_hidden ?> class="foodle-standard-row">
            <td <?php echo $help_settings_roles ?>style="padding:10px 10px;">
              <span style="font-weight:bold;">
              <?php echo __('The roles, besides \'Administrator\', which will have access to manage Foodle','foodle-for-democracy-poll').':' ?>
              </span><br><?php echo __('Asigns the capability \'manage_foodle\' to the selected roles and tailors their functional allowances.','foodle-for-democracy-poll') ?>
            </td>
            <td <?php echo $help_settings_roles ?>style="padding:10px 10px;">
            <select class="foodle-roles-select" style="font-size:0.85em;" id="foodle-selected-roles" name="foodle_selected_roles[]" size="6" multiple>
          <?php foreach ( $wp_roles->role_names as $foodle_wp_role_slug=>$foodle_wp_role_name ) {
                  if ( ( $foodle_wp_role_slug == 'administrator' ) || ( $foodle_wp_role_slug == 'subscriber' ) ) continue;
                  $foodle_role_selected = ( in_array($foodle_wp_role_slug,$foodle_selected_roles) ) ? 'selected="selected"' : ''; ?>
            <option value="<?php echo $foodle_wp_role_slug.'" '.$foodle_role_selected ?>><?php _ex($foodle_wp_role_name,'User role') ?></option>
          <?php } ?>
            </select>
            </td>
            <td <?php echo $help_settings_roles_allowance ?>style="padding:10px 5px 10px 10px;">
            <label style="float:left; white-space:nowrap;"><input type="checkbox" style="font-size:0.95em;" id="foodle-roles-metafields" name="foodle-roles-metafields" <?php echo $foodle_roles_metafields_checked; ?> /><?php echo __('Metafield definiton','foodle-for-democracy-poll') ?></label><br>
            <label style="float:left; white-space:nowrap;"><input type="checkbox" style="font-size:0.95em;" id="foodle-roles-sproles" name="foodle-roles-sproles" <?php echo $foodle_roles_sproles_checked; ?> /><?php echo __('Special roles/users','foodle-for-democracy-poll') ?></label><br>
            <label style="float:left; white-space:nowrap;"><input type="checkbox" style="font-size:0.95em;" id="foodle-roles-settings" name="foodle-roles-settings" <?php echo $foodle_roles_settings_checked; ?> /><?php echo __('Foodle Settings','foodle-for-democracy-poll') ?></label><br>
            <label style="float:left; white-space:nowrap;"><input type="checkbox" style="font-size:0.95em;" id="foodle-roles-deleteun" name="foodle-roles-deleteun" <?php echo $foodle_roles_deleteun_checked; ?> /><?php echo __('Delete unused data','foodle-for-democracy-poll') ?></label>
            </td>
            <td class="foodle-settings-row-hidden" <?php echo $help_settings_roles_allowance ?>style="padding:10px 10px 10px 5px; background-image:url('<?php echo plugin_dir_url( __FILE__ ); ?>img/lock-open-red-22x30.png');">
            <label style="float:right; white-space:nowrap;"><?php echo __('Defaults & sorting','foodle-for-democracy-poll') ?> <input type="checkbox" style="font-size:0.95em;" id="foodle-roles-sorting" name="foodle-roles-sorting" <?php echo $foodle_roles_sorting_checked; ?> /></label><br>
            <label style="float:right; white-space:nowrap;"><?php echo __('Email Definition','foodle-for-democracy-poll') ?> <input type="checkbox" style="font-size:0.95em;" id="foodle-roles-email" name="foodle-roles-email" <?php echo $foodle_roles_email_checked; ?> /></label><br>
            <label style="float:right; white-space:nowrap;"><?php echo __('Shortcode Use','foodle-for-democracy-poll') ?> <input type="checkbox" style="font-size:0.95em;" id="foodle-roles-usage" name="foodle-roles-usage" <?php echo $foodle_roles_usage_checked; ?> /></label><br>
            <label style="float:right; white-space:nowrap;"><?php echo __('Widespread Tips','foodle-for-democracy-poll') ?> <input type="checkbox" style="font-size:0.95em;" id="foodle-roles-tips" name="foodle-roles-tips" <?php echo $foodle_roles_tips_checked; ?> /></label>
            </td>
          </tr>
          <tr <?php echo $foodle_row_hidden ?> <?php echo $help_democracy_textarea_template ?>class="foodle-standard-row">
            <td style="padding:10px 10px;">
              <span style="font-weight:bold;">
              <?php echo __('Pre-defined user template for use in Democracy\'s textarea of each poll','foodle-for-democracy-poll').':' ?>
              </span><br><?php echo __('Can be inserted during poll edit by the click of a button.','foodle-for-democracy-poll') ?>
            </td>
            <td class="foodle-settings-row-hidden" colspan="3" style="padding:10px 10px; background-image:url('<?php echo plugin_dir_url( __FILE__ ); ?>img/lock-open-red-22x30.png');">
                <textarea type="text" style="font-size:0.95em;" id="foodle-democracy-textarea-template" name="foodle_democracy_textarea_template" rows="8" cols="50" placeholder="<?php echo __('Democracy textarea template','foodle-for-democracy-poll') ?>" ><?php echo $foodle_democracy_textarea_template; ?></textarea>
            </td>
          </tr>
          <tr <?php echo $help_settings_show_in_admin_bar ?>class="foodle-standard-row">
            <td style="padding:10px 10px;">
              <span style="font-weight:bold;">
              <?php echo __('Show the Foodle menu in the admin menu toolbar','foodle-for-democracy-poll').':' ?>
              </span>
            </td>
            <td colspan="3" style="padding:10px 10px;">
                <label><input type="checkbox" style="font-size:0.95em;" id="show-in-admin-menu-bar" name="show-in-admin-menu-bar" <?php echo $foodle_show_in_admin_menu_bar_checked; ?>  /> <?php echo __('Show in admin menu toolbar','foodle-for-democracy-poll') ?></label>
            </td>
          </tr>
          <tr <?php echo $foodle_row_hidden ?> <?php echo $help_settings_vote_expiry ?>class="foodle-standard-row">
            <td style="padding:10px 10px;">
              <span style="font-weight:bold;">
              <?php echo __('Remove Democracy Poll votes\' expiring regularly','foodle-for-democracy-poll').':' ?>
              </span><br><?php echo __('Typically one year from each individual vote.','foodle-for-democracy-poll') ?>
            </td>
            <td class="foodle-settings-row-hidden" colspan="3" style="padding:10px 10px; background-image:url('<?php echo plugin_dir_url( __FILE__ ); ?>img/lock-open-red-22x30.png');">
                <label><input type="checkbox" style="font-size:0.95em;" id="remove-vote-expiry" name="remove-vote-expiry" <?php echo $foodle_vote_expiry_checked; ?>  /> <?php echo str_replace(' ', '&nbsp;', __('Next check','foodle-for-democracy-poll').': '.$foodle_timestamp) ?></label>
            </td>
          </tr>
          <tr <?php echo $help_settings_show_extra_metafields ?>class="foodle-standard-row">
            <td style="padding:10px 10px;">
              <span style="font-weight:bold;">
              <?php echo __('Make the Foodle metafields acccessible in the user profile','foodle-for-democracy-poll').':' ?>
              </span>
            </td>
            <td colspan="3" style="padding:10px 10px;">
                <label><input type="checkbox" style="font-size:0.95em;" id="metafields-user-profile" name="metafields-user-profile" <?php echo $foodle_metafields_user_profile_checked; ?>  /> <?php echo __('Show Foodle metafields in user profile','foodle-for-democracy-poll') ?></label>
            </td>
          </tr>
          <tr <?php echo $help_settings_enable_help ?>class="foodle-standard-row">
            <td style="padding:10px 10px;">
              <span style="font-weight:bold;">
              <?php echo __('Switch on help tooltips','foodle-for-democracy-poll').':' ?>
              </span>
            </td>
            <td colspan="3" style="padding:10px 10px;">
                <label><input type="checkbox" style="font-size:0.95em;" id="help-tooltips" name="help-tooltips" <?php echo $foodle_help_tooltips_checked; ?>  /> <?php echo __('Help tooltips','foodle-for-democracy-poll') ?></label>
            </td>
          </tr>
          <tr <?php echo $help_settings_disable_warnings ?>class="foodle-standard-row">
            <td style="padding:10px 10px;">
              <span style="font-weight:bold;">
              <?php echo __('Don\'t display the warnings any more','foodle-for-democracy-poll').':' ?>
              </span>
            </td>
            <td colspan="3" style="padding:10px 10px;">
                <label><input type="checkbox" style="font-size:0.95em;" id="remove-warnings" name="remove-warnings" <?php echo $foodle_warnings_removed_checked; ?>  /> <?php echo __('No warnings','foodle-for-democracy-poll') ?></label>
            </td>
          </tr>
          <tr <?php echo $help_settings_no_safety_query ?>class="foodle-standard-row">
            <td style="padding:10px 10px;">
              <span style="font-weight:bold;">
              <?php echo __('Don\'t display a safety query before saving','foodle-for-democracy-poll').':' ?>
              </span><br><?php echo __('Except for clean-up or deletion of metafield entries.','foodle-for-democracy-poll') ?>
            </td>
            <td colspan="3" style="padding:10px 10px;">
                <label><input type="checkbox" style="font-size:0.95em;" id="no-safety-query" name="no-safety-query" <?php echo $foodle_no_safety_query_checked; ?>  /> <?php echo __('No safety query','foodle-for-democracy-poll') ?></label>
            </td>
          </tr>
          <tr <?php echo $help_settings_enable_frontend_tooltips ?>class="foodle-standard-row">
            <td style="padding:10px 10px;">
              <span style="font-weight:bold;">
              <?php echo __('Switch on Foodle front end tooltips','foodle-for-democracy-poll').':' ?>
              </span>
            </td>
            <td colspan="3" style="padding:10px 10px;">
                <label><input type="checkbox" style="font-size:0.95em;" id="frontend-tooltips" name="frontend-tooltips" <?php echo $foodle_frontend_tooltips_checked; ?>  /> <?php echo __('Foodle front end tooltips','foodle-for-democracy-poll') ?></label>
            </td>
          </tr>
          <tr <?php echo $foodle_row_hidden ?> <?php echo $help_settings_scroll_up_button ?>class="foodle-standard-row">
            <td style="padding:10px 10px;">
              <span style="font-weight:bold;">
              <?php echo __('Locations where the Foodle scroll up button shall be active','foodle-for-democracy-poll').':' ?>
              </span><br><?php echo __('Can be tailored as per your needs and also in order to avoid any conflict. Selecting back end or front end includes the respective subsections!','foodle-for-democracy-poll') ?>
            </td>
            <td class="foodle-settings-row-hidden" colspan="3" style="padding:10px 10px; background-image:url('<?php echo plugin_dir_url( __FILE__ ); ?>img/lock-open-red-22x30.png');">
              <table style="border-collapse:collapse;border:none;margin:0px;padding:0px;"><tbody>
                <tr><td><label><input type="checkbox" style="font-size:0.95em;" id="scroll-up-visible-frontend" name="scroll-up-visible-frontend" <?php echo $foodle_scroll_up_button_frontend_visible_checked; ?> /> <?php echo __('Complete front end','foodle-for-democracy-poll') ?></label></td>
                <td style="padding-left:60px"><label><input type="checkbox" style="font-size:0.95em;" id="scroll-up-visible-backend" name="scroll-up-visible-backend" <?php echo $foodle_scroll_up_button_backend_visible_checked; ?> /> <?php echo __('Complete back end','foodle-for-democracy-poll') ?></label></td></tr>
                <tr><td><label><input type="checkbox" style="font-size:0.95em;" id="scroll-up-visible-democracy" name="scroll-up-visible-democracy" <?php echo $foodle_scroll_up_button_democracy_visible_checked; ?> /> <?php echo __('Democracy','foodle-for-democracy-poll') ?></label></td>
                <td style="padding-left:60px"><label><input type="checkbox" style="font-size:0.95em;" id="scroll-up-visible-democracy-admin" name="scroll-up-visible-democracy-admin" <?php echo $foodle_scroll_up_button_democracy_admin_visible_checked; ?> /> <?php echo __('Democracy admin','foodle-for-democracy-poll') ?></label></td></tr>
                <tr><td><label><input type="checkbox" style="font-size:0.95em;" id="scroll-up-visible-foodle" name="scroll-up-visible-foodle" <?php echo $foodle_scroll_up_button_foodle_visible_checked; ?> /> <?php echo __('Foodle','foodle-for-democracy-poll') ?></label></td>
                <td style="padding-left:60px"><label><input type="checkbox" style="font-size:0.95em;" id="scroll-up-visible-foodle-admin" name="scroll-up-visible-foodle-admin" <?php echo $foodle_scroll_up_button_foodle_admin_visible_checked; ?> /> <?php echo __('Foodle admin','foodle-for-democracy-poll') ?></label></td></tr>
                <tr><td><label><input type="checkbox" style="font-size:0.95em;" id="scroll-up-visible-comments" name="scroll-up-visible-comments" <?php echo $foodle_scroll_up_button_comments_visible_checked; ?> /> <?php echo __('Comments','foodle-for-democracy-poll') ?></label></td><td style="padding-left:60px"></td></tr>
                <tr><td><label><input type="checkbox" style="font-size:0.95em;" id="scroll-up-visible-bar-graph" name="scroll-up-visible-bar-graph" <?php echo $foodle_scroll_up_button_bar_graph_visible_checked; ?> /> <?php echo __('Bar graph','foodle-for-democracy-poll') ?></label></td><td style="padding-left:60px"></td></tr>
              </tbody></table>
            </td>
          </tr>
        </tbody>
      </table>
    </figure>

   <script type="text/javascript">
      var $ = jQuery;

      $(document).ready(() => {
        // Vote date visibility
        if ( ! $('#vote-date-for-admins').prop('checked') ) $('#vote-time-for-admins').prop('disabled',true);
        if ( ! $('#vote-date-for-specview').prop('checked') ) $('#vote-time-for-specview').prop('disabled',true);
        $($('#vote-date-for-admins')).change(function(){
          if ( $(this).prop('checked') )
            $('#vote-time-for-admins').prop('disabled',false);
          else
            $('#vote-time-for-admins').prop('disabled',true);
        });
        $($('#vote-date-for-specview')).change(function(){
          if ( $(this).prop('checked') )
            $('#vote-time-for-specview').prop('disabled',false);
          else
            $('#vote-time-for-specview').prop('disabled',true);
        });
        // Scroll up button visibility
        if ( $('#scroll-up-visible-frontend').prop('checked') ) {
          $('#scroll-up-visible-democracy').prop('disabled',true);
          $('#scroll-up-visible-foodle').prop('disabled',true);
          $('#scroll-up-visible-comments').prop('disabled',true);
          $('#scroll-up-visible-bar-graph').prop('disabled',true);
        }
        if ( $('#scroll-up-visible-backend').prop('checked') ) {
          $('#scroll-up-visible-democracy-admin').prop('disabled',true);
          $('#scroll-up-visible-foodle-admin').prop('disabled',true);
        }
        $($('#scroll-up-visible-frontend')).change(function(){
          if ( $(this).prop('checked') ) {
            $('#scroll-up-visible-democracy').prop('disabled',true);
            $('#scroll-up-visible-foodle').prop('disabled',true);
            $('#scroll-up-visible-comments').prop('disabled',true);
            $('#scroll-up-visible-bar-graph').prop('disabled',true);
          } else {
            $('#scroll-up-visible-democracy').prop('disabled',false);
            $('#scroll-up-visible-foodle').prop('disabled',false);
            $('#scroll-up-visible-comments').prop('disabled',false);
            $('#scroll-up-visible-bar-graph').prop('disabled',false);
          }
        });
        $($('#scroll-up-visible-backend')).change(function(){
          if ( $(this).prop('checked') ) {
            $('#scroll-up-visible-democracy-admin').prop('disabled',true);
            $('#scroll-up-visible-foodle-admin').prop('disabled',true);
          } else {
            $('#scroll-up-visible-democracy-admin').prop('disabled',false);
            $('#scroll-up-visible-foodle-admin').prop('disabled',false);
          }
        });
      });

      $(document).ready(() => {
        foodle_check_admin_color();
      });

      $("#foodle-admin-color-select").on("input",function(){
        setTimeout(() => {
          foodle_check_admin_color();
        }, 250);
      });

      function foodle_isHexColor (hex) {
        return ( hex.substr(0,1) == "#" ) && ( ( hex.length == 4 ) || ( hex.length == 5 ) || ( hex.length == 7 ) || ( hex.length == 9 ) || ( hex.length == 7 ) ) && ( ! isNaN(Number('0x' + hex.substr(1))) );
      }

      function foodle_check_admin_color() {
        $foodle_admin_color = $("#foodle-admin-color-select").val();
        if ( foodle_isHexColor($foodle_admin_color) ) 
          $("#foodle-admin-color-view").css("opacity","1").css("background-color",$foodle_admin_color);
        else
          $("#foodle-admin-color-view").css("opacity","0");
      }

      function foodle_check_hex_color(foodle_this) {
        if ( ( ! ( ( event.shiftKey ) && ( ( event.keyCode == 37 ) || ( event.keyCode == 38 ) || ( event.keyCode == 39 ) || ( event.keyCode == 40 ) ) ) ) && ( event.keyCode != 16 ) && ( event.keyCode != 17 ) && ( event.keyCode != 18 ) ) {
          foodle_save_curpos = foodle_this.selectionStart;
          foodle_save_selend = foodle_this.selectionEnd;
          foodle_save_value = foodle_this.value;

          // this is the very check - the rest is just there to smoothen the user input
          $foodle_save_first = foodle_this.value.substr(0,1);
          foodle_this.value=foodle_this.value.replace(/[^a-fA-F0-9]/g, '');
          if ( $foodle_save_first == "#" ) foodle_this.value = "#" + foodle_this.value;

          foodle_len_diff = foodle_this.value.length - foodle_save_value.length;
          if ( foodle_this.value.length > foodle_save_value.length ) {
            foodle_this.selectionStart = foodle_save_curpos - 1;
            foodle_this.selectionEnd = foodle_this.selectionStart;
          }
          if ( foodle_this.value.length < foodle_save_value.length ) {
            foodle_this.selectionStart = foodle_save_curpos + foodle_len_diff;
            foodle_this.selectionEnd = foodle_this.selectionStart;
          } else {
            foodle_this.selectionStart = foodle_save_curpos - foodle_len_diff;
            foodle_this.selectionEnd = foodle_save_selend - foodle_len_diff;
          }
        }
      }



      function foodle_check_post_list(foodle_this) {
        if ( ( ! ( ( event.shiftKey ) && ( ( event.keyCode == 37 ) || ( event.keyCode == 38 ) || ( event.keyCode == 39 ) || ( event.keyCode == 40 ) ) ) ) && ( event.keyCode != 16 ) && ( event.keyCode != 17 ) && ( event.keyCode != 18 ) ) {
          foodle_save_curpos = foodle_this.selectionStart;
          foodle_save_selend = foodle_this.selectionEnd;
          foodle_save_value = foodle_this.value;

          // this is the very check - the rest is just there to smoothen the user input
          foodle_this.value=foodle_this.value.replace(/[^0-9,]/g, '');

          foodle_len_diff = foodle_this.value.length - foodle_save_value.length;
          if ( foodle_this.value.length > foodle_save_value.length ) {
            foodle_this.selectionStart = foodle_save_curpos - 1;
            foodle_this.selectionEnd = foodle_this.selectionStart;
          }
          if ( foodle_this.value.length < foodle_save_value.length ) {
            foodle_this.selectionStart = foodle_save_curpos + foodle_len_diff;
            foodle_this.selectionEnd = foodle_this.selectionStart;
          } else {
            foodle_this.selectionStart = foodle_save_curpos - foodle_len_diff;
            foodle_this.selectionEnd = foodle_save_selend - foodle_len_diff;
          }
        }
      }
    </script>
  <?php

  echo '<p>&nbsp;</p>';
  echo '<input type="submit" class="button-primary" name="save_foodle_settings" value="'.__('Save Foodle settings','foodle-for-democracy-poll').'..."'; if ( ! $foodle_no_safety_query ) echo ' onclick="return confirm(\''.__('Are you sure to save the foodle settings?','foodle-for-democracy-poll').'\');"'; echo '/></form></p>';
}



function foodle_usage() {
  global $wpdb;
  global $foodle_help_tooltips;
  global $foodle_warnings_removed;
  global $foodle_no_safety_query;
  global $foodle_roles_usage;

  if ( ( ! current_user_can('manage_options') ) && ( ! $foodle_roles_usage ) ) {
      echo '<p style="font-size:1.5em;color:darkred;"><strong>'.__('This tab is for Foodle administrators only!','foodle-for-democracy-poll').'</strong></p>';
      return;
  }

  // Help and Warnings Tooltips
  $help_usage_raw = __('This column is an overview about the %s<br>shortcode uses in polls, pages and posts.<br>You may follow the related links for further examination.<br>This list and the Democracy database will be updated<br>upon each page/post and poll save.<br>&#x2606; marks the initial (\'original\') use.<br><span style=\'color:#2271b1;\'>Blue</span> = link, <span style=\'color:DarkGreen;\'>green</span> = edit, <span style=\'color:DarkRed;\'>red</span> = poll id error,<br><span style=\'color:DarkGoldenrod;\'>gold</span> = shortcode id does not match poll id in textarea.','foodle-for-democracy-poll');
  $help_usage_democracy = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.sprintf($help_usage_raw,'Democracy').'" ' : '';
  $help_usage_foodle = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.sprintf($help_usage_raw,'Foodle').'" ' : '';
  $help_usage_comments = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.sprintf($help_usage_raw,'Comments').'" ' : '';
  $help_trigger = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('As an administrator, you can initiate the update for pages/posts manually by this.<br>The same will be accomplished automatically upon each page/post and poll save.','foodle-for-democracy-poll').'" ' : '';

  $poll_textarea_use = __('Poll\'s textarea','foodle-for-democracy-poll');

  echo '<figure class="foodle-block-table">';
  echo '<table class="foodle-usage-table">';
  echo '<thead><tr class="foodle-header-row"><th style="padding:14px;">'.__('Poll ID','foodle-for-democracy-poll').'</th><th style="padding:14px;">'.__('Poll Name','foodle-for-democracy-poll').'</th><th'.$help_usage_democracy.' style="padding:14px;">'.__('Democracy Shortcode Use<br>(Page/Post ID, Status)','foodle-for-democracy-poll').'</th><th'.$help_usage_foodle.' style="padding:14px;">'.__('Foodle Shortcode Use<br>(Page/Post ID, Status)','foodle-for-democracy-poll').'</th><th'.$help_usage_comments.' style="padding:14px;">'.__('Comments Shortcode Use<br>(Page/Post ID, Status)','foodle-for-democracy-poll').'</th></tr></thead><tbody>';
  $post_has_pw = ' &#60;'.__('password','foodle-for-democracy-poll').'&#62;';


  $foodle_shortcode_use_errors_in_democracy_textarea = array();

  // All related democracy and foodle shortcodes to be recorded at this time
  $shortcodes_search = array('democracy','foodle-democracy-poll-list-log','foodle-comments','foodle-poll-bar-graph','foodle-link-democracy-poll');
  $pattern = get_shortcode_regex($shortcodes_search);

  foreach($wpdb->get_results("SELECT * FROM $wpdb->democracy_q ORDER BY id DESC") as $poll_list ) { // get the relevant poll data
    $in_posts = explode(',', $poll_list->in_posts);
    $in_foodles = explode(',', $poll_list->in_foodles);
    $in_comments = explode(',', $poll_list->in_comments);
    $poll_note = $poll_list->note;
    $in_posts_lines = array();
    $in_comments_lines = array();
    $in_foodles_lines = array();

    if ( preg_match_all( '/'. $pattern .'/s', $poll_note, $matches )
    && array_key_exists( 2, $matches ) ) {
      $shortcode_count  = count( $matches[2] );
      $shortcodes_array = $matches[2];
      $atts_array       = $matches[3];
      for ( $i = 0; $i < $shortcode_count; $i++ ) {
        $shortcode = $shortcodes_array[ $i ];
        $atts      = shortcode_parse_atts( $atts_array[ $i ] );
        $use_color = 'darkgreen';
        if ( ! in_array('id',array_keys($atts))  || ( $atts['id'] == '' ) ) {
          $use_color = 'darkred';
          $foodle_shortcode_use_errors_in_democracy_textarea[] = sprintf(__('Missing or erroneous poll id for [%s] in polls','foodle-for-democracy-poll'),$shortcode).': <a style="color:darkgreen;" href="'.admin_url('options-general.php?page=democracy-poll&edit_poll='.$poll_list->id).'#dmc-note-anchor">'.$poll_list->question.' ('.$poll_list->id.', id: '.$shortcode_id.')</a>';
        } else {
          $shortcode_id = strtolower($atts['id']);
          $poll_question = '';
          if ( is_numeric($shortcode_id) ) {
            $sql = "SELECT * FROM $wpdb->democracy_q where id={$shortcode_id}";
            $poll_question = $wpdb->get_row($sql)->question; // Check whether id exists
          }
          if ( ( $shortcode_id != 'self') && ( strlen($poll_question) == 0 ) ) {
            $use_color = 'darkred';
            $foodle_shortcode_use_errors_in_democracy_textarea[] = sprintf(__('Not existing poll id for [%s] in polls','foodle-for-democracy-poll'),$shortcode).': <a style="color:darkgreen;" href="'.admin_url('options-general.php?page=democracy-poll&edit_poll='.$poll_list->id).'#dmc-note-anchor">'.$poll_list->question.' ('.$poll_list->id.', id: '.$shortcode_id.')</a>';
          }
        }
        if ( ( $use_color == 'darkgreen' ) && ( $shortcode_id != 'self' ) && ( $shortcode_id != $poll_list->id ) ) {
          $use_color = 'DarkGoldenrod';
          $foodle_shortcode_use_errors_in_democracy_textarea[] = sprintf(__('[%s] shortcode id does not match poll id in textarea','foodle-for-democracy-poll'),$shortcode).': <a style="color:darkgreen;" href="'.admin_url('options-general.php?page=democracy-poll&edit_poll='.$poll_list->id).'#dmc-note-anchor">'.$poll_list->question.' ('.$shortcode_id.' ⇾ '.$poll_list->id.'/self)</a>';
        }
        if ( $shortcode == 'democracy' ) $in_posts_lines[] = '<a style="color:'.$use_color.';" href="'.admin_url('options-general.php?page=democracy-poll&edit_poll='.$poll_list->id).'#dmc-note-anchor">'.$poll_textarea_use.' (id: '.$atts['id'].')</a>';
        if ( $shortcode == 'foodle-democracy-poll-list-log' ) $in_foodles_lines[] = '<a style="color:'.$use_color.';" href="'.admin_url('options-general.php?page=democracy-poll&edit_poll='.$poll_list->id).'#dmc-note-anchor">'.$poll_textarea_use.' (id: '.$atts['id'].')</a>';
        if ( $shortcode == 'foodle-comments' ) $in_comments_lines[] = '<a style="color:'.$use_color.';" href="'.admin_url('options-general.php?page=democracy-poll&edit_poll='.$poll_list->id).'#dmc-note-anchor">'.$poll_textarea_use.' (id: '.$atts['id'].')</a>';
      }
    }

    echo '<tr class="foodle-standard-row">';
    echo '<td style="border-right: 1px solid #888888; padding:14px; text-align:center;">'.$poll_list->id.'</td>';
    echo '<td style="border-right: 1px solid #888888;padding:14px;"><a style="color:darkgreen;" href="'.admin_url('options-general.php?page=democracy-poll&edit_poll='.$poll_list->id).'#dmc-note-anchor">'.esc_html($poll_list->question).'</a></td>';
    echo '<td style="border-right: 1px solid #888888;padding:14px;">';
    $foodle_first_use = 0;
    $foodle_democracy_list = array();
    foreach($in_posts as $in_post) {
      $foodle_first_use += 1;
      $foodle_origin = ( $foodle_first_use == 1 ) ? "&#x2606;" : "" ;
      $democracy_post_has_pw = ( get_post($in_post)->post_password !== "" ) ? $post_has_pw : '';
      if ( $in_post != '' ) $in_posts_lines[] = '<a style="color:#2271b1;" href="'.get_permalink($in_post).'">'.$foodle_origin.'&nbsp;'.get_the_title($in_post).'&nbsp;&nbsp;'.$foodle_origin.'</a>&nbsp;&nbsp;<a style="color:darkgreen;text-decoration:none!important;font-size:1.4em;" href="'.admin_url('post.php?post='.$in_post).'&action=edit">✎</a><br>('.$in_post.', '.get_post_statuses()[get_post_status($in_post)].$democracy_post_has_pw.')';
    }
    echo implode('<br><br>', $in_posts_lines);
    echo '</td>';
    echo'<td style="border-right: 1px solid #888888;padding:14px;">';
    $foodle_first_use = 0;
    $foodle_foodle_list = array();
    foreach($in_foodles as $in_foodle) {
      $foodle_first_use += 1;
      $foodle_origin = ( $foodle_first_use == 1 ) ? "&#x2606;" : "" ;
      $foodle_post_has_pw = ( get_post($in_foodle)->post_password !== "" ) ? $post_has_pw : '';
      if ( $in_foodle != '' ) $in_foodles_lines[] = '<a style="xclor:#2271b1;" href="'.get_permalink($in_foodle).'">'.$foodle_origin.'&nbsp;'.get_the_title($in_foodle).'&nbsp;&nbsp;'.$foodle_origin.'</a>&nbsp;&nbsp;<a style="color:darkgreen;text-decoration:none!important;font-size:1.4em;" href="'.admin_url('post.php?post='.$in_foodle).'&action=edit">✎</a><br>('.$in_foodle.', '.get_post_statuses()[get_post_status($in_foodle)].$foodle_post_has_pw.')';
    }
    echo implode('<br><br>', $in_foodles_lines);
    echo '</td>';
    echo'<td style="padding:14px;">';
    $foodle_first_use = 0;
    $foodle_comments_list = array();
    foreach($in_comments as $in_comment) {
      $foodle_first_use += 1;
      $foodle_origin = ( $foodle_first_use == 1 ) ? "&#x2606;" : "" ;
      $foodle_post_has_pw = ( get_post($in_foodle)->post_password !== "" ) ? $post_has_pw : '';
      if ( $in_comment != '' ) $in_comments_lines[] = '<a style="color:#2271b1;" href="'.get_permalink($in_comment).'">'.$foodle_origin.'&nbsp;'.get_the_title($in_comment).'&nbsp;&nbsp;'.$foodle_origin.'</a>&nbsp;&nbsp;<a style="color:darkgreen;text-decoration:none!important;font-size:1.4em;" href="'.admin_url('post.php?post='.$in_comment).'&action=edit">✎</a><br>('.$in_comment.', '.get_post_statuses()[get_post_status($in_comment)].$foodle_post_has_pw.')';
    }
    echo implode('<br><br>', $in_comments_lines);
    echo '</td>';
    echo '</tr>';
  }

  echo '</tbody></table></figure>'; 

  if ( current_user_can('manage_options') ) {
    echo '<p>&nbsp;</p>';
    echo '<p><form action="'.admin_url( 'admin.php?page=foodle-admin-page&tab=foodle-usage' ).'" method="post">';
    echo '<input'.$help_trigger.' type="submit" class="button-primary" name="update_shortcode_usage" value="'.__('Update the shortcode use data','foodle-for-democracy-poll').'..."'; if ( ! $foodle_no_safety_query ) echo ' onclick="return confirm(\''.__('Are you sure to update the shortcode use data?\n(This will automatically be accomplished with\neach page/post and poll save)','foodle-for-democracy-poll').'\');"'; echo '/></form></p>';
  }
  if ( count($foodle_shortcode_use_errors_in_democracy_textarea) > 0 ) {
    $foodle_shortcode_use_errors_in_democracy_textarea_html = '<ul style="list-style-type:disc;margin-left:20px;"><li>'.implode('</li><li>',$foodle_shortcode_use_errors_in_democracy_textarea).'</li></ul>';
    $foodle_admin_notice = __('The following errors occured during the last shortcode use update in polls','foodle-for-democracy-poll').':<br>'.$foodle_shortcode_use_errors_in_democracy_textarea_html;
    foodle_pwx_admin_notice__warning('<p>'.$foodle_admin_notice.'</p>');
  }
  if ( get_option('foodle_shortcode_usage_error_pages_posts') ) {
    $foodle_admin_notice = __('The following errors occured during the last shortcode use update in pages/posts','foodle-for-democracy-poll').':<br>'.get_option('foodle_shortcode_usage_error_pages_posts');
    foodle_pwx_admin_notice__warning('<p>'.$foodle_admin_notice.'</p>');
  }
}



// The success notice as admin_notice...
function foodle_pwx_admin_notice__success($foodle_success_message) {
  ?>
  <div class="notice success notice-success is-dismissible">
    <?php
      echo '<p>&nbsp;</p>';
      echo __('OK','foodle-for-democracy-poll').': '.$foodle_success_message;
      echo '<p>&nbsp;</p>';
    ?>
  </div>
  <?php
}



// The info notice as admin_notice...
function foodle_pwx_admin_notice__info($foodle_info_message) {
    ?>
    <div class="notice info notice-info is-dismissible">
      <?php
        echo '<p>&nbsp;</p>';
        echo __('INFO','foodle-for-democracy-poll').': '.$foodle_info_message;
        echo '<p>&nbsp;</p>';
      ?>
    </div>
    <?php
  }



// The last-chance-cancel warning(s) as admin_notice...
function foodle_pwx_admin_notice__warning($foodle_warning_message) {
    ?>
    <div class="notice warning notice-warning is-dismissible">
      <?php
        echo '<p>&nbsp;</p>';
        echo __('WARNING','foodle-for-democracy-poll').': '.$foodle_warning_message;
        echo '<p>&nbsp;</p>';
      ?>
    </div>
    <?php
  }



  // The defined error notice(s) as admin_notice...
function foodle_pwx_admin_notice__defined_error($foodle_error_message) {
  ?>
  <div class="notice error notice-error is-dismissible">
    <?php
      echo '<p>&nbsp;</p>';
      echo __('ERROR','foodle-for-democracy-poll').': '.$foodle_error_message;
      echo '<p>&nbsp;</p>';
    ?>
  </div>
  <?php
}



// The undefined error notice as admin_notice...
function foodle_pwx_admin_notice__error() {
  ?>
  <div class="notice error notice-error is-dismissible">
    <?php
      echo '<h2 class="mfem-h2">'.__('ERROR: The action was most probably not properly performed!','foodle-for-democracy-poll' ).'</h2>';
    ?>
  </div>
  <?php
}



// Check whether Democracy will keep logs. Otherwise, issue a warning!
function foodle_check_keeping_logs() {
  if ( isset(get_option('democracy_options')['keep_logs']) ) {
    if (! get_option('democracy_options')['keep_logs'] )
      return "<div class='notice error notice-error is-dismissible missing-dem-logs' style='padding-top:10px;padding-bottom:10px;'>".__('<strong>ERROR!</strong><br>Foodle cannot work, as Democracy Poll will not keep voting logs in the database.<br>Please change the related Democracy Poll setting if you want to use Foodle!<br>Storage of IP addresses can be inhibited separately per poll.','foodle-for-democracy-poll')."</div>";
  }
  return "";
}


