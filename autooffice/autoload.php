<?php 

function aopf_autoloader($class_name) {
	if (strpos($class_name, 'Autooffice')!==false) {
		$path = realpath(AOPF_AUTOOFFICE_DIR) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . $class_name . '.php';
		if (file_exists($path) && !class_exists($class_name)) {	
			require_once $path;
		}
	}
}

spl_autoload_register('aopf_autoloader');