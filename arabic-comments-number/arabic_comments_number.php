<?php
/*
Plugin Name: Arabic Comments Number
Plugin URI: http://6efy.com/blog/?page_id=2222
Description: عرض عدد التعليقات حسب قواعد اللغة العربية (تعليق واحد، تعليقان ، 3 تعليقات ، 11 تعليق ).
Version: 1.2
Author: Amer Melebari
Author URI: http://6efy.com
License: GPL2
*/
function comments_number_ar( $zero = false, $one = false, $two = false, $threeto10 = false, $more = false, $deprecated = '' ) {
	if ( !empty( $deprecated ) )
		_deprecated_argument( __FUNCTION__, '1.3' );

	$number = get_comments_number();
if ( $number > 10 )
		$output = str_replace('%', number_format_i18n($number), ( false === $more ) ? __('% Comments') : $more);
	elseif ( $number > 2 )
		$output = str_replace('%', number_format_i18n($number), ( false === $threeto10 ) ? __('% Comments') : $threeto10);
	elseif ( $number == 2 )
		$output = ( false === $zero ) ? __('Two Comments') : $two;
	elseif ( $number == 0 )
		$output = ( false === $zero ) ? __('No Comments') : $zero;
	else // must be one
		$output = ( false === $one ) ? __('1 Comment') : $one;


echo apply_filters('comments_number', $output, $number);
}


function comments_popup_link_ar( $zero = false, $one = false, $two = false, $threeto10 = false, $more = false, $css_class = '', $none = false ) {

global $wpcommentspopupfile, $wpcommentsjavascript;

	$id = get_the_ID();

	if ( false === $zero ) $zero = __( 'No Comments' );
	if ( false === $one ) $one = __( '1 Comment' );
	if ( false === $two ) $two = __( 'two Comments' );
	if ( false === $threeto10 ) $threeto10 = __( '% Comments' );
	if ( false === $more ) $more = __( '% Comments' );
	if ( false === $none ) $none = __( 'Comments Off' );

	$number = get_comments_number( $id );

	if ( 0 == $number && !comments_open() && !pings_open() ) {
		echo '<span' . ((!empty($css_class)) ? ' class="' . esc_attr( $css_class ) . '"' : '') . '>' . $none . '</span>';
		return;
	}

	if ( post_password_required() ) {
		echo __('Enter your password to view comments.');
		return;
	}
	echo '<a href="';
	if ( $wpcommentsjavascript ) {
		if ( empty( $wpcommentspopupfile ) )
			$home = home_url();
		else
			$home = get_option('siteurl');
		echo $home . '/' . $wpcommentspopupfile . '?comments_popup=' . $id;
		echo '" onclick="wpopen(this.href); return false"';
	} else { // if comments_popup_script() is not in the template, display simple comment link
		if ( 0 == $number )
			echo get_permalink() . '#respond';
		else
			comments_link();
		echo '"';
	}

	if ( !empty( $css_class ) ) {
		echo ' class="'.$css_class.'" ';
	}
	$title = the_title_attribute( array('echo' => 0 ) );

	echo apply_filters( 'comments_popup_link_attributes', '' );

	echo ' title="' . esc_attr( sprintf( __('Comment on %s'), $title ) ) . '">';
		comments_number_ar( $zero, $one, $two, $threeto10, $more );
		echo '</a>';
	}
?>