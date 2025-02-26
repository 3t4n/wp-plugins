<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
 class Currency_Netcomcode_class extends WClasses {
	public function convertAnswers($CODE) {
		switch( $CODE ) {
			case 'SERVICE_NOT_AVAILABLE':
				$this->userE('1450467120OULF');
				return false;
			case 'UNDEFINED_CURRENCY':
				$this->userE('1450491178BXIX');
				return false;
			case 'CURRENCY_NOT_FOUND':
				$this->userE('1450491178BXIY');
				return false;
			case 'RATE_NOT_FOUND':
				$this->userE('1450491178BXIZ');
				return false;
			default:
				$this->userE('1450467120OULG',array('$CODE'=>$CODE));
				return false;
		}		
		return true;
 	}
}
