<?php
// ribbon settings
if ( isset( $decoration[ 'type' ] ) ) {
    switch ( $decoration[ 'type' ] ) {
        case 'text':
            $text_settings = $decoration[ 'text' ];

            $style = array();

            ////////////// dynamic classes ///////////////
            $dynamic_classes = array();
            if ( isset( $text_settings[ 'template' ] ) ) {
                $dynamic_classes[] = $text_settings[ 'template' ];
            }

            if ( isset( $decoration[ 'common-settings' ][ 'alignment' ] ) ) {
                $dynamic_classes[] = "appts-ribbon-" . $decoration[ 'common-settings' ][ 'alignment' ];
            }

            if ( ! empty( $dynamic_classes ) ) {
                $dynamic_classes = implode( ' ', $dynamic_classes );
            } else {
                $dynamic_classes = '';
            }
            ////////////// dynamic classes ends ///////////////
            ///////////dynamic css/////////////////
            $dynamic_css = array();
            if ( isset( $decoration[ 'common-settings' ][ 'alignment' ] ) && $decoration[ 'common-settings' ][ 'alignment' ] != '' ) {
                if ( isset( $decoration[ 'common-settings' ][ 'posx' ] ) && $decoration[ 'common-settings' ][ 'posx' ] != '' ) {
                    $dynamic_css[] = $decoration[ 'common-settings' ][ 'alignment' ] . ":{$decoration[ 'common-settings' ][ 'posx' ]}px";
                }
            }

            if ( isset( $decoration[ 'common-settings' ][ 'posy' ] ) && $decoration[ 'common-settings' ][ 'posy' ] != '' ) {
                $dynamic_css[] = "top:{$decoration[ 'common-settings' ][ 'posy' ]}px";
            }

            if ( isset( $decoration[ 'common-settings' ][ 'width' ] ) && $decoration[ 'common-settings' ][ 'width' ] != '' ) {
                $dynamic_css[] = "width:{$decoration[ 'common-settings' ][ 'width' ]}px";
            }

            if ( ! empty( $dynamic_css ) ) {
                $dynamic_css = implode( ';', $dynamic_css );
                $dynamic_css = "style='$dynamic_css'";
            } else {
                $dynamic_css = '';
            }
            ///////////dynamic css ends /////////////////
            ?>

            <?php
            if ( $text_settings[ 'template' ] == 'appts-ribbon-2' ) {
                ob_start();
                ?>
                /* ribbon-2 dynamic css for right */
                .appts-table-wrapper-<?php echo $pricing_table[ 'id' ]; ?> .appts-table-item-wrapper-<?php echo $key; ?> .appts-ribbon-2.appts-ribbon-right .appts-ribbon-wrap:after{
                border-color: transparent transparent <?php echo (isset( $text_settings[ 'bg-color' ] ) && $text_settings[ 'bg-color' ] != '') ? $text_settings[ 'bg-color' ] : '#f0d101'; ?> transparent;
                }
                .appts-table-wrapper-<?php echo $pricing_table[ 'id' ]; ?> .appts-table-item-wrapper-<?php echo $key; ?> .appts-ribbon-2.appts-ribbon-right .appts-ribbon-wrap:before{
                border-color: transparent <?php echo (isset( $text_settings[ 'bg-color' ] ) && $text_settings[ 'bg-color' ] != '') ? $text_settings[ 'bg-color' ] : '#f0d101'; ?> transparent transparent;
                }

                /* ribbon-2 dynamic css for left */
                .appts-table-wrapper-<?php echo $pricing_table[ 'id' ]; ?> .appts-table-item-wrapper-<?php echo $key; ?> .appts-ribbon-2.appts-ribbon-left .appts-ribbon-wrap:after{
                border-color: transparent transparent transparent <?php echo (isset( $text_settings[ 'bg-color' ] ) && $text_settings[ 'bg-color' ] != '') ? $text_settings[ 'bg-color' ] : '#f0d101'; ?>;
                }
                .appts-table-wrapper-<?php echo $pricing_table[ 'id' ]; ?> .appts-table-item-wrapper-<?php echo $key; ?> .appts-ribbon-2.appts-ribbon-left .appts-ribbon-wrap:before{
                border-color:<?php echo (isset( $text_settings[ 'bg-color' ] ) && $text_settings[ 'bg-color' ] != '') ? $text_settings[ 'bg-color' ] : '#f0d101'; ?> transparent transparent transparent;
                }
                <?php
                $table_dynamic_css_at_end[] = ob_get_contents();
                ob_end_clean();
                ?>
            <?php }
            ?>
            <div class="appts-ribbon-display <?php echo esc_attr( $dynamic_classes ); ?>" <?php echo esc_attr( $dynamic_css ); ?>>
                <?php
                if ( isset( $text_settings[ 'font-family' ] ) && $text_settings[ 'font-family' ] != '' ) {
                    array_push( $google_fonts_used_array, preg_replace( '/\s/', '+', $text_settings[ 'font-family' ] ) );
                }

                ////////////////dynamic css////////////////
                $dynamic_css = array();
                if ( isset( $text_settings[ 'font-family' ] ) && $text_settings[ 'font-family' ] != '' ) {
                    $dynamic_css[] = "font-family:{$text_settings[ 'font-family' ]}";
                }

                if ( isset( $text_settings[ 'font-size' ] ) && $text_settings[ 'font-size' ] != '' ) {
                    $dynamic_css[] = "font-size:{$text_settings[ 'font-size' ]}px";
                }

                if ( isset( $text_settings[ 'font-style' ][ 'bold' ] ) && $text_settings[ 'font-style' ][ 'bold' ] == '1' ) {
                    $dynamic_css[] = "font-weight:bold";
                }

                if ( isset( $text_settings[ 'font-style' ][ 'italic' ] ) && $text_settings[ 'font-style' ][ 'italic' ] == '1' ) {
                    $dynamic_css[] = "font-style:italic";
                }

                if ( isset( $text_settings[ 'font-style' ][ 'strikethrough' ] ) && $text_settings[ 'font-style' ][ 'strikethrough' ] == '1' ) {
                    $dynamic_css[] = "text-decoration :line-through";
                }

                if ( isset( $text_settings[ 'font-style' ][ 'underline' ] ) && $text_settings[ 'font-style' ][ 'underline' ] == '1' ) {
                    $dynamic_css[] = "text-decoration :underline";
                }

                if ( isset( $text_settings[ 'color' ] ) && $text_settings[ 'color' ] != '' ) {
                    $dynamic_css[] = "color:{$text_settings[ 'color' ]}";
                }

                if ( isset( $text_settings[ 'bg-grad-enable' ] ) && $text_settings[ 'bg-grad-enable' ] == '1' ) {
                    $dynamic_css[] = "background: -webkit-linear-gradient( {$text_settings[ 'bg-grad-angle' ]}deg, {$text_settings[ 'bg-color' ]}, {$text_settings[ 'bg-color2' ]})";
                    $dynamic_css[] = "background: -o-linear-gradient({$text_settings[ 'bg-grad-angle' ]}deg, {$text_settings[ 'bg-color' ]}, {$text_settings[ 'bg-color2' ]})";
                    $dynamic_css[] = "background: -moz-linear-gradient({$text_settings[ 'bg-grad-angle' ]}deg, {$text_settings[ 'bg-color' ]}, {$text_settings[ 'bg-color2' ]})";
                    $dynamic_css[] = "background: linear-gradient({$text_settings[ 'bg-grad-angle' ]}deg, {$text_settings[ 'bg-color' ]}, {$text_settings[ 'bg-color2' ]})";
                } else if ( $text_settings[ 'bg-color' ] != '' ) {
                    $dynamic_css[] = "background:{$text_settings[ 'bg-color' ]}";
                }

                if ( ! empty( $dynamic_css ) ) {
                    $dynamic_css = implode( ';', $dynamic_css );
                    $dynamic_css = "style='$dynamic_css'";
                } else {
                    $dynamic_css = '';
                }
                ////////////////dynamic css////////////////

                if ( isset( $decoration[ 'common-settings' ][ 'url' ] ) && $decoration[ 'common-settings' ][ 'url' ] != '' ) {
                    ?>
                    <?php
                    $custom_attributes = array();
                    if ( isset( $decoration[ 'common-settings' ][ 'target' ] ) && $decoration[ 'common-settings' ][ 'target' ] == '1' ) {
                        $custom_attributes[] = "target='_blank'";
                    }

                    if ( isset( $decoration[ 'common-settings' ][ 'nofollow' ] ) && $decoration[ 'common-settings' ][ 'nofollow' ] == '1' ) {
                        $custom_attributes[] = "rel='nofollow'";
                    }

                    if ( ! empty( $custom_attributes ) ) {
                        $custom_attributes = implode( ' ', $custom_attributes );
                    } else {
                        $custom_attributes = '';
                    }
                    ?>
                    <a href="<?php echo esc_url( $decoration[ 'common-settings' ][ 'url' ] ); ?>" <?php echo esc_attr( $custom_attributes ); ?> >
                        <div class="appts-ribbon-wrap" <?php echo esc_attr( $dynamic_css ); ?>>
                            <?php echo isset( $text_settings[ 'content' ] ) ? esc_attr( $text_settings[ 'content' ] ) : ''; ?>
                        </div>
                    </a>
                <?php } else {
                    ?>
                    <div class="appts-ribbon-wrap" <?php echo esc_attr( $dynamic_css ); ?> >
                        <?php echo isset( $text_settings[ 'content' ] ) ? esc_attr( $text_settings[ 'content' ] ) : ''; ?>
                    </div>
                <?php }
                ?>
            </div>
            <?php
            break;

        default:
            break;
    }
}
// ribbon settings ends