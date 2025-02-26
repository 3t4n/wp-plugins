<?php
$id = isset($_POST['id']) ? awescape($_POST['id']) : '';
if($id=='') {
	die('Invalid ID');
}

$slidename = isset($_POST['slidername']) ? awescape($_POST['slidername']) : '';
if($slidename=='') {
	die('Slidername Required');
}

$my_post = array(
	'ID' => $id,
	'post_title' => $slidename
);

// Update the post into the database
wp_update_post( $my_post );

$args = array(
	'post_type' => 'awesomeslider'
);

$loop = new WP_Query( $args );
include('fetch-sliders.php');
?>