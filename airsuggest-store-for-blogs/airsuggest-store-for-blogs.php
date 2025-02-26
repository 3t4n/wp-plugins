<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://webcyst.com/
 * @since             1.0.0
 * @package           Airsuggest_Store_For_Blogs
 *
 * @wordpress-plugin
 * Plugin Name:       Airsuggest Store For Blogs
 * Plugin URI:        http://airsuggest.com/
 * Description:       Using this plugin we can add Airsuggest Store button in our blog site and show own products in the iframe.
 * Version:           1.1
 * Author:            Webcyst
 * Author URI:        http://webcyst.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       airsuggest-store-for-blogs
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}
define('AIRSUGGEST_STORE_FOR_BLOGS_VERSION', '1.1');

function activate_airsuggest_store_for_blogs() {
    
}

function deactivate_airsuggest_store_for_blogs() {
    
}

add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'airsuggest_add_settings_link');

function airsuggest_add_settings_link($links) {
    $links[] = '<a href="' .
            admin_url('options-general.php?page=airsuggest-store-settings') .
            '">' . __('Settings') . '</a>';
    return $links;
}

register_activation_hook(__FILE__, 'activate_airsuggest_store_for_blogs');
register_deactivation_hook(__FILE__, 'deactivate_airsuggest_store_for_blogs');

function airsuggest_add_menu() {
    add_submenu_page("options-general.php", "Airsuggest API Key", "Airsuggest API Key", "manage_options", "airsuggest-store-settings", "airsuggest_store_for_blogs_page");
}

add_action("admin_menu", "airsuggest_add_menu");

function airsuggest_store_for_blogs_page() {
    ?>
    <div class="wrap">
        <h1>Airsuggest API Key</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields("airsuggest_store_for_blogs_api_key");
            do_settings_sections("airsuggest-setting-section");
            ?>
        </form>
    </div>

    <?php
}

function airsuggest_store_for_blogs_settings() {
    add_settings_section("airsuggest_store_for_blogs_api_key", "", null, "airsuggest-setting-section");
    add_settings_field("airsuggest_store_api_key", "", "airsuggest_store_for_blogs_options", "airsuggest-setting-section", "airsuggest_store_for_blogs_api_key");
    register_setting("airsuggest_store_for_blogs_api_key", "airsuggest_store_api_key");
}

add_action("admin_init", "airsuggest_store_for_blogs_settings");

function airsuggest_store_for_blogs_options() {
    ?>
    <div class="postbox" style="width: 70%; padding: 30px;">
        <p>
            <label><b>Enter Vendor API Key</b></label><br>
            <input type="text" pattern="[a-z,A-Z,0-9]{16}" placeholder="API Key" name="airsuggest_store_api_key" style="width:100%;"
                   value="<?php echo stripslashes_deep(esc_attr(get_option('airsuggest_store_api_key'))); ?>" /> 
            You get key from your <a href="https://airsuggest.com/">vendor account panel</a>
        </p><br/>
        <br/>
        <div style="text-align:right;"><?php submit_button(); ?></div>
    </div>
    <?php
}

/* header Code */

function airsuggest_content_header() {
    ?>
    <script>
        var apikey = "<?php echo stripslashes_deep(esc_attr(get_option('airsuggest_store_api_key'))); ?>";
        window.addEventListener("load", function () {
            var isjquery = false;
            if (!window.jQuery) {
                var script = document.createElement("script");
                script.onload = function () {
                    isjquery = true;
                };
                script.type = "text/javascript", script.src = "//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js", document.getElementsByTagName("head")[0].appendChild(script)
            } else {
                isjquery = true;
            }
            tmepinterval = setInterval(function () {
                if (isjquery == true) {
                    jQuery("head").append("<script src=\"https://www.airsuggest.com/airsuggest_external/airsuggest-store-for-blogs.js\" media=\"screen\"><script>");
                    clearInterval(tmepinterval);
                }
            }, 400);
        });
    </script>
    <?php
}
add_action('wp_head', 'airsuggest_content_header');

/* Footer Code */
function airsuggest_content_footer() {

}

add_action('wp_footer', 'airsuggest_content_footer');

