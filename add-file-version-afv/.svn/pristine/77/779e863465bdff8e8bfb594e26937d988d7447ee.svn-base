<?php

//Get initial data
add_filter('wp_ajax_afv_get_init_data', 'afv_get_init_data');
add_action('wp_ajax_nopriv_afv_get_init_data', 'afv_get_init_data');
function afv_get_init_data() {
    global $wpdb;

    $afv_auto_ver = get_option("afv_auto_ver");
    $afv_ver_target_file = get_option("afv_ver_target_file");
    $afv_manual_ver = get_option("afv_manual_ver");
    $afv_manual_ver_input = get_option("afv_manual_ver_input");

    echo json_encode(array(
        "status" => "success",
        "afv_auto_ver" => $afv_auto_ver,
        "afv_manual_ver" => $afv_manual_ver,
        "afv_manual_ver_input" => $afv_manual_ver_input,
        "afv_ver_target_file" => $afv_ver_target_file,
    ));

    die();

} //end of afv_get_init_data()


//Set auto ver
add_filter('wp_ajax_afv_save_changes', 'afv_save_changes');
add_action('wp_ajax_nopriv_afv_save_changes', 'afv_save_changes');
function afv_save_changes() {
    global $wpdb;

    update_option("afv_auto_ver", sanitize_text_field($_REQUEST['auto_ver_val']));
    update_option("afv_ver_target_file", sanitize_text_field($_REQUEST['ver_target_file']));
    update_option("afv_manual_ver", sanitize_text_field($_REQUEST['manual_ver_val']));
    update_option("afv_manual_ver_input", sanitize_text_field($_REQUEST['manual_ver_input']));

    echo json_encode(array(
        "status" => "success",
    ));

    die();

} //end of afv_save_changes()
