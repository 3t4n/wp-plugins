<?php

/*
  Plugin Name: ALM oEmbed
  Plugin URI: https://github.com/articlemetrics/alm-oembed-plugin
  Description: Whitelist oEmbed providers
  Author: Martin Fenner
  Version: 1.1.2
  GitHub Plugin URI: https://github.com/articlemetrics/alm-oembed-plugin
  GitHub Branch: master

  Copyright 2013-2014 Public Library of Science

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

  Usage:
  This plugin whitelists oEmbed providers and comes with a list of providers.
*/

// Register custom oembed provider --
add_action('init', 'add_oembed_provider');

function add_oembed_provider() {
  $format = get_option('oembed_format', 'http://alm.plos.org/articles/*');
  $provider = get_option('oembed_provider', 'http://alm.plos.org/oembed');

  wp_oembed_add_provider($format, $provider);
}

// Add admin menu --
if (is_admin()) {
  add_action('admin_menu', 'oembed_providers_menu');
  add_action('admin_init', 'oembed_providers_register');
}

// Whitelist options --
function oembed_providers_register() {
  register_setting('oembed_providers_optiongroup', 'oembed_format');
  register_setting('oembed_providers_optiongroup', 'oembed_provider');
  register_setting('oembed_providers_optiongroup', 'oembed_example');

  add_option('oembed_format', 'http://alm.plos.org/articles/*');
  add_option('oembed_provider', 'http://alm.plos.org/oembed');
  add_option('oembed_example', 'http://alm.plos.org/articles/info:doi/10.1371/journal.pone.0103437');
}

// Admin menu page details --
function oembed_providers_menu() {
  add_options_page('ALM oEmbed settings', 'ALM oEmbed', 'manage_options', 'oembed_providers', 'oembed_providers_options');
}

// Add actual menu page --
function oembed_providers_options() { ?>
  <div class="wrap">
    <h2>ALM oEmbed Settings</h2>
    <p>This is the settings page for the <a href="https://github.com/articlemetrics/alm-oembed-plugin">ALM oEmbed</a> plugin. This plugin whitelists an additional oEmbed service beyond those <a href="http://codex.wordpress.org/Embeds">included by default</a>.</p>
    <p>Whitelist the following oEmbed service:</p>

    <form method="post" action="options.php">
    <?php settings_fields('oembed_providers_optiongroup'); ?>

    <table class="form-table">
      <tr valign="top">
        <th scope="row">Format</th>
        <td>
          <input type="text" name="oembed_format" size="60" value="<?php echo esc_attr( get_option('oembed_format') ); ?>" />
        </td>
      </tr>
      <tr valign="top">
        <th scope="row">Provider</th>
        <td>
          <input type="text" name="oembed_provider" size="60" value="<?php echo esc_attr( get_option('oembed_provider') ); ?>" />
        </td>
      </tr>
      <tr valign="top">
        <th scope="row">Example</th>
        <td>
          <input type="text" name="oembed_example" size="60" value="<?php echo esc_attr( get_option('oembed_example') ); ?>" />
        </td>
      </tr>
      <tr valign="top">
      <?php $response = get_example(); ?>
        <th scope="row" style="color: red;"><?php echo $response['status']; ?></th>
        <td>
          <div style="color: red; width: 700px;">
            <?php echo $response['body']; ?>
          </div>
        </td>
      </tr>
    </table>

    <?php submit_button(); ?>
    </form>
  </div>

  <?php
}

function get_example() {
  $format = get_option('oembed_format', 'http://alm.plos.org/articles/*');
  $provider = get_option('oembed_provider', 'http://alm.plos.org/oembed');
  $example = get_option('oembed_example', 'http://alm.plos.org/articles/info:doi/10.1371/journal.pone.0103437');

  wp_oembed_add_provider($format, $provider);
  $htmlcode = wp_oembed_get($example);

  if ($htmlcode) {
    return array (
      "status" => "",
      "body" => $htmlcode);
  } else {
    $response = wp_remote_get($example);
    $message = wp_remote_retrieve_response_message($response);
    $body = wp_remote_retrieve_body($response);

    return array (
      "status" => "Error: " . ($message == "OK" ? "URL wrong format" : $message),
      "body" => esc_attr($body));
  }
}

// Add settings link to plugins screen
add_filter('plugin_action_links', 'oembed_action_links', 10, 2);

function oembed_action_links($links, $file) {
    static $this_plugin;

    if (!$this_plugin) {
        $this_plugin = plugin_basename(__FILE__);
    }

    if ($file == $this_plugin) {
        $settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/options-general.php?page=oembed_providers">Settings</a>';
        array_unshift($links, $settings_link);
    }

    return $links;
}

?>
