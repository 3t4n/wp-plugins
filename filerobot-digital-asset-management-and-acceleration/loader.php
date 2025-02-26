<?php
/**
 * Plugin Name: Scaleflex DAM - Digital Asset Management, Media Optimisation and Acceleration
 * Description: Scaleflex DAM normalizes, resizes, optimizes and distributes your images rocket fast around the world.
 * Version: 4.0.9
 * Requires PHP: 5.3.3
 * Requires at least: 4.8
 * Author: Scaleflex
 * Author URI: https://www.scaleflex.com/en/home
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: scaleflex-dam
 * Domain Path: /languages
 */

$plugin = plugin_basename(__FILE__);
load_plugin_textdomain('filerobot', false, dirname($plugin) . '/languages/');

$filerobot_class = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'filerobot_class.php';
$filerobot_api = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'filerobot_api.php';

function filerobot_plugin_settings_link($links)
{
    $url = esc_url(add_query_arg(
            'page',
            'scaleflex-dam',
            get_admin_url() . 'admin.php'
        )) . '&tab=settings';

    $settings_link = "<a href='$url'>" . __('Settings') . '</a>';

    array_unshift(
        $links,
        $settings_link
    );
    return $links;
}
add_filter("plugin_action_links_$plugin", 'filerobot_plugin_settings_link');

function filerobot_do_shortcode_tag($output, $tag, $attr)
{
    if ($tag == 'video') {
        if (preg_match('/mp4="([^"]+)"/', stripslashes(json_encode($attr)), $matches)) {
            $video_link = $matches[1];
            if (strpos($video_link, '.filerobot.') !== false) {
                $output = preg_replace('/src="[^"]+"/', 'src="' . $video_link . '"', $output);
                $output = preg_replace('/<a href="[^"]+">[^<]+<\/a>/', '<a href="' . $video_link . '">' . $video_link . '</a>', $output);
            }
        }
    } else if ($tag == 'audio') {
        if (preg_match('/mp3="([^"]+)"/', stripslashes(json_encode($attr)), $matches)) {
            $audio_link = $matches[1];
            if (strpos($audio_link, '.filerobot.') !== false) {
                $output = preg_replace('/src="[^"]+"/', 'src="' . $audio_link . '"', $output);
                $output = preg_replace('/<a href="[^"]+">[^<]+<\/a>/', '<a href="' . $audio_link . '">' . $audio_link . '</a>', $output);
            }
        }
    }
    return $output;
}
add_filter( 'do_shortcode_tag', 'filerobot_do_shortcode_tag', 10, 3);

function filerobot_add_style_to_block_editor( $settings ) {
    $settings['__unstableResolvedAssets']['styles'] .= $settings['__unstableResolvedAssets']['styles'] . '<link rel="stylesheet" id="filerobot-core-css-css" href="' . plugin_dir_url(__FILE__) . 'assets/styles/core.css' . '" media="all">';
    return $settings;
}
add_filter( 'block_editor_settings_all', 'filerobot_add_style_to_block_editor');

require $filerobot_class;
require $filerobot_api;

function filerobot_incompatibile($msg)
{
    require_once ABSPATH . DIRECTORY_SEPARATOR . 'wp-admin' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'plugin.php';
    deactivate_plugins(__FILE__);

    wp_die($msg);
}

if (is_admin() && (!defined('DOING_AJAX') || !DOING_AJAX)) {
    if (version_compare(PHP_VERSION, '5.3.3', '<')) {
        filerobot_incompatibile('Plugin Scaleflex DAM requires PHP 5.3.3 or higher. The plugin has now disabled itself.');
    }
}

function run_filerobot()
{
    $instance = new Filerobot();
    $instance->setup();
}

function on_activation()
{
    Filerobot::setup_db();
}

function on_deactivation()
{
    Filerobot::deactivate();
}

// function on_uninstall()
// {
//     Filerobot::uninstall();
// }

register_activation_hook(__FILE__, "on_activation");
register_deactivation_hook(__FILE__, 'on_deactivation');
// register_uninstall_hook(__FILE__, 'on_uninstall');

run_filerobot();
