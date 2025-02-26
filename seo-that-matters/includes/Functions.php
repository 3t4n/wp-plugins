<?php

namespace SeoThatMatters;

defined('ABSPATH') or die('No script kiddies please!');

function plugin_field_setting($key = "", $default = false) {
    if (isset($_POST)) {
        if (isset($_POST[SEOTM_PREFIX][$key])) {
            return $_POST[SEOTM_PREFIX][$key];
        }
    }
    $value = plugin_instance()->Settings()->get($key, $default);
    return $value;
}
 
function plugin_db_field_setting($key = "", $default = false) {
    return plugin_instance()->Settings()->get($key, $default);
}

function plugin_array_value($data = array(), $default = false) {
    return isset($data) ? $data : $default;
}

function plugin_sanitize_text_field($value) {
    if (!is_array($value)) {
        return wp_kses_post($value);
    }
    foreach ($value as $key => $array_value) {
        $value[$key] = plugin_sanitize_text_field($array_value);
    }
    return $value;
}

function plugin_esc_html_e($value) {
    return plugin_sanitize_text_field($value);
}

function plugin_removeslashes($value) {
    return stripslashes_deep($value);
}

function plugin_kses($value, $callback = 'wp_kses_post') {
    if (is_array($value)) {
        foreach ($value as $index => $item) {
            $value[$index] = plugin_kses($item, $callback);
        }
    } elseif (is_object($value)) {
        $object_vars = get_object_vars($value);
        foreach ($object_vars as $property_name => $property_value) {
            $value->$property_name = plugin_kses($property_value, $callback);
        }
    } else {
        $value = call_user_func($callback, $value);
    }
    return $value;
}

function plugin_fix_json($matches) {
    return "s:" . strlen($matches[2]) . ':"' . $matches[2] . '";';
}
