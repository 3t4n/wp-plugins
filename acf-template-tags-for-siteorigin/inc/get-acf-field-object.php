<?php

// determine the source for field

if ( $instance['field']['source'] == 'loop') {
    $field = sanitize_text_field($instance['field']['field']);
    $source = $post->ID;
}

if ( $instance['field']['source'] == 'post_author') {
    $field = sanitize_text_field($instance['field']['field']);
    $source = 'user_' . $post->post_author;
}

if ( $instance['field']['source'] == 'queried_object') {
    $field = sanitize_text_field($instance['field']['field']);
    $source = get_queried_object();
}

if ( $instance['field']['source'] == 'option') {
    $field = sanitize_text_field($instance['field']['field']);
    $source = 'option';
}

// if (empty($source)) {
// 	return false;
// }

// check for cross linking via post object

if ( !empty($instance['field']['post_object_field']) ) {
    $post_object_field = sanitize_text_field($instance['field']['post_object_field']);
    $field = sanitize_text_field($instance['field']['field']);
    $post_object = get_field($post_object_field, $source);
    $source = $post_object->ID;
}

// check for sub field

if ($sub) {
    $field_object = get_sub_field_object($field, $source);
    $key = $field_object['key'];
} else {
    $field_object = get_field_object($field, $source);
    $key = $field_object['key'];
}

// conditional logic and empty values

if ( $instance['field']['source'] != 'post_author') {
    
    if ( !empty(get_post_meta($post->ID, $key, true)) && get_post_meta($post->ID, $key, true) != 'show' ) {
        return false;
    }
    
    if ( empty(get_field($key, $source)) && empty(get_sub_field($key, $source)) ) {
        return false;
    }
}

$return['field_object'] = $field_object;
$return['key'] = $key;
$return['source'] = $source;

if (!empty( $post_object->ID)) {
    $return['post_object'] = $post_object->ID;
} else {
    $return['post_object'] = false;
}
