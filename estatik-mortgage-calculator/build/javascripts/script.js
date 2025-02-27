( function( $ ) {
    'use strict';

    $.fn.serializeObject = function () {
        var o = {};
        var a = this.serializeArray();
        $.each( a, function() {
            if ( o[ this.name ] ) {
                if ( ! o[ this.name ].push ) {
                    o[ this.name ] = [ o[ this.name ] ];
                }
                o[ this.name ].push( this.value || '' );
            } else {
                o[ this.name ] = this.value || '';
            }
        } );
        return o;
    };

    function countDec(n) {
        n = (typeof n === 'string') ? n : n.toString();
        if (n.indexOf('e') !== -1) return parseInt(n.split('e')[1]) * -1;
        var separator = (1.1).toString().split('1')[1];
        var parts = n.split(separator);
        return parts.length > 1 ? parts[parts.length - 1].length : 0;
    }

    /**
     *
     * @param number
     * @param decimals
     * @param dec_point
     * @param thousands_sep
     * @returns {*}
     */
    function number_format( number, decimals, dec_point, thousands_sep ) {

        var i, j, kw, kd, km;

        // input sanitation & defaults
        if( isNaN( decimals = Math.abs( decimals ) ) ) {
            decimals = 2;
        }

        dec_point = dec_point || ",";
        thousands_sep = thousands_sep || ".";

        i = parseInt(number = (+number || 0).toFixed(decimals)) + "";
        j = ( j = i.length ) > 3 ? j % 3 : 0;

        km = (j ? i.substr(0, j) + thousands_sep : "");
        kw = i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands_sep);
        //kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).slice(2) : "");
        kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).replace(/-/, 0).slice(2) : "");

        return km + kw + kd;
    }

    /**
     *
     * @param $field
     * @param symbol
     * @param position
     * @param format
     */
    function formatterNumberField( $field, symbol, position, format, dec_num ) {

        format = format || [];

        var sup, dec;

        sup = typeof format[0] !== 'undefined' ? format[0] : '';

        dec = typeof format[1] !== 'undefined' ? format[1] : '';

        if ( typeof dec_num === 'undefined' ) {
            dec_num = sup === ' ' || sup === ',' || sup === '.' ? 0 : 2;
            dec_num = format === ',.' ? 2 : dec_num;
        }

        if ( format !== false ) {
            $field.val( number_format( $field.val(), dec_num, dec, sup ) );
        }

        var val = $field.val();

        if ( val.length && symbol && val.indexOf( symbol ) === -1 ) {
            $field.val( 'after' === position ? val + ' ' + symbol : symbol + ' ' + val );
        }
    }

    /**
     *
     * @param value
     * @param symbol
     * @param position
     * @param format
     */
    function formatterNumber( value, symbol, position, format ) {
        format = format || [];

        var sup, dec, dec_num;

        sup = typeof format[0] !== 'undefined' ? format[0] : '';

        dec = typeof format[1] !== 'undefined' ? format[1] : '';

        dec_num = sup === ' ' || sup === ',' || sup === '.' ? 0 : 2;
        dec_num = format === ',.' ? 2 : dec_num;

        value = number_format( value, dec_num, dec, sup );

        if ( value.length && symbol && value.indexOf( symbol ) === -1 ) {
            value = 'after' === position ? value + ' ' + symbol : symbol + ' ' + value;
        }
        return value;
    }

    $( function() {

        $( '.js-emc-price, .js-emc-field' ).change( function() {
            var $field = $( this );

            if ( $field.data( 'slider-target' ) ) {
                $( $field.data( 'slider-target' ) ).val( $field.val() ).trigger( 'change' );
            }
        } ).on( 'click', function() {
            $( this ).data( 'temp-value', $( this ).val() );
            $( this ).val( null );
        } ).on( 'focusout', function() {
            if ( ! $( this ).val().length ) {
                $( this ).val( $( this ).data( 'temp-value' ) );
            }
        } );

        $( '.js-emc-range-slider' ).each( function() {
            var $slider = $( this );

            $slider.rangeslider( {
                polyfill : false,
                onSlide: function( position, value ) {
                    if ( $slider.data( 'field-target' ) ) {
                        var $field = $( $slider.data( 'field-target' ) );
                        $field.val( value );

                        var attributes = $field.closest( '.js-emc-calculator' ).data( 'args' );

                        if ( $field.hasClass( 'js-emc-price' ) ) {
                            formatterNumberField(
                                $field, attributes.currency,
                                attributes.currency_position,
                                attributes.number_format
                            );
                        }

                        if ( $field.hasClass( 'js-emc-percentage' ) ) {
                            formatterNumberField(
                                $field, '%',
                                'after',
                                ',.',
                                countDec( $slider.attr( 'step' ) )
                            );
                        }

                        if ( $slider.hasClass( 'js-emc-down-payment-percentage-calc' ) ) {
                            var $calculator = $slider.closest( '.js-emc-calculator' );
                            var down_payment = Number( $calculator.find( '.js-emc-down-payment-field' ).val() );
                            var purchase_price = Number( $calculator.find( '.js-emc-purchase-price-field' ).val() );

                            $calculator.find( '.js-emc-down-payment-percentage' ).html(
                                number_format( down_payment / purchase_price * 100, 1 ) + '%'
                            );

                            if ( $slider.hasClass( 'js-emc-purchase-price-field' ) ) {
                                $calculator.find( '.js-emc-down-payment-field' ).attr( 'max', purchase_price ).rangeslider( 'update', true );
                            }
                        }
                    }
                }
            } );
        } ).on( 'change', function() {
            if ( $( this ).data( 'field-target' ) ) {

                var $slider = $( this );

                var $field = $( $( this ).data( 'field-target' ) );
                $field.val( $( this ).val() );

                var attributes = $field.closest( '.js-emc-calculator' ).data( 'args' );

                if ( $field.hasClass( 'js-emc-price' ) ) {
                    formatterNumberField(
                        $field, attributes.currency,
                        attributes.currency_position,
                        attributes.number_format
                    );
                }

                if ( $field.hasClass( 'js-emc-percentage' ) ) {
                    formatterNumberField(
                        $field, '%',
                        'after',
                        ',.',
                        countDec( $slider.attr( 'step' ) )
                    );
                }
            }
        } ).trigger( 'change' );

        $( '.js-emc-submit' ).click( function() {
            $( this ).closest( 'form' ).submit();

            return false;
        } );

        $( '.js-emc-calculator' ).submit( function() {
            var objects = $( this ).serializeObject();
            var args = $( this ).data( 'args' );

            var data = $.extend( {}, {
                'purchase_price': 0,
                'down_payment': 0,
                'home_insurance': 0,
                'interest_rate': 0,
                'pmi': 0,
                'property_tax': 0,
                'term_years': 0
            }, objects );

            for ( var i in data ) {
                data[i] = Number( data[i] );
            }

            var load_amount = data.purchase_price - data.down_payment;
            var qty_payments = data.term_years * 12;
            var rate = data.interest_rate / 100 / 12;

            // Present value interest factor.
            var pvif = Math.pow( 1 + rate, qty_payments );
            var pmt = Math.round( rate / ( pvif - 1 ) * - ( load_amount * pvif ) );

            var interest_in_absolute = -pmt;
            var home_insurance = Math.round( data.home_insurance / 12 * 100 ) / 100;
            var property_tax = Math.round( data.property_tax / 12 * 100 ) / 100;
            var payment_total = interest_in_absolute + property_tax + home_insurance + data.pmi;

            var $popup = $( '#emc-calculator-popup-' + args.uid );

            if ( $popup.length ) {
                $.magnificPopup.open( {
                    items: {
                        src: '#emc-calculator-popup-' + args.uid
                    },
                    type: 'inline',
                    callbacks: {
                        open: function () {
                            $popup.find( '.js-result-total' ).html(
                                formatterNumber(
                                    payment_total,
                                    args.currency,
                                    args.currency_position,
                                    args.number_format
                                )
                            );

                            $popup.find( '.js-result-interest' ).html(
                                formatterNumber(
                                    interest_in_absolute,
                                    args.currency,
                                    args.currency_position,
                                    args.number_format
                                )
                            );

                            var interest_width = $popup.find( '.js-result-styled' ).width();
                            $popup.find( '.js-result-styled' ).css( {'height': interest_width + 'px', 'line-height': interest_width + 'px'} );

                            $popup.find( '.js-result-home-insurance' ).html(
                                formatterNumber(
                                    home_insurance, args.currency,
                                    args.currency_position,
                                    args.number_format
                                )
                            );

                            $popup.find( '.js-result-property-tax' ).html(
                                formatterNumber(
                                    property_tax,
                                    args.currency,
                                    args.currency_position,
                                    args.number_format
                                )
                            );

                            $popup.find( '.js-result-pmi' ).html(
                                formatterNumber(
                                    data.pmi,
                                    args.currency,
                                    args.currency_position,
                                    args.number_format
                                )
                            );

                            var chart = new Chartist.Pie( '.js-emc-chart', {
                                series: [0, home_insurance, property_tax, interest_in_absolute, data.pmi]
                            }, {
                                donut: true,
                                showLabel: false
                            } );

                            chart.on( 'draw', function( data ) {
                                if( data.type === 'slice' ) {
                                    // Get the total path length in order to use for dash array animation
                                    var pathLength = data.element._node.getTotalLength();
                                    // Set a dasharray that matches the path length as prerequisite to animate dashoffset
                                    data.element.attr({
                                        'stroke-dasharray': pathLength + 'px ' + pathLength + 'px'
                                    });
                                    // Create animation definition while also assigning an ID to the animation for later sync usage
                                    var animationDefinition = {
                                        'stroke-dashoffset': {
                                            id: 'anim' + data.index,
                                            dur: 100,
                                            from: -pathLength + 'px',
                                            to:  '0px',
                                            easing: Chartist.Svg.Easing.easeOutQuint,
                                            // We need to use `fill: 'freeze'` otherwise our animation will fall back to initial (not visible)
                                            fill: 'freeze'
                                        }
                                    };
                                    // If this was not the first slice, we need to time the animation so that it uses the end sync event of the previous animation
                                    if( data.index !== 0 ) {
                                        animationDefinition['stroke-dashoffset'].begin = 'anim' + ( data.index - 1 ) + '.end';
                                    }
                                    // We need to set an initial value before the animation starts as we are not in guided mode which would do that for us
                                    data.element.attr( {
                                        'stroke-dashoffset': -pathLength + 'px'
                                    } );
                                    // We can't use guided mode as the animations need to rely on setting begin manually
                                    // See http://gionkunz.github.io/chartist-js/api-documentation.html#chartistsvg-function-animate
                                    data.element.animate( animationDefinition, false );
                                }
                            });
                        }
                    }
                } );
            }

            return false;
        } );
    } );
} )( jQuery );
