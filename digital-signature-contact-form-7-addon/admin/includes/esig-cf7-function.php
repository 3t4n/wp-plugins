<?php

if (!function_exists('ECF7_GET')) {

    function ECF7_GET($key) {
        $value = filter_input(INPUT_GET, $key, FILTER_DEFAULT);
        return sanitize_text_field($value);
    }

}

if (!function_exists('esig_cf7_get')) {

    function esig_cf7_get($name, $array = null) {

        if (!isset($array)) {
            return ECF7_GET($name);
        }

        if (is_array($array)) {
            if (isset($array[$name])) {
                $value = wp_unslash($array[$name]);
                if(is_array($value)){
                    return $value;
                }
                return wp_kses_post($value);
            }
            return false;
        }

        if (is_object($array)) {
            if (isset($array->$name)) {
                return wp_kses_post(wp_unslash($array->$name));
            }
            return false;
        }

        return false;
    }

}

if (!function_exists('ecf7_sanitize_init')) {
    function ecf7_sanitize_init($number) {
     return filter_var($number, FILTER_SANITIZE_NUMBER_INT);    
    }
}

?>