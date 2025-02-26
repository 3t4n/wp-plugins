<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Slack_class extends WClasses {
	public function sendNotification($data,$tempdata,$user,$link='') {
		if ( empty($data->url) ) return false;
		static $mgidA = array();
		if ( !empty($mgidA[$tempdata->mgid]) ) return true;
		$mgidA[$tempdata->mgid] = true;
		$helper = WClass::get( 'netcom.rest', null, 'class', false );
		$helper->urlEncode( false );
		$mess = '{';
		$mess .= '"icon_emoji":":ghost:",';
		$site = ( strlen( JOOBI_SITE_NAME ) > 2 ? JOOBI_SITE_NAME : JOOBI_SITE );
		$mess .= '"username":"' . $site . '",';
		$myText = '';
		if ( !empty($tempdata->title) ) $myText .= $tempdata->title;
		else $myText .= $tempdata->name;
		if ( !empty($tempdata->subtitle) ) {
			$myText .= ( !empty($myText) ? '\n' : '' ) . $tempdata->subtitle;
		} else {
			if ( !empty($tempdata->chtml) ) $myText .= ( !empty($myText) ? '\n' : '' ) . $tempdata->chtml;
			if ( !empty($tempdata->ctext) ) $myText .= ( !empty($myText) ? '\n' : '' ) . $tempdata->ctext;
		}
		$tagProcessC = WClass::get( 'output.process' );
		$tagProcessC->setParameters( $tempdata->parameters );
		$tagProcessC->replaceTags( $myText, $user );
				$emailHelperC = WClass::get( 'email.conversion' );
		$myText = $emailHelperC->HTMLtoText( $myText, true, true, false );
		$myText = str_replace( '<br />', "\n", $myText );
		$myText = str_replace( "\r", "\n", $myText );
		$myText = str_replace( array( "\n\n\n\n", "\n\n\n", "\n\n" ), "\n", $myText );
		$mess .= '"text":"' . $myText . '"';
		$mess .= '}';
		$fieldsA = array(
				'payload' => $mess
		);
		$data = $helper->send( $data->url, $fieldsA );
		return true;
	}	
}