<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

ob_start();

 
$directory = CLICK_N_CHAT_DIR_PATH . 'includes/ajax/';
$files = glob($directory . '*.php');
foreach ($files as $file) {
	require_once $file;
}
$click_n_chat_is_active = get_option('click_n_chat_is_active');
$click_n_chat_is_enable = get_option('click_n_chat_is_enable');
$click_n_chat_is_enable == "1" && $click_n_chat_is_active == "1"  ? include_once( CLICK_N_CHAT_DIR_PATH . 'includes/parts/click_n_chat_popup.php') : '';
$click_n_chat_is_enable == "1" && $click_n_chat_is_active == "1"  ? include_once( CLICK_N_CHAT_DIR_PATH . 'includes/parts/click_n_chat_analytics.php') : '';
$click_n_chat_is_enable == "1" && $click_n_chat_is_active == "1"  ? include_once( CLICK_N_CHAT_DIR_PATH . 'includes/parts/click_n_chat_widget.php') : '';


