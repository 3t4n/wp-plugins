<?php
$slidename = isset($_POST['slidename']) ? awescape($_POST['slidename']) : '';
if($slidename=='') {
	die('Slidename Required');
}

$my_post = array(
	'post_title'    => $slidename,
	'post_type'    => 'awesomeslide',
	'post_status'   => 'publish'
);
// Insert the post into the database
wp_insert_post( $my_post );

$args = array(
	'post_type' => 'awesomeslide'
);

$loop = new WP_Query( $args );
include('fetch-slides.php');
?>