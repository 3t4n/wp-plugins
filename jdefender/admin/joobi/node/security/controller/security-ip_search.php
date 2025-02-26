<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_ip_search_controller extends WController {
function search() {
	$IP = trim( self::getFormValue( 'ip' ) );
	if ( empty($IP) ) {
		$this->userE('1455128223INXR');
		WPages::redirect( 'previous' );
	}	
	$memberSessionC = WUser::session();
	if ( empty($IP) || $memberSessionC->validateIP( $IP, true ) ) {
		$this->userN('1423599620OKIC',array('$IP'=>$IP));
		$ipClass = WClass::get( 'security.lookup' );
		$IPO = $ipClass->ipInfo( $IP, 'all' );
		WGlobals::set( 'ipxAddress', $IPO->ip );
		if ( !empty($IPO->country->name) ) {
			WGlobals::set( 'ipCountry',$IPO->country->name);} else {WGlobals::set('ipCountry','');
		}		
		if (!empty($IPO->country->isocode3)) {
			WGlobals::set('ipIsoCode3',$IPO->country->isocode3);
		} else {
			WGlobals::set('ipIsoCode3','');
		}			
		if (!empty($IPO->country->isocode2)) {
			WGlobals::set('ipIsoCode2',$IPO->country->isocode2);
		} else {
			WGlobals::set('ipIsoCode2','');
		}
		$timeMin= !empty($IPO->country->timezone) ? $IPO->country->timezone : 0 ;
		$hours=floor((abs($timeMin)/60))*100;
		$rminute=$timeMin%60;
		if ($timeMin<0) {
			$rminute=($rminute*(-1));
			$sign='-';
		} else {
			$sign='+';
		}
		$timezone= WText::t('1299074567DTNC') . $sign.($hours+$rminute).' UTC';
		WGlobals::set('ipTimeZone',$timezone);
		$myLng=$IPO->language;
		$allLang= null;
		if (!empty($myLng) ) {
			$last_item = end($myLng);
			foreach($myLng as $item) {
				$allLang.=$item->name;
				if ( $item != $last_item ) $allLang .= ', ';
			}
		}
		WGlobals::set( 'ipLanguage', $allLang );
		$myCrncy=$IPO->currency;
		$allCrncy= null;
		if (!empty($myCrncy)) {
			$last_item = end($myCrncy);
			foreach($myCrncy as $item) {
				$allCrncy.=' (<b>'.$item->symbol.'</b>) '.$item->title;
				if ($item != $last_item) $allCrncy.=', ';
			}
		}		
		WGlobals::set( 'ipCurrency', $allCrncy );
	} else {
		$this->userN('1299074567DTND',array('$IP'=>$IP));
		$this->userE('1242112341TAYL');
		WPages::redirect( 'controller=security-ip&task=locate' );
	}
	return true;
}
}