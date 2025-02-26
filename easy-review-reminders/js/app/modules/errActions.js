var errActions = function(){

    var errIsValidEmail = function(email){

            var pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return pattern.test(email);

        },
        errResetTableRowStyling = function( $schedulesTable ) {

            $schedulesTable
                .find( "tbody" )
                .find( "tr" )
                .each( function( index ) {
                    index++;
                    if ( index % 2 == 0 ) {
                        jQuery( this )
                            .removeClass( "odd" )
                            .removeClass( "alternate" )
                            .addClass( "even" );
                    } else {
                        jQuery( this )
                            .removeClass( "even" )
                            .addClass( "odd" )
                            .addClass( "alternate" );
                    }
                });

        },
        errSortEmailSchedules = function( $rows, $schedulesTable ){

            $rows.sort( function( a, b ) {
                var A = parseInt( jQuery( a ).find( ".err-days-after-successful-order" ).text() );
                var B = parseInt( jQuery( b ).find( ".err-days-after-successful-order" ).text() );

                if( A < B ) {
                    return -1;
                }

                if( A > B ) {
                    return 1;
                }

                return 0;

            });

            jQuery( $rows ).each( function( index, row ) {
                $schedulesTable.children( 'tbody' ).append( row );
            });

        },
        errDelegateFieldEntry = function( $formControls, key, scheduled_data ){

            $formControls.find( "#err_email_subject_field" ).val( scheduled_data.subject );
            
            if( scheduled_data.wrap.toLowerCase() === "yes" )
                $formControls.find( "#err_email_wrap_wc_header_footer_field" ).prop( "checked", true );
            else
                $formControls.find( "#err_email_wrap_wc_header_footer_field" ).prop( "checked", false );

            $formControls.find( "#err_email_heading_text" ).val( scheduled_data.heading_text );
            $formControls.find( "#err_email_days_after_successful_order_field" ).val( scheduled_data.days_after_successful_order );
            
            // Append data into the Visual and Text editor.
            if( $formControls.find( ".wp-editor-wrap" ).hasClass( "tmce-active" ) ){
                $formControls.find( "#err_email_content_field_ifr" ).contents().find( "#tinymce" ).html( scheduled_data.content );
            }else if( $formControls.find( ".wp-editor-wrap" ).hasClass( "html-active" ) ){
                $formControls.find( "#err_email_content_field" ).val( scheduled_data.content );
            }

            $formControls.find( "#err_email_schedule_id_field" ).val( key );

        },
        errCancelUpdate = function( $formControls, $schedulesTable ){

            $formControls.find( "#err_email_subject_field" ).val( "" );
            $formControls.find( "#err_email_wrap_wc_header_footer_field" ).prop( "checked", false );
            $formControls.find( "#err_email_heading_text" ).val( "" );
            $formControls.find( "#err_email_days_after_successful_order_field" ).val( "" );
            $formControls.find( "#err_email_content_field_ifr" ).contents().find( "#tinymce" ).html( "" );
            $formControls.find( "#err_email_schedule_id_field" ).val( "" );
        
            $formControls.slideUp( 200 );

            setTimeout( function(){
                $schedulesTable
                    .find( "tr.edited" )
                    .removeClass( "edited" );
            },  1000 );

        },
        errWrapCheck = function( $formControls ){

            if( $formControls.find( "#err_email_wrap_wc_header_footer_field" ).attr( "checked" ) ){
                $formControls.find( "input#err_email_heading_text" ).closest( "tr" ).show();
            }else{
                $formControls.find( "input#err_email_heading_text" ).closest( "tr" ).hide();
            }

        },
        errValidateEmailContent = function( $formControls ){

            var email_content_field;

            if( $formControls.find( ".wp-editor-wrap" ).hasClass( "tmce-active" ) ){
                var $contents = $formControls.find( "#err_email_content_field_ifr" ).contents().find( "#tinymce" );
                if( $contents.find( 'br' ).attr( 'data-mce-bogus' ) == '1' ){
                    email_content_field = '';
                }else{   
                    email_content_field = $contents.html();
                }
            }else if( $formControls.find( ".wp-editor-wrap" ).hasClass( "html-active" ) ){
                email_content_field = $formControls.find( "#err_email_content_field" ).val();
            }

            return email_content_field;
        };

    return {
        errIsValidEmail 			:   errIsValidEmail,
        errResetTableRowStyling 	: 	errResetTableRowStyling,
        errSortEmailSchedules 		: 	errSortEmailSchedules,
        errDelegateFieldEntry		: 	errDelegateFieldEntry,
        errCancelUpdate				: 	errCancelUpdate,
        errWrapCheck                :   errWrapCheck,
        errValidateEmailContent     :   errValidateEmailContent
    };

}();