<?php

// This makes save functions for post.
if (!function_exists('amJL_post_data_save')){
    function amJL_post_data_save($post_id, $name, $type){

        $value = filter_input(INPUT_POST, $name);

        switch($type){
            case 'text':
                if($value !== NULL && $value !== ''){
                    $value = sanitize_text_field($value);
                    update_post_meta($post_id, $name, $value);
                }else{
                    delete_post_meta($post_id, $name);
                }
                break;
    
            case 'url':
                if($value !== NULL && $value !== ''){
                    $value = sanitize_url($value);
                    update_post_meta($post_id, $name, $value);
                }else{
                    delete_post_meta($post_id, $name);
                }
                break;
    
            case 'int':
                if($value !== NULL && $value !== ''){
                    $value = absint($value);
                    update_post_meta($post_id, $name, $value);
                }else{
                    delete_post_meta($post_id, $name);
                }
                break;
    
            default:
                break;
        }
    }
}