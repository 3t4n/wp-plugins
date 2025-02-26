<?php 

/**
 * Plugin Name: AVENAZ D-Gallery
 * Plugin URI: http://www.avenaz.com
 * Description:This plugin is Folder Gallery
 * Version: 1.0
 * Author: Avenaz Team
 * Author URI: http://www.avenaz.com
 * License: GPL2
 */

?>

<?php

include('functions.php');

function call_file()
{include("folder_gallery_code.php");}

function register_folder_gallery_menu()
{
	$foldergallery_page_title = 'AVENAZ D Gallery';
	$foldergallery_menu_title = 'AVENAZ D Gallery';
	$foldergallery_capability = 'manage_options';
	$foldergallery_menu_slug = 'folder_gallery';
	$foldergallery_function = 'call_file';
	add_menu_page( $foldergallery_page_title , $foldergallery_menu_title , $foldergallery_capability , $foldergallery_menu_slug , $foldergallery_function, '', 3 );
}

add_action('admin_menu','register_folder_gallery_menu');
?>