<?php 
function KWM_force_download_intall_hook(){

	if ( version_compare( PHP_VERSION, '5.2.1', '<' )

	  	or version_compare( get_bloginfo( 'version' ), '3.3', '<' ) ) {

		deactivate_plugins( basename( __FILE__ ) );

	}

  	$arrayForceDownload = array('urlDownload' => 'download');

  	add_option( 'kwm_force_download', $arrayForceDownload );

} 



?>