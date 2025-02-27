<?php
/*
Plugin Name: Custom Functions Plugin
Plugin URI: http://www.banglardokan.com/blog/recent/project/custom-functions-plugin-2256/
Description: No need any more functions.php file editing. Just give a tick mark and this plugin will do the rest for you.
Version: 1.1
Author: Shamim
Author URI: http://www.banglardokan.com/blog/recent/project/custom-functions-plugin-2256/
Text Domain: cfp
License: GPLv2
*/
require('all-custom-functions.php');
add_action('admin_menu', 'AddCFPmenu');
add_action('plugins_loaded', 'cfp_translation');

function AddCFPmenu()
    {
      add_options_page('Custom Functions Plugin', 'Custom Functions Plugin','manage_options', basename(__FILE__), 'CFPmenuPage');
    }
	
function cfp_translation()
	{
	//SETUP TEXT DOMAIN FOR TRANSLATIONS
	$plugin_dir = basename(dirname(__FILE__));
	load_plugin_textdomain('cfp', false, $plugin_dir.'/languages/');
	}
	function CFPmenuPage(){
	if (CFPsave())
        echo "<div id='message' class='updated fade'><p>".__("Options successfully saved", "cfp")."</p></div>";
		$CFPoption = CFPgetOptions();
		$url = 'http://www.banglardokan.com/blog/recent/project/custom-functions-plugin-2256/';
echo 
"<div class='wrap'>
          <h2>".__("\"Custom Functions Plugin\" Settings", "cfp")."</h2>
		  <ul>".sprintf(__("For more help or report bug pleasse visit <a href= '%s' title='Custom Functions Plugin' target='_blank'>Custom Functions Plugin</a>", "cfp"),esc_url($url))."</ul>
		  <h5>".__("Do not forget to click \"Save Options\" at the bottom after your change", "cfp")."</h5>
		  <form action='https://www.paypal.com/cgi-bin/webscr' method='post' target='_top'>
		<input type='hidden' name='cmd' value='_donations'>
		<input type='hidden' name='business' value='4HKBQ3QFSCPHJ'>
		<input type='hidden' name='lc' value='US'>
		<input type='hidden' name='item_name' value='Custom Functions Plugin'>
		<input type='hidden' name='item_number' value='Custom Functions Plugin'>
		<input type='hidden' name='currency_code' value='USD'>
		<input type='hidden' name='bn' value='PP-DonationsBF:btn_donateCC_LG.gif:NonHosted'>
		<input type='image' src='https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'>
		<img alt='' border='0' src='https://www.paypalobjects.com/en_US/i/scr/pixel.gif' width='1' height='1'>
		</form>
          <form id='cfp_save_options' name='cfp_save_options' method='post' action=''>
          <table class='widefat'>
          <thead>
          <tr><th width='5px'>".__("Tick", "cfp")."</th><th width='45%'>".__("Setting", "cfp")."</th><th width='55%'>".__("Value", "cfp")."</th></tr>
          </thead>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_home_results_check' value='1' ".checked($CFPoption['cfp_home_results_check'], '1', false)." />".__("Change amount of posts on the home page", "cfp")."</td><td><input type='text' size='10' name='cfp_home_results_per_page' value='".$CFPoption['cfp_home_results_per_page']."' /></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_search_results_check' value='1' ".checked($CFPoption['cfp_search_results_check'], '1', false)." />".__("Change amount of posts on the search page", "cfp")."</td><td><input type='text' size='10' name='cfp_search_results_per_page' value='".$CFPoption['cfp_search_results_per_page']."' /></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_excerpt_length_check' value='1' ".checked($CFPoption['cfp_excerpt_length_check'], '1', false)." />".__("Change length of excerpt", "cfp")."<br/><small>".__("Set how many words you want.", "cfp")."</small></td><td><input type='text' size='10' name='cfp_excerpt_length' value='".$CFPoption['cfp_excerpt_length']."' /></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_url_spam_check' value='1' ".checked($CFPoption['cfp_url_spam_check'], '1', false)." />".__("Automatically mark as spam all comments with an url longer than set chars", "cfp")."</td><td><input type='text' size='10' name='cfp_url_spamcheck_length' value='".$CFPoption['cfp_url_spamcheck_length']."' /></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_post_revision' value='1' ".checked($CFPoption['cfp_post_revision'], '1', false)." />".__("Set the post revisions unless the constant was set in wp-config.php already", "cfp")."<br/><small>".__("Set how many revisions you want to keep", "cfp")."</small></td><td><input type='text' size='10' name='cfp_post_revisions' value='".$CFPoption['cfp_post_revisions']."' /></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_publish_later_on_feed' value='1' ".checked($CFPoption['cfp_publish_later_on_feed'], '1', false)." />".__("Control When Your Posts are Available via RSS", "cfp")."<br/><small>".__("Set how many minutes wait", "cfp")."</small></td><td><input type='text' size='10' name='cfp_minutes_later_on_feed' value='".$CFPoption['cfp_minutes_later_on_feed']."' /></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_empty_trash' value='1' ".checked($CFPoption['cfp_empty_trash'], '1', false)." />".__("Automatically empty trash after set days?", "cfp")."<br/><small>".__("If not set in wp-config.php", "cfp")."</small></td><td><input type='text' size='10' name='cfp_empty_trash_days' value='".$CFPoption['cfp_empty_trash_days']."' /></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_admin_footer' value='1' ".checked($CFPoption['cfp_admin_footer'], '1', false)." />".__("Change Admin footer?", "cfp")."<br/><small>".__("Set your name", "cfp")."</small></td><td><input type='text' size='10' name='cfp_admin_footer_name' value='".$CFPoption['cfp_admin_footer_name']."' /></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_add_favicon' value='1' ".checked($CFPoption['cfp_add_favicon'], 1, false)." /> ".__("Add favicon to head?", "cfp")."<br /><small>".__("add your favicon.ico to base folder", "cfp")."</small></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_remove_head_link' value='1' ".checked($CFPoption['cfp_remove_head_link'], '1', false)." /> ".__("Remove unnecessary links from wp_head?", "cfp")."</td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_redirect_after_login' value='1' ".checked($CFPoption['cfp_redirect_after_login'], '1', false)." /> ".__("Redirect to home page after login?", "cfp")."</td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_hide_admin_bar' value='1' ".checked($CFPoption['cfp_hide_admin_bar'], '1', false)." /> ".__("Hide admin bar from front end for non admin?", "cfp")."</td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_back_access' value='1' ".checked($CFPoption['cfp_back_access'], '1', false)." /> ".__("Disable back end access for non admin users?", "cfp")."<br /><small>".__("They will be redirected to home page.", "cfp")."</small></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_login_with_email' value='1' ".checked($CFPoption['cfp_login_with_email'], '1', false)." /> ".__("Login with both Email/username?", "cfp")."</td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_own_media_only' value='1' ".checked($CFPoption['cfp_own_media_only'], '1', false)." /> ".__("Show only own uploaded media in library?", "cfp")."<br /><small>".__("Admin can see all uploaded media", "cfp")."</small></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_restrict_media_upload' value='1' ".checked($CFPoption['cfp_restrict_media_upload'], '1', false)." /> ".__("Restrict user to upload only jpg,jpeg,png,gif type of media?", "cfp")."<br /><small>".__("Admin can upload all type of media wordpress allow.", "cfp")."</small></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_remove_img_ptags' value='1' ".checked($CFPoption['cfp_remove_img_ptags'], '1', false)." /> ".__("Stop images getting wrapped up in p tags when they get dumped out with the_content() for easier theme styling?", "cfp")."</td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_front_jquery_enqueue' value='1' ".checked($CFPoption['cfp_front_jquery_enqueue'], '1', false)." /> ".__("Call the google CDN version of jQuery for the frontend?", "cfp")."<br /><small>".__("Make sure you have wp_enqueue_script('jquery') in your header.", "cfp")."</small></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_IEhtml5_shim' value='1' ".checked($CFPoption['cfp_IEhtml5_shim'], '1', false)." /> ".__("Call Googles HTML5 Shim, but only for users on old versions of IE?", "cfp")."</td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_login_error_mgs' value='1' ".checked($CFPoption['cfp_login_error_mgs'], '1', false)." /> ".__("Change login screen error messages to \"Think you have gone wrong somwhere!\"?", "cfp")."<br /><small>".__("Add an extra layer of security.", "cfp")."</small></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_rss_post_thumbnail' value='1' ".checked($CFPoption['cfp_rss_post_thumbnail'], '1', false)." /> ".__("Show post thumbnail in RSS Feeds?", "cfp")."</td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_disable_feed' value='1' ".checked($CFPoption['cfp_disable_feed'], '1', false)." /> ".__("Disable RSS Feeds?", "cfp")."</td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_comment_count' value='1' ".checked($CFPoption['cfp_comment_count'], '1', false)." /> ".__("Display the Most Accurate Comment Count?", "cfp")."<br /><small>".__("Will not count trackbacks, and pings as comments.", "cfp")."</small></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_all_settings_link' value='1' ".checked($CFPoption['cfp_all_settings_link'], '1', false)." /> ".__("Custom admin menu link for all settings?", "cfp")."<br /><small>".__("you will find a new link to settings>all settings for all settings.", "cfp")."</small></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_custom_background' value='1' ".checked($CFPoption['cfp_custom_background'], '1', false)." /> ".__("Enable admin to set custom background images in 'appearance > background'?", "cfp")."<br /><small>".__("you will find a new link to appearance > background for background image change.", "cfp")."</small></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_no_self_ping' value='1' ".checked($CFPoption['cfp_no_self_ping'], '1', false)." /> ".__("Remove pings to self?", "cfp")."</td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_ajx_sharpen_resize' value='1' ".checked($CFPoption['cfp_ajx_sharpen_resize'], '1', false)." /> ".__("Sharpening resized jpg images?", "cfp")."<br /><small>".__("Quality of your jpg image will be increased.", "cfp")."</small></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_enable_gzip' value='1' ".checked($CFPoption['cfp_enable_gzip'], '1', false)." /> ".__("Enable Gzip?", "cfp")."</td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_prevent_email_change' value='1' ".checked($CFPoption['cfp_prevent_email_change'], '1', false)." /> ".__("Prevent user email change from profile?", "cfp")."</td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_check_referrer' value='1' ".checked($CFPoption['cfp_check_referrer'], '1', false)." /> ".__("Block comments with no-referrer?", "cfp")."<br /><small>".__("Reduce most of spam comments.", "cfp")."</small></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_remove_word_private' value='1' ".checked($CFPoption['cfp_remove_word_private'], '1', false)." /> ".__("Remove word \"Private: \" infront of title of private post/page?", "cfp")."</td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_disallow_file_edit' value='1' ".checked($CFPoption['cfp_disallow_file_edit'], '1', false)." /> ".__("Disable the theme/plugin editor in Admin?", "cfp")."<br /><small>".__("If not set in wp-config.php", "cfp")."</small></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_disallow_file_mods' value='1' ".checked($CFPoption['cfp_disallow_file_mods'], '1', false)." /> ".__("Disallow anything that creates, deletes, or updates core, plugin, or theme files.?", "cfp")."<br /><small>".__("Files in uploads are excepted.", "cfp")."</small></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_no_more_jumping' value='1' ".checked($CFPoption['cfp_no_more_jumping'], '1', false)." /> ".__("No more jumping for read more link?", "cfp")."</td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_custom_breadcrumbs' value`='1' ".checked($CFPoption['cfp_custom_breadcrumbs'], '1', false)." /> ".__("Enable custom Breadcrumbs?", "cfp")."<br /><small>".__("you have to add \"< ?php if (function_exists('cfp_custom_breadcrumbs')) cfp_custom_breadcrumbs(); ?>\" where you want to show Breadcrumbs", "cfp")."</small></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_disable_wp_search' value='1' ".checked($CFPoption['cfp_disable_wp_search'], '1', false)." /> ".__("Disable Search in WordPress?", "cfp")."<br /><small>".__("It will disable wordpress default search.", "cfp")."</small></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_disable_admin_nag' value='1' ".checked($CFPoption['cfp_disable_admin_nag'], '1', false)." /> ".__("Disable Admin nag?", "cfp")."<br /><small>".__("Only shown to admin.", "cfp")."</small></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='cfp_remove_version' value='1' ".checked($CFPoption['cfp_remove_version'], '1', false)." /> ".__("Remove wordpress version number?", "cfp")."</td></tr>
		  
		  
		  
          <tr><td colspan='2'><span><input class='button' type='submit' name='cfp_save_options' value='".__("Save Options", "cfp")."' /></span></td></tr>
          </table>
		  </form>
		  <ul>".sprintf(__("For more help or report bug pleasse visit <a href= '%s' title='Custom Functions Plugin' target='_blank'>Custom Functions Plugin</a>", "cfp"),esc_url($url))."</ul>
          </div>";
		  }
		  



    function CFPsave()
    {
      if (isset($_POST['cfp_save_options']))
      {
        $CFPsaveOps = array('cfp_home_results_check' 	=> $_POST['cfp_home_results_check'],
                              'cfp_home_results_per_page' => $_POST['cfp_home_results_per_page'],
							  'cfp_search_results_check' => $_POST['cfp_search_results_check'],
							  'cfp_search_results_per_page' => $_POST['cfp_search_results_per_page'],
							  'cfp_excerpt_length_check' => $_POST['cfp_excerpt_length_check'],
							  'cfp_excerpt_length' => $_POST['cfp_excerpt_length'],
							  'cfp_url_spam_check' => $_POST['cfp_url_spam_check'],
							  'cfp_url_spamcheck_length' => $_POST['cfp_url_spamcheck_length'],
							  'cfp_post_revision' => $_POST['cfp_post_revision'],
							  'cfp_post_revisions' => $_POST['cfp_post_revisions'],
							  'cfp_publish_later_on_feed' => $_POST['cfp_publish_later_on_feed'],
							  'cfp_minutes_later_on_feed' => $_POST['cfp_minutes_later_on_feed'],
							  'cfp_empty_trash' => $_POST['cfp_empty_trash'],
							  'cfp_empty_trash_days' => $_POST['cfp_empty_trash_days'],
							  'cfp_admin_footer' => $_POST['cfp_admin_footer'],
							  'cfp_admin_footer_name' => $_POST['cfp_admin_footer_name'],
							  'cfp_add_favicon' => $_POST['cfp_add_favicon'],
							  'cfp_remove_head_link' => $_POST['cfp_remove_head_link'],
							  'cfp_redirect_after_login' => $_POST['cfp_redirect_after_login'],
							  'cfp_hide_admin_bar' => $_POST['cfp_hide_admin_bar'],
							  'cfp_back_access' => $_POST['cfp_back_access'],
							  'cfp_login_with_email' => $_POST['cfp_login_with_email'],
							  'cfp_own_media_only' => $_POST['cfp_own_media_only'],
							  'cfp_restrict_media_upload' => $_POST['cfp_restrict_media_upload'],
							  'cfp_remove_img_ptags' => $_POST['cfp_remove_img_ptags'],
							  'cfp_front_jquery_enqueue' => $_POST['cfp_front_jquery_enqueue'],
							  'cfp_IEhtml5_shim' => $_POST['cfp_IEhtml5_shim'],
							  'cfp_login_error_mgs' => $_POST['cfp_login_error_mgs'],
							  'cfp_rss_post_thumbnail' => $_POST['cfp_rss_post_thumbnail'],
							  'cfp_disable_feed' => $_POST['cfp_disable_feed'],
							  'cfp_comment_count' => $_POST['cfp_comment_count'],
							  'cfp_all_settings_link' => $_POST['cfp_all_settings_link'],
							  'cfp_custom_background' => $_POST['cfp_custom_background'],
							  'cfp_no_self_ping' => $_POST['cfp_no_self_ping'],
							  'cfp_ajx_sharpen_resize' => $_POST['cfp_ajx_sharpen_resize'],
							  'cfp_enable_gzip' => $_POST['cfp_enable_gzip'],
							  'cfp_prevent_email_change' => $_POST['cfp_prevent_email_change'],
							  'cfp_check_referrer' => $_POST['cfp_check_referrer'],
							  'cfp_remove_word_private' => $_POST['cfp_remove_word_private'],
							  'cfp_disallow_file_edit' => $_POST['cfp_disallow_file_edit'],
							  'cfp_disallow_file_mods' => $_POST['cfp_disallow_file_mods'],
							  'cfp_no_more_jumping' => $_POST['cfp_no_more_jumping'],
							  'cfp_custom_breadcrumbs' => $_POST['cfp_custom_breadcrumbs'],
							  'cfp_disable_wp_search' => $_POST['cfp_disable_wp_search'],
							  'cfp_disable_admin_nag' => $_POST['cfp_disable_admin_nag'],
							  'cfp_remove_version' => $_POST['cfp_remove_version']
							  );
        update_option('cfp_options', $CFPsaveOps);
        return true;
      }
      return false;
    }
    function CFPgetOptions()
    {
      $CFPoptions = array('cfp_home_results_check' => '0',
                          'cfp_home_results_per_page' => '10',
						  'cfp_search_results_check' => '0',
						  'cfp_search_results_per_page' => '10',
						  'cfp_excerpt_length_check' => '0',
						  'cfp_excerpt_length' => '50',
						  'cfp_url_spam_check' => '0',
						  'cfp_url_spamcheck_length' => '50',
						  'cfp_post_revision' => '0',
						  'cfp_post_revisions' => '10',
						  'cfp_publish_later_on_feed' => '0',
						  'cfp_minutes_later_on_feed' => '10',
                          'cfp_empty_trash' => '0',
						  'cfp_empty_trash_days' => '30',
						  'cfp_admin_footer' => '0',
						  'cfp_admin_footer_name' => '',
						  'cfp_add_favicon' => '0',
						  'cfp_remove_head_link' => '0',
						  'cfp_redirect_after_login' => '0',
						  'cfp_hide_admin_bar' => '0',
						  'cfp_back_access' => '0',
						  'cfp_login_with_email' => '0',
						  'cfp_own_media_only' => '0',
						  'cfp_restrict_media_upload' => '0',
						  'cfp_remove_img_ptags' => '0',
						  'cfp_front_jquery_enqueue' => '0',
						  'cfp_IEhtml5_shim' => '0',
						  'cfp_login_error_mgs' => '0',
						  'cfp_rss_post_thumbnail' => '0',
						  'cfp_disable_feed' => '0',
                          'cfp_comment_count' => '0',
						  'cfp_all_settings_link' => '0',
						  'cfp_custom_background' => '0',
						  'cfp_no_self_ping' => '0',
						  'cfp_ajx_sharpen_resize' => '0',
						  'cfp_enable_gzip' => '0',
						  'cfp_prevent_email_change' => '0',
						  'cfp_check_referrer' => '0',
                          'cfp_remove_word_private' => '0',
						  'cfp_disallow_file_edit' => '0',
						  'cfp_disallow_file_mods' => '0',
						  'cfp_no_more_jumping' => '0',
						  'cfp_custom_breadcrumbs' => '0',
						  'cfp_disable_wp_search' => '0',
						  'cfp_disable_admin_nag' => '0',
						  'cfp_remove_version' => '0'
      );

      //Get old values if they exist
      $CFPops = get_option('cfp_options');
      if (!empty($CFPops))
      {
        foreach ($CFPops as $key => $option)
          $CFPoptions[$key] = $option;
      }

      update_option('cfp_options', $CFPoptions);
     
      return $CFPoptions;
    }
		  ?>