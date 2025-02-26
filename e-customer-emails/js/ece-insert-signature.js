// JavaScript code (with jQuery) for handling the AJAX of inserting an signature.

jQuery( document ).ready( function( $ ) {
    // On 'Insert' button click
    $( '.ece_insert_signature_button' ).click( function( e ) {
        // Prevent all default actions
        e.preventDefault();

        // Set disabled states, and add class for loading animation
        $( '.ece_insert_signature_button' ).attr( "disabled", "disabled" );
        $( '#ece-signature-select' ).attr( "disabled", "disabled" );
        $( '.ece-spinner-signature' ).addClass( 'is-active' );

        // Getting value(s) and set a data variable
        signature_id = $( '#ece-signature-select' ).val();

        data = { action: 'ece_insert_signature', signature_id: signature_id };

        // Make an AJAX request
        $.post( ECE_Ajax.ajaxurl, data, function( response ) {

            // Decode the JSON code gotten from the response
            response = JSON.parse( response );

            // If everything went successfull
            if ( response.type == "success" ) {
                // Add the signature to the text editor
                tinyMCE.get( 'ece-message' ).setContent( tinyMCE.get( 'ece-message' ).getContent() + ' ' + response.signature );

                // Show a success message
                $( '.ece-signature-success' ).html( response.msg )
                setTimeout( function() {
                    $( '.ece-signature-success' ).fadeOut( "slow" );
                }, 5000 );
            } 
            // If there is one or more errors
            else {
                // Show the error(s)
                $( '.ece-signature-error' ).html( response.msg )
                setTimeout( function() {
                    $( '.ece-signature-error' ).fadeOut( "slow" );
                }, 5000 );
            }

            // Reset the disabled states and deactivate the loading animation
            $( '.ece_insert_signature_button' ).attr( "disabled", false );
            $( '#ece-signature-select' ).attr( "disabled", false );
            $( '.ece-spinner-signature' ).removeClass( 'is-active' );

        } );
    } );
} );