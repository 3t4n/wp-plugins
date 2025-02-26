<?php

if (!function_exists('amJL_check_url_existence')){
    function amJL_check_url_existence($url) {
        $time_out = array('timeout' => '5');
        $response = wp_remote_get($url, $time_out);

        // check status code
        $status_code = wp_remote_retrieve_response_code($response);

        if (!is_wp_error($response) && $status_code === 200) {
            return true;
        } else {
            return false;
        }
    }
}