<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
WView::includeElement( 'form.text' );
class WForm_Coretextdesc extends WForm_text {
	function create() {
		return $this->show();
	}
	function show() {
				if ( !empty( $this->element->description ) ) {
			$this->value = $this->element->description;
			$this->element->readonly = true;
		} else {
			return false;
		}
		return parent::show();
	}
}
