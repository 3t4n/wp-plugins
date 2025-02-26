<?php
$currency_position = $currency_settings[ 'position' ];
$currency_thousand_separator = isset( $currency_settings[ 'thousand_sep' ] ) && ($currency_settings[ 'thousand_sep' ] != '') ? $currency_settings[ 'thousand_sep' ] : '';
$currency_decimal_separator = $currency_settings[ 'decimal_sep' ];
$currency_decimal_no = isset( $currency_settings[ 'decimal_no' ] ) && ($currency_settings[ 'decimal_no' ] != '') ? $currency_settings[ 'decimal_no' ] : '0';

if ( isset( $price[ 'type' ] ) && $price[ 'type' ] == 'price-html' ) {
    ?>
    <div class='appts-price-html-content'>
        <?php
        /////////////////////////////////////////////////////////////////////////////////////////////////
        $dynamic_css = array();
        if ( isset( $price[ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-family' ] ) && $price[ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-family' ] != '' ) {
            if ( ! in_array( $price[ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-family' ], $google_fonts_used_array ) ) {
                array_push( $google_fonts_used_array, preg_replace( '/\s/', '+', $price[ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-family' ] ) );
            }
            $font_family = $price[ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-family' ];
            $dynamic_css[] = "font-family:$font_family";
        }

        if ( isset( $price[ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-size' ] ) && $price[ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-size' ] != '' ) {
            $font_size = $price[ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-size' ];
            $dynamic_css[] = "font-size:{$font_size}px";
        }

        if ( isset( $price[ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-color' ] ) && $price[ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-color' ] != '' ) {
            $font_color = $price[ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-color' ];
            $dynamic_css[] = "color:{$font_color}";
        }

        if ( isset( $price[ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-style' ][ 'bold' ] ) && $price[ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-style' ][ 'bold' ] != '' ) {
            $dynamic_css[] = 'font-weight:bold';
        }

        if ( isset( $price[ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-style' ][ 'italic' ] ) && $price[ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-style' ][ 'italic' ] != '' ) {
            $dynamic_css[] = 'font-style:italic';
        }

        if ( isset( $price[ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] ) && $price[ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] != '' ) {
            $dynamic_css[] = 'text-decoration:line-through';
        }

        if ( isset( $price[ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-style' ][ 'underline' ] ) && $price[ 'html' ][ 'selling-price-content' ][ 'style' ][ 'font-style' ][ 'underline' ] != '' ) {
            $dynamic_css[] = 'text-decoration:underline';
        }

        if ( ! empty( $dynamic_css ) ) {
            $price_style = implode( ';', $dynamic_css );
            $price_style = "style='$price_style'";
        } else {
            $price_style = '';
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////

        if ( isset( $price[ 'html' ][ 'selling-price-content' ][ 'content' ] ) && $price[ 'html' ][ 'selling-price-content' ][ 'content' ] != '' ) {
            ?>
            <span class='appts-price-value' <?php echo esc_attr( $price_style ); ?> ><?php echo do_shortcode( $price[ 'html' ][ 'selling-price-content' ][ 'content' ] ); ?></span>
            <?php
        }

        //////////////////////////////////////////////////////////////////////////////////////////////////////
        $dynamic_css = array();
        if ( isset( $price[ 'html' ][ 'payment-content' ][ 'style' ][ 'font-family' ] ) && $price[ 'html' ][ 'payment-content' ][ 'style' ][ 'font-family' ] != '' ) {
            if ( ! in_array( $price[ 'html' ][ 'payment-content' ][ 'style' ][ 'font-family' ], $google_fonts_used_array ) ) {
                array_push( $google_fonts_used_array, preg_replace( '/\s/', '+', $price[ 'html' ][ 'payment-content' ][ 'style' ][ 'font-family' ] ) );
            }
            $font_family = $price[ 'html' ][ 'payment-content' ][ 'style' ][ 'font-family' ];
            $dynamic_css[] = "font-family:$font_family";
        }

        if ( isset( $price[ 'html' ][ 'payment-content' ][ 'style' ][ 'font-size' ] ) && $price[ 'html' ][ 'payment-content' ][ 'style' ][ 'font-size' ] != '' ) {
            $font_size = $price[ 'html' ][ 'payment-content' ][ 'style' ][ 'font-size' ];
            $dynamic_css[] = "font-size:{$font_size}px";
        }

        if ( isset( $price[ 'html' ][ 'payment-content' ][ 'style' ][ 'font-color' ] ) && $price[ 'html' ][ 'payment-content' ][ 'style' ][ 'font-color' ] != '' ) {
            $font_color = $price[ 'html' ][ 'payment-content' ][ 'style' ][ 'font-color' ];
            $dynamic_css[] = "color:{$font_color}";
        }

        if ( isset( $price[ 'html' ][ 'payment-content' ][ 'style' ][ 'font-style' ][ 'bold' ] ) && $price[ 'html' ][ 'payment-content' ][ 'style' ][ 'font-style' ][ 'bold' ] != '' ) {
            $dynamic_css[] = 'font-weight:bold';
        }

        if ( isset( $price[ 'html' ][ 'payment-content' ][ 'style' ][ 'font-style' ][ 'italic' ] ) && $price[ 'html' ][ 'payment-content' ][ 'style' ][ 'font-style' ][ 'italic' ] != '' ) {
            $dynamic_css[] = 'font-style:italic';
        }

        if ( isset( $price[ 'html' ][ 'payment-content' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] ) && $price[ 'html' ][ 'payment-content' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] != '' ) {
            $dynamic_css[] = 'text-decoration:line-through';
        }

        if ( isset( $price[ 'html' ][ 'payment-content' ][ 'style' ][ 'font-style' ][ 'underline' ] ) && $price[ 'html' ][ 'payment-content' ][ 'style' ][ 'font-style' ][ 'underline' ] != '' ) {
            $dynamic_css[] = 'text-decoration:underline';
        }

        if ( ! empty( $dynamic_css ) ) {
            $dynamic_css = implode( ';', $dynamic_css );
            $dynamic_css = "style='$dynamic_css'";
        } else {
            $dynamic_css = '';
        }

        //////////////////////////////////////////////////////////////////////////////////////////////////////

        if ( isset( $price[ 'html' ][ 'payment-content' ][ 'content' ] ) && $price[ 'html' ][ 'payment-content' ][ 'content' ] != '' ) {
            ?>
            <span class="appts-payment-name" <?php echo esc_attr( $dynamic_css ); ?>><?php echo do_shortcode( $price[ 'html' ][ 'payment-content' ][ 'content' ] ); ?></span>
        <?php }
        ?>
    </div>
    <?php
}

if ( isset( $price[ 'type' ] ) && $price[ 'type' ] == 'price' ):
    ?>
    <div class="payment-overall-wrap">
        <div class="appts-price-value-wrap">
            <?php
            //////////////////////////// Marked price style settings //////////////////////////////////////////////////////////////////////////
            $dynamic_css = array();
            if ( isset( $price[ 'price' ][ 'marked-price' ][ 'style' ][ 'font-family' ] ) && $price[ 'price' ][ 'marked-price' ][ 'style' ][ 'font-family' ] != '' ) {
                if ( ! in_array( $price[ 'price' ][ 'marked-price' ][ 'style' ][ 'font-family' ], $google_fonts_used_array ) ) {
                    array_push( $google_fonts_used_array, preg_replace( '/\s/', '+', $price[ 'price' ][ 'marked-price' ][ 'style' ][ 'font-family' ] ) );
                }
                $font_family = $price[ 'price' ][ 'marked-price' ][ 'style' ][ 'font-family' ];
                $dynamic_css[] = "font-family:$font_family";
            }

            if ( isset( $price[ 'price' ][ 'marked-price' ][ 'style' ][ 'font-size' ] ) && $price[ 'price' ][ 'marked-price' ][ 'style' ][ 'font-size' ] != '' ) {
                $font_size = $price[ 'price' ][ 'marked-price' ][ 'style' ][ 'font-size' ];
                $dynamic_css[] = "font-size:{$font_size}px";
            }

            if ( isset( $price[ 'price' ][ 'marked-price' ][ 'style' ][ 'font-color' ] ) && $price[ 'price' ][ 'marked-price' ][ 'style' ][ 'font-color' ] != '' ) {
                $font_color = $price[ 'price' ][ 'marked-price' ][ 'style' ][ 'font-color' ];
                $dynamic_css[] = "color:{$font_color}";
            }

            if ( isset( $price[ 'price' ][ 'marked-price' ][ 'style' ][ 'font-style' ][ 'bold' ] ) && $price[ 'price' ][ 'marked-price' ][ 'style' ][ 'font-style' ][ 'bold' ] != '' ) {
                $dynamic_css[] = 'font-weight:bold';
            }

            if ( isset( $price[ 'price' ][ 'marked-price' ][ 'style' ][ 'font-style' ][ 'italic' ] ) && $price[ 'price' ][ 'marked-price' ][ 'style' ][ 'font-style' ][ 'italic' ] != '' ) {
                $dynamic_css[] = 'font-style:italic';
            }

            if ( ! empty( $dynamic_css ) ) {
                $dynamic_css = implode( ';', $dynamic_css );
                $marked_price_dynamic_css = "$dynamic_css";
            } else {
                $marked_price_dynamic_css = '';
            }

            ////////////////////////////////// Marked price style settings ends ////////////////////////////////////////////////////////////////////
            //////////////////////////// selling price style settings //////////////////////////////////////////////////////////////////////////
            $dynamic_css = array();
            if ( isset( $price[ 'price' ][ 'selling-price' ][ 'style' ][ 'font-family' ] ) && $price[ 'price' ][ 'selling-price' ][ 'style' ][ 'font-family' ] != '' ) {
                if ( ! in_array( $price[ 'price' ][ 'selling-price' ][ 'style' ][ 'font-family' ], $google_fonts_used_array ) ) {
                    array_push( $google_fonts_used_array, preg_replace( '/\s/', '+', $price[ 'price' ][ 'selling-price' ][ 'style' ][ 'font-family' ] ) );
                }
                $font_family = $price[ 'price' ][ 'selling-price' ][ 'style' ][ 'font-family' ];
                $dynamic_css[] = "font-family:$font_family";
            }

            if ( isset( $price[ 'price' ][ 'selling-price' ][ 'style' ][ 'font-size' ] ) && $price[ 'price' ][ 'selling-price' ][ 'style' ][ 'font-size' ] != '' ) {
                $font_size = $price[ 'price' ][ 'selling-price' ][ 'style' ][ 'font-size' ];
                $dynamic_css[] = "font-size:{$font_size}px";
            }

            if ( isset( $price[ 'price' ][ 'selling-price' ][ 'style' ][ 'font-color' ] ) && $price[ 'price' ][ 'selling-price' ][ 'style' ][ 'font-color' ] != '' ) {
                $font_color = $price[ 'price' ][ 'selling-price' ][ 'style' ][ 'font-color' ];
                $dynamic_css[] = "color:{$font_color} !important";
            }

            if ( isset( $price[ 'price' ][ 'selling-price' ][ 'style' ][ 'font-style' ][ 'bold' ] ) && $price[ 'price' ][ 'selling-price' ][ 'style' ][ 'font-style' ][ 'bold' ] != '' ) {
                $dynamic_css[] = 'font-weight:bold';
            }

            if ( isset( $price[ 'price' ][ 'selling-price' ][ 'style' ][ 'font-style' ][ 'italic' ] ) && $price[ 'price' ][ 'selling-price' ][ 'style' ][ 'font-style' ][ 'italic' ] != '' ) {
                $dynamic_css[] = 'font-style:italic';
            }

            if ( isset( $price[ 'price' ][ 'selling-price' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] ) && $price[ 'price' ][ 'selling-price' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] != '' ) {
                $dynamic_css[] = 'text-decoration:line-through';
            }

            if ( isset( $price[ 'price' ][ 'selling-price' ][ 'style' ][ 'font-style' ][ 'underline' ] ) && $price[ 'price' ][ 'selling-price' ][ 'style' ][ 'font-style' ][ 'underline' ] != '' ) {
                $dynamic_css[] = 'text-decoration:underline';
            }

            if ( ! empty( $dynamic_css ) ) {
                $dynamic_css = implode( ';', $dynamic_css );
                $selling_price_dynamic_css = "$dynamic_css";
            } else {
                $selling_price_dynamic_css = '';
            }

            ////////////////////////////////// selling price style settings ends ////////////////////////////////////////////////////////////////////

            $price_selling = isset( $price[ 'price' ][ 'selling-price' ][ 'content' ] ) ? $price[ 'price' ][ 'selling-price' ][ 'content' ] : NULL;
            if ( isset( $price_selling ) && $price_selling != NULL ) {
                $price_amount_selling = self:: format_price( $price_selling, $currency_thousand_separator, $currency_decimal_separator, $currency_decimal_no );
                $pieces1 = explode( $currency_decimal_separator, $price_amount_selling );
            }

            if ( ! empty( $price_selling ) ) {
                if ( $currency_decimal_no == '0' || $currency_decimal_no == '' ) {
                    $amount_selling = $pieces1[ 0 ];
                    $currency_decimal_separator = '';
                    $amount_selling_decimal = '';
                } else {
                    $count = count( $pieces1 );
                    $amount_selling = $pieces1[ 0 ]; // piece1
                    if ( $count > 1 ) {
                        $amount_selling_decimal = $pieces1[ 1 ]; // piece2
                    } else {
                        $amount_selling_decimal = '';
                    }
                }
            }

            if ( $template == 'template_01' ) {
                $dynamic_css = array();
                if ( isset( $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-family' ] ) && $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-family' ] != '' ) {
                    if ( ! in_array( $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-family' ], $google_fonts_used_array ) ) {
                        array_push( $google_fonts_used_array, preg_replace( '/\s/', '+', $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-family' ] ) );
                    }
                    $font_family = $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-family' ];
                    $dynamic_css[] = "font-family:$font_family";
                }

                if ( isset( $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-size' ] ) && $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-size' ] != '' ) {
                    $font_size = $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-size' ];
                    $dynamic_css[] = "font-size:{$font_size}px";
                }

                if ( isset( $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-color' ] ) && $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-color' ] != '' ) {
                    $font_color = $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-color' ];
                    $dynamic_css[] = "color:{$font_color}";
                }

                if ( isset( $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'bold' ] ) && $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'bold' ] != '' ) {
                    $dynamic_css[] = 'font-weight:bold';
                }

                if ( isset( $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'italic' ] ) && $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'italic' ] != '' ) {
                    $dynamic_css[] = 'font-style:italic';
                }

                if ( isset( $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] ) && $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] != '' ) {
                    $dynamic_css[] = 'text-decoration:line-through';
                }

                if ( isset( $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'underline' ] ) && $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'underline' ] != '' ) {
                    $dynamic_css[] = 'text-decoration:underline';
                }

                if ( ! empty( $dynamic_css ) ) {
                    $dynamic_css = implode( ';', $dynamic_css );
                    $dynamic_css = "style='$dynamic_css'";
                } else {
                    $dynamic_css = '';
                }

                if ( isset( $price[ 'price' ][ 'payment-name' ][ 'content' ] ) && $price[ 'price' ][ 'payment-name' ][ 'content' ] != '' ) {
                    ?>
                    <span class='appts-payment-name' <?php echo esc_attr( $dynamic_css ); ?> ><?php echo esc_html( $price[ 'price' ][ 'payment-name' ][ 'content' ] ); ?></span>
                    <?php
                }
                //////////////////////////////////////////////////////
            }
            ?>

            <?php if ( isset( $price_selling ) && $price_selling != '' ) { ?>
                <span class='appts-selling-value'><?php
                    if ( $currency_position == 'left' ) {
                        echo "<span class='appts-currency-symbol'>" . $currency_symbol . '</span>';
                    } echo "<span class='appts-integer'>" . $amount_selling . "</span><span class='appts-decimal'>" . $currency_decimal_separator . $amount_selling_decimal . '</span>';
                    if ( $currency_position == 'right' ) {
                        echo "<span class='appts-currency-symbol'>" . $currency_symbol . '</span>';
                    }
                    ?>
        <?php ob_start(); ?>
                    .appts-table-wrapper-<?php echo $pricing_table[ 'id' ]; ?> .appts-table-item-wrapper-<?php echo $key; ?> .appts-selling-value span.appts-currency-symbol,
                    .appts-table-wrapper-<?php echo $pricing_table[ 'id' ]; ?> .appts-table-item-wrapper-<?php echo $key; ?> .appts-selling-value span.appts-integer,
                    .appts-table-wrapper-<?php echo $pricing_table[ 'id' ]; ?> .appts-table-item-wrapper-<?php echo $key; ?> .appts-selling-value span.appts-decimal{
                    <?php echo $selling_price_dynamic_css; ?>
                    }
                    <?php
                    $table_dynamic_css_at_end[] = ob_get_contents();
                    ob_end_clean();
                    ?>
                </span>
                <?php
            }

            if ( $template != 'template_01' ) {
                //////////////////////////////////////////////////////
                if ( isset( $price[ 'price' ][ 'payment-name' ][ 'content' ] ) && $price[ 'price' ][ 'payment-name' ][ 'content' ] != '' ) {
                    $dynamic_css = array();
                    if ( isset( $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-family' ] ) && $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-family' ] != '' ) {
                        if ( ! in_array( $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-family' ], $google_fonts_used_array ) ) {
                            array_push( $google_fonts_used_array, preg_replace( '/\s/', '+', $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-family' ] ) );
                        }
                        $font_family = $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-family' ];
                        $dynamic_css[] = "font-family:$font_family";
                    }

                    if ( isset( $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-size' ] ) && $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-size' ] != '' ) {
                        $font_size = $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-size' ];
                        $dynamic_css[] = "font-size:{$font_size}px";
                    }

                    if ( isset( $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-color' ] ) && $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-color' ] != '' ) {
                        $font_color = $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-color' ];
                        $dynamic_css[] = "color:{$font_color}";
                    }

                    if ( isset( $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'bold' ] ) && $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'bold' ] != '' ) {
                        $dynamic_css[] = 'font-weight:bold';
                    }

                    if ( isset( $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'italic' ] ) && $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'italic' ] != '' ) {
                        $dynamic_css[] = 'font-style:italic';
                    }

                    if ( isset( $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] ) && $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] != '' ) {
                        $dynamic_css[] = 'text-decoration:line-through';
                    }

                    if ( isset( $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'underline' ] ) && $price[ 'price' ][ 'payment-name' ][ 'style' ][ 'font-style' ][ 'underline' ] != '' ) {
                        $dynamic_css[] = 'text-decoration:underline';
                    }

                    if ( ! empty( $dynamic_css ) ) {
                        $dynamic_css = implode( ';', $dynamic_css );
                        $dynamic_css = "style='$dynamic_css'";
                    } else {
                        $dynamic_css = '';
                    }
                    ?>
                    <span class='appts-payment-name' <?php echo esc_attr( $dynamic_css ); ?> ><?php echo esc_html( $price[ 'price' ][ 'payment-name' ][ 'content' ] ); ?></span>
                    <?php
                }
                ////////////////////////////////////////////////////////
            }
            ?>
        </div>
    </div>
<?php endif; ?>