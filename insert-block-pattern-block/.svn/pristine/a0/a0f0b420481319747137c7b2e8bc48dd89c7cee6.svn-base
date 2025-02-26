<?php
/**
 * Plugin Name:     Insert Block Pattern Block
 * Plugin URI:
 * Description:     Gutenberg Block for inserting Theme Block Patterns into page/post or into a insertable block areas (like columns).
 * Author:          Espen Munthe
 * Author URI:      https://espenmunthe.com
 * Text Domain:     ibpb
 * Domain Path:     /languages
 * Version:         1.0
 * License:         GPLv2 or later
 *
 * @package         Insert_Block_Pattern_Block
 */

define('IBPB__FILE__', __FILE__);
define('IBPB__DIR__', __DIR__);

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

$packageJSONFileName = IBPB__DIR__ . "/package.json";
$packageJSONFile = file_get_contents($packageJSONFileName);
$packageJSON = json_decode($packageJSONFile, true);
$ibpbVersion = $packageJSON["version"];
define('IBPB_VERSION', $ibpbVersion);

function ibpb_write_string_file($stringToAddAsLine)
{
    $file = IBPB__DIR__ . '/log.txt';

    $output = var_export($stringToAddAsLine, true) . chr(0x0D) . chr(0x0A);

    file_put_contents($file, $output, FILE_APPEND | LOCK_EX);
}

// PLUGIN LANGUAGES
function ibpb_load_plugin_textdomain()
{
    load_plugin_textdomain('ibpb', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}

add_action('plugins_loaded', 'ibpb_load_plugin_textdomain');

// ENQUE BLOCK ASSETS
function ibpb_enqueue_block_editor_assets()
{

    register_block_type('ibpb/insert-block-pattern', array(
        'apiVersion' => 2,
        'editor_script' => 'ibpb-blocks-registration'
    ));

}

add_action('enqueue_block_editor_assets', 'ibpb_enqueue_block_editor_assets');

function ibpb_enqueue_scripts()
{

    wp_register_script(
        'ibpb-blocks-registration',
        plugin_dir_url(IBPB__FILE__) . 'dist/ibpb_blocks_registration.js',
        array('wp-components', 'wp-element', 'wp-blocks', 'wp-data', 'wp-block-editor', 'wp-i18n', 'wp-dom-ready'),
        IBPB_VERSION
    );

    if (function_exists('wp_set_script_translations')) {
        wp_set_script_translations('ibpb-blocks-registration', 'ibpb');
    }

    wp_enqueue_script('ibpb-blocks-registration');

}

add_action('admin_enqueue_scripts', 'ibpb_enqueue_scripts');

/**
 * Plugin Block Category
 */

function ibpb_block_category($categories)
{
    $category_slugs = wp_list_pluck($categories, 'slug');
    if (!in_array('ibpb', $category_slugs, true)) {
        $categories = array_merge(
            $categories,
            array(
                array(
                    'slug' => 'ibpb',
                    'title' => __('Insert Block Pattern', 'ibpb'),
                    'icon' => null
                )
            )
        );
    }

    return $categories;
}

add_filter('block_categories', 'ibpb_block_category');

if (is_admin()) {

    /*
     *
     * USES pre_load_script_translations to SOLVE an issue with setting of language json path to plugins/languages
     *
     */

    add_filter('pre_load_script_translations', function ($translation, $file, $handle, $domain) {
        if ($handle === 'ibpb-blocks-registration') {
            if (strpos($file, 'wp-content/') !== false) {
                $wp_content_pos = strpos($file, 'wp-content/');
                $pre_wp_content = substr($file, 0, $wp_content_pos);

                $locale = get_locale();

                $new_json_path = $pre_wp_content . 'wp-content/plugins/insert-block-pattern-block/languages/ibpb-' . $locale . '-ibpb-blocks-registration.json';

                $importJSON = file_get_contents($new_json_path, FILE_USE_INCLUDE_PATH);
                if ($importJSON !== false) {
                    $trimmedJSON = json_encode(json_decode($importJSON));
                    return $trimmedJSON;
                }
            }
        }
        return $translation;
    }, 10, 4);
}
