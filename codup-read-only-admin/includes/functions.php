<?php
if (!defined('ABSPATH'))
    exit;

function croa_is_read_only_admin(){
    
    $current_user = wp_get_current_user();         
        
    if(in_array('administrator', $current_user->roles)){
        if(get_user_meta($current_user->ID, 'read_only_admin', true)){
            return true;
        }
    }
    return false;        
}

function croa_get_all_post_types() {

    $output = 'names';
    $operator = 'and';
    
    return get_post_types('', $output, $operator);        
}