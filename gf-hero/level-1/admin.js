'use strict';

( function() {
    var $ = jQuery;

    // Date Animation
    // --------------

    tggh.enable_date_picker_field( 'date_anim' );

    // Date Highlight
    // --------------

    tggh.enable_date_picker_field( 'date_highlight' );

    // Date Properties
    // ---------------

    tggh.enable_date_picker_field( 'date_properties' );

    tggh.add_action( 'tggh_update_date_properties_field', function( field ) {
        tggh.update_field( field, 'date_readonly' );
    } );

    // Date Filter
    // -----------

    tggh.enable_date_picker_field( 'date_filter' );

    // Date Time Zone
    // --------------

    ( function() {
        var $notice_text = $( '<div />' ).hide();
        var $notice;

        var is_init = false;
        var selected_filter;
        var selected_time_zone;

        function update( context ) {
            if ( ! is_init ) {
                $( '#' + tggh.gform_value_id( 'date_filter' ) )
                    .on( 'change', tggh.date_time_zone_update_notice_text );

                $( '#' + tggh.gform_value_id( 'date_time_zone' ) )
                    .on( 'change', tggh.date_time_zone_update_notice_text );

                context.$get_setting().append( $notice = (
                    $( '<div />' )
                        .addClass( 'tggh_separated_top' )
                        .css( { display: 'flex' } )
                        .append(
                            $notice_text,
                            tggh.$gform_tooltip( tggh.text.current_timezone_tooltip )
                        )
                ) );
                gform_initialize_tooltips();

                is_init = true;
            }

            tggh.date_time_zone_update_notice_text();
        }

        function update_filter( value, context ) {
            selected_filter = value;
            update( context );
        }

        function update_time_zone( value, context ) {
            selected_time_zone = value;
            update( context );
        }

        tggh.date_time_zone_update_notice_text = function() {
            var text;

            if ( ! selected_time_zone ) {
                text = tggh.text.current_timezone_user;
            } else if ( selected_time_zone === 'server' ) {
                text = tggh.text.current_timezone_server;
            }

            text = tggh.apply_filters(
                'tggh_time_zone_notice_text', text, selected_time_zone
            );

            var is_visible = tggh.apply_filters(
                'tggh_time_zone_notice_is_visible', (
                    !! selected_filter &&
                    !! text
                )
            );

            $notice.toggle( is_visible );
            $notice_text.text( text ).toggle( is_visible );
        }

        tggh.add_action( 'tggh_before_update_date_filter_field', update_filter );
        tggh.add_action( 'tggh_before_update_date_time_zone_field', update_time_zone );

        tggh.enable_date_picker_field( 'date_time_zone' );
    } )();
} )();
