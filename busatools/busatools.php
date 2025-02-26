<?php
/**
 * Plugin Name: BusaTools
 * Description: BusaTools adds the busatools bst.js script that allows to use all BusaTools functionalities, including Website Analytics, User Session Recording, Heatmaps, Live Chat, Feedback forms, and Error and Regular Logging.
 * Version: 1.0.0
 * Author: Busatools
 * Author URI: https://busatools.com
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

function busatools_add_admin_page() {
    $icon_svg = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjEwMCUiIHZpZXdCb3g9IjAgMCAzODUgMzYzIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzODUgMzYzIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgogIDxwYXRoIGZpbGw9IiM5RTlFOUUiIG9wYWNpdHk9IjEuMDAwMDAwIiBzdHJva2U9Im5vbmUiIGQ9IiBNODUuNjg1MzQ5LDI0OS4wNDc3NDUgQzg3LjE0MDI2NiwyNTkuMzY0Mjg4IDgxLjU0Mjk5MiwyNjUuOTMxNTgwIDc0Ljg3MTMwMCwyNzIuMjE2ODg4IEM4MS41Njg3NzksMjg0LjUzNjM3NyA5MS4yMjQ4NzYsMjk0LjM2MTE0NSAxMDEuNjk3MjM1LDMwMy4wODUyOTcgQzExNy41MDY5ODEsMzE2LjI1NTgyOSAxMzUuNjM2MTg1LDMyNS42NzA4MzcgMTU1LjY0Nzg3MywzMzAuNzQ5MTc2IEMxNzIuNzY1NTMzLDMzNS4wOTMxNzAgMTkwLjE0NTI5NCwzMzcuNjIzMTk5IDIwNy45MDA2NjUsMzM0LjM5NTU5OSBDMjE2LjgzODI0MiwzMzIuNzcwOTA1IDIyNi4wODUyMjAsMzMyLjQyNjUxNCAyMzQuNzgzNDE3LDMzMC4wMjMzMTUgQzI0My43Njk3NDUsMzI3LjU0MDUyNyAyNTIuMjI2MTY2LDMyMy4xNzQzNzcgMjYwLjk4Mzc5NSwzMTkuODEyOTU4IEMyNjQuNjc3NjQzLDMxOC4zOTUxNzIgMjY4LjU0OTI1NSwzMTcuNDQwNDkxIDI3Mi4zNDA4NTEsMzE2LjI3NTA4NSBDMjc0Ljc5NjQ3OCwzMjQuMTcwMDQ0IDI3NC40MTUyODMsMzI0LjY3NTQ0NiAyNjguMzg0MjQ3LDMyNy45NjY5ODAgQzI1My41OTc5MDAsMzM2LjAzNjc0MyAyMzcuOTY3OTU3LDM0MS44NDY0MzYgMjIxLjM2NjM2NCwzNDQuNDQ3NzIzIEMyMDUuMDM5NzE5LDM0Ny4wMDU5MjAgMTg4LjU4NzkwNiwzNDguNDY1MDI3IDE3Mi4xMTU4MjksMzQ0LjkyNzQyOSBDMTY0LjYwMjAzNiwzNDMuMzEzNzgyIDE1Ni43NzA2NzYsMzQyLjg1MDgwMCAxNDkuNDgyMTMyLDM0MC41ODM4MDEgQzEzMy43ODk1ODEsMzM1LjcwMjgyMCAxMTguNjM2OTI1LDMyOS4xODYzMTAgMTA1LjQ0MDU3NSwzMTkuMjY4NDk0IEM5Ni4yOTE0NTgsMzEyLjM5MjM2NSA4Ny44Mzg5NjYsMzA0LjUwNDU3OCA3OS42MjI2MjcsMjk2LjUwNjQzOSBDNzUuMjMyMzMwLDI5Mi4yMzI3MjcgNzEuOTM1MzcxLDI4Ni44MTYyNTQgNjguMjc2MDM5LDI4MS44MTk1MTkgQzY2LjQzMzY3OCwyNzkuMzAzODMzIDY0Ljg1NDI0OCwyNzguMTM1MDEwIDYxLjA5OTM1NCwyNzguNTgxODE4IEM0MC4yMTk0NTIsMjgxLjA2NjM3NiAyMy40Njk5ODYsMjYzLjA3NzE3OSAyOC45MzIyNjQsMjQyLjM0OTg1NCBDMzIuNTIxMDMwLDIyOC43MzE4MTIgNDQuMTcyNjUzLDIxOS4xOTY3OTMgNTcuMzc5MzAzLDIxOS4yODY5NTcgQzcyLjE5Mzc5NCwyMTkuMzg4MTA3IDg3LjExMTU0MiwyMzQuNDAxNzY0IDg1LjY4NTM0OSwyNDkuMDQ3NzQ1IHoiLz4KICA8cGF0aCBmaWxsPSIjOUY5RjlGIiBvcGFjaXR5PSIxLjAwMDAwMCIgc3Ryb2tlPSJub25lIiBkPSIgTTI2OC4wNjY5NTYsNjIuMTkwMzM4IEMyNzAuMDE1MDc2LDU4LjQ4OTA3MSAyNzIuNzYyNzI2LDU4LjY5Mjc5MSAyNzUuMzE5NDg5LDYwLjUxODc4NyBDMjgyLjIzMzg1Niw2NS40NTY5NDAgMjg5LjM3NzA0NSw3MC4xODA3NTYgMjk1LjcyNDc5Miw3NS43ODczOTIgQzMxOS40MjgwMDksOTYuNzIzMTUyIDMzNS41OTgxNzUsMTIyLjU3MDIyOSAzNDMuNzAzNTUyLDE1My4xMzk5ODQgQzM0Ny43OTc2MDcsMTY4LjU4MDkxNyAzNDkuNDQ0NjExLDE4NC40ODk3MzEgMzQ4LjY0MTgxNSwyMDAuNDk4OTQ3IEMzNDguMzMxNzI2LDIwNi42ODI2OTMgMzQ3LjE5MTk1NiwyMTIuODUyMzU2IDM0Ni4wMzkxMjQsMjE4Ljk1NDU1OSBDMzQ1LjQ3MzIwNiwyMjEuOTQ5OTY2IDM0Ni4wNTI3MzQsMjIzLjc0NTE3OCAzNDguNTY0NDIzLDIyNS42MDQ5OTYgQzM2OC4yMDQxNjMsMjQwLjE0NzQ0NiAzNjQuMjY0NTI2LDI2NS4wMTg3OTkgMzQ1LjU3NDkyMSwyNzUuMzc4NTQwIEMzMzQuNzcxMTE4LDI4MS4zNjcxMjYgMzIzLjY1NzEzNSwyODAuNTEwMzc2IDMxMy45Nzc3MjIsMjczLjM5NjYwNiBDMzAzLjA1MjQ2MCwyNjUuMzY3MjQ5IDI5OC41MDk1NTIsMjQ5Ljg0ODc3MCAzMDUuMTAwMjUwLDIzNi4zMjg0NjEgQzMxMC4xMTE1NDIsMjI2LjA0ODE1NyAzMjUuMjM3MTIyLDIxNy44NDMyNDYgMzM0Ljk1NzAwMSwyMTkuODI2MzI0IEMzMzcuMDEzMzM2LDIwNS45MTc2MDMgMzM3LjQ5NzMxNCwxOTIuMTEyNTM0IDMzNi40ODc1MTgsMTc3Ljk5ODU5NiBDMzM0Ljg2MzQwMywxNTUuMjk3Njg0IDMyNy4zOTQ5MjgsMTM0Ljc4MTE1OCAzMTUuOTU2Nzg3LDExNS41ODIzMDYgQzMwOC4xNDAyODksMTAyLjQ2MjQxMCAyOTcuNjI1MTUzLDkxLjQzNzQ5MiAyODUuODAwNTY4LDgxLjc2OTIxMSBDMjgwLjU2MTQzMiw3Ny40ODU0ODEgMjc1LjAwODA1Nyw3My41ODU5OTEgMjY5LjU5NDc1Nyw2OS41MTU0NDIgQzI2Ny4xMDkxMzEsNjcuNjQ2MzU1IDI2Ni40MTkyODEsNjUuMzY2MjcyIDI2OC4wNjY5NTYsNjIuMTkwMzM4IHoiLz4KICA8cGF0aCBmaWxsPSIjQTBBMEEwIiBvcGFjaXR5PSIxLjAwMDAwMCIgc3Ryb2tlPSJub25lIiBkPSIgTTQyLjIyOTExOCwxNjcuMzQ0NzQyIEM0NC43MDEwOTIsMTU3LjI5MjY3OSA0Ni42MDkzMzcsMTQ3LjQ2Njc4MiA0OS43NzMxODYsMTM4LjA2MzMzOSBDNTQuNzM2NzYzLDEyMy4zMTA4NTIgNjIuNjAzNzMzLDEwOS44MzU4OTkgNzIuNDIyNTIzLDk3LjkwODI5NSBDODAuMTQ2NjkwLDg4LjUyNTE2MiA4OS4zMzIwMjQsODAuMjU5OTAzIDk4LjQyMzc5MCw3Mi4xMTgzOTMgQzEwNC4xNTcyMDQsNjYuOTg0MjMwIDExMC41NTAxNTYsNjIuMzMwMzg3IDExNy4yODkzMjIsNTguNjMwNjAwIEMxMzAuMDY1NTUyLDUxLjYxNjQ3OCAxNDIuOTkxOTEzLDQ0LjcyNjA1NSAxNTcuNjQ2MzkzLDQyLjA5ODk1MyBDMTYxLjgyNzExOCw0MS4zNDk0ODAgMTY0Ljk4MTA3OSwzOS44NTMyMDcgMTY2LjYxMDQyOCwzNC42Mjg3NjkgQzE2OS4yMzI4MDMsMjYuMjIwMzYwIDE3NC40ODU2NTcsMTguNTM2NDU3IDE4My4xOTgwOTAsMTUuNTgyNDI3IEMxOTIuNzIwMTIzLDEyLjM1Mzg5MyAyMDcuNDI2NTQ0LDEzLjE2NzIzMyAyMTUuMzMzNjc5LDIyLjIwMzQ2NiBDMjI0LjcxNzIzOSwzMi45MjY5OTEgMjI1LjM2MTc0MCw0My45ODkxNTEgMjIwLjYyNTA2MSw1Ni4xNjI2MDUgQzIxNi41MzIzNDksNjYuNjgxMDM4IDE5OC42MDU3MjgsNzQuMjQ1NDE1IDE4Ny4xNzAwMjksNzEuNDI2MDg2IEMxNzcuNzk5ODgxLDY5LjExNTk5MCAxNzEuMzkyNjA5LDYzLjM3MzQxMyAxNjcuNTAxNTcyLDU1LjE1NjgzMCBDMTY1Ljc2MDkyNSw1MS40ODExNTkgMTYzLjg5MjE1MSw1MS4yNDU3NTAgMTYxLjA3OTUyOSw1Mi4xNjUwNjYgQzE1My44NDAwODgsNTQuNTMxMzA3IDE0Ni43NzExOTQsNTcuNDQ5MTMxIDEzOS40NzI3NjMsNTkuNTk4NTc2IEMxMjUuOTM3NTg0LDYzLjU4NDc5MyAxMTQuOTAwNTU4LDcxLjc4ODQ1MiAxMDMuOTI4OTU1LDgwLjA4NDE0NSBDOTMuNjA2NTYwLDg3Ljg4ODk2OSA4NS4yODgxOTMsOTcuNTEyMzIxIDc3LjY5MDU5MCwxMDguMDY0NTc1IEM2OC44NjU2OTIsMTIwLjMyMTQxOSA2Mi40MDQwODcsMTMzLjU4MDI5MiA1Ny40MTQwOTMsMTQ3LjY0MTU3MSBDNTUuMzYwNTU0LDE1My40MjgyMjMgNTMuODMzNTExLDE1OS41MDQwMTMgNTIuOTgxOTkxLDE2NS41NzY1OTkgQzUyLjQ3MDM1MiwxNjkuMjI1MzI3IDUwLjA0Nzc3OSwxNzAuNzg3NTA2IDQ3LjcxMzE2NSwxNzEuMzk5ODI2IEM0Ni4zMDAyODksMTcxLjc3MDQwMSA0NC4wODM4MDksMTY5LjA3NzA3MiA0Mi4yMjkxMTgsMTY3LjM0NDc0MiB6Ii8+Cjwvc3ZnPg==';
    add_menu_page('BusaTools Plugin', 'BusaTools', 'manage_options', 'busatools-plugin', 'busatools_admin_index', $icon_svg, 110);
}

add_action('admin_menu', 'busatools_add_admin_page');

function busatools_admin_index() {
    // Check if the options are set and not empty
    $busatools_id = get_option('busatools_id');
    $busatools_api_key = get_option('busatools_api_key');
    $initial_link = "https://app.busatools.com/sites/";
    $custom_link = "https://app.busatools.com/dashboard/?id=" . $busatools_id;
    ?>
    <div class="wrap">
        <h1><?php echo esc_html__('BusaTools Settings', 'busatools'); ?></h1>
        <?php if (empty($busatools_id) || empty($busatools_api_key)): ?>
          <div style="background-color: #f7f7f7; padding: 10px; border-left: 4px solid #0073aa;">
              <?php
              // translators: %1$s is the URL for the BusaTools site.
              $message = __('<p>Get your key and ID for <strong>free</strong> on <a href="%1$s" class="button button-primary" target="_blank">BusaTools Site</a></p><p>Create your account, add your website domain and navigate to the "Tracking Code" section within "Settings" from the sidebar.</p><p><strong>Get started in less than 1 minute!</strong></p>', 'busatools');
              echo wp_kses(sprintf($message, esc_url($initial_link)), array('p' => array(), 'strong' => array(), 'a' => array('href' => array(), 'class' => array(), 'target' => array())));
              ?>
          </div>
          <?php else: ?>
          <div style="background-color: #f7f7f7; padding: 10px; border-left: 4px solid #0073aa;">
              <?php
              // translators: %1$s is the URL for the user's BusaTools dashboard.
              $message = __('Your BusaTools ID and API Key are set. Access <a href="%1$s" class="button button-primary" target="_blank">BusaTools</a> to access all functionalities.</p>', 'busatools');
              echo '<p>' . wp_kses(sprintf($message, esc_url($custom_link)), array('p' => array(), 'a' => array('href' => array(), 'target' => array(), 'class' => array()))) . "</p>";
              ?>
          </div>
          <?php endif; ?>

        <form method="post" action="options.php">
            <?php settings_fields('busatools-settings-group'); ?>
            <?php do_settings_sections('busatools-plugin'); ?>
            <table class="form-table" role="presentation">
                <tbody>
                <tr>
                    <th scope="row"><label for="busatools_id"><?php echo esc_html__('BusaTools ID', 'busatools'); ?></label></th>
                    <td><input name="busatools_id" type="text" id="busatools_id" value="<?php echo esc_attr(get_option('busatools_id')); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="busatools_api_key"><?php echo esc_html__('BusaTools API Key', 'busatools'); ?></label></th>
                    <td>
                        <input name="busatools_api_key" type="text" id="busatools_api_key" value="<?php echo esc_attr(get_option('busatools_api_key')); ?>" class="regular-text">
                    </td>
                </tr>
                <!-- Add any additional settings here following the same pattern -->
                </tbody>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}




function busatools_register_settings() {
    register_setting('busatools-settings-group', 'busatools_id');
    register_setting('busatools-settings-group', 'busatools_api_key');
}

add_action('admin_init', 'busatools_register_settings');

add_action('admin_notices', 'busatools_admin_notice');

function busatools_admin_notice() {
    // Check if the options are set and not empty
    $busatools_id = get_option('busatools_id');
    $busatools_api_key = get_option('busatools_api_key');

    // Condition to check if either of the options is missing or empty
    if (empty($busatools_id) || empty($busatools_api_key)) {
        // Notice message
        $message = __('Please fill in your BusaTools ID and API Key to start using BusaTools.', 'your-text-domain');
        // Link to the plugin settings page
        $settings_link = admin_url('admin.php?page=busatools-plugin');
        // Prepare the link HTML
        $link_html = sprintf('<a href="%s">%s</a>', esc_url($settings_link), __('Settings Page', 'your-text-domain'));
        // Complete notice HTML with proper escaping
        echo wp_kses(
            "<div class=\"notice notice-warning is-dismissible\"><p>" . esc_html($message) . " " . $link_html . "</p></div>",
            array(
                'div' => array('class' => array()),
                'p' => array(),
                'a' => array('href' => array())
            )
        );
    }
}



function busatools_insert_js() {
    // Retrieve the ID from the plugin's settings
    $busatools_id_encoded = get_option('busatools_id');
    // Get the current website domain
    $site_domain = wp_parse_url(get_bloginfo('url'), PHP_URL_HOST);
    ?>
    <script>
      var bstConfig = {
              pid: "<?php echo esc_attr($busatools_id_encoded); ?>",
              domain: "<?php echo esc_attr($site_domain); ?>"
          };
          window.bstEventQueue = [];
          window.bst_event = function(eventName, metadata, callback) {
              window.bstEventQueue.push({ eventName, metadata, callback });
          };
    </script>
    <script defer src="https://app.busatools.com/js/bst.js"></script>

    <?php
}


add_action('wp_head', 'busatools_insert_js');

function busatools_load_textdomain() {
    load_plugin_textdomain('busatools', false, basename(dirname(__FILE__)) . '/languages');
}

add_action('plugins_loaded', 'busatools_load_textdomain');
