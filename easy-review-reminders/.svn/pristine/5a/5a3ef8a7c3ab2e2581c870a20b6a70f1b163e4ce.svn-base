jQuery( document ).ready( function ( $ ) {

    /*
     |---------------------------------------------------------------------------------------------------------------
     | Variable Declarations
     |---------------------------------------------------------------------------------------------------------------
     */
    var $blacklist_controls = $( ".blacklist-controls" ),
        $button_controls = $( ".button-controls" ),
        $err_blacklist_emails_table = $( "#err-blacklist-emails-table" ),
        errorMessageDuration = "10000",
        successMessageDuration = "5000";

    /*
     |---------------------------------------------------------------------------------------------------------------
     | Helper Functions
     |---------------------------------------------------------------------------------------------------------------
     */
    function removeTableNoItemsPlaceholder ( $table ) {

        $table.find( "tbody" ).find( ".no-items" ).remove();

    }

    function resetTableRowStyling () {

        $err_blacklist_emails_table
            .find( "tbody" )
            .find( "tr" )
            .each( function( index ) {

                index++; // we do this coz index is zero base

                if (index % 2 == 0) {
                    // even
                    $(this)
                        .removeClass( "odd" )
                        .removeClass( "alternate" )
                        .addClass( "even" );

                } else {
                    // odd
                    $(this)
                        .removeClass( "even" )
                        .addClass( "odd" )
                        .addClass( "alternate" );
                }
            });
    }

    function resetFields () {

        $blacklist_controls.find( "#err_email_field" ).val( "" );

    }

    /*
     |---------------------------------------------------------------------------------------------------------------
     | Events
     |---------------------------------------------------------------------------------------------------------------
     */
    $button_controls.find( "#err-add-email" ).click( function () {

        var $this = $( this ),
            $errFields = [];

        $button_controls.addClass( "processing" );
        $this.attr( "disabled" , "disabled" );

        var email_field = $.trim( $blacklist_controls.find( "#err_email_field" ).val() ),
            attributes = [],
            options = [],
            reason = "manual";

        if ( email_field == "" )
            $errFields.push( "Field Email" );

        if ( $errFields.length > 0 ) {

            var errFieldsStr = "";
            for ( var i = 0 ; i < $errFields.length ; i++ ) {

                if ( errFieldsStr != "" )
                    errFieldsStr += ", ";

                errFieldsStr += $errFields[ i ];

            }

            toastr.error( errFieldsStr , err_blacklist_control_vars.empty_fields_error_message , { "closeButton" : true , "showDuration" : errorMessageDuration } );

            $button_controls.removeClass( "processing" );
            $this.removeAttr( "disabled" );

            return false;

        }

        if( email_field != "" && errActions.errIsValidEmail( email_field ) == false ){

            toastr.error( errFieldsStr , err_blacklist_control_vars.error_email_format , { "closeButton" : true , "showDuration" : errorMessageDuration } );

            $button_controls.removeClass( "processing" );
            $this.removeAttr( "disabled" );

            return false;

        }

        errBackEndAjaxServices.errAddEmailToBlacklist( email_field, reason )
            .done( function ( data, textStatus, jqXHR ) {

                if ( data.status == "success" ) {
                    
                    toastr.success( "", data.msg, { "closeButton" : true, "showDuration" : successMessageDuration } );

                    removeTableNoItemsPlaceholder( $err_blacklist_emails_table );

                    var tr_class = "";

                    if( $err_blacklist_emails_table.find( "tr" ).length % 2 == 0 )
                        tr_class = "odd alternate";
                    else
                        tr_class = "even";

                    $err_blacklist_emails_table.find( "tbody" )
                        .append( '<tr class="' + tr_class + ' edited">' +
                                    '<td class="meta hidden"></td>' +
                                    '<td class="err_row_email">' + data.email + '</td>' +
                                    '<td class="err_row_date">' + data.date + '</td>' +
                                    '<td class="err_row_reason">' + data.reason + '</td>' +
                                    '<td class="controls">' +
                                        '<a class="delete dashicons dashicons-no"></a>' +
                                    '</td>' +
                                '</tr>' );

                    resetFields();

                    setTimeout(function(){
                        $err_blacklist_emails_table
                            .find( "tr.edited" )
                            .removeClass( "edited" );
                    }, 2000);

                } else if ( data.status == "error" ){

                    toastr.error( "", data.msg, { "closeButton" : true, "showDuration" : successMessageDuration } );

                }

            })
            .fail( function ( jqXHR, textStatus, errorThrown ) {

                toastr.error( jqXHR.responseText, "", { "closeButton" : true, "showDuration" : errorMessageDuration } );

                console.log( err_blacklist_control_vars.failed_save_message );
                console.log( jqXHR );
                console.log( "----------" );

            })
            .always( function () {

                $button_controls.removeClass( "processing" );
                $this.removeAttr( "disabled" );

            });
    });

    $err_blacklist_emails_table.on( "click", ".delete", function () {

        var $this = $( this ),
            $current_tr = $this.closest( "tr" );

        if ( confirm( err_blacklist_control_vars.confirm_box_message ) ) {

            var email = $.trim( $current_tr.find( ".err_row_email" ).text() );

            $current_tr.find( ".delete" ).removeClass( "dashicons-no" ).addClass( "spinner" ).css( { "margin" : "0px", "visibility" : "visible", "float" : "left" } );

            errBackEndAjaxServices.errDeleteEmailFromBlacklist( email )
                .done( function ( data, textStatus, jqXHR ) {

                    if ( data.status == "success" ) {

                        $current_tr.fadeOut( "fast" , function () {

                            $current_tr.remove();

                            resetTableRowStyling();

                            if ( $err_blacklist_emails_table.find( "tbody" ).find( "tr" ).length <= 0 ) {

                                $err_blacklist_emails_table
                                    .find( "tbody" )
                                    .html(  '<tr class="no-items">' +
                                    '<td class="colspanchange" colspan="7">' + err_blacklist_control_vars.no_custom_field_message + '</td>' +
                                    '</tr>');

                            }

                        } );

                        toastr.success( "", data.msg , { "closeButton" : true , "showDuration" : successMessageDuration } );

                    } else if( data.status == "error" ){

                        toastr.error( "", data.msg, { "closeButton" : true, "showDuration" : successMessageDuration } );

                    }

                })
                .fail( function ( jqXHR, textStatus, errorThrown ) {

                    toastr.error( jqXHR.responseText, err_blacklist_control_vars.failed_delete_message, { "closeButton" : true, "showDuration" : errorMessageDuration } );
                    console.log( err_blacklist_control_vars.failed_delete_message );
                    console.log( jqXHR );
                    console.log( "----------" );

                });
        }
    });
});
