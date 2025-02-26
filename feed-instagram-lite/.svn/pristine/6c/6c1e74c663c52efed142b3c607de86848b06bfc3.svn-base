<?php

if ( ! defined('ABSPATH') ) {
	die('Please do not load this file directly!');
}


/*-------------------------------------------------------------------------------------------------------*/
/*   Option Meta Generator
/*-------------------------------------------------------------------------------------------------------*/
function gifeed_opt_generator( $id, $ispreview = null, $val = null ) {
	
	$opt = array();
	
	if ( !trim( $ispreview ) ) {
	
	// Feed Builder
	$opt['feeds'] = get_post_meta( $id, 'gifeed_meta_ids_tags', true );
	$opt['feed_format'] = get_post_meta( $id, 'gifeed_meta_feed_format', true );
	$opt['header'] = 'on';

	} else {
	
	// Feed Builder	
	$opt['feeds'] = ( isset ( $val['gifeed_meta_ids_tags'] ) ? $val['gifeed_meta_ids_tags'] : array() );
	$opt['feed_format'] = ( isset ( $val['gifeed_meta_feed_format'] ) ? $val['gifeed_meta_feed_format'] : 'individual' );
	$opt['header'] = 'on';
	}
	
	
	return $opt;
	
}