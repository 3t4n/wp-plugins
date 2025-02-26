<?php
include("../../../wp-blog-header.php");
//require_once(ABSPATH . 'wp-blog-header.php');
global $wpdb;
$img = $_POST['a'];
$desc = $_POST['b'];
$titlepost = $_POST[c];
$url = $_POST['d'];
$texttitle = $_POST['e'];
$stat = 'Active';
if($desc!='' || $titlepost!='' || $url!=''){
	$wpdb->query( $wpdb->prepare("
	INSERT INTO wp_advertmanage_joseph_db
	( advert_text, post_title, advert_url, advert_img, advert_description, status )
	VALUES (%s,%s,%s,%s,%s,%s)",
    $texttitle, $titlepost,$url, $img ,$desc, $stat));
	echo "successfull added";
}else{
	echo "failed";
	return false;
}