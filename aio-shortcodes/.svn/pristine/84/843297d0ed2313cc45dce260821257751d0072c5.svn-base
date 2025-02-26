<?php
 
 /**
 * Plugin Name: AIO Shortcodes
 * Plugin URI: https://aioshortcodes.com/
 * Description: Elevate your WordPress experience with AIO Shortcodes - the powerhouse plugin offering AllinOne shortcodes list. Seamlessly automate your website's SEO, all without touching a single line of code. Explore dynamic possibilities for posts, pages, widgets etc.
 * Version: 1.3.3.2
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Author: AIO Shortcodes
 * Author URI: https://aioshortcodes.com/
 * License: GPL-2.0-or-later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: aio-shortcodes
 *
 * @package   AIO Shortcodes
 * @link      https://aioshortcodes.com/
 * @since     1.0
 */

if (!defined("WPINC")) {
    die();
}

define("AIO_SHORTCODES_VERSION", "1.3.3.2");



/**
 * Custom shortcode to display shortcode name along with its output.
 * Example usage: [sn name="aio_date" go="x"] (Output: [date go="x"])
 */
function display_aio_sn_shortcode($atts, $content = null) {
    if (empty($atts['name'])) {
        // If the 'name' attribute is missing, display an error message.
        return '<span style="color: red;">Error: Missing "name" attribute in the shortcode.</span>';
    }

    $shortcode = '[' . $atts['name'];

    // Add any attributes to the shortcode
    foreach ($atts as $attribute => $value) {
        if ($attribute !== 'name') {
            $shortcode .= ' ' . $attribute . '="' . $value . '"';
        }
    }

    $shortcode .= ']';
   
    if ($content) {
        // If the shortcode has inner content, display it.
        $output = $content;
    } else {
        // Otherwise, display the actual shortcode output with the 'aio-sn' class.
        $output = '<span class="aio-sn">' . $shortcode . '</span>';
    }

    return $output;
}

add_shortcode('sn', 'display_aio_sn_shortcode');




/**
 * Add CSS class 'aio-style' to all shortcodes.
 **/
function aiosc_add_shortcode_css_class($content) {
    // Regex pattern to match all shortcodes except 'sn'
    $pattern = '/\[(?!sn\b)([^\]]+)\]/'; // Matches shortcodes that are not [sn]
    $replacement = '<span class="aio-style">[$1]</span>';
    
    // Apply 'aio-style' class to shortcodes except 'sn'
    $content = preg_replace($pattern, $replacement, $content);
    
    return $content;
}

add_filter('the_content', 'aiosc_add_shortcode_css_class');


// Include all PHP files in a given folder and its subdirectories
function include_files_recursively($folder) {
    $files = glob($folder . '/*.php');
    foreach ($files as $file) {
        require_once $file;
    }

    $subdirectories = glob($folder . '/*', GLOB_ONLYDIR);
    foreach ($subdirectories as $subdirectory) {
        include_files_recursively($subdirectory);
    }
}

// Specify the root folder
$shortcode_root_folder = plugin_dir_path(__FILE__) . "includes/shortcodes/";

// Include all PHP files from the root folder and its subdirectories
include_files_recursively($shortcode_root_folder);





require_once plugin_dir_path(__FILE__) . "includes/custom-plugins/rankmath.php";


// Include shortcode support files
require_once plugin_dir_path(__FILE__) . "admin/aio-admin-bar.php";
require_once plugin_dir_path(__FILE__) . "admin/aiosc-support.php";
require_once plugin_dir_path(__FILE__) . "admin/main-settings.php";

// Shortcodes Settings In Plugins
add_filter("plugin_action_links_aio-shortcodes/aio-shortcodes.php", "aiosc_settings_link");

function aiosc_settings_link($links)
{
    // Create the "Shortcode List" link in bold.
    $shortcode_list_link =
         '<a style="font-weight: bold;" href="https://aioshortcodes.com/shortcodes/" target="_blank">' .
    __("Shortcodes List", "aio-shortcodes") .
    "</a>";

    // Create the "Settings" link.
    $settings_link =
    '<a style="font-weight: 500;" href="' .
    admin_url('admin.php?page=aio_shortcodes_settings') . // Adjust the slug to the actual settings page URL
    '">' .
    __("Settings", "aio-shortcodes") .
    "</a>";

    // Find the position of the "Deactivate" link in the $links array.
    $deactivate_index = array_search("deactivate", array_keys($links));

    // Insert the "Shortcode List" link right before the "Deactivate" link.
    if (false !== $deactivate_index) {
        array_splice($links, $deactivate_index, 0, $settings_link);
        array_unshift($links, $shortcode_list_link);
    }

    return $links;
}

function generate_shortcode_plugin_row_meta( $links, $file ) {
	if ( strpos( $file, 'aio-shortcodes.php' ) !== false ) {
		$new_links = array(
							'<a href="https://aioshortcodes.com/docs/" target="_blank">Documentation</a>',
							'<a href="https://profiles.wordpress.org/hkharpreetkumar1/#content-plugins" target="_blank">More Plugins</a>',
						);
		$links = array_merge( $links, $new_links );
	}
	
	return $links;
}


function igenerate_shortcode_plugin_row_meta( $links, $file ) {
	if ( strpos( $file, 'aio-shortcodes.php' ) !== false ) {
		$new_links = array(
							'<a href="https://aioshortcodes.com/docs/?utm_source=site-plugins-list&utm_medium=installed-plugins-list&utm_campaign=aiosc-pluginlist" target="_blank">Documentation</a>',
							'<a href="https://profiles.wordpress.org/hkharpreetkumar1#content-plugins" target="_blank">More Plugins</a>',
						);
		$links = array_merge( $links, $new_links );
	}
	
	return $links;
}
add_filter( 'plugin_row_meta', 'igenerate_shortcode_plugin_row_meta', 10, 2 );

