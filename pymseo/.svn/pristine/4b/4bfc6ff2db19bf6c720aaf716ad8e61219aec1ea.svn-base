<?php
// ###############################
// UX/UI -> Subir archivos no permitidos
// ###############################

add_filter( 'upload_mimes', 'fun_pymseo_upload_mimetypes', 1, 1 );
function fun_pymseo_upload_mimetypes( $mime_types ) {
 	if (get_option('pymseoUploadFileSvg')) {$mime_types['svg'] = 'image/svg+xml';} // Adding .svg extension
	if (get_option('pymseoUploadFileJson')) {$mime_types['json'] = 'application/json';} // Adding .json extension
	if (get_option('pymseoUploadFileRar')) {$mime_types['rar'] = 'application/x-rar-compressed';} // Adding .rar extension
	if (get_option('pymseoUploadFile7z')) {$mime_types['7z'] = 'application/x-7z-compressed';} // Adding .7z extension
	
	//unset( $mime_types['xls'] );  // Remove .xls extension
 	//unset( $mime_types['xlsx'] ); // Remove .xlsx extension
	
  return $mime_types;	
}
?>