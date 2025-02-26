<?php

global $wc_atcbm_button_dates_from, $wc_atcbm_button_dates_to, $product;

$text = __('Available ', 'wc-atcbm') ;

if($wc_atcbm_button_dates_from != false ){
	$text .= __('from ', 'wc-atcbm'). $wc_atcbm_button_dates_from = date_i18n( get_option( 'date_format' ),  strtotime( $wc_atcbm_button_dates_from ) ).' ' . date_i18n( get_option( 'time_format' ),  strtotime( $wc_atcbm_button_dates_from) )  . ' '  ;
}
if($wc_atcbm_button_dates_to != false ){
	$text .= __('to ', 'wc-atcbm'). $$wc_atcbm_button_dates_to =date_i18n( get_option( 'date_format' ),  strtotime( $wc_atcbm_button_dates_to ) ).' ' . date_i18n( get_option( 'time_format' ),  strtotime( $wc_atcbm_button_dates_to) );
}

echo apply_filters('wc_atcbm_available_text', $text, $product);
