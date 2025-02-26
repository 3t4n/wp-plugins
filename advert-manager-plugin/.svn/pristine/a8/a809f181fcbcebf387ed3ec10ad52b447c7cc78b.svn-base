<?php
include("../../../wp-blog-header.php");

//setid:id,setaction:act 

global $wpdb;
$id = $_POST['setid'];
$action = $_POST['setaction'];
$val = $_POST['setv'];

if($action=='deleteadvert'){
$wpdb->query( $wpdb->prepare(" DELETE FROM wp_advertmanage_joseph_db WHERE id = $id" ) );
echo "successfully deleted";
}else{
$wpdb->query("
	UPDATE wp_advertmanage_joseph_db SET status = '$val'
	WHERE ID=$id");
	
echo "successfully $val";
}