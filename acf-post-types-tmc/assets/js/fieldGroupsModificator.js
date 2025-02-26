( function( $ ){

    /**
     * This function initializes field specific logic.
     *
     * @param field - jQuery DOM object of field.
     */
    function initializeField( field ) {

        //  Disable field.

        field.find( '.tmc-acfptf-disabled' ).closest( '.acf-input' ).css( {
            'opacity'           : '0.5',
            'pointer-events'    : 'none'
        } );

    }

    //  ----------------------------------------
    //  Add action for ACF 4/5
    //  ----------------------------------------


    if( typeof acf.add_action !== 'undefined' ){

        //  ACF 5

        acf.add_action( 'ready_field', initializeField );
        acf.add_action( 'append_field', initializeField );


    } else {

        //  ACF 4

        $( document ).on( 'acf/setup_fields', function( e, postbox ){

            // Find all relevant fields
            $( postbox ).find( '.field' ).each( function(){

                initializeField( $( this ) );

            } );

        } );

    }

} )( jQuery );
