<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Download_class extends WClasses {
public function download($fileInfoO) {
	$name = $fileInfoO->name;
	$path = $fileInfoO->path;
	$type = $fileInfoO->type;
	$size = $fileInfoO->size;
	$secure = $fileInfoO->secure;
	$fileName2use = $fileInfoO->name;
	$tname = $fileName2use;
		$tname = WGlobals::filter( $tname, 'path' );
	if ( !empty($path) ) $path .= DS;
	if ( $secure ) {
		$directory = 'safe';
	} elseif ( $secure ) {
		$directory = 'media';
				if ( $size == 0 || $size > 10000000 ) {
			$url = JOOBI_URL_USER . str_replace( DS, '/', $directory . '/' . $path ) . $name . '.' . $type;
			WPages::redirect( $url );
		}
	}
	WTools::increasePerformance( null, ($size * 1.2) );
	$completePath = JOOBI_DS_USER . $directory . '/' . $path . $name . '.' . $type;
		ob_end_clean();
	$status = $this->downloadFile( $completePath );
	if ( ob_get_level() ) ob_end_clean();
	return $status;
}
	public function downloadFileContent($contents,$name,$type,$size=null) {
		if ( empty($contents) ) return false;
		if ( empty($size) ) $size = strlen($contents);
				$fichier = preg_replace('#[^a-z0-9\.]#i', '_', $name );
				$httpRange = 0;
		$HTTPServerRange = WGlobals::get( 'HTTP_RANGE', null, 'server' );
		if ( !empty($HTTPServerRange) ) {
			list( $a, $httpRange ) = explode( '=', $HTTPServerRange );
			str_replace($httpRange, '-', $httpRange);
			$newFileSize = $size - 1;
			$newFileSizeHR	= $size - $httpRange;
			header("HTTP/1.1 206 Partial Content");
			header("Accept-Ranges: bytes");
			header("Content-Length: ".(string)$newFileSizeHR);
			header("Content-Range: bytes ".$httpRange . $newFileSize .'/'. $size);
		} else {
			header( 'Content-Length: ' . $size );
		}
		header( 'Content-type: application/' . $type );
		header( 'Content-Disposition: attachment; filename="' . $fichier . '.' . $type . '"' ); 		header( 'Content-Transfer-Encoding: binary' );
		header( 'Cache-Control: public, must-revalidate' );
		header( 'Cache-Control: pre-check=0, post-check=0, max-age=0' );
		header( 'Pragma: public' );
		header( 'Expires: 0' );
		echo $contents;
		exit();
	}
	public function downloadFile($file) {
		$fileS = WGet::file();
		if ( ! $fileS->exist( $file ) ) {
			$this->userE('1463581239HHVR');
			WMessage::log( $file, 'download-failed' );
			return false;
		}
				WMessage::log( 'Exporting file: ' . $file, 'download-file' );
		if ( ob_get_level() ) ob_end_clean();
				if ( ini_get('zlib.output_compression') ) {
			@ini_set('zlib.output_compression', 'Off' );
		}
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename=' . basename($file) );
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file) );
		if ( $fd = fopen( $file, 'rb' ) ) {
			while ( !feof($fd) ) {
				print fread( $fd, 1024 );
			}			fclose($fd);
		}
		exit;
	}
}