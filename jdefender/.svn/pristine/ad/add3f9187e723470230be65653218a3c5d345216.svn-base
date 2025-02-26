<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */

defined('JOOBI_SECURE') or die('J....');
 class Currency_Price_tag {
 	var $smartUpdate = false;
	function process($givenTagsA) {
		static $curConvertC=null;
		$usedCurrency = WUser::get( 'curid' );
		$replacedTagsA = array();
		foreach( $givenTagsA as $tag => $myTagO ) {
			if ( !isset($myTagO->value) ) {
				$myTagO->wdgtContent = '';
				$replacedTagsA[$tag] = $myTagO;
				continue;
			}
			if ( !isset($myTagO->currency) ) {
				$replacedTagsA[$tag] = WTools::format( $myTagO->value, 'price', $usedCurrency );
				continue;
			}
			if ( !isset($curConvertC) ) $curConvertC = WClass::get( 'currency.convert', null, 'class', false );
			if ( !empty($curConvertC) ) {
				$value = $curConvertC->currencyConvert( $myTagO->currency, $usedCurrency, $myTagO->value );
				if ( empty( $myTagO->symbol ) ) {
					$symbol = 'currency';
				} elseif ( 'money-code' == $myTagO->symbol ) {
					$symbol = 'moneyCode';
				} else {
					$symbol = $myTagO->symbol;
				}
				$decimal = ( isset($myTagO->decimal) ? $myTagO->decimal : null );
				if ( !empty($myTagO->style) ) {
					$useStyle = true;
					$className = ( !empty($myTagO->class) ? $myTagO->class : '' );
				} else {
					$useStyle = false;
					$className = '';
				}
				$myTagO->wdgtContent = WTools::format( $value, $symbol, $usedCurrency, $decimal, $useStyle, $className );
			} else {
				$myTagO->wdgtContent = WTools::format( $myTagO->value, 'price', $usedCurrency );
			}
			$replacedTagsA[$tag] = $myTagO;
		}
		return $replacedTagsA;
	}
}
