<?php
/**
 * Created by IntelliJ IDEA.
 * User: administrator
 * Date: 12/03/2019
 * Time: 10:10 AM
 */

function adop_amp_get_default_amp_url() {
    preg_match('/(.*?)((?:\.co)?.[a-z]{2,4})$/i', $_SERVER['SERVER_NAME'], $match);
    $match = explode('.', $match[1]);
    foreach($match AS $val) {
        $domain = $val;
    }
    $_RETURN = ADOP_AMP_URL . '/' . $domain;

    return $_RETURN;
}

function adop_amp_set_default_options() {
    add_option('adop_amp_url', adop_amp_get_default_amp_url());
    add_option('adop_amp_header_date', date('Y-m-d'));
}

function adop_amp_reset_default_options() {}

function adop_amp_unset_default_options() {
    delete_option('adop_amp_url');
    delete_option('adop_amp_header_date');
}

function adop_amp_get_default_options() {
    $_RETURN['adop_amp_url'] = get_option('adop_amp_url') == '' ? adop_amp_get_default_amp_url() : get_option('adop_amp_url') ;
    $_RETURN['adop_amp_header_date'] = get_option('adop_amp_header_date') == '' ? date('Y-m-d') : get_option('adop_amp_header_date');
    return $_RETURN;
}