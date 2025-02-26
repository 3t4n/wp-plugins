<?php
// admin/includes/logging.php

if (!function_exists('conditional_log')) {
    function conditional_log($message) {
        $enable_error_log = get_option('spwai_enable_error_log', 'yes');
        if ($enable_error_log === 'yes') {
            error_log($message);
        }
    }
}