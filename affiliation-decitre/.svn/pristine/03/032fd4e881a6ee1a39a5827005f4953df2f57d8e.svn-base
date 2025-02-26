<?php
/*

@package affiliation-decitre
@since 0.1

*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/* Resulting actions */

function affiliation_decitre_prefetch() {
	$output = '<link rel="dns-prefetch" href="//www.decitre.fr" />';
	echo $output;
}

function affiliation_decitre_link_func( $atts ) {
	if ( $affiliation_decitre_campaign = get_option( 'affiliation_decitre_campaign' ) )
		$params = 'utm_source=affilae&utm_medium=affiliation&utm_campaign='.esc_html( $affiliation_decitre_campaign ).'&utm_content=wordpress-link';
	if ( get_option( 'affiliation_decitre_link_text' ) )
		$text = get_option( 'affiliation_decitre_link_text' );
    else
		$text = __('Order my product','affiliation-decitre');
	$a = shortcode_atts( array(
        'category' => '',
		'product' => '',
		'text' => ''
    ), $atts );
	if ( $a['text'] ) $text = $a['text'];
	$url = 'https://www.decitre.fr/'.$a['product'].'.html';
	if ( $affiliate = get_option( 'affiliation_decitre_affiliate' ) ) {
		if ( $params )
			$url .= '?'.$params;
		$url .= '#'. esc_html( $affiliate );
	}
	$link = '<a href="'.esc_url( $url ).'"';
	if ( get_option( 'affiliation_decitre_link_target' ) ) $link .= ' target="_blank"';
	if ( get_option( 'affiliation_decitre_link_nofollow' ) ) $link .= ' rel="nofollow"';
	if ( get_option( 'affiliation_decitre_link_google_analytics' ) ) $button .= " onclick=\"ga('send', 'event', 'Affiliation', 'Decitre.fr', '".$a['product']."', 'Link');\"";
	if ( get_option( 'affiliation_decitre_link_google_tag_manager' ) ) $button .= " onclick=\"dataLayer.push({'event':'affiliation','category':'Decitre.fr','element':'".$a['product']."'});\"";
	$link .= '><span class="decitreaffiliationlink">'.esc_html( $text ).'</span></a>';
	return $link;
}

function affiliation_decitre_button_func( $atts ) {
	if ( $affiliation_decitre_campaign = get_option( 'affiliation_decitre_campaign' ) )
		$params = 'utm_source=affilae&utm_medium=affiliation&utm_campaign='.esc_html( $affiliation_decitre_campaign ).'&utm_content=wordpress-link';
	if ( get_option( 'affiliation_decitre_button_text' ) )
		$text = get_option( 'affiliation_decitre_button_text' );
    else
		$text = __('Order my product','affiliation-decitre');
	$a = shortcode_atts( array(
		'category' => '',
		'product' => '',
		'text' => ''
    ), $atts );
	if ( $a['text'] ) $text = $a['text'];
	$url = 'https://www.decitre.fr/'.$a['product'].'.html';
	if ( $affiliate = get_option( 'affiliation_decitre_affiliate' ) ) {
		if ( $params ) $url .= '?'.$params;
		$url .= '#'. esc_html( $affiliate );
	}
	$button = '<a href="'.esc_url( $url ).'"';
	if ( get_option( 'affiliation_decitre_link_target' ) ) $button .= ' target="_blank"';
	if ( get_option( 'affiliation_decitre_link_nofollow' ) ) $button .= ' rel="nofollow"';
	if ( get_option( 'affiliation_decitre_link_google_analytics' ) ) $button .= " onclick=\"ga('send', 'event', 'Affiliation', 'Decitre.fr', '".$a['product']."', 'Button');\"";
	if ( get_option( 'affiliation_decitre_link_google_tag_manager' ) ) $button .= " onclick=\"dataLayer.push({'event':'affiliation','category':'Decitre.fr','element':'".$a['product']."'});\"";
	$button .= '><button class="decitreaffiliationbutton">'.esc_html( $text ).'</button></a>';
	return $button;
}
