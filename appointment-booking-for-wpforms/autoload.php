<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
class Booknow_Autoload {
	function __construct(){
		$dir = new RecursiveDirectoryIterator(BOOKNOW_PLUGIN_PATH);
		$dir->setFlags(RecursiveDirectoryIterator::SKIP_DOTS);
        $ite = new RecursiveIteratorIterator($dir);
        $files = new RegexIterator($ite, "/\.php/", RegexIterator::MATCH);
        foreach ($files as $file) {
            if (!$file->isDir()){
                require_once $file->getPathname();
            }
        }
	}
}
new Booknow_Autoload;