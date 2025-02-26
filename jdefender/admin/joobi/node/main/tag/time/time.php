<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */

defined('JOOBI_SECURE') or die('J....');
 class Main_Time_tag {
	public function process($object) {
		$replacedTagsA = array();
		foreach( $object as $tag => $myTagO ) {
			$time = '';
			if ( !empty($myTagO->timestamp) ) {
				$time = $myTagO->timestamp;
			}
			if ( empty($time) ) $time = time();
			if ( !empty($myTagO->format) ) {
				if ( is_numeric($myTagO->format) ) {
					$format = WTools::dateFormat( $myTagO->format );
				} else {
					$format = $myTagO->format;
				}
			} else {
				$format = WTools::dateFormat( 'day-date-time' );
			}
			if ( !empty($myTagO->time) ) {
				$time = time() - $time + WApplication::stringToTime( $myTagO->time );
			}
			if ( !empty($myTagO->timezone) ) {
				$time = $time + ( $myTagO->timezone );
			} else {
				$timezone = WUser::timezone();
				$time = $time + $timezone;
			}
			$tag = '{widget:time';
			if (!empty($myTagO->widgetID) ) $tag .= '|widgetID=' . $myTagO->widgetID;			
			if (!empty($myTagO->time) ) $tag .= '|time=' . $myTagO->time;
			if (!empty($myTagO->format) ) $tag .= '|format=' . $myTagO->format;
			if (!empty($myTagO->timezone) ) $tag .= '|timezone=' . $myTagO->timezone;
			if (!empty($myTagO->timestamp) ) $tag .= '|timestamp=' . $myTagO->timestamp;
			$tag .= '}';
			if ( is_int($time) ) {
				$myTagO->wdgtContent = WApplication::date( $format, $time );
			} else $myTagO->wdgtContent = '';
			$replacedTagsA[$tag] = $myTagO;
		}
		return $replacedTagsA;
	}
	public function initialValue() {
		$newParamsO = new stdClass();
		$newParamsO->time = 'now';
		$newParamsO->timezone = '';
		$newParamsO->format = 2;
		$newParamsO->timestamp = time();
		return $newParamsO;
	}
}