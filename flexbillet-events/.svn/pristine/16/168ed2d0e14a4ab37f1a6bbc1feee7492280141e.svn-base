<?
    /* ****************************************************
       Requests information from the organizer services API
    **************************************************** */

    function flexbillet_events_getEvents( $a_localekey, $a_organizerkey, $a_includeDepartmentEvents, $a_passphrase ) {
		 if( $a_includeDepartmentEvents ) {
			 $departmentEvents = "true";
		 } else {
			 $departmentEvents = "false";
		 }
        // Construct and Execute CURL Request
        $request = "https://www.flexbillet.dk/organizerservices/api/v1/eventlist?characterset=UTF-8&format=xml&include-test-events=true&include-for-departments=$departmentEvents&filter-visible=yes&localekey=$a_localekey&organizerkey=$a_organizerkey&passphrase=$a_passphrase";
    
        $response = wp_remote_get( $request );
        $xml = wp_remote_retrieve_body($response);

        if( $xml != null ) {
            // Instantiate Parser Instance
            $saxparser = new SAXY_Lite_Parser();

            // Instantiate new Organizer Object
            $eventListObj = new Eventlist;

            // Register Handlers
            $saxparser->xml_set_element_handler( array( &$eventListObj, "startElementHandler" ), array( &$eventListObj, "endElementHandler" ) );

            $success = $saxparser->parse( $xml );

            if ( $success ) {
                //echo "\n<br /><br />Parsing successful!";
            } else {
                $errorCode = $saxparser->xml_get_error_code();
                $errorString = $saxparser->xml_error_string($errorCode);

                echo "<br><br>Error Code: " . $errorCode;
                echo "<br><br>Error String: " . $errorString;

                return null;
            }

            return $eventListObj;
        } else {
            return null;
        }
    }	
?>