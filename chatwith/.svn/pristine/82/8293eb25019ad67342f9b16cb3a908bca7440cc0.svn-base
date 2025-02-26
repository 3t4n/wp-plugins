<?php

/**
 * Plugin Name: Chatwith
 * Plugin URI: https://chatwith.tools
 * Description: Add a custom trained ChatGPT chatbot to your Wordpress site.
 * Version: 1.0.2
 * Author: Chatwith
 * Author URI: https://chatwith.tools
 * License: GPL2
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

add_action('admin_menu', 'chatwith_add_options_page');

// Add the options page to the admin menu
function chatwith_add_options_page()
{
  add_options_page('Chatwith Plugin Settings', 'Chatwith', 'administrator', 'chatwith_id', 'chatwith_options_page');
  add_action('admin_init', 'chatwith_register_options');
}

// Register the options settings
function chatwith_register_options()
{
  register_setting('chatwith_options', 'chatwith_id');
}

// Define the content of the options page
function chatwith_options_page()
{
?>
  <div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    <form method="post" action="options.php">
      <?php settings_fields('chatwith_options'); ?>
      <?php do_settings_sections('chatwith_options'); ?>
      <p>Enter your Chatwith chatbot ID below. You can get this ID from the <a href="https://chatwith.tools/app/settings" target="_blank">Settings</a> page for your chatbot.</p>
      <table class="form-table" role="presentation">
        <tbody>
          <tr>
            <th>
              <label for="chatwith_id">
                Chatbot ID (required)
              </label>
            </th>
            <td>
              <input name="chatwith_id" id="chatwith_id" type="text" value="<?php echo esc_html(get_option('chatwith_id')); ?>" class="regular-text code">
            </td>
          </tr>

        </tbody>
      </table>

      <?php submit_button(); ?>
    </form>
  </div>
<?php
}

function chatwith_embed_chatbot()
{
  $chatwith_id = get_option('chatwith_id');

  echo "<script type=\"text/javascript\">(function(){d=document;s=d.createElement(\"script\");s.src=\"https://chatwith.tools/chatbot/", esc_attr($chatwith_id), ".js\";s.async=1;d.getElementsByTagName(\"head\")[0].appendChild(s);})();</script>";
}
add_action('wp_footer', 'chatwith_embed_chatbot');
?>