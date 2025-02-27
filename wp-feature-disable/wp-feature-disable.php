<?php
/*
Plugin Name: WP Feature Disable
Plugin URI: http://www.gkauten.com/wp-feature-disable
Description: Disables a collection of WordPress features that can help your blog run more efficiently and smoother. Each of the functions can be individually enabled or disabled.
Version: 1.0
Author: GKauten
Author URI: http://www.gkauten.com

Special thanks to John Blackbourn (http://johnblackbourn.com/) for his explorations of the Core Update system.

Copyright (c) 2009-2010 GKauten (www.GKauten.com)
  
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

/************************************/
/* Plugin Deactivation              */
/************************************/

function wp_feature_disable_deactivate() {
  // Remove Installed Options
  delete_option("wpfd_editorautosave");
  delete_option("wpfd_postrevisions");
  delete_option("wpfd_commentauthurl");
  delete_option("wpfd_generatortag");
  delete_option("wpfd_coreupdate");
}
register_deactivation_hook(__FILE__, 'wp_feature_disable_deactivate');

/************************************/
/* Plugin Init Load                 */
/************************************/

function wp_feature_disable_load() {
  // v1.0 - Editor Autosave
  if(get_wpfd_option("wpfd_editorautosave") === false) {
	add_option("wpfd_editorautosave", "false", "", true);
  }
  // v1.0 - Post Revisions
  if(get_wpfd_option("wpfd_postrevisions") === false) {
    add_option("wpfd_postrevisions", "false", "", true);
  }
  // v1.0 - Comment Author URL
  if(get_wpfd_option("wpfd_commentauthurl") === false) {
    add_option("wpfd_commentauthurl", "false", "", true);
  }
  // v1.0 - Meta Generator Tag
  if(get_wpfd_option("wpfd_generatortag") === false) {
    add_option("wpfd_generatortag", "false", "", true);
  }
  // v1.0 - Core Update Check
  if(get_wpfd_option("wpfd_generatortag") === false) {
    add_option("wpfd_generatortag", "false", "", true);
  }
}
add_action("admin_init", "wp_feature_disable_load");

/************************************/
/* Administration Menu              */
/************************************/

function wp_feature_disable_admin_init() {
  add_submenu_page("options-general.php", "WP Feature Disable", "WP Feature Disable", 8, __FILE__, "wp_feature_disable_admin_page");
}
add_action("admin_menu", "wp_feature_disable_admin_init");

