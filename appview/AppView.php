<?php
/**
 * Plugin Name: AppView
 * Plugin URI: https://wordtune.me/wordtune-plugins/
 * Description: Activate the plugin and add your website to your smartphone's home screen.
 * Author: WordTune
 * Author URI: https://wordtune.me
 * Version: 2.0
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// Add action hook to wp_head function
add_action('wp_head', 'app_view');

// Add action hook to admin_menu function
add_action('admin_menu', 'app_view_settings_page');

// Function to render the admin page
function app_view_settings_page(){
  add_options_page(
    'AppView Settings', // The title of the page
    'AppView', // The menu item text
    'manage_options', // The required capability to access the page
    'app-view-settings', // The slug of the page
    'app_view_settings_content' // The function to render the page content
  );
}


// Function to render the content of the admin page
function app_view_settings_content(){
  if(isset($_POST['app_view_favicon'])){
    update_option('app_view_favicon', $_POST['app_view_favicon']);
  }
  if(isset($_POST['app_view_sitename'])){
    update_option('app_view_sitename', $_POST['app_view_sitename']);
  }
  $favicon = get_option('app_view_favicon', '');
  $sitename = get_option('app_view_sitename', get_bloginfo('name'));
  ?>
  <div class="wrap">
    <h1><a href="https://wordtune.me" target"_blank">AppView by WordTune</a></h1>
    <br>
    <form method="POST">
      <label for="app_view_favicon">Favicon URL:</label>
      <input type="text" name="app_view_favicon" value="<?php echo $favicon; ?>">
      <br>    <br>
      <label for="app_view_sitename">Sitename:</label>
      <input type="text" name="app_view_sitename" value="<?php echo $sitename; ?>">
      <?php submit_button(); ?>
    </form>
  </div>
  <?php
}

// Function to add content to the head section of the website
function app_view(){
  $favicon = get_option('app_view_favicon', '');
  $sitename = get_option('app_view_sitename', get_bloginfo('name'));
  ?>
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <meta name="apple-mobile-web-app-title" content="<?php echo $sitename; ?>" />
  <link rel="apple-touch-icon" href="<?php echo $favicon; ?>">
  <?php
}
