<?php
$pro_cart_width = get_theme_mod( 'cart_width_setting', '380px' );
$cartpos = get_theme_mod( 'on_cart_position','bottom-right' );
$global_color = get_theme_mod( 'global_color', '#000' );
$mini_cart_box_bg_color = get_theme_mod( 'mini_cart_box_bg_color', '#fff' );


$global_typography = get_theme_mod( 'global_typography', [] );


$coupon_height = get_theme_mod( 'coupon_height', '40px' );
$coupon_width = get_theme_mod( 'coupon_width', '70%' );
$coupon_border = get_theme_mod( 'coupon_border', '1px' );
$coupon_border_style = get_theme_mod( 'coupon_border_style', 'solid' );
$coupon_border_color = get_theme_mod( 'coupon_border_color', '#eaeaea' );
$coupon_border_radius = get_theme_mod( 'coupon_border_radius', '0px' );
// apply button
$apply_button_width = get_theme_mod( 'apply_width', '90px' );
$apply_button_height = get_theme_mod( 'apply_height', '40px' );
$applay_bg_color = get_theme_mod( 'applay_background_color', '#000000' );
$apply_txt_color = get_theme_mod( 'apply_text_color', '#ffffff' );
$apply_border = get_theme_mod( 'apply_border', '0px' );
$apply_bdr_style = get_theme_mod( 'apply_border_style', 'none' );
$apply_border_color = get_theme_mod( 'apply_border_color', '#ffffff' );
$apply_border_radius = get_theme_mod( 'apply_border_radius', '5px' );
$apply_text_color_hover = get_theme_mod( 'apply_text_color_hover', '#ffffff' );
$apply_hover_bg_color = get_theme_mod( 'apply_hover_bg_color', '#000000' );
$apply_hover_btn_border = get_theme_mod( 'apply_hover_btn_border', '0px' );
$apply_hover_border_style = get_theme_mod( 'apply_hover_border_style', 'none' );
$apply_hover_border_color = get_theme_mod( 'apply_hover_border_color', '#000000' );
$hover_apply_border_radius = get_theme_mod( 'hover_apply_border_radius', '5px' );

//checkout
$checkout_bg_color = get_theme_mod( 'checkout_bg_color', '#000000' );
$color_checkout = get_theme_mod( 'color_checkout', '#ffffff' );
$checkout_height = get_theme_mod( 'checkout_height', '55px' );
$checkout_margin = get_theme_mod( 'checkout_margin' ) != ' ' ? get_theme_mod( 'checkout_margin' ) : '' ;
$checkoutpadding = is_array($checkout_margin ) ?  implode(' ', $checkout_margin) : '';
$chck_btn_border = get_theme_mod( 'chck_btn_border', '0px' );
$check_border_style = get_theme_mod( 'check_border_style', 'none' );
$check_border_color = get_theme_mod( 'check_border_color', '#ffffff' );
$checkout_border_radius = get_theme_mod( 'checkout_border_radius', '5px' );
$checkout_hover_bg_color = get_theme_mod( 'checkout_hover_bg_color', '#000000' );
$checkout_hover_color = get_theme_mod( 'checkout_hover_color', '#ffffff !important' );
$hover_check_border = get_theme_mod( 'hover_check_border', '0px' );
$check_hover_border_style = get_theme_mod( 'check_hover_border_style', 'none' );
$check_hover_border_color = get_theme_mod( 'check_hover_border_color', '#ffffff' );
$checkout_hover_border_radius = get_theme_mod( 'checkout_hover_border_radius', '0px' );

//continue
$continue_bg_color = get_theme_mod( 'continue_bg_color', '#ffffff' );
$continue_color = get_theme_mod( 'continue_color', '#000000' );
$continue_height = get_theme_mod( 'continue_height', '55px' );
$continue_btn_border = get_theme_mod( 'continue_btn_border', '1px' );
$continue_border_style = get_theme_mod( 'continue_border_style', 'solid' );
$continue_border_color = get_theme_mod( 'continue_border_color', '#000000' );
$continue_margin = get_theme_mod( 'continue_margin' ) != ' ' ? get_theme_mod( 'continue_margin' ) : '' ;
$continuepadding = is_array($continue_margin ) ?  implode(' ', $continue_margin) : '';
$continue_border_radius = get_theme_mod( 'continue_border_radius', '5px' );

