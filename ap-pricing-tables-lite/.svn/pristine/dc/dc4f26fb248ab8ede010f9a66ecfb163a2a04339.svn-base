<?php
///////////////// title and subtitle ///////////////////////
if ( isset( $new_feature_image ) && $new_feature_image != '' && $template == 'template_26' ) {
    $optional_image_background = "style='background-image: url($new_feature_image)'";
} else {
    $optional_image_background = "";
}

if ( $new_feature_image == '' && (isset( $title[ 'subtitle' ][ 'content' ] ) && $title[ 'subtitle' ][ 'content' ] == '') && (isset( $title[ 'title' ][ 'content' ] ) && $title[ 'title' ][ 'content' ] == '') ) {

} else {
    ?>
    <div class="appts-table-title-wrapper <?php
    if ( $remove_header == '1' ) {
        echo "header_removed ";
    } if ( isset( $new_feature_image ) && ($new_feature_image != '') ) {
        echo "appts-feature-image";
    }
    ?>" <?php echo $optional_image_background; ?>>
             <?php if ( isset( $new_feature_image ) && $new_feature_image != '' && ($template != 'template_24' && $template != 'template_26' && $template != 'template_02' && $template != 'template_32') ) {
                 ?>
            <div class="appts-img-wrapper">
                <img src="<?php echo $new_feature_image; ?>">
            </div>
            <?php
        }

        if ( (isset( $title[ 'subtitle' ][ 'content' ] ) && $title[ 'subtitle' ][ 'content' ] != '') || (isset( $title[ 'title' ][ 'content' ] ) && $title[ 'title' ][ 'content' ] != '') ) {
            ?>
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
                ////////////////////////////////////////////////////////////////////////////////////////////////

                if ( isset( $title[ 'title' ][ 'content' ] ) && $title[ 'title' ][ 'content' ] != '' ) {
                    ?>
                    <span class="appts-item-title" <?php echo $title_style; ?> ><?php echo ( $title[ 'title' ][ 'content' ] ); ?></span>
                    <?php
                }
                if ( isset( $title[ 'subtitle' ][ 'content' ] ) && $title[ 'subtitle' ][ 'content' ] != '' ) {
                    ?>
                    <span class="appts-item-sub_title" <?php echo $sub_title_style; ?>><?php echo ( $title[ 'subtitle' ][ 'content' ] ); ?></span>
                    <?php
                }
                ?>
            </div>
        <?php } ?>
    </div>
    <?php
}
///////////////// title and subtitle ///////////////////////