<?php
namespace BBlocks\Inc;

class Utils{
	static function isPro(){
		return b_blocks_fs()->is__premium_only() && b_blocks_fs()->can_use_premium_code();
	}
	static function valForZero( $value = '', $default = 'auto' ){
		return !$value || 0 === intval( $value ) ? $default : $value;
	}
	static function allowedInnerHTML() {
		global $allowedposttags;
		return wp_parse_args( ['style' => [], 'iframe' => [
			'allowfullscreen' => true,
			'allowpaymentrequest' => true,
			'height' => true,
			'loading' => true,
			'name' => true,
			'referrerpolicy' => true,
			'sandbox' => true,
			'src' => true,
			'srcdoc' => true,
			'width' => true,
			'aria-controls' => true,
			'aria-current' => true,
			'aria-describedby' => true,
			'aria-details' => true,
			'aria-expanded' => true,
			'aria-hidden' => true,
			'aria-label' => true,
			'aria-labelledby' => true,
			'aria-live' => true,
			'class' => true,
			'data-*' => true,
			'dir' => true,
			'hidden' => true,
			'id' => true,
			'lang' => true,
			'style' => true,
			'title' => true,
			'role' => true,
			'xml:lang' => true
		] ], $allowedposttags );
	}
}