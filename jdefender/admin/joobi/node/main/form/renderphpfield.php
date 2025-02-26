<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
WView::includeElement( 'form.textarea' );
class Main_CoreRenderphpfield_form extends WForm_textarea {
	function create() {
		$wid = WView::get( $this->getValue( 'yid') , 'wid' );
		$folder = WExtension::get( $wid, 'folder' );
		$location = JOOBI_DS_USER . 'custom/' . $folder .'/form/' . $this->getValue( 'filef' ) . '.php';
		$fileS = WGet::file();
		if ( $fileS->exist( $location ) ) {
			$code = $fileS->read( $location );
			$firstQuote = strpos( $code, '{' );
			$lastQuote = strrpos( $code, '}' );
			$this->value = substr( $code, $firstQuote+1, $lastQuote-$firstQuote-1 );
		} else {
			$this->value = str_replace( "\r", "\n\r", $this->value );
		}	
		return parent::create();
	}	
}