jQuery( document ).ready( function ( $ ) {

    /*
     |---------------------------------------------------------------------------------------------------------------
     | Variable Declarations
     |---------------------------------------------------------------------------------------------------------------
     */
    var $err_forms_controls = $( ".err-email-schedules-controls" ),
        $err_button_controls = $( ".err-button-controls" ),
        $err_email_schedules_table = $( "#err-email-schedules-table" ),
        $err_email_schedules_table_rows,
        errorMessageDuration = "10000",
        successMessageDuration = "5000";

    /*
     |---------------------------------------------------------------------------------------------------------------
     | Events
     |---------------------------------------------------------------------------------------------------------------
     */

    // View Scheduled Email
    $err_email_schedules_table.delegate( ".view" , "click" , function ( event ) {

        var $this = $( this ),
            $current_tr = $this.closest( "tr" ),
            $viewDialogBox = $( "#err-view-data" ),
            $errViewData = $( "#err-view-data" ),
            key = $this.siblings( ".key" ).val();

            $current_tr.find( ".view" ).removeClass( "dashicons-search" ).addClass( "spinner" ).css( { "margin":"0px 15px 0px 0px", "visibility":"visible" } );

            $this
                .attr( "disabled" , "disabled" )
                    .siblings( ".spinner" )
                        .css({
                                display : "inline-block",
                                visibility : "visible"
                            });

            errBackEndAjaxServices.errViewEmailSchedule( key )
                .done( function ( data , textStatus , jqXHR ) {

                    $current_tr.find( ".view" ).removeClass( "spinner" ).addClass( "dashicons-search" ).css( { "visibility":"visible" } );

                    if ( data.status == "success" ) {

                        var days = data.scheduled_data.days_after_successful_order;
                        if( days > 1 ){
                            days = days + " Days";
                        }else{
                            days = days + " Day";
                        }

                        $errViewData.find( ".err_email_subject_value" ).html( data.scheduled_data.subject );
                        $errViewData.find( ".err_email_wrap_wc_header_footer_value" ).html( data.scheduled_data.wrap );
                        $errViewData.find( ".err_email_heading_text_value" ).html( data.scheduled_data.heading_text );
                        $errViewData.find( ".err_email_days_after_successful_order_value" ).html( days );
                        $errViewData.find( ".err_email_content_value" ).html( data.scheduled_data.content );

                        $viewDialogBox.dialog({
                            dialogClass: "email-schedules",
                            modal: true,
                            zIndex: 10000,
                            autoOpen: true,
                            width: "auto",
                            resizable: false,
                            close: function ( event, ui ) {

                                $( this ).dialog("close");
                                $errViewData.find( ".err_email_subject_value" ).html( "" );
                                $errViewData.find( ".err_email_wrap_wc_header_footer_value" ).html( "" );
                                $errViewData.find( ".err_email_days_after_successful_order_value" ).html( "" );
                                $errViewData.find( ".err_email_content_value" ).html( "" );
                            
                            }
                        });

                    } else if ( data.status == "error" ){

                        toastr.error( '', data.msg, { "closeButton" : true, "showDuration" : successMessageDuration } );

                    } else {

                        console.log( err_email_schedule_control_vars.failed_view );
                        console.log( data );
                        console.log( "----------" );

                    }

                })
                .fail( function ( jqXHR , textStatus , errorThrown ) {

                    console.log( err_email_schedule_control_vars.failed_view );
                    console.log( jqXHR );
                    console.log( "----------" );

                })
                .always( function () {

                    $this
                        .removeAttr( "disabled" )
                            .siblings( ".spinner" )
                                .css({
                                    display : "none",
                                    visibility : "hidden"
                                });

                });

    });

    // Populate Scheduled Email
    $err_email_schedules_table.delegate( ".edit" , "click" , function () {

        errActions.errCancelUpdate( $err_forms_controls, $err_email_schedules_table );

        var $this = $( this ),
            $current_tr = $this.closest( "tr" ),
            editDialogBox = $( "#err-email-schedules-controls" ),
            $showHideForm = $( "#err-show-form" ),
            errScheduleForm = $( "#err-email-schedules-controls" ),
            key = $this.siblings( ".key" ).val();

            $current_tr.siblings( "tr" ).removeClass( "edited" );
            $current_tr.addClass( "edited" );

            $current_tr.find( ".edit" ).removeClass( "dashicons-edit" ).addClass( "spinner" ).css( { "margin":"0px 15px 0px 0px", "visibility":"visible" } );

            $this
                .attr( "disabled" , "disabled" )
                    .siblings( ".spinner" )
                        .css({
                                display : "inline-block",
                                visibility : "visible"
                            });

            errBackEndAjaxServices.errViewEmailSchedule( key )
                .done( function ( data , textStatus , jqXHR ) {

                    $current_tr.find( ".edit" ).removeClass( "spinner" ).addClass( "dashicons-edit" ).css( { "visibility":"visible" } );

                    if ( data.status == "success" ) {

                        // Show form
                        $( errScheduleForm ).slideDown( 200 );
                        $err_button_controls.find( "#err-update-email-schedule" ).show();
                        $err_button_controls.find( "#err-cancel-email-schedule" ).show();
                        $err_button_controls.find( "#err-add-email-schedule" ).hide();

                        errActions.errDelegateFieldEntry( $err_forms_controls, key, data.scheduled_data );
                        errActions.errWrapCheck( $err_forms_controls );

                    } else {

                        console.log( err_email_schedule_control_vars.failed_view );
                        console.log( data );
                        console.log( "----------" );

                    }

                })
                .fail( function ( jqXHR , textStatus , errorThrown ) {

                    console.log( err_email_schedule_control_vars.failed_view );
                    console.log( jqXHR );
                    console.log( "----------" );

                })
                .always( function () {

                    $this
                        .removeAttr( "disabled" )
                            .siblings( ".spinner" )
                                .css({
                                    display : "none",
                                    visibility : "hidden"
                                });

                });

    });
    
    // Cancel Update
    $err_button_controls.find( "#err-cancel-email-schedule" ).click( function () {

        errActions.errCancelUpdate( $err_forms_controls, $err_email_schedules_table );

    });

    // Update Scheduled Email
    $err_button_controls.find( "#err-update-email-schedule" ).click( function () {

        var $this = $( this ),
            $errFields = [],
            email_subject_field = $.trim( $err_forms_controls.find( "#err_email_subject_field" ).val() ),
            email_wrap_field = $.trim( $err_forms_controls.find( "#err_email_wrap_wc_header_footer_field:checked" ).val() ),
            heading_text_field = $.trim( $err_forms_controls.find( "#err_email_heading_text" ).val() ),
            email_days_after_successful_order_field = $.trim( $err_forms_controls.find( "#err_email_days_after_successful_order_field" ).val() ),
            email_content_field = errActions.errValidateEmailContent( $err_forms_controls ),
            key = $.trim( $err_forms_controls.find( "#err_email_schedule_id_field" ).val() ),
            days = $( "#err-email-schedules-table tr td:nth-child(3)" );

        $this
            .attr( "disabled" , "disabled" )
                .siblings( ".spinner" )
                    .css({
                            display : "inline-block",
                            visibility : "visible"
                        });

        if ( email_subject_field == "" )
            $errFields.push( err_email_schedule_control_vars.subject_empty );

        if ( email_days_after_successful_order_field == "" )
            $errFields.push( err_email_schedule_control_vars.days_empty );

        if ( email_days_after_successful_order_field != "" && email_days_after_successful_order_field <= 0 )
            $errFields.push( err_email_schedule_control_vars.days_positive_only );

        $( days ).each( function(){
            var d = parseInt( $( this ).text() ),
                emailKey = $( this ).siblings( '.controls' ).find( '.key' ).val();
                
            if( emailKey !== key && d == email_days_after_successful_order_field ){
                $errFields.push( err_email_schedule_control_vars.days_duplicate_values );
                return false;
            }
        });

        if( email_wrap_field )
            email_wrap_field = "yes";
        else
            email_wrap_field = "no";

        if( email_wrap_field == "yes" && heading_text_field == "" ){
            $errFields.push( err_email_schedule_control_vars.heading_text_empty );
        }

        if ( email_content_field == "" )
            $errFields.push( err_email_schedule_control_vars.content_empty );

        if ( $errFields.length > 0 ) {

            var errFieldsStr = "";
            for ( var i = 0 ; i < $errFields.length ; i++ ) {

                if ( errFieldsStr != "" )
                    errFieldsStr += '<br/>';

                errFieldsStr += $errFields[ i ];

            }

            toastr.error( errFieldsStr, err_email_schedule_control_vars.empty_fields_error_message, { "closeButton" : true, "showDuration" : errorMessageDuration } );

            $err_button_controls.removeClass( "processing" );
            $this.removeAttr( "disabled" );

            $this
                .removeAttr( "disabled" )
                    .siblings( ".spinner" )
                        .css({
                            display : "none",
                            visibility : "hidden"
                        });

            return false;

        }else{

            email_fields = {
                                subject : email_subject_field, 
                                wrap : email_wrap_field,
                                heading_text : heading_text_field,
                                days_after_successful_order : email_days_after_successful_order_field, 
                                content : email_content_field 
                            };
        }

        errBackEndAjaxServices.errUpdateEmailSchedule( key, email_fields )
            .done( function ( data , textStatus , jqXHR ) {

                if ( data.status == "success" ) {
                    
                    var days_after_successful_order = data.email_fields.days_after_successful_order;
                    if( days_after_successful_order > 1 ){
                        days_after_successful_order = days_after_successful_order + " Days";
                    }else{
                        days_after_successful_order = days_after_successful_order + " Day";
                    }

                    $err_email_schedules_table.find( ".err-email-id-" + key ).find( ".err-subject" ).html( data.email_fields.subject );
                    $err_email_schedules_table.find( ".err-email-id-" + key ).find( ".err-wrap-wc-header-footer" ).html( data.email_fields.wrap );
                    $err_email_schedules_table.find( ".err-email-id-" + key ).find( ".err-days-after-successful-order" ).html( days_after_successful_order );
                    $err_email_schedules_table.find( ".err-email-id-" + key ).find( ".err-content" ).html( data.email_fields.content );

                    toastr.success( "" , err_email_schedule_control_vars.success_edit_message , { "closeButton" : true , "showDuration" : successMessageDuration } );
                    
                    setTimeout(function(){
                        $err_email_schedules_table
                            .find( "tr.edited" )
                            .removeClass( "edited" );
                    }, 1000);

                    // Sort rows by day
                    $err_email_schedules_table_rows = $( "#err-email-schedules-table tbody tr" ).get();
                    $( $err_email_schedules_table_rows ).remove();
                    errActions.errSortEmailSchedules( $err_email_schedules_table_rows, $err_email_schedules_table );
                    errActions.errResetTableRowStyling( $err_email_schedules_table );

                    // Hide form
                    $err_forms_controls.slideUp( 200 );

                } else if ( data.status == "error" ){

                    toastr.error( '' , data.msg , { "closeButton" : true , "showDuration" : successMessageDuration } );

                } else {

                    toastr.error( data.error_message, err_email_schedule_control_vars.failed_edit_message, { "closeButton" : true, "showDuration" : errorMessageDuration } );

                    console.log( err_email_schedule_control_vars.failed_edit_message );
                    console.log( data );
                    console.log( "----------" );

                }

            })
            .fail( function ( jqXHR , textStatus , errorThrown ) {

                toastr.error( jqXHR.responseText, err_email_schedule_control_vars.failed_edit_message, { "closeButton" : true, "showDuration" : errorMessageDuration } );

                console.log( err_email_schedule_control_vars.failed_edit_message );
                console.log( jqXHR );
                console.log( "----------" );

            })
            .always( function () {

                $this
                    .removeAttr( "disabled" )
                        .siblings( ".spinner" )
                            .css({
                                display : "none",
                                visibility : "hidden"
                            });

            });
    });
    
    // Option to add heading text to the email when wrapping with wc header and footer is enabled
    errActions.errWrapCheck( $err_forms_controls );
    $err_forms_controls.find( "#err_email_wrap_wc_header_footer_field" ).off().on( "click", function(){
        if( $( this ).attr( "checked" ) ){
            $err_forms_controls.find( "input#err_email_heading_text" ).closest( "tr" ).show();
        }else{
            $err_forms_controls.find( "input#err_email_heading_text" ).closest( "tr" ).hide();
        }
    });

});