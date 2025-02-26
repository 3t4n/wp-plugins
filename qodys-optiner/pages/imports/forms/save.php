<?php
require_once( dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))))).'/wp-load.php' );

$response = array();

if( $_POST )
{
	$imported_emails = $_POST['imported_emails'];
	
	if( $imported_emails )
	{
		foreach( $imported_emails as $key => $value )
		{
			if( $value['delete'] == 'on' )
				unset( $imported_emails[ $key ] );
		}
	}
	
	$bulk_import = $_POST['bulk_import'];
	
	if( $bulk_import )
	{
		// allow emails to be separated by ,
		$bits = explode( ',', $bulk_import );
		
		foreach( $bits as $key2 => $value2 )
		{
			// allow emails to be separated by new lines
			$bits2 = explode( "\n", $value2 );
			
			foreach( $bits2 as $key3 => $value3 )
			{
				$value3 = trim( $value3 );
				
				if( !$value3 )
					continue;
					
				$fields = array();
				$fields['email'] = $value3;
				$fields['status'] = -1;
				$fields['date'] = time();
				
				$imported_emails[] = $fields;
			}
		}
		
		unset( $_POST['bulk_import'] );
	}
	
	if( $imported_emails )
		$imported_emails = array_values( $imported_emails );
		
	$_POST['imported_emails'] = $imported_emails;
		
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