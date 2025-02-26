<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class WForm_Coreseo extends WForms_default {
	function create() {
		switch( $this->element->map ) {
			case 'name':
				if ( empty($this->value) ) {
					$value = $this->getValue('name');
				}
			case 'seotitle':
				if ( empty($value) ) {
					$value = $this->value;
				}				if ( empty($value) ) {
					$value = $this->getValue('name');
				}				
				if ( empty($value) ) {
					$emailHelperC = WClass::get( 'email.conversion' );
					$value = $emailHelperC->smartHTMLSize( $value, 100, true, false, false, true );
				}				
				if ( empty($value) ) return false;
				APIPage::setTitle( $value );
				WGlobals::set( 'titleheader', $value );
				break;
			case 'seokeywords':
				APIPage::setMetaTag( 'keywords', $this->value );
				break;
			case 'seodescription':
			case 'introduction':
			case 'description':
				if ( empty($this->value) ) {
					$value = $this->getValue('introduction');
					if ( empty($value) ) $value = $this->getValue('description');
				} else {
					$value = $this->value;
				}				
				if ( empty($value) ) return false;
				$emailHelperC = WClass::get( 'email.conversion' );
				$value = $emailHelperC->smartHTMLSize( $value, 150, true, false, false, true );
				if ( empty($value) ) return false;
				APIPage::setDescription( $value );
				break;
			default:
			break;
		}
		return false;
	}
	function show() {
		return $this->create();
	}
}
