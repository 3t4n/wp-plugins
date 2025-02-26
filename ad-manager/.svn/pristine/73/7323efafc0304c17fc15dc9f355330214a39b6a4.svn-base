<?php
require('../../../../wp-load.php');
if (isset($_POST['updateclick']) && $_POST['updateclick'] != '') {
    global $wpdb;    
    $table_name = $wpdb->prefix . "admanager";
    $sql = "UPDATE `".$table_name."` SET `clicks`=`clicks`+1 WHERE `id`='".$_POST['id']."'";
    $wpdb->query($sql);
}
?>