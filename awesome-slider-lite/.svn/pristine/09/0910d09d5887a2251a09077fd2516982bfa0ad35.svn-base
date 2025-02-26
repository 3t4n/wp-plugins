<?php
$slidename = isset($_POST['slidername']) ? awescape($_POST['slidername']) : '';
if($slidename=='') {
	die('Slidername Required');
}

$my_post = array(
	'post_title'    => $slidename,
	'post_type'    => 'awesomeslider',
	'post_status'   => 'publish'
);
// Insert the post into the database
wp_insert_post( $my_post );

$args = array(
	'post_type' => 'awesomeslider'
);

$loop = new WP_Query( $args );
include('fetch-sliders.php');
?>