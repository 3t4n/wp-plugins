// JavaScript code (with jQuery) for handling the AJAX of sending the email.

jQuery( document ).ready( function( $ ) {
    // On pressing enter in the input field, prevent the default of saving the order
    $( '#ece-subject' ).keydown(function( e ) {
       if( e.keyCode == 13 ) {
            e.preventDefault();
         }
    });

    // On 'Send Email' button click
    $( '.ece_send_email_button' ).click( function( e ) {
        // Prevent all default actions
        e.preventDefault();

        // Save the data of the tinyMCE, so we can use it
        tinyMCE.triggerSave();

        // Set some fields / button(s) to disabled and empty the error messages
        $( '.ece_send_email_button' ).css( "pointerEvents", "none" );
        $( "#ece-subject" ).attr( "disabled", "disabled" );
        $( '.ece_send_email_button' ).attr( "disabled", "disabled" );
        $( '#ece-response-text-success' ).html( "" ); 
        $( '#ece-response-text-error' ).html( "" ); 
        $( '#ece-response-text-error' ).empty(); 

        // Make the spinner active
        $( '.ece-spinner' ).addClass( 'is-active' );

        // Getting all the data
        post_id = $( this ).attr( "data-post_id" );
        nonce = $( this ).attr( "data-nonce" );
        subject = $( "#ece-subject" ).val();
        message = tinyMCE.get( 'ece-message' ).getContent();
        cc = $( '#ece-cc' ).val();
        bcc = $( '#ece-bcc' ).val();

        // Store the data in a data variabled
        data = { action: 'ece_send_email', post_id: post_id, subject: subject, message: message, cc: cc, bcc: bcc, nonce: nonce };

        // Make an AJAX request
        $.post( ECE_Ajax.ajaxurl, data, function( response ) {

            // Decode the JSON code gotten from the response
            response = JSON.parse( response );

            // If everything went successfull
            if( response.type == "success" ) {
                // Set the fields to empty
                $( "#ece-subject" ).val( '' );
                $( "#ece-cc" ).val( '' );
                $( "#ece-bcc" ).val( '' );
                tinyMCE.get( 'ece-message' ).setContent( '' );

                // Show a success message
                $( '#ece-response-text-success' ).html( response.msg );
            } 
            // If there is one or more errors
            else {
                // Show the error(s)
                $.each( response.msg, function( index, value ) {
                    $( '#ece-response-text-error' ).append( '<li>' + value + '</li>' );
                } );
            }

            // Reset the disabled states and deactivate the spinner
            $( '.ece-spinner' ).removeClass( 'is-active' );
            $( '.ece_send_email_button' ).attr( "disabled", false );
            $( "#ece-subject" ).attr( "disabled", false );
            $( '.ece_send_email_button' ).css( "pointerEvents", "" );

        } );
    } );
} );