<?php
function themoneytizer_load_statistics(){
    if ( !wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['_nonce'])), 'load_statistics') ) {
        return;
    }

    if(!current_user_can( 'manage_options' )){
        return 0;
    }
    

    $statistics = json_decode(get_option('themoneytizer_data_statistics'));
    if($statistics->validity != 'valid'){
        $payload = __('Vous n\'avez pas de statistiques à afficher','themoneytizer');
        echo json_encode(array('status' => 'no data', 'message' => $payload));
        return;
    }
    $statistics_list = $statistics->statistics;
    $rev_border = (array)$statistics->colors->rev_border;
    $rev_background = (array)$statistics->colors->rev_background;
    $cpm_border = (array)$statistics->colors->cpm_border;
    $cpm_background = (array)$statistics->colors->cpm_background;
    foreach($statistics_list as $date => $stats){
        $a_stats["Date"][] = $date;
        foreach($stats as $ad_stats){
            $a_stats[$ad_stats->ad_name.' CPM']['values'][] =  $ad_stats->cpm_display;
            $a_stats[$ad_stats->ad_name.' CPM']['borderColor'][] = $cpm_border[$ad_stats->ad_id];
            $a_stats[$ad_stats->ad_name.' CPM']['backgroundColor'][] = $cpm_background[$ad_stats->ad_id];
            $a_stats[$ad_stats->ad_name]['values'][] = $ad_stats->revenues;
            $a_stats[$ad_stats->ad_name]['borderColor'] = $rev_border[$ad_stats->ad_id];
            $a_stats[$ad_stats->ad_name]['backgroundColor'] = $rev_background[$ad_stats->ad_id];
        }
    }
    echo json_encode($a_stats);
    return;
}

add_action('wp_ajax_load_statistics', 'themoneytizer_load_statistics');