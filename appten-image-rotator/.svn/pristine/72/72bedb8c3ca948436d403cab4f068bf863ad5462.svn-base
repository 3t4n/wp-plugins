<?php

/******************************************************************
/* Deleting the Table Row
******************************************************************/
if($_GET['page'] == 'appten_imagerotator' && $_GET['opt'] == 'delete') {
	$wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id=%d ",$_GET['id']));
	echo '<script>window.location="?page=appten_imagerotator";</script>';
}

?>