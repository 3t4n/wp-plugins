<?php
/**
 * Plugin Name:       Bitmovin Streams
 * Plugin URI:        https://wordpress.org/plugins/bitmovin-streams/
 * Description:       Create instant video stream using simple Bitmovin Streams Video block
 * Version:           1.1.1
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Author:            Bitmovin
 * Author URI:        https://www.bitmovin.com
 * License:           GPLv2
 * Text Domain:       bitmovin
 *
 */

if (!function_exists("bitmovin_register_block")) {
  function bitmovin_register_block() {
    register_block_type('bitmovin/bitmovin', [
        'editor_script' => 'bitmovin'
    ]);
    wp_register_script(
      'bitmovin',
      plugin_dir_url(__FILE__) . 'build/index.js',
      ['wp-blocks', 'wp-block-editor', 'wp-editor']
    );
    wp_enqueue_style('bitmovin', plugin_dir_url(__FILE__) . 'build/index.css');
  }
}
add_action('init', 'bitmovin_register_block');

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'bitmovin_settings_link' );
function bitmovin_settings_link( array $links ) {
  $url = get_admin_url() . "options-general.php?page=bitmovin";
  $settings_link = '<a href="' . $url . '">' . __('Settings', 'textdomain') . '</a>';
    $links[] = $settings_link;
  return $links;
}

function bitmovin_render_settings_page() { ?>
  <div style="padding: 50px;">
    <style type="text/css">
    .callout {
      margin-top: 0;
      margin-left: 0;
      background: #f3f8f3;
      border-left: .25em solid #dfe2e5;
      border-color: #50af51;
      padding: 1.33rem;
    }
    .callout h3 {
      color: #489e49;
      margin-bottom: calc(1.33rem * .5);
    }
    .callout p {
      color: #000;
    }
    </style>
    <?php include_once(__DIR__ . '/build/logo.php'); ?>
    <h1 style="margin-top: 25px;">Getting Started</h1>
    <p>
    Bitmovin Streams is the end-to-end video streaming solution that enables you to get started streaming in seconds. Host and upload video or connect your live stream, customize the video player experience, deliver content in the highest quality across any device anywhere in the world, and view in-depth real-time audience and quality metrics.
      <br />
      <br />
      Embed your on-demand video directly within the WordPress environment with our dedicated WordPress plugin. To do this, connect your Bitmovin Account via the API Key you can find in the Bitmovin dashboard.
    </p>
    <form method="post" action="options.php">
      <?php settings_fields('bitmovin-settings'); ?>
      <?php do_settings_sections('bitmovin-settings'); ?>
      <table class="form-table">
        <tr valign="top">
          <th scope="row">Enter your Api Key:</th>
          <td>
            <div style="max-width: 315px">
            <input
              tabindex="0"
              autofocus
              style="width: 100%"
              type="password"
             name="bitmovin_apikey"
             spellcheck="false"
             value="<?php echo esc_attr(get_option('bitmovin_apikey')); ?>" />
            <p>Not sure where to get your API Key? <a href="https://bitmovin.com/dashboard/account" target="_blank">Click here</a></p>
            <div/>
            <?php submit_button(); ?>
          </td>
        </tr>
      </table>
    </form>
    <blockquote class="callout">
      <h3 class="callout-heading">
      Don't have an account yet? <a target="_blank" href="https://bitmovin.com/dashboard/signup"><strong>Sign up</strong></a> for a free 30-day trial with no credit card needed.
      </h3>
      <p>Want more of Streams? Subscribe to our pay-as-you-go plan, which has no upfront cost and includes over 10,000 player impressions and 2000 encoding minutes. Check out <a href="https://bitmovin.com/pricing/"><strong>pricing here</strong></a>.
      </p>
    </blockquote>
  </div>
<?php
}

function bitmovin_render_settings_menu() {
  $page_title = 'Bitmovin settings page';
  $menu_title = 'Bitmovin';
  $capability = 'manage_options';
  $menu_slug = 'bitmovin';
  $function = 'bitmovin_render_settings_page';
  $icon_url = 'dashicons-media-code';
  $position = 4;
  add_options_page($page_title, $menu_title, $capability, $menu_slug, $function);
}

if (!function_exists("bitmovin_register_apikey_setting")) {
  function bitmovin_register_apikey_setting() {
    register_setting('bitmovin-settings', 'bitmovin_apikey');
  }
}

add_action('admin_menu', 'bitmovin_render_settings_menu');
add_action('admin_init', 'bitmovin_register_apikey_setting');


function bitmovin_add_api_key() {
?>
  <script type="text/javascript">
    window.bitmovinApiKey = "<?php echo esc_js(get_option('bitmovin_apikey')); ?>";
  </script>
<?php
}
add_action('admin_head', 'bitmovin_add_api_key');

function bitmovin_admin_notice_add_api_key() {
  $apiKey = get_option('bitmovin_apikey');
  global $pagenow;

  if (!$apiKey || $apiKey === ''):
  ?>
  <div class="notice notice-warning is-dismissible">
      <p>Don't forget to add your API Key in order to make Bitmovin Streams plugin to work.<?php if ($pagenow !== 'options-general.php'): ?> Click <a href="<?php echo get_admin_url() . "options-general.php?page=bitmovin"; ?>">here to go to settings page.</a><?php endif; ?></p>
  </div>
  <?php
  endif;
}
add_action('admin_notices', 'bitmovin_admin_notice_add_api_key');
