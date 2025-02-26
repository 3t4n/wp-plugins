'use strict';

( function() {
    var $ = jQuery;

    // Utilities
    // ---------

    var style_classes = {};

    tggh.style_class = function( style, options ) {
        var style_class = style_classes[style];
        if ( ! style_class ) {
            var prefix = 'tggh_' + ( options.prefix || 'style' );
            style_class = prefix + '_' + tggh.short_random();
            $( 'head' ).append( $( '<style />' ).text(
                style.replace( /\&/g, '.' + style_class )
            ) );
            style_classes[style] = style_class;
        }
        return style_class;
    };

    // Dates
    // -----

    tggh.date_today = function() {
        return new Date();
    }

    tggh.date_tomorrow = function() {
        var date = tggh.date_today();
        date.setDate( date.getDate() + 1 );
        return date;
    }

    tggh.date_yesterday = function() {
        var date = tggh.date_today();
        date.setDate( date.getDate() - 1 );
        return date;
    }

    tggh.date_is_same_day = function( d1, d2 ) {
        return (
            d1.getDate()     === d2.getDate() &&
            d1.getMonth()    === d2.getMonth() &&
            d1.getFullYear() === d2.getFullYear()
        );
    };

    tggh.date_is_future = function( date, today ) {
        today.setHours(23, 59, 59, 998);
        return date.getTime() > today.getTime();
    };

    tggh.date_is_past = function( date, today ) {
        today.setHours(0, 0, 0, 0);
        return date.getTime() < today.getTime();
    };

    tggh.date_is_weekday = function( date ) {
        var day = date.getDay();
        return day >= 1 && day <= 5;
    };

    tggh.date_is_weekend = function( date ) {
        var day = date.getDay();
        return day === 0 || day === 6;
    };

    var re_date_tz_us = /^(\d+)\/(\d+)\/(\d+)\D+(\d+):(\d+):(\d+)[^AP]*([AP]M)$/;
    var re_tz_utc_offset = /^UTC([-+][\d.]+)$/;

    tggh.date_with_time_zone = function( date, time_zone ) {
        var matches = time_zone.match( re_tz_utc_offset );
        if ( matches ) {
            return new Date( date.getTime() /* UTC timestamp */ + (
                date.getTimezoneOffset() * 60 * 1000 +
                Math.ceil( ( parseFloat( matches[1] ) || 0 ) * 60 * 60 * 1000 )
            ) );
        }

        try {
            var tz_str = date.toLocaleString( 'en-US', { timeZone: time_zone } );
            matches = tz_str.match( re_date_tz_us );

            if ( matches ) {
                date = new Date();
                date.setMonth( tggh.as_int( matches[1] ) - 1 );
                date.setDate( tggh.as_int( matches[2] ) );
                date.setFullYear( tggh.as_int( matches[3] ) );
                date.setHours(
                    tggh.as_int( matches[4] ) + ( matches[7] === 'PM' ? 12 : 0 )
                );
                date.setMinutes( tggh.as_int( matches[5] ) );
                date.setSeconds( tggh.as_int( matches[6] ) );
            }
        } catch (e) {
            console.error( e );
        }

        return date;
    };

    // Fields
    // ------

    tggh.get_field_data = function( id, property ) {
        var data = window['tggh_field_' + id] || {};
        return property ? data[property] : data;
    };

    tggh.get_property = function( data, property, default_value ) {
        var key = tggh.gform_property(property);
        return typeof data[key] !== 'undefined' ? data[key] : default_value;
    };

    tggh.on_datepicker_init = function( fn ) {
        var setup = function() {
            function init( options, _, field_id ) {
                return fn( options, tggh.get_field_data( field_id ), {
                    field_id: field_id
                } );
            }

            gform.addFilter( 'gform_datepicker_options_pre_init', init );
        };

        if ( window.gform ) {
            setup();
        } else {
            $( document ).ready( function() {
                if ( window.gform ) {
                    setup();
                }
            } );
        }
    };
} )();