// hover
$continue_hover_bg_color = get_theme_mod( 'continue_hover_bg_color', '#000000' );
$continue_hover_color = get_theme_mod( 'continue_hover_color', '#ffffff' );
$contine_hover_btn_border = get_theme_mod( 'contine_hover_btn_border', '1px' );
$continue_hover_border_style = get_theme_mod( 'continue_hover_border_style', 'solid' );
$continue_hover_border_color = get_theme_mod( 'continue_hover_border_color', '#000000' );
$continue_hover_border_radius = get_theme_mod( 'continue_hover_border_radius', '0px' );

if($global_color){
    $fmc_dynamic_css .= '#finest-area, #finest-total, .product-total-left .product-quenty, .product-total-right #product-show-total, .finest-subtotal-left .product-subtotal, .finest-subtotal-right .subtotal-count, .finest-tax-left .product-tax-left, .finest-tax-right .tax-count, .finest-shipping-left .product-shipping, .finest-total-right .product-shipping-count, .finest-total-left span.finest-total-text, .finest-shipping-right, .finest-action-right, .finest-area-bot .finest-continue span, .finest-area-middle.finest-items .finest-item-title a, .finest-cart-ttile h1, .finest-area-middle.finest-items .finest-item-qty-plus, .finest-area-middle.finest-items .finest-item-qty-minus, .finest-total-right span.total-price, input#finiest_coupon_code:focus, .finest-area-middle.finest-items .finest-item-qty .finest-item-qty-inner input {color: ' . esc_attr( $global_color ) . ' } ';
    $fmc_dynamic_css .= "\n";
}

if($mini_cart_box_bg_color) {
    $fmc_dynamic_css .= '#finest-area {background-color: ' . esc_attr( $mini_cart_box_bg_color ) . ' } ';
    $fmc_dynamic_css .= "\n";
}


if( isset($global_typography['font-family'] ) ) {
      $fmc_dynamic_css .= '#finest-area, #finest-total, .product-total-left .product-quenty, .product-total-right #product-show-total, .finest-subtotal-left .product-subtotal, .finest-subtotal-right .subtotal-count, .finest-tax-left .product-tax-left, .finest-tax-right .tax-count, .finest-shipping-left .product-shipping, .finest-total-right .product-shipping-count, .finest-total-left span.finest-total-text, .finest-shipping-right, .finest-action-right, .finest-area-bot .finest-continue span, .finest-area-middle.finest-items .finest-item-title a, .finest-cart-ttile h1, .finest-area-middle.finest-items .finest-item-qty-plus, .finest-area-middle.finest-items .finest-item-qty-minus, .finest-total-right span.total-price, input#finiest_coupon_code:focus, .finest-area-middle.finest-items .finest-item-qty .finest-item-qty-inner input {
      font-family: ' . esc_attr( $global_typography['font-family'] ) .';


     } ';
      $fmc_dynamic_css .= "\n";
}



