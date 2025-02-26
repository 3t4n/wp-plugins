<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */

defined('JOOBI_SECURE') or die('J....');
class Main_Frequency_class extends WClasses {
public function convertFrequencyToTime($time,$frequency,$reference='hour',$sign='+') {
		if ( 'hour' == $reference ) {
			$multiple = ( '-' == $sign ? -1 : 1 );
			switch( $frequency ) {
				case 24:	
					$time = $time + ( $multiple * 86400 );
					break;
				case 48:	
					$time = $time + ( $multiple * 172800 );
					break;
				case 168:	
					$time = $time + ( $multiple * 604800 );
					break;
				case 336:	
					$time = $time + ( $multiple * 1209600 );
					break;
				case 720:	
					$time = strtotime( $sign . '1 month', $time );
					break;
				case 2184:	
					$time = strtotime( $sign . '3 months', $time );
					break;
				case 4368:	
					$time = strtotime( $sign . '6 months', $time );
					break;
				case 8760:	
					$time = strtotime( $sign . '1 year', $time );
					break;
				default:
					$time = $time + ( $multiple * ( $frequency * 3600 ) );
					break;
			}
		}
		return $time;
 	}
}
