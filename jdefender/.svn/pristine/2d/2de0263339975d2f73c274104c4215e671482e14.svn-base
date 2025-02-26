<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_myip_myip_controller extends WController {
function myip() {
	$message = WMessage::get();
	$ipClass= WClass::get( 'security.lookup' );
	$ipObject=null;
	$memberSessionC = WUser::session();
	$getIP = WGlobals::get('ip');
	if ( !empty($getIP)) {
		if ( $memberSessionC->validateIP( $getIP, true ) ) {
			$ipObject = $ipClass->ipInfo($getIP,'all');
		} else {
			$msg= 'Please enter a valid IP Address. Example: 127.152.153.272';
			$msg2= 'You have search for an IP: '.$getIP;
			$message->userN($msg2);
			$message->userE($msg);
			return true;
		}
	} else {
		$ipObject=$ipClass->ipInfo( null, 'all' );
	}
	if ( empty($ipObject) ) {
		$message = WMessage::get();
		$message->userW('1342625792DEPF');
		return false;
	}
	WGlobals::set('ipxAddress',$ipObject->ip);
	if (!empty($ipObject->country->name)) {WGlobals::set('ipCountry',$ipObject->country->name);} else {WGlobals::set('ipCountry','');}
	if (!empty($ipObject->country->isocode3)) {WGlobals::set('ipIsoCode3',$ipObject->country->isocode3);} else {WGlobals::set('ipIsoCode3','');}
	if (!empty($ipObject->country->isocode2)) {WGlobals::set('ipIsoCode2',$ipObject->country->isocode2);} else {WGlobals::set('ipIsoCode2','');}
	$timeMin= !empty($ipObject->country->timezone)? $ipObject->country->timezone : 0 ;
	$hours=floor((abs($timeMin)/60))*100; 
	$rminute=$timeMin%60;
	if ($timeMin<0) {
		$rminute=($rminute*(-1));
		$sign='-';
	} else {
		$sign='+';
	}
	$timezone='Standard Time'.$sign.($hours+$rminute).' UTC';
	WGlobals::set('ipTimeZone',$timezone);
	$myLng=$ipObject->language;					
	$allLang= null;
	if ( !empty($myLng) ) {
		$last_item = end($myLng);
		foreach($myLng as $item) {
			$allLang.=$item->name;
			if ($item != $last_item) $allLang.=', ';
		}
	}
	WGlobals::set('ipLanguage',$allLang);
	$myCrncy=$ipObject->currency;			
	$allCrncy= null;
	if (!empty($myCrncy)) {
		$last_item = end($myCrncy);
		foreach($myCrncy as $item) {
			$allCrncy.=' (<b>'.$item->symbol.'</b>) '.$item->title;
			if ($item != $last_item) $allCrncy.=', ';
		}
	}
	WGlobals::set('ipCurrency',$allCrncy);
	return true;
}}