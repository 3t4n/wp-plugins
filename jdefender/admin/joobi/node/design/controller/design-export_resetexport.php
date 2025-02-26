<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Design_export_resetexport_controller extends WController {
function resetexport() {
	$libProgreC = WClass::get( 'library.progress' );
	$progressO = $libProgreC->get( 'design' );
	$path = $libProgreC->getFilePath();
	$fileS = WGet::file();
	if ( $fileS->exist( $path ) ) $fileS->delete( $path );
	if ( $fileS->exist( $path . '.done' ) ) $fileS->delete( $path . '.done' );
	$this->userS('1442980878KBRN');
	WPages::redirect( 'controller=design-export' );
	return true;
}
}