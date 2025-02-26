<?php

/**
Plugin Name: WP Contributors
Plugin URI: http://www.searchengineoptimisation.org/contributors-plugin
Description: Something to put here. Requires WP 2.8+.
Version: 0.1
Author: SEO ORG
Author URI: http://searchengineoptimisation.org
*/

define('WCP_SCRIPT_NAME', basename(__FILE__));
define('WCP_DIR', realpath(dirname(__FILE__)));
define('WCP_REWARD', '+30 days');
define('WCP_DEBUG', false);

// check wordpress version
global $wp_version;
if(version_compare($wp_version, '2.8', '<')) {
  exit('Discountvouchers plugin requires at least wordpress 2.8 or newer.'
   . '<a href="http://codex.wordpress.org/Upgrading_WordPress">Please update!<a>');
}

// plugin install
add_action('plugins_loaded', 'wcp_install');
function wcp_install() {
  $options = array(
    'wcp_post_count' => 3,
    'wcp_post_span' => 30,
    'wcp_authors_to_exclude' => array(),
    'wcp_promote' => false
  );

  foreach($options as $k => $v) {
    if(!get_option($k)) {
      add_option($k, $v);
    }
  }
}

// admin menu
add_action('admin_menu', 'wcp_add_options_page');
function wcp_add_options_page() {
  add_options_page('WP Contributors', 'WP Contributors', 8, WCP_SCRIPT_NAME, 'wcp_options_page');
}

function wcp_options_page() {
  $message = '';

  if(isset($_POST['save'])) {
    update_option('wcp_post_count', (int) $_POST['post_count']);
    update_option('wcp_post_span', (int) $_POST['post_span']);
    update_option('wcp_authors_to_exclude', $_POST['authors_to_exclude']);

    $promote = (isset($_POST['promote'])) ? true : false;
    update_option('wcp_promote', $promote);

    $message = 'Configuration updated!';
  }
  ?>
  <div class="wrap">
    <h2>WP Contributors Settings</h2>

    <?php if('' != $message): ?>
      <div id="message" class="updated fade"><?php echo $message; ?></div>
    <?php endif; ?>

    <form action="" method="post">
      <?php wp_nonce_field('wp-contributors'); ?>
      <table class="form-table">
        <tbody>
          <tr valign="top">
            <th scope="row"><label for="post_count">Post Count</label></th>
            <td>
              <input type="text" name="post_count" style="width: 40px;"
                value="<?php echo get_option('wcp_post_count'); ?>" />
              <span>posts</span>
            </td>
          </tr>
          <tr valign="top">
            <th scope="row"><label for="post_span">Post Span</label></th>
            <td>
              <input type="text" name="post_span" style="width: 40px;"
                value="<?php echo get_option('wcp_post_span'); ?>" />
              <span>days</span>
            </td>
          </tr>
          <tr valign="top">
            <th scope="row"><label for="authors_to_exclude">Author to Exclude</label></th>
            <td>
              <?php
              $authors = (array) get_option('wcp_authors_to_exclude');
              $users = get_users_of_blog();
              ?>
              <?php foreach($users as $u): ?>
                <?php if(1 == $u->user_id) continue; ?>
                <div style="float: left; width: 160px; display: inline;">
                  <input type="checkbox" name="authors_to_exclude[]" value="<?php echo $u->user_id; ?>"
                    <?php echo (in_array($u->user_id, $authors)) ? 'checked="checked"' : ''; ?> />
                  <span><?php echo $u->display_name; ?></span>
                </div>
              <?php endforeach; ?>
            </td>
          </tr>
          <tr valign="top">
            <th scope="row"><label for="promote">Promote</label></th>
            <td>
              <input type="checkbox" name="promote" value="1"
                <?php checked(get_option('wcp_promote'), true); ?> />
              <em>Tick this box if you are happy to add a "powered by" credit link back to the plugin author</em>
            </td>
          </tr>
        </tbody>
      </table>
      <p class="submit">
        <input class="button-primary" type="submit" name="save" value="Save Changes" />
      </p>
    </form>
  </div>
  <?php
}

// widget
add_action('widgets_init', 'wcp_load_widgets');
function wcp_load_widgets() {
  register_widget('WCP_Widget');
}

class WCP_Widget extends WP_Widget {
  function WCP_Widget() {
    $wops = array(
      'classname' => 'wcp_widget',
      'description' => 'A plugin to display the defined website for a guest author who meets certain criteria.',
      'wcp_widget');

    $this->WP_Widget('wcp_widget', 'WP Contributors', $wops);
  }

