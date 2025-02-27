<?php
$img_position = !empty( $deal->_molongui_bump_image_position ) ? $deal->_molongui_bump_image_position : ( ( $is_preview and !empty( $globals['image_position'] ) ) ? $globals['image_position'] : $defaults['image_position'] );
$img_align    = !empty( $deal->_molongui_bump_image_align )    ? $deal->_molongui_bump_image_align    : ( ( $is_preview and !empty( $globals['image_align'] ) )    ? $globals['image_align']    : $defaults['image_align'] );
$img_size     = !empty( $deal->_molongui_bump_image_size )     ? $deal->_molongui_bump_image_size     : ( ( $is_preview and !empty( $globals['image_size'] ) )     ? $globals['image_size']     : $defaults['image_size'] );
$img_color    = !empty( $deal->_molongui_bump_image_color )    ? $deal->_molongui_bump_image_color    : ( ( $is_preview and !empty( $globals['image_color'] ) )    ? $globals['image_color']    : $defaults['image_color'] );

$box_direction = in_array( $img_position, array( 'left', 'right' ) ) ? 'row' : 'column';
if ( !$is_preview and in_array( $img_position, array( 'left', 'right' ) ) and !empty( $deal->_molongui_bump_image_responsive ) ) \molongui_enqueue_element_queries();
$deal_container_styles = implode(' ', array_filter( array
(
    empty( $box_align             ) ? '' : 'justify-content:'.$box_align.';',
    empty( $box_vertical_margin   ) ? '' : 'padding-top:'.$box_vertical_margin.'px;'.'padding-bottom:'.$box_vertical_margin.'px;',
    empty( $box_horizontal_margin ) ? '' : 'padding-left:'.$box_horizontal_margin.'px;'.'padding-right:'.$box_horizontal_margin.'px;',
)));
$deal_wrap_styles = implode(' ', array_filter( array
(
    empty( $box_width         ) ? '' : 'max-width:'.$box_width.'%;',
    empty( $box_border_style  ) ? '' : 'border-style:'.$box_border_style.';',
    !isset( $box_border_width ) ? '' : 'border-width:'.$box_border_width.'px;',
    empty( $box_border_color  ) ? '' : 'border-color:'.$box_border_color.';',
    empty( $box_border_radius ) ? '' : 'border-radius:'.$box_border_radius.'px;',
    empty( $box_bg_color      ) ? '' : 'background-color:'.$box_bg_color.';',
    empty( $box_inner_padding ) ? '' : 'padding:'.$box_inner_padding.'px;',
    $box_no_padding ? 'padding:0;' : '',
    $is_preview ? 'flex-direction:'.$box_direction : '',
)));
$deal_content_styles = implode(' ', array_filter( array
(

)));
?>

<div class="molongui-bump mbo-deal"
     style="<?php echo $deal_container_styles; ?>"
     data-bump-layout="layout-1"
     data-bump-features="lite"
     data-bump-id="<?php echo $deal->ID; ?>"
     data-bump-product="<?php echo ( isset( $deal->_molongui_bump_product ) ? $deal->_molongui_bump_product : '' ); ?>"
     data-bump-price-criteria="<?php echo ( isset( $deal->_molongui_deal_price_criteria ) ? $deal->_molongui_deal_price_criteria : '' ); ?>"
     data-bump-price="<?php echo ( isset( $deal->_molongui_bump_price ) ? $deal->_molongui_bump_price : '' ); ?>"
     data-bump-quantity="<?php echo ( isset( $deal->_molongui_deal_quantity ) ? $deal->_molongui_deal_quantity : '1' ); ?>"
