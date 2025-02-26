<div class="appts-pricing-footer">
    <?php
    if ( ! empty( $value[ 'footer' ] ) ) {
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
                        $dynamic_css[] = "font-family:$font_family;";
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
                    <span class="footer-content" <?php echo esc_attr( $dynamic_css ); ?> ><?php echo do_shortcode( $footer_row[ 'html' ][ 'content' ][ 'content' ] ); ?></span>
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
                        <a <?php echo esc_attr( $dynamic_css ); ?> href="<?php echo esc_url( $footer_row[ 'button' ][ 'link' ] ); ?>" <?php echo esc_attr( $custom_attributes ); ?>><?php echo esc_attr( $footer_row[ 'button' ][ 'text' ] ); ?></a>
                    </span>
                    <?php
                }
                ?>
            </div>
            <?php
        } //endforeach
    } //endif
    ?>
</div>