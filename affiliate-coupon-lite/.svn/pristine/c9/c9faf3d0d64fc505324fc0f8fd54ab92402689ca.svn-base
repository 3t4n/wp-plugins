<?php
$content               = get_post_meta( $id, 'affiliate_coupon_lite_description', true );
$htag                  = esc_attr( $attributes['h'] );
$code                  = get_post_meta( $id, 'affiliate_coupon_lite_code', true );
$deal_text             = get_option( 'cp_deal_text' );
$coupon_text           = get_option( 'cp_coupon_text' );
$deal_activated_text   = get_option( 'cp_dealac_text' );
$affiliatelink         = get_post_meta( $id, 'affiliate_coupon_lite_affiliate_link', true );
$popular_coupon        = get_post_meta( $id, 'affiliate_coupon_lite_popular', true );
$expirydate            = get_post_meta( $id, 'affiliate_coupon_lite_expiry', true );
$deal_class            = ! $code
	? " deal-top"
	: "";
$coupon_hover_text     = ! $code
	? $deal_text
	: $coupon_text;
$coupon_link_behaviour = ! $code
	? ' deal-box'
	: ' code-box';

if ( $expirydate ) {
	$current_time = current_time( 'timestamp' );
	$expiration   = strtotime( $expirydate, $current_time );
	if ( $expiration <= $current_time ) {
		wp_trash_post( $id );
	}
}
$stores = get_the_terms( $id, 'coupon-store' );
if ( $stores ) {
	$store         = $stores[0];
	$store_img_url = get_term_meta( $store->term_id, 'cp_store_image', true );

}
$option = get_option( 'affiliate_coupon_lite_settings' );

$expiry = '';

if ( $expirydate ) {
	$format = get_option( 'date_format' );
	$expiry = date( $format, strtotime( $expirydate ) );
}

if ( $expiry ) {
	$expiry_msg = $option['expiry_msg'] . ' ' . $expiry;
} else {
	$expiry_msg = $option['expiry_no_msg'];
}

$coupon_button_text  = $option['coupon_hover_text'];
$deal_button_text    = $option['deal_hover_text'];
$deal_activated_text = $option['deal_activated_text'];
?>