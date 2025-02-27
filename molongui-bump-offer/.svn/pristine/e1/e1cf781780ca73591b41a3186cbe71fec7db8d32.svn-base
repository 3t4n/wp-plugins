<?php
defined( 'ABSPATH' ) or exit;
function mbo_register_edit_bump_scripts()
{
    $file = apply_filters( 'mbo/edit_bump/script', MOLONGUI_BUMP_OFFER_FOLDER . '/assets/js/bump-admin.b923.min.js' );

    mbo_register_script( $file, 'edit_bump', array( 'jquery', 'jquery-ui-datepicker', 'wp-color-picker' ) );
}
add_action( 'admin_enqueue_scripts', 'mbo_register_edit_bump_scripts' );
function mbo_enqueue_edit_bump_scripts()
{
    $screen = get_current_screen();
    if ( !in_array( $screen->id, array( 'edit-'.MOLONGUI_BUMP_OFFER_CPT, MOLONGUI_BUMP_OFFER_CPT ) ) ) return;
    $file = apply_filters( 'mbo/edit_bump/script', MOLONGUI_BUMP_OFFER_FOLDER . '/assets/js/bump-admin.b923.min.js' );

    mbo_enqueue_script( $file, 'edit_bump', true );
}
add_action( 'admin_enqueue_scripts', 'mbo_enqueue_edit_bump_scripts' );
function mbo_edit_bump_script_params()
{
    global $post;
    if ( !isset( $post->ID ) ) return array();
    $post_id = $post->ID;

    $params = array
    (
        'is_premium'     => false,

        'base_currency'  => get_woocommerce_currency_symbol(),
        'image_position' => metadata_exists( 'post', $post_id, '_molongui_bump_image_position' )     ? get_post_meta( $post_id, '_molongui_bump_image_position' )     : '',
        'border_color_2' => metadata_exists( 'post', $post_id, '_molongui_bump_box_border_color_2' ) ? get_post_meta( $post_id, '_molongui_bump_box_border_color_2' ) : '',
        'border_color_3' => metadata_exists( 'post', $post_id, '_molongui_bump_box_border_color_3' ) ? get_post_meta( $post_id, '_molongui_bump_box_border_color_3' ) : '',
        'border_color_4' => metadata_exists( 'post', $post_id, '_molongui_bump_box_border_color_4' ) ? get_post_meta( $post_id, '_molongui_bump_box_border_color_4' ) : '',
    );
    return apply_filters( 'mbo/edit_bump/script_params', $params );
}
function mbo_edit_bump_pre_inline_script()
{
    mbo_enqueue_wc_admin_meta_boxes();
    wp_enqueue_script( 'wp-color-picker' );
}
add_action( 'mbo/edit_bump/pre_inline_script', 'mbo_edit_bump_pre_inline_script' );
function mbo_edit_bump_pre_enqueue_script()
{
    mbo_enqueue_wc_admin_meta_boxes();
}
add_action( 'mbo/edit_bump/pre_enqueue_script', 'mbo_edit_bump_pre_enqueue_script' );
function mbo_register_bump_scripts()
{
    $file = apply_filters( 'mbo/bump/script', MOLONGUI_BUMP_OFFER_FOLDER . '/assets/js/bump.b968.min.js' );

    mbo_register_script( $file, 'bump', array( 'jquery', 'wc-cart' ) );
}
add_action( 'wp_enqueue_scripts', 'mbo_register_bump_scripts' );
function mbo_enqueue_bump_scripts()
{
    $file = apply_filters( 'mbo/bump/script', MOLONGUI_BUMP_OFFER_FOLDER . '/assets/js/bump.b968.min.js' );

    mbo_enqueue_script( $file, 'bump', false );
}
function mbo_load_bump_scripts()
{
    if ( wp_script_is( 'jquery', 'enqueued' ) and wp_script_is( 'jquery', 'done' )
        and
        wp_script_is( 'wc-cart', 'enqueued' ) and wp_script_is( 'wc-cart', 'done' )
    )
    {
        mbo_enqueue_bump_scripts();
    }
}
add_action( 'wp_footer', 'mbo_load_bump_scripts', PHP_INT_MAX );
function mbo_bump_script_params()
{
    $options = mbo_get_options();

    $params = array
    (
        'ajax_url'    => \WC()->ajax_url(), //admin_url( 'admin-ajax.php' ),
        'wc_ajax_url' => \WC_AJAX::get_endpoint( "%%endpoint%%" ),

        'is_premium'       => false,

        'is_https'         => isset( $_SERVER['HTTPS'] ) ? $_SERVER['HTTPS'] !== 'off' : false,
        'qty_input_hide'   => $options['hide_qty_input'],
        'qty_input_class'  => empty( $options['hide_qty_input_class'] )        ? '.qty'       : ( '.' != $options['hide_qty_input_class'][0]        ? '.'.$options['hide_qty_input_class']        : $options['hide_qty_input_class'] ),
        'qty_parent_class' => empty( $options['hide_qty_input_parent_class'] ) ? '.quantity'  : ( '.' != $options['hide_qty_input_parent_class'][0] ? '.'.$options['hide_qty_input_parent_class'] : $options['hide_qty_input_parent_class'] ),
        'qty_prev_class'   => empty( $options['hide_qty_input_prev_class'] )   ? '.qty-minus' : ( '.' != $options['hide_qty_input_prev_class'][0]   ? '.'.$options['hide_qty_input_prev_class']   : $options['hide_qty_input_prev_class'] ),
        'qty_next_class'   => empty( $options['hide_qty_input_next_class'] )   ? '.qty-plus'  : ( '.' != $options['hide_qty_input_next_class'][0]   ? '.'.$options['hide_qty_input_next_class']   : $options['hide_qty_input_next_class'] ),
    );
    return apply_filters( 'mbo/bump/script_params', $params );
}
function mbo_bump_footer_script()
{
    $js = '';
    return $js;
}