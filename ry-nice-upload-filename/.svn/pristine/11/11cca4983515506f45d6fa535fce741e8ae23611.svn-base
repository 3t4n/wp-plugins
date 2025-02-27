<?php
/*
 * Plugin Name: RY Nice Upload FileName
 * Plugin URI: https://ry-plugin.com/ry-nice-upload-filename
 * Description: Rewrite upload filename if not english or number letter
 * Version: 1.0.9
 * Requires at least: 5.6
 * Requires PHP: 7.4
 * Author: Richer Yang
 * Author URI: https://richer.tw/
 * License: GPLv2 or later
 */

function_exists('plugin_dir_url') or exit('No direct script access allowed');

add_filter('sanitize_file_name', 'RY_NUFN_sanitize_file_name', 10, 2);
function RY_NUFN_sanitize_file_name($file_name, $filename_raw)
{
    $parts = explode('.', $file_name);
    if (1 == count($parts)) {
        $extension = '';
    } else {
        $extension = strtolower(array_pop($parts));
        $file_name = implode('.', $parts);
    }
    if (!preg_match('@^[a-z0-9][a-z0-9\-_\.]*$@i', $file_name)) {
        $file_name = substr(md5($filename_raw), 0, 10);
    }
    if ('' !== $extension) {
        $file_name .= '.' . $extension;
    }

    return $file_name;
}
