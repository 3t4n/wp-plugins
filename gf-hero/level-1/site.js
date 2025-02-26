'use strict';

( function() {
    function setup() {
        var $ = jQuery;

        // Date Picker - Callbacks
        // -----------------------

        tggh.date_before_show_day_fn = {};
        tggh.add_date_before_show_day_fn = function( field_id, fn ) {
            if ( ! tggh.date_before_show_day_fn[field_id] ) {
                tggh.date_before_show_day_fn[field_id] = [];
            }
            tggh.date_before_show_day_fn[field_id].push( fn );
        };

        tggh.on_datepicker_init( function( options, data, context ) {
            var before_show_day = options.beforeShowDay;

            options.beforeShowDay = function( date ) {
                var result = before_show_day ? before_show_day( date ) : [true, ''];

                ( tggh.date_before_show_day_fn[context.field_id] || [] )
                    .forEach( function( fn ) { fn( date, result, data, options ); } );

                return result;
            };

            return options;
        } );

        // Date Animation
        // --------------

        tggh.on_datepicker_init( function( options, data ) {
            var anim = tggh.get_property( data, 'date_anim' );
            if ( anim ) {
                var matches = anim.match( /^(\w+)_(\w+)$/ );
                if ( matches ) {
                    options.showOptions = { direction: matches[2] };
                    anim = matches[1];
                }
                options.showAnim = anim;
            }
            return options;
        } );

        // Date Highlight
        // --------------

        tggh.on_datepicker_init( function( options, data, context ) {
            if ( tggh.get_property( data, 'date_highlight' ) === 'today' ) {
                tggh.add_date_before_show_day_fn(
                    context.field_id, function( date, result ) {
                        var today = tggh.apply_filters(
                            'tggh_date_picker_date', tggh.date_today(), data
                        );

                        if ( tggh.date_is_same_day( date, today ) ) {
                            result[1] = ( result[1] + ' ' + tggh.style_class(
                                '& a, & span { ' +
                                    'box-shadow: inset 0 0 0 2px #c00 !important ' +
                                '}',
                                { prefix: 'date_highlight' }
                            ) ).trim();
                        }
                    }
                );
            }
            return options;
        } );

        // Date Properties
        // ---------------

        tggh.on_datepicker_init( function( options, data, field ) {
            var readonly = !! tggh.get_property( data, 'date_readonly' );
            if ( readonly ) {
                $( 'input[name=input_' + field.field_id + ']' ).attr( 'readonly', true );
            }
            return options;
        } );

        // Date Filter
        // -----------

        tggh.on_datepicker_init( function( options, data, context ) {
            switch ( tggh.get_property( data, 'date_filter' ) ) {
                case 'today_and_future':
                    options.minDate = tggh.apply_filters(
                        'tggh_date_picker_date', tggh.date_today(), data
                    );
                    break;

                case 'future':
                    options.minDate = tggh.apply_filters(
                        'tggh_date_picker_date', tggh.date_tomorrow(), data
                    );
                    break;

                case 'weekdays':
                    tggh.add_date_before_show_day_fn(
                        context.field_id, function( date, result ) {
                            result[0] = tggh.date_is_weekday( date );
                        }
                    );
                    break;
            }

            return options;
        } );

        // Date Time Zone
        // --------------

        tggh.add_filter( 'tggh_date_picker_date', function( date, data ) {
            if ( tggh.get_property( data, 'date_time_zone' ) === 'server' ) {
                return tggh.date_with_time_zone( date, tggh.date_time_zone_server );
            }

            return date;
        } );
    }

    if ( tggh_level >= 1 ) {
        setTimeout( setup );
    }
} )();
