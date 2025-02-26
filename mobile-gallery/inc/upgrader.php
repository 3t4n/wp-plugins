<?php 

$mg_options = get_option( 'mg_options' );

if ( !$mg_options) { // Create the defaults for a new installation

$mg_options['version'] = MOBILE_GALLERY_VERSION;
$mg_options['add_to_front'] = 'true';

update_option( 'mg_options', $mg_options );	

} else {  /* Update options for an existing installation */
	
	if ( $mg_options['version'] < 1.1 ) {
		// add new options for 1.1
	}

	$mg_options['version'] = MOBILE_GALLERY_VERSION;
	update_option( 'mg_options', $mg_options );
}

?>