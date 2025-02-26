<?php
/*****************************************************
       "All Post Contact Form"'s LANGUAGE File
            Created by RainbowLink Inc.
*****************************************************/
$SERVER_ACCEPT_LANGUAGE = 'en';
if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
$SERVER_ACCEPT_LANGUAGE = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
}
    if ( is_admin() ) {
        if (preg_match('/^ja/i', $SERVER_ACCEPT_LANGUAGE)) {
            include rl_apcf_dir_path.'rl-apcf-admin-ja.php';
        }elseif (preg_match('/^ar/i', $SERVER_ACCEPT_LANGUAGE)) {
            include rl_apcf_dir_path.'rl-apcf-admin-ar.php';
        }elseif (preg_match('/^zh/i', $SERVER_ACCEPT_LANGUAGE)) {
            include rl_apcf_dir_path.'rl-apcf-admin-zh.php';
        }else{
            include rl_apcf_dir_path.'rl-apcf-admin.php';
        }
    }else{
        if (preg_match('/^ja/i', $SERVER_ACCEPT_LANGUAGE)) {
            include rl_apcf_dir_path.'rl-apcf-public-ja.php';
        }elseif (preg_match('/^ar/i', $SERVER_ACCEPT_LANGUAGE)) {
            include rl_apcf_dir_path.'rl-apcf-public-ar.php';     
        }elseif (preg_match('/^zh/i', $SERVER_ACCEPT_LANGUAGE)) {
            include rl_apcf_dir_path.'rl-apcf-public-zh.php';     
        }else{
            include rl_apcf_dir_path.'rl-apcf-public.php';
        }
    }

