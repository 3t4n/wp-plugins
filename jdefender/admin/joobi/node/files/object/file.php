<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Files_File_object {
	var $name = ''; 	var $type = ''; 	var $fileID = ''; 	var $basePath = '';		var $path = '';
	var $thumbnail = false;	
	var $secure = false; 	
	var $storage = null;	
	public function fileURL($thumbnail=false) {
		$fileInstance = WGet::file( $this->storage );
		if ( empty($fileInstance) ) return false;
		$fileInstance->setFileInformation( $this );
		return $fileInstance->fileURL( $thumbnail );
	}
	public function isImage() {
				$fileInstance = WGet::file( $this->storage );
		if ( empty($fileInstance) ) return false;
		if ( in_array( $this->type, array( 'png', 'gif', 'jpeg', 'jpg' ) ) ) return true;
		else false;
	}	
}