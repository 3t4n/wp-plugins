<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$args = array(
    'orderby' => 'post_date',
    'order' => 'DESC',
    'posts_per_page' => 10,
    'post_type' => 'ff_taxannouncement',
    'meta_key' => 'announc_visibility',
    'meta_value' => array('all', 'tax_agent', 'tax_office', 'admin')
); 
$posts_array = get_posts($args);
$p = $posts_array[0];
?>