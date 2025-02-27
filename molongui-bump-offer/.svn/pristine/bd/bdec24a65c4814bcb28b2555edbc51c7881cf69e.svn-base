<?php
defined( 'ABSPATH' ) or exit;
function mbo_customize_publish_bump_metabox()
{
    global $post;

    if( $post->post_type == MOLONGUI_BUMP_OFFER_CPT )
    {
        echo '<style type="text/css">#misc-publishing-actions #visibility, #misc-publishing-actions .misc-pub-curtime { display:none; }</style>';
    }
}
add_action( 'admin_head-post-new.php', 'mbo_customize_publish_bump_metabox' );
add_action( 'admin_head-post.php'    , 'mbo_customize_publish_bump_metabox' );
function mbo_add_meta_boxes( $post_type, $post )
{
    if ( !current_user_can( 'manage_woocommerce' ) ) return;
    if ( in_array( $post_type, array( MOLONGUI_BUMP_OFFER_CPT ) ) )
    {
        $data = mbo_get_bump( $post->ID );
        add_meta_box
        (
            'm-deal-div'
            ,__( "Deal Settings", 'molongui-bump-offer' )
            ,'mbo_render_bump_product_metabox'
            ,$post_type
            ,'normal'
            ,'high'
            ,array( 'bump' => $data )
        );
        add_meta_box
        (
            'm-styling-div'
            ,__( "Styling Settings", 'molongui-bump-offer' )
            ,'mbo_render_bump_styling_metabox'
            ,$post_type
            ,'normal'
            ,'high'
            ,array( 'bump' => $data )
        );
        add_meta_box
        (
            'bump-shortcode-div'
            ,__( "Shortcode", 'molongui-bump-offer' )
            ,'mbo_render_bump_shortcode_metabox'
            ,$post_type
            ,'side'
            ,'core'
            ,array( 'bump' => $data )
        );
        add_meta_box
        (
            'bump-preview-div'
            ,__( "Preview", 'molongui-bump-offer' )
            ,'mbo_render_bump_preview_metabox'
            ,$post_type
            ,'side'
            ,'core'
            ,array( 'bump' => $data )
        );
        remove_meta_box( 'slugdiv', MOLONGUI_BUMP_OFFER_CPT, 'normal' );
    }
}
add_action( 'add_meta_boxes', 'mbo_add_meta_boxes', 10, 2 );
function mbo_render_bump_product_metabox( $post, $callback_args )
{
    wp_nonce_field( 'molongui_order_bump', 'molongui_order_bump_nonce' );
    $bump = $callback_args['args']['bump'];
    $options  = mbo_get_options();
    $defaults = mbo_get_defaults();
    $defaults = $defaults['default'];
    include_once( MOLONGUI_BUMP_OFFER_DIR . 'views/bump/html-admin-settings-metabox.php' );
}
function mbo_render_bump_styling_metabox( $post, $callback_args )
{
    wp_nonce_field( 'molongui_order_bump', 'molongui_order_bump_nonce' );
    $bump = $callback_args['args']['bump'];
    $options  = mbo_get_options();
    $defaults = mbo_get_defaults();
    $defaults = $defaults['default'];
    include_once( MOLONGUI_BUMP_OFFER_DIR . 'views/bump/html-admin-styling-metabox.php' );
}
function mbo_render_bump_shortcode_metabox( $post, $callback_args )
{
    $deal = $callback_args['args']['bump'];
    include_once( MOLONGUI_BUMP_OFFER_DIR . 'views/bump/html-admin-shortcode-metabox.php' );
}
function mbo_add_shortcode_metabox_class( $classes )
{
    if ( apply_filters( 'mbo/bump/shortcode/metabox', '__return_true' ) ) array_push( $classes, 'free' );
    return $classes;
}
add_filter( 'postbox_classes_'.MOLONGUI_BUMP_OFFER_CPT.'_bump-shortcode-div', 'mbo_add_shortcode_metabox_class' );
function mbo_render_bump_preview_metabox( $post, $callback_args )
{
    wp_nonce_field( 'molongui_order_bump', 'molongui_order_bump_nonce' );
    $bump = $callback_args['args']['bump'];
    include_once( MOLONGUI_BUMP_OFFER_DIR . 'views/bump/html-admin-preview-metabox.php' );
}
function mbo_save_deal( $post_id )
{
    if ( !isset( $_POST['molongui_order_bump_nonce'] ) or !wp_verify_nonce( $_POST['molongui_order_bump_nonce'], 'molongui_order_bump' ) ) return $post_id;
    if ( defined( 'DOING_AUTOSAVE' ) and DOING_AUTOSAVE ) return $post_id;
    if ( wp_is_post_revision( $post_id ) ) return $post_id;
    if ( !current_user_can( 'edit_post', $post_id ) ) return $post_id;
    if ( isset( $_POST['_molongui_bump_product'] ) ) update_post_meta( $post_id, '_molongui_bump_product', sanitize_text_field( $_POST['_molongui_bump_product'] ) );
    if ( isset( $_POST['_molongui_deal_price_criteria'] ) ) update_post_meta( $post_id, '_molongui_deal_price_criteria', sanitize_text_field( $_POST['_molongui_deal_price_criteria'] ) );
    if ( isset( $_POST['_molongui_deal_price_criteria'] ) and 'discount' === $_POST['_molongui_deal_price_criteria'] ) $check_discount = true;
    if ( isset( $_POST['_molongui_bump_price'] ) )
    {
        $price = wc_format_decimal( $_POST['_molongui_bump_price'] );
        if ( isset( $check_discount ) and $check_discount )
        {
            if ( $price > 100 ) $price = wc_format_decimal( 100 );
            elseif ( $price < 0 ) $price = wc_format_decimal( 0 );
        }
        update_post_meta( $post_id, '_molongui_bump_price', $price );
    }
    if ( isset( $_POST['_molongui_bump_lead_text'] ) ) update_post_meta( $post_id, '_molongui_bump_lead_text', sanitize_text_field( $_POST['_molongui_bump_lead_text'] ) );
    if ( isset( $_POST['_molongui_deal_lead_text_alt'] ) ) update_post_meta( $post_id, '_molongui_deal_lead_text_alt', sanitize_text_field( $_POST['_molongui_deal_lead_text_alt'] ) );
    if ( isset( $_POST['_molongui_bump_intro_text'] ) ) update_post_meta( $post_id, '_molongui_bump_intro_text', sanitize_text_field( $_POST['_molongui_bump_intro_text'] ) );
    if ( isset( $_POST['_molongui_bump_body_text'] ) ) update_post_meta( $post_id, '_molongui_bump_body_text', sanitize_text_field( $_POST['_molongui_bump_body_text'] ) );
    if ( isset( $_POST['_molongui_bump_media_type'] ) and in_array( $_POST['_molongui_bump_media_type'], array( 'none', 'image' ) ) )
    {
        update_post_meta( $post_id, '_molongui_bump_media_type', wc_clean( $_POST['_molongui_bump_media_type'] ) );
    }
    else
    {
        update_post_meta( $post_id, '_molongui_bump_media_type', 'none' );
    }
    if ( current_user_can( 'upload_files', $post_id ) )
    {
        if ( isset( $_POST['_molongui_bump_image_id']       ) ) update_post_meta( $post_id, '_molongui_bump_image_id',       $_POST['_molongui_bump_image_id']       );
        if ( isset( $_POST['_molongui_bump_image_url']      ) ) update_post_meta( $post_id, '_molongui_bump_image_url',      $_POST['_molongui_bump_image_url']      );
        if ( isset( $_POST['_molongui_bump_image_edit_url'] ) ) update_post_meta( $post_id, '_molongui_bump_image_edit_url', $_POST['_molongui_bump_image_edit_url'] );
    }
    if ( isset( $_POST['_molongui_bump_box_border_style'] ) ) update_post_meta( $post_id, '_molongui_bump_box_border_style', wc_clean( $_POST['_molongui_bump_box_border_style'] ) );
    if ( isset( $_POST['_molongui_bump_box_border_width'] ) ) update_post_meta( $post_id, '_molongui_bump_box_border_width', wc_clean( $_POST['_molongui_bump_box_border_width'] ) );
    if ( isset( $_POST['_molongui_bump_box_border_color'] ) ) update_post_meta( $post_id, '_molongui_bump_box_border_color', wc_clean( $_POST['_molongui_bump_box_border_color'] ) );
    if ( isset( $_POST['_molongui_bump_box_border_radius'] ) ) update_post_meta( $post_id, '_molongui_bump_box_border_radius', wc_clean( $_POST['_molongui_bump_box_border_radius'] ) );
    if ( isset( $_POST['_molongui_bump_box_bg_color'] ) ) update_post_meta( $post_id, '_molongui_bump_box_bg_color', wc_clean( $_POST['_molongui_bump_box_bg_color'] ) );
    update_post_meta( $post_id, '_molongui_bump_box_bg_transparent', isset( $_POST['_molongui_bump_box_bg_transparent'] ) );
    if ( isset( $_POST['_molongui_bump_box_align'] ) ) update_post_meta( $post_id, '_molongui_bump_box_align', wc_clean( $_POST['_molongui_bump_box_align'] ) );
    if ( isset( $_POST['_molongui_bump_box_width'] ) ) update_post_meta( $post_id, '_molongui_bump_box_width', wc_clean( $_POST['_molongui_bump_box_width'] ) );
    if ( isset( $_POST['_molongui_bump_box_vertical_margin'] ) ) update_post_meta( $post_id, '_molongui_bump_box_vertical_margin', wc_clean( $_POST['_molongui_bump_box_vertical_margin'] ) );
    if ( isset( $_POST['_molongui_bump_box_horizontal_margin'] ) ) update_post_meta( $post_id, '_molongui_bump_box_horizontal_margin', wc_clean( $_POST['_molongui_bump_box_horizontal_margin'] ) );
    if ( isset( $_POST['_molongui_bump_box_inner_padding'] ) ) update_post_meta( $post_id, '_molongui_bump_box_inner_padding', wc_clean( $_POST['_molongui_bump_box_inner_padding'] ) );
    if ( isset( $_POST['_molongui_bump_lead_bg_color'] ) ) update_post_meta( $post_id, '_molongui_bump_lead_bg_color', wc_clean( $_POST['_molongui_bump_lead_bg_color'] ) );
    update_post_meta( $post_id, '_molongui_bump_lead_bg_transparent', isset( $_POST['_molongui_bump_lead_bg_transparent'] ) );
    if ( isset( $_POST['_molongui_bump_lead_arrow_icon'] ) ) update_post_meta( $post_id, '_molongui_bump_lead_arrow_icon', wc_clean( $_POST['_molongui_bump_lead_arrow_icon'] ) );
    update_post_meta( $post_id, '_molongui_bump_lead_arrow_blink', isset( $_POST['_molongui_bump_lead_arrow_blink'] ) );
    update_post_meta( $post_id, '_molongui_bump_cb_shadow', isset( $_POST['_molongui_bump_cb_shadow'] ) );
    if ( isset( $_POST['_molongui_bump_lead_font_size'] ) ) update_post_meta( $post_id, '_molongui_bump_lead_font_size', wc_clean( $_POST['_molongui_bump_lead_font_size'] ) );
    if ( isset( $_POST['_molongui_bump_lead_font_weight'] ) ) update_post_meta( $post_id, '_molongui_bump_lead_font_weight', wc_clean( $_POST['_molongui_bump_lead_font_weight'] ) );
    if ( isset( $_POST['_molongui_bump_lead_text_decoration'] ) ) update_post_meta( $post_id, '_molongui_bump_lead_text_decoration', wc_clean( $_POST['_molongui_bump_lead_text_decoration'] ) );
    if ( isset( $_POST['_molongui_bump_lead_text_transform'] ) ) update_post_meta( $post_id, '_molongui_bump_lead_text_transform', wc_clean( $_POST['_molongui_bump_lead_text_transform'] ) );
    if ( isset( $_POST['_molongui_bump_lead_text_color'] ) ) update_post_meta( $post_id, '_molongui_bump_lead_text_color', wc_clean( $_POST['_molongui_bump_lead_text_color'] ) );
    if ( isset( $_POST['_molongui_bump_intro_font_size'] ) ) update_post_meta( $post_id, '_molongui_bump_intro_font_size', wc_clean( $_POST['_molongui_bump_intro_font_size'] ) );
    if ( isset( $_POST['_molongui_bump_intro_font_weight'] ) ) update_post_meta( $post_id, '_molongui_bump_intro_font_weight', wc_clean( $_POST['_molongui_bump_intro_font_weight'] ) );
    if ( isset( $_POST['_molongui_bump_intro_text_decoration'] ) ) update_post_meta( $post_id, '_molongui_bump_intro_text_decoration', wc_clean( $_POST['_molongui_bump_intro_text_decoration'] ) );
    if ( isset( $_POST['_molongui_bump_intro_text_transform'] ) ) update_post_meta( $post_id, '_molongui_bump_intro_text_transform', wc_clean( $_POST['_molongui_bump_intro_text_transform'] ) );
    if ( isset( $_POST['_molongui_bump_intro_text_align'] ) ) update_post_meta( $post_id, '_molongui_bump_intro_text_align', wc_clean( $_POST['_molongui_bump_intro_text_align'] ) );
    if ( isset( $_POST['_molongui_bump_intro_text_color'] ) ) update_post_meta( $post_id, '_molongui_bump_intro_text_color', wc_clean( $_POST['_molongui_bump_intro_text_color'] ) );
    if ( isset( $_POST['_molongui_bump_intro_padding_top'] ) ) update_post_meta( $post_id, '_molongui_bump_intro_padding_top', wc_clean( $_POST['_molongui_bump_intro_padding_top'] ) );
    if ( isset( $_POST['_molongui_bump_intro_padding_bottom'] ) ) update_post_meta( $post_id, '_molongui_bump_intro_padding_bottom', wc_clean( $_POST['_molongui_bump_intro_padding_bottom'] ) );
    if ( isset( $_POST['_molongui_bump_intro_padding_left'] ) ) update_post_meta( $post_id, '_molongui_bump_intro_padding_left', wc_clean( $_POST['_molongui_bump_intro_padding_left'] ) );
    if ( isset( $_POST['_molongui_bump_intro_padding_right'] ) ) update_post_meta( $post_id, '_molongui_bump_intro_padding_right', wc_clean( $_POST['_molongui_bump_intro_padding_right'] ) );
    if ( isset( $_POST['_molongui_bump_body_font_size'] ) ) update_post_meta( $post_id, '_molongui_bump_body_font_size', wc_clean( $_POST['_molongui_bump_body_font_size'] ) );
    if ( isset( $_POST['_molongui_bump_body_font_weight'] ) ) update_post_meta( $post_id, '_molongui_bump_body_font_weight', wc_clean( $_POST['_molongui_bump_body_font_weight'] ) );
    if ( isset( $_POST['_molongui_bump_body_text_decoration'] ) ) update_post_meta( $post_id, '_molongui_bump_body_text_decoration', wc_clean( $_POST['_molongui_bump_body_text_decoration'] ) );
    if ( isset( $_POST['_molongui_bump_body_text_transform'] ) ) update_post_meta( $post_id, '_molongui_bump_body_text_transform', wc_clean( $_POST['_molongui_bump_body_text_transform'] ) );
    if ( isset( $_POST['_molongui_bump_body_text_align'] ) ) update_post_meta( $post_id, '_molongui_bump_body_text_align', wc_clean( $_POST['_molongui_bump_body_text_align'] ) );
    if ( isset( $_POST['_molongui_bump_body_text_color'] ) ) update_post_meta( $post_id, '_molongui_bump_body_text_color', wc_clean( $_POST['_molongui_bump_body_text_color'] ) );
    if ( isset( $_POST['_molongui_bump_body_padding_top'] ) ) update_post_meta( $post_id, '_molongui_bump_body_padding_top', wc_clean( $_POST['_molongui_bump_body_padding_top'] ) );
    if ( isset( $_POST['_molongui_bump_body_padding_bottom'] ) ) update_post_meta( $post_id, '_molongui_bump_body_padding_bottom', wc_clean( $_POST['_molongui_bump_body_padding_bottom'] ) );
    if ( isset( $_POST['_molongui_bump_body_padding_left'] ) ) update_post_meta( $post_id, '_molongui_bump_body_padding_left', wc_clean( $_POST['_molongui_bump_body_padding_left'] ) );
    if ( isset( $_POST['_molongui_bump_body_padding_right'] ) ) update_post_meta( $post_id, '_molongui_bump_body_padding_right', wc_clean( $_POST['_molongui_bump_body_padding_right'] ) );
    if ( isset( $_POST['_molongui_bump_image_position'] ) ) update_post_meta( $post_id, '_molongui_bump_image_position', wc_clean( $_POST['_molongui_bump_image_position'] ) );
    if ( isset( $_POST['_molongui_bump_image_size'] ) ) update_post_meta( $post_id, '_molongui_bump_image_size', wc_clean( $_POST['_molongui_bump_image_size'] ) );
    if ( isset( $_POST['_molongui_bump_image_align'] ) ) update_post_meta( $post_id, '_molongui_bump_image_align', wc_clean( $_POST['_molongui_bump_image_align'] ) );
    if ( isset( $_POST['_molongui_bump_image_color'] ) ) update_post_meta( $post_id, '_molongui_bump_image_color', wc_clean( $_POST['_molongui_bump_image_color'] ) );
    update_post_meta( $post_id, '_molongui_bump_image_responsive', isset( $_POST['_molongui_bump_image_responsive'] ) );
    foreach ( mbo_get_no_options() as $key => $value )
    {
        if ( empty( $value ) ) delete_post_meta( $post_id, $key );
        else update_post_meta( $post_id, $key, $value );
    }
    do_action( 'mbo/deal/save', $post_id, $_POST );

    return $post_id;
}
add_action( 'save_post_'.MOLONGUI_BUMP_OFFER_CPT, 'mbo_save_deal' );