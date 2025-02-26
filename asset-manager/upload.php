<?php
/**
 * Upload file to temp directory and return image information in JSON format.
 */
require('../../../wp-load.php');
require('paam-config-ajax.php');

if (!current_user_can('edit_pages')) die("No permission.");

if (isset($_FILES['Filedata'])) {
	$file_name = $_FILES['Filedata']['name'];
	
	$extension = substr(strrchr($file_name, '.'), 1);
	
	if ($extension == 'php') die("Invalid file extension.");
		
	//$unique_name = str_replace('-', '', uniqid()) . '.' . $extension;
	// not using unique names
	$unique_name = $file_name;
	move_uploaded_file($_FILES['Filedata']['tmp_name'], PAAM_TEMPPATH . $unique_name);
	
	echo '{result: 1, name: "' . $unique_name . '", path: "' . PAAM_TEMPURL . '/' . $unique_name . '"}';
}
