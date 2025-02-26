<?php
class SocialActionPort
{
	
	const SOCIAL_ACTION_URL = 'http://search.socialactions.com/actions.json';
	
	static public function getResponse( SocialActionRequest $objRequest )
	{
		$objCurlRequest = curl_init( self::getRequestUrl( $objRequest ) );
		curl_setopt( $objCurlRequest, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $objCurlRequest, CURLOPT_HEADER, false );
		curl_setopt( $objCurlRequest, CURLOPT_TIMEOUT, 10 );
		$objResult = curl_exec( $objCurlRequest );
		curl_close( $objCurlRequest );
		
		return  json_decode( utf8_encode( $objResult ) );
	}
	
	static public function getRequestUrl( SocialActionRequest $objRequest )
	{
		$strRequestUrl = SocialActionPort::SOCIAL_ACTION_URL;
		$strRequestUrlPartsArray = array();
		
		if( count( $objRequest->getWordsArray() ) > 0 )
		{
			$strRequestUrlPartsArray[] = sprintf( 'q=%s', implode( '+', $objRequest->getWordsArray() ) );
		}
		
		if( count( $objRequest->getActionTypesArray() ) > 0 )
		{
			$strRequestUrlPartsArray[] = sprintf( 'action_types=%s', implode( ',', $objRequest->getActionTypesArray() ) );
		}
		
		$strRequestUrlPartsArray[] = sprintf( 'created=%s', $objRequest->getCreated() );
		$strRequestUrlPartsArray[] = sprintf( 'match=%s', $objRequest->getMatch() );
		$strRequestUrlPartsArray[] = sprintf( 'limit=%d', $objRequest->getLimit() );
		$strRequestUrlPartsArray[] = sprintf( 'order=%s', $objRequest->getOrderBy() );
		
		$strRequestUrl = sprintf( '%s?%s', 
									SocialActionPort::SOCIAL_ACTION_URL,
									implode( '&', $strRequestUrlPartsArray ) );
									
		return $strRequestUrl;
	}
	
}