<?php
require_once( dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))))).'/wp-load.php' );

$response = array();

if( $_POST )
{
	// this allows none to be purposefully selected
	if( !$_POST['social_triggers'] )
		$_POST['social_triggers'] = array( -1 );
		
	foreach( $_POST as $key => $value )
	{
		$qodys_optiner->update_option( $key, $value );
	}
	
	$response['results'][] = 'Settings have been saved';
}
else
{
	$response['errors'][] = 'Any unexpected error occured; please try again';
}

$qodys_optiner->GetClass('postman')->SetMessage( $response );

$url = $qodys_optiner->GetClass('tools')->GetPreviousPage();

header( "Location: ".$url );
exit;
?>