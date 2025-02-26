<div class="appts-pricing-body">
    <?php if ( ! empty( $value[ 'body' ] ) ) { ?>
        <div class="appts-pricing-body-wrap">
            <?php foreach ( $value[ 'body' ] as $key1 => $value1 ) { ?>
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

                        if ( ! empty( $dynamic_css ) ) {
                            $dynamic_css = implode( ';', $dynamic_css );
                            $dynamic_css = "style='$dynamic_css'";
                        } else {
                            $dynamic_css = '';
                        }

                        ///////////////////////////////////////////////////////////////////////////////////////////
                        ?>
                        <span class="appts-pricing-content-info" <?php echo esc_attr( $dynamic_css ); ?>><?php echo do_shortcode( $body_row[ 'html' ][ 'content' ][ 'content' ] ); ?></span>
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
            } //endforeach
            ?>
        </div>
    <?php } //endif
    ?>
</div>