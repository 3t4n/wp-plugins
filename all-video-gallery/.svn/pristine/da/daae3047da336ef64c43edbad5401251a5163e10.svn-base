<?php

_e( "<span class='description'>All Video Gallery is the Fastest Growing Online Video Platform. For More visit <a href='http://allvideogallery.mrvinoth.com' target='_blank'>All Video Gallery</a>.</span>" );

global $wpdb;
$table_name = $wpdb->prefix . "allvideogallery_categories";
$data       = array();

/******************************************************************
/* Execute Actions
******************************************************************/
$opt = isset( $_GET['opt'] ) ? $_GET['opt'] : '';
switch($opt) {
	case 'add'   :
		require_once('_add.php');
		break;
	case 'edit'  :
		require_once('_edit.php');
		break;
	case 'delete':
		require_once('_delete.php');
		break;
	default:
		require_once('_grid.php');
}

?>