<?php
$sliderid = isset($_POST['sliderid']) ? awescape($_POST['sliderid']) : '';
if($sliderid=='') {
	die('Slider id Required');
}

$aw_slider_data = isset($_POST['aw_slider_data']) ? awescape($_POST['aw_slider_data']) : '';

$my_post = array(
	'ID' => $sliderid,
	'post_content' => $aw_slider_data
);

// Update the post into the database
wp_update_post( $my_post );
?>