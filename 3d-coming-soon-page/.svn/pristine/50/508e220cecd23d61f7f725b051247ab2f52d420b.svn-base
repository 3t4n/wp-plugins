<?php
function contrix_csp_get_settings(){
    $s1 = get_option('contrix_csp');
    

    if(empty($s1))
        $s1 = array();

    $settings = $s1;


    return apply_filters( 'contrix_csp_get_settings', $settings );;
}
