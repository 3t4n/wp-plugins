<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$columns_border_enable = isset( $table_datas[ 'col-border' ] ) ? $table_datas[ 'col-border' ] : '';
$column_borders = isset( $table_datas[ 'col-border-radius' ] ) ? $table_datas[ 'col-border-radius' ] : array();
$column_animation = isset( $table_datas[ 'col-animation' ] ) ? $table_datas[ 'col-animation' ] : '';

$currency_settings = isset( $table_datas[ 'currency' ] ) ? $table_datas[ 'currency' ] : array();

$currency_position = $currency_settings[ 'position' ];
$currency_thousand_separator = isset( $currency_settings[ 'thousand_sep' ] ) && ($currency_settings[ 'thousand_sep' ] != '') ? $currency_settings[ 'thousand_sep' ] : '';
$currency_decimal_separator = $currency_settings[ 'decimal_sep' ];
$currency_decimal_no = isset( $currency_settings[ 'decimal_no' ] ) && ($currency_settings[ 'decimal_no' ] != '') ? $currency_settings[ 'decimal_no' ] : '0';

foreach ( $appts_pricing[ 'currency' ] as $key => $value ) {
    if ( $value[ 'id' ] == $currency_settings[ 'id' ] ) {
        $currency_symbol = $value[ 'symbol' ];
        break;
    } else {
        $currency_symbol = '$';
    }
}
?>

<?php if ( ! isset( $pricing_table ) ): ?>
    <div class="appts-table-wrapper error-div">
        <span class='appts-notice'><?php _e( 'Something went wrong.', 'ap-pricing-tables-lite' ); ?></span>
    </div>
    <?php
    exit();
endif;
?>

