<?php
$slideid = isset($_POST['slideid']) ? awescape($_POST['slideid']) : '';
if($slideid=='') {
	die('Slidename Required');
}

$aw_slide_data = isset($_POST['aw_slide_data']) ? awescape($_POST['aw_slide_data']) : '';

$my_post = array(
	'ID' => $slideid,
	'post_content' => $aw_slide_data
);

// Update the post into the database
wp_update_post( $my_post );
?>