>
    <div class="molongui-bump-container mbo-wrap <?php echo $box_no_bg ? ' molongui-transparent-bg' : ''; ?>"
         style="<?php echo $deal_wrap_styles; ?>">

        <?php if ( !empty( $deal->_molongui_bump_media_type ) and $deal->_molongui_bump_media_type === 'image' and !empty( $img_size) and in_array( $img_position, array( 'above', 'left' ) ) ) : ?>

            <!-- Above/Left content -->
            <div class="molongui-bump-content-<?php echo $img_position; ?>" <?php echo $img_position == 'left' ? 'style="align-self:'.$img_align.';"' : ''; ?>>

                <div class="molongui-bump-media molongui-bump-image-<?php echo $img_color; ?>">
                    <div class="molongui-bump-image" <?php echo $img_position == 'above' ? 'style="justify-content:'.$img_align.';"' : ''; ?>>
                        <img class="mbo-img"       src="<?php echo $deal->_molongui_bump_image_url; ?>" <?php echo $img_size ? 'style="width:'.$img_size.'%;' : ''; ?>">
                        <img class="mbo-img-hover" src="<?php echo $deal->_molongui_bump_image_url; ?>" <?php echo $img_size ? 'style="width:'.$img_size.'%;' : ''; ?>">
                    </div>
                </div>

            </div><!-- .molongui-bump-content-above/left -->

        <?php endif; ?>

        <div class="molongui-bump-content mbo-content" style="<?php echo $deal_content_styles; ?>">

            <div class="molongui-bump-lead"
                 style="<?php echo !empty( $lead_bg_color )   ? 'background-color:'.$lead_bg_color.';' : ''; ?>
                        <?php echo !empty( $lead_text_color ) ? 'color:'.$lead_text_color.';'          : ''; ?>
                        <?php echo $box_no_bg ? 'background-color:transparent; padding:0;' : ''; ?>
                       "
            >
                <div class="molongui-bump-arrow molongui-<?php echo $lead_arrow_icon; ?> <?php echo $lead_arrow_blink ? 'molongui-bump-arrow-blink' : ''; ?>"></div>

                <div class="molongui-bump-checkbox">

                    <?php if ( isset( $_COOKIE['molongui_added_order_bump_'.$deal->ID] ) ) : ?>
                        <input type="checkbox" id="molongui-bump-checkbox_<?php echo $deal->ID; ?>" data-bump-id="<?php echo $deal->ID; ?>" data-cart-item-key="<?php echo $_COOKIE['molongui_added_order_bump_'.$deal->ID]; ?>" checked="checked">
                    <?php else : ?>
                        <input type="checkbox" id="molongui-bump-checkbox_<?php echo $deal->ID; ?>" data-bump-id="<?php echo $deal->ID; ?>" data-cart-item-key="">
                    <?php endif; ?>
                    <label for="molongui-bump-checkbox_<?php echo $deal->ID; ?>"><span class="molongui-bump-checkmark <?php echo $lead_cb_shadow ? ' molongui-no-shadow' : ''; ?>"></span></label>

                </div>

                <?php
                    $lead_text_style =   ( !empty( $lead_font_size       ) ? 'font-size:'.$lead_font_size.'px;'            : '' )
                                       . ( !empty( $lead_font_weight     ) ? ' font-weight:'.$lead_font_weight.';'         : '' )
                                       . ( !empty( $lead_text_decoration ) ? ' text-decoration:'.$lead_text_decoration.';' : '' )
                                       . ( !empty( $lead_text_transform  ) ? ' text-transform:'.$lead_text_transform.';'   : '' )
                                       . ( !empty( $lead_text_color      ) ? ' color:'.$lead_text_color.';'                : '' );
                ?>
                <div class="molongui-bump-lead-text" style="<?php echo $lead_text_style; ?> <?php echo isset( $_COOKIE['molongui_added_order_bump_'.$deal->ID] ) ? 'display:none;' : ''; ?>">
                    <?php echo ( isset( $deal->_molongui_bump_lead_text ) ? $deal->_molongui_bump_lead_text : $defaults['lead_text'] ); ?>
                </div>
                <div class="molongui-bump-lead-text-alt" style="<?php echo $lead_text_style; ?> <?php echo isset( $_COOKIE['molongui_added_order_bump_'.$deal->ID] ) ? '' : 'display:none;'; ?>">
                    <?php
                        if ( empty( $deal->_molongui_deal_lead_text_alt ) )
                        {
                            echo isset( $deal->_molongui_bump_lead_text ) ? $deal->_molongui_bump_lead_text : $defaults['lead_text'];
                        }
                        else
                        {
                            echo $deal->_molongui_deal_lead_text_alt;
                        }
                    ?>
                </div>
            </div>

            <div class="molongui-bump-intro"
                 style="<?php echo !empty( $intro_font_size       ) ? 'font-size:'.$intro_font_size.'px;'           : ''; ?>
                        <?php echo !empty( $intro_font_weight     ) ? 'font-weight:'.$intro_font_weight.';'         : ''; ?>
                        <?php echo !empty( $intro_text_decoration ) ? 'text-decoration:'.$intro_text_decoration.';'       : ''; ?>
                        <?php echo !empty( $intro_text_transfrom  ) ? 'text-transform:'.$intro_text_transfrom.';'        : ''; ?>
                        <?php echo !empty( $intro_text_color      ) ? 'color:'.$intro_text_color.';'                : ''; ?>
                        <?php echo !empty( $intro_text_align      ) ? 'text-align:'.$intro_text_align.';'           : ''; ?>
                        <?php echo !empty( $intro_padding_top     ) ? 'padding-top:'.$intro_padding_top.'px;'       : ''; ?>
                        <?php echo !empty( $intro_padding_bottom  ) ? 'padding-bottom:'.$intro_padding_bottom.'px;' : ''; ?>
                        <?php echo !empty( $intro_padding_left    ) ? 'padding-left:'.$intro_padding_left.'px;'     : ''; ?>
                        <?php echo !empty( $intro_padding_right   ) ? 'padding-right:'.$intro_padding_right.'px;'   : ''; ?>
                       "
            >
                <?php echo ( isset( $deal->_molongui_bump_intro_text ) ? $deal->_molongui_bump_intro_text : $defaults['intro_text'] ); ?>
            </div>

            <div class="molongui-bump-body"
                 style="<?php echo !empty( $body_padding_top    ) ? 'padding-top:'.$body_padding_top.'px;'       : ''; ?>
                        <?php echo !empty( $body_padding_bottom ) ? 'padding-bottom:'.$body_padding_bottom.'px;' : ''; ?>
                        <?php echo !empty( $body_padding_left   ) ? 'padding-left:'.$body_padding_left.'px;'     : ''; ?>
                        <?php echo !empty( $body_padding_right  ) ? 'padding-right:'.$body_padding_right.'px;'   : ''; ?>
                       "
            >
                <div class="molongui-bump-body-text"
                     style="<?php echo !empty( $body_font_size       ) ? 'font-size:'.$body_font_size.'px;'           : ''; ?>
                            <?php echo !empty( $body_font_weight     ) ? 'font-weight:'.$body_font_weight.';'         : ''; ?>
                            <?php echo !empty( $body_text_transform  ) ? 'text-transform:'.$body_text_transform.';'   : ''; ?>
                            <?php echo !empty( $body_text_decoration ) ? 'text-decoration:'.$body_text_decoration.';' : ''; ?>
                            <?php echo !empty( $body_text_align      ) ? 'text-align:'.$body_text_align.';'           : ''; ?>
                            <?php echo !empty( $body_text_color      ) ? 'color:'.$body_text_color.';'                : ''; ?>
                           "
                >
                    <?php echo str_replace( array("\n\r", "\r\n", "\n\n", "\r\r"), "<br>", wpautop( isset( $deal->_molongui_bump_body_text ) ? $deal->_molongui_bump_body_text : $defaults['body_text'] ) ); ?>
                </div>
            </div>

        </div><!-- .mbo-content -->

        <?php if ( !empty( $deal->_molongui_bump_media_type ) and $deal->_molongui_bump_media_type === 'image' and !empty( $img_size) and in_array( $img_position, array( 'below', 'right' ) ) ) : ?>

            <!-- Below/Right content -->
            <div class="molongui-bump-content-<?php echo $img_position; ?>" <?php echo $img_position == 'right' ? 'style="align-self:'.$img_align.';"' : ''; ?>>

                <div class="molongui-bump-media molongui-bump-image-<?php echo $img_color; ?>">
                    <div class="molongui-bump-image" <?php echo $img_position == 'below' ? 'style="justify-content:'.$img_align.';"' : ''; ?>>
                        <img class="mbo-img"       src="<?php echo $deal->_molongui_bump_image_url; ?>" <?php echo $img_size ? 'style="width:'.$img_size.'%;' : ''; ?>">
                        <img class="mbo-img-hover" src="<?php echo $deal->_molongui_bump_image_url; ?>" <?php echo $img_size ? 'style="width:'.$img_size.'%;' : ''; ?>">
                    </div>
                </div>

            </div><!-- .molongui-bump-content-below/right -->

        <?php endif; ?>

    </div><!-- .mbo-wrap -->

</div><!-- .mbo-deal -->