function wp_feature_disable_admin_page() {

  // Form Submit Handling
  if(isset($_POST["wpfd_submit"])) {
  
    // Editor Auto Save
	if(isset($_POST["wpfd_editorautosave"]) && $_POST["wpfd_editorautosave"] != "") {
      update_option("wpfd_editorautosave", "true");
	} else {
	  update_option("wpfd_editorautosave", "false");
	}
	
	// Post Revisions
	if(isset($_POST["wpfd_postrevisions"]) && $_POST["wpfd_postrevisions"] != "") {
      update_option("wpfd_postrevisions", "true");
	} else {
	  update_option("wpfd_postrevisions", "false");
	}
	
	// Comment Author URL
	if(isset($_POST["wpfd_commentauthurl"]) && $_POST["wpfd_commentauthurl"] != "") {
      update_option("wpfd_commentauthurl", "true");
	} else {
	  update_option("wpfd_commentauthurl", "false");
	}
	
	// Meta Generator Tag
	if(isset($_POST["wpfd_generatortag"]) && $_POST["wpfd_generatortag"] != "") {
      update_option("wpfd_generatortag", "true");
	} else {
	  update_option("wpfd_generatortag", "false");
	}
	
	// Core Update Check
	if(isset($_POST["wpfd_coreupdate"]) && $_POST["wpfd_coreupdate"] != "") {
      update_option("wpfd_coreupdate", "true");
	} else {
	  update_option("wpfd_coreupdate", "false");
	}
	
	// Output Message
	$message = "Your settings have been saved!";

  }
  ?>
    
  <?php if ($message) : ?>
    <div id='message' class='updated fade'><p><?php echo $message; ?></p></div>
  <?php endif; ?>
  
  <div id="dropmessage" class="updated" style="display:none;"></div>
  <div class="wrap">
    <h2><?php _e("WP Feature Disable", "wp_feature_disable"); ?></h2>
    <form method="post" name="wpfd_settings" target="_self">
      <p>To disable one of the features below simply check the box next to the feature you wish to disable and click 'Update Options'. Remember, nothing is permanent so if you wish to return the feature back to it's native state, simply uncheck the box and click 'Update Options'.</p>
      <table class="form-table" style="width: 100%; margin-left: 25px;">
        <tr>
          <td valign="top"><input type="checkbox" name="wpfd_editorautosave" <?php if (get_wpfd_option("wpfd_editorautosave") == "true") echo "checked=\"checked\" "; ?>/></td>
          <td valign="top" nowrap="nowrap"><?php _e("Editor Auto Save", "wp_feature_disable"); ?></td>
          <td><i>Disables the auto save feature triggered by the editor when working with a post or page after a certain amount of time. Helps reduce server demand by eliminating the number of page calls made between the editor and your server while working on a post or page.</i></td>
        </tr>
        <tr>
          <td valign="top"><input type="checkbox" name="wpfd_postrevisions" <?php if (get_wpfd_option("wpfd_postrevisions") == "true") echo "checked=\"checked\" "; ?>/></td>
          <td valign="top" nowrap="nowrap"><?php _e("Post Revisions", "wp_feature_disable"); ?></td>
          <td><i>Disables the post revision feature for posts and pages which tracks changes to each entry throughout the history of the specific post or page. Helps reduce database size by eliminating the build up of revisions which exist purely for administrative purposes.</i></td>
        </tr>
        <tr>
          <td valign="top"><input type="checkbox" name="wpfd_commentauthurl" <?php if (get_wpfd_option("wpfd_commentauthurl") == "true") echo "checked=\"checked\" "; ?>/></td>
          <td valign="top" nowrap="nowrap"><?php _e("Comment Author Hyperlink", "wp_feature_disable"); ?></td>
          <td><i>Disables the comment author hyperlink feature such that the author's name is no longer hyperlinked to the URL they may have provided when writing the comment. Helps prevent seemingly legitimate comments from being used to subtly promote spam websites.</i></td>
        </tr>
        <tr>
          <td valign="top"><input type="checkbox" name="wpfd_generatortag" <?php if (get_wpfd_option("wpfd_generatortag") == "true") echo "checked=\"checked\" "; ?>/></td>
          <td valign="top" nowrap="nowrap"><?php _e("Meta 'Generator' Tag", "wp_feature_disable"); ?></td>
          <td><i>Disables the Meta 'generator' tag that is placed in head section of the HTML output of your blog. Helps prevent visitors from easily identifying the version of your WordPress installation making it more difficult to exploit known vulnerabilities.</i></td>
        </tr>
        <tr>
          <td valign="top"><input type="checkbox" name="wpfd_coreupdate" <?php if (get_wpfd_option("wpfd_coreupdate") == "true") echo "checked=\"checked\" "; ?>/></td>
          <td valign="top" nowrap="nowrap"><?php _e("Core Update", "wp_feature_disable"); ?></td>
          <td><i>Disables the core update notification system built into WordPress. Helps eliminate any notification of new WordPress versions within the administration area. (Note: It is highly recommended that you keep your installation up to date. When disabling the core update system, please be sure to monitor WordPress releases in some other fashion.)</i></td>
        </tr>
        <tr>
          <td colspan="3"><input type="submit" name="wpfd_submit" value="<?php _e("Update Options", "wp_feature_disable")?> &raquo;" /></td>
        </tr>
      </table>
    </form>
  </div>
  
<?php } 

/************************************/
/* Safely Retrieve Options          */
/************************************/

function get_wpfd_option($option = "") {
  if($option) return str_replace("\"", "'", stripcslashes(get_option($option)));
}

/************************************/
/* Editor Auto Save                 */
/************************************/

function wpfd_disableautosave() {
  wp_deregister_script('autosave');
}

if(get_wpfd_option("wpfd_editorautosave") == "true") {
  add_action('wp_print_scripts', 'wpfd_disableautosave');
}

/************************************/
/* Post Revisions                   */
/************************************/

if(get_wpfd_option("wpfd_postrevisions") == "true") {
  remove_action('pre_post_update', 'wp_save_post_revision');
}

/************************************/
/* Comment Author Hyperlink         */
/************************************/

function wpfd_disablecommentauthurl($content = "") {
  return "";
}

if(get_wpfd_option("wpfd_commentauthurl") == "true") {
  add_filter("get_comment_author_url", "wpfd_disablecommentauthurl");
}

/************************************/
/* Generator Tag                    */
/************************************/

function wpfd_disablegenerator($type = "") {
  return "";
}

if(get_wpfd_option("wpfd_generatortag") == "true") {
  add_filter("the_generator", "wpfd_disablegenerator");
}

/************************************/
/* Core Update                      */
/************************************/

if(get_wpfd_option("wpfd_coreupdate") == "true") {
  remove_action("wp_version_check", "wp_version_check");
  remove_action("admin_init", "_maybe_update_core");
  add_filter("pre_transient_update_core", create_function("$a", "return null;"));
}

?>