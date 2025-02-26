<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
global $current_user;

if(in_array('tax_office', $current_user->roles)){
    $args = array(
        'orderby' => 'post_date',
        'order' => 'DESC',
        'posts_per_page' => 10,
        'post_type' => 'ff_taxannouncement',
        'meta_key' => 'announc_visibility',
        'meta_value' => array('all', 'tax_office')
    );
}
elseif(in_array('tax_agent', $current_user->roles)){
    $args = array(
        'orderby' => 'post_date',
        'order' => 'DESC',
        'posts_per_page' => 10,
        'post_type' => 'ff_taxannouncement',
        'meta_key' => 'announc_visibility',
        'meta_value' => array('all', 'tax_agent')
    );
}
else{
    $args = array(
        'orderby' => 'post_date',
        'order' => 'DESC',
        'posts_per_page' => 10,
        'post_type' => 'ff_taxannouncement',
        'meta_key' => 'announc_visibility',
        'meta_value' => array('all')
    );    
}
$posts_array = get_posts($args);
$p = $posts_array[0];
?>