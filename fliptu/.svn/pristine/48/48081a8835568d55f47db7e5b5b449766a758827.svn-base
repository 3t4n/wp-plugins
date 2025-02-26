<?php


function countResult($status){
global $wpdb;
$table_post=$wpdb->prefix.'posts';
$table_name=$wpdb->prefix.'fliptu';

$count	=count($wpdb->get_results("SELECT * FROM $table_name F INNER JOIN $table_post P ON F.page_id=P.ID where 1=1 AND F.page_slug!='HOME' AND P.post_status='$status'"));
return $count;

}


?>
