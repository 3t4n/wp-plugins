<?php
/*
 Plugin Name: Embedder
 Plugin URI: http://moztools.com/embedder-plugin
 Description: A single plugin for managing all your embeds.
 Version: 1.3.5
 Author: Mike Walker
 Author URI: http://moztools.com
 */

/*  Copyright 2010-2018  Michael J. Walker (email: mike@moztools.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.
    
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

global $wpdb;

define('EMB_PLUGIN_DIR', strtr(dirname(__FILE__), '\\', '/'));
define('EMB_PLUGIN_URL', plugins_url().'/'.substr(EMB_PLUGIN_DIR, strrpos(EMB_PLUGIN_DIR, '/') + 1));
define('EMB_DEBUG', false);
define('EMB_PLUGIN_VERSION', '1.3.2');
define('EMB_PLUGIN_FILE', substr(EMB_PLUGIN_URL, strrpos(EMB_PLUGIN_URL, '/') + 1).'/emb-main.php');
define('EMB_TABLE', $wpdb->prefix.'emb_embeds');
define('EMB_PAGEPREFIX', 'settings_page_');
define('EMB_PAGEID', 'embed-admin');
define('EMB_PAGENAME', 'options-general.php?page='.EMB_PAGEID);

if (is_admin()) {
    require_once('emb-admin.php');
    register_activation_hook(__FILE__, 'emb_plugin_activate');
    register_deactivation_hook(__FILE__, 'emb_plugin_deactivate');
    add_action('admin_menu', 'emb_add_admin_page');
    add_action('contextual_help', 'emb_add_help_text', 10, 3);
} else {
    require_once('emb-embed.php');
    $new_parser = get_option('emb_new_parser') == 'true';
    //  update_option('emb_new_parser', $new_parser ? 'false' : 'true');
    if ($new_parser) {
        include_once 'emb-parser.php';
    } else {
        // Add the global embeds as soon as we can.
        add_action('wp', 'emb_add_global_embeds');
        // Add local embeds once the current post has been set.
        // Will be called as many times as there are posts on the page.
        add_action('the_post', 'emb_add_local_embeds');
        // Insert the auto-embeds around post content.
        add_filter('the_content', 'emb_add_post_auto_embeds');
        // Make embeds work in titles.
        add_filter('the_title', 'do_shortcode', 12);
        // Strip the shortcodes from the title because they cannot be processed.
        add_filter('wp_title', 'emb_remove_shortcodes', 11);
        // Make embeds work in comments.
        add_filter('comment_text', 'do_shortcode', 12);
        // Make embeds work in widget titles.
        add_filter('widget_title', 'do_shortcode', 12);
        // Make embeds work in widget text.
        add_filter('widget_text', 'do_shortcode', 12);
    }
}

/*
 * COMMON FUNCTIONS
 */

/**
 * Return the regex for matching an attribute default.
 */
function emb_get_match_default($parser = false) {
    return '((?:[^\\\\'.($parser ? '}' : '%').']|\\\\.)*)';
}

/**
 * Get an array of attributes in the embed value along with
 * their default values.
 */
function emb_get_embed_attributes($value) {
    $attributes = array();
    $count = preg_match_all('/(?:%([\w-]+?)='.emb_get_match_default().'%)'             // Match old-style %% default
    .'|(?:\{\$([\w-]+?)='.emb_get_match_default(true).'\})'     // Match new-style {$} default
    .'|(?:%([\w-]+?)%)'                                         // Match old-style no default
    .'|(?:\{\$([\w-]+?)\})/', $value, $matches);                // Match new-style no default
    // Fetch the attributes without default values first.
    foreach ($matches[5] as $attr) {
        if (!empty($attr)) {
            $attributes[$attr] = '';
        }
    }
    foreach ($matches[6] as $attr) {
        if (!empty($attr)) {
            $attributes[$attr] = '';
        }
    }
    // Then the ones with defaults, so they overwrite those without (old style attribute)
    foreach ($matches[1] as $index => $attr) {
        $attr = trim($attr);
        if (!empty($attr)) {
            $attributes[$attr] = str_replace(array('\\\\', '\\%'), array('\\', '%'), $matches[2][$index]);
        }
    }
    // Then the ones with defaults, so they overwrite those without (new style attribute)
    foreach ($matches[3] as $index => $attr) {
        $attr = trim($attr);
        if (!empty($attr)) {
            $attributes[$attr] = str_replace(array('\\\\', '\\}'), array('\\', '}'), $matches[4][$index]);
        }
    }
    return $attributes;
}

/**
 * Test to see if the disabled option is set.
 * @param string $options
 * @return true if disabled is set
 */
function emb_is_disabled($options) {
    return strpos($options, 'disabled') !== false;
}

/**
 * DEBUG function to send trace output to a trace file on the server.
 * For debugging purposes only.
 *
 * @param $output output to be sent to trace file
 */
function emb_trace($output, $array = 0) {
    if (EMB_DEBUG) {
        $handle = fopen(ABSPATH.'trace', 'a+');
        fwrite($handle, $output);
        if (!empty($array)) {
            fwrite($handle, $implode(", ", $array));
        }
        fwrite($handle, "\n");
        fclose($handle);
    }
}

/**
 * DEBUG function for println out information on the web page.
 * Does not work in cases where the webpage is not being generated.
 *
 * @param $value string to be output.
 */
function emb_println($value) {
    echo '<span style="color:red;background:yellow">'.$value.'</span><br/>';
}

function emb_print_r($var) {
    echo str_replace(chr(10), '<br>', print_r($var, true));
}

if (!function_exists('_debug')) {
    function _debug() {
        global $user_ID;
        return !empty($user_ID);
    }
}

if (!function_exists('_pr')) {
    function _pr($var) {
        if (_debug()) {
            echo str_replace(chr(10), '<br>', print_r($var, true));
        }
    }
}

if (!function_exists('_echo')) {
    function _echo($output) {
        if (_debug()) {
            echo $output.'<br/>';
        }
    }
}

function emb_print_t($var) {
    emb_trace(print_r($var, true));
}
?>