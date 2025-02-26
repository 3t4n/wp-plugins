<?php
// WordPress Autotask Ticket Details Plugin

function wpat_getAutotask( ) {
	$wpat_auth = wpat_getAutotaskAuthArray();
	$wpat_wsdl_url = get_option( 'wpat_wsdl_url' );
	try {
		$wpat_autotask = new SoapClient( 'https://webservices' . $wpat_wsdl_url . '.autotask.net/atservices/1.5/atws.wsdl', $wpat_auth );
	} catch ( Exception $wpat_e ) {
	
	}	
	return $wpat_autotask;
}

function wpat_getAutotaskAuthArray( ) {
	$wpat_wsdl_username = get_option( 'wpat_wsdl_username' );
	$wpat_wsdl_password = get_option( 'wpat_wsdl_password' );
	$wpat_wsdl_url = get_option( 'wpat_wsdl_url' );

	$wpat_auth = array(

		'login'		=> $wpat_wsdl_username,
		'password'	=> $wpat_wsdl_password,
		
		'trace' 	=> TRUE, 
		
		'location'	=> 'https://webservices' . $wpat_wsdl_url . '.autotask.net/atservices/1.5/atws.asmx', 
		'wsdl'		=> 'https://ww' . $wpat_wsdl_url . '.autotask.net/atservices/1.5/atws.wsdl', 
		
		'uri'		=> 'http://autotask.net/ATWS/v1_5/'
	); 
	return $wpat_auth;
}

function wpat_tryAutotaskQuery( $wpat_queryXMLArray ) {
	$wpat_autotask = wpat_getAutotask();
	try {
		$wpat_result = $wpat_autotask->query( $wpat_queryXMLArray );
	}
	catch( Exception $wpat_e ) {
		return $wpat_e;
	}
	return $wpat_result;
}

function wpat_buildOutput( $wpat_outputData ) {
	$wpat_resultType = $wpat_outputData->queryResult->EntityResultType;
	$wpat_returnCode = $wpat_outputData->queryResult->ReturnCode;
	$wpat_resultArray = $wpat_outputData->queryResult->EntityResults;
	if ( $wpat_returnCode = 1 ) {
		switch( $wpat_resultType ) {
			case "ticket":
				if ( !isset( $wpat_resultArray->Entity ) ) {
					return "<div style='background:#EEEEEE;border: 1px solid #000000;margin: 5px;padding:20px;'>" . __( 'No ticket results, try expanding your search terms.', 'wpat_loc' ) . "</div>";
				}
				if ( is_array( $wpat_resultArray->Entity ) ) {
					$wpat_resultArray = $wpat_resultArray->Entity;
				}
				foreach ( $wpat_resultArray as $wpat_entity ) {
				
					$wpat_ticket_notes = wpat_buildOutput( wpat_tryAutotaskQuery( wpat_buildQuery( array( 'entity' => 'TimeEntry', 'fieldData' => array( 'TicketID' => array( 'value' => $wpat_entity->id, 'op' => 'Equals' ) ) ) ) ) );
					$wpat_ticket_times = wpat_buildOutput( wpat_tryAutotaskQuery( wpat_buildQuery( array( 'entity' => 'TicketNote', 'fieldData' => array( 'TicketID' => array( 'value' => $wpat_entity->id, 'op' => 'Equals' ) ) ) ) ) );
					
					$wpat_buildOutputReturn .= "<div class='wpat-ticket-output' style='background:#EEEEEE;border: 1px solid #000000;margin: 10px;padding: 10px 10px 0 10px;'><span style='font-weight: bold;'>Ticket</span>: $wpat_entity->Title (Ticket #: $wpat_entity->TicketNumber) " . wpat_parse_date( $wpat_entity->CreateDate ) . "\n<br>Description: " . nl2br( $wpat_entity->Description ) . "<br>\n";
					$wpat_buildOutputReturn .= $wpat_ticket_notes;
					$wpat_buildOutputReturn .= $wpat_ticket_times;
					$wpat_buildOutputReturn .= "</div>";
					
				}
				break;
			case "contact":
				break;
			case "account":
				break;
			case "ticketnote":
				if ( is_array( $wpat_resultArray->Entity ) ) {
					$wpat_resultArray = $wpat_resultArray->Entity;
				}					
				foreach ( $wpat_resultArray as $wpat_entity ) {	
					if ( $wpat_entity->NoteType == 1 ) {
						$wpat_buildOutputReturn .= "<div class='wpat-note-output' style='background:#DDDDDD;border: 1px solid #000000;margin: 10px 0;padding:10px;'><span style='font-weight: bold;'>Note</span>: $wpat_entity->Title  \n<br>Time: " . wpat_parse_date( $wpat_entity->LastActivityDate ) . " <br> Notes: " . nl2br( $wpat_entity->Description ) . "<br>\n";
						$wpat_buildOutputReturn .= "</div>";
					}
				}
				break;
			case "timeentry":
				if ( is_array( $wpat_resultArray->Entity ) ) {
					$wpat_resultArray = $wpat_resultArray->Entity;
				}
				foreach ( $wpat_resultArray as $wpat_entity ) {
					$wpat_output_timeentry_times = wpat_parse_date( $wpat_entity->StartDateTime ) . ' - ' . wpat_parse_date( $wpat_entity->EndDateTime );
					$wpat_buildOutputReturn .= "<div class='wpat-timeentry-output' style='background:#DDDDDD;border: 1px solid #000000;margin: 10px 0;padding:10px;'><span style='font-weight: bold;'>Time Entry</span>  \n<br>Time worked: $wpat_output_timeentry_times ($wpat_entity->HoursToBill hours) <br>Notes: " . nl2br( $wpat_entity->SummaryNotes ) . "<br>\n";
					$wpat_buildOutputReturn .= "</div>";
				}
				break;
			default:
				break;
		}
	} else {
		$wpat_buildOutputReturn = "Errors encountered";
	}
	return $wpat_buildOutputReturn;
}


function wpat_parse_date( $date, $format = 'short') {
	$wpat_date_parts = explode( "T", $date );
	$wpat_date_string = $wpat_date_parts[0];
	$wpat_time_string = $wpat_date_parts[1];
	
	$wpat_datetime_date = DateTime::createFromFormat('Y-m-d', $wpat_date_string);
	if( $format == 'long' ) {
		$wpat_date_string = $wpat_datetime_date->format('l, F jS, Y');
	} else {
		$wpat_date_string = $wpat_datetime_date->format('D M j Y');
	}
	
	$wpat_datetime_time = DateTime::createFromFormat('H:i:s', $wpat_time_string);
	$wpat_time_string = $wpat_datetime_time->format('h:i A');
	
	return $wpat_date_string . ' ' . $wpat_time_string;
}

function wpat_buildQuery( $wpat_queryData ) {
	$wpat_queryXML = "<queryxml>\n";
	$wpat_queryXML .= "\t<entity>" . $wpat_queryData['entity'] . "</entity>\n";
	$wpat_queryXML .= "\t<query>\n";
		foreach( $wpat_queryData['fieldData'] as $wpat_fieldName => $wpat_fieldData ) {
			$wpat_queryXML .= "\t\t<field>" . $wpat_fieldName . "<expression op='" . $wpat_fieldData['op'] . "'>" . $wpat_fieldData['value'] . "</expression></field>\n";
		}
	$wpat_queryXML .= "\t</query>\n";
	$wpat_queryXML .= "</queryxml>";

	return array(
		'sXML' => $wpat_queryXML
	);	
	
}


?>