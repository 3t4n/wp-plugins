'use strict';

( function() {
    var $ = jQuery;

    // Text
    // ----

    tggh.text = {};

    tggh.add_text = function( text ) {
        Object.keys( text ).forEach( function( key ) {
            tggh.text[key] = text[key];
        } );
    };

    // Elements
    // --------

    tggh.$new_select = function( options ) {
        var list;

        if ( tggh.is_array( options ) ) {
            list = options;
        } else {
            list = [];
            Object.keys( options || {} ).forEach( function( value ) {
                list.push( { value: value, text: options[value] } );
            } );
        }

        return $( '<select />' ).append( list.map( function( option ) {
            var $option = $( '<option />' )
                .attr( 'value', option.value )
                .text( option.text );

            if ( option.is_disabled ) {
                $option.attr( 'disabled', true );
            }

            if ( option.is_selected ) {
                $option.attr( 'selected', true );
            }

            return $option;
        } ) );
    }

    tggh.$new_choice_handle = function() {
        var classes = (
            'field-choice-handle ' +
            'gform-choice__handle ' +
            'gform-icon ' +
            'gform-icon--drag'
        );

        return $( '<i />' ).addClass( classes ).attr( 'focusable', true );
    };

    tggh.$new_choice_button = function( type ) {
        var classes = (
            'gform-choice__button ' +
            'gform-choice__button--add ' +
            'gform-st-icon ' +
            'gform-st-icon--circle-' + ( type === 'add' ? 'plus' : 'minus' )
        );

        return $( '<button />' ).addClass( classes );
    };

    tggh.get_selected_text = function( select ) {
        var $select = $( select );

        var val = $select.val();
        var text = val;

        $( 'option', $select ).each( function( _, option ) {
            var $option = $( option );
            if ( $option.val() === val ) {
                text = $option.text();
            }
        } );

        return text;
    };

    // SVG
    // ---

    var svg_ns = 'http://www.w3.org/2000/svg';

    var set_attrs = function( el, attrs ) {
        Object.keys( attrs || {} ).forEach( function( attr ) {
            el.setAttribute( attr, attrs[attr] );
        } );
    };

    tggh.svg = function( attrs, children ) {
        var el_svg = document.createElementNS( svg_ns, 'svg' );
        set_attrs( el_svg, attrs );

        ( children || [] ).forEach( function( child ) {
            var tag = Object.keys( child )[0];
            var el_child = document.createElementNS( svg_ns, tag );
            set_attrs( el_child, child[tag] );
            el_svg.appendChild( el_child );
        } );

        return el_svg;
    }

    // Fields
    // ------

    tggh.gform_value_id = function( name ) {
        return 'tggh_field_' + name + '_value';
    };

    tggh.gform_setting = function( name ) {
        return 'tggh_field_' + name + '_setting';
    };

    tggh.gform_value_filter = function( name ) {
        return 'tggh_field_' + name + '_value';
    };

    tggh.$gform_tooltip = function( text ) {
        var $icon = $( '<i />' )
            .addClass( 'gform-icon gform-icon--question-mark' )
            .attr( 'aria-hidden', true );

        return (
            $( '<button />' )
                .addClass( 'gf_tooltip tooltip' )
                .on( 'click keypress', function() { return false; } )
                .attr( 'aria-label', text )
                .append( $icon )
        );
    };

    tggh.added_field_sel = {};
    tggh.show_field = function( name ) {
        var sel_setting = '.' + tggh.gform_setting( name );
        $( sel_setting ).show();

        if ( ! tggh.added_field_sel[sel_setting] ) {
            fieldSettings.text += ', ' + sel_setting;
            tggh.added_field_sel[sel_setting] = true;
        }
    };

    tggh.get_field_property = function( name ) {
        var property = tggh.gform_property( name );
        var value_filter = tggh.gform_value_filter( name );

        return tggh.apply_filters( value_filter, GetSelectedField()[property] );
    };

    tggh.set_field_property = function( name, value ) {
        var property = tggh.gform_property( name );
        var value_filter = tggh.gform_value_filter( name );

        SetFieldProperty( property, tggh.apply_filters( value_filter, value ) );
    };

    tggh.update_field = function( field, name, default_val ) {
        var property = tggh.gform_property( name );

        var value = typeof field[property] === 'undefined'
            ? default_val
            : field[property];

        var value_filter = tggh.gform_value_filter( name );

        value = tggh.apply_filters( value_filter, value );

        var $input = $( '#' + tggh.gform_value_id( name ) );
        var type = $input.attr( 'type' );

        function do_action( action, value ) {
            var context = {
                field: field,
                $input: $input,
                $get_setting: function() {
                    return $input.closest( '.field_setting' );
                }
            };

            tggh.do_action(
                'tggh_' + action + '_update_' + name + '_field',
                [value, context]
            );
        }

        do_action( 'before', value );
        switch ( type ) {
            case 'checkbox':
                $input.attr( 'checked', !! value );
                break;

            default:
                $input.val( value );
        }
        do_action( 'after', value );

        $input.on( 'change', function() {
            var value = ( type === 'checkbox' ) ? this.checked : $( this ).val();
            value = tggh.apply_filters( value_filter, value );

            do_action( 'before', value );
            SetFieldProperty( property, tggh.apply_filters( value_filter, value ) );
            do_action( 'after', value );
        } );
    };

    tggh.current_field = {};

    $( document ).on( 'gform_load_field_settings', function( _, field ) {
        tggh.do_action( 'tggh_load_field_settings', [field] );

        tggh.current_field = field;

        function get_context() {
            return {
                date_input_type: date_input_type,
                is_date_picker: date_input_type === 'datepicker'
            };
        }

        function field_params() {
            return [field, get_context()];
        }

        function show_field( name ) {
            var action = 'tggh_show_' + name + '_field';
            if ( tggh.has_action( action ) ) {
                tggh.do_action( action, field_params() );
            } else {
                tggh.show_field( name );
            }
        }

        function update_field( name ) {
            var action = 'tggh_update_' + name + '_field';
            if ( tggh.has_action( action ) ) {
                tggh.do_action( action, field_params() );
            } else {
                tggh.update_field( field, name );
            }
        }

        function process_field( name ) {
            show_field( name );
            update_field( name );
        }

        function process_fields() {
            var new_field_names = tggh.apply_filters(
                'tggh_' + GetInputType( field ) + '_fields', [], [get_context()]
            );

            $( '.tggh_field_setting' ).hide();

            new_field_names.forEach( process_field );
        }

        var date_input_type = $( '#field_date_input_type' )
            .on( 'change', function() {
                date_input_type = $( this ).val();
                process_fields();
            } )
            .val();

        process_fields();
    } );

    tggh.enable_date_picker_field = function( name ) {
        tggh.add_filter( 'tggh_date_fields', function ( fields, context ) {
            return context.is_date_picker
                ? fields.concat( [name] )
                : fields;
        } );
    };

    // Merge Tags
    // ----------

    function substr( text, offset, length ) {
        return text.slice( offset, offset + length );
    }

    var found_merge_tags = {};

    tggh.find_merge_tags = function( text ) {
        if ( found_merge_tags[text] ) {
            return found_merge_tags[text];
        }

        var len = text.length;
        var parse = true;

        var tag_pos = 0;
        var level = 0;

        var found_tags = {};

        do {
            if ( ( tag_pos = text.indexOf( '{', tag_pos ) ) > -1 ) {
                var params = [];

                var param_pos = -1;
                var param_len = 0;
                var tag_len = 0;
                var i;

                for (
                    i = ++tag_pos, ++level, tag_len = 0;
                    i < len;
                    ++i, ++tag_len, ++param_len
                ) {
                    var c = text[i];

                    if ( ! parse )    { parse =  true; continue; }
                    if ( c === '\\' ) { parse = false; continue; }

                    if ( c === '{' ) {
                        ++level;
                    } else if ( c === '}' ) {
                        if ( --level === 0 ) {
                            if ( param_pos > -1 && param_len > -1 ) {
                                params.push( substr(
                                    text, param_pos, param_len
                                ) );
                            }

                            var tag_text = substr( text, tag_pos, tag_len );

                            var tag;
                            if ( params.length === 0 ) {
                                tag = tag_text;
                            } else {
                                tag = params.shift();
                            }

                            if ( ! found_tags[tag] ) {
                                found_tags[tag] = [];
                            }

                            found_tags[tag].push( {
                                tag: tag,
                                text: tag_text,
                                position: {
                                    from: tag_pos - 1,
                                    to: tag_pos + tag_len,
                                    length: tag_len + 2
                                },
                                params: params
                            } );

                            tag_pos = i + 1;
                            break;
                        }
                    } else if ( c === ':' ) {
                        params.push( substr(
                            text,
                            param_pos > -1 ? param_pos : tag_pos,
                            param_len
                        ) );

                        param_pos = i + 1;
                        param_len = -1;
                    }
                }
            }
        } while ( tag_pos > -1 );

        return ( found_merge_tags[text] = found_tags );
    };

    tggh.is_in_merge_tag = function( input, tag ) {
        var text = $( input ).val();
        var len = text.length;

        var cursor_index = input.selectionStart;
        var tag_head = '{' + tag;

        var is_in_tag = false;
        var parse = true;
        var tag_start_pos = -1;
        var tag_end_pos = -1;

        for ( var i = 0, level = 0; i < len; ++i ) {
            var c = text[i];

            if ( ! parse )    { parse = true;  continue; }
            if ( c === '\\' ) { parse = false; continue; }

            if ( c === '{' ) {
                ++level;
                tag_start_pos = i;
            } else if ( c === '}' ) {
                if ( --level === 0 ) {
                    is_in_tag = (
                        text.indexOf( tag_head, tag_start_pos ) === tag_start_pos &&
                        tag_start_pos <= cursor_index && cursor_index <= i + 1
                    );

                    if ( is_in_tag ) {
                        tag_end_pos = i + 1;
                        break;
                    }
                }
            }
        }

        if ( ! is_in_tag ) {
            if (
                tag_start_pos > -1 &&
                level > 0 &&
                text.indexOf( tag_head, tag_start_pos ) === tag_start_pos
            ) {
                tag_end_pos = len - 1;
            }
        }

        return [is_in_tag, text.slice( tag_start_pos, tag_end_pos )];
    };

    var merge_tag_info_text = {};
    var $merge_tag_info;

    function hide_merge_tag_info() {
        if ( $merge_tag_info ) {
            $merge_tag_info.hide();
        }
    }

    tggh.refresh_merge_tag_info = function() {
        var $input = $( '#field_default_value' );

        if ( ! $merge_tag_info ) {
            $merge_tag_info = $( '<div />' ).addClass( 'tggh_separated_top' );
            $merge_tag_info.insertAfter( $input );
        }

        var is_visible = false;
        Object.keys( merge_tag_info_text ).forEach( function( tag ) {
            var in_tag = tggh.is_in_merge_tag( $input[0], tag );

            if ( in_tag[0] ) {
                var children = merge_tag_info_text[tag];
                if ( typeof children === 'function' ) {
                    children = children(
                        ( tggh.find_merge_tags( in_tag[1] )[tag] || [] )[0] || {}
                    );
                }

                $merge_tag_info.empty().append( children ).show();
                is_visible = true;
            }
        } );

        if ( is_visible ) {
            gform_initialize_tooltips();
        } else {
            hide_merge_tag_info();
        }
    };

    var merge_tag_info_init = false;

    tggh.add_merge_tag_info = function( tag, info ) {
        merge_tag_info_text[tag] = info;

        if ( ! merge_tag_info_init ) {
            $( function() {
                $( '#field_default_value' ).on(
                    'click input keyup', tggh.refresh_merge_tag_info
                );
            } );
            tggh.add_action( 'tggh_load_field_settings', hide_merge_tag_info );

            merge_tag_info_init = true;
        }
    };
} )();
