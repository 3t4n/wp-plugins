<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if (!function_exists('dd')) {
    function dd() {
        foreach (func_get_args() as $x) {
            echo '<pre>';
            print_r($x);
            echo '</pre>';
        }
        die;
    }
}
