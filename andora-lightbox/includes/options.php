<?php
/*
 */

function abcfal_optns_is_custom_post ( $postType ){

    if($postType == ABCFAL_POST_GALLERYL){
        return true;
    }
    else {return false;}
}

function abcfal_optns_post_theme($post){

    $postType = get_post_type( $post );
    $out = '';

    switch ($postType) {
        case ABCFAL_POST_GALLERYL:
            $out = 'galleryl';
            break;
        default:
            break;
    }
    return $out;
}


