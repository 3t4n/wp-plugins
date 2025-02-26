<?php 
function w404_make_backup(){
	$theme = get_template_directory();	
	$uploader_404_main = wp_upload_dir();	
	$uploader_404 = $uploader_404_main['basedir'];  
	$uploader_404 = $uploader_404 . '/404-page-editor';
	if( is_file( $uploader_404.'/404.php') ){
		@unlink( $uploader_404.'/404_backup.php' );
		copy( $uploader_404.'/404.php', $uploader_404.'/404_backup.php' );	
	}
	
}
function w404_restore_backup(){
	$theme = get_template_directory();	
	$uploader_404_main = wp_upload_dir();	
	$uploader_404 = $uploader_404_main['basedir'];  
	$uploader_404 = $uploader_404 . '/404-page-editor';
	if( is_file( $uploader_404.'/404_backup.php') ){
		@unlink( $uploader_404.'/404.php' );
		copy( $uploader_404.'/404_backup.php', $uploader_404.'/404.php' );
	}
	
}
?>