<?php

if (!function_exists('exactlinks_eqL')) {
    function exactlinks_eqL() {
        defined('SAVEQUERIES') || define('SAVEQUERIES', true);
    }
}

if (!function_exists('exactlinks_gql')) {
    function exactlinks_gql() {
        $result = [];
        foreach ((array) $GLOBALS['wpdb']->queries as $key => $query) {
            $result[++$key] = array_combine([
                'query', 'execution_time'
            ], array_slice($query, 0, 2));
        }
        return $result;
    }
}
