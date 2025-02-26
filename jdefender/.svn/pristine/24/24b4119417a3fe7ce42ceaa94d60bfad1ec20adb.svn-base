<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Currency_Rate_class extends WClasses {
	private $_useJoobiServices = true;
public function updateExchangeRate($checkTime=true,$fee=0) {
	$currencyM = WModel::get( 'currency' );
	$currencyM->whereE( 'publish', 1 );
	$currencyM->setLimit( 100 );		$currencyA = $currencyM->load( 'lra', 'curid' );
	$allCurrencies = serialize( $currencyA );
	$time = 86000; 		if ( $allCurrencies == WPref::load( 'PCURRENCY_NODE_LASTUPDATELIST' ) && $checkTime && WPref::load( 'PCURRENCY_NODE_LASTUPDATE' ) + $time > time() ) {
		$this->userS('1450964343HHAO');
		return true;
	}	
	$currencyPref = WPref::get( 'currency.node' );
	$currencyPref->updatePref( 'lastupdatelist', $allCurrencies );
	$rates = null;
	if ( $this->_useJoobiServices ) {
		$data = new stdClass();
				$mainServicesC = WClass::get( 'main.services' );
		$data = $mainServicesC->getCredentials();
		if ( false === $data ) {
			$this->adminW( 'No conversion rate available. You need to have an active membership for currency conversion API.' );
			return false;		
		}
		$data->currency = 'EUR';
		$server = WPref::load( 'PAPPS_NODE_SERVICE' );
		$netcom = WNetcom::get();
		$resultO = $netcom->send( $server, 'serviceprovider', 'getExchangeRates', $data );
				if ( empty($resultO->status) ) {
			return false;
		} else {
			$xml = $resultO->result;
						$currencyPref = WPref::get( 'currency.node' );
			$currencyPref->updatePref( 'lastupdate', time() );
		}		
	}
		if ( !empty($xml) ) {
				if ( empty($cur_main) && empty($cur_ref) ) {
						static $currencyM=null;
			if ( empty($currencyM) ) $currencyM = WModel::get( 'currency' );
			$currencyM->whereE( 'publish', 1 );
			$currencies = $currencyM->load( 'ol', array( 'curid', 'code', 'title' ) );
		} else {
			$curA = array();
			$curA[] = $cur_main;
			$curA[] = $cur_ref;
						static $currencyM=null;
			if ( empty($currencyM) ) $currencyM = WModel::get( 'currency' );
			$currencyM->whereIn( 'curid', $curA );
			$currencyM->whereE( 'publish', 1 );
			$currencies = $currencyM->load( 'ol', array( 'curid', 'code', 'title' ) );
		}
		if ( !empty($currencies) ) {
						if ( WPref::load( 'PCURRENCY_NODE_CONVERSIONHISTORY' ) ) $curHistoryUsed = true;
			else $curHistoryUsed = false;
			if ( $this->_useJoobiServices ) {
				$exchangeRatesA = $this->_getExchangeRateServices( $currencies, $xml );
			}			
			if ( !empty($exchangeRatesA) ) {
				$passedFee = $fee;
				static $curconverionM=null;
				if ( empty($curconversionM) ) $curconversionM = WModel::get( 'currency.conversion' );
				$exchange = 0;
				foreach( $currencies as $curMain ) {
					foreach( $currencies as $curRef ) {
						$fee = $passedFee;
												$curconversionM->whereE( 'curid', $curMain->curid );
						$curconversionM->whereE( 'curid_ref', $curRef->curid );
						$curr = $curconversionM->load( 'o', array( 'curid','fee') );
												if ( $curMain->curid == $curRef->curid ) $fee = 0;
												$exchange = $this->_calculateExchange( $exchangeRatesA, $currencies, $curMain, $curRef );
						if ( empty($exchange) ) {
							continue;
						}
						if ( !empty($fee) ) $rate = $exchange + ( $exchange * ( $fee / 100 ) );
						else $rate = $exchange;
						if ( !empty($exchange) ) {
														$curconversionM->setVal( 'exchange', $exchange );
							$curconversionM->setVal( 'rate', $rate );
							$curconversionM->setVal( 'fee', $fee );
							$curconversionM->setVal( 'publish', 1 );
							$curconversionM->setVal( 'modified', time() );
							if ( !empty($curr->curid) ) {
								$curconversionM->whereE( 'curid', $curMain->curid );
								$curconversionM->whereE( 'curid_ref', $curRef->curid );
								$curconversionM->update();
							} else {
								$curconversionM->setVal( 'name', $curMain->title .' => '. $curRef->title );
								$curconversionM->setVal( 'alias', $curMain->title .' => '. $curRef->title );
								$curconversionM->setVal( 'curid', $curMain->curid );
								$curconversionM->setVal( 'curid_ref', $curRef->curid );
								$curconversionM->insert();
							}
							if ( $curHistoryUsed ) $this->_rateHistory( $exchange, $curMain, $curRef, $url );
						}
					}					
				}				
			}			
		}		
	}
	return true;
}
private function _getExchangeRateServices($currencies,$xml) {
		static $codeA=array();
	foreach( $currencies as $curCode ) $codeA[] = $curCode->code;
		static $exchangeRatesA=array();
	static $exchangeRates=array();
	$getCodeA = array();
		foreach( $xml as $exchangeRate ) {
		if ( isset($exchangeRate['to']) ) $currencyCode = $exchangeRate['to'];
		else $currencyCode = null;
		if ( !empty($currencyCode) ) {
			if ( in_array( $currencyCode, $codeA ) ) {
				$exchangeRatesA[$currencyCode] = $exchangeRate['rate'];
				$getCodeA[] = $currencyCode;
			}		}	}
			foreach( $codeA as $codes  ) {
		if ( !in_array( $codes, $getCodeA ) ) $exchangeRatesA[$codes] = 0;
	}
	return $exchangeRatesA;
}
private function _getCodeFromString($currency) {
	$a = explode( '/', $currency);
	return $a[0];
}
private function _getRateFromString($rate) {
	$tmp = str_replace( '1 Euro = ', '', $rate );
	$explode = explode( ' ',$tmp );
	return $explode[0];
}
private function _rateHistory($exchange,$curMain,$curRef,$url) {
		static $exchangeSiteID=null;
		static $curConHistoryM=null;
	if ( empty($curConHistoryM) ) $curConHistoryM = WModel::get( 'currency.conversionhistory' );
	$curConHistoryM->setVal( 'alias', $curMain->title .' => '. $curRef->title );
	$curConHistoryM->setVal( 'exchange', $exchange );
	$curConHistoryM->setVal( 'modified', time() );
	$curConHistoryM->setVal( 'curid', $curMain->curid );
	$curConHistoryM->setVal( 'curid_ref', $curRef->curid );
	$curConHistoryM->setVal( 'exsiteid', $exchangeSiteID );
	$curConHistoryM->insert();
	return true;
}
private function _calculateExchange($exchangeRatesA,$currencies,$curMain,$curRef) {
	static $vendCurid=null;
	$exchange = false;
		if ( empty($vendCurid) ) {
		$currencyHelperC = WClass::get( 'currency.helper' );
		$vendCurid = $currencyHelperC->getCurrencyID( 'EUR' );	
	}
	if ( empty($vendCurid) ) {
		return false;
	}
				$curMainRate = $this->_cleanRate( $exchangeRatesA[$curMain->code] );
		$curRefRate = $this->_cleanRate( $exchangeRatesA[$curRef->code] );
				if ( $curMain->curid == $curRef->curid )  $exchange = 1;
		else {
				if ( $curRef != $vendCurid ) {
					if ( !empty($curMainRate) ) $exchange = ( 1 / $curMainRate ) * $curRefRate;
					else $exchange = 0;
				} else {
					$curCon = $mainRate * $curMainRate;
					if ( !empty($curCon) && ( $curCon != 0 ) ) $exchange = 1 / $curCon;
					else $exchange = 0;
				}
		}
	return $exchange;
}
	private function _cleanRate($receivedRate) {
		return str_replace( array( ',', ' ' ), '', $receivedRate );
	}
}