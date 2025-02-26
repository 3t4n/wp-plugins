<?php
$id = isset($_POST['id']) ? awescape($_POST['id']) : '';
if($id=='') {
	die('Invalid ID');
}

wp_delete_post($id, true);

$args = array(
	'post_type' => 'awesomeslide'
);

$loop = new WP_Query( $args );
include('fetch-slides.php');
?>