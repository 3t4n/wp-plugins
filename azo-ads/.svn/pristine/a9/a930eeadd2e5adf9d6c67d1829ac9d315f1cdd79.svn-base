jQuery( document ).ready( function ($) {

    /**
     * FUNCTIONS
     */
    function azo_ads_error( selector ) {
        var parentElement = $( selector ).parent(),
            msg = $( selector ).data( 'error' );
        if ( parentElement.find( '.azo-ads-error' ).length == 0 ) parentElement.append( '<div class="azo-ads-error"></div>' );
        parentElement.find( '.azo-ads-error' ).html( msg );
    }

    function azo_ads_get_nonce_key() {
        var nonce_key = $( '#_wpnonce' ).val();
        if ( nonce_key.length > 0 ) return nonce_key;
        else return '';
    }

    /* Init AZO Tooltip */
    tippy( '.azo-tooltip', {
        onShow(instance) {
            instance.setContent( instance.reference.dataset.azoTooltip );
        },
    });
    tippy( '.azo-ads-row-inner.require-pro, .azo-ads-row-inner .require-pro.has-btn-only', {
        onShow(instance) {
            instance.setContent( 'This feature requires a Pro license!' );
        },
    });

    /* Init AZO Modal */
    // $( '.azo-modal' ).click( function( event ) {
    //     event.preventDefault();
    //     $( this ).modal({
    //         fadeDuration: 100
    //     });
    // });

    /* LISTING ADS PAGE */
    $( '.filter-hook-position' ).select2( {
        minimumResultsForSearch: -1,
    } );

    "use strict";

    // Class definition Ad Listing
    var AZO_Ads_Listing = function () {
        // Shared variables
        var table;
        var datatable;

        // Private functions
        var initDatatable = function () {
            // Init datatable --- more info on datatables: https://datatables.net/manual/
            datatable = $(table).DataTable({
                'info': true,
                "sDom": 'ir<"azo-ads-table-container"t><"azo-ads-table-bottom"lp>',
                'order': [],
                'pageLength': 10,
                'columnDefs': [
                    { orderable: false, targets: 0 }, // Disable ordering on column 0 (checkbox)
                    { orderable: false, targets: 5 }, // Disable ordering on column 5 (checkbox)
                    { orderable: false, targets: 6 }, // Disable ordering on column 6 (action)
                ],
                pagingType: 'simple_numbers',
                language : {
                    sLengthMenu: "_MENU_",
                    paginate: {
                        first: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M213.9 388L92.23 252l121.6-136c4.094-4.563 6.125-10.28 6.125-16c0-6.594-2.687-13.16-7.1-17.88C202.1 73.28 186.9 74.12 178.1 83.99L42.14 235.1c-8.187 9.125-8.187 22.88 0 32l135.1 152c8.812 9.875 23.1 10.72 33.87 1.875C221.9 413.1 222.7 397.8 213.9 388zM234.1 235.1c-8.187 9.125-8.187 22.88 0 32l135.1 152c8.812 9.875 23.1 10.72 33.87 1.875c9.906-8.813 10.72-24.03 1.875-33.88L284.2 252l121.6-136c4.094-4.563 6.125-10.28 6.125-16c0-6.594-2.687-13.16-7.1-17.88c-9.874-8.844-25.06-8-33.87 1.875L234.1 235.1z"/></svg>',
                        previous: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M166.5 424.5l-143.1-152c-4.375-4.625-6.562-10.56-6.562-16.5c0-5.938 2.188-11.88 6.562-16.5l143.1-152c9.125-9.625 24.31-10.03 33.93-.9375c9.688 9.125 10.03 24.38 .9375 33.94l-128.4 135.5l128.4 135.5c9.094 9.562 8.75 24.75-.9375 33.94C190.9 434.5 175.7 434.1 166.5 424.5z"/></svg>', // or '←' 
                        next: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M89.45 87.5l143.1 152c4.375 4.625 6.562 10.56 6.562 16.5c0 5.937-2.188 11.87-6.562 16.5l-143.1 152C80.33 434.1 65.14 434.5 55.52 425.4c-9.688-9.125-10.03-24.38-.9375-33.94l128.4-135.5l-128.4-135.5C45.49 110.9 45.83 95.75 55.52 86.56C65.14 77.47 80.33 77.87 89.45 87.5z"/></svg>', // or '→'
                        last: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M238.1 115.1L359.8 252l-121.6 136c-4.094 4.563-6.125 10.28-6.125 16c0 6.594 2.687 13.16 7.1 17.88c9.874 8.844 25.06 8 33.87-1.875l135.1-152c8.187-9.125 8.187-22.88 0-32l-135.1-152c-8.812-9.875-23.1-10.72-33.87-1.875C230.1 90.93 229.3 106.2 238.1 115.1zM217.9 268c8.187-9.125 8.187-22.88 0-32L81.88 83.99C73.07 74.12 57.88 73.28 48 82.12C38.1 90.93 37.29 106.2 46.13 115.1L167.8 252l-121.6 136c-4.094 4.563-6.125 10.28-6.125 16c0 6.594 2.687 13.16 7.1 17.88c9.874 8.844 25.06 8 33.87-1.875L217.9 268z"/></svg>'
                    }
                }
            });

            // Re-init functions on datatable re-draws
            datatable.on('draw', function () {
                // handleDeleteRows();
            });
        }

        // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
        var handleSearchDatatable = () => {
            const filterSearch = document.querySelector('[data-azo-ads-filter="search"]');
            filterSearch.addEventListener('keyup', function (e) {
                datatable.search(e.target.value).draw();
            });
        }

        // Handle status filter dropdown
        var handleStatusFilter = () => {
            const filterStatus = document.querySelector('[data-azo-ads-filter="position"]');
            $(filterStatus).on('change', e => {
                let value = e.target.value;
                if(value === 'all'){
                    value = '';
                }
                datatable.column(2).search(value).draw();
            });
        }

        // Public methods
        return {
            init: function () {
                table = document.querySelector( '#azo-ads-table' );

                if (!table) {
                    return;
                }

                initDatatable();
                handleSearchDatatable();
                handleStatusFilter();
            }
        };
    }();
    AZO_Ads_Listing.init();


    // Class definition Ad Report Listing
    var AZO_Ads_Reports_Listing = function () {
        // Shared variables
        var table;
        var datatable;

        // Private functions
        var initDatatable = function () {
            // Init datatable --- more info on datatables: https://datatables.net/manual/
            datatable = $(table).DataTable({
                'info': true,
                "sDom": 'ir<"azo-ads-table-container"t><"azo-ads-table-bottom"lp>',
                'order': [],
                'pageLength': 10,
                bAutoWidth: false, 
                aoColumns : [
                    { sWidth: '28%' },
                    { sWidth: '9%' },
                    { sWidth: '9%' },
                    { sWidth: '9%' },
                    { sWidth: '9%' },
                    { sWidth: '9%' },
                    { sWidth: '9%' },
                    { sWidth: '9%' },
                    { sWidth: '9%' }
                ],
                language : {
                    sLengthMenu: "_MENU_",
                    paginate: {
                        next: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M89.45 87.5l143.1 152c4.375 4.625 6.562 10.56 6.562 16.5c0 5.937-2.188 11.87-6.562 16.5l-143.1 152C80.33 434.1 65.14 434.5 55.52 425.4c-9.688-9.125-10.03-24.38-.9375-33.94l128.4-135.5l-128.4-135.5C45.49 110.9 45.83 95.75 55.52 86.56C65.14 77.47 80.33 77.87 89.45 87.5z"/></svg>', // or '→'
                        previous: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M166.5 424.5l-143.1-152c-4.375-4.625-6.562-10.56-6.562-16.5c0-5.938 2.188-11.88 6.562-16.5l143.1-152c9.125-9.625 24.31-10.03 33.93-.9375c9.688 9.125 10.03 24.38 .9375 33.94l-128.4 135.5l128.4 135.5c9.094 9.562 8.75 24.75-.9375 33.94C190.9 434.5 175.7 434.1 166.5 424.5z"/></svg>' // or '←' 
                    }
                }
            });

            // Re-init functions on datatable re-draws
            datatable.on('draw', function () {
                // handleDeleteRows();
            });
        }

        // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
        var handleSearchDatatable = () => {
            const filterSearch = document.querySelector('[data-azo-ads-filter="search"]');
            filterSearch.addEventListener('keyup', function (e) {
                datatable.search(e.target.value).draw();
            });
        }

        // Handle status filter dropdown
        var handleStatusFilter = () => {
            const filterStatus = document.querySelector('[data-azo-ads-filter="position"]');
            $(filterStatus).on('change', e => {
                let value = e.target.value;
                if(value === 'all'){
                    value = '';
                }
                datatable.column(1).search(value).draw();
            });
        }

        // Handle update row
        var handleUpdateRow = ( data ) => {

            $( '#azo-ads-table-reports tbody tr' ).each( function ( index, element ) {
                var ad_id = parseInt( $( element ).data( 'id' ) );
                var temp = datatable.row( element ).data();
                key1 = $.map( data, function( v1, i1 ) {
                    if ( i1 == ad_id ) {
                        key2 = $.map( data[i1], function( v2, i2 ) {
                            if ( i2 == 1 ) { // impression
                                var row_index = 0;
                            }
                            else if ( i2 == 2 ) { // click
                                var row_index = 4;
                            }
                            key3 = $.map( data[i1][i2], function( v3, i3 ) {
                                for ( let ri = ( row_index + 1 ); ri < ( row_index + 3 ); ri ++ ) {
                                    if ( ri == parseInt( i3 ) ) {
                                        temp[ri] = v3;
                                    }
                                }
                                temp[(row_index + parseInt( i3 ))] = v3;

                                return i3;
                            });

                            return i2;
                        });
                    }

                    return i1;
                });
                datatable.row( element ).data( temp );
            } );
        }

        // Public methods
        return {
            init: function () {
                table = document.querySelector( '#azo-ads-table-reports' );

                if (!table) {
                    return;
                }

                initDatatable();
                handleSearchDatatable();
                handleStatusFilter();
            },
            update: function ( data ) {
                table = document.querySelector( '#azo-ads-table-reports' );

                if (!table) {
                    return;
                }

                handleUpdateRow( data );
            },
        };
    }();
    AZO_Ads_Reports_Listing.init();

    // checkbox
    $( '.azo-ads-row .form-content .form-check-box' ).on( 'click', function() {
        if ( $( this ).val() == 0 || $( this ).val() == '' ) {
            // process if pro activated
            if ( ! $( this ).parent().hasClass( 'require-pro' ) ) {
                $( this ).val( 1 );
                $( this ).attr( 'checked', 'checked' );
            }
        }
        else {
            $( this ).val( 0 );
            $( this ).removeAttr( 'checked' );
        }
    });

    // remove input text content with icon
    $( '.has-azo-ads-remove-content-icon input[type=text]' ).on( 'focus keyup', function() {
        if ( $( this ).val().length > 0 ) {
            if ( ! $( this ).next().hasClass( 'active' ) ) $( this ).next().addClass( 'active' ).fadeOut( 0 ).fadeIn( 200 );
        }
        else $( this ).next().removeClass( 'active' );
    });
    // remove input text content when click the icon
    $( '.azo-ads-remove-content-icon' ).on( 'click', function() {
        $( this ).parent().find( 'input' ).val( '' );
        $( this ).removeClass( 'active' );
    });

    // check all ids from ads
    $( '#azo-ads-table input[name=checkAll]' ).on( 'click', function() {
        var typeOfCheck = $( this ).prop( 'checked' );
        $( '#azo-ads-table input[name=id]' ).each( function ( index, element ) {
            $( element ).prop( 'checked', typeOfCheck );
		});
    });
    
    /* SETTINGS PAGE */
    $( '.azo-ads-dropdown' ).select2( { } );
    $( '.azo-ads-multiple-select' ).select2( {
            allowClear: true,
    } );
    // tabs
    $( '.azo-ads-tabs li a' ).on( 'click', function() {
        var id_tab = $( this ).attr( 'href' );
        $( '.azo-ads-tabs li a' ).removeClass( 'active' );
        $( this ).addClass( 'active' );
        $( '.tab-content .tab-pane' ).hide();
        $( id_tab ).fadeIn();
    } );

    /* MANAGE ADS */
    $( '.azo-ads-manage .ad-pt li:not(.require-pro)' ).on( 'click', function() {
        $( this ).find( 'input' ).prop( 'checked', true );
        $( '.azo-ads-manage .ad-pt li' ).removeClass( 'active' );
        $( this ).addClass( 'active' );
    } );
    // Setting up datetimepicker
    $( '.azo-ads-datetimepicker' ).flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        minDate: "today",
        time_24hr: true,
        onChange: function( selectedDates, dateStr, instance ) {
            $( instance.element ).parent().find( '.azo-ads-remove-content-icon' ).addClass( 'active' ).fadeOut( 0 ).fadeIn( 200 );
        },
    });
    // Require Pro
    $( '.azo-ads-manage .ad-pt li.require-pro, .azo-ads-row-inner.require-pro .form-content, .azo-ads-row-inner .form-content.require-pro.has-btn-only' ).on( 'click', function( e ) {
        e.preventDefault;
        $( '<div class="modal"><h3>Require Pro Version!</h3><p>This feature is not available on this Free version. Please consider to upgrade to the Pro version to unlock all amazing features.</p><a href="admin.php?page=azo-ads-upgrade" class="upgrade-now-btn">Upgrade Now</a></div>' ).appendTo( 'body' ).modal();
        return false;
    });

    // next step btn
    var currentStep = 1;
    $( '.azo-btn.btn-back, .azo-btn.btn-continue' ).on( 'click', function( event ) {
        event.preventDefault();

        // FormData object 
        var formData = new FormData(  );

        // click on btn
        if ( $( this ).hasClass( 'btn-back' ) ) currentStep -= 1;
        else if ( $( this ).hasClass( 'btn-continue' ) ) currentStep += 1;

        if ( currentStep == 2 ) {
            if ( typeof $( 'input[name=position]:checked' ).val() === "undefined" ) {
                $( '<div class="modal"><p>Please select a position. Thank you.</p><a href="#" rel="modal:close">Close</a></div>' ).appendTo( 'body' ).modal();
                currentStep -= 1;
                return false;
            }
        }
        else if ( currentStep == 3 ) {
            if ( typeof $( 'input[name=type]:checked' ).val() === "undefined" ) {
                $( '<div class="modal"><p>You are missing Ad Type. Please select one.</p><a href="#" rel="modal:close">Close</a></div>' ).appendTo( 'body' ).modal();
                currentStep -= 1;
                return false;
            }
            
            // show manage ads content from type
            $( '.manage-ads-content-wrapper' ).hide(); // hide from all
            $( '.manage-ads-content-' + $( 'input[name=type]:checked' ).val() ).addClass( 'active' ).fadeIn();
        }
        else if ( currentStep == 4 ) {

            // ads content from type
            $( '.manage-ads-content-wrapper.active :input, .manage-ads-content-wrapper.active textarea, .manage-ads-content-wrapper.active select' ).map( function() {
                if ( $( this ).val() == '' && $( this ).prop( 'required' ) ) {
                    azo_ads_error( this );
                    currentStep = 3;
                    return false;
                }
                else {
                    $( this ).parent().find( '.azo-ads-error' ).remove();
                }
            });
        }
        else if ( currentStep == 5 ) { // to final step

            // get data from visibility & targeting
            var vt_element = ['vi', 've', 'ti', 'te'],
                vt_data = [];
            vt_element.forEach( function( value, i ) {

                var vt_element_data = [],
                    vt_element_data_length = $( '.ads-ad-step [data-type="' + value +'"] .vt-ie-content' ).find( '.vt-ie-row' ).length;

                $( '.ads-ad-step [data-type="' + value +'"] .vt-ie-content' ).find( '.vt-ie-row' ).each( function( index, element ) {
                    var cond = $( element ).find( '.vt-ie-cond :selected' ).val();
                    if ( ( index + 1 ) == vt_element_data_length ) cond = '';
                    var vt_ie_content = {
                        type: {
                            label: $( element ).find( '.type' ).data( 'label' ),
                            value: $( element ).find( '.type' ).data( 'value' )
                        },
                        value: {
                            label: $( element ).find( '.value' ).data( 'label' ),
                            value: $( element ).find( '.value' ).data( 'value' )
                        },
                        condition: cond
                    };
                    vt_element_data.push( vt_ie_content );
                });

                vt_data.push( vt_element_data );
            });

            // disabled back btn
            $( '.azo-btn.btn-back' ).css( 'visibility', 'hidden' );
            // disable & rotate submit btn
            $( '.azo-btn.btn-continue' ).prop( 'disabled', true );
            $( '.azo-btn.btn-continue' ).text( 'Please wait... ' );
            $( '.azo-btn.btn-continue' ).addClass( 'azo-spinner spinner-left' );

            formData.append( 'action', 'azoads_manage_ads' );
            formData.append( 'id', parseInt( $( 'input[name=id]' ).val() ) );

            formData.append( 'title', $( 'input[name=title]' ).val() );
            formData.append( 'position', $( 'input[name=position]:checked' ).val() );
            // form postion
            $( '.form_position' ).each( function( index, element ) {
                if ( $( element ).hasClass( 'active' ) ) {
                    $( element ).find( '.azo-ads-row' ).each( function ( i, row ) {
                        var fp_input_name = $( row ).find( 'input' ).attr( 'name' ),
                        fp_input_value = $( row ).find( 'input' ).val(),
                        fp_is_disabled = $( row ).find( 'input' ).prop( 'disabled' ),
                        fp_dd_name = $( row ).find( 'select' ).attr( 'name' ),
                        fp_dd_value = $( row ).find( 'select' ).val();
                        if ( fp_input_name && fp_input_value && ! fp_is_disabled ) formData.append( fp_input_name, fp_input_value );
                        if ( fp_dd_name && fp_dd_value ) formData.append( fp_dd_name, fp_dd_value );
                    });
                }
            });

            // ads content from type
            $( '.manage-ads-content-wrapper.active :input' ).map( function() {
                var value = '',
                    type = $( this ).prop( 'type' ),
                    name = $( this ).prop( 'name' );
                // checked radios/checkboxes
                if ( type == 'checkbox' || type == 'radio' ) { 
                    value = $( this ).val();
                }
                // all other fields, except buttons
                else if ( type != 'button' && type != 'submit' ) {
                    value = $( this ).val();
                }

                formData.append( name, value );
            });

            formData.append( 'type', $( 'input[name=type]:checked' ).val() );
            // formData.append( 'content', $( 'textarea[name=content]' ).val() );
            formData.append( 'align', $( 'select[name=align]' ).find( ':selected' ).val() );
            formData.append( 'margin_top', $( 'input[name=margin_top]' ).val() );
            formData.append( 'margin_right', $( 'input[name=margin_right]' ).val() );
            formData.append( 'margin_bottom', $( 'input[name=margin_bottom]' ).val() );
            formData.append( 'margin_left', $( 'input[name=margin_left]' ).val() );
            formData.append( 'padding_top', $( 'input[name=padding_top]' ).val() );
            formData.append( 'padding_right', $( 'input[name=padding_right]' ).val() );
            formData.append( 'padding_bottom', $( 'input[name=padding_bottom]' ).val() );
            formData.append( 'padding_left', $( 'input[name=padding_left]' ).val() );
            formData.append( 'label', $( 'input[name=label]' ).val() );
            formData.append( 'label_position', $( 'select[name=label_position]' ).find( ':selected' ).val() );
            formData.append( 'expire_datetime', $( 'input[name=expire_datetime]' ).val() );
            formData.append( 'show_by_days', $( '#show_by_days' ).select2( 'val' ) );
            formData.append( 'active', $( 'input[name=active]' ).val() );
            formData.append( 'vt_data', JSON.stringify( vt_data ) );

            formData.append( '_wpnonce', $( '#_wpnonce' ).val() );
            
            // store all variables name to one
            var azoads_variables = [];
            for ( var pair of formData.entries() ) {
                azoads_variables.push( pair[0] );
            }
            formData.append( 'azoads_variables', JSON.stringify( azoads_variables ) );

            // send ajax data
            $.ajax({
                type: 'post',
                dataType: 'JSON',
                contentType: false,
                processData: false,
                url: azoads_ajax.ajaxurl,
                data: formData,
                success: function( res ) {
                    // console.log(res);
                    if ( res.success ) {
                        // hide all buttons
                        $( '.form-btn' ).hide();
                        
                        // change post_id of 'Edit it again'
                        if ( res.data.post_id > 0 ) {
                            var edit_again_url = $( '.btn-manage-nav.edit-again' ).attr( 'href' ),
                                id = $( '#id' ).val();
                            $( '.btn-manage-nav.edit-again' ).attr( 'href', edit_again_url.replace( 'id=' + id, 'id=' + res.data.post_id ) );
                        }

                        process_next_step();
                    }
                }
            });

            return;
        }
        process_next_step();
    } );

    function process_next_step() {
        
        $( '.ads-ad-step' ).hide();
        $( '.ads-ad-step:nth-child(' + currentStep + ')' ).fadeIn( 'slow' );

        // hidden or visible btn-back
        if ( currentStep == 1 ) $( '.azo-btn.btn-back' ).css( 'visibility', 'hidden' );
        else $( '.azo-btn.btn-back' ).css( 'visibility', 'visible' );

        // step navigation
        var step_nav = '.azo-ads-manage-steps li span';
        var curr_step_nav = '.azo-ads-manage-steps li:nth-child(' + currentStep + ') span';
        $( step_nav ).removeClass( 'active' );
        $( curr_step_nav ).addClass( 'active' );
    }

    /**
     * Visibility & Targeting
     */
    $( '.vt-ie-label .btn' ).on( 'click', function() {
        var type = $( this ).parent().parent().data( 'type' );
        $( '[data-type=' + type + '] .vt-ie-form' ).toggleClass( 'active' );
    });

    $( '.vt-type' ).on( 'change', function() {
        var type_selector = $( this );
        var val_name = $( this ).attr( 'name' );
        val_name_form = val_name.replace( 'type', 'value' );
        val_name = '#' + val_name_form;
        var type = $( this ).data( 'type' );

        $( val_name ).empty();
        // remove the input field
        $( '.' + val_name_form + '-input' ).remove();
        // show the select value field
        $( val_name ).select2();
        
        var vtid = $( this ).val();
        if ( vtid.length == 0 ) return;
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: azoads_ajax.ajaxurl,
            data: { action: 'azoads_get_value_list_' + type, vtid: vtid, _wpnonce: azo_ads_get_nonce_key() },
            success: function( res ) {
                if ( res.success ) {
                    // console.log(res);
                    if ( res.data.length == 1 ) {
                        // is text input type
                        if ( res.data[0].id == -1 ) {
                            $( '<input type="text" class="azo-ads-form-control ' + val_name_form + '-input" name="' + val_name_form + '" id="' + val_name_form + '" value="" placeholder="Enter ' + type_selector.find( ':selected' ).text() + '">' ).insertBefore( val_name );
                            // reset value
                            $( 'select' + val_name ).data( 'placeholder', 'Choose Value' );
                            $( 'select' + val_name ).next( '.select2-container' ).hide();
                            return;
                        }
                    }

                    // update placeholder
                    $( val_name ).data( 'placeholder', 'Choose ' + type_selector.find( ':selected' ).text() );
                    $( val_name ).select2( {
                        data: res.data
                    } ).val( '' ).trigger( 'change' );
                }
                else {
                    if ( res.data == 'Require Pro Version' ) {

                        $( '<div class="modal"><h3>Require Pro Version!</h3><p>This feature is not available on this Free version. Please consider to upgrade to the Pro version to unlock all amazing features.</p><a href="admin.php?page=azo-ads-upgrade" class="upgrade-now-btn">Upgrade Now</a></div>' ).appendTo( 'body' ).modal();
                    }
                }
            }
        });
        
    } );
    
    // add conditional rule
    $( '.vt-ie .btn-add' ).on( 'click', function() {
        var type = $( this ).parent().parent().data( 'type' );
        var type_name = '#' + type + '-type';
        var val_name = '#' + type + '-value';
        // console.log(type_name);
        // console.log(val_name);
        
        if ( $( type_name ).val() === null || $( val_name ).val() === null ) return;

        var content_selector = $( '[data-type=' + type + '] .vt-ie-content' );
        var type_value = ( $( val_name ).find( ':selected' ).text().length > 0 ) ? $( val_name ).find( ':selected' ).text() : $( val_name ).val();

        var value_value = ( $( val_name ).attr( 'type' ) == 'text' ) ? $( val_name ).val() : $( val_name ).find( ':selected' ).val();

        content_selector.append( '<span class="vt-ie-row"><span class="desc"><span class="type" data-label="' + $( type_name ).find( ':selected' ).text() + '" data-value="' + $( type_name ).find( ':selected' ).val() + '">' + $( type_name ).find( ':selected' ).text() + '</span>: <span class="value" data-label="' + type_value + '" data-value="' + value_value + '">' + type_value  + '</span></span><span class="cond"><select class="azo-ads-dropdown vt-ie-cond" data-control="select2"><option value="and">AND</option><option value="or">OR</option></select></span><span class="remove"></span></span>' );
        content_selector.find( '.vt-ie-cond' ).select2( { minimumResultsForSearch: -1 } );
        $( '[data-type=' + type + '] .vt-ie-form' ).removeClass( 'active' );
        $( type_name + ', ' + type_name ).select2().val( '' ).trigger( 'change' );
    } );

    // remove row condition
    $( '.ads-ad-step .form-content' ).on( 'click', '.remove', function() {
        $( this ).parent().remove();
    });

    // delete ads
    $( '#azo-ads-table' ).on( 'click', 'tr a.delete', function( event ) {
        event.preventDefault();
        $( '#azo-modal' ).html( `
        <div class="confirmation delete-ads">
            <div class="modal-content">All data would be removed. Are you sure to delete this ad?</div>
            <div class="modal-btn">
                <a href="javascript:void(0);" class="azo-btn azo-btn-light" rel="modal:close">
                    Cancel
                </a>
                <a href="javascript:void(0);" class="azo-btn azo-btn-primary confirmed" data-id="` + $( this ).data( 'id' ) + `" rel="modal:close">
                    Confirm
                </a>
                
            </div>
        </div>` ).modal();
    });
    $( '#azo-modal' ).on( 'click', '.delete-ads .confirmed', function() {
        var id = parseInt( $( this ).data( 'id' ) );
        $( '#azo-ads-table tr[data-id=' + id + ']' ).addClass( 'deleting' );
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: azoads_ajax.ajaxurl,
            data: { action: 'azoads_delete_ads', id: id, _wpnonce: azo_ads_get_nonce_key() },
            success: function( res ) {
                if ( res.success ) {
                    $( '#azo-ads-table tr[data-id=' + id + ']' ).fadeOut( 'normal', function() {
                        $( this ).remove();
                    });
                }
            }
        });
    });

    // clone ads
    $( '#azo-ads-table' ).on( 'click', 'tr a.clone', function( event ) {
        event.preventDefault();
        var id = parseInt( $( this ).data( 'id' ) );
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: azoads_ajax.ajaxurl,
            data: { action: 'azoads_duplicate_ads', id: id, _wpnonce: azo_ads_get_nonce_key() },
            success: function( res ) {
                // console.log(res);
                if ( res.success ) {
                    var toBeClonedHTML = $( '#azo-ads-table tr[data-id=' + id + ']' ).prop( 'outerHTML' ),
                        ads_name = $( '#azo-ads-table tr[data-id=' + id + '] .ads-name-wrapper a.ads-name' ).text();
                    toBeClonedHTML = toBeClonedHTML.replace( '<tr' , '<tr data-status="duplicated"' );
                    toBeClonedHTML = toBeClonedHTML.replace( ads_name , ads_name + ' Duplicate' );
                    toBeClonedHTML = toBeClonedHTML.replace( 'checked="checked"', '' );
                    toBeClonedHTML = toBeClonedHTML.split( 'data-id="' + id + '"' ).join( 'data-id="' + res.data.ID + '"' );
                    toBeClonedHTML = toBeClonedHTML.split( 'id=' + id + '"' ).join( 'id=' + res.data.ID + '"' );
                    $( toBeClonedHTML ).insertBefore( '#azo-ads-table tr[data-id=' + id + ']' ).hide().fadeIn( 'normal' );
                }
            }
        });
    });

    // change ads status
    $( '#azo-ads-table' ).on( 'click', 'tr input[name=active]', function() {
        var active = ( $( this ).prop( 'checked' ) ) ? 1 : 0;
        var id = parseInt( $( this ).parent().parent().data( 'id' ) );
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: azoads_ajax.ajaxurl,
            data: { action: 'azoads_update_ads_status', active: active, id: id, _wpnonce: azo_ads_get_nonce_key() },
            success: function( res ) {
                if ( res.success ) {

                }
            }
        });
    });

    function azoads_smooth_scroll( id ) {
        const destination = $( '.' + id );
        $( 'html, body' ).animate( {
            scrollTop: destination.offset().top
        }, 'slow' );
    }

    // show form when selected ads position
    $( 'li.item_position' ).on( 'click', function() {
        var item = $( this ).attr( 'id' );
        item = item.replace( 'position_', '' );
        $( '.form_position' ).removeClass( 'active' );
        $( '.form_position' ).css( 'display', 'none');
        var target_item = $( '.form_position_' + item );
        if ( ! target_item.length ) return;
        target_item.addClass( 'active' );
        target_item.css( 'display', 'block').hide().fadeIn();
        azoads_smooth_scroll( 'form_position_' + item );
        target_item.find( 'input' ).focus();
    });

    // change text repeat tag
    function change_text_repeat_tag( curInput ) {
        var selector = $( curInput );
        if ( ! selector.length ) return;
        var num = selector.val(),
            labelText = selector.parent().parent().parent();
        labelText.find( 'label span.count' ).text( num );
        if ( num > 1 ) labelText.find( 'label span.sop' ).text( 's' );
        else labelText.find( 'label span.sop' ).text( '' );
    }
    function change_text_repeat_tags() {
        $( '.repeatByTag' ).each( function ( index, element ) {
            change_text_repeat_tag( element );
        });
    }
    change_text_repeat_tags();
    $( '.repeatByTag' ).on( 'keyup', function() {
        change_text_repeat_tag( this );
    } );

    /* UPLOAD MEDIA DIALOGUE */
	// on upload button click
	$( '.azo-ads-manage .azo-ads-upload' ).on( 'click', function( event ) {
		event.preventDefault();
        const type = $( this ).hasClass( 'video' ) ? 'video' : 'image';
		const button = $( this );
		const imageId = button.next().next().val();
		const customUploader = wp.media( {
			title: 'Upload ' + type, // modal window title
			library : {
				// uploadedTo : wp.media.view.settings.post.id, // attach to the current post?
				type : type
			},
            acceptFiles: type + '/*',
			button: {
				text: 'Use this ' + type // button label text
			},
			multiple: false
		} ).on( 'select', function() { // it also has "open" and "close" events
			const attachment = customUploader.state().get( 'selection' ).first().toJSON();
            button.addClass( 'active' );
            if ( attachment.url ) {
                // console.log(attachment);
                button.removeClass( 'button' ).html( ( type == 'video') ? '<video class="ad-type-video-player" width="' + attachment.width + '" height="' + attachment.height + '" controls><source src="' + attachment.url + '" type="' + attachment.mime + '">Your browser does not support the video tag.</video>' : '<img src="' + attachment.url + '">'); // add image instead of "Upload Image"
                button.next().show(); // show "Remove image" link
                button.next().next().val( attachment.url ); // Populate the hidden field with image url

                // insert attachment id to video_id
                $( '.manage-ads-content input[name=video_id]' ).val( attachment.id );
            }
		})
		// already selected images
		customUploader.on( 'open', function() {
			if( imageId ) {
			  const selection = customUploader.state().get( 'selection' )
			  attachment = wp.media.attachment( imageId );
			  attachment.fetch();
			  selection.add( attachment ? [attachment] : [] );
			}
		})
		customUploader.open()
	} );
	// on remove button click
	$( '.azo-ads-manage .azo-ads-upload-remove' ).on( 'click', function( event ) {
		event.preventDefault();
		const button = $( this );
		button.next().val( '' ); // emptying the hidden field
		button.hide().prev().removeClass( 'active' ).html( 'Upload image' ); // replace the image with text
	} );
    /* // UPLOAD MEDIA DIALOGUE */

    /* Rotator Type Selection */
    $( 'select[name=rotator_type]' ).on( 'change', function() {
        if ( $( this ).val() == 'auto-timer' ) $( '.rotator-auto-timer-container' ).fadeIn();
        else $( '.rotator-auto-timer-container' ).fadeOut();
    });

    // form by condition: fbc
    $( '.azoads-fbc' ).on( 'change', function() {
        var fbc_type = $( this ).data( 'azoads-fbc' );
        $( '.azoads-fbc-content.azoads-fbc-' + fbc_type ).fadeOut( 'fast' );
        $( '.azoads-fbc-' + $( this ).val() + '.azoads-fbc-' + fbc_type ).fadeIn();
    });

    // REPORTS
    $( '#reports-ad, #reports-time' ).on( 'change', function() {
        var ad = $( '#reports-ad' ).val(),
        time = $( '#reports-time' ).val();
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: azoads_ajax.ajaxurl,
            data: { action: 'azoads_reports_update_chart', ad: ad, time: time, _wpnonce: azo_ads_get_nonce_key() },
            success: function( res ) {
                // console.log(res);
                if ( res.success ) {
                    azoads_chart.updateOptions({
                        xaxis: {
                            categories: res.data.categories
                        },
                        series: [
                            {
                                name: 'Impression',
                                data: res.data.impression
                            },
                            {
                                name: 'Click',
                                data: res.data.click
                            },
                        ],
                    });

                    AZO_Ads_Reports_Listing.update( res.data.ad );
                }
            }
        });
    });

    // SETTINGS: save settings
    $( '.azo-btn.btn-settings' ).on( 'click', function( event ) {
        event.preventDefault();
        // disable & rotate icon submit btn
        $( this ).prop( 'disabled', true );
        $( this ).text( 'Please wait...' );
        $( this ).addClass( 'azo-spinner spinner-left' );
        $( '.settings-message' ).remove();
        
        var settings = [];
        $( "input[name='settings[]'], textarea[name='settings[]'], select[name='settings[]']" ).map( function() {
            var settings_value = $( this ).val();
            // got select2
            if ( $( this ).data( 'control' ) == 'select2' ) settings_value = $( this ).select2( 'val' );
            settings.push( { 'name': $( this ).data( 'var' ), 'value': settings_value } );
        }).get();
        
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: azoads_ajax.ajaxurl,
            data: { action: 'azoads_save_settings', settings: settings, _wpnonce: azo_ads_get_nonce_key() },
            success: function( res ) {
                // console.log(res);
                if ( res.success ) {
                    $( '.azo-btn.btn-settings' ).prop( 'disabled', false );
                    $( '.azo-btn.btn-settings' ).text( 'Save Settings' );
                    $( '.azo-btn.btn-settings' ).removeClass( 'azo-spinner spinner-left' );
                    $( '<span class="settings-message"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>' + res.data + '</span>' ).insertAfter( '.azo-btn.btn-settings' );
                }
            }
        });
    });

    // SETTINGS: Tools > Export
    $( '.azo-btn-export' ).on( 'click', function( event ) {
        event.preventDefault();
        // disable & rotate icon submit btn
        $( this ).prop( 'disabled', true );
        $( this ).text( 'Exporting...' );
        $( this ).addClass( 'azo-spinner spinner-left spinner-dark' );

        $.ajax({
            type: 'post',
            dataType: 'json',
            url: azoads_ajax.ajaxurl,
            data: { action: 'azoads_export_settings', _wpnonce: azo_ads_get_nonce_key() },
            success: function( res ) {
                // console.log(res);
                if ( res.success ) {
                    $( '.azo-btn-export' ).prop( 'disabled', false );
                    $( '.azo-btn-export' ).text( 'Export' );
                    $( '.azo-btn-export' ).removeClass( 'azo-spinner spinner-left spinner-dark' );

                    var json_content = "data:text/json;charset=utf-8," + encodeURIComponent( JSON.stringify( res.data.content ) );
                    var azo_anchor_export = document.getElementById( 'azo-anchor-export' );
                    azo_anchor_export.setAttribute( 'href', json_content );
                    azo_anchor_export.setAttribute( 'download', res.data.filename );
                    azo_anchor_export.click();
                }
            }
        });
    });

    // SETTINGS: Tools > Import
    $( '#azo-file-upload-import' ).on( 'change' ,function( e ) {
        var file = e.target.files[0];
        var path = ( window.URL || window.webkitURL ).createObjectURL( file );

        var rawFile = new XMLHttpRequest();
        rawFile.overrideMimeType( 'application/json' );
        rawFile.open( 'GET', path, true );
        rawFile.onreadystatechange = function() {
            if ( rawFile.readyState === 4 && rawFile.status == '200' ) {
                $( '#azo-import-content' ).val( rawFile.responseText );
            }
        }
        rawFile.send( null );
      });
    $( '.azo-btn-import' ).on( 'click', function( event ) {
        event.preventDefault();

        // no file selected
        if ( $( '#azo-file-upload-import' )[0].files.length === 0 ) return false;

        // disable & rotate icon submit btn
        $( this ).prop( 'disabled', true );
        $( this ).text( 'Importing...' );
        $( this ).addClass( 'azo-spinner spinner-left spinner-dark' );

        $.ajax({
            type: 'post',
            dataType: 'json',
            url: azoads_ajax.ajaxurl,
            data: { action: 'azoads_import_settings', settings: JSON.parse( $( '#azo-import-content' ).val() ), _wpnonce: azo_ads_get_nonce_key() },
            success: function( res ) {
                // console.log(res);
                if ( res.success ) {
                    $( '.azo-btn-import' ).prop( 'disabled', false );
                    $( '.azo-btn-import' ).text( 'Import' );
                    $( '.azo-btn-import' ).removeClass( 'azo-spinner spinner-left spinner-dark' );
                    $( '#azo-file-upload-import' ).val( '' );
                    
                    $( '<div class="modal"><h3>Completed!</h3><p>All settings have been imported successfully. Just reload the page to see new configuration.</p><a href="javascript:void(0);" onclick="javascript:location.reload();" class="anchor-btn-modal">Reload Now</a></div>' ).appendTo( 'body' ).modal();
                }
            }
        });
    });

    // DASHBOARD: news
    if ( $( '.overview-news-data' ).length ) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: azoads_ajax.ajaxurl,
            data: { action: 'azoads_get_dashboard_news' },
            success: function( res ) {
                // console.log(res);
                if ( res.success ) {
                    var news_content = '';
                    if ( res.data.length > 0 ) {
                        res.data.forEach( function ( item ) {
                            // console.log(item);
                            // console.log(item._embedded['wp:featuredmedia']);
                            var source_img_url = '';
                            if ( item._embedded['wp:featuredmedia'] !== undefined && item._embedded['wp:featuredmedia'].length > 0 ) {
                                source_img_url = item._embedded['wp:featuredmedia'][0].media_details.sizes.thumbnail.source_url;
                            }
                            news_content += `
                            <div class="overview-news-item">
                                <div class="overview-news-item-thumb">
                                    ` + ( ( source_img_url != '' ) ? `
                                    <a href="` + item.link + `" title="` + item.title.rendered + `" target="_blank"><img src="` + source_img_url + `" alt="` + item.title.rendered + `"></a>
                                    ` : `` ) + `
                                </div>
                                <div class="overview-news-item-content">
                                    <a href="` + item.link + `" title="` + item.title.rendered + `" target="_blank">
                                        <span class="news-item-title">` + item.title.rendered + `</span>
                                        <span class="news-item-excerpt">` + item.excerpt.rendered.replace(/<\/?[^>]+(>|$)/g, '') + `</span>
                                    </a>
                                </div>
                            </div>
                            `;
                        } );
                        $( '.overview-news-data' ).html( news_content );
                    }
                }
                else {
                }
            }
        });
    }

    // Upgrade to Pro
    $( '.upgrade-faq-accordion a' ).on( 'click', function( event ) {
        event.preventDefault();
        $( '.upgrade-faq-accordion a' ).not( this ).next().hide();
        $( '.upgrade-faq-accordion a' ).not( this ).removeClass( 'expanded');
        $( this ).next().fadeToggle().css( 'display', 'block' );
        $( this ).toggleClass( 'expanded');
    });
});