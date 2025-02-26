<?php
$id = isset($_POST['id']) ? awescape($_POST['id']) : '';
if($id=='') {
	die('Invalid ID');
}

wp_delete_post($id, true);

$args = array(
	'post_type' => 'awesomeslider'
);

$loop = new WP_Query( $args );
include('fetch-sliders.php');
?>