'use strict';

var tggh = {};

( function() {
    // Utilities
    // ---------

    tggh.as_int = function( value, min, max ) {
        var int = parseInt( value, 10 );
        int = isNaN( int ) ? 0 : int;

        if ( typeof min === 'number' ) {
            int = int < min ? min : int;
        }

        if ( typeof max === 'number' ) {
            int = int > max ? max : int;
        }

        return int;
    };

    tggh.is_array = function( value ) {
        return Array.isArray( value );
    };

    tggh.is_non_empty_array = function( value ) {
        return tggh.is_array( value ) && value.length > 0;
    };

    tggh.as_array = function( value ) {
        return tggh.is_array( value ) ? value : [];
    };

    tggh.is_object = function( value ) {
        return typeof value === 'object' && value !== null;
    };

    // Random
    // ------

    var re_word_unsafe = new RegExp(
        '(?:' +
            'a(?:n(?:al|us)|s[sn]|rs[ckq])|' +
            'b(?:ang|dsm|oob|one|utt|i?mbo?|onz|ugr|ite|ord)|' +
            'c(?:[oa][ckqn]{1,2}[oa]?|o[qn]|ovi|u[mln]t?|hu[jp]|urv|ulo|hat|lit)|' +
            'd(?:[ie]?[ckq]{2}|[iy][ckq]e)|' +
            'f(?:ag|[ei][ckq][ae]?|ist|[uickq][ckq]{1,2}|uq|o(?:tz|ll|ut)|rat)|' +
            'ga[ye]|' +
            'h(?:oo[ckq]|o[rv]n|ump|ack|ero|ij[ao])|' +
            'j(?:a?[ckq]{2}|er[ckq]|ug|eba)|' +
            'k(?:[oa][ckq][oe]|ono?|urv|a[ckq]{2})|' +
            'l(?:e(?:sb|z)|ort)|gbt|' +
            'm(?:ilf|org|op?se?|u(?:ft|sc|na)|e?rd)|' +
            'n(?:[ie]gg?[er]|ip|ud|[yi]m[pf]|a[ckq]{2}|utt?|azi)|' +
            'o(?:rg[ya]|var|rin)|' +
            'p(?:a[ckq]i|e?n?[iu]ss?|ipi|i?[zs]d|o(?:o|rn)|op[pe]|e(?:[dz]o|rv)|u[tl][aei])|' +
            'que|' +
            'r(?:ap[ei]|e[ckq]t)|' +
            's(?:[ckqr]at|ex|h[ie]?t|[lm]u?t|u[ckq]{1,2}|[ckq]{2}|ra[ct]|uli|eme|[mn]a[ckq]|a?lop?|u[ckq]e)|' +
            't(?:it|ra[nv]|wa?t|rio)|' +
            'ure|' +
            'v(?:i?ag|er?g|o[yg]e|u?lv)|' +
            'w(?:an[ckq]|hor|ich)|' +
            'z(?:mrd|rat|izi)|' +
            '666' +
        ')', 'i'
    );

    var alpha_upper     = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var alpha_lower     = 'abcdefghijklmnopqrstuvwxyz';
    var alpha_mixed     = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    var alnum_upper     = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var alnum_lower     = '0123456789abcdefghijklmnopqrstuvwxyz';
    var alnum_mixed     = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    var digits          = '0123456789';
    var d_digits        = '23456789';
    var d_alpha_upper   = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
    var d_alpha_lower   = 'abcdefghjkmnpqrstuvwxyz';
    var d_alpha_mixed   = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz';
    var d_alnum_upper   = '23456789ABCDEFGHJKLMNPQRSTUVWXYZ';
    var d_alnum_lower   = '23456789abcdefghjkmnpqrstuvwxyz';
    var d_alnum_mixed   = '23456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz';
    var hex_upper       = '0123456789ABCDEF';
    var hex_lower       = '0123456789abcdef';

    var c_alpha_upper   = 26;
    var c_alpha_lower   = 26;
    var c_alpha_mixed   = 52;
    var c_alnum_upper   = 36;
    var c_alnum_lower   = 36;
    var c_alnum_mixed   = 62;
    var c_digits        = 10;
    var c_d_digits      =  8;
    var c_d_alpha_upper = 24;
    var c_d_alpha_lower = 23;
    var c_d_alpha_mixed = 47;
    var c_d_alnum_upper = 32;
    var c_d_alnum_lower = 31;
    var c_d_alnum_mixed = 55;
    var c_hex_upper     = 16;
    var c_hex_lower     = 16;

    tggh.generate_random_id = function( format, _iter ) {
        var result = '';
        var str = '';

        var parse = true;
        for ( var i = 0, n = 0, len = format.length; i < len; ++i, n = 0 ) {
            var f = format[i];

            if ( ! parse ) {
                result += f;
                str += f;
                parse = true;
                continue;
            }

            if ( f === '\\' ) {
                parse = false;
                continue;
            }

            var c = '';

            switch ( f ) {
                case 'A': c = alpha_upper;   n = c_alpha_upper;   break;
                case 'a': c = alpha_lower;   n = c_alpha_lower;   break;
                case 'B': c = alpha_mixed;   n = c_alpha_mixed;   break;
                case 'C': c = alnum_upper;   n = c_alnum_upper;   break;
                case 'c': c = alnum_lower;   n = c_alnum_lower;   break;
                case 'D': c = alnum_mixed;   n = c_alnum_mixed;   break;
                case 'N': c = digits;        n = c_digits;        break;
                case 'M': c = d_digits;      n = c_d_digits;      break;
                case 'P': c = d_alpha_upper; n = c_d_alpha_upper; break;
                case 'p': c = d_alpha_lower; n = c_d_alpha_lower; break;
                case 'Q': c = d_alpha_mixed; n = c_d_alpha_mixed; break;
                case 'I': c = d_alnum_upper; n = c_d_alnum_upper; break;
                case 'i': c = d_alnum_lower; n = c_d_alnum_lower; break;
                case 'J': c = d_alnum_mixed; n = c_d_alnum_mixed; break;
                case 'X': c = hex_upper;     n = c_hex_upper;     break;
                case 'x': c = hex_lower;     n = c_hex_lower;     break;
            }

            c = n > 0 ? c[tggh.random_int( 0, n - 1 )] : f;

            if ( c.match( /[a-zA-Z0-9]/ ) ) {
                str += c;
            }

            result += c;
        }

        if ( _iter < 20 ) {
            if ( str.match( re_word_unsafe ) ) {
                result = generate_random_id( format, _iter + 1 );
            }
        }

        return result;
    };

    tggh.count_random_id_possibilities = function( format ) {
        var count = 1;
        var parse = true;
        var len = format.length;
        var i;

        for ( i = 0; i < len; ++i ) {
            var f = format[i];

            if ( ! parse )    { parse =  true; continue; }
            if ( f === '\\' ) { parse = false; continue; }

            switch ( f ) {
                case 'A': count *= c_alpha_upper;   break;
                case 'a': count *= c_alpha_lower;   break;
                case 'B': count *= c_alpha_mixed;   break;
                case 'C': count *= c_alnum_upper;   break;
                case 'c': count *= c_alnum_lower;   break;
                case 'D': count *= c_alnum_mixed;   break;
                case 'N': count *= c_digits;        break;
                case 'M': count *= c_d_digits;      break;
                case 'P': count *= c_d_alpha_upper; break;
                case 'p': count *= c_d_alpha_lower; break;
                case 'Q': count *= c_d_alpha_mixed; break;
                case 'I': count *= c_d_alnum_upper; break;
                case 'i': count *= c_d_alnum_lower; break;
                case 'J': count *= c_d_alnum_mixed; break;
                case 'X': count *= c_hex_upper;     break;
                case 'x': count *= c_hex_lower;     break;
            }
        }

        return count;
    };

    tggh.random_int = function( min, max ) {
        min = Math.ceil( min );
        max = Math.floor( max );
        return Math.floor( Math.random() * ( max - min + 1 ) ) + min;
    };

    tggh.short_random = function() {
        return (
            tggh.generate_random_id( 'B' ) +
            Math.random().toString(36).slice(2)
        );
    };

    tggh.new_id = function( prefix ) {
        return (
            'tggh_' + ( prefix ? ( prefix + '_' ) : '' ) +
            tggh.short_random()
        );
    };

    // Dates
    // -----

    tggh.day_index = {
        sun: 0, mon: 1, tue: 2, wed: 3, thu: 4, fri: 5, sat: 6
    };

    // Fields
    // ------

    tggh.gform_property = function( name ) {
        return 'tggh_' + name;
    };


    // Hooks
    // -----

    tggh.hooks = { filters: {}, actions: {} };

    tggh.get_hooks = function( type, tag ) {
        if ( ! tggh.hooks[type][tag] ) {
            tggh.hooks[type][tag] = [];
        }
        return tggh.hooks[type][tag];
    };

    tggh.apply_filters = function( tag, data, args ) {
        tggh.get_hooks( 'filters', tag ).forEach( function( fn ) {
            data = fn.apply( this, [data].concat(args) );
        } );

        return data;
    };

    tggh.add_filter = function( tag, fn ) {
        tggh.get_hooks( 'filters', tag ).push( fn );
    };

    tggh.do_action = function( tag, args ) {
        tggh.get_hooks( 'actions', tag ).forEach( function( fn ) {
            fn.apply( this, args );
        } );
    };

    tggh.add_action = function( tag, fn ) {
        tggh.get_hooks( 'actions', tag ).push( fn );
    };

    tggh.has_action = function( tag ) {
        var actions = tggh.hooks.actions[tag];

        return tggh.is_array( actions ) && actions.length > 0;
    };
} )();
