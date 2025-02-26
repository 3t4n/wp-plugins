<?php

spl_autoload_register(function ( $class_name ) {
	
	if ( false !== strpos( $class_name, 'GHElementorAutocomplete' ) ) 
	{		
		$base_dir 		= GH_ELEMENTOR_AUTOCOMPLETE_PLUGIN_DIR . 'app';
		$class_name     = str_replace( array('/', '\\'), DIRECTORY_SEPARATOR, $class_name   );	
		$class_name 	= str_replace( 'GHElementorAutocomplete', '', $class_name );		
		$class_file 	= str_replace( 'GHElementorAutocomplete\\', '', $class_name ) . '.php';

		$file 			= $base_dir . $class_file;		
		
		if (file_exists($file)) 
		{			
			require $file;
		}		
	
	}
  
});