<div class='appts-<?php echo esc_attr( $column_counts ); ?>-columns appts-table-wrapper clearfix appts-<?php echo esc_attr( $template ); ?> appts-table-wrapper-<?php echo esc_attr( $pricing_table[ 'id' ] ); ?>' data-table-id='<?php echo esc_attr( $pricing_table[ 'id' ] ); ?>'>
    <?php ob_start(); ?>
    .appts-table-wrapper-<?php echo $pricing_table[ 'id' ]; ?> .appts-table-item-wrapper .appts-table-item,
    .appts-table-wrapper-<?php echo $pricing_table[ 'id' ]; ?> .appts-table-item-wrapper .appts-content-all-wrap{
    <?php if ( isset( $columns_border_enable ) && $columns_border_enable == '1' ): ?>
        border-radius: <?php echo $column_borders[ 'top' ]; ?>px <?php echo $column_borders[ 'right' ]; ?>px <?php echo $column_borders[ 'bottom' ]; ?>px <?php echo $column_borders[ 'left' ]; ?>px;
    <?php endif; ?>
    }
    <?php
    $table_dynamic_css_at_end[] = ob_get_contents();
    ob_end_clean();
    ?>
    <div class='appts-table-content-wrap'>
        <?php
        if ( ! empty( $column_datas ) ) {
            foreach ( $column_datas as $key => $value ) {
                ?>
                <?php
                $general_settings = $value[ 'general' ];
                $header_settings = $value[ 'header' ];
                $body_settings = isset( $value[ 'body' ] ) ? $value[ 'body' ] : array();
                $footer_settings = isset( $value[ 'footer' ] ) ? $value[ 'footer' ] : array();

                $layout_style = isset( $general_settings[ 'highlight-hover-settings' ] ) ? $general_settings[ 'highlight-hover-settings' ] : array();
                $decoration = $general_settings[ 'ribbon-settings' ];
                $shadow_settings = $general_settings[ 'shadow-settings' ];

                $featured_item = $header_settings[ 'featured-item' ];
                $title = $header_settings[ 'title-subtitle-settings' ];
                $price = $header_settings[ 'marked-price-selling-price-settings' ];
                $header_remove = isset( $header_settings[ 'header-remove' ] ) ? $header_settings[ 'header-remove' ] : '';

                if ( isset( $header_remove ) && $header_remove != '' ) {
                    $remove_header = $header_remove[ 'enable' ];
                } else {
                    $remove_header = '0';
                }
                $new_feature_image = isset( $featured_item[ 'image' ][ 'url' ] ) ? $featured_item[ 'image' ][ 'url' ] : '';

                ////////////////////////////////////
                $table_css = array();
                if ( isset( $table_datas[ 'col-width' ] ) && $table_datas[ 'col-width' ] != '' && $table_datas[ 'col-width' ] != '0' ) {
                    $table_css[] = 'width:' . $table_datas[ 'col-width' ] . 'px';
                }

                if ( ! empty( $table_css ) ) {
                    $style = implode( ';', $table_css );
                    $style = "style='$style'";
                } else {
                    $style = '';
                }
                /////////////////////////////////////
                $dynamic_classes = array();
                if ( isset( $shadow_settings[ 'type' ] ) ) {
                    $dynamic_classes[] = $shadow_settings[ 'type' ];
                }

                if ( isset( $layout_style[ 'highlight' ] ) && $layout_style[ 'highlight' ] == '1' ) {
                    $dynamic_classes[] = "appts-highlighted";
                }

                if ( isset( $layout_style[ 'disable-hover' ] ) && $layout_style[ 'disable-hover' ] == '1' ) {
                    $dynamic_classes[] = "appts-hover-disabled";
                }

                if ( $remove_header != '1' && isset( $new_feature_image ) && ($new_feature_image != '') ) {
                    $dynamic_classes[] = "appts-feature-image";
                }

                //header removed
                if ( isset( $remove_header ) && $remove_header == '1' ) {
                    $dynamic_classes[] = 'appts-empty-header';
                }

                if ( isset( $decoration[ 'type' ] ) && $decoration[ 'type' ] == 'text' ) {
                    if ( $decoration[ 'text' ][ 'template' ] == 'appts-ribbon-1' ) {
                        $dynamic_classes[] = "appts-table-item-hidden";
                    }
                }

                if ( ! empty( $dynamic_classes ) ) {
                    $dynamic_classes = implode( ' ', $dynamic_classes );
                } else {
                    $dynamic_classes = '';
                }
                ?>
                <div <?php echo esc_attr( $style ); ?> class="appts-table-item-wrapper appts-table-item-wrapper-<?php echo esc_attr( $key ); ?> <?php echo esc_attr( $dynamic_classes ); ?>" >
                    <?php
                    //////////////// column space //////////////////////////
                    $table_css = array();
                    $style = array();
                    if ( isset( $table_datas[ 'col-space' ] ) && $table_datas[ 'col-space' ] != '' && $table_datas[ 'col-space' ] != '0' ) {
                        $table_css[] = "margin:0 {$table_datas[ 'col-space' ]}px";
                    }

                    if ( ! empty( $table_css ) ) {
                        $style = implode( ';', $table_css );
                        $style = "style='$style'";
                    } else {
                        $style = '';
                    }
                    ////////////// column space ends //////////////////////
                    ?>

                    <div class="appts-content-all-wrap" <?php echo esc_attr( $style ); ?> >
                        <div class="appts-ribbon-content-wrap">
                            <?php include('ribbon_settings.php'); ?>

                            <div class="appts-table-item">
                                <?php if ( isset( $remove_header ) && $remove_header != '1' ) { ?>
                                    <div class="appts-table-header-wrapper" >
                                        <?php
                                        $dynamic_css = array();
                                        if ( isset( $new_feature_image ) && $new_feature_image != '' ) {
                                            $dynamic_css[] = "background-image: url($new_feature_image)";
                                        }
                                        if ( ! empty( $dynamic_css ) ) {
                                            $dynamic_css = implode( ';', $dynamic_css );
                                            $dynamic_css = "style='$dynamic_css'";
                                        } else {
                                            $dynamic_css = '';
                                        }
                                        ?>
                                        <div class='appts-title-price-wrap' <?php echo ($dynamic_css); ?>>

                                            <div class="appts-pricing-info <?php if ( $price[ 'type' ] == 'price-html' ) { ?> appts-html-pricing-info <?php } ?>">
                                                <div class="appts-pricing-info-div">
                                                    <?php include('price.php'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="appts-title-wrap">
                                            <?php
                                            if ( isset( $title[ 'title' ][ 'style' ][ 'font-family' ] ) && $title[ 'title' ][ 'style' ][ 'font-family' ] != '' ) {
                                                if ( ! in_array( $title[ 'title' ][ 'style' ][ 'font-family' ], $google_fonts_used_array ) ) {
                                                    array_push( $google_fonts_used_array, preg_replace( '/\s/', '+', $title[ 'title' ][ 'style' ][ 'font-family' ] ) );
                                                }
                                            }
                                            ///////////////////////////////////// Dynamic css //////////////////////////////////////////////////
                                            $dynamic_css = array();
                                            if ( isset( $title[ 'title' ][ 'style' ][ 'font-family' ] ) && $title[ 'title' ][ 'style' ][ 'font-family' ] != '' ) {
                                                $font_family = $title[ 'title' ][ 'style' ][ 'font-family' ];
                                                $dynamic_css[] = "font-family:$font_family";
                                            }

                                            if ( isset( $title[ 'title' ][ 'style' ][ 'font-size' ] ) && $title[ 'title' ][ 'style' ][ 'font-size' ] != '' ) {
                                                $font_size = $title[ 'title' ][ 'style' ][ 'font-size' ];
                                                $dynamic_css[] = "font-size:{$font_size}px";
                                            }

                                            if ( isset( $title[ 'title' ][ 'style' ][ 'font-color' ] ) && $title[ 'title' ][ 'style' ][ 'font-color' ] != '' ) {
                                                $font_color = $title[ 'title' ][ 'style' ][ 'font-color' ];
                                                $dynamic_css[] = "color:{$font_color}";
                                            }

                                            if ( isset( $title[ 'title' ][ 'style' ][ 'font-style' ][ 'bold' ] ) && $title[ 'title' ][ 'style' ][ 'font-style' ][ 'bold' ] != '' ) {
                                                $dynamic_css[] = 'font-weight:bold';
                                            }

                                            if ( isset( $title[ 'title' ][ 'style' ][ 'font-style' ][ 'italic' ] ) && $title[ 'title' ][ 'style' ][ 'font-style' ][ 'italic' ] != '' ) {
                                                $dynamic_css[] = 'font-style:italic';
                                            }

                                            if ( isset( $title[ 'title' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] ) && $title[ 'title' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] != '' ) {
                                                $dynamic_css[] = 'text-decoration:line-through';
                                            }

                                            if ( isset( $title[ 'title' ][ 'style' ][ 'font-style' ][ 'underline' ] ) && $title[ 'title' ][ 'style' ][ 'font-style' ][ 'underline' ] != '' ) {
                                                $dynamic_css[] = 'text-decoration:underline';
                                            }

                                            if ( ! empty( $dynamic_css ) ) {
                                                $title_style = implode( ';', $dynamic_css );
                                                $title_style = "style='$title_style'";
                                            } else {
                                                $title_style = '';
                                            }
                                            ////////////////////////////////////////////////////////////////////////////////////////////////

                                            if ( isset( $title[ 'subtitle' ][ 'style' ][ 'font-family' ] ) && $title[ 'subtitle' ][ 'style' ][ 'font-family' ] != '' ) {
                                                if ( ! in_array( $title[ 'subtitle' ][ 'style' ][ 'font-family' ], $google_fonts_used_array ) ) {
                                                    array_push( $google_fonts_used_array, preg_replace( '/\s/', '+', $title[ 'subtitle' ][ 'style' ][ 'font-family' ] ) );
                                                }
                                            }

                                            ////////////////////////////////////////////////////////////////////////////////////////////////
                                            $dynamic_css = array();
                                            if ( isset( $title[ 'subtitle' ][ 'style' ][ 'font-family' ] ) && $title[ 'subtitle' ][ 'style' ][ 'font-family' ] != '' ) {
                                                $font_family = $title[ 'subtitle' ][ 'style' ][ 'font-family' ];
                                                $dynamic_css[] = "font-family:$font_family";
                                            }

                                            if ( isset( $title[ 'subtitle' ][ 'style' ][ 'font-size' ] ) && $title[ 'subtitle' ][ 'style' ][ 'font-size' ] != '' ) {
                                                $font_size = $title[ 'subtitle' ][ 'style' ][ 'font-size' ];
                                                $dynamic_css[] = "font-size:{$font_size}px";
                                            }

                                            if ( isset( $title[ 'subtitle' ][ 'style' ][ 'font-color' ] ) && $title[ 'subtitle' ][ 'style' ][ 'font-color' ] != '' ) {
                                                $font_color = $title[ 'subtitle' ][ 'style' ][ 'font-color' ];
                                                $dynamic_css[] = "color:{$font_color}";
                                            }

                                            if ( isset( $title[ 'subtitle' ][ 'style' ][ 'font-style' ][ 'bold' ] ) && $title[ 'subtitle' ][ 'style' ][ 'font-style' ][ 'bold' ] != '' ) {
                                                $dynamic_css[] = 'font-weight:bold';
                                            }

                                            if ( isset( $title[ 'subtitle' ][ 'style' ][ 'font-style' ][ 'italic' ] ) && $title[ 'subtitle' ][ 'style' ][ 'font-style' ][ 'italic' ] != '' ) {
                                                $dynamic_css[] = 'font-style:italic';
                                            }

                                            if ( isset( $title[ 'subtitle' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] ) && $title[ 'subtitle' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] != '' ) {
                                                $dynamic_css[] = 'text-decoration:line-through';
                                            }

                                            if ( isset( $title[ 'subtitle' ][ 'style' ][ 'font-style' ][ 'underline' ] ) && $title[ 'subtitle' ][ 'style' ][ 'font-style' ][ 'underline' ] != '' ) {
                                                $dynamic_css[] = 'text-decoration:underline';
                                            }

                                            if ( ! empty( $dynamic_css ) ) {
                                                $sub_title_style = implode( ';', $dynamic_css );
                                                $sub_title_style = "style='$sub_title_style'";
                                            } else {
                                                $sub_title_style = '';
                                            }
                                            ///////////////////////////////////////////////////////////////////////////////////////////////////
                                            ?>
                                            <?php if ( isset( $title[ 'title' ][ 'content' ] ) && $title[ 'title' ][ 'content' ] != '' ) { ?>
                                                <span class="appts-item-title" <?php echo esc_attr( $title_style ); ?> ><?php echo ( $title[ 'title' ][ 'content' ] ); ?></span>
                                            <?php } ?>

                                            <?php if ( isset( $title[ 'subtitle' ][ 'content' ] ) && $title[ 'subtitle' ][ 'content' ] != '' ) { ?>
                                                <span class="appts-item-sub_title" <?php echo esc_attr( $sub_title_style ); ?>><?php echo ( $title[ 'subtitle' ][ 'content' ] ); ?></span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php } ?>

                                <?php if ( ! empty( $value[ 'body' ] ) ) { ?>
                                    <div class="appts-pricing-body">
                                        <?php
                                        foreach ( $value[ 'body' ] as $key1 => $value1 ) {
                                            ?>
                                            <div class="appts-pricing-content">
                                                <?php
                                                $body_row = $value1;
                                                if ( $body_row[ 'type' ] == 'html' ) {
                                                    if ( isset( $body_row[ 'html' ][ 'content' ][ 'style' ][ 'font-family' ] ) && $body_row[ 'html' ][ 'content' ][ 'style' ][ 'font-family' ] != '' ) {
                                                        if ( ! in_array( $body_row[ 'html' ][ 'content' ][ 'style' ][ 'font-family' ], $google_fonts_used_array ) ) {
                                                            array_push( $google_fonts_used_array, preg_replace( '/\s/', '+', $body_row[ 'html' ][ 'content' ][ 'style' ][ 'font-family' ] ) );
                                                        }
                                                    }
                                                    ///////////////////////////////////////////////////////////////////////////////////////////
                                                    $dynamic_css = array();

                                                    if ( isset( $body_row[ 'html' ][ 'content' ][ 'style' ][ 'text-align' ] ) && $body_row[ 'html' ][ 'content' ][ 'style' ][ 'text-align' ] != '' ) {
                                                        $dynamic_css[] = "text-align: {$body_row[ 'html' ][ 'content' ][ 'style' ][ 'text-align' ]}";
                                                    }

                                                    if ( isset( $body_row[ 'html' ][ 'content' ][ 'style' ][ 'font-family' ] ) && $body_row[ 'html' ][ 'content' ][ 'style' ][ 'font-family' ] != '' ) {
                                                        $font_family = $body_row[ 'html' ][ 'content' ][ 'style' ][ 'font-family' ];
                                                        $dynamic_css[] = "font-family:$font_family";
                                                    }

                                                    if ( isset( $body_row[ 'html' ][ 'content' ][ 'style' ][ 'font-size' ] ) && $body_row[ 'html' ][ 'content' ][ 'style' ][ 'font-size' ] != '' ) {
                                                        $font_size = $body_row[ 'html' ][ 'content' ][ 'style' ][ 'font-size' ];
                                                        $dynamic_css[] = "font-size:{$font_size}px";
                                                    }

                                                    if ( isset( $body_row[ 'html' ][ 'content' ][ 'style' ][ 'text-color' ] ) && $body_row[ 'html' ][ 'content' ][ 'style' ][ 'text-color' ] != '' ) {
                                                        $text_color = $body_row[ 'html' ][ 'content' ][ 'style' ][ 'text-color' ];
                                                        $dynamic_css[] = "color:{$text_color}";
                                                    }

                                                    if ( isset( $body_row[ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'bold' ] ) && $body_row[ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'bold' ] != '' ) {
                                                        $dynamic_css[] = 'font-weight:bold';
                                                    }

                                                    if ( isset( $body_row[ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'italic' ] ) && $body_row[ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'italic' ] != '' ) {
                                                        $dynamic_css[] = 'font-style:italic';
                                                    }

                                                    if ( isset( $body_row[ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] ) && $body_row[ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] != '' ) {
                                                        $dynamic_css[] = 'text-decoration:line-through';
                                                    }

                                                    if ( isset( $body_row[ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'underline' ] ) && $body_row[ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'underline' ] != '' ) {
                                                        $dynamic_css[] = 'text-decoration:underline';
                                                    }

                                                    if ( ! empty( $dynamic_css ) ) {
                                                        $dynamic_css = implode( ';', $dynamic_css );
                                                        $dynamic_css = "style='$dynamic_css'";
                                                    } else {
                                                        $dynamic_css = '';
                                                    }

                                                    ///////////////////////////////////////////////////////////////////////////////////////////
                                                    ?>
                                                    <span class="appts-pricing-content-info" <?php echo esc_attr( $dynamic_css ); ?> > <?php echo do_shortcode( $body_row[ 'html' ][ 'content' ][ 'content' ] ); ?> </span>
                                                    <?php
                                                }

                                                if ( $body_row[ 'type' ] == 'button' ) {

                                                    if ( isset( $body_row[ 'button' ][ 'style' ][ 'font-family' ] ) && $body_row[ 'button' ][ 'style' ][ 'font-family' ] != '' ) {
                                                        if ( ! in_array( $body_row[ 'button' ][ 'style' ][ 'font-family' ], $google_fonts_used_array ) ) {
                                                            array_push( $google_fonts_used_array, preg_replace( '/\s/', '+', $body_row[ 'button' ][ 'style' ][ 'font-family' ] ) );
                                                        }
                                                    }

                                                    ///////////////////////////////////////////////////////////////////////////////////////////
                                                    $dynamic_css = array();
                                                    if ( isset( $body_row[ 'button' ][ 'style' ][ 'font-family' ] ) && $body_row[ 'button' ][ 'style' ][ 'font-family' ] != '' ) {
                                                        $font_family = $body_row[ 'button' ][ 'style' ][ 'font-family' ];
                                                        $dynamic_css[] = "font-family:$font_family";
                                                    }

                                                    if ( isset( $body_row[ 'button' ][ 'style' ][ 'font-size' ] ) && $body_row[ 'button' ][ 'style' ][ 'font-size' ] != '' ) {
                                                        $font_size = $body_row[ 'button' ][ 'style' ][ 'font-size' ];
                                                        $dynamic_css[] = "font-size:{$font_size}px";
                                                    }

                                                    if ( isset( $body_row[ 'button' ][ 'style' ][ 'font-style' ][ 'bold' ] ) && $body_row[ 'button' ][ 'style' ][ 'font-style' ][ 'bold' ] != '' ) {
                                                        $dynamic_css[] = 'font-weight:bold';
                                                    }

                                                    if ( isset( $body_row[ 'button' ][ 'style' ][ 'font-style' ][ 'italic' ] ) && $body_row[ 'button' ][ 'style' ][ 'font-style' ][ 'italic' ] != '' ) {
                                                        $dynamic_css[] = 'font-style:italic';
                                                    }

                                                    if ( isset( $body_row[ 'button' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] ) && $body_row[ 'button' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] != '' ) {
                                                        $dynamic_css[] = 'text-decoration:line-through';
                                                    }

                                                    if ( isset( $body_row[ 'button' ][ 'style' ][ 'font-style' ][ 'underline' ] ) && $body_row[ 'button' ][ 'style' ][ 'font-style' ][ 'underline' ] != '' ) {
                                                        $dynamic_css[] = 'text-decoration:underline';
                                                    }

                                                    if ( ! empty( $dynamic_css ) ) {
                                                        $dynamic_css = implode( ';', $dynamic_css );
                                                        $dynamic_css = "style='$dynamic_css'";
                                                    } else {
                                                        $dynamic_css = '';
                                                    }

                                                    ///////////////////////////////////////////////////////////////////////////////////////////
                                                    ?>
                                                    <?php
                                                    $custom_attributes = array();
                                                    if ( isset( $body_row[ 'button' ][ 'target' ] ) && $body_row[ 'button' ][ 'target' ] == '1' ) {
                                                        $custom_attributes[] = "target='_blank'";
                                                    }

                                                    if ( isset( $body_row[ 'button' ][ 'nofollow' ] ) && $body_row[ 'button' ][ 'nofollow' ] == '1' ) {
                                                        $custom_attributes[] = "rel='nofollow'";
                                                    }

                                                    if ( ! empty( $custom_attributes ) ) {
                                                        $custom_attributes = implode( ' ', $custom_attributes );
                                                    } else {
                                                        $custom_attributes = '';
                                                    }
                                                    ?>
                                                    <span class="appts-pricing-content-button" >
                                                        <a <?php echo esc_attr( $dynamic_css ); ?> href="<?php echo esc_url( $body_row[ 'button' ][ 'link' ] ); ?>" <?php echo esc_attr( $custom_attributes ); ?> > <?php echo esc_attr( $body_row[ 'button' ][ 'text' ] ); ?></a>
                                                    </span>
                                                <?php }
                                                ?>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                <?php } ?>

                                <?php if ( ! empty( $value[ 'footer' ] ) ) { ?>
                                    <div class="appts-pricing-footer">
                                        <?php
                                        foreach ( $value[ 'footer' ] as $key1 => $value1 ) {
                                            ?>
                                            <div class='appts-pricing-footer-content'>
                                                <?php
                                                $footer_row = $value1;
                                                if ( $footer_row[ 'type' ] == 'html' ) {
                                                    if ( isset( $footer_row[ 'html' ][ 'content' ][ 'style' ][ 'font-family' ] ) && $footer_row[ 'html' ][ 'content' ][ 'style' ][ 'font-family' ] != '' ) {
                                                        if ( ! in_array( $footer_row[ 'html' ][ 'content' ][ 'style' ][ 'font-family' ], $google_fonts_used_array ) ) {
                                                            array_push( $google_fonts_used_array, preg_replace( '/\s/', '+', $footer_row[ 'html' ][ 'content' ][ 'style' ][ 'font-family' ] ) );
                                                        }
                                                    }

                                                    ///////////////////////////////////////////////////////////////////////////////////////////
                                                    $dynamic_css = array();
                                                    if ( isset( $footer_row[ 'html' ][ 'content' ][ 'style' ][ 'text-align' ] ) && $footer_row[ 'html' ][ 'content' ][ 'style' ][ 'text-align' ] != '' ) {
                                                        $dynamic_css[] = "text-align: {$footer_row[ 'html' ][ 'content' ][ 'style' ][ 'text-align' ]}";
                                                    }

                                                    if ( isset( $footer_row[ 'html' ][ 'content' ][ 'style' ][ 'font-family' ] ) && $footer_row[ 'html' ][ 'content' ][ 'style' ][ 'font-family' ] != '' ) {
                                                        $font_family = $footer_row[ 'html' ][ 'content' ][ 'style' ][ 'font-family' ];
                                                        $dynamic_css[] = "font-family:$font_family";
                                                    }

                                                    if ( isset( $footer_row[ 'html' ][ 'content' ][ 'style' ][ 'font-size' ] ) && $footer_row[ 'html' ][ 'content' ][ 'style' ][ 'font-size' ] != '' ) {
                                                        $font_size = $footer_row[ 'html' ][ 'content' ][ 'style' ][ 'font-size' ];
                                                        $dynamic_css[] = "font-size:{$font_size}px";
                                                    }

                                                    if ( isset( $footer_row[ 'html' ][ 'content' ][ 'style' ][ 'text-color' ] ) && $footer_row[ 'html' ][ 'content' ][ 'style' ][ 'text-color' ] != '' ) {
                                                        $text_color = $footer_row[ 'html' ][ 'content' ][ 'style' ][ 'text-color' ];
                                                        $dynamic_css[] = "color:{$text_color}";
                                                    }

                                                    if ( isset( $footer_row[ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'bold' ] ) && $footer_row[ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'bold' ] != '' ) {
                                                        $dynamic_css[] = 'font-weight:bold';
                                                    }

                                                    if ( isset( $footer_row[ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'italic' ] ) && $footer_row[ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'italic' ] != '' ) {
                                                        $dynamic_css[] = 'font-style:italic';
                                                    }

                                                    if ( isset( $footer_row[ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] ) && $footer_row[ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] != '' ) {
                                                        $dynamic_css[] = 'text-decoration:line-through';
                                                    }

                                                    if ( isset( $footer_row[ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'underline' ] ) && $footer_row[ 'html' ][ 'content' ][ 'style' ][ 'font-style' ][ 'underline' ] != '' ) {
                                                        $dynamic_css[] = 'text-decoration:underline';
                                                    }

                                                    if ( ! empty( $dynamic_css ) ) {
                                                        $dynamic_css = implode( ';', $dynamic_css );
                                                        $dynamic_css = "style='$dynamic_css'";
                                                    } else {
                                                        $dynamic_css = '';
                                                    }

                                                    ///////////////////////////////////////////////////////////////////////////////////////////
                                                    ?>
                                                    <span class="footer-content" <?php echo esc_attr( $dynamic_css ); ?> ><?php echo do_shortcode( $footer_row[ 'html' ][ 'content' ][ 'content' ] ); ?> </span>
                                                    <?php
                                                }

                                                if ( $footer_row[ 'type' ] == 'button' ) {
                                                    if ( isset( $footer_row[ 'button' ][ 'style' ][ 'font-family' ] ) && $footer_row[ 'button' ][ 'style' ][ 'font-family' ] != '' ) {
                                                        if ( ! in_array( $footer_row[ 'button' ][ 'style' ][ 'font-family' ], $google_fonts_used_array ) ) {
                                                            array_push( $google_fonts_used_array, preg_replace( '/\s/', '+', $footer_row[ 'button' ][ 'style' ][ 'font-family' ] ) );
                                                        }
                                                    }
                                                    ///////////////////////////////////////////////////////////////////////////////////////////
                                                    $dynamic_css = array();
                                                    if ( isset( $footer_row[ 'button' ][ 'style' ][ 'font-family' ] ) && $footer_row[ 'button' ][ 'style' ][ 'font-family' ] != '' ) {
                                                        $font_family = $footer_row[ 'button' ][ 'style' ][ 'font-family' ];
                                                        $dynamic_css[] = "font-family:$font_family";
                                                    }

                                                    if ( isset( $footer_row[ 'button' ][ 'style' ][ 'font-size' ] ) && $footer_row[ 'button' ][ 'style' ][ 'font-size' ] != '' ) {
                                                        $font_size = $footer_row[ 'button' ][ 'style' ][ 'font-size' ];
                                                        $dynamic_css[] = "font-size:{$font_size}px";
                                                    }

                                                    if ( isset( $footer_row[ 'button' ][ 'style' ][ 'font-style' ][ 'bold' ] ) && $footer_row[ 'button' ][ 'style' ][ 'font-style' ][ 'bold' ] != '' ) {
                                                        $dynamic_css[] = 'font-weight:bold';
                                                    }

                                                    if ( isset( $footer_row[ 'button' ][ 'style' ][ 'font-style' ][ 'italic' ] ) && $footer_row[ 'button' ][ 'style' ][ 'font-style' ][ 'italic' ] != '' ) {
                                                        $dynamic_css[] = 'font-style:italic';
                                                    }

                                                    if ( isset( $footer_row[ 'button' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] ) && $footer_row[ 'button' ][ 'style' ][ 'font-style' ][ 'strikethrough' ] != '' ) {
                                                        $dynamic_css[] = 'text-decoration:line-through';
                                                    }

                                                    if ( isset( $footer_row[ 'button' ][ 'style' ][ 'font-style' ][ 'underline' ] ) && $footer_row[ 'button' ][ 'style' ][ 'font-style' ][ 'underline' ] != '' ) {
                                                        $dynamic_css[] = 'text-decoration:underline';
                                                    }

                                                    if ( isset( $footer_row[ 'button' ][ 'style' ][ 'font-color' ] ) && $footer_row[ 'button' ][ 'style' ][ 'font-color' ] != '' ) {
                                                        $dynamic_css[] = "color:{$footer_row[ 'button' ][ 'style' ][ 'font-color' ]}";
                                                    }

                                                    if ( isset( $footer_row[ 'button' ][ 'style' ][ 'bg-color' ] ) && $footer_row[ 'button' ][ 'style' ][ 'bg-color' ] != '' ) {
                                                        $dynamic_css[] = "background:{$footer_row[ 'button' ][ 'style' ][ 'bg-color' ]}";
                                                    }

                                                    if ( ! empty( $dynamic_css ) ) {
                                                        $dynamic_css = implode( ';', $dynamic_css );
                                                        $dynamic_css = "style='$dynamic_css'";
                                                    } else {
                                                        $dynamic_css = '';
                                                    }

                                                    ///////////////////////////////////////////////////////////////////////////////////////////
                                                    ?>
                                                    <?php
                                                    $custom_attributes = array();
                                                    if ( isset( $footer_row[ 'button' ][ 'target' ] ) && $footer_row[ 'button' ][ 'target' ] == '1' ) {
                                                        $custom_attributes[] = "target='_blank'";
                                                    }

                                                    if ( isset( $footer_row[ 'button' ][ 'nofollow' ] ) && $footer_row[ 'button' ][ 'nofollow' ] == '1' ) {
                                                        $custom_attributes[] = "rel='nofollow'";
                                                    }

                                                    if ( ! empty( $custom_attributes ) ) {
                                                        $custom_attributes = implode( ' ', $custom_attributes );
                                                    } else {
                                                        $custom_attributes = '';
                                                    }
                                                    ?>
                                                    <span class="appts-pricing-footer-content-button">
                                                        <a <?php echo esc_attr( $dynamic_css ); ?> href="<?php echo esc_url( $footer_row[ 'button' ][ 'link' ] ); ?>" <?php echo esc_attr( $custom_attributes ); ?> > <?php echo esc_attr( $footer_row[ 'button' ][ 'text' ] ); ?> </a>
                                                    </span>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php
    } else {

    }
    ?>

</div>
<!-- appts-table-wrapper -->