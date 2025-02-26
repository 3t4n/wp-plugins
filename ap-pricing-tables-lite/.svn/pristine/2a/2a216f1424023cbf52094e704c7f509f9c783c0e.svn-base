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

<div class='appts-<?php echo $column_counts; ?>-columns appts-table-wrapper clearfix appts-<?php echo $template; ?> appts-table-wrapper-<?php echo $pricing_table[ 'id' ]; ?>' data-table-id='<?php echo $pricing_table[ 'id' ]; ?>'>
    <?php ob_start();
    ?>
    .appts-table-wrapper-<?php echo $pricing_table[ 'id' ]; ?> .appts-table-item-wrapper .appts-table-item {
    <?php if ( isset( $columns_border_enable ) && $columns_border_enable == '1' ): ?>
        border-radius: <?php echo esc_attr( $column_borders[ 'top' ] ); ?>px <?php echo esc_attr( $column_borders[ 'right' ] ); ?>px <?php echo esc_attr( $column_borders[ 'bottom' ] ); ?>px <?php echo esc_attr( $column_borders[ 'left' ] ); ?>px;
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
                $marked_price_selling_price_settings = $header_settings[ 'marked-price-selling-price-settings' ];
                $header_remove = isset( $header_settings[ 'header-remove' ] ) ? $header_settings[ 'header-remove' ] : '';

                $feature_image = $featured_item[ 'image' ][ 'url' ];
                if ( isset( $header_remove ) && $header_remove != '' ) {
                    $remove_header = $header_remove[ 'enable' ];
                } else {
                    $remove_header = '0';
                }

                $new_feature_image = isset( $featured_item[ 'image' ][ 'url' ] ) ? $featured_item[ 'image' ][ 'url' ] : '';
                $new_font_icon_image = isset( $featured_item[ 'icon' ][ 'value' ] ) ? $featured_item[ 'icon' ][ 'value' ] : '';

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

                if ( ! empty( $dynamic_classes ) ) {
                    $dynamic_classes = implode( ' ', $dynamic_classes );
                } else {
                    $dynamic_classes = '';
                }
                /////////////////////////////////////
                ?>

                <div <?php echo $style; ?> class="appts-table-item-wrapper appts-table-item-wrapper-<?php echo $key; ?> <?php echo $dynamic_classes; ?>">
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
                    /////////////////Dynamic class////////////////////////
                    $dynamic_classes = array();
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
                    ////////////////Dynamic class///////////////////////
                    ?>
                    <div class="appts-content-all-wrap <?php echo esc_attr( $dynamic_classes ); ?>" <?php echo esc_attr( $style ); ?> >
                        <div class="appts-content-ribbon-wrap">
                            <?php include('ribbon_settings.php'); ?>
                            <div class="appts-table-item" >
                                <div class="appts-table-item-wrap">
                                    <?php if ( isset( $remove_header ) && $remove_header != '1' ) { ?>
                                        <div class="appts-table-header-wrapper" <?php
                                        if ( isset( $new_feature_image ) && $new_feature_image != '' && $template == 'template_02' ) {
                                            echo "style='background:url($new_feature_image)';";
                                        }
                                        ?> >
                                            <div class="appts-header-wrap">
                                                <?php
                                                $price = $header_settings[ 'marked-price-selling-price-settings' ];
                                                ///////////////// title and subtitle ///////////////////////
                                                include('title_subtitle.php');
                                                ///////////////// title and subtitle ///////////////////////
                                                ?>

                                                <div class='appts-price-rating-wrapper'>
                                                    <?php if ( ( $price[ 'type' ] == 'price' && ($price[ 'price' ][ 'selling-price' ][ 'content' ] != '' || $price[ 'price' ][ 'payment-name' ][ 'content' ] != '')) || ( $price[ 'type' ] == 'price-html' && ($price[ 'html' ][ 'selling-price-content' ][ 'content' ] != '' || $price[ 'payment-content' ][ 'content' ] != '')) ) { ?>
                                                        <div class="appts-pricing-info <?php if ( $price[ 'type' ] == 'price-html' ) { ?> appts-html-pricing-info <?php } ?>">
                                                            <div class="appts-pricing-info-circle">
                                                                <?php
                                                                //////////////// price ///////////////////
                                                                include('price.php');
                                                                //////////////// price ends ///////////////////
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }

                                    if ( ! empty( $value[ 'body' ] ) ) {
                                        include('body.php');
                                    }

                                    if ( ! empty( $value[ 'footer' ] ) ) {
                                        include('footer.php');
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>
<!-- appts-table-wrapper -->