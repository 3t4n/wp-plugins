<?php
if (!function_exists('opm_img_field_setting')) {
    function opm_img_field_setting($key = "", $default = false)
    {
        if (isset($_POST)) {
            if (isset($_POST['opm_img'][$key])) {
                return $_POST['opm_img'][$key];
            }
        }

        $value = opm_img()->Settings()->get($key, $default);
        return $value;
    }
}

if (!function_exists('opm_img_array_value')) {
    function opm_img_array_value($data = array(), $default = false)
    {
        return isset($data) ? $data : $default;
    }
}


if (!function_exists('opm_img_sanitize_text_field')) {
    function opm_img_sanitize_text_field($value)
    {
        if (!is_array($value)) {
            return wp_kses_post($value);
        }

        foreach ($value as $key => $array_value) {
            $value[$key] = opm_img_sanitize_text_field($array_value);
        }
        return $value;

    }
}
if (!function_exists('opm_img_esc_html_e')) {
    function opm_img_esc_html_e($value)
    {
        return opm_img_sanitize_text_field($value);

    }
}

if (!function_exists('opm_img_removeslashes')) {
    function opm_img_removeslashes($value)
    {
        return stripslashes_deep($value);
    }
}


if (!function_exists('opm_img_kses')) {
    function opm_img_kses($value, $callback = 'wp_kses_post')
    {
        if (is_array($value)) {
            foreach ($value as $index => $item) {
                $value[$index] = opm_img_kses($item, $callback);
            }
        } elseif (is_object($value)) {
            $object_vars = get_object_vars($value);
            foreach ($object_vars as $property_name => $property_value) {
                $value->$property_name = opm_img_kses($property_value, $callback);
            }
        } else {
            $value = call_user_func($callback, $value);
        }

        return $value;
    }
}

if (!function_exists('tw_fix_json')) {
    function tw_fix_json($matches)
    {
        return "s:" . strlen($matches[2]) . ':"' . $matches[2] . '";';
    }
}
