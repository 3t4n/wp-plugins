<?php
$id = isset($_POST['id']) ? awescape($_POST['id']) : '';
if($id=='') {
	die('Invalid ID');
}

$slidename = isset($_POST['slidename']) ? awescape($_POST['slidename']) : '';
if($slidename=='') {
	die('Slidename Required');
}

$my_post = array(
	'ID' => $id,
	'post_title' => $slidename
);

// Update the post into the database
wp_update_post( $my_post );

$args = array(
	'post_type' => 'awesomeslide'
);

$loop = new WP_Query( $args );
include('fetch-slides.php');
?>