if ( 'bottom-right' == $cartpos || 'top-right' == $cartpos || 'center-right' == $cartpos ) {
    if($pro_cart_width){
        $fmc_dynamic_css .= '.finest-area {  max-width: ' . esc_attr( $pro_cart_width ) . 'px } ';
        $fmc_dynamic_css .= "\n";
        $fmc_dynamic_css .= '.finest-area.finest-effect {transform: translate3d( '.esc_attr( $pro_cart_width ).'px, 0, 0) } ';
        $fmc_dynamic_css .= "\n";
        $fmc_dynamic_css .= '.finest-area.finest-effect {-webkit-transform: translate3d( '.esc_attr( $pro_cart_width ).'px, 0, 0) } ';
        $fmc_dynamic_css .= "\n";
    }
} else {
    if($pro_cart_width){
        $fmc_dynamic_css .= '.finest-area {  max-width: ' . esc_attr( $pro_cart_width ) . 'px } ';
        $fmc_dynamic_css .= "\n";
        $fmc_dynamic_css .= '.finest-area.finest-effect {transform: translate3d( -'.esc_attr( $pro_cart_width ).'px, 0, 0) } ';
        $fmc_dynamic_css .= "\n";
        $fmc_dynamic_css .= '.finest-area.finest-effect {-webkit-transform: translate3d( -'.esc_attr( $pro_cart_width ).'px, 0, 0) } ';
        $fmc_dynamic_css .= "\n";
    }
}

//coupon box

if($coupon_height || $coupon_width){
    $fmc_dynamic_css .= '#finiest_coupon_code {height: ' . esc_attr( $coupon_height ) . 'px } ';
    $fmc_dynamic_css .= "\n";
    $fmc_dynamic_css .= '#finiest_coupon_code {width: ' . esc_attr( $coupon_width ) . '%} ';
    $fmc_dynamic_css .= "\n";
}
if( $coupon_border || $coupon_border_style || $coupon_border_color ){
    $fmc_dynamic_css .= '#finiest_coupon_code {border: ' . esc_attr( $coupon_border ) . ' } ';
    $fmc_dynamic_css .= "\n";
    $fmc_dynamic_css .= '#finiest_coupon_code {border-style: ' . esc_attr( $coupon_border_style ) . ' } ';
    $fmc_dynamic_css .= "\n";
    $fmc_dynamic_css .= '#finiest_coupon_code {border-color: ' . esc_attr( $coupon_border_color ) . ' } ';
    $fmc_dynamic_css .= "\n";
}
if( $coupon_border_radius ){
    $fmc_dynamic_css .= '#finiest_coupon_code {border-radius: ' . esc_attr( $coupon_border_radius ) . 'px } ';
    $fmc_dynamic_css .= "\n";
}

// apply button

if( $apply_button_width || $apply_button_height ){
    $fmc_dynamic_css .= '.finiest_coupon_submit {width: ' . esc_attr( $apply_button_width ) . 'px } ';
    $fmc_dynamic_css .= "\n";
    $fmc_dynamic_css .= '.finiest_coupon_submit {height: ' . esc_attr( $apply_button_height ) . 'px } ';
    $fmc_dynamic_css .= "\n";
    $fmc_dynamic_css .= '.finiest_coupon_submit {line-height: ' . esc_attr( $apply_button_height ) . 'px } ';
    $fmc_dynamic_css .= "\n";
}
if( $applay_bg_color ){
    $fmc_dynamic_css .= '.finiest_coupon_submit {background-color: ' . esc_attr( $applay_bg_color ) . ' } ';
    $fmc_dynamic_css .= "\n";
}
if( $apply_txt_color ){
    $fmc_dynamic_css .= '.finiest_coupon_submit {color: ' . esc_attr( $apply_txt_color ) . ' } ';
    $fmc_dynamic_css .= "\n";
}
if( $apply_border || $apply_bdr_style || $apply_border_color ){
    $fmc_dynamic_css .= '.finiest_coupon_submit {border: ' . esc_attr( $apply_border ) . ' } ';
    $fmc_dynamic_css .= "\n";
    $fmc_dynamic_css .= '.finiest_coupon_submit {border-style: ' . esc_attr( $apply_bdr_style ) . ' } ';
    $fmc_dynamic_css .= "\n";
    $fmc_dynamic_css .= '.finiest_coupon_submit {border-color: ' . esc_attr( $apply_border_color ) . ' } ';
    $fmc_dynamic_css .= "\n";
}
if( $apply_border_radius ){
    $fmc_dynamic_css .= '.finiest_coupon_submit {border-radius: ' . esc_attr( $apply_border_radius ) . ' } ';
    $fmc_dynamic_css .= "\n";
}
// apply hover button

