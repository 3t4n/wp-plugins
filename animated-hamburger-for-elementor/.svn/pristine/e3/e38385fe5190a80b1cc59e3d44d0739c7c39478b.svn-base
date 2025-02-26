<?php

spl_autoload_register(function ( $class_name ) {	

	if ( false !== strpos( $class_name, 'CliccheWidgetsForElementor' ) ) 
	{

		$base_dir 		= CLICCHE_ANIMATED_HAMBURGER_DIR . 'includes' . DIRECTORY_SEPARATOR;
		$class_name     = str_replace( array('/', '\\'), DIRECTORY_SEPARATOR, $class_name   );
		$class_name 	= str_replace( 'CliccheWidgetsForElementor', '', $class_name );	
		$class_file 	= str_replace( 'CliccheWidgetsForElementor\\', '', $class_name ) . '.php';

		$file 			= $base_dir . $class_file;

		// if the file exists, require it
		if (file_exists($file)) {
			require $file;
		}	
	} 
});
?>