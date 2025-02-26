<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//HERE DO DATA PROCESS

global $wpdb;

$nbr = 500;
switch($widg['type_widget']){
    case 'a':
        $query = "SELECT DISTINCT  post_title, ID, post_date, metadesc.meta_id as data_id
              FROM $wpdb->posts
		INNER JOIN $wpdb->postmeta as metadesc ON  $wpdb->posts.ID = metadesc.post_id
                 INNER JOIN $wpdb->postmeta as metatype ON  $wpdb->posts.ID = metatype.post_id
                  INNER JOIN $wpdb->postmeta as metawidget ON  $wpdb->posts.ID = metawidget.post_id
              WHERE post_type IN ('ff_taxtips')
              AND(metatype.meta_key = 'tip_type' AND metatype.meta_value = 'a')
              AND(metawidget.meta_key = 'tip_widget' AND metawidget.meta_value = '".$widg['tip_widget']."')
              AND metadesc.meta_key = 'tips_description'
              AND post_status IN ('publish')
              ORDER BY post_date DESC
              LIMIT 0,$nbr";
        break;
    
    case 'b':
        $query = "SELECT DISTINCT  post_title, ID, post_date, metadesc.meta_id as data_id
              FROM $wpdb->posts
		INNER JOIN $wpdb->postmeta as metadesc ON  $wpdb->posts.ID = metadesc.post_id
                 INNER JOIN $wpdb->postmeta as metatype ON  $wpdb->posts.ID = metatype.post_id
                  INNER JOIN $wpdb->postmeta as metawidget ON  $wpdb->posts.ID = metawidget.post_id
              WHERE post_type IN ('ff_taxtips')
              AND(metatype.meta_key = 'tip_type' AND metatype.meta_value = 'b')
              AND(metawidget.meta_key = 'tip_widget' AND metawidget.meta_value = '".$widg['tip_widget']."')
              AND metadesc.meta_key = 'tips_description'
              AND post_status IN ('publish')
              ORDER BY post_date DESC
              LIMIT 0,$nbr";
        break;
    
    case 'c':
        $query = "SELECT DISTINCT  post_title, ID, post_date, metaurl.meta_value as tip_url, metadesc.meta_id as data_id
              FROM $wpdb->posts
              INNER JOIN $wpdb->postmeta  as metaurl  ON $wpdb->posts.ID = metaurl.post_id
		INNER JOIN $wpdb->postmeta as metadesc ON  $wpdb->posts.ID = metadesc.post_id
                 INNER JOIN $wpdb->postmeta as metatype ON  $wpdb->posts.ID = metatype.post_id
                  INNER JOIN $wpdb->postmeta as metawidget ON  $wpdb->posts.ID = metawidget.post_id
              WHERE post_type IN ('ff_taxtips')
              AND metaurl.meta_key = 'tip_url'
              AND(metatype.meta_key = 'tip_type' AND metatype.meta_value = 'c')
              AND(metawidget.meta_key = 'tip_widget' AND metawidget.meta_value = '".$widg['tip_widget']."')
              AND metadesc.meta_key = 'tips_description'
              AND post_status IN ('publish')
              ORDER BY post_date DESC
              LIMIT 0,$nbr";
        break;
        
    case 'd':
        $query = "SELECT DISTINCT  post_title, ID, post_date, metaurl.meta_value as tip_url, metavideo.meta_value as tip_video, metadesc.meta_id as data_id
              FROM $wpdb->posts
              INNER JOIN $wpdb->postmeta  as metaurl  ON $wpdb->posts.ID = metaurl.post_id
               INNER JOIN $wpdb->postmeta as metavideo ON  $wpdb->posts.ID = metavideo.post_id
		INNER JOIN $wpdb->postmeta as metadesc ON  $wpdb->posts.ID = metadesc.post_id
                 INNER JOIN $wpdb->postmeta as metatype ON  $wpdb->posts.ID = metatype.post_id
                  INNER JOIN $wpdb->postmeta as metawidget ON  $wpdb->posts.ID = metawidget.post_id
              WHERE post_type IN ('ff_taxtips')
              AND metaurl.meta_key = 'tip_url'
              AND(metatype.meta_key = 'tip_type' AND metatype.meta_value = 'd')
              AND(metawidget.meta_key = 'tip_widget' AND metawidget.meta_value = '".$widg['tip_widget']."')
              AND metavideo.meta_key = 'tip_video'
              AND metadesc.meta_key = 'tips_description'
              AND post_status IN ('publish')
              ORDER BY post_date DESC
              LIMIT 0,$nbr";
        break;
}
$posts_list = $wpdb->get_results($query);
$armodsnum = $this->getModuleNumbers($app);
//var_dump($posts_list);
?>