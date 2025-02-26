<?php

// This makes save functions for post.
if (!function_exists('amJL_post_data_save')){
    function amJL_post_data_save($post_id, $name, $type){

        switch($type){
            case 'text':
                $value = sanitize_text_field(filter_input(INPUT_POST, $name));
                if($value !== NULL && $value !== ''){
                    update_post_meta($post_id, $name, $value);
                }else{
                    delete_post_meta($post_id, $name);
                }
                break;
    
            case 'url':
                $value = filter_input(INPUT_POST, $name, FILTER_SANITIZE_URL);
                if($value !== NULL && $value !== ''){
                    update_post_meta($post_id, $name, $value);
                }else{
                    delete_post_meta($post_id, $name);
                }
                break;
    
            case 'int':
                $value = filter_input(INPUT_POST, $name, FILTER_SANITIZE_NUMBER_INT);
                if($value !== NULL && $value !== ''){
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