  function widget($args, $instance) {

    if($instance['only_home'] && !is_front_page()) {
      return;
    }

    extract($args);

    echo $before_widget;

    $title = apply_filters('widget_title', $instance['title']);
    if($title) {
      echo $before_title . $title . $after_title;
    }

    // list authors
    $authors = (array) get_option('wcp_authors_to_exclude');
    $users = get_users_of_blog();

    echo '<ul>';
    foreach($users as $u) {
      if(1 == $u->user_id) continue;
      if(in_array($u->user_id, $authors)) continue;

      $user = new WP_User($u->user_id);

      if(wcp_is_display_author($u->user_id)) {
        if('' == $user->user_url) {
          echo "<li>{$user->user_login}</li>";
        } else {
          echo "<li><a href=\"{$user->user_url}\">{$user->user_login}</a></li>";
        }
      }

      if(WCP_DEBUG) {
        $now = time();
        echo '<pre>';
        $rewards = wcp_calculate_rewards($u->user_id);
        foreach($rewards as $k => $v) {
          echo "Reward #{$k}:\n";
          echo "start: " . date('Y-m-d', $v['start']) . "\n";
          echo "end: " . date('Y-m-d', $v['end']) . "\n";
          echo "status: " . (($v['end'] < $now) ? 'inactive' : 'active') . "\n";
          echo "======\n";
        }
        echo '</pre>';
      }

    }
    echo '</ul>';

    if(get_option('wcp_promote')) {
      echo '<p><a href="http://www.searchengineoptimisation.org/contributors-plugin"><span>Powered by contributors plugin</span></a></p>';
    }

    echo $after_widget;
  }

  function update($new_instance, $old_instance) {
    $instance = $old_instance;

    $instance['title'] = strip_tags($new_instance['title']);
    $instance['only_home'] = (isset($new_instance['only_home'])) ? 1 : 0;

    return $instance;
  }

  function form($instance) {
    $defaults = array('title' => '');
    $instance = wp_parse_args((array) $instance, $defaults);
    ?>
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>"
        value="<?php echo $instance['title']; ?>" />
    </p>

    <p>
      <label for="<?php echo $this->get_field_id('only_home'); ?>">Only Home:</label>
      <input type="checkbox" id="<?php echo $this->get_field_id('only_home'); ?>" name="<?php echo $this->get_field_name('only_home'); ?>"
        value="<?php echo $instance['only_home']; ?>" <?php checked($instance['only_home'], 1); ?> />
    </p>
    <?php
  }
}

function wcp_is_display_author($author_id) {
  $rewards = wcp_calculate_rewards($author_id);

  if(empty($rewards)) {
    return false;
  }

  $now = time();
  foreach($rewards as $k) {
    if(($k['start'] < $now) || ($k['end'] > $now)) {
      return true;
    }
  }

  return false;
}

function in_multi_array($needle, $haystack)
{
  $in_multi_array = false;

  if(in_array($needle, $haystack)) {
    $in_multi_array = true;
  } else {
    for($i = 0; $i < sizeof($haystack); $i++) {
      if(is_array($haystack[$i])) {
        if(in_multi_array($needle, $haystack[$i])) {
          $in_multi_array = true;
          break;
        }
      }
    }
  }

  return $in_multi_array;
}

function wcp_calculate_rewards($user_id) {
  global $wpdb;

  $query = "SELECT ID, post_date, post_date_gmt, post_title FROM {$wpdb->posts}"
    . " WHERE post_author = {$user_id} AND post_status = 'publish' AND post_type = 'post' ORDER BY post_date ASC";

  $posts = $wpdb->get_results($query);

  $post_count = (int) get_option('wcp_post_count');
  $post_span = (int) get_option('wcp_post_span');
  $time_span = 60 * 60 * 24 * $post_span;

  $ptimes = array();
  $valid = array();
  foreach($posts as $k => $v) {
    $ts = strtotime($v->post_date);
    $ptimes[$k] = $ts;
  }

  foreach($ptimes as $k => $v) {
    if(!isset($ptimes[$k + ($post_count - 1)])) {
      continue;
    }

    $df = $ptimes[$k + ($post_count - 1)] - $v;

    if($df < $time_span) {
      if(!in_multi_array($v, $valid)) {
        $valid[] = array_slice($ptimes, $k, $post_count);
      }
    }
  }

  $rewards = array();
  foreach($valid as $k => $v) {

    $s = end($v);
    $e = strtotime(date('Y-m-d ', $s) . WCP_REWARD);

    if($s < $rewards[$k-1]['end']) {
      $s = $rewards[$k-1]['end'];
      $e = strtotime(date('Y-m-d ', $s) . WCP_REWARD);
    }

    $rewards[$k] = array('start' => $s, 'end' => $e);
  }

  return $rewards;
}