if( $apply_text_color_hover ){
    $fmc_dynamic_css .= '.finiest_coupon_submit:hover {color: ' . esc_attr( $apply_text_color_hover ) . ' } ';
    $fmc_dynamic_css .= "\n";
}
if( $apply_hover_bg_color ){
    $fmc_dynamic_css .= '.finiest_coupon_submit:hover {background-color: ' . esc_attr( $apply_hover_bg_color ) . ' } ';
    $fmc_dynamic_css .= "\n";
}
if( $apply_hover_btn_border || $apply_hover_border_style || $apply_hover_border_color ){
    $fmc_dynamic_css .= '.finiest_coupon_submit:hover {border: ' . esc_attr( $apply_border ) . ' } ';
    $fmc_dynamic_css .= "\n";
    $fmc_dynamic_css .= '.finiest_coupon_submit:hover {border-style: ' . esc_attr( $apply_bdr_style ) . ' } ';
    $fmc_dynamic_css .= "\n";
    $fmc_dynamic_css .= '.finiest_coupon_submit:hover {border-color: ' . esc_attr( $apply_hover_border_color ) . ' } ';
    $fmc_dynamic_css .= "\n";
}
if( $hover_apply_border_radius ){
    $fmc_dynamic_css .= '.finiest_coupon_submit:hover {border-radius: ' . esc_attr( $hover_apply_border_radius ) . ' } ';
    $fmc_dynamic_css .= "\n";
}

// checkout
if( $checkout_bg_color ){
    $fmc_dynamic_css .= '.finest-action-right a {background-color: ' . esc_attr( $checkout_bg_color ) . ' } ';
    $fmc_dynamic_css .= "\n";
}
if( $color_checkout ){
    $fmc_dynamic_css .= '.finest-action-right a {color: ' . esc_attr( $color_checkout ) . ' } ';
    $fmc_dynamic_css .= "\n";
}
if( $checkout_height ){
    $fmc_dynamic_css .= '.finest-action-right a {height: ' . esc_attr( $checkout_height ) . 'px } ';
    $fmc_dynamic_css .= "\n";
}
if( $checkoutpadding ){
    $fmc_dynamic_css .= '.finest-action-right {margin: ' . esc_attr( $checkoutpadding ) . ' } ';
    $fmc_dynamic_css .= "\n";
}
if( $chck_btn_border || $check_border_style || $check_border_color ){
    $fmc_dynamic_css .= '.finest-action-right a {border: ' . esc_attr( $chck_btn_border ) . ' } ';
    $fmc_dynamic_css .= "\n";
    $fmc_dynamic_css .= '.finest-action-right a {border-style: ' . esc_attr( $check_border_style ) . ' } ';
    $fmc_dynamic_css .= "\n";
    $fmc_dynamic_css .= '.finest-action-right a {border-color: ' . esc_attr( $check_border_color ) . ' } ';
    $fmc_dynamic_css .= "\n";
}
if( $checkout_border_radius ){
    $fmc_dynamic_css .= '.finest-action-right a {border-radius: ' . esc_attr( $checkout_border_radius ) . 'px } ';
    $fmc_dynamic_css .= "\n";
}
// hover
if( $checkout_hover_bg_color ){
    $fmc_dynamic_css .= '.finest-action-right a:hover {background-color: ' . esc_attr( $checkout_hover_bg_color ) . ' } ';
    $fmc_dynamic_css .= "\n";
}
if( $checkout_hover_color ){
    $fmc_dynamic_css .= '.finest-action-right a:hover {color: ' . esc_attr( $checkout_hover_color ) . ' } ';
    $fmc_dynamic_css .= "\n";
}
if( $hover_check_border || $check_hover_border_style ||$check_hover_border_color ){
    $fmc_dynamic_css .= '.finest-action-right a:hover {border: ' . esc_attr( $hover_check_border ) . ' } ';
    $fmc_dynamic_css .= "\n";
    $fmc_dynamic_css .= '.finest-action-right a:hover {border-style: ' . esc_attr( $check_hover_border_style ) . ' } ';
    $fmc_dynamic_css .= "\n";
    $fmc_dynamic_css .= '.finest-action-right a:hover {border-color: ' . esc_attr($check_hover_border_color ) . ' } ';
    $fmc_dynamic_css .= "\n";
}
if( $checkout_hover_border_radius ){
    $fmc_dynamic_css .= '.finest-action-right a:hover {border-radius: ' . esc_attr( $checkout_hover_border_radius ) . 'px } ';
    $fmc_dynamic_css .= "\n";
}

