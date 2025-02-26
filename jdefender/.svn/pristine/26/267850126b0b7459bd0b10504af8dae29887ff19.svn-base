<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Main_cache_listing_view extends Output_Listings_class {
	function prepareQuery() {
		$fileClass = WGet::file();		
		$systemFolderC = WGet::folder();
		$folder = WApplication::cacheFolder();
		$files = $systemFolderC->folders( $folder, '', true, false );	
		$objData = array();					
		if ( !empty($files) ) {
			foreach($files as $one_file) {
				$objElement = new stdClass;
				$objElement->filename = $one_file;
				$objButtonO = WPage::newBluePrint( 'button' );
				$objButtonO->text = WText::t('1206732372QTKL');
				$objButtonO->type = 'infoLink';
				$objButtonO->link = WPage::routeURL( 'controller=main-cache&task=delete&folder=' . $one_file );
				$objButtonO->color = 'warning';
				$objButtonO->icon = 'fa-trash';
				$objElement->filename2 =  '<center>' . WPage::renderBluePrint( 'button', $objButtonO ) . '</center>';
				$objData[]=$objElement;
			}
		}
		if ( !empty($objData) ) $this->addData( $objData );
		else {
			$message = WMessage::get();
			$message->userN('1260434893HJHQ');
		}
		return true;
	}}