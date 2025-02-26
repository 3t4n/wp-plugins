<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */

defined('JOOBI_SECURE') or die('J....');
class Main_Minify_class extends WClasses {
 	public function getMinifyThemes() {
 		$data = new stdClass;
 		$appsInfoC = WClass::get( 'apps.info' );
 		$data->token = $appsInfoC->getPossibleCode( 'onlyAll', 'token' );
 		if ( empty($data->token) ) {
 			$this->userE('1398110833SALX');
 			return false;
 		}
 		$data->url = $appsInfoC->myURL();
 		$mainServicesC = WClass::get( 'main.services' );
 		$data = $mainServicesC->getCredentials();
		if ( false === $data ) {
			$this->adminW( 'Your API Key is not valid to get unminified files, it requires a valid plan.' );
			return false;
		}
		$server = WPref::load( 'PAPPS_NODE_SERVICE' );
		$netcom = WNetcom::get();
		$received = $netcom->send( $server, 'serviceprovider', 'getMinify', $data );
		if ( empty( $received ) || is_string($received) ) {
			$RETURN = $received;
			$this->userE('1398110833SALY',array('$RETURN'=>$RETURN));
			return false;
		}
		$status = true;
		$count = 0;
		$filesA = unserialize( $received->files );
		$netcomRestC = WClass::get( 'netcom.rest' );
		if ( empty($filesA) ) return false;
		$this->_fileO = WGet::file();
		$this->_folderO = WGet::folder();
		foreach( $filesA as $oneTheme ) {
			$count++;
			$namekey = $oneTheme->fileName;
			$expA = explode( '.', $namekey );
			array_pop($expA);
			array_pop($expA);
			$type = array_pop($expA);
			switch( $type ) {
				case 'theme':
					$path = JOOBI_DS_THEME . $expA[1] . '/' . $expA[0];
					break;
				case 'node':
					$path = JOOBI_DS_NODE . $expA[0];
					break;
				case 'includes':
					$path = JOOBI_DS_INC . $expA[0];
					break;
				case 'skin':
					$path = JOOBI_DS_THEME . 'skin/' . $expA[0];
					break;
				default:
					continue;
					break;
			}
			$contentZip = $netcomRestC->fetchFile( $oneTheme->url );
			$tmp = JOOBI_DS_TEMP . 'theme_' . time() . '_' . $count . '.tar.gz';
			$status = $this->_fileO->write( $tmp, $contentZip, 'overwrite' );
			if ( false === $status ) break;
			$themeDest = JOOBI_DS_TEMP . 'themes_' . time() . '_' . $count;
			$status = $this->_fileO->extract( $tmp, $themeDest );
			if ( false === $status ) break;
			$status = $this->_folderO->copy( $themeDest, $path, 'add_over' );
			$this->_fileO->delete( $tmp );
			$this->_folderO->delete( $themeDest );
			if ( false === $status ) break;
		}
		return $status;
 	}
}