// continue
if( $continue_bg_color ){
    $fmc_dynamic_css .= '.finest-area-bot .finest-continue span {background-color: ' . esc_attr( $continue_bg_color ) . ' } ';
    $fmc_dynamic_css .= "\n";
}
if( $continue_color ){
    $fmc_dynamic_css .= '.finest-area-bot .finest-continue span {color: ' . esc_attr( $continue_color ) . ' } ';
    $fmc_dynamic_css .= "\n";
}
if( $continue_height ){
    $fmc_dynamic_css .= '.finest-area-bot .finest-continue span {height: ' . esc_attr( $continue_height ) . 'px } ';
    $fmc_dynamic_css .= "\n";
}
if( $continuepadding ){
    $fmc_dynamic_css .= '.finest-area-bot .finest-continue span {margin: ' . esc_attr( $continuepadding ) . ' } ';
    $fmc_dynamic_css .= "\n";
}
if( $continue_btn_border || $continue_border_style || $continue_border_color ){
    $fmc_dynamic_css .= '.finest-area-bot .finest-continue span {border: ' . esc_attr( $continue_btn_border ) . ' } ';
    $fmc_dynamic_css .= "\n";
    $fmc_dynamic_css .= '.finest-area-bot .finest-continue span {border-style: ' . esc_attr( $continue_border_style ) . ' } ';
    $fmc_dynamic_css .= "\n";
    $fmc_dynamic_css .= '.finest-area-bot .finest-continue span {border-color: ' . esc_attr( $continue_border_color ) . ' } ';
    $fmc_dynamic_css .= "\n";
}
if( $continue_border_radius ){
    $fmc_dynamic_css .= '.finest-area-bot .finest-continue span {border-radius: ' . esc_attr( $continue_border_radius ) . 'px } ';
    $fmc_dynamic_css .= "\n";
}
// hover
if( $continue_hover_bg_color ){
    $fmc_dynamic_css .= '.finest-area-bot .finest-continue span:hover {background-color: ' . esc_attr( $continue_hover_bg_color ) . ' } ';
    $fmc_dynamic_css .= "\n";
}
if( $continue_hover_color ){
    $fmc_dynamic_css .= '.finest-area-bot .finest-continue span:hover {color: ' . esc_attr( $continue_hover_color ) . ' } ';
    $fmc_dynamic_css .= "\n";
}
if( $contine_hover_btn_border || $continue_hover_border_style ||$continue_hover_border_color ){
    $fmc_dynamic_css .= '.finest-area-bot .finest-continue span:hover {border: ' . esc_attr( $contine_hover_btn_border ) . ' } ';
    $fmc_dynamic_css .= "\n";
    $fmc_dynamic_css .= '.finest-area-bot .finest-continue span:hover {border-style: ' . esc_attr( $continue_hover_border_style ) . ' } ';
    $fmc_dynamic_css .= "\n";
    $fmc_dynamic_css .= '.finest-area-bot .finest-continue span:hover {border-color: ' . esc_attr($continue_hover_border_color ) . ' } ';
    $fmc_dynamic_css .= "\n";
}
if( $continue_hover_border_radius ){
    $fmc_dynamic_css .= '.finest-area-bot .finest-continue span:hover {border-radius: ' . esc_attr( $continue_hover_border_radius ) . 'px } ';
    $fmc_dynamic_css .= "\n";
}