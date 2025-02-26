<?php
/*
Plugin Name: 404 sponsoring
Description: Support your favorite charity!
Author: Jeroen Smeets
Version: 1.3.2
Plugin URI: http://404sponsoring.info/
Author URI: http://jeroensmeets.net/
License: GPL2
*/

$_404dir = realpath(dirname(__FILE__) . '/404pages') .'/';

//////////////
// SHOW 404 //
//////////////

function spons404_show_template() {
  global $_404dir;
  
  $options = get_option('sponsoring');
  if (!is_array($options) ) {
    $options = array('charity' => 'nierstichting');
  }

  if (file_exists($_404dir . $options['charity'] . '/index.php')) {
    define('DIR404PAGES', plugins_url() . '/404sponsoring/404pages/' . $options['charity'] . '/');
    define('SITEHOME', get_bloginfo('wpurl') . '/');
    include($_404dir . $options['charity'] . '/index.php');
    exit;
  } else {
    // TODO can't display 404sponsoring page
  }
}

remove_all_actions('404_template');
add_action('404_template', 'spons404_show_template');

// thx: http://michael.tyson.id.au/smart-404
function smart404_redirect_canonical_filter($redirect, $request) {
  return (is_404()) ? false : $redirect;
}
add_filter('redirect_canonical', 'smart404_redirect_canonical_filter', 10, 2);

//////////////////////////////////////////////
// Add link to settings in 'Manage plugins' //
//////////////////////////////////////////////

function spons_set_plugin_meta($links, $file) {
  $plugin = basename(__FILE__);
  // create link
  if (basename($file) == $plugin) {
    return array_merge(
      array('<a href="options-general.php?page=' . $plugin . '">' . __('Settings') . '</a>'),
      $links
    );
  }
  return $links;
}

add_filter('plugin_action_links', 'spons_set_plugin_meta', 10, 2);

///////////////////
// Configuration //
///////////////////

function spons_add_pages() {
  add_submenu_page('options-general.php', '404 sponsoring', '404 sponsoring', 8, basename(__FILE__), 'spons_options');
}

function spons_get_settings($_file) {
  global $_404dir;

  $_page = array();
  $_page['dirname'] = $_file;

  if (!file_exists($_404dir . $_file . '/index.php')) {
    return false;
  }

  $_settings = file_get_contents($_404dir . $_file . '/index.php');
  $_settings = explode("\n", $_settings);
  foreach($_settings as $_s) {
    if (0 === strpos($_s, '404 Name:')) {
      $_page['displayname'] = trim(substr($_s, 9));
    } else if (0 === strpos($_s, 'Version:')) {
      $_page['version'] = trim(substr($_s, 8));
    }
  }

  return $_page;
}

function custom_colors_and_script() {
?>
        <style type="text/css">
          #settings404       { width: 800px; margin-top: 30px; margin-left: 40px; }
          #settings404 img   { float: right; padding: 5px; border: 1px solid #ddd; }
          #settings404 ul    { float: left; width: 260px; }
          #settings404 ul li { background-color: #ddd; width: 260px; height: 24px; padding: 8px 0px 4px 4px; }
          #sponssubmit       { clear: left; margin-top: 20px; margin-left: 40px; }
        </style>

        <script type='text/javascript'>
          jQuery(document).ready( function() {
            jQuery('#settings404 input').click(
              function() {
                jQuery('#settings404 img').attr(
                  'src',
                  "<?php echo plugins_url() ?>/404sponsoring/404pages/" + jQuery(this).val() + "/screenshot.jpg"
                );
              }
            );
          });
        </script>
<?php
}

add_action('admin_head', 'custom_colors_and_script');

function spons_options() {
  global $_404dir;
?>
  <div class="wrap">
    <h2>404 Sponsoring Options</h2>
<?php

  // get list of 404 pages
  $_404s = array();
  if (file_exists($_404dir) && ($handle = opendir($_404dir))) {
    while (false !== ($file = readdir($handle))) {
      if ($file != "." && $file != "..") {
        if ($_settings = spons_get_settings($file)) {
          $_404s[] = $_settings;
        }
      }
    }
    closedir($handle);
  }

  sort($_404s);

  if (0 == count($_404s)) {
    echo "<p>Sorry, no 404 pages found.</p>";
    return false;
  }

  # Get our options and see if we're handling a form submission.
  $options = get_option('sponsoring');
  if (!is_array($options) ) {
    $options = array('charity' => 'nierstichting');
  }

  if (array_key_exists('spons-submit', $_POST)) {
    $options['charity'] = $_POST['spons-charity'];
    update_option('sponsoring', $options);
    echo "      <div id='message' class='updated fade'><p>Your settings have been updated.</p></div>";
  }
?>
    <form method="post">
      <div id="settings404">
        <p>Please choose your desired 404 page/charity page.</p>
        <ul>
<?php
  foreach($_404s as $_a404) {
    $_lisel = ($_a404['dirname'] == $options['charity']) ? " class='sel'" : "";
    $_busel = ($_a404['dirname'] == $options['charity']) ? " checked" : "";
?>
          <li<?php echo $_lisel ; ?>>
            <input type="radio" name="spons-charity" value="<?php echo $_a404['dirname']; ?>" <?php echo $_busel; ?>/>&nbsp;<?php echo $_a404['displayname']; ?>
          </li>
<?php
  }
?>       
        </ul>

        <img src="<?php echo plugins_url() . '/404sponsoring/404pages/' . $options['charity']; ?>/screenshot.jpg" alt="sample image of 404 page" />

      </div>

      <input class='button-primary' type="submit" id="sponssubmit" name="spons-submit" value="Submit" />
    </form>
  </div>
<?php
}

// add link to configuration page
add_action('admin_menu', 'spons_add_pages');

?>