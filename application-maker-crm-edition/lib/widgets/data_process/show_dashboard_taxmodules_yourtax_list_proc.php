<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//HERE DO DATA PROCES
global $wpdb;

$nbr = $widg['default_nbr'];
if (isset($widg['option_nbr_name'])) {
    $nbrtest = get_option($widg['option_nbr_name']);
    if ($nbrtest !== false and $nbrtest !== '') {
        $nbr = intval($nbrtest);
    }
}
//$activities = $this->getLatestActivities($mainkey, $widg['modules'], $nbr, $widg);
$modulestr = $widg['modules'];
$nbr = 500;
if (current_user_can('administrator')) {

    $acti = 'office_activated';
    if ($modulestr == 'ff_taxagents') {
        $acti = 'agent_activated';
    }
    $uid = $current_user->ID;
    $query = "SELECT DISTINCT  post_title, post_name , ID, post_status, post_date, post_type, post_author,post_modified, metaprivacy.meta_value as set_privacy, metaactivate.meta_value as is_activated
              FROM $wpdb->posts
              INNER JOIN $wpdb->postmeta  as metaprivacy  ON $wpdb->posts.ID = metaprivacy.post_id
               INNER JOIN $wpdb->postmeta as metaactivate ON  $wpdb->posts.ID = metaactivate.post_id
              WHERE post_type IN ('" . $modulestr . "')
              AND (
              (metaprivacy.meta_value = '1'  AND metaprivacy.meta_key = '" . $meta_name . "set_privacy')
              )
              AND (metaactivate.meta_value = '1'  AND  metaactivate.meta_key = '" . $meta_name .  $acti."')
               AND post_status IN ('publish', 'draft', 'pending')
              ORDER BY post_date DESC
              LIMIT 0,$nbr ";
} else {
    //
    $acti = 'office_activated';
    if ($modulestr == 'ff_taxagents') {
        $acti = 'agent_activated';
    }
    $uid = $current_user->ID;
    $query = "SELECT DISTINCT  post_title, post_name , ID, post_status, post_date, post_type, post_author,post_modified, metaprivacy.meta_value as set_privacy, metaactivate.meta_value as is_activated
              FROM $wpdb->posts
              INNER JOIN $wpdb->postmeta  as metaprivacy  ON $wpdb->posts.ID = metaprivacy.post_id
               INNER JOIN $wpdb->postmeta as metaactivate ON  $wpdb->posts.ID = metaactivate.post_id
              WHERE post_type IN ('" . $modulestr . "')
              AND ((post_author = $uid AND metaprivacy.meta_value = '1'  AND metaprivacy.meta_key = '" . $meta_name . "set_privacy')
                  OR ( metaprivacy.meta_value = '0'  AND metaprivacy.meta_key = '" . $meta_name . "set_privacy')
                  OR ( metaprivacy.meta_value = '2'  AND metaprivacy.meta_key = '" . $meta_name . "set_privacy' AND post_author = $uid )
              )
              AND (metaactivate.meta_value = '1'  AND  metaactivate.meta_key = '" . $meta_name .  $acti."')
               AND post_status IN ('publish', 'draft', 'pending')
              ORDER BY post_date DESC
              LIMIT 0,$nbr ";
}//metaactivate.meta_value = '1'  ANDSW
$posts_list = $wpdb->get_results($query);
$armodsnum = $this->getModuleNumbers($app);
$default_name = $widg['default_name'];
//var_dump($posts_